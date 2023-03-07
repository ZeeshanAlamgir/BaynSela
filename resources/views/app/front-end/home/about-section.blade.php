
<section class="pb-5 about_section">
    <div class="container-fluid pb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="left-content right-content wow fadeInUpBig">
                    <h2 class="head2">
                        {{ $about_section['heading'] }}

                    </h2>
                    <p class="pt-3"> {{ $about_section['description'] }} </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-5 pb-2 slider_2_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="owl-carousel owl-theme home-slider2" id="slider2">

                    @foreach ($reviews as $review)
                        <div class="item">
                            <div class="feedback-main">
                                <div class="feedback-sub">
                                    <div class="feedback-text">
                                        <h2 class="pb-2">
                                            {{ $review['heading'] }}
                                        </h2>
                                        <p class="client_dec"> {{ $review['description'] }} </p>
                                    </div>
                                    <div class="feedback-details">
                                        <img src="{{ asset('app-assets/images/reviews') }}/{{ $review['image'] }}" alt="img" />
                                        <h5>{{ $review['name'] }}</h5>
                                        <p> {{ $review['designation'] }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
