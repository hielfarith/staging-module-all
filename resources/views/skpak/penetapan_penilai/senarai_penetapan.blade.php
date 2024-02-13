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
        <h4 class="card-title fw-bolder"> Senarai Penetapan Penilai </h4>

        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('skpak.penetapan_baru') }}">
                <i class="fa-solid fa-add"></i> Tambah Tetapan Penilai
            </a>
        </div>
    </div>

    <hr>

    <div class="card-body">

        <div class="row">
            <div class="col-md-4">
                <label class="fw-bolder">Panel Penilai 1</label>
                <select name="" id="" class="form-select select2">
                    <option value="" hidden>Panel Penilai 1</option>
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="fw-bolder">Panel Penilai 2</label>
                <select name="" id="" class="form-select select2">
                    <option value="" hidden>Panel Penilai 2</option>
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="fw-bolder">Tarikh Lawatan</label>
                <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
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
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiPenilai">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Taska</th>
                        <th>Panel Penilai 1</th>
                        <th>Tarikh Lawatan</th>
                        <th>Panel Penilai 2</th>
                        <th>Tarikh Lawatan</th>
                        <th>Status</th>

                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-senarai-penetapan" tabindex="-1" aria-labelledby="modal-senarai-penetapan"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Panel Penilai/ Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modal-body-penilia">
            </div>
        </div>
    </div>
</div>
@endsection
