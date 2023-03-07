@extends('app.layout.layout')

@section('page-title', 'Dashboard')

@section('page-vendor')
    <link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets') }}/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets') }}/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets') }}/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets') }}/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/charts/chart-apex.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/datatable/responsive.bootstrap5.min.css">
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
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'user-list.users.create') }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Update User</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('user-list.users.create') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

<form method="post" action="{{ route('user-list.user.update',['id'=>$user['id']]) }}">
    @csrf
    <div class="card">
        <div class="card-body">
        {{ view('app.admin-panel.users.form-fields',compact('user','type_ids','duration_ids','data','is_password')) }}
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-6">
                    <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                        <i data-feather='save'></i> Store
                    </button>
                    <a href="{{ route('user-list.users.index') }}">
                        <button type="button" class="btn btn-relief-outline-danger waves-effect waves-float waves-light me-1">
                            <i data-feather='danger'></i> Cancel
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
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
    <script src="{{ asset('app-assets') }}/vendors/js/charts/apexcharts.min.js"></script>
@endsection


@section('page-js')
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.server-side.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/components/components-modals.min.js"></script>
@endsection

@section('custom-js')
<script>
    $("#category_services").select2({ maximumSelectionLength: 5 });
</script>
@endsection

