@php

$kebersihans = [
    'persekitaran_kawasan_penyambut_tetamu' => '9.1 Persekitaran Kawasan Penyambut Tetamu',
    'bilik_darjah_bilik_khas' => '9.2 Bilik Darjah / Bilik Khas',
];

$option_kebersihans = [
    'persekitaran_kawasan_penyambut_tetamu' => [
        0 => '<i></i>',
        1 => '<i>Mempunyai mana-mana satu (1) kriteria</i>',
        2 => '<i>Mempunyai mana-mana dua (2) kriteria</i>',
        3 => '<i>Mempunyai mana-mana tiga (3) kriteria</i>',
        4 => '<i>Mempunyai mana-mana empat (4) kriteria</i>',
        5 => '<i>Mempunyai mana-mana lima (5) kriteria</i>',
    ],

    'bilik_darjah_bilik_khas' => [
        0 => '<i></i>',
        1 => '<i>Mempunyai mana-mana satu (1) kriteria</i>',
        2 => '<i>Mempunyai mana-mana dua (2) kriteria</i>',
        3 => '<i>Mempunyai mana-mana tiga (3) kriteria</i>',
        4 => '<i>Mempunyai mana-mana empat (4) kriteria</i>',
        5 => '<i>Mempunyai mana-mana lima (5) kriteria</i>',
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
        text-align: center;
    }

    #NilaiItem9 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<form action="">
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
                    <td colspan="8">Kebersihan dan Keceriaan</td>
                </tr>
                @foreach ($kebersihans as $index => $kebersihan)
                    <tr>
                        <td colspan="2"> {{ $kebersihan }}</td>
                        @foreach ($option_kebersihans[$index] as $option_kebersihan)
                            <td>
                                <div class="form-check form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="{{ $kebersihan }}" id="" value="">
                                </div>
                                <br>
                                {!! $option_kebersihan !!}
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
