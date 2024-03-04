@extends('layouts/contentLayoutMaster')

@section('header')
    Dashboard SKPS
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item">
        <a>Dashboard SKPS</a>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 ">
            <div class="card h-100">
                <div class="card-header" style="background-color: #F75D59">
                    <h4 class="card-title fw-bolder">Pengumuman</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header" style="background-color: #FCDCCE;">
                    <h4 class="card-title fw-bolder"><i class="fa-regular fa-clone"></i> Profil Pengguna</h4>
                </div>
                <div class="card-body mt-2">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Penuh</th>
                            <td colspan="4">Ahmad Abu bin Ali</td>
                        </tr>
                        <tr>
                            <th>No KP </th>
                            <td colspan="4">012345-00-12345</td>
                        </tr>
                        <tr>
                            <th>Agensi</th>
                            <td colspan="4">Jabatan Pendidikan Tinggi</td>
                        </tr>
                        <tr>
                            <th>Kementerian</th>
                            <td colspan="4">Kementerian Pendidikan Malaysia</td>
                        </tr>
                        <tr>
                            <th>Jawatan</th>
                            <td>Kerani</td>
                            <th>Gred</th>
                            <td>N19</td>
                        </tr>

                        <tr>
                            <th>Alamat Pejabat 1</th>
                            <td colspan="4">Blok E2, Kementerian Pelajaran Malaysia, Presint 1, 62604 Putrajaya</td>
                        </tr>
                        <tr>
                            <th>Alamat Pejabat 2</th>
                            <td colspan="4">-</td>
                        </tr>
                        <tr>
                            <th>Alamat Pejabat 3</th>
                            <td colspan="4">-</td>
                        </tr>
                        <tr>
                            <th>Alamat Pejabat Poskod</th>
                            <td colspan="4">62604</td>
                        </tr>
                        <tr>
                            <th>Alamat Pejabat Daerah</th>
                            <td colspan="4">U 5, 40150 Shah Alam, Selangor
                            </td>
                        </tr>
                        <tr>
                            <th>Alamat Pejabat Negeri</th>
                            <td colspan="4">Kompleks Bangunan Kerajaan, 50600, Jln Tuanku Abdul Halim, 50480 Kuala
                                Lumpur, Federal Territory of Kuala Lumpur</td>
                        </tr>
                        <tr>
                            <th>No Tel. Pejabat</th>
                            <td colspan="4">0123456789</td>
                        </tr>
                        <tr>
                            <th>Emel Majikan</th>
                            <td colspan="4">alif@gmail.com</td>
                        </tr>
                        <tr>
                            <th>Nama Majikan</th>
                            <td colspan="4">Alif Aiman bin Mahmud</td>
                        </tr>
                        <tr>
                            <th>Panggilan</th>
                            <td>-</td>
                            <th>Status</th>
                            <td>-</td>
                        </tr>
                    </table>
                </div>

                <div class="card-header " style="background-color: #C3FDB8;">
                    <h4 class="card-title fw-bolder"><i class="fa fa-info-circle"></i> Profil Sekolah</h4>
                </div>
                <div class="card-body mt-2">
                    <table class="table table-bordered">
                        <tr>
                            <th width="21%">Nama JPN</th>
                            <td width="28%">JPN Selangor</td>
                            <th width="28%">Kod JPN </th>
                            <td>10</td>
                        </tr>
                        <tr>
                            <th>Nama PPD</th>
                            <td>PPD Selangor</td>
                            <th>Kod PPD </th>
                            <td>13</td>
                        </tr>
                        <tr>
                            <th>Kod Institusi</th>
                            <td colspan="4">ABC123</td>
                        </tr>
                        <tr>
                            <th>Nama Institusi</th>
                            <td colspan="4">Sekolah Menengah Kebangsaan Kuala Lumpur</td>
                        </tr>
                        <tr>
                            <th>Kategori Institusi</th>
                            <td colspan="4">Sekolah Menengah</td>
                        </tr>
                        <tr>
                            <th>Jenis Institusi</th>
                            <td colspan="4">Sek. Menengah Akademik</td>
                        </tr>
                        <tr>
                            <th>Enrollmen Murid</th>
                            <td colspan="4">500</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script></script>
@endsection
