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
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-1-tab" data-bs-toggle="tab" href="#item-1"
                aria-controls="item-1" role="tab" aria-selected="true">
                STANDARD <br> PENILAIAN 1
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-2-tab" data-bs-toggle="tab" href="#item-2"
                aria-controls="item-2" role="tab" aria-selected="false">
                STANDARD <br> PENILAIAN 2
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-3-tab" data-bs-toggle="tab" href="#item-3"
                aria-controls="item-3" role="tab" aria-selected="false">
                STANDARD <br> PENILAIAN 3
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-4-tab" data-bs-toggle="tab" href="#item-4"
                aria-controls="item-4" role="tab" aria-selected="false">
                STANDARD <br> PENILAIAN 4
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-5-tab" data-bs-toggle="tab" href="#item-5"
                aria-controls="item-5" role="tab" aria-selected="false">
                STANDARD <br> PENILAIAN 5
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-6-tab" data-bs-toggle="tab" href="#item-6"
                aria-controls="item-6" role="tab" aria-selected="false">
                STANDARD <br> PENILAIAN 6
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="jumlah-tab" data-bs-toggle="tab" href="#jumlah"
                aria-controls="jumlah" role="tab" aria-selected="false">
                JUMLAH
            </a>
        </li>
    </ul>

    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="instrumen-skips-panel" role="tabpanel"
                    aria-labelledby="instrumen-skips-tab">
                    @include('instrumen_update.skpak.tab1')
                </div>
                <div class="tab-pane" id="item-1" role="tabpanel" aria-labelledby="item-1-tab">
                    @include('skpak.borang_skpak.item_1')
                </div>
                <div class="tab-pane fade" id="item-2" role="tabpanel" aria-labelledby="item-2-tab">
                    @include('skpak.borang_skpak.item_2')
                </div>
                <div class="tab-pane fade" id="item-3" role="tabpanel" aria-labelledby="item-3-tab">
                    @include('skpak.borang_skpak.item_3')
                </div>
                <div class="tab-pane fade" id="item-4" role="tabpanel" aria-labelledby="item-4-tab">
                    @include('skpak.borang_skpak.item_4')
                </div>
                <div class="tab-pane fade" id="item-5" role="tabpanel" aria-labelledby="item-5-tab">
                    @include('skpak.borang_skpak.item_5')
                </div>
                <div class="tab-pane fade" id="item-6" role="tabpanel" aria-labelledby="item-6-tab">
                    @include('skpak.borang_skpak.item_6')
                </div>
                <div class="tab-pane fade" id="jumlah" role="tabpanel" aria-labelledby="jumlah-tab">
                    @include('skpak.borang_skpak.jumlah')
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
