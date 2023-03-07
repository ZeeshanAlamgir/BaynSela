<style>
    .dropdown-toggle::after{
        display: none;
    }
    .main_header {
        position: absolute ;
        width: 100%;
        z-index: 121212;
    }
    .header-ul2 a.active {
    color: #000;
}
.header_ul_2_li span{
    color: black !important;
}
</style>
<header class="main_header pt-4 pb-4 @if(request()->routeIs('home') || request()->routeIs('numbers') || request()->routeIs('services.detail')) dark_bg @endif">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 pl-xl-0">
                <a href="{{ route('home') }}"> <img src="{{ asset('assets/images/homepage') }}/{{ request()->routeIs('home') || request()->routeIs('numbers') || request()->routeIs('services.detail') ? 'logo.svg' : 'logo-black.svg' }}" alt="img" class="logo" /> </a>
                <ul class="list-inline header-ul mb-0 d-md-inline-block d-none pt-md-1">
                    <li class="list-inline-item">
                        <a href="{{route('home')}}" class="nav_link1 {{ request()->routeIs('home') ? 'active' : null }} {{ request()->routeIs('numbers') || request()->routeIs('services.detail') ? 'color_white' : null }}">
                            {{ __('lang.navbar.overview') }}
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{route('services')}}" class="nav_link2 {{ request()->routeIs('services') ? 'active' : null }} {{ request()->routeIs('home') || request()->routeIs('numbers') || request()->routeIs('services.detail') ? 'color_white' : null }}">
                            {{ __('lang.navbar.our_services') }}
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{route('numbers')}}" class="nav_link3 {{ request()->routeIs('numbers') ? 'active' : null }} {{ request()->routeIs('home') || request()->routeIs('services.detail') ? 'color_white' : null }}">
                            {{ __('lang.navbar.our_numbers') }}
                        </a>
                    </li>
                </ul>
            </div>


            <div class="col-md-4 text-right pt-md-2">
                <ul class="list-inline header-ul2 mb-0 d-md-inline-block d-none pr-5 mr-5">


                    @if (auth()->user())
                        <li class="list-inline-item pr-xl-2 header_ul_2_li">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown">
                                {{ __('lang.commons.my_account') }}
                                </a>
                                <div class="dropdown-menu pb-0 pt-0 profile_dropdown">
                                    @if (auth()->user()->is_admin=="1")
                                        <a class="dropdown-item drop_items pt-2 pb-2" href="{{ route('dashboard') }}">{{ __('lang.commons.dashboard') }}</a>
                                    @else
                                    <a class="dropdown-item drop_items pt-2 pb-2" href="{{ route('user.dashboard') }}">{{ __('lang.commons.dashboard') }}</a>
                                    @endif
                                    <a class="dropdown-item drop_items pt-2 pb-2" href="{{ route('user.profile') }}">{{ __('lang.commons.profile') }}</a>
                                    <a class="dropdown-item drop_items pt-2 pb-2" href="{{ route('logout') }}">{{ __('lang.commons.logout') }}</a>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="list-inline-item pr-xl-2 header_ul_2_li">
                            <a href="{{ route('login.view') }}" class="active">
                                {{ __('lang.commons.login') }}
                            </a> <span class="{{ request()->routeIs('home') || request()->routeIs('numbers') || request()->routeIs('services.detail') ? 'text-white' : 'text-dark' }}">{{ __('lang.commons.or') }}</span> <a href="{{ route('signup') }}" class="active">
                                {{ __('lang.commons.signup') }}
                            </a>
                        </li>
                    @endif

                </ul>
                {{-- <ul class="list-inline header-ul2 mb-0 d-inline-block fixed-menu">
                    <li class="list-inline-item pl-3 pr-3">
                        <a class="ml-2 mr-2 nav-img" onclick="openNav()"> <img src="{{ asset('assets/images/homepage/menu.svg') }}" alt="img" /> </a> <a href="" class="ml-2 mr-2 lang-txt">
                    العربية
                </a>
                </li>
                </ul> --}}
                <ul class="list-inline header-ul2 mb-0 d-inline-block fixed-menu">
                    {{-- @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="list-inline-item pl-3 pr-3">
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    English
                    </a>
                    </li>
                    @endforeach --}}
                    @if (LaravelLocalization::getCurrentLocale() == "ar")
                    <li class="list-inline-item pl-3 pr-3">
                        <a class="ml-2 mr-2 nav-img" onclick="openNav()"> <img src="{{ asset('assets/images/homepage/menu.svg') }}" alt="img" /> </a>
                        <a class="eng_btn_bg" rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                            English
                        </a>
                    </li>
                    @else
                    <li class="list-inline-item pl-3 pr-3">
                        <a class="ml-2 mr-2 nav-img" onclick="openNav()"> <img src="{{ asset('assets/images/homepage/menu.svg') }}" alt="img" /> </a>
                        <a class="arbic_btn_bg" rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                            العربية
                        </a>
                    </li>
                    @endif
                </ul>


            </div>
        </div>
    </div>
</header>

