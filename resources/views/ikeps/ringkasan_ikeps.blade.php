@extends('layouts.app')

@section('header')
I-KePS
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Instumen/ Modul </a></li>
<li class="breadcrumb-item"><a href="#"> Instrumen Bancian Kemudahan Prasasarana dan Program Sukan Sekolah</a></li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Instrumen Bancian Kemudahan Prasasarana dan Program Sukan Sekolah </h4>

        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('ikeps.ikeps_baru') }}">
                Pengisian Baru
            </a>
        </div>
    </div>

    <hr>

    <div class="card-body">

        {{-- <style>
            #ringkasan_ikeps thead th {
                vertical-align: middle;
                text-align: center;
            }

            #ringkasan_ikeps tbody{
                vertical-align: middle;
            }
        </style> --}}

        {{-- <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-responsive table-hovered" id="ringkasan_ikeps" style="">
                <thead>
                    <tr>
                        <th> No. </th>
                        <th> ID Instrumen </th>
                        <th> Nama Instrumen </th>
                        <th> Keterangan Instrumen </th>
                        <th> Tarikh Didaftarkan </th>
                        <th> Tindakan </th>
                    </tr>
                </thead>

                <tbody></tbody>
            </table>
        </div> --}}

        <div class="justify-content-end align-items-center" style="width: 10%">
            <select name="tahun" id="tahun" class="form-select select2" onchange="this.options[this.selectedIndex].value && (window.location = '/ikeps/ringkasan-pengisian/'+this.options[this.selectedIndex].value);">
                @for ($year = date('Y') - 5; $year <= date('Y'); $year++)
                    <option value="{{ $year }}" @if($year == $tahun) selected @endif>{{ $year }}</option>
                @endfor
            </select>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-responsive table-hovered" id="table-prasarana-sukan">
                <thead>
                    <tr>
                        <th colspan="8">PRASARANA SUKAN</th>
                    </tr>
                    <tr>
                        <th> Bil. </th>
                        <th> Jenis Prasarana </th>
                        <th> Sub Prasarana </th>
                        <th> Gunasama </th>
                        <th> Bilangan </th>
                        <th> Masih Digunakan </th>
                        <th> Status Fizikal </th>
                        <th> Tarikh Kemaskini </th>
                    </tr>
                </thead>

                <?php 
                if($prasaranaSukan){
                ?>
                <tbody>
                    <?php
                    $status_fizikal = config('staticdata.ikeps.status_fizikal');

                    $prasarana_sukan = config('staticdata.ikeps.prasarana_sukan');

                    $bilPrasaranaSukan = 1;
                    ?>
                    @foreach ($prasarana_sukan as $jenisKey => $jenisSukan)
                        @if(array_key_exists('sub', $jenisSukan))
                            @foreach($jenisSukan['sub'] as $sukanKey => $sukan)
                                @if($prasaranaSukan->$sukanKey && ($sukanKey != 'status_padang' && $sukanKey != 'gred_padang')) 
                                <?php 
                                $gunaSama = $sukanKey.'_gunasama';
                                $bilangan = $sukanKey.'_bilangan';
                                $masihGuna = $sukanKey.'_masih_digunakan';
                                $statusFizikal = $sukanKey.'_status_fizikal';
                                ?>
                    <tr>
                        <td>{{ $bilPrasaranaSukan++ }}</td>
                        <td>{{ $jenisSukan['title'] }}</td>
                        <td>{{ $sukan }}</td>
                        <td>{{ ($prasaranaSukan->$gunaSama) ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $prasaranaSukan->$bilangan }}</td>
                        <td>{{ ($prasaranaSukan->$masihGuna) ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ ($prasaranaSukan->$statusFizikal) ? $status_fizikal[$prasaranaSukan->$statusFizikal] : null }}</td>
                        <td>{{ date_format($prasaranaSukan->updated_at, 'Y-m-d') }}
                    </tr>
                                @elseif($prasaranaSukan->$sukanKey && ($sukanKey == 'status_padang' || $sukanKey == 'gred_padang'))
                    <tr>
                        <td></td>
                        <td colspan="7">
                            @if($sukanKey == 'gred_padang')
                            Gred Padang : Kategori {{ config('staticdata.ikeps.prasarana_sukan.padang_sekolah.sub.gred_padang.'.$prasaranaSukan->$sukanKey) }}
                            @elseif($sukanKey == 'status_padang')
                            Status Hak Milik Padang : {{ config('staticdata.ikeps.prasarana_sukan.padang_sekolah.sub.status_padang.'.$prasaranaSukan->$sukanKey) }}
                            @endif
                        </td>
                    </tr>             
                                @endif
                            @endforeach
                        @else 
                            @if($prasaranaSukan->$jenisKey)
                            <?php 
                            $gunaSama = $jenisKey.'_gunasama';
                            $bilangan = $jenisKey.'_bilangan';
                            $masihGuna = $jenisKey.'_masih_digunakan';
                            $statusFizikal = $jenisKey.'_status_fizikal';
                            ?>
                    <tr>
                        <td>{{ $bilPrasaranaSukan++ }}</td>
                        <td>{{ $jenisSukan['title'] }}</td>
                        <td></td>
                        <td>{{ ($prasaranaSukan->$gunaSama) ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $prasaranaSukan->$bilangan }}</td>
                        <td>{{ ($prasaranaSukan->$masihGuna) ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ ($prasaranaSukan->$statusFizikal) ? $status_fizikal[$prasaranaSukan->$statusFizikal] : null }}</td>
                        <td>{{ date_format($prasaranaSukan->updated_at, 'Y-m-d') }}
                    </tr>   
                            @endif
                        @endif
                    @endforeach
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-responsive table-hovered" id="table-kemudahan-sukan">
                <thead>
                    <tr>
                        <th colspan="8">KEMUDAHAN SUKAN</th>
                    </tr>
                    <tr>
                        <th> Bil. </th>
                        <th> Jenis Kemudahan Sukan </th>
                        <th> Sub Kemudahan Sukan </th>
                        <th> Gunasama </th>
                        <th> Bilangan </th>
                        <th> Masih Digunakan </th>
                        <th> Status Fizikal </th>
                        <th> Tarikh Kemaskini </th>
                    </tr>
                </thead>

                <?php 
                if($kemudahanSukan){
                ?>
                <tbody>
                    <?php
                    $kemudahan_sukan = config('staticdata.ikeps.kemudahan_sukan');

                    $bilKemudahanSukan = 1;
                    ?>
                    @foreach ($kemudahan_sukan as $jenisKey => $jenisSukan)
                        @foreach($jenisSukan['sub'] as $sukanKey => $sukan)
                            @if($kemudahanSukan->$sukanKey) 
                            <?php 
                            $gunaSama = $sukanKey.'_gunasama';
                            $bilangan = $sukanKey.'_bilangan';
                            $masihGuna = $sukanKey.'_masih_digunakan';
                            $statusFizikal = $sukanKey.'_status_fizikal';
                            ?>
                    <tr>
                        <td>{{ $bilKemudahanSukan++ }}</td>
                        <td>{{ $jenisSukan['title'] }}</td>
                        <td>{{ $sukan }}</td>
                        <td>{{ ($kemudahanSukan->$gunaSama) ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $kemudahanSukan->$bilangan }}</td>
                        <td>{{ ($kemudahanSukan->$masihGuna) ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ ($kemudahanSukan->$statusFizikal) ? $status_fizikal[$kemudahanSukan->$statusFizikal] : null }}</td>
                        <td>{{ date_format($kemudahanSukan->updated_at, 'Y-m-d') }}
                    </tr>        
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-responsive table-hovered" id="table-perancangan-sukan">
                <thead>
                    <tr>
                        <th colspan="5">PERANCANGAN SUKAN</th>
                    </tr>
                    <tr>
                        <th>Adakah Sekolah Mempunyai Perancangan Program Sukan Di Sekolah?</th>
                        <th>Ada / Tiada</th>
                        <th>Dilaksanakan Setiap Tahun</th>
                        <th>Mengikut Keperluan/ Pertandingan</th>
                        <th>Kenyataan Program yang Dijalankan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $perancangan_sukan = config('staticdata.ikeps.perancangan_sukan');
                    ?>
                    @foreach($perancangan_sukan as $sukanKey => $sukan)
                        @foreach($sukan as $jenisKey => $jenis)
                    <?php
                    if($perancanganSukan){
                        $butiran = $jenisKey.'_butiran';
                        $program = $jenisKey.'_program';
                    ?>    
                    <tr>
                        <td>{{ $jenis }}</td>
                        <td>{{ ($perancanganSukan->$jenisKey) ? 'Ada' : 'Tiada' }}</td>
                        <td>{{ ($perancanganSukan->$butiran == 1) ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ ($perancanganSukan->$butiran == 2) ? 'Ya' : 'Tidak' }}</td>
                        <td>
                            @if($sukanKey == 'perancangan')
                            {{ ($perancanganSukan->$program == 1) ? 'Olahraga' : 'Merentas Desa' }}
                            @endif
                        </td>
                    </tr>
                    <?php
                    } else {
                    ?>
                    <tr>
                        <td>{{ $jenis }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                    }
                    ?>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-responsive table-hovered" id="table-status-pertanyaan">
                <thead>
                    <tr>
                        <th>STATUS PERTANYAAN</th>
                    </tr>
                </thead>
            </table>
            <?php
            $jenis_pertanyaan = config('staticdata.ikeps.status_penyertaan.jenis_penyertaan');
            ?>
            <table class="table header_uppercase table-bordered table-responsive table-hovered" id="table-sukan-mssm">
                <thead>
                    <tr>
                        <th>Sukan MSSM</th>
                        <th>Zon</th>
                        <th>Daerah</th>
                        <th>Bahagian</th>
                        <th>Negeri</th>
                        <th>Kebangsaan</th>
                        <th>Antarabangsa</th>
                    </tr>
                </thead>
                <?php 
                if($statusPertanyaan){
                ?>
                <tbody>
                    <?php
                    $sukan_mssm = config('staticdata.ikeps.status_penyertaan.sukan_mssm');
                    $totalZon = $totalDaerah = $totalBahagian = $totalNegeri = $totalKebangsaan = $totalAntarabangsa = 0;
                    ?>
                    @foreach($sukan_mssm as $mssmKey => $sukan)
                        <?php
                        $zon = $mssmKey.'_zon';
                        $daerah = $mssmKey.'_daerah';
                        $bahagian = $mssmKey.'_bahagian';
                        $negeri = $mssmKey.'_negeri';
                        $kebangsaan = $mssmKey.'_kebangsaan';
                        $antarabangsa = $mssmKey.'_antarabangsa';
                        ?>
                        @if(
                            $statusPertanyaan->$zon || 
                            $statusPertanyaan->$daerah || 
                            $statusPertanyaan->$bahagian ||
                            $statusPertanyaan->$negeri ||
                            $statusPertanyaan->$kebangsaan ||
                            $statusPertanyaan->$antarabangsa
                        )
                        <?php
                        $totalZon+=$statusPertanyaan->$zon; 
                        $totalDaerah+=$statusPertanyaan->$daerah; 
                        $totalBahagian+=$statusPertanyaan->$bahagian;
                        $totalNegeri+=$statusPertanyaan->$negeri;
                        $totalKebangsaan+=$statusPertanyaan->$kebangsaan;
                        $totalAntarabangsa+=$statusPertanyaan->$antarabangsa;
                        ?>
                    <tr>
                        <td>{{ $sukan }}</td>
                        <td>{{ $statusPertanyaan->$zon }}</td>
                        <td>{{ $statusPertanyaan->$daerah }}</td>
                        <td>{{ $statusPertanyaan->$bahagian }}</td>
                        <td>{{ $statusPertanyaan->$negeri }}</td>
                        <td>{{ $statusPertanyaan->$kebangsaan }}</td>
                        <td>{{ $statusPertanyaan->$antarabangsa }}</td>
                    </tr>
                        @endif
                    @endforeach
                </tbody>
                <?php
                }
                ?>
                <tfoot>
                    <tr>
                        <td>JUMLAH</td>
                        <td>{{ $totalZon }}</td>
                        <td>{{ $totalDaerah }}</td>
                        <td>{{ $totalBahagian }}</td>
                        <td>{{ $totalNegeri }}</td>
                        <td>{{ $totalKebangsaan }}</td>
                        <td>{{ $totalAntarabangsa }}</td>
                    </tr>
                </tfoot>
            </table>
            <br>
            <table class="table header_uppercase table-bordered table-responsive table-hovered" id="table-sukan-lain">
                <thead>
                    <tr>
                        <th>Sukan Lain</th>
                        <th>Zon</th>
                        <th>Daerah</th>
                        <th>Bahagian</th>
                        <th>Negeri</th>
                        <th>Kebangsaan</th>
                        <th>Antarabangsa</th>
                    </tr>
                </thead>
                <?php 
                if($statusPertanyaan){
                ?>
                <tbody>
                    <?php
                    $sukan_lain = config('staticdata.ikeps.status_penyertaan.sukan_lain');
                    $totalZon = $totalDaerah = $totalBahagian = $totalNegeri = $totalKebangsaan = $totalAntarabangsa = 0;
                    ?>
                    @foreach($sukan_lain as $lainKey => $sukan)
                        <?php
                        $zon = $lainKey.'_zon';
                        $daerah = $lainKey.'_daerah';
                        $bahagian = $lainKey.'_bahagian';
                        $negeri = $lainKey.'_negeri';
                        $kebangsaan = $lainKey.'_kebangsaan';
                        $antarabangsa = $lainKey.'_antarabangsa';
                        ?>
                        @if(
                            $statusPertanyaan->$zon || 
                            $statusPertanyaan->$daerah || 
                            $statusPertanyaan->$bahagian ||
                            $statusPertanyaan->$negeri ||
                            $statusPertanyaan->$kebangsaan ||
                            $statusPertanyaan->$antarabangsa
                        )
                        <?php
                        $totalZon+=$statusPertanyaan->$zon; 
                        $totalDaerah+=$statusPertanyaan->$daerah; 
                        $totalBahagian+=$statusPertanyaan->$bahagian;
                        $totalNegeri+=$statusPertanyaan->$negeri;
                        $totalKebangsaan+=$statusPertanyaan->$kebangsaan;
                        $totalAntarabangsa+=$statusPertanyaan->$antarabangsa;
                        ?>
                    <tr>
                        <td>{{ $sukan }}</td>
                        <td>{{ $statusPertanyaan->$zon }}</td>
                        <td>{{ $statusPertanyaan->$daerah }}</td>
                        <td>{{ $statusPertanyaan->$bahagian }}</td>
                        <td>{{ $statusPertanyaan->$negeri }}</td>
                        <td>{{ $statusPertanyaan->$kebangsaan }}</td>
                        <td>{{ $statusPertanyaan->$antarabangsa }}</td>
                    </tr>
                        @endif
                    @endforeach
                </tbody>
                <?php
                }
                ?>
                <tfoot>
                    <tr>
                        <td>JUMLAH</td>
                        <td>{{ $totalZon }}</td>
                        <td>{{ $totalDaerah }}</td>
                        <td>{{ $totalBahagian }}</td>
                        <td>{{ $totalNegeri }}</td>
                        <td>{{ $totalKebangsaan }}</td>
                        <td>{{ $totalAntarabangsa }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-responsive table-hovered" id="table-program-sekolah">
                <thead>
                    <tr>
                        <th colspan="5">PROGRAM SUKAN SEKOLAH</th>
                    </tr>
                    <tr>
                        <th>Item</th>
                        <th>Ada / Tiada</th>
                        <th>Setiap Tahun</th>
                        <th>Dua Tahun Sekali</th>
                        <th>Bulan Perlaksanaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $program_sekolah = config('staticdata.ikeps.program_sekolah');
                    ?>
                    @foreach($program_sekolah as $programKey => $program)
                    <?php
                    if($programSekolah){
                        $kekerapan = $programKey.'_kekerapan';
                        $perlaksanaan = $programKey.'_perlaksanaan';
                    ?>    
                    <tr>
                        <td>{{ $program }}</td>
                        <td>{{ ($programSekolah->$programKey) ? 'Ada' : 'Tiada' }}</td>
                        <td>{{ ($programSekolah->$kekerapan == 1) ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ ($programSekolah->$kekerapan == 2) ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ ($programSekolah->$perlaksanaan) ? config('staticdata.bulan.'.$programSekolah->$perlaksanaan) : '' }}</td>
                    </tr>
                    <?php
                    } else {
                    ?>
                    <tr>
                        <td>{{ $program }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                    }
                    ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection
