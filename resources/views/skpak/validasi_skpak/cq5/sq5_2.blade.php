<style>
    #verifikasi-sq5-2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq5-2 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq5-2 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_5_2 = [
        '5.2.1' => 'Latihan dan Peningkatan berterusan (semua pendidik menghadiri latihan setiap tahun)',
        '5.2.2' => 'Etika profesionalisme (semua pendidik mematuhi etika profesionalisme TASKA) (rujuk panduan bagi etika profesionalisme pendidik/ pengasuh)',
        '5.2.3' => 'Penilaian Pendidik (pengurusan menjalankan penilaian kepada pendidik)',
        '5.2.4' => 'Pemantauan daripada Agensi (TASKA dinilai oleh pihak pemantau yang berkelayakkan, diberi maklum balas dan mempunyai rekod terhadap pemantauan).',
        '5.2.5' => 'Peningkatan kerjaya (berkongsi maklumat peningkatan kerjaya dan menggalakan peningkatan kerjaya) (peningkatan kerjaya: sambung belajar atau peluang kenaikkan pangkat)',
    ];

    $options = [
        '5.2.1' => [
            0 => '<i style="font-size: 12px"> TASKA tidak memberi peluang kepada pendidik untuk mengahdiri latihan/ kursus setiap tahun. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang memberi peluang kepada pendidik untuk mengahdiri latihan/ kursus setiap tahun. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang memberi peluang kepada pendidik untuk mengahdiri latihan/ kursus setiap tahun. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa memberi peluang kepada pendidik untuk menghadiri latihan/ kursus setiap. </i>',
        ],
        '5.2.2' => [
            0 => '<i style="font-size: 12px"> TASKA tidak memastikan staf mematuhi kod etika profesionalisme yang ditetapkan. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang memastikan staf mematuhi kod etika profesionalisme yang ditetapkan. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang memastikan staf mematuhi kod etika profesionalisme yang ditetapkan. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa memastikan staf mematuhi kod etika profesionalisme yang ditetapkan. </i>',
        ],
        '5.2.3' => [
            0 => '<i style="font-size: 12px"> TASKA tidak menjalankan penilaian prestasi pendidik dan tidak memberi maklum balas berkenaan penilaian tersebut kepada pendidik. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang menjalankan penilaian prestasi pendidik dan jarang-jarang memberi maklum balas berkenaan penilaian tersebut kepada pendidik. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang menjalankan penilaian prestasi pendidik dan kadang-kadang memberi maklum balas berkenaan penilaian tersebut kepada pendidik. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa menjalankan penilaian prestasi pendidik dan sentiasa memberi maklum balas berkenaan penilaian tersebut kepada pendidik. </i>',
        ],
        '5.2.4' => [
            0 => '<i style="font-size: 12px"> TASKA sentiasa menjalankan penilaian prestasi pendidik dan sentiasa memberi maklum balas berkenaan penilaian tersebut kepada pendidik. </i>',
            1 => '<i style="font-size: 12px"> TASKA dipantau oleh pemantau yang berkelayakan namun tidak diberi maklum balas mengenai pantauan yang dijalankan dan tidak mempunyai rekod pemantauan. </i>',
            2 => '<i style="font-size: 12px"> TASKA dipantau oleh pemantau yang berkelayakan, diberi maklum balas mengenai pantauan yang dijalankan tetapi tidak mempunyai rekod pemantauan. </i>',
            3 => '<i style="font-size: 12px"> TASKA dipantau oleh pemantau yang berkelayakan, diberi maklum balas mengenai pantauan yang dijalankan dan mempunyai rekod pemantauan. </i>',
        ],
        '5.2.5' => [
            0 => '<i style="font-size: 12px"> TASKA tidak berkongsi maklumat peningkatan kerjaya kepada pendidik dan tidak menggalakkan pendidik untuk meningkatkan peluang kerjaya. </i>',
            1 => '<i style="font-size: 12px"> TASKA tidak berkongsi maklumat peningkatan kerjaya kepada pendidik namun menggalakkan pendidik untuk meningkatkan peluang kerjaya. </i>',
            2 => '<i style="font-size: 12px"> TASKA berkongsi maklumat peningkatan kerjaya kepada pendidik tetapi tidak menggalakkan pendidik untuk meningkatkan peluang kerjaya. </i>',
            3 => '<i style="font-size: 12px"> TASKA berkongsi maklumat peningkatan kerjaya kepada pendidik dan menggalakkan pendidik untuk meningkatkan peluang kerjaya. </i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    PENTADBIRAN DAN PENGURUSAN
</h5>

<hr>
<?php
    $id = Request::segment(3);
    $itemcq5 = $item = null;
    if ($skpakfilleddata){
        $itemcq5 = json_decode($skpakfilleddata->itemcq5, true);
    }
    if ($itemcq5 && isset($itemcq5['sq5.2'])) {
        $item = $itemcq5['sq5.2'];
    }
    $keyValue = $totalvalue = 0;
?>
<form id="cq5_sq2">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq5-2">
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
                <td>SQ5.2</td>
                <td colspan="6">Profesionalisme dan Etika</td>
            </tr>
            @foreach ($items_5_2 as $index => $item_5_2)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_5_2 }} </td>

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
    <button type="button" class="btn btn-primary float-right" onclick="submitcq5sq2()">Simpan</button>
</div>
@endif
</form>

<script>
    function submitcq5sq2() {
        var formData = new FormData(document.getElementById('cq5_sq2'));
        var error = false;

         $('form#cq5_sq2').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq5_sq2').val();
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
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq5_sq5.2']) }}"
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
