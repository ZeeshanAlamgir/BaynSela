@extends('app.layout.layout')

@section('page-title', 'Dashboard')

@section('page-vendor')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/charts/apexcharts.css">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/charts/chart-apex.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/datatable/responsive.bootstrap5.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('custom-css')
    <style>
        .customizer .customizer-toggle {
            display: none !important;
        }
        .breadcrumb{
            background-color: transparent !important;
        }
    </style>
@endsection

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'event.index') }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">All Events Section</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('event.index') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content-body">
        <!-- Validation -->
        <section class="bs-validation">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Join Events</h4>
                        </div>
                        <div class="card-body">
                            {{-- DataTable Start --}}
                                <div class="row">
                                  <div class="col-12">
                                      
                                      <div class="card-datatable">
                                        <table class="table table-bordered data-table">
                                            <thead>
                                                <tr>
                                                    <th width="50">No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Service</th>
                                                    <th>Event</th>
                                                    <th>Join At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                      </div>
                                  </div>
                                </div>
                            {{-- DataTable End --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets') }}/vendors/js/charts/apexcharts.min.js"></script>
@endsection

@section('page-js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endsection

@section('custom-js')
    <script>
        $(document).ready(function () {
        $('.table').DataTable({
        "ajax":"{{route('event.index')}}",
        columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex'},
      { data: 'name', name: 'name' },
      { data: 'email', name: 'email' },
      { data: 'service', name: 'service' },
      { data: 'event', name: 'event' },
      { data: 'join_at', name: 'join_at' },
    ],
    dom: 'Blfrtip',
    pageLength:{{5}},
    lengthMenu:[5,10,15,20],
    });
});

    </script>
@endsection
