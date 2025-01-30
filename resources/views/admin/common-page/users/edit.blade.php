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
            <h3 class="fw-bold mb-3">Users Management</h3>
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
                    <a>Users Update Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', dEncrypt($user->id)) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" placeholder="Name" minlength="2" maxlength="38" class="form-control" value="{{ $user->name ?? "" }}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="email" name="email" placeholder="Email" class="form-control" value='{{ $user->email ?? '' }}'>

                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        <input type="password" name="password" id="password" placeholder="Password" value="{{ $user->password ??'' }}" class="form-control">
                                        <button type="button" id="togglePassword">
                                            👁️
                                        </button>
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
                                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" value="{{ $user->password }}" placeholder="Confirm Password" class="form-control">
                                        <button type="button" id="ctogglePassword">
                                            👁️
                                        </button>
                                    </div>
                                </div> --}}
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        <select name="roles[]" class="form-control" multiple="multiple" {{ auth()->user()->id != 1 ? 'disabled' : '' }}>
                                            @foreach ($roles as $value => $label)
                                            <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                            @endforeach
                                        </select>

                                        @if(auth()->user()->id != 1)
                                        @foreach ($userRole as $value => $role)
                                        <input type="hidden" name="roles[]" value="{{ $value }}">
                                        @endforeach
                                        @endif

                                        @error('roles')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn btn-danger" href="{{ route('users.index') }}"> Back</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection
