<style>
    #verifikasi-sq3-3 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq3-3 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq3-3 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_3_3 = [
        '3.3.1' => 'Amalan kebersihan bayi dan kanak-kanak (memastikan amalan kebersihan kanak-kanak dan mematuhi SOP) (amalan basuh tangan, penggunaan tandas, tatacara mandi, dsb.)',
        '3.3.2' => 'Amalan kebersihan pendidik (menunjukkan amalan kendiri dan menitikberatkan SOP kebersihan TASKA)',
        '3.3.3' => 'Kebersihan ruang dalam (kebersihan TASKA dijalankan secara rutin dan berkala- rujuk jadual pembersihan TASKA)',
        '3.3.4' => 'Kebersihan ruang luar (kebersihan TASKA dijalankan secara rutin dan berkala- rujuk jadual pembersihan TASKA)',
        '3.3.5' => 'Peralatan/ bahan kebersihan (peralatan/ bahan kebersihan dilabel dan disimpan)',
    ];

    $options = [
        '3.3.1' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak memastikan amalan kebersihan kanak-kanak dan tidak mematuhi langkah- langkah kebersihan mengikut SOP yang ditetapkan sepanjang berada di TASKA. </i>',
            1 => '<i style="font-size: 12px"> Pendidik tidak memastikan amalan kebersihan kanak-kanak namun mematuhi langkah- langkah kebersihan mengikut SOP yang ditetapkan sepanjang berada di TASKA. </i>',
            2 => '<i style="font-size: 12px"> Pendidik memastikan amalan kebersihan kanak-kanak tetapi tidak mematuhi langkah-langkah kebersihan mengikut SOP yang ditetapkan sepanjang berada di TASKA. </i>',
            3 => '<i style="font-size: 12px"> Pendidik memastikan amalan kebersihan kanak-kanak dan mematuhi langkah-langkah kebersihan mengikut SOP yang ditetapkan sepanjang berada di TASKA. </i>',
        ],
        '3.3.2' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak menunjukkan amalan kebersihan kendiri dan tidak menitikberatkan SOP kebersihan di TASKA.</i>',
            1 => '<i style="font-size: 12px"> Pendidik tidak menunjukkan amalan kebersihan kendiri tetapi menitikberatkan SOP kebersihan di TASKA.</i>',
            2 => '<i style="font-size: 12px"> Pendidik menunjukkan amalan kebersihan kendiri tetapi tidak menitikberatkan SOP kebersihan di TASKA.</i>',
            3 => '<i style="font-size: 12px"> Pendidik menunjukkan amalan kebersihan kendiri dan menitikberatkan SOP kebersihan di TASKA.</i>',
        ],
        '3.3.3' => [
            0 => '<i style="font-size: 12px"> TASKA tidak menekankan aspek kebersihan dalam bangunan secara rutin dan berkala. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang menekankan aspek kebersihan dalam bangunan secara rutin dan berkala. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang menekankan aspek kebersihan dalam bangunan secara rutin dan berkala. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa menekankan aspek kebersihan dalam bangunan secara rutin dan berkala. </i>',
        ],
        '3.3.4' => [
            0 => '<i style="font-size: 12px"> TASKA tidak menekankan aspek kebersihan luar bangunan secara rutin dan berkala </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang menekankan aspek kebersihan luar bangunan secara rutin dan berkala. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang menekankan aspek kebersihan luar bangunan secara rutin dan berkala. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa menekankan aspek kebersihan luar bangunan secara rutin dan berkala. </i>',
        ],
        '3.3.5' => [
            0 => '<i style="font-size: 12px"> Peralatan/ bahan kebersihan di TASKA tidak dilabel dengan kemas dan tidak disimpan di tempat yang selamat. </i>',
            1 => '<i style="font-size: 12px"> Peralatan/ bahan kebersihan di TASKA tidak dilabel dengan kemas namun disimpan di tempat yang selamat. </i>',
            2 => '<i style="font-size: 12px"> Peralatan/ bahan kebersihan di TASKA dilabel dengan kemas tetapi tidak disimpan di tempat yang selamat. </i>',
            3 => '<i style="font-size: 12px"> Peralatan/ bahan kebersihan di TASKA dilabel dengan kemas dan disimpan di tempat yang selamat. </i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    KESIHATAN, KESELAMATAN, KEBERSIHAN DAN PEMAKANAN
</h5>

<hr>
<?php
    $id = Request::segment(3);
    $itemcq3 = $item = null;
    if ($skpakfilleddata){
        $itemcq3 = json_decode($skpakfilleddata->itemcq3, true);
    }
    if ($itemcq3 && isset($itemcq3['sq3.3'])) {
        $item = $itemcq3['sq3.3'];
    }
    $keyValue = $totalvalue = 0;
?>
<form id="cq3_sq3">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq3-3">
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
                <td>SQ3.2</td>
                <td colspan="6">Kebersihan</td>
            </tr>
            @foreach ($items_3_3 as $index => $item_3_3)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_3_3 }} </td>
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
                                <input class="form-check-input" type="radio" name="{{ $index }}" value="{{$key}}" required {{$checked}} onchange='assignmandatory("{{$keyString}}",  this)' {{$disabled}}>
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
                        <input type="file" name="upload_{{$keyString}}[]" id="uploadfile_{{$keyString}}" class="form-control" multiple accept="image/*" onchange='filechange("uploadfile_{{$keyString}}", "filelist_{{$keyString}}", this)' {{$disabled}}>
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
                    <textarea name="catatan_{{$index}}" id="" rows="2" class="form-control" {{$disabled}}>{{ $catatanData }}</textarea>
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
@if($disabled != 'disabled')
<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitcq3sq3()">Simpan</button>
</div>
@endif
</form>
<script>
    function submitcq3sq3() {
        var formData = new FormData(document.getElementById('cq3_sq3'));
        var error = false;

         $('form#cq3_sq3').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq3_sq3').val();
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
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq3_sq3.3']) }}"
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
