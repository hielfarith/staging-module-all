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
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Setiap Program/Kursus</i>',
        3 => '<i>Ada, Setiap Program/Kursus, Difailkan</i>',
        4 => '<i>Ada, Setiap Program/Kursus, Difailkan, Disebar kepada Guru</i>',
        5 => '<i>Ada, Setiap Program/Kursus, Difailkan, Disebar kepada Guru, Mudah Dirujuk</i>',
    ],

    'dokumen_rekod_mengajar' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Direkodkan Setiap Sesi PDP</i>',
        3 => '<i>Ada, Direkodkan Setiap Sesi PDP, Kebolehcapaian</i>',
        4 => '<i>Ada, Direkodkan Setiap Sesi PDP, Kebolehcapaian, Ikut Sukatan Pelajaran</i>',
        5 => '<i>Ada, Direkodkan Setiap Sesi PDP, Kebolehcapaian, Ikut Sukatan Pelajaran, Disemak dan Diselia</i>',
    ],

    'mesyuarat_kurikulum' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Mesyuarat Diminitkan</i>',
        3 => '<i>Ada, Mesyuarat Diminitkan, Ada Fail Minit</i>',
        4 => '<i>Ada, Mesyuarat Diminitkan, Ada Fail Minit, Minit Dilebarkan</i>',
        5 => '<i>Ada, Mesyuarat Diminitkan, Ada Fail Minit, Minit Dilebarkan, Tindakan Susulan</i>',
    ],

    'mata_pelajaran_yang_diajar' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Mematuhi Kelulusan</i>',
        3 => '<i>Ada, Mematuhi Kelulusan, Memenuhi Sukatan</i>',
        4 => '<i>Ada, Mematuhi Kelulusan, Memenuhi Sukatan, Memenuhi Jumlah Jam</i>',
        5 => '<i>Ada, Mematuhi Kelulusan, Memenuhi Sukatan, Memenuhi Jumlah Jam, Mematuhi Jadual Waktu</i>',
    ],

    'bahan_bantu_mengajar' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Digunakan</i>',
        3 => '<i>Ada, Digunakan, Rekod Penggunaan</i>',
        4 => '<i>Ada, Digunakan, Rekod Penggunaan, Penyimpanan & Pemulihan</i>',
        5 => '<i>Ada, Digunakan, Rekod Penggunaan, Penyimpanan & Pemulihan, Peruntukan</i>',
    ],

    'rekod_pencerapan' => [
        0 => '',
        1 => '<i>Jadual Pencerapan</i>',
        2 => '<i>Jadual Pencerapan, Fail Pencerapan</i>',
        3 => '<i>Jadual Pencerapan, Fail Pencerapan, Rekod & Lampiran</i>',
        4 => '<i>Jadual Pencerapan, Fail Pencerapan, Rekod & Lampiran, Kebolehcapaian</i>',
        5 => '<i>Jadual Pencerapan, Fail Pencerapan, Rekod & Lampiran, Kebolehcapaian, Tindakan Susulan</i>',
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
        text-align: center;
    }

    #NilaiItem3 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<form action="">
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
                            <td>
                                <div class="form-check form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="{{ $kurikulum }}" id="" value="">
                                </div>
                                <br>

                                {!! $option_kurikulum !!}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="submit" class="btn btn-primary float-right">Simpan</button>
    </div>
</form>
