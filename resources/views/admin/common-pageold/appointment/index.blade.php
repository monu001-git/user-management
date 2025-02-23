@extends('admin.layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Appointment book Management</h3>
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
                    <a>Appointment book Table</a>
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
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($appointment as $key => $appointments)
                                        @if (Auth::user()->email == $appointments->doctor_email || Auth::user()->id == 1)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $appointments->name ?? '' }}</td>
                                                <td>{{ $appointments->status ??'' }}</td>
                                                <td>{{ $appointments->date ? \Carbon\Carbon::parse($appointments->date)->format('l, F d, Y') : '' }}
                                                </td>
                                                <td>

                                                    @can('appointment-edit')
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('appointments.edit', dEncrypt($appointments->id)) }}"><i
                                                                class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                    @endcan

                                                    @can('appointment-delete')
                                                        <form method="POST"
                                                            action="{{ route('appointments.destroy', dEncrypt($appointments->id)) }}"
                                                            style="display:inline">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa-solid fa-trash"></i> Delete</button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endif
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
