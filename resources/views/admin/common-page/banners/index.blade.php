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
            <h3 class="fw-bold mb-3">Banner Management</h3>
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
                            <a class="btn btn-success mb-2" href="{{ route('banners.create') }}"><i class="fa fa-plus"></i> Create New User</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <tr>
                                    <th width="100px">No</th>
                                    <th>title</th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>
                                </tr>
                                @foreach ($banner as $key => $banners)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $banners->title ??'' }}</td>
                                    <td>
                                        @if($banners->status != '0')
                                        <a href="{{ url('status-change/1/'.dEncrypt($banners->id) . '/banners') }}" style="color:green;">
                                            <button class="btn btn-sm btn-success">Active</button>
                                        </a>
                                        @else
                                        <a href="{{ url('status-change/0/'.dEncrypt($banners->id) . '/banners') }}" style="color:green;">
                                            <button class="btn btn-sm btn-danger">Inactive</button>
                                        </a>
                                        @endif</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('banners.show',dEncrypt($banners->id)) }}"><i class="fa-solid fa-list"></i> Show</a>
                                        @can('banner-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('banners.edit',dEncrypt($banners->id)) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        @endcan

                                        @can('banner-delete')
                                        <form method="POST" action="{{ route('banners.destroy',dEncrypt( $banners->id)) }}" style="display:inline">
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
