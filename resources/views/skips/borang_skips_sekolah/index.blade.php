@extends('layouts.app')

@section('header')
    SKIPS
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item"><a href="#"> Instumen/ Modul </a></li>
    <li class="breadcrumb-item"><a href="#"> Standard Kualiti Institusi Pendidikan Swasta </a></li>
@endsection

@section('content')
    <style>
        .nav-first .nav-item {
            background-color: #FAE9DA;
            /* Set your desired background color */
            padding: 10px;
            /* Add padding for better appearance */

            /* Add border-radius for rounded corners */
        }

        .nav-first .nav-link.active {
            background-color: #ff6c62;
            /* Set your desired background color */
        }

        .nav-second .nav-item {
            background-color: #E4F1EE;
            /* Set your desired background color */
            padding: 10px;
            /* Add padding for better appearance */

            /* Add border-radius for rounded corners */
        }

        .nav-second .nav-link.active {
            background-color: #39c3b5;
            /* Set your desired background color */
        }
    </style>
    <input type="hidden" name="butiran_id" id="butiran_id" value="{{ $butiran_id }}">
    <ul class="nav nav-pills nav-first nav-justified" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder active" id="pendidikan-swasta-tab" data-bs-toggle="tab"
                href="#pendidikan-swasta" aria-controls="pendidikan-swasta" role="tab" aria-selected="true"
                onclick="tabclicked('#pendidikan-swasta')">
                BUTIRAN INSTITUSI PENDIDIKAN SWASTA
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="instrumen-skips-tab" data-bs-toggle="tab"
                href="#instrumen-skips" aria-controls="instrumen-skips" role="tab" aria-selected="true"
                onclick="tabclicked('#instrumen-skips')">
                INSTRUMEN SKIPS
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder " id="penilai-kendiri-tab" data-bs-toggle="tab"
                href="#penilai-kendiri" aria-controls="penilai-kendiri" role="tab" aria-selected="true">
                BUTIRAN PENILAI KENDIRI
            </a>
        </li>
    </ul>

    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="pendidikan-swasta" role="tabpanel" aria-labelledby="pendidikan-swasta-tab">
                    @include('skips.borang_skips_sekolah.borang.institut')
                </div>

                <div class="tab-pane fade" id="instrumen-skips" role="tabpanel" aria-labelledby="instrumen-skips-tab">
                    @include('skips.borang_skips_sekolah.borang.instrumen.index')
                </div>
                <div class="tab-pane fade" id="penilai-kendiri" role="tabpanel" aria-labelledby="penilai-kendiri-tab">
                    @include('skips.borang_skips_sekolah.borang.penilai')
                </div>
            </div>
        </div>
    </div>
@endsection


<script type="text/javascript">
    var fragmentIdentifier = window.location.hash;

    function tabclicked(argument) {
        // console.log(argument)
    }
</script>
