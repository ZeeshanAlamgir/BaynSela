@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'event.index') }}
@endsection

@section('page-title', 'Events')

@section('page-vendor')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/pickers/flatpickr/flatpickr.min.css">

@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-validation.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-number-input.min.css"> --}}

    {{-- <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> --}}
    {{-- <link type="text/css" href="{{ asset('app-assets/css/signature-pad/jquery-ui.css') }}" rel="stylesheet"> --}}

    {{-- <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/signature-pad/signature.css') }}"> --}}

@endsection

@section('custom-css')
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">All Events</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('event.index') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="#" method="get" id="post-table-form">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="events-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Service</th>
                                <th>Event</th>
                                <th>Join At</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@section('vendor-js')
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.colVis.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
@endsection


@section('page-js')
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.server-side.js"></script>

    <script src="{{ asset('app-assets') }}/js/scripts/forms/form-number-input.min.js"></script>

    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('app-assets/js/signature-pad/jquery-ui.min.js') }}"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"
     integrity="sha512-0bEtK0USNd96MnO4XhH8jhv3nyRF0eK87pJke6pkYf3cM0uDIhNJy9ltuzqgypoIFXw3JSuiy04tVk4AjpZdZw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('app-assets/js/signature-pad/signature.js') }}"></script> --}}
@endsection

@section('custom-js')
<script>
    let trashedDataCount = 0;
    let first_date = '';
    let second_date = '';
    $(document).ready(function() {
            trashedDataCount = '{{ getTrashedDataCount() }}';

            $("#events-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('event.index') }}',
                    // data: function(data) {
                    //     data.first_date = first_date,
                    //     data.second_date = second_date
                    // }
                },

                scrollX: true,
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'name',
                        name: 'name',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'email',
                        name: 'email',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'service',
                        name: 'service',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'event',
                        name: 'event',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'join_at',
                        name: 'join_at',
                        searchable: false,
                        orderable: false
                    },
                  
                ],
                columnDefs: [
                        {
                        targets: 0,
                        className: 'text-center text-primary',
                        orderable: false,
                        searchable: false,
                        responsivePriority: 3,
                        render: function(data, type, full, setting) {
                            var tableRow = JSON.parse(data);
                            return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" type=\"checkbox\" value=\"' +
                                tableRow.id +
                                '\" name=\"chkTableRow[]\" onchange="changeTableRowColor(this)" id=\"chkTableRow_' +
                                tableRow.id +
                                '\" /><label class=\"form-check-label\" for=\"chkTableRow_' +
                                tableRow.id + '\"></label></div>';
                        },

                        // render : function (data, type, full, setting) {
                        //     var dataValue = JSON.parse(data);
                        //     return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" onchange=\"changeTableRowColor(this)\" type=\"checkbox\" value=\"' + dataValue.id + '\" name=\"chkData[]\" id=\"chkData_' + dataValue.id + '\" /><label class=\"form-check-label\" for=\"chkData_' + dataValue.id + '\"></label></div>';
                        // },
                        checkboxes: {
                            'selectAllRender': '<div class="form-check"> <input class="form-check-input" onchange="changeAllTableRowColor()" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>',
                        }
                    }
                ],
                order: [
                    [2, 'desc']
                ],
                // dom: 'BlfrtipC',
                // dom: 'Bfrtip',
                // dom: '<"card-header pt-0"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>> C<"clear">',
                // buttons: [
                //     {
                //         extend: 'collection',
                //         text: '<i class="bi bi-upload"></i>Export',
                //         className: 'btn btn-relief-outline-secondary dropdown-toggle',
                //         buttons: [
                            // {
                            //     name: 'pdf',
                            //     text: '<i class="bi bi-filetype-pdf"></i> PDF',
                            //     className: 'dropdown-item',
                            //     action: function(e, dt, node, config) {
                            //         downloadBulkInvoices();
                            //     }
                            // },
                            // {
                                // extend: 'excelHtml5',
                                // text: '<i class="bi bi-file-earmark-spreadsheet"></i>Excel',
                                // className: 'dropdown-item',
                                // action: function(e, dt, node, config) {
                                //     downloadExcel();
                                // }
                                // exportOptions: {
                                //     columns: [1, 2, 3, 4, 5, 6, 7, 8, 9,10,11,12,13,14,15,
                                // 16,17,18,19,20,21,22, 23,24,25,26]
                                // }
                            // },
                    //     ]
                    // },    
                        // {
                        //     name: 'delete-selected',
                        //     text: '<i class="bi bi-plus"></i> Delete Selected',
                        //     className: 'btn btn-relief-outline-danger waves-effect waves-float waves-light',
                        //     action: function(e, dt, node, config) {
                        //         deleteSelected();
                        //     }
                        // },
                        // {
                        //         name: 'create-new',
                        //         text: '<i class="bi bi-plus"></i> Create New Invoice',
                        //         className: 'btn btn-relief-outline-primary waves-effect waves-float waves-light',
                        //         action: function(e, dt, node, config) {
                        //             createNewPost();
                        //         }
                        // },
                // ],
                displayLength: 10,
                lengthMenu: [10, 20, 30, 40, 50],
                language: {
                    paginate: {
                        previous: "&nbsp;",
                        next: "&nbsp;"
                    }
                }
            });

        });

        function changeTableRowColor(element) {
        if ($(element).is(':checked'))
            $(element).closest('tr').addClass('table-primary');
        else {
            $(element).closest('tr').removeClass('table-primary');
        }
    }

</script>
@endsection