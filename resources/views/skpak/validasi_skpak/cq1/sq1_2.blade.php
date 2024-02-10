<style>
    #verifikasi-sq1-2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq1-2 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq1-2 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_1_2 = [
        '1.2.1' => 'Tanggungjawab terhadap organisasi (kepatuhan, integriti dan komitmen)',
        '1.2.2' => 'Interaksi dan komunikasi (interkasi dua hala, mengadakan perbincangan, bertukar idea)',
        '1.2.3' => 'Sikap dan sokongan terhadap organisasi (menunjukkan kerja berpasukan, melibatkan diri secara langsung dalam perlaksanaan pembangunan TASKA)',
    ];

    $options = [
        '1.2.1' => [
            0 => 'Pendidik tidak menunjukkan sikap tanggungjawab, kepatuhan, integriti dan komitmen terhadap peraturan bekerja di dalam organisasi.',
            1 => 'Pendidik jarang-jarang menunjukkan sikap tanggungjawab, kepatuhan, integriti dan komitmen terhadap peraturan bekerja di dalam organisasi.',
            2 => 'Pendidik kadang-kadang menunjukkan sikap tanggungjawab, kepatuhan, integriti dan komitmen terhadap peraturan bekerja di dalam organisasi.',
            3 => 'Pendidik sentiasa menunjukkan sikap tanggungjawab, kepatuhan, integriti dan komitmen terhadap peraturan bekerja di dalam organisasi.',
        ],
        '1.2.2' => [
            0 => 'Pendidik dan pengurusan TASKA tidak menunjukkan interaksi dua hala, mengadakan perbincangan dan bertukar idea melalui pelbagai medium',
            1 => 'Pendidik dan pengurusan TASKA jarang-jarang menunjukkan interaksi dua hala, mengadakan perbincangan dan bertukar idea melalui pelbagai medium',
            2 => 'Pendidik dan pengurusan TASKA kadang-kadang menunjukkan interaksi dua hala, mengadakan perbincangan dan bertukar idea melalui pelbagai medium',
            3 => 'Pendidik dan pengurusan TASKA sentiasa menunjukkan interaksi dua hala, mengadakan perbincangan dan bertukar idea melalui pelbagai medium',
        ],
        '1.2.3' => [
            0 => 'Pendidik tidak menunjukkan kerja berpasukan dan melibatkan diri secara langsung dalam pelaksanaan pembangunan TASKA',
            1 => 'Pendidik jarang-jarang menunjukkan kerja berpasukan dan melibatkan diri secara langsung dalam pelaksanaan pembangunan TASKA',
            2 => 'Pendidik kadang-kadang menunjukkan kerja berpasukan dan melibatkan diri secara langsung dalam pelaksanaan pembangunan TASKA',
            3 => 'Pendidik sentiasa menunjukkan kerja berpasukan dan melibatkan diri secara langsung dalam pelaksanaan pembangunan TASKA',
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
    if ($itemcq1 && isset($itemcq1['sq1.2'])) {
        $item = $itemcq1['sq1.2'];
    }
?>
<form id="cq1_sq2">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq1-2">
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
                <td>SQ1.2</td>
                <td colspan="6">Hubungan sesama Pendidik dan Pengurusan TASKA </td>
            </tr>
            @foreach ($items_1_2 as $index => $item_1_2)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_1_2 }} </td>

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
                                <input class="form-check-input" type="radio" name="{{ $index }}" value="{{$key+1}}" required {{$checked}}>
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
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="submitcq1sq2()">
        Simpan
    </button>
</div>

{{-- <div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitcq1sq2()">Simpan</button>
</div> --}}
</form>


<script>
    function submitcq1sq2() {
        var formData = new FormData(document.getElementById('cq1_sq2'));
        var error = false;

         $('form#cq1_sq2').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#cq1_sq2').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq1_sq1.2']) }}"
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
