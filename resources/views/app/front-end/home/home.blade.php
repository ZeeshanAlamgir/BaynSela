@extends('app.front-end.layout.layout')

@section('content')

    {{-- Banner Section Start --}}
    {{ view('app.front-end.home.banner-section')->with('banner_section' , $data['banner_section']) }}
    {{-- Banner Section End --}}

    {{-- Video Section Start --}}
    {{ view('app.front-end.home.video-section')->with('video_section' , $data['video_section']) }}
    {{-- Video Section End --}}

    {{-- Project Section Start --}}
    {{ view('app.front-end.home.project-section')->with('project_section' , $data['project_section'])->with('services' , $data['services']) }}
    {{-- Project Section End --}}

    {{-- Goals Section Start --}}
    {{ view('app.front-end.home.goals-section')->with('goal_section' , $data['goal_section'])->with('sub_goals', $data['sub_goals']) }}
    {{-- Goals Section End --}}

    {{-- About Section Start --}}
    {{ view('app.front-end.home.about-section')->with('about_section' , $data['about_section'])->with('reviews', $data['reviews']) }}
    {{-- About Section End --}}

    {{-- Stories Section Start --}}
    {{ view('app.front-end.home.stories-section')->with('story_section' , $data['story_section']) }}
    {{-- Stories Section End --}}

    {{-- Contact Section Start --}}
    {{ view('app.front-end.home.contact-section')->with('contact_section' , $data['contact_section']) }}
    {{-- Contact Section End --}}

@endsection

@section('custom-js')
    <script>
        $('.home-slider1').owlCarousel({
            loop: true,
            margin: 13,
            stagePadding: 110,
            nav: true,
            arrow: true,
            dots: true,
            autoplay: false,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 20,
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>

    <script>
        $('.home-slider2').owlCarousel({
            loop: true,
            margin: 14,
            stagePadding: 110,
            arrow: true,
            nav: true,
            dots: true,
            autoplay: false,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 0,
                },
                600: {
                    items: 2
                },
                700: {
                    items: 2
                },
                1100: {
                    items: 3
                },

            }
        })



        // FilePond.registerPlugin(
        //     FilePondPluginImagePreview,
        //     FilePondPluginFileValidateType,
        //     FilePondPluginFileValidateSize,
        //     FilePondPluginImageValidateSize,
        //     FilePondPluginImageCrop,
        // );

        // FilePond.create(document.getElementById('file'), {
        //     styleButtonRemoveItemPosition: 'right',
        //     imageCropAspectRatio: '1:1',
        //     acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
        //     maxFileSize: '1000KB',
        //     ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
        //     storeAsFile: true,
        //     allowMultiple: true,
        //     maxFiles: 1,
        //     required: true,
        //     checkValidity: true,
        //     credits: {
        //         label: '',
        //         url: ''
        //     },

        // });

    </script>
    <script>
        var a = 0;
        $(window).scroll(function() {
            var oTop = $("#counter-box").offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                $(".counter").each(function() {
                    var $this = $(this),
                        countTo = $this.attr("data-number");
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    }, {
                        duration: 1450,
                        easing: "swing",
                        step: function() {
                            //$this.text(Math.ceil(this.countNum));
                            $this.text(Math.ceil(this.countNum).toLocaleString("en"));
                        },
                        complete: function() {
                            $this.text(Math.ceil(this.countNum).toLocaleString("en"));
                            //alert('finished');
                        }
                    });
                });
                a = 1;
            }
        });
    </script>

    <!-- Home - Video Section -->
<script>
    $(document).ready(function() {
        $("#videoBatton").click(function() {
            $(".video-content").hide();
            $(".iframe-player").show();
        });

    });
    </script>

<script>
    // $(document).ready(function(){
    //         $('#email').on('focus',function(e){
    //             // alert(e.target.value);
    //         let value = $('#name').val();
    //         if(value=='' || value==null)
    //         {
    //             // alert('a');
    //             $('.name').removeClass('d-none');
    //             $('.home_contact_submit').attr('disabled',true);
    //         }
    //         else
    //         {
    //             $('.name').addClass('d-none');
    //             $('.home_contact_submit').attr('disabled',false);
    //         }
    //     });

    //     $('#contact_number').on('focus',function(e){
    //             // alert(e.target.value);
    //         let value = $('#email').val();
    //         if(value=='' || value==null)
    //         {
    //             // alert('a');
    //             $('.email').removeClass('d-none');
    //             $('.home_contact_submit').attr('disabled',true);
    //         }
    //         else
    //         {
    //             $('.email').addClass('d-none');
    //             $('.home_contact_submit').attr('disabled',false);
    //         }

    //         if(!value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
    //             $('.email-invalid').removeClass('d-none');
    //             $('.home_contact_submit').attr('disabled',true);
    //         }
    //         else{
    //             $('.email-invalid').addClass('d-none');
    //             $('.home_contact_submit').attr('disabled',false);
    //         }

    //     });

    //     $('#file').on('click',function(e){
    //             // alert(e.target.value);
    //         let value = $('#message').val();
    //         if(value=='' || value==null)
    //         {
    //             // alert('a');
    //             $('.message').removeClass('d-none');
    //             $('.home_contact_submit').attr('disabled',true);
    //         }
    //         else
    //         {
    //             $('.message').addClass('d-none');
    //             $('.home_contact_submit').attr('disabled',false);
    //         }
    //     });
    // });

    // $(document).ready(function () {
    //     $('.home_contact_submit').attr('disabled',true);
    // });

    $(document).on('submit', '#contact-form', function(e){
        e.preventDefault();
        $('#contact-loader').removeClass('d-none');
        let email = $('#email').val();
            let value = false;
            if (email == '' || email == null) {
                value = $('.email').removeClass('d-none');
                $('#email').css({
                    "border": "1px solid #ffdedc",
                    "color": "red",
                    "background-color": "#ffdedc"
                });
            }
            else {
                $('.email').addClass('d-none');
                $('#email').css({
                    "border": "1px solid #f3f3f3",
                    "color": "#000",
                    "background-color": "#f3f3f3"
                });


                if(!email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
                    value = $('.email-invalid').removeClass('d-none');
                    $('#email').css({
                        "border": "1px solid #ffdedc",
                        "color": "red",
                        "background-color": "#ffdedc"
                    });
                }
                else{
                    $('.email-invalid').addClass('d-none');
                    $('#email').css({
                        "border": "1px solid #f3f3f3",
                        "color": "#000",
                        "background-color": "#f3f3f3"
                    });
            }

            }

            let name = $('#name').val();
            if (name == '' || name == null) {
                value = $('.name').removeClass('d-none');
                $('#name').css({
                    "border": "1px solid #ffdedc",
                    "color": "red",
                    "background-color": "#ffdedc"
                });
            }
            else {
                $('.name').addClass('d-none');
                $('#name').css({
                    "border": "1px solid #f3f3f3",
                    "color": "#000",
                    "background-color": "#f3f3f3"
                });
            }

            let message = $('#message').val();
            if (message == '' || message == null) {
                value = $('.message').removeClass('d-none');
                $('#message').css({
                    "border": "1px solid #ffdedc",
                    "color": "red",
                    "background-color": "#ffdedc"
                });
            }
            else {
                $('.message').addClass('d-none');
                $('#message').css({
                    "border": "1px solid #f3f3f3",
                    "color": "#000",
                    "background-color": "#f3f3f3"
                });
            }

            let contact_no = $('#contact_number').val();
            if (contact_no == '' || contact_no == null) {
                value = $('.contact_no').removeClass('d-none');
                $('#contact_no').css({
                    "border": "1px solid #ffdedc",
                    "color": "red",
                    "background-color": "#ffdedc"
                });
            }
            else {
                $('.contact_no').addClass('d-none');
                $('#contact_no').css({
                    "border": "1px solid #f3f3f3",
                    "color": "#000",
                    "background-color": "#f3f3f3"
                });
            }

            let type_of_inquiry = $('#type_of_inquiry').val();
            if (type_of_inquiry == '' || type_of_inquiry == null) {
                value = $('.type_of_inquiry').removeClass('d-none');
                $('#type_of_inquiry').css({
                    "border": "1px solid #ffdedc",
                    "color": "red",
                    "background-color": "#ffdedc"
                });
            }
            else {
                $('.type_of_inquiry').addClass('d-none');
                $('#type_of_inquiry').css({
                    "border": "1px solid #f3f3f3",
                    "color": "#000",
                    "background-color": "#f3f3f3"
                });
            }

            // let file = $('#file').val();
            // if (file == '' || file == null) {
            //     value = $('.file').removeClass('d-none');
            //     $('#file').css({
            //         "border": "1px solid #ffdedc",
            //         "color": "red",
            //         "background-color": "#ffdedc"
            //     });
            // }
            // else {
            //     $('.file').addClass('d-none');
            //     $('#file').css({
            //         "border": "1px solid #f3f3f3",
            //         "color": "#000",
            //         "background-color": "#f3f3f3"
            //     });
            // }

            if(!value){

                let data = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{route('contact.save')}}",
                    data: data,
                    dataType: "json",
                    contentType: false, //used for image uploading
                    processData: false, //used for image uploading
                    success: function(response) {
                        console.log(response);
                        if (response['status']) {
                            $("#contact-form")[0].reset();
                            $('#submit-mesg').removeClass('d-none');
                            $('#contact-submit-btn').addClass('d-none');

                            setTimeout(function(){
                                $('#submit-mesg').addClass('d-none');
                                $('#contact-submit-btn').removeClass('d-none');
                            }, 1000);

                            $("#contact-form")[0].reset();
                        }
                    }
                });
            }

            $('#contact-loader').addClass('d-none');


    });

</script>


@endsection
