<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <span class="brand-logo">
                        {{-- <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                    y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%"
                                    y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path"
                                            d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                            style="fill:currentColor"></path>
                                        <path id="Path1"
                                            d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                            fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                        </polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                        </polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                            points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                        </polygon>
                                    </g>
                                </g>
                            </g>
                        </svg> --}}
                        <img src="{{ asset('assets/images/logo-black.png') }}" alt="">
                    </span>
                    <h2 class="brand-text">{{ env('APP_NAME') }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                        data-ticon="disc">
                    </i>
                </a>
            </li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : null }}">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Dashboard</span>
                </a>
            </li>
            {{-- <li class="nav-item {{ request()->routeIs('setting.view') ? 'active' : null }}">
                <a class="d-flex align-items-center" href="{{ route('setting.view') }}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Settings</span>
                </a>
            </li> --}}

            <li class="nav-item {{ request()->routeIs('imagemap') ? 'active' : null }}">
                <a class="d-flex align-items-center" href="{{ route('imagemap') }}" target="_blank">
                    <i data-feather='layout'></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Image Map</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('mediasection.index') ? 'active' : null }}">
                <a class="d-flex align-items-center" href="{{ route('mediasection.index') }}">
                    <i data-feather='image'></i>
                    <span class="menu-item text-truncate" data-i18n="Media Section">Images</span>
                </a>
            </li>


            {{-- Roles & Permission Menu --}}
            {{-- <li class="nav-item ">
                <a class="d-flex align-items-center" href="javascript:void(0)">
                    <i data-feather="shield"></i>
                    <span class="menu-title text-truncate"
                        data-i18n="{{ __('lang.leftbar.roles_and_permissions') }}">{{ __('lang.leftbar.roles_and_permissions') }}</span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a class="d-flex align-items-center" href="{{ route('roles.index') }}">
                            <i data-feather="shield"></i>
                            <span class="menu-item text-truncate"
                                data-i18n="{{ __('lang.leftbar.roles') }}">{{ __('lang.leftbar.roles') }}</span>
                        </a>
                        <ul class="menu-content">
                            <li class="{{ request()->routeIs('roles.index') ? 'active' : null }}">
                                <a class="d-flex align-items-center" href="{{ route('roles.index') }}">
                                    <span class="menu-item text-truncate"
                                        data-i18n="{{ __('lang.commons.view_all') }}">{{ __('lang.commons.view_all') }}</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('roles.create') ? 'active' : null }}">
                                <a class="d-flex align-items-center" href="{{ route('roles.create') }}">
                                    <span class="menu-item text-truncate"
                                        data-i18n="{{ __('lang.commons.add_new') }}">{{ __('lang.commons.add_new') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="d-flex align-items-center" href="{{ route('permissions.index') }}">
                            <i data-feather="shield"></i>
                            <span class="menu-item text-truncate"
                                data-i18n="{{ __('lang.leftbar.permissions') }}">{{ __('lang.leftbar.permissions') }}</span>
                        </a>
                        <ul class="menu-content">
                            <li class="{{ request()->routeIs('permissions.index') ? 'active' : null }}">
                                <a class="d-flex align-items-center" href="{{ route('permissions.index') }}">
                                    <span class="menu-item text-truncate"
                                        data-i18n="{{ __('lang.commons.view_all') }}">{{ __('lang.commons.view_all') }}</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('permissions.create') ? 'active' : null }}">
                                <a class="d-flex align-items-center" href="{{ route('permissions.create') }}">
                                    <span class="menu-item text-truncate"
                                        data-i18n="{{ __('lang.commons.add_new') }}">{{ __('lang.commons.add_new') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> --}}

             <li class="navigation-header">
                <span data-i18n="Contact">User Information</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item ">
                <a class="d-flex align-items-center" href="javascript:void(0)">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Services">Users</span>
                </a>
                <ul class="menu-content">

                    <li class="nav-item ">
                        <a class="d-flex align-items-center" href="javascript:void(0)">
                            <i data-feather="grid"></i>
                            <span class="menu-title text-truncate" data-i18n="Services">Types & Durations</span>
                        </a>
                        <ul class="menu-content">

                            <li class="nav-item {{ request()->routeIs('project-type.index.project-type') ? 'active' : null }}">
                                <a class="d-flex align-items-center" href="{{ route('project-type.index.project-type') }}">
                                    <i data-feather='grid'></i>
                                    <span class="menu-item text-truncate" data-i18n="Contact">Project Type</span>
                                </a>
                            </li>
                            <li class="nav-item {{ request()->routeIs('project-duration.index.project-duration') ? 'active' : null }}">
                                <a class="d-flex align-items-center" href="{{ route('project-duration.index.project-duration') }}">
                                    <i data-feather='grid'></i>
                                    <span class="menu-item text-truncate" data-i18n="Contact">Project Duration</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->routeIs('user-list.users.index') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('user-list.users.index') }}">
                            <i data-feather='grid'></i>
                            <span class="menu-item text-truncate" data-i18n="Contact">User List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span data-i18n="Pages">Pages</span>
                <i data-feather="more-horizontal"></i>
            </li>
            {{-- Home Page Menu --}}
            <li class="nav-item ">
                <a class="d-flex align-items-center" href="javascript:void(0)">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Home Page">Overview</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('homepage.bannersection') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('homepage.bannersection') }}">
                            <i data-feather="square"></i>
                            <span class="menu-item text-truncate" data-i18n="Banner Section">Banner Section</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('homepage.videosection') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('homepage.videosection') }}">
                            <i data-feather="grid"></i>
                            <span class="menu-item text-truncate" data-i18n="Video Section">Video Section</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('homepage.projectsection') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('homepage.projectsection') }}">
                            <i data-feather="square"></i>
                            <span class="menu-item text-truncate" data-i18n="Project Section">Project Section</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('homepage.goalsection') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('homepage.goalsection') }}">
                            <i data-feather="grid"></i>
                            <span class="menu-item text-truncate" data-i18n="Goal Section">Goal Section</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('homepage.aboutsection') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('homepage.aboutsection') }}">
                            <i data-feather="square"></i>
                            <span class="menu-item text-truncate" data-i18n="About Section">About Section</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('homepage.storysection') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('homepage.storysection') }}">
                            <i data-feather="grid"></i>
                            <span class="menu-item text-truncate" data-i18n="About Section">Story Section</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('homepage.contactsection') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('homepage.contactsection') }}">
                            <i data-feather="square"></i>
                            <span class="menu-item text-truncate" data-i18n="Contact Section">Contact Section</span>
                        </a>
                    </li>

                </ul>
            </li>

            {{-- Services Menu --}}
            {{-- <li class="nav-item ">
                <a class="d-flex align-items-center" href="javascript:void(0)">
                    <i data-feather="square"></i>
                    <span class="menu-title text-truncate" data-i18n="Services">Services</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('services.index') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('services.index') }}">
                            <i data-feather="grid"></i>
                            <span class="menu-item text-truncate" data-i18n="Services">Services</span>
                        </a>
                    </li>
                </ul>
            </li> --}}

            {{--New Services Menu --}}
            <li class="nav-item ">
                <a class="d-flex align-items-center" href="javascript:void(0)">
                    <i data-feather="square"></i>
                    <span class="menu-title text-truncate" data-i18n="Services New">Services</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('services.index.new') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('services.index.new') }}">
                            <i data-feather="grid"></i>
                            <span class="menu-item text-truncate" data-i18n="Services New">Services</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a class="d-flex align-items-center" href="javascript:void(0)">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Services">Our Numbers</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('our-numbers.index') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('our-numbers.index') }}">
                            <i data-feather="square"></i>
                            <span class="menu-item text-truncate" data-i18n="Services">Banner Section</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('our-numbers.partners') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('our-numbers.partners') }}">
                            <i data-feather="grid"></i>
                            <span class="menu-item text-truncate" data-i18n="Services">Partner Section</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('our-numbers.ourClientsView') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('our-numbers.ourClientsView') }}">
                            <i data-feather="grid"></i>
                            <span class="menu-item text-truncate" data-i18n="Services">Our Clients</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('our-numbers.projectView') ? 'active' : null }}">
                        <a class="d-flex align-items-center" href="{{ route('our-numbers.projectView') }}">
                            <i data-feather="grid"></i>
                            <span class="menu-item text-truncate" data-i18n="Services">Our Project</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span data-i18n="Contact">Events</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->routeIs('event.index') ? 'active' : null }}">
                <a class="d-flex align-items-center" href="{{ route('event.index') }}">
                    <i data-feather='mail'></i>
                    <span class="menu-item text-truncate" data-i18n="Contact">Events</span>
                </a>
            </li>


            <li class="navigation-header">
                <span data-i18n="Contact">Contact</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->routeIs('contacts.indesc') ? 'active' : null }}">
                <a class="d-flex align-items-center" href="{{ route('contacts.index') }}">
                    <i data-feather='mail'></i>
                    <span class="menu-item text-truncate" data-i18n="Contact">Contact</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('mailing-list') ? 'active' : null }}">
                <a class="d-flex align-items-center" href="{{ route('mailing-list') }}">
                    <i data-feather='mail'></i>
                    <span class="menu-item text-truncate" data-i18n="Contact">Mail List</span>
                </a>
            </li>



            <li class="navigation-header">
                <span data-i18n="Policy">Static Pages</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->routeIs('privacy.privacysection') ? 'active' : null }}">
                <a class="d-flex align-items-center" href="{{ route('privacy.privacysection') }}">
                    <i data-feather='file-text'></i>
                    <span class="menu-item text-truncate" data-i18n="Policy">Privacy & Policy</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('terms.termsection') ? 'active' : null }}">
                <a class="d-flex align-items-center" href="{{ route('terms.termsection') }}">
                    <i data-feather='file-plus'></i>
                    <span class="menu-item text-truncate" data-i18n="Terms">Terms & Condition</span>
                </a>
            </li>

            {{-- Comment by Zeeshan(Ehsan said) --}}
            {{-- <li class="navigation-header">
                <span data-i18n="Others">Others</span>
                <i data-feather="more-horizontal"></i>
            </li> --}}
            {{-- <li class="nav-item {{ request()->routeIs('mediasection.index') ? 'active' : null }}">
                <a class="d-flex align-items-center" href="{{ route('mediasection.index') }}">
                    <i data-feather='image'></i>
                    <span class="menu-item text-truncate" data-i18n="Media Section">Images</span>
                </a>
            </li> --}}

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
