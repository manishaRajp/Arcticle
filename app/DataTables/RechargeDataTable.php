<?php

namespace App\DataTables;

use App\Models\Post;
use App\Models\Recharge;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RechargeDataTable extends DataTable
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

            ->editColumn('post_id', function ($data) {
            return $data->post->title;
            })
            ->editColumn('user_id', function ($data) {
            return $data->user->name;
            })
             ->editColumn('status', function ($data) {
             if ($data->status == '1') {
                 return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn btn-outline-danger">Pendding</a>';
                } else {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn btn-outline-success">Approve</a>';
                }
             })
             ->rawColumns(['post_id','user_id','status'])
             ->addIndexColumn();
            
    }

    public function query(Recharge $model)
    {
        return $model->newQuery();
    }

    
    public function html()
    {
        return $this->builder()
                    ->setTableId('recharge-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bflrtip')
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
            
            Column::make('id'),
            Column::make('user_id'),
            Column::make('post_id'),
            Column::make('status'),
        ];
    }

    protected function filename()
    {
        return 'Recharge_' . date('YmdHis');
    }
}