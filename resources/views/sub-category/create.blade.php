@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Sub Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('sub-category.index') }}">
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

<form action="{{ route('sub-category.store') }}" method="POST">
    @csrf

    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select name="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div id='TextBoxesGroup' class="col-md-9">
            <div id="TextBoxDiv1" class="textbox-div">
                <label>Title for Category #1:</label>
                <input type="text" class="form-control" id="title1" name="title[]" placeholder="Enter title">

                <label>Multiple Category #1:</label>
                <textarea class="form-control" style="height:50px" id='detail1' name="detail[]" placeholder="Multiple category details"></textarea>


                <label>Order for Category #1:</label>
                <input type="number" class="form-control" id="order1" name="order[]" placeholder="Enter order">

                <label>Url for Category #1:</label>
                <input type="url" class="form-control" id="url1" name="url[]" placeholder="Enter Url">

            </div>
        </div>


        <div class="col-md-2">
            <button type="button" class="btn btn-success btn-sm" id='addButton'>Add Sub Category</button>
            <button type="button" class="btn btn-danger btn-sm" id='removeButton'>Remove Sub Category</button>
        </div>

        <input type="hidden" value='0' name="status" class="form-control">


        <div class="col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa-solid fa-floppy-disk"></i> Submit
            </button>
        </div>
    </div>

</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let counter = 1; // Initialize the counter

        $("#addButton").click(function() {
            counter++; // Increment counter
            $("#TextBoxesGroup").append(`
        <div class="textbox-div">
            <label>Title for Category #${counter}:</label>
            <input type="text" class="form-control" id="title${counter}" name="title[]" placeholder="Enter title">
            
            <label>Multiple Category #${counter}:</label>
            <textarea class="form-control" style="height:50px" id="detail${counter}" name="detail[]" placeholder="Multiple category details"></textarea>
       
        <label>Order for Category #${counter}:</label>
            <input type="number" class="form-control" id="order${counter}" name="order[]" placeholder="Enter order">
           

    <label>Url for Category #${counter}:</label>
            <input type="url" class="form-control" id="url${counter}" name="url[]" placeholder="Enter url">
     

    
        </div>
    `);
        });
        $("#removeButton").click(function() {
            if (counter > 1) {
                $("#TextBoxesGroup .textbox-div:last-child").remove(); // Remove the last textbox
                counter--; // Decrement counter
            }
        });
    });

</script>
@endsection
