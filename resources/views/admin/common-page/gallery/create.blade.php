@extends('admin.layouts.app')



@section('content')


{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Gallery</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('gallery.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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





<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Gallery Management</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Gallery Table</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
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
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                        <a class="btn btn-danger" href="{{ route('gallery.index') }}"> Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

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
