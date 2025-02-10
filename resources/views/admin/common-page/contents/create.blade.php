@extends('admin.layouts.app')

@section('content')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        border-radius: 50%;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:checked+.slider:before {
        transform: translateX(26px);
    }

</style>


@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        <div class="text-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
    </ul>
</div>
@endif

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Content Management</h3>
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
                    <a>Content Create Forms</a>
                </li>

            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('contents.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Meta Title:</strong>
                                        <input type="text" class="form-control preventnumeric" name="meta_title"  minlength="3" maxlength="100" placeholder="Please enter meta tittle, use for seo" value="{{ old('meta_title') }}" >

                                        @error('meta_title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Meta Description:</strong>
                                        <textarea class="form-control" rows="4" name="meta_description" class="form-control" placeholder="Please enter meta description, use for seo">{!! old('meta_description') !!}</textarea>

                                        @error('meta_description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Meta keyword:</strong>
                                        <textarea class="form-control" id="keyword" rows="4" class="form-control" name="meta_keyword" placeholder="Please enter meta keywords, use for seo">{!! old('meta_keyword') !!}</textarea>

                                        @error('meta_keyword')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Content Title:</strong>
                                        <input type="text" name="title" placeholder="title" minlength="3" maxlength="100" value="{{ old('title') }}" class="form-control preventnumeric">

                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Content banner:</strong>
                                        <input type="file" name="banner" placeholder="content" class="form-control image">

                                        @error('banner')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <input type="hidden" name="status" value="0" class="form-control">

                                <br><br><br><br><br><br>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Count:</strong>
                                        <label class="switch">
                                            <input type="checkbox" name="count">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>


                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Team:</strong>
                                        <label class="switch">
                                            <input type="checkbox" name="team">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Certificate:</strong>
                                        <label class="switch">
                                            <input type="checkbox" name="certificate">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Image:</strong>
                                        <label class="switch">
                                            <input type="checkbox" name="image_content">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>FAQ:</strong>
                                        <label class="switch">
                                            <input type="checkbox" name="faq">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>



                                <hr>

                                {{-- Content left and image right start --}}

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Content left and image right:</strong>
                                        <label class="switch">
                                            <input type="checkbox" id="toggleLayout" name="left_right">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Content Description -->
                                <div class="col-xs-12 col-sm-12 col-md-12" id="contentDescription" style="display: none;">
                                    <div class="form-group">
                                        <strong>Content Description:</strong>
                                        <textarea name="descriptions" placeholder="description" class="form-control"> {!! old('descriptions') !!}</textarea>
                                    </div>
                                </div>

                                <!-- Content Image -->
                                <div class="col-xs-12 col-sm-12 col-md-12" id="contentImage" style="display: none;">
                                    <div class="form-group">
                                        <strong>Content Image:</strong>
                                        <input type="file" name="image" placeholder="content " class="form-control image">
                                    </div>
                                </div>

                                {{-- Content left and image right end --}}

                                <hr>

                                {{-- Content right and image left start --}}
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Content right and image left:</strong>
                                        <label class="switch">
                                            <input type="checkbox" id="toggleRightLeft" name="right_left">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Content Description -->
                                <div class="col-xs-12 col-sm-12 col-md-12" id="contentDescription2" style="display: none;">
                                    <div class="form-group">
                                        <strong>Content Description:</strong>
                                        <textarea name="descriptions2" placeholder="description" class="form-control"> {!! old('descriptions2') !!}</textarea>
                                    </div>
                                </div>

                                <!-- Content Image -->
                                <div class="col-xs-12 col-sm-12 col-md-12" id="contentImage2" style="display: none;">
                                    <div class="form-group">
                                        <strong>Content Image:</strong>
                                        <input type="file" name="image2" placeholder="content " class="form-control ">
                                    </div>
                                </div>

                                <hr>

                                {{-- Content right and image left end --}}

                                {{-- center content start --}}
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Center Content:</strong>
                                        <label class="switch">
                                            <input type="checkbox" name="center_content" id="toggleButton">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12" id="contentToShow" style="display: none;">
                                    <div class="form-group">
                                        <strong>Content Description:</strong>
                                        <textarea name="descriptions3" placeholder="description3" class="form-control"> {!! old('descriptions3') !!}</textarea>
                                    </div>
                                </div>
                                {{-- center content end --}}


                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn btn-danger" href="{{ route('contents.index') }}"> Back</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        CKEDITOR.replace('meta_description');
        CKEDITOR.replace('meta_keyword');
        CKEDITOR.replace('descriptions');
        CKEDITOR.replace('descriptions2');
        CKEDITOR.replace('descriptions3');
    </script>


    <script>
        $(document).ready(function() {
            $('#toggleButton').click(function() {
                var content = $('#contentToShow');

                content.toggle();

                if (content.is(':visible')) {
                    $('#toggleButton').text('Turn Off');
                } else {
                    $('#toggleButton').text('Turn On');
                }
            });
        });

        $(document).ready(function() {
            $("#toggleLayout").change(function() {
                if ($(this).is(":checked")) {
                    $("#contentDescription, #contentImage").show(); 
                } else {
                    $("#contentDescription, #contentImage").hide(); 
                }
            });
        });


        $(document).ready(function() {
            $('#toggleRightLeft').change(function() {
                if ($(this).is(':checked')) {
                    $('#contentDescription2').show();
                    $('#contentImage2').show();
                } else {
                    $('#contentDescription2').hide();
                    $('#contentImage2').hide();
                }
            });
        });

    </script>
    @endsection
