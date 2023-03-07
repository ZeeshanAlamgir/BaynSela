<section class="mt-md-4 mb-4 pt-3 pb-3 pl-md-4 pr-md-4 goal2_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-section1 cover" style="background-image: linear-gradient(129deg,rgba(0,0,0,.87),rgba(0,0,0,.62)),url({{ asset('app-assets/images/video') }}/{{ $video_section['image'] }});">
                <div class="wrapper">
                    <div data-v-42ac33da="" class="iframe-player" style="display: none;">
                    <iframe data-v-42ac33da="" src="{{ $video_section['video'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen">

                    </iframe>
                </div>
                </div>
                    <div class="video-content pt-5  left-content2">
                        <div class="row pt-md-5 pb-5 mt-md-5 wow fadeInUpBig">
                            <div class="col-md-8">
                                <h2 class="pb-4 mr-xl-5 pr-xl-5">
                                    {{ $video_section['heading'] }}
                                </h2>
                                <p> {{ $video_section['description'] }} </p>
                            </div>
                            <div class="col-md-4">
                                <a id="videoBatton" data-fancybox data-v-42ac33da="" class="play play-btn" style="cursor: pointer;">
                                    <i>
                                        <img src="{{ asset('assets/images/homepage/icon-play.svg') }}" alt="img" />
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
