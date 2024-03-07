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
    {{-- <input type="hidden" name="butiran_id" id="butiran_id" value="{{ $butiran_id }}"> --}}
    <ul class="nav nav-pills nav-justified" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder active" id="penilai-kendiri-tab" data-bs-toggle="tab"
                href="#penilai-kendiri" aria-controls="penilai-kendiri" role="tab" aria-selected="true">
                BUTIRAN PENILAI KENDIRI
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="pendidikan-swasta-tab" data-bs-toggle="tab"
                href="#pendidikan-swasta" aria-controls="pendidikan-swasta" role="tab" aria-selected="true"
                onclick="tabclicked('#pendidikan-swasta')">
                BUTIRAN INSTITUSI PENDIDIKAN SWASTA
            </a>
        </li>

    </ul>

    <div class="card">
        <div class="card-body">
            <div class="tab-content">

                <div class="tab-pane active" id="penilai-kendiri" role="tabpanel" aria-labelledby="penilai-kendiri-tab">
                    @include('skips.borang_skips_sekolah.borang.penilai')
                </div>
                <div class="tab-pane fade" id="pendidikan-swasta" role="tabpanel" aria-labelledby="pendidikan-swasta-tab">
                    @include('skips.borang_skips_sekolah.borang.institut')
                </div>

            </div>
        </div>
    </div>
@endsection

<script type="text/javascript"></script>
