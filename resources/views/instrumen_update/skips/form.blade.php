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
    <ul class="nav nav-pills nav-first nav-justified" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder active" id="instrumen-skips-tab" data-bs-toggle="tab"
                href="#instrumen-skips-panel" role="tab" aria-controls="instrumen-skips-panel" aria-selected="true">
                Instrumen
            </a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="butiran-institusi-tab" data-bs-toggle="tab"
                href="#butiran-institusi" aria-controls="butiran-institusi" role="tab" aria-selected="true">
                BUTIRAN INSTITUSI
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-tab" data-bs-toggle="tab" href="#item"
                aria-controls="item" role="tab" aria-selected="true">
                ITEM STANDARD KUALITI
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="skor-item-tab" data-bs-toggle="tab" href="#skor-item"
                aria-controls="skor-item" role="tab" aria-selected="true">
                SKOR ITEM STANDARD KUALITI
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="pencapaian-tab" data-bs-toggle="tab"
                href="#pencapaian" aria-controls="pencapaian" role="tab" aria-selected="true">
                PENCAPAIAN KESELURUHAN
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="butiran-pemeriksaan-tab" data-bs-toggle="tab"
                href="#butiran-pemeriksaan" aria-controls="butiran-pemeriksaan" role="tab" aria-selected="true">
                BUTIRAN PEMERIKSAAN
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="ulasan-tab" data-bs-toggle="tab" href="#ulasan"
                aria-controls="ulasan" role="tab" aria-selected="true">
                ULASAN KESELURUHAN PEMERIKSAAN
            </a>
        </li>
    </ul>

    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="instrumen-skips-panel" role="tabpanel"
                    aria-labelledby="instrumen-skips-tab">
                    @include('instrumen_update.skips.tab1')
                </div>
                <div class="tab-pane fade" id="butiran-pemeriksaan" role="tabpanel"
                    aria-labelledby="butiran-pemeriksaan-tab">
                    @include('skips.borang_skips.butiran_pemeriksaan')
                </div>
                <div class="tab-pane" id="butiran-institusi" role="tabpanel" aria-labelledby="butiran-institusi-tab">
                    @include('skips.borang_skips.butiran_institusi')
                </div>
                <div class="tab-pane fade" id="item" role="tabpanel" aria-labelledby="item-tab">
                    @include('skips.index_item')
                </div>
                <div class="tab-pane fade" id="skor-item" role="tabpanel" aria-labelledby="skor-item-tab">
                    @include('skips.index_penilaian')
                </div>
                <div class="tab-pane fade" id="pencapaian" role="tabpanel" aria-labelledby="pencapaian-tab">
                    @include('skips.borang_skips.pencapaian')
                </div>
                <div class="tab-pane fade" id="ulasan" role="tabpanel" aria-labelledby="ulasan-tab">
                    @include('skips.borang_skips.ulasan')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
