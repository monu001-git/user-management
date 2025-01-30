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
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
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
                                        <input type="text" class="form-control" name="meta_title" placeholder="Please enter meta tittle, use for seo" value="{{ old('tittle') }}" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Meta Description:</strong>
                                        <textarea class="form-control" rows="4" name="meta_description" class="form-control" placeholder="Please enter meta description, use for seo">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Meta keyword:</strong>
                                        <textarea class="form-control" id="keyword" rows="4" class="form-control" name="meta_keyword" placeholder="Please enter meta keywords, use for seo">{{ old('keyword') }}</textarea>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Content title:</strong>
                                        <input type="text" name="title" placeholder="title" class="form-control">
                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Content banner:</strong>
                                        <input type="file" name="banner" placeholder="content Image" class="form-control">
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
                                        <textarea name="descriptions" placeholder="description" class="form-control"></textarea>
                                    </div>
                                </div>

                                <!-- Content Image -->
                                <div class="col-xs-12 col-sm-12 col-md-12" id="contentImage" style="display: none;">
                                    <div class="form-group">
                                        <strong>Content Image:</strong>
                                        <input type="file" name="image" placeholder="content Image" class="form-control">
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
                                        <textarea name="descriptions2" placeholder="description" class="form-control"></textarea>
                                    </div>
                                </div>

                                <!-- Content Image -->
                                <div class="col-xs-12 col-sm-12 col-md-12" id="contentImage2" style="display: none;">
                                    <div class="form-group">
                                        <strong>Content Image:</strong>
                                        <input type="file" name="image2" placeholder="content Image" class="form-control">
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
                                        <textarea name="descriptions3" placeholder="description3" class="form-control"></textarea>
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


    <script>
       
        //center button 
        $(document).ready(function() {
            $('#toggleButton').click(function() {
                var content = $('#contentToShow');

                // Toggle the visibility of the content
                content.toggle();

                // Change the button text based on visibility
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
                    $("#contentDescription, #contentImage").show(); // Show both elements
                } else {
                    $("#contentDescription, #contentImage").hide(); // Hide both elements
                }
            });
        });


        $(document).ready(function() {
            // Listen for the checkbox toggle
            $('#toggleRightLeft').change(function() {
                // Toggle visibility of the content description and content image
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
