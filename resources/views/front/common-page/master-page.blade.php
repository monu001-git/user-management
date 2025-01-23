@extends('front.layouts.app')

@section('content')

<!-- start wpo-page-title -->
<section class="wpo-page-title" style="background: url(assets/images/amenities/opd-banner.jpg) no-repeat center top/cover;">
    @if(isset($content->banner))
    <img src="{{ asset('uploads/banner'.'/'.$content->banner) }}" style="height:500px;">
    @endif
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>OPD</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index.php">Home</a></li>
                        <li>OPD</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
    <div class="wpo-newsletter-widget widget">
        <a href="{{ url('/') }}" class="theme-btn">
            <h1> {{ $message }}</h1>
        </a>
    </div>

</section>
<!-- end page-title -->

<!-- wpo-service-single-area start -->
<div class="wpo-service-single-area section-padding">
    <div class="container">
        <div class="row">


            <div class="col-lg-7 col-12">
                <div class="wpo-service-single-wrap">
                    <div class="wpo-service-single-item">
                        <div class="wpo-service-single-title">
                            @if(isset($content->title))
                            <h3>{{ $content->title ??"" }}</h3>
                            @endif
                        </div>
                        <p>
                            @if(isset($content->descriptions))
                            {!! $content->descriptions !!}
                            @endif
                        </p>


                    </div>

                </div>
            </div>

            <div class="col-lg-5 col-12">
                <div class="wpo-service-single-main-img ">
                    @if(isset($content->image))
                    <img src="{{ asset('uploads/content'.'/'.$content->image) }}" alt="">
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>



@endsection
