@php

$pelajar_antarabangsas = [
    'kawalan_dasar' => '10.1 Kawalan Dasar',
    'dokumentasi' => '10.1.1 Dokumentasi',
    'tidak_melebihi_kapasiti_max_lampiran_b' => '10.1.2 Tidak Melebihi Kapasiti Max Seperti Di Dalam Lampiran B',
    'tidak_melebihi_80_percent_kapasiti_max' => '10.1.3 Tidak Melebihi 80% Kapasiti Max',
    'mematuhi_kuota_pelajar_20_percent' => '10.1.4 Mematuhi Kuota Pelajar 20%',
    'tempoh_pengajaran_min_20_jam_seminggu' => '10.1.5 Tempoh Pengajaran Min 20 Jam Seminggu',
    'dokumen_pelajar_antarabangsa' => '10.2 Dokumen Pelajar Antrarabangsa',
    'surat_tawaran_oleh_pusat_bahasa_kemahiran' => '10.2.1 Surat Tawaran Oleh Pusat Bahasa/Kemahiran',
    'buku_peraturan_refund_policy' => '10.2.3 Buku Peraturan/Refund Policy',
    'surat_kelulusan_jabatan_imigresen' => '10.2.4 Surat Kelulusan Jabatan Imigresen',
    'salinan_visa_pelajar' => '10.2.5 Salinan Visa Pelajar',
    'surat_sokongan_emgs' => '10.2.6 Surat Sokongan EMGS',
    'salinan_pasport' => '10.2.7 Salinan Pasport',
    'pegawai_hep_antarabangsa' => '10.3 Pegawai HEP Antarabangsa',
    'pengurusan_disiplin_pelajar_antarabangsa' => '10.4 Pengurusan Disiplin Pelajar Antarabangsa',
    'kelulusan_kementerian_dalam_negeri' => '10.5 Kelulusan Kementerian Dalam Negeri',
];

@endphp

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">8.0</th>
                <th> PIAWAIAN </th>
                <th width="10%">SKOR</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td rowspan="24"></td>
            </tr>
            @foreach ($pelajar_antarabangsas as $key => $pelajar_antarabangsa)
                <tr>
                    <td>
                        {{ $pelajar_antarabangsa }}
                    </td>
                    <td>
                        <a class="text-success">0</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="2" style="text-align: end;" class="fw-bolder text-uppercase bg-light-primary">Total Skor</td>
                <td>
                    <a class="text-success">0</a>
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
