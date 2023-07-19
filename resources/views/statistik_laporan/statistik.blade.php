@extends('layouts/contentLayoutMaster')

@section('header')
    Statistik
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('msg.home')}}</a></li>
    <li class="breadcrumb-item">
        <a>Statistik</a>
    </li>
@endsection

@section('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
@endsection

@section('content')

<section id="chartjs-chart">
    <div class="row match-height">

        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title fw-bolder">Kedudukan Istitusi (5 Teratas)</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table header_uppercase table-bordered table-responsive table-hovered" id="senarai_permohonan" style="">
                            <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Nama Institusi </th>
                                    <th> Peratusan </th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td> 1. </td>
                                    <td> Maktab Rendah Sains MARA </td>
                                    <td> 100 </td>
                                </tr>

                                <tr>
                                    <td> 2 </td>
                                    <td> Universiti Teknologi MARA </td>
                                    <td> 80</td>
                                </tr>

                                <tr>
                                    <td> 3 </td>
                                    <td> Universiti Sultan Zainal Abidin </td>
                                    <td> 70</td>
                                </tr>

                                <tr>
                                    <td> 4 </td>
                                    <td> Kementerian Pelajaran Tinggi Malaysia </td>
                                    <td> 70</td>
                                </tr>

                                <tr>
                                    <td> 5 </td>
                                    <td> Universiti Sarawak Malaysia </td>
                                    <td> 68</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-12">
            <div class="card">
                <div class=" card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                    <div class="header-left">
                        <h4 class="card-title">Purata Skor Kualiti</h4>
                    </div>
                    <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <canvas class="bar-chart-ex chartjs" data-height="400"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                    <div class="header-left">
                        <h4 class="card-title">Klasifikasi Program</h4>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <canvas class="horizontal-bar-chart-ex chartjs" data-height="400"></canvas>
                </div>
            </div>
        </div>

        {{--<div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ringkasan Perbelanjaan bagi Tahun Semasa</h4>
                    <p class="text-muted">Peruntukan dan Perbelanjaan Keseluruhan bagi Tahun 2022</p>
                </div>

                <div class="card-body">
                    <hr>
                    <h4 class="card-title"><b>Jumlah Peruntukan: </b> RM4.38 Bilion</h4>
                    <canvas class="doughnut-chart-ex chartjs" data-height="275"></canvas>
                    <hr>


                    <div class="d-flex justify-content-between mt-3 mb-1">
                        <div class="d-flex align-items-center">
                            <i data-feather="monitor" class="font-medium-2 text-primary"></i>
                            <span class="fw-bold ms-75 me-25">Sasaran Penerima Geran</span>
                        </div>
                        <div>
                            <span>310, 030</span>
                            <i data-feather="arrow-up" class="text-success"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <div class="d-flex align-items-center">
                            <i data-feather="tablet" class="font-medium-2 text-warning"></i>
                            <span class="fw-bold ms-75 me-25">Pencapaian Terkini</span>
                        </div>
                        <div>
                            <span>563, 783</span>
                            <i data-feather="arrow-up" class="text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}

        <div class="col-xl-4 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start">
                    <h4 class="card-title">Pencapaian Matlamat Kualiti</h4>
                </div>
                <hr>
                <div class="card-body">
                    <h4 class="card-title">
                    <div id="donut-chart"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('vendor-script')
<script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/charts/chart.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{ asset(mix('js/scripts/charts/chart-chartjs.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/charts/chart-apex.js')) }}"></script>
@endsection
