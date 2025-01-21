@extends('admin.layouts.app')

@section('content')

<div class="page-inner">
    <!-- Card -->
    {{-- <h3 class="fw-bold mb-3">Card</h3> --}}
    {{-- <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-primary card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Visitors</p>
                                <h4 class="card-title">1,294</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-info card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-user-check"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Subscribers</p>
                                <h4 class="card-title">1303</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-success card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Sales</p>
                                <h4 class="card-title">$ 1,345</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-secondary card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="far fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Order</p>
                                <h4 class="card-title">576</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


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
                            <img src="{{ asset('admin/assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle" />
                        </div>
                    </div>
                </div>
              

                <div class="card-body">
                    <div class="user-profile text-center">
                        <div class="name">{{ auth()->user()->name ?? '' }}</div>
                        <div class="job">{{ auth()->user()->email ?? '' }}</div>
                        <div class="social-media">
                            <a class="btn btn-info btn-twitter btn-sm btn-link" href="#">
                                <span class="btn-label just-icon"><i class="icon-social-twitter"></i>
                                </span>
                            </a>
                            <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#">
                                <span class="btn-label just-icon"><i class="icon-social-facebook"></i>
                                </span>
                            </a>
                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                <span class="btn-label just-icon"><i class="icon-social-instagram"></i>
                                </span>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>




@endsection
