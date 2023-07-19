@extends('layouts.app')

@section('header')
Instrumen
@endsection

@section('vendor-style')
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Instrumen</a></li>
@endsection

@section('content')

@php
$name = 'SMK KUALA LUMPUR';
$address1 = 'Taman Sri Sinar Segambut';
$address2 = 'No.48 Jalan 8, Wilayah Persekutuan';
$emel = 'smk@gmail.com';
$website = 'www.smk.com';
$poscode = '55200';
$pelajar = '500';
$keluasan = '3';
$guru = '20';
$staff = 15;
$phone_number = '0112776477';
$dob = '22-07-1999';
$tarikh = '22-07-2022';
$faks = '0295552012';
$kategori = ['Bandar', 'Luar Bandar', 'Pedalaman'];
@endphp

<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Instrumen </h4>
    </div>
    <hr>

    <div class="card-body">
        <div class="row ">
            <div class="col-md-4">
                <label class="form-label fw-bolder">ID Instrumen </label>
                <input type="text" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bolder">Nama Instrumen</label>
                <input type="text" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bolder">Tarikh Diterima</label>
                <input type="date" class="form-control">
            </div>

            <div class="d-flex justify-content-end align-items-center my-1 ">
                <a class="me-3" type="button" id="reset" href="#">
                    <span class="text-danger"> Reset </span>
                </a>
                <button type="submit" class="btn btn-success float-right">
                    <i class="fa fa-search"></i> Search
                </button>
            </div>
        </div>

        <div class="btn-group" role="group" aria-label="Role Action">
            <a href="#" class="btn btn-outline-success waves-effect">
                <i class="fa fa-file-excel text-success"></i> Excel
            </a>
            <a href="#" class="btn btn-outline-danger waves-effect">
                <i class="fa fa-file-pdf text-danger"></i> PDF
            </a>
        </div>

        <hr>

        <style>
            #senarai_permohonan thead th {
                vertical-align: middle;
                text-align: center;
            }

            #senarai_permohonan tbody{
                vertical-align: middle;
            }

        </style>
        @php $count = 1; @endphp

        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-responsive table-hovered" id="senarai_permohonan" style="">
                <thead>
                    <tr>
                        <th> No. </th>
                        <th> ID Instrumen </th>
                        <th> Nama Instrumen </th>
                        <th> Keterangan Instrumen </th>
                        <th> Tarikh Didaftarkan </th>
                        <th> Status </th>
                        <th> Tindakan </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td> 1. </td>
                        <td> 24678 </td>
                        <td> Pemeriksaan Persediaan Sesi Persekolahan 2023/2024 Jabatan Pendidikan Negeri Perak </td>
                        <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </td>
                        <td> 18/07/2023 </td>
                        <td>
                            <span class="badge pill-badge-glow bg-primary">Instrumen Baharu</span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm d-flex justify-content-center" role="group" aria-label="Action">
                                <a data-bs-toggle="modal" data-bs-target="#edit_instrumen" aria-controls="edit_instrumen" class="btn btn-xs btn-default"> <i class="fas fa-pencil text-primary"></i>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td> 2 </td>
                        <td> 20987 </td>
                        <td> Instrumen Penilaian Implementasi Teknologi dalam Proses Pembelajaran Instrumen Evaluasi Kualiti Sarana dan Prasarana di Sekolah</td>
                        <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </td>
                        <td> 18/07/2023 </td>
                        <td>
                            <span class="badge pill-badge-glow bg-success">Instrumen Selesai</span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm d-flex justify-content-center" role="group" aria-label="Action">
                                <a data-bs-toggle="modal" data-bs-target="#edit_instrumen" aria-controls="edit_instrumen" class="btn btn-xs btn-default"> <i class="fas fa-pencil text-primary"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="modal fade" id="edit_instrumen" tabindex="-1" aria-labelledby="edit_instrumen" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Pemeriksaan Persediaan Sesi Persekolahan 2023/2024 Jabatan Pendidikan Negeri Perak
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills nav-justified pt-2" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-uppercase active" id="section1baru-tab" data-bs-toggle="tab" href="#section1baru" aria-controls="section1baru" role="tab" aria-selected="true">
                            <b>Maklumat Sekolah</b>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-uppercase" id="section2baru-tab" data-bs-toggle="tab" href="#section2baru" aria-controls="section2baru" role="tab" aria-selected="true">
                            <b>Maklumat Penilaian</b>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-uppercase" id="section3baru-tab" data-bs-toggle="tab" href="#section3baru" aria-controls="section3baru" role="tab" aria-selected="true" aria-selected="true">
                            <b>Keputusan Penilaian</b>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="section1baru" role="tabpanel" aria-labelledby="section1baru-tab" aria-expanded="false">
                        <hr>
                        @include('instrumen.tab.tab1-maklumat-penyertaan')
                    </div>

                    <div class="tab-pane" id="section2baru" role="tabpanel" aria-labelledby="section2baru-tab" aria-expanded="true">
                        @include('instrumen.tab.tab2-maklumat-penilaian')
                    </div>

                    <div class="tab-pane" id="section3baru" role="tabpanel" aria-labelledby="section3baru-tab" aria-expanded="true">
                        @include('instrumen.tab.tab3-keputusan-penilaian')
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <div class="d-flex justify-content-between">
                    <button class="btn btn-success btn-next" onclick="fakeSuccess()">
                        <span class="align-middle d-sm-inline-block d-none">Simpan Penilaian</span>
                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection

@section('page-script')
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection
