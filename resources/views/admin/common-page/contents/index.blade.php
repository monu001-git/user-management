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
            <h3 class="fw-bold mb-3">Content Management</h3>
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
                            <a class="btn btn-success mb-2" href="{{ route('contents.create') }}"><i class="fa fa-plus"></i> Create New User</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <tr>
                                    <th width="100px">No</th>
                                    <th>Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                                @foreach ($content as $key => $contents)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $contents->title }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('contents.show',dEncrypt($contents->id)) }}"><i class="fa-solid fa-list"></i> Show</a>
                                        @can('role-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('contents.edit',dEncrypt($contents->id)) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        @endcan

                                        @can('role-delete')
                                        <form method="POST" action="{{ route('contents.destroy',dEncrypt($contents->id)) }}" style="display:inline">
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
