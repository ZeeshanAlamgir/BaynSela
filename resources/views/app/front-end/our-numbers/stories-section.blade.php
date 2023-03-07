

<section class="section-statistics" data-v-727fb427 data-v-1a0ce034>

    <div data-aos="fade-up" class="margin-content" data-v-727fb427>
        <div id="statistics" data-v-727fb427>
            <div id="counter-box" class="stat" data-v-727fb427>
                <span class="counter" data-number="{{$story_section ? $story_section['numbers']['happy_partner'] : 0}}"></span>
                <div class="name" data-v-727fb427>{{ __('lang.stories.happy_partner') }}</div>

            </div>
            <div id="counter-box" class="stat" data-v-727fb427>
                <span>+</span><span class="counter" data-number="{{ $story_section ? $story_section['numbers']['successful_projects'] : 0}}"></span>
                <div class="name" data-v-727fb427>{{ __('lang.stories.projects') }}</div>
            </div>
            <div id="counter-box" class="stat" data-v-727fb427>
                <span class="counter" data-number="{{ $story_section ? $story_section['numbers']['total_investments'] : 0 }}"></span><span>{{ __('lang.commons.b') }}</span>
                <div class="name" data-v-727fb427>{{ __('lang.stories.total_investments') }}</div>
            </div>
            <div id="counter-box" class="stat" data-v-727fb427>
                <span class="counter" data-number="{{$story_section ?  $story_section['numbers']['year_of_exp'] : 0}}"></span>
                <div class="name" data-v-727fb427>{{ __('lang.stories.experience') }}</div>
            </div>
        </div>
    </div>
</section>
