<!-- start wpo-testimonial-section -->
<section class="wpo-testimonial-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-12">
                <div class="testimonial-left">
                    <a href="testimonial.html" class="theme-btn">{{ $orgData->testimonial_title ?? '' }}</a>
                    <div class="fun-fact-grids clearfix">
                        <div class="grid">
                            <div class="info">
                                <h3 style="color:#fff">
                                    <span class="odometer"
                                        data-count="{{ $orgData->testimonial_number ?? '' }}">00</span>
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </h3>
                                <p>{{ $orgData->testimonial_heading ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="testimonial-right">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-8 col-12">
                            <div class="slider-nav bd">
                                @if (isset($testimonialData) && count($testimonialData) > 0)
                                    @foreach ($testimonialData as $testimonialDatas)
                                        <div class="testimonial-right-text">
                                            <p>
                                                {{ $testimonialDatas->description ?? '' }}

                                            </p>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-lg-3 col-12">
                                                    <div class="slider-for">
                                                        <div class="testimonial-right-img">
                                                            <img src="{{ asset('front/assets/images/testimonial/people.svg') }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9 co1-12">
                                                    <a>
                                                        <h2>{{ $testimonialDatas->name ?? '' }}</h2>
                                                    </a>
                                                    <span>{{ $testimonialDatas->sender ?? '' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end wpo-testimonial-section -->
