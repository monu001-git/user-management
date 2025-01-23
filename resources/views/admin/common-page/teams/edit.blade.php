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

<div class="page-inner">
    <div class="page-header">

        <h3 class="fw-bold mb-3">Team Management</h3>
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
                <a>Team Update Form</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Team Update Form</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('teams.update', dEncrypt($team->id)) }}" enctype="multipart/form-data" >
                        @csrf
                         @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" placeholder="name" value="{{ $team->name }}" class="form-control">

                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <input type="text" name="email" placeholder="email" value="{{ $team->email }}" class="form-control">

                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Specialization:</strong>
                                    <input type="text" name="specialization" placeholder="specialization" value="{{ $team->specialization }}" class="form-control">

                                    @error('specialization')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Qualification:</strong>
                                    <input type="text" name="qualification" placeholder="qualification" value="{{ $team->qualification }}" class="form-control">

                                    @error('qualification')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Designation:</strong>
                                    <input type="text" name="designation" placeholder="designation" value="{{ $team->designation }}" class="form-control">

                                    @error('designation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sort Order:</strong>
                                    <input type="text" name="order" placeholder="Sort order" class="form-control" value="{{ $team->order }}" minlength="1" maxlength="3">
                                    @error('order')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <span style="color:green;font-size:12px;">
                                        @if($team->image)
                                        [{{$team->image}}]
                                        @endif
                                    </span>

                                    <input type="file" name="image" class="form-control" @if($team->image)
                                    value="{{$team->image}}"
                                    @endif>

                                </div>
                            </div>

                            <input type="hidden" name="status" value="{{ $team->status }}" class="form-control">


                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a class="btn btn-danger" href="{{ route('teams.index') }}"> Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
