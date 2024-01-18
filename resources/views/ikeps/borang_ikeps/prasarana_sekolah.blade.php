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
