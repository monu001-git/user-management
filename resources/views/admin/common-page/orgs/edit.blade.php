@extends('admin.layouts.app')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
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

                            <form method="POST" action="{{ route('orgs.update', dEncrypt($org->id)) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Meta Title:</strong>
                                            <input type="text" class="form-control" name="meta_title"
                                                placeholder="Please enter meta tittle, use for seo"
                                                value="{{ $org->meta_title ?? '' }}" class="form-control">

                                            @error('meta_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Meta Description:</strong>
                                            <textarea class="form-control" rows="4" name="meta_description" class="form-control"
                                                placeholder="Please enter meta description, use for seo">{{ $org->meta_description ?? '' }}</textarea>

                                            @error('meta_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Meta keyword:</strong>
                                            <textarea class="form-control" id="keyword" rows="4" class="form-control" name="meta_keyword"
                                                placeholder="Please enter meta keywords, use for seo">{{ $org->meta_keyword ?? '' }}</textarea><br>

                                            @error('meta_keyword')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="name" placeholder="Name"
                                                value="{{ $org->name }}" class="form-control">

                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>email:</strong>
                                            <input type="email" name="email" placeholder="email"
                                                value="{{ $org->email }}" class="form-control">

                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>phone:</strong>
                                            <input type="text" name="phone" placeholder="phone"
                                                value="{{ $org->phone }}" class="form-control">

                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Address:</strong>
                                            <textarea class="form-control" id="address" rows="4" class="form-control" name="address">{{ $org->address }}</textarea><br>

                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>About Footer:</strong>
                                            <textarea class="form-control" id="about" rows="4" class="form-control" name="about">{{ $org->about ?? '' }}</textarea><br>

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

                                            <input type="file" name="header_logo" class="form-control"
                                                @if ($org->header_logo) value="{{ $org->header_logo }}" @endif>

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Header logo title:</strong>
                                            <input type="text" name="header_logo_title"
                                                value="{{ $org->header_logo_title ?? '' }}" class="form-control">
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

                                            <input type="file" name="favicon" class="form-control"
                                                @if ($org->favicon) value="{{ $org->favicon }}" @endif>

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Favicon title:</strong>
                                            <input type="text" name="favicon_title"
                                                value="{{ $org->favicon_title ?? '' }}" class="form-control">
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

                                            <input type="file" name="footer_logo" class="form-control"
                                                @if ($org->footer_logo) value="{{ $org->footer_logo }}" @endif>

                                        </div>
                                    </div>



                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Footer logo title:</strong>
                                            <input type="text" name="header_logo_title"
                                                value="{{ $org->header_logo_title }}" class="form-control">
                                        </div>
                                    </div>
                                    <hr>
                                    <h3>Social media</h3>

                                    {{-- Social media --}}

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>instagram:</strong>
                                            <input type="text" name="instagram" value="{{ $org->instagram ?? '' }}"
                                                placeholder="instagram" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>instagram title :</strong>
                                            <input type="text" name="instagram_title"
                                                value="{{ $org->instagram_title ?? '' }}" placeholder="Instagram title"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Facebook:</strong>
                                            <input type="text" name="facebook" value="{{ $org->facebook ?? '' }}"
                                                placeholder="Facebook" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Facebook title :</strong>
                                            <input type="text" name="facebook_title"
                                                value="{{ $org->facebook_title ?? '' }}" placeholder="Instagram title"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>twitter:</strong>
                                            <input type="text" name="twitter" value="{{ $org->twitter ?? '' }}"
                                                placeholder="twitter" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>twitter title :</strong>
                                            <input type="text" name="twitter_title"
                                                value="{{ $org->twitter_title ?? '' }}" placeholder="Twitter_title"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Youtube:</strong>
                                            <input type="text" name="youtube" placeholder="youtube"
                                                value="{{ $org->youtube ?? '' }}" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Youtube title :</strong>
                                            <input type="text" name="youtube_title" placeholder="youtube title"
                                                value="{{ $org->youtube_title ?? '' }}" class="form-control">
                                        </div>
                                    </div>

                                    <hr>
                                    <h3>Count</h3>


                                    {{-- count --}}


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count 1 :</strong>
                                            <input type="text" name="number_count1"
                                                value="{{ $org->number_count1 ?? '' }}" placeholder="youtube title"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count text 1:</strong>
                                            <input type="text" name="text_count1"
                                                value="{{ $org->text_count1 ?? '' }}" placeholder="youtube title"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Unit 1:</strong>
                                            <input type="text" name="unit_count1"
                                                value="{{ $org->unit_count1 ?? '' }}" class="form-control">
                                        </div>
                                    </div>



                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count 2 :</strong>
                                            <input type="text" name="number_count2"
                                                value="{{ $org->number_count2 ?? '' }}" placeholder="youtube title"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count text 2 :</strong>
                                            <input type="text" name="text_count2"
                                                value="{{ $org->text_count2 ?? '' }}" placeholder="youtube title"
                                                class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Unit 2:</strong>
                                            <input type="text" name="unit_count2"
                                                value="{{ $org->unit_count2 ?? '' }}" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count 3 :</strong>
                                            <input type="text" name="number_count3"
                                                value="{{ $org->number_count3 ?? '' }}" placeholder="youtube title"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count text 3 :</strong>
                                            <input type="text" name="text_count3"
                                                value="{{ $org->text_count3 ?? '' }}" placeholder="youtube title"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Unit 3:</strong>
                                            <input type="text" name="unit_count3"
                                                value="{{ $org->unit_count3 ?? '' }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count 4 :</strong>
                                            <input type="text" name="number_count4"
                                                value="{{ $org->number_count4 ?? '' }}" placeholder="youtube title"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count text 4 :</strong>
                                            <input type="text" name="text_count4"
                                                value="{{ $org->text_count4 ?? '' }}" placeholder="youtube title"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Unit 4:</strong>
                                            <input type="text" name="unit_count4"
                                                value="{{ $org->unit_count4 ?? '' }}" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count Heading:</strong>
                                            <input type="text" name="count_heading"
                                                value="{{ $org->count_heading ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Count phone:</strong>
                                            <input type="text" name="count_phone"
                                                value="{{ $org->count_phone ?? '' }}" class="form-control">
                                        </div>
                                    </div>


                                    <hr>
                                    <h3>SPECIALITIES</h3>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Specialities title :</strong>
                                            <input type="text" name="specialities_title"
                                                value="{{ $org->specialities_title ?? '' }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Specialities heading :</strong>
                                            <input type="text" name="specialities_heading"
                                                value="{{ $org->specialities_heading ?? '' }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Specialities description 1 :</strong>
                                            <textarea class="form-control" rows="4" name="Specialities_description1" class="form-control"
                                                placeholder="Please enter meta description, use for seo">{{ $org->Specialities_description1 ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Specialities description 2 :</strong>
                                            <textarea class="form-control" rows="4" name="Specialities_description2" class="form-control"
                                                placeholder="Please enter meta description, use for seo">{{ $org->Specialities_description2 ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Specialities Phone:</strong>
                                            <input type="text" name="Specialities_phone" placeholder="phone"
                                                value="{{ $org->Specialities_phone }}" class="form-control">
                                        </div>
                                    </div>


                                    <hr>
                                    <h3>Team</h3>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Team title :</strong>
                                            <input type="text" name="team_title" value="{{ $org->team_title ?? '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Team heading :</strong>
                                            <input type="text" name="team_heading"
                                                value="{{ $org->team_heading ?? '' }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Team description 1 :</strong>
                                            <textarea class="form-control" rows="4" name="team_description1" class="form-control">{{ $org->Specialities_description2 ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Team description 2 :</strong>
                                            <textarea class="form-control" rows="4" name="team_description2" class="form-control">{{ $org->Specialities_description2 ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Team Phone:</strong>
                                            <input type="text" name="team_phone" value="{{ $org->team_phone ?? '' }}"
                                                placeholder="phone" class="form-control">
                                        </div>
                                    </div>

                                    <hr>
                                    <h3>News & Video</h3>


                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>News title :</strong>
                                            <input type="text" name="news_title" value="{{ $org->news_title ?? '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>News Heading :</strong>
                                            <input type="text" name="news_heading"
                                                value="{{ $org->news_heading ?? '' }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>News description :</strong>
                                            <textarea class="form-control" rows="4" name="news_description" class="form-control">{{ $org->news_description }}</textarea>
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

                                            <input type="file" name="middle_image" class="form-control"
                                                @if ($org->middle_image) value="{{ $org->middle_image }}" @endif>

                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Points :</strong>
                                            <textarea class="form-control" rows="4" name="some_point" class="form-control">{!! $org->some_point !!}</textarea>
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
