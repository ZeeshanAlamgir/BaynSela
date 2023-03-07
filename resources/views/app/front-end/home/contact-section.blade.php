<style>
    @media(max-width: 767px){
    .main_story_img{
        max-height: 900px;
    width: 110%;
    margin: 30px 0 70px 56px;
    display: grid;
    grid-template-columns: repeat(2,1fr);
    grid-template-rows: repeat(8,1fr);
    grid-column-gap: 27px;
    grid-row-gap: 27px;
    }
}
    .header-ul2 a.active {
    color: #e64833;
 }
    .header_ul_2_li span {
    font-weight: 400;
    color: white !important;
  }
    .main_header {
        position: revert;
    }
    .filepond--drop-label.filepond--drop-label label {
        opacity: 0;
    }

    .home_upload_img {
        position: absolute;
        top: 42%;
        z-index: 1212;
        max-width: 88%;
        min-width: 88%;
        left: 6%;
    }

    .upload_icon {
        float: right;
    }

    .contact-content[data-v-21317946] {
        color: #fff;
        background-color: #000;
        border-radius: 12px;
        background-image: linear-gradient(129deg, rgba(0, 0, 0, .87), rgba(0, 0, 0, .62)), url(/_nuxt/img/contact-bg.1cb255c.jpg);
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 510px;
        display: flex;
        align-items: center;
    }

    .contact-content[data-v-21317946] {
        color: #fff;
        background-color: #000;
        border-radius: 12px;
        background-image: linear-gradient(129deg, rgba(0, 0, 0, .87), rgba(0, 0, 0, .62)), url(/_nuxt/img/contact-bg.1cb255c.jpg);
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 510px;
        display: flex;
        align-items: center;
    }

    .input-group .file-input input[type=file] {
        display: none;
    }

    button,
    input {
        overflow: visible;
    }

    .input-group .file-input label {
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        background-color: hsla(0, 0%, 100%, .25098);
        border: 1px solid #fff;
        border-radius: 3px;
        padding: 14px 20px;
        transition: .3s;
    }

    .input-group .file-input label {
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        background-color: hsla(0, 0%, 100%, .25098);
        border: 1px solid #fff;
        border-radius: 3px;
        padding: 14px 20px;
        transition: .3s;
    }

    .input-group .file-input label {
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        background-color: hsla(0, 0%, 100%, .25098);
        border: 1px solid #fff;
        border-radius: 3px;
        padding: 14px 20px;
        transition: .3s;
    }
    .error{
        color: red;
    }

    .submit-mesg{
        float: right;
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        background-color: hsla(0,0%,100%,.25098);
        border: 1px solid #fff;
        border-radius: 3px;
        padding: 14px 20px px;
        transition: .3s;
        padding: 12px;
    }


</style>
<link rel="stylesheet" href="{{ asset('app-assets/css/custom/home-contact.css') }}">

<section class="mb-5 pt-md-5 pt-4 pb-md-5 pb-3 pl-md-4 pr-md-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-section1 cover" style="background-image: linear-gradient(129deg,rgba(0,0,0,.87),rgba(0,0,0,.62)),url({{ asset('assets/images/homepage/contact.jpg') }});">
                    <div class="content-bg  left-content2 wow fadeInUpBig">
                        <div class="row pt-md-5 pb-5">
                            <div class="col-md-8">
                                <h2 class="pb-4">
                                    {{ $contact_section['heading'] }}
                                </h2>
                                <p> {{ $contact_section['description'] }} </p>
                            </div>
                            <div class="col-md-7">
                                <form id="contact-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mt-3">

                                        <div data-v-21317946="" class="input-group">
                                            <div data-v-21317946="" class="input-wrapper">
                                                <input data-v-21317946="" id="type_of_inquiry" name="type_of_inquiry" type="text" placeholder="{{ __('lang.forms.type_of_inquiry') }}" class="">
                                                <label data-v-21317946="" for="name" class="label-name">
                                                    <span data-v-21317946="" class="content-name">{{ __('lang.forms.type_of_inquiry') }}</span>
                                                </label>
                                            </div>
                                            <span data-v-21317946="" class="error type_of_inquiry d-none">{{ __('lang.validations.required.type_of_inquiry_field') }}</span>
                                        </div>
                                     </div>
                                        <div class="col-md-6 mt-3">

                                        <div data-v-21317946="" class="input-group">
                                            <div data-v-21317946="" class="input-wrapper">
                                                <input data-v-21317946="" id="name" name="name" type="text" placeholder="{{ __('lang.forms.your_name') }}" class="">
                                                <label data-v-21317946="" for="name" class="label-name"><span data-v-21317946="" class="content-name ">{{ __('lang.forms.your_name') }}</span>
                                                </label>
                                            </div>
                                            <span data-v-21317946="" class="error name d-none">{{ __('lang.validations.required.name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div data-v-21317946="" class="input-group">
                                            <div data-v-21317946="" class="input-wrapper">
                                                <input data-v-21317946="" id="email" name="email" type="text" placeholder="{{ __('lang.forms.email') }}" class="">
                                                <label data-v-21317946="" for="name" class="label-name">
                                                    <span data-v-21317946="" class="content-name">{{ __('lang.forms.email') }}</span>
                                                </label>
                                            </div>
                                            <span data-v-21317946="" class="error email d-none ">{{ __('lang.validations.required.email') }}</span>
                                            <span data-v-21317946="" class="error email-invalid d-none ">{{ __('lang.validations.valid.email') }}</span>
                                        </div>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                        <div data-v-21317946="" class="input-group">
                                            <div data-v-21317946="" class="input-wrapper">
                                                <input data-v-21317946="" id="contact_number" name="contact_number" type="number" placeholder="{{ __('lang.forms.contact_no') }}" class="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
                                                <label data-v-21317946="" for="name" class="label-name">
                                                    <span data-v-21317946="" class="content-name">{{ __('lang.forms.contact_no') }}</span></label>
                                            </div><span data-v-21317946="" class="error contact_no d-none">{{ __('lang.validations.required.contact_no') }}</span>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-12 mt-3 p-0">
                                    <div data-v-21317946="" class="input-group">
                                        <div data-v-21317946="" class="input-wrapper">
                                            <textarea data-v-21317946="" id="message" name="message" rows="5" placeholder="{{ __('lang.forms.message') }}" class=""></textarea>
                                            <label data-v-21317946="" for="message" class="label-name">
                                                <span data-v-21317946="" class="content-name">{{ __('lang.forms.message') }}</span>
                                            </label>
                                        </div><span data-v-21317946="" class="error message d-none">{{ __('lang.validations.required.message') }}</span>
                                    </div>
                                        </div>
                                        <div class="col-md-12 mt-3 pt-1 p-0">
                                            <div data-v-21317946="" class="file-upload w-100">
                                                <div data-v-21317946="" class="input-group w-100">
                                                    <div data-v-21317946="" class="file-input w-100">
                                                        <input data-v-21317946="" id="file" type="file" name="contact_img">
                                                        <label data-v-21317946="" for="file" req>
                                                            <span data-v-21317946="" class="text text-white">{{ __('lang.forms.company_image') }}</span>
                                                            <img data-v-21317946="" src="{{ asset('assets/images/homepage/upload.svg')}}" alt="upload-icon" width="" height=""></label>
                                                    </div>
                                                    <span data-v-21317946="" class="error file d-none">{{ __('lang.validations.required.file') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-3 p-0">
                                            <button class="btn btn-1  ws-100 home_contact_submit primary" id="contact-submit-btn" type="submit">
                                                <div class="d-none loader" id="contact-loader" data-v-31c7fb34=""></div>
                                                {{ __('lang.forms.submit') }}
                                            </button>
                                            <span class="d-none text-white submit-mesg" id="submit-mesg" ><b>Thank you for your submition!</b></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
