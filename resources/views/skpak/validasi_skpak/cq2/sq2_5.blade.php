<style>
    #verifikasi-sq2-5 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq2-5 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq2-5 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_2_5 = [
        '2.5.1' => 'Berasaskan perkembangan holistik (bahan dan peralatan yang digunakan sesuai dengan perkembangan kanak- kanak)',
        '2.5.2' => 'Berasaskan aktiviti harian dan kemahiran (sumber dan peralatan yang digunakan dalam rutin harian sesuai untuk merangsang kemahiran kanak- kanak)',
        '2.5.3' => 'Kreatif, lestari dan inovatif (menghasilkan sumber pembelajaran yang kreatif, lestari, inovatif)',
    ];

    $options = [
        '2.5.1' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak peka tentang perlakuan kanak-kanak yang memerlukan bimbingan, dicatatkan dan mudah dirujuk. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang peka tentang perlakuan kanak-kanak yang memerlukan bimbingan, dicatatkan dan mudah dirujuk. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang peka tentang perlakuan kanak-kanak yang memerlukan bimbingan, dicatatkan dan mudah dirujuk. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa peka tentang perlakuan kanak-kanak yang memerlukan bimbingan, dicatatkan dan mudah dirujuk. </i>',
        ],
        '2.5.2' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak menggunakan strategi yang sesuai dalam mengurus tingkah laku kanak- kanak bermasalah. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang menggunakan strategi yang sesuai dalam mengurus tingkah laku kanak- kanak bermasalah. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang menggunakan strategi yang sesuai dalam mengurus tingkah laku kanak- kanak bermasalah. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa menggunakan strategi yang sesuai dalam mengurus tingkah laku kanak- kanak bermasalah. </i>',
        ],
        '2.5.3' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak mengadakan perbincangan bersama ibubapa berkaitan dengan tingkah laku kanak-kanak bermasalah. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang mengadakan perbincangan bersama ibubapa berkaitan dengan tingkah laku kanak-kanak bermasalah. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang mengadakan perbincangan bersama ibubapa berkaitan dengan tingkah laku kanak-kanak bermasalah. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa mengadakan perbincangan bersama ibubapa berkaitan dengan tingkah laku kanak-kanak bermasalah. </i>',
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
    // if ($skpakfilleddata){
    //     $itemcq2 = json_decode($skpakfilleddata->itemcq2, true);
    // }
    if ($itemcq2 && isset($itemcq2['sq2.5'])) {
        $item = $itemcq2['sq2.5'];
    }
    $keyValue = $totalvalue = 0;
?>
<form id="cq2_sq5">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq2-5">
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
                <td>SQ2.5</td>
                <td colspan="6">Tingkah Laku Kanak-kanak (Memerlukan Bimbingan)</td>
            </tr>
            @foreach ($items_2_5 as $index => $item_2_5)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_2_5 }} </td>

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

                    <td id="jumlah_{{$keyString}}">{{ $keyValue }}</td>
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
    <button type="button" class="btn btn-primary float-right" onclick="submitcq2sq5()">Simpan</button>
</div>
</form>
<script>
    function submitcq2sq5() {
        var formData = new FormData(document.getElementById('cq2_sq5'));
        var error = false;

         $('form#cq2_sq5').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq2_sq5').val();
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
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq2_sq2.5']) }}"
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
