<?php

$peperiksaans = [
    'pelaksanaan_penilaian_peperiksaan' => '5.1 Pelaksanaan Penilaian / Peperiksaan',
    'rekod_penilaian_peperiksaan' => '5.2 Rekod Penilaian / Peperiksaan',
    'akreditasi_sijil_oleh_badan_antarabangsa' => '5.3 Akreditasi Sijil oleh Badan Antarabangsa',
];

    $butiran_institusi_id = $butiran_id;;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $pengurusan_penilaian = json_decode($tab1->pengurusan_penilaian);
        $pengurusan_penilaian_verfikasi = $tab1->pengurusan_penilaian_verfikasi ? json_decode($tab1->pengurusan_penilaian_verfikasi) : null;   

    } else {
        $pengurusan_penilaian = $pengurusan_penilaian_verfikasi = null;
    }
    $total = $score = 0;    $totalv = $scorev = 0;
?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">5.0</th>
                <th> PENGURUSAN PENILAIAN/PEPERIKSAAN </th>
                <th width="10%">SKOR</th>
                 @if($type == 'verfikasi')
                    <th width="10%">SKOR VERFIKASI</th>
                @endif
            </tr>
        </thead>

        <tbody>
            <tr>
                <td rowspan="24"></td>
            </tr>
            @foreach ($peperiksaans as $key =>  $peperiksaan)
                <tr>
                    <td>
                        {{ $peperiksaan }}
                    </td>
                    <td>
                    <?php
                        if($pengurusan_penilaian) {
                            if (isset($pengurusan_penilaian->$key)){
                                $score = $pengurusan_penilaian->$key;
                            } else {
                                $score = 0;
                            }
                            $total = $total+$score;
                        }
                    ?>

                        <a class="text-success">{{$score}}</a>
                    </td>
                    @if($type == 'verfikasi')
                        <td>
                        <?php
                            if($pengurusan_penilaian_verfikasi) {
                                $keyval = '';
                                $keyval = $key.'_verfikasi';
                                $scorev = $pengurusan_penilaian_verfikasi->$keyval;
                                $totalv = $totalv+$scorev;
                            }
                        ?>
                        <a class="text-success">{{$scorev}}</a>
                    </td>
                    @endif
                </tr>
            @endforeach
        <?php
            $total = $total + $totalv;
            $percentage = ($total/15);
            $percentage = $percentage*100;
             if($type == 'verfikasi') {
                 $col = 2;
             } else {
                 $col =1;
             }
            ?>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: end;" class="fw-bolder text-uppercase bg-light-primary">Total Skor</td>
                <td colspan="{{$col}}" style="text-align: center;">
                    <a class="text-success">{{$total}}</a>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: end" class="fw-bolder text-uppercase bg-light-primary">%</td>
                <td colspan="{{$col}}" style="text-align: center;">
                    <a class="text-success">{{number_format($percentage,0)}}</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<input type="hidden" value="{{$total}}" name="tab5_skor" id="tab5_skor">
<input type="hidden" value="{{ number_format($percentage,0) }}" name="tab5_percentage" id="tab5_percentage">