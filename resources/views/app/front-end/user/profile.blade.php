@extends('app.front-end.layout.layout')
@section('title')
{{ __('lang.commons.profile') }}
@endsection
@section('content')
<style>
    @media(max-width: 767px){
        .container {
    max-width: 95%;
}
.custom_profile_btn_col{
    text-align: center !important;
}
    }
    .container{
        min-height: auto !important;
    }
</style>
<section class="profile_section" style="position: relative;">
    <div class="main_profile">
        <div class="container pl-0 pr-0 pt-5 profile_heading_container">
            <div class="header pt-4 pb-4">
                <h1 class="profile_heading">Profile</h1>
            </div>
            <div class="dec">
                <p>This is your client profile. You can see your information and edit it anytime by clicking the “Edit Profile” button.</p>
            </div>
            <div class="edit_profile_btn w-100 d-flex justify-content-md-end larg_screen_edit">
               <a href="{{url('update-profile/'.$user['id'])}}"><button type="button" class="btn edit">Edit Profile</button></a>
            </div>
        </div>
        <div class="main_profile_data">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pb-3">
                        <p class="profile_comp_name">{{$user ? $user['company_name'] : Null}}</p>
                        <h2 class="profile_p_name">{{$user ? $user['first_name'].' '.$user['last_name'] : Null}}</h2>
                        <label class="profile_label_1" for="">Member since {{$user['created_at']->format('F Y')}}</label>

                        <div class="edit_profile_btn w-100 d-flex justify-content-md-end mobile_edit">
                            <!-- <button type="button" class="btn edit mobile_edit">Edit Profile</button> -->
                            <a href="{{url('update-profile/'.$user['id'])}}"><button type="button" class="btn edit mobile_edit">Edit Profile</button></a>
                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    @if($user['industry'])
                        <div class="col-md-3 custom_profile_btn_col">
                            <label class="profile_label_1" for="">Industry</label>
                            <div class="">
                                <span class="profile_span">{{$user ? $user['industry'] : Null}}</span>
                            </div>
                        </div>
                    @endif
                    @if($user['city'])
                        <div class="col-md-7 custom_profile_btn_col">
                            <label class="profile_label_1" for="">Location</label>
                            <div class="">
                                <span class="profile_span">{{$user ? $user['city'].' '.$user['country']  : Null}}</span>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row mt-5">
                    <div class="col-md-3">
                        <div class="pb-3">
                            <span class="profile_interests">Interests</span>
                        </div>
                        <label class="profile_label_1" for="">Project Type</label>
                        <div class="pb-3">
                            <?php
                            if (isset($project_type_id))
                            {
                                foreach ($project_type_id as $key => $project_type)
                                {
                                    // dd(array_unique($project_type_id));
                                    if(($project_type['project_type_id']))
                                    {
                                        $locale = 'Mcamara\LaravelLocalization\Facades\LaravelLocalization'::getCurrentLocale();
                                        $types = 'App\Models\Translations'::where('transable_type','App\Models\ProjectType')->where('transable_id',$project_type['project_type_id'])->where('locale',$locale)->first();
                                        if($types){
                                            if($key == 0){
                                                echo '<span class="profile_span">'.$types->value;
                                            }
                                            else{
                                                echo '<span class="text-dark">,</span>'.'<span class="profile_span">'.$types->value;
                                            }
                                        }
                                    }
                                }
                            }
                            ?>

                        </div>
                        <label class="profile_label_1" for="">Duration</label>
                        <div class="">
                            <?php
                            if (isset($project_duration_id))
                            {
                                foreach ($project_duration_id as $key => $project_duration)
                                {
                                    $duration = 'App\Models\Translations'::where('transable_type','App\Models\ProjectDuration')->where('transable_id',$project_duration['project_duration_id'])->first();
                                    if($duration){
                                        if($key == 0){
                                            echo '<span class="profile_span">'. $duration->value;
                                        }
                                        else{
                                            echo '<span class="text-dark">,</span>'.'<span class="profile_span">'. $duration->value;
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="pb-3">
                            <span class="profile_interests">Contacts</span>
                        </div>
                        <label class="profile_label_1" for="">Primary</label>
                        <div class="">
                            <span class="profile_span">{{$user ? $user['first_name'].' '.$user['last_name'] : Null}}</span>
                        </div>
                        <div class="mb-0">
                            @php
                                $show_code = false;
                                if(isset($user)){
                                    $user_phone = $user['phone'];
                                    if(substr($user_phone, 0, 1) != '+' ){
                                        if(substr($user_phone, 0, 1) == ' ' ){
                                            if(substr($user_phone, 1, 2) != '+' ){
                                                $show_code = true;
                                            }
                                        }
                                        else{
                                            $show_code = true;
                                        }
                                    }
                                }
                            @endphp
                            <label class="profile_label_1 mb-0" for=""> {{ $show_code ? ($user ? $user['phone_code'] : Null) : NULL}} {{$user ? $user['phone'] : Null}}</label>
                        </div>
                        <label class="profile_label_1 mb-0" for="">{{$user ? $user['email'] : Null}}</label>
                    </div>
                </div>
            </div>
        </div>
        <img class="profile_bg_1" src="{{ asset('assets/images/profile-img-1.svg') }}" alt="">
        <img class="profile_bg_2" src="{{ asset('assets/images/profile-img-2.svg') }}" alt="">
    </div>
</section>
@endsection

@section('custom-js')

<script src="{{ asset('app-assets/_nuxt/984345e.js')}}" defer></script>
{{-- <script src="{{ asset('app-assets/_nuxt/75fff00.js')}}" defer></script> --}}
<script src="{{ asset('app-assets/_nuxt/52d6170.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/ad57896.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/b2f97a7.js')}}" defer></script>


@endsection
