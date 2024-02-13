@extends('layouts.app')

@section('header')
SPKS
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item"><a href="#"> Instumen/ Modul </a></li>
    <li class="breadcrumb-item"><a href="#"> Sistem Penarafan Keselamatan Sekolah </a></li>
@endsection

@section('content')
<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="aspek-1-tab" data-bs-toggle="tab" href="#aspek-1" aria-controls="aspek-1" role="tab" aria-selected="true">
            ASPEK 1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="aspek-2-tab" data-bs-toggle="tab" href="#aspek-2" aria-controls="aspek-2" role="tab" aria-selected="false">
            ASPEK 2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="aspek-3-tab" data-bs-toggle="tab" href="#aspek-3" aria-controls="aspek-3" role="tab" aria-selected="false">
            ASPEK 3
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="aspek-4-tab" data-bs-toggle="tab" href="#aspek-4" aria-controls="aspek-4" role="tab" aria-selected="false">
            ASPEK 4
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="aspek-5-tab" data-bs-toggle="tab" href="#aspek-5" aria-controls="aspek-5" role="tab" aria-selected="false">
            ASPEK 5
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="aspek-6-tab" data-bs-toggle="tab" href="#aspek-6" aria-controls="aspek-6" role="tab" aria-selected="false">
            ASPEK 6
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="jumlah-tab" data-bs-toggle="tab" href="#jumlah" aria-controls="jumlah" role="tab" aria-selected="false" onclick="jumlah()">
            JUMLAH
        </a>
    </li>
</ul>

<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="aspek-1" role="tabpanel" aria-labelledby="aspek-1-tab">
                @include('spks.borang_spks.aspek_1')
            </div>
            <div class="tab-pane fade" id="aspek-2" role="tabpanel" aria-labelledby="aspek-2-tab">
                @include('spks.borang_spks.aspek_2')
            </div>
            <div class="tab-pane fade" id="aspek-3" role="tabpanel" aria-labelledby="aspek-3-tab">
                @include('spks.borang_spks.aspek_3')
            </div>
            <div class="tab-pane fade" id="aspek-4" role="tabpanel" aria-labelledby="aspek-4-tab">
                @include('spks.borang_spks.aspek_4')
            </div>
            <div class="tab-pane fade" id="aspek-5" role="tabpanel" aria-labelledby="aspek-5-tab">
                @include('spks.borang_spks.aspek_5')
            </div>
            <div class="tab-pane fade" id="aspek-6" role="tabpanel" aria-labelledby="aspek-6-tab">
                @include('spks.borang_spks.aspek_6')
            </div>
            <div class="tab-pane fade" id="jumlah" role="tabpanel" aria-labelledby="jumlah-tab">
                @include('spks.borang_spks.jumlah')
            </div>
        </div>
    </div>
</div>
@endsection
