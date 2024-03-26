@php
    $pendaftarans = [
        'piagam_pelanggan' => '2.1 Piagam Pelanggan (Janji Institusi kepada pelanggan)',
        'visi_misi' => '2.2 Visi dan Misi',
        'surat_pengelola' => '2.3.1 Surat Pelantikan Pengelola',
        'surat_pengetua' => '2.3.2 Surat Pelantikan Pengetua ',
        'surat_guru' => '2.3.3 Surat Pelantikan Guru ',
        'surat_pekerja' => '2.3.4 Surat Pelantikan Pekerja ',
        'profil_sekolah' => '2.4.1 Profil Sekolah ',
        'profil_guru' => '2.4.2 Profil Guru ',
        'profil_staf' => '2.4.3 Profil Staf/Pekerja ',
        'profil_murid' => '2.4.4 Profil Murid ',
        'rekod_murid_warganegara' => '2.5.1 Rekod Pendaftaran Murid  Warganegara ',
        'rekod_murid_antarabangsa' => '2.5.2 Rekod Pendaftaran Murid Bukan Warganegara ',
        'rekod_sjil_tamat' => '2.5.3 Rekod Sijil Tamat Belajar',
        'rekod_kedatangan_murid' => '2.5.4 Rekod Kedatangan Murid',
        'rekod_kedatangan_guru' => '2.5.5 Rekod Kedatangan Guru',
        'rekod_kedatangan_pelawat' => '2.5.6 Rekod Kedatangan Pelawat',
        'takwim_tahunan_sekolah' => '2.6 Takwim Tahunan Sekolah',
        'perkhidmatan_pelanggan' => '2.7 Perkhidmatan Pelanggan',
        'paparan_maklumat' => '2.8 Paparan Untuk Maklumat Umum',
        'SMIPS' => '2.9 Pengisian Sistem Maklumat Institusi Pendidikan Swasta (SMIPS)',
    ];

    $options = [
        'piagam_pelanggan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, </i>',
            3 => '<i style="font-size:12px;">Ada, Dipamerkan, Strategik</i>',
            4 => '<i style="font-size:12px;">Ada, Dipamerkan, Strategik, Menyeluruh</i>',
            5 => '<i style="font-size:12px;">Ada, Dipamerkan, Strategik, Menyeluruh, Ada Tempoh Masa</i>',
        ],

        'visi_misi' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, </i>',
            3 => '<i style="font-size:12px;">Ada, Dipamerkan, Strategik</i>',
            4 => '<i style="font-size:12px;">Ada, Dipamerkan, Strategik, Menyeluruh</i>',
            5 => '<i style="font-size:12px;">Ada, Dipamerkan, Strategik, Menyeluruh, Ada Objektif</i>',
        ],
        'surat_pengelola' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi, Dikemaskini</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi, Dikemaskini, Kebolehcapaian</i>',
        ],

        'surat_pengetua' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi, Dikemaskini</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi, Dikemaskini, Kebolehcapaian</i>',
        ],

        'surat_guru' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi, Dikemaskini</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi, Dikemaskini, Kebolehcapaian</i>',
        ],

        'surat_pekerja' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi, Dikemaskini</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Mencukupi, Dikemaskini, Kebolehcapaian</i>',
        ],

        'profil_sekolah' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Sistematik</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Sistematik, Kebolehcapaian</i>',
        ],
        'profil_guru' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Sistematik</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Sistematik, Kebolehcapaian</i>',
        ],
        'profil_staf' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Sistematik</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Sistematik, Kebolehcapaian</i>',
        ],
        'profil_murid' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Sistematik</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Sistematik, Kebolehcapaian</i>',
        ],
        'rekod_murid_warganegara' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia, Kebolehcapaian</i>',
        ],
        'rekod_murid_antarabangsa' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia, Kebolehcapaian</i>',
        ],
        'rekod_sjil_tamat' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia, Kebolehcapaian</i>',
        ],
        'rekod_kedatangan_murid' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia, Kebolehcapaian</i>',
        ],
        'rekod_kedatangan_guru' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia, Kebolehcapaian</i>',
        ],
        'rekod_kedatangan_pelawat' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Disemak/Diselia, Kebolehcapaian</i>',
        ],
        'takwim_tahunan_sekolah' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Menyeluruh</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dikemaskini, Menyeluruh, Kebolehcapaian</i>',
        ],
        'perkhidmatan_pelanggan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Ada Kaunter</i>',
            3 => '<i style="font-size:12px;">Ada, Ada Kaunter, Kemas & Tersusun</i>',
            4 => '<i style="font-size:12px;">Ada, Ada Kaunter, Kemas & Tersusun, Mesra Pelanggan</i>',
            5 => '<i style="font-size:12px;">Ada, Ada Kaunter, Kemas & Tersusun, Mesra Pelanggan, Ada Peti Cadangan</i>',
        ],
        'paparan_maklumat' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Strategik</i>',
            3 => '<i style="font-size:12px;">Ada, Strategik, Bermaklumat</i>',
            4 => '<i style="font-size:12px;">Ada, Strategik, Bermaklumat, Kemas</i>',
            5 => '<i style="font-size:12px;">Ada, Strategik, Bermaklumat, Kemas, Terkini</i>',
        ],
        'SMIPS' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Dikemaskini</i>',
            3 => '<i style="font-size:12px;">Ada, Dikemaskini, Terkini</i>',
            4 => '<i style="font-size:12px;">Ada, Dikemaskini, Terkini, Mengikut tempoh masa (bln 3,6,9</i>',
            5 => '<i style="font-size:12px;">Ada, Dikemaskini, Terkini, Mengikut tempoh masa (bln 3,6,9), Lengkap</i>',
        ],
    ];

    $count = 1.1;
@endphp

<style>
    #SkipsNilai1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #SkipsNilai1 tbody {
        vertical-align: middle;
    }

    #SkipsNilai1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>
<form id="pengurusan_institusi">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="SkipsNilai1">
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

                <input type="hidden" name="butiran_institusi_id" value="{{$butiran_id}}">
                <tr>
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Pengurusan Institusi</td>
                </tr>
                @foreach ($pendaftarans as $index => $pendaftaran)
                    @php
                        $numeric = preg_replace('/[^0-9.]/', '', $pendaftaran);
                        $text = trim(preg_replace('/[0-9.]/', '', $pendaftaran), '.');

                        $excludeNumber = strpos($pendaftaran, 'text-primary') !== false;
                    @endphp

                    <tr>
                        @if (!$excludeNumber)
                            <td> {{ $numeric }} </td>
                        @endif

                        @if (!$excludeNumber)
                            <td> {!! $text !!} </td>
                        @else
                            <td class="bg-light-primary" colspan="8"> {!! $text !!} </td>
                        @endif

                        @foreach ($options[$index] as $key => $option)
                            <td>
                                <div
                                    class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio" name="{{ $index }}"
                                        value="{{ $key }}" required>
                                </div>
                                <br>

                                <div class="d-flex justify-content-center align-items-center">
                                    {!! $option !!}
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>


  
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right formdd" onclick="submitformsekolah2()">Simpan</button>
    </div>

</form>

<script>
    function submitformsekolah2() {
        var formData = new FormData(document.getElementById('pengurusan_institusi_sekolah'));
        var error = false;

        $('form#pengurusan_institusi_sekolah').find('radio, input, checkbox').each(function() {
             var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }

        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard-sekolah/pengurusan_institusi';

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

    };
</script>
