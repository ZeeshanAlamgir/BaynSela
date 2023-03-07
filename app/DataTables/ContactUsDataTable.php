<?php

namespace App\DataTables;

use App\Models\City;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ContactUsDataTable extends DataTable
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
            ->editColumn('file', function ($row) {
                $url=asset("app-assets/images/contactimages/$row->file");
                return $row->file ? '<a href="javascript:void(0)" download class="btn downloadFile" data-id="'.$row->id.'"><span id="boot-icon" class="bi bi-image" style="font-size: 41px; opacity: 0.7; -webkit-text-stroke-width: 1.8px; color: rgb(0, 0, 128);"></span></a>' : 'File Not Exists';
            })
            // ->editColumn('detail', function ($row) {
            //     return view('app.admin-panel.service-events.view-detail-btn', ['id' => $row->id]);
            // })
            // ->editColumn('actions', function ($row) {
            //     $serviceId = $row->service->id;
            //     return view('app.admin-panel.service-events.actions', ['id' => $row->id, 'serviceId' => $serviceId]);
            // })
            ->setRowId('id')
            ->rawColumns(array_merge($columns, ['check', 'file']));
    }


    public function query(Contact $contact): QueryBuilder
    {
        return $contact->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId("contacts-table")
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
            Column::make('file')->searchable(false)->title('File'),
            Column::make('name')->searchable(true)->title('Name'),
            Column::make('email')->searchable(true)->title('Email'),
            Column::make('phone')->searchable(true)->title('Phone'),
            Column::make('message')->searchable(false)->title('Message'),
            Column::make('created_at')->title('Creation Date'),
        ];

        // $colArray[] = Column::computed('')->exportable(false)->printable(false)->width(60)->addClass('text-center');

        return $colArray;
    }

}
