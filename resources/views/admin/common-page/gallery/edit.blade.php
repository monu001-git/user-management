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
                    <a>Gallery Update Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('gallery.update', dEncrypt($gallery->id)) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" minlength="3" maxlength="100"
                                            placeholder="event name" value="{{ $gallery->name }}"
                                            class="form-control preventnumeric">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>File Type:</strong>
                                        <br />
                                        <select name="file_type" class="form-control" id="fileTypeSelect"
                                            style="pointer-events: none;">
                                            <option value="">Select File type</option>
                                            <option value="i"
                                                {{ old('file_type', $gallery->file_type) == 'i' ? 'selected' : '' }}>Image
                                            </option>
                                            <option value="v"
                                                {{ old('file_type', $gallery->file_type) == 'v' ? 'selected' : '' }}>Video
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Section Type:</strong>
                                        <br />
                                        <select name="section" class="form-control" id="section">
                                            <option value="">Select Option </option>
                                            <option value="1"
                                                {{ old('section', $gallery->section) == '1' ? 'selected' : '' }}>
                                                Certificates</option>
                                            <option value="2"
                                                {{ old('section', $gallery->section) == '2' ? 'selected' : '' }}>News Section
                                            </option>

                                            <option value="5"  {{ old('section', $gallery->section) == '5' ? 'selected' : '' }}>Image Section</option>
                                            <option value="3"
                                                {{ old('section', $gallery->section) == '3' ? 'selected' : '' }}>Doctor
                                            </option>
                                            <option value="4"
                                                {{ old('section', $gallery->section) == '4' ? 'selected' : '' }}>Model Image
                                            </option>
                                        </select>

                                        @error('section')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12" id="doctorDropdown" style="display: none;">
                                    <div class="form-group">
                                        <strong>Doctor:</strong>
                                        <br />
                                        <select name="doctor" class="form-control" id="doctorList">
                                            <option value="">Select doctor</option>
                                            @foreach ($doctor as $doctorlist)
                                            <option value="{{ $doctorlist->id }}"
                                                {{ old('doctor', $gallery->doctor) == $doctorlist->id ? 'selected' : '' }}>
                                                {{ $doctorlist->name }}
                                            </option>
                                        @endforeach
                                        </select>


                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Sort order:</strong>
                                        <input type="text" minlength="1" maxlength="3" name="order"
                                            value="{{ $gallery->order }}" placeholder="sort order"
                                            class="form-control mobile_no">
                                    </div>
                                </div>


                                <input type="hidden" name="status" value="{{ $gallery->status }}" class="form-control">

                                <!-- Image Items Section --><br><br><br><br>
                                <h5 style="text-align:center;">Gallery Upload</h5>
                                <div id="imageItemsContainer">
                                    @foreach ($gallerydetail as $i => $gallerydetails)
                                        <div class="form-group row mb-3">

                                            <div class="col-4">
                                                <strong>Image title:</strong>
                                                <input type="text" class="form-control preventnumeric" minlength="3"
                                                    maxlength="100" name="title[]" placeholder="Image title"
                                                    value="{{ $gallerydetails->title ?? '' }}" />
                                            </div>


                                            <input type="hidden" class="form-control" name="id[]"
                                                value="{{ $gallerydetails->id ?? '' }}" />


                                            @if ($gallery->file_type == 'i')
                                                <div class="col-4">
                                                    <strong>Image:</strong>
                                                    <span style="color:green;font-size:12px;">
                                                        @if ($gallerydetails->image)
                                                            [{{ $gallerydetails->image }}]
                                                        @endif
                                                    </span>

                                                    <input type="file" name="image1[]" class="form-control image"
                                                        @if ($gallerydetails->image) value="{{ $gallerydetails->image }}" @endif>
                                                </div>
                                            @else
                                                <div class="col-3">
                                                    <strong>Image:</strong>
                                                    <span style="color:green;font-size:12px;">
                                                        @if ($gallerydetails->image)
                                                            [{{ $gallerydetails->image }}]
                                                        @endif
                                                    </span>

                                                    <input type="file" name="image2[]" class="form-control image"
                                                        @if ($gallerydetails->image) value="{{ $gallerydetails->image }}" @endif>
                                                </div>



                                                <div class="col-3">
                                                    <input type="text" class="form-control" minlength="3"
                                                        maxlength="100" name="url[]"
                                                        value="{{ $gallerydetails->file ?? '' }}" id="urlInput"
                                                        placeholder="Enter Video URL" />
                                                </div>
                                            @endif


                                            <div class="col-3">
                                                <button type="button" class="btn btn-danger"
                                                    data-id="{{ $gallerydetails->id }}"
                                                    onclick="removeItem(this)">Delete</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary me-2 btn-sm" onclick="addItem()">Add
                                        Input</button>
                                </div><br><br>
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
        function addItem() {
            // Get selected value from the dropdown
            var selectedValue = $('#fileTypeSelect').val();

            // Enable the add button
            $('#addButton').prop('disabled', false);

            // Visibility toggle based on selected value
            if (selectedValue === 'i') {
                $('.fileInputContainer').show();
                $('.urlInputContainer').hide();
            } else if (selectedValue === 'v') {
                $('.fileInputContainer').hide();
                $('.urlInputContainer').show();
            } else {
                $('.fileInputContainer').hide();
                $('.urlInputContainer').hide();
            }

            // Generate new row HTML
            const $container = $('#imageItemsContainer');
            const newRowHtml = `
        <div class="form-group row mb-3">
            <div class="col-3">
                <strong>Image title:</strong>
                <input type="text" minlenght="1" maxlenght="100"  class="form-control preventnumeric" name="title[]" placeholder="Image title" value="" />
            </div>

            <input type="hidden" class="form-control" name="id[]" value="" />

            <div class="col-3 fileInputContainer" style="display: none;">
                <input type="file" class="form-control image" name="image1[]" id="fileInput" />
            </div>

            <div class="col-3 urlInputContainer" style="display: none;">
                <input type="file" class="form-control image" name="image2[]" id="imageInput" />
            </div>

            <div class="col-3 urlInputContainer" style="display: none;">
                <input type="text" minlength="3" maxlength="100" class="form-control" name="url[]" id="urlInput" placeholder="Enter Video URL" />
            </div>

            <div class="col-3">
                <button type="button" class="btn btn-danger" onclick="removeItem(this)">Delete</button>
            </div>
        </div>
    `;

            // Append the new row HTML to the container
            const $newRow = $(newRowHtml);
            $container.append($newRow);

            // Apply visibility rules to the newly added row
            if (selectedValue === 'i') {
                $newRow.find('.fileInputContainer').show();
                $newRow.find('.urlInputContainer').hide();
            } else if (selectedValue === 'v') {
                $newRow.find('.fileInputContainer').hide();
                $newRow.find('.urlInputContainer').show();
            } else {
                $newRow.find('.fileInputContainer').hide();
                $newRow.find('.urlInputContainer').hide();
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
                    url: '/delete-gallery-detail',
                    type: 'get',
                    data: {
                        id: id,
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            window.location.reload();
                        } else {

                        }

                    },
                    error: function(xhr, status, error) {
                        alert(error);
                    }
                });


            } else {
                const $row = $(button).closest('.form-group');
                $row.remove();
            }

        }

        $(document).ready(function() {
            // $('#doctorDropdown').hide();
            // $('#section').trigger('change');
            // $('#section').change(function() {
                var sectionValue = $('#section').val();
                if (sectionValue == '3') {
                    $('#doctorDropdown').show();
                    $('#doctorList').attr('required', 'required');
                } else {
                    $('#doctorDropdown').hide();
                    $('#doctorList').removeAttr('required');
                }
            // });
        });
    </script>
@endsection
