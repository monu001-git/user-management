@extends('admin.layouts.app')

@section('content')



@if (count($errors) > 0)
<div class="alert alert-danger text-danger">
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
        <h3 class="fw-bold mb-3">Banner Management</h3>
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
                <a>Banner Create Form</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <form method="POST" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Title *:</strong>
                                    <input type="text" name="title" minlength="3"  maxlength="100" placeholder="title" class="form-control preventnumeric">

                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <textarea name="description" class="form-control">{!! $banner->description ?? "" !!}</textarea>
                                </div>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Url:</strong>
                                    <input type="text" name="url" placeholder="url" minlength="3"  maxlength="100" class="form-control">
                                    @error('url')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Link Type:</strong>
                                    <br />
                                    <select name="link_type" class="form-control">
                                        <option value="">Select value</option>
                                        <option value="0">External</option>
                                        <option value="1">Internal</option>
                                    </select>

                                    @error('link_type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sort Order *:</strong>
                                    <input type="text" name="order" placeholder="Sort order" class="form-control mobile_no" minlength="1" maxlength="3">
                                    @error('order')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image *:</strong>
                                    <input type="file" name="image" class="form-control image1">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="status" value="0" class="form-control">



                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a class="btn btn-danger" href="{{ route('banners.index') }}"> Back</a>
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
