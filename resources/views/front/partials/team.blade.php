        <!-- Team-section -->
        <section class="team-department-section-s2 section-padding pb-10">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="team-section-title">
                            <span>MEET OUR TEAM</span>
                            <h2>Where Expertise Meets Care </h2>
                            <p>We have onboarded a team of experts who cater to a broad range of concerns. They provide affordable surgical procedures, lifestyle management, laser treatments and much more.</p>
                        </div>
                    </div>
                </div>
                <div class="department-wrap">
                    <div class="department-doctor-wrap mt-0 spty team">
                        <div class="team-slider owl-carousel owl-theme">
                            @if(isset($teamData))
                            @foreach ($teamData as $teams)
                            <div class="notice-block-two">
                                <div class="team-single">
                                    <div class="team-boder-shapes-1">
                                        <div class="team-single-img">
                                            <img src="{{ asset('team/image'.'/'.$teams->image ) }}" alt="">
                                        </div>
                                        <div class="team-single-text">
                                            <h2><a href="dr-v-p-singh.php">{{ $teams->name ?? " " }}</a></h2>
                                            <span>{{ $teams->specialization ?? " " }}</span>
                                            <p>{{ $teams->qualification ?? " " }}</p>
                                            <p>{{ $teams->designation ?? " " }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            {{-- <div class="notice-block-two">
                                <div class="team-single">
                                    <div class="team-boder-shapes-1">
                                        <div class="team-single-img">
                                            <img src="{{ asset('front/assets/images/team/parth-pratim-pasayat.jpeg') }}" alt="">
                        </div>
                        <div class="team-single-text">
                            <h2><a href="dr-parth-pratim-pasayat.php">Dr. Parth Pratim Pasayat</a></h2>
                            <span>MBBS, MS (General Surgery) (JIPMER)</span>
                            <p>DrNB (Plastic Surgery), Fellow Aesthetic Surgery, IdB, Barcelona, Spain</p>
                            <p>Senior Consultant, Yatharth Superspecialty Hospital</p>

                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="notice-block-two">
                                <div class="team-single">
                                    <div class="team-boder-shapes-1">
                                        <div class="team-single-img">
                                            <img src="{{ asset('front/assets/images/team/Dr-Dimple-Bordoloi.jpeg') }}" alt="">
            </div>
            <div class="team-single-text">
                <h2><a href="dr-dimple-bordoloi.php">Dr. Dimple Bordoloi</a></h2>
                <span>MBBS, DNB (OBG)</span>
                <p>MCCG (Cosmetic Gynaecology)</p>
                <p>Senior Consultant, Maash Hospital</p>
            </div>
            </div>
            </div>
            </div> --}}



            </div>
            </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7 col-md-7 col-12 text-center department-wrap1">
                    <h6>Your well-being is our priority. Avail world class care with us. Book an appointment now. Get customised, patient-centered and expert care for affordable charges.</h6>
                    <a href="tel:9711010235"><img src="{{ asset('front/assets/images/icon/call-btn1.svg') }}" alt=""></a>
                </div>
            </div>
            </div>
        </section>
        <!-- Team-section end-->
