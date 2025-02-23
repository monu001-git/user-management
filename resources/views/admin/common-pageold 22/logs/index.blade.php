@extends('admin.layouts.app')

@section('content')


@session('success')
<div class="alert alert-success" role="alert">
    {{ $value }}
</div>
@endsession

<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Log Management</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a >
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a>Log Table</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="100px">No</th>
                                    <th>Section Name</th>
                                    <th>User Name</th>
                                    <th>Ip Adress</th>
                                    <th>Url</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($log as $key => $logs)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $logs->section ??"" }}</td>
                                    <td>{{ $logs->user_name ??"" }}</td>
                                    <td>{{ $logs->IP_address ??"" }}</td>
                                    <td>{{ $logs->url ??"" }}</td>
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
