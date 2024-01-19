@php

$kebersihans = [
    'persekitaran_kawasan_penyambut_tetamu' => '9.1 Persekitaran Kawasan Penyambut Tetamu',
    'bilik_darjah_bilik_khas' => '9.2 Bilik Darjah / Bilik Khas',
];

$option_kebersihans = [
    'persekitaran_kawasan_penyambut_tetamu' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="satu_daripada_tiga">Mempunyai mana-mana satu (1) kriteria</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="dua_daripada_empat">Mempunyai mana-mana dua (2) kriteria</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="tiga_daripada_lima">Mempunyai mana-mana tiga (3) kriteria</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="empat_daripada_enam">Mempunyai mana-mana empat (4) kriteria</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="lima_daripada_tujuh">Mempunyai mana-mana lima (5) kriteria</option></select></td>',
    ],

    'bilik_darjah_bilik_khas' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="satu_daripada_tiga">Mempunyai mana-mana satu (1) kriteria</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="dua_daripada_empat">Mempunyai mana-mana dua (2) kriteria</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="tiga_daripada_lima">Mempunyai mana-mana tiga (3) kriteria</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="empat_daripada_enam">Mempunyai mana-mana empat (4) kriteria</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="lima_daripada_tujuh">Mempunyai mana-mana lima (5) kriteria</option></select></td>',
    ],
];

@endphp


<style>
    #NilaiItem9 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem9 tbody {
        vertical-align: middle;
    }

    #NilaiItem9 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem9">
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
            @foreach ($kebersihans as $index => $kebersihan)
                <tr>
                    <td colspan="2"> {{ $kebersihan }}</td>
                    @foreach ($option_kebersihans[$index] as $option_kebersihan)
                        {!! $option_kebersihan !!}
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
