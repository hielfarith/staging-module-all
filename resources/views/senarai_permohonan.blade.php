@extends('layouts.app')

@section('header')
Permohonan
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Permohonan</a></li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Permohonan </h4>
        @hasanyrole('pengguna_luar')
        <div class="d-flex justify-content-end align-items-center">
            <button class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#index_borang_permohonan" aria-controls="index_borang_permohonan">
                Permohonan Baru
            </button>
        </div>
        @endhasanyrole
    </div>
    <hr>

    <div class="card-body">
        <div class="row ">
            <div class="col-md-4">
                <label class="form-label fw-bolder">ID Permohonan</label>
                <input type="text" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bolder">No Giliran Menunggu</label>
                <input type="text" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bolder">Status Permohonan</label>
                <input type="text" class="form-control">
            </div>

            <div class="d-flex justify-content-end align-items-center my-1 ">
                <a class="me-3" type="button" id="reset" href="#">
                    <span class="text-danger"> Reset </span>
                </a>
                <button type="submit" class="btn btn-success float-right">
                    <i class="fa fa-search"></i> Search
                </button>
            </div>
        </div>

        <div class="btn-group" role="group" aria-label="Role Action">
            <a href="#" class="btn btn-outline-success waves-effect">
                <i class="fa fa-file-excel text-success"></i> Excel
            </a>
            <a href="#" class="btn btn-outline-danger waves-effect">
                <i class="fa fa-file-pdf text-danger"></i> PDF
            </a>
        </div>

        <hr>

        <style>
            #senarai_permohonan thead th {
                vertical-align: middle;
                text-align: center;
            }
        
            #senarai_permohonan tbody{
                vertical-align: middle;
            }
        
        </style>
        @php $count = 1; @endphp
        
        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-responsive table-hovered" id="senarai_permohonan" style="">
                <thead>
                    <tr>
                        <th rowspan="2"> No. </th>
                        <th rowspan="2"> ID Permohonan </th>
                        <th rowspan="2"> No Giliran Menunggu </th>
                        @hasanyrole('admin')
                            <th colspan="4">Maklumat Permohonan</th>
                        @endhasanyrole
                        <th rowspan="2"> Tarikh Permohonan </th>
                        <th rowspan="2"> Status Semasa </th>
                    </tr>
        
                    @hasanyrole('admin')
                        <tr>
                            <th> Nama Pemohon </th>
                            <th> Lokasi Perkhidmatan </th>
                            <th> Lokasi Permohonan </th>
                            <th> No Telefon </th>
                        </tr>
                    @endhasanyrole
                </thead>
        
                <tbody>
        
                    @hasanyrole('pengguna_luar')
                    <tr>
                        <td> {{ $count++ }} </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#edit_borang_permohonan" aria-controls="edit_borang_permohonan" class="btn btn-xs btn-default text-primary" title="">
                                7J52558071
                            </a>
                        </td>
                        <td> WTG523252J </td>
                        <td> 12 Jul 2022 </td>
                        <td>
                            <span class="badge badge-glow bg-primary">
                                Permohonan Baru
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td> {{ $count++ }} </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#view-lulus-quarters" aria-controls="view-lulus-quarters" class="btn btn-xs btn-default text-primary" title="">
                                7J52558071
                            </a>
                        </td>
                        <td> WTG523252J </td>
                        <td> 12 Jul 2022 </td>
                        <td>
                            <span class="badge badge-glow bg-success">
                                Permohonan Lulus
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td> {{ $count++ }} </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#view-setuju-quarters" aria-controls="view-setuju-quarters" class="btn btn-xs btn-default text-primary" title="">
                                7J52558071
                            </a>
                        </td>
                        <td> WTG523252J </td>
                        <td> 12 Jul 2022 </td>
                        <td>
                            <span class="badge badge-glow bg-info">
                                Permohonan Selesai
                            </span>
                        </td>
                    </tr>
                    @endhasanyrole
        
                    @hasanyrole('admin')
                    <tr>
                        <td> {{ $count++ }} </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#maklumat_pemohon" aria-controls="maklumat_pemohon" class="btn btn-xs btn-default text-primary">
                                7J52558071
                            </a>
                        </td>
                        <td> WAIT552321 </td>
                        <td>Adli</td>
                        <td>Pegawai Pendidikan Daerah (Gred 42) </td>
                        <td>Jabatan Pendidikan WP Kuala Lumpur </td>
                        <td>012345678</td>
                        <td> 12 Jul 2022 </td>
                        <td>
                            <span class="badge pill-badge-glow bg-primary">Permohonan Baru</span>
                        </td>
                    </tr>
                    <tr>
                        <td> {{ $count++ }} </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#maklumat_pemohon" aria-controls="maklumat_pemohon" class="btn btn-xs btn-default text-primary">
                                7J52558071
                            </a>
                        </td>
                        <td> WAIT552321 </td>
                        <td>Adli</td>
                        <td>Pegawai Pendidikan Daerah (Gred 42) </td>
                        <td>Jabatan Pendidikan WP Kuala Lumpur </td>
                        <td>012345678</td><td> 12 Jul 2022 </td>
                        <td>
                            <span class="badge pill-badge-glow bg-info">Setuju Terima</span>
                        </td>
                    </tr>
                    <tr>
                        <td> {{ $count++ }} </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#maklumat_pemohon" aria-controls="maklumat_pemohon" class="btn btn-xs btn-default text-primary">
                                7J52558071
                            </a>
                        </td>
                        <td> WAIT552321 </td>
                        <td>Adli</td>
                        <td>Pegawai Pendidikan Daerah (Gred 42) </td>
                        <td>Jabatan Pendidikan WP Kuala Lumpur </td>
                        <td>012345678</td><td> 12 Jul 2022 </td>
                        <td>
                            <span class="badge pill-badge-glow bg-success">Selesai</span>
                        </td>
                    </tr>
                    @endhasanyrole
        
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection