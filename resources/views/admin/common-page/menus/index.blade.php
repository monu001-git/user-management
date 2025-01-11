@extends('admin.layouts.app')

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



@endsection
