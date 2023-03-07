<?php

namespace App\DataTables;

use App\Models\City;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserListDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query)
    {
        $columns = array_column($this->getColumns(), 'data');
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function ($row) {
                return editDateColumn($row->created_at);
            })
            ->editColumn('check', function ($row) {
                return $row;
            })
            ->editColumn('full_name', function ($row) {
                return $row->first_name ? $row->first_name : '--'. ' '. $row->last_name ?? '' ;
            })
            ->editColumn('company_name', function ($row) {
                return $row->company_name ? $row->company_name : '--';
            })
            ->editColumn('is_admin', function ($row) {
                return $row->is_admin == 1 ? '<span class="badge badge-light-success">Admin</span>' : '<span class="badge bg-light-secondary">User</span>';
            })
            ->editColumn('actions', function ($row) {
                return view('app.admin-panel.users.action', ['id' => $row->id]);
            })
            ->setRowId('id')
            ->rawColumns(array_merge($columns, ['check','actions','is_admin','company_name']));
    }


    public function query(User $user): QueryBuilder
    { 
        return $user::with(['regProjectType','regProjectDuration'])->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId("users-table")
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->serverSide()
            ->processing()
            ->deferRender()
            ->dom('BlfrtipC')
            ->lengthMenu([5, 10, 15, 20, 30])
            ->dom('<"card-header pt-0"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>> C<"clear">')
            ->buttons(
                // Button::make('export')->addClass('btn btn-relief-outline-secondary dropdown-toggle')->buttons([
                //     Button::make('print')->addClass('dropdown-item'),
                //     // Button::make('copy')->addClass('dropdown-item'),
                //     // Button::make('csv')->addClass('dropdown-item'),
                //     // Button::make('excel')->addClass('dropdown-item'),
                //     Button::make('pdf')->addClass('dropdown-item'),
                // ]),

                // Button::make('reload')->addClass('btn btn-relief-outline-primary'),

                Button::raw('create-new')
                    ->addClass('btn btn-relief-outline-primary')
                    ->text('<i class="bi bi-plus"></i> Create New User')->attr([
                        'onclick' => 'createNewUser()',
                ]),
                // Button::raw('create-new')
                //     ->addClass('btn btn-relief-outline-primary')
                //     ->text('<i class="bi bi-plus"></i> Create New Event')->attr([
                //         'onclick' => 'createNewEvent()',
                //     ]),
            )

            ->scrollX()
            ->columnDefs([
                [
                    'targets' => 0,
                    'className' => 'text-center text-primary',
                    'width' => '10%',
                    'orderable' => false,
                    'searchable' => false,
                    'responsivePriority' => 3,
                    'render' => "function (data, type, full, setting) {
                        var dataValue = JSON.parse(data);
                        return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" onchange=\"changeTableRowColor(this)\" type=\"checkbox\"  value=\"' + dataValue.id + '\" name=\"chkData[]\" id=\"chkData_' + dataValue.id + '\" /><label class=\"form-check-label\" for=\"chkData_' + dataValue.id + '\"></label></div>';
                    }",
                    'checkboxes' => [
                        'selectAllRender' =>  '<div class="form-check"> <input class="form-check-input" onchange="changeAllTableRowColor()" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>',
                    ]
                ],
            ])

            ->orders([
                [2, 'desc'],
            ]);
    }


    protected function getColumns(): array
    {

        $colArray = [
            Column::computed('check')->exportable(false)->printable(false)->width(60),
            Column::make('full_name')->name('users.first_name')->orderable(false)->searchable(false)->title('User Name'),
            Column::make('is_admin')->orderable(false)->searchable(false)->title('Role'),
            Column::make('email')->orderable(false)->searchable(true)->title('Email'),
            Column::make('phone')->orderable(false)->searchable(true)->title('Phone'),
            Column::make('company_name')->orderable(false)->searchable(false)->title('Company Name'),
            Column::make('created_at')->title('Creation Date'),
        ];
    
            // $colArray[] = Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass('text-center');
            // $colArray[] = Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass('text-center');
    
            return $colArray;
    }

}