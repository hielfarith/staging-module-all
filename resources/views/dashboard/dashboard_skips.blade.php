@extends('layouts/contentLayoutMaster')

@section('header')
Dashboard SKIPS
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item">
    <a>Dashboard SKIPS</a>
</li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder">Senarai Institusi Mengisi Penilaian Kendiri</h4>

                <div class="btn-group mt-md-0 mt-1" role="group">
                    <input type="radio" class="btn-check" name="penilaian_kendiri" id="telah_buat" autocomplete="off"
                        checked />
                    <label class="btn btn-outline-primary" for="telah_buat">Telah Mengisi Penilaian Kendiri</label>

                    <input type="radio" class="btn-check" name="penilaian_kendiri" id="belum_buat" autocomplete="off" />
                    <label class="btn btn-outline-primary" for="belum_buat">Belum Mengisi Penilaian Kendiri</label>
                </div>
            </div>

            <hr>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <label class="fw-bolder">Senarai Mengikut:</label>
                        <div class="demo-inline-spacing">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="senarai_mengikut" id="negeri"
                                    value="1" checked />
                                <label class="form-check-label" for="negeri">Negeri</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="senarai_mengikut" id="institusi"
                                    value="2" />
                                <label class="form-check-label" for="institusi">Semua Institusi</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 mb-1" id="searchNegeri" style="display: none;">
                        <label class="fw-bolder">Pilih Negeri:</label>
                        <select name="" id="" class="form-select select2" multiple>
                            <option value="" hidden>Pilih Negeri</option>
                            <option value="1">Selangor</option>
                            <option value="2">WP Kuala Lumpur</option>
                        </select>
                    </div>

                    <div class="col-md-8 mb-1" id="searchInstitusi" style="display: none;">
                        <label class="fw-bolder">Pilih Institusi:</label>
                        <select name="" id="" class="form-select select2" multiple>
                            <option value="" hidden>Pilih Institusi</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end align-items-center mt-1">
                    <a class="me-3 text-danger" type="button" id="reset" href="#">
                        Setkan Semula
                    </a>
                    <button type="button" class="btn btn-success float-right">
                        <i class="fa fa-search me-1"></i> Cari
                    </button>
                </div>

                <hr>

                <div class="d-flex justify-content-end">
                    <div class="btn-group" role="group" aria-label="Role Action">
                        <a href="#" class="btn btn-outline-success waves-effect">
                            <i class="fa fa-file-excel text-success"></i> Excel
                        </a>
                        <a href="#" class="btn btn-outline-danger waves-effect">
                            <i class="fa fa-file-pdf text-danger"></i> PDF
                        </a>
                    </div>
                </div>

                <style>
                    #negeri_penilaian_kendiri_table #institusi_penilaian_kendiri_table thead th {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #negeri_penilaian_kendiri_table #institusi_penilaian_kendiri_table tbody {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #negeri_penilaian_kendiri_table #institusi_penilaian_kendiri_table table {
                        width: 100% !important;
                        /* word-wrap: break-word; */
                    }

                </style>

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hovered" id="negeri_penilaian_kendiri_table"
                        style="display: none;">
                        <thead>
                            <tr>
                                <th rowspan="2" width="5%">Bil</th>
                                <th rowspan="2">Negeri</th>
                                <th colspan="2">Jumlah Penilaian</th>
                            </tr>

                            <tr>
                                <th>Telah Mengisi</th>
                                <th>Belum Mengisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Sarawak</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Sabah</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Pulau Pinang</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Pahang</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="2">Jumlah</td>
                                <td>5</td>
                                <td>6</td>
                            </tr>
                        </tfoot>
                    </table>

                    <table class="table table-bordered table-hovered" id="institusi_penilaian_kendiri_table"
                        style="display: none;">
                        <thead>
                            <tr>
                                <th width="5%">Bil</th>
                                <th>Nama Institusi</th>
                                <th width="15%">Status Pengisian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Institusi 1</td>
                                <td>Telah Mengisi</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Institusi 2</td>
                                <td>Telah Mengisi</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Institusi 3</td>
                                <td>Telah Mengisi</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Institusi 4</td>
                                <td>Telah Mengisi</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Institusi 5</td>
                                <td>Telah Mengisi</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Institusi 6</td>
                                <td>Telah Mengisi</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder">Senarai dan Bilangan</h4>

                <div class="btn-group mt-md-0 mt-1" role="group">
                    <input type="radio" class="btn-check" name="" id="" autocomplete="off" checked />
                    <label class="btn btn-outline-primary">Terlibat Verifikasi</label>

                    <input type="radio" class="btn-check" name="" id="" autocomplete="off" />
                    <label class="btn btn-outline-primary">Terlibat Penilaian Kendiri</label>
                </div>
            </div>

            <hr>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <label class="fw-bolder">Senarai Mengikut:</label>
                        <div class="demo-inline-spacing">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="senarai_bilangan" id="negeri" value="1" checked />
                                <label class="form-check-label" for="negeri">Negeri</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="senarai_bilangan" id="institusi" value="2" />
                                <label class="form-check-label" for="institusi">Semua Institusi</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 mb-1" id="searchNegeriBilangan" style="display: none;">
                        <label class="fw-bolder">Pilih Negeri:</label>
                        <select name="" id="" class="form-select select2" multiple>
                            <option value="" hidden>Pilih Negeri</option>
                            <option value="1">Selangor</option>
                            <option value="2">WP Kuala Lumpur</option>
                        </select>
                    </div>

                    <div class="col-md-8 mb-1" id="searchInstitusiBilangan" style="display: none;">
                        <label class="fw-bolder">Pilih Institusi:</label>
                        <select name="" id="" class="form-select select2" multiple>
                            <option value="" hidden>Pilih Institusi</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end align-items-center mt-1">
                    <a class="me-3 text-danger" type="button" id="reset" href="#">
                        Setkan Semula
                    </a>
                    <button type="button" class="btn btn-success float-right">
                        <i class="fa fa-search me-1"></i> Cari
                    </button>
                </div>

                <hr>

                <div class="d-flex justify-content-end">
                    <div class="btn-group" role="group" aria-label="Role Action">
                        <a href="#" class="btn btn-outline-success waves-effect">
                            <i class="fa fa-file-excel text-success"></i> Excel
                        </a>
                        <a href="#" class="btn btn-outline-danger waves-effect">
                            <i class="fa fa-file-pdf text-danger"></i> PDF
                        </a>
                    </div>
                </div>

                <style>
                    #senarai_bilangan thead th {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #senarai_bilangan tbody {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #senarai_bilangan table {
                        width: 100% !important;
                        /* word-wrap: break-word; */
                    }

                </style>

                <hr>

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hovered text-wrap" id="senarai_bilangan">
                        <thead>
                            <tr>
                                <th width="5%">Bil</th>
                                <th>Nama Institusi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder">Peratusan Bintang Institusi</h4>
            </div>

            <hr>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 mb-1">
                        <label class="fw-bolder">Pilih Institusi:</label>
                        <select name="" id="" class="form-select select2" multiple>
                            <option value="" hidden>Pilih Institusi</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end align-items-center mt-1">
                    <a class="me-3 text-danger" type="button" id="reset" href="#">
                        Setkan Semula
                    </a>
                    <button type="button" class="btn btn-success float-right">
                        <i class="fa fa-search me-1"></i> Cari
                    </button>
                </div>

                <hr>

                <div class="d-flex justify-content-end">
                    <div class="btn-group" role="group" aria-label="Role Action">
                        <a href="#" class="btn btn-outline-success waves-effect">
                            <i class="fa fa-file-excel text-success"></i> Excel
                        </a>
                        <a href="#" class="btn btn-outline-danger waves-effect">
                            <i class="fa fa-file-pdf text-danger"></i> PDF
                        </a>
                    </div>
                </div>

                <style>
                    #peratusan_bintan thead th {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #peratusan_bintan tbody {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #peratusan_bintan table {
                        width: 100% !important;
                        /* word-wrap: break-word; */
                    }

                </style>

                <hr>

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hovered text-wrap" id="peratusan_bintan">
                        <thead>
                            <tr>
                                <th width="5%">Bil</th>
                                <th>Nama Institusi</th>
                                <th width="15%">Peratusan Bintang</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder"> Analisis Pencapaian Penilaian Kendiri</h4>

                <div class="btn-group mt-md-0 mt-1" role="group">
                    <input type="radio" class="btn-check" name="" id="" autocomplete="off" checked />
                    <label class="btn btn-outline-primary">Turutan Skor Tertinggi</label>

                    <input type="radio" class="btn-check" name="" id="" autocomplete="off" />
                    <label class="btn btn-outline-primary">Turutan Skor Terendah</label>
                </div>
            </div>

            <hr>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 mb-1">
                        <label class="fw-bolder">Pilih Institusi:</label>
                        <select name="" id="" class="form-select select2" multiple>
                            <option value="" hidden>Pilih Institusi</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end align-items-center mt-1">
                    <a class="me-3 text-danger" type="button" id="reset" href="#">
                        Setkan Semula
                    </a>
                    <button type="button" class="btn btn-success float-right">
                        <i class="fa fa-search me-1"></i> Cari
                    </button>
                </div>

                <hr>

                <div class="d-flex justify-content-end">
                    <div class="btn-group" role="group" aria-label="Role Action">
                        <a href="#" class="btn btn-outline-success waves-effect">
                            <i class="fa fa-file-excel text-success"></i> Excel
                        </a>
                        <a href="#" class="btn btn-outline-danger waves-effect">
                            <i class="fa fa-file-pdf text-danger"></i> PDF
                        </a>
                    </div>
                </div>

                <style>
                    #analisis_pencapaian thead th {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #analisis_pencapaian tbody {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #analisis_pencapaian table {
                        width: 100% !important;
                        /* word-wrap: break-word; */
                    }

                </style>

                <hr>

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hovered text-wrap" id="analisis_pencapaian">
                        <thead>
                            <tr>
                                <th width="5%">Bil</th>
                                <th>Nama Institusi</th>
                                <th width="15%">Skor Pencapaian</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder"> Peratusan Keseluruhan berdasarkan Kriteria </h4>

                <div class="btn-group mt-md-0 mt-1" role="group">
                    <input type="radio" class="btn-check" name="" id="" autocomplete="off" checked />
                    <label class="btn btn-outline-primary">Turutan Peratusan Tertinggi</label>

                    <input type="radio" class="btn-check" name="" id="" autocomplete="off" />
                    <label class="btn btn-outline-primary">Turutan Peratusan Terendah</label>
                </div>
            </div>

            <hr>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 mb-1">
                        <label class="fw-bolder">Pilih Institusi:</label>
                        <select name="" id="" class="form-select select2" multiple>
                            <option value="" hidden>Pilih Institusi</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end align-items-center mt-1">
                    <a class="me-3 text-danger" type="button" id="reset" href="#">
                        Setkan Semula
                    </a>
                    <button type="button" class="btn btn-success float-right">
                        <i class="fa fa-search me-1"></i> Cari
                    </button>
                </div>

                <hr>

                <div class="d-flex justify-content-end">
                    <div class="btn-group" role="group" aria-label="Role Action">
                        <a href="#" class="btn btn-outline-success waves-effect">
                            <i class="fa fa-file-excel text-success"></i> Excel
                        </a>
                        <a href="#" class="btn btn-outline-danger waves-effect">
                            <i class="fa fa-file-pdf text-danger"></i> PDF
                        </a>
                    </div>
                </div>

                <style>
                    #analisis_pencapaian thead th {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #analisis_pencapaian tbody {
                        vertical-align: middle;
                        text-align: center;
                    }

                    #analisis_pencapaian table {
                        width: 100% !important;
                        /* word-wrap: break-word; */
                    }

                </style>

                <hr>

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hovered text-wrap" id="analisis_pencapaian">
                        <thead>
                            <tr>
                                <th width="5%">Bil</th>
                                <th>Nama Institusi</th>
                                <th width="15%">Skor Pencapaian</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder"> Peratusan Keseluruhan berdasarkan Kriteria </h4>
            </div>

            <hr>

            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <div class="btn-group" role="group" aria-label="Role Action">
                        <a href="#" class="btn btn-outline-success waves-effect">
                            <i class="fa-solid fa-file-image text-success"></i>JPG
                        </a>
                        <a href="#" class="btn btn-outline-danger waves-effect">
                            <i class="fa fa-file-pdf text-danger"></i> PDF
                        </a>
                    </div>
                </div>

                <hr>

                <canvas class="horizontal-bar-chart-ex chartjs" data-height="400"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#searchNegeri').show();
        $('#negeri_penilaian_kendiri_table').show();
        $('input[name="senarai_mengikut"]').change(function () {
            $('#searchNegeri, #searchInstitusi').hide();
            $('#negeri_penilaian_kendiri_table, #institusi_penilaian_kendiri_table').hide();
            if ($(this).val() === '1') {
                $('#searchNegeri').show();
                $('#negeri_penilaian_kendiri_table').show();
            } else if ($(this).val() === '2') {
                $('#searchInstitusi').show();
                $('#institusi_penilaian_kendiri_table').show();
            }
        });

        $('#searchNegeriBilangan').show();
        $('input[name="senarai_bilangan"]').change(function () {
            $('#searchNegeriBilangan, #searchInstitusiBilangan').hide();
            if ($(this).val() === '1') {
                $('#searchNegeriBilangan').show();
            } else if ($(this).val() === '2') {
                $('#searchInstitusiBilangan').show();
            }
        });
    });
</script>
@endsection
