@extends('admin.layouts.app')



@section('content')


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



<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Gallery Management</h3>
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
                    <a>Gallery Table</a>
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
                                        <input type="text" name="name" placeholder="event name" value="{{ old('name') }}" class="form-control">

                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
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

                                        @error('file_type')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Section Type:</strong>
                                        <br />
                                        <select name="section" class="form-control" id="section">
                                            <option value="">Select Option </option>
                                            <option value="1">Certificates</option>
                                            <option value="2">News</option>
                                            <option value="3">Other</option>
                                        </select>

                                        @error('section')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Sort order:</strong>
                                        <input type="text" minlenght="1" maxlenght="3" name="order" placeholder="sort order" value="{{ old('order') }}" class="form-control">

                                        @error('order')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

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


                                        <div class="col-3 urlInputContainer" style="display: none;">
                                            <input type="file" class="form-control" name="image[]" id="imageInput" />
                                        </div>

                                        <div class="col-3 urlInputContainer" style="display: none;">
                                            <input type="url" class="form-control" name="file[]" id="urlInput" placeholder="Enter Video URL" />
                                        </div>


                                        <div class="col-3">
                                            <button type="button" class="btn btn-danger" onclick="removeItem(this)">Delete</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary me-2 btn-sm" id="addButton" onclick="addItem()">Add Input</button>
                                </div>
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



    <script>
        $(document).ready(function() {
            $('#addButton').prop('disabled', true);
        });


        function addItem() {
            const container = $('#imageItemsContainer');
            const firstRow = container.find('.form-group').first();
            const newRow = firstRow.clone();
            newRow.find('input').val('');
            newRow.find('.btn-danger').prop('disabled', false);
            container.append(newRow);
        }

        function removeItem(button) {
            $(button).closest('.form-group').remove();
        }

    </script>

    <script>
        $(document).ready(function() {
            var clickCount = 0;
            $('#fileTypeSelect').change(function() {
                clickCount++;
                var selectedValue = $(this).val();
                $('#addButton').prop('disabled', false);
                if (selectedValue === 'i') {
                    $('#fileInputContainer').show();
                    $('.urlInputContainer').hide();
                    if (clickCount != 1) {
                        window.location.reload();
                    }
                } else if (selectedValue === 'v') {
                    $('#fileInputContainer').hide();
                    $('.urlInputContainer').show();
                    if (clickCount != 1) {
                        window.location.reload();
                    }
                } else {
                    $('#fileInputContainer').hide();
                    $('.urlInputContainer').hide();
                }
            });
        });

    </script>


    @endsection
