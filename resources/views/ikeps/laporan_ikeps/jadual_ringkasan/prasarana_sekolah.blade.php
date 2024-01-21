<div class="row">
    <div class="col-md-6">
        <label class="form-label fw-bold">Jenis Prasarana</label>
        <select name="" id="" class="form-control select2" multiple>
            <option value="" hidden>Jenis Prasarana</option>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-bold">Jenis Sub Prasarana</label>
        <select name="" id="" class="form-control select2" multiple>
            <option value="" hidden>Jenis Prasarana</option>
        </select>
    </div>

    <div class="d-flex justify-content-end align-items-center mt-1">
        <a class="me-3 text-danger" type="button" id="reset" href="#">
            Setkan Semula
        </a>
        <button type="button" onclick="search()" class="btn btn-success float-right">
            <i class="fa fa-search me-1"></i> Cari
        </button>
    </div>
</div>

<style>
    #ringkasan_prasarana_sekolah thead th {
        vertical-align: middle;
        text-align: center;
    }

    #ringkasan_prasarana_sekolah tbody {
        vertical-align: middle;
        text-align: center;
    }

    #ringkasan_prasarana_sekolah table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

<hr>

<div class="table-responsive mt-2">
    <table class="table table-bordered table-hovered" id="ringkasan_prasarana_sekolah">
        <thead>
            <tr>
                <th rowspan="2">No.</th>
                <th rowspan="2">Jenis Prasarana</th>
                <th rowspan="2">Sub Prasarana</th>
                <th colspan="2">Bilangan</th>
            </tr>
            <tr>
                <th>Ada</th>
                <th>Tiada</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $padangs = [
                    'kt_400' => 'Keluasan Trek 400M',
                    'kt_300' => 'Keluasan Trek 300M',
                    'kt_200' => 'Keluasan Trek 200M',
                    'ktk_200' => 'Keluasan Trek Kurang 200M'
                ];
                $treks = [
                    'trek_400' => 'Trek 400M',
                    'trek_200' => 'Trek 200M',
                    'trek_lain' => 'Lain-lain'
                ];
                $astakas = [
                    'astaka_l_500' => 'Kapasiti Melebihi 500',
                    'astaka_k_500' => 'Kapasiti Kurang 500'
                ];
                $dewans = [
                    'd_besar' => 'Dewan Besar',
                    'd_khas' => 'Dewan Khas Untuk Sukan'
                ];
                $bilik_sukans = [
                    'bps_1' => 'Stor 1 Bay',
                    'bps_2' => 'Stor 2 Bay',
                    'bps_3' => 'Stor 3 Bay',
                ];
                $bilik_persalinans = [
                    'bp_lelaki' => 'Murid Lelaki',
                    'bp_perempuan' => 'Murid Perempuan'
                ];
                $gelanggangs = [
                    'gt_bumbung' => 'Gelanggan Terbuka Berbumbung',
                    'gt' => 'Gelanggan Terbuka',
                ];

                $nombor = '1';
            ?>

            @foreach ($padangs as $padangKey => $padang)
            <tr>
                <td>{{ $nombor++ }}</td>
                <td> Padang Sekolah</td>
                <td>{{ $padang }}</td>
                <td>60</td>
                <td>60</td>
            </tr>
            @endforeach

            @foreach ($treks as $trekKey => $trek)
            <tr>
                <td>{{ $nombor++ }}</td>
                <td> Trek Sintetik </td>
                <td>{{ $trek }}</td>
                <td>60</td>
                <td>60</td>
            </tr>
            @endforeach

            @foreach ($astakas as $astakaKey => $astaka)
            <tr>
                <td>{{ $nombor++ }}</td>
                <td> Astaka </td>
                <td>{{ $astaka }}</td>
                <td>60</td>
                <td>60</td>
            </tr>
            @endforeach

            @foreach ($dewans as $dewanKey => $dewan)
            <tr>
                <td>{{ $nombor++ }}</td>
                <td> Dewan </td>
                <td>{{ $dewan }}</td>
                <td>60</td>
                <td>60</td>
            </tr>
            @endforeach

            @foreach ($bilik_sukans as $bilik_sukanKey => $bilik_sukan)
            <tr>
                <td>{{ $nombor++ }}</td>
                <td> Bilik Peralatan Sukan </td>
                <td>{{ $bilik_sukan }}</td>
                <td>60</td>
                <td>60</td>
            </tr>
            @endforeach

            @foreach ($bilik_persalinans as $bilik_persalinanKey => $bilik_persalinan)
            <tr>
                <td>{{ $nombor++ }}</td>
                <td> Bilik Persalinan </td>
                <td>{{ $bilik_persalinan }}</td>
                <td>60</td>
                <td>60</td>
            </tr>
            @endforeach

            @foreach ($gelanggangs as $gelanggangKey => $gelanggang)
            <tr>
                <td>{{ $nombor++ }}</td>
                <td> Gelanggang Serbaguna </td>
                <td>{{ $gelanggang }}</td>
                <td>60</td>
                <td>60</td>
            </tr>
            @endforeach

            <tr>
                <td>{{ $nombor++ }}</td>
                <td>Bilik Kecergasan</td>
                <td></td>
                <td>60</td>
                <td>60</td>
            </tr>

            <tr>
                <td>{{ $nombor++ }}</td>
                <td>Makmal Sains Sukan</td>
                <td></td>
                <td>60</td>
                <td>60</td>
            </tr>

            <tr>
                <td>{{ $nombor++ }}</td>
                <td>Kolam Renang</td>
                <td></td>
                <td>60</td>
                <td>60</td>
            </tr>
        </tbody>
    </table>
</div>
