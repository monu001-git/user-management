@extends('layouts.app')


@section('content')

<style>
    .navad {
        width: 80px;
        margin-left: 13px;
        height: 35px;
    }

</style>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit gallery</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('gallery.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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

<form method="POST" action="{{ route('gallery.update', dEncrypt($gallery->id)) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Event Name:</strong>
                <input type="text" name="name" placeholder="event name" value="{{ $gallery->name }}" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File Type:</strong>
                <br />
                <select name="file_type" class="form-control" id="fileTypeSelect" style="pointer-events: none;">
                    <option value="">Select File type</option>
                    <option value="i" {{ old('file_type', $gallery->file_type) == "i" ? 'selected' : '' }}>Image</option>
                    <option value="v" {{ old('file_type', $gallery->file_type) == "v" ? 'selected' : '' }}>Video</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>sort order:</strong>
                <input type="number" name="order" value="{{ $gallery->order }}" placeholder="sort order" class="form-control">
            </div>
        </div>


        <input type="hidden" name="status" value="{{ $gallery->status }}" class="form-control">

        <!-- Image Items Section --><br><br><br><br>
        <h5 style="text-align:center;">Gallery Upload</h5>
        <div id="imageItemsContainer">
            @foreach ($gallerydetail as $i =>$gallerydetails)
            <div class="form-group row mb-3">
                <div class="col-3">
                    <strong>Image title:</strong>
                    <input type="text" class="form-control" name="title[]" placeholder="Image title" value="{{ $gallerydetails->title }}" />
                </div>
                <div class="col-3">
                    <strong>Image alt:</strong>
                    <input type="text" class="form-control" name="alt[]" placeholder="Image Alt" value="{{ $gallerydetails->alt }}" />
                </div>

                <input type="hidden" class="form-control" name="id[]" value="{{ $gallerydetails->id }}" />


                @if($gallery->file_type == 'i')

                <div class="col-3">
                    <strong>Image:</strong>
                    <span style="color:green;font-size:12px;">
                        @if($gallerydetails->file)
                        [{{$gallerydetails->file}}]
                        @endif
                    </span>

                    <input type="file" name="file[]" class="form-control" @if($gallerydetails->file) value="{{$gallerydetails->file}}" @endif>
                </div>
                @else

                <div class="col-3">
                    <strong>video url</strong>
                    <input type="url" class="form-control" name="file[]" value="{{ $gallerydetails->file }}" />
                </div>
                @endif


                <div class="col-3">
                    <button type="button" class="btn btn-danger" data-id="{{ $gallerydetails->id }}" onclick="removeItem(this)">Delete</button>
                </div>
            </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-primary navad" onclick="addItem()">Add New Image</button>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i>
                Submit</button>
        </div>
    </div>


</form>
<script>
    function addItem() {

        var selectedFileType = $('#fileTypeSelect').val();

        const $container = $('#imageItemsContainer');
        const newRowHtml = `
        <div class="form-group row mb-3">
            <div class="col-3">
                <strong>Image title:</strong>
                <input type="text" class="form-control" name="title[]" placeholder="Image title" value="" />
            </div>
            <div class="col-3">
                <strong>Image alt:</strong>
                <input type="text" class="form-control" name="alt[]" placeholder="Image Alt" value="" />
            </div>

            <input type="hidden" class="form-control" name="id[]" value="" />

            <div class="col-3 fileInputContainer">
                <strong>Image :</strong>
                <input type="file" class="form-control" name="file[]" />
            </div>

            <div class="col-3 urlInputContainer">
                <strong>Video URL</strong>
                <input type="url" class="form-control" name="file[]" placeholder="Enter Video URL" />
            </div>

            <div class="col-3">
                <button type="button" class="btn btn-danger" onclick="removeItem(this)">Delete</button>
            </div>
        </div>
    `;

        // Append the new row HTML to the container
        $container.append(newRowHtml);

        // Now apply the visibility logic after appending the new row
        updateInputVisibility();
    }

    function updateInputVisibility() {
        const selectedFileType = $('#fileTypeSelect').val();

        // Target only the last row added
        const $lastRow = $('#imageItemsContainer .form-group').last();

        // Toggle visibility based on the selected file type
        if (selectedFileType == 'i') {
            $lastRow.find('.fileInputContainer').show();
            $lastRow.find('.urlInputContainer').hide();
        } else if (selectedFileType == 'v') {
            $lastRow.find('.fileInputContainer').hide();
            $lastRow.find('.urlInputContainer').show();
        }
    }



    function removeItem(button) {
        const id = $(button).data('id');

        if (id != undefined) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/delete-gallery-detail'
                , type: 'get'
                , data: {
                    id: id
                , }
                , success: function(response) {

                    if (response.status == 200) {
                        window.location.reload();
                    } else {

                    }

                }
                , error: function(xhr, status, error) {
                    alert(error);
                }
            });


        } else {
            const $row = $(button).closest('.form-group');
            $row.remove();
        }

    }

</script>




@endsection
