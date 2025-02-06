@extends('front.layouts.app')

@section('content')

<!-- start wpo-page-title -->
<section class="wpo-page-title" style="background: url(assets/images/about-us/career-banner.jpg) no-repeat center top/cover;">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Login</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Login</li>
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
                            <p>Enter your credentials to access your account</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                {{-- <div class="error" id="emailError"> --}}
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                {{-- </div> --}}
                            </div>

                            <div class="form-group">
                                <input id="password" type="password" id="togglePassword" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                                <button type="button" id="togglePassword">
                                    👁️
                                </button>
                                {{-- <div class="error" id="passwordError"> --}}
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                {{-- </div> --}}
                            </div>

                            <div class="remember-forgot">
                                <div class="remember-me">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                <a class="forgot-password" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>

                            <button type="submit" class="login-btn" id="loginButton">
                                Sign in
                            </button>
                        </form>
                    </div>
                </div><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>
</div>

@endsection
