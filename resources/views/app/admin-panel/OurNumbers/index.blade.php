{{-- {{dd($number_section->fieldSingleValue('number_wwr_heading_en','en'))}} --}}
@extends('app.layout.layout')

@section('page-title', 'Banner Section')

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
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'our-number-banner.index') }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Banner Section</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('our-number-banner.index') }}
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
                            {{-- Form Start--}}
                            <form id="updateNumberBannerSection" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name"> Heading </label>
                                        <input type="text" id="number_heading_en" class="form-control"
                                            name="number_heading_en" placeholder="Heading" aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $number_section->fieldSingleValue('number_heading','en')->value }}" required />
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name">  قصة العنوان </label>
                                        <input type="text" name="number_heading_ar" id="number_heading_ar"
                                            class="form-control" placeholder="قصة عنوان " aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $number_section->fieldSingleValue('number_heading','ar')->value }}" required />
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name"> Description </label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="12"
                                            name="number_description_en" id="number_description_en"> {{ $number_section->fieldSingleValue('number_description','en')->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name">  وصف </label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="12"
                                            name="number_description_ar" id="number_description_ar"> {{ $number_section->fieldSingleValue('number_description','ar')->value }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-12 col-lg-12 col-12">
                                        <label class="form-label fs-5" for="Image">Image</label>
                                        <i>( .png, .jpg, .jpeg )</i>
                                        <input id="banner_image" type="file" class="filepond @error('image') is-invalid @enderror"
                                            name="banner_image" multiple accept="image/png, image/jpeg, image/jpg" />
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name"> Who we are </label>
                                        <input type="text" id="number_wwr_heading_en" class="form-control"
                                            name="number_wwr_heading_en" placeholder="Who we are" aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $number_section->fieldSingleValue('number_wwr_heading','en')->value }}" required />
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name"> من نحن </label>
                                        <input type="text" id="number_wwr_heading_ar" class="form-control"
                                            name="number_wwr_heading_ar" placeholder="من نحن" aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $number_section->fieldSingleValue('number_wwr_heading','ar')->value }}" required   />
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name"> Who we are Description </label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="12"
                                            name="number_wwr_description_en" id="number_wwr_description_en"> {{ $number_section->fieldSingleValue('number_wwr_description','en')->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name">من نحن وصف </label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="12"
                                            name="number_wwr_description_ar" id="number_wwr_description_ar"> {{ $number_section->fieldSingleValue('number_wwr_description','ar')->value }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-12 mb-2">
                                        <label class="form-label fs-5" for="basic-addon-name"> What we do </label>
                                        <input type="text" id="number_wwd_heading_en" class="form-control"
                                            name="number_wwd_heading_en" placeholder="Who we do" aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $number_section->fieldSingleValue('number_wwd_heading','en')->value }}" required />
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-12 mb-2">
                                        <label class="form-label fs-5" for="basic-addon-name"> الذي نفعله</label>
                                        <input type="text" id="number_wwd_heading_ar" class="form-control"
                                            name="number_wwd_heading_ar" placeholder="الذي نفعله" aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $number_section->fieldSingleValue('number_wwd_heading','ar')->value }}" required />
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6 col-12 mb-2">
                                        <label class="form-label fs-5" for="basic-addon-name"> Who we do Description </label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="12"
                                            name="number_wwd_description_en" id="number_wwd_description_en">{{ $number_section->fieldSingleValue('number_wwd_description','en')->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 mb-2">
                                        <label class="form-label fs-5" for="basic-addon-name">الذي نفعله وصف </label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="12"
                                            name="number_wwd_description_ar" id="number_wwd_description_ar"> {{ $number_section->fieldSingleValue('number_wwd_description','ar')->value }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-6 col-12 mb-2">
                                        <label class="form-label fs-5" for="basic-addon-name"> Our valuable partnerships Heading </label>
                                        <input type="text" id="number_ovp_heading_en" class="form-control"
                                            name="number_ovp_heading_en" placeholder="Our valuable partnerships Heading" aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $number_section->fieldSingleValue('number_ovp_heading','en')->value }}" required />
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-12 mb-2">
                                        <label class="form-label fs-5" for="basic-addon-name"> شراكاتنا القيمة</label>
                                        <input type="text" id="number_ovp_heading_ar" class="form-control"
                                            name="number_ovp_heading_ar" placeholder="شراكاتنا القيمة" aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $number_section->fieldSingleValue('number_ovp_heading','ar')->value }}" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 mb-2">
                                        <label class="form-label fs-5" for="basic-addon-name"> Our valuable partnerships Description </label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="12"
                                            name="number_ovp_description_en" id="number_ovp_description_en"> {{ $number_section->fieldSingleValue('number_ovp_description','en')->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 mb-2">
                                        <label class="form-label fs-5" for="basic-addon-name">الذي نفعله وصف </label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="12"
                                            name="number_ovp_description_ar" id="number_ovp_description_ar"> {{ $number_section->fieldSingleValue('number_ovp_description','ar')->value }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6 col-lg-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name"> Massive opportunities Heading </label>
                                        <input type="text" id="number_mo_heading_en" class="form-control"
                                            name="number_mo_heading_en" placeholder="Massive opportunities Heading" aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $number_section->fieldSingleValue('number_mo_heading','en')->value }}" required />
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name"> فرص هائلة تتجه </label>
                                        <input type="text" id="number_mo_heading_ar" class="form-control"
                                            name="number_mo_heading_ar" placeholder="فرص هائلة تتجه " aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $number_section->fieldSingleValue('number_mo_heading','ar')->value }}" required />
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name"> Massive opportunities Description </label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="12"
                                            name="number_mo_description_en" id="number_mo_description_en"> {{ $number_section->fieldSingleValue('number_mo_description','en')->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name"> وصف الفرص الهائلة </label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="12"
                                            name="number_mo_description_ar" id="number_mo_description_ar"> {{ $number_section->fieldSingleValue('number_mo_description','ar')->value }}
                                        </textarea>
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

        $(document).ready(function() {
            $('.updating_button').hide();
        });

        $(document).on('submit', '#updateNumberBannerSection', function(e) {
            e.preventDefault();
            $('.update_button').hide();
            $('.updating_button').show();
            let formData = new FormData(this); //used for image uploading
            $.ajax({
                type: "POST",
                url: "{{ route('our-numbers.numberBannerSection.update') }}",
                data: formData,
                dataType: "json",
                contentType: false, //used for image uploading
                processData: false, //used for image uploading
                success: function(response) {
                    toastr.success('Data Updated Successfully.');
                    $('.update_button').show();
                    $('.updating_button').hide();
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

        FilePond.create(document.getElementById('banner_image'), {
            styleButtonRemoveItemPosition: 'right',
            imageCropAspectRatio: '1:0', //1:1
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
            files: [{
                source: "{{ asset('app-assets/images/numbers/banner/') }}{{ '/' . $number_section->number_banner_section_image }}",
            }, ],
        });
</script>

@endsection
