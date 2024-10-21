@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Category</h2>
        </div>
        <div class="pull-right">
            @can('category-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('category.create') }}"><i class="fa fa-plus"></i> Create New Category</a>
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
        <th>No</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $category->name }}</td>
        <td>
            <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('category.show',$category->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                @can('category-edit')
                <a class="btn btn-primary btn-sm" href="{{ route('category.edit',$category->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                @endcan

                @csrf
                @method('DELETE')

                @can('category-delete')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>




@endsection
