@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit content</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('contents.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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

<form method="POST" action="{{ route('contents.update', dEncrypt($content->id)) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>content title:</strong>
                <input type="text" name="title" placeholder="title" value="{{ $content->title }}" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content Description:</strong>
                <textarea name="descriptions" placeholder="description" class="form-control">{{ $content->descriptions }}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Title:</strong>
                <input type="text" class="form-control" name="meta_title" placeholder="Please enter meta tittle, use for seo" value="{{ $content->meta_title }}" class="form-control">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Description:</strong>
                <textarea class="form-control" rows="4" name="meta_description" class="form-control" placeholder="Please enter meta description, use for seo">{{ $content->meta_description }}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta keyword:</strong>
                <textarea class="form-control" id="keyword" rows="4" class="form-control" name="meta_keyword" placeholder="Please enter meta keywords, use for seo">{{ $content->id }}</textarea><br>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content Image: [Width:1920px, Height:500px]</strong>
                <span style="color:green;font-size:12px;">
                    @if($content->image)
                    [{{$content->image}}]
                    @endif
                </span>

                <input type="file" name="image" class="form-control" @if($content->image)
                value="{{$content->image}}"
                @endif>
            </div>
        </div>

        <input type="hidden" name="status" value="{{ $content->status }}" class="form-control">




        <!-- Image Items Section --><br><br><br><br><br><br>
        <h5 style="text-align:center;">Content Image</h5>
        <div id="imageItemsContainer">
            @foreach ($imageContent as $imageContents)
            <div class="form-group row mb-3">
                <div class="col-3">
                    <strong>Image title:</strong>
                    <input type="text" class="form-control" name="imageTitle[]" placeholder="Image title" value="{{ $imageContents->imageTitle }}" />
                </div>
                <div class="col-3">
                    <strong>Image alt:</strong>
                    <input type="text" class="form-control" name="imageAlt[]" placeholder="Image Alt" value="{{ $imageContents->imageAlt }}" />
                </div>
                <div class="col-3">

                    <strong>Image:</strong>
                    <span style="color:green;font-size:12px;">
                        @if($imageContents->image)
                        [{{$imageContents->image}}]
                        @endif
                    </span>

                    <input type="file" name="multipleimage[]" class="form-control" @if($imageContents->image)
                    value="{{$imageContents->image}}"
                    @endif>


                </div>
                <input type="hidden" class="form-control" name="id[]" value="{{ $imageContents->id }}" />

                <div class="col-3">
                    <button type="button" class="btn btn-danger" onclick="removeItem(this)">Delete</button>
                </div>
            </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-primary" onclick="addItem()">Add New Image</button>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i>
                Submit</button>
        </div>
    </div>


</form>

<script>
    function addItem() {
        const container = document.getElementById('imageItemsContainer');
        const firstRow = container.querySelector('.form-group'); // Get the first row
        const newRow = firstRow.cloneNode(true); // Clone the first row

        // Reset the input values in the new row
        const inputs = newRow.querySelectorAll('input');
        inputs.forEach(input => input.value = ''); // Clear the values

        // Enable the "Delete" button in the new row
        const deleteButton = newRow.querySelector('.btn-danger');
        deleteButton.disabled = false;
        deleteButton.setAttribute("onclick", "removeItem(this)");

        // Append the new row to the container
        container.appendChild(newRow);
    }

    function removeItem(button) {
        const row = button.closest('.form-group'); 
        alert(row);
       // row.remove(); // Remove the row
    }

</script>

@endsection
