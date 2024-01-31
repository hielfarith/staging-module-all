<?php

$kurikulums = [
    'sukatan_pelajaran' => '3.1 Sukatan Pelajaran',
    'dokumen_rekod_mengajar' => '3.2 Dokumen Rekod Mengajar',
    'mesyuarat_kurikulum' => '3.3 Mesyuarat Kurikulum',
    'mata_pelajaran_yang_diajar' => '3.4 Mata Pelajaran Yang Diajar',
    'bahan_bantu_mengajar' => '3.5 Bahan Bantu Mengajar',
    'rekod_pencerapan' => '3.6 Rekod Pencerapan',
];

 $butiran_institusi_id = Request::segment(3);
$tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $pengurusan_kurikulum = json_decode($tab1->pengurusan_kurikulum);   
        $pengurusan_kurikulum_verfikasi = $tab1->pengurusan_kurikulum_verfikasi ? json_decode($tab1->pengurusan_kurikulum_verfikasi) : null;   
    } else {
        $pengurusan_kurikulum = $pengurusan_kurikulum_verfikasi = null;
    }

$total = $score = 0;
    $totalv = $scorev = 0;

?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">3.0</th>
                <th> PENUBUHAN KURIKULUM </th>
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
            @foreach ($kurikulums as $key =>  $kurikulum)
                <tr>
                    <td>
                        {{ $kurikulum }}
                    </td>
                    <td>
                    <?php
                        if($pengurusan_kurikulum) {
                            if (isset($pengurusan_kurikulum->$key)){
                                $score = $pengurusan_kurikulum->$key;
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
                            if($pengurusan_kurikulum_verfikasi) {
                                $keyval = '';
                                $keyval = $key.'_verfikasi';
                                $scorev = $pengurusan_kurikulum_verfikasi?->$keyval;
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
             if($type == 'verfikasi') {
                 $col = 2;
             } else {
                 $col =1;
             }
            ?>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: end;" class="fw-bolder text-uppercase bg-light-primary">Total Skor</td>
                <td colspan="{{$col}}" style="text-align:center;">
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
<input type="hidden" value="{{$total}}" name="tab3_skor" id="tab3_skor">
<input type="hidden" value="{{ number_format($percentage,0) }}" name="tab3_percentage" id="tab3_percentage">