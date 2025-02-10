@extends('front.layouts.app')

@section('content')


    <!-- start wpo-page-title -->
    <section class="wpo-page-title"
        style="background: url( {{ asset('front/assets/images/about-us/about-banner.jpg') }}) no-repeat center top/cover;">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>News and Media</h2>
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>News and Media</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->

    <br><br><br><br>
  
            <div class="video-slider owl-carousel owl-theme">
                @if (isset($galleryDataNews) && count($galleryDataNews) > 0)
                    @foreach ($galleryDataNews['gallerydetailData'] as $galleryNews)
                        <div class="notice-block-two">
                            <div class="video-single-img">
                                <img src="{{ asset('uploads/content/image' . '/' . $galleryNews->image) }}"
                                    title="{{ $galleryNews->title ?? '' }}">
                            </div>
                            <a href="{{ $galleryNews->file ?? '' }}" class="video-btn" data-type="iframe"><img
                                    src="{{ $galleryNews->file ?? '' }}" /></a>
                        </div>
                    @endforeach
                @else
                    <p>No Video items available.</p>
                @endif
            </div>
            <br><br><br><br><br>  <br><br><br><br><br> 

@endsection
