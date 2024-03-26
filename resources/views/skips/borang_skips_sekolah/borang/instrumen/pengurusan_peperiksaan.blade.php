@php
    $pendaftarans = [
        'mesyuarat_peperiksaan' => '5.1 Mesyuarat',
        'pengurusan_pentaksir' => '5.2 Pengurusan Pentaksiran/ Penilaian',
        'analisis_keputusan' => '5.3 Analisis Keputusan Peperiksaan (2019-2021)',
    ];

    $options = [
        'mesyuarat_peperiksaan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada Jawatankuasa</i>',
            2 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada Takwim Mesyuarat</i>',
            3 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada Takwim Mesyuarat, Dokumen Mesyuarat</i>',
            4 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada Takwim Mesyuarat, Dokumen Mesyuarat, Mesyuarat Diminitkan </i>',
            5 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada Takwim Mesyuarat, Dokumen Mesyuarat, Mesyuarat Diminitkan, Maklum Balas</i>',
        ],

        'pengurusan_pentaksir' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada Rekod Penilaian</i>',
            2 => '<i style="font-size:12px;">Ada Rekod Penilaian, .Maklumat diisi dengan lengkap</i>',
            3 => '<i style="font-size:12px;">Ada Rekod Penilaian, .Maklumat diisi dengan lengkap, Kemaskini</i>',
            4 => '<i style="font-size:12px;">Ada Rekod Penilaian, .Maklumat diisi dengan lengkap, Kemaskini, Buku rekod dirujuk ibu bapa </i>',
            5 => '<i style="font-size:12px;">Ada Rekod Penilaian, .Maklumat diisi dengan lengkap, Kemaskini, Buku rekod dirujuk ibu bapa, Sistematik</i>',
        ],
        'analisis_keputusan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dipamerkan</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dipamerkan, Terkini</i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Dipamerkan, Terkini, Postmortem</i>',
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
<form id="pengurusan_penilaian_sekolah">
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
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Pengurusan Peperiksaan</td>
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
        <button type="button" class="btn btn-primary float-right formdd" onclick="submitformsekolah5()">Simpan</button>
    </div>

</form>

<script>
    function submitformsekolah5() {
        var formData = new FormData(document.getElementById('pengurusan_penilaian_sekolah'));
        var error = false;

        $('form#pengurusan_penilaian_sekolah').find('radio, input, checkbox').each(function() {
             var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }

        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard-sekolah/pengurusan_penilaian';

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
