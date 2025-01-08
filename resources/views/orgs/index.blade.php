@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Org structure Management</h2>
        </div>
        <div class="pull-right">
            @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('orgs.create') }}"><i class="fa fa-plus"></i> Create New Org Structure</a>
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
    @foreach ($org as $key => $orgs)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $orgs->name }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('orgs.show',dEncrypt($orgs->id)) }}"><i class="fa-solid fa-list"></i> Show</a>
            @can('role-edit')
            <a class="btn btn-primary btn-sm" href="{{ route('orgs.edit',dEncrypt($orgs->id)) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
            @endcan

            @can('role-delete')
            <form method="POST" action="{{ route('orgs.destroy', dEncrypt($orgs->id)) }}" style="display:inline">
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
