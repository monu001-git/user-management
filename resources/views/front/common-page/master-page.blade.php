@extends('front.layouts.app')

@section('content')


<!-- start wpo-page-title -->



@if (isset($content->banner) && $content->image != null)
<section class="wpo-page-title" style="background: url( {{ asset('front/assets/images/about-us/about-banner.jpg') }}) no-repeat center top/cover;">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>{{ $menu->name ?? '' }}</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        @if(isset($parent_menu) && $parent_menu != null)
                        <li>{{ $parent_menu->name ?? '' }}</li>
                        @endif
                        <li>{{ $menu->name ?? '' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="wpo-page-title" style="background: url( {{ asset('front/assets/images/about-us/about-banner.jpg') }}) no-repeat center top/cover;">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>{{ $menu->name ?? '' }}</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        @if(isset($parent_menu) && $parent_menu != null)
                        <li>{{ $parent_menu->name ?? '' }}</li>
                        @endif
                        <li>{{ $menu->name ?? '' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


<!-- end page-title -->



<!-- start of wpo-about-section -->
<section class="wpo-about-section section-padding">
    <div class="container">

        @if (isset($message))
        <h1> {{ $message ?? '' }}</h1>
        @endif


        @if (isset($content->left_right) && $content->left_right == 'on')
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="wpo-about-wrap">
                    <div class="wpo-about-img">
                        @if (isset($content->image) && $content->image != null)
                        <img src="{{ asset('uploads/content/' . '/' . $content->image) }}" title="{{ $content->title ?? '' }}">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="wpo-about-text">
                    <h2 class="mt-0">{{ $content->title ?? '' }}</h2>
                    <p>
                        @if (!empty($content->descriptions))
                        {!! $content->descriptions !!}
                        @else
                        <p>No description available</p>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        @endif

        @if (isset($content->center_content) && $content->center_content == 'on')
        <div class="wpo-about-text plr">
            <h4><b>{{ $content->title ?? '' }} </b></h4>
            <p>
                @if (!empty($content->descriptions3))
                {!! $content->descriptions3 !!}
                @else
                <p>No description available</p>
                @endif
            </p>
        </div>
        @endif
    </div>
</section>

<!-- end of wpo-about-section -->

@if (isset($content->count) && $content->count == 'on')
<section class="wpo-fun-fact-section section-padding pt-0 counter-box-sec">
    <div class="container new-width">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                <div class="counter-box">
                    <div class="info">
                        <h3>
                            <span class="odometer number" data-count="{{ $orgData->number_count1 ?? '' }}">00</span>{{ $orgData->unit_count1 ?? '' }}
                        </h3>
                        <p>{{ $orgData->text_count1 ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                <div class="counter-box">
                    <div class="info">
                        <h3>
                            <span class="odometer number" data-count="{{ $orgData->number_count2 ?? '' }}">00</span>{{ $orgData->unit_count2 ?? '' }}
                        </h3>
                        <p>{{ $orgData->text_count2 ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                <div class="counter-box">
                    <div class="info">
                        <h3>
                            <span class="odometer number" data-count="{{ $orgData->number_count3 ?? '' }}">00</span>{{ $orgData->unit_count3 ?? '' }}
                        </h3>
                        <p>{{ $orgData->text_count3 ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                <div class="counter-box">
                    <div class="info">
                        <h3>
                            <span class="odometer number" data-count="{{ $orgData->number_count4 ?? '' }}">00</span>{{ $orgData->unit_count4 ?? '' }}
                        </h3>
                        <p>{{ $orgData->text_count4 ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center subtitle-white">
            <div class="col-xl-7 col-lg-7 col-md-7 col-12 text-center">
                <h6>{{ $orgData->count_heading ?? '' }}</h6>
                <a href="{{ $orgData->count_phone ?? '' }}"><img src="{{ asset('front/assets/images/icon/call-btn.svg') }}" alt=""></a>
            </div>
        </div>
    </div>
</section>
@endif

@if (isset($content->certificate) && $content->certificate == 'on')
@if (isset($organizedData['certificate']) && count($organizedData['certificate']) > 0)
<section class="certificate pb-100">
    <div class="container">
        <div class="wpo-contact-area ex-wiget ">
            <div class="certificate-slider owl-carousel owl-theme">
                @foreach ($organizedData['certificate'] as $k => $galleryCar)
                <div class="notice-block-two">
                    <div class="certificate-img">
                        <div class="img-holder">
                            <a href="{{ asset('uploads/content/image' . '/' . $galleryCar->image) ?? '' }}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{ asset('uploads/content/image' . '/' . $galleryCar->image) ?? '' }}" alt class="img img-responsive">
                                <div class="hover-content">
                                    <i class="ti-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@else
<p>No certificate available</p>
@endif
@endif


<div class="wpo-service-single-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12">
                <div class="wpo-service-single-wrap">
                    @if (isset($content->right_left) && $content->right_left == 'on')
                    <div class="wpo-service-single-item">
                        <p>
                            @if (!empty($content->descriptions2))
                            {!! $content->descriptions2 !!}
                            @else
                            <p>No description available</p>
                            @endif
                        </p>
                    </div>
                    @endif
                    <div class="service-dec">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="wpo-service-single-item ">
                                    @if (isset($content->faq) && $content->faq == 'on')
                                    @if (isset($organizedData['faq']) && count($organizedData['faq']) > 0)
                                    <div class="wpo-service-single-item">
                                        <div class="wpo-service-single-title">
                                            <h5>FAQ's</h5>
                                        </div>
                                        <div class="accordion" id="accordionPanelsStayOpenExample">
                                            @foreach ($organizedData['faq'] as $k => $faqs)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{ $k }}" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                        Q{{ $k + 1 ?? '' }} . {{ $faqs->question ?? '' }}
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapse{{ $k }}" class="accordion-collapse collapse @if ($k == 0) show @endif" aria-labelledby="panelsStayOpen-headingOne">
                                                    <div class="accordion-body">
                                                        @if (!empty($faqs->answer))
                                                        {!! $faqs->answer !!}
                                                        @else
                                                        <p>No answer available</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    @else
                                    <p>No faq available.</p>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="wpo-service-single-main-img">
                    @if (isset($content->right_left) && $content->right_left == 'on')
                    <img src="{{ asset('uploads/content/' . '/' . $content->image2) }}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- wpo-service-single-area start -->
@if (isset($content->image_content) && $content->image_content == 'on')
@if (isset($organizedData['image']) && count($organizedData['image']) > 0)
<div class="wpo-service-single-area section-padding">
    <div class="container">
        <div class="gallery-masonry-block">
            <div class="gallery-masonry-item-wrap gallery-masonry">
                @foreach ($organizedData['image'] as $imageContent)
                <div class="column column-4 gallery-masonry-item" data-src="{{ asset('uploads/content/image' . '/' . $imageContent->image) }}">
                    <img src="{{ asset('uploads/content/image' . '/' . $imageContent->image) }}" alt="" class="gallery-item">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@else
<p>No image available.</p>
@endif
@endif

{{-- team start --}}
@if (isset($content->team) && $content->team == 'on')
@if (isset($organizedData['team']) && count($organizedData['team']) > 0)
<div class="wpo-service-single-area section-padding">
    <div class="container">
        <div class="department-wrap">
            <div class="team-department-section-s2 p-0 team">
                <div class="row">
                    @foreach ($organizedData['team'] as $teams)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="notice-block-two">
                            <div class="team-single">
                                <div class="team-boder-shapes-1">
                                    <div class="team-single-img">
                                        <a href="dr-v-p-singh.php"> <img src="{{ asset('team/image' . '/' . $teams->image) }}" title="{{ $teams->name ?? '' }}"></a>
                                    </div>
                                    <div class="team-single-text">
                                        <h2><a href="dr-v-p-singh.php">{{ $teams->name ?? '' }}</a></h2>
                                        <span>{{ $teams->specialization ?? ' ' }}</span>
                                        <p>{{ $teams->qualification ?? ' ' }}</p>
                                        <p>{{ $teams->designation ?? ' ' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@else
<p>No Team available.</p>
@endif
@endif
{{-- team end --}}

<br><br><br><br>

@endsection
