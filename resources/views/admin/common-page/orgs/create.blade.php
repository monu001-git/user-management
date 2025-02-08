@extends('admin.layouts.app')

@section('content')
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


    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Organization Structure Management</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Organization Create Form</a>
                    </li>

                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <form method="POST" action="{{ route('orgs.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Meta Title *:</strong>
                                            <input type="text" class="form-control preventnumeric" name="meta_title"
                                                minlength="3" maxlength="100"
                                                placeholder="Please enter meta tittle, use for seo"
                                                value="{{ old('meta_title') }}">

                                            @error('meta_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Meta Description *:</strong>

                                            <textarea class="form-control" id="meta_description" rows="4" name="meta_description"
                                                placeholder="Please enter meta description, use for seo">{!! old('meta_description') !!}</textarea>

                                            @error('meta_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Meta keyword *:</strong>
                                            <textarea class="form-control" id="keyword" rows="4" class="form-control" name="meta_keyword"
                                                placeholder="Please enter meta keywords, use for seo">{!! old('meta_keyword') !!}</textarea><br>

                                            @error('meta_keyword')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name *:</strong>
                                            <input type="text" name="name" minlength="3" maxlength="100"
                                                value="{{ old('name') }}" placeholder="Name"
                                                class="form-control preventnumeric">

                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Email *:</strong>
                                            <input type="email" name="email" minlength="3" maxlength="100"
                                                value="{{ old('email') }}" placeholder="email" class="form-control">

                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>phone :</strong>
                                            <input type="text" name="phone" minlength="10" maxlength="50"
                                                value="{{ old('phone') }}" placeholder="phone"
                                                class="form-control  mobile_no">

                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror


                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>whatsapp:</strong>
                                            <input type="text" name="whatsapp" minlength="3" maxlength="100"
                                                value="{{ old('whatsapp') }}" placeholder="whatsapp" class="form-control ">


                                        </div>
                                    </div>



                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Address:</strong>
                                            <textarea class="form-control" id="address" rows="4" class="form-control" name="address">{!! old('address') !!}</textarea><br>

                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>About Footer:</strong>
                                            <textarea class="form-control" id="about" rows="4" class="form-control" name="about">{!! old('about') !!}</textarea><br>

                                            @error('about')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>



                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Header logo:</strong>
                                            <input type="file" name="header_logo" class="form-control image">

                                            @error('header_logo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Header logo title:</strong>
                                            <input type="text" minlength="3" maxlength="30"
                                                value="{{ old('header_logo_title') }}" placeholder="enter logo title"
                                                name="header_logo_title" class="form-control preventnumeric">

                                            @error('header_logo_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Favicon :</strong>
                                            <input type="file" name="favicon" class="form-control image">

                                            @error('favicon')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Favicon title:</strong>
                                            <input type="text" minlength="3" maxlength="30"
                                                placeholder="enter favicon title" name="favicon_title"
                                                value="{{ old('favicon_title') }}" class="form-control preventnumeric">
                                            @error('favicon_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>



                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Footer logo:</strong>
                                            <input type="file" name="footer_logo" class="form-control image">

                                            @error('footer_logo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Footer logo title:</strong>
                                            <input type="text" minlength="3" maxlength="30" name="footer_logo_title"
                                                value="{{ old('footer_logo_title') }}"
                                                class="form-control preventnumeric">
                                            @error('footer_logo_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Map:</strong>
                                            <input type="text" minlength="3" maxlength="400" name="map"
                                                value="{{ old('map') }}" class="form-control">

                                        </div>
                                    </div>

                                    <hr>
                                    <h3>Social media</h3>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>instagram:</strong>
                                            <input type="text" name="instagram" minlength="3" maxlength="100"
                                                value="{{ old('instagram') }}" placeholder="instagram"
                                                class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>instagram title :</strong>
                                            <input type="text" name="instagram_title" minlength="3" maxlength="100"
                                                value="{{ old('instagram_title') }}" placeholder="instagram title"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Facebook:</strong>
                                            <input type="text" name="facebook" minlength="3" maxlength="100"
                                                value="{{ old('facebook') }}" placeholder="Facebook"
                                                class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Facebook title :</strong>
                                            <input type="text" name="facebook_title" minlength="3" maxlength="100"
                                                value="{{ old('facebook_title') }}" placeholder="Instagram title"
                                                class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Youtube:</strong>
                                            <input type="text" name="youtube" minlength="3" maxlength="100"
                                                value="{{ old('youtube') }}" placeholder="youtube" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Youtube title :</strong>
                                            <input type="text" name="youtube_title" minlength="3" maxlength="100"
                                                value="{{ old('youtube_title') }}" placeholder="youtube title"
                                                class="form-control">
                                        </div>
                                    </div>


                                    <hr>
                                    <h3>Count</h3>
                                    {{-- counter --}}


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count Number 1 :</strong>
                                            <input type="text" name="number_count1"
                                                value="{{ old('number_count1') }}" placeholder="Enter First count Number"
                                                minlength="1" maxlength="3" class="form-control mobile_no">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count Unit 1:</strong>
                                            <input type="text" name="unit_count1" value="{{ old('unit_count1') }}"
                                                placeholder="Enter First count Unit" minlength="1" maxlength="8"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count text 1:</strong>
                                            <input type="text" name="text_count1" value="{{ old('text_count1') }}"
                                                placeholder="Enter First count Text" minlength="1" maxlength="30"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count Number 2 :</strong>
                                            <input type="text" name="number_count2"
                                                value="{{ old('number_count2') }}"
                                                placeholder="Enter Secound count Number" minlength="1" maxlength="3"
                                                class="form-control mobile_no">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count Unit 2:</strong>
                                            <input type="text" name="unit_count2" value="{{ old('unit_count2') }}"
                                                placeholder="Enter Secound count Unit" minlength="1" maxlength="8"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count text 2 :</strong>
                                            <input type="text" name="text_count2" value="{{ old('text_count2') }}"
                                                placeholder="Enter Secound count Text" minlength="1" maxlength="30"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count Number 3 :</strong>
                                            <input type="text" name="number_count3"
                                                value="{{ old('number_count3') }}" placeholder="Enter Third count Number"
                                                minlength="1" maxlength="3" class="form-control moblie_no">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count Unit 3:</strong>
                                            <input type="text" name="unit_count3" value="{{ old('unit_count3') }}"
                                                placeholder="Enter Third count unit" minlength="1" maxlength="8"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count text 3 :</strong>
                                            <input type="text" name="text_count3" value="{{ old('text_count3') }}"
                                                placeholder="Enter Third count Text" minlength="1" maxlength="30"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count Number 4 :</strong>
                                            <input type="text" name="number_count4"
                                                value="{{ old('number_count4') }}"
                                                placeholder="Enter Fourth count Number" minlength="1" maxlength="3"
                                                class="form-control moblie_no">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count Unit 4:</strong>
                                            <input type="text" name="unit_count4" value="{{ old('unit_count4') }}"
                                                placeholder="Enter Fourth count unit" minlength="1" maxlength="8"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count text 4 :</strong>
                                            <input type="text" name="text_count4" value="{{ old('text_count4') }}"
                                                placeholder="Enter Fourth count Text" minlength="1" maxlength="30"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count Heading:</strong>
                                            <input type="text" name="count_heading"
                                                value="{{ old('count_heading') }}" minlength="3" maxlength="100"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count phone:</strong>
                                            <input type="text" name="count_phone" value="{{ old('count_phone') }}"
                                                minlength="10" maxlength="10" class="form-control mobile_no">
                                        </div>
                                    </div>

                                    <hr>
                                    <h3>SPECIALITIES</h3>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Specialities title :</strong>
                                            <input type="text" name="specialities_title"
                                                value="{{ old('specialities_title') }}" minlength="3" maxlength="30"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Specialities heading :</strong>
                                            <input type="text" name="specialities_heading"
                                                value="{{ old('specialities_heading') }}" minlength="3" maxlength="100"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Specialities description 1 :</strong>
                                            <textarea class="form-control" rows="4" name="specialities_description1" class="form-control">{!! old('specialities_description1') !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Specialities description 2 :</strong>
                                            <textarea class="form-control" rows="4" name="specialities_description2" class="form-control">{!! old('specialities_description2') !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Specialities Phone:</strong>
                                            <input type="text" name="specialities_phone" minlength="10"
                                                value="{{ old('specialities_phone') }}" maxlength="10"
                                                placeholder="phone" class="form-control mobile_no">
                                        </div>
                                    </div>

                                    <hr>
                                    <h3>Team</h3>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Team title :</strong>
                                            <input type="text" name="team_title" value="{{ old('count_phone') }}"
                                                minlength="3" maxlength="30" class="form-control preventnumeric">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Team Heading :</strong>
                                            <input type="text" name="team_heading" minlength="3" maxlength="100"
                                                value="{{ old('team_heading') }}" class="form-control preventnumeric">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Team description 1 :</strong>
                                            <textarea class="form-control" rows="4" name="team_description1" class="form-control">{!! old('team_description1') !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Team description 2 :</strong>
                                            <textarea class="form-control" rows="4" name="team_description2" class="form-control"> {!! old('team_description2') !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Team Phone:</strong>
                                            <input type="text" name="team_phone" placeholder="phone" minlength="10"
                                                value="{{ old('team_phone') }}" maxlength="10"
                                                class="form-control mobile_no">
                                        </div>
                                    </div>



                                    <hr>
                                    <h3>News & Video</h3>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>News title :</strong>
                                            <input type="text" name="news_title" minlength="3" maxlength="30"
                                                placeholder="Enter news title" value="{{ old('news_title') }}"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>News Heading :</strong>
                                            <input type="text" name="news_heading" minlength="3" maxlength="100"
                                                placeholder="Enter news heading" value="{{ old('news_heading') }}"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>News description :</strong>
                                            <textarea class="form-control" rows="4" name="news_description" class="form-control">{!! old('news_description') !!}</textarea>
                                        </div>
                                    </div>



                                    <hr>
                                    <h3>WHAT MAKES US DIFFERENT?</h3>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Middle Image:</strong>
                                            <input type="file" name="middle_image" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Points :</strong>
                                            <textarea class="form-control" rows="4" name="some_point" class="form-control">{!! old('some_point') !!}</textarea>
                                        </div>
                                    </div>


                                    <hr>
                                    <h3>Testimonial</h3>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Testimonial title :</strong>
                                            <input type="text" name="testimonial_title"
                                                placeholder="Enter testimonial title"
                                                value="{{ old('testimonial_title') }}" minlength="3" maxlength="30"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>
                                                <Tfoot></Tfoot>Testimonial number :
                                            </strong>
                                            <input type="text" name="testimonial_number"
                                                placeholder="Enter testimonial number"
                                                value="{{ old('testimonial_number') }}" minlength="1" maxlength="10"
                                                class="form-control mobile_no">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Testimonial heading :</strong>
                                            <input type="text" name="testimonial_heading"
                                                placeholder="Enter testimonial heading" minlength="3" maxlength="100"
                                                value="{{ old('testimonial_heading') }}"
                                                class="form-control preventnumeric">
                                        </div>
                                    </div>


                                    <div class="card-action">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a class="btn btn-danger" href="{{ route('orgs.index') }}"> Back</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            CKEDITOR.replace('meta_description');
            CKEDITOR.replace('meta_keyword');
            CKEDITOR.replace('address');
            CKEDITOR.replace('about');
            CKEDITOR.replace('specialities_description1');
            CKEDITOR.replace('specialities_description2');
            CKEDITOR.replace('team_description1');
            CKEDITOR.replace('team_description2');
            CKEDITOR.replace('news_description');
            CKEDITOR.replace('some_point');
        </script>
    @endsection
