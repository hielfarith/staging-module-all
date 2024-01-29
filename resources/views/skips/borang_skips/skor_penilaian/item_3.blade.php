<?php

$kurikulums = [
    'sukatan_pelajaran' => '3.1 Sukatan Pelajaran',
    'dokumen_rekod_mengajar' => '3.2 Dokumen Rekod Mengajar',
    'mesyuarat_kurikulum' => '3.3 Mesyuarat Kurikulum',
    'mata_pelajaran_yang diajar' => '3.4 Mata Pelajaran Yang Diajar',
    'bahan_bantu_mengajar' => '3.5 Bahan Bantu Mengajar',
    'rekod_pencerapan' => '3.6 Rekod Pencerapan',
];

 $butiran_institusi_id = Request::segment(3);
$tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $pengurusan_kurikulum = json_decode($tab1->pengurusan_kurikulum);   
    } else {
        $pengurusan_kurikulum = null;
    }

$total = $score = 0;


?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">3.0</th>
                <th> PENUBUHAN KURIKULUM </th>
                <th width="10%">SKOR</th>
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
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="2" style="text-align: end;" class="fw-bolder text-uppercase bg-light-primary">Total Skor</td>
                <td>
                    <a class="text-success">{{$total}}</a>
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
