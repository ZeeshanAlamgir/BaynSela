<style>
    .main_banner_r_img{
        position: relative;
    }
    /* .main_banner_r_img img{
        position: absolute;
        top: 0;
        right: 0;
    } */
</style>
@section('title')
    {{ __('lang.navbar.overview') }}
@endsection
<section class="bg-black">
    <div class="container-fluid banner_container">
        <div class="row">
            <div class="col-md-7 pr-xl-0">
                <div class="banner-details pt-5 pb-5 left-content wow fadeInUpBig">
                    <span class="hd-span" style="font-size:18px">{{ $banner_section['meta_description'] }} </span>
                    <h1>
                        {{ $banner_section['heading'] }}
                    </h1>
                    <p class="pt-2"> {{ $banner_section['description'] }}
                    <p class="pt-2"> {{ $banner_section['description2'] }}
                    <div class="text-md-left text-center pt-md-0 pt-2">
                        <a href="{{route('numbers')}}" class="btn btn-1 mt-3 mb-md-5 mb-4 d-md-inline-block d-block">
                            {{ __('lang.commons.learn_more') }}
                        </a>
                        <div class="pt-md-4">
                            <p class="scroll"> <img src="{{ asset('assets/images/homepage/icon2.svg') }}" alt="img" /> <em> {{ __('lang.commons.discover_bayn') }}

                                </em> <em class="text2"> {{ __('lang.commons.scroll_down') }}</em> </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 pr-0 pl-0 text-right main_banner_r_img">
                <img src="{{ asset('app-assets/images/banner/') }}/{{ $banner_section['image'] }}"
                    class="img-fluid img1 wow @if (LaravelLocalization::getCurrentLocale() === 'ar') slideInLeft @else slideInRight @endif" alt="img" />
                </div>
        </div>
    </div>
</section>
