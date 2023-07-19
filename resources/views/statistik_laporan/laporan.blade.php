@extends('layouts/contentLayoutMaster')

@section('header')
    Laporan Permohonan
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base/plugins/forms/pickers/form-flat-pickr.css') }}">
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
                        <h4 class="card-title">Ringkasan Laporan Instrumen yang dihantar ke Institusi</h4>
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
                                        <label class="form-label fw-bolder">Jenis Instrumen:</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bolder">Instrumen Dihantar ke Institusi</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bolder">Status Instrumen:</label>
                                        <input type="text" class="form-control" />
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
                            <table class="table table-bordered" style="table-layout: auto; width:100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Bil.</th>
                                        <th rowspan="2">Jenis Instrumen</th>
                                        <th rowspan="2">Bilangan Sub Domain</th>
                                        <th rowspan="2">Instrumen di Hantar ke Institusi</th>
                                        <th colspan="3">Institusi</th>
                                        <th rowspan="2">Peratus Menjawab Instrumen</th>
                                        <th rowspan="2">Peratus Tidak Menjawab Instrumen</th>
                                    </tr>

                                    <tr>
                                        <th>Menjawab Instrumen</th>
                                        <th>Tidak Menjawab Instrumen</th>
                                        <th>Tidak Menerima Instrumen</th>

                                    </tr>
                                </thead>

                                <tbody style="text-align: center;">
                                    <tr>
                                        <td>{{ $bilangan++ }}</td>
                                        <td>Standard Kualiti Pengasuhan dan Pendidikan Awal Kanak-Kanak
                                            (SKPAK)
                                        </td>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            Pengurusan
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            45%
                                        </td>
                                        <td>
                                            55%
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ $bilangan++ }}</td>
                                        <td>Standard Kualiti Institut Pendidikan Swasta (SKIPS)
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Pengajaran dan Pembelajaran
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            30%
                                        </td>
                                        <td>
                                            70%
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ $bilangan++ }}</td>
                                        <td>Sistem Penarafan Keselamatan Sekolah (SPKS)
                                        </td>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            Keselamatan
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            20%
                                        </td>
                                        <td>
                                            80%
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ $bilangan++ }}</td>
                                        <td>Instrumen Kemudahan Prasarana dan Program Sukan Sekolah (i-
                                            KePS)
                                        </td>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            Kemudahan
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            60%
                                        </td>
                                        <td>
                                            40%
                                        </td>
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
                        <h4 class="card-title">Ringkasan Peratusan Instrumen Dijawab Mengikut Negeri</h4>
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
                                            <th rowspan="2">Jenis Instrumen</th>
                                            <th rowspan="2">Bilangan Sub Domain</th>
                                            <th colspan="14">Peratusan Menjawab Instrumen Mengikut Negeri</th>
                                        </tr>

                                        <tr>
                                            <th>Johor</th>
                                            <th>Kedah</th>
                                            <th>Kelantan</th>
                                            <th>Wilayah Persekutuan</th>
                                            <th>Selangor</th>
                                            <th>Terengganu</th>
                                        </tr>
                                    </thead>

                                    <tbody style="text-align: center;">
                                        <tr>
                                            <td>{{ $bilangan++ }}</td>
                                            <td>Standard Kualiti Pengasuhan dan Pendidikan Awal Kanak-Kanak
                                                (SKPAK)
                                            </td>
                                            <td>3</td>
                                            <td>35%</td>
                                            <td>20%</td>
                                            <td>15%</td>
                                            <td>19%</td>
                                            <td>70%</td>
                                            <td>80%</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $bilangan++ }}</td>
                                            <td>Standard Kualiti Institut Pendidikan Swasta (SKIPS)</td>
                                            <td>4</td>
                                            <td>15%</td>
                                            <td>70%</td>
                                            <td>55%</td>
                                            <td>35%</td>
                                            <td>90%</td>
                                            <td>45%</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $bilangan++ }}</td>
                                            <td>Sistem Penarafan Keselamatan Sekolah (SPKS)</td>
                                            <td>1</td>
                                            <td>25%</td>
                                            <td>80%</td>
                                            <td>70%</td>
                                            <td>80%</td>
                                            <td>65%</td>
                                            <td>30%</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $bilangan++ }}</td>
                                            <td>Instrumen Kemudahan Prasarana dan Program Sukan Sekolah (i-
                                                KePS)
                                            </td>
                                            <td>2</td>
                                            <td>55%</td>
                                            <td>70%</td>
                                            <td>60%</td>
                                            <td>35%</td>
                                            <td>30%</td>
                                            <td>15%</td>

                                        </tr>


                                    </tbody>


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
