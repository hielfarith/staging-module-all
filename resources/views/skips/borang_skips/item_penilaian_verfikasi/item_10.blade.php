<?php
    $butiran_institusi_id = $butiran_id;;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && !empty($tab1->pengurusan_pelajar_antarabangsa_verfikasi)) {
        $pengurusan_pelajar_antarabangsa = json_decode($tab1->pengurusan_pelajar_antarabangsa_verfikasi);
    } else {
        $pengurusan_pelajar_antarabangsa = null;
    }
?>
@php

$pelajar_antarabangsas = [
    'kawalan_dasar' => '<a class="text-primary"> 10.1 Kawalan Dasar </a>',
        'dokumentasi' => '<a> 10.1.1 Dokumentasi </a>',
        'tidak_melebihi_kapasiti_max_lampiran_b' => '<a> 10.1.2 Tidak Melebihi Kapasiti Max Seperti Di Dalam Lampiran B </a>',
        'tidak_melebihi_80_percent_kapasiti_max' => '<a> 10.1.3 Tidak Melebihi [Lapan Puluh] Peratus Kapasiti Max </a>',
        'mematuhi_kuota_pelajar_20_percent' => '<a> 10.1.4 Mematuhi Kuota Pelajar [Dua Puluh] Peratus </a>',
        'tempoh_pengajaran_min_20_jam_seminggu' => '<a> 10.1.5 Tempoh Pengajaran Min [Dua Puluh] Jam Seminggu </a>',
        'dokumen_pelajar_antarabangsa' => '<a class="text-primary"> 10.2 Dokumen Pelajar Antrarabangsa </a>',
        'surat_tawaran_oleh_pusat_bahasa_kemahiran' => '<a> 10.2.1 Surat Tawaran Oleh Pusat Bahasa/Kemahiran </a>',
        'resit_pembayaran_oleh_pusat_bahasa' => '<a> 10.2.2 Resit Pembayaran oleh Pusat Bahasa </a>',
        'buku_peraturan_refund_policy' => '<a> 10.2.3 Buku Peraturan/Refund Policy </a>',
        'surat_kelulusan_jabatan_imigresen' => '<a> 10.2.4 Surat Kelulusan Jabatan Imigresen </a>',
        'salinan_visa_pelajar' => '<a> 10.2.5 Salinan Visa Pelajar </a>',
        'surat_sokongan_emgs' => '<a> 10.2.6 Surat Sokongan EMGS </a>',
        'salinan_pasport' => '<a> 10.2.7 Salinan Pasport </a>',
        'pegawai_hep_antarabangsa' => '<a> 10.3 Pegawai HEP Antarabangsa </a>',
        'pengurusan_disiplin_pelajar_antarabangsa' => '<a> 10.4 Pengurusan Disiplin Pelajar Antarabangsa </a>',
        'kelulusan_kementerian_dalam_negeri' => '<a> 10.5 Kelulusan Kementerian Dalam Negeri </a>',
];

$option_antarabangsas = [
    'kawalan_dasar' => [
        // 0 => '',
    ],

    'tidak_melebihi_kapasiti_max_lampiran_b' => [
        0 => '',
        1 => '',
        2 => '',
        3 => '',
        4 => '',
        5 => '<i style="font-size:12px">Mematuhi</i>',
    ],

    'tidak_melebihi_80_percent_kapasiti_max' => [
        0 => '',
        1 => '',
        2 => '',
        3 => '',
        4 => '',
        5 => '<i style="font-size:12px">Mematuhi</i>',
    ],

    'mematuhi_kuota_pelajar_20_percent' => [
        0 => '',
        1 => '',
        2 => '',
        3 => '',
        4 => '',
        5 => '<i style="font-size:12px">Mematuhi</i>',
    ],

    'tempoh_pengajaran_min_20_jam_seminggu' => [
        0 => '',
        1 => '',
        2 => '',
        3 => '',
        4 => '',
        5 => '<i style="font-size:12px">Mematuhi</i>',
    ],

    'dokumentasi' => [
        0 => '<i style="font-size:12px"></i>',
        1 => '<i style="font-size:12px">Mempunyai sekurang-kurangnya satu (1) kriteria dasar seperti yang disenaraikan</i>',
        2 => '<i style="font-size:12px">Mempunyai sekurang-kurangnya satu (2) kriteria dasar seperti yang disenaraikan</i>',
        3 => '<i style="font-size:12px">Mempunyai sekurang-kurangnya satu (3) kriteria dasar seperti yang disenaraikan</i>',
        4 => '<i style="font-size:12px">Mempunyai sekurang-kurangnya satu (4) kriteria dasar seperti yang disenaraikan</i>',
        5 => '<i style="font-size:12px">Mempunyai sekurang-kurangnya satu (5) kriteria dasar seperti yang disenaraikan</i>',
    ],

    'dokumen_pelajar_antarabangsa' => [
        // 0 => '',
    ],

    'surat_tawaran_oleh_pusat_bahasa_kemahiran' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Sistematik</i>',
    ],

    'resit_pembayaran_oleh_pusat_bahasa' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Sistematik</i>',
    ],

    'buku_peraturan_refund_policy' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Sistematik</i>',
    ],

    'surat_kelulusan_jabatan_imigresen' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Sistematik</i>',
    ],

    'salinan_visa_pelajar' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Sistematik</i>',
    ],

    'surat_sokongan_emgs' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Sistematik</i>',
    ],

    'salinan_pasport' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Sistematik</i>',
    ],

    'pegawai_hep_antarabangsa' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada rekod kehadiran</i>',
        2 => '<i style="font-size:12px">Ada rekod kehadiran, Ada surat amaran</i>',
        3 => '<i style="font-size:12px">Ada rekod kehadiran, Ada surat amaran, Ada Laporan Polis</i>',
        4 => '<i style="font-size:12px">Ada rekod kehadiran, Ada surat amaran, Ada Laporan Polis, Checkout Memo</i>',
        5 => '<i style="font-size:12px">Ada rekod kehadiran, Ada surat amaran, Ada Laporan Polis, Checkout Memo, Bukti Penghantaran Pulang</i>',
    ],

    'pengurusan_disiplin_pelajar_antarabangsa' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada rekod kehadiran</i>',
        2 => '<i style="font-size:12px">Ada rekod kehadiran, Ada surat amaran</i>',
        3 => '<i style="font-size:12px">Ada rekod kehadiran, Ada surat amaran, Ada Laporan Polis</i>',
        4 => '<i style="font-size:12px">Ada rekod kehadiran, Ada surat amaran, Ada Laporan Polis, Checkout Memo</i>',
        5 => '<i style="font-size:12px">Ada rekod kehadiran, Ada surat amaran, Ada Laporan Polis, Checkout Memo, Bukti Penghantaran Pulang</i>',
    ],

    'kelulusan_kementerian_dalam_negeri' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Terkini</i>',
        3 => '<i style="font-size:12px">Ada, Terkini, Kebolehcapaian</i>',
        4 => '<i style="font-size:12px">Ada, Terkini, Kebolehcapaian, Dipamerkan</i>',
        5 => '<i style="font-size:12px">Ada, Terkini, Kebolehcapaian, Dipamerkan, Kemas / Kreatif</i>',
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
        /* text-align: center; */
    }

    #NilaiItem10 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>
<form id="pengurusan_pelajar_antarabangsa_v">
<input type="hidden" name="usertype" value="{{$type}}">
<input type="hidden" name="butiran_institusi_id" value="{{$butiran_institusi_id}}">

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
                <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Pengurusan Pelajar Antarabangsa</td>
            </tr>
             @foreach ($pelajar_antarabangsas as $index => $antarabangsa)
             <?php
                    $keyval = '';
                    $keyval = $index.'_verfikasi';

                    $numeric = preg_replace('/[^0-9.]/', '', $antarabangsa);
                    $text = trim(preg_replace('/[0-9.]/', '', $antarabangsa), '.');

                    $excludeNumber = strpos($antarabangsa, 'text-primary') !== false;
                ?>
                <tr>
                    @if (!$excludeNumber)
                        <td> {{ $numeric }} </td>
                    @endif

                    @if(!$excludeNumber)
                        <td> {!! $text !!} </td>
                    @else
                        <td class="bg-light-primary" colspan="8"> {!! $text !!} </td>
                    @endif

                    @if(isset($option_antarabangsas[$index]))
                        @foreach ($option_antarabangsas[$index] as $key => $option_antarabangsa)
                            <td>

                                @if(count($option_antarabangsas[$index]) > 1)
                                <div class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio" name="{{ $index }}_verfikasi" id="" value="{{$key}}" required  @if($pengurusan_pelajar_antarabangsa && $pengurusan_pelajar_antarabangsa->$keyval == $key) checked @endif @if($type == 'validasi'  || $status == 'done') disabled @endif>
                                </div>
                                @endif
                                <br>

                                <div class="d-flex justify-content-center align-items-center">
                                    {!! $option_antarabangsa !!}
                                </div>
                            </td>
                        @endforeach
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<hr>

<div class="col-md-12">
    <label class="fw-bolder">Ulasan</label>
    <textarea name="ulasan_verfikasi" id="" rows="3" class="form-control">{{$pengurusan_pelajar_antarabangsa?->ulasan_verfikasi}}</textarea>
</div>


    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right verify" onclick="submitform10v()">Simpan</button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   function submitform10v() {
        var formData = new FormData(document.getElementById('pengurusan_pelajar_antarabangsa_v'));
        var error = false;

        $('form#pengurusan_pelajar_antarabangsa_v').find('radio, input').each(function() {
            var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        // var url = "{{ route('skips.instrumen-submit', ['tab' => 'pengurusan_pelajar_antarabangsa']) }}"
        var url = "{{ env('APP_VERFIKASI_URL') }}" + 'api/skips/verfikasi/submit/pengurusan_pelajar_antarabangsa_verfikasi';

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    window.location.reload();
               }
            }
        });
   }
</script>
