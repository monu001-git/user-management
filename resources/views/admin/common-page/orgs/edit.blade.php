@extends('admin.layouts.app')

@section('content')

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

                        <form method="POST" action="{{ route('orgs.update',dEncrypt($org->id)) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Meta Title:</strong>
                                        <input type="text" class="form-control" name="meta_title" placeholder="Please enter meta tittle, use for seo" value="{{ $org->meta_title ??'' }}" class="form-control">

                                        @error('meta_title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Meta Description:</strong>
                                        <textarea class="form-control" rows="4" name="meta_description" class="form-control" placeholder="Please enter meta description, use for seo">{{ $org->meta_description ??"" }}</textarea>

                                        @error('meta_description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Meta keyword:</strong>
                                        <textarea class="form-control" id="keyword" rows="4" class="form-control" name="meta_keyword" placeholder="Please enter meta keywords, use for seo">{{ $org->meta_keyword ??'' }}</textarea><br>

                                        @error('meta_keyword')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" placeholder="Name" value="{{ $org->name }}" class="form-control">

                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>email:</strong>
                                        <input type="email" name="email" placeholder="email" value="{{ $org->email }}" class="form-control">

                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>phone:</strong>
                                        <input type="text" name="phone" placeholder="phone" value="{{ $org->phone }}" class="form-control">

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
                                        <textarea class="form-control" id="about" rows="4" class="form-control" name="about">{{ $org->about ??'' }}</textarea><br>

                                        @error('about')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Header logo:</strong>
                                        <span style="color:green;font-size:12px;">
                                            @if($org->header_logo)
                                            [{{$org->header_logo}}]
                                            @endif
                                        </span>

                                        <input type="file" name="header_logo" class="form-control" @if($org->header_logo)
                                        value="{{$org->header_logo}}"
                                        @endif>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Header logo title:</strong>
                                        <input type="text" name="header_logo_title" value="{{ $org->header_logo_title ??"" }}" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Favicon :</strong>
                                        <span style="color:green;font-size:12px;">
                                            @if($org->favicon)
                                            [{{$org->favicon}}]
                                            @endif
                                        </span>

                                        <input type="file" name="favicon" class="form-control" @if($org->favicon)
                                        value="{{$org->favicon}}"
                                        @endif>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Favicon title:</strong>
                                        <input type="text" name="favicon_title" value="{{ $org->favicon_title ??"" }}" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Footer logo:</strong>
                                        <span style="color:green;font-size:12px;">
                                            @if($org->footer_logo)
                                            [{{$org->footer_logo}}]
                                            @endif
                                        </span>

                                        <input type="file" name="footer_logo" class="form-control" @if($org->footer_logo)
                                        value="{{$org->footer_logo}}"
                                        @endif>

                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Footer logo title:</strong>
                                        <input type="text" name="header_logo_title" value="{{ $org->header_logo_title }}" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>instagram:</strong>
                                        <input type="text" name="instagram" value="{{ $org->instagram  ??'' }}" placeholder="instagram" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>instagram title :</strong>
                                        <input type="text" name="instagram_title" value="{{ $org->instagram_title  ??"" }}" placeholder="Instagram title" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Facebook:</strong>
                                        <input type="text" name="facebook" value="{{ $org->facebook ??"" }}" placeholder="Facebook" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Facebook title :</strong>
                                        <input type="text" name="facebook_title" value="{{ $org->facebook_title  ??"" }}" placeholder="Instagram title" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>twitter:</strong>
                                        <input type="text" name="twitter" value="{{ $org->twitter  ??"" }}" placeholder="twitter" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>twitter title :</strong>
                                        <input type="text" name="twitter_title" value="{{ $org->twitter_title  ??"" }}" placeholder="Twitter_title" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Youtube:</strong>
                                        <input type="text" name="youtube" placeholder="youtube" value="{{ $org->youtube ??''}}" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Youtube title :</strong>
                                        <input type="text" name="youtube_title" placeholder="youtube title" value="{{ $org->youtube_title ??""  }}" class="form-control">
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
