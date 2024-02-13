@extends('layouts.app')

@section('header')
SPKS
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> SPKS </a>
</li>

@endsection

@section('content')
<style>
    #TableSenaraiInstrumenSpks thead th {
        vertical-align: middle;
        text-align: center;
    }

    #TableSenaraiInstrumenSpks tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #TableSenaraiInstrumenSpks table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai SPKS </h4>
    </div>

    <hr>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4 mb-1">
                <label class="fw-bolder">Jenis Sekolah</label>
                <select name="" id="" class="form-control select2">
                    <option value="" hidden>Jenis Sekolah</option>
                    <option value="0">Semua Sekolah</option>
                    <option value="1">Sekolah Rendah</option>
                    <option value="2">Sekolah Menengah</option>
                </select>
            </div>

            <div class="col-md-8 mb-1">
                <label class="fw-bolder">Negeri</label>
                <select name="" id="" class="form-control select2" multiple>
                    <option value="" hidden>Negeri</option>
                    <option value="0">Semua Negeri</option>
                    <option value="1">Selangor</option>
                    <option value="2">WP KL</option>
                </select>
            </div>

            <div class="col-md-6 mb-1">
                <label class="fw-bolder">Nama PPD</label>
                <select name="" id="" class="form-control select2" multiple>
                    <option value="" hidden>PPD</option>
                    <option value="0">Semua PPD</option>
                    <option value="1">PPD Hulu Selangor</option>
                    <option value="2">PPD Serdang</option>
                </select>
            </div>

            <div class="col-md-6 mb-1">
                <label class="fw-bolder">Nama Sekolah</label>
                <select name="" id="" class="form-control select2" multiple>
                    <option value="" hidden>Sekolah</option>
                    <option value="0">Semua Sekolah</option>
                    <option value="1">SMK Hulu Selangor</option>
                    <option value="2">SMK Serdang</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-end align-items-center mt-1">
            <a class="me-3 text-danger" type="button" id="reset" href="#">
                Setkan Semula
            </a>
            <button type="button" onclick="search()" class="btn btn-success float-right">
                <i class="fa fa-search me-1"></i> Cari
            </button>
        </div>

        <hr>
        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiInstrumenSpks">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Jenis Sekolah</th>
                        <th>Nama Sekolah</th>
                        <th>Tarikh Penghantaran</th>
                        <th>Tarikh Validasi</th>
                        <th>Status</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sekolah Menengah</td>
                        <td>SMK Hulu Selangor</td>
                        <td>12-00-2000</td>
                        <td></td>
                        <td>
                            <span class="badge rounded-pill badge-light-primary">
                                Baru Dihantar
                            </span>
                        </td>
                        <td>
                            <div class="btn-group " role="group" aria-label="Action">
                                <a href="{{ route('spks.validasi_pengisian') }}" class="btn btn-xs btn-default" title="">
                                    <i class="fas fa-eye text-primary"></i>
                                </a>
                                <a class="btn btn-xs btn-default" title="">
                                    <i class="fas fa-pencil text-primary"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
