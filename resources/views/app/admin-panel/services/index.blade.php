@extends('app.layout.layout')

@section('page-title', 'Dashboard')

@section('page-vendor')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/pickers/flatpickr/flatpickr.min.css">
    @endsection

    @section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/charts/chart-apex.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/filepond.min.css">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.css">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets') }}/css/plugins/forms/pickers/form-flat-pickr.min.css">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets') }}/css/plugins/forms/pickers/form-pickadate.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('app-assets/imagemaptool/css/image-map-pro.min.css') }}"> --}}

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

        /* .filepond--item {
                                                    width: calc(20% - 0.5em);
                                                } */
    </style>

@endsection

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'services.index') }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Services</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('services.index') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content-body">
        <!-- Validation -->
        <section class="bs-validation" id="main_section">
                            {{-- @csrf --}}
                            @isset($services)
                                @foreach ($services as $key => $service)
                                <div class="accordion accordion-margin" id="accordionDiv_{{ $service->id }}">

                                    {{ view('app.admin-panel.services.service-accordian-item')->with('service', $service) }}

                                    {{ view('app.admin-panel.services.event-accordian-item')->with('service', $service) }}

                                </div>
                                @endforeach
                            @endisset
                            <div class="card-footer" style="border-top: none">
                                <div class="row">
                                    <div class="col-md-9 col-lg-9 col-6">
                                        <button class="btn btn-icon btn-relief-outline-primary" id="add_new" type="button"
                                            data-repeater-create>
                                            <i data-feather="plus" class="me-25"></i>
                                            <span>Add New Service</span>
                                        </button>
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
    <script src="{{ asset('app-assets') }}/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    @endsection

    @section('page-js')
    <script src="{{ asset('app-assets') }}/js/scripts/forms/pickers/form-pickers.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    {{-- <script src="{{ asset('app-assets') }}/js/scripts/jquery/jquery.min.js"></script> --}}
    <script src="{{ asset('app-assets') }}/js/scripts/repeater/jquery.repeater.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    {{-- <script src="{{ asset('app-assets/imagemaptool/js/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('app-assets/imagemaptool/js/image-map-pro.min.js') }}"></script> --}}

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

        $(document).on('click', '.u_e_remove_imagemap', function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click', '.u_e_remove_number', function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click', '.u_e_add_new_imagemap', function(){
            let id = $(this).data('event_id');
            $('#u_e_imagemaps_div_'+id).append(
                `<div class="row mb-2">
                    <div class="col-md-6 col-12 mb-1">
                    <label class="form-label fs-5" for="itemname">Script</label>
                    <textarea class="form-control form-control-lg "
                        rows="5" name="new_scripts[]" placeholder="Place Script here..."  required ></textarea>
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <button class="btn btn-icon btn-relief-outline-danger u_e_remove_imagemap mt-2"   type="button">
                    <span>Remove Image Map</span>
                                </button>
                            </div>
                </div>`
            );
        });

        $(document).on('click', '.u_e_add_new_number', function(){
            let id = $(this).data('event_id');
            $('#u_e_numbers_div_'+id).append(
                `<div class="row mb-2">
                    <div class="col-md-6 col-12">
                        <label class="form-label fs-5" for="itemname">Number</label>
                        <input type="text" class="form-control"
                            aria-describedby="itemname" name="new_number[]"
                            placeholder="Number"
                            value="" required />
                    </div>
                    <div class="col-md-6 col-12">
                        <label class="form-label fs-5" for="itemname">Label</label>
                        <input type="text" class="form-control"
                            aria-describedby="itemname" name="new_label_en[]"
                            placeholder="Label"
                            value="" required />
                    </div>
                    <div class="col-md-6 col-12">
                        <label class="form-label fs-5" for="itemname">مُلصَق</label>
                        <input type="text" class="form-control"
                            aria-describedby="itemname" name="new_label_ar[]"
                            placeholder="مُلصَق"
                            value="" required />
                    </div>
                    <div class="col-md-6 col-12">
                        <button class="btn btn-icon btn-relief-outline-danger mt-2 u_e_remove_number"   type="button"
                            >
                            <span>Remove</span>
                        </button>
                    </div>
                </div>`
            );
        });

        $(document).on('click', '.add_new_number', function(){
            let id = $(this).data('service_id');

            $('#numbers_div_'+id).append(
                `<div class="row mb-2">
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-5" for="itemname">Number</label>
                                <input type="text" class="form-control" id="number[]"
                                    aria-describedby="itemname" name="number[]"
                                    placeholder="Number"
                                    value="" required />
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-5" for="itemname">Label</label>
                                <input type="text" class="form-control" id="label_en[]"
                                    aria-describedby="itemname" name="label_en[]"
                                    placeholder="Label"
                                    value="" required />
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-5" for="itemname">مُلصَق</label>
                                <input type="text" class="form-control" id="label_ar[]"
                                    aria-describedby="itemname" name="label_ar[]"
                                    placeholder="مُلصَق"
                                    value="" required />
                            </div>
                            <div class="col-md-6 col-12">
                                <button class="btn btn-icon btn-relief-outline-danger mt-2 remove_new_number"   type="button"
                                    >
                                    <span>Remove</span>
                                </button>
                            </div>
                        </div>`
            );
        });

        $(document).on('click', '.u_e_remove_partnership', function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click', '.u_e_add_new_partnership', function(){
            let id = $(this).data('event_id');
            let i = $(this).data('item');
            $('#u_e_partnership_div_'+id).append(
                `<div class="row mb-2">
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">Title</label>
                                <input type="text" class="form-control"
                                    aria-describedby="itemname" name="new_partnership_title_en[]"
                                    placeholder="Title"
                                    value="" required />
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">عنوان</label>
                                <input type="text" class="form-control"
                                    aria-describedby="itemname" name="new_partnership_title_ar[]"
                                    placeholder="عنوان"
                                    value="" required />
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">Description</label>
                                    <textarea class="form-control form-control-lg "
                                        rows="5" name="new_partnership_description_en[]" placeholder="Description"  required ></textarea>
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">وصف</label>
                                    <textarea class="form-control form-control-lg "
                                        rows="5" name="new_partnership_description_ar[]" placeholder="وصف"  required ></textarea>
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">Popup Description</label>
                                    <textarea class="form-control form-control-lg "
                                        rows="5" name="new_popup_description_en[]" placeholder="Popup Description"  required ></textarea>
                            </div>
                            <div class="col-md-6 col-12 mb-2">
                                <label class="form-label fs-5" for="itemname">وصف منبثق</label>
                                    <textarea class="form-control form-control-lg "
                                        rows="5" name="new_popup_description_ar[]" placeholder="وصف منبثق"  required ></textarea>
                            </div>
                            <div class="col-12 mb-1">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <h3>Items:</h3>
                                    </div>
                                    <div class="col-12 col-md-6 text-end">
                                        <button class="btn btn-icon btn-relief-outline-primary add_new_item" data-item="${i}" type="button"
                                            >
                                            <span>Add New Item</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 mb-1 new_items_div">

                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <button class="btn btn-icon btn-relief-outline-danger u_e_remove_partnership"   type="button"
                                    >
                                    <span>Remove Partnership</span>
                                </button>
                            </div>
                        </div>`
            );
            $(this).data('item' , ++i);

        });

        $(document).on('click', '.add_new_partnership', function(){

            let id = $(this).data('service_id');
            let i = $(this).data('item');

            $('#partnership_div_'+id).append(
                `<div class="row mb-2">
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">Title</label>
                                <input type="text" class="form-control"
                                    aria-describedby="itemname" name="partnership_title_en[]"
                                    placeholder="Title"
                                    value="" required />
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">عنوان</label>
                                <input type="text" class="form-control"
                                    aria-describedby="itemname" name="partnership_title_ar[]"
                                    placeholder="عنوان"
                                    value="" required />
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">Description</label>
                                    <textarea class="form-control form-control-lg "
                                        rows="5" name="partnership_description_en[]" placeholder="Description"  required ></textarea>
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">وصف</label>
                                    <textarea class="form-control form-control-lg "
                                        rows="5" name="partnership_description_ar[]" placeholder="وصف"  required ></textarea>
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">Popup Description</label>
                                    <textarea class="form-control form-control-lg "
                                        rows="5" name="popup_description_en[]" placeholder="Popup Description"  required ></textarea>
                            </div>
                            <div class="col-md-6 col-12 mb-2">
                                <label class="form-label fs-5" for="itemname">وصف منبثق</label>
                                    <textarea class="form-control form-control-lg "
                                        rows="5" name="popup_description_ar[]" placeholder="وصف منبثق"  required ></textarea>
                            </div>
                            <div class="col-12 mb-1">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <h3>Items:</h3>
                                    </div>
                                    <div class="col-12 col-md-6 text-end">
                                        <button class="btn btn-icon btn-relief-outline-primary add_new_item" data-item="${i}" type="button"
                                            >
                                            <span>Add New Item</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 mb-1 new_items_div">

                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <button class="btn btn-icon btn-relief-outline-danger remove_new_partnership"   type="button"
                                    >
                                    <span>Remove Partnership</span>
                                </button>
                            </div>
                        </div>`
            );
            $(this).data('item' , ++i);
        });

        $(document).on('click', '.add_new_imagemap', function(){

        let id = $(this).data('service_id');
        let i = $(this).data('item');

        $('#imagemaps_div_'+id).append(
            `<div class="row mb-2">
                        <div class="col-md-6 col-12 mb-1">
                            <label class="form-label fs-5" for="itemname">Script</label>
                                <textarea class="form-control form-control-lg "
                                    rows="5" name="scripts[]" placeholder="Place Script here..."  required ></textarea>
                        </div>
                        <div class="col-md-6 col-12 mb-1">
                            <button class="btn btn-icon btn-relief-outline-danger remove_new_imagemap mt-2"   type="button"
                                >
                                <span>Remove Image Map</span>
                            </button>
                        </div>
                    </div>`
        );
        $(this).data('item' , ++i);
        });

        $(document).on('click', '.u_e_add_new_item', function(){
            let id = $(this).data('partnership_id');
            $('#u_e_items_div_'+id).append(
                `<div class="row mb-1">
                    <div class="col-md-6 col-12 mb-1">
                        <label class="form-label fs-5" for="itemname">Title</label>
                        <input type="text" class="form-control"
                            aria-describedby="itemname" name="new_item_title_en_${id}[]"
                            placeholder="Title" required />
                    </div>
                    <div class="col-md-6 col-12 mb-1">
                        <label class="form-label fs-5" for="itemname">عنوان</label>
                        <input type="text" class="form-control"
                            aria-describedby="itemname" name="new_item_title_ar_${id}[]"
                            placeholder="عنوان" required />
                    </div>
                    <div class="col-md-6 col-12 mb-1">
                        <label class="form-label fs-5" for="itemname">Description</label>
                            <textarea class="form-control form-control-lg "
                        rows="5" name="new_item_description_en_${id}[]" placeholder="Description"  required ></textarea>
                    </div>
                    <div class="col-md-6 col-12 mb-1">
                        <label class="form-label fs-5" for="itemname">وصف</label>
                            <textarea class="form-control form-control-lg "
                        rows="5" name="new_item_description_ar_${id}[]" placeholder="وصف"  required ></textarea>
                    </div>
                </div>`
            );
        });

        $(document).on('click', '.add_new_item', function(){
            let i = $(this).data('item');
            let element = $(this).parent().parent().parent().parent().children('.new_items_div');
            element.append(
                `<div class="row mb-1">
                                <div class="col-md-6 col-12 mb-1">
                                    <label class="form-label fs-5" for="itemname">Title</label>
                                    <input type="text" class="form-control"
                                        aria-describedby="itemname" name="item_title_en_${i}[]"
                                        placeholder="Title"
                                        value="" required />
                                </div>
                                <div class="col-md-6 col-12 mb-1">
                                    <label class="form-label fs-5" for="itemname">عنوان</label>
                                    <input type="text" class="form-control"
                                        aria-describedby="itemname" name="item_title_ar_${i}[]"
                                        placeholder="عنوان"
                                        value="" required />
                                </div>
                                <div class="col-md-6 col-12 mb-1">
                                    <label class="form-label fs-5" for="itemname">Description</label>
                                        <textarea class="form-control form-control-lg "
                                            rows="5" name="item_description_en_${i}[]" placeholder="Description"  required ></textarea>
                                </div>
                                <div class="col-md-6 col-12 mb-1">
                                    <label class="form-label fs-5" for="itemname">وصف</label>
                                        <textarea class="form-control form-control-lg "
                                            rows="5" name="item_description_ar_${i}[]" placeholder="وصف"  required ></textarea>
                                </div>
                            </div>`
            );

        });

        $(document).on('click', '.remove_new_number', function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click', '.remove_new_partnership', function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click', '.remove_new_imagemap', function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click', '.cancel_new_event', function(){
            let id = $(this).data('service_id');
            $('#add_event_form_'+id).addClass('d-none');
            $('#add_new_event_'+id).show();
        });

        $(document).on('click', '.add_new_event', function(){
            let id = $(this).data('service_id');
            $('#add_event_form_'+id).removeClass('d-none');
            $(this).hide();
        });

        $(document).on('click', '.add_new_value', function(){
           let id = $(this).data('filter_id');
           $(".old_values_div_"+id).append(
            `<div class="row mb-1">
                <input type="hidden" name="filter_ids_new_values[]" value="${id}" />
                <div class="col-md-6 col-12 mb-1">
                    <label class="form-label fs-5" for="itemname">Label</label>
                    <input type="text" class="form-control" id="label_en"
                    aria-describedby="itemname" name="new_value_label_en[]"
                    placeholder="Label"
                    value=""
                    required />
                </div>
                <div class="col-md-6 col-12 mb-1">
                    <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                    <input type="text" id="label_ar"
                    value=""
                    name="new_value_label_ar[]" class="form-control" placeholder="ضع الكلمة المناسبة"
                    aria-describedby="basic-addon-name" required />
                </div>
            </div>`
           );
        });

        $(document).on('click', '.add_new_filter', function(){
            let id = $(this).data('service_id');
            $("#filters_div_"+id).append(
                `<form method="POST" action="{{ route('services.filter.store') }}">
                @csrf
                <div class="row mb-2">

                    <input type="hidden" name="id" value="${id}" />

                    <div class="row mb-1">
                        <div class="col-md-6 col-12 ">
                            <label class="form-label fs-5" for="itemname">Label</label>
                            <input type="text" class="form-control" id="label_en"
                                aria-describedby="itemname" name="label_en"
                                placeholder="Label"
                                value="" required />
                        </div>
                        <div class="col-md-6 col-12 ">
                            <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                            <input type="text" id="label_ar"
                                value=""
                                name="label_ar" class="form-control" placeholder="ضع الكلمة المناسبة"
                                aria-describedby="basic-addon-name" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h4>Values:</h4>
                        </div>
                        <div class="col-12 col-md-6 text-end">
                            <button class="btn btn-icon btn-relief-outline-primary add_new_filter_value" data-id="${id}"  type="button">
                                <span>Add New Value</span>
                           </button>
                        </div>
                    </div>

                    <div class="row" id="new_filter_values_div_${id}">
                        <div class="row mb-1">
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">Label</label>
                                <input type="text" class="form-control" id="value_label_en"
                                    aria-describedby="itemname" name="value_label_en[]"
                                    placeholder="Label"
                                    value="" required />
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                                <input type="text" id="value_label_ar"
                                    value=""
                                    name="value_label_ar[]" class="form-control" placeholder="ضع الكلمة المناسبة"
                                    aria-describedby="basic-addon-name" required />
                            </div>
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

                    <hr />
                    </div>
                    </form>`
            );

            $(this).hide();
        });

        $(document).on('click', '.add_new_filter_value', function(){
            let id = $(this).data('id');
            $('#new_filter_values_div_'+id).append(
                        `<div class="row mb-1">
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="itemname">Label</label>
                                <input type="text" class="form-control" id="value_label_en"
                                    aria-describedby="itemname" name="value_label_en[]"
                                    placeholder="Label"
                                    value="" required />
                            </div>
                            <div class="col-md-6 col-12 mb-1">
                                <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                                <input type="text" id="value_label_ar"
                                    value=""
                                    name="value_label_ar[]" class="form-control" placeholder="ضع الكلمة المناسبة"
                                    aria-describedby="basic-addon-name" required />
                            </div>
                        </div>`
            );
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
                        url: "{{ route('services.delete') }}",
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

        $(document).on('click', '.filter_delete_btn', function(){
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
                        url: "{{ route('services.filter.delete') }}",
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

            $('#main_section').append(
                `<form method="POST" action="{{ route('services.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-md-9">
                                                <div class="row mb-2">
                                                    <div class="col-md-6 col-12">
                                                        <label class="form-label fs-5" for="itemname">Heading</label>
                                                        <input type="text" class="form-control" id="service_heading_en"
                                                            aria-describedby="itemname" name="service_heading_en"
                                                            placeholder="Heading" required />
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                                        <input type="text" id="service_heading_ar"
                                                            name="service_heading_ar" class="form-control" placeholder="عنوان"
                                                            aria-label="Name" aria-describedby="basic-addon-name" required />
                                                    </div>
                                                </div>
                                                <div class="row mb-2">

                                                    <div class="col-md-6 col-12">
                                                        <label class="form-label fs-5" for="Description">Description</label>
                                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="5"
                                                            name="service_description_en" id="service_description_en">
                                                        </textarea>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label class="form-label fs-5" for="Description">وصف</label>
                                                        <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                            name="service_description_ar" id="service_description_ar" rows="5">
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
                                                <i>Resolution (1024 * 765)</i>
                                                <input id="attachment" type="file"
                                                    class="filepond @error('image') is-invalid
                                                    @enderror" name="image"
                                                    multiple accept="image/png, image/jpeg, image/jpg" />
                                                @error('image')
                                                    <div class="invalid-tooltip">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <hr />
                                        </form>`
            );

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
                });

            $(this).hide();
        });

        @isset($services)
            @foreach ($services as $key => $service)

                FilePond.registerPlugin(
                    FilePondPluginImagePreview,
                    FilePondPluginFileValidateType,
                    FilePondPluginFileValidateSize,
                    FilePondPluginImageValidateSize,
                    FilePondPluginImageCrop,
                );

                FilePond.create(document.getElementById("attachment-{{ $service->id }}"), {
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
                        source: "{{ asset('app-assets/images/services/') }}{{ '/' . $service->image }}",
                    }, ],
                });

                FilePond.registerPlugin(
                    FilePondPluginImagePreview,
                    FilePondPluginFileValidateType,
                    FilePondPluginFileValidateSize,
                    FilePondPluginImageValidateSize,
                    FilePondPluginImageCrop,
                );

                FilePond.create(document.getElementById("logo-{{ $service->id }}"), {
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


                FilePond.registerPlugin(
                    FilePondPluginImagePreview,
                    FilePondPluginFileValidateType,
                    FilePondPluginFileValidateSize,
                    FilePondPluginImageValidateSize,
                    FilePondPluginImageCrop,
                );

                FilePond.create(document.getElementById("gallery-{{ $service->id }}"), {
                    styleButtonRemoveItemPosition: 'right',
                    imageCropAspectRatio: '1:1',
                    acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                    maxFileSize: '1000KB',
                    ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                    storeAsFile: true,
                    allowMultiple: true,
                    maxFiles: 10,
                    required: true,
                    checkValidity: true,
                    credits: {
                        label: '',
                        url: ''
                    },
                });

                @foreach ($service->events as $event)

                    FilePond.registerPlugin(
                        FilePondPluginImagePreview,
                        FilePondPluginFileValidateType,
                        FilePondPluginFileValidateSize,
                        FilePondPluginImageValidateSize,
                        FilePondPluginImageCrop,
                    );

                    FilePond.create(document.getElementById("update-logo-{{ $event->id }}"), {
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
                            source: "{{ asset('app-assets/images/services/events/logo') }}{{ '/' . $event->logo }}",
                        }, ],
                    });

                    FilePond.registerPlugin(
                        FilePondPluginImagePreview,
                        FilePondPluginFileValidateType,
                        FilePondPluginFileValidateSize,
                        FilePondPluginImageValidateSize,
                        FilePondPluginImageCrop,
                    );

                    FilePond.create(document.getElementById("update-gallery-{{ $event->id }}"), {
                        styleButtonRemoveItemPosition: 'right',
                        imageCropAspectRatio: '1:1',
                        acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                        maxFileSize: '1000KB',
                        ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                        storeAsFile: true,
                        allowMultiple: true,
                        maxFiles: 10,
                        required: true,
                        checkValidity: true,
                        credits: {
                            label: '',
                            url: ''
                        },
                        files: [
                            @forelse ($event->images as $image)
                                {
                                    source: "{{ asset('app-assets/images/services/events/gallery') }}{{ '/' . $image->image }}",
                                },
                            @empty
                            @endforelse
                            ],
                    });

                @endforeach

            @endforeach
        @endisset

    </script>


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

@endsection
