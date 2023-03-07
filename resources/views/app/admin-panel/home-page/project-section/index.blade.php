@extends('app.layout.layout')

@section('page-title', 'Projects')

@section('page-vendor')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/charts/apexcharts.css">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/charts/chart-apex.min.css">
@endsection

@section('custom-css')
<style>
    .customizer .customizer-toggle{
        display: none !important;
    }
</style>
@endsection

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'homepage.bannersection') }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Update Project Section</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('homepage.project-section') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="content-body"><!-- Validation -->
    <section class="bs-validation">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="updateProjectSection1" action="{{route('homepage.projectsection.update')}}" method="POST">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 position-relative">
                                        <label class="form-label fs-5" for="basic-addon-name">Heading</label>
                                        <input type="text" id="heading_en" class="form-control @error('heading_en') is-invalid @enderror" name="heading_en" placeholder="Heading" aria-label="Name" aria-describedby="basic-addon-name" value="{{$projectSectionData ? $projectSectionData['project_heading_en'] : old('project_heading_en')}}" />
                                        {{-- <div class="invalid-feedback">Please enter heading.</div> --}}
                                        @error('heading_en')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 position-relative">
                                        <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                        <input type="text" id="basic-addon-name" name="heading_ar" class="form-control @error('heading_ar') is-invalid @enderror" placeholder="عنوان" aria-label="Name" aria-describedby="basic-addon-name" value="{{$projectSectionData ? $projectSectionData['project_heading_ar'] : ''}}" />
                                        {{-- <div class="invalid-feedback">Please enter heading.</div> --}}
                                        @error('heading_ar')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 position-relative">
                                    <label class="form-label fs-5" for="Description">Description</label>
                                    <textarea class="form-control form-control-lg @error('description_en') is-invalid @enderror description"
                                        rows="12" name="description_en" > {{$projectSectionData ? $projectSectionData['project_description_en'] : ''}}
                                    </textarea>
                                    @error('description_en')
                                        <div class="invalid-tooltip">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 position-relative">
                                    <label class="form-label fs-5" for="Description">وصف</label>
                                    <textarea class="form-control form-control-lg @error('description_ar') is-invalid @enderror description"
                                        name="description_ar" rows="12"> {{$projectSectionData ? $projectSectionData['project_description_ar'] : ''}}
                                    </textarea>
                                    @error('description_ar')
                                        <div class="invalid-tooltip">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" id="slug" class="form-control" name="slug" placeholder="slug" disabled aria-label="Name" aria-describedby="basic-addon-name"  required />

                            <div class="row">

                                <div class="card-footer d-flex align-items-center justify-content-end">
                                    <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                                        <i data-feather='save'></i> Update
                                    </button>
                                    <a href="" class="btn btn-relief-outline-danger waves-effect waves-float waves-light">
                                        <i data-feather='x'></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets') }}/vendors/js/charts/apexcharts.min.js"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets') }}/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/jquery/jquery.min.js"></script>
@endsection

@section('custom-js')
<script>
       $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(document).on('submit','#updateProjectSection',function(e){
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "{{route('homepage.projectsection.update')}}" ,
            data: data,
            dataType: "json",
            beforeSend: function(){
                toastr.info("Please wait your data is updating");
            },
            success: function (response) {
                if(response.status)
                {
                    toastr.success('Data Updated Successfully.');
                }
            },
        });
    })
</script>

@endsection
