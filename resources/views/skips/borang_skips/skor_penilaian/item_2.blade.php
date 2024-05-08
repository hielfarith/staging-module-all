<?php

$institusis = [
    'piagam_pelanggan' => '2.1. Piagam Pelanggan',
    'visi_dan_misi' => '2.2. Visi dan Misi',
    'perancangan_strategik' => '2.3. Perancangan Strategik / Hala Tuju',
    'surat_surat_pelantikan' => '2.4 Surat Surat Perlantikan',
    'pelantikan_pengelola' => '2.4.1 Surat Pelantikan Pengelola',
    'pelantikan_pengetua_dan_kontrak_kerja' => '2.4.2 Surat Pelantikan Pengetua Dan Kontrak Kerja',
    'pelantikan_guru_dan_kontrak_kerja' => '2.4.3 Surat Pelantikan Guru Dan Kontrak Kerja',
    'pelantikan_pekerja_dan_kontrak_kerja' => '2.4.4 Surat Pelantikan Pekerja Dan Kontrak Kerja',
    'kebenaran_mengajar_guru_kerajaan' => '2.4.5 Surat Kebenaran Mengajar (Guru Kerajaan)',
    'rekod_profil' => '2.5 Rekod Profil',
    'profil_institusi' => '2.5.1 Profil Institusi',
    'profil_guru' => '2.5.2 Profil Guru',
    'profil_staf' => '2.5.3 Profil Staf',
    'profil_pelajar' => '2.5.4 Profil Pelajar',
    'pengurusan_rekod' => '2.6 Pengurusan Rekod',
    'rekod_pendaftaran_pelajar' => '2.6.1 Rekod Pendaftaran Pelajar',
    'rekod_sijil_tamat_belajar' => '2.6.2 Rekod Sijil Tamat Belajar',
    'rekod_kedatangan_pelajar' => '2.6.3 Rekod Kedatangan Pelajar',
    'rekod_kedatangan_guru' => '2.6.4 Rekod Kedatangan Guru',
    'rekod_pelawat' => '2.6.5 Rekod Pelawat',
    'takwim_tahunan' => '2.7. Takwim Tahunan Pusat Bahasa/Pusat Kemahiran',
    'perkhidmatan_pelanggan' => '2.8. Perkhidmatan Pelanggan',
    'paparan_untuk_makluman_umum' => '2.9. Paparan untuk Makluman Umum',
    'pengurusan_aduan' => '2.10 Pengurusan Aduan',
];

$butiran_institusi_id = $butiran_id;
$tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
if ($butiran_institusi_id && $tab1) {
    $pengurusan_institusi = json_decode($tab1->pengurusan_institusi);
    $pengurusan_institusi_verfikasi = $tab1->pengurusan_institusi_verfikasi ? json_decode($tab1->pengurusan_institusi_verfikasi) : null;
} else {
    $pengurusan_institusi = $pengurusan_institusi_verfikasi = null;
}
$total = $score = 0;
$totalv = $scorev = 0;

?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead style="color:black; background-color: #d8bfb0">
            <tr>
                <th width="5%">2.0.</th>
                <th> PENUBUHAN INSTITUSI </th>
                <th width="10%">SKOR</th>
                @if ($type == 'verfikasi' || $type == 'done')
                    <th width="10%">SKOR VERFIKASI</th>
                @endif
            </tr>
        </thead>

        <tbody>
            <tr>
                <td rowspan="25"></td>
            </tr>
            @foreach ($institusis as $key => $institusi)
                <tr>
                    <td>
                        {{ $institusi }}
                    </td>
                    <td>
                        <?php
                        if ($pengurusan_institusi) {
                            if (isset($pengurusan_institusi->$key)) {
                                $score = $pengurusan_institusi->$key;
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
                            if ($pengurusan_institusi_verfikasi) {
                                $keyval = '';
                                $keyval = $key . '_verfikasi';
                                if (isset($pengurusan_institusi_verfikasi->$keyval)) {
                                    $scorev = $pengurusan_institusi_verfikasi->$keyval;
                                } else {
                                    $scorev = 0;
                                }
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
        $percentage = $total / 210;
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
<input type="hidden" value="{{ $total }}" name="tab2_skor" id="tab2_skor">
<input type="hidden" value="{{ number_format($percentage, 2) }}" name="tab2_percentage" id="tab2_percentage">
