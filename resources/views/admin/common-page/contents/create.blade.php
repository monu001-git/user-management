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
                    <div class="card-header">
                        <div class="card-title">Form Elements</div>
                    </div>
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
                                        <strong>Content Description:</strong>
                                        <textarea name="descriptions" placeholder="description" class="form-control"></textarea>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Content Image:</strong>
                                        <input type="file" name="contentImage" placeholder="content Image" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Content banner:</strong>
                                        <input type="file" name="banner" placeholder="content Image" class="form-control">
                                    </div>
                                </div>

                                <input type="hidden" name="status" value="0" class="form-control">




                                <!-- Image Items Section --><br><br><br><br><br><br>
                                <h5 style="text-align:center;">Content Image</h5>
                                <div id="imageItemsContainer">
                                    <div class="form-group row mb-3">
                                        <div class="col-5">
                                            <input type="text" class="form-control" name="image_title[]" placeholder="Image title" />
                                        </div>

                                        <div class="col-5">
                                            <input type="file" class="form-control" name="multipleimage[]" />
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-danger" onclick="removeItem(this)">Delete</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-5">
                                    <button type="button" class="btn btn-primary me-2 btn-sm" onclick="addItem()">Add Input</button>
                                </div>
                                <br><br>

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


    @endsection
