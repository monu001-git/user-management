@extends('layouts.app')

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
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($banner as $key => $banners)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $banners->title ??'' }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('banners.show',$banners->id) }}"><i class="fa-solid fa-list"></i> Show</a>
            @can('banner-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('banners.edit',$banners->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
            @endcan

            @can('banner-delete')
            <form method="POST" action="{{ route('banners.destroy', $banners->id) }}" style="display:inline">
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
