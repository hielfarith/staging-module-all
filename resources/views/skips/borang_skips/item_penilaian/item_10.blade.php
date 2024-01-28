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

$option_antarabangsas = [
    'persekitaran_kawasan_penyambut_tetamu' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="satu_daripada_tiga">Mempunyai mana-mana satu (1) kriteria</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="dua_daripada_empat">Mempunyai mana-mana dua (2) kriteria</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="tiga_daripada_lima">Mempunyai mana-mana tiga (3) kriteria</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="empat_daripada_enam">Mempunyai mana-mana empat (4) kriteria</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="lima_daripada_tujuh">Mempunyai mana-mana lima (5) kriteria</option></select></td>',
    ],

    'bilik_darjah_bilik_khas' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="satu_daripada_tiga">Mempunyai mana-mana satu (1) kriteria</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="dua_daripada_empat">Mempunyai mana-mana dua (2) kriteria</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="tiga_daripada_lima">Mempunyai mana-mana tiga (3) kriteria</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="empat_daripada_enam">Mempunyai mana-mana empat (4) kriteria</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="lima_daripada_tujuh">Mempunyai mana-mana lima (5) kriteria</option></select></td>',
    ],
];

@endphp


<style>
    #NilaiItem10 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem10 tbody {
        vertical-align: middle;
    }

    #NilaiItem10 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem10">
        <thead>
            <tr>
                <th rowspan="2" width="5%">No.</th>
                <th rowspan="2" width="20%"> Kriteria </th>
                <th width="12">0</th>
                <th width="12">1</th>
                <th width="12">2</th>
                <th width="12">3</th>
                <th width="12">4</th>
                <th width="12">5</th>
            </tr>

            <tr>
                <th>TIADA</th>
                <th>LEMAH</th>
                <th>SEDERHANA</th>
                <th>HARAPAN</th>
                <th>BAIK</th>
                <th>CEMERLANG</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="8">Pengurusan Pengajaran & Pembelajaran</td>
            </tr>
             @foreach ($pelajar_antarabangsas as $index => $antarabangsa)
                <tr>
                    <td colspan="2"> {{ $antarabangsa }}</td>
                    @if(isset($option_antarabangsas[$index]))
                        @foreach ($option_antarabangsas[$index] as $key => $option_antarabangsa)
                            <td>
                                <div class="form-check form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="{{ $index }}" id="" value="{{$key}}">
                                </div>
                                <br>
                                {!! $option_antarabangsa !!}
                            </td>
                        @endforeach
                    @endif
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>
