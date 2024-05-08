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
    <input type="hidden" name="skpak_id" id="skpak_id" value="{{ $id }}">
    <ul class="nav nav-pills nav-first nav-justified" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder active" id="validasi-1-tab" data-bs-toggle="tab"
                href="#validasi-1" aria-controls="validasi-1" role="tab" aria-selected="true">
                ITEM CQ 1
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-2-tab" data-bs-toggle="tab"
                href="#validasi-2" aria-controls="validasi-2" role="tab" aria-selected="false">
                ITEM CQ 2
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-3-tab" data-bs-toggle="tab"
                href="#validasi-3" aria-controls="validasi-3" role="tab" aria-selected="false">
                ITEM CQ 3
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-4-tab" data-bs-toggle="tab"
                href="#validasi-4" aria-controls="validasi-4" role="tab" aria-selected="false">
                ITEM CQ 4
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-5-tab" data-bs-toggle="tab"
                href="#validasi-5" aria-controls="validasi-5" role="tab" aria-selected="false">
                ITEM CQ 5
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="senarai-semak-tab" data-bs-toggle="tab"
                href="#senarai-semak" aria-controls="senarai-semak" role="tab" aria-selected="false">
                SENARAI <br> SEMAK
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="pemarkahan-tab" data-bs-toggle="tab"
                href="#pemarkahan" aria-controls="pemarkahan" role="tab" aria-selected="false" onclick="getjumlah()">
                PEMARKAHAN
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

    function getjumlah() {
        var id = $('#skpak_id').val();
        var url = "{{ route('skpak.get-jumlah-skor') }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id: id,
                type: 'verfikasi'
            },
            success: function(response) {
                $('#pemarkahan').empty();
                $('#pemarkahan').append(response)
            }
        });
    }
</script>
