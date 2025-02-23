@extends('front.layouts.app')

@section('content')


    <!-- start wpo-page-title -->
    <section class="wpo-page-title"
        style="background: url(assets/images/about-us/career-banner.jpg) no-repeat center top/cover;">
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



                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">




                                <div class="form-group">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                        <button type="button" id="togglePassword">
                                            👁️
                                        </button>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">

                                        {{-- <button type="button" id="passwordconfirm">
                                            👁️
                                        </button> --}}

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="remember-forgot">

                                    <button type="submit" class="login-btn" id="loginButton">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
