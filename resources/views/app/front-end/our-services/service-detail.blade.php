{{-- @dd($data) --}}
@extends('app.front-end.layout.layout')
@section('title')
    {{ __('lang.commons.event') }}
@endsection
@section('page-css')
    <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/css/image-map-pro.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/custom/services-detail.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
@endsection

@section('content')
    <style>
        @media(max-width: 767px) {
            .join_footer_model_mobile {
                justify-content: center !important;
            }
        }

        .header-ul2 a.active {
            color: #e64833 !important;
        }

        .header_ul_2_li span {
            color: white !important;
        }

        .dark_bg {
            background: none !important;
            position: absolute;
            width: 100%;
        }

        .imp-wrap {
            width: 100% !important;
            max-width: 100% !important;
        }

        .owl-carousel .owl-dots.disabled,
        .owl-carousel .owl-nav.disabled {
            display: none !important;
        }

        #counter-box {
            width: 100%;
        }

        .map_title {
            font-size: 40px;
        }

        @media(max-width: 767px) {
            .section-about .content[data-v-2a3b3930] {
                grid-row-gap: 0 !important;
            }

            .section-about .margin-content[data-v-2a3b3930] {
                margin-bottom: 0 !important;
            }

            #counter-box {
                padding-top: 22px !important;
            }


        }

        .slide_first_img {
            height: auto !important;
        }

        .imp-shapes-menu-shape-title {
            z-index: 121212 !important;
        }

        .swiper-wrapper {
            height: auto !important;
        }

        @media(max-width: 767px) {
            .main_map_mobile {
                height: auto !important;
            }

            .main_map_mobile img {
                height: auto !important;
            }

            /* .main_map_mobile div {
                height: auto !important;
            } */

            .main_map_mobile .imp-shapes-menu-button {
                height: 46px !important;
            }

            .custom_body {
                overflow: auto !important;
            }

            .imp-shapes-menu-button {
                position: absolute;
                width: 46px;
                height: 46px;
                right: 20px;
                top: 20px;
                line-height: 46px;
                text-align: center;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #counter-box .counter_text {
                font-family: "Manrope", sans-serif;
                font-size: 22px !important;
                font-weight: 600 !important;
            }
            #counter-box div{
                text-align: center;
                justify-content: center !important;
            }
        }

        #counter-box .counter_text {
            font-family: "Manrope", sans-serif;
            font-size: 40px;
            font-weight: 800;
            padding: 0 0 14px;
            color: #fff;
            background: #000;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-stroke: 4px transparent;
            padding-left: 7px;
        }

        [dir=ltr] .section-about .content #statistics .stat .value[data-v-2a3b3930] {
            line-height: 1;
            padding-bottom: 0 !important;
        }
        @media(max-width: 767px) {
            .imp-zoom-wrap {
                height: auto !important;
            }

            .imp-translate-wrap {
                width: 100%;
                height: auto !important;
            }

            /* .main_map_mobile div {
                height: unset !important;
            } */
            .imp-zoom-outer-wrap{
                height: auto !important;
            }
        }

        .main_map_mobile{    height: fit-content !important;}
        .imp-zoom-wrap {
            height: min-content !important;
        }

    </style>
    @php
        $locale = LaravelLocalization::getCurrentLocale();
    @endphp
    <section class="section-hero"
        style="background-image:linear-gradient(0deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0.9) 100%), url(&quot;{{ asset('app-assets/images/services/events/gallery') }}/{{ count($data['event']->images) > 0 ? $data['event']->images[0]->image : '' }}&quot;);"
        data-v-65129bcc="" data-v-6385839e="">
        <div class="content aos-init aos-animate wow fadeInUpBig" data-v-65129bcc="">
            <div class="details services_detail_title" data-v-65129bcc="">
                <div class="labels" data-v-65129bcc="">
                    <div class="label-tag" data-v-65129bcc="">
                        {{ $data['service'] ? $data['service']->fieldSingleValue('service_heading', $locale)->value : '' }}
                    </div>
                </div>
                <h1 data-v-65129bcc="">{{ $data['event'] ? $data['event']->fieldSingleValue('title', $locale)->value : '' }}
                </h1>
                <p class="description" data-v-65129bcc="">
                    {{ $data['event'] ? $data['event']->fieldSingleValue('description', $locale)->value : '' }} </p>
            </div>
            {{-- <div class="location detail_scroll_sec" data-v-65129bcc="">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt text-muted" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            <a href="{{ $data['event']->location }}" target="_blank" data-v-65129bcc="">Location</a>
            <div class="line diagonal" data-v-65129bcc="">

            </div><img src="{{ asset('app-assets/images/services/events/logo') }}/{{ $data['event']->logo }}" alt="company-logo" width="132" height="51" class="company-logo" data-v-65129bcc="">
            <div class="scroll-indicator" data-v-65129bcc="">
                <div class="text" data-v-65129bcc="">SCROLL</div>
                <div class="line" data-v-65129bcc=""></div>
            </div>
        </div> --}}
            <div class="location detail_scroll_sec" data-v-65129bcc="">
                {{-- @if ($data['event']->location != '' || $data['event']->location != null) --}}
                <svg class="@if ($data['event']->location == '' || $data['event']->location == null) d-none @endif" xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-geo-alt text-muted" viewBox="0 0 16 16">
                    <path
                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>
                <a href="{{ $data['event']->location }}" target="_blank" data-v-65129bcc=""
                    class="@if ($data['event']->location == '') d-none @endif">Location</a>

                <div class="@if ($data['event']->logo == '' || $data['event']->logo == null) d-none @endif line diagonal" data-v-65129bcc="">

                </div>
                <img src="{{ asset('app-assets/images/services/events/logo') }}/{{ $data['event']->logo }}" width="132"
                    height="51" class="company-logo @if ($data['event']->logo == '' || $data['event']->logo == null) d-none @endif" data-v-65129bcc="">
                <div class="@if ($data['event']->logo == '' || $data['event']->logo == null) d-none @endif scroll-indicator" data-v-65129bcc="">
                    <div class="text" data-v-65129bcc="">SCROLL</div>
                    <div class="line" data-v-65129bcc=""></div>
                </div>
            </div>
        </div>
    </section>

    {{-- @dd($data['event']->numbers) --}}
    @if (count($data['event']->numbers) > 0)
        <section data-v-2a3b3930="" data-v-6385839e="" class="section-about wow fadeInUpBig">
            <div data-v-2a3b3930="" class="title margin-content aos-init aos-animate">
                <h2 data-v-2a3b3930="">{{ __('lang.commons.about_the_project') }}</h2>
            </div>
            <div data-v-2a3b3930="" class="content aos-init aos-animate">
                <div data-v-2a3b3930="" class="about margin-content">
                    <p data-v-2a3b3930="">{!! $data['event']->fieldSingleValue('about', $locale)->value !!}</p>
                </div>
                <div data-v-2a3b3930="" id="statistics">

                    @foreach ($data['event']->numbers as $number)
                        <?php
                        $numbers = preg_replace('/[^0-9\.]/', '', $number->number);
                        $letters = preg_replace('/[^a-zA-Z\/]/', '', $number->number);
                        ?>

                        <div data-v-2a3b3930="" id="counter-box" class="stat">
                            <div style="display: flex; align-items: center;">
                            <div data-v-2a3b3930="" class="value counter" data-number="{{ $numbers }}"></div><span
                                class="counter_text pb-0">{{ $letters }}</span>
                            </div>
                            <div data-v-2a3b3930="" class="name">{{ $number->fieldSingleValue('label', $locale)->value }}
                            </div>
                        </div>
                        {{-- <div data-v-2a3b3930="" id="counter-box" class="stat">
                            <div style="position: relative;">
                            <div data-v-2a3b3930="" class="value counter" data-number="{{ $numbers }}" style="position: absolute; right: 23px;"></div><span
                                class="counter_text" style="position: absolute; top: 32px; right: -76px;">{{ $letters }}</span>
                            </div>
                            <div data-v-2a3b3930="" class="name">{{ $number->fieldSingleValue('label', $locale)->value }}
                            </div>
                        </div> --}}
                    @endforeach

                </div>
            </div>
        </section>
    @endif

    <!-- slider22222222222222222222222222222 -->
    <div class="container swip_slider_container py-5">
        <div class="row">
            <div class="col-12 product-left mb-5 mb-lg-0">
                <div class="swiper-container product-slider mb-3">
                    <div class="swiper-wrapper" style="height: auto !important;">
                        @foreach ($data['event']->images as $key => $image)
                            <div class="swiper-slide">
                                <img src="{{ asset('app-assets/images/services/events/gallery') }}/{{ $image->image }}"
                                    alt="..." class="w-100 img-fluid slide_first_img">
                            </div>
                        @endforeach

                    </div>

                </div>

                <div class="swiper-container product-thumbs">
                    <div class="swiper-wrapper">
                        @foreach ($data['event']->images as $key => $image)
                            <div class="swiper-slide">
                                <img src="{{ asset('app-assets/images/services/events/gallery') }}/{{ $image->image }}"
                                    alt="..." class="img-fluid small_slide_img">
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- slider22222222222222222222222222222 -->

    @if (!$data['event']->maps->isEmpty())
        <section class="similar-projects mt-5" data-v-3e150287="" data-v-6385839e="">
            <div class="home-demo">
                <div class="container" data-v-3e150287="">
                    <div class="header wow fadeInUpBig" data-v-3e150287="">
                        <h2 data-v-2a3b3930 class="title map_title" data-v-2a3b3930="">{{ __('lang.commons.image_maps') }}</h2>
                    </div>
                    <div class="header wow fadeInUpBig" data-v-3e150287="">
                        <p data-v-2a3b3930 class="map_heading" data-v-2a3b3930="">{{ __('lang.commons.image_map_sub_heading') }}</p>
                    </div>
                </div>
                @foreach ($data['event']->maps as $map)
                    <div class="container justify-content-center">
                        <div class="col-12 p-0">
                            <div class="main_map_mobile" id="image-map-pro-container-{{ $map->id }}"></div>
                        </div>
                    </div>
                @endforeach

            </div>

        </section>
    @endif

    <div class="container text-center mb-5">
        <div class="see-more" data-v-3e150287="">
            <button class="secondary join-event-btn" data-v-3e150287="">{{ __('lang.commons.join_event') }}</button>
        </div>
    </div>
    @if (count($data['event']->partnerships) > 0)
        <section class="section-partnerships" data-v-154023bb="" data-v-6385839e="">
            <div class="black-background" data-v-154023bb="">
                <div class="images aos-init aos-animate wow fadeInRight" data-v-154023bb="">
                    @if (LaravelLocalization::getCurrentLocale() == 'ar')
                        <img src="{{ asset('assets/images/car-img-1-ar.png') }}" alt="car" loading="lazy"
                            width="996" height="664" class="car" data-v-154023bb="">
                        <img src="{{ asset('assets/images/p-2-ar.svg') }}" alt="shape" loading="lazy" width="398"
                            height="566" class="shape" data-v-154023bb=""
                            style="transform: translate3d(0px, 107px, 0px);">
                        <img src="{{ asset('assets/images/car-img-2-ar.png') }}" alt="car" loading="lazy"
                            width="996" height="664" class="car-transparent" data-v-154023bb="">
                    @else
                        <img src="{{ asset('assets/images/car-img-1.png') }}" alt="car" loading="lazy"
                            width="996" height="664" class="car" data-v-154023bb="">
                        <img src="{{ asset('assets/images/p-2.svg') }}" alt="shape" loading="lazy" width="398"
                            height="566" class="shape" data-v-154023bb=""
                            style="transform: translate3d(0px, 107px, 0px);">
                        <img src="{{ asset('assets/images/car-img-2.png') }}" alt="car" loading="lazy"
                            width="996" height="664" class="car-transparent" data-v-154023bb="">
                    @endif
                </div>
            </div>
            <div class="margin-content" data-v-154023bb="">
                <div class="title aos-init aos-animate" data-v-154023bb="">
                    <h2 data-v-154023bb="">{{ __('lang.commons.partnerships') }}</h2>
                </div>
                <div class="cards" data-v-154023bb="">

                    @foreach ($data['event']->partnerships as $partnership)
                        <div class="card-item wow fadeInUpBig" data-v-154023bb="">
                            <div class="card-partnership aos-init aos-animate" data-v-78d5e307="" data-v-154023bb="">
                                <div class="content" data-v-78d5e307="">
                                    <h3 class="title" data-v-78d5e307="">
                                        {{ $partnership->fieldSingleValue('title', $locale)->value }}</h3>
                                    <p class="description" data-v-78d5e307="">
                                        {{ $partnership->fieldSingleValue('description', $locale)->value }}</p>
                                </div><button data-toggle="modal" data-target="#partnership{{ $partnership->id }}"
                                    class="secondary" data-v-78d5e307="">{{ __('lang.commons.learn_more') }}</button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="partnership{{ $partnership->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content custom_modal_content">
                                    <div class="modal-header custom_model_header">
                                        <a type="button" class="close p-0" data-dismiss="modal" aria-label="Close">
                                            <div class="closebtn ml-4"><span class="close-link pr-3"
                                                    style="font-size: 14px;">{{ __('lang.commons.close') }}</span> <span
                                                    class="cross">×</span></div>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <div data-v-154023bb="">
                                            <h1 data-v-154023bb="" class="model_title">
                                                {{ $partnership->fieldSingleValue('title', $locale)->value }}</h1>
                                            <p data-v-154023bb="" class="model_description">
                                                {{ $partnership->fieldSingleValue('popup_description', $locale)->value }}
                                            </p>
                                            @foreach ($partnership->items as $item)
                                                <div data-v-154023bb="" class="item">
                                                    <h2 data-v-154023bb="">
                                                        {{ $item->fieldSingleValue('title', $locale)->value }}</h2>
                                                    <p data-v-154023bb="">
                                                        {{ $item->fieldSingleValue('description', $locale)->value }}</p>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
    @endif
    <!---->

    </section>


    <section class="similar-projects" data-v-3e150287="" data-v-6385839e="">


        <div class="home-demo">
            <div class="content-header aos-init aos-animate" data-v-3e150287="">
                <div class="header wow fadeInUpBig" data-v-3e150287="">
                    <h2 class="title" data-v-3e150287="">{{ __('lang.commons.similar_projects') }}</h2>
                    <p class="description" data-v-3e150287="">{{ __('lang.commons.similar_projects_desc') }}.</p>
                </div>
                <div class="see-more" data-v-3e150287="">
                    <a href="{{ route('services') }}" data-v-3e150287="" class=""><button class="secondary"
                            data-v-3e150287="">{{ __('lang.commons.discover_all_projects') }}</button></a>
                </div>
            </div>


            <div class="similar_projects_owl">
                <div class="owl-carousel owl-theme home-slider1 text-center " id="slider1">
                    @foreach ($data['service']->events as $event)
                        <div class="item">

                            <div class="content-cards" data-v-3e150287="">
                                <div class="card" data-v-3e150287="">
                                    <div class="card" data-v-3e150287="">

                                        <a href="{{ route('services.detail', ['id' => $event->id]) }}">
                                            <div class="project-card carousel-card"
                                                style="background-image:linear-gradient(0deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0.1) 100%), url(&quot;{{ asset('app-assets/images/services/events/gallery') }}/{{ count($event->images) > 0 ? $event->images[0]->image : '' }}&quot;);"
                                                data-v-067570c2="" data-v-3e150287="">
                                                <div class="card-content" data-v-067570c2="">
                                                    <div class="labels" data-v-067570c2="">
                                                        <div class="label-tag" data-v-067570c2="">
                                                            {{ $data['service']->fieldSingleValue('service_heading', $locale)->value }}
                                                        </div>
                                                    </div>
                                                    <div class="title elipsis-text" data-v-067570c2="">
                                                        {{ $event->fieldSingleValue('title', $locale)->value }}</div>
                                                    <p class="description elipsis-multiple-rows" data-v-067570c2="">
                                                        {{ $event->fieldSingleValue('description', $locale)->value }} </p>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach


                </div>

            </div>

            <div class="text-center" style="padding-bottom: 3rem;">
                <a href="{{ route('services') }}" data-v-3e150287="" class="mobile_discover"><button class="secondary"
                        data-v-3e150287="">{{ __('lang.commons.discover_all_projects') }}</button></a>
            </div>

            <div class="container similar_projects_container">
                <div class="row">
                    @foreach ($data['service']->events as $event)
                        <div class="col-12 col-md-4 mb-4 pb-1">

                            <section data-v-59d3843e="" data-v-31c7fb34="" class="projects">
                                <div data-v-59d3843e="" class="content-cards">
                                    <div data-v-59d3843e="" class="card">
                                        <div data-v-59d3843e="" class="card-wrapper">
                                            <a href="{{ route('services.detail', ['id' => $event->id]) }}">
                                                <div data-v-067570c2="" data-v-59d3843e=""
                                                    class="project-card standard-card"
                                                    style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.1) 100%), url(&quot;{{ asset('app-assets/images/services/events/gallery') }}/{{ count($event->images) > 0 ? $event->images[0]->image : '' }}&quot;);height: 50vh;">
                                                    <div data-v-067570c2="" class="card-content custom_card_content">
                                                        <div data-v-067570c2="" class="labels">
                                                            <div data-v-067570c2="" class="label-tag">
                                                                {{ $data['service']->fieldSingleValue('service_heading', $locale)->value }}
                                                            </div>
                                                        </div>
                                                        <div data-v-067570c2="" class="title elipsis-text">
                                                            {{ $event->fieldSingleValue('title', $locale)->value }}</div>
                                                        <p data-v-067570c2="" class="description elipsis-multiple-rows">
                                                            {{ $event->fieldSingleValue('description', $locale)->value }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    @endforeach

                </div>
                <div class="text-center mobile_discover_tablet">
                    <a href="{{ route('services') }}" data-v-3e150287="" class="mobile_discover_tablet">
                        <button class="secondary"
                            data-v-3e150287="">{{ __('lang.commons.discover_all_projects') }}</button></a>
                </div>

            </div>

        </div>


        <div class="modal fade" id="joinEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content custom_modal_content" style="background: white">
                    <div class="modal-header custom_model_header">
                        <a type="button" class="close p-0" data-dismiss="modal" aria-label="Close">
                            <div class="closebtn ml-4"><span class="close-link pr-3"
                                    style="font-size: 14px;">{{ __('lang.commons.close') }}</span> <span
                                    class="cross">×</span></div>
                        </a>
                    </div>
                    <div class="modal-body">
                        <div data-v-154023bb="">
                            <h1 data-v-154023bb="" class="model_title">{{ __('lang.commons.join_event') }}</h1>
                            <form id="joinEventForm">
                                @csrf
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 pb-4">
                                            <div class="input-group footer-input-field">
                                                <input type="text" name="name" id="name"
                                                    class="form-control footer-input-control"
                                                    placeholder="{{ __('lang.commons.name') }}"
                                                    aria-describedby="basic-addon2">
                                                <span data-v-21317946=""
                                                    class="error d-none name w-100">{{ __('lang.validations.required.name') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-group footer-input-field">
                                                <input type="text" name="email" id="email"
                                                    class="form-control footer-input-control"
                                                    placeholder="{{ __('lang.commons.email') }}"
                                                    aria-describedby="basic-addon2">
                                                <span data-v-21317946=""
                                                    class="error d-none email w-100">{{ __('lang.validations.required.email') }}</span>
                                                <span data-v-21317946=""
                                                    class="error d-none email-invalid w-100">{{ __('lang.validations.valid.email') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group footer-input-field">
                                                <textarea class="form-control footer-input-control" id="message" placeholder="{{ __('lang.commons.message') }}"
                                                    name="message" rows="5"></textarea>
                                                <span data-v-21317946=""
                                                    class="error d-none message w-100">{{ __('lang.validations.required.message') }}</span>
                                            </div>
                                            <input type="hidden" name="service_id" id="service_id"
                                                value="{{ $data['event']->service_id }}">
                                            <input type="hidden" name="event_id" id="event_id"
                                                value="{{ $data['event']->id }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer join_footer_model_mobile">
                                        <button type="submit"
                                            class="secondary join_event_btn">{{ __('lang.commons.join') }}</button>
                                    </div>
                            </form>


                        </div>
                    </div>

                </div>
            </div>
        </div>



    </section>



@endsection

@section('page-js')
    <script src="{{ asset('app-assets/imagemaptool/js/jquery.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <script>
        var $j = jQuery.noConflict(true);
    </script>
    <script src="{{ asset('app-assets/imagemaptool/js/image-map-pro.min.js') }}"></script>

    <script type="text/javascript">
        (function($, window, document, undefined) {
            $(document).ready(function() {
                let value = '';
                @foreach ($data['event']->maps as $map)
                    value = {!! $map->script !!};
                    $('#image-map-pro-container-{{ $map->id }}').imageMapPro(value);
                @endforeach
            });
        })(jQuery, window, document);
    </script>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('custom-js')
    <script>
        $(function() {
            // Owl Carousel
            var owl = $(".owl-carousel");
            owl.owlCarousel({
                items: 1,
                margin: 10,
                // loop: true,
                nav: true,
                arrow: true,
                dotted: true
            });
        });
    </script>
    <script>
        /* product left start */
        if ($(".product-left").length) {
            var productSlider = new Swiper('.product-slider', {
                spaceBetween: 0,
                centeredSlides: false,
                loop: false,
                direction: 'horizontal',
                loopedSlides: 5,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                resizeObserver: true,
            });
            var productThumbs = new Swiper('.product-thumbs', {
                spaceBetween: 0,
                centeredSlides: true,
                loop: false,
                slideToClickedSlide: true,
                direction: 'horizontal',
                slidesPerView: 12,
                loopedSlides: 5,
            });
            productSlider.controller.control = productThumbs;
            productThumbs.controller.control = productSlider;
        }
        /* 	product left end */
    </script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '.join-event-btn', function() {
            let event_id = "{{ $data['event']->id }}";
            let service_id = "{{ $data['event']->service_id }}";
            $.ajax({
                type: "post",
                url: "{{ route('user-login-join-event') }}",
                data: {
                    event_id: event_id,
                    service_id: service_id,
                },
                success: function(response) {
                    if (response.status == 201) {
                        $('#joinEventModal').modal('show');

                    } else if (response.status == 200) {
                        toastr.success('Event Joined Successfully.');
                        // window.location.reload();
                        window.location.href = "{{ route('services') }}";

                    }
                }
            });

        })

        $(document).on('submit', '#joinEventForm', function(e) {
            e.preventDefault();

            let email = $('#email').val();
            let value = false;
            if (email == '' || email == null) {
                value = $('.email').removeClass('d-none');
                $('#email').css({
                    "border": "1px solid #ffdedc",
                    "color": "red",
                    "background-color": "#ffdedc"
                });
            } else {
                $('.email').addClass('d-none');
                $('#email').css({
                    "border": "1px solid #f3f3f3",
                    "color": "#000",
                    "background-color": "#f3f3f3"
                });


                if (!email.match(
                        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    )) {
                    value = $('.email-invalid').removeClass('d-none');
                    $('#email').css({
                        "border": "1px solid #ffdedc",
                        "color": "red",
                        "background-color": "#ffdedc"
                    });
                } else {
                    $('.email-invalid').addClass('d-none');
                    $('#email').css({
                        "border": "1px solid #f3f3f3",
                        "color": "#000",
                        "background-color": "#f3f3f3"
                    });
                }

            }

            let name = $('#name').val();
            if (name == '' || name == null) {
                value = $('.name').removeClass('d-none');
                $('#name').css({
                    "border": "1px solid #ffdedc",
                    "color": "red",
                    "background-color": "#ffdedc"
                });
            } else {
                $('.name').addClass('d-none');
                $('#name').css({
                    "border": "1px solid #f3f3f3",
                    "color": "#000",
                    "background-color": "#f3f3f3"
                });
            }

            let message = $('#message').val();
            if (message == '' || message == null) {
                value = $('.message').removeClass('d-none');
                $('#message').css({
                    "border": "1px solid #ffdedc",
                    "color": "red",
                    "background-color": "#ffdedc"
                });
            } else {
                $('.message').addClass('d-none');
                $('#message').css({
                    "border": "1px solid #f3f3f3",
                    "color": "#000",
                    "background-color": "#f3f3f3"
                });
            }

            if (!value) {

                let data = $(this).serialize();
                $.ajax({
                    type: "post",
                    url: "{{ route('join-event') }}",
                    data: data,
                    dataType: "json",
                    beforeSend: function() {
                        // toastr.info("Please wait Event is joining.");
                        $('.join_event_btn').text('joining...');
                        $('.join_event_btn').attr('disabled', true);
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            @if (LaravelLocalization::getCurrentLocale() == 'ar')
                                toastr.success('تم الانضمام بنجاح.');
                            @else
                                toastr.success('Event Joined Successfully.');
                            @endif
                            // window.location.reload();
                            window.location.href = "{{ route('services') }}";

                        }
                    }
                });
            }
        })
    </script>

    <script>
        // var a = 0;
        // $(window).scroll(function() {
        //     var oTop = $("#counter-box").offset().top - window.innerHeight;
        //     if (a == 0 && $(window).scrollTop() > oTop) {
        //         $(".counter").each(function() {
        //             var $this = $(this),
        //                 countTo = $this.attr("data-number");
        //             $({
        //                 countNum: $this.text()
        //             }).animate({
        //                 countNum: countTo
        //             }, {
        //                 duration: 1450,
        //                 easing: "swing",
        //                 step: function() {
        //                     //$this.text(Math.ceil(this.countNum));
        //                     $this.text((this.countNum).toLocaleString("en"));
        //                 },
        //                 complete: function() {
        //                     $this.text((this.countNum).toLocaleString("en"));
        //                     //alert('finished');
        //                 }
        //             });
        //         });
        //         a = 1;
        //     }
        // });

        $(window).on('load', function() {
            $(window).resize();
            var a = 0;
            $(window).scroll(function() {
                var oTop = $("#counter-box").offset().top - window.innerHeight;
                if (a == 0 && $(window).scrollTop() > oTop) {
                    $(".counter").each(function() {
                        var $this = $(this),
                            countTo = $this.attr("data-number");
                        $({
                            countNum: $this.text()
                        }).animate({
                            countNum: countTo
                        }, {
                            duration: 1450,
                            easing: "swing",
                            step: function() {
                                //$this.text(Math.ceil(this.countNum));
                                $this.text((this.countNum).toLocaleString("en"));
                            },
                            complete: function() {
                                $this.text((this.countNum).toLocaleString("en"));
                                //alert('finished');
                            }
                        });
                    });
                    a = 1;
                }
            });

        });
    </script>
@endsection
