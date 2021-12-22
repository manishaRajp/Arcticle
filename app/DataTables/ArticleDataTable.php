<?php

namespace App\DataTables;

use App\Models\Article;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ArticleDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return
                    '<a href="view-article/' . $data->id . '" class="btn btn-outline-success"><i
                      class="icon-fixed-width icon-eye">View</i></a>
              <a href="edit-article/' . $data->id . '" class="btn btn-outline-info"><i
                      class="icon-fixed-width icon-pencil">Edit</i></a>
              <a href="delete-article/' . $data->id . '" class="btn btn-outline-danger"><i
                      class="icon-fixed-width icon-pencil">Delete</i></a>'
              ;
            })
            ->editColumn('image', function ($data) {
                return '<img src="' . asset('storage/ArticleImage/' . $data->image) . '" class="img-thumbnail"
                   width="50%"></img>';
            })
            ->editColumn('maincat_id', function ($data) {
                return $data->maincat->name;
            })
            ->editColumn('subcat_id', function ($data) {
                return $data->subcat->sub_name;
            })
            ->filterColumn('maincat_id', function ($data, $keyword) {
                $sql = "article_categories.name like ?";
                $data->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['action', 'image', 'maincat_id', 'subcat_id'])
            ->addIndexColumn();
    }

  
    public function query(Article $model)
    {
    // join for fillter
    $model = $model
     ->join('article_categories','article_categories.id','=','articles.maincat_id')
     ->join('article_sub_categories','article_sub_categories.id','=','articles.subcat_id')
     ->select('articles.*','article_categories.name','article_sub_categories.sub_name')   
    ->newQuery();
    return $model->with(['maincat','subcat'])->newQuery();
    }
    public function html()
    {
        return $this->builder()
            ->setTableId('article-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

 
    protected function getColumns()
    {
        return [
            Column::make('id')->data('DT_RowIndex')->orderable(false),
            Column::make('maincat_id')->title('Category'),
            Column::make('subcat_id')->title('Sub-Category'),
            Column::make('title')->title('Title of article'),
            // Column::make('description'),
            Column::make('image')->title('Image Article'),
            Column::make('like'),
            Column::make('comment'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Article_' . date('YmdHis');
    }
}
