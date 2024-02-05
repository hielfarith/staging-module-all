<form id="pengajaran">
    <?php
        $butiran_institusi_id = $butiran_id;
        $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
        if ($butiran_institusi_id && $tab1) {
            $pengajaran = json_decode($tab1->pengajaran);
        } else {
            $pengajaran = null;
        }
    ?>

    @php
    $butiran_institusi_id = $butiran_id;
    $pdps = [
        'pengajaran_dan_pembelajaran' => '<a> 4.1 Pengajaran Dan Pembelajaran </a>',
        'kaedah_metodologi_pengajaran' => '<a> 4.2 Kaedah / Metodologi Pengajaran </a>',
        'latihan' => '<a> 4.3 Latihan </a>',
        'penggunaan_bahan_bantu_mengajar' => '<a> 4.4 Penggunaan Bahan Bantu Mengajar </a>',
    ];

    $option_pdps = [
        'pengajaran_dan_pembelajaran' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Kelas Bersedia</i>',
            3 => '<i style="font-size:12px;">Ada, Kelas Bersedia, Guru Bersedia</i>',
            4 => '<i style="font-size:12px;">Ada, Kelas Bersedia, Guru Bersedia, Pelajar Bersedia</i>',
            5 => '<i style="font-size:12px;">Ada, Kelas Bersedia, Guru Bersedia, Pelajar Bersedia, P&P Berlaku</i>',
        ],

        'kaedah_metodologi_pengajaran' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Sesuai</i>',
            3 => '<i style="font-size:12px;">Ada, Sesuai, Masa Mencukupi</i>',
            4 => '<i style="font-size:12px;">Ada, Sesuai, Masa Mencukupi, Melibatkan Semua Pelajar</i>',
            5 => '<i style="font-size:12px;">Ada, Sesuai, Masa Mencukupi, Melibatkan Semua Pelajar, Berkesan</i>',
        ],

        'latihan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Sesuai</i>',
            3 => '<i style="font-size:12px;">Ada, Sesuai, Mencukupi</i>',
            4 => '<i style="font-size:12px;">Ada, Sesuai, Mencukupi, Disemak</i>',
            5 => '<i style="font-size:12px;">Ada, Sesuai, Mencukupi, Disemak, Terdapat Pembetulan</i>',
        ],

        'penggunaan_bahan_bantu_mengajar' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Sesuai</i>',
            3 => '<i style="font-size:12px;">Ada, Sesuai, Masa Mencukupi</i>',
            4 => '<i style="font-size:12px;">Ada, Sesuai, Masa Mencukupi, Melibatkan Semua Pelajar</i>',
            5 => '<i style="font-size:12px;">Ada, Sesuai, Masa Mencukupi, Melibatkan Semua Pelajar, Berkesan</i>',
        ],
    ];
    @endphp


    <style>
        #SkipsNilai4 thead th {
            vertical-align: middle;
            text-align: center;
        }

        #SkipsNilai4 tbody {
            vertical-align: middle;
            /* text-align: center; */
        }

        #SkipsNilai4 table {
            width: 100% !important;
            /* word-wrap: break-word; */
        }
    </style>

    <input type="hidden" name="usertype" value="{{$type}}">
    <input type="hidden" name="butiran_institusi_id" id="butiran_institusi_id" value="{{$butiran_institusi_id}}">
    
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="SkipsNilai4">
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
                    <td colspan="8" class="bg-light-primary fw-bolder">Pengajaran & Pembelajaran</td>
                </tr>
                @foreach ($pdps as $index => $pdp)
                    @php
                    $numeric = preg_replace('/[^0-9.]/', '', $pdp);
                    $text = trim(preg_replace('/[0-9.]/', '', $pdp), '.');

                    $excludeNumber = strpos($pdp, 'text-primary') !== false;
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

                    @foreach ($option_pdps[$index] as $key => $option_pdp)
                    <td>
                        <div class="form-check form-check-inline d-flex justify-content-center align-items-center">
                            <input class="form-check-input" type="radio" name="{{ $index }}" id="{{$index}}" value="{{$key}}" required @if($pengajaran && $pengajaran->$index == $key) checked @endif @if($type == 'verfikasi') disabled @endif>
                        </div>
                        <br>

                        <div class="d-flex justify-content-center align-items-center">
                            {!! $option_pdp !!}
                        </div>
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>
    @if(!empty($butiran_id) && $type == 'borang')
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right" onclick="submitform4()">Simpan</button>
    </div>
    @endif
</form>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function submitform4() {
        var formData = new FormData(document.getElementById('pengajaran'));
        var error = false;
        $('form#pengajaran').find('radio, input').each(function() {
            var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skips.instrumen-submit', ['tab' => 'pengajaran']) }}"
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
