    <footer
        @if (Request::is('/')) class="wpo-site-footer fhome"  @else class="wpo-site-footer pt-0 mt-0" @endif>
        <div class="wpo-upper-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="logo widget-title text-center mb-5 logo-f">
                            @if (isset($orgData->footer_logo))
                                <a href="{{ url('/') }}"><img
                                        src="{{ asset('uploads/logo/footerlogo' . '/' . $orgData->footer_logo) ?? '' }}"
                                        title="{{ $orgData->footer_logo_title ?? '' }}"></a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="widget about-widget">

                            <p>{!! $orgData->about ?? 'About not available' !!}</p>

                            <div class="social-widget">
                                <ul>
                                    @if (isset($orgData->facebook) && !empty($orgData->facebook))
                                        <li><a href="{{ $orgData->facebook ?? '' }}"
                                                title="{{ $orgData->facebook_title ?? '' }}"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a></li>
                                    @endif

                                    @if (isset($orgData->instagram) && !empty($orgData->instagram))
                                        <li><a href="{{ $orgData->instagram ?? '' }}"
                                                title="{{ $orgData->instagram_title ?? '' }}"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i></a></li>
                                    @endif

                                    @if (isset($orgData->youtube) && !empty($orgData->youtube))
                                        <li><a href="{{ $orgData->youtube ?? '' }}"
                                                title="{{ $orgData->youtube_title ?? '' }}"><i class="fa fa-youtube-play"
                                                    aria-hidden="true"></i></a></li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-sm-12 col-6">
                        <div class="widget link-widget link-widget1">
                            <div class="widget-title">
                                <h3>Our Specialisties</h3>
                            </div>
                            <ul>

                                @if (isset($footerMenu) && count($footerMenu) > 0)
                                    <ul>
                                        @foreach ($footerMenu->slice(0, 8) as $footerMenus)
                                            <li><a href="{{ url($footerMenus->url) }}">–
                                                    {{ $footerMenus->name ?? '' }}</a></li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No footer menu items available.</p>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-2 col-md-6 col-sm-12 col-6">
                        <div class="widget link-widget ">
                            <div class="widget-title">
                                <h3>More Information</h3>
                            </div>
                            <ul>
                                @if (isset($footerMenu) && count($footerMenu) > 0)
                                    <ul>
                                        @foreach ($footerMenu->slice(8, 8) as $footerMenus)
                                            <li><a href="{{ url($footerMenus->url) }}">–
                                                    {{ $footerMenus->name ?? '' }}</a></li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No footer menu items available.</p>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="widget wpo-contact-widget">
                            <div class="widget-title">
                                <h3>Contact</h3>
                            </div>
                            <div class="contact-ft">
                                <ul>
                                    <li><i class="fi flaticon-placeholder"></i>{!! $orgData->address ?? 'Address not available' !!}</li>
                                    <li><i
                                            class="fi flaticon-phone-call"></i>{{ $orgData->phone ?? 'Phone not available' }}
                                    </li>
                                    <li><i class="fi flaticon-email"></i>{{ $orgData->email ?? 'Email not available' }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </div>
        <div class="wpo-lower-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <p class="copyright">© Copyright {{ date('Y') }}, All Rights Reserved by Gunjan Clininc
                            <br> Designed by <a href="https://graphotive.com/" target="_blank">graphotive</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    {{-- <footer class="wpo-site-footer pt-0 mt-0">
    <div class="wpo-upper-footer">
       <div class="container">
          <div class="row">
             <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="logo widget-title text-center mb-5 logo-f">
                   <a href="index.php"> <img src="assets/images/footer-logo.svg" alt="logo"></a>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="widget about-widget">
                   <p>Gunjan is a multispeciality clinic that provides patients with compassionate care. We make treatment tailored to your condition to ensure a fast recovery.
                   </p>
                   <div class="social-widget">
                      <ul>
                         <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                         <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                         <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="col col-lg-3 col-md-6 col-sm-12 col-6">
                <div class="widget link-widget link-widget1">
                   <div class="widget-title">
                      <h3>Our Specialties</h3>
                   </div>
                     <ul>
                        <li><a href="laser-treatment.php">– Laser Treatment</a></li>
                        <li><a href="robotics-surgeries.php">– Robotic Surgery</a></li>
                        <li><a href="general-physician.php">– General Physician</a></li>
                        <li><a href="aesthetic-procedure.php">– Dermatology, Cosmetic, Plastic & Aesthetic Procedure</a></li>								
                        <li><a href="gynaecology-and-obstetrics.php">– Gynaecology & Obstetrics</a></li>                                    
                        <li><a href="lifestyle-and-nutrition.php">– Lifestyle Diseases & Nutrition</a></li>
                        <li><a href="pathology-lab.php">– Lab</a></li>
                        <li><a href="pharmacy.php">– Pharmacy</a></li>
                        <li><a href="yoga-and-naturopathy.php">– Yoga & Naturopathy</a></li>
                        
                   </ul>
                </div>
             </div>
             <div class="col col-lg-2 col-md-6 col-sm-12 col-6">
                <div class="widget link-widget ">
                   <div class="widget-title">
                      <h3>More Information</h3>
                   </div>
                  <ul>
                        <li><a href="aboutus.php">– About Us</a></li>
                        <li><a href="contact.php">– Contact Us</a></li>
                <li><a href="csr-with-ddf.php">– CSR With DDF</a></li>
                        <li><a href="blog.php">– Blog</a></li>
                        <li><a href="privacy-policy.php">– Privacy Policy</a></li>
                        <li><a href="cookie-policy-gunjan-clinic.php">– Cookie Policy</a></li>
                   </ul>
                </div>
             </div>
             <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="widget wpo-contact-widget">
                   <div class="widget-title">
                      <h3>Contact</h3>
                   </div>
                   <div class="contact-ft">
                    <ul>
                         <li><i class="fi flaticon-placeholder"></i>B-41/7, B-Block Market, Near Mother 
                            Dairy Booth, Sector 31, Noida, 
                            Uttar Pradesh.  Pin - 201301.
                         </li>
                         <li><i class="fi flaticon-phone-call"></i>+91-9711010235 / +91-9319358937</li>
                         <li><i class="fi flaticon-email"></i>info@gunjanhospital.org</li>
                      </ul>
                      
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- end container -->
    </div>
    <div class="wpo-lower-footer">
       <div class="container">
          <div class="row">
             <div class="col col-xs-12">
                <p class="copyright">© Copyright 2024-2025, All Rights Reserved by Gunjan Clininc 
                   <br> Designed by <a href="https://graphotive.com/" target="_blank">graphotive</a>
                </p>
             </div>
          </div>
       </div>
    </div>
 </footer> --}}
