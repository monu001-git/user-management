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


    <section class="team-departmentt-section-s2 section-padding pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="team-section-title">
                        <span>Media</span>

                    </div>
                </div>
            </div>
            <div class="department-wrap">
                <div class="row">
                    @if (isset($galleryDataNews) && count($galleryDataNews) > 0)
                        @foreach ($galleryDataNews['gallerydetailData'] as $galleryNews)
                            <div class="col-lg-4 col-12">
                                <div class="notice-block-twoo">
                                    <div class="video-singlee-img">
                                        <img src="{{ asset('uploads/content/image' . '/' . $galleryNews->image) }}"
                                            title="{{ $galleryNews->title ?? '' }}">
                                    </div>
                                    <a href="{{ $galleryNews->file ?? '' }}" class="video-btn" data-type="iframe">
                                        <img src="{{ $galleryNews->file ?? '' }}" />
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No Video items available.</p>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
