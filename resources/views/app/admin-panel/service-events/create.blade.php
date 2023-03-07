@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'services.events.create', decryptParams($serviceId)) }}
@endsection

@section('page-title', 'Events')

@section('page-vendor')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/css/pickers/flatpickr/flatpickr.min.css">

@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/filepond.min.css">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.css">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets') }}/css/plugins/forms/pickers/form-flat-pickr.min.css">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets') }}/css/plugins/forms/pickers/form-pickadate.min.css">
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
                <h2 class="content-header-title float-start mb-0">Create Event</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('services.events.create', decryptParams($serviceId)) }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('services.events.store.new', ['serviceId' => $serviceId]) }}" method="POST" enctype="multipart/form-data" id="service_event_form">

            <div class="card-header">
            </div>

            <div class="card-body">

                @csrf

                {{ view('app.admin-panel.service-events.form-fields', ['service' => $service, 'image_map_loads' => $image_map_loads]) }}

            </div>

            <div class="card-footer d-flex align-items-center justify-content-end">
                <button type="button" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1" id="form_submit_btn">
                    <i data-feather='save'></i>
                    Save Event
                </button>
                <a href="{{ route('services.events.index', ['id' => $serviceId]) }}"
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
<script src="{{ asset('app-assets') }}/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

@endsection

@section('page-js')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('app-assets') }}/js/scripts/forms/pickers/form-pickers.min.js"></script>


@endsection

@section('custom-js')

    <script>
        let my_logo = '';
        let my_gallery = '';
        FilePond.registerPlugin(
                    FilePondPluginImagePreview,
                    FilePondPluginFileValidateType,
                    FilePondPluginFileValidateSize,
                    FilePondPluginImageValidateSize,
                    FilePondPluginImageCrop,
                );

                my_logo = FilePond.create(document.getElementById("logo"), {
                    styleButtonRemoveItemPosition: 'right',
                    imageCropAspectRatio: '1:1',
                    acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                    maxFileSize: '1000KB',
                    ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                    storeAsFile: true,
                    allowMultiple: true,
                    maxFiles: 1,
                    required: false,
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

                my_gallery = FilePond.create(document.getElementById("gallery"), {
                    styleButtonRemoveItemPosition: 'right',
                    imageCropAspectRatio: '1:1',
                    acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                    maxFileSize: '1000KB',
                    ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                    storeAsFile: true,
                    allowMultiple: true,
                    maxFiles: 20,
                    required: false,
                    checkValidity: true,
                    credits: {
                        label: '',
                        url: ''
                    },
                });

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

        $(document).on('click', '#add_new_number', function(){
            $('#numbers_div').append(
                `<div class="row mb-2">
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-5" for="itemname">Number</label>
                                <input type="text" class="form-control numbers" id="number[]"
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

        $(document).on('click', '.remove_new_number', function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click', '#add_new_imagemap', function(){
            $('#imagemaps_div').append(
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
        });

        $(document).on('click', '.remove_new_imagemap', function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click', '#add_new_partnership', function(){
            let i = $(this).data('item');
            $('#partnership_div').append(
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
                                        <button class="btn btn-icon btn-relief-outline-primary add_new_item" data-item="${i}"  type="button"
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

        $(document).on('click', '.remove_new_partnership', function(){
            $(this).parent().parent().remove();
            let item = $('#add_new_partnership').data('item');
            $('#add_new_partnership').data('item', --item);
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
                                <div class="col-md-6 col-12 mb-1">
                                    <button class="btn btn-icon btn-relief-outline-danger remove_new_item"   type="button"
                                        >
                                        <span>Remove Item</span>
                                    </button>
                                </div>
                            </div>`
            );

        });

        $(document).on('click', '.remove_new_item', function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click','#form_submit_btn',function(){
            let old_partnership_title_en = $('#old_partnership_title_en').val();
            let location = $('#location').val();
            let title_en = $('#title_en').val();
            let title_ar = $('#title_ar').val();
            let description_en = $('#description_en').val();
            let description_ar = $('#description_ar').val();
            let about_en = tinyMCE.get('about_en').getContent();
            let about_ar = tinyMCE.get('about_ar').getContent();
            // alert(about_en=="");
            // return;
            let logo = my_logo.getFiles();
            let gallery = my_gallery.getFiles();

            let number = $(".numbers").length;
            // alert(number>=0);
            // return;
            // if(location=='' || location==null)
            // {
            //     toastr.error("Location Field is required");
            //     return;
            // }
            if(title_en=='' || title_en==null)
            {
                toastr.error("Title Eng Field is required");
                return;
            }
            if(title_ar=='' || title_ar==null)
            {
                toastr.error("Title Ar Field is required");
                return;
            }
            // if(description_en=='' || description_en==null)
            // {
            //     toastr.error("Description Eng Field is required");
            //     return;
            // }
            // if(description_ar=='' || description_ar==null)
            // {
            //     toastr.error("Description Ar Field is required");
            //     return;
            // }
            
           
            if(gallery=='' || gallery==null || gallery==[])
            {
                toastr.error("Gallery Image is required");
                return;
            }
            if(number>0)
            {
                // alert('nm');
                // return;
                if(about_en=="" && about_ar=="")
                {
                    toastr.error("About is Required.");
                    return;
                }
                else
                {
                    toastr.info('Please wait your data is saving...');
                    $('#form_submit_btn').attr('disabled','disabled');
                    $('#service_event_form').submit();
                    return;
                }
            }
            if(about_en=='' && about_ar=='')
            {
                toastr.info('Please wait your data is saving...');
                $('#form_submit_btn').attr('disabled','disabled');
                $('#service_event_form').submit();
                return;
            }
            if(about_ar!='' || about_ar!=null)
            {
                // var number = $(".numbers").length;
                if(number<=0)
                {
                    toastr.error("Number is Required.");
                    return;
                }
            }
            // if(number>=0)
            // {
            //     alert();
            //     return;
            //     if(about_en=="" && about_ar=="")
            //     {
            //         toastr.error("About is Required.");
            //         return;
            //     }
            //     else
            //     {
            //         alert('num else');
            //         return;
            //         toastr.info('Please wait your data is saving...');
            //         $('#form_submit_btn').attr('disabled','disabled');
            //         $('#service_event_form').submit();
            //         return;
            //     }
            // }
            if(about_en!='' || about_en!=null)
            {
                // var number = $(".numbers").length;
                if(number<=0)
                {
                    toastr.error("Number is Required.");
                    return;
                }
                else
                {
                    toastr.info('Please wait your data is saving...');
                    $('#form_submit_btn').attr('disabled','disabled');
                    $('#service_event_form').submit();
                    return;
                }
            }
            
            // if(logo=='' || logo==null || logo == [])
            // {
            //     toastr.error("Logo Image is required");
            //     return;
            // }
            
            
            else
            {
                toastr.info('Please wait your data is saving...');
                $('#form_submit_btn').attr('disabled','disabled');
                $('#service_event_form').submit();
            }
        });

        @foreach ($service->filters as $filter)
            $(document).on('click','#filter-{{ $filter->id }}',function(){
                let id = ("{{ $filter->id }}");
                let service_id = "{{ $service->id }}";
                if($(this).is(":checked"))
                {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('admin/services/events/filter-checkbox-items') }}/"+id+"/"+service_id,
                        data: { 
                            id : id,
                            service_id : service_id
                        },
                        dataType: "json",
                        success: function (response) {
                            if(response.status)
                            {
                                $('.filter_values-{{$filter->id}}').empty();
                                response.items.forEach(function(item){
                                    $('.filter_values-{{$filter->id}}').append('<option value='+item[0]+' selected>'+item[1]+'</option>');
                                })
                            }
                        }
                    });
                }
                else
                {
                    $('.filter_values-{{$filter->id}}').val(null).trigger("change");
                }
                
            })
        @endforeach

    </script>

@endsection
