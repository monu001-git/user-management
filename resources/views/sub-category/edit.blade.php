@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Sub category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('sub-category.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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

<form action="{{ route('sub-category.update', $subCategory->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Include this to specify the PUT method for updates -->

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select name="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $subCategory->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Title for Category</label>
                <input type="text" class="form-control" name="title" value='{{$subCategory->title}}' placeholder="Enter title">
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label>Multiple Category detail:</label>
                <textarea class="form-control" style="height:50px" name="detail" placeholder="Multiple category details">{{$subCategory->detail}}</textarea>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Order for Category</label>
                <input type="number" class="form-control" value='{{$subCategory->order}}' name="order" placeholder="Enter order">
            </div>
        </div>


    <div class="col-md-12">
            <div class="form-group">
                <label>Url for Category</label>
                <input type="url" class="form-control" value='{{$subCategory->url}}' name="url" placeholder="Enter url">
            </div>
        </div>



        <input type="hidden" value='{{$subCategory->id}}' name="id" class="form-control">
        <input type="hidden" value='{{$subCategory->status}}' name="status" class="form-control">

        <div class="col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa-solid fa-floppy-disk"></i> Update
            </button>
        </div>
    </div>
</form>

@endsection
