@extends('app.layout.layout')

@section('page-title', 'Project Type')

@section('page-vendor')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/charts/apexcharts.css">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/charts/chart-apex.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/filepond.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.css">
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
                <h2 class="content-header-title float-start mb-0">Update Project Type</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('project-type.update.index') }}
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
                {{-- <div class="card">
                    <div class="card-body">
                        <form id="addProjectType">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label fs-5" for="basic-addon-name">Heading</label>
                                    <input type="text" id="heading_en" class="form-control" name="heading_en" placeholder="Heading" aria-label="Name" aria-describedby="basic-addon-name" value="{{ $data['project_type_en'] ? $data['project_type_en'] : ''}}" required />
                                    <div class="invalid-feedback">Please enter heading.</div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                    <input type="text" id="heading_ar" name="heading_ar" class="form-control" placeholder="عنوان" aria-label="Name" aria-describedby="basic-addon-name" value="{{ $data['project_type_ar'] ? $data['project_type_ar'] : ''}}" required />
                                    <div class="invalid-feedback">Please enter heading.</div>
                                </div>
                            </div>

                            <div class="row ">
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
                </div> --}}
            </div>
        </div>

        {{-- Repeater Start --}}
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><div class="card-title">Project Type</div></h4>
                    </div>
                    <div class="card-body">
                        <form id="projectType" method="POST" action="{{ route('project-type.addOrUpdateProjectType') }}">
                            @csrf
                            <div data-repeater-list="projectTypes">
                                @isset($projectTypes)
                                    @forelse ($projectTypes as $key=>$project_type)
                                    {{-- {{dd($project_type->fieldSingleValue('sub_goal_heading','en'))}} --}}
                                        <div data-repeater-item >
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <input type="hidden" name="project_type_id" id="project_type_id" value="{{ $project_type->id }}">
                                                    <label class="form-label fs-5" for="itemname">Project Type</label>
                                                    <input type="text" class="form-control" id="reg_project_type_en"
                                                        aria-describedby="itemname" name="reg_project_type_en" placeholder="Heading"
                                                        name="option" value="{{ $project_type ? $project_type->fieldSingleValue('reg_project_type','en')->value : ''}}" required />
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label fs-5" for="basic-addon-name">نوع المشروع</label>
                                                        <input type="text" id="reg_project_type_ar" value="{{ $project_type->fieldSingleValue('reg_project_type','ar')->value }}" name="reg_project_type_ar" class="form-control" placeholder="نوع المشروع" aria-label="Name" aria-describedby="basic-addon-name" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-6">
                                                    <div class="mb-1">
                                                        <button class="btn btn-outline-danger text-nowrap px-1 btn-margin-top delete_btn" data-id = {{ $project_type->id }} data-repeater-delete
                                                            type="button">
                                                            <i data-feather="x" class="me-25"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @empty
                                        <div data-repeater-item>
                                            <div class="row d-flex align-items-end">
                                                <div class="row">
                                                    <input type="hidden" name="project_type_id" id="project_type_id" >
                                                    <div class="col-md-4 col-12">
                                                        <label class="form-label fs-5" for="itemname">Project Type</label>
                                                        <input type="text" class="form-control" id="reg_project_type_en"
                                                            aria-describedby="itemname" name="reg_project_type_en" placeholder="Project Type"
                                                            name="option" required />
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label fs-5" for="basic-addon-name">نوع المشروع</label>
                                                            <input type="text" id="reg_project_type_ar" name="reg_project_type_ar" class="form-control" placeholder="نوع المشروع" aria-label="Name" aria-describedby="basic-addon-name" required />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforelse
                                    @else
                                        <div data-repeater-item>
                                            <div class="row d-flex align-items-end">
                                                <div class="row">
                                                    <div class="col-md-4 col-12">
                                                    <input type="hidden" name="project_type_id" id="project_type_id">
                                                        <label class="form-label fs-5" for="itemname">Project Type</label>
                                                        <input type="text" class="form-control" id="reg_project_type_en"
                                                            aria-describedby="itemname" name="reg_project_type_en" placeholder="Project Type"
                                                            name="option" />
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label fs-5" for="basic-addon-name">نوع المشروع</label>
                                                            <input type="text" id="reg_project_type_ar" name="reg_project_type_ar" class="form-control" placeholder="نوع المشروع" aria-label="Name" aria-describedby="basic-addon-name" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-6">
                                                        <div class="mb-1">
                                                            <button class="btn btn-outline-danger text-nowrap px-1 btn-margin-top delete_btn" 
                                                                type="button">
                                                                <i data-feather="x" class="me-25"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endisset
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-9 col-lg-9 col-6">
                                        <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                            <i data-feather="plus" class="me-25"></i>
                                            <span>Add New</span>
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-6">
                                        <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                                            <i data-feather='save'></i> Save Project
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Repeater End --}}
    </section>
</div>
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets') }}/vendors/js/charts/apexcharts.min.js"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets') }}/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/jquery/jquery.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/repeater/jquery.repeater.min.js"></script>
@endsection

@section('custom-js')
<script>

$("#projectType").repeater({
    show: function() {
        $(this).slideDown();
        feather && feather.replace({
            width: 14,
            height: 14
        });
    },
    hide: function(e){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-relief-outline-danger me-1',
                cancelButton: 'btn btn-relief-outline-primary me-1',
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).slideUp(e);
                let id = parseInt($('#projectType').repeaterVal());
                // alert(id);
                // console.log(id);

            }
        });
    }
});


    // $(document).on('click','.delete_btn',function(){
    //     // alert('fff');
    //     alert(parseInt($('#projectType').repeaterVal()));

    //     let id = $(this).data('id');
    //     $("#projectType").repeater({
    //         hide:function(e){
    //             Swal.fire({
    //                 title: 'Are you sure?',
    //                 text: "You won't be able to revert this!",
    //                 icon: 'warning',
    //                 showCancelButton: true,
    //                 confirmButtonText: 'Yes, delete it!',
    //                 customClass: {
    //                     confirmButton: 'btn btn-relief-outline-danger me-1',
    //                     cancelButton: 'btn btn-relief-outline-primary me-1',
    //                 },
    //                 buttonsStyling: false
    //             }).then((result) => {
    //                 if (result.isConfirmed) {
    //                     // $(this).slideUp(e);

    //                     // alert(id);
    //                 }
    //             });

    //         }
    //     });
    // });

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(document).on('submit','#addProjectType',function(e){
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "{{route('project-type.update.project-type')}}" ,
            data: data,
            dataType: "json",
            success: function (response) {
                if(response.status==201)
                    toastr.success('Data Updated Successfully.');
            },
        });
    });

    

</script>

@endsection
