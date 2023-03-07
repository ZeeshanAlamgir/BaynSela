@extends('app.layout.layout')

@section('page-title', 'Video')

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
    .customizer .customizer-toggle{
        display: none !important;
    }
</style>
@endsection

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'homepage.videosection') }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Update Video Section</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('homepage.videosection') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="content-body"><!-- Validation -->
    <section class="bs-validation">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="updateVideoSection1" action="{{route('homepage.update.video')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 position-relative">
                                        <label class="form-label fs-5" for="basic-addon-name">Heading</label>
                                        <input type="text" id="heading" class="form-control @error('heading_en') is-invalid @enderror" name="heading_en" placeholder="Heading" aria-label="Name" aria-describedby="basic-addon-name" value="{{ $videoData ? $videoData['heading_en'] : old('heading_en') }}" />
                                        {{-- <div class="invalid-feedback">Please enter heading.</div> --}}
                                        @error('heading_en')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 position-relative">
                                        <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                        <input type="text" id="basic-addon-name" name="heading_ar" class="form-control @error('heading_ar') is-invalid @enderror" placeholder="عنوان" aria-label="Name" aria-describedby="basic-addon-name" value="{{ $videoData ? $videoData['heading_ar'] : old('heading_ar') }}" />
                                        {{-- <div class="invalid-feedback">Please enter heading.</div> --}}
                                        @error('heading_ar')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 position-relative">
                                    <label class="form-label fs-5" for="Description">Description</label>
                                    <textarea id="description_en" class="form-control form-control-lg @error('description_en') is-invalid @enderror description_en"
                                        rows="5" name="description_en" > {{ $videoData ? $videoData['description_en'] : old('description_en') }}
                                    </textarea>
                                    @error('description_en')
                                        <div class="invalid-tooltip">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 position-relative">
                                    <label class="form-label fs-5" for="Description">وصف</label>
                                    <textarea id="description_ar" class="form-control form-control-lg @error('description_ar') is-invalid @enderror description_ar"
                                        name="description_ar" rows="5"> {{ $videoData ? $videoData['description_ar'] : old('description_ar') }}
                                    </textarea>
                                    @error('description_ar')
                                        <div class="invalid-tooltip">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 position-relative">
                                    {{-- <div class="">
                                        <label for="customFile1" class="form-label fs-5">Image</label>
                                        <input class="form-control" type="file" id="image" name="image" onchange="loadFile(event)" accept="image/jpg,image/jpeg,image/png" />
                                        <img id="output" width="80" height="80" src={{asset("app-assets/images/video/")}}{{'/'.$videoData['image']}} />
                                    </div> --}}
                                    <label class="form-label fs-5" for="Image">Image</label>
                                    <i>( .png, .jpg, .jpeg )</i><br>
                                    <i>Resolution (5472 * 3648)</i>
                                    <input id="attachment" type="file" class="filepond @error('image') is-invalid @enderror"
                                        name="image" multiple accept="image/png, image/jpeg, image/jpg" />
                                    @error('image')
                                        <div class="invalid-tooltip">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 position-relative">
                                        {{-- <input type="file" id="video" class="form-control" name="video" placeholder="Video Link"  aria-describedby="basic-addon-name" required />
                                        <input type="hidden" name="video_url" id="video_url"  value="{{ $videoData['video_url'] }}"/> --}}

                                        <label class="form-label fs-5" for="video_url">Video</label>
                                        <input type="text" id="video_url" class="form-control @error('video_url') is-invalid @enderror" name="video_url" placeholder="Video Url" aria-label="Video Url" aria-describedby="basic-addon-name" value="{{ $videoData ? $videoData['video_url'] : old('video_url') }}" />
                                        @error('video_url')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror

                                </div>
                              </div>
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6">
                                        <input type="hidden" id="slug" class="form-control" name="slug" placeholder="slug" disabled aria-label="Name" aria-describedby="basic-addon-name" value="{{ $videoData['slug'] }}" required />
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
    // var loadFile = function(event) {
    //     var reader = new FileReader();
    //     reader.onload = function(){
    //         var output = document.getElementById('output');
    //         output.src = reader.result;
    //     };
    //     reader.readAsDataURL(event.target.files[0]);
    // };

    {{--  $(document).on("keyup","#heading",function() {
      var Text = $(this).val();
      Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
      Text = Text.toLowerCase();
      $("#slug").val(Text);
        if(Text.length==0)
            $('#slug').val('');
    });  --}}

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(document).on('submit','#updateVideoSection',function(e){
        e.preventDefault();
        let formData = new FormData(this); //used for image uploading
        $.ajax({
            type: "POST",
            url: "{{route('homepage.update.video')}}" ,
            data: formData,
            dataType: "json",
            contentType: false, //used for image uploading
            processData: false, //used for image uploading
            beforeSend: function(){
                toastr.info("Please wait your data is updating");
            },
            success: function (response) {
                // console.log(response);
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

        FilePond.create(document.getElementById('attachment'), {
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
            files: [
                    {
                        source: "{{asset('app-assets/images/video/')}}{{'/'.$videoData['image']}}",
                    },
            ],
        });

</script>

@endsection
