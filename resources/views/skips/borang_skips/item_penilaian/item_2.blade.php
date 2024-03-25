<form id="pengurusan_institusi">
<?php
    $butiran_institusi_id = $butiran_id;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $pengurusan_institusi = json_decode($tab1->pengurusan_institusi);
    } else {
        $pengurusan_institusi = null;
    }

?>
@php
$butiran_institusi_id = $butiran_id;
$institusis = [
    'piagam_pelanggan' => '<a> 2.1. Piagam Pelanggan </a>',
    'visi_dan_misi' => '<a> 2.2. Visi dan Misi </a>',
    'perancangan_strategik' => '<a> 2.3. Perancangan Strategik / Hala Tuju </a>',
    'surat_surat_pelantikan' => '<a class="text-primary"> 2.4 Surat Surat Perlantikan </a>',
    'pelantikan_pengelola' => '<a> 2.4.1 Surat Pelantikan Pengelola </a>',
    'pelantikan_pengetua_dan_kontrak_kerja' => '<a> 2.4.2 Surat Pelantikan Pengetua Dan Kontrak Kerja </a>',
    'pelantikan_guru_dan_kontrak_kerja' => '<a> 2.4.3 Surat Pelantikan Guru Dan Kontrak Kerja </a>',
    'pelantikan_pekerja_dan_kontrak_kerja' => '<a> 2.4.4 Surat Pelantikan Pekerja Dan Kontrak Kerja </a>',
    'kebenaran_mengajar_guru_kerajaan' => '<a> 2.4.5 Surat Kebenaran Mengajar (Guru Kerajaan) </a>',
    'rekod_profil' => '<a class="text-primary"> 2.5 Rekod Profil </a>',
    'profil_institusi' => '<a> 2.5.1 Profil Institusi </a>',
    'profil_guru' => '<a> 2.5.2 Profil Guru </a>',
    'profil_staf' => '<a> 2.5.3 Profil Staf </a>',
    'profil_pelajar' => '<a> 2.5.4 Profil Pelajar </a>',
    'pengurusan_rekod' => '<a class="text-primary"> 2.6 Pengurusan Rekod </a>',
    'rekod_pendaftaran_pelajar' => '<a> 2.6.1 Rekod Pendaftaran Pelajar </a>',
    'rekod_sijil_tamat_belajar' => '<a> 2.6.2 Rekod Sijil Tamat Belajar </a>',
    'rekod_kedatangan_pelajar' => '<a> 2.6.3 Rekod Kedatangan Pelajar </a>',
    'rekod_kedatangan_guru' => '<a> 2.6.4 Rekod Kedatangan Guru </a>',
    'rekod_pelawat' => '<a> 2.6.5 Rekod Pelawat </a>',
    'takwim_tahunan' => '<a> 2.7. Takwim Tahunan Pusat Bahasa/Pusat Kemahiran </a>',
    'perkhidmatan_pelanggan' => '<a> 2.8. Perkhidmatan Pelanggan </a>',
    'paparan_untuk_makluman_umum' => '<a> 2.9. Paparan untuk Makluman Umum </a>',
    'pengurusan_aduan' => '<a> 2.10 Pengurusan Aduan </a>',
];

$option_institusis = [
    'piagam_pelanggan' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'visi_dan_misi' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'perancangan_strategik' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'surat_surat_pelantikan' => [
    ],

    'pelantikan_pengelola' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'pelantikan_pengetua_dan_kontrak_kerja' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'pelantikan_guru_dan_kontrak_kerja' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'pelantikan_pekerja_dan_kontrak_kerja' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'kebenaran_mengajar_guru_kerajaan' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Difailkan</i>',
        3 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i style="font-size:12px">Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'rekod_profil' => [
    ],

    'profil_institusi' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Didokumentasi</i>',
        3 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'profil_guru' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Didokumentasi</i>',
        3 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'profil_staf' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Didokumentasi</i>',
        3 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'profil_pelajar' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Didokumentasi</i>',
        3 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],


    'pengurusan_rekod' => [
    ],

    'rekod_pendaftaran_pelajar' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Didokumentasi</i>',
        3 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'rekod_sijil_tamat_belajar' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Didokumentasi</i>',
        3 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'rekod_kedatangan_pelajar' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Didokumentasi</i>',
        3 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'rekod_kedatangan_guru' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Didokumentasi</i>',
        3 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'rekod_pelawat' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Didokumentasi</i>',
        3 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'takwim_tahunan' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Didokumentasi</i>',
        3 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i style="font-size:12px">Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'perkhidmatan_pelanggan' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Mempunyai Kaunter</i>',
        3 => '<i style="font-size:12px">Ada, Mempunyai Kaunter, Kemas dan Tersusun</i>',
        4 => '<i style="font-size:12px">Ada, Mempunyai Kaunter, Kemas dan Tersusun, Pegawai Khas/Mesra Pelanggan</i>',
        5 => '<i style="font-size:12px">Ada, Mempunyai Kaunter, Kemas dan Tersusun, Pegawai Khas/Mesra Pelanggan, Peti Cadangan</i>',
    ],

    'paparan_untuk_makluman_umum' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada</i>',
        2 => '<i style="font-size:12px">Ada, Strategik</i>',
        3 => '<i style="font-size:12px">Ada, Strategik, Bermaklumat</i>',
        4 => '<i style="font-size:12px">Ada, Strategik, Bermaklumat, Kemas</i>',
        5 => '<i style="font-size:12px">Ada, Strategik, Bermaklumat, Kemas, Terkini</i>',
    ],

    'pengurusan_aduan' => [
        0 => '',
        1 => '<i style="font-size:12px">Ada SOP</i>',
        2 => '<i style="font-size:12px">Ada SOP, SOP Dipamerkan</i>',
        3 => '<i style="font-size:12px">Ada SOP, SOP Dipamerkan, Ada Rekod Aduan</i>',
        4 => '<i style="font-size:12px">Ada SOP, SOP Dipamerkan, Ada Rekod Aduan, Ada Tindakan Terhadap Aduan</i>',
        5 => '<i style="font-size:12px">Ada SOP, SOP Dipamerkan, Ada Rekod Aduan, Ada Tindakan Terhadap Aduan, Minit Mesyuarat Pengurusan Berkenaan Aduan</i>',
    ],

];
@endphp

<style>
    #SkipsNilai2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #SkipsNilai2 tbody {
        vertical-align: middle;
    }

    #SkipsNilai2 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="SkipsNilai2">
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
                <input type="hidden" name="usertype" value="{{$type}}">
                <input type="hidden" name="butiran_institusi_id" id="butiran_institusi_id" value="{{$butiran_institusi_id}}">
                <tr>
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Pengurusan Institusi</td>
                </tr>
                @foreach ($institusis as $index => $institusi)
                    @php
                        $numeric = preg_replace('/[^0-9.]/', '', $institusi);
                        $text = trim(preg_replace('/[0-9.]/', '', $institusi), '.');

                        $excludeNumber = strpos($institusi, 'text-primary') !== false;
                    @endphp

                    <tr>
                        @if (!$excludeNumber)
                            <td> {{ $numeric }} </td>
                        @endif

                        @if(!$excludeNumber)
                            <td> {!! $text !!} </td>
                        @else
                            <td class="bg-light-primary" colspan="8"> {!! $text !!} </td>
                        @endif

                        @foreach ($option_institusis[$index] as $key => $option_institusi)
                            <td>
                                @if(count($option_institusis[$index]) > 1)
                                <div class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio" name="{{ $index }}" id="{{ $index }}" value="{{$key}}" required @if($pengurusan_institusi && $pengurusan_institusi->$index == $key) checked @endif @if($type == 'verfikasi' || $type == 'validasi' || $type == 'done') disabled @endif>
                                </div>
                                @endif
                                <br>

                                <div class="d-flex justify-content-center align-items-center">
                                    {!! $option_institusi !!}
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    @if($type != 'laporan')
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right" onclick="submitform2()">Simpan</button>
    </div>
    @endif
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
   function submitform2() {
        var formData = new FormData(document.getElementById('pengurusan_institusi'));
        var error = false;

        $('form#pengurusan_institusi').find('radio, input').each(function() {
            var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        // var url = "{{ route('skips.instrumen-submit', ['tab' => 'pengurusan_institusi']) }}"
        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard/pengurusan_institusi';
        
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
               }
            }
        });
   }
</script>
