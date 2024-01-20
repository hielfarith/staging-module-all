@php

$pdps = [
    'pengajaran_dan_pembelajaran' => '4.1 Pengajaran Dan Pembelajaran',
    'kaedah_metodologi_pengajaran' => '4.2 Kaedah / Metodologi Pengajaran',
    'latihan' => '4.3 Latihan',
    'penggunaan_bahan_bantu_mengajar' => '4.4 Penggunaan Bahan Bantu Mengajar',
];

$option_pdps = [
    'pengajaran_dan_pembelajaran' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Kelas Bersedia</i>',
        3 => '<i>Ada, Kelas Bersedia, Guru Bersedia</i>',
        4 => '<i>Ada, Kelas Bersedia, Guru Bersedia, Pelajar Bersedia</i>',
        5 => '<i>Ada, Kelas Bersedia, Guru Bersedia, Pelajar Bersedia, P&P Berlaku</i>',
    ],

    'kaedah_metodologi_pengajaran' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Sesuai</i>',
        3 => '<i>Ada, Sesuai, Masa Mencukupi</i>',
        4 => '<i>Ada, Sesuai, Masa Mencukupi, Melibatkan Semua Pelajar</i>',
        5 => '<i>Ada, Sesuai, Masa Mencukupi, Melibatkan Semua Pelajar, Berkesan</i>',
    ],

    'latihan' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Sesuai</i>',
        3 => '<i>Ada, Sesuai, Mencukupi</i>',
        4 => '<i>Ada, Sesuai, Mencukupi, Disemak</i>',
        5 => '<i>Ada, Sesuai, Mencukupi, Disemak, Terdapat Pembetulan</i>',
    ],

    'penggunaan_bahan_bantu_mengajar' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Sesuai</i>',
        3 => '<i>Ada, Sesuai, Masa Mencukupi</i>',
        4 => '<i>Ada, Sesuai, Masa Mencukupi, Melibatkan Semua Pelajar</i>',
        5 => '<i>Ada, Sesuai, Masa Mencukupi, Melibatkan Semua Pelajar, Berkesan</i>',
    ],

];

@endphp


<style>
    #NilaiItem4 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem4 tbody {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem4 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<form action="">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem4">
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
                    <td colspan="8">Pengajaran & Pembelajaran</td>
                </tr>
                @foreach ($pdps as $index => $pdp)
                    <tr>
                        <td colspan="2"> {{ $pdp }}</td>
                        @foreach ($option_pdps[$index] as $option_pdp)
                        <td>
                            <div class="form-check form-check-inline mb-1">
                                <input class="form-check-input" type="radio" name="{{ $pdp }}" id="" value="">
                            </div>
                            <br>

                            {!! $option_pdp !!}
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
