<?php

    $pendaftarans = [
        'kelulusan_penubuhan' => '1.1 Surat Kelulusan Penubuhan',
        'perakuan_pendaftaran' => '1.2 Perakuan Pendaftaran',
        'permit_pengelola' => '1.3 Permit Pengelola',
        'permit_pekerja' => '1.4 Permit Pekerja',
        'kelulusan_pengetua' => '1.5 Surat Kelulusan Pengetua ',
        'permit_guru' => '1.6 Permit Guru',
        'suratcara_pengelola' => '1.7 Suratcara Pengelola',
        'yuran_dan_bayaran_lain' => '1.8 Yuran dan Bayaran Lain',
        'surat_surat_sokongan_agensi' => '1.9 Surat-surat Sokongan Agensi',
    ];

    $butiran_institusi_id = $butiran_id;;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $penubuhan_pendaftaran = json_decode($tab1->penubuhan_pendaftaran);
        $penubuhan_pendaftaran_verfikasi = $tab1->penubuhan_pendaftaran_verfikasi ? json_decode($tab1->penubuhan_pendaftaran_verfikasi) : null;
    } else {
        $penubuhan_pendaftaran = $penubuhan_pendaftaran_verfikasi = null;
    }

    $total = $score = 0;
    $totalv = $scorev = 0;

?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">1.0.</th>
                <th> PENUBUHAN & PENDAFTARAN </th>
                <th width="10%">SKOR</th>
                 @if($type == 'verfikasi')
                    <th width="10%">SKOR VERFIKASI</th>
                @endif
            </tr>
        </thead>

        <tbody>
            <tr>
                <td rowspan="10">
                    <i>
                        Seksyen 79
                    </i>
                </td>
            </tr>
            @foreach ($pendaftarans as $key => $pendaftaran)
                <tr>
                    <td>
                        {{ $pendaftaran }}
                    </td>
                    <td>
                        <?php
                            if($penubuhan_pendaftaran) {
                                $score = $penubuhan_pendaftaran->$key;
                                $total = $total+$score;
                            }
                        ?>
                        <a class="text-success">{{$score}}</a>
                    </td>
                    @if($type == 'verfikasi')
                        <td>
                        <?php
                            if($penubuhan_pendaftaran_verfikasi) {
                                $keyval = '';
                                $keyval = $key.'_verfikasi';
                                $scorev = $penubuhan_pendaftaran_verfikasi->$keyval;
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
            $percentage = ($total/90);
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
                <td colspan="2" style="text-align: center;" class="fw-bolder text-uppercase bg-light-primary">%</td>
                <td colspan="{{$col}}" style="text-align: center;">
                    <a class="text-success">{{ number_format($percentage,0)}}</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<input type="hidden" value="{{$total}}" name="tab1_skor" id="tab1_skor">
<input type="hidden" value="{{ number_format($percentage,0) }}" name="tab1_percentage" id="tab1_percentage">