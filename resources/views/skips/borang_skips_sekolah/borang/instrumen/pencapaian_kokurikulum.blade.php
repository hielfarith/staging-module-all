@php
    $pendaftarans = [
        'aktiviti_1' => '11.1 Aktiviti  - Kelab (bukan akademik) ',

        'aktiviti_2' => '11.2 Aktiviti  - Persatuan  ',

        'aktiviti_3' => '11.3 Aktiviti  - Badan Beruniform ',

        'aktiviti_4' => '11.4 Aktiviti  - Sukan ',

        'aktiviti_5' => '11.5 Aktiviti  - Permainan ',
    ];

    $options = [
        'aktiviti_1' => [
            0 => '',
            1 => '<i style="font-size:12px;">Penyertaan Negeri</i>',
            2 => '<i style="font-size:12px;">Sebarang pencapaian peringkat negeri</i>',
            3 => '<i style="font-size:12px;">Penyertaan Kebangsaan</i>',
            4 => '<i style="font-size:12px;">Sebarang pencapaian peringkat kebangsaan</i>',
            5 => '<i style="font-size:12px;">Penyertaan antarabangsa / sebarang pencapaian peringkat antarabangsa</i>',
        ],

        'aktiviti_2' => [
            0 => '',
            1 => '<i style="font-size:12px;">Penyertaan Negeri</i>',
            2 => '<i style="font-size:12px;">Sebarang pencapaian peringkat negeri</i>',
            3 => '<i style="font-size:12px;">Penyertaan Kebangsaan</i>',
            4 => '<i style="font-size:12px;">Sebarang pencapaian peringkat kebangsaan</i>',
            5 => '<i style="font-size:12px;">Penyertaan antarabangsa / sebarang pencapaian peringkat antarabangsa</i>',
        ],

        'aktiviti_3' => [
            0 => '',
            1 => '<i style="font-size:12px;">Penyertaan Negeri</i>',
            2 => '<i style="font-size:12px;">Sebarang pencapaian peringkat negeri</i>',
            3 => '<i style="font-size:12px;">Penyertaan Kebangsaan</i>',
            4 => '<i style="font-size:12px;">Sebarang pencapaian peringkat kebangsaan</i>',
            5 => '<i style="font-size:12px;">Penyertaan antarabangsa / sebarang pencapaian peringkat antarabangsa</i>',
        ],

        'aktiviti_4' => [
            0 => '',
            1 => '<i style="font-size:12px;">Penyertaan Negeri</i>',
            2 => '<i style="font-size:12px;">Sebarang pencapaian peringkat negeri</i>',
            3 => '<i style="font-size:12px;">Penyertaan Kebangsaan</i>',
            4 => '<i style="font-size:12px;">Sebarang pencapaian peringkat kebangsaan</i>',
            5 => '<i style="font-size:12px;">Penyertaan antarabangsa / sebarang pencapaian peringkat antarabangsa</i>',
        ],

        'aktiviti_5' => [
            0 => '',
            1 => '<i style="font-size:12px;">Penyertaan Negeri</i>',
            2 => '<i style="font-size:12px;">Sebarang pencapaian peringkat negeri</i>',
            3 => '<i style="font-size:12px;">Penyertaan Kebangsaan</i>',
            4 => '<i style="font-size:12px;">Sebarang pencapaian peringkat kebangsaan</i>',
            5 => '<i style="font-size:12px;">Penyertaan antarabangsa / sebarang pencapaian peringkat antarabangsa</i>',
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
<form id="pencapaian_kokurikulum_sekolah">
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
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Pencapaian Kokurikulum</td>
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
        <button type="button" class="btn btn-primary float-right formdd" onclick="submitformsekolah9()">Simpan</button>
    </div>

</form>

<script>
    function submitformsekolah9() {
        var formData = new FormData(document.getElementById('pencapaian_kokurikulum_sekolah'));
        var error = false;

        $('form#pencapaian_kokurikulum_sekolah').find('radio, input, checkbox').each(function() {
             var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }

        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard-sekolah/pencapaian_kokurikulum';

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
