@extends('front.layouts.app')

@section('content')
    <!-- start wpo-page-title -->
    <section class="wpo-page-title"
        style="background: url( {{ asset('front/assets/images/page-title.jpg') }}) no-repeat center top/cover;">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>Latest News & Blog</h2>
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="index.php">Home</a></li>
                            <li>Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end page-title -->

    <!-- start wpo-blog-pg-section -->
    <section class="wpo-blog-pg-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-8">
                    <div class="wpo-blog-content">
                        @if (isset($blog) && count($blog) > 0)
                            @foreach ($blog as $blogs)
                                <div class="post format-standard-image">
                                    <div class="entry-media">
                                        <img src=" {{ asset('uploads/blog/' . $blogs->image) }}" alt>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><i class="fi flaticon-user"></i> By <a href="#">{{ $blogs->user_name ??'' }}</a>
                                            </li>
                                            <li><i class="fi flaticon-calendar-1"></i> 
                                             
                                                {{ $blogs->created_at ? $blogs->created_at->format('d-m-Y') : '' }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="entry-details">
                                        <h3><a href="when-should-you-visit-a-dermatologist.php">
                                                {{ $blogs->title ?? '' }}
                                            </a></h3>
                                        <p>
                                            @if (!empty($blogs->description))
                                                {!! $blogs->description ?? '' !!}
                                            @endif
                                        </p>

                                        <a href="when-should-you-visit-a-dermatologist.php" class="read-more">READ
                                            MORE...</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="col col-lg-4">
                    <div class="blog-sidebar">
                        <div class="widget recent-post-widget">
                            <h3>Recent Posts</h3>
                            <div class="posts">
                                <div class="post">
                                    <div class="img-holder">
                                        <img src="{{ asset('front/assets/images/blog/dermatologist.webp') }}" alt>
                                    </div>
                                    <div class="details">
                                        <h4><a href="when-should-you-visit-a-dermatologist.php">A dermatologist
                                                provides skin and hair treatment be it hair loss,</a>
                                        </h4>
                                        <span class="date">20 DEC 2024 </span>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="img-holder">
                                        <img src="{{ asset('front/assets/images/blog/vaccination.webp') }}" alt>
                                    </div>
                                    <div class="details">
                                        <h4><a href="debunking-myths-around-vaccination.php">Debunking Myths
                                                Around Vaccination: Everything you Should Know</a></h4>
                                        <span class="date">19 DEC 2024 </span>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="widget tag-widget">
                            <h3>Tags</h3>
                            <ul>
                                <li><a href="robotics-surgeries.php">Robotic Surgery</a></li>
                                <li><a href="laser-treatment.php">Laser Treatment</a></li>
                                <li><a href="general-physician.php">General Physician</a></li>
                                <li><a href="aesthetic-surgeries.php">Aesthetic Surgeries</a></li>
                                <li><a href="gynaecology-and-obstetrics.php">Gynaecology & Obstetrics</a></li>
                                <li><a href="lifestyle-and-nutrition.php">Lifestyle & Nutrition</a></li>
                                <li><a href="pharmacy.php">Pharmacy</a></li>
                                <li><a href="csr-with-ddf.php">CSR With DDF</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end wpo-blog-pg-section -->
@endsection
