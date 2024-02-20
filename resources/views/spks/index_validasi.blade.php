@extends('layouts.app')

@section('header')
SPKS
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item"><a href="#"> Instrumen/ Modul </a></li>
    <li class="breadcrumb-item"><a href="#"> Sistem Penarafan Keselamatan Sekolah </a></li>
@endsection

@section('content')
<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="validasi-aspek-1-tab" data-bs-toggle="tab" href="#validasi-aspek-1" aria-controls="validasi-aspek-1" role="tab" aria-selected="true">
            ASPEK 1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-aspek-2-tab" data-bs-toggle="tab" href="#validasi-aspek-2" aria-controls="validasi-aspek-2" role="tab" aria-selected="false">
            ASPEK 2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-aspek-3-tab" data-bs-toggle="tab" href="#validasi-aspek-3" aria-controls="validasi-aspek-3" role="tab" aria-selected="false">
            ASPEK 3
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-aspek-4-tab" data-bs-toggle="tab" href="#validasi-aspek-4" aria-controls="validasi-aspek-4" role="tab" aria-selected="false">
            ASPEK 4
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-aspek-5-tab" data-bs-toggle="tab" href="#validasi-aspek-5" aria-controls="validasi-aspek-5" role="tab" aria-selected="false">
            ASPEK 5
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-aspek-6-tab" data-bs-toggle="tab" href="#validasi-aspek-6" aria-controls="validasi-aspek-6" role="tab" aria-selected="false">
            ASPEK 6
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-jumlah-tab" data-bs-toggle="tab" href="#validasi-jumlah" aria-controls="validasi-jumlah" role="tab" aria-selected="false" onclick="">
            JUMLAH
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-skor-tab" data-bs-toggle="tab" href="#validasi-skor" aria-controls="validasi-skor" role="tab" aria-selected="false" onclick="">
            SKOR PIAWAIAN
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="catatan-validasi-tab" data-bs-toggle="tab" href="#catatan-validasi" aria-controls="catatan-validasi" role="tab" aria-selected="false" onclick="">
            RINGKASAN CATATAN
        </a>
    </li>
</ul>

<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="validasi-aspek-1" role="tabpanel" aria-labelledby="validasi-aspek-1-tab">
                @include('spks.validasi_spks.aspek_1.indexv_aspek1')
            </div>
            <div class="tab-pane fade" id="validasi-aspek-2" role="tabpanel" aria-labelledby="validasi-aspek-2-tab">
                @include('spks.validasi_spks.aspek_2')
            </div>
            <div class="tab-pane fade" id="validasi-aspek-3" role="tabpanel" aria-labelledby="validasi-aspek-3-tab">
                @include('spks.validasi_spks.aspek_3')
            </div>
            <div class="tab-pane fade" id="validasi-aspek-4" role="tabpanel" aria-labelledby="validasi-aspek-4-tab">
                @include('spks.validasi_spks.aspek_4')
            </div>
            <div class="tab-pane fade" id="validasi-aspek-5" role="tabpanel" aria-labelledby="validasi-aspek-5-tab">
                @include('spks.validasi_spks.aspek_5')
            </div>
            <div class="tab-pane fade" id="validasi-aspek-6" role="tabpanel" aria-labelledby="validasi-aspek-6-tab">
                @include('spks.validasi_spks.aspek_6')
            </div>
            <div class="tab-pane fade" id="validasi-jumlah" role="tabpanel" aria-labelledby="validasi-jumlah-tab">
                @include('spks.validasi_spks.jumlah')
            </div>
            <div class="tab-pane fade" id="validasi-skor" role="tabpanel" aria-labelledby="validasi-skor-tab">
                @include('spks.validasi_spks.skor_piawaian')
            </div>
            <div class="tab-pane fade" id="catatan-validasi" role="tabpanel" aria-labelledby="catatan-validasi-tab">
                @include('spks.validasi_spks.catatan_sekolah')
            </div>
        </div>
    </div>
</div>
@endsection
