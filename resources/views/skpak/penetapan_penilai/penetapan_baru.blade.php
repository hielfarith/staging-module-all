@extends('layouts.app')

@section('header')
Pengurusan Panel Penilai
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Penetapan Penilai </a>
</li>

{{-- <li class="breadcrumb-item">
    <a href="#"> Pengurusan Panel Penilai </a>
</li> --}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Penetapan Penilai </h4>


    </div>

    <div class="card-body">
        <div class="row">
            <hr>
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Taska
                </span>
            </h5>

            <div class="col-md-6">
                <label class="fw-bold form-label">Nama Taska
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="nama_taska" required>
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Jenis Taska
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="jenis_taska" required>
                    <option value="">Jenis Taska</option>
                    <option value="swasta">swasta</option>
                    <option value="kerajan">kerajan</option>
                </select>
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Tarikh Penubuhan
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control flatpickr" name="tarikh_penubuhan" required>
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Jenis Bangunan
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="jenisbanugunan" required>
                    <option value="">pilih</option>
                    <option value="tempat kerja">Tempat Kerja</option>
                    <option value="rumah kedai">Rumah Kedai</option>
                    <option value="bangunan">Bangunan</option>
                    <option value="teres">Teres</option>
                    <option value="banglo">Banglo</option>
                </select>
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Jumlah Pendidik
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="jumla_pendidik" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Jumlah Kanak-Kanak
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="jumlah_kanak" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Jumlah Staf Sokongan
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="jumla_staf_sokogan" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>

            <hr>
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Panel Penilai 1
                </span>
            </h5>

            <div class="col-md-9 mb-1">
                <label class="fw-bold form-label">Penilai
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="jenis_taska" required>
                    <option value="">Penilai</option>
                    <option value="swasta">swasta</option>
                    <option value="kerajan">kerajan</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="fw-bold form-label">Tarikh
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="nama_taska" required>
            </div>

            <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Panel Penilai 2
                    </span>
                </h5>

                <div class="col-md-9 mb-1">
                    <label class="fw-bold form-label">Penilai
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jenis_taska" required>
                        <option value="">Penilai</option>
                        <option value="swasta">swasta</option>
                        <option value="kerajan">kerajan</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="fw-bold form-label">Tarikh
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_taska" required>
                </div>
        </div>

            <div class="d-flex justify-content-end align-items-center mt-1">
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>

        </div>
    </div>
@endsection
