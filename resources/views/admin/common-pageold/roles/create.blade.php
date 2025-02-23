@extends('admin.layouts.app')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger text-danger">
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
            <h3 class="fw-bold mb-3">Role Management</h3>
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
                    <a>Role Create Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" minlength="2" maxlength="100"
                                            placeholder="Name" value="{{ old('name') }}" class="form-control preventnumeric">
                                        @error('name')
                                            <div class="text-danger">{{ $message ?? '' }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Permission:</strong>
                                        <br />
                                        @foreach ($permission as $value)
                                            <label><input type="checkbox" name="permission[{{ $value->id }}]"
                                                    value="{{ $value->id }}" class="name">
                                                {{ $value->name }}</label>
                                            <br />
                                        @endforeach

                                        @error('permission')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn btn-danger" href="{{ route('roles.index') }}"> Back</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
