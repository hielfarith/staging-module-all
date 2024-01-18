@php
    $configData = Helper::applClasses();
@endphp

@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">

    <style>
        .fill {
            overflow: hidden;
            background-size: cover;
            background-position: center;
            opacity: 0.5;
            background-image: url('{{ asset('images/bg_sppip.jpg') }}');
        }
    </style>
@endsection

@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <div class="d-none d-lg-flex col-lg-8 align-items-center fill">
            </div>

            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <center>
                        <img class="mb-2" src="{{ asset('images/logo/jata_negara.png') }}" style="width: 10vw">
                        <hr>
                        <h2 class="mt-2 card-title fw-bold mb-1">
                            SISTEM PEMERIKSAAN DAN PENILAIAN INSTITUSI PENDIDIKAN
                        </h2>

                        <p class="card-text mb-2">Please sign-in to your account</p>

                        @if (env('APP_URL') != 'production')
                            <p class="login-box-msg">
                                {{ __('msg.loginInstruction') }}
                                <br>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#loginDemo">
                                    <small class="colorTitle"><u> {{ __('msg.loginInstruction2') }}</u></small>
                                </a>
                            </p>
                        @endif
                    </center>

                    <form id="loginForm" class="auth-login-form mt-2" method="post" action="{{ url('/login') }}">
                        @csrf
                        <div class="mb-1">
                            <label class="form-label" for="login-email">Email</label>
                            <input class="form-control" id="login-email" type="text" name="email"
                                placeholder="john@example.com" aria-describedby="login-email" autofocus=""
                                tabindex="1" />
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="login-password">Password</label>
                                <a href="{{ route('password.request') }}">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge" id="login-password" type="password"
                                    name="password" placeholder="············" aria-describedby="login-password"
                                    tabindex="2" />
                                <span class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-1">
                            <div class="form-check">
                                <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" />
                                <label class="form-check-label" for="remember-me"> Remember Me</label>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 login-tour" tabindex="4">Sign in</button>
                    </form>

                    <div class="divider my-2">
                        <div class="divider-text">or</div>
                    </div>
                    <p class="text-center mt-2">

                    <p class="text-center mt-2">
                        <span>Don't have account?</span>
                        <a href="{{ route('register') }}">
                            <span>Register Account</span>
                        </a>
                    </p>


                </div>
            </div>
        </div>
    </div>

    @if (!in_array(env('APP_ENV'), ['production']))
        <div class="modal login fade right" id="loginDemo" tabindex="-1" aria-labelledby="loginDemo"
            data-bs-backdrop="false" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="margin-top: 65%">
                    <div class="modal-header">
                        <h4 class="modal-title">Pengguna Demo untuk SPPIP®</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body login" style="height:10%; ">
                        <div class="list-group">
                            <a href="javascript:demoLogin(0)" class="list-group-item list-group-item-action">
                                Superadmin
                            </a>
                            <a href="javascript:demoLogin(1)" class="list-group-item list-group-item-action">
                                Pengguna Dalaman
                            </a>
                            <a href="javascript:demoLogin(2)" class="list-group-item list-group-item-action">
                                Pengguna Luar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/auth-login.js')) }}"></script>
@endsection

@section('script')
    <script>
        @if (env('APP_URL') != 'production')
            function demoLogin(index) {
                var credential = [{
                        email: 'superadmin@yopmail.com',
                        password: 'password',
                    },
                    {
                        email: 'admin@yopmail.com',
                        password: 'password',
                    },
                    {
                        email: 'siti_ahmad@yopmail.com',
                        password: 'password',
                    }
                ];

                $('[name="email"]').val(credential[index].email);
                $('[name="password"]').val(credential[index].password);
                $('#loginDemo').modal('hide');
                $('#loginForm')[0].submit();
            }
        @endif
    </script>

@endsection
