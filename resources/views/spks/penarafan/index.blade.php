@extends('layouts.app')

@section('header')
    Laporan Penarafan
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="#"> Data Penarafan Keselamatan Sekolah </a>
    </li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder"> Laporan SPKS Peringkat PPD </h4>

            {{-- <div class="d-flex justify-content-end align-items-center">
                <a type="button" class="btn btn-primary float-right" href="{{ route('admin.instrumen.tambah-skips') }}">
                    <i class="fa-solid fa-add"></i> Tambah Skips
                </a>
            </div> --}}
        </div>

        <hr>

        <div class="card-body">
            <h4 class="card-title fw-bolder">Pengguna Hendaklah Membuat Carian Dahulu </h4>
            <div class="row">
                <div class="col-md-4">
                    <label class="fw-bolder">Tahun</label>
                    <select class="form-select" id="tahun">
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="fw-bolder">Bulan</label>
                    <select class="form-select" id="bulan">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="fw-bolder">Daerah</label>
                    <select class="form-control " name="ppd" id="ppd">
                        <option value="" hidden>Negeri</option>
                        @foreach ($states as $negeri)
                            <option value="{{ $negeri->name }}">{{ $negeri->name }}</option>
                        @endforeach
                    </select>
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

            <hr>

            <div class="table-responsive" style="display: none;">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <tr class="text-center align-middle">
                            <td rowspan="3">No.</td>
                            <td rowspan="3">PPD</td>
                            <td rowspan="3">Bil.Sekolah Rendah</td>
                            <td rowspan="3">Bil.Sekolah Menengah</td>
                            <td rowspan="3">Bil.Sekolah</td>
                            <td colspan="6">Penarafan Keselamatan Sekolah</td>
                        </tr>
                        <tr>
                            <td colspan="3">Kategori Sekolah Rendah</td>
                            <td colspan="3">Kategori Sekolah Menengah</td>
                        </tr>
                        <tr class="text-center">
                            <td class="table-danger">0-49 %</td>
                            <td class="table-warning">50-79 %</td>
                            <td class="table-success">80-100 %</td>
                            <td class="table-danger">0-49 %</td>
                            <td class="table-warning">50-79 %</td>
                            <td class="table-success">80-100 %</td>
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
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function search() {
            // Get the selected values from the dropdowns
            var year = document.querySelector('#tahun').value;
            var month = document.querySelector('#bulan').value;
            var ppd = document.querySelector('#ppd').value;

            // Check if all inputs are filled
            if (year && month && ppd) {
                // Show the table
                document.querySelector('.table-responsive').style.display = 'block';
            } else {
                // If any input is empty, alert the user or handle it accordingly
                alert('Please fill in all fields.');
            }
        }



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>
@endsection
