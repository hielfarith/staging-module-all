<?php
$programs = [
    1 => 'Kejohanan Olahraga Sekolah/ Sukan Tahunan Sekolah',
    2 => 'Kejohanan Merentas Desa',
    3 => 'Sukantara',
    4 => 'Sukan Tahap 1',
    5 => 'Sukan Pendidikan Khas',
    6 => 'Program Sukan/ Kecergasan',
    7 => 'Majlis Anugerah Sukan',
];
?>

<div class="row">
    <div class="col-md-6">
        <label class="form-label fw-bold">Item</label>
        <select name="" id="" class="form-control select2" multiple>
            <option value="" hidden>Item</option>
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
    #ringkasan_program thead th {
        vertical-align: middle;
        text-align: center;
    }

    #ringkasan_program tbody {
        vertical-align: middle;
        text-align: center;
    }

    #ringkasan_program table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

<hr>

<div class="table-responsive mt-2">
    <table class="table table-bordered table-hovered" id="ringkasan_program">
        <thead>
            <tr>
                <th rowspan="2">Item</th>
                <th colspan="4">Bilangan Sekolah</th>
            </tr>
            <tr>
                <th>Ada</th>
                <th>Tiada</th>
                <th>Setiap Tahun</th>
                <th>Setiap 2 Tahun</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kejohanan Olahraga Sekolah / Sukan Tahunan Sekolah</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Kejohanan Merentas Desa</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Sukantara</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Sukan Tahap 1 (Sekolah Rendah)</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Sukan Pendidikan Khas (Program Integrasi)</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Program Sukan / Kecergasan</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Majlis Anugerah Sukan / Hari Anugerah Sukan</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Pertandingan sukan antara rumah sukan sekolah</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Pertandingan sukan antara kelas</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Pertandingan sukan antara Unit Sukan dan Permainan</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Perlawanan Persahabatan dengan Sekolah / Pasukan lain</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Sukan Mini</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Sukan Prasekolah</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Klinik Sukan Sekolah 1Murid1Sukan</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Hari Sukan Negara</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
            <tr>
                <td>Lain Lain</td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
                <td>
                    178
                </td>
            </tr>
        </tbody>
    </table>
</div>
