@extends('layouts/contentLayoutMaster')

@section('header')
Laporan Permohonan
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('msg.home')}}</a></li>
<li class="breadcrumb-item">
    <a>Laporan Permohonan</a>
</li>
@endsection

@section('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection


@section('content')
<style>
    thead {
        text-align: center;
        vertical-align: middle;
    }
</style>

@php
    $bilangan = 1;
    $count = 1;
    $texts = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet augue magna, nec imperdiet sapien
    consectetur ac. Duis ac cursus urna, vel elementum arcu. Maecenas maximus interdum aliquet.';
@endphp

<section id="advanced-search-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Ringkasan Permohonan</h4>
                    <div class="d-flex justify-content-between float-left">
                        <button type="button" class="btn mb-1" data-bs-toggle="collapse"
                            aria-controls="ringkasan_program_bpes" href="#ringkasan_program_bpes" role="button"
                            aria-expanded="false">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="collapse show multi-collapse" id="ringkasan_program_bpes">
                    <div class="card-body mt-2">
                        <form class="" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label fw-bolder">Nama Program:</label>
                                    <input type="text" class="form-control"/>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bolder">Nama Pemohon:</label>
                                    <input type="text" class="form-control"/>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bolder">Status Program:</label>
                                    <input type="text" class="form-control"/>
                                </div>
                            </div>
                        </form>

                        <div class="d-flex justify-content-end align-items-center my-1 ">
                            <a class="me-3" type="button" id="reset" href="{{ route('admin-log-index') }}">
                                Reset
                            </a>
                            <button type="submit" value="Filter" class="btn btn-success float-right">
                                <i class="icon-search"></i> Search
                            </button>
                        </div>

                        <div class="btn-group" role="group" aria-label="Role Action">
                            <a href="#" class="btn btn-outline-success waves-effect">
                                <i class="fa fa-file-excel text-success"></i> Excel
                            </a>
                            <a href="#" class="btn btn-outline-danger waves-effect">
                                <i class="fa fa-file-pdf text-danger"></i> PDF
                            </a>
                        </div>
                    </div>

                    <div class="card-datatable table-responsive">
                        <table class="table table-bordered" style="table-layout: auto; width:150%">
                            <thead>
                                <tr>
                                    <th rowspan="2">Bil.</th>
                                    <th rowspan="2">Nama Program</th>
                                    <th colspan="3">Peruntukan</th>
                                    <th colspan="3">Perbelanjaan</th>
                                    <th rowspan="2">ROI</th>
                                    <th rowspan="2">Catatan</th>
                                    <th rowspan="2">Status</th>
                                </tr>

                                <tr>
                                    <th>Komitmen (RM)</th>
                                    <th>Sebenar (RM)</th>
                                    <th>Peratusan (%)</th>
                                    <th>Sasaran</th>
                                    <th>Sebenar</th>
                                    <th>Peratusan (%)</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{ $bilangan++ }}</td>
                                    <td>Program Akses Kepada Peluang Pembiayaan</td>
                                    <td>705,029.49</td>
                                    <td>705,029.49</td>
                                    <td>82.94</td>
                                    <td>5,100</td>
                                    <td>15,232</td>
                                    <td>298.67</td>
                                    <td>298.67</td>
                                    <td>{{ $texts }}</td>
                                    <td><span class="badge badge-glow bg-primary">Dalam Perlaksanaan</span></td>
                                </tr>

                                <tr>
                                    <td>{{ $bilangan++ }}</td>
                                    <td>Program Intercensi - Peluang Kedua Kepada Usahawan</td>
                                    <td>705,029.49</td>
                                    <td>705,029.49</td>
                                    <td>82.94</td>
                                    <td>5,100</td>
                                    <td>15,232</td>
                                    <td>298.67</td>
                                    <td>298.67</td>
                                    <td>{{ $texts }}</td>
                                    <td><span class="badge badge-glow bg-warning">Siap Peringkat Bayaran</span></td>
                                </tr>

                                <tr>
                                    <td>{{ $bilangan++ }}</td>
                                    <td>Program Kesedaran Harta Intelek Ushawan (SEDAR-HI)</td>
                                    <td>705,029.49</td>
                                    <td>705,029.49</td>
                                    <td>82.94</td>
                                    <td>5,100</td>
                                    <td>15,232</td>
                                    <td>298.67</td>
                                    <td>298.67</td>
                                    <td>{{ $texts }}</td>
                                    <td><span class="badge badge-glow bg-success">Siap Sepenuhnya</span></td>
                                </tr>

                                <tr>
                                    <td>{{ $bilangan++ }}</td>
                                    <td>Penempatan Latihan Kerjaya bafi Graduan TVET (GRACE) 1.0</td>
                                    <td>705,029.49</td>
                                    <td>705,029.49</td>
                                    <td>82.94</td>
                                    <td>5,100</td>
                                    <td>15,232</td>
                                    <td>298.67</td>
                                    <td>298.67</td>
                                    <td>{{ $texts }}</td>
                                    <td><span class="badge badge-glow bg-danger">Belum Mula</span></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Ringkasan Kelulusan Geran dan Perbelanjaan Per Tahun</h4>
                    <div class="d-flex justify-content-between float-left">
                        <button type="button" class="btn mb-1" data-bs-toggle="collapse"
                            aria-controls="ringkasan_kemajuan_program_table" href="#ringkasan_kemajuan_program_table"
                            role="button" aria-expanded="false">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="collapse show multi-collapse" id="ringkasan_kemajuan_program_table">
                    <div class="card-body">
                        <div
                            class="card-header d-flex flex-md-row flex-column justify-content-md-between justify-content-start align-items-md-center align-items-start">
                            <h4 class="card-title">&nbsp;</h4>

                            <div class="btn-group mt-md-0 mt-1" role="group"
                                aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="radio_options" id="radio_option1"
                                    autocomplete="off" checked />
                                <label class="btn btn-outline-primary" for="radio_option1">2020</label>

                                <input type="radio" class="btn-check" name="radio_options" id="radio_option2"
                                    autocomplete="off" />
                                <label class="btn btn-outline-primary" for="radio_option2">2021</label>

                                <input type="radio" class="btn-check" name="radio_options" id="radio_option3"
                                    autocomplete="off" />
                                <label class="btn btn-outline-primary" for="radio_option3">2022</label>

                                <input type="radio" class="btn-check" name="radio_options" id="radio_option4"
                                    autocomplete="off" />
                                <label class="btn btn-outline-primary" for="radio_option4">2023</label>
                            </div>
                        </div>

                        <div class="card-datatable table-responsive">
                            <table class="dt-advanced-search table" style="table-layout: auto; width:100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Bil.</th>
                                        <th rowspan="2">Bahagian/ Agensi</th>
                                        <th rowspan="2">Bilangan Program</th>
                                        <th rowspan="2">Peruntukan (RM)</th>
                                        <th colspan="3">Perbelanjaan</th>
                                        <th colspan="3">Jumlah Penerima Geran</th>
                                    </tr>

                                    <tr>
                                        <th>Komitmen (RM)</th>
                                        <th>Sebenar (RM)</th>
                                        <th>Peratusan (%)</th>
                                        <th>Sasaran</th>
                                        <th>Sebenar</th>
                                        <th>Peratusan (%)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>BPES</td>
                                        <td>16</td>
                                        <td>23,084,229.60</td>
                                        <td>18,567,376.11</td>
                                        <td>18,567,376.11</td>
                                        <td>82.94</td>
                                        <td>5,100</td>
                                        <td>15,232</td>
                                        <td>298.67</td>
                                    </tr>

                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>BPFV</td>
                                        <td>16</td>
                                        <td>23,084,229.60</td>
                                        <td>18,567,376.11</td>
                                        <td>18,567,376.11</td>
                                        <td>82.94</td>
                                        <td>5,100</td>
                                        <td>15,232</td>
                                        <td>298.67</td>
                                    </tr>

                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>BKPPK</td>
                                        <td>16</td>
                                        <td>23,084,229.60</td>
                                        <td>18,567,376.11</td>
                                        <td>18,567,376.11</td>
                                        <td>82.94</td>
                                        <td>5,100</td>
                                        <td>15,232</td>
                                        <td>298.67</td>
                                    </tr>

                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>BLESS</td>
                                        <td>16</td>
                                        <td>23,084,229.60</td>
                                        <td>18,567,376.11</td>
                                        <td>18,567,376.11</td>
                                        <td>82.94</td>
                                        <td>5,100</td>
                                        <td>15,232</td>
                                        <td>298.67</td>
                                    </tr>

                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>BANK RAKYAT</td>
                                        <td>16</td>
                                        <td>23,084,229.60</td>
                                        <td>18,567,376.11</td>
                                        <td>18,567,376.11</td>
                                        <td>82.94</td>
                                        <td>5,100</td>
                                        <td>15,232</td>
                                        <td>298.67</td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="2">Jumlah Keseluruhan</th>
                                        <th>700</th>
                                        <th>4,389,431,422.28</th>
                                        <th>4,389,431,422.28</th>
                                        <th>4,389,431,422.28</th>
                                        <th>90.16</th>
                                        <th>310,030</th>
                                        <th>563,783</th>
                                        <th>181.85</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('vendor-script')
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
<script src="{{ asset(mix('js/scripts/tables/table-datatables-advanced.js')) }}"></script>
@endsection
