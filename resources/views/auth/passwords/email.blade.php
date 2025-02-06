@extends('front.layouts.app')

@section('content')
{{-- <br><br><br><br><br>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Reset Password') }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
--}}




<!-- start wpo-page-title -->
<section class="wpo-page-title" style="background: url(assets/images/about-us/career-banner.jpg) no-repeat center top/cover;">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Reset Password</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Reset Password</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

<!-- wpo-service-single-area start -->
<div class="wpo-service-single-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12 offset-lg-4">
                <div class="wpo-service-single-title">
                    <div class="login-card">
                        <div class="brand">
                            <div class="brand-logo"><img src="{{ asset('front/assets/images/favicon.png') }}" /></div>
                            <h1>Welcome back</h1>
                            {{-- <p>Enter your credentials to access your account</p> --}}
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="remember-forgot">
                                @if (Route::has('password.request'))
                                <button type="submit" class="login-btn" id="loginButton">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                @endif
                            </div>
                        </form>


                    </div>
                </div><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>
</div>
@endsection
