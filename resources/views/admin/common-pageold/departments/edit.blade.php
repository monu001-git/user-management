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

            <h3 class="fw-bold mb-3">Department Management</h3>
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
                    <a>Department Update Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('departments.update', dEncrypt($department->id)) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Department:</strong>
                                        <input type="text" name="department" minlength="1" maxlength="100"
                                            placeholder="department" value="{{ $department->department ?? ' ' }}"
                                            class="form-control preventnumeric">

                                        @error('department')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn btn-danger" href="{{ route('departments.index') }}"> Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
