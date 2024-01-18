<style>
    #prasarana_sekolah_ikeps thead th {
        vertical-align: middle;
        text-align: center;
    }

    #prasarana_sekolah_ikeps tbody {
        vertical-align: middle;
        text-align: center;
    }

    #prasarana_sekolah_ikeps table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<form id="praSekForm" action="{{ route('ikeps.store', 'prasarana_sekolah') }}" method="POST">
@csrf
<div class="row">

    <div class="col-md-12 mt-2 mb-2">
        <label class="form-label fw-bold">Nama Sekolah</label>
        <input type="text" class="form-control" id="" name="" value="" disabled>
    </div>

    <div class="col-md-4">
        <h5 class="mb-1 fw-bold mb-1">
            <span class="badge rounded-pill badge-light-primary">
                1. Pemeriksaan Keselamatan
            </span>
        </h5>
        <label class="form-label fw-bold">
            Adakah pihak sekolah telah membuat pemeriksaan keselamatan ke atas peralatan dan kemudahan sukan sekolah?
        </label>
        <select name="pemeriksaan_keselamatan" id="pemeriksaan_keselamatan" class="form-control select2" onchange="HandlePemeriksaanKeselamatan()">
            <option value="" hidden>Pemeriksaan Keselamatan</option>
            <option value="1">Ya</option>
            <option value="2">Tidak</option>
        </select>
    </div>

    <div class="col-md-4 mt-4" id="div_tarikh_pemeriksaan" style="display: none;">
        <label class="form-label fw-bold">
            Tarikh Pemeriksaan
        </label>
        <input type="text" id="tarikh_pemeriksaan" name="tarikh_pemeriksaan" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
    </div>
</div>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hovered" id="prasarana_sekolah_ikeps">
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
                    <h5 class="fw-bold text-uppercase text-primary mb-1">
                        2. Padang Sekolah
                    </h5>

                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label class="form-label fw-bold">
                                Status Hakmilik Padang
                            </label>
                            <select name="" id="" class="form-control select2">
                                <option value="" hidden></option>
                                <option value="1">Sewa</option>
                                <option value="2">Hakmilik Sekolah</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label fw-bold">
                                Status Hakmilik Padang
                            </label>
                            <select name="" id="" class="form-control select2">
                                <option value="" hidden></option>
                                <option value="1">Sewa</option>
                                <option value="2">Hakmilik Sekolah</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-1">
                            <label class="form-label fw-bold">
                                Gred Padang
                            </label>
                            <select name="" id="" class="form-control select2">
                                <option value="" hidden></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                            </select>
                        </div>
                    </div>
                </td>
            </tr>

            <?php
                $padangs = [
                    'kt_400' => '2.1 Keluasan Trek 400M',
                    'kt_300' => '2.2 Keluasan Trek 300M',
                    'kt_200' => '2.3 Keluasan Trek 200M',
                    'ktk_200' => '2.4 Keluasan Trek Kurang 200M'
                ];
                $treks = [
                    'trek_400' => '3.1 Trek 400M',
                    'trek_200' => '3.2 Trek 200M',
                    'trek_lain' => '3.3 Lain-lain'
                ];
                $astakas = [
                    'astaka_l_500' => '4.1 Kapasiti Melebihi 500',
                    'astaka_k_500' => '4.1 Kapasiti Kurang 500'
                ];
                $dewans = [
                    'd_besar' => '5.1 Dewan Besar',
                    'd_khas' => '5.2 Dewan Khas Untuk Sukan'
                ];
                $bilik_sukans = [
                    'bps_1' => '6.1 Stor 1 Bay',
                    'bps_2' => '6.2 Stor 2 Bay',
                    'bps_3' => '6.3 Stor 3 Bay',
                ];
                $bilik_persalinans = [
                    'bp_lelaki' => '7.1 Murid Lelaki',
                    'bp_perempuan' => '7.2 Murid Perempuan'
                ];
                $gelanggangs = [
                    'gt_bumbung' => '8.1 Gelanggan Terbuka Berbumbung',
                    'gt' => '8.2 Gelanggan Terbuka',
                ];
                $ada_tiadas = [
                    'ada' => 1,
                    'tiada' => 0
                ];
                $gunasamas = [
                    'ada' => 1,
                    'tiada' => 0
                ];
                $masih_digunakans = [
                    'ada' => 1,
                    'tiada' => 0
                ];
                $status_fizikals = [
                    'selesa' => 1,
                    'tidak_selesa' => 2,
                    'kefungsian' => 3,
                    'sekuriti' => 4,
                    'keselamatan' => 5,
                ];
            ?>

            <tr>
                <td> Padang Sekolah</td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="padang_sekolah" id="{{ 'padang_'.$id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach

                @foreach ($gunasamas as $id => $gunasama)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ps_gunasama" id="{{ 'ps_gunasama_'.$id }}" value="{{ $gunasama }}">
                        </div>
                    </td>
                @endforeach

                <td>
                    <input type="text" class="form-control" name="ps_bilangan" id="ps_bilangan">
                </td>

                <td colspan="7" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
            </tr>

            @foreach($padangs as $pdKey => $padang)
                <tr>
                    <td> {{ $padang }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $pdKey }}" id="{{ $pdKey.'_'.$id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($gunasamas as $id => $gunasama)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $pdKey.'_gunasama' }}" id="{{ $pdKey.'_gunasama_'.$id }}" value="{{ $gunasama }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <input type="text" class="form-control" id="{{ $pdKey.'_bilangan' }}" name="{{ $pdKey.'_bilangan' }}">
                    </td>

                    @foreach ($masih_digunakans as $id => $masih_digunakan)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $pdKey.'_masih_digunakan' }}" id="{{ $pdKey.'_masih_digunakan_'.$id }}" value="{{ $masih_digunakan }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($status_fizikals as $id => $status_fizikal)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $pdKey.'_status_fizikal' }}" id="{{ $pdKey.'_status_fizikal_'.$id }}" value="{{ $status_fizikal }}">
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach

            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        3. Trek Sintetik
                    </h5>
                </td>
            </tr>

            <tr>
                <td> Trek Sintetik</td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="trek_sintetik" id="{{ 'trek_sintektik_'.$id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach

                <td colspan="2" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>

                <td>
                    <input type="text" class="form-control" id="ts_bilangan" name="ts_bilangan">
                </td>

                <td colspan="7" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
            </tr>

            @foreach($treks as $trekKey => $trek)
                <tr>
                    <td> {{ $trek }} @if($trekKey == 'trek_lain') <input class="form-control" id="{{ $trekKey.'_details' }}" id="{{ $trekKey.'_details' }}" @endif</td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $trekKey }}" id="{{ $trekKey.'_'.$id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($gunasamas as $id => $gunasama)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $trekKey.'_gunasama' }}" id="{{ $trekKey.'_gunasama_'.$id }}" value="{{ $gunasama }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <input type="text" class="form-control" id="{{ $trekKey.'_bilangan' }}" name="{{ $trekKey.'_bilangan' }}">
                    </td>

                    @foreach ($masih_digunakans as $id => $masih_digunakan)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $trekKey.'_masih_digunakan' }}" id="{{ $trekKey.'_masih_digunakan_'.$id }}" value="{{ $masih_digunakan }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($status_fizikals as $id => $status_fizikal)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $trekKey.'_status_fizikal' }}" id="{{ $trekKey.'_status_fizikal_'.$id }}" value="{{ $status_fizikal }}">
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach

            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        4. Astaka
                    </h5>
                </td>
            </tr>

            <tr>
                <td> Astaka </td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="astaka" id="{{ 'astaka'.$id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach


                <td colspan="2" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>

                <td>
                    <input type="text" class="form-control" name="astaka_bilangan" id="astaka_bilangan">
                </td>

                <td colspan="7" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
            </tr>

            @foreach($astakas as $astakaKey => $astaka)
                <tr>
                    <td> {{ $astaka }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $astakaKey }}" id="{{ $astakaKey.'_'.$id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($gunasamas as $id => $gunasama)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $astakaKey.'_gunasama' }}" id="{{ $astakaKey.'_gunasama_'.$id }}" value="{{ $gunasama }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <input type="text" class="form-control" id="{{ $astakaKey.'_bilangan' }}" name="{{ $astakaKey.'_bilangan' }}">
                    </td>

                    @foreach ($masih_digunakans as $id => $masih_digunakan)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $astakaKey.'_masih_digunakan' }}" id="{{ $astakaKey.'_masih_digunakan_'.$id }}" value="{{ $masih_digunakan }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($status_fizikals as $id => $status_fizikal)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $astakaKey.'_status_fizikal' }}" id="{{ $astakaKey.'_status_fizikal_'.$id }}" value="{{ $status_fizikal }}">
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach

            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        5. Dewan
                    </h5>
                </td>
            </tr>

            <tr>
                <td> Dewan </td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dewan" id="{{ 'dewan'.$id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach


                <td colspan="2" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>

                <td>
                    <input type="text" class="form-control" name="dewan_bilangan" id="dewan_bilangan">
                </td>

                <td colspan="7" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
            </tr>

            @foreach($dewans as $dewanKey => $dewan)
                <tr>
                    <td> {{ $dewan }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $dewanKey }}" id="{{ $dewanKey.'_'.$id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($gunasamas as $id => $gunasama)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $dewanKey.'_gunasama' }}" id="{{ $dewanKey.'_gunasama_'.$id }}" value="{{ $gunasama }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <input type="text" class="form-control" id="{{ $dewanKey.'_bilangan' }}" name="{{ $dewanKey.'_bilangan' }}">
                    </td>

                    @foreach ($masih_digunakans as $id => $masih_digunakan)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $dewanKey.'_masih_digunakan' }}" id="{{ $dewanKey.'_masih_digunakan_'.$id }}" value="{{ $masih_digunakan }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($status_fizikals as $id => $status_fizikal)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $dewanKey.'_status_fizikal' }}" id="{{ $dewanKey.'_status_fizikal_'.$id }}" value="{{ $status_fizikal }}">
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach

            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        6. Bilik Peralatan Sukan
                        <br>
                        <span class="text-muted">
                            <i>Anggaran 1 Kelas = 3 Bay</i>
                        </span>
                    </h5>
                </td>
            </tr>

            <tr>
                <td> Bilik Peralatan Sukan </td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bilik_alat_sukan" id="{{ 'bilik_alat_sukan'.$id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach


                <td colspan="2" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>

                <td>
                    <input type="text" class="form-control" name="bps_bilangan" id="bps_bilangan">
                </td>

                <td colspan="7" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
            </tr>

            @foreach($bilik_sukans as $bpsKey => $bilik_sukan)
                <tr>
                    <td> {{ $bilik_sukan }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $bpsKey }}" id="{{ $bpsKey.'_'.$id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($gunasamas as $id => $gunasama)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $bpsKey.'_gunasama' }}" id="{{ $bpsKey.'_gunasama_'.$id }}" value="{{ $gunasama }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <input type="text" class="form-control" id="{{ $bpsKey.'_bilangan' }}" name="{{ $bpsKey.'_bilangan' }}">
                    </td>

                    @foreach ($masih_digunakans as $id => $masih_digunakan)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $bpsKey.'_masih_digunakan' }}" id="{{ $bpsKey.'_masih_digunakan_'.$id }}" value="{{ $masih_digunakan }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($status_fizikals as $id => $status_fizikal)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $bpsKey.'_status_fizikal' }}" id="{{ $bpsKey.'_status_fizikal_'.$id }}" value="{{ $status_fizikal }}">
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach

            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        7. Bilik Persalinan
                    </h5>
                </td>
            </tr>

            <tr>
                <td> Bilik Persalinan </td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bilik_salin" id="{{ 'bilik_salin'.$id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach


                <td colspan="2" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>

                <td>
                    <input type="text" class="form-control" name="bilik_salin_bilangan" id="bilik_salin_bilangan">
                </td>

                <td colspan="7" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
            </tr>

            @foreach($bilik_persalinans as $salinKey => $bilik_persalinan)
                <tr>
                    <td> {{ $bilik_persalinan }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $salinKey }}" id="{{ $salinKey.'_'.$id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($gunasamas as $id => $gunasama)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $salinKey.'_gunasama' }}" id="{{ $salinKey.'_gunasama_'.$id }}" value="{{ $gunasama }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <input type="text" class="form-control" id="{{ $salinKey.'_bilangan' }}" name="{{ $salinKey.'_bilangan' }}">
                    </td>

                    @foreach ($masih_digunakans as $id => $masih_digunakan)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $salinKey.'_masih_digunakan' }}" id="{{ $salinKey.'_masih_digunakan_'.$id }}" value="{{ $masih_digunakan }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($status_fizikals as $id => $status_fizikal)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $salinKey.'_status_fizikal' }}" id="{{ $salinKey.'_status_fizikal_'.$id }}" value="{{ $status_fizikal }}">
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach

            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        8. Gelanggang Serbaguna
                    </h5>
                </td>
            </tr>

            <tr>
                <td> Gelanggang Serbaguna </td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gelanggang" id="{{ 'gelanggang'.$id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach


                <td colspan="2" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>

                <td>
                    <input type="text" class="form-control" name="gelanggang_bilangan" id="gelanggang_bilangan">
                </td>

                <td colspan="7" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
            </tr>

            @foreach($gelanggangs as $gelanggangKey => $gelanggang)
                <tr>
                    <td> {{ $gelanggang }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $gelanggangKey }}" id="{{ $gelanggangKey.'_'.$id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($gunasamas as $id => $gunasama)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $gelanggangKey.'_gunasama' }}" id="{{ $gelanggangKey.'_gunasama_'.$id }}" value="{{ $gunasama }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <input type="text" class="form-control" id="{{ $gelanggangKey.'_bilangan' }}" name="{{ $gelanggangKey.'_bilangan' }}">
                    </td>

                    @foreach ($masih_digunakans as $id => $masih_digunakan)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $gelanggangKey.'_masih_digunakan' }}" id="{{ $gelanggangKey.'_masih_digunakan_'.$id }}" value="{{ $masih_digunakan }}">
                            </div>
                        </td>
                    @endforeach

                    @foreach ($status_fizikals as $id => $status_fizikal)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $gelanggangKey.'_status_fizikal' }}" id="{{ $gelanggangKey.'_status_fizikal_'.$id }}" value="{{ $status_fizikal }}">
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach

            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        9. Bilik Kecergasan
                    </h5>
                </td>
            </tr>

            <tr>
                <td> Bilik Kecergasan </td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bk" id="{{ 'bk_'.$id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach

                @foreach ($gunasamas as $id => $gunasama)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bk_gunasama" id="{{ 'bk_gunasama_'.$id }}" value="{{ $gunasama }}">
                        </div>
                    </td>
                @endforeach

                <td>
                    <input type="text" class="form-control" id="bk_bilangan" name="bk_bilangan">
                </td>

                @foreach ($masih_digunakans as $id => $masih_digunakan)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bk_masih_digunakan" id="{{ 'bk_masih_digunakan_'.$id }}" value="{{ $masih_digunakan }}">
                        </div>
                    </td>
                @endforeach

                @foreach ($status_fizikals as $id => $status_fizikal)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bk_status_fizikal" id="{{ 'bk_status_fizikal'.$id }}" value="{{ $status_fizikal }}">
                        </div>
                    </td>
                @endforeach
            </tr>

            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        11. Makmal Sains Sukan
                    </h5>
                </td>
            </tr>

            <tr>
                <td> Makmal Sains Sukan </td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mss" id="{{ 'mss_'.$id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach

                @foreach ($gunasamas as $id => $gunasama)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mss_gunasama" id="{{ 'mss_gunasama_'.$id }}" value="{{ $gunasama }}">
                        </div>
                    </td>
                @endforeach

                <td>
                    <input type="text" class="form-control" id="mss_bilangan" name="mss_bilangan">
                </td>

                @foreach ($masih_digunakans as $id => $masih_digunakan)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mss_masih_digunakan" id="{{ 'mss_masih_digunakan_'.$id }}" value="{{ $masih_digunakan }}">
                        </div>
                    </td>
                @endforeach

                @foreach ($status_fizikals as $id => $status_fizikal)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mss_status_fizikal" id="{{ 'mss_status_fizikal'.$id }}" value="{{ $status_fizikal }}">
                        </div>
                    </td>
                @endforeach
            </tr>

            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        12. Kolam Renang
                    </h5>
                </td>
            </tr>

            <tr>
                <td> Kolam Renang </td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="k_renang_" id="{{ 'k_renang__'.$id }}" value="{{ $ada_tiada }}">
                        </div>
                    </td>
                @endforeach

                @foreach ($gunasamas as $id => $gunasama)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="k_renang_gunasama" id="{{ 'k_renang_gunasama_'.$id }}" value="{{ $gunasama }}">
                        </div>
                    </td>
                @endforeach

                <td>
                    <input type="text" class="form-control" id="k_renang_bilangan" name="k_renang_bilangan">
                </td>

                @foreach ($masih_digunakans as $id => $masih_digunakan)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="k_renang_masih_digunakan" id="{{ 'k_renang_masih_digunakan_'.$id }}" value="{{ $masih_digunakan }}">
                        </div>
                    </td>
                @endforeach

                @foreach ($status_fizikals as $id => $status_fizikal)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="k_renangstatus_fizikal" id="{{ 'k_renangstatus_fizikal'.$id }}" value="{{ $status_fizikal }}">
                        </div>
                    </td>
                @endforeach
        </tbody>
    </table>
</div>

<br>

<div class="d-flex justify-content-center">
    <button type="button" class="btn btn-primary"  onclick="submitTab('#praSekForm')">Simpan</button>
</div>

<br>

</form>
<div class="card-footer">
    {{-- <div class="d-flex justify-content-between"> --}}
    <div class="d-flex justify-content-end">
        {{-- <button class="btn btn-outline-secondary prev-tab">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Kembali</span>
        </button> --}}
        <button class="btn btn-primary next-tab">
            <span class="align-middle d-sm-inline-block d-none">Seterusnya</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>
