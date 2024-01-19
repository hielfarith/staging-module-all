@php

$kurikulums = [
    'sukatan_pelajaran' => '3.1 Sukatan Pelajaran',
    'dokumen_rekod_mengajar' => '3.2 Dokumen Rekod Mengajar',
    'mesyuarat_kurikulum' => '3.3 Mesyuarat Kurikulum',
    'mata_pelajaran_yang_diajar' => '3.4 Mata Pelajaran Yang Diajar',
    'bahan_bantu_mengajar' => '3.5 Bahan Bantu Mengajar',
    'rekod_pencerapan' => '3.6 Rekod Pencerapan',
];

$option_kurikulums = [
    'sukatan_pelajaran' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="setiap_program_kursus">Setiap Program/Kursus</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="setiap_program_kursus">Setiap Program/Kursus</option><option value="difailkan">Difailkan</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="setiap_program_kursus">Setiap Program/Kursus</option><option value="difailkan">Difailkan</option><option value="disebar_kepada_guru">Disebar kepada Guru</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="setiap_program_kursus">Setiap Program/Kursus</option><option value="difailkan">Difailkan</option><option value="disebar_kepada_guru">Disebar kepada Guru</option><option value="mudah_dirujuk">Mudah Dirujuk</option></select></td>',
    ],
    'dokumen_rekod_mengajar' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="direkodkan">Direkodkan Setiap Sesi PDP</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="direkodkan">Direkodkan Setiap Sesi PDP</option><option value="kebolehcapaian">Kebolehcapaian</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="direkodkan">Direkodkan Setiap Sesi PDP</option><option value="kebolehcapaian">Kebolehcapaian</option><option value="ikut_sukatan_pelajaran">Ikut Sukatan Pelajaran</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="direkodkan">Direkodkan Setiap Sesi PDP</option><option value="kebolehcapaian">Kebolehcapaian</option><option value="ikut_sukatan_pelajaran">Ikut Sukatan Pelajaran</option><option value="disemak_dan_diselia">Disemak dan Diselia</option></select></td>',
    ],
    'mesyuarat_kurikulum' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="mesyuarat_diminitkan">Mesyuarat Diminitkan</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="mesyuarat_diminitkan">Mesyuarat Diminitkan</option><option value="ada_fail_minit">Ada Fail Minit</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="mesyuarat_diminitkan">Mesyuarat Diminitkan</option><option value="ada_fail_minit">Ada Fail Minit</option><option value="minit_disebarkan">Minit Dilebarkan</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="mesyuarat_diminitkan">Mesyuarat Diminitkan</option><option value="ada_fail_minit">Ada Fail Minit</option><option value="minit_disebarkan">Minit Dilebarkan</option><option value="tindakan_susulan">Tindakan Susulan</option></select></td>',
    ],
    'mata_pelajaran_yang_diajar' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="mematuhi_kelulusan">Mematuhi Kelulusan</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="mematuhi_kelulusan">Mematuhi Kelulusan</option><option value="memenuhi_sukatan">Memenuhi Sukatan</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="mematuhi_kelulusan">Mematuhi Kelulusan</option><option value="memenuhi_sukatan">Memenuhi Sukatan</option><option value="memenuhi_jumlah_jam">Memenuhi Jumlah Jam</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="mematuhi_kelulusan">Mematuhi Kelulusan</option><option value="memenuhi_sukatan">Memenuhi Sukatan</option><option value="memenuhi_jumlah_jam">Memenuhi Jumlah Jam</option><option value="mematuhi_jadual_waktu">Mematuhi Jadual Waktu</option></select></td>',
    ],
    'bahan_bantu_mengajar' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="digunakan">Digunakan</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="digunakan">Digunakan</option><option value="rekod_penggunaan">Rekod Penggunaan</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="digunakan">Digunakan</option><option value="rekod_penggunaan">Rekod Penggunaan</option><option value="penyimpanan_pemulihan">Penyimpanan & Pemulihan</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="digunakan">Digunakan</option><option value="rekod_penggunaan">Rekod Penggunaan</option><option value="penyimpanan_pemulihan">Penyimpanan & Pemulihan</option><option value="peruntukan">Peruntukan</option></select></td>',
    ],
    'rekod_pencerapan' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="jadual_pencerapan">Jadual Pencerapan</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="jadual_pencerapan">Jadual Pencerapan</option><option value="fail_pencerapan">Fail Pencerapan</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="jadual_pencerapan">Jadual Pencerapan</option><option value="fail_pencerapan">Fail Pencerapan</option><option value="rekod_lampiran">Rekod & Lampiran</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="jadual_pencerapan">Jadual Pencerapan</option><option value="fail_pencerapan">Fail Pencerapan</option><option value="rekod_lampiran">Rekod & Lampiran</option><option value="kebolehcapaian">Kebolehcapaian</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="jadual_pencerapan">Jadual Pencerapan</option><option value="fail_pencerapan">Fail Pencerapan</option><option value="rekod_lampiran">Rekod & Lampiran</option><option value="kebolehcapaian">Kebolehcapaian</option><option value="tindakan_susulan">Tindakan Susulan</option></select></td>',
    ],
];

@endphp


<style>
    #NilaiItem3 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem3 tbody {
        vertical-align: middle;
    }

    #NilaiItem3 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem3">
        <thead>
            <tr>
                <th rowspan="2" width="5%">No.</th>
                <th rowspan="2" width="20%"> Kriteria </th>
                <th width="12">0</th>
                <th width="12">1</th>
                <th width="12">2</th>
                <th width="12">3</th>
                <th width="12">4</th>
                <th width="12">5</th>
            </tr>

            <tr>
                <th>TIADA</th>
                <th>LEMAH</th>
                <th>SEDERHANA</th>
                <th>HARAPAN</th>
                <th>BAIK</th>
                <th>CEMERLANG</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="8">Pengurusan Kurikulum</td>
            </tr>
            @foreach ($kurikulums as $index => $kurikulum)
                <tr>
                    <td colspan="2"> {{ $kurikulum }}</td>
                    @foreach ($option_kurikulums[$index] as $option_kurikulum)
                        {!! $option_kurikulum !!}
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
