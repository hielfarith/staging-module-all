<style>
    #verifikasi-sq2-1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq2-1 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq2-1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_2_1 = [
        '2.1.1' => 'Ketibaan dan pulang (mesra dengan kanak-kanak dan ibu bapa, memeriksa fizikal, menguruskan barang peribadi, menyerahkan buku log) (rujuk SOP pulang dan tiba)',
        '2.1.2' => 'Pengurusan diri kanak-kanak (mengutamakan kemampuan dan kebolehan kanak-kanak dan kelancaran proses urus diri)  (rujuk lampiran  Diri: Susu, mandi, mandikan bayi, gosok gigi, makan)',
        '2.1.3' => 'Kelancaran proses transisi (transisi makan, urus diri, aktiviti yang disediakan ketika waktu transisi)',
        '2.1.4' => 'Pemupukan adab dan nilai murni (adab makan, adab berkawan, adab belajar, adab bercakap, dsb.)',
        '2.1.5' => 'Meraikan kepelbagaian (kepelbagaian dan keunikan merangkumi bangsa, agama, status ekonomi, rupa paras, status anak (tidak sah taraf/ anak yatim), masalah pembelajaran, kepelbagaian intelek)',
    ];

    $options = [
        '2.1.1' => [
            0 => '<i style="font-size: 12px"> tidak mematuhi sepenuhnya SOP ketibaan  dan pulang </i>',
            1 => '<i style="font-size: 12px"> jarang-jarang mematuhi sepenuhnya SOP ketibaan  dan pulang </i>',
            2 => '<i style="font-size: 12px"> kadang-kadang mematuhi sepenuhnya SOP ketibaan  dan pulang </i>',
            3 => '<i style="font-size: 12px"> sentiasa mematuhi sepenuhnya SOP ketibaan  dan pulang </i>',
        ],
        '2.1.2' => [
            0 => '<i style="font-size: 12px"> tidak mengutamakan kemampuan dan kebolehan kanak-kanak dalam pengurusan diri dan tidak memastikan proses urus diri kanak-kanak berjalan lancar. </i>',
            1 => '<i style="font-size: 12px"> tidak mengutamakan kemampuan dan kebolehan kanak-kanak dalam pengurusan diri tetapi memastikan proses urus diri kanak-kanak berjalan lancar. </i>',
            2 => '<i style="font-size: 12px"> mengutamakan kemampuan dan kebolehan kanak-kanak dalam pengurusan diri tetapi tidak memastikan proses urus diri kanak-kanak berjalan lancar. </i>',
            3 => '<i style="font-size: 12px"> mengutamakan kemampuan dan kebolehan kanak-kanak dalam pengurusan diri dan memastikan proses urus diri kanak-kanak berjalan lancar. </i>',
        ],
        '2.1.3' => [
            0 => '<i style="font-size: 12px;">" membimbing dan mengawasi kanak-kanak semasa proses transisi dengan tidak lancar. </i>',
            1 => '<i style="font-size: 12px;">" membimbing dan mengawasi kanak-kanak dalam sepanjang proses transisi dengan kurang lancar. </i>',
            2 => '<i style="font-size: 12px;">" membimbing dan mengawasi kanak-kanak dalam sepanjang proses transisi dengan lancar. </i>',
            3 => '<i style="font-size: 12px;">" membimbing dan mengawasi kanak-kanak sepanjang proses transisi dengan sangat lancar. </i>',
        ],
        '2.1.4' => [
            0 => '<i style="font-size: 12px;">" tidak mempamerkan dan tidak menggalakkan perlakuan adab yang mulia dan nilai murni. </i>',
            1 => '<i style="font-size: 12px;">" jarang-jarang mempamerkan dan jarang-jarang menggalakkan perlakuan adab yang mulia dan nilai murni. </i>',
            2 => '<i style="font-size: 12px;">" kadang-kadang mempamerkan dan kadang- kadang menggalakkan perlakuan adab yang mulia dan nilai murni. </i>',
            3 => '<i style="font-size: 12px;">" sentiasa mempamerkan dan sentiasa menggalakkan perlakuan adab yang mulia dan nilai murni. </i>',
        ],
        '2.1.5' => [
            0 => '<i style="font-size: 12px;">" tidak memberi peluang yang sama rata kepada kepelbagaian dan keunikan kanak- kanak. </i>',
            1 => '<i style="font-size: 12px;">" jarang-jarang memberi peluang yang sama rata kepada kepelbagaian dan keunikan kanak- kanak. </i>',
            2 => '<i style="font-size: 12px;">" kadang-kadang memberi peluang yang sama rata kepada kepelbagaian dan keunikan kanak-kanak. </i>',
            3 => '<i style="font-size: 12px;">" sentiasa memberi peluang yang sama rata kepada kepelbagaian dan keunikan kanak-kanak. </i>',
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
    if ($itemcq2 && isset($itemcq2['sq2.1'])) {
        $item = $itemcq2['sq2.1'];
    }
    $keyValue = $totalvalue = 0;
?>
<form id="cq2_sq1">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq2-1">
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
            <tr class="bg-light-danger">
                <td class="text-end" colspan="6">
                    Jumlah
                </td>
                <td class="text-center">Auto-calculated</td>
            </tr>
            <tr class="bg-light-primary fw-bolder">
                <td>SQ2.1</td>
                <td colspan="6">Perlaksanaan Aktiviti Rutin</td>
            </tr>
            @foreach ($items_2_1 as $index => $item_2_1)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_2_1 }} </td>

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

                    <td id="jumlah_{{$keyString}}">{{$keyValue}}</td>
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
        {{-- <tfoot>
            <tr class="bg-light-danger">
                <td class="text-end" colspan="6">
                    Jumlah
                </td>
                <td class="text-center">{{$totalvalue}}</td>
            </tr>
        </tfoot> --}}
    </table>
</div>

<hr>
@if($disabled != 'disabled')
<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="submitcq2sq1()">
        Simpan
    </button>
</div>
@endif
{{-- <div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitcq2sq1()">Simpan</button>
</div> --}}
</form>
<script>
    function submitcq2sq1() {
        var formData = new FormData(document.getElementById('cq2_sq1'));
        var error = false;

         $('form#cq2_sq1').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq2_sq1').val();
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
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq2_sq2.1']) }}"
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
