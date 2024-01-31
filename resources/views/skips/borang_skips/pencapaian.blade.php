<div class="row">
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
                @foreach($negeris as $negeri)
                    <option value="{{$negeri->name}}">{{$negeri->name}}</option>
                @endforeach
        </select>
    </div> -->

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
                        '4.0' =>  '12.0',
                        '5.0' => '10.0',
                        '6.0' => '7.0',
                        '7.0' => '5.0',
                        '8.0' => '13.0',
                        '9.0' => '7.0',
                        '10.0' => '15.0'
                        ];
                @endphp

                <tbody>
                    @foreach ($item_pencapaians as $itemKey => $item)
                        <tr>
                            <td>{{ $item }}</td>
                            <td>
                                <a class="text-success">auto-calculated</a>
                            </td>
                            <td>
                                <a class="text-success">auto-calculated</a>
                            </td>
                            <td>{{ $wajran[$itemKey] }}</td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr class="bg-light-primary">
                        <td colspan="2"> Jumlah Skor Keseluruhan </td>
                        <td colspan="2">
                            <a class="text-success">auto-calculated</a>
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

    <div class="col-md-4 mb-1">
        <div class="card bg-light-primary align-content-middle">
            <div class="card-header">
                <h4 class="fw-bolder">Gred Penilaian Keseluruhan</h4>
            </div>

            <div class="card-body">
                A - 100%
            </div>
        </div>
    </div>

    <div class="col-md-4">
        &nbsp;
    </div>
</div>
