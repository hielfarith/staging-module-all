@extends('layouts/contentLayoutMaster')

@section('header')
    Dashboard I-KePS
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item">
        <a>Dashboard I-KePS</a>
    </li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder">Ringkasan Maklumat Prasarana Sekolah</h4>
            </div>

            <div class="card-body">

                <style>
                    #dashboard_prasarana thead th {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #dashboard_prasarana tbody {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #dashboard_prasarana table {
                        width: 100% !important;
                        /* word-wrap: break-word; */
                    }

                </style>

                <hr>

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hovered" id="dashboard_prasarana">
                        <thead>
                            <tr>
                                <th rowspan="2">Jenis Prasarana</th>
                                <th rowspan="2">Sub Prasarana</th>
                                <th colspan="2">Bilangan</th>
                            </tr>
                            <tr>
                                <th>Ada</th>
                                <th>Tiada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $padangs = [
                                    'kt_400' => 'Keluasan Trek 400M',
                                    'kt_300' => 'Keluasan Trek 300M',
                                    'kt_200' => 'Keluasan Trek 200M',
                                    'ktk_200' => 'Keluasan Trek Kurang 200M'
                                ];
                                $treks = [
                                    'trek_400' => 'Trek 400M',
                                    'trek_200' => 'Trek 200M',
                                    'trek_lain' => 'Lain-lain'
                                ];
                                $astakas = [
                                    'astaka_l_500' => 'Kapasiti Melebihi 500',
                                    'astaka_k_500' => 'Kapasiti Kurang 500'
                                ];
                                $dewans = [
                                    'd_besar' => 'Dewan Besar',
                                    'd_khas' => 'Dewan Khas Untuk Sukan'
                                ];
                                $bilik_sukans = [
                                    'bps_1' => 'Stor 1 Bay',
                                    'bps_2' => 'Stor 2 Bay',
                                    'bps_3' => 'Stor 3 Bay',
                                ];
                                $bilik_persalinans = [
                                    'bp_lelaki' => 'Murid Lelaki',
                                    'bp_perempuan' => 'Murid Perempuan'
                                ];
                                $gelanggangs = [
                                    'gt_bumbung' => 'Gelanggan Terbuka Berbumbung',
                                    'gt' => 'Gelanggan Terbuka',
                                ];
                            ?>

                            @foreach ($padangs as $padangKey => $padang)
                            <tr>
                                <td> Padang Sekolah</td>
                                <td>{{ $padang }}</td>
                                <td>60</td>
                                <td>60</td>
                            </tr>
                            @endforeach

                            @foreach ($treks as $trekKey => $trek)
                            <tr>
                                <td> Trek Sintetik </td>
                                <td>{{ $trek }}</td>
                                <td>60</td>
                                <td>60</td>
                            </tr>
                            @endforeach

                            @foreach ($astakas as $astakaKey => $astaka)
                            <tr>
                                <td> Astaka </td>
                                <td>{{ $astaka }}</td>
                                <td>60</td>
                                <td>60</td>
                            </tr>
                            @endforeach

                            @foreach ($dewans as $dewanKey => $dewan)
                            <tr>
                                <td> Dewan </td>
                                <td>{{ $dewan }}</td>
                                <td>60</td>
                                <td>60</td>
                            </tr>
                            @endforeach

                            @foreach ($bilik_sukans as $bilik_sukanKey => $bilik_sukan)
                            <tr>
                                <td> Bilik Peralatan Sukan </td>
                                <td>{{ $bilik_sukan }}</td>
                                <td>60</td>
                                <td>60</td>
                            </tr>
                            @endforeach

                            @foreach ($bilik_persalinans as $bilik_persalinanKey => $bilik_persalinan)
                            <tr>
                                <td> Bilik Persalinan </td>
                                <td>{{ $bilik_persalinan }}</td>
                                <td>60</td>
                                <td>60</td>
                            </tr>
                            @endforeach

                            @foreach ($gelanggangs as $gelanggangKey => $gelanggang)
                            <tr>
                                <td> Gelanggang Serbaguna </td>
                                <td>{{ $gelanggang }}</td>
                                <td>60</td>
                                <td>60</td>
                            </tr>
                            @endforeach

                            <tr>
                                <td>Bilik Kecergasan</td>
                                <td></td>
                                <td>60</td>
                                <td>60</td>
                            </tr>

                            <tr>
                                <td>Makmal Sains Sukan</td>
                                <td></td>
                                <td>60</td>
                                <td>60</td>
                            </tr>

                            <tr>
                                <td>Kolam Renang</td>
                                <td></td>
                                <td>60</td>
                                <td>60</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder">Statistik Penyertaan Sekolah</h4>
            </div>

            <div class="card-body">
                <?php
                    $sukans = [
                        1 => 'Bola Baling',
                        2 => 'Bola Jaring',
                        3 => 'Bola Keranjang',
                        4 => 'Bola Sepak',
                        5 => 'Bola Tampar',
                    ];
                ?>

                <style>
                    #ringkasan_penyertaan thead th {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #ringkasan_penyertaan tbody {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #ringkasan_penyertaan table {
                        width: 100% !important;
                        /* word-wrap: break-word; */
                    }

                </style>

                <hr>

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hovered text-wrap" id="ringkasan_penyertaan">
                        <thead>
                            <tr>
                                <th rowspan="2">Nama Sukan</th>
                                <th colspan="6">Bilangan Sekolah</th>
                            </tr>

                            <tr>
                                <th>Zon</th>
                                <th>Daerah</th>
                                <th>Bahagian</th>
                                <th>Negeri</th>
                                <th>Kebangsaan</th>
                                <th>Antarabangsa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sukans as $id => $sukan)
                                <tr>
                                    <td> {{ $sukan }} </td>

                                    <td>
                                        60
                                    </td>

                                    <td>
                                        60
                                    </td>

                                    <td>
                                        60
                                    </td>

                                    <td>
                                        60
                                    </td>

                                    <td>
                                        60
                                    </td>

                                    <td>
                                        60
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder">Gauge Peratusan Bilangan Sekolah Selesai Mengisi</h4>
            </div>
        </div>
    </div>
</div>
@endsection
