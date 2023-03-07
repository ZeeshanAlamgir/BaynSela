@extends('app.layout.layout')

@section('page-title', 'About')

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
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'homepage.aboutsection') }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Update About Section</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('homepage.aboutsection') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content-body">
        <!-- Section Start-->
        <section class="bs-validation">

            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="updateAboutSection">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6">
                                            <label class="form-label fs-5" for="basic-addon-name"><strong> About Heading </strong></label>
                                            <input type="text" id="about_heading_en" class="form-control"
                                                name="about_heading_en" placeholder="Heading" aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                value="{{ $aboutData['about_heading_en'] }}" required />
                                            <div class="invalid-feedback">Please Enter About Heading.</div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                            <label class="form-label fs-5" for="basic-addon-name"> <strong> حول العنوان </strong></label>
                                            <input type="text" id="about_heading_ar" name="about_heading_ar"
                                                class="form-control" placeholder="حول عنوان " aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                value="{{ $aboutData['about_heading_ar'] }}" required />
                                            <div class="invalid-feedback">Please enter heading.</div>
                                    </div>
                                </div>

                                <div class="row mb-2">

                                    <div class="col-lg-6 col-md-6">
                                        <label class="form-label fs-5" for="Description"><strong> About Description</strong></label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="5"
                                            name="about_description_en" id="about_description_en"> {{ $aboutData ? $aboutData['about_description_en'] : '' }}
                                    </textarea>
                                        @error('description')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <label class="form-label fs-5" for="Description"><strong>  حول الوصف</strong> </label>
                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="5"
                                            name="about_description_ar" id="about_description_ar"> {{ $aboutData ? $aboutData['about_description_ar'] : ''}}
                                    </textarea>
                                        @error('description')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>

                                <div class="card-footer d-flex align-items-center justify-content-end">
                                    <button type="submit"
                                        class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                                        <i data-feather='save'></i> Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Reviews Start --}}
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><div class="card-title">Reviews</div></h4>
                        </div>
                        <div class="card-body" id="card_body">
                                    @isset($reviews)
                                        @foreach ($reviews as $key=>$review)
                                        <form id="" method="POST"  enctype="multipart/form-data" action="{{ route('homepage.review.update', ['id'=>$review->id]) }}">
                                            @csrf
                                            <div class="row">
                                            <div class="col-12 col-md-9">

                                                <div class="row mb-2">
                                                    <div class="col-md-6 col-12">
                                                        <label class="form-label fs-5" for="itemname">Heading</label>
                                                        <input type="text" class="form-control" id="review_heading_en"
                                                            aria-describedby="itemname" name="review_heading_en" placeholder="Heading"
                                                            name="option" value="{{ $review ? @$review->fieldSingleValue('review_heading','en')->value : ''}}"/>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                                            <input type="text" id="review_heading_ar" value="{{ $review ? $review->fieldSingleValue('review_heading','ar')->value : ''}}" name="review_heading_ar" class="form-control" placeholder="عنوان" aria-label="Name" aria-describedby="basic-addon-name" required />
                                                    </div>
                                                </div>


                                                <div class="row mb-2">
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="Description">Description</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                rows="13" name="review_description_en" id="review_description_en" > {{ $review ? $review->fieldSingleValue('review_description','en')->value : ''}}
                                                            </textarea>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="Description">وصف</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                name="review_description_ar" id="review_description_ar" rows="13"> {{ $review ? $review->fieldSingleValue('review_description','ar')->value : ''}}
                                                            </textarea>
                                                    </div>
                                                </div>


                                                <div class="row mb-2">
                                                    <div class="col-md-6 col-12">
                                                        <label class="form-label fs-5" for="itemname">Reviewer Name</label>
                                                        <input type="text" class="form-control" id="profile_name_en"
                                                            aria-describedby="itemname" name="profile_name_en" placeholder="Heading"
                                                            name="option" value="{{ $review ? $review->fieldSingleValue('profile_name','en')->value : ''}}"/>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="basic-addon-name">اسم المراجع</label>
                                                            <input type="text" id="profile_name_ar" value="{{ $review ? $review->fieldSingleValue('profile_name','ar')->value : '' }}" name="profile_name_ar" class="form-control" placeholder="عنوان" aria-label="Name" aria-describedby="basic-addon-name" required />
                                                    </div>
                                                </div>



                                                <div class="row mb-2">
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="Description">Reviewer Designation</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                rows="5" name="profile_designation_en" id="profile_designation_en" > {{$review ? $review->fieldSingleValue('profile_designation','en')->value : ''}}
                                                            </textarea>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="Description">تعيين المراجع</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                name="profile_designation_ar" id="profile_designation_ar" rows="5">  {{$review ? $review->fieldSingleValue('profile_designation','ar')->value : ''}}
                                                            </textarea>
                                                    </div>
                                                </div>



                                                <div class="row mb-2">
                                                    <div class="col-12 text-center">
                                                        <button
                                                            class="btn btn-relief-outline-danger text-nowrap px-1 btn-margin-top delete_btn me-1"
                                                            data-delete_id="{{ $review->id }}"
                                                            type="button">
                                                            <i data-feather="x" class="me-25"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                        <button
                                                            class="btn btn-relief-outline-success text-nowrap px-1 btn-margin-top update_btn"
                                                            type="submit">
                                                            <i data-feather="x" class="me-25"></i>
                                                            <span>Update</span>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label fs-5" for="Image">Image</label>
                                                <i>( .png, .jpg, .jpeg )</i><br>
                                                <i>Resolution (300 * 300)</i>
                                                <input id="attachment-{{ $review->id }}" type="file" class="filepond @error('image') is-invalid @enderror"
                                                    name="image"  name="image" multiple accept="image/png, image/jpeg, image/jpg" />
                                                @error('image')
                                                    <div class="invalid-tooltip">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>

                                        <hr class="mb-2">

                                        </form>

                                        @endforeach
                                    @endisset
                                </div>
                                <div class="card-footer pt-0" style="border-top: none">
                                    <div class="row">
                                        <div class="col-md-9 col-lg-9 col-6">
                                            <button class="btn btn-icon btn-relief-outline-primary" id="add_new" type="button">
                                                <i data-feather="plus" class="me-25"></i>
                                                <span>Add New Review</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Reviews End --}}
        </section>
            {{-- Section End --}}
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

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('submit', '#updateAboutSection', function(e) {
            e.preventDefault();
            let formData = $(this).serialize(); //used for image uploading
            $.ajax({
                type: "POST",
                url: "{{ route('homepage.update.about') }}",
                data: formData,
                dataType: "json",
                success: function(response) {
                    if(response.status==200)
                        toastr.success('Data Updated Successfully.');
                },
            });
        });


        $(document).on('click', '.delete_btn', function(){
            let id = $(this).data('delete_id');
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
                        $.ajax({
                        type: "GET",
                        url: "{{ route('homepage.review.delete') }}",
                        data: {
                            id:id
                        },
                        success: function(response) {
                            toastr.success('Data Deleted Successfully.');
                            location.reload(true)
                        },
                    });
                    }
                });
        });


        $(document).on('click', '#add_new', function(){
            $('#card_body').append(
                `<form  method="POST"  enctype="multipart/form-data" action="{{ route('homepage.review.store') }}">
                                            @csrf
                                            <div class="row">
                                            <div class="col-12 col-md-9">

                                                <div class="row mb-2">
                                                    <div class="col-md-6 col-12">
                                                        <label class="form-label fs-5" for="itemname">Heading</label>
                                                        <input type="text" class="form-control" id="review_heading_en"
                                                            aria-describedby="itemname" name="review_heading_en" placeholder="Heading"
                                                            name="option" value="" required/>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                                            <input type="text" id="review_heading_ar" value="" name="review_heading_ar" class="form-control" placeholder="عنوان" aria-label="Name" aria-describedby="basic-addon-name" required />
                                                    </div>
                                                </div>


                                                <div class="row mb-2">
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="Description">Description</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                rows="13" name="review_description_en" id="review_description_en" required >
                                                            </textarea>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="Description">وصف</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                name="review_description_ar" id="review_description_ar" rows="13" required>
                                                            </textarea>
                                                    </div>
                                                </div>


                                                <div class="row mb-2">
                                                    <div class="col-md-6 col-12">
                                                        <label class="form-label fs-5" for="itemname">Reviewer Name</label>
                                                        <input type="text" class="form-control" id="profile_name_en"
                                                            aria-describedby="itemname" name="profile_name_en" placeholder="Heading"
                                                            name="option" value="" required/>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="basic-addon-name">اسم المراجع</label>
                                                            <input type="text" id="profile_name_ar" value="" name="profile_name_ar" class="form-control" placeholder="عنوان" aria-label="Name" aria-describedby="basic-addon-name" required />
                                                    </div>
                                                </div>



                                                <div class="row mb-2">
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="Description">Reviewer Designation</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                rows="5" name="profile_designation_en" id="profile_designation_en" required>
                                                            </textarea>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                            <label class="form-label fs-5" for="Description">تعيين المراجع</label>
                                                            <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                                name="profile_designation_ar" id="profile_designation_ar" rows="5" required>
                                                            </textarea>
                                                    </div>
                                                </div>



                                                <div class="row mb-2">
                                                    <div class="col-12 text-center">
                                                        <button
                                                            class="btn btn-relief-outline-success text-nowrap px-1 btn-margin-top save_btn"
                                                            type="submit">
                                                            <span>Save</span>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-12 col-md-3">
                                                <label class="form-label fs-5" for="Image">Image</label>
                                                <i>( .png, .jpg, .jpeg )</i><br>
                                                <i>Resolution (300 * 300)</i>
                                                <input id="attachment" type="file" class="filepond @error('image') is-invalid @enderror"
                                                    name="image"  name="image" multiple accept="image/png, image/jpeg, image/jpg" />
                                                @error('image')
                                                    <div class="invalid-tooltip">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>

                                        <hr>

                                        </form>`
            );


        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize,
            FilePondPluginImageValidateSize,
            FilePondPluginImageCrop,
        );

        FilePond.create(document.getElementById('attachment'), {
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

        });

            $(this).hide();

        });


        @isset($reviews)
            @foreach ($reviews as $key => $review)
                FilePond.registerPlugin(
                    FilePondPluginImagePreview,
                    FilePondPluginFileValidateType,
                    FilePondPluginFileValidateSize,
                    FilePondPluginImageValidateSize,
                    FilePondPluginImageCrop,
                );

                FilePond.create(document.getElementById("attachment-{{ $review->id }}"), {
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
                    files: [{
                        source: "{{ asset('app-assets/images/reviews/') }}{{ '/' . $review->image }}",
                    }, ],
                });
            @endforeach
        @endisset

    </script>

@endsection
