 <footer class="wpo-site-footer fhome">
     <div class="wpo-upper-footer">
         <div class="container">
             <div class="row">
                 <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="logo widget-title text-center mb-5 logo-f">
                         @if(isset($orgData->footer_logo))
                         <a href="{{ url('/') }}"><img src="{{ asset('uploads/logo/footerlogo'.'/'.$orgData->footer_logo) ??"" }}" title="{{ $orgData->footer_logo_title ??"" }}"></a>
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
                                 @if(isset($orgData->facebook) && !empty($orgData->facebook) )
                                 <li><a href="{{ $orgData->facebook ??''}}" title="{{  $orgData->facebook_title ??'' }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                 @endif

                                 @if(isset($orgData->instagram) && !empty($orgData->instagram) )
                                 <li><a href="{{ $orgData->instagram ?? "" }}" title="{{  $orgData->instagram_title ??'' }}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                 @endif

                                 @if(isset($orgData->youtube) && !empty($orgData->youtube) )
                                 <li><a href="{{ $orgData->youtube ??"" }}" title="{{  $orgData->youtube_title ??'' }}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
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
                                 @foreach ($footerMenu->slice(0,8) as $footerMenus)
                                 <li><a href="{{ url($footerMenus->url) }}">– {{ $footerMenus->name ??"" }}</a></li>
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
                                 <li><a href="{{ url($footerMenus->url) }}">– {{ $footerMenus->name ??"" }}</a></li>
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
                                 <li><i class="fi flaticon-placeholder"></i>{!! $orgData->address ??"Address not available" !!}</li>
                                 <li><i class="fi flaticon-phone-call"></i>{{ $orgData->phone ?? "Phone not available" }}</li>
                                 <li><i class="fi flaticon-email"></i>{{ $orgData->email ?? "Email not available" }}</li>
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
 </footer>
