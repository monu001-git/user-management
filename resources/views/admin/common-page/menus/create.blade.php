@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Menu Management</h3>
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
                    <a>Menu Create Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('menus.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" minlength="1" maxlength="25" placeholder="Enter your menu name" value="{{ old('name') }}" class="form-control">

                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Parent Name:</strong>
                                        <br />
                                        <select name="parent_id" class="form-control">

                                            <option value="">Select option</option>
                                            @foreach($parentId as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Content Name:</strong>
                                        <br />
                                        <select name="contendId" class="form-control">

                                            <option value="">Select option</option>
                                            @foreach($contentId as $value)
                                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('contendId')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Link Type:</strong>
                                        <br />
                                        <select name="link_type" id="link_type" class="form-control">
                                            <option value="">Select value</option>
                                            <option value="0">External</option>
                                            <option value="1">Internal</option>

                                        </select>
                                        @error('link_type')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12" id="url-input-group" style="display: none;">
                                    <div class="form-group">
                                        <strong>Url:</strong>
                                        <input type="url" name="url" placeholder="url" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Menu Place:</strong>
                                        <br />
                                        <select name="menu_place" class="form-control">
                                            <option value="">Select value</option>
                                            <option value="1">Header</option>
                                            <option value="2">Footer</option>
                                            <option value="3">Both</option>
                                        </select>
                                        @error('menu_place')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Sort Order:</strong>
                                        <input type="text" minlenght="1" maxlength="3" name="order" placeholder="Sort order" value="{{ old('order') }}" class="form-control">
                                        @error('order')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <input type="hidden" name="status" value="0" class="form-control">

                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn btn-danger" href="{{ route('menus.index') }}"> Back</a>
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
            $('#link_type').on('change', function() {
                if ($(this).val() === "0") {
                    $('#url-input-group').show();
                    $('input[name="url"]').attr('required', true);
                } else {
                    $('#url-input-group').hide();
                    $('input[name="url"]').removeAttr('required');
                }
            });
            $('#link_type').trigger('change');
        });

    </script>

    @endsection
