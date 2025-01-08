@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New menu</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('menus.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

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

<form method="POST" action="{{ route('menus.store') }}">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" placeholder="Name" class="form-control">
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
                <strong>Parent Name:</strong>
                <br />
                <select name="parentId" class="form-control">

                    <option value="">Select option</option>
                    @foreach($parentId as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content Name:</strong>
                <br />
                <select name="contendId" class="form-control">

                    <option value="">Select option</option>
                    @foreach($contentId as $value)
                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                    @endforeach
                </select>
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



        <input type="hidden" name="status" value="0" class="form-control">

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>
</form>


@endsection
