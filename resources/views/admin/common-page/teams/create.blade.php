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
            <h3 class="fw-bold mb-3">Team Management</h3>
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
                    <a>Team Create Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name *:</strong>
                                        <input type="text" minlength="1" maxlength="100" name="name"
                                            placeholder="name"  class="form-control preventnumeric">

                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email *:</strong>
                                        <input type="text" minlength="1" maxlength="100" name="email"
                                            placeholder="email" class="form-control">

                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Education:</strong>
                                        <input type="text" minlength="1" maxlength="100" name="qualification"
                                            placeholder="qualification" class="form-control preventnumeric">

                                        @error('qualification')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Department *:</strong>
                                        <select name="department" class="form-control">
                                            <option value="">Select value</option>
                                            @foreach ($department as $departments)
                                                <option value="{{ $departments->id ??'' }}">{{ $departments->department ??'' }}</option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Experience:</strong>
                                        <input type="text" minlength="1" maxlength="3" name="experience"
                                            placeholder="experience" class="form-control mobile_no">

                                        @error('experience')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Designation:</strong>
                                        <input type="text" minlength="1" maxlength="100" name="designation"
                                            placeholder="designation" class="form-control preventnumeric">

                                        @error('designation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Description :</strong>
                                        <textarea class="form-control" id="description" rows="4" name="description"
                                            placeholder="Please enter meta description">{!! old('description') !!}</textarea>

                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Sort Order:</strong>
                                        <input type="text" minlength="1" maxlength="3" name="order"
                                            placeholder="Sort order" class="form-control mobile_no">
                                        @error('order')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Image</strong>
                                        <input type="file" name="image" class="form-control image">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <input type="hidden" name="status" value="0" class="form-control">


                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn btn-danger" href="{{ route('teams.index') }}"> Back</a>
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
