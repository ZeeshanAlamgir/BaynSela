@extends('app.layout.layout')

@section('page-title', 'Goals')

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
                <h2 class="content-header-title float-start mb-0">Update Goal Section</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('homepage.goalsection') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="content-body"><!-- Validation -->
    <section class="bs-validation">

        {{-- Goal Section --}}
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="updateGoalSection" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6">
                                        <label class="form-label fs-5" for="basic-addon-name">Heading</label>
                                        <input type="text" id="heading" class="form-control" name="heading_en" placeholder="Heading" aria-label="Name" aria-describedby="basic-addon-name" value="{{ $goalSectionData['heading_en'] }}" required />
                                        <div class="invalid-feedback">Please enter heading.</div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                        <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                        <input type="text" id="basic-addon-name" name="heading_ar" class="form-control" placeholder="عنوان" aria-label="Name" aria-describedby="basic-addon-name" value="{{ $goalSectionData['heading_ar'] }}" required />
                                        <div class="invalid-feedback">Please enter heading.</div>
                                </div>
                            </div>
                            {{-- {{dd($goalSectionData)}} --}}
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label fs-5" for="Description">Description</label>
                                    <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                        rows="12" name="description_en" > {{ $goalSectionData['description_en'] }}
                                    </textarea>
                                    @error('description')
                                        <div class="invalid-tooltip">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label fs-5" for="Description">وصف</label>
                                    <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                        name="description_ar" rows="12"> {{ $goalSectionData['description_ar'] }}
                                    </textarea>
                                    @error('description')
                                        <div class="invalid-tooltip">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6">
                                        {{-- <label for="customFile1" class="form-label fs-5">Image</label>
                                        <input class="form-control" type="file" id="image" name="image" onchange="loadFile(event)" accept="image/jpg,image/jpeg,image/png" required />
                                        <img id="output" width="80" height="80" src={{asset("app-assets/images/goalsection/")}}{{'/'.$goalSectionData['image']}} /> --}}

                                        <label class="form-label fs-5" for="Image">Image</label>
                                        <i>( .png, .jpg, .jpeg )</i><br>
                                        <i>Resolution (827 * 791)</i>
                                        <input id="attachment1" type="file" class="filepond @error('image') is-invalid @enderror"
                                            name="image_en" multiple accept="image/png, image/jpeg, image/jpg" />
                                        @error('image')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="col-lg-6 col-md-6">
                                        <label class="form-label fs-5" for="Image">صورة</label>
                                        <i>( .png, .jpg, .jpeg )</i><br>
                                        <i>Resolution (827 * 791)</i>
                                        <input id="attachment2" type="file" class="filepond @error('image') is-invalid @enderror"
                                            name="image_ar" multiple accept="image/png, image/jpeg, image/jpg" />
                                        @error('image')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                </div>

                                <input type="hidden" id="slug" class="form-control" name="slug" placeholder="slug" disabled aria-label="Name" aria-describedby="basic-addon-name" value="{{ $goalSectionData['slug'] }}" required />
                            </div>
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

        {{-- Goal Sub Sections --}}
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><div class="card-title">Goals</div></h4>
                    </div>
                    <div class="card-body">
                        <form id="createGoal" method="POST" action="{{ route('homepage.goals.store.update') }}">
                            @csrf
                            <div data-repeater-list="goals">
                                @isset($subGoal)
                                    @forelse ($subGoal as $key=>$goalData)
                                    {{-- d{{dd($goalData->fieldSingleValue('sub_goal_heading','en'))}} --}}
                                        <div data-repeater-item >
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <input type="hidden" name="sub_goal_id" id="sub_goal_id" value="{{ $goalData->id }}">
                                                    <label class="form-label fs-5" for="itemname">Heading</label>
                                                    <input type="text" class="form-control" id="goalheading_en"
                                                        aria-describedby="itemname" name="goalheading_en" placeholder="Heading"
                                                        name="option" value="{{ $goalData ? $goalData->fieldSingleValue('sub_goal_heading','en')->value : ''}}"/>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                                        <input type="text" id="goalheading_ar" value="{{ $goalData->fieldSingleValue('sub_goal_heading','ar')->value }}" name="goalheading_ar" class="form-control" placeholder="عنوان" aria-label="Name" aria-describedby="basic-addon-name" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-6">
                                                    <div class="mb-1">
                                                        <button class="btn btn-outline-danger text-nowrap px-1 btn-margin-top delete_btn" data-delete_id = "{{ $goalData->id }}" data-repeater-delete
                                                            type="button">
                                                            <i data-feather="x" class="me-25"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label fs-5" for="Description">Description</label>
                                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                            rows="5" name="goaldescription_en" id="goaldescription_en" > {{$goalData->fieldSingleValue('sub_goal_description','en')->value}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label fs-5" for="Description">وصف</label>
                                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                            name="goaldescription_ar" id="goaldescription_ar" rows="5">  {{$goalData->fieldSingleValue('sub_goal_description','ar')->value}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div data-repeater-item>
                                            <div class="row d-flex align-items-end">
                                                <div class="row">
                                                    <input type="hidden" name="sub_goal_id" id="sub_goal_id" >
                                                    <div class="col-md-4 col-12">
                                                        <label class="form-label fs-5" for="itemname">Heading</label>
                                                        <input type="text" class="form-control" id="goalheading_en"
                                                            aria-describedby="itemname" name="goalheading_en" placeholder="Heading"
                                                            name="option" />
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                                            <input type="text" id="goalheading_ar" name="goalheading_ar" class="form-control" placeholder="عنوان" aria-label="Name" aria-describedby="basic-addon-name" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label fs-5" for="Description">Description</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                rows="5" name="goaldescription_en" id="goaldescription_en" >
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label fs-5" for="Description">وصف</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                name="goaldescription_ar" id="goaldescription_ar" rows="5">
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-6 ">
                                                        <div class="mb-1">
                                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                                                type="button">
                                                                <i data-feather="x" class="me-25"></i>
                                                                <span>Delete</span>
                                                            </button>
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
                                                    <input type="hidden" name="sub_goal_id" id="sub_goal_id">
                                                        <label class="form-label fs-5" for="itemname">Heading</label>
                                                        <input type="text" class="form-control" id="goalheading_en"
                                                            aria-describedby="itemname" name="goalheading_en" placeholder="Heading"
                                                            name="option" />
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                                            <input type="text" id="goalheading_ar" name="goalheading_ar" class="form-control" placeholder="عنوان" aria-label="Name" aria-describedby="basic-addon-name" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label fs-5" for="Description">Description</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                rows="5" name="goaldescription_en" id="goaldescription_en" >
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label fs-5" for="Description">وصف</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                name="goaldescription_ar" id="goaldescription_ar" rows="5">
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-6 ">
                                                        <div class="mb-1">
                                                            <button class="btn btn-outline-danger text-nowrap px-1 " data-repeater-delete
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
                                            <span>Add New Goal</span>
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-6">
                                        <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                                            <i data-feather='save'></i> Save Goal
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

    </section>
</div>
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.typevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagecrop.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagesizevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.filesizevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/filepond.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/charts/apexcharts.min.js"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets') }}/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/jquery/jquery.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/repeater/jquery.repeater.min.js"></script>
@endsection

@section('custom-js')
<script>

$("#createGoal").repeater({
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
                    }
                });
            }
        });

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(document).on('submit','#updateGoalSection',function(e){
        e.preventDefault();
        let formData = new FormData(this); //used for image uploading
        $.ajax({
            type: "POST",
            url: "{{route('homepage.update.goalsection')}}" ,
            data: formData,
            dataType: "json",
            contentType: false, //used for image uploading
            processData: false, //used for image uploading
            beforeSend: function(){
                toastr.info("Please wait your data is updating");
            },
            success: function (response) {
                toastr.success('Data Updated Successfully.');
            },
        });
    });

    FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize,
            FilePondPluginImageValidateSize,
            FilePondPluginImageCrop,
        );

        FilePond.create(document.getElementById('attachment1'), {
            styleButtonRemoveItemPosition: 'right',
            imageCropAspectRatio: '1:1',
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
            maxFileSize: '1000KB',
            ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
            storeAsFile: true,
            allowMultiple: true,
            maxFiles: 1,
            required: true,
            checkValidity: true,
            credits: {
                label: '',
                url: ''
            },
            files: [
                    {
                        source: "{{asset('app-assets/images/goalsection')}}{{'/'.$goalSectionData['image_en']}}",


                    },
            ],
        });

    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
        FilePondPluginImageValidateSize,
        FilePondPluginImageCrop,
    );

        FilePond.create(document.getElementById('attachment2'), {
            styleButtonRemoveItemPosition: 'right',
            imageCropAspectRatio: '1:1',
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
            maxFileSize: '1000KB',
            ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
            storeAsFile: true,
            allowMultiple: true,
            maxFiles: 1,
            required: true,
            checkValidity: true,
            credits: {
                label: '',
                url: ''
            },
            files: [
                    {
                        source: "{{asset('app-assets/images/goalsection')}}{{'/'.$goalSectionData['image_ar']}}",


                    },
            ],
        });



</script>

@endsection
