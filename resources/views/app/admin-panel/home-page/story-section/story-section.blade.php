@extends('app.layout.layout')

@section('page-title', 'Story')

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
        .customizer .customizer-toggle {
            display: none !important;
        }
    </style>
@endsection

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'homepage.storysection') }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Update Story Section</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('homepage.storysection') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content-body">
        <!-- Validation -->
        <section class="bs-validation">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Story Section</h4>
                        </div>
                        <div class="card-body">
                                    {{-- Form Start--}}

                                    <form id="updateStorySection" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label fs-5" for="basic-addon-name"> Story Heading </label>
                                                    <input type="text" id="story_heading_en" class="form-control"
                                                        name="story_heading_en" placeholder="Heading" aria-label="Name"
                                                        aria-describedby="basic-addon-name"
                                                        value="{{ $storyData['story_heading_en'] }}" required />
                                                    <div class="invalid-feedback">Please Enter Story Heading.</div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label fs-5" for="basic-addon-name">  قصة العنوان </label>
                                                    <input type="text" id="basic-addon-name" name="story_heading_ar"
                                                        class="form-control" placeholder="قصة عنوان " aria-label="Name"
                                                        aria-describedby="basic-addon-name"
                                                        value="{{ $storyData['story_heading_ar'] }}" required />
                                                    <div class="invalid-feedback">Please enter heading.</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label fs-5" for="basic-addon-name"> Story Description </label>
                                                    <input type="text" id="story_description_en" class="form-control"
                                                        name="story_description_en" placeholder="Heading" aria-label="Name"
                                                        aria-describedby="basic-addon-name"
                                                        value="{{ $storyData ? $storyData['story_description_en'] : '' }}" />
                                                    <div class="invalid-feedback">Please Enter Story Heading.</div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label fs-5" for="basic-addon-name">  قصة وصف </label>
                                                    <input type="text" id="basic-addon-name" name="story_description_ar"
                                                        class="form-control" placeholder="قصة عنوان " aria-label="Name"
                                                        aria-describedby="basic-addon-name"
                                                        value="{{ $storyData ? $storyData['story_description_ar'] : ''}}" />
                                                    <div class="invalid-feedback">Please enter heading.</div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label fs-5" for="basic-addon-name"> Happy Partners </label>
                                                    <input type="number" id="happy_partner" class="form-control"
                                                        name="happy_partner" placeholder="Heading" aria-label="Name"
                                                        aria-describedby="basic-addon-name"
                                                        value="{{ $storyData['happy_partner'] }}" required />
                                                    <div class="invalid-feedback">Please Enter Happy Partners.</div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label fs-5" for="basic-addon-name">  Successful Projects </label>
                                                    <input type="number" id="basic-addon-name" name="successful_projects"
                                                        class="form-control" placeholder="قصة عنوان " aria-label="Name"
                                                        aria-describedby="basic-addon-name"
                                                        value="{{ $storyData['successful_projects'] }}" required />
                                                    <div class="invalid-feedback">Please enter Successful Projects.</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label fs-5" for="basic-addon-name"> Total Investments </label>
                                                    <input type="number" id="total_investments" class="form-control"
                                                        name="total_investments" placeholder="Heading" aria-label="Name"
                                                        aria-describedby="basic-addon-name"
                                                        value="{{ $storyData['total_investments'] }}" required />
                                                    <div class="invalid-feedback">Please Enter Total Investments .</div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label fs-5" for="basic-addon-name">  Years of Experience </label>
                                                    <input type="number" id="basic-addon-name" name="year_of_exp"
                                                        class="form-control" placeholder="قصة عنوان " aria-label="Name"
                                                        aria-describedby="basic-addon-name"
                                                        value="{{ $storyData['year_of_exp'] }}" required />
                                                    <div class="invalid-feedback">Please enter Years of Experience .</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer d-flex align-items-center justify-content-end">
                                            <button type="submit"
                                                class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1 update_button">
                                                <i data-feather='save'></i> Update
                                            </button>
                                            <button class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1 updating_button" type="button" disabled>
                                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                <span class="ms-25 align-middle">Updating...</span>
                                            </button>
                                            <a href=""
                                                class="btn btn-relief-outline-danger waves-effect waves-float waves-light">
                                                <i data-feather='x'></i> Cancel
                                            </a>
                                        </div>
                                        </div>
                                    </form>

                                    {{-- Form End --}}
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
@endsection

@section('custom-js')
    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.updating_button').hide();
        });

        $(document).on('submit', '#updateStorySection', function(e) {
            e.preventDefault();
            // $('.update_button').hide();
            // $('.updating_button').show();
            let formData = new FormData(this); //used for image uploading
            $.ajax({
                type: "POST",
                url: "{{ route('homepage.update.story') }}",
                data: formData,
                dataType: "json",
                contentType: false, //used for image uploading
                processData: false, //used for image uploading
                success: function(response) {
                    toastr.success('Data Updated Successfully.');
                    // $('.update_button').show();
                    // $('.updating_button').hide();
                },
            });
        });

    </script>

@endsection
