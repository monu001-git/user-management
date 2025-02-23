@extends('admin.layouts.app')

@section('content')


@session('success')
<div class="alert alert-success" role="alert">
    {{ $value }}
</div>
@endsession



<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Testimonial Management</h3>
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
                <a >Testimonial Table</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        @can('testimonial-create')
                        <a class="btn btn-success mb-2" href="{{ route('testimonials.create') }}"><i class="fa fa-plus"></i> Create New Testimonial</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="100px">No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($testimonial as $key => $testimonials)
                                <tr>
                                  
                        
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $testimonials->name  ??""}}</td>
                                     <td>{{ $testimonials->description ??"" }}</td>
                                    <td>
                                        @if($testimonials->status != '0')
                                        <a href="{{ url('status-change/1/'.dEncrypt($testimonials->id) . '/testimonials') }}" style="color:green;">
                                            <button class="btn btn-sm btn-success">Active</button>
                                        </a>
                                        @else
                                        <a href="{{ url('status-change/0/'.dEncrypt($testimonials->id) . '/testimonials') }}" style="color:green;">
                                            <button class="btn btn-sm btn-danger">Inactive</button>
                                        </a>
                                        @endif</td>
                                    <td>
                                        {{-- <a class="btn btn-info btn-sm" href="{{ route('teams.show',dEncrypt($teams->id)) }}"><i class="fa-solid fa-list"></i> Show</a> --}}
                                        @can('testimonial-edit')
                                        <a class="btn btn-primary btn-sm" onclick="return confirm('Are you sure to edit this record?')" href="{{ route('testimonials.edit',dEncrypt($testimonials->id)) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        @endcan

                                        @can('testimonial-delete')
                                        <form method="POST" action="{{ route('testimonials.destroy', dEncrypt($testimonials->id)) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" onclick="return confirm('Are you sure to delete this record?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
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
