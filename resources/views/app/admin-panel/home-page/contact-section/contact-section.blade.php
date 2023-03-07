@extends('app.layout.layout')

@section('page-title', 'Contacts')

@section('page-vendor')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/charts/apexcharts.css">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/charts/chart-apex.min.css">
@endsection

@section('custom-css')
    <style>
        .customizer .customizer-toggle {
            display: none !important;
        }
    </style>
@endsection

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'homepage.contactsection') }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Update Contact Section</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('homepage.contactsection') }}
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
                            <h4 class="card-title">Contact Section</h4>
                        </div>
                        <div class="card-body">
                            <form id="updateContactSection" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label fs-5" for="basic-addon-name"> Contact Heading </label>
                                            <input type="text" id="contact_heading_en" class="form-control"
                                                name="contact_heading_en" placeholder="Heading" aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                value="{{ $contactData['contact_heading_en'] }}" required />
                                            <div class="invalid-feedback">Please Enter Contact Heading.</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label fs-5" for="basic-addon-name"> اتصال العنوان</label>
                                            <input type="text" id="basic-addon-name" name="contact_heading_ar"
                                                class="form-control" placeholder="اتصال عنوان " aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                value="{{ $contactData['contact_heading_ar'] }}" required />
                                            <div class="invalid-feedback">Please Enter Contact Heading.</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label fs-5" for="basic-addon-name"> Contact Description </label>
                                            <input type="text" id="contact_description_en" class="form-control"
                                                name="contact_description_en" placeholder="Description" aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                value="{{ $contactData['contact_description_en'] }}" required />
                                            <div class="invalid-feedback">Please Enter Contact Description.</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label fs-5" for="basic-addon-name"> وصف العنوان </label>
                                            <input type="text" id="basic-addon-name" name="contact_description_ar"
                                                class="form-control" placeholder="وصف عنوان " aria-label="Name"
                                                aria-describedby="basic-addon-name"
                                                value="{{ $contactData['contact_description_ar'] }}" required />
                                            <div class="invalid-feedback">Please Enter Contact Description.</div>
                                        </div>
                                    </div>
                                </div>



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

        {{--  $(document).on("keyup","#heading",function() {
      var Text = $(this).val();
      Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
      Text = Text.toLowerCase();
      $("#slug").val(Text);
        if(Text.length==0)
            $('#slug').val('');
    });  --}}

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('submit', '#updateContactSection', function(e) {
            e.preventDefault();
            let formData = new FormData(this); //used for image uploading
            $.ajax({
                type: "POST",
                url: "{{ route('homepage.update.contact') }}",
                data: formData,
                dataType: "json",
                contentType: false, //used for image uploading
                processData: false, //used for image uploading
                success: function(response) {
                    toastr.success('Data Updated Successfully.');
                },
            });
        })
    </script>

@endsection
