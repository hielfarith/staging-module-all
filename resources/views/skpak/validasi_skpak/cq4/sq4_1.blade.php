<style>
    #verifikasi-sq4-1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq4-1 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq4-1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_4_1 = [
        '4.1.1' => 'Proses pengenalan dan orientasi (taklimat dijlankan, urusan dan dokumen pendaftaran diuruskan dengan lengkap) (Rujuk garis panduan bagi dokumendan urusan pendaftaran)',
        '4.1.2' => 'Perancangan penglibatan keluarga (garis panduan dan polisi penglibatan ibu bapa & melibatkan ibu bapa dalam perancangan aktiviti/ program tahunan)',
        '4.1.3' => 'Aktiviti Penglibatan Keluarga (penglibatan aktif dan menubuhkan persatuan/ organisasi bersama ibu bapa)',
        '4.1.4' => 'Khidmat sokongan (mempunyai kesungguhan dalam membantu keluarga dengan mempunyai senarai khidmat sokongan) (hal kanak-kanak: masalah pembelajaran, perkembangan bakat/ kebolehan kanak-kanak, rujuk garis panduan)',
    ];

    $options = [
        '4.1.1' => [
            0 => '<i style="font-size: 12px"> TASKA tidak menjalankan sesi taklimat untuk menerangkan polisi dan garis panduan TASKA serta tidak memastikan urusan dan dokumen pendaftaran  disediakan. </i>',
            1 => '<i style="font-size: 12px"> TASKA tidak menjalankan sesi taklimat untuk menerangkan polisi dan garis panduan TASKA tetapi memastikan urusan dan dokumen pendaftaran disediakan dengan lengkap. </i>',
            2 => '<i style="font-size: 12px"> TASKA menjalankan sesi taklimat untuk menerangkan polisi dan garis panduan TASKA tetapi tidak memastikan urusan dan dokumen pendaftaran disediakan. </i>',
            3 => '<i style="font-size: 12px"> TASKA menjalankan sesi taklimat untuk menerangkan polisi dan garis panduan TASKA serta memastikan urusan dan dokumen pendaftaran disediakan dengan lengkap. </i>',
        ],
        '4.1.2' => [
            0 => '<i style="font-size: 12px"> TASKA tidak menyediakan polisi dan garis panduan bagi penglibatan ibu bapa dan tidak melibatkan ibu bapa dalam perancangan aktiviti/ program tahunan .</i>',
            1 => '<i style="font-size: 12px"> TASKA tidak menyediakan polisi dan garis panduan bagi penglibatan ibu bapa tetapi melibatkan ibu bapa dalam perancangan aktiviti/ program tahunan. </i>',
            2 => '<i style="font-size: 12px"> TASKA memastikan ibu bapa menjalankan penglibatan yang aktif tetapi tidak menubuhkan organisasi/ persatuan bersama ibu bapa. </i>',
            3 => '<i style="font-size: 12px"> TASKA memastikan ibu bapa menjalankan penglibatan yang aktif dan menubuhkan organisasi/ persatuan bersama ibu bapa. </i>',
        ],
        '4.1.3' => [
            0 => '<i style="font-size: 12px"> TASKA tidak memastikan ibu bapa menjalankan penglibatan yang aktif dan tidak menubuhkan organisasi/ persatuan bersama ibu bapa. </i>',
            1 => '<i style="font-size: 12px"> TASKA tidak memastikan ibu bapa menjalankan penglibatan yang aktif tetapi menubuhkan organisasi/ persatuan bersama ibu bapa. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang prihatin terhadap perubahan emosi dan mental kanak-kanak serta mengetahui tindakan yang sewajarnya. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa prihatin terhadap perubahan emosi dan mental kanak-kanak serta mengetahui tindakan yang sewajarnya. </i>',
        ],
        '4.1.4' => [
            0 => '<i style="font-size: 12px"> TASKA tidak menunjukkan kesungguhan bagi membantu keluarga dalam hal kanak-kanak dan tidak mempunyai senarai khidmat sokongan untuk dirujuk keluarga. </i>',
            1 => '<i style="font-size: 12px"> TASKA tidak menunjukkan kesungguhan bagi membantu keluarga dalam hal kanak-kanak tetapi mempunyai senarai khidmat sokongan untuk dirujuk keluarga. </i>',
            2 => '<i style="font-size: 12px"> TASKA menunjukkan kesungguhan bagi membantu keluarga dalam hal kanak-kanak tetapi tidak mempunyai senarai khidmat sokongan untuk dirujuk keluarga. </i>',
            3 => '<i style="font-size: 12px"> TASKA menunjukkan kesungguhan bagi membantu keluarga dalam hal kanak-kanak dan mempunyai senarai khidmat sokongan untuk dirujuk keluarga. </i>',
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
    // if ($skpakfilleddata){
    //     $itemcq4 = json_decode($skpakfilleddata->itemcq4, true);
    // }
    if ($itemcq4 && isset($itemcq4['sq4.1'])) {
        $item = $itemcq4['sq4.1'];
    }
    $keyValue = $totalvalue = 0;
?>
<form id="cq4_sq1">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq4-1">
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
                <td>SQ4.1</td>
                <td colspan="6">Penglibatan dengan Keluarga</td>
            </tr>
            @foreach ($items_4_1 as $index => $item_4_1)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_4_1 }} </td>

                    <?php
                        $keyString = str_replace(".","_",$index);
                        $catatanData = '';
                        if($item) {
                            $catatanData = $item['catatan_'.$keyString];
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

                    <td>{{$keyValue}}</td>
                </tr>
                <tr class="bg-light-primary">
                    <td colspan="6">
                        <label class="fw-bolder">Upload: </label>
                        <input type="file" name="upload_{{$keyString}}[]" id="uploadfile_{{$keyString}}" class="form-control" multiple accept="image/*" onchange='filechange("uploadfile_{{$keyString}}", "filelist_{{$keyString}}", this)'>
                        <pre id="filelist_{{$keyString}}" style="display:none;"></pre>
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
    <button type="button" class="btn btn-primary float-right" onclick="submitcq4sq1()">Simpan</button>
</div>
</form>

<script>
    function submitcq4sq1() {
        var formData = new FormData(document.getElementById('cq4_sq1'));
        var error = false;

         $('form#cq4_sq1').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq4_sq1').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq4_sq4.1']) }}"
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

<script>
    function submitcq3sq4() {
        var formData = new FormData(document.getElementById('cq3_sq4'));
        var error = false;

         $('form#cq3_sq4').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq3_sq4').val();
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
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq3_sq3.4']) }}"
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
