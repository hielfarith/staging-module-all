<?php

$kebersihans = [
    'persekitaran_kawasan_penyambut_tetamu' => '9.1 Persekitaran Kawasan Penyambut Tetamu',
    'bilik_darjah_bilik_khas' => '9.2 Bilik Darjah / Bilik Khas',
];

?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">9.0</th>
                <th> KEBERSIHAN & KECERIAAN </th>
                <th width="10%">SKOR</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td rowspan="24"></td>
            </tr>
            @foreach ($kebersihans as $kebersihan)
                <tr>
                    <td>
                        {{ $kebersihan }}
                    </td>
                    <td>
                        <a class="text-success">Auto Calculated</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="2" style="text-align: end;" class="fw-bolder text-uppercase bg-light-primary">Total Skor</td>
                <td>
                    <a class="text-success">Auto Calculated</a>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: end" class="fw-bolder text-uppercase bg-light-primary">%</td>
                <td>
                    <a class="text-success">Auto Calculated</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
