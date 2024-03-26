<form id="pengurusan_pembangunan_guru">
    <?php
        $butiran_institusi_id = $butiran_id;
        $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
            if ($butiran_institusi_id && $tab1) {
                $pengurusan_pembangunan_guru = json_decode($tab1->pengurusan_pembangunan_guru);
            } else {
                $pengurusan_pembangunan_guru = null;
            }
    ?>

    @php
        $butiran_institusi_id = $butiran_id;

        $pembangunan_gurus = [
            'program_pembangunan_guru' => '<a> 6.1 Program Pembangunan Guru </a>',
            'kelayakan_akademik_guru' => '<a> 6.2 Kelayakan Akademik Guru </a>',
            'kelayakan_ikhtisas_guru' => '<a> 6.3 Kelayakan Ikhtisas Guru </a>',
        ];

        $option_pembangunan_gurus = [
            'program_pembangunan_guru' => [
                0 => '<i style="font-size:12px;"></i>',
                1 => '<i style="font-size:12px;">Ada Perancangan</i>',
                2 => '<i style="font-size:12px;">Ada Perancangan, Program Secara Dalaman</i>',
                3 => '<i style="font-size:12px;">Ada Perancangan, Program Secara Dalaman, Program dengan Pihak Luar</i>',
                4 => '<i style="font-size:12px;">Ada Perancangan, Program Secara Dalaman, Program dengan Pihak Luar, Lebih 50% Penyertaan Guru</i>',
                5 => '<i style="font-size:12px;">Ada Perancangan, Program Secara Dalaman, Program dengan Pihak Luar, Lebih 50% Penyertaan Guru, Kajian Keperluan Latihan</i>',
            ],

            'kelayakan_akademik_guru' => [
                0 => '<i style="font-size:12px;"></i>',
                1 => '<i style="font-size:12px;">Sekurang-kurangnya 20%</i>',
                2 => '<i style="font-size:12px;">Sekurang-kurangnya 40%</i>',
                3 => '<i style="font-size:12px;">Sekurang-kurangnya 60%</i>',
                4 => '<i style="font-size:12px;">Sekurang-kurangnya 80%</i>',
                5 => '<i style="font-size:12px;">100% Guru Mempunyai Kelayakan Ijazah dan Ke Atas</i>',
            ],

            'kelayakan_ikhtisas_guru' => [
                0 => '<i style="font-size:12px;"></i>',
                1 => '<i style="font-size:12px;">Sekurang-kurangnya 20%</i>',
                2 => '<i style="font-size:12px;">Sekurang-kurangnya 40%</i>',
                3 => '<i style="font-size:12px;">Sekurang-kurangnya 60%</i>',
                4 => '<i style="font-size:12px;">Sekurang-kurangnya 80%</i>',
                5 => '<i style="font-size:12px;">100% Guru Mempunyai Kelayakan Ikhtisas</i>',
            ],
        ];
    @endphp

    <style>
        #SkipsNilai6 thead th {
            vertical-align: middle;
            text-align: center;
        }

        #SkipsNilai6 tbody {
            vertical-align: middle;
            /* text-align: center; */
        }

        #SkipsNilai6 table {
            width: 100% !important;
            /* word-wrap: break-word; */
        }
    </style>

    <input type="hidden" name="usertype" value="{{$type}}">
    <input type="hidden" name="butiran_institusi_id" id="butiran_institusi_id" value="{{$butiran_institusi_id}}">

    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="SkipsNilai6">
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
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Pengurusan & Pembangunan Guru</td>
                </tr>
                @foreach ($pembangunan_gurus as $index => $pembangunan_guru)
                    @php
                        $numeric = preg_replace('/[^0-9.]/', '', $pembangunan_guru);
                        $text = trim(preg_replace('/[0-9.]/', '', $pembangunan_guru), '.');

                        $excludeNumber = strpos($pembangunan_guru, 'text-primary') !== false;
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

                        @foreach ($option_pembangunan_gurus[$index] as $key => $option_pembangunan_guru)
                        <td>
                            <div class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                <input class="form-check-input" type="radio" name="{{ $index }}" id="{{$index}}" value="{{$key}}" required @if($pengurusan_pembangunan_guru && $pengurusan_pembangunan_guru->$index == $key) checked @endif @if($type == 'verfikasi' || $type == 'validasi' || $type == 'laporan') disabled @endif>
                            </div>
                            <br>

                            <div class="d-flex justify-content-center align-items-center">
                                {!! $option_pembangunan_guru !!}
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
        <button type="button" class="btn btn-primary float-right" onclick="submitform6()">Simpan</button>
    </div>
    @endif
</form>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function submitform6() {
        var formData = new FormData(document.getElementById('pengurusan_pembangunan_guru'));
        var error = false;

        $('form#pengurusan_pembangunan_guru').find('radio, input').each(function() {
            var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        // var url = "{{ route('skips.instrumen-submit', ['tab' => 'pengurusan_pembangunan_guru']) }}"
        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard/pengurusan_pembangunan_guru';

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
