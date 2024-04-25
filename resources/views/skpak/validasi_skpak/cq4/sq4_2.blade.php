<style>
    #verifikasi-sq4-2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq4-2 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq4-2 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_4_2 = [
        '4.2.1' => 'Penglibatan komuniti bersama TASKA (menjalankan aktiviti bersama komuniti)',
        '4.2.2' => 'Hubungan kerjasama TASKA/ pendidik bersama komuniti (pendidik menjalinkan hubungan baik bersama komuniti- menyertai program yang dianjurkan oleh komuniti)',
    ];

    $options = [
        '4.2.1' => [
            0 => '<i style="font-size: 12px"> TASKA tidak merancang dan tidak melaksanakan aktiviti/program bersama komuniti. </i>',
            1 => '<i style="font-size: 12px"> TASKA membuat perancangan tetapi tidak melaksanakan  aktiviti/ program bersama komuniti. </i>',
            2 => '<i style="font-size: 12px"> TASKA tidak merancang tetapi melaksanakan aktiviti/ program bersama komuniti. </i>',
            3 => '<i style="font-size: 12px"> TASKA membuat perancangan dan melaksanakan aktiviti/ program yang melibatkan komuniti. </i>',
        ],
        '4.2.2' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mempunyai jalinan kerjasama yang baik dengan komuniti setempat demi kesejahteraan TASKA, pendidik dan kanak-kanak. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang mempunyai jalinan kerjasama yang baik dengan komuniti setempat demi kesejahteraan TASKA, pendidik dan kanak-kanak. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang mempunyai jalinan kerjasama yang baik dengan komuniti setempat demi kesejahteraan TASKA, pendidik dan kanak- kanak. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa mempunyai jalinan kerjasama yang baik dengan komuniti setempat demi kesejahteraan TASKA, pendidik dan kanak-kanak. </i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    KOLABORASI KELUARGA DAN KOMUNITI
</h5>

<hr>
<?php
    $id = Request::segment(3);
    $itemcq4 = $item = null;
    if ($skpakfilleddata){
        $itemcq4 = json_decode($skpakfilleddata->itemcq4, true);
    }
    if ($itemcq4 && isset($itemcq4['sq4.2'])) {
        $item = $itemcq4['sq4.2'];
    }
    $keyValue = $totalvalue = 0;
?>
<form id="cq4_sq2">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq4-2">
        <thead style="color:black; background-color: #d8bfb0;">
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
                <td>SQ4.2</td>
                <td colspan="6">Jalinan Kerjasama dengan Komuniti</td>
            </tr>
            @foreach ($items_4_2 as $index => $item_4_2)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_4_2 }} </td>

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

                    <td>{{$keyValue}}</td>
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
    <button type="button" class="btn btn-primary float-right" onclick="submitcq4sq2()">Simpan</button>
</div>
@endif
</form>

<script>
    function submitcq4sq2() {
        var formData = new FormData(document.getElementById('cq4_sq2'));
        var error = false;

         $('form#cq4_sq2').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq4_sq2').val();
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
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq4_sq4.2']) }}"
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
