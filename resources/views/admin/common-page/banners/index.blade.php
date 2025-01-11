@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Banner Management</h2>
        </div>
        <div class="pull-right">
            @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('banners.create') }}"><i class="fa fa-plus"></i> Create New banner</a>
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



@endsection
