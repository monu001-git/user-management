@extends('front.layouts.app')

@section('content')
    <!-- start wpo-page-title -->
    <section class="wpo-page-title"
        style="background: url( {{ asset('front/assets/images/about-us/about-banner.jpg') }}) no-repeat center top/cover;">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>{{ $teamDataProfile->name ?? '' }}</h2>
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="index.php">Home</a></li>
                            <li>{{ $teamDataProfile->name ?? '' }}</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->


    <div class="team-pg-area section-padding">
        <div class="container">
            <div class="team-info-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="team-info-img">
                            <img src="{{ asset('team/image' . '/' . $teamDataProfile->image) }}"
                                title="{{ $teamDataProfile->name ?? '' }}">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="team-info-text">
                            <h2>{{ $teamDataProfile->name ?? '' }}</h2>
                            <ul>

                                <li>Consultant: <span> {{ $teamDataProfile->designation ?? '' }}</span></li>
                                <li>Education:<span> {{ $teamDataProfile->qualification ?? '' }} </span></li>
                                <li>Experience:<span> {{ $teamDataProfile->experience ?? '' }} Years</span></li>
                                <li>Email:<span> {{ $teamDataProfile->email ?? '' }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="exprience-area">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="exprience-wrap">
                            <h2>{{ $teamDataProfile->name ?? '' }}</h2>
                            <p>{!! $teamDataProfile->description ?? '' !!} </p>

                            <div class="at-progress">
                                <div class="row">

                                    @if (isset($teamDataStatic) && count($teamDataStatic) > 0)
                                        @foreach ($teamDataStatic as $teamDataStatics)
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 custom-grid">
                                                <div class="progress yellow">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">{{ $teamDataStatics->number ??'' }}+</div>
                                                    <div class="progress-name"><span>{{ $teamDataStatics->text ??"" }}</span></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif


                                    {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 custom-grid">
                                        <div class="progress blue">
                                            <span class="progress-left">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <div class="progress-value">1200+</div>
                                            <div class="progress-name"><span>Happy Patient</span></div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 custom-grid">
                                        <div class="progress pink">
                                            <span class="progress-left">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <div class="progress-value">400+</div>
                                            <div class="progress-name"><span>Surgery Done</span></div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 custom-grid">
                                        <div class="progress green">
                                            <span class="progress-left">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <span class="progress-right">
                                                <span class="progress-bar"></span>
                                            </span>
                                            <div class="progress-value">10+</div>
                                            <div class="progress-name"><span>Year Experience</span></div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>


                        <div class="wpo-contact-area ex-wiget certificate pb-0">
                            <h2>Certificates</h2>
                            <div class="row certificatee">

                                @if (isset($galleryDataDoctor) && count($galleryDataDoctor) > 0)
                                    @foreach ($galleryDataDoctor['gallerydetailData'] as $galleryDoctor)
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="certificate-img">
                                                <div class="img-holder">
                                                    <a href="{{ asset('uploads/content/image' . '/' . $galleryDoctor->image) ?? '' }}"
                                                        class="fancybox" data-fancybox-group="gall-1">
                                                        <img src="{{ asset('uploads/content/image' . '/' . $galleryDoctor->image) ?? '' }}"
                                                            alt class="img img-responsive">
                                                        <div class="hover-content">
                                                            <i class="ti-plus"></i>
                                                        </div>
                                                    </a>
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

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
