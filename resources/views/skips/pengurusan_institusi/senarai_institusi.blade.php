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
    <a href="#"> Pengurusan Institusi </a>
</li>
@endsection

@section('content')
<style>
    #TableSenaraiInstitusi thead th {
        vertical-align: middle;
        text-align: center;
    }

    #TableSenaraiInstitusi tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #TableSenaraiInstitusi table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Institusi </h4>

        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('skips.institusi_baru') }}">
                <i class="fa-solid fa-add"></i> Tambah Institusi
            </a>
        </div>
    </div>

    <hr>

    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <label class="fw-bolder">No. Perakuan Pusat</label>
                <input type="text" name="" id="" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="fw-bolder">Nama Pusat</label>
                <input type="text" name=""  id="" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="fw-bolder">Jenis Pusat</label>
                <input type="text" name="" id="" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="fw-bolder">Status</label>
                <select name="" id="" class="form-select select2">
                    <option value="" hidden>Status</option>
                    <option value="beroperasi">Beroperasi</option>
                    <option value="tidak_beroperasi">Tidak Beroperasi</option>
                    <option value="Tutup">Tutup</option>
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
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiInstitusi" style="width: 100%">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="10%">No. Perakuan Pusat</th>
                        <th>Nama Pusat</th>
                        <th>Alamat Pusat</th>
                        <th width="10%">Jenis Pusat</th>
                        <th width="10%">Status</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $(function() {
        var table = $('#TableSenaraiInstitusi').DataTable({
            orderCellsTop: true,
            colReorder: false,
            pageLength: 10,
            processing: true,
            serverSide: true, //enable if data is large (more than 50,000)
            ajax: {
                url: "{{ fullUrl() }}",
                cache: false,
            },
        });
    });
});
</script>
@endsection
