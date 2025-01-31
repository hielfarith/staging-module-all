<?php

$kebersihans = [
    'persekitaran_kawasan_penyambut_tetamu' => '9.1 Persekitaran Kawasan Penyambut Tetamu',
    'bilik_darjah_bilik_khas' => '9.2 Bilik Darjah / Bilik Khas',
];

$butiran_institusi_id = $butiran_id;
$tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
if ($butiran_institusi_id && $tab1) {
    $kebersihanData = json_decode($tab1->kebersihan);
    $kebersihanData_verfikasi = $tab1->kebersihan_verfikasi ? json_decode($tab1->kebersihan_verfikasi) : null;
} else {
    $kebersihanData = $kebersihanData_verfikasi = null;
}
$score = $total = 0;
$totalv = $scorev = 0;
?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead style="color:black; background-color: #d8bfb0">
            <tr>
                <th width="5%">9.0</th>
                <th> KEBERSIHAN & KECERIAAN </th>
                <th width="10%">SKOR</th>
                @if ($type == 'verfikasi' || $type == 'done')
                    <th width="10%">SKOR VERFIKASI</th>
                @endif
            </tr>
        </thead>

        <tbody>
            <tr>
                <td rowspan="24"></td>
            </tr>
            @foreach ($kebersihans as $key => $kebersihan)
                <tr>
                    <td>
                        {{ $kebersihan }}
                    </td>
                    <td>
                        <?php
                        if ($kebersihanData) {
                            if (isset($kebersihanData->$key)) {
                                $score = $kebersihanData->$key;
                            } else {
                                $score = 0;
                            }
                            $total = $total + $score;
                        }
                        ?>

                        <a class="text-success">{{ $score }}</a>
                    </td>
                    @if ($type == 'verfikasi' || $type == 'done')
                        <td>
                            <?php
                            if ($kebersihanData_verfikasi) {
                                $keyval = '';
                                $keyval = $key . '_verfikasi';
                                $scorev = $kebersihanData_verfikasi->$keyval;
                                $totalv = $totalv + $scorev;
                            }
                            ?>
                            <a class="text-success">{{ $scorev }}</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
        <?php
        $total = $total + $totalv;
        $percentage = $total / 20;
        $percentage = $percentage * 100;
        if ($type == 'verfikasi' || $type == 'done') {
            $col = 2;
        } else {
            $col = 1;
        }
        ?>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: end;" class="fw-bolder text-uppercase bg-light-primary">Total Skor
                </td>
                <td colspan="{{ $col }}" style="text-align: center;">
                    <a class="text-success">{{ $total }}</a>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: end" class="fw-bolder text-uppercase bg-light-primary">%</td>
                <td colspan="{{ $col }}" style="text-align: center;">
                    <a class="text-success">{{ number_format($percentage, 2) }}</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<input type="hidden" value="{{ $total }}" name="tab9_skor" id="tab9_skor">
<input type="hidden" value="{{ number_format($percentage, 2) }}" name="tab9_percentage" id="tab9_percentage">
