@extends('layouts.app')

@section('header')
    Instrumen
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="#"> Piawaian Sekolah Selamat </a>
    </li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder"> Senarai Sekolah Selamat </h4>

            {{-- <div class="d-flex justify-content-end align-items-center">
                <a type="button" class="btn btn-primary float-right" href="{{ route('admin.instrumen.tambah-skips') }}">
                    <i class="fa-solid fa-add"></i> Tambah Skips
                </a>
            </div> --}}
        </div>

        <hr>

        <div class="card-body">

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
                <button type="button" onclick="search()" class="btn btn-success float-right">
                    <i class="fa fa-search me-1"></i> Cari
                </button>
            </div>

            <hr>

            <div class="table-responsive">
                <table id="instrumen" class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th>No. </th>
                            <th>Kod Sekolah</th>
                            <th>Nama Sekolah</th>
                            <th>Fasa</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>BBA4016</td>
                            <td>Sekolah Kebangsaan Beranang</td>
                            <td>November / 2022</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Button group">
                                    <a data-bs-toggle="modal" data-bs-target="#data_instrumen"
                                        aria-controls="#data_instrumen" class="btn btn-xs btn-default" title="">
                                        <i class="fas fa-eye text-primary"></i>
                                    </a>
                                    <a class="btn btn-xs btn-default" title="">
                                        <i class="fas fa-print text-primary"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="data_instrumen" tabindex="-1" aria-labelledby="data_instrumen" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Skor Piawaian Sekolah Selamat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modal-body-instrumen">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead class="table" style="text-align: center;">
                                    <tr>
                                        <th>No. </th>
                                        <th>Aspek</th>
                                        <th>Wajaran</th>
                                        <th>Skor Penuh</th>
                                        <th>Skor Diperolehi</th>
                                        <th>Peratusan Pencapaian</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <tr>
                                        <td>1</td>
                                        <td>Pengurusan Aktiviti Murid</td>
                                        <td> 30%</td>
                                        <td>54</td>
                                        <td><b>50</b></td>
                                        <td>27.78%</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pengurusan Keselamatan Infrastruktur Sekolah</td>
                                        <td> 20%</td>
                                        <td>26</td>
                                        <td><b>20</b></td>
                                        <td>15.38%</td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Pengurusan Sosial</td>
                                        <td>10%</td>
                                        <td>14</td>
                                        <td> <b>14</b></td>
                                        <td>10.00%</td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>Pengurusan Krisis/Bencana</td>
                                        <td>10%</td>
                                        <td>14</td>
                                        <td> <b>14</b></td>
                                        <td>10.00%</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Pengurusan Risiko</td>
                                        <td>10%</td>
                                        <td>14</td>
                                        <td><b>13</b></td>
                                        <td>9.29%</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Pengurusan Perkhidmatan Pengawal Keselamatan Sekolah</td>
                                        <td>20%</td>
                                        <td>32</td>
                                        <td><b>32</b></td>
                                        <td>20.00%</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>JUMLAH</b></td>
                                        <td>100%</td>
                                        <td>154</td>
                                        <td><b>143</b></td>
                                        <td>92.45%</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>STATUS</b></td>
                                        <td colspan="4" class="table-success text-success">SEKOLAH ANDA SELAMAT</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('#modal-instrumen-diisi').on('shown.bs.modal', function() {
                $('.select2').select2({});
                flatpickr(".flatpickr", {
                    dateFormat: "d/m/Y"
                });
            });

            $(document).ready(function() {
                $('#instrumen').DataTable();
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>
@endsection
