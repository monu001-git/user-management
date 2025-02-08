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
                    <a>Team Update Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('teams.update', dEncrypt($team->id)) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name *:</strong>
                                        <input type="text" name="name" minlength="1" maxlength="100"
                                            placeholder="name" value="{{ $team->name ?? '' }}"
                                            class="form-control preventnumeric">

                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email *:</strong>
                                        <input type="text" name="email" minlength="1" maxlength="100"
                                            placeholder="email" value="{{ $team->email ?? '' }}" class="form-control">

                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Education:</strong>
                                        <input type="text" name="qualification" minlength="1" maxlength="100"
                                            placeholder="qualification" value="{{ $team->qualification ?? '' }}"
                                            class="form-control preventnumeric">

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
                                                <option value="{{ $departments->id ?? '' }}"
                                                    {{ old('department', $departments->id) == $team->department ? 'selected' : '' }}>
                                                    {{ $departments->department ?? '' }}</option>
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
                                            placeholder="experience" value="{{ $team->experience ?? '' }}"
                                            class="form-control mobile_no">

                                        @error('experience')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Description :</strong>
                                        <textarea class="form-control" id="description" rows="4" name="description"
                                            placeholder="Please enter meta description">{!! $team->description !!}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Designation:</strong>
                                        <input type="text" minlength="1" maxlength="100" name="designation"
                                            placeholder="designation" value="{{ $team->designation ?? '' }}"
                                            class="form-control preventnumeric">
                                        @error('designation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Sort Order:</strong>
                                        <input type="text" name="order" minlength="1" maxlength="3"
                                            placeholder="Sort order" value="{{ $team->order ?? '' }}"
                                            class="form-control mobile_no">
                                        @error('order')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Image:</strong>
                                        <span style="color:green;font-size:12px;">
                                            @if ($team->image)
                                                [{{ $team->image }}]
                                            @endif
                                        </span>
                                        <input type="file" name="image" class="form-control image"
                                            @if ($team->image) value="{{ $team->image }}" @endif>
                                    </div>
                                </div>

                                <input type="hidden" name="status" value="{{ $team->status }}" class="form-control">


                                <h5 style="text-align:center;">Team Static</h5>
                                <div id="imageItemsContainer">
                                    @foreach ($teamStatic as $i => $teamStatics)
                                        <div class="form-group row mb-3">

                                            <div class="col-4">
                                                <input type="text" minlength="3" maxlength="100"
                                                    class="form-control preventnumeric" name="number[]"
                                                    value="{{ $teamStatics->number ?? '' }}" placeholder="number" />
                                            </div>

                                            <div class="col-4">
                                                <input type="text" minlength="3" maxlength="100"
                                                    class="form-control preventnumeric" name="text[]"
                                                    value="{{ $teamStatics->text ?? '' }}" placeholder="text" />
                                            </div>


                                            <div class="col-3">
                                                <button type="button" class="btn btn-danger"
                                                    data-id="{{ $teamStatics->id }}"
                                                    onclick="removeItem(this)">Delete</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary me-2 btn-sm" onclick="addItem()">Add
                                        Input</button>
                                </div><br><br>


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


    <script>
        function addItem() {


            const $container = $('#imageItemsContainer');
            const newRowHtml = `

            <div class="form-group row mb-3">
                <div class="col-4">
                    <input type="text" minlength="3" maxlength="100"
                        class="form-control preventnumeric" name="number[]"
                        value="{{ $teamStatics->number ?? '' }}" placeholder="number" />
                </div>
                <div class="col-4">
                    <input type="text" minlength="3" maxlength="100"
                        class="form-control preventnumeric" name="text[]"
                        value="{{ $teamStatics->text ?? '' }}" placeholder="text" />
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-danger" onclick="removeItem(this)">Delete</button>
                </div>
            </div>`;

            const $newRow = $(newRowHtml);
            $container.append($newRow);
        }


        function removeItem(button) {
            const id = $(button).data('id');

            if (id != undefined) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/team-static',
                    type: 'get',
                    data: {
                        id: id,
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            window.location.reload();
                        } else {

                        }

                    },
                    error: function(xhr, status, error) {
                        alert(error);
                    }
                });


            } else {
                const $row = $(button).closest('.form-group');
                $row.remove();
            }

        }

        $(document).ready(function() {
            var sectionValue = $('#section').val();
            if (sectionValue == '3') {
                $('#doctorDropdown').show();
                $('#doctorList').attr('required', 'required');
            } else {
                $('#doctorDropdown').hide();
                $('#doctorList').removeAttr('required');
            }
            // });
        });
    </script>




@endsection
