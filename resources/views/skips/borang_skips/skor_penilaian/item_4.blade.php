<?php

$pdps = [
    'pengajaran_dan_pembelajaran' => '4.1 Pengajaran Dan Pembelajaran',
    'kaedah_metodologi_pengajaran' => '4.2 Kaedah / Metodologi Pengajaran',
    'latihan' => '4.3 Latihan',
    'penggunaan_bahan_bantu_mengajar' => '4.4 Penggunaan Bahan Bantu Mengajar',
];

    $butiran_institusi_id = $butiran_id;;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $pengajaran = json_decode($tab1->pengajaran);  
        $pengajaran_verfikasi = $tab1->pengajaran_verfikasi ? json_decode($tab1->pengajaran_verfikasi) : null;   

    } else {
        $pengajaran = $pengajaran_verfikasi =  null;
    }
$total = $score = 0;    $totalv = $scorev = 0;
?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">4.0</th>
                <th> PENGAJARAN DAN PEMBELAJARAN </th>
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
            @foreach ($pdps as $key =>  $pdp)
                <tr>
                    <td>
                        {{ $pdp }}
                    </td>
                    <td>
                    <?php
                        if($pengajaran) {
                            if (isset($pengajaran->$key)){
                                $score = $pengajaran->$key;
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
                            if($pengajaran_verfikasi) {
                                $keyval = '';
                                $keyval = $key.'_verfikasi';
                                $scorev = $pengajaran_verfikasi->$keyval;
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
            $percentage = ($total/20);
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
                    <a class="text-success"> {{number_format($percentage,0)}}</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<input type="hidden" value="{{$total}}" name="tab4_skor" id="tab4_skor">
<input type="hidden" value="{{ number_format($percentage,0) }}" name="tab4_percentage" id="tab4_percentage">