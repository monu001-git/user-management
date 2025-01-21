@extends('admin.layouts.app')

@section('content')
{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Banner</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('banners.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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





<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Banner Management</h3>
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
                <a>Banner Create Form</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Banner Create Form</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>title:</strong>
                                    <input type="text" name="title" placeholder="title" class="form-control">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Url:</strong>
                                    <input type="url" name="url" placeholder="url" class="form-control">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Link Type:</strong>
                                    <br />
                                    <select name="external" class="form-control">
                                        <option value="">Select value</option>
                                        <option value="0">External</option>
                                        <option value="1">Internal</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sort Order:</strong>
                                    <input type="number" name="order" placeholder="Sort order" class="form-control">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image</strong>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                            <input type="hidden" name="status" value="0" class="form-control">



                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                 <a class="btn btn-danger" href="{{ route('banners.index') }}"> Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
