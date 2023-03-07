<?php

namespace App\DataTables;

use App\Models\City;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ServicesDataTable extends DataTable
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
            ->editColumn('title', function ($row) {
                return  $row->fieldSingleValue('service_heading', 'en') ? $row->fieldSingleValue('service_heading', 'en')->value : '';
            })
            ->editColumn('events', function ($row) {
                return view('app.admin-panel.new-services.view-events-btn', ['id' => $row->id]);
            })
            ->editColumn('actions', function ($row) {
                return view('app.admin-panel.new-services.actions', ['id' => $row->id]);
            })
            ->setRowId('id')
            ->rawColumns(array_merge($columns, ['actions', 'check', 'title', 'events']));
    }


    public function query(Service $model): QueryBuilder
    {
        return $model::with('multiValues')->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId("services-table")
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->serverSide()
            ->processing()
            ->deferRender()
            ->dom('BlfrtipC')
            ->lengthMenu([20, 30, 50, 70, 100])
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

                Button::raw('create-new')
                    ->addClass('btn btn-relief-outline-primary')
                    ->text('<i class="bi bi-plus"></i> Create New Service')->attr([
                        'onclick' => 'createNewService()',
                    ]),
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
                [3, 'desc'],
            ]);
    }


    protected function getColumns(): array
    {

        $colArray = [
            Column::computed('check')->exportable(false)->printable(false)->width(60),
            Column::make('title')->name('multiValues.value')->searchable(true)->orderable(false)->title('Title'),
            Column::make('events')->searchable(false)->orderable(false)->title('Events'),
            Column::make('created_at')->title('Creation Date'),
        ];

        $colArray[] = Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass('text-center');

        return $colArray;
    }

    protected function filename(): string
    {
        return 'Services_' . date('YmdHis');
    }

}
