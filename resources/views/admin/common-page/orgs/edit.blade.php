@extends('admin.layouts.app')

@section('content')
{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit org structure</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('orgs.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
</div>
</div>
</div> --}}

{{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif --}}




<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3"> <a >Organization Structure Tables</a></h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a >
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a >Organization Update Form</a>
                </li>
               
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                   
                    <div class="card-body">

                        <form method="POST" action="{{ route('orgs.update',dEncrypt($org->id)) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" placeholder="Name" value="{{ $org->name }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>email:</strong>
                                        <input type="email" name="email" placeholder="email" value="{{ $org->email }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>phone:</strong>
                                        <input type="number" name="phone" placeholder="phone" value="{{ $org->phone }}" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>logo:</strong>
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>logo title:</strong>
                                        <input type="text" name="logo_title" value="{{ $org->logo_title }}" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>instagram:</strong>
                                        <input type="text" name="instagram" value="{{ $org->instagram  }}" placeholder="instagram" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>instagram title :</strong>
                                        <input type="text" name="instagram_title" value="{{ $org->instagram_title  }}" placeholder="Instagram title" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Facebook:</strong>
                                        <input type="text" name="facebook" value="{{ $org->facebook  }}" placeholder="Facebook" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Facebook title :</strong>
                                        <input type="text" name="facebook_title" value="{{ $org->facebook_title  }}" placeholder="Instagram title" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>twitter:</strong>
                                        <input type="text" name="twitter" value="{{ $org->twitter  }}" placeholder="twitter" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Twitter title :</strong>
                                        <input type="text" name="twitter_title" value="{{ $org->twitter_title  }}" placeholder="Twitter_title" class="form-control">
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
