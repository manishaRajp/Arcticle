<?php

namespace App\DataTables;

use App\Models\ArticleSubCategory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ArticleSubCategoryDataTable extends DataTable
{
    
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'articlesubcategory.action')
            ->editColumn('maincat_id', function ($data) {
            return $data->maincat->name;
            })
            ->filterColumn('maincat_id', function ($data, $keyword) {
            $sql = "article_categories.name like ?";
            $data->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['maincat_id'])
            ->addIndexColumn();
        }
    public function query(ArticleSubCategory $model)
    {
        $model = $model
        ->join('article_categories','article_categories.id', '=', 'article_sub_categories.maincat_id')
        ->select('article_sub_categories.*','article_categories.name')
        ->newQuery();
        return $model->with(['maincat'])->newQuery();
        
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('articlesubcategory-table')
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
            Column::make('id')->data('DT_RowIndex'),
            Column::make('maincat_id')->title('Main Category'),
            Column::make('sub_name')->title('Sub Category'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    
    protected function filename()
    {
        return 'ArticleSubCategory_' . date('YmdHis');
    }
}
