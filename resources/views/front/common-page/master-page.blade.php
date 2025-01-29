@extends('front.layouts.app')

@section('content')


<!-- start wpo-page-title -->
<section class="wpo-page-title" style="background: url({{ asset('front/assets/images/about-us/about-banner.jpg')}}) no-repeat center top/cover;">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>{{ $menu->name ??'' }}</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>{{ $menu->name ??'' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page-title -->

<!-- start of wpo-about-section -->
<section class="wpo-about-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="wpo-about-wrap">
                    <div class="wpo-about-img">
                        <img src="{{ asset('uploads/content/'.'/'.$content->image) }}" alt="">
                    </div>

                    <div class="wpo-about-exprience">
                        <div class="tp-fun-fact-grids clearfix">
                            <div class="grid">
                                <div class="info">
                                    <h3>
                                        <span class="odometer" data-count="32">00</span>+
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


                    <h2 class="mt-0">{{ $content->title  }}</h2>
                    <p>

                        @if(!empty($content->descriptions))
                        {!! $content->descriptions !!}
                        @else
                        <p>No description available</p>
                        @endif
                    </p>

                    {{-- <div class="wpo-newsletter-widget widget pt-3">
                        <a href="#" class="theme-btn">Book A Consultation</a>
                    </div> --}}

                </div>
            </div>
        </div>

        {{-- <div class="wpo-service-single-title pt-5">
            <h4><b>VISION</b></h4>
            <p><b>Holistic Treatment</b></p>

            </p>
        </div> --}}

        {{-- <div class="wpo-about-text plr">
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
        </div> --}}
    </div>
</section>


<!-- end of wpo-about-section -->

<!-- end of wpo-about-section -->
{{-- <section class="wpo-fun-fact-section section-padding pt-0 counter-box-sec">
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
                <a href="#"><img src="{{ asset('front/assets/images/icon/call-btn.svg')}}" alt=""></a>
</div>
</div>
</div>
</section> --}}
<!-- end of wpo-about-section -->

<section class="certificate pb-100">
    <div class="container">
        <div class="wpo-contact-area ex-wiget ">
            <div class="certificate-slider owl-carousel owl-theme">
                <div class="notice-block-two">
                    <div class="certificate-img">
                        <div class="img-holder">
                            <a href="{{ asset('front/assets/images/certificates/cer-01.jpg" class="fancybox')}}" data-fancybox-group="gall-1">
                                <img src="{{ asset('front/assets/images/certificates/cer-01.jpg')}}" alt class="img img-responsive">
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
                            <a href="{{ asset('front/assets/images/certificates/cer-02.jpg')}}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{ asset('front/assets/images/certificates/cer-02.jpg')}}" alt class="img img-responsive">
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
                            <a href="{{ asset('front/assets/images/certificates/cer-05.jpg')}}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{ asset('front//images/certificates/cer-05.jpg')}}" alt class="img img-responsive">
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
                            <a href="{{ asset('front/assets/images/certificates/cer-04.jpg')}}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{ asset('front/assets/images/certificates/cer-04.jpg')}}" alt class="img img-responsive">
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

</section>

<div class="wpo-service-single-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12">
                <div class="wpo-service-single-wrap">
                    <div class="wpo-service-single-item">
                        <!--div class="wpo-service-single-main-img">
                <img src="assets/images/service-single/robotics-surgeries.jpg" alt="">
              </div-->
                        <!-- <div class="wpo-service-single-title">
                <h3>Robotics Surgery</h3>
              </div> -->
                        <p>Robotic surgeries are known for their precision, faster patient recovery, low complications, low blood
                            loss, and less post-operative pain. A 3D image with high magnification and resolution is visible to the
                            surgeon. It helps the surgeon see the treatment area. The doctor can work their way by using the
                            console. Robotic laparoscopy is the future of surgery. It can mimic complex movements with precision and
                            has dexterity akin to human hand. We use Da Vinci X robot to perform surgeries like gall bladder stone
                            removal, appendix, hernias, uterus, cancer surgeries etc. </p>

                    </div>
                    <div class="service-dec">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="wpo-service-single-item ">
                                    <div class="wpo-service-single-title">
                                        <h5>Treatments</h5>
                                    </div>
                                    <div class="row mt-0">
                                        <div class="col-md-7 col-sm-7 col-12">

                                            <div class="wpo-service-single-item">
                                                <ul>
                                                    <li><b>Gall bladder stone removal</b> </li>
                                                    <li><b>Hernia repair </b> </li>
                                                    <li><b>Appendix removal</b> </li>
                                                    <li><b>Bariatric surgery (weight reduction)</b> </li>
                                                    <li><b>Surgery of uterus and ovaries</b> </li>
                                                    <li><b>Cancer Surgeries</b></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-12 mb-5">
                                            <img src="{{ asset('front/assets/images/laser-treatment/robotics-laparoscopi-surgeries.png')}}" alt="">
                                        </div>
                                    </div>


                                    <div class="wpo-service-single-item">
                                        <div class="wpo-service-single-title">
                                            <h5>FAQ's</h5>
                                        </div>
                                        <div class="accordion" id="accordionPanelsStayOpenExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                        Q1. What is robotic surgery?
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                                    <div class="accordion-body">
                                                        Robot assisted surgery is a surgical technique wherein there is a robot controlled by a
                                                        distantly connected console. The doctor manages the console which enables the robot to
                                                        mimic their hand movements and perform surgical procedures.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                        Q2. What are the advantages of robotic surgery?

                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                                    <div class="accordion-body">
                                                        Robotic surgery has numerous advantages like high precision, minimal scarring, minimally
                                                        invasive, reduced errors, remote operation, improved dexterity, reduced risk of infection
                                                        and improved surgical outcomes.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                        Q3. What is the difference between laparoscopic and robotic surgery?
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                                    <div class="accordion-body">
                                                        Laparoscopic surgery is guided by a camera and the expert performs the procedure on the
                                                        patient. However, a robotic surgery is performed from a distance with the console being
                                                        controlled by the expert to perform the surgical operation.
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                                        Q4. Is robotic surgery costlier than laparoscopic surgery?
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                                                    <div class="accordion-body">
                                                        The cost of equipment and maintenance is higher for robotic surgery compared to
                                                        laparoscopic surgery. However, the cost is overcome by the ease of surgery for patients
                                                        and doctors. The loss of working hours is minimal.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                                        Q5. Is robotic surgery safe?
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                                                    <div class="accordion-body">
                                                        Yes, robotic surgery is safe. With minimal contact and high precision, it is a minimally
                                                        invasive procedure. It ensures fewer complications in post-operative care.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                                                        Q6. How long does the recovery take after robotic surgery?
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                                                    <div class="accordion-body">
                                                        Recovery times vary based on the type of surgery, but generally, patients experience
                                                        faster recovery with robotic surgery compared to traditional open surgery and laparoscopic
                                                        surgery. Many patients are able to return to normal activities within a day.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
                                                        Q7. Will I experience a lot of pain after robotic surgery?
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
                                                    <div class="accordion-body">
                                                        Most patients report almost no pain after robotic surgery and minimal trauma to
                                                        surrounding tissues.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingEight">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
                                                        Q8. How do I know if robotic surgery is right for me?
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEight">
                                                    <div class="accordion-body">
                                                        We perform thorough tests before giving a nod for robotic surgery. Your current health
                                                        status, complexity of the surgery and medical history are taken into account before
                                                        proceeding.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingNine">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">
                                                        Q9. What types of surgeries can be performed robotically?
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingNine">
                                                    <div class="accordion-body">
                                                        Robotic surgery can be used for a variety of procedures across specialties such as
                                                        urology, gynecology, general surgery, thoracic surgery, orthopedics, and ENT. Consult with
                                                        our surgeons to learn about your options.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingTen">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="false" aria-controls="panelsStayOpen-collapseTen">
                                                        Q10. Are there any risks associated with robotic surgery?
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTen">
                                                    <div class="accordion-body">
                                                        No surgery, be it any technique, is risk free. While robotic surgery is generally safe, it
                                                        still carries some risks common to all surgeries, such as infection, bleeding, and
                                                        anesthesia complications. Additionally, if the robotic system malfunctions, the surgeon
                                                        can switch to traditional methods to complete the procedure.
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- start wpo-team-section -->

                    <!-- end wpo-team-section -->
                </div>
            </div>
            <div class="col-lg-5 col-12">

                <div class="wpo-service-single-main-img">
                    <img src="{{ asset('front/assets/images/service-single/robotics-surgeries.png')}}" alt="">
                </div>

            </div>
            <!--?php include 'rightside.php' ?-->
        </div>
    </div>
</div>

<!-- wpo-service-single-area start -->

<h1>Image Section</h1>

@if(isset($organizedData) && count($organizedData) > 0 )

<div class="wpo-service-single-area section-padding">
    <div class="container">
        <div class="gallery-masonry-block">
            <div class="gallery-masonry-item-wrap gallery-masonry">
                @foreach ($organizedData['image'] as $imageContent)

                <div class="column column-4 gallery-masonry-item" data-src="{{ asset('uploads/content/image'.'/'.$imageContent->image)}}">
                    <img src="{{ asset('uploads/content/image'.'/'.$imageContent->image)}}" alt="" class="gallery-item">
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>

@endif
<!-- wpo-service-single-area end -->
<!-- wpo-service-single-area start -->
<div class="wpo-service-single-area section-padding">
    <div class="container">
        <div class="department-wrap">
            <div class="team-department-section-s2 p-0 team">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="notice-block-two">
                            <div class="team-single">
                                <div class="team-boder-shapes-1">
                                    <div class="team-single-img">
                                        <a href="dr-v-p-singh.php"> <img src="{{ asset('front/assets/images/team/dr-vp-singh.jpeg')}}" alt="Dr. V P Singh"></a>
                                    </div>
                                    <div class="team-single-text">
                                        <h2><a href="dr-v-p-singh.php">Dr. V P Singh</a></h2>
                                        <span>General Surgeon</span>
                                        <p>MBBS, MS, FISCP, MGB-OAGB, LLB & MHA</p>
                                        <p>Senior Consultant & HOD, Dharmsheela Narayan Hospital</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="notice-block-two">
                            <div class="team-single">
                                <div class="team-boder-shapes-1">
                                    <div class="team-single-img">
                                        <a href="dr-parth-pratim-pasayat.php"> <img src="{{ asset('front/assets/images/team/parth-pratim-pasayat.jpeg')}}" alt="Dr. Parth Pratim Pasayat"></a>
                                    </div>
                                    <div class="team-single-text">
                                        <h2><a href="dr-parth-pratim-pasayat.php">Dr. Parth Pratim Pasayat</a></h2>
                                        <span>MBBS, MS (General Surgery)</span>
                                        <p>DrNB (Plastic Surgery), Fellow Aesthetic Surgery, IdB, Barcelona, Spain</p>
                                        <p>Senior Consultant, Yatharth Superspecialty Hospital</p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="notice-block-two">
                            <div class="team-single">
                                <div class="team-boder-shapes-1">
                                    <div class="team-single-img">
                                        <a href="dr-dimple-bordoloi.php"><img src="{{ asset('front/assets/images/team/Dr-Dimple-Bordoloi.jpeg')}}" alt="Dr. Dimple Bordoloi"></a>
                                    </div>
                                    <div class="team-single-text">
                                        <h2><a href="dr-dimple-bordoloi.php">Dr. Dimple Bordoloi</a></h2>
                                        <span>MBBS, DNB (OBG)</span>
                                        <p>MCCG (Cosmetic Gynaecology)</p>
                                        <p>Senior Consultant, Maash Hospital</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
<!-- wpo-service-single-area end -->


@endsection
