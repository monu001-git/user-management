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
                <a>Menu Update Form</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('menus.update', dEncrypt($menu->id)) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" minlength="1" maxlength="25" placeholder="Name" class="form-control" value="{{ $menu->name }}">

                                    @error('order')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Parent Name:</strong>
                                    <br />
                                    <select name="parent_id" class="form-control">
                                        <option value=''>Section Option</option>
                                        @foreach($parentId as $value)
                                        <option value='{{ $value->id }}' @if($value->id == $menu->parent_id) selected @endif>
                                            {{ $value->name }} {{ $value->id }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Content Name:</strong>
                                    <br />
                                    <select name="contendId" class="form-control">
                                        <option value=''>Section Option</option>
                                        @foreach($contentId as $value)
                                        <option value="{{ $value->contentID }}" @if($value->contentID == $menu->contentId) selected @endif>
                                            {{ $value->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Link Type:</strong>
                                    <br />
                                    <select name="link_type" id="link_type" class="form-control">
                                        <option value="">Select value</option>
                                        <option value="0" {{ old('link_type', $menu->link_type) == 0 ? 'selected' : '' }}>External</option>
                                        <option value="1" {{ old('link_type', $menu->link_type) == 1 ? 'selected' : '' }}>Internal</option>
                                    </select>

                                    @error('order')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12" id="url-input-group" style="display: none;">
                                <div class="form-group">
                                    <strong>Url:</strong>
                                    <input type="text" name="url" placeholder="url" value="{{ $menu->url  ??''}}" class="form-control">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Menu Place:</strong>
                                    <br />
                                    <select name="menu_place" class="form-control">
                                        <option value="">Select value</option>
                                        <option value="1" {{ old('menu_place', $menu->menu_place) == 1 ? 'selected' : '' }}>Header</option>
                                        <option value="2" {{ old('menu_place', $menu->menu_place) == 2 ? 'selected' : '' }}>Footer</option>
                                        <option value="3" {{ old('menu_place', $menu->menu_place) == 3 ? 'selected' : '' }}>Both</option>
                                    </select>

                                    @error('order')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sort Order:</strong>
                                    <input type="text" minlenght="1" maxlength="3" name="order" value={{ $menu->order }} placeholder="Sort order" class="form-control">
                                </div>
                            </div>

                            <input type="hidden" name="status" value="{{ $menu->status }}" class="form-control">

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
