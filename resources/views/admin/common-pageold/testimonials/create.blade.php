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
        <h3 class="fw-bold mb-3">Testimonial Management</h3>
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
                <a>Testimonial Create Form</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('testimonials.store') }}" >
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" minlength="1" maxlength="100" name="name" placeholder="name" class="form-control preventnumeric">

                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                           

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sender:</strong>
                                    <input type="text" minlength="1" maxlength="100" name="sender" placeholder="sender" class="form-control preventnumeric">

                                    @error('sender')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <input type="text" minlength="1" maxlength="200" name="description" placeholder="description" class="form-control preventnumeric">

                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                         

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sort Order:</strong>
                                    <input type="text" minlength="1" maxlength="3" name="order" placeholder="Sort order" class="form-control mobile_no" >
                                    @error('order')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <input type="hidden" name="status" value="0" class="form-control">


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
