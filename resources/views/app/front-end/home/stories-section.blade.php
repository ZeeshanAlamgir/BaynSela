<section class="pt-5 bg-black">
    <div class="container-fluid  pt-xl-4">
        <div class="row">
            <div class="col-md-7 pr-0">
                <div class="left-content">
                    <div class="wow fadeInUpBig">
                    <h2 class="text-white head2 pt-5">
                        {{ $story_section['heading'] }}
                        {{-- {{dd($story_section['happy_partner'])}} --}}
                    </h2>
                    <p class="text-white pt-2"> {{ $story_section['description'] }} </p>
                    </div>
                    <div id="counter-section-container">
                        <div class="wow fadeInUpBig" id="counter-box-container">
                            <div id="counter-box">
                                <span class="counter" data-number="{{ $story_section['happy_partner'] }}"></span>
                                <p>{{ __('lang.stories.happy_partner') }}</p>
                            </div>
                            <div id="counter-box">
                                <span>+</span><span class="counter" data-number="{{ $story_section['successful_projects'] }}"></span>
                                <p>{{ __('lang.stories.projects') }}</p>
                            </div>
                            <div id="counter-box">
                                <span class="counter" data-number="{{ $story_section['total_investments'] }}"></span><span>{{ __('lang.commons.b') }}</span>
                                <p>{{ __('lang.stories.total_investments') }}</p>
                            </div>
                            <div id="counter-box">
                                <span class="counter" data-number="{{ $story_section['year_of_exp'] }}"></span>
                                <p> {{ __('lang.stories.experience') }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-5 pr-0 pl-0 pt-md-0 pt-5 wow slideInRight">
                 <div data-aos="fade-left" class="image-grid main_story_img" data-v-2c238c23>
                  <div class="image1" data-v-2c238c23><img src="{{ asset('assets/images/homepage/story_1.jpg') }}" alt="image1" loading="lazy" width="300" height="250" data-v-2c238c23></div>
                  <div class="image2 color-shadow" data-v-2c238c23><img src="{{ asset('assets/images/homepage/story_2.jpg') }}" alt="image2" loading="lazy" width="300" height="250" data-v-2c238c23></div>
                  <div class="image3" data-v-2c238c23><img src="{{ asset('assets/images/homepage/story_3.jpg') }}" alt="image3" loading="lazy" width="300" height="250" data-v-2c238c23></div>
                  <div class="image4" data-v-2c238c23><img src="{{ asset('assets/images/homepage/story_4.jpg') }}" alt="image4" loading="lazy" width="300" height="250" data-v-2c238c23></div>
                  <div class="image5 color-shadow" data-v-2c238c23><img src="{{ asset('assets/images/homepage/story_5.jpg') }}" alt="image5" loading="lazy" width="300" height="250" data-v-2c238c23></div>
                </div>
                </div>
        </div>
    </div>
</section>
