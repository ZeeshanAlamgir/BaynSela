
<section class="pt-md-5 pt-3 pb-5 video_section">
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="left-content right-content wow fadeInUpBig">
                    <h2 class="head2">
                        {{ $goal_section['heading'] }}

                    </h2>
                    <p class="pt-3"> {{ $goal_section['description'] }} </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-5 goal_section">
    <div class="container-fluid pb-5">
        <div class="row">
            <div class="col-md-7 pl-0 order-md-1 order-2 pr-xs-0">
                @if (LaravelLocalization::getCurrentLocale() === 'ar')
                    <img src="{{ asset('app-assets/images/goalsection') }}/{{ $goal_section['image_ar'] }}" class="img-fluid d-md-block wow slideInRight hr-image " alt="img" />
                @else
                    <img src="{{ asset('app-assets/images/goalsection') }}/{{ $goal_section['image_en'] }}" class="img-fluid d-md-block wow slideInLeft hr-image " alt="img" />
                @endif
                {{-- <img src="{{ asset('assets/images/homepage/horse.png') }}" class="img-fluid d-md-none d-block mt-5" alt="img" /> --}}
             </div>
            <div class="col-md-5 order-md-2 order-1">
                <div class="right-content2 ul-list1 pt-xl-5">
                    @foreach ($sub_goals as $key => $sub_goal)
                    <div class="wow fadeInUpBig home_dec_margin">
                        <h4 class="pt-xl-5">{{ $sub_goal['heading'] }}</h4>
                        <p> {{ $sub_goal['description'] }} </p>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
