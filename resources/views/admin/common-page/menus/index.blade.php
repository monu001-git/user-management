{{-- @extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Menu Management</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('menus.create') }}"><i class="fa fa-plus"></i> Create New Menus</a>
@endcan
</div>
</div>
</div>

@session('success')
<div class="alert alert-success" role="alert">
    {{ $value }}
</div>
@endsession

<table class="table table-bordered">
    <tr>
        <th width="100px">No</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>

    @foreach ($menu as $key => $menus)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $menus->name }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('menus.show',dEncrypt($menus->id)) }}"><i class="fa-solid fa-list"></i> Show</a>
            @can('menu-edit')
            <a class="btn btn-primary btn-sm" href="{{ route('menus.edit',dEncrypt($menus->id)) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
            @endcan

            @can('menu-delete')
            <form method="POST" action="{{ route('menus.destroy', dEncrypt($menus->id)) }}" style="display:inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
            @endcan
        </td>
    </tr>
    @endforeach
</table>



@endsection --}}




@extends('admin.layouts.app')

@section('content')


@session('success')
<div class="alert alert-success" role="alert">
    {{ $value }}
</div>
@endsession


<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Menu Management</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-right">
                            @can('menu-create')
                            <a class="btn btn-success mb-2" href="{{ route('menus.create') }}"><i class="fa fa-plus"></i> Create New User</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="100px">No</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($menu as $key => $menus)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $menus->name }}</td>
                                         <td>
                                        @if($menus->status != '0')
                                        <a href="{{ url('status-change/1/'.dEncrypt($menus->id) . '/menus') }}" style="color:green;">
                                            <button class="btn btn-sm btn-success">Active</button>
                                        </a>
                                        @else
                                        <a href="{{ url('status-change/0/'.dEncrypt($menus->id) . '/menus') }}" style="color:green;">
                                            <button class="btn btn-sm btn-danger">Inactive</button>
                                        </a>
                                        @endif</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('menus.show',dEncrypt($menus->id)) }}"><i class="fa-solid fa-list"></i> Show</a>
                                            @can('menu-edit')
                                            <a class="btn btn-primary btn-sm" href="{{ route('menus.edit',dEncrypt($menus->id)) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            @endcan

                                            @can('menu-delete')
                                            <form method="POST" action="{{ route('menus.destroy', dEncrypt($menus->id)) }}" style="display:inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection
