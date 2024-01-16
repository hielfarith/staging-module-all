<div class="row">

    <div class="col-md-2 mt-2 mb-2">
        <label class="form-label fw-bold">Kod Sekolah</label>
        <input type="text" class="form-control" id="" name="" value="" disabled>
    </div>

    <div class="col-md-10 mt-2 mb-2">
        <label class="form-label fw-bold">Nama Sekolah</label>
        <input type="text" class="form-control" id="" name="" value="" disabled>
    </div>
</div>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hovered">
        <thead>
            <tr>
                <th colspan="2" rowspan="2">&nbsp;</th>
                <th colspan="2">Dilaksanakan</th>
                <th rowspan="2">Setiap Tahun</th>
                <th rowspan="2">2 Tahun Sekali</th>
                <th rowspan="2">Bulan Perlaksanaan</th>
            </tr>
            <tr>
                <th>Ya</th>
                <th>Tidak</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $programs = [
                            1 => 'Kejohanan Olahraga Sekolah/ Sukan Tahunan Sekolah',
                            2 => 'Kejohanan Merentas Desa',
                            3 => 'Sukantara',
                            4 => 'Sukan Tahap 1',
                            5 => 'Sukan Pendidikan Khas',
                            6 => 'Program Sukan/ Kecergasan',
                            7 => 'Majlis Anugerah Sukan'
                        ];
                $dilaksanakans = [1 => 'Ya', 2 => 'Tidak'];
            ?>

            @foreach($programs as $id => $program)
                <tr>
                    <td> {{ $id }} </td>
                    <td> {{ $program }} </td>

                    @foreach ($dilaksanakans as $id => $dilaksanakan)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dilaksanakan" id="{{ $id }}" value="{{ $dilaksanakan }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="setiap_tahun" id="ya" value="1">
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dua_tahun" id="ya" value="1">
                        </div>
                    </td>

                    <td>
                        <select name="" id="" class="form-control select2">
                            <option value="" hidden>Bulan</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Mac</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Jun</option>
                            <option value="7">Julai</option>
                            <option value="8">Ogos</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Disember</option>
                        </select>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="card-footer">
    <div class="d-flex justify-content-between">
        <button class="btn btn-outline-secondary prev-tab">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Kembali</span>
        </button>
        <button class="btn btn-primary next-tab">
            <span class="align-middle d-sm-inline-block d-none">Seterusnya</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>
