@extends('backend.layouts.responsable_auth')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')

<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="{{ asset('assets/vendors/images/login-page-img.png') }}" alt="" />
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Responsable Login</h2>
                    </div>
                    <form action="{{ route('responsable.login-handler') }}" method="POST">
                        @csrf
                        <x-alert.form-alert />
                        <div class="input-group custom">
                            <input type="text" class="form-control form-control-lg" placeholder="Email/Username"
                                name="login_id" value="{{ old('login_id') }}">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        @error('login_id')
                        <div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg" placeholder="**********"
                                name="password">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        @error('password')
                        <div class="d-block text-danger" style="margin-top: -25px;margin-bottom:15px;">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="row pb-30">
                            <div class="col-6">
                            </div>
                            <div class="col-6">
                                <div class="forgot-password">
                                    <a href="">Forgot Password</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                </div>
                                <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                                    OU
                                </div>
                                <div class="input-group mb-0">
                                    <a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To
                                        Create Account</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
