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
                    @foreach ($pengumumans as $pengumuman)
                    <div class="mt-75">
                        <div class="d-flex mb-2">
                            <a href="{{ Illuminate\Support\Facades\Storage::disk('public')->url($pengumuman->dokumen) }}" class="me-2">
                            <img
                                class="rounded"
                                src="{{ asset('images/icons/icon-file.png') }}"
                                width="100"
                                height="100"
                            />
                            </a>
                            <div class="blog-info">
                                <h4 class="blog-recent-post-title">{{ $pengumuman->tajuk }}</h4>
                                <h6 class="blog-recent-post-title">{{ $pengumuman->keterangan }}</h6>
                                <div class="text-muted mb-0">{{ date_format($pengumuman->created_at, 'Y-m-d') }}</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach 
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
                            <td colspan="4">{{ $user['nama'] }}</td>
                        </tr>
                        <tr>
                            <th>No KP </th>
                            <td colspan="4">{{ $user['nombor_id'] }}</td>
                        </tr>
                        <tr>
                            <th>Agensi</th>
                            <td colspan="4"><!-- Jabatan Pendidikan Tinggi --> - </td>
                        </tr>
                        <tr>
                            <th>Kementerian</th>
                            <td colspan="4"><!-- Kementerian Pendidikan Malaysia --> - </td>
                        </tr>
                        <tr>
                            <th>Jawatan</th>
                            <td>{{ $user['jawatan'] }}</td>
                            <th>Gred</th>
                            <td><!-- N19 --> - </td>
                        </tr>

                        <tr>
                            <th>Alamat Pejabat 1</th>
                            <td colspan="4"><!-- Blok E2, Kementerian Pelajaran Malaysia, Presint 1, 62604 Putrajaya --> - </td>
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
                            <td colspan="4"><!-- 62604 --> - </td>
                        </tr>
                        <tr>
                            <th>Alamat Pejabat Daerah</th>
                            <td colspan="4"><!-- U 5, 40150 Shah Alam, Selangor --> - </td>
                        </tr>
                        <tr>
                            <th>Alamat Pejabat Negeri</th>
                            <td colspan="4"><!-- Kompleks Bangunan Kerajaan, 50600, Jln Tuanku Abdul Halim, 50480 Kuala
                                Lumpur, Federal Territory of Kuala Lumpur --> - </td>
                        </tr>
                        <tr>
                            <th>No Tel. Pejabat</th>
                            <td colspan="4"><!-- 0123456789 --> -</td>
                        </tr>
                        <tr>
                            <th>Emel Majikan</th>
                            <td colspan="4"><!-- alif@gmail.com --> - </td>
                        </tr>
                        <tr>
                            <th>Nama Majikan</th>
                            <td colspan="4"><!-- Alif Aiman bin Mahmud --> - </td>
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
                        {{-- <tr>
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
                        </tr> --}}
                        <tr>
                            <th>Nama JPN</th>
                            <td>{{ $institusi['JPN'] }}</td>
                        </tr>
                        <tr>
                            <th>Kod JPN </th>
                            <td>{{ $institusi['KODJPN'] }}</td>
                        </tr>
                        <tr>
                            <th>Nama PPD</th>
                            <td>{{ $institusi['PPD'] }}</td>
                        </tr>
                        <tr>
                            <th>Kod PPD</th>
                            <td>{{ $institusi['KODPPD'] }}</td>
                        </tr>
                        <tr>
                            <th>Kod Institusi</th>
                            <td colspan="4">{{ $institusi['KOD_INSTITUSI'] }}</td>
                        </tr>
                        <tr>
                            <th>Nama Institusi</th>
                            <td colspan="4">{{ $institusi['NAMA_INSTITUSI'] }}</td>
                        </tr>
                        <tr>
                            <th>Kategori Institusi</th>
                            <td colspan="4">{{ $institusi['KATEGORI_INSTITUSI'] }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Institusi</th>
                            <td colspan="4">{{ $institusi['JENIS_INSTITUSI'] }}</td>
                        </tr>
                        <tr>
                            <th>Enrollmen Murid</th>
                            <td colspan="4"><!-- 500 --> - </td>
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
