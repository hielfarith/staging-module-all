<style>
    #verifikasi-sq2-4 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq2-4 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq2-4 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_2_4 = [
        '2.4.1' => 'Ruang (penggunaan ruang memenuhi keperluan perkembangan, mengikut jumlah standard (3.5 meter: 1 kanak- kanak)',
        '2.4.2' => 'Sudut Pembelajaran (sudut mengikut 6 bidang perkembangan dan menarik minat kanak-kanak)',
        '2.4.3' => 'Pencahayaan, pengudaraan dan suhu (suhu, udara, cahaya yang bersesuaian dengan kanak-kanak, bahagian bilik kanak-kanak, bilik belajar dan bilik makan)',
        '2.4.4' => 'Barangan peribadi (tempat penyimpanan barang berlabel, teratur, kemas, bersih dan mudah dicapai)',
        '2.4.5' => 'Hasil kerja kanak-kanak (hasil kerja yang dipamerkan berlabel dengan tarikh, nama, tajuk aktiviti)',
        '2.4.6' => 'Peralatan dan perabot (peralatan dan perabot adalah mencukupi, pelbagai, sesuai perkembangan kanak-kanak, dsb)',
    ];

    $options = [
        '2.4.1' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mempunyai ruang mengikut nisbah kanak-kanak dan tidak memaksimumkan penggunaan ruang.</i>',
            1 => '<i style="font-size: 12px"> TASKA tidak mempunyai ruang mengikut nisbah kanak-kanak tetapi memaksimumkan penggunaan ruang.</i>',
            2 => '<i style="font-size: 12px"> TASKA mempunyai ruang mengikut nisbah kanak-kanak tetapi tidak memaksimumkan penggunaan ruang.</i>',
            3 => '<i style="font-size: 12px"> TASKA mempunyai ruang mengikut nisbah kanak-kanak dan memaksimumkan penggunaan ruang.</i>',
        ],
        '2.4.2' => [
            0 => '<i style="font-size: 12px"> TASKA tidak menyediakan sudut pembelajaran. </i>',
            1 => '<i style="font-size: 12px"> TASKA menyediakan sudut pembelajaran tetapi tidak mengikut aspek perkembangan pelbagai dan tidak merangsang minat kanak-kanak untuk belajar. </i>',
            2 => '<i style="font-size: 12px"> TASKA menyediakan sudut pembelajaran mengikut aspek perkembangan pelbagai tetapi tidak merangsang minat kanak- kanak untuk belajar. </i>',
            3 => '<i style="font-size: 12px"> TASKA menyediakan sudut pembelajaran mengikut aspek perkembangan pelbagai dan merangsang minat kanak- kanak untuk belajar. </i>',
        ],
        '2.4.3' => [
            0 => '<i style="font-size: 12px;"> TASKA mempunyai pencahayaan, pengudaraan dan suhu yang tidak sesuai.</i>',
            1 => '<i style="font-size: 12px;"> TASKA mempunyai pencahayaan, pengudaraan dan suhu yang kurang sesuai.</i>',
            2 => '<i style="font-size: 12px;"> TASKA mempunyai pencahayaan, pengudaraan dan suhu yang sesuai.</i>',
            3 => '<i style="font-size: 12px;"> TASKA mempunyai pencahayaan, pengudaraan dan suhu yang sangat sesuai.</i>',
        ],
        '2.4.4' => [
            0 => '<i style="font-size: 12px;"> TASKA mempunyai tempat penyimpanan barang peribadi kanak-kanak yang tidak teratur dan tidak  mudah dicapai oleh kanak-kanak. </i>',
            1 => '<i style="font-size: 12px;"> TASKA mempunyai tempat penyimpanan barang peribadi kanak-kanak yang tidak teratur tetapi mudah dicapai oleh kanak- kanak. </i>',
            2 => '<i style="font-size: 12px;"> TASKA mempunyai tempat penyimpanan barang peribadi kanak-kanak yang teratur tetapi tidak mudah dicapai oleh kanak- kanak. </i>',
            3 => '<i style="font-size: 12px;"> TASKA mempunyai tempat penyimpanan barang peribadi kanak-kanak yang teratur dan mudah dicapai oleh kanak- kanak. </i>',
        ],
        '2.4.5' => [
            0 => '<i style="font-size: 12px;"> TASKA tidak mempamerkan hasil kerja kanak-kanak.</i>',
            1 => '<i style="font-size: 12px;"> TASKA mempamerkan hasil kerja kanak-kanak, tetapi tidak berlabel dan tidak terkini.</i>',
            2 => '<i style="font-size: 12px;"> TASKA mempamerkan hasil kerja kanak-kanak, berlabel tetapi tidak terkini.</i>',
            3 => '<i style="font-size: 12px;"> TASKA sentiasa mempamerkan hasil kerja kanak-kanak, berlabel dan terkini.</i>',
        ],
        '2.4.6' => [
            0 => '<i style="font-size: 12px;"> TASKA mempunyai perabot dan peralatan yang tidak pelbagai dan tidak bersesuaian dengan perkembangan kanak-kanak.</i>',
            1 => '<i style="font-size: 12px;"> TASKA mempunyai perabot dan peralatan yang pelbagai tetapi tidak bersesuaian dengan perkembangan kanak-kanak.</i>',
            2 => '<i style="font-size: 12px;"> TASKA mempunyai perabot dan peralatan yang tidak pelbagai tetapi bersesuaian dengan perkembangan kanak-kanak.</i>',
            3 => '<i style="font-size: 12px;"> TASKA mempunyai perabot dan peralatan yang pelbagai dan bersesuaian dengan perkembangan kanak-kanak.</i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    PENGASUHAN DAN PEMBELAJARAN
</h5>

<hr>
<?php
    $id = Request::segment(3);
    $itemcq2 = $item = null;
    if ($skpakfilleddata){
        $itemcq2 = json_decode($skpakfilleddata->itemcq2, true);
    }
    if ($itemcq2 && isset($itemcq2['sq2.4'])) {
        $item = $itemcq2['sq2.4'];
    }
    $keyValue = $totalvalue = 0;
?>
<form id="cq2_sq4">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq2-4">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kriteria</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-light-primary fw-bolder">
                <td>SQ2.4</td>
                <td colspan="6">Persekitaran Fizikal</td>
            </tr>
            @foreach ($items_2_4 as $index => $item_2_4)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_2_4 }} </td>

                     <?php
                        $keyString = str_replace(".","_",$index);
                        $catatanData = '';
                        $uploadData = false;
                        if($item) {
                            $catatanData = $item['catatan_'.$keyString];
                            $uploadData = isset($item['upload_'.$keyString]) ? $item['upload_'.$keyString] : false ;
                            $keyValue = $item[$keyString];
                            $totalvalue += $keyValue;
                        }
                    ?>
                    @foreach ($options[$index] as $key => $option)
                       <?php
                        $key = $key+1;
                           $checked = '';
                           if ($item) {
                                if ($keyValue == $key) {
                                    $checked = 'checked';
                                }
                            }
                        ?>
                        <td>
                            <div class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                <input class="form-check-input" type="radio" name="{{ $index }}" value="{{$key}}" required {{$checked}} onchange='assignmandatory("{{$keyString}}",  this)'>
                            </div>
                            <br>

                            <div class="d-flex justify-content-center align-items-center">
                                {!! $option !!}
                            </div>
                        </td>
                    @endforeach

                    <td id="jumlah_{{$keyString}}">{{ $keyValue }}</td>
                </tr>
                <tr class="bg-light-primary">
                    <td colspan="6">
                        <label class="fw-bolder">Upload: </label>
                        <input type="file" name="upload_{{$keyString}}[]" id="uploadfile_{{$keyString}}" class="form-control" multiple accept="image/*" onchange='filechange("uploadfile_{{$keyString}}", "filelist_{{$keyString}}", this)'>
                        <pre id="filelist_{{$keyString}}" style="display:none;"></pre>
                         @if($uploadData)
                            @foreach($uploadData as $val)
                            <?php
                                $val = str_replace('public/uploads/upload_'.$keyString.'/'.$id.'/', '', $val);
                            ?>
                            <pre class="uploadfile_{{$keyString}}_view">{{$val}}</pre>
                            @endforeach
                            <input type="hidden" name="uploadfile_{{$keyString}}_list" value="{{json_encode($item['upload_'.$keyString])}}" id="uploadfile_{{$keyString}}_list">
                        @endif
                    </td>
                </tr>
                <tr class="bg-light-success">
                    <td colspan="6">
                        <label class="fw-bolder">Catatan: </label>
                        <textarea name="catatan_{{$index}}" id="" rows="2" class="form-control">{{ $catatanData }}</textarea>
                    </td>
                    <td class="bg-dark"></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-danger">
                <td class="text-end" colspan="6">
                    Jumlah
                </td>
                <td class="text-center">{{$totalvalue}}</td>
            </tr>
        </tfoot>
    </table>
</div>

<hr>

<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitcq2sq4()">Simpan</button>
</div>
</form>
<script>
    function submitcq2sq4() {
        var formData = new FormData(document.getElementById('cq2_sq4'));
        var error = false;

         $('form#cq2_sq4').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq2_sq4').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }

             if (this.required && this.type == 'file') {
                if($('#'+this.id)[0].files.length === 0){
                    error = true;
                }
            }
        });

        if (error) {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq2_sq2.4']) }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.success) {
                    Swal.fire('Success', 'Berjaya', 'success');
               }
            }
        });

    };
</script>
