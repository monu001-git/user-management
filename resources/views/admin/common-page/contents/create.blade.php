@extends('admin.layouts.app')


@section('content')

<style>
    .navad {
        width: 80px;
        margin-left: 13px;
        height: 35px;
    }

</style>



<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New content</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('contents.index') }}"><i class="fa fa-arrow-left"></i>
                Back</a>
        </div>
    </div>
</div>

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

<form method="POST" action="{{ route('contents.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>content title:</strong>
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
                <textarea class="form-control" id="keyword" rows="4" class="form-control" name="meta_keyword" placeholder="Please enter meta keywords, use for seo">{{ old('keyword') }}</textarea><br>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content Image:</strong>
                <input type="file" name="contentImage" placeholder="content Image" class="form-control">
            </div>
        </div>

        <input type="hidden" name="status" value="0" class="form-control">




        <!-- Image Items Section --><br><br><br><br><br><br>
        <h5 style="text-align:center;">Content Image</h5>
        <div id="imageItemsContainer">
            <div class="form-group row mb-3">
                <div class="col-3">
                    <input type="text" class="form-control" name="imageTitle[]" placeholder="Image title" />
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="imageAlt[]" placeholder="Image Alt" />
                </div>
                <div class="col-3">
                    <input type="file" class="form-control" name="multipleimage[]" />
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-danger" onclick="removeItem(this)">Delete</button>
                </div>
            </div>

        </div>
        <button type="button" class="btn btn-primary me-2 btn-sm navad" onclick="addItem()">Add Input</button>
        <br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i>
                Submit</button>
        </div>
    </div>
</form>



<script>
    function addItem() {
        // Clone the first form-group row and append it to the container
        const container = $('#imageItemsContainer');
        const firstRow = container.find('.form-group').first();
        const newRow = firstRow.clone();

        // Reset the input values in the new row
        newRow.find('input').val('');

        // Enable the "Delete" button in the new row
        newRow.find('.btn-danger').prop('disabled', false);

        // Append the new row to the container
        container.append(newRow);
    }

    function removeItem(button) {
        // Remove the row that contains the clicked "Delete" button
        $(button).closest('.form-group').remove();
    }

</script>


@endsection
