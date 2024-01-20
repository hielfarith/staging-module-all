<?php

$piawaians = [
    'pelan_lantai_premis' => '8.1 Pelan Lantai Premis',
    'kemudahan_dan_kelengkapan_bilik_darjah' => '8.2 Kemudahan dan Kelengkapan Bilik Darjah',
    'kemudahan_dan_keperluan_pelbagai' => '8.3 Kemudahan dan Keperluan Pelbagai',
    'papan_notis' => '8.4 Papan Notis',
    'pengurusan_keselamatan' => '8.5 Pengurusan Keselamatan',
    'penyelenggaraan_tandas' => '8.6 Penyelenggaraan Tandas',
];

?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">8.0</th>
                <th> PIAWAIAN </th>
                <th width="10%">SKOR</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td rowspan="24"></td>
            </tr>
            @foreach ($piawaians as $piawaian)
                <tr>
                    <td>
                        {{ $piawaian }}
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
