<style>
    #verifikasi-sq5-1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq5-1 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq5-1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_5_1 = [
        '5.1.1' => 'Falsafah, visi dan misi (mempamerkan misi, visi, falsafah dan berkongsi dengan pemegang taruh- pendidik/ ibu bapa/ staf sokongan)',
        '5.1.2' => 'Polisi dan garis panduan (mempunyai polisi dan garis panduan yang jelas dan dimaklumkan)',
        '5.1.3' => 'Pengurusan rekod pentadbiran TASKA (mempunyai rekod pentadbiran, dikemaskini dan disimpan dengan cara yang sistematik/ mudah diakses)',
        '5.1.4' => 'Pengurusan rekod staf (mempunyai semua rekod staf, dikemaskini dan disimpan dengan cara yang sistematik/ mudah diakses)',
        '5.1.5' => 'Kelayakan (pendidik mempunyai sijil KAP dan kelayakan sesuai)',
        '5.1.6' => 'Kebajikan staf (kebajikan seperti- gaji minimum, PERKESO, KWSP, ruang rehat/ solat/ tandas/ simpan barang, cuti pendidik)',
        '5.1.7' => 'Nisbah pendidik dan kanak-kanak (nisbah- mengikut nisbah yang ditetapkan oleh JKM)',
        '5.1.8' => 'Pengurusan rekod kanak-kanak (rekod kanak-kanak dikemaskini dan disimpan dengan sistematik)',
    ];

    $options = [
        '5.1.1' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mempamerkan falsafah, visi, dan misi serta tidak mempunyai inisiatif untuk berkongsi dengan pemegang taruh. </i>',
            1 => '<i style="font-size: 12px"> TASKA tidak mempamerkan falsafah, visi, dan misi tetapi mempunyai inisiatif untuk berkongsi dengan pemegang taruh. </i>',
            2 => '<i style="font-size: 12px"> TASKA mempamerkan falsafah, visi, dan misi tetapi tidak mempunyai inisiatif untuk berkongsi dengan pemegang taruh. </i>',
            3 => '<i style="font-size: 12px"> TASKA mempamerkan falsafah, visi, dan misi serta mempunyai inisiatif untuk berkongsi dengan pemegang taruh. </i>',
        ],
        '5.1.2' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mempunyai buku panduan bertulis berkaitan polisi dan garis panduan yang lengkap. Perubahan polisi dan prosedur tidak dimaklumkan kepada pihak terlibat. </i>',
            1 => '<i style="font-size: 12px"> TASKA tidak mempunyai buku panduan bertulis berkaitan polisi dan garis panduan yang lengkap. Perubahan polisi dan prosedur dimaklumkan kepada pihak terlibat. </i>',
            2 => '<i style="font-size: 12px"> TASKA mempunyai buku panduan bertulis berkaitan polisi dan garis panduan yang lengkap. Perubahan polisi dan prosedur tidak dimaklumkan kepada pihak terlibat. </i>',
            3 => '<i style="font-size: 12px"> TASKA mempunyai buku panduan bertulis berkaitan polisi dan garis panduan yang lengkap. Perubahan polisi dan prosedur dimaklumkan kepada pihak terlibat. </i>',
        ],
        '5.1.3' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mempunyai rekod pentadbiran TASKA. </i>',
            1 => '<i style="font-size: 12px"> TASKA mempunyai rekod pentadbiran TASKA tetapi tidak dikemaskini dan disimpan dengan cara yang tidak sistematik. </i>',
            2 => '<i style="font-size: 12px"> TASKA mempunyai rekod pentadbiran TASKA, dikemaskini tetapi disimpan dengan cara yang tidak sistematik. </i>',
            3 => '<i style="font-size: 12px"> TASKA mempunyai rekod pentadbiran TASKA, dikemaskini dan disimpan dengan cara yang sistematik. </i>',
        ],
        '5.1.4' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mempunyai rekod bagi semua staf. </i>',
            1 => '<i style="font-size: 12px"> TASKA mempunyai rekod bagi semua staf tetapi tidak dikemaskini dan disimpan dengan cara yang tidak sistematik. </i>',
            2 => '<i style="font-size: 12px"> TASKA mempunyai rekod bagi semua staf, dikemaskini tetapi disimpan dengan cara yang tidak sistematik. </i>',
            3 => '<i style="font-size: 12px"> TASKA mempunyai rekod bagi semua staf, dikemaskini dan disimpan dengan cara yang sistematik. </i>',
        ],
        '5.1.5' => [
            0 => '<i style="font-size: 12px"> TASKA tidak memastikan semua pendidik mempunyai sijil KAP dan mempunyai kelayakan yang bersesuaian. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang memastikan semua pendidik mempunyai sijil KAP dan mempunyai kelayakan yang bersesuaian. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang memastikan semua pendidik mempunyai sijil KAP dan mempunyai kelayakan yang bersesuaian. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa memastikan semua pendidik mempunyai sijil KAP dan mempunyai kelayakan yang bersesuaian. </i>',
        ],
        '5.1.6' => [
            0 => '<i style="font-size: 12px"> TASKA tidak menjaga kebajikan staf. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang menjaga kebajikan staf. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang menjaga kebajikan staf. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa menjaga kebajikan pendidik. </i>',
        ],
        '5.1.7' => [
            0 => '<i style="font-size: 12px"> TASKA tidak memastikan nisbah pendidik dan kanak-kanak mengikut jumlah yang betul. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang memastikan nisbah pendidik dan kanak-kanak mengikut jumlah yang betul. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang memastikan nisbah pendidik dan kanak-kanak mengikut jumlah yang betul. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa memastikan nisbah pendidik dan kanak-kanak mengikut jumlah yang betul. </i>',
        ],
        '5.1.8' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mempunyai rekod kanak-kanak. </i>',
            1 => '<i style="font-size: 12px"> TASKA mempunyai rekod kanak- kanak tetapi tidak dikemaskini dan disimpan dengan cara yang tidak sistematik. </i>',
            2 => '<i style="font-size: 12px"> TASKA mempunyai rekod kanak- kanak, dikemaskini tetapi disimpan dengan cara yang tidak sistematik. </i>',
            3 => '<i style="font-size: 12px"> TASKA mempunyai rekod kanak- kanak, dikemaskini dan disimpan dengan cara yang sistematik. </i>',
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
    if ($itemcq5 && isset($itemcq5['sq5.1'])) {
        $item = $itemcq5['sq5.1'];
    }
?>
<form id="cq5_sq1">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq5-1">
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
                <td>SQ5.1</td>
                <td colspan="6">Pentadbiran</td>
            </tr>
            @foreach ($items_5_1 as $index => $item_5_1)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_5_1 }} </td>

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
                                <input class="form-check-input" type="radio" name="{{ $index }}" value="{{$key}}" required {{$checked}}>
                            </div>
                            <br>

                            <div class="d-flex justify-content-center align-items-center">
                                {!! $option !!}
                            </div>
                        </td>
                    @endforeach

                    <td>Auto-selected</td>
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
                <td class="text-center">Auto-calculated</td>
            </tr>
        </tfoot>
    </table>
</div>

<hr>

<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitcq5sq1()">Simpan</button>
</div>
</form>


<script>
    function submitcq5sq1() {
        var formData = new FormData(document.getElementById('cq5_sq1'));
        var error = false;

         $('form#cq5_sq1').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq5_sq1').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq5_sq5.1']) }}"
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