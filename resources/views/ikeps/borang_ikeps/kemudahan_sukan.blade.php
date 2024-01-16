<div class="row">

    <div class="col-md-12 mt-2 mb-2">
        <label class="form-label fw-bold">Nama Sekolah</label>
        <input type="text" class="form-control" id="" name="" value="" disabled>
    </div>
</div>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hovered">
        <thead>
            <tr>
                <th rowspan="2">&nbsp;</th>
                <th rowspan="2">Ada</th>
                <th rowspan="2">Tiada</th>
                <th colspan="2">Gunasama</th>
                <th rowspan="2">Bilangan</th>
                <th colspan="2">Masih Digunakan</th>
                <th colspan="5">Status Fizikal</th>
            </tr>
            <tr>
                <th>Ya</th>
                <th>Tidak</th>
                <th>Ya</th>
                <th>Tidak</th>
                <th class="bg-light-success">Selesa</th>
                <th class="bg-light-secondary">Tidak Selesa</th>
                <th class="bg-light-warning">Kefungsian</th>
                <th class="bg-light-info">Sekuriti</th>
                <th class="bg-light-danger">Keselamatan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        1. Padang Bola Sepak
                    </h5>
                </td>
            </tr>

            <?php
                $bola_sepaks = ['1.1 Saiz Padang Standard Pertandingan',
                                '1.2 Saiz Padang Untuk Latihan Sahaja'
                                ];
                $hokis = ['2.1 Saiz Padang Standard Pertandingan',
                            '2.2 Saiz Padang Untuk Latihan Sahaja',
                            '2.2 Padang Rumput Standard Pertandingan',
                            '2.2 Padang Rumput Untuk Latihan Sahaja'
                        ];
                $ada_tiadas = ['ada' => 1, 'tiada' => 2];
                $gunasamas = ['ada' => 1, 'tiada' => 2];
                $masih_digunakans = ['ada' => 1, 'tiada' => 2];
                $status_fizikals = [ 'selesa' => 1,
                                    'tidak_selesa' => 2,
                                    'kefungsian' => 3,
                                    'sekuriti' => 4,
                                    'keselamatan' => 5,
                                ];

            ?>

            <tr>
                <td> Bola Sepak </td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ada_tiada" id="{{ $id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach

                <td colspan="2" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>

                <td>
                    <input type="text" class="form-control" id="" name="">
                </td>

                <td colspan="7" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
            </tr>

            @foreach($bola_sepaks as $bola_sepak)
                <tr>
                    <td> {{ $bola_sepak }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ada_tiada" id="{{ $id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($gunasamas as $id => $gunasama)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gunasama" id="{{ $id }}" value="{{ $gunasama }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <input type="text" class="form-control" id="" name="">
                    </td>

                    @foreach ($masih_digunakans as $id => $masih_digunakan)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="masih_digunakan" id="{{ $id }}" value="{{ $masih_digunakan }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($status_fizikals as $id => $status_fizikal)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_fizikal" id="{{ $id }}" value="{{ $status_fizikal }}">
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach

            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        2. Padang Hoki
                    </h5>
                </td>
            </tr>

            <tr>
                <td> Padang Hoki </td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ada_tiada" id="{{ $id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach

                <td colspan="2" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>

                <td>
                    <input type="text" class="form-control" id="" name="">
                </td>

                <td colspan="7" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
            </tr>

            @foreach($hokis as $hoki)
                <tr>
                    <td> {{ $hoki }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ada_tiada" id="{{ $id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($gunasamas as $id => $gunasama)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gunasama" id="{{ $id }}" value="{{ $gunasama }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <input type="text" class="form-control" id="" name="">
                    </td>

                    @foreach ($masih_digunakans as $id => $masih_digunakan)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="masih_digunakan" id="{{ $id }}" value="{{ $masih_digunakan }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($status_fizikals as $id => $status_fizikal)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_fizikal" id="{{ $id }}" value="{{ $status_fizikal }}">
                            </div>
                        </td>
                    @endforeach
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
