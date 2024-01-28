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

    $butiran_institusi_id = Request::segment(2);
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $pengurusan_institusi = json_decode($tab1->pengurusan_institusi);   
    } else {
        $pengurusan_institusi = null;
    }
    $total = $score = 0;

?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">2.0.</th>
                <th> PENUBUHAN INSTITUSI </th>
                <th width="10%">SKOR</th>
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
                        if($pengurusan_institusi) {
                            if (isset($pengurusan_institusi->$key)){
                                $score = $pengurusan_institusi->$key;
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
