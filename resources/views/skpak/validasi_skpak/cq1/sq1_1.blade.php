<style>
    #verifikasi-sq1-1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq1-1 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq1-1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_1_1 = [
        '1.1.1' => 'Interaksi dan komunikasi (Berdasarkan peratus pendidik yang mengamalkannya, Laras bahasa, Intonasi, Kedudukan ketika bercakap, Gerak syarat, Mimik muka, Kemahiran',
        '1.1.2' => 'Sikap dan sokongan dalam pembinaan hubungan (pujian, galakan, pengukuhan positif dan negatif, mengambil tahu perasaan, memberikan respons)',
    ];

    $options = [
        '1.1.1' => [
            0 => '<i style="font-size:12px;"> Pendidik tidak mengambil inisiatif untuk berinteraksi dengan semua kanak-kanak dan tidak mendengar dan memberi peluang kepada kanak-kanak menggunakan respons yang sesuai. </i>',
            1 => '<i style="font-size:12px;"> Pendidik jarang-jarang mengambil inisiatif untuk berinteraksi dengan semua kanak- kanak dan jarang-jarang mendengar dan memberi peluang kepada kanak-kanak menggunakan respons yang sesuai. </i>',
            2 => '<i style="font-size:12px;"> Pendidik kadang-kadang mengambil inisiatif untuk berinteraksi dengan semua kanak- kanak dan kadang-kadang mendengar dan memberi peluang kepada kanak-kanak menggunakan respons yang sesuai. </i>',
            3 => '<i style="font-size:12px;"> Pendidik sentiasa mengambil inisiatif untuk berinteraksi dengan semua kanak-kanak dan sentiasa mendengar dan memberi peluang kepada kanak-kanak menggunakan respons yang sesuai. </i>',
        ],
        '1.1.2' => [
            0 => '<i style="font-size: 12px;"> Pendidik tidak memberikan sokongan atau pengukuhan dan tidak mengambil tahu perasaan kanak-kanak. </i>',
            1 => '<i style="font-size: 12px;"> Pendidik jarang-jarang memberikan sokongan atau pengukuhan dan jarang-jarang mengambil tahu perasaan kanak- kanak. </i>',
            2 => '<i style="font-size: 12px;"> Pendidik kadang-kadang memberikan sokongan atau pengukuhan dan kadang-kadang mengambil tahu perasaan kanak- kanak. </i>',
            3 => '<i style="font-size: 12px;"> Pendidik sentiasa memberikan sokongan atau pengukuhan dan sentiasa mengambil tahu perasaan kanak-kanak. </i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    Hubungan dan Interaksi
</h5>

<hr>
<?php
    $id = Request::segment(3);
    $itemcq1 = $item = null;
    if ($skpakfilleddata){
        $itemcq1 = json_decode($skpakfilleddata->itemcq1, true);
    }  
    if ($itemcq1 && isset($itemcq1['sq1.1'])) {
        $item = $itemcq1['sq1.1'];
    }
?>
<form id="cq1_sq1">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq1-1">
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
            <tr class="bg-light-danger">
                <td class="text-end" colspan="6">
                    Jumlah
                </td>
                <td class="text-center">Auto-calculated</td>
            </tr>

            <tr class="bg-light-primary fw-bolder">
                <td>SQ1.1</td>
                <td colspan="6">Hubungan dengan Kanak-Kanak</td>
            </tr>
            @foreach ($items_1_1 as $index => $item_1_1)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_1_1 }} </td>

                    <?php
                        $keyString = str_replace(".","_",$index);
                        $catatanData = '';
                        if($item) {
                            $catatanData = $item['catatan_'.$keyString];
                            $keyValue = $item[$keyString];
                        }
                    ?>
                    @foreach ($options[$index] as $key => $option)
                       <?php
                           $checked = '';
                           if ($item) {
                                if ($keyValue == $key+1) {
                                    $checked = 'checked';
                                }
                            }
                        ?>
                        <td>
                            <div class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                <input class="form-check-input" type="radio" name="{{ $index }}" value="{{$key+1}}" required {{$checked}} onchange='assignmandatory("{{$keyString}}",  this)'>
                            </div>
                            <br>

                            <div class="d-flex justify-content-center align-items-center">
                                {!! $option !!}
                            </div>
                        </td>
                    @endforeach

                    <td>Auto-selected</td>
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
                        <textarea name="catatan_{{$index}}" id="" rows="2" class="form-control">{{$catatanData}}</textarea>
                    </td>
                    <td class="bg-dark"></td>
                </tr>
            @endforeach
        </tbody>
        {{-- <tfoot>
            <tr class="bg-light-danger">
                <td class="text-end" colspan="6">
                    Jumlah
                </td>
                <td class="text-center">Auto-calculated</td>
            </tr>
        </tfoot> --}}
    </table>
</div>

<hr>

<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="submitcq1sq1()">
        Simpan
    </button>
</div>

{{-- <div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitcq1sq1()">Simpan</button>
</div> --}}
</form>

<script>
    function submitcq1sq1() {
        var formData = new FormData(document.getElementById('cq1_sq1'));
        var error = false;

         $('form#cq1_sq1').find('radio, input, checkbox, file').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq1_sq1').val();
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
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq1_sq1.1']) }}"
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
