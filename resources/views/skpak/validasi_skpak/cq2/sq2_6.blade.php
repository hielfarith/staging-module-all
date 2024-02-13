<style>
    #verifikasi-sq2-6 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq2-6 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq2-6 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_2_6 = [
        '2.6.1' => 'Perancangan penaksiran perkembangan (merekod setiap perkembangan kanak-kanak dengan baik)',
        '2.6.2' => 'Pelaksanaan perkembangan dan pentaksiran (menggunakan pelbagai kaedah dalam merekod perkembangan kanak-kanak: pemerhatian, soal jawab, jalankan aktiviti, mencatat kejadian semasa, mengambil gambar/ video)',
        '2.6.3' => 'Amalan reflektif dan tindakan susulan (mencatatkan kekuatan dan kelemahan serta penambahbaikkan aktiviti)',
        '2.6.4' => 'Perkongsian dengan Keluarga (perbincangan bersama keluarga kanak-kanak mengenai perkembangan)',
        '2.6.5' => 'Pengesanan awal dan rekod (mempunyai perancangan  pentaksiran contohnya developmental alert checklist by NCDC)',
    ];

    $options = [
        '2.6.1' => [
            0 => '<i style="font-size: 12px">Pendidik tidak mempunyai perkembangan dan pentaksiran.</i>',
            1 => '<i style="font-size: 12px">Pendidik mempunyai perancangan perkembangan dan pentaksiran yang tidak lengkap dan tidak bersesuaian dengan perkembangan kanak-kanak</i>',
            2 => '<i style="font-size: 12px">Pendidik mempunyai perancangan perkembangan dan pentaksiran yang tidak lengkap tetapi bersesuaian dengan perkembangan kanak-kanak</i>',
            3 => '<i style="font-size: 12px">Pendidik mempunyai perancangan perkembangan dan pentaksiran yang lengkap dan bersesuaian dengan perkembangan kanak-kanak</i>',
        ],
        '2.6.2' => [
            0 => '<i style="font-size: 12px"> TASKA tidak melaksanakan perkembangan dan pentaksiran secara berterusan menggunakan pelbagai kaedah pentaksiran yang bersesuaian. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang melaksanakan perkembangan dan pentaksiran secara berterusan menggunakan pelbagai kaedah pentaksiran yang bersesuaian. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang melaksanakan perkembangan dan pentaksiran secara berterusan menggunakan pelbagai kaedah pentaksiran yang bersesuaian. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa melaksanakan perkembangan dan pentaksiran secara berterusan menggunakan pelbagai kaedah pentaksiran yang bersesuaian. </i>',
        ],
        '2.6.3' => [
            0 => '<i style="font-size: 12px;"> TASKA tidak membuat amalan reflektif selepas aktiviti pembelajaran dan membuat penambahbaikan sekiranya perlu. </i>',
            1 => '<i style="font-size: 12px;"> TASKA jarang-jarang membuat amalan reflektif selepas aktiviti pembelajaran dan membuat penambahbaikan sekiranya perlu. </i>',
            2 => '<i style="font-size: 12px;"> TASKA kadang-kadang membuat amalan reflektif selepas aktiviti pembelajaran dan membuat penambahbaikan sekiranya perlu. </i>',
            3 => '<i style="font-size: 12px;"> TASKA sentiasa membuat amalan reflektif selepas aktiviti pembelajaran dan membuat penambahbaikan sekiranya perlu. </i>',
        ],
        '2.6.4' => [
            0 => '<i style="font-size: 12px;"> Pendidik tidak berkongsi maklumat pentaksiran kanak- kanak secara komunikasi dua hala dengan keluarga serta tidak memberi cadangan penyelesaian yang bersesuaian. </i>',
            1 => '<i style="font-size: 12px;"> Pendidik jarang-jarang berkongsi maklumat pentaksiran kanak- kanak secara komunikasi dua hala dengan keluarga serta jarang-jarang memberi cadangan penyelesaian yang bersesuaian. </i>',
            2 => '<i style="font-size: 12px;"> Pendidik kadang-kadang berkongsi maklumat pentaksiran kanak- kanak secara komunikasi dua hala dengan keluarga serta kadang-kadang memberi cadangan penyelesaian yang bersesuaian. </i>',
            3 => '<i style="font-size: 12px;"> Pendidik sentiasa berkongsi maklumat pentaksiran kanak- kanak secara komunikasi dua hala dengan keluarga serta sentiasa memberi cadangan penyelesaian yang bersesuaian. </i>',
        ],
        '2.6.5' => [
            0 => '<i style="font-size: 12px;"> TASKA tidak melaksanakan prosedur pengesanan awal yang menyeluruh dan tidak mempunyai rekod perkembangan kanak-kanak. </i>',
            1 => '<i style="font-size: 12px;"> TASKA jarang-jarang melaksanakan prosedur pengesanan awal yang menyeluruh dan tidak mempunyai rekod perkembangan kanak-kanak. </i>',
            2 => '<i style="font-size: 12px;"> TASKA kadang-kadang melaksanakan prosedur pengesanan awal yang menyeluruh dan mempunyai rekod perkembangan kanak-kanak. </i>',
            3 => '<i style="font-size: 12px;"> TASKA sentiasa melaksanakan prosedur pengesanan awal yang menyeluruh dan mempunyai rekod perkembangan kanak-kanak. </i>',
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
    if ($itemcq2 && isset($itemcq2['sq2.6'])) {
        $item = $itemcq2['sq2.6'];
    }
    $keyValue = $totalvalue = 0;
?>
<form id="cq2_sq6">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq2-6">
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
                <td>SQ2.6</td>
                <td colspan="6">Penaksiran Perkembangan</td>
            </tr>
            @foreach ($items_2_6 as $index => $item_2_6)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_2_6 }} </td>

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
    <button type="button" class="btn btn-primary float-right" onclick="submitcq2sq6()">Simpan</button>
</div>
</form>
<script>
    function submitcq2sq6() {
        var formData = new FormData(document.getElementById('cq2_sq6'));
        var error = false;

         $('form#cq2_sq6').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq2_sq6').val();
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
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq2_sq2.6']) }}"
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
