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
.custom_topbar_btn:hover{
    color: #ff6321 !important;
    text-decoration: none
}
.custom_topbar_btn:focus{
    color: #ff6321 !important;
    text-decoration: none
}
<
</style>
<div id="myNav" class="overlay">
    <div class="overlay-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-3 pt-3">
                    <div class="pl-md-5 pr-4"> <a href="{{ route('home') }}"><img src="{{ asset('assets/images/homepage/logo-black.svg') }}" alt="img" /> </a></div>
                </div>
                <div class="col-md-8 col-9 text-right overlay-menu pt-4">
                    <div class="pr-md-5">
                        @if (auth()->user())
                            {{-- @if (auth()->user()->is_admin=="1")
                                <a href="{{ route('dashboard') }}" class="active">
                                    {{ __('lang.commons.dashboard') }}
                                </a>
                            @endif --}}
                        {{-- <a href="{{ route('logout') }}" class="red d-md-inline-block d-none">
                            {{ __('lang.commons.logout') }}
                        </a> --}}
                        <li class="list-inline-item pr-xl-2 header_ul_2_li">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle custom_topbar_btn active" data-toggle="dropdown">
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
                        <a href="{{ route('login.view') }}" class="red d-md-inline-block d-none">
                            {{ __('lang.commons.login') }}
                        </a> <span class="red  pl-1 pr-1 d-md-inline-block d-none">{{ __('lang.commons.or') }}</span> <a href="{{ route('signup') }}" class="red d-md-inline-block d-none">
                            {{ __('lang.commons.signup') }}
                        </a>
                        @endif
                        <a href="javascript:void(0)" class="closebtn ml-4" onclick="closeNav()"><span class="close-link pr-3">{{ __('lang.commons.close') }}</span>  <span class="cross">&times;</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-5 pl-0 pr-0">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-3 top_col_1">
                    <div class="pl-md-5 ml-md-4 text-md-left text-center">
                        <p class="head-span mb-2 list_heading">{{ __('lang.commons.menu') }}</p>
                        <ul class="list-inline menu-xl">
                            <li>
                                <a href="{{route('home')}}" class="{{ request()->routeIs('home') ? 'active' : null }}">
                                    {{ __('lang.navbar.overview') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{route('services')}}" class="{{ request()->routeIs('services') ? 'active' : null }}">
                                    {{ __('lang.navbar.our_services') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{route('numbers')}}" class="{{ request()->routeIs('numbers') ? 'active' : null }}">
                                    {{ __('lang.navbar.our_numbers') }}
                                </a>
                            </li>

                            @auth
                                <li class="mobile_login_menu">
                                    <div class="head-span mb-2 list_heading">{{ __('lang.commons.my_account') }}</div>
                                </li>
                                <li class="mobile_login_menu">
                                    <a  href="@if (auth()->user()->is_admin=="1") {{ route('dashboard') }} @else {{ route('user.dashboard') }} @endif" class="">{{ __('lang.commons.dashboard') }}</a>
                                </li>
                                <li class="mobile_login_menu">
                                    <a  href="{{ route('user.profile') }}" class="">{{ __('lang.commons.profile') }}</a>
                                </li>
                            @endauth

                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 text-md-left text-center">
                    <p class="head-span mb-2">{{ __('lang.commons.contact') }}</p> <a href="mailto:contact@joinbayn.com" class="link-xl">
                        contact@joinbayn.com
                    </a>
                    <div class="d-md-none d-block mt-5 pt-2 pl-3 pb-5 pr-3">
                        @if (auth()->user())
                            @if (auth()->user()->is_admin=="1")
                                <a href="{{ route('dashboard') }}" class="active">
                                    {{ __('lang.commons.dashboard') }}
                                </a>
                            @endif
                        <a href="{{ route('logout') }}" class="btn btn-2">
                            {{ __('lang.commons.logout') }}
                        </a>
                        @else
                        <a href="{{ route('login.view') }}" class="btn btn-2">
                            {{ __('lang.commons.login') }}
                        </a> <a href="{{ route('signup') }}" class="btn btn-2 mt-4">
                            {{ __('lang.commons.signup') }}
                        </a>
                        @endif

                    </div>
                </div>
                <div class="col-md-4 col-lg-5 col-xl-6 text-right d-md-block d-none menue_img_arb top_col_2">
                    @if (LaravelLocalization::getCurrentLocale() == "ar")
                        <img src="{{ asset('assets/images/homepage/cycling-ar.png') }}" class="img-fluid me-img" alt="img" />
                    @else
                        <img src="{{ asset('assets/images/homepage/cycling.png') }}" class="img-fluid me-img" alt="img" />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
