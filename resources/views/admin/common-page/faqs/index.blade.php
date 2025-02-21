@extends('admin.layouts.app')

@section('content')



@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif



<div class="page-inner">
    <div class="page-header">
        <h3 class="fw-bold mb-3">Faq Management</h3>
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
                <a >Faq Table</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        @can('faq-create')
                        <a class="btn btn-success mb-2" href="{{ route('faqs.create') }}"><i class="fa fa-plus"></i> Create New Team</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="100px">No</th>
                                    <th>Question </th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($faq as $key => $faqs)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $faqs->question ??'' }}</td>
                                   
                                    <td>
                                        @if($faqs->status != '0')
                                        <a href="{{ url('status-change/1/'.dEncrypt($faqs->id) . '/faqs') }}" style="color:green;">
                                            <button class="btn btn-sm btn-success">Active</button>
                                        </a>
                                        @else
                                        <a href="{{ url('status-change/0/'.dEncrypt($faqs->id) . '/faqs') }}" style="color:green;">
                                            <button class="btn btn-sm btn-danger">Inactive</button>
                                        </a>
                                        @endif</td>
                                    <td>
                                        {{-- <a class="btn btn-info btn-sm" href="{{ route('teams.show',dEncrypt($teams->id)) }}"><i class="fa-solid fa-list"></i> Show</a> --}}
                                        @can('faq-edit')
                                        <a class="btn btn-primary btn-sm" onclick="return confirm('Are you sure to edit this record?')" href="{{ route('faqs.edit',dEncrypt($faqs->id)) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        @endcan

                                        @can('faq-delete')
                                        <form method="POST" action="{{ route('faqs.destroy', dEncrypt($faqs->id)) }}" style="display:inline">
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
