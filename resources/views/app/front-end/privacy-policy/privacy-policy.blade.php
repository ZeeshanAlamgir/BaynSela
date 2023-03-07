@extends('app.front-end.layout.layout')

@section('title')
{{ __('lang.commons.privacy_policy') }}
@endsection

@section('page-css')
<style>
    .main_header {
        position: revert !important;
    }
</style>
<style>
    h2{
    padding: 20px 0 !important;
    font-size: 16px !important;
    }
    .text-dark{
    color: #343a40!important;
    }
  
.tearm_container{
    max-width: 86%;
}
@media(max-width: 767px){
    h1{
        font-size: 27px !important;
    }
    .tearm_container{
        max-width: 100% !important;
    }
}
@media(max-width: 991px){
    h1{
        font-size: 30px !important;
    }
    .tearm_container{
        max-width: 80%;
    }
}
.privcy_h1{
  font-size: 80px;
}
.header-ul2 a.active {
    color: #e64833 !important;
}
</style>
@endsection

@section('content')

<div class="container tearm_container pb-4">
        <h1 class="privcy_h1">{!! $privacy_policy['heading'] !!}</h1>  {{-- !! used if ul li comes convert it into html form --}}
        <p>{!! $privacy_policy['content'] !!}</p>
</div>
@endsection

@section('custom-js')

<script src="{{ asset('app-assets/_nuxt/984345e.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/75fff00.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/52d6170.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/ad57896.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/b2f97a7.js')}}" defer></script>

@endsection