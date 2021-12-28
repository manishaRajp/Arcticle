<?php

namespace App\DataTables;

use App\Models\Article;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ArticleDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return
                    '<a href="' . route("admin.article.show", $data->id) . '"class="btn btn-outline-success"><i
                      class="icon-fixed-width icon-eye">View</i></a>
                         <a href="' . route("admin.article.edit", $data->id) . '"class="btn btn-outline-info"><i
                      class="icon-fixed-width icon-pencil">Edit</i></a>
                        <form action="' . route("admin.article.destroy", $data->id) . '" method="POST">
                          ' . csrf_field() . '
                          ' . method_field("DELETE") . '
                              <button type="submit" class="btn-sm btn-outline-danger"
                              onclick="return confirm(\'Are You Sure Want to Delete?\')"
                              >Delete
                        </form>';
            })
            ->editColumn('like', function ($data) {
                return $data->like_count->count();
            })
            ->editColumn('comment', function ($data) {
                return $data->comment_count->count();
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
            ->filterColumn('subcat_id', function ($data, $keyword) {
                $sql = "article_sub_categories.sub_name like ?";
                $data->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['action', 'image', 'maincat_id', 'subcat_id','like','comment'])
            ->addIndexColumn();
    }
    public function query(Article $model)
    {
        $model = $model
            ->join('article_categories', 'article_categories.id', '=', 'articles.maincat_id')
            ->join('article_sub_categories', 'article_sub_categories.id', '=', 'articles.subcat_id')
            ->select('articles.*', 'article_categories.name', 'article_sub_categories.sub_name')
            ->newQuery();
        return $model->with(['maincat', 'subcat'])->newQuery();
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
    protected function filename()
    {
        return 'Article_' . date('YmdHis');
    }
}
