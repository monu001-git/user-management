@extends('admin.layouts.app')

@section('content')
    @session('success')
        <div class="alert alert-success" role="alert">
            {{ $value }}
        </div>
    @endsession



    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Department Management</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a>
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>

                <li class="nav-item">
                    <a>Department Table</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-right">
                            @can('department-create')
                                <a class="btn btn-success mb-2" href="{{ route('departments.create') }}"><i
                                        class="fa fa-plus"></i> Create New Department</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="100px">No</th>
                                        <th>Department</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($department as $key => $departments)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $departments->department ?? '' }}</td>

                                            <td>

                                                @can('department-edit')
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('departments.edit', dEncrypt($departments->id)) }}"><i
                                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                @endcan

                                                @can('department-delete')
                                                    <form method="POST"
                                                        action="{{ route('departments.destroy', dEncrypt($departments->id)) }}"
                                                        style="display:inline">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa-solid fa-trash"></i> Delete</button>
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
@endsection
