@extends('layouts.app')

@section('header')
    SPKS
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item"><a href="#"> Instrumen/ Modul </a></li>
    <li class="breadcrumb-item"><a href="#"> Sistem Penarafan Keselamatan Sekolah </a></li>
@endsection

@section('page-style')
    <style>
        .nav-pills .nav-link {
            font-size: 12px;
        }
    </style>
@endsection

@section('content')
    <ul class="nav nav-pills nav-justified" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="g-tab" data-bs-toggle="tab" href="#g"
                aria-controls="g" role="tab" aria-selected="false">
                GENERAL
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder active" id="validasi-aspek-1-tab" data-bs-toggle="tab"
                href="#validasi-aspek-1" aria-controls="validasi-aspek-1" role="tab" aria-selected="true">
                ASPEK 1
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-aspek-2-tab" data-bs-toggle="tab"
                href="#validasi-aspek-2" aria-controls="validasi-aspek-2" role="tab" aria-selected="false"
                onclick="choosetabMain('aspek2')">
                ASPEK 2
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-aspek-3-tab" data-bs-toggle="tab"
                href="#validasi-aspek-3" aria-controls="validasi-aspek-3" role="tab" aria-selected="false"
                onclick="choosetabMain('aspek3')">
                ASPEK 3
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-aspek-4-tab" data-bs-toggle="tab"
                href="#validasi-aspek-4" aria-controls="validasi-aspek-4" role="tab" aria-selected="false"
                onclick="choosetabMain('aspek4')">
                ASPEK 4
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-aspek-5-tab" data-bs-toggle="tab"
                href="#validasi-aspek-5" aria-controls="validasi-aspek-5" role="tab" aria-selected="false"
                onclick="choosetabMain('aspek5')">
                ASPEK 5
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-aspek-6-tab" data-bs-toggle="tab"
                href="#validasi-aspek-6" aria-controls="validasi-aspek-6" role="tab" aria-selected="false"
                onclick="choosetabMain('aspek6')">
                ASPEK 6
            </a>
        </li>
        {{-- <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-jumlah-tab" data-bs-toggle="tab" href="#validasi-jumlah" aria-controls="validasi-jumlah" role="tab" aria-selected="false" onclick="">
            JUMLAH
        </a>
    </li> --}}
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="validasi-skor-tab" data-bs-toggle="tab"
                href="#validasi-skor" aria-controls="validasi-skor" role="tab" aria-selected="false" onclick="">
                SKOR PIAWAIAN
            </a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="catatan-validasi-tab" data-bs-toggle="tab"
                href="#catatan-validasi" aria-controls="catatan-validasi" role="tab" aria-selected="false"
                onclick="">
                RINGKASAN CATATAN
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="jpn-verifikasi-tab" data-bs-toggle="tab"
                href="#jpn-verifikasi" aria-controls="jpn-verifikasi" role="tab" aria-selected="false"
                onclick="">
                VALIDASI KPM
            </a>
        </li>
    </ul>

    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade" id="g" role="tabpanel" aria-labelledby="g-tab">
                    @include('spks.validasi_spks.general')
                </div>
                <div class="tab-pane active" id="validasi-aspek-1" role="tabpanel"
                    aria-labelledby="validasi-aspek-1-tab">
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
                    @include('spks.validasi_spks.catatan_sekolah_validasi')
                </div>
                <div class="tab-pane fade" id="jpn-verifikasi" role="tabpanel" aria-labelledby="jpn-verifikasi-tab">
                    @include('spks.validasi_spks.jpn_validasi')
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    function choosetabMain(argument) {
        var APIUrl = "{{ env('APP_VERFIKASI_URL') }}" + 'api/spks/get-tab-jumlah';
        var id = <?php echo Request::segment(3); ?>

        $.ajax({
            url: APIUrl,
            method: 'POST',
            data: {
                id: id,
                tab: argument
            },
            success: function(response) {
                var data = response.data;
                var length = 8;
                var sum = 0;
                var sumid = argument + '_sum';
                if (argument == 'aspek1_sectionc') {
                    var length = 6;
                } else if (argument == 'aspek1_sectione') {
                    var length = 9;
                } else if (argument == 'aspek2') {
                    length = 13;
                } else if (argument == 'aspek6') {
                    length = 16;
                }

                for (var i = 0; i < length; i++) {
                    var id = argument + '_0_' + i;
                    var dataid = '0_' + i;
                    if ($.isNumeric(data[dataid])) {
                        sum += parseInt(data[dataid]);
                    }
                    $('#' + id).html(data[dataid]);
                }
                $('#' + sumid).html(sum);
            }
        });
    }
</script>
