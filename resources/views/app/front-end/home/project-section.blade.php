

<section class="pt-md-5 pt-4 pb-5 project_section">
    <div class="container-fluid pb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="left-content right-content wow fadeInUpBig">
                    <h2 class="head2">
                        {{ $project_section['heading'] }}
                    </h2>
                    <p class="pt-3"> {{ $project_section['description'] }} </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="owl-carousel owl-theme home-slider1 text-center" id="slider1">
                    @foreach ($services as $service)
                        <div class="item">
                            <div class="slider-div" style="background:url({{ asset('app-assets/images/services') }}/{{ $service['image'] }})">
                                <a href="{{ route('services') }}">
                                    <div class="slider-div-item">
                                        <div class="overlay-text">
                                            <h2>
                                                {{ $service['heading'] }}
                                            </h2>
                                            <p> {{ $service['description'] }} </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>


