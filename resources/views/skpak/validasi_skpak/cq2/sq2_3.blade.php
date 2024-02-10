<style>
    #verifikasi-sq2-3 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq2-3 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq2-3 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_2_3 = [
        '2.3.1' => 'Berasaskan perkembangan holistik (bahan dan peralatan yang digunakan sesuai dengan perkembangan kanak- kanak)',
        '2.3.2' => 'Berasaskan aktiviti harian dan kemahiran (sumber dan peralatan yang digunakan dalam rutin harian sesuai untuk merangsang kemahiran kanak- kanak)',
        '2.3.3' => 'Kreatif, lestari dan inovatif (menghasilkan sumber pembelajaran yang kreatif, lestari, inovatif)',
    ];

    $options = [
        '2.3.1' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak menggunakan sumber yang pelbagai bagi memenuhi keperluan perkembangan holistik. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang menggunakan sumber yang pelbagai bagi memenuhi keperluan perkembangan holistik. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang menggunakan sumber yang pelbagai bagi memenuhi keperluan perkembangan holistik. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa menggunakan sumber yang pelbagai bagi memenuhi keperluan perkembangan holistik. </i>',
        ],
        '2.3.2' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak menggunakan sumber yang pelbagai bagi memenuhi keseluruhan keperluan aktiviti harian dan tidak merangsang kemahiran asas kanak-kanak. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang menggunakan sumber yang pelbagai bagi memenuhi keseluruhan keperluan aktiviti harian dan tidak merangsang kemahiran asas kanak-kanak. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang menggunakan sumber yang pelbagai bagi memenuhi keseluruhan keperluan aktiviti harian dan tidak merangsang kemahiran asas kanak-kanak. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa menggunakan sumber yang pelbagai bagi memenuhi keseluruhan keperluan aktiviti harian dan tidak merangsang kemahiran asas kanak-kanak. </i>',
        ],
        '2.3.3' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak memanfaatkan bahan dengan kreatif, inovatif dan lestari. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang memanfaatkan bahan dengan kreatif, inovatif dan lestari. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang memanfaatkan bahan dengan kreatif, inovatif dan lestari. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa memanfaatkan bahan dengan kreatif, inovatif dan lestari. </i>',
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
    if ($itemcq2 && isset($itemcq2['sq2.3'])) {
        $item = $itemcq2['sq2.3'];
    }
?>

<form id="cq2_sq3">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq2-3">
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
                <td>SQ2.3</td>
                <td colspan="6">Sumber Pembelajaran (ABM)</td>
            </tr>
            @foreach ($items_2_3 as $index => $item_2_3)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_2_3 }} </td>

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
    <button type="button" class="btn btn-primary float-right" onclick="submitcq2sq3()">Simpan</button>
</div>
</form>
<script>
    function submitcq2sq3() {
        var formData = new FormData(document.getElementById('cq2_sq3'));
        var error = false;

         $('form#cq2_sq3').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq2_sq3').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq1_sq2.3']) }}"
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