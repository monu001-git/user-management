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
            <h3 class="fw-bold mb-3"> <a>Organization Structure Tables</a></h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a>
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Organization Update Form</a>
                </li>

            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <form method="POST" action="{{ route('orgs.update', dEncrypt($org->id)) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Meta Title:</strong>
                                        <input type="text" class="form-control preventnumeric" name="meta_title" minlength="3" maxlength="100" placeholder="Please enter meta tittle, use for seo" value="{{ $org->meta_title ?? '' }}">

                                        @error('meta_title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Meta Description:</strong>
                                        <textarea class="form-control" rows="4" name="meta_description" class="form-control" placeholder="Please enter meta description, use for seo">{!! $org->meta_description ?? '' !!}</textarea>

                                        @error('meta_description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Meta keyword:</strong>
                                        <textarea class="form-control" id="keyword" rows="4" class="form-control" name="meta_keyword" placeholder="Please enter meta keywords, use for seo">{!! $org->meta_keyword ?? '' !!}</textarea><br>

                                        @error('meta_keyword')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" minlength="3" maxlength="100" placeholder="Name" value="{{ $org->name ?? '' }}" class="form-control  preventnumeric">

                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>email:</strong>
                                        <input type="email" name="email" minlength="3" maxlength="100" placeholder="email" value="{{ $org->email ?? '' }}" class="form-control">

                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>phone:</strong>
                                        <input type="text" name="phone" minlength="10" maxlength="10" placeholder="phone" value="{{ $org->phone ?? '' }}" class="form-control mobile_no">

                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>whatsapp:</strong>
                                        <input type="text" name="whatsapp" minlength="3" maxlength="100" value="{{ $org->whatsapp ??'' }}" placeholder="whatsapp" class="form-control ">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Address:</strong>
                                        <textarea class="form-control" id="address" rows="4" class="form-control" name="address">{!! $org->address ?? '' !!}</textarea><br>

                                        @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>About Footer:</strong>
                                        <textarea class="form-control" id="about" rows="4" class="form-control" name="about">{!! $org->about ?? '' !!}</textarea><br>

                                        @error('about')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Header logo:</strong>
                                        <span style="color:green;font-size:12px;">
                                            @if ($org->header_logo)
                                            [{{ $org->header_logo }}]
                                            @endif
                                        </span>

                                        <input type="file" name="header_logo" class="form-control image" @if ($org->header_logo) value="{{ $org->header_logo ?? '' }}" @endif>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Header logo title:</strong>
                                        <input type="text" minlength="3" maxlength="30" placeholder="enter logo title" name="header_logo_title" value="{{ $org->header_logo_title ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Favicon :</strong>
                                        <span style="color:green;font-size:12px;">
                                            @if ($org->favicon)
                                            [{{ $org->favicon }}]
                                            @endif
                                        </span>

                                        <input type="file" name="favicon" class="form-control image" @if ($org->favicon) value="{{ $org->favicon }}" @endif>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Favicon title:</strong>
                                        <input type="text" name="favicon_title" minlength="3" maxlength="30" placeholder="enter favicon title" value="{{ $org->favicon_title ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Footer logo:</strong>
                                        <span style="color:green;font-size:12px;">
                                            @if ($org->footer_logo)
                                            [{{ $org->footer_logo }}]
                                            @endif
                                        </span>

                                        <input type="file" name="footer_logo" class="form-control image" @if ($org->footer_logo) value="{{ $org->footer_logo ?? '' }}" @endif>

                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Footer logo title:</strong>
                                        <input type="text" name="header_logo_title" minlength="3" maxlength="30" placeholder="enter logo title" value="{{ $org->header_logo_title ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Map:</strong>
                                        <input type="text" minlength="3" maxlength="400" placeholder="Enter Map Path" name="map" value="{{ $org->map ?? '' }}" class="form-control">
                                    </div>
                                </div>

                                <hr>
                                <h3>Social media</h3>

                                {{-- Social media --}}

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>instagram:</strong>
                                        <input type="text" name="instagram" placeholder="enter instagram url" value="{{ $org->instagram ?? '' }}" placeholder="instagram" minlength="3" maxlength="100" class="form-control ">
                                    </div>
                                </div>


                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>instagram title :</strong>
                                        <input type="text" name="instagram_title" minlength="3" maxlength="100" value="{{ $org->instagram_title ?? '' }}" placeholder="Instagram title" class="form-control preventnumeric">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Facebook:</strong>
                                        <input type="text" name="facebook" value="{{ $org->facebook ?? '' }}" minlength="3" maxlength="100" placeholder="Facebook" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Facebook title :</strong>
                                        <input type="text" name="facebook_title" value="{{ $org->facebook_title ?? '' }}" placeholder="Instagram title" minlength="3" maxlength="100" class="form-control preventnumeric">
                                    </div>
                                </div>



                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Youtube:</strong>
                                        <input type="text" name="youtube" placeholder="youtube" minlength="3" maxlength="100" value="{{ $org->youtube ?? '' }}" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Youtube title :</strong>
                                        <input type="text" name="youtube_title" minlength="3" maxlength="100" value="{{ $org->youtube_title ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>

                                <hr>
                                <h3>Count</h3>


                                {{-- count --}}


                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count Number 1 :</strong>
                                        <input type="text" name="number_count1" placeholder="Enter First count Number" minlength="1" maxlength="3" value="{{ $org->number_count1 ?? '' }}" class="form-control mobile_no">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count Unit 1:</strong>
                                        <input type="text" name="unit_count1" placeholder="Enter First count Unit" minlength="1" maxlength="8" value="{{ $org->unit_count1 ?? '' }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count text 1:</strong>
                                        <input type="text" name="text_count1" placeholder="Enter First count Text" minlength="1" maxlength="30" value="{{ $org->text_count1 ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>


                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count Number 2 :</strong>
                                        <input type="text" name="number_count2" placeholder="Enter Secound count Number" minlength="1" maxlength="3" value="{{ $org->number_count2 ?? '' }}" class="form-control mobile_no">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count Unit 2:</strong>
                                        <input type="text" name="unit_count2" placeholder="Enter Secound count Unit" minlength="1" maxlength="8" value="{{ $org->unit_count2 ?? '' }}" class="form-control ">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count text 2 :</strong>
                                        <input type="text" name="text_count2" placeholder="Enter Secound count Text" minlength="1" maxlength="30" value="{{ $org->text_count2 ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count Number 3 :</strong>
                                        <input type="text" name="number_count3" placeholder="Enter Third count Number" minlength="1" maxlength="3" value="{{ $org->number_count3 ?? '' }}" class="form-control mobile_no">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count Unit 3:</strong>
                                        <input type="text" name="unit_count3" placeholder="Enter Third count Unit" minlength="1" maxlength="8" value="{{ $org->unit_count3 ?? '' }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count text 3 :</strong>
                                        <input type="text" name="text_count3" placeholder="Enter Third count Text" minlength="1" maxlength="30" value="{{ $org->text_count3 ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>



                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count Number 4 :</strong>
                                        <input type="text" name="number_count4" placeholder="Enter Fourth count Number" minlength="1" maxlength="3" value="{{ $org->number_count4 ?? '' }}" class="form-control mobile_no">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count Unit 4:</strong>
                                        <input type="text" name="unit_count4" placeholder="Enter Fourth count Unit" minlength="1" maxlength="8" value="{{ $org->unit_count4 ?? '' }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count text 4 :</strong>
                                        <input type="text" name="text_count4" placeholder="Enter Fourth count Text" minlength="1" maxlength="30" value="{{ $org->text_count4 ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>



                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count Heading:</strong>
                                        <input type="text" name="count_heading" minlength="3" maxlength="100" value="{{ $org->count_heading ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Count phone:</strong>
                                        <input type="text" name="count_phone" minlength="10" maxlength="10" value="{{ $org->count_phone ?? '' }}" class="form-control mobile_no">
                                    </div>
                                </div>


                                <hr>
                                <h3>SPECIALITIES</h3>


                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Specialities title :</strong>
                                        <input type="text" name="specialities_title" minlength="3" maxlength="30" value="{{ $org->specialities_title ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Specialities heading :</strong>
                                        <input type="text" name="specialities_heading" minlength="3" maxlength="100" value="{{ $org->specialities_heading ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Specialities description 1 :</strong>
                                        <textarea class="form-control" rows="4" name="specialities_description1" class="form-control" placeholder="Please enter meta description, use for seo">{!! $org->specialities_description1 ?? '' !!}</textarea>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Specialities description 2 :</strong>
                                        <textarea class="form-control" rows="4" name="specialities_description2" class="form-control" placeholder="Please enter meta description, use for seo">{!! $org->specialities_description2 ?? '' !!}</textarea>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Specialities Phone:</strong>
                                        <input type="text" name="specialities_phone" minlength="10" maxlength="10"  placeholder="phone" value="{{ $org->specialities_phone ??'' }}" class="form-control mobile_no">
                                    </div>
                                </div>


                                <hr>
                                <h3>Team</h3>


                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Team title :</strong>
                                        <input type="text" name="team_title" minlength="3" maxlength="30" value="{{ $org->team_title ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Team heading :</strong>
                                        <input type="text" name="team_heading" minlength="3" maxlength="100" value="{{ $org->team_heading ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Team description 1 :</strong>
                                        <textarea class="form-control" rows="4" name="team_description1" class="form-control">{!! $org->team_description1 ?? '' !!}</textarea>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Team description 2 :</strong>
                                        <textarea class="form-control" rows="4" name="team_description2" class="form-control">{!! $org->team_description2 ?? '' !!}</textarea>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Team Phone:</strong>
                                        <input type="text" name="team_phone" minlength="10" maxlength="10" value="{{ $org->team_phone ?? '' }}" placeholder="phone" class="form-control mobile_no">
                                    </div>
                                </div>

                                <hr>
                                <h3>News & Video</h3>


                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>News title :</strong>
                                        <input type="text" name="news_title" minlength="3" maxlength="30" value="{{ $org->news_title ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>News Heading :</strong>
                                        <input type="text" name="news_heading"  minlength="3" maxlength="100" value="{{ $org->news_heading ?? '' }}" class="form-control preventnumeric">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>News description :</strong>
                                        <textarea class="form-control" rows="4" name="news_description" class="form-control">{!! $org->news_description ??"" !!}</textarea>
                                    </div>
                                </div>




                                <hr>
                                <h3>WHAT MAKES US DIFFERENT?</h3>



                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Middle Image:</strong>
                                        <span style="color:green;font-size:12px;">
                                            @if ($org->middle_image)
                                            [{{ $org->middle_image }}]
                                            @endif
                                        </span>

                                        <input type="file" name="middle_image" class="form-control image" @if ($org->middle_image) value="{{ $org->middle_image ??'' }}" @endif>

                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Points :</strong>
                                        <textarea class="form-control" rows="4" name="some_point" class="form-control">{!! $org->some_point ??'' !!}</textarea>
                                    </div>
                                </div>


                                <hr>
                                <h3>Testimonial</h3>
                                


                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Testimonial title :</strong>
                                        <input type="text" name="testimonial_title" placeholder="Enter testimonial title" value="{{ $org->testimonial_title ??"" }}" minlength="3" maxlength="30" class="form-control preventnumeric">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong><Tfoot></Tfoot>Testimonial number :</strong>
                                        <input type="text" name="testimonial_number" placeholder="Enter testimonial number" value="{{ $org->testimonial_number ??""}}"  minlength="3" maxlength="100" class="form-control mobile_no">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Testimonial heading :</strong> 
                                        <input type="text" name="testimonial_heading" placeholder="Enter testimonial heading" minlength="3" maxlength="100" value="{{ $org->testimonial_heading ??"" }}" class="form-control preventnumeric">
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
    @endsection
