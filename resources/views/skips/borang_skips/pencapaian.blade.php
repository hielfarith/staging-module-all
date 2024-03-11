<div class="row justify-content-center">
    <!--  <div class="col-md-12 mb-1">
        <label class="form-label fw-bold text-titlecase">Nama Institusi
            <span class="text-danger">*</span>
        </label>
        <input type="text" id="" class="form-control">
    </div>

    <div class="col-md-12 mb-1">
        <label class="fw-bold form-label">Alamat
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" id="">
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Negeri
            <span class="text-danger">*</span>
        </label>
        <select class="form-control select2" name="" id="">
            <option value="" hidden>Negeri</option>
                @foreach ($negeris as $negeri)
<option value="{{ $negeri->name }}">{{ $negeri->name }}</option>
@endforeach
        </select>
    </div> -->

    <div class="col-md-4 mb-1">
        <div class="card bg-light-primary align-content-middle">
            <div class="card-header">
                <h4 class="fw-bolder text-center">Gred Penilaian Keseluruhan</h4>
            </div>

            <div class="card-body">
                <span id="set_gred"></span>
            </div>
        </div>
    </div>

    <div class="table-responsive mb-2">
        <table class="table header_uppercase table-bordered table-hovered" id="">
            <thead>
                <tr>
                    <th>ITEM</th>
                    <th width="5%"> PERATUSAN ITEM </th>
                    <th width="5%">SKOR</th>
                    <th width="5%">WAJARAN</th>
                </tr>

                @php
                    $item_pencapaians = [
                        '1.0' => 'ITEM 1: PENUBUHAN & PENDAFTARAN',
                        '2.0' => 'ITEM 2: PENGURUSAN INSTITUSI',
                        '3.0' => 'ITEM 3: PENGURUSAN KURIKULUM',
                        '4.0' => 'ITEM 4: PENGAJARAN DAN PEMBELAJARAN',
                        '5.0' => 'ITEM 5: PENGURUSAN PENILAIAN / PEPERIKSAAN',
                        '6.0' => 'ITEM 6: PENGURUSAN DAN PEMBANGUNAN GURU',
                        '7.0' => 'ITEM 7: DISIPLIN',
                        '8.0' => 'ITEM 8: PIAWAIAN',
                        '9.0' => 'ITEM 9: KEBERSIHAN DAN KECERIAAN',
                        '10.0' => 'ITEM 10: PENGURUSAN PELAJAR ANTARABANGSA',
                    ];
                    $wajran = [
                        '1.0' => '12.0',
                        '2.0' => '7.0',
                        '3.0' => '12.0',
                        '4.0' => '12.0',
                        '5.0' => '10.0',
                        '6.0' => '7.0',
                        '7.0' => '5.0',
                        '8.0' => '13.0',
                        '9.0' => '7.0',
                        '10.0' => '15.0',
                    ];

                @endphp

            <tbody>
                @foreach ($item_pencapaians as $itemKey => $item)
                    <tr>
                        <td>{{ $item }}</td>
                        <td>
                            <!-- <a class="text-success">auto-calculated</a> -->
                            <?php
                            $id = str_replace('.', '_', $itemKey);
                            ?>
                            <span id="set_percentage_{{ $id }}"></span>
                        </td>
                        <td>
                            <span id="set_skor_{{ $id }}"></span>
                        </td>
                        <td><span id="wajaran_{{ $id }}">{{ $wajran[$itemKey] }}</span></td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="bg-light-primary">
                    <td colspan="2"> Jumlah Skor Keseluruhan </td>
                    <td colspan="2">
                        <span id="set_total_skor"></span>
                    </td>
                </tr>
            </tfoot>
            </thead>
        </table>
    </div>

    <hr>

    <div class="col-md-4">
        &nbsp;
    </div>



    <div class="col-md-4">
        &nbsp;
    </div>
</div>
<script type="text/javascript">
    var totalskor = 0;
    for (var i = 1; i <= 10; i++) {
        $('#set_percentage_' + i + '_0').text($('#tab' + i + '_percentage').val());
        var skor = parseFloat(($('#tab' + i + '_percentage').val() / 100) * ($('#wajaran_' + i + '_0').text()));
        $('#set_skor_' + i + '_0').text(skor.toFixed(2));
        totalskor = parseFloat(totalskor) + parseFloat($('#set_skor_' + i + '_0').text());
        if (i == 10) {
            $('#set_total_skor').text(totalskor.toFixed(2));
            var gred = '-';
            // =IF(O328>94,"CEMERLANG",IF(O328>80,"BAIK", IF(O328>70,"HARAPAN",IF(O328>60,"SEDERHANA",IF(O328>50,"LEMAH", IF(O328>0,"SANGAT LEMAH"," "))))))
            if (totalskor > 94) {
                gred = 'CEMERLANG';
            } else if (totalskor > 80) {
                gred = 'BAIK';
            } else if (totalskor > 70) {
                gred = 'HARAPAN';
            } else if (totalskor > 60) {
                gred = 'SEDERHANA';
            } else if (totalskor > 50) {
                gred = 'LEMAH';
            } else if (totalskor > 0 && totalskor < 50) {
                gred = 'SANGAT LEMAH';
            }
            $('#set_gred').text(gred);
        }
    }
</script>
