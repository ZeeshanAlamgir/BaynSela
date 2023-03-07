{{-- {{dd($our_client->fieldSingleValue('client_heading_en','en'))}} --}}
@extends('app.layout.layout')

@section('page-title', 'Client Section')

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
        .filepond--drop-label {
            color: #7367F0 !important;
        }

        .filepond--item-panel {
            background-color: #7367F0;
        }

        .filepond--panel-root {
            background-color: #e3e0fd;
        }

        .filepond--item {
            width: calc(20% - 0.5em);
        }
    </style>
@endsection

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'our-number.index') }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Our Client Section</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('our-number.ourClientsView') }}
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
                            <h4 class="card-title">Our Client Section</h4>
                        </div>
                        <div class="card-body">
                            {{-- Form Start--}}
                            <form id="updateNumberClientSection" action="{{ route('our-numbers.updateOurNumberVlientSection.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name"> Heading </label>
                                        <input type="text" id="client_heading_en" class="form-control"
                                            name="client_heading_en" placeholder="Heading" aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $our_client ? $our_client->fieldSingleValue('client_heading','en')->value : '' }}" required />
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label class="form-label fs-5" for="basic-addon-name">  قصة العنوان </label>
                                        <input type="text" name="client_heading_ar" id="client_heading_ar"
                                            class="form-control" placeholder="قصة عنوان " aria-label="Name"
                                            aria-describedby="basic-addon-name" value="{{ $our_client ? $our_client->fieldSingleValue('client_heading','ar')->value : '' }}" required />
                                    </div>
                                </div>
                            <div class="row mb-2">
                                <div class="col-md-12 col-lg-12 col-12">
                                    <label class="form-label fs-5" for="Image">Image</label>
                                    <i>( .png, .jpg, .jpeg )</i>
                                    <input id="image" type="file" class="filepond @error('image') is-invalid @enderror"
                                        name="image[]" multiple accept="image/png, image/jpeg, image/jpg" />
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

                            </form>
                            {{-- @dd($our_partners) --}}
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

        // $(document).on('submit', '#updateNumberClientSection', function(e) {
        //     e.preventDefault();
        //     $('.update_button').hide();
        //     $('.updating_button').show();
        //     let formData = new FormData(this); //used for image uploading
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('our-numbers.updateOurNumberVlientSection.update') }}",
        //         data: formData,
        //         dataType: "json",
        //         contentType: false, //used for image uploading
        //         processData: false, //used for image uploading
        //         success: function(response) {
        //             toastr.success('Data Updated Successfully.');
        //             $('.update_button').show();
        //             $('.updating_button').hide();
        //         },
        //     });
        // });

                FilePond.registerPlugin(
                FilePondPluginImagePreview,
                FilePondPluginFileValidateType,
                FilePondPluginFileValidateSize,
                FilePondPluginImageValidateSize,
                FilePondPluginImageCrop,
            );

            // FilePond.create(document.getElementById('image'), {
            //     styleButtonRemoveItemPosition: 'right',
            //     imageCropAspectRatio: '1:0', //1:1
            //     acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
            //     maxFileSize: '3000KB',
            //     ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
            //     storeAsFile: false,
            //     server: {
            //         process: '/admin/save-file',
            //         revert: '/admin/revert-file',
            //         headers: {
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //         }
            //     },
            //     allowMultiple: true,
            //     // maxFiles: 15,//
            //     required: true,
            //     checkValidity: true,
            //     credits: {
            //         label: '',
            //         url: ''
            //     },
            //     files: [
                    
            //     @forelse ($our_client_images as $image)
            //     @php
            //         $image_path = public_path('app-assets/images/numbers/clients/' . '/' . $image->image);
            //     @endphp
            //     @if ('{{ File::exists($image_path) }}') 
            //         {
            //             source: "{{ asset('app-assets/images/numbers/clients/' . '/' . $image->image) }}",
            //         },
                
            //     @endif
            //         // {
            //         //     source: "{{ asset('app-assets/images/numbers/clients' . '/' . $image->image) }}",
            //         // },
            //     @empty
            //     @endforelse
            //     ],


            // });

            var files = [];

            @forelse ($our_client_images as $image)
                @php
                    $image_path = public_path('app-assets/images/numbers/clients/' . $image->image);
                @endphp
                if ('{{ File::exists($image_path) }}') {
                        files.push({
                            source: "{{ asset('app-assets/images/numbers/clients/' . $image->image) }}",
                        });
                }
            @empty
            @endforelse

            FilePond.create(document.getElementById('image'), {
                styleButtonRemoveItemPosition: 'right',
                imageCropAspectRatio: '1:0', //1:1
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                maxFileSize: '3000KB',
                ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                storeAsFile: false,
                server: {
                    process: '/admin/save-file',
                    revert: '/admin/revert-file',
                    headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                allowMultiple: true,
                // maxFiles: 15,//
                required: true,
                checkValidity: true,
                allowReorder: true,
                credits: {
                    label: '',
                    url: ''
                },
                files: files,


            });
        // $('#image').on('FilePond:processfiles', (function(file) {
        //     $('.update_button').attr('disabled', true);
        // }));

         $('#image').on('FilePond:processfiles', (function(file) {
            $('.update_button').attr('disabled', false);
        }));
        
        $('#image').on('FilePond:processfilestart', (function(file) {
            $('.update_button').attr('disabled', true);
        }));
</script>

@endsection
