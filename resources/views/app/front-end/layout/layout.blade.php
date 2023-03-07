<!DOCTYPE html>
{{-- <html lang="en"> --}}
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" data-textdirection="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="UTF-8">
    <meta
    data-n-head="ssr"
    name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1"
  />
  <meta
    data-n-head="ssr"
    data-hid="title"
    property="title"
    content="Bayn | End-to-End Solutions"
  />
  <meta
    data-n-head="ssr"
    data-hid="image"
    property="image"
    content="https://bayn.sela.sa/apple-touch-icon.png"
  />
  <meta
    data-n-head="ssr"
    data-hid="og:image"
    property="og:image"
    content="https://bayn.sela.sa/apple-touch-icon.png"
  />
  <meta
    data-n-head="ssr"
    data-hid="twitter:card"
    property="twitter:card"
    content="summary"
  />
  <meta
    data-n-head="ssr"
    data-hid="twitter:title"
    property="twitter:title"
    content="Bayn | End-to-End Solutions"
  />
  <meta
    data-n-head="ssr"
    data-hid="twitter:image"
    property="twitter:image"
    content="https://bayn.sela.sa/apple-touch-icon.png"
  />
  <meta
    data-n-head="ssr"
    data-hid="site_name"
    property="site_name"
    content="https://bayn.sela.sa/apple-touch-icon.png"
  />
  <meta
    data-n-head="ssr"
    data-hid="og:site_name"
    property="og:site_name"
    content="https://bayn.sela.sa/apple-touch-icon.png"
  />
  <meta data-n-head="ssr" data-hid="charset" charset="utf-8" />
  <meta
    data-n-head="ssr"
    data-hid="mobile-web-app-capable"
    name="mobile-web-app-capable"
    content="yes"
  />
  <meta
    data-n-head="ssr"
    data-hid="apple-mobile-web-app-title"
    name="apple-mobile-web-app-title"
    content="sela-web"
  />
  <meta
    data-n-head="ssr"
    data-hid="og:type"
    name="og:type"
    property="og:type"
    content="website"
  />
  <meta
    data-n-head="ssr"
    data-hid="i18n-og"
    property="og:locale"
    content="en"
  />
  <meta
    data-n-head="ssr"
    data-hid="i18n-og-alt-ar"
    property="og:locale:alternate"
    content="ar"
  />
  <meta
    data-n-head="ssr"
    data-hid="og:title"
    property="og:title"
    content="Bayn | Overview"
  />
  <meta data-n-head="ssr"data-hid="description"property="description"content="Bayn is a comprehensive digital platform developed by Sela. It is a front end that attracts various types of fruitful partnerships that create inspiring experiences and rare opportunities in business and communities"
  />
  <meta
    data-n-head="ssr"
    data-hid="og:description"
    property="og:description"
    content="Bayn is a comprehensive digital platform developed by Sela. It is a front end that attracts various types of fruitful partnerships that create inspiring experiences and rare opportunities in business and communities"
  />
  <meta
    data-n-head="ssr"
    data-hid="keywords"
    property="keywords"
    content="Bayn, Sela, Sela company, Partnerships in Saudi Arabia, opportunities for entertainment, opportunities for sport, opportunities for culture, connect with partners and support my business"
  />
  <meta
    data-n-head="ssr"
    data-hid="og:keywords"
    property="og:keywords"
    content="Bayn, Sela, Sela company, Partnerships in Saudi Arabia, opportunities for entertainment, opportunities for sport, opportunities for culture, connect with partners and support my business"
  />
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    {{-- <meta name="description" content="Bayn is a comprehensive digital platform developed by Sela. It is a front end that attracts various types of fruitful partnerships that create inspiring experiences and rare opportunities in business and communities" /> --}}
    {{-- <meta  property="og:image" content="{{ asset('app-assets/images/apple-touch-icon.png') }}"> --}}
    {{-- <meta property="og:image" content="https://bayn.sela.sa/apple-touch-icon.png" /> --}}
    {{-- <meta data-n-head="ssr" data-hid="twitter:card" property="twitter:card" content="summary">
    <meta data-n-head="ssr" data-hid="twitter:title" property="twitter:title" content="Bayn | End-to-End Solutions">
    <meta data-n-head="ssr" data-hid="description" property="description" content="Bayn is a comprehensive digital platform developed by Sela. It is a front end that attracts various types of fruitful partnerships that create inspiring experiences and rare opportunities in business and communities"> --}}
    {{-- <meta data-n-head="ssr" data-hid="twitter:image" property="twitter:image" content="https://bayn.sela.sa/apple-touch-icon.png"> --}}
    <title>Bayn | @yield('title') </title>
    {{-- <link data-n-head="ssr" rel="apple-touch-icon" type="image/png" href="https://bayn.sela.sa/apple-touch-icon.png"> --}}
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    {{-- <meta data-n-head="ssr" data-hid="title" property="title" content="Bayn | End-to-End Solutions"> --}}
    {{-- <meta data-n-head="ssr" data-hid="image" property="image" content="sela-bayn.png"> --}}
    {{-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favi.png"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/toastr/toastr.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css"> -->
    <link rel="stylesheet" href="{{ asset('app-assets/css/slick.css') }}">
    @yield('page-css')
    @if (LaravelLocalization::getCurrentLocale() == "ar")
        <link rel="stylesheet" href="{{ asset('app-assets/css/custom/style-arb.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('app-assets/css/custom/style.css') }}">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('app-assets/css/custom/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/filepond.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/extensions/ext-component-swiper.min.css">

    <style>
        .flip_image {
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
        }

        .filepond--drop-label {
            color: #7367F0 !important;
        }

        .filepond--item-panel {
            background-color: #7367F0;
        }

        .filepond--panel-root {
            background-color: #e3e0fd;
        }

        .filepond--item {
            width: calc(20% - 0.5em);
        }
    </style>
    <style>
        #toast-container>div {
            padding: 15px 15px 15px 15px !important;
        }

        #toast-container>.toast-error {
            background: #e73e28 !important;
        }

        #toast-container>.toast-success {
            background: green !important;
        }

        .toast-top-full-width {
            top: 20% !important;
        }

        .toast-error, .toast-success{
            border-radius: 8px !important;
        }
       .mobile_login_menu{
        display: none;
       }
       @media(max-width: 767px){
        .mobile_login_menu{
        display: block;
       }
       }
       .hide_scroll{
        overflow-y: hidden;
       }
    </style>
</head>

<body class="custom_body">

    {{ view('app.front-end.layout.topnav') }}

    {{ view('app.front-end.layout.header') }}

    @yield('content')

    {{ view('app.front-end.layout.footer') }}


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/extensions/swiper.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/extensions/ext-component-swiper.min.js"></script>

    {{-- <script src="{{ asset('app-assets/js/slick.min.js') }}"></script> --}}

    @yield('page-js')
    <script src="{{ asset('app-assets/js/custom/wow.js') }}"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.typevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagecrop.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagesizevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.filesizevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/filepond.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/extensions/toastr.min.js"></script>


    <script>
        wow = new WOW({
            animateClass: 'animated',
        });
        wow.init();
    </script>
    <script>
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
            $('.custom_body').addClass('hide_scroll')
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
            $('.custom_body').removeClass('hide_scroll')
        }
    </script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            toastr.options.positionClass = 'toast-top-full-width';
            toastr.options.timeOut = 5000;
            toastr.options.closeOnHover = false;
        });
        $(document).on('submit', '#mailing_list', function(e) {
            e.preventDefault();
            let email = $('#mailing-email').val();
            let value = false;
            if (email == '' || email == null) {
                value = $('.mailing-email').removeClass('d-none');
                $('#mailing-email').css({
                    "border": "1px solid #ffdedc",
                    "color": "red",
                    "background-color": "#ffdedc"
                });
            }
            else {
                $('.mailing-email').addClass('d-none');
                $('#mailing-email').css({
                    "border": "1px solid #f3f3f3",
                    "color": "#000",
                    "background-color": "#f3f3f3"
                });


                if(!email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
                    value = $('.mailing-email-invalid').removeClass('d-none');
                    $('#mailing-email').css({
                        "border": "1px solid #ffdedc",
                        "color": "red",
                        "background-color": "#ffdedc"
                    });
                }
                else{
                    $('.mailing-email-invalid').addClass('d-none');
                    $('#mailing-email').css({
                        "border": "1px solid #f3f3f3",
                        "color": "#000",
                        "background-color": "#f3f3f3"
                    });
            }

            }


            if(!value){
                let data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{route('add-mail')}}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response.status == 200) {
                            // toastr.success('Subscription Successfull.');
                            $('#subscribe_btn').addClass('d-none');
                            $('#thankyou_btn').removeClass('d-none');
                            setTimeout(function(){
                                $('#subscribe_btn').removeClass('d-none');
                                $('#thankyou_btn').addClass('d-none');
                            }, 1000);
                            $("#mailing_list")[0].reset();
                        }
                    }
                });
            }
        })
    </script>

    @yield('custom-js')

</body>

</html>
