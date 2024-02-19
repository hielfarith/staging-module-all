<?php

$piawaians = [
    'pelan_lantai_premis' => '8.1 Pelan Lantai Premis',
    'kemudahan_dan_kelengkapan_bilik_darjah' => '8.2 Kemudahan dan Kelengkapan Bilik Darjah',
    'kemudahan_dan_keperluan_pelbagai' => '8.3 Kemudahan dan Keperluan Pelbagai',
    'papan_notis' => '8.4 Papan Notis',
    'pengurusan_keselamatan' => '8.5 Pengurusan Keselamatan',
    'penyelenggaraan_tandas' => '8.6 Penyelenggaraan Tandas',
];

$butiran_institusi_id = $butiran_id;;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $piawaianData = json_decode($tab1->piawaian); 
        $piawaianData_verfikasi = $tab1->piawaian_verfikasi ? json_decode($tab1->piawaian_verfikasi) : null;   
  
    } else {
        $piawaianData =$piawaianData =  null;
    }
    $score = $total = 0;    $totalv = $scorev = 0;
?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">8.0</th>
                <th> PIAWAIAN </th>
                <th width="10%">SKOR</th>
                @if($type == 'verfikasi' || $type == 'done')
                    <th width="10%">SKOR VERFIKASI</th>
                @endif
            </tr>
        </thead>

        <tbody>
            <tr>
                <td rowspan="24"></td>
            </tr>
            @foreach ($piawaians as $key => $piawaian)
                <tr>
                    <td>
                        {{ $piawaian }}
                    </td>
                    <td>
                    <?php
                        if($piawaianData) {
                            if (isset($piawaianData->$key)){
                                $score = $piawaianData->$key;
                            } else {
                                $score = 0;
                            }
                            $total = $total+$score;
                        }
                    ?>

                        <a class="text-success">{{$score}}</a>
                    </td>
                     @if($type == 'verfikasi' || $type == 'done')
                        <td>
                        <?php
                            if($piawaianData_verfikasi) {
                                $keyval = '';
                                $keyval = $key.'_verfikasi';
                                $scorev = $piawaianData_verfikasi->$keyval;
                                $totalv = $totalv+$scorev;
                            }
                        ?>
                        <a class="text-success">{{$scorev}}</a>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
            <?php
            $total = $total + $totalv;
            $percentage = ($total/60);
            $percentage = $percentage*100;
             if($type == 'verfikasi' || $type == 'done') {
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
                    <a class="text-success">{{ number_format($percentage,2) }}</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<input type="hidden" value="{{$total}}" name="tab8_skor" id="tab8_skor">
<input type="hidden" value="{{ number_format($percentage,2) }}" name="tab8_percentage" id="tab8_percentage">