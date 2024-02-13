<style>
    #verifikasi-sq3-4 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq3-4 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq3-4 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_3_4 = [
        '3.4.1' => 'Kualiti bahan makanan (memastikan tahap kualiti bahan makanan mengikut garis panduan) (rujuk garis panduan kualiti bahan makanan)',
        '3.4.2' => 'Perancangan menu (merancang menu yang seimbang dan sesuai dengan tumbesaran kanak-kanak dan memaparkan menu)',
        '3.4.3' => 'Prosedur pengendalian makanan (sijil typhoid, mematuhi prosedur pengendalian dan penyimpanan makanan)',
        '3.4.4' => 'Pengendalian Kanak-kanak Alergik (Peka dan memaparkan senarai kanak-kanak alegik)',
    ];

    $options = [
        '3.4.1' => [
            0 => '<i style="font-size: 12px"> TASKA tidak memastikan tahap kualiti bahan makanan mengikut garis panduan yang ditetapkan oleh KKM. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang memastikan tahap kualiti bahan makanan mengikut garis panduan yang ditetapkan oleh KKM. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang memastikan tahap kualiti bahan makanan mengikut garis panduan yang ditetapkan oleh KKM. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa memastikan tahap kualiti bahan makanan mengikut garis panduan yang ditetapkan oleh KKM. </i>',
        ],
        '3.4.2' => [
            0 => '<i style="font-size: 12px"> TASKA tidak merancang menu makanan yang  seimbang dan sesuai dengan tumbesaran kanak-kanak.</i>',
            1 => '<i style="font-size: 12px"> TASKA merancang menu makanan yang tidak seimbang dan tidak sesuai dengan tumbesaran kanak-kanak tetapi perancangan menu dipaparkan.</i>',
            2 => '<i style="font-size: 12px"> TASKA merancang menu makanan yang seimbang dan sesuai dengan tumbesaran kanak-kanak tetapi perancangan menu tidak dipaparkan.</i>',
            3 => '<i style="font-size: 12px"> TASKA merancang menu makanan yang seimbang dan sesuai dengan tumbesaran kanak-kanak serta perancangan menu dipaparkan.</i>',
        ],
        '3.4.3' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak mempunyai sijil typhoid terkini dan tidak dapat mengendalikan makanan dengan betul. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang mempunyai sijil typhoid terkini dan jarang-jarang dapat mengendalikan makanan dengan betul. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang mempunyai sijil typhoid terkini dan kadang-kadang dapat mengendalikan makanan dengan betul. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa mempunyai sijil typhoid terkini dan sentiasa dapat mengendalikan makanan dengan betul. </i>',
        ],
        '3.4.4' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak peka terhadap keperluan kanak-kanak alergik dan memaparkan senarai kanak-kanak alergik. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang peka terhadap keperluan kanak-kanak alergik dan memaparkan senarai kanak-kanak alergik. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang peka terhadap keperluan kanak-kanak alergik dan memaparkan senarai kanak-kanak alergik. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa peka terhadap keperluan kanak- kanak alergik dan memaparkan senarai kanak-kanak alergik. </i>',
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
    // if ($skpakfilleddata){
    //     $itemcq3 = json_decode($skpakfilleddata->itemcq3, true);
    // }
    if ($itemcq3 && isset($itemcq3['sq3.4'])) {
        $item = $itemcq3['sq3.4'];
    }
    $keyValue = $totalvalue = 0;
?>

<form id="cq3_sq4">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq3-4">
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
                <td colspan="6">Pemakanan</td>
            </tr>
            @foreach ($items_3_4 as $index => $item_3_4)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_3_4 }} </td>
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
    <button type="button" class="btn btn-primary float-right" onclick="submitcq3sq4()">Simpan</button>
</div>
</form>
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
