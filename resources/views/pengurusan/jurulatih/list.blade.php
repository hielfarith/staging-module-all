@extends('layouts.app')

@section('header')
Pengurusan Jurulatih
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Jurulatih </a>
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Jurulatih </h4>

        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('admin.internal.jurulatihform') }}">
                <i class="fa-solid fa-add"></i> Tambah Jurulatih
            </a>
        </div>
    </div>

    <hr>

    <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Nama Jurulatih/ Pengguna</label>
                    <input type="text" name="" id="" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">No. Kad Pengenalan/ Pasport</label>
                    <input type="text" name=""  id="" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Gred Jawatan</label>
                    <input type="text" name="" id="" class="form-control">
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
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiJurulatih">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Jurulatih/ Pengguna</th>
                        <th>No. Kad Pengenalan/ Pasport</th>
                        <th>Gred Jawatan</th>
                        <th>Tarikh Mula Bertugas di PLD</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-jurulatih-diisi" tabindex="-1" aria-labelledby="modal-jurulatih-diisi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Jurulatih/ Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modal-body-jurulatih">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
</script>
@endsection
