@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('category.index') }}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('category.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>catgory:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
          <div class="col-md-12">
            <div class="form-group">
                <strong>Short Order:</strong>
                <input type="number" name="order" class="form-control" placeholder="order">
            </div>
        </div>
    
        <input type="hidden" value='0' name="status" class="form-control" >

        <div class="col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa-solid fa-floppy-disk"></i> Submit
            </button>
        </div>
        
    </div>
</form>

@endsection
