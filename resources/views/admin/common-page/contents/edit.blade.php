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
                    <a>Content Update Forms</a>
                </li>

            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">

                        <form method="POST" action="{{ route('contents.update', dEncrypt($content->id)) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- <div class="row">


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
                        <textarea class="form-control" id="keyword" rows="4" class="form-control" name="meta_keyword" placeholder="Please enter meta keywords, use for seo">{{ $content->meta_keyword }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content title:</strong>
                        <input type="text" name="title" placeholder="title" value="{{ $content->title }}" class="form-control">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content banner: [Width:1920px, Height:500px]</strong>
                        <span style="color:green;font-size:12px;">
                            @if ($content->banner)
                            [{{ $content->banner }}]
                            @endif
                        </span>

                        <input type="file" name="banner" class="form-control" @if ($content->banner) value="{{ $content->banner }}" @endif>
                    </div>
                </div>

                <input type="hidden" name="status" value="{{ $content->status ??'' }}" class="form-control">


                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Team:</strong>
                        <label class="switch">
                            <input type="checkbox" name="team" @if($content->count = 'on') checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>



                <h2>content left and image right</h2>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content Description:</strong>
                        <textarea name="descriptions" placeholder="description" class="form-control">{{ $content->descriptions }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content Image: [Width:1920px, Height:500px]</strong>
                        <span style="color:green;font-size:12px;">
                            @if ($content->image)
                            [{{ $content->image }}]
                            @endif
                        </span>

                        <input type="file" name="image" class="form-control" @if ($content->image) value="{{ $content->image }}" @endif>
                    </div>
                </div>




                <hr>
                <h2>content right and image left</h2>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content Description:</strong>
                        <textarea name="descriptions2" placeholder="description2" class="form-control">{{ $content->descriptions2 }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content Image: [Width:1920px, Height:500px]</strong>
                        <span style="color:green;font-size:12px;">
                            @if ($content->image2)
                            [{{ $content->image2 }}]
                            @endif
                        </span>

                        <input type="file" name="image2" class="form-control" @if ($content->image2) value="{{ $content->image2 }}" @endif>
                    </div>
                </div>

                <h2>content center </h2>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content Description:</strong>
                        <textarea name="descriptions3" placeholder="description3" class="form-control">{{ $content->descriptions3 }}</textarea>
                    </div>
                </div>



                <!-- Image Items Section --><br><br><br><br><br><br>
                <h5 style="text-align:center;">Content Image</h5>
                <div id="imageItemsContainer">
                    @foreach ($imageContent as $imageContents)
                    <div class="form-group row mb-3">
                        <div class="col-5">
                            <strong>Image title:</strong>
                            <input type="text" class="form-control" name="image_title[]" placeholder="Image title" value="{{ $imageContents->image_title }}" />
                        </div>

                        <div class="col-5">

                            <strong>Image:</strong>
                            <span style="color:green;font-size:12px;">
                                @if ($imageContents->image)
                                [{{ $imageContents->image }}]
                                @endif
                            </span>

                            <input type="file" name="multipleimage[]" class="form-control" @if ($imageContents->image) value="{{ $imageContents->image  }}" @endif>


                        </div>
                        <input type="hidden" class="form-control" name="id[]" value="{{ $imageContents->id }}" />

                        <div class="col-2">
                            <button type="button" class="btn btn-danger" data-id="{{ $imageContents->id }}" onclick="removeItem(this)">Delete</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-5">
                    <button type="button" class="btn btn-primary navad" onclick="addItem()">Add Input</button>
                </div>

                <div class="card-action">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a class="btn btn-danger" href="{{ route('contents.index') }}"> Back</a>
                </div>
            </div> --}}
            <div class="row">


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
                        <textarea class="form-control" id="keyword" rows="4" class="form-control" name="meta_keyword" placeholder="Please enter meta keywords, use for seo">{{ $content->meta_keyword }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content title:</strong>
                        <input type="text" name="title" placeholder="title" value="{{ $content->title }}" class="form-control">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content banner: [Width:1920px, Height:500px]</strong>
                        <span style="color:green;font-size:12px;">
                            @if ($content->banner)
                            [{{ $content->banner }}]
                            @endif
                        </span>

                        <input type="file" name="banner" class="form-control" @if ($content->banner) value="{{ $content->banner }}" @endif>
                    </div>
                </div>
                <input type="hidden" name="status" value="{{ $content->status }}" class="form-control">

                <br><br><br><br><br><br>

                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Count:</strong>
                        <label class="switch">
                            <input type="checkbox" name="count" @if($content->count = 'on') checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>


                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Team:</strong>
                        <label class="switch">
                            <input type="checkbox" name="team" @if($content->team = 'on') checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Certificate:</strong>
                        <label class="switch">
                            <input type="checkbox" name="certificate" @if($content->certificate = 'on') checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <label class="switch">
                            <input type="checkbox" name="image_content" @if($content->image_content = 'on') checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>FAQ:</strong>
                        <label class="switch">
                            <input type="checkbox" name="faq" @if($content->faq = 'on') checked @endif>
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
                            <input type="checkbox" id="toggleLayout" name="left_right" @if($content->left_right = 'on') checked @endif >
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

                <!-- Content Description -->
                <div class="col-xs-12 col-sm-12 col-md-12" id="contentDescription" style="display: none;">
                    <div class="form-group">
                        <strong>Content Description:</strong>
                        <textarea name="descriptions" placeholder="description" class="form-control">{!! $content->descriptions  !!}</textarea>
                    </div>
                </div>

                <!-- Content Image -->

                <div class="col-xs-12 col-sm-12 col-md-12" id="contentImage" style="display: none;">
                    <div class="form-group">
                        <strong>Content Image:</strong>
                        <span style="color:green;font-size:12px;">
                            @if ($content->image)
                            [{{ $content->image }}]
                            @endif
                        </span>

                        <input type="file" name="image" class="form-control" @if ($content->image) value="{{ $content->image }}" @endif>
                    </div>
                </div>

                {{-- Content left and image right end --}}

                <hr>

                {{-- Content right and image left start --}}
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Content right and image left:</strong>
                        <label class="switch">
                            <input type="checkbox" id="toggleRightLeft" name="right_left" @if($content->right_left = 'on') checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

                <!-- Content Description -->
                <div class="col-xs-12 col-sm-12 col-md-12" id="contentDescription2" style="display: none;">
                    <div class="form-group">
                        <strong>Content Description:</strong>
                        <textarea name="descriptions2" placeholder="description" class="form-control">{!! $content->descriptions2  !!}</textarea>
                    </div>
                </div>

                <!-- Content Image -->


                <div class="col-xs-12 col-sm-12 col-md-12" id="contentImage2" style="display: none;">
                    <div class="form-group">
                        <strong>Content Image:</strong>
                        <span style="color:green;font-size:12px;">
                            @if ($content->image2)
                            [{{ $content->image2 }}]
                            @endif
                        </span>

                        <input type="file" name="image2" class="form-control" @if ($content->image2) value="{{ $content->image2 }}" @endif>
                    </div>
                </div>

                <hr>

                {{-- Content right and image left end --}}

                {{-- center content start --}}
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>Center Content:</strong>
                        <label class="switch">
                            <input type="checkbox" name="center_content" id="toggleButton" @if($content->center_content = 'on') checked @endif>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12" id="contentToShow" style="display: none;">
                    <div class="form-group">
                        <strong>Content Description:</strong>
                        <textarea name="descriptions3" placeholder="description3" class="form-control">{!! $content->descriptions3  !!}</textarea>
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
    $(document).ready(function() {


        var selectedValue1 = $('#toggleButton').val();
        var selectedValue2 = $('#toggleLayout').val();
        var selectedValue3 = $('#toggleRightLeft').val();


        if (selectedValue1 = 'on') {
            $(" #contentToShow").show();
        }


        if (selectedValue2 = 'on') {
            $("#contentDescription, #contentImage").show();
        }

        if (selectedValue3 = 'on') {
            $("#contentDescription2, #contentImage2").show();
        }


        $("#toggleButton").change(function() {

            if ($(this).is(":checked")) {
                $(" #contentToShow").show();
            } else {
                $("#contentToShow").hide();
            }
        });


        $("#toggleLayout").change(function() {
            if ($(this).is(":checked")) {
                $("#contentDescription, #contentImage").show();
            } else {
                $("#contentDescription, #contentImage").hide();
            }
        });


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
