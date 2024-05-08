<form id="pengurusan_kurikulum">
    <?php
    $butiran_institusi_id = $butiran_id;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $pengurusan_kurikulum = json_decode($tab1->pengurusan_kurikulum);
    } else {
        $pengurusan_kurikulum = null;
    }
?>
    @php
    $butiran_institusi_id = $butiran_id;
    $kurikulums = [
        'sukatan_pelajaran' => '<a> 3.1 Sukatan Pelajaran </a>',
        'dokumen_rekod_mengajar' => '<a> 3.2 Dokumen Rekod Mengajar </a>',
        'mesyuarat_kurikulum' => '<a> 3.3 Mesyuarat Kurikulum </a>',
        'mata_pelajaran_yang_diajar' => '<a> 3.4 Mata Pelajaran Yang Diajar </a>',
        'bahan_bantu_mengajar' => '<a> 3.5 Bahan Bantu Mengajar </a>',
        'rekod_pencerapan' => '<a> 3.6 Rekod Pencerapan </a>',
    ];

    $option_kurikulums = [
    'sukatan_pelajaran' => [
    0 => '',
    1 => '<i style="font-size:12px">Ada</i>',
    2 => '<i style="font-size:12px">Ada, Setiap Program/Kursus</i>',
    3 => '<i style="font-size:12px">Ada, Setiap Program/Kursus, Difailkan</i>',
    4 => '<i style="font-size:12px">Ada, Setiap Program/Kursus, Difailkan, Disebar kepada Guru</i>',
    5 => '<i style="font-size:12px">Ada, Setiap Program/Kursus, Difailkan, Disebar kepada Guru, Mudah Dirujuk</i>',
    ],

    'dokumen_rekod_mengajar' => [
    0 => '',
    1 => '<i style="font-size:12px">Ada</i>',
    2 => '<i style="font-size:12px">Ada, Direkodkan Setiap Sesi PDP</i>',
    3 => '<i style="font-size:12px">Ada, Direkodkan Setiap Sesi PDP, Kebolehcapaian</i>',
    4 => '<i style="font-size:12px">Ada, Direkodkan Setiap Sesi PDP, Kebolehcapaian, Ikut Sukatan Pelajaran</i>',
    5 => '<i style="font-size:12px">Ada, Direkodkan Setiap Sesi PDP, Kebolehcapaian, Ikut Sukatan Pelajaran, Disemak dan Diselia</i>',
    ],

    'mesyuarat_kurikulum' => [
    0 => '',
    1 => '<i style="font-size:12px">Ada</i>',
    2 => '<i style="font-size:12px">Ada, Mesyuarat Diminitkan</i>',
    3 => '<i style="font-size:12px">Ada, Mesyuarat Diminitkan, Ada Fail Minit</i>',
    4 => '<i style="font-size:12px">Ada, Mesyuarat Diminitkan, Ada Fail Minit, Minit Dilebarkan</i>',
    5 => '<i style="font-size:12px">Ada, Mesyuarat Diminitkan, Ada Fail Minit, Minit Dilebarkan, Tindakan Susulan</i>',
    ],

    'mata_pelajaran_yang_diajar' => [
    0 => '',
    1 => '<i style="font-size:12px">Ada</i>',
    2 => '<i style="font-size:12px">Ada, Mematuhi Kelulusan</i>',
    3 => '<i style="font-size:12px">Ada, Mematuhi Kelulusan, Memenuhi Sukatan</i>',
    4 => '<i style="font-size:12px">Ada, Mematuhi Kelulusan, Memenuhi Sukatan, Memenuhi Jumlah Jam</i>',
    5 => '<i style="font-size:12px">Ada, Mematuhi Kelulusan, Memenuhi Sukatan, Memenuhi Jumlah Jam, Mematuhi Jadual Waktu</i>',
    ],

    'bahan_bantu_mengajar' => [
    0 => '',
    1 => '<i style="font-size:12px">Ada</i>',
    2 => '<i style="font-size:12px">Ada, Digunakan</i>',
    3 => '<i style="font-size:12px">Ada, Digunakan, Rekod Penggunaan</i>',
    4 => '<i style="font-size:12px">Ada, Digunakan, Rekod Penggunaan, Penyimpanan & Pemulihan</i>',
    5 => '<i style="font-size:12px">Ada, Digunakan, Rekod Penggunaan, Penyimpanan & Pemulihan, Peruntukan</i>',
    ],

    'rekod_pencerapan' => [
    0 => '',
    1 => '<i style="font-size:12px">Jadual Pencerapan</i>',
    2 => '<i style="font-size:12px">Jadual Pencerapan, Fail Pencerapan</i>',
    3 => '<i style="font-size:12px">Jadual Pencerapan, Fail Pencerapan, Rekod & Lampiran</i>',
    4 => '<i style="font-size:12px">Jadual Pencerapan, Fail Pencerapan, Rekod & Lampiran, Kebolehcapaian</i>',
    5 => '<i style="font-size:12px">Jadual Pencerapan, Fail Pencerapan, Rekod & Lampiran, Kebolehcapaian, Tindakan Susulan</i>',
    ],

    ];

    @endphp


    <style>
        #SkipsNilai3 thead th {
            vertical-align: middle;
            text-align: center;
        }

        #SkipsNilai3 tbody {
            vertical-align: middle;
            /* text-align: center; */
        }

        #SkipsNilai3 table {
            width: 100% !important;
            /* word-wrap: break-word; */
        }

    </style>

    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="SkipsNilai3">
            <thead style="color:black; background-color: #d8bfb0;">
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
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Pengurusan Kurikulum</td>
                </tr>

                @foreach ($kurikulums as $index => $kurikulum)
                    @php
                        $numeric = preg_replace('/[^0-9.]/', '', $kurikulum);
                        $text = trim(preg_replace('/[0-9.]/', '', $kurikulum), '.');

                        $excludeNumber = strpos($kurikulum, 'text-primary') !== false;
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

                        @foreach ($option_kurikulums[$index] as $key => $option_kurikulum)
                            <td>
                                <div class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio" name="{{ $index }}" id="" value="{{$key}}" @if($pengurusan_kurikulum && $pengurusan_kurikulum->$index == $key) checked @endif @if($type == 'verfikasi' || $type == 'validasi' || $type == 'laporan') disabled @endif>
                                </div>
                                <br>

                                <div class="d-flex justify-content-center align-items-center">
                                    {!! $option_kurikulum !!}
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
        <button type="button" class="btn btn-primary float-right" onclick="submitform3()">Simpan</button>
    </div>
    @endif

</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function submitform3() {
        var formData = new FormData(document.getElementById('pengurusan_kurikulum'));
        var error = false;

        $('form#pengurusan_kurikulum').find('radio, input').each(function() {
            var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        // var url = "{{ route('skips.instrumen-submit', ['tab' => 'pengurusan_kurikulum']) }}"
        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard/pengurusan_kurikulum';

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
