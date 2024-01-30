@extends('layouts.app')

@section('header')
Pengurusan Institusi
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat Institusi Baru </a>
</li>
@endsection

@section('content')
<style>
    .delete-button {
        display: none;
    }
</style>

<div class="card">
    <div class="card-body">
        <form id="" action="">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Institusi
                    </span>
                </h5>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Jenis Pusat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="" id="" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">No. Perakuan Pusat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="" id="" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Status Pusat
                        <span class="text-danger">*</span>
                    </label>
                    <select name="" id="" class="form-select select2">
                        <option value="" hidden>Status</option>
                        <option value="beroperasi">Beroperasi</option>
                        <option value="tidak_beroperasi">Tidak Beroperasi</option>
                        <option value="Tutup">Tutup</option>
                    </select>
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Nama Pusat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="" id="" required>
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Alamat Pusat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="" id="" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Emel
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="" id="" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">No. Telefon
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="" id="" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Pendaftaran
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Tamat Pendaftaran
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Pengetua & Pengerusi
                    </span>
                </h5>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Nama Pengetua/ Guru Besar
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="" id="" required>
                </div>

                <div class="col-md-8 mb-1">
                    <label class="fw-bold form-label">Nama Pengerusi/Pengarah
                    </label>
                    <input type="text" class="form-control" name="" id="" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">No Kad Pengenalan
                    </label>
                    <input type="text" class="form-control" name="" id="" required>
                </div>
            <hr>

            <div class="d-flex justify-content-end align-items-center mt-1">
                <button type="submit" class="btn btn-primary float-right">Hantar</button>
            </div>

        </form>
    </div>
</div>
@endsection
