@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gallery Management</h2>
        </div>
        <div class="pull-right">
            @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('gallery.create') }}"><i class="fa fa-plus"></i> Create New gallery</a>
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



@endsection
