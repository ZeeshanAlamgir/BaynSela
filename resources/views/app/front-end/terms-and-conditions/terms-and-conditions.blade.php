@extends('app.front-end.layout.layout')
@section('title')
{{ __('lang.commons.terms_and_conditions') }}
@endsection
@section('content')
<style>
    h2{
    padding: 20px 0;
    font-size: 16px;
    }
   li{
    list-style-type: lower-alpha;
    padding: 10px;
    line-height: 22px;
    font-weight: 400;
   }
   
   ::marker {
    unicode-bidi: isolate;
    font-variant-numeric: tabular-nums;
    text-transform: none;
    text-indent: 0px !important;
    text-align: start !important;
    text-align-last: start !important;
}
.tearm_container{
    max-width: 86%;
}
.header_ul_2_li span{
    color: #000 !important;
}
.header-ul2 a.active {
    color: #e64833;
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
.main_header {
        position: revert;
    }
</style>
<div class="container tearm_container pb-4">
    <div class="">
        <h1 style="line-height: 50px;font-size: 80px;">{!! $terms_conditions['heading'] !!}</h1>  {{-- !! used if ul li comes convert it into html form --}}
        <p>{!! $terms_conditions['content'] !!}</p>
    </div>
</div>
@endsection

@section('custom-js')

<script src="{{ asset('app-assets/_nuxt/984345e.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/75fff00.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/52d6170.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/ad57896.js')}}" defer></script>
<script src="{{ asset('app-assets/_nuxt/b2f97a7.js')}}" defer></script>

@endsection
