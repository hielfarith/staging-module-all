@php

$peperiksaans = [
    'pelaksanaan_penilaian_peperiksaan' => '5.1 Pelaksanaan Penilaian / Peperiksaan',
    'rekod_penilaian_peperiksaan' => '5.2 Rekod Penilaian / Peperiksaan',
    'akreditasi_sijil_oleh_badan_antarabangsa' => '5.3 Akreditasi Sijil oleh Badan Antarabangsa',
];

$option_peperiksaans = [
    'pelaksanaan_penilaian_peperiksaan' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="urus_setia">Urus Setia</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="urus_setia">Urus Setia</option><option value="jadual">Jadual</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="urus_setia">Urus Setia</option><option value="jadual">Jadual</option><option value="peraturan_peperiksaan">Peraturan Peperiksaan</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="urus_setia">Urus Setia</option><option value="jadual">Jadual</option><option value="peraturan_peperiksaan">Peraturan Peperiksaan</option><option value="dokumentasi">Dokumentasi</option></select></td>',
    ],

    'rekod_penilaian_peperiksaan' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="difailkan">Difailkan</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="difailkan">Difailkan</option><option value="kemaskini">Kemaskini</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="difailkan">Difailkan</option><option value="kemaskini">Kemaskini</option><option value="dimaklumkan">Dimaklumkan</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="difailkan">Difailkan</option><option value="kemaskini">Kemaskini</option><option value="dimaklumkan">Dimaklumkan</option><option value="dipamerkan">Dipamerkan</option></select></td>',
    ],

    'akreditasi_sijil_oleh_badan_antarabangsa' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="surat_perjanjian">Surat Perjanjian</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="surat_perjanjian">Surat Perjanjian</option><option value="surat_kebenaran">Surat Kebenaran</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="surat_perjanjian">Surat Perjanjian</option><option value="surat_kebenaran">Surat Kebenaran</option><option value="terkini">Terkini</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada">Ada</option><option value="surat_perjanjian">Surat Perjanjian</option><option value="surat_kebenaran">Surat Kebenaran</option><option value="terkini">Terkini</option><option value="difailkan">Difailkan</option></select></td>',
    ],
];

@endphp


<style>
    #NilaiItem5 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem5 tbody {
        vertical-align: middle;
    }

    #NilaiItem5 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem5">
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
            @foreach ($peperiksaans as $index => $peperiksaan)
                <tr>
                    <td colspan="2"> {{ $peperiksaan }}</td>
                    @foreach ($option_peperiksaans[$index] as $option_peperiksaan)
                        {!! $option_peperiksaan !!}
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
