@extends('layouts.app')

@section('header')
Issues Report
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Helpdesk</a></li>
<li class="breadcrumb-item"><a href="#">Issues Report</a></li>
@endsection

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder">Issues Report: Helpdesk</h4>

        </div>
        <div class="card-body">
            @hasanyrole('admin')
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Kategori Isu:</label>
                    <select class="form-select select2" name="category_id" id="category_id">
                        <option value="" hidden>Kategori Isu</option>
                        <option value="1">Modul Kuarters</option>
                        <option value="2">Modul Hartanah</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Status:</label>
                    <select class="form-select select2" name="priority_id" id="priority_id">
                        <option value="">Status Isu</option>
                        <option value="1">Baru</option>
                        <option value="2">Selesai</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Tarikh Mula:</label>
                    <input type="date" class="form-control dt-input dt-full-name" data-column="2"
                        data-column-index="1" />
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Tarikh Akhir:</label>
                    <input type="date" class="form-control dt-input" data-column="2" data-column-index="1" />
                </div>
            </div>

            <div class="d-flex justify-content-end align-items-center my-1 ">
                <button type="submit" class="btn text-danger float-right" style="margin-right:10px;">
                    Reset
                </button>
                <button type="submit" class="btn btn-success float-right">
                    <i class="fa fa-search"></i> Cari
                </button>
            </div>
            @endhasanyrole

            @hasanyrole('pengguna_luar')
            <div class="d-flex justify-content-end align-items-center">
                <a href={{ route('helpdesk.update-ticket') }} class="btn btn-xs btn-default text-white" title="">
                    <button class="btn btn-md btn-primary">
                        Laporkan Isu
                    </button>
                </a>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Kategori Isu:</label>
                    <select class="form-control select2" name="category_id" id="category_id">
                        <option value="" hidden>Kategori Isu</option>
                        <option value="1">Modul Kuarters</option>
                        <option value="2">Modul Hartanah</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Status:</label>
                    <select class="form-control select2" name="priority_id" id="priority_id">
                        <option value="">Status Isu</option>
                        <option value="1">Baru</option>
                        <option value="2">Selesai</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Tarikh Mula:</label>
                    <input type="date" class="form-control dt-input dt-full-name" data-column="2"
                        data-column-index="1" />
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bolder">Tarikh Akhir:</label>
                    <input type="date" class="form-control dt-input" data-column="2" data-column-index="1" />
                </div>
            </div>

            <div class="d-flex justify-content-end align-items-center my-1 ">
                <a class="me-3 text-danger" type="button" id="reset" href="#">
                    Reset
                </a>
                <button type="submit" class="btn btn-success float-right">
                    <i class="fa fa-search"></i> Cari
                </button>
            </div>
        </div>
        @endhasanyrole

        @include('helpdesk.senarai_issuesReport')
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
            $('#issues').DataTable();
        });
</script>
@endsection