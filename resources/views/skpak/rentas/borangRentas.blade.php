@extends('layouts.app')

@section('header')
Pengurusan Borang Rentas
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Penilaian Rentas </a>
</li>

{{-- <li class="breadcrumb-item">
    <a href="#"> Pengurusan Panel Penilai </a>
</li> --}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Validasi Rentas </h4>


    </div>

    <div class="card-body">
        <div class="row">
            <hr>
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Entiti
                </span>
            </h5>

            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">Nama Taska
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="nama_taska" required>
            </div>
            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">Tarikh Lawatan Rentas
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="nama_taska" required>
            </div>
            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">Nama Penilai Lawatan Rentas
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="nama_taska" required>
            </div>
            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">Isu Yang Dijumpai
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="nama_taska" required>
            </div>
            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">Amalan Melebihi Standard
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="nama_taska" required>
            </div>
            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">Ulasan Tambahan
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="nama_taska" required>
            </div>
            <div class="col-md-12 mb-1">
                <label class="fw-bold form-label">Keputusan Penilai
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
