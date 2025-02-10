@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-2">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-profile">
                    <div class="card-header" style="background-image: url('assets/img/blogpost.jpg')">
                        <div class="profile-picture">
                            <div class="avatar avatar-xl">
                                <img src="{{ asset('admin/assets/img/profile.jpg') }}" alt="..."
                                    class="avatar-img rounded-circle" />
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="user-profile text-center">
                            <div class="name">{{ auth()->user()->name ?? '' }}</div>
                            <div class="job">{{ auth()->user()->email ?? '' }}</div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
