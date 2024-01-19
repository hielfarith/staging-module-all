@php

$pdps = [
    'pengajaran_dan_pembelajaran' => '4.1 Pengajaran Dan Pembelajaran',
    'kaedah_metodologi_pengajaran' => '4.2 Kaedah / Metodologi Pengajaran',
    'latihan' => '4.3 Latihan',
    'penggunaan_bahan_bantu_mengajar' => '4.4 Penggunaan Bahan Bantu Mengajar',
];

$option_pdps = [
    'pengajaran_dan_pembelajaran' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="kelas_bersedia">Kelas Bersedia</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="kelas_bersedia">Kelas Bersedia</option><option value="guru_bersedia">Guru Bersedia</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="kelas_bersedia">Kelas Bersedia</option><option value="guru_bersedia">Guru Bersedia</option><option value="pelajar_bersedia">Pelajar Bersedia</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="kelas_bersedia">Kelas Bersedia</option><option value="guru_bersedia">Guru Bersedia</option><option value="pelajar_bersedia">Pelajar Bersedia</option><option value="P&P_berlaku">P&P Berlaku</option></select></td>',
    ],

    'kaedah_metodologi_pengajaran' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option><option value="masa_mencukupi">Masa Mencukupi</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option><option value="masa_mencukupi">Masa Mencukupi</option><option value="melibatkan_semua_pelajar">Melibatkan Semua Pelajar</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option><option value="masa_mencukupi">Masa Mencukupi</option><option value="melibatkan_semua_pelajar">Melibatkan Semua Pelajar</option><option value="berkesan">Berkesan</option></select></td>',
    ],

    'latihan' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option><option value="mencukupi">Mencukupi</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option><option value="mencukupi">Mencukupi</option><option value="disemak">Disemak</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option><option value="mencukupi">Mencukupi</option><option value="disemak">Disemak</option><option value="terdapat_pembetulan">Terdapat Pembetulan</option></select></td>',
    ],

    'penggunaan_bahan_bantu_mengajar' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option><option value="masa_mencukupi">Masa Mencukupi</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option><option value="masa_mencukupi">Masa Mencukupi</option><option value="melibatkan_semua_pelajar">Melibatkan Semua Pelajar</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="sesuai">Sesuai</option><option value="masa_mencukupi">Masa Mencukupi</option><option value="melibatkan_semua_pelajar">Melibatkan Semua Pelajar</option><option value="berkesan">Berkesan</option></select></td>',
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
    }

    #NilaiItem4 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

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
                <td colspan="8">Pengurusan Pengajaran & Pembelajaran</td>
            </tr>
            @foreach ($pdps as $index => $pdp)
                <tr>
                    <td colspan="2"> {{ $pdp }}</td>
                    @foreach ($option_pdps[$index] as $option_pdp)
                        {!! $option_pdp !!}
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
