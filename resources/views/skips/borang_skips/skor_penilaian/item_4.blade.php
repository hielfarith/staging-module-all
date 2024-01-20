<?php

$pdps = [
    'pengajaran_dan_pembelajaran' => '4.1 Pengajaran Dan Pembelajaran',
    'kaedah_metodologi_pengajaran' => '4.2 Kaedah / Metodologi Pengajaran',
    'latihan' => '4.3 Latihan',
    'penggunaan_bahan_bantu_mengajar' => '4.4 Penggunaan Bahan Bantu Mengajar',
];

?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">4.0</th>
                <th> PENGAJARAN DAN PEMBELAJARAN </th>
                <th width="10%">SKOR</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td rowspan="24"></td>
            </tr>
            @foreach ($pdps as $pdp)
                <tr>
                    <td>
                        {{ $pdp }}
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
