<?php

$displins = [
    'peraturan_disiplin' => '7.1 Peraturan Disiplin',
    'rekod_disiplin' => '7.2 Rekod Disiplin',
    'pengurusan_tindakan_disiplin' => '7.3 Pengurusan Tindakan Disiplin',
];
    
     $butiran_institusi_id = $butiran_id;;
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
                 @if($type == 'verfikasi' || $type == 'done')
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
                     @if($type == 'verfikasi' || $type == 'done')
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
<?php
            $total = $total + $totalv;
            $percentage = ($total/30);
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
<input type="hidden" value="{{$total}}" name="tab7_skor" id="tab7_skor">
<input type="hidden" value="{{ number_format($percentage,2) }}" name="tab7_percentage" id="tab7_percentage">