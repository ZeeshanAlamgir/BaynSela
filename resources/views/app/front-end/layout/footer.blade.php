<style>
    .input-group .input-wrapper label{
        top: 0 !important;
    }
    @media(max-width: 767px){
    footer .col-md-2,  footer .col-md-6{
        padding-top: 1rem !important;
    }

}

</style>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2 pt-4"><a href="{{ route('home') }}"> <img src="{{ asset('assets/images/homepage/logo.svg') }}" class="img-fluid mb-md-0 mb-5" alt="img" /> </a></div>
                    <div class="col-md-2 pt-md-4 pt-5">
                        <h3 class="pb-1">Bayn</h3>
                        <ul class="list-inline ul-footer1">
                            <li>
                                <a href="{{ route('services') }}">
                                    {{ __('lang.navbar.our_services') }}

                                </a>
                            </li>
                            <li>
                                <a href="{{ route('numbers') }}">
                                    {{ __('lang.navbar.our_numbers') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 pt-md-4 pt-5">
                        <h3 class="pb-1">{{ __('lang.commons.quick_links') }}</h3>
                        <ul class="list-inline ul-footer1">
                            <li>
                                <a href="{{route('privacy-policy')}}">
                                    {{ __('lang.commons.privacy_policy') }}

                                </a>
                            </li>
                            <li>
                                <a href="{{route('terms-condition')}}">
                                    {{ __('lang.commons.terms_and_conditions') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pt-md-4 pt-5">
                        <div class="footer-input">
                            <h3 class="pb-1">{{ __('lang.commons.mailing_list') }}</h3>
                            <p>{{ __('lang.commons.mailing_list_meta') }}</p>
                            <form id="mailing_list">
                                @csrf
                                <div class="input-group mb-3 footer-input-field">
                                    <!--  -->

                                    <div data-v-6501e38b="" class="input-group ">
                                        <div class="footer_subsc">
                                        <div data-v-6501e38b="" class="input-wrapper">
                                            <input data-v-6501e38b="" class="custom_subsc_input" id="mailing-email" type="text" name="email" placeholder="{{ __('lang.forms.email') }}" class="">
                                            <label data-v-6501e38b="" for="mailing-email" class="label-name">
                                                <span data-v-6501e38b="" class="content-name">{{ __('lang.forms.email') }}</span>
                                            </label>
                                        </div>

                                    <!--  -->
                                    <!-- <input type="text" name="email" id="mailing-email" class="form-control footer-input-control" placeholder="Email Address" aria-describedby="basic-addon2"> -->
                                    <div class="input-group-append">
                                        <button class=" btn btn-outline-secondary footer-input-btn" id="subscribe_btn" type="submit">{{ __('lang.commons.subscribe') }}</button>
                                        <button class="d-none btn btn-outline-secondary footer-input-btn ml-3" id="thankyou_btn" type="button" style="white-space: nowrap;">{{ __('lang.commons.thank_you') }}</button>
                                    </div>
                                    </div>
                                    <span data-v-21317946="" class="error mailing-email d-none w-100">{{ __('lang.validations.required.email') }}</span>
                                    <span data-v-21317946="" class="error mailing-email-invalid d-none w-100">{{ __('lang.validations.valid.email') }}</span>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-md-12 text-center pt-4">
                        <p> Copyright © 2022, Bayn. All rights reserved </p>
                    </div> --}}
                    <p class="col-md-12 text-center pt-4">
                        <span class="float-md-start d-block d-md-inline-block mt-25" style="display: flex !important; justify-content:center; width: 100%;">
                            {{ __('lang.commons.copyright') }} &copy; {{ date('Y') }}
                            <a class="ms-25" href="javascript:void(0);">
                                &nbsp;Bayn
                            </a>
                            <span class="d-block d-sm-inline-block">
                                , {{ __('lang.commons.all_rights_reserved') }}
                            </span>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
