<style>
    #ruang_luar thead th {
        vertical-align: middle;
        text-align: center;
    }

    #ruang_luar tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #ruang_luar table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$ruang_luars = [
    1 => 'Tiada peralatan berbahaya/ rosak yang boleh dicapai oleh kanak-kanak di bahagian luar TASKA (contohnya mesin pemotong rumput, alatan, traktor, trampolin, perabot/ peralatan/ permainan yang tidak boleh digunakan).',
    2 => 'Beranda, balkoni dan koridor yang mempunyai sisi yang terbuka mempunyai pagar atau grill.',
    3 => 'Terdapat dua pintu pagar di luar TASKA.',
    4 => 'Pintu pagar mempunyai selak yang tidak dapat dibuka oleh kanak-kanak.',
    5 => 'Tiada sampah-sarap dan air bertakung yang boleh menyebabkan pembiakan nyamuk aedes.',
    6 => 'Tiada lubang yang membahayakan kanak-kanak di atas permukaan tanah atau di mana-mana permukaan di luar kawasan (yang boleh menyebabkan kanak-kanak jatuh).',
    7 => 'Bahan beracun disimpan dalam bekas asal yang berlabel (jenis kandungan dan tarikh).',
    8 => 'Tempat tadahan air mempunyai penutup yang sesuai.',
    9 => 'Kolam mempunyai paras kedalaman yang sesuai dengan kanak-kanak.',
    10 => 'Alatan permainan luar selamat digunakan tiada iaitu unsur- unsur tajam atau rosak.',
    11 => 'Alatan berkebun disimpan ditempat yang sesuai dan sukar dicapai oleh kanak-kanak.',
    12 => 'Tiada tumbuhan-tumbuhan yang berbahaya/ beracun/ berduri.',
    13 => 'Tiada kehadiran haiwan / serangga yang membahayakan kanak-kanak.',
    14 => 'Semua longkang / lubang ditutup dengan tapak tetulang konkrit (slab).',
    15 => 'Longkang dan lubang tidak bertakung dengan air dan sampah.',
    16 => 'Rumput dipotong dan diselenggara.',
    17 => 'Pokok yang berada di persekitaran premis tidak berbahaya (tidak mempunyai duri, beracun, mempunyai serangga bahaya).',
    18 => 'Pondok permainan berada dalam keadaan selamat- skru tidak longgar, tidak berselumbar dan tidak berkarat.',
    19 => 'Peralatan mainan luar dibuat daripada bahan yang selamat untuk kanak-kanak (contoh buaian dibuat daripada plastik bukan kayu).'
];
@endphp

<hr>
<?php
    $id = Request::segment(3);
    $ruangluar = $item = null;
    if ($skpakfilleddata){
        $ruangluar = json_decode($skpakfilleddata->senaraisemak, true);
    }  
    if ($ruangluar && isset($ruangluar['ruangluar'])) {
        $item = $ruangluar['ruangluar'];
    }
    $countYa = $countTidak = $countTidakberkenaan = 0;
?>


<form id="ruang_luar_form">
<input type="hidden" name="skpak_standard_penilaian_id" value="{{$id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="ruang_luar">
        <thead>
            <tr>
                <th>No.</th>
                <th>Item</th>
                <th style="width: 10%">Ya</th>
                <th style="width: 10%">Tidak</th>
                <th style="width: 10%">Tidak Berkenaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang_luars as $index => $ruang_luar)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $ruang_luar }}</td>
                    <?php
                        if (isset($item)) {
                            $keyValue = $index.'_'.$loop->index;
                            $data = $item[$keyValue];
                        } else {
                            $data = '';
                        }
                    if ($data == 'YA') {
                        $countYa += 1;
                    } elseif ($data == 'TIDAK') {
                        $countTidak += 1;
                    } elseif ($data == 'TIDAK BERKENAAN') {
                        $countTidakberkenaan +=1;
                    }
                    ?>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="ya_{{ $index }}_{{ $loop->index }}" value="YA" required @if($data == 'YA') checked @endif>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="tidak_{{ $index }}_{{ $loop->index }}" value="TIDAK" required @if($data == 'TIDAK') checked @endif>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="tidak_berkenaan_{{ $index }}_{{ $loop->index }}" value="TIDAK BERKENAAN" required @if($data == 'TIDAK BERKENAAN') checked @endif>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Jumlah
                </td>
                <td class="text-center" id="countYaL">{{$countYa}}</td>
                <td class="text-center" id="countTidakL">{{$countTidak}}</td>
                <td class="text-center" id="countTidakberkenaanL">{{$countTidakberkenaan}}</td>
            </tr>

            <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Jumlah Skor
                </td>
                 <?php
                $total = $countYa+$countTidak;
                $percentage = round($countYa / $total *100);
                if ($percentage <= 0) {
                    $rubik = 0;
                } elseif($percentage > 0 && $percentage <= 40) {
                     $rubik = 1;
                 } elseif($percentage > 40 && $percentage <= 80) {
                     $rubik = 2;
                } elseif($percentage > 80 && $percentage <= 99) {
                     $rubik = 3;
                } elseif($percentage > 99) {
                     $rubik = 4;
                } else {
                    $rubik = '-';
                }       
                ?>
                <td colspan="3" class="text-center" id="percentageL">{{$percentage}} %</td>
            </tr>

            <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Skor Rubrik
                </td>
                <td colspan="3" class="text-center"id="rubikL">{{$rubik}}</td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="col-md-12 mb-1 mt-1">
    <label class="fw-bolder">Ulasan</label>
    <textarea name="ulasan" id="" rows="3" class="form-control">
    @if($item && isset($item['ulasan'])) {{$item['ulasan']}}  @endif
    </textarea>
</div>

<hr>
<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right formdd" onclick="submitrluar()">Simpan</button>
</div>
</form>
<script>
    function submitrluar() {
        var formData = new FormData(document.getElementById('ruang_luar_form'));
        var error = false;

         $('form#ruang_luar_form').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name='"+this.name+"']:checked", '#ruang_luar_form').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'senaraisemak_ruangluar']) }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.success) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var data = response.senaraisemak;
                    $('#countYaL').text(data.countYa);
                    $('#countTidakL').text(data.countTidak);
                    $('#countTidakberkenaanL').text(data.countTidakberkenaan);
                    $('#percentageL').text(data.percentage+' '+'%');
                    $('#rubikL').text(data.rubik);
               }
            }
        });

    };
</script>