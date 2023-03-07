@extends('app.layout.layout')

@section('page-title', 'Privacy Policy')

@section('page-vendor')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/charts/apexcharts.css">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/charts/chart-apex.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/filepond.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.css">
@endsection

@section('custom-css')
    <style>
        .customizer .customizer-toggle {
            display: none !important;
        }
    </style>

@endsection

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'privacy.privacysection') }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Update Privacy & Policy</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('privacy.privacysection') }}
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
                        <div class="card-body">
                            <form id="updatePrivacySection" action="{{ route('privacy.updateprivacysection.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6">
                                        <label class="form-label fs-5" for="basic-addon-name">Heading</label>
                                        <input type="text" id="heading" class="form-control" name="privacy_heading_en"
                                            placeholder="Heading" aria-label="Name" aria-describedby="basic-addon-name"
                                            value="{{ $privacyData['privacy_heading_en'] }}" required />
                                        <div class="invalid-feedback">Please enter heading.</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                        <input type="text" id="basic-addon-name" name="privacy_heading_ar"
                                            class="form-control" placeholder="عنوان" aria-label="Name"
                                            aria-describedby="basic-addon-name"
                                            value="{{ $privacyData['privacy_heading_ar'] }}" required />
                                        <div class="invalid-feedback">Please enter heading.</div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-12 col-md-12">
                                        <label class="form-label fs-5" for="Description">Description </label>
                                        <textarea class="tinymce-editor" rows="12" name="privacy_description_en"> {{ $privacyData['privacy_description_en'] }}
                                    </textarea>
                                        @error('description')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-12 col-md-12">
                                        <label class="form-label fs-5" for="Description">وصف</label>
                                        <textarea class="tinymce-editor" rows="12" name="privacy_description_ar"> {{ $privacyData['privacy_description_ar'] }}
                                    </textarea>
                                        @error('description')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="card-footer d-flex align-items-center justify-content-end">
                                        <button type="submit"
                                            class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                                            <i data-feather='save'></i> Update
                                        </button>
                                        <a href=""
                                            class="btn btn-relief-outline-danger waves-effect waves-float waves-light">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

@endsection


@section('custom-js')

<script type="text/javascript">
    tinymce.init({

        selector: 'textarea.tinymce-editor',

        height: 300,

        menubar: false,

        plugins: [

            'advlist autolink lists link image charmap print preview anchor',

            'searchreplace visualblocks code fullscreen',

            'insertdatetime media table paste code help wordcount', 'image'

        ],

        toolbar: 'undo redo | formatselect | ' +

            'bold italic backcolor | alignleft aligncenter ' +

            'alignright alignjustify | bullist numlist outdent indent | ' +

            'removeformat | help',

        content_css: '//www.tiny.cloud/css/codepen.min.css'

    });
</script>

<script>
//Add Extra
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

</script>
@endsection
