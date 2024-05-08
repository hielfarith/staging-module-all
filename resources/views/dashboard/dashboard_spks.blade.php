@extends('layouts.app')

@section('header')
    Dashboard
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="#">Dashboard SPKS </a>
    </li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder"> Dashboard </h4>

            {{-- <div class="d-flex justify-content-end align-items-center">
                <a type="button" class="btn btn-primary float-right" href="{{ route('admin.instrumen.tambah-skips') }}">
                    <i class="fa-solid fa-add"></i> Tambah Skips
                </a>
            </div> --}}
        </div>

        <hr>

        <div class="card-body">
            {{-- <h4 class="card-title fw-bolder">Pengguna Hendaklah Membuat Carian Dahulu </h4>
            <div class="row">

                <div class="col-md-4">
                    <label class="fw-bolder">Negeri</label>
                    <select class="form-control " name="negeri" id="negeri">
                        <option value="" hidden>Pilih Negeri</option>
                        @foreach ($states as $negeri)
                            <option value="{{ $negeri->name }}">{{ $negeri->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="fw-bolder">PPD</label>
                    <select class="form-select" id="ppd">
                        <option value="" hidden>Pilih PPD</option>
                        <option value="Petaling Utama">Petaling Utama</option>
                        <option value="Gombak">Gombak</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="fw-bolder">Instrumen</label>
                    <input type="text" name="instrumen" id="instrumen" class="form-control">
                </div>



            </div>


            <div class="d-flex justify-content-end align-items-center mt-1">
                <a class="me-3 text-danger" type="button" id="reset" href="#">
                    Setkan Semula
                </a>
                <button type="button" id="searchButton" onclick="search()" class="btn btn-success float-right">
                    <i class="fa fa-search me-1"></i> Cari
                </button>
            </div>

            <hr> --}}

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center align-middle" style="background-color: #d8bfb0;">
                            <td rowspan="3">No.</td>
                            <td rowspan="3">PPD</td>
                            <td rowspan="3">Bil.Sekolah Rendah</td>
                            <td rowspan="3">Bil.Sekolah Menengah</td>
                            <td rowspan="3">Bil.Sekolah</td>
                            <td colspan="28">Penarafan Keselamatan Sekolah</td>
                        </tr>
                        <tr class="text-center" style="background-color: #C5DBC4; font-weight:bold">
                            <td colspan="2">Kebersihan</td>
                            <td colspan="2">Kokurikulum</td>
                            <td colspan="2">Perwatakan Sekolah</td>
                            <td colspan="2">Kemenjadian Murid</td>
                            <td colspan="2">Pencapaian Kokurikulum (Tahun 2019 - 2021) </td>
                            <td colspan="2">Pencapaian Akademik (2019 - 2021)</td>
                            <td colspan="2">Piawaian</td>
                            <td colspan="2">Disiplin</td>
                            <td colspan="2">Pengurusan Kesihatan Murid </td>
                            <td colspan="2">Pengurusan dan Pembangunan Guru</td>
                            <td colspan="2">Pengurusan Penilaian / Peperiksaan </td>
                            <td colspan="2">Pembelajaran dan Pemudahcaraan </td>
                            <td colspan="2">Pengurusan Kurikulum </td>
                            <td colspan="2">Penubuhan & Pendaftaran </td>

                        </tr>
                        <tr style="background-color: #ff8e74;">
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                            <td>Yang Telah Dihantar</td>
                            <td>Yang Belum Dihantar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td>PPD Petaling Utama</td>
                            <td> <a href="{{ route('spks.sekolah-penarafan') }}" class="nav-link">
                                    <span class="text-decoration text-info">57</span>
                                </a></td>
                            <td><a href="#" class="nav-link">
                                    <span class="text-decoration text-info">28</span>
                                </a></td>
                            <td>85</td>
                            <td>0</td>
                            <td>0</td>
                            <td>57</td>
                            <td>0</td>
                            <td>1</td>
                            <td>27</td>
                            <td>85</td>
                            <td>0</td>
                            <td>0</td>
                            <td>57</td>
                            <td>0</td>
                            <td>1</td>
                            <td>27</td>
                            <td>85</td>
                            <td>0</td>
                            <td>0</td>
                            <td>57</td>
                            <td>0</td>
                            <td>1</td>
                            <td>27</td>
                            <td>0</td>
                            <td>0</td>
                            <td>57</td>
                            <td>0</td>
                            <td>1</td>
                            <td>27</td>
                            <td>1</td>
                            <td>27</td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td>PPD Gombak</td>
                            <td> <a href="#" class="nav-link">
                                    <span class="text-decoration text-info">56</span>
                                </a></td>
                            <td><a href="#" class="nav-link">
                                    <span class="text-decoration text-info">16</span>
                                </a></td>
                            <td>72</td>
                            <td>0</td>
                            <td>1</td>
                            <td>56</td>
                            <td>0</td>
                            <td>1</td>
                            <td>16</td>
                            <td>72</td>
                            <td>0</td>
                            <td>1</td>
                            <td>56</td>
                            <td>0</td>
                            <td>1</td>
                            <td>16</td>
                            <td>72</td>
                            <td>0</td>
                            <td>1</td>
                            <td>56</td>
                            <td>0</td>
                            <td>1</td>
                            <td>16</td>
                            <td>72</td>
                            <td>0</td>
                            <td>1</td>
                            <td>56</td>
                            <td>0</td>
                            <td>1</td>
                            <td>16</td>
                            <td>16</td>
                        </tr>
                        <tr class="text-center table-warning">
                            <td colspan="2" class="table-info">Jumlah</td>
                            <td>123</td>
                            <td>123</td>
                            <td>123</td>
                            <td>0</td>
                            <td>0</td>
                            <td>114</td>
                            <td>0</td>
                            <td>2</td>
                            <td>43</td>
                            <td>123</td>
                            <td>123</td>
                            <td>123</td>
                            <td>0</td>
                            <td>0</td>
                            <td>114</td>
                            <td>0</td>
                            <td>2</td>
                            <td>43</td>
                            <td>43</td>
                            <td>123</td>
                            <td>123</td>
                            <td>123</td>
                            <td>0</td>
                            <td>0</td>
                            <td>114</td>
                            <td>0</td>
                            <td>2</td>
                            <td>43</td>
                            <td>114</td>
                            <td>0</td>
                            <td>2</td>
                        </tr>
                        <tr class="text-center table-warning">
                            <td colspan="5" class="table-info">Jumlah</td>
                            <td>0%</td>
                            <td>1%</td>
                            <td>99%</td>
                            <td>0%</td>
                            <td>1%</td>
                            <td>98%</td>
                            <td>0%</td>
                            <td>1%</td>
                            <td>99%</td>
                            <td>0%</td>
                            <td>1%</td>
                            <td>98%</td>
                            <td>0%</td>
                            <td>1%</td>
                            <td>99%</td>
                            <td>0%</td>
                            <td>1%</td>
                            <td>98%</td>
                            <td>0%</td>
                            <td>1%</td>
                            <td>99%</td>
                            <td>0%</td>
                            <td>1%</td>
                            <td>98%</td>
                            <td>99%</td>
                            <td>0%</td>
                            <td>1%</td>
                            <td>98%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
