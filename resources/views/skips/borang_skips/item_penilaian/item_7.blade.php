<form id="displin">
    <?php
    $butiran_institusi_id = $butiran_id;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $disiplin = json_decode($tab1->displin);
    } else {
        $disiplin = null;
    }
?>

    @php
    $butiran_institusi_id = $butiran_id;
    $displins = [
        'peraturan_disiplin' => '<a> 7.1 Peraturan Disiplin </a>',
        'rekod_disiplin' => '<a> 7.2 Rekod Disiplin </a>',
        'pengurusan_tindakan_disiplin' => '<a> 7.3 Pengurusan Tindakan Disiplin </a>',
    ];

    $option_displins = [
        'peraturan_disiplin' => [
            0 => '<i style="font-size:12px;"></i>',
            1 => '<i style="font-size:12px;">Ada Peraturan</i>',
            2 => '<i style="font-size:12px;">Ada Buku Peraturan</i>',
            3 => '<i style="font-size:12px;">Disebarkan</i>',
            4 => '<i style="font-size:12px;">Peraturan Menyeluruh</i>',
            5 => '<i style="font-size:12px;">Akujanji Pelajar</i>',
        ],

        'rekod_disiplin' => [
            0 => '<i style="font-size:12px;"></i>',
            1 => '<i style="font-size:12px;">Ada Rekod Disiplin</i>',
            2 => '<i style="font-size:12px;">Didokumentasi</i>',
            3 => '<i style="font-size:12px;">Sistematik</i>',
            4 => '<i style="font-size:12px;">Analisis</i>',
            5 => '<i style="font-size:12px;">Terkini</i>',
        ],

        'pengurusan_tindakan_disiplin' => [
            0 => '<i style="font-size:12px;"></i>',
            1 => '<i style="font-size:12px;">Membuat satu (1) tindakan disiplin</i>',
            2 => '<i style="font-size:12px;">Membuat dua (2) tindakan disiplin</i>',
            3 => '<i style="font-size:12px;">Membuat tiga (3) tindakan disiplin</i>',
            4 => '<i style="font-size:12px;">Membuat empat (4) tindakan disiplin</i>',
            5 => '<i style="font-size:12px;">Membuat kesemua tindakan disiplin</i>',
        ],
    ];
    @endphp

    <style>
        #SkipsNilai7 thead th {
            vertical-align: middle;
            text-align: center;
        }

        #SkipsNilai7 tbody {
            vertical-align: middle;
            /* text-align: center; */
        }

        #SkipsNilai7 table {
            width: 100% !important;
            /* word-wrap: break-word; */
        }
    </style>

    <input type="hidden" name="usertype" value="{{$type}}">
    <input type="hidden" name="butiran_institusi_id" id="butiran_institusi_id" value="{{$butiran_institusi_id}}">

    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="SkipsNilai7">
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
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Disiplin</td>
                </tr>

                @foreach ($displins as $index => $displin)
                    @php
                        $numeric = preg_replace('/[^0-9.]/', '', $displin);
                        $text = trim(preg_replace('/[0-9.]/', '', $displin), '.');

                        $excludeNumber = strpos($displin, 'text-primary') !== false;
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

                        @foreach ($option_displins[$index] as $key => $option_displin)
                            <td>
                                <div class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio" name="{{ $index }}" id="" value="{{$key}}" required @if($disiplin && $disiplin->$index == $key) checked @endif @if($type == 'verfikasi' || $type == 'validasi' || $type == 'laporan') disabled @endif>
                                </div>
                                <br>

                                <div class="d-flex justify-content-center align-items-center">
                                    {!! $option_displin !!}
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    @if($type != 'laporan' && !empty($butiran_id))
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right" onclick="submitform7()">Simpan</button>
    </div>
    @endif

</form>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function submitform7() {
        var formData = new FormData(document.getElementById('displin'));
        var error = false;

        $('form#displin').find('radio, input').each(function() {
            var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        // var url = "{{ route('skips.instrumen-submit', ['tab' => 'displin']) }}"
        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard/displin';

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    if (response.formfilled == true) {
                        window.location.reload();
                    }
               }
            }
        });
   }
</script>
