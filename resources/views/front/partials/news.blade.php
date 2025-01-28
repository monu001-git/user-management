<section class="team-department-section-s2 wpo-blog-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="blog-section-title">
                    <span>News & Videos</span>
                    <h2>What do our experts say?</h2>
                    <p>Get the latest news and insights from the medical world. Explore how you can maintain your health and additional tips from experts.</p>
                </div>
            </div>
        </div>
        <div class="department-wrap">
            <div class="department-doctor-wrap mt-0 spty">
                <div class="video-slider owl-carousel owl-theme">
                    @if(isset($galleryDataNews) && count($galleryDataNews) > 0 && !empty($galleryDataNews))
                        @foreach ($galleryDataNews['gallerydetailData'] as $galleryNews)
                            <div class="notice-block-two">
                                <div class="video-single-img">
                                    <img src="{{ asset('uploads/content/image'.'/'.$galleryNews->image ) }}" title="{{ $galleryNews->title ??"" }}">
                                </div>
                                <a href="{{ $galleryNews->file }}" class="video-btn" data-type="iframe"><img src="{{ asset('front/assets/images/icon/play.svg') }}" /></a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="blog-sec-btnn text-center ">
            <a href="news-and-media.php" class="link custom-buttomm">View All News &amp; Updates <img src="{{ asset('front/assets/images/icon/arrow-btn1.svg') }}"></a>
        </div>
    </div>
</section>
