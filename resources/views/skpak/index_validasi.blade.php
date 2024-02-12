@extends('layouts.app')

@section('header')
SKPAK
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Instumen/ Modul </a></li>
<li class="breadcrumb-item"><a href="#"> Jaminan Kualiti Pendidikan Awal Kanak-Kanak </a></li>
@endsection

@section('content')
<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="validasi-1-tab" data-bs-toggle="tab" href="#validasi-1" aria-controls="validasi-1" role="tab" aria-selected="true">
            ITEM CQ 1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-2-tab" data-bs-toggle="tab" href="#validasi-2" aria-controls="validasi-2" role="tab" aria-selected="false">
            ITEM CQ 2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-3-tab" data-bs-toggle="tab" href="#validasi-3" aria-controls="validasi-3" role="tab" aria-selected="false">
            ITEM CQ 3
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-4-tab" data-bs-toggle="tab" href="#validasi-4" aria-controls="validasi-4" role="tab" aria-selected="false">
            ITEM CQ 4
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-5-tab" data-bs-toggle="tab" href="#validasi-5" aria-controls="validasi-5" role="tab" aria-selected="false">
            ITEM CQ 5
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="senarai-semak-tab" data-bs-toggle="tab" href="#senarai-semak" aria-controls="senarai-semak" role="tab" aria-selected="false">
            SENARAI <br> SEMAK
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="pemarkahan-tab" data-bs-toggle="tab" href="#pemarkahan" aria-controls="pemarkahan" role="tab" aria-selected="false">
            PEMARKAHAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="penyelarasan-pemarkahan-tab" data-bs-toggle="tab" href="#penyelarasan-pemarkahan" aria-controls="penyelarasan-pemarkahan" role="tab" aria-selected="false">
            SELARAS <br> MARKAH
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="selaras-nilai-tab" data-bs-toggle="tab" href="#selaras-nilai" aria-controls="selaras-nilai" role="tab" aria-selected="false" onclick="getJumlah()">
            PENYELARASAN <br> PENILAI
        </a>
    </li>
</ul>

<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="validasi-1" role="tabpanel" aria-labelledby="validasi-1-tab">
                @include('skpak.validasi_skpak.cq1.index')
            </div>
            <div class="tab-pane fade" id="validasi-2" role="tabpanel" aria-labelledby="validasi-2-tab">
                @include('skpak.validasi_skpak.cq2.index')
            </div>
            <div class="tab-pane fade" id="validasi-3" role="tabpanel" aria-labelledby="validasi-3-tab">
                @include('skpak.validasi_skpak.cq3.index')
            </div>
            <div class="tab-pane fade" id="validasi-4" role="tabpanel" aria-labelledby="validasi-4-tab">
                @include('skpak.validasi_skpak.cq4.index')
            </div>
            <div class="tab-pane fade" id="validasi-5" role="tabpanel" aria-labelledby="validasi-5-tab">
                @include('skpak.validasi_skpak.cq5.index')
            </div>
            <div class="tab-pane fade" id="senarai-semak" role="tabpanel" aria-labelledby="senarai-semak-tab">
                @include('skpak.validasi_skpak.senarai_semak.index')
            </div>
            <div class="tab-pane fade" id="pemarkahan" role="tabpanel" aria-labelledby="pemarkahan-tab">
                @include('skpak.validasi_skpak.permarkahan')
            </div>
            <div class="tab-pane fade" id="penyelarasan-pemarkahan" role="tabpanel" aria-labelledby="penyelarasan-pemarkahan-tab">
                @include('skpak.validasi_skpak.selaras_markah.index')
            </div>
            <div class="tab-pane fade" id="selaras-nilai" role="tabpanel" aria-labelledby="selaras-nilai-tab">

            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
var fragmentIdentifier = window.location.hash;
function tabclicked(argument) {
    console.log(argument)
 }
</script>
