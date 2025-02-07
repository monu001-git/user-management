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

        <h3 class="fw-bold mb-3">Specialitie Management</h3>
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
                <a>Specialitie Update Form</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('specialities.update', dEncrypt($specialitie->id)) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Title:</strong>
                                    <input type="text" minlength="1" maxlength="100" name="title" value="{{ $specialitie->title ??"" }}" placeholder="name" class="form-control preventnumeric">

                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <textarea name="description" placeholder="description" class="form-control">{!! $specialitie->description  !!}</textarea>
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Url:</strong>
                                    <input type="text" minlength="1" maxlength="100" name="url" placeholder="url" value="{{ $specialitie->url ??"" }}" class="form-control ">

                                    @error('url')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sort Order:</strong>
                                    <input type="text" name="order" minlength="1" maxlength="3" placeholder="Sort order" class="form-control mobile_no" value="{{ $specialitie->order ??"" }}">
                                    @error('order')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <span style="color:green;font-size:12px;">
                                        @if($specialitie->image)
                                        [{{$specialitie->image}}]
                                        @endif
                                    </span>

                                    <input type="file" name="image" class="form-control image" @if($specialitie->image)
                                    value="{{$specialitie->image}}"
                                    @endif>

                                </div>
                            </div>


                            <input type="hidden" name="status" value="{{ $specialitie->status }}" class="form-control">


                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a class="btn btn-danger" href="{{ route('specialities.index') }}"> Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    CKEDITOR.replace('description');

</script>

@endsection
