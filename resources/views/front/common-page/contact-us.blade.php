@extends('front.layouts.app')

@section('content')


<!-- start wpo-page-title -->
<section class="wpo-page-title" style="background: url( {{ asset('front/assets/images/about-us/about-banner.jpg') }}) no-repeat center top/cover;">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Contact Us</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index.php">Home</a></li>
                        <li>Contact</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->


<!-- start wpo-contact-pg-section -->
<section class="wpo-contact-pg-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-10 offset-lg-1">
                <div class="office-info">
                    <div class="row">
                        <div class="col col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="office-info-item">
                                <div class="office-info-icon">
                                    <div class="icon">
                                        <i class="fi flaticon-placeholder"></i>
                                    </div>
                                </div>
                                <div class="office-info-text">
                                    <h2>Address</h2>
                                    <p>{{ $orgData->address ??"Address not available" }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="office-info-item">
                                <div class="office-info-icon">
                                    <div class="icon">
                                        <i class="fi flaticon-email"></i>
                                    </div>
                                </div>
                                <div class="office-info-text">
                                    <h2>Email Us</h2>
                                    <p>{{ $orgData->email ?? "Email not available" }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="office-info-item">
                                <div class="office-info-icon">
                                    <div class="icon">
                                        <i class="fi flaticon-phone-call"></i>
                                    </div>
                                </div>
                                <div class="office-info-text">
                                    <h2>Call Now</h2>
                                    <p>{{ $orgData->phone ?? "Phone not available" }}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wpo-contact-title">
                    <h2>Have Any Question?</h2>
                    <p>It is a long established fact that a reader will be distracted
                        content of a page when looking.</p>
                </div>
                <div class="wpo-contact-form-area">

                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            <div class="text-danger">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                    @endif


                    <form method="post" action="{{ url('contact-us') }}" >
                        <div class="row">
                            @csrf
                            <div class="col col-xl-4 col-lg-4 col-md-4 col-12">
                                <input type="text" minlength="3" maxlength="100" class="form-control preventnumeric" name="name" id="name" placeholder="Your Name*">
                         
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                          
                            </div>
                            <div class="col col-xl-4 col-lg-4 col-md-4 col-12">
                                <input type="email" minlength="3" maxlength="100" class="form-control" name="email" id="email" placeholder="Your Email*">
                           
                           
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col col-xl-4 col-lg-4 col-md-4 col-12">
                                <input type="text" minlength="10" maxlength="10" class="form-control mobile_no" name="phone" id="phone" placeholder="Phone">
                           
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                           
                            </div>

                            <div class="col col-xl-12 col-lg-12 col-md-12 col-12 pt-4">
                                <textarea class="form-control" name="message" id="note" placeholder="Message..."></textarea>
                           
                                @error('message')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                           
                           
                            </div>
                            <div class="submit-area pt-4">
                                <button type="submit" class="theme-btn-s4">Get in Touch</button>
                                {{-- <div id="loader">
                                    <i class="ti-reload"></i>
                                </div> --}}
                            </div>
                            {{-- <div class="clearfix error-handling-messages">
                                <div id="success">Thank you for getting in touch! We appreciate you contacting us</div>
                                <div id="error"> Error occurred while sending email. Please try again later. </div>
                            </div> --}}

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end wpo-contact-pg-section -->

<!--  start wpo-contact-map -->
<section class="wpo-contact-map-section">
    <h2 class="hidden">Contact map</h2>
    <div class="wpo-contact-map">
        <iframe src="{{ $orgData->map ?? "map not available" }}"></iframe>
    </div>
</section>
<!-- end wpo-contact-map -->


@endsection
