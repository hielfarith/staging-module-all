@php
    $pendaftarans = [
        'sukatan_pelajaranKSSM' => '3.1 Sukatan Pelajaran (Subjek teras mengikut KSSM)',
        'sukata_pelajaranTahfiz' => '3.2 Sukatan Pelajaran (DINI/Tahfiz/Kelulusan Pihak Berkuasa Agama Negeri)',
        'rekod_mengajar_guru' => '3.3 Buku / Rekod Mengajar Guru',
        'Mesyuarat_Kurikulum' => '3.4 Mesyuarat Kurikulum ',
        'bahan_mengajar' => '3.5 Bahan Bantu Mengajar',
        'rekod_pencerapan' => '3.6 Rekod Pencerapan',
    ];

    $options = [
        'sukatan_pelajaranKSSM' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Setiap mata pelajaran</i>',
            3 => '<i style="font-size:12px;">Ada, Setiap mata pelajaran, Didokumentasikan</i>',
            4 => '<i style="font-size:12px;">Ada, Setiap mata pelajaran, Didokumentasikan, Disebarkan Kepada Guru, </i>',
            5 => '<i style="font-size:12px;">Ada, Setiap mata pelajaran, Didokumentasikan, Disebarkan Kepada Guru, Mudah Dirujuk</i>',
        ],

        'sukata_pelajaranTahfiz' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Setiap mata pelajaran</i>',
            3 => '<i style="font-size:12px;">Ada, Setiap mata pelajaran, Didokumentasikan</i>',
            4 => '<i style="font-size:12px;">Ada, Setiap mata pelajaran, Didokumentasikan, Disebarkan Kepada Guru, </i>',
            5 => '<i style="font-size:12px;">Ada, Setiap mata pelajaran, Didokumentasikan, Disebarkan Kepada Guru, Mudah Dirujuk</i>',
        ],
        'rekod_mengajar_guru' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Direkod setiap PdP</i>',
            3 => '<i style="font-size:12px;">Ada, Direkod setiap PdP, Butiran Lengkap</i>',
            4 => '<i style="font-size:12px;">Ada, Direkod setiap PdP, Butiran Lengkap, Mengikut DSKPD</i>',
            5 => '<i style="font-size:12px;">Ada, Direkod setiap PdP, Butiran Lengkap, Mengikut DSKPD , Disemak/Diselia</i>',
        ],

        'Mesyuarat_Kurikulum' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada JK</i>',
            2 => '<i style="font-size:12px;">Ada JK, Mesyuarat Diminitkan</i>',
            3 => '<i style="font-size:12px;">Ada JK, Mesyuarat Diminitkan, Ada Fail Minit Mesyuarat</i>',
            4 => '<i style="font-size:12px;">Ada JK, Mesyuarat Diminitkan, Ada Fail Minit Mesyuarat, Minit Mesyuarat Disebarkan</i>',
            5 => '<i style="font-size:12px;">Ada JK, Mesyuarat Diminitkan, Ada Fail Minit Mesyuarat, Minit Mesyuarat Disebarkan, Maklum Balas</i>',
        ],
        'bahan_mengajar' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Rekod Penggunaan</i>',
            3 => '<i style="font-size:12px;">Ada, Rekod Penggunaan, Rekod Penyimpanan</i>',
            4 => '<i style="font-size:12px;">Ada, Rekod Penggunaan, Rekod Penyimpanan, Tindakan Pemeliharaan & pemuliharaan</i>',
            5 => '<i style="font-size:12px;">Ada, Rekod Penggunaan, Rekod Penyimpanan, Tindakan Pemeliharaan & pemuliharaan, Ada Peruntukan Khas</i>',
        ],
        'rekod_pencerapan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Jadual Pencerapan</i>',
            2 => '<i style="font-size:12px;">Jadual Pencerapan, Dokumen Pencerapan</i>',
            3 => '<i style="font-size:12px;">Jadual Pencerapan, Dokumen Pencerapan, Rekod Pencerapan</i>',
            4 => '<i style="font-size:12px;">Jadual Pencerapan, Dokumen Pencerapan, Rekod Pencerapan, Laporan Pencerapan</i>',
            5 => '<i style="font-size:12px;">Jadual Pencerapan, Dokumen Pencerapan, Rekod Pencerapan, Laporan Pencerapan, Tindakan Susulan</i>',
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
<form id="penubuhan_pendaftaran">
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

                <tr>
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Pengurusan Kurikulum</td>
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
                                    <input class="form-check-input" type="radio" name="radio_{{ $index }}"
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
        <button type="button" class="btn btn-primary float-right formdd">Simpan</button>
    </div>

</form>

<script>
    function submitform1() {
        var formData = new FormData(document.getElementById('penubuhan_pendaftaran'));
        var error = false;

        $('form#penubuhan_pendaftaran').find('radio, input, checkbox').each(function() {
            if (this.required && this.type == 'checkbox' && !this.checked) {
                error = true;
            }
            if (this.required && this.value == '') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skips.instrumen-submit', ['tab' => 'penubuhan_pendaftaran']) }}"
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
