@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'services.edit', $id) }}
@endsection

@section('page-title', 'Services')

@section('page-vendor')

@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/filepond.min.css">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.css">
@endsection

@section('custom-css')
<style>
            .filepond--drop-label {
            color: #7367F0 !important;
        }

        .filepond--item-panel {
            background-color: #7367F0;
        }

        .filepond--panel-root {
            background-color: #e3e0fd;
        }

        /* .filepond--item {
                                                    width: calc(20% - 0.5em);
                                                } */
</style>
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Edit Service</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('services.edit', $id) }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <form action="{{ route('services.update.new', ['id' => encryptParams($id)]) }}" method="POST" enctype="multipart/form-data">

            <div class="card-header">
            </div>

            <div class="card-body">

                @csrf

                {{ view('app.admin-panel.new-services.form-fields', ['data' => $data]) }}

            </div>

            <div class="card-footer d-flex align-items-center justify-content-end">
                <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                    <i data-feather='save'></i>
                    Update Service
                </button>
                <a href="{{ route('services.index.new') }}"
                    class="btn btn-relief-outline-danger waves-effect waves-float waves-light">
                    <i data-feather='x'></i>
                    Cancel
                </a>
            </div>

        </form>
    </div>

@endsection

@section('vendor-js')
<script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.js"></script>
<script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.typevalidation.min.js"></script>
<script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagecrop.min.js"></script>
<script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagesizevalidation.min.js"></script>
<script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.filesizevalidation.min.js"></script>
<script src="{{ asset('app-assets') }}/vendors/filepond/filepond.min.js"></script>
@endsection

@section('page-js')
@endsection

@section('custom-js')
    <script>

        let c_f_count = 0;
        $(document).ready(function(){
            FilePond.registerPlugin(
                    FilePondPluginImagePreview,
                    FilePondPluginFileValidateType,
                    FilePondPluginFileValidateSize,
                    FilePondPluginImageValidateSize,
                    FilePondPluginImageCrop,
                );

                FilePond.create(document.getElementById("attachment"), {
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
                                source: "{{ asset('app-assets/images/services' . '/' . $data['service']->image) }}",
                            },
                        ],
                });
        });

        $(document).on('click', '#add_new_filter', function(){

            $('#custom_filters_div').append(
                `<div class="row">
                    <div class="row mb-1">
                        <div class="col-md-6 col-12 ">
                            <label class="form-label fs-5" for="itemname">Label</label>
                            <input type="text" class="form-control" id="label_en"
                                aria-describedby="itemname" name="label_en[]"
                                placeholder="Label"
                                value="" required />
                        </div>
                        <div class="col-md-6 col-12 ">
                            <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                            <input type="text" id="label_ar"
                                value=""
                                name="label_ar[]" class="form-control" placeholder="ضع الكلمة المناسبة"
                                aria-describedby="basic-addon-name" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h4>Values:</h4>
                        </div>
                        <div class="col-12 col-md-6 text-end">
                            <button class="btn btn-icon btn-relief-outline-primary add_new_filter_value" type="button" data-count="${c_f_count}">
                                <span>Add New Value</span>
                           </button>
                        </div>
                    </div>

                    <div class="row" id="new_filter_values_div_${c_f_count}">
                        <div class="row mb-1">
                            <div class="col-md-5 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">Label</label>
                                <input type="text" class="form-control" id="value_label_en"
                                    aria-describedby="itemname" name="value_label_en_${c_f_count}[]"
                                    placeholder="Label"
                                    value="" required />
                            </div>
                            <div class="col-md-5 col-12 mb-1">
                                <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                                <input type="text" id="value_label_ar"
                                    value=""
                                    name="value_label_ar_${c_f_count}[]" class="form-control" placeholder="ضع الكلمة المناسبة"
                                    aria-describedby="basic-addon-name" required />
                            </div>
                            <div class="col-md-2 col-12 mb-1">

                                <button class=" mt-2 btn btn-icon btn-relief-outline-danger custom_filter_value_delete_btn" type="button">
                                    <span>Remove Value</span>
                            </button>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-1 ">
                        <div class="col-12 ">
                            <button class="btn btn-icon btn-relief-outline-danger custom_filter_delete_btn" type="button">
                                <span>Remove Filter</span>
                           </button>
                        </div>
                    </div>

                    <hr/>
                </div>`

            );
            c_f_count++;
        });

        $(document).on('click', '.custom_filter_delete_btn', function(){
            $(this).parent().parent().parent().remove();
            c_f_count--;
        });

        $(document).on('click', '.add_new_filter_value', function(){
            let count = $(this).data('count');
            $('#new_filter_values_div_'+count).append(
                `<div class="row mb-1">
                            <div class="col-md-5 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">Label</label>
                                <input type="text" class="form-control" id="value_label_en"
                                    aria-describedby="itemname" name="value_label_en_${count}[]"
                                    placeholder="Label"
                                    value="" required />
                            </div>
                            <div class="col-md-5 col-12 mb-1">
                                <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                                <input type="text" id="value_label_ar"
                                    value=""
                                    name="value_label_ar_${count}[]" class="form-control" placeholder="ضع الكلمة المناسبة"
                                    aria-describedby="basic-addon-name" required />
                            </div>
                            <div class="col-md-2 col-12 mb-1">

                                <button class=" mt-2 btn btn-icon btn-relief-outline-danger custom_filter_value_delete_btn" type="button">
                                    <span>Remove Value</span>
                                </button>
                            </div>
                        </div>`
            );
        });

        $(document).on('click', '.custom_filter_value_delete_btn', function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click', '.add_old_filter_value', function(){
            let id = $(this).data('count');
            $('#old_filter_values_div_'+id).append(
                `<div class="row mb-1">
                    <div class="col-md-5 col-12 mb-1">
                        <label class="form-label fs-5" for="itemname">Label</label>
                        <input type="text" class="form-control" id="value_label_en"
                            aria-describedby="itemname" name="old_value_new_label_en_${id}[]"
                            placeholder="Label"
                            value="" required />
                    </div>
                    <div class="col-md-5 col-12 mb-1">
                        <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                        <input type="text" id="value_label_ar"
                            value=""
                            name="old_value_new_label_ar_${id}[]" class="form-control" placeholder="ضع الكلمة المناسبة"
                            aria-describedby="basic-addon-name" required />
                    </div>
                    <div class="col-md-2 col-12 mb-1">

                        <button class=" mt-2 btn btn-icon btn-relief-outline-danger custom_filter_value_delete_btn" type="button">
                            <span>Remove Value</span>
                    </button>
                    </div>
                </div>`
            );
        });

    </script>
@endsection
