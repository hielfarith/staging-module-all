@php

$pembangunan_gurus = [
    'program_pembangunan_guru' => '6.1 Program Pembangunan Guru',
    'kelayakan_akademik_guru' => '6.2 Kelayakan Akademik Guru',
    'kelayakan_ikhtisas_guru' => '6.3 Kelayakan Ikhtisas Guru',
];

$option_pembangunan_gurus = [
    'program_pembangunan_guru' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada_perancangan">Ada Perancangan</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada_perancangan">Ada Perancangan</option><option value="program_secara_dalaman">Program Secara Dalaman</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada_perancangan">Ada Perancangan</option><option value="program_secara_dalaman">Program Secara Dalaman</option><option value="program_dgn_pihak_luar">Program dengan Pihak Luar</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada_perancangan">Ada Perancangan</option><option value="program_secara_dalaman">Program Secara Dalaman</option><option value="program_dgn_pihak_luar">Program dengan Pihak Luar</option><option value="lebih_50_penyertaan_guru">Lebih 50% Penyertaan Guru</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada_perancangan">Ada Perancangan</option><option value="program_secara_dalaman">Program Secara Dalaman</option><option value="program_dgn_pihak_luar">Program dengan Pihak Luar</option><option value="lebih_50_penyertaan_guru">Lebih 50% Penyertaan Guru</option><option value="kajian_keperluan_latihan">Kajian Keperluan Latihan</option></select></td>',
    ],
    'kelayakan_akademik_guru' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="20_percent">Sekurang-kurangnya 20%</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="40_percent">Sekurang-kurangnya 40%</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="60_percent">Sekurang-kurangnya 60%</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="80_percent">Sekurang-kurangnya 80%</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="100_percent">100% Guru Mempunyai Kelayakan Ijazah dan Ke Atas</option></select></td>',
    ],

    'kelayakan_ikhtisas_guru' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="20_percent">Sekurang-kurangnya 20%</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="40_percent">Sekurang-kurangnya 40%</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="60_percent">Sekurang-kurangnya 60%</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="80_percent">Sekurang-kurangnya 80%</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="100_percent">100% Guru Mempunyai Kelayakan Ikhtisas</option></select></td>',
    ],
];

@endphp


<style>
    #NilaiItem6 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem6 tbody {
        vertical-align: middle;
    }

    #NilaiItem6 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem6">
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
            @foreach ($pembangunan_gurus as $index => $pembangunan_guru)
                <tr>
                    <td colspan="2"> {{ $pembangunan_guru }}</td>
                    @foreach ($option_pembangunan_gurus[$index] as $option_pembangunan_guru)
                        {!! $option_pembangunan_guru !!}
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
