@extends('admin.layouts.app')

@section('content')



@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif


<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Appointment book Management</h3>
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
                <a >Appointment book Table</a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Date</th>
                
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($appointment as $key => $appointments)

                               
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $appointments->name }}</td>
                                    <td>{{ $appointments->email }}</td>
                                    <td>{{ $appointments->phone }}</td>
                                    <td>{{ $appointments->gender }}</td>
                                    <td>{{ $appointments->date }}</td>
                                
                                    <td>
                                
                                        @can('appointment-delete')
                                        <form method="POST" action="{{ route('appointments.destroy', dEncrypt($appointments->id)) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
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
