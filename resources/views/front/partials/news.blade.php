<section class="team-department-section-s2 wpo-blog-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="blog-section-title">
                    <span>{{ $orgData->news_title  ??'' }}</span>
                    <h2>{{ $orgData->news_heading  ??''  }}</h2>
                    <p>

                        @if(!empty($orgData->news_description))
                        {!! $orgData->news_description !!}
                        @else
                        <p>No description available</p>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="department-wrap">
            <div class="department-doctor-wrap mt-0 spty">
                <div class="video-slider owl-carousel owl-theme">
                    @if(isset($galleryDataNews) && count($galleryDataNews) > 0 )
                    @foreach ($galleryDataNews['gallerydetailData'] as $galleryNews)
                    <div class="notice-block-two">
                        <div class="video-single-img">
                            <img src="{{ asset('uploads/content/image'.'/'.$galleryNews->image ) }}" title="{{ $galleryNews->title ??"" }}">
                        </div>
                        <a href="{{ $galleryNews->file ??"" }}" class="video-btn" data-type="iframe"><img src="{{ $galleryNews->file ??"" }}" /></a>
                    </div>
                    @endforeach

                    @else
                    <p>No Video items available.</p>

                    @endif
                </div>
            </div>
        </div>
        <div class="blog-sec-btnn text-center ">
            <a href="{{ url('news-and-media') }}" class="link custom-buttomm">View All News &amp; Updates <img src="{{ asset('front/assets/images/icon/arrow-btn1.svg') }}"></a>
        </div>
    </div>
</section>
