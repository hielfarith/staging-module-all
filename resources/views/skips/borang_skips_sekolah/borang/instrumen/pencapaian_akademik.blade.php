@php
    $pendaftarans = [
        'peratusan_kelulusan2019' =>
            '10.1 Peratus Kelulusan Pencapaian Peperiksaan  Kurikulum Bersepadu Dini/ Bersepadu Tahfiz/ Kelulusan Pihak Berkuasa Agama Negeri ',

        'peratusan_kelulusantahfiz2019' =>
            '10.2 Kualiti Pencapaian Peperiksaan Kurikulum Bersepadu Dini/ Bersepadu Tahfiz/ Kelulusan Pihak Berkuasa Agama Negeri ',
    ];

    $options = [
        'peratusan_kelulusan2019' => [
            0 => '',
            1 => '<i style="font-size:12px;">1% - 19%</i>',
            2 => '<i style="font-size:12px;">20% - 39%</i>',
            3 => '<i style="font-size:12px;">40% - 59%</i>',
            4 => '<i style="font-size:12px;">60% - 79%</i>',
            5 => '<i style="font-size:12px;">80% - 100%</i>',
        ],

        'peratusan_kelulusantahfiz2019' => [
            0 => '',
            1 => '<i style="font-size:12px;"> kurang 20% pelajar cemerlang</i>',
            2 => '<i style="font-size:12px;"> lebih 20% pelajar cemerlang</i>',
            3 => '<i style="font-size:12px;"> lebih 40% pelajar cemerlang</i>',
            4 => '<i style="font-size:12px;" lebih 60% pelajar cemerlang</i>',
            5 => '<i style="font-size:12px;"> lebih 80% pelajar cemerlang</i>',
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
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Pencapaian Academik</td>
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
