@php
    $configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">

    <style>
        .fill {
            overflow: hidden;
            background-size: cover;
            background-position: center;
            opacity: 0.5;
            background-image: url('{{ asset('images/logo/ehartanah.jpg') }}');
        }
    </style>
@endsection

@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">

            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5 fill">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                </div>
            </div>

            <!-- Register-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">

                    <center>
                        <img class="mb-1" src="{{ asset('images/logo/jata_negara.png') }}" style="width: 12vw">
                        <hr>
                        <h3 class="card-title fw-bold mb-1 text-wrap">System Name</h2>
                            <p class="card-text mb-2">Pendaftaran Akaun Baharu</p>
                    </center>

                    <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-1">
                            <label class="form-label" for="register-username">Nama Penuh</label>
                            <input class="form-control" id="register-username" type="text" name="register-username"
                                aria-describedby="register-username" autofocus="" tabindex="1" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="register-email">Emel</label>
                            <input class="form-control" id="register-email" type="text" name="register-email"
                                aria-describedby="register-email" tabindex="2" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="register-password">Kata Laluan</label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge" id="register-password" type="password"
                                    name="register-password" placeholder="············" aria-describedby="register-password"
                                    tabindex="3" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="form-check">
                                <input class="form-check-input" id="register-privacy-policy" type="checkbox"
                                    tabindex="4" />
                                <label class="form-check-label" for="register-privacy-policy">I agree to<a
                                        href="#">&nbsp;privacy policy & terms</a></label>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100" tabindex="5">Daftar Akaun</button>
                    </form>

                    <div class="divider my-2">
                        <div class="divider-text">atau</div>
                    </div>

                    <div class="auth-footer-btn d-flex justify-content-center">
                        <a href="{{ route('login') }}"> Daftar Masuk </a>
                    </div>
                </div>
            </div>
            <!-- /Register-->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('js/scripts/pages/auth-register.js') }}"></script>
@endsection
