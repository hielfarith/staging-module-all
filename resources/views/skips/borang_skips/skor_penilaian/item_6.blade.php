<?php

$pembangunan_gurus = [
    'program_pembangunan_guru' => '6.1 Program Pembangunan Guru',
    'kelayakan_akademik_guru' => '6.2 Kelayakan Akademik Guru',
    'kelayakan_ikhtisas_guru' => '6.3 Kelayakan Ikhtisas Guru',
];
 $butiran_institusi_id = Request::segment(3);
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $pengurusan_pembangunan_guru = json_decode($tab1->pengurusan_pembangunan_guru);  
        $pengurusan_pembangunan_guru_verfikasi = $tab1->pengurusan_pembangunan_guru_verfikasi ? json_decode($tab1->pengurusan_pembangunan_guru_verfikasi) : null;   
 
    } else {
        $pengurusan_pembangunan_guru = $pengurusan_pembangunan_guru_verfikasi = null;
    }
    $score =$total =0;    $totalv = $scorev = 0;

?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">6.0</th>
                <th> PENGURUSAN & PEMBANGUNAN GURU </th>
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
            @foreach ($pembangunan_gurus as  $key =>  $pembangunan_guru)
                <tr>
                    <td>
                        {{ $pembangunan_guru }}
                    </td>
                    <td>
                    <?php
                        if($pengurusan_pembangunan_guru) {
                            if (isset($pengurusan_pembangunan_guru->$key)){
                                $score = $pengurusan_pembangunan_guru->$key;
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
                            if($pengurusan_pembangunan_guru_verfikasi) {
                                $keyval = '';
                                $keyval = $key.'_verfikasi';
                                $scorev = $pengurusan_pembangunan_guru_verfikasi->$keyval;
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
                    <a class="text-success">{{ number_format($percentage,0) }}</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
