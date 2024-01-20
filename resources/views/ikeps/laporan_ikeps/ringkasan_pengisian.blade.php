@extends('layouts.app')

@section('header')
I-KePS
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Instumen/ Modul </a></li>
<li class="breadcrumb-item"><a href="#"> Ringkasan Maklumat I-KePS 2023 Seluruh Malaysia </a></li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Ringkasan Maklumat I-KePS 2023 Seluruh Malaysia </h4>

        <div class="justify-content-end align-items-center" style="width: 10%">
            <label class="form-label fw-bold">Tahun Kutipan</label>
            <select name="" id="" class="form-select select2">
                @for ($year = date('Y') - 5; $year <= date('Y'); $year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>
    </div>
    <hr>

    <div class="card-body">

        <div class="d-flex justify-content-end align-items-center mb-2">
            <div class="btn-group" role="group" aria-label="Role Action">
                <a href="#" class="btn btn-outline-success waves-effect">
                    <i class="fa fa-file-excel text-success"></i> Muat Turun Excel
                </a>
                <a href="#" class="btn btn-outline-info waves-effect">
                    <i class="fa fa-print text-info"></i> Cetak
                </a>
            </div>
        </div>

        <style>
            thead th {
                vertical-align: middle;
                text-align: center;
            }

            tbody{
                vertical-align: middle;
            }
        </style>

        <ul class="nav nav-pills nav-justified" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="text-uppercase text-wrap nav-link fw-bolder active" id="prasarana-sukan-tab" data-bs-toggle="tab" href="#prasarana-sukan" aria-controls="prasarana-sukan" role="tab" aria-selected="true">
                    Prasarana Sekolah
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="text-uppercase text-wrap nav-link fw-bolder" id="kemudahan-sukan-tab" data-bs-toggle="tab" href="#kemudahan-sukan" aria-controls="kemudahan-sukan" role="tab" aria-selected="true">
                    Kemudahan Sukan
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="text-uppercase text-wrap nav-link fw-bolder" id="perancangan-sukan-tab" data-bs-toggle="tab" href="#perancangan-sukan" aria-controls="perancangan-sukan" role="tab" aria-selected="true">
                    Perancangan Sukan
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="text-uppercase text-wrap nav-link fw-bolder" id="status-penyertaan-tab" data-bs-toggle="tab" href="#status-penyertaan" aria-controls="status-penyertaan" role="tab" aria-selected="true">
                    Status Penyertaan
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="text-uppercase text-wrap nav-link fw-bolder" id="program-sekolah-tab" data-bs-toggle="tab" href="#program-sekolah" aria-controls="program-sekolah" role="tab" aria-selected="true">
                    Program Sekolah Sukan
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="prasarana-sukan" role="tabpanel" aria-labelledby="prasarana-sukan-tab">
                @include('ikeps.laporan_ikeps.jadual_ringkasan.prasarana_sekolah')
            </div>
            <div class="tab-pane fade" id="kemudahan-sukan" role="tabpanel" aria-labelledby="kemudahan-sukan-tab">
                @include('ikeps.laporan_ikeps.jadual_ringkasan.kemudahan_sukan')
            </div>
            <div class="tab-pane fade" id="perancangan-sukan" role="tabpanel" aria-labelledby="perancangan-sukan-tab">
                @include('ikeps.laporan_ikeps.jadual_ringkasan.perancangan_sukan')
            </div>
            <div class="tab-pane fade" id="status-penyertaan" role="tabpanel" aria-labelledby="status-penyertaan-tab">
                @include('ikeps.laporan_ikeps.jadual_ringkasan.status_penyertaan')
            </div>
            <div class="tab-pane fade" id="program-sekolah" role="tabpanel" aria-labelledby="program-sekolah-tab">
                @include('ikeps.laporan_ikeps.jadual_ringkasan.program_sekolah')
            </div>
        </div>
    </div>
</div>
@endsection
