 <?php
 
 $butiran_institusi_id = $butiran_id;
 $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
 if ($butiran_institusi_id && $tab1) {
     $pengurusan_pelajar_antarabangsa = json_decode($tab1->pengurusan_pelajar_antarabangsa);
     $pengurusan_pelajar_antarabangsa_verfikasi = $tab1->pengurusan_pelajar_antarabangsa_verfikasi ? json_decode($tab1->pengurusan_pelajar_antarabangsa_verfikasi) : null;
 } else {
     $pengurusan_pelajar_antarabangsa = $pengurusan_pelajar_antarabangsa_verfikasi = null;
 }
 
 $total = $score = 0;
 $totalv = $scorev = 0;
 
 ?>
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
         'resit_pembayaran_oleh_pusat_bahasa' => '10.2.2 Resit Pembayaran oleh Pusat Bahasa',
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
         <thead style="color:black; background-color: #d8bfb0">
             <tr>
                 <th width="5%">8.0</th>
                 <th> PIAWAIAN </th>
                 <th width="10%">SKOR</th>
                 @if ($type == 'verfikasi' || $type == 'done')
                     <th width="10%">SKOR VERFIKASI</th>
                 @endif
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
                         <?php
                         if ($pengurusan_pelajar_antarabangsa) {
                             if (isset($pengurusan_pelajar_antarabangsa->$key)) {
                                 $score = $pengurusan_pelajar_antarabangsa->$key;
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
                             if ($pengurusan_pelajar_antarabangsa_verfikasi) {
                                 $keyval = '';
                                 $keyval = $key . '_verfikasi';
                                 if (isset($pengurusan_pelajar_antarabangsa_verfikasi->$keyval)) {
                                     $scorev = $pengurusan_pelajar_antarabangsa_verfikasi->$keyval;
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
         $percentage = $total / 150;
         $percentage = $percentage * 100;
         if ($type == 'verfikasi' || $type == 'done') {
             $col = 2;
         } else {
             $col = 1;
         }
         ?>
         <tfoot>
             <tr>
                 <td colspan="2" style="text-align: end;" class="fw-bolder text-uppercase bg-light-primary">Total
                     Skor</td>
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
 <input type="hidden" value="{{ $total }}" name="tab10_skor" id="tab10_skor">
 <input type="hidden" value="{{ number_format($percentage, 2) }}" name="tab10_percentage" id="tab10_percentage">
