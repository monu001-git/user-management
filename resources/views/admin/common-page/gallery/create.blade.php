@extends('admin.layouts.app')



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
            <h2>Create New Gallery</h2>
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

<form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Event Name:</strong>
                <input type="text" name="name" placeholder="event name" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File Type:</strong>
                <br />
                <select name="file_type" class="form-control" id="fileTypeSelect">
                    <option value="">Select File type</option>
                    <option value="i">Image</option>
                    <option value="v">Video</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>sort order:</strong>
                <input type="number" name="order" placeholder="sort order" class="form-control">
            </div>
        </div>

        <input type="hidden" name="status" value="0" class="form-control">

        <!-- Image Items Section --><br><br><br><br>
        <h5 style="text-align:center;">Upload Gallery</h5>
        <div id="imageItemsContainer">
            <div class="form-group row mb-3">
                <div class="col-3">
                    <input type="text" class="form-control" name="title[]" placeholder="title" />
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="alt[]" placeholder="Alt" />
                </div>


                <div class="col-3" id="fileInputContainer" style="display: none;">
                    <input type="file" class="form-control" name="file[]" id="fileInput" />
                </div>

                <div class="col-3" id="urlInputContainer" style="display: none;">
                    <input type="url" class="form-control" name="file[]" id="urlInput" placeholder="Enter Video URL" />
                </div>


                <div class="col-3">
                    <button type="button" class="btn btn-danger" onclick="removeItem(this)">Delete</button>
                </div>
            </div>

        </div>
        <button type="button" class="btn btn-primary me-2 btn-sm navad" onclick="addItem()">Add Input</button>
        <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i>
                Submit</button>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function addItem() {
        // Clone the first form-group row and append it to the container
        const container = $('#imageItemsContainer');
        const firstRow = container.find('.form-group').first();
        const newRow = firstRow.clone();

        // Reset the input values in the new row
        newRow.find('input').val('');

        // Enable the "Delete" button in the new row
        newRow.find('.btn-danger').prop('disabled', false);

        // Append the new row to the container
        container.append(newRow);
    }

    function removeItem(button) {
        // Remove the row that contains the clicked "Delete" button
        $(button).closest('.form-group').remove();
    }

</script>

<script>
    $(document).ready(function() {
        // When the dropdown selection changes
        $('#fileTypeSelect').change(function() {
            var selectedValue = $(this).val();

            // Show file input for Image (option "i")
            if (selectedValue === 'i') {
                $('#fileInputContainer').show();
                $('#urlInputContainer').hide();
            }
            // Show URL input for Video (option "v")
            else if (selectedValue === 'v') {
                $('#fileInputContainer').hide();
                $('#urlInputContainer').show();
            } else {
                $('#fileInputContainer').hide();
                $('#urlInputContainer').hide();
            }
        });
    });

</script>


@endsection
