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
                                            <strong>Name:</strong>
                                            <input type="text" name="name" minlength="3" maxlength="100"
                                                placeholder="event name" value="{{ old('name') }}"
                                                class="form-control preventnumeric">

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
                                                <option value="i" {{ old('file_type') == 'i' ? 'selected' : '' }}>Image
                                                </option>
                                                <option value="v" {{ old('file_type') == 'v' ? 'selected' : '' }}>Video
                                                </option>
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
                                                <option value="">Select Option</option>
                                                <option value="1" {{ old('section') == '1' ? 'selected' : '' }}>
                                                    Certificates</option>
                                                <option value="2" {{ old('section') == '2' ? 'selected' : '' }}>News
                                                </option>
                                                <option value="3" {{ old('section') == '3' ? 'selected' : '' }}>Doctor
                                                </option>
                                                <option value="4" {{ old('section') == '4' ? 'selected' : '' }}>Model
                                                    Image</option>
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
                                                        {{ old('doctor') == $doctorlist->id ? 'selected' : '' }}>
                                                        {{ $doctorlist->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('doctor')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Sort order:</strong>
                                            <input type="text" minlength="1" maxlength="3"name="order"
                                                placeholder="sort order" value="{{ old('order') }}"
                                                class="form-control mobile_no">

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
                                            <div class="col-4">
                                                <input type="text" minlength="3" maxlength="100"
                                                    class="form-control preventnumeric" name="title[]"
                                                    placeholder="title" />
                                            </div>


                                            <div class="col-4" id="fileInputContainer" style="display: none;">
                                                <input type="file" minlength="3" maxlength="100"
                                                    class="form-control image" name="image1[]" id="fileInput" />
                                            </div>


                                            <div class="col-4 urlInputContainer" style="display: none;">
                                                <input type="file" class="form-control image" name="image2[]"
                                                    id="imageInput" />
                                            </div>

                                            <div class="col-4 urlInputContainer" style="display: none;">
                                                <input type="text" class="form-control" minlength="3" maxlength="100"
                                                    name="url[]" id="urlInput" placeholder="Enter Video URL" />
                                            </div>


                                            <div class="col-3">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="removeItem(this)">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-primary me-2 btn-sm" id="addButton"
                                            onclick="addItem()">Add Input</button>
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
                $('#doctorDropdown').hide();
                $('#section').trigger('change');
                $('#section').change(function() {
                    var sectionValue = $(this).val();
                    if (sectionValue == '3') {
                        $('#doctorDropdown').show();
                        $('#doctorList').attr('required', 'required');
                    } else {
                        $('#doctorDropdown').hide();
                        $('#doctorList').removeAttr('required');
                    }
                });
            });
        </script>


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
