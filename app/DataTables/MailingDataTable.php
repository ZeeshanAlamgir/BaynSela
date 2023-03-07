<?php

namespace App\DataTables;

use App\Models\City;
use App\Models\Contact;
use App\Models\Event;
use App\Models\MailingList;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MailingDataTable extends DataTable
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
            ->setRowId('id')
            ->rawColumns(array_merge($columns, ['check']));
    }


    public function query(MailingList $mailing_list): QueryBuilder
    {
        return $mailing_list->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId("mailings-table")
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

                Button::make('reload')->addClass('btn btn-relief-outline-primary'),

                Button::raw('delete-selected')
                    ->addClass('btn btn-relief-outline-danger')
                    ->text('<i class="bi bi-trash3-fill"></i> Delete Selected')->attr([
                        'onclick' => 'deleteSelected()',
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
                        return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" onchange=\"changeTableRowColor(this)\" type=\"checkbox\" value=\"' + dataValue.id + '\" name=\"chkData[]\" id=\"chkData_' + dataValue.id + '\" /><label class=\"form-check-label\" for=\"chkData_' + dataValue.id + '\"></label></div>';
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
            Column::make('email')->searchable(true)->orderable(false)->title('Email'),
            Column::make('created_at')->searchable(false)->orderable(false)->title('Creation Date'),
        ];

        // $colArray[] = Column::computed('')->exportable(false)->printable(false)->width(60)->addClass('text-center');

        return $colArray;
    }

}
