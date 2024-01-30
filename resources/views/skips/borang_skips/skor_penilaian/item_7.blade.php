<?php

$displins = [
    'peraturan_disiplin' => '7.1 Peraturan Disiplin',
    'rekod_disiplin' => '7.2 Rekod Disiplin',
    'pengurusan_tindakan_disiplin' => '7.3 Pengurusan Tindakan Disiplin',
];
    
     $butiran_institusi_id = Request::segment(3);
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $disiplin = json_decode($tab1->displin);  
        $disiplin_verfikasi = $tab1->displin_verfikasi ? json_decode($tab1->displin_verfikasi) : null;   
 
    } else {
        $disiplin = $disiplin_verfikasi = null;
    }
    $score = $total = 0;    $totalv = $scorev = 0;
?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">7.0</th>
                <th> DISIPLIN </th>
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
            @foreach ($displins as $key =>  $displin)
                <tr>
                    <td>
                        {{ $displin }}
                    </td>
                    <td>
                        <?php
                        if($disiplin) {
                            if (isset($disiplin->$key)){
                                $score = $disiplin->$key;
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
                            if($disiplin_verfikasi) {
                                $keyval = '';
                                $keyval = $key.'_verfikasi';
                                $scorev = $disiplin_verfikasi->$keyval;
                                $totalv = $totalv+$scorev;
                            }
                        ?>
                        <a class="text-success">{{$scorev}}</a>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="2" style="text-align: end;" class="fw-bolder text-uppercase bg-light-primary">Total Skor</td>
                <td colspan="2" style="text-align: center;">
                    <a class="text-success">{{$total + $totalv}}</a>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: end" class="fw-bolder text-uppercase bg-light-primary">%</td>
                <td>
                    <a class="text-success">-</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
