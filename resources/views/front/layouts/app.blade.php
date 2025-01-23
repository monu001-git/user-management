<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front/assets/images/favicon.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="{{ $orgData->meta_keyword ??"" }}">
    <meta name="description" content="{{ $orgData->meta_description ??"" }}">


    <title>Gunjan Clinin | Noida</title>
    <link href="{{ asset('front/assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/bootstrap.min.css?ver=1.1') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/owl.carousel.css?ver=1.1') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/owl.theme.css?ver=1.1') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/slick.css?ver=1.1') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/swiper.min.css?ver=1.1') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/owl.transitions.css?ver=1.1') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/jquery.fancybox.css?ver=1.1') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/odometer-theme-default.css?ver=1.1') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/sass/style.css?ver=1.1') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/sass/responsive.css?ver=1.1') }}" rel="stylesheet">
</head>
<body>
    <!-- start page-wrapper -->
    <div class="page-wrapper">

        @include('front.partials.header')

        @yield('content')

        @include('front.partials.footer')

    </div>
    <!-- end of page-wrapper -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--button type="button" class="btn-close btnrk" data-bs-dismiss="modal" aria-label="Close"></button-->
                <div class="modal-body p-0">
                    <div data-slide="slide" class="slide">
                        <div class="slide-items">
                            <img src="{{ asset('front/assets/images/story/story-01.jpg') }}" alt="story">
                        </div>
                        <div class="slide-items">
                            <img src="{{ asset('front/assets/images/story/story-02.jpg') }}" alt="story">
                        </div>
                        <div class="slide-items">
                            <img src="{{ asset('front/assets/images/story/story-03.jpg') }}" alt="story">
                        </div>
                        <!--div class="slide-items">
							 <video class="videostory" autoplay muted>
								 <source src="https://cdn.pixabay.com/video/2024/03/14/204214-923594173_large.mp4" type="video/mp4">
							 </video>
						</div -->
                        <nav class="slide-nav">
                            <div class="slide-thumbs"></div>
                            <button class="slide-prev">Previous</button>
                            <button class="slide-next">Next</button>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal end -->


    <!-- end of page-wrapper -->
    <div class="three-button">
        <a href="tel:9711010235">
            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 34 34">
                    <g transform="translate(-1637 96)">
                        <path d="M17,0A17,17,0,1,1,0,17,17,17,0,0,1,17,0Z" transform="translate(1637 -96)" fill="#02aa7e" />
                        <g transform="translate(1644 -89)">
                            <g transform="translate(0 0)">
                                <path d="M173.584,301.9a.714.714,0,0,0-.109,1.412,2.132,2.132,0,0,1,1.654,2.539.714.714,0,0,0,1.4.294,3.582,3.582,0,0,0-2.758-4.231A.715.715,0,0,0,173.584,301.9Z" transform="translate(-162.26 -296.264)" fill="#fff" fill-rule="evenodd" />
                                <path d="M174.372,297.984a.714.714,0,0,0-.071,1.409,4.989,4.989,0,0,1,3.861,5.923.714.714,0,1,0,1.4.294A6.439,6.439,0,0,0,174.6,298a.715.715,0,0,0-.223-.011Z" transform="translate(-162.496 -295.146)" fill="#fff" fill-rule="evenodd" />
                                <path d="M175.14,294.079a.714.714,0,0,0-.015,1.4,7.846,7.846,0,0,1,6.068,9.307.714.714,0,1,0,1.4.294,9.3,9.3,0,0,0-7.172-11A.714.714,0,0,0,175.14,294.079Z" transform="translate(-162.732 -294.027)" fill="#fff" fill-rule="evenodd" />
                                <path d="M161.557,294.012a1.954,1.954,0,0,0-1.751.96,12.574,12.574,0,0,0-.13,12.766v0a12.636,12.636,0,0,0,11.147,6.268,1.979,1.979,0,0,0,1.837-1.31l1.027-2.62a2.339,2.339,0,0,0-.692-2.655l-1.843-1.511a2.03,2.03,0,0,0-3.019.541l-.691,1.179a7.1,7.1,0,0,1-2.921-2.69h0a7.057,7.057,0,0,1-.855-4.059l1.307.084A1.941,1.941,0,0,0,167,298.73l-.391-2.342a2.341,2.341,0,0,0-1.953-1.925l-2.793-.424a2.292,2.292,0,0,0-.3-.026Zm.089,1.438,2.793.425a.9.9,0,0,1,.759.748l.391,2.342a.481.481,0,0,1-.522.576L163,299.409a.714.714,0,0,0-.751.6,8.581,8.581,0,0,0,1.035,5.65h0a8.612,8.612,0,0,0,4.133,3.619.714.714,0,0,0,.891-.3l1.056-1.805a.574.574,0,0,1,.88-.158l1.841,1.512a.9.9,0,0,1,.268,1.028l-1.025,2.62a1.212,1.212,0,0,1-.533.4,11.118,11.118,0,0,1-9.771-16.87,1.216,1.216,0,0,1,.617-.261Z" transform="translate(-158 -294.011)" fill="#fff" fill-rule="evenodd" />
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="btn-text"><span>Book an Appointment</span> +91 9711010235</div>
        </a>
        <a href="#">
            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 34 34">
                    <g transform="translate(-909 -955)">
                        <circle cx="17" cy="17" r="17" transform="translate(909 955)" fill="#02aa7e" />
                        <g transform="translate(856.628 961.5)">
                            <g transform="translate(61.39)">
                                <path d="M191.843,94.414H193a.272.272,0,0,1,.272.272v1.159a.272.272,0,0,0,.272.272h1.334a.272.272,0,0,0,.272-.272V94.686a.272.272,0,0,1,.272-.272h1.159a.272.272,0,0,0,.272-.272V92.808a.272.272,0,0,0-.272-.272h-1.159a.272.272,0,0,1-.272-.272V91.1a.272.272,0,0,0-.272-.272h-1.334a.272.272,0,0,0-.272.272v1.159a.272.272,0,0,1-.272.272h-1.159a.272.272,0,0,0-.272.272v1.334A.272.272,0,0,0,191.843,94.414Z" transform="translate(-186.232 -87.106)" fill="#fff" stroke="#fee" stroke-width="0.3" />
                                <path d="M77.354,2.217A2.219,2.219,0,0,0,75.137,0H63.607A2.219,2.219,0,0,0,61.39,2.217V18.783A2.219,2.219,0,0,0,63.607,21h8.12a.528.528,0,0,0,.372-.154l5.1-5.1a.531.531,0,0,0,.154-.372V2.217ZM72.253,19.2v-2.14A1.166,1.166,0,0,1,73.417,15.9h2.14ZM76.3,14.847H73.417A2.219,2.219,0,0,0,71.2,17.063v2.884H63.607a1.166,1.166,0,0,1-1.164-1.164V2.217a1.166,1.166,0,0,1,1.164-1.164H75.137A1.166,1.166,0,0,1,76.3,2.217v12.63Z" transform="translate(-61.39)" fill="#fff" stroke="#fee" stroke-width="0.3" />
                                <path d="M134.959,284.224h-9.717a.526.526,0,0,0,0,1.052h9.717a.526.526,0,0,0,0-1.052Z" transform="translate(-122.119 -272.566)" fill="#fff" stroke="#fee" stroke-width="0.3" />
                                <path d="M130.592,347.512h-5.35a.526.526,0,1,0,0,1.052h5.35a.526.526,0,1,0,0-1.052Z" transform="translate(-122.119 -333.259)" fill="#fff" stroke="#fee" stroke-width="0.3" />
                                <path d="M130.592,410.8h-5.35a.526.526,0,1,0,0,1.052h5.35a.526.526,0,1,0,0-1.052Z" transform="translate(-122.119 -393.951)" fill="#fff" stroke="#fee" stroke-width="0.3" />
                            </g>
                        </g>
                    </g>
                </svg></div>
            <div class="btn-report">Download Reports</div>
        </a>
        <a href="https://wa.me/919711010235?text=Hello" target="_blank">
            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 34 34">
                    <g transform="translate(-1071 -955)">
                        <circle cx="17" cy="17" r="17" transform="translate(1071 955)" fill="#02aa7e" />
                        <g transform="translate(1077 961.506)">
                            <path d="M18.356,23.218H22.27a.356.356,0,1,0,0-.712H18.356a.356.356,0,0,0,0,.712Z" transform="translate(-11.595 -14.179)" fill="#fff" stroke="#fff" stroke-width="0.5" />
                            <path d="M20.829,29.506H13.356a.356.356,0,1,0,0,.712h7.473a.356.356,0,1,0,0-.712Z" transform="translate(-8.374 -18.688)" fill="#fff" stroke="#fff" stroke-width="0.5" />
                            <path d="M20.829,36.506H13.356a.356.356,0,0,0,0,.712h7.473a.356.356,0,1,0,0-.712Z" transform="translate(-8.374 -23.197)" fill="#fff" stroke="#fff" stroke-width="0.5" />
                            <path d="M16.093.494H9.172a5.259,5.259,0,0,0-5,3.673A5.266,5.266,0,0,0,0,9.311v4.037A5.392,5.392,0,0,0,4.982,18.63v2.306a.543.543,0,0,0,.318.522.47.47,0,0,0,.179.036.53.53,0,0,0,.374-.164l.541-.541a7.389,7.389,0,0,1,5.271-2.147h.513a5.271,5.271,0,0,0,5.014-3.7,5.383,5.383,0,0,0,4.159-5.152V5.752A5.264,5.264,0,0,0,16.093.494ZM12.179,17.931h-.513A8.1,8.1,0,0,0,5.89,20.286l-.2.2V16.808a.356.356,0,0,0-.712,0v1.1a4.666,4.666,0,0,1-4.27-4.565V9.311a4.554,4.554,0,0,1,3.6-4.447L4.5,4.833c.131-.022.256-.038.377-.049.1-.008.2-.014.3-.015.026,0,.054,0,.079,0h6.921a4.551,4.551,0,0,1,4.546,4.546v4.037c0,.129-.009.256-.019.381-.005.061-.011.121-.019.183,0,.039-.012.077-.017.115a4.76,4.76,0,0,1-.11.523l-.054.2A4.557,4.557,0,0,1,12.179,17.931ZM20.64,9.789a4.663,4.663,0,0,1-3.269,4.372c0-.028.006-.056.01-.084.012-.09.025-.179.033-.27.014-.153.023-.307.023-.459V9.311a5.255,5.255,0,0,0-5.258-5.258H5.238c-.093,0-.186,0-.282.009A4.55,4.55,0,0,1,9.172,1.206h6.921A4.551,4.551,0,0,1,20.64,5.752Z" transform="translate(0 0)" fill="#fff" stroke="#fff" stroke-width="0.5" />
                        </g>
                    </g>
                </svg></div>
            <div class="btn-report">Chat With Us</div>
        </a>
    </div>


    <!-- All JavaScript files
         ================================================== -->
    <script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugins for this template -->
    <script src="{{ asset('front/assets/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery.dlmenu.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery-plugin-collection.js') }}"></script>
    <!-- Custom script for this template -->
    <script src="{{ asset('front/assets/js/script.js') }}"></script>
    <script src="{{ asset('front/assets/js/slide-stories.js') }}"></script>

</body>
</html>
