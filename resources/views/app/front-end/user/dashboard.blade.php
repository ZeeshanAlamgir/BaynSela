@extends('app.front-end.layout.layout')
@section('title')
{{ __('lang.commons.dashboard') }}
@endsection
@section('content')
    <style>
        .dashboard_heading {
            font-size: 60px;
        }

        .main_dashboard {
            margin-top: 12rem;
            margin-bottom: 4rem;
        }

        .dashboard_img {
            max-width: 45%;
        }

        @media(max-width: 767px) {
            .dashboard_img {
                max-width: 100%;
            }

            .dashboard_heading {
                max-width: 100%;
                font-size: x-large;
            }
        }

        .container {
            min-height: auto !important;
        }

        .main_dashboard {
            margin-top: 12rem;
            margin-bottom: 4rem;
            max-height: 38vh !important;
            height: 100vh;
            display: flex;
            justify-content: center;
            text-align: center;
            align-items: center;
        }
    </style>
    <section>
        <div class="main_dashboard">
            <div class="container pl-0 pr-0">
                <div class="dashboard_title">
                    <h1 class="dashboard_heading">{{ __('lang.commons.dashboard_coming_soon') }}</h1>
                </div>
                {{-- <div class="dashboard_img">
            <img class="img-fluid" src="{{ asset('assets/images/dashboard-final-img.png') }}" alt="coming-soon-dashboard">
            </div> --}}
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script src="{{ asset('app-assets/_nuxt/984345e.js') }}" defer></script>
    {{-- <script src="{{ asset('app-assets/_nuxt/75fff00.js')}}" defer></script> --}}
    <script src="{{ asset('app-assets/_nuxt/52d6170.js') }}" defer></script>
    <script src="{{ asset('app-assets/_nuxt/ad57896.js') }}" defer></script>
    <script src="{{ asset('app-assets/_nuxt/b2f97a7.js') }}" defer></script>
@endsection
