@extends('layouts.app')

@section('content')
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        {{-- <a class="brand-logo">
                            <img style="width: 100px !important;" src="{{ asset('app-assets/images/smart-life-investment-logo.png') }}">
                        </a> --}}
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center" style="padding-right: 0rem;padding-left: 0rem;">
                            <div class=""><img class="img-fluid" src="{{ asset('app-assets/images/pages/bg-log-img-03.jpg') }}" alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-lg-center auth-bg px-2 p-lg-5 py-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1 pt-lg-0 pt-5" style="color: #fff;font-size: 26px;text-align: center;">Welcome to Smart Life  Investment</h2>
                                <form autocomplete="off" class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="login-email" style="color: #ffffff;font-size: 14px;">Email</label>

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password" style="color: #ffffff;font-size: 14px;">Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" tabindex="3" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label text-white" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection





