@extends('front.layouts.app')

@section('content')




<!-- start wpo-page-title -->
<section class="wpo-page-title" style="background: url(assets/images/about-us/about-banner.jpg) no-repeat center top/cover;">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>About Us</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index.php">Home</a></li>
                        <li>About Us</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

<!-- start of wpo-about-section -->
<section class="wpo-about-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="wpo-about-wrap">
                    <div class="wpo-about-img">
                        <img src="{{ asset('front/assets/images/about.png')}}" alt="">
                    </div>

                    <div class="wpo-about-exprience">
                        <div class="tp-fun-fact-grids clearfix">
                            <div class="grid">
                                <div class="info">
                                    <h3>
                                        <span class="odometer" data-count="26">00</span>+
                                    </h3>
                                    <p>Years</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="wpo-about-text">

                    <h2 class="mt-0">A Socio-Corporate</h2>
                    <p>We are a socio-corporate polyclinic. Headed by Dr. Gunjan Dhari, we have been in healthcare for
                        more than 26 years in Noida. Striving to achieve excellence in healthcare, we have 9 certified and
                        licensed practitioners on board. We also have an experienced nursing staff to support patient care.
                        From testing, to treatment and medication, we are equipped with state-of-the-art facilities like
                        LASER and robotic surgeries. We house technologies to provide precise, efficient, and accurate
                        diagnosis & treatment. </p>

                    <div class="wpo-newsletter-widget widget pt-3">
                        <a href="#" class="theme-btn">Book A Consultation</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="wpo-service-single-title pt-5">
            <h4><b>VISION</b></h4>
            <p><b>Holistic Treatment</b></p>

            </p>
        </div>

        <div class="wpo-about-text plr">
            <h4><b>Our Values</b></h4>
            <ul>
                <li><b>High Integrity:</b> We maintain an ethical conduct at all steps of treatment process. You get
                    transparency in pricing, and complete information about your condition from evaluation to diagnosis
                    and intervention.</li>
                <li><b>Work in Collaboration:</b> Doctors at Gunjan work in collaboration with patients to deliver care
                    tailored to their needs and health status.</li>
                <li><b>Compassionate Care:</b> We understand that dealing with an illness is emotionally challenging. Our staff and experts make your healing a trustworthy and respectful experience.</li>
                <li><b>Patient-Centric Approach:</b> As every patient and disease are unique, we prioritise patient well-being and provide individualized care tailored to your unique health concerns. This way you are an active part of the treatment.</li>
                <li><b>Advanced Tech-Driven care :</b> Latest equipment to deliver care via latest technology, eg: LASER and robotic surgery. </li>
            </ul>
        </div>
    </div>
</section>


<!-- end of wpo-about-section -->

<!-- end of wpo-about-section -->
<section class="wpo-fun-fact-section section-padding pt-0 counter-box-sec">
    <div class="container new-width">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                <div class="counter-box">
                    <div class="info">
                        <h3>
                            <span class="number odometer odometer-auto-theme" data-count="1">
                                <div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">1</span></span></span></span></span></div>
                            </span>Lakh+
                        </h3>
                        <p>Happy <br>Patients</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                <div class="counter-box">
                    <div class="info">
                        <h3>
                            <span class="number odometer odometer-auto-theme" data-count="2">
                                <div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">2</span></span></span></span></span></div>
                            </span>K+
                        </h3>
                        <p>Successful <br>Surgery</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                <div class="counter-box">
                    <div class="info">
                        <h3>
                            <span class="number odometer odometer-auto-theme" data-count="50">
                                <div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">5</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div>
                            </span>K+
                        </h3>
                        <p>Successful <br>Plastic Surgery</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                <div class="counter-box">
                    <div class="info">
                        <h3>
                            <span class="number odometer odometer-auto-theme" data-count="2">
                                <div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">2</span></span></span></span></span></div>
                            </span>+
                        </h3>
                        <p>New <br>Clinics</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center subtitle-white">
            <div class="col-xl-7 col-lg-7 col-md-7 col-12 text-center">
                <h6>Avail comprehensive, holistic and personalized care from a team of experts.</h6>
                <a href="#"><img src="{{ asset('front/assets/images/icon/call-btn.svg') }}" alt=""></a>
            </div>
        </div>
    </div>
</section>
<!-- end of wpo-about-section -->
<section class="certificate">
    <div class="container">
        <div class="wpo-contact-area ex-wiget certificate">
            <div class="certificate-slider owl-carousel owl-theme">
                <div class="notice-block-two">
                    <div class="certificate-img">
                        <div class="img-holder">
                            <a href="{{ asset('front/assets/images/certificates/cer-01.jpg') }}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{ asset('front/assets/images/certificates/cer-01.jpg') }}" alt class="img img-responsive">
                                <div class="hover-content">
                                    <i class="ti-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="notice-block-two">
                    <div class="certificate-img">
                        <div class="img-holder">
                            <a href="{{ asset('front/assets/images/certificates/cer-02.jpg') }}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{ asset('front/assets/images/certificates/cer-02.jpg') }}" alt class="img img-responsive">
                                <div class="hover-content">
                                    <i class="ti-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="notice-block-two">
                    <div class="certificate-img">
                        <div class="img-holder">
                            <a href="{{ asset('front/assets/images/certificates/cer-05.jpg') }}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{ asset('front/assets/images/certificates/cer-05.jpg') }}" alt class="img img-responsive">
                                <div class="hover-content">
                                    <i class="ti-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="notice-block-two">
                    <div class="certificate-img">
                        <div class="img-holder">
                            <a href="{{ asset('front/assets/images/certificates/cer-04.jpg') }}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{ asset('front/assets/images/certificates/cer-04.jpg') }}" alt class="img img-responsive">
                                <div class="hover-content">
                                    <i class="ti-plus"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <!--div class="container certificate-width">
               <div class="row justify-content-center">
                  <div class="col col-lg-3 col-md-3 col-sm-3 col-6">
                     <div class="box-certificate">
                        <img src="assets/images/certificates/medicine.svg"/>
                     </div>
                  </div>
                  <div class="col col-lg-3 col-md-3 col-sm-3 col-6">
                     <div class="box-certificate"> <img src="assets/images/certificates/cer-2.svg"/></div>
                  </div>
                  <div class="col col-lg-3 col-md-3 col-sm-3 col-6">
                     <div class="box-certificate"><img src="assets/images/certificates/medicine.svg"/></div>
                  </div>
                  <div class="col col-lg-3 col-md-3 col-sm-3 col-6">
                     <div class="box-certificate"><img src="assets/images/certificates/cer-3.svg"/></div>
                  </div>
               </div>
            </div -->
</section>


@endsection
