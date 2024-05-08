<?php
$sukans = [
    1 => 'Bola Baling',
    2 => 'Bola Jaring',
    3 => 'Bola Keranjang',
    4 => 'Bola Sepak',
    5 => 'Bola Tampar',
];
?>

<div class="row">
    <div class="col-md-6">
        <label class="form-label fw-bold">Jenis Sukan</label>
        <select name="" id="" class="form-control select2" multiple>
            <option value="" hidden>Jenis Sukan</option>
            @foreach ($sukans as $sukanKey => $sukan)
                <option value="{{ $sukanKey }}">{{ $sukan }}</option>
            @endforeach
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
    #ringkasan_penyertaan thead th {
        vertical-align: middle;
        text-align: center;
    }

    #ringkasan_penyertaan tbody {
        vertical-align: middle;
        text-align: center;
    }

    #ringkasan_penyertaan table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<hr>

<div class="table-responsive mt-2">
    <table class="table table-bordered table-hovered" id="ringkasan_penyertaan">
        <thead style="color: white; background-color:#39c3b5;">
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Nama Sukan</th>
                <th colspan="6">Bilangan Sekolah</th>
            </tr>

            <tr>
                <th>Zon</th>
                <th>Daerah</th>
                <th>Bahagian</th>
                <th>Negeri</th>
                <th>Kebangsaan</th>
                <th>Antarabangsa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sukans as $id => $sukan)
                <tr>
                    <td> {{ $id }} </td>
                    <td> {{ $sukan }} </td>

                    <td>
                        60
                    </td>

                    <td>
                        60
                    </td>

                    <td>
                        60
                    </td>

                    <td>
                        60
                    </td>

                    <td>
                        60
                    </td>

                    <td>
                        60
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
