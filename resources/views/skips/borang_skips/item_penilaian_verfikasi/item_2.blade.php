<form id="pengurusan_institusiv">
<?php
    $butiran_institusi_id = $butiran_id;;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();

    if ($type == 'verfikasi' ) {
        if (!empty($tab1->pengurusan_institusi_verfikasi)) {
            $pengurusan_institusi = json_decode($tab1->pengurusan_institusi_verfikasi);
        } else {
            $pengurusan_institusi = null;
        }
    }
?>
@php
$butiran_institusi_id = $butiran_id;;
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

$option_institusis = [
    'piagam_pelanggan' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Difailkan</i>',
        3 => '<i>Ada, Difailkan, Dikemaskini</i>',
        4 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'visi_dan_misi' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Difailkan</i>',
        3 => '<i>Ada, Difailkan, Dikemaskini</i>',
        4 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'perancangan_strategik' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Difailkan</i>',
        3 => '<i>Ada, Difailkan, Dikemaskini</i>',
        4 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'surat_surat_pelantikan' => [
        0 => '',
    ],

    'pelantikan_pengelola' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Difailkan</i>',
        3 => '<i>Ada, Difailkan, Dikemaskini</i>',
        4 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'pelantikan_pengetua_dan_kontrak_kerja' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Difailkan</i>',
        3 => '<i>Ada, Difailkan, Dikemaskini</i>',
        4 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'pelantikan_guru_dan_kontrak_kerja' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Difailkan</i>',
        3 => '<i>Ada, Difailkan, Dikemaskini</i>',
        4 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'pelantikan_pekerja_dan_kontrak_kerja' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Difailkan</i>',
        3 => '<i>Ada, Difailkan, Dikemaskini</i>',
        4 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'kebenaran_mengajar_guru_kerajaan' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Difailkan</i>',
        3 => '<i>Ada, Difailkan, Dikemaskini</i>',
        4 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian</i>',
        5 => '<i>Ada, Difailkan, Dikemaskini, Kebolehcapaian, Ada Minit Pelantikan</i>',
    ],

    'rekod_profil' => [
       0 => '',
    ],

    'profil_institusi' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Didokumentasi</i>',
        3 => '<i>Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'profil_guru' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Didokumentasi</i>',
        3 => '<i>Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'profil_staf' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Didokumentasi</i>',
        3 => '<i>Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'profil_pelajar' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Didokumentasi</i>',
        3 => '<i>Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],


    'pengurusan_rekod' => [
       0 => '',
    ],

    'rekod_pendaftaran_pelajar' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Didokumentasi</i>',
        3 => '<i>Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'rekod_sijil_tamat_belajar' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Didokumentasi</i>',
        3 => '<i>Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'rekod_kedatangan_pelajar' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Didokumentasi</i>',
        3 => '<i>Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'rekod_kedatangan_guru' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Didokumentasi</i>',
        3 => '<i>Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'rekod_pelawat' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Didokumentasi</i>',
        3 => '<i>Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'takwim_tahunan' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Didokumentasi</i>',
        3 => '<i>Ada, Didokumentasi, Dikemaskini</i>',
        4 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik</i>',
        5 => '<i>Ada, Didokumentasi, Dikemaskini, Sistematik, Kebolehcapaian</i>',
    ],

    'perkhidmatan_pelanggan' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Mempunyai Kaunter</i>',
        3 => '<i>Ada, Mempunyai Kaunter, Kemas dan Tersusun</i>',
        4 => '<i>Ada, Mempunyai Kaunter, Kemas dan Tersusun, Pegawai Khas/Mesra Pelanggan</i>',
        5 => '<i>Ada, Mempunyai Kaunter, Kemas dan Tersusun, Pegawai Khas/Mesra Pelanggan, Peti Cadangan</i>',
    ],

    'paparan_untuk_makluman_umum' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Strategik</i>',
        3 => '<i>Ada, Strategik, Bermaklumat</i>',
        4 => '<i>Ada, Strategik, Bermaklumat, Kemas</i>',
        5 => '<i>Ada, Strategik, Bermaklumat, Kemas, Terkini</i>',
    ],

    'pengurusan_aduan' => [
        0 => '',
        1 => '<i>Ada SOP</i>',
        2 => '<i>Ada SOP, SOP Dipamerkan</i>',
        3 => '<i>Ada SOP, SOP Dipamerkan, Ada Rekod Aduan</i>',
        4 => '<i>Ada SOP, SOP Dipamerkan, Ada Rekod Aduan, Ada Tindakan Terhadap Aduan</i>',
        5 => '<i>Ada SOP, SOP Dipamerkan, Ada Rekod Aduan, Ada Tindakan Terhadap Aduan, Minit Mesyuarat Pengurusan Berkenaan Aduan</i>',
    ],

];
@endphp

<style>
    #NilaiItem2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem2 tbody {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem2 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem2">
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
                    <td colspan="8" class="bg-light-primary fw-bolder">Pengurusan Institusi</td>
                </tr>
                @foreach ($institusis as $index => $institusi)
                <?php
                    $keyval = '';
                    $keyval = $index.'_verfikasi';
                ?>
                    <tr>
                        <td colspan="2"> {{ $institusi }}</td>
                        @foreach ($option_institusis[$index] as $key => $option_institusi)
                            <td>
                                @if(count($option_institusis[$index]) > 1)
                                <div class="form-check form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="{{ $index }}_verfikasi" id="{{ $index }}" value="{{$key}}" required @if($pengurusan_institusi && $pengurusan_institusi->$keyval == $key) checked @endif @if($type == 'validasi') disabled @endif>
                                </div>
                                @endif
                                <br>

                                {!! $option_institusi !!}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    <div class="col-md-12">
        <label class="fw-bolder">Ulasan</label>
        <textarea name="ulasan_verfikasi" id="" rows="3" class="form-control">{{$pengurusan_institusi?->ulasan_verfikasi}}</textarea>
    </div>
@if($canVerify)

    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right" onclick="submitform2v()">Simpan</button>
    </div>
    @endif
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
   function submitform2v() {
        var formData = new FormData(document.getElementById('pengurusan_institusiv'));
        var error = false;

        $('form#pengurusan_institusiv').find('radio, input').each(function() {
            var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skips.instrumen-submit', ['tab' => 'pengurusan_institusi']) }}"
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
