@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'dashboard') }}
@endsection

@section('page-title', 'Dashboard')

@section('page-vendor')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/charts/apexcharts.css">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/charts/chart-apex.min.css">
@endsection

@section('custom-css')
@endsection

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'dashboard') }}
@endsection

@section('content')
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">

        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                {{-- <i data-feather="users" class="font-medium-5 text-center"></i> --}}
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder mt-1 text-center">{{ $data['Users'] }}</h2>
                        <p class="card-text">Users</p>
                    </div>
                    <div id="gained-chart"></div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-4">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                {{-- <i data-feather="calendar" class="font-medium-5 text-center"></i> --}}
                                <i class="bi bi-calendar-event"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder mt-1 text-center">{{ $data['Events'] }}</h2>
                        <p class="card-text">Events</p>
                    </div>
                    <div id="gained-chart"></div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-4">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                {{-- <img src="{{ asset('app-assets/images/icons/figma.svg') }}" alt=""
                                    class="img-fluid pull-right w-75"> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill" viewBox="0 0 16 16">
                                    <path d="M3.904 1.777C4.978 1.289 6.427 1 8 1s3.022.289 4.096.777C13.125 2.245 14 2.993 14 4s-.875 1.755-1.904 2.223C11.022 6.711 9.573 7 8 7s-3.022-.289-4.096-.777C2.875 5.755 2 5.007 2 4s.875-1.755 1.904-2.223Z"/>
                                    <path d="M2 6.161V7c0 1.007.875 1.755 1.904 2.223C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777C13.125 8.755 14 8.007 14 7v-.839c-.457.432-1.004.751-1.49.972C11.278 7.693 9.682 8 8 8s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972Z"/>
                                    <path d="M2 9.161V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13s3.022-.289 4.096-.777C13.125 11.755 14 11.007 14 10v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972Z"/>
                                    <path d="M2 12.161V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972Z"/>
                                  </svg>
                            </div>
                        </div>
                        <h2 class="fw-bolder mt-1 text-center">{{ $data['Services'] }}</h2>
                        <p class="card-text">Services</p>
                    </div>
                    <div id="gained-chart"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-8 col-12 offset-2">
                <center>
                    <canvas id="myChart"></canvas>
                </center>
            </div>
        </div>

    </section>
    <!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets') }}/vendors/js/charts/apexcharts.min.js"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets') }}/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



@endsection

@section('custom-js')
    <script>
        $(window).on('load',function(){
            $(window).resize();
        })
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($graphdata_keys),
                datasets: [{
                    label: 'Total',
                    data: @json($graphdata_values),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
