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
            <h3 class="fw-bold mb-3">gallery Management</h3>
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
                            @can('user-create')
                            <a class="btn btn-success mb-2" href="{{ route('gallery.create') }}"><i class="fa fa-plus"></i> Create New User</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <tr>
                                    <th width="100px">No</th>
                                    <th>Event Name</th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>
                                </tr>
                                @foreach ($gallery as $key => $galleries)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $galleries->name ??'' }}</td>
                                    <td>
                                        @if($galleries->status != '0')
                                        <a href="{{ url('status-change/1/'.dEncrypt($galleries->id) . '/galleries') }}" style="color:green;">
                                            <button class="btn btn-sm btn-success">Active</button>
                                        </a>
                                        @else
                                        <a href="{{ url('status-change/0/'.dEncrypt($galleries->id) . '/galleries') }}" style="color:green;">
                                            <button class="btn btn-sm btn-danger">Inactive</button>
                                        </a>
                                        @endif</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('gallery.show',dEncrypt($galleries->id)) }}"><i class="fa-solid fa-list"></i> Show</a>
                                        @can('banner-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('gallery.edit',dEncrypt($galleries->id)) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        @endcan

                                        @can('banner-delete')
                                        <form method="POST" action="{{ route('gallery.destroy',dEncrypt($galleries->id)) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection
