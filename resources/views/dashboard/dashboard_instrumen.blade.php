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
                <h4 class="card-title fw-bolder">Senarai dan Bilangan</h4>

                {{-- <div class="btn-group mt-md-0 mt-1" role="group">
                    <input type="radio" class="btn-check" name="" id="" autocomplete="off" checked />
                    <label class="btn btn-outline-primary">Terlibat Verifikasi</label>

                    <input type="radio" class="btn-check" name="" id="" autocomplete="off" />
                    <label class="btn btn-outline-primary">Terlibat Penilaian Kendiri</label>
                </div> --}}
            </div>

            <hr>

            <div class="card-body">
                {{-- <div class="row">
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
                </div> --}}

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

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hovered text-wrap" id="senarai_bilangan">
                        <thead>
                            <tr>
                                <th width="5%">Bil</th>
                                <th>Negeri</th>
                                <th>Jumlah Institusi</th>
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
                <h4 class="card-title fw-bolder">Senarai Institusi Mengisi Penilaian Kendiri</h4>

                {{-- <div class="btn-group mt-md-0 mt-1" role="group">
                    <input type="radio" class="btn-check" name="penilaian_kendiri" id="telah_buat" autocomplete="off"
                        checked />
                    <label class="btn btn-outline-primary" for="telah_buat">Telah Mengisi Penilaian Kendiri</label>

                    <input type="radio" class="btn-check" name="penilaian_kendiri" id="belum_buat" autocomplete="off" />
                    <label class="btn btn-outline-primary" for="belum_buat">Belum Mengisi Penilaian Kendiri</label>
                </div> --}}
            </div>

            <hr>

            <div class="card-body">
                {{-- <div class="row">
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
                </div> --}}

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
                        {{-- <thead>
                            <tr>
                                <th rowspan="2" width="5%">Bil</th>
                                <th rowspan="2">Negeri</th>
                                <th colspan="2">Jumlah Penilaian</th>
                            </tr>

                            <tr>
                                <th>Telah Mengisi</th>
                                <th>Belum Mengisi</th>
                            </tr>
                        </thead> --}}
                        <thead>
                            <tr>
                                <th width="5%">Bil</th>
                                <th>Negeri</th>
                                <th>Bil Institusi</th>
                                <th>Bil Hantar</th>
                                <th>Bil Belum Hantar</th>
                                <th>Bil Verifikasi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="2">Jumlah</td>
                                <td></td>
                                <td></td>
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
        <div class="card card-statistics">
            <div class="card-header">
                <h4 class="card-title fw-bolder">Peratusan Bintang Institusi</h4>
            </div>

            <hr>

            <div class="card-body statistics-body">
                {{-- <div class="d-flex justify-content-end">
                    <div class="btn-group" role="group" aria-label="Role Action">
                        <a href="#" class="btn btn-outline-success waves-effect">
                            <i class="fa fa-file-excel text-success"></i> Excel
                        </a>
                        <a href="#" class="btn btn-outline-danger waves-effect">
                            <i class="fa fa-file-pdf text-danger"></i> PDF
                        </a>
                    </div>
                </div> 

                <hr> --}}

                <div class="row">
                    <div class="col-md-2">
                        <div class="d-flex flex-row" style="margin: 10px">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i data-feather="star" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Cemerlang</h4>
                                <h5>5</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex flex-row" style="margin: 10px">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i data-feather="star" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Baik</h4>
                                <h5>4</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex flex-row" style="margin: 10px">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i data-feather="star" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Sederhana</h4>
                                <h5>3</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex flex-row" style="margin: 10px">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i data-feather="star" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Mencapai Standard Minima</h4>
                                <h5>2</h5>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <hr>

                <canvas class="peratusan-bintang-chart chartjs" data-height="400"></canvas>
            </div>
        </div>
    </div>

    {{-- <div class="col-md-12">
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
    </div> --}}

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder"> Peratusan Keseluruhan berdasarkan Kriteria </h4>

                {{-- <div class="btn-group mt-md-0 mt-1" role="group">
                    <input type="radio" class="btn-check" name="" id="" autocomplete="off" checked />
                    <label class="btn btn-outline-primary">Turutan Peratusan Tertinggi</label>

                    <input type="radio" class="btn-check" name="" id="" autocomplete="off" />
                    <label class="btn btn-outline-primary">Turutan Peratusan Terendah</label>
                </div> --}}
            </div>

            <hr>

            <div class="card-body">
                {{-- <div class="row">
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

                <hr> --}}

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
                {{-- <div class="d-flex justify-content-end">
                    <div class="btn-group" role="group" aria-label="Role Action">
                        <a href="#" class="btn btn-outline-success waves-effect">
                            <i class="fa-solid fa-file-image text-success"></i>JPG
                        </a>
                        <a href="#" class="btn btn-outline-danger waves-effect">
                            <i class="fa fa-file-pdf text-danger"></i> PDF
                        </a>
                    </div>
                </div>

                <hr> --}}

                <canvas class="peratusan-kriteria-chart chartjs" data-height="400"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {

        $(function() {
            var tableSenaraiBilangan = $('#senarai_bilangan').DataTable({
                orderCellsTop: true,
                colReorder: false,
                pageLength: 20,
                processing: true,
                searching: false,
                serverSide: true, //enable if data is large (more than 50,000)
                ajax: {
                    url: "{{ fullUrl().'?table=1' }}",
                    cache: false,
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {
                        data: "negeri",
                        name: "negeri",
                        searchable: true,
                        render: function(data, type, row) {
                            return $("<div/>").html(data).text();
                        }
                    },
                    {
                        data: "bil_institusi",
                        name: "bil_institusi",
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row) {
                            return $("<div/>").html(data).text();
                        }
                    },
                ],
            });

            var tablePenilaianKendiri = $('#negeri_penilaian_kendiri_table').DataTable({
                orderCellsTop: true,
                colReorder: false,
                pageLength: 20,
                processing: true,
                searching: false,
                serverSide: true, //enable if data is large (more than 50,000)
                ajax: {
                    url: "{{ fullUrl().'?table=2' }}",
                    cache: false,
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {
                        data: "negeri",
                        name: "negeri",
                        searchable: true,
                        render: function(data, type, row) {
                            return $("<div/>").html(data).text();
                        }
                    },
                    {
                        data: "bil_institusi",
                        name: "bil_institusi",
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row) {
                            return $("<div/>").html(data).text();
                        }
                    },
                    {
                        data: "bil_hantar",
                        name: "bil_hantar",
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row) {
                            return $("<div/>").html(data).text();
                        }
                    },
                    {
                        data: "bil_belum_hantar",
                        name: "bil_belum_hantar",
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row) {
                            return $("<div/>").html(data).text();
                        }
                    },
                    {
                        data: "bil_verifikasi",
                        name: "bil_verifikasi",
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row) {
                            return $("<div/>").html(data).text();
                        }
                    },
                ],
            });

            var tableAnalisisPencapaian = $('#analisis_pencapaian').DataTable({
                orderCellsTop: true,
                colReorder: false,
                pageLength: 20,
                processing: true,
                searching: false,
                serverSide: true, //enable if data is large (more than 50,000)
                ajax: {
                    url: "{{ fullUrl().'?table=4' }}",
                    cache: false,
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {
                        data: "name",
                        name: "name",
                        searchable: true,
                        render: function(data, type, row) {
                            return $("<div/>").html(data).text();
                        }
                    },
                    {
                        data: "percentage",
                        name: "percentage",
                        searchable: true,
                        render: function(data, type, row) {
                            return $("<div/>").html(data).text();
                        }
                    },
                ],
            });
        });

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

    $(window).on('load', function () {
        var peratusanBintang = $('.peratusan-bintang-chart');
        var peratusanKriteria = $('.peratusan-kriteria-chart');
        
        if (peratusanBintang.length) {
            var peratusanBintangChart = new Chart(peratusanBintang, {
            type: 'bar',
            options: {
                elements: {
                rectangle: {
                    borderWidth: 2,
                    borderSkipped: 'bottom'
                }
                },
                responsive: true,
                maintainAspectRatio: false,
                responsiveAnimationDuration: 500,
                legend: {
                display: false
                },
                tooltips: {
                // Updated default tooltip UI
                shadowOffsetX: 1,
                shadowOffsetY: 1,
                shadowBlur: 8,
                shadowColor: 'rgba(0, 0, 0, 0.25)',
                backgroundColor: window.colors.solid.white,
                titleFontColor: window.colors.solid.black,
                bodyFontColor: window.colors.solid.black,
                },
                scales: {
                xAxes: [
                    {
                    display: true,
                    gridLines: {
                        display: true,
                        color: 'rgba(200, 200, 200, 0.2)',
                        zeroLineColor: 'rgba(200, 200, 200, 0.2)'
                    },
                    scaleLabel: {
                        display: false
                    },
                    ticks: {
                        fontColor: '#6e6b7b'
                    }
                    }
                ],
                yAxes: [
                    {
                    display: true,
                    gridLines: {
                        color: 'rgba(200, 200, 200, 0.2)',
                        zeroLineColor: 'rgba(200, 200, 200, 0.2)'
                    },
                    ticks: {
                        fontColor: '#6e6b7b'
                    }
                    }
                ]
                }
            },
            data: {
                labels: ['5', '4', '3', '2', '1', '0'],
                datasets: [
                {
                    data: ["{{ $star['five_star']['total'] }}", "{{ $star['four_star']['total'] }}", "{{ $star['three_star']['total'] }}", "{{ $star['two_star']['total'] }}", "{{ $star['one_star']['total'] }}", "{{ $star['zero_star']['total'] }}"],
                    barThickness: 30,
                    backgroundColor: '#28dac6',
                    borderColor: 'transparent'
                }
                ]
            },
            });
        }

        if (peratusanKriteria.length) {
            var peratusanKriteria = new Chart(peratusanKriteria, {
            type: 'bar',
            options: {
                elements: {
                rectangle: {
                    borderWidth: 2,
                    borderSkipped: 'bottom'
                }
                },
                responsive: true,
                maintainAspectRatio: false,
                responsiveAnimationDuration: 500,
                legend: {
                display: false
                },
                tooltips: {
                // Updated default tooltip UI
                shadowOffsetX: 1,
                shadowOffsetY: 1,
                shadowBlur: 8,
                shadowColor: 'rgba(0, 0, 0, 0.25)',
                backgroundColor: window.colors.solid.white,
                titleFontColor: window.colors.solid.black,
                bodyFontColor: window.colors.solid.black,
                callbacks: {
                    label: (tooltipItem, data) => data.datasets[0].data[tooltipItem.index] + '%'
                    }
                },
                scales: {
                xAxes: [
                    {
                    display: true,
                    gridLines: {
                        display: true,
                        color: 'rgba(200, 200, 200, 0.2)',
                        zeroLineColor: 'rgba(200, 200, 200, 0.2)'
                    },
                    scaleLabel: {
                        display: false
                    },
                    ticks: {
                        fontColor: '#6e6b7b'
                    }
                    }
                ],
                yAxes: [
                    {
                    display: false,
                    gridLines: {
                        color: 'rgba(200, 200, 200, 0.2)',
                        zeroLineColor: 'rgba(200, 200, 200, 0.2)'
                    },
                    ticks: {
                        stepSize: 10,
                        min: 0,
                        max: 100,
                        fontColor: '#6e6b7b'
                    }
                    }
                ]
                }
            },
            data: {
                labels: ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5', 'Item 6', 'Item 7', 'Item 8', 'Item 9', 'Item 10'],
                datasets: [
                {
                    data: [
                        <?php
                        foreach($kriteria as $data){
                        echo $data.',';
                        }
                        ?>
                    ],
                    barThickness: 30,
                    backgroundColor: '#28dac6',
                    borderColor: 'transparent'
                }
                ]
            }
            });
        }
    });
</script>
@endsection
