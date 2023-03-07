{{-- {{dd($our_partners['images'][0]['image'])}} --}}
        <section class="section-partners" data-v-2d5806f6 data-v-1a0ce034>
            <div data-aos="fade-up" class="section-header" data-v-2d5806f6>
                <h2 class="title" data-v-2d5806f6>{{$our_partners ? $our_partners['partner_heading'] : Null}}</h2>
                <p class="subtitle" data-v-2d5806f6>{{$our_partners ? $our_partners['partner_description'] : Null}}.
                </p>
            </div>
            <div class="partners-wrapper" data-v-2d5806f6>
                <div data-aos="fade-up" class="partners" data-v-2d5806f6>
                    @foreach ($our_partners['images'] as $partner_image)
                        {{-- @dd($partner_image['image']); --}}
                        <div class="partner" data-v-2d5806f6><img src="{{ asset('app-assets/images/numbers/partners/'.$partner_image['image']) }}" alt="partner logo" width="190" height="100" data-v-2d5806f6></div>
                    @endforeach
                    {{-- <div class="partner" data-v-2d5806f6><img src="https://sela-assets-prod.s3.me-south-1.amazonaws.com/uploads/learnpage_field/logos_first/1/Screen_Shot_1444-01-26_at_3.35.16_PM.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAQHWORPTNHQVAUI4U%2F20221010%2Fme-south-1%2Fs3%2Faws4_request&X-Amz-Date=20221010T080236Z&X-Amz-Expires=604800&X-Amz-SignedHeaders=host&X-Amz-Signature=9783a3fdd45a34ffe5fa010f0286c053cc5508fd2ba841a83b55a28f3b7e5ddc" alt="partner logo" width="190" height="100" data-v-2d5806f6></div>
                    <div class="partner" data-v-2d5806f6><img src="https://sela-assets-prod.s3.me-south-1.amazonaws.com/uploads/learnpage_field/logos_first/1/Screen_Shot_1444-01-26_at_3.35.26_PM.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAQHWORPTNHQVAUI4U%2F20221010%2Fme-south-1%2Fs3%2Faws4_request&X-Amz-Date=20221010T080236Z&X-Amz-Expires=604800&X-Amz-SignedHeaders=host&X-Amz-Signature=46c7a34a77256d0b949e53b4c7ba229ec532186bada169231527310e655142b7" alt="partner logo" width="190" height="100" data-v-2d5806f6></div>
                    <div class="partner" data-v-2d5806f6><img src="https://sela-assets-prod.s3.me-south-1.amazonaws.com/uploads/learnpage_field/logos_first/1/Screen_Shot_1444-01-26_at_3.35.37_PM.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAQHWORPTNHQVAUI4U%2F20221010%2Fme-south-1%2Fs3%2Faws4_request&X-Amz-Date=20221010T080236Z&X-Amz-Expires=604800&X-Amz-SignedHeaders=host&X-Amz-Signature=3dc5f98c7066bc04039c70a7246c56e9ee042c68854a2659758aa54c18160c30" alt="partner logo" width="190" height="100" data-v-2d5806f6></div>
                    <div class="partner" data-v-2d5806f6><img src="https://sela-assets-prod.s3.me-south-1.amazonaws.com/uploads/learnpage_field/logos_first/1/Screen_Shot_1444-01-26_at_3.36.19_PM.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAQHWORPTNHQVAUI4U%2F20221010%2Fme-south-1%2Fs3%2Faws4_request&X-Amz-Date=20221010T080236Z&X-Amz-Expires=604800&X-Amz-SignedHeaders=host&X-Amz-Signature=98973d4a953e3f1d486b3d2cae9b801b58fb644440c270c806a257d11e763c4f" alt="partner logo" width="190" height="100" data-v-2d5806f6></div>
                    <div class="partner" data-v-2d5806f6><img src="https://sela-assets-prod.s3.me-south-1.amazonaws.com/uploads/learnpage_field/logos_first/1/Screen_Shot_1444-01-26_at_3.36.05_PM.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAQHWORPTNHQVAUI4U%2F20221010%2Fme-south-1%2Fs3%2Faws4_request&X-Amz-Date=20221010T080236Z&X-Amz-Expires=604800&X-Amz-SignedHeaders=host&X-Amz-Signature=d2559ea01d557a4d2c3feb96e6d3aaa9b36a4b7c30f50b47ebd81a5c87b3c392" alt="partner logo" width="190" height="100" data-v-2d5806f6></div>
                    <div class="partner" data-v-2d5806f6><img src="https://sela-assets-prod.s3.me-south-1.amazonaws.com/uploads/learnpage_field/logos_first/1/Screen_Shot_1444-01-26_at_3.35.57_PM.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAQHWORPTNHQVAUI4U%2F20221010%2Fme-south-1%2Fs3%2Faws4_request&X-Amz-Date=20221010T080236Z&X-Amz-Expires=604800&X-Amz-SignedHeaders=host&X-Amz-Signature=4918df0420fe3654475d3cfe123b73bd1bb3bd57312a4196c5f85d959337a061" alt="partner logo" width="190" height="100" data-v-2d5806f6></div>
                    <div class="partner" data-v-2d5806f6><img src="https://sela-assets-prod.s3.me-south-1.amazonaws.com/uploads/learnpage_field/logos_first/1/Screen_Shot_1444-01-26_at_3.35.47_PM.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAQHWORPTNHQVAUI4U%2F20221010%2Fme-south-1%2Fs3%2Faws4_request&X-Amz-Date=20221010T080236Z&X-Amz-Expires=604800&X-Amz-SignedHeaders=host&X-Amz-Signature=8056bbe998832d68406bfef65ae840880791ccc864a2387cb1e4ee9a00e24f7f" alt="partner logo" width="190" height="100" data-v-2d5806f6></div>
                    <div class="partner" data-v-2d5806f6><img src="https://sela-assets-prod.s3.me-south-1.amazonaws.com/uploads/learnpage_field/logos_first/1/Screen_Shot_1444-01-26_at_3.36.28_PM.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAQHWORPTNHQVAUI4U%2F20221010%2Fme-south-1%2Fs3%2Faws4_request&X-Amz-Date=20221010T080236Z&X-Amz-Expires=604800&X-Amz-SignedHeaders=host&X-Amz-Signature=4575429d3a6aa1a982f75c5ac9af4f96a2c2e02e05a423206e92eae0cabd13b4" alt="partner logo" width="190" height="100" data-v-2d5806f6></div>
                    <div class="partner" data-v-2d5806f6><img src="https://sela-assets-prod.s3.me-south-1.amazonaws.com/uploads/learnpage_field/logos_first/1/Screen_Shot_1444-01-26_at_3.36.35_PM.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAQHWORPTNHQVAUI4U%2F20221010%2Fme-south-1%2Fs3%2Faws4_request&X-Amz-Date=20221010T080236Z&X-Amz-Expires=604800&X-Amz-SignedHeaders=host&X-Amz-Signature=f4ac300950e4c9056f0c2f5faf79ff6db021a97e60d1ac5f7df5dbb5ec1b0c5b" alt="partner logo" width="190" height="100" data-v-2d5806f6></div>
                    <div class="partner" data-v-2d5806f6><img src="https://sela-assets-prod.s3.me-south-1.amazonaws.com/uploads/learnpage_field/logos_first/1/Screen_Shot_1444-01-26_at_3.36.41_PM.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAQHWORPTNHQVAUI4U%2F20221010%2Fme-south-1%2Fs3%2Faws4_request&X-Amz-Date=20221010T080236Z&X-Amz-Expires=604800&X-Amz-SignedHeaders=host&X-Amz-Signature=81fc56c3c9c21bca56efea9f0a9e389875763681081ba535c8e89093914dd5e4" alt="partner logo" width="190" height="100" data-v-2d5806f6></div>
                    <div class="partner" data-v-2d5806f6><img src="https://sela-assets-prod.s3.me-south-1.amazonaws.com/uploads/learnpage_field/logos_first/1/Screen_Shot_1444-01-26_at_3.37.37_PM.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAQHWORPTNHQVAUI4U%2F20221010%2Fme-south-1%2Fs3%2Faws4_request&X-Amz-Date=20221010T080236Z&X-Amz-Expires=604800&X-Amz-SignedHeaders=host&X-Amz-Signature=3671d8f1b94b1ff3b74a85e6c074f3ca69b704d2813713fdf07a4d44dc49ad39" alt="partner logo" width="190" height="100" data-v-2d5806f6></div> --}}
                </div>
            </div>
        </section>