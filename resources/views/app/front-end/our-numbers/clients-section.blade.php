{{-- @dd($our_client['client_images']) --}}
        <section class="section-clients" data-v-16de3985 data-v-1a0ce034>
            <div data-aos="fade-up" class="section-header" data-v-16de3985>
                <h2 class="title" data-v-16de3985>{{$our_client ? $our_client['client_heading'] : Null}}</h2>
            </div>
            <div class="clients-wrapper client_wripers" data-v-16de3985>
                <div data-aos="fade-up" class="clients" data-v-16de3985>
                    <div class="client" data-v-16de3985>
                        @foreach ($our_client['client_images'] as $client_image)
                            <img class="ml-3 mr-3" src="{{ asset('app-assets/images/numbers/clients/'.$client_image['image']) }}" alt="client logo" loading="lazy" width="190" height="100" data-v-16de3985>
                        @endforeach
                    </div>
                    {{-- <div class="client" data-v-16de3985>
                        <img src="{{ asset('assets/images/ournumber/logo-2.jpg') }}" alt="client logo" loading="lazy" width="190" height="100" data-v-16de3985>
                    </div>--}}

                </div>
            </div>
        </section>
