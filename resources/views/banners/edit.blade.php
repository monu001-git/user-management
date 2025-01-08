@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit banner</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('banners.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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

<form method="POST" action="{{ route('banners.update',dEncrypt($banner->id)) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>title:</strong>
                <input type="text" name="title" placeholder="title" class="form-control" value="{{ $banner->title }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea name="description" class="form-control">{{ $banner->description }}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Url:</strong>
                <input type="url" name="url" placeholder="url" value="{{ $banner->url }}" class="form-control">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Link Type:</strong>
                <br />
                <select name="external" class="form-control">
                    <option value="">Select value</option>
                    <option value="0" {{ old('external', $banner->external) == 0 ? 'selected' : '' }}>External</option>
                    <option value="1" {{ old('external', $banner->external) == 1 ? 'selected' : '' }}>Internal</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sort Order:</strong>
                <input type="number" name="order" value={{ $banner->order }} placeholder="Sort order" class="form-control">
            </div>
        </div>

        <input type="hidden" name="status" value="{{ $banner->status }}" class="form-control">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image: [Width:1920px, Height:500px]</strong>
                <span style="color:green;font-size:12px;">
                    @if($banner->image)
                    [{{$banner->image}}]
                    @endif
                </span>

                <input type="file" name="image" class="form-control" @if($banner->image)
                value="{{$banner->image}}"
                @endif>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>
</form>

@endsection
