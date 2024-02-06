<style>
    #verifikasi-sq2-6 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq2-6 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq2-6 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_2_6 = [
        '2.6.1' => 'Perancangan penaksiran perkembangan (merekod setiap perkembangan kanak-kanak dengan baik)',
        '2.6.2' => 'Pelaksanaan perkembangan dan pentaksiran (menggunakan pelbagai kaedah dalam merekod perkembangan kanak-kanak: pemerhatian, soal jawab, jalankan aktiviti, mencatat kejadian semasa, mengambil gambar/ video)',
        '2.6.3' => 'Amalan reflektif dan tindakan susulan (mencatatkan kekuatan dan kelemahan serta penambahbaikkan aktiviti)',
        '2.6.4' => 'Perkongsian dengan Keluarga (perbincangan bersama keluarga kanak-kanak mengenai perkembangan)',
        '2.6.5' => 'Pengesanan awal dan rekod (mempunyai perancangan  pentaksiran contohnya developmental alert checklist by NCDC)',
    ];

    $options = [
        '2.6.1' => [
            0 => '<i style="font-size: 12px">Pendidik tidak mempunyai perkembangan dan pentaksiran.</i>',
            1 => '<i style="font-size: 12px">Pendidik mempunyai perancangan perkembangan dan pentaksiran yang tidak lengkap dan tidak bersesuaian dengan perkembangan kanak-kanak</i>',
            2 => '<i style="font-size: 12px">Pendidik mempunyai perancangan perkembangan dan pentaksiran yang tidak lengkap tetapi bersesuaian dengan perkembangan kanak-kanak</i>',
            3 => '<i style="font-size: 12px">Pendidik mempunyai perancangan perkembangan dan pentaksiran yang lengkap dan bersesuaian dengan perkembangan kanak-kanak</i>',
        ],
        '2.6.2' => [
            0 => '<i style="font-size: 12px"> TASKA tidak melaksanakan perkembangan dan pentaksiran secara berterusan menggunakan pelbagai kaedah pentaksiran yang bersesuaian. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang melaksanakan perkembangan dan pentaksiran secara berterusan menggunakan pelbagai kaedah pentaksiran yang bersesuaian. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang melaksanakan perkembangan dan pentaksiran secara berterusan menggunakan pelbagai kaedah pentaksiran yang bersesuaian. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa melaksanakan perkembangan dan pentaksiran secara berterusan menggunakan pelbagai kaedah pentaksiran yang bersesuaian. </i>',
        ],
        '2.6.3' => [
            0 => '<i style="font-size: 12px;"> TASKA tidak membuat amalan reflektif selepas aktiviti pembelajaran dan membuat penambahbaikan sekiranya perlu. </i>',
            1 => '<i style="font-size: 12px;"> TASKA jarang-jarang membuat amalan reflektif selepas aktiviti pembelajaran dan membuat penambahbaikan sekiranya perlu. </i>',
            2 => '<i style="font-size: 12px;"> TASKA kadang-kadang membuat amalan reflektif selepas aktiviti pembelajaran dan membuat penambahbaikan sekiranya perlu. </i>',
            3 => '<i style="font-size: 12px;"> TASKA sentiasa membuat amalan reflektif selepas aktiviti pembelajaran dan membuat penambahbaikan sekiranya perlu. </i>',
        ],
        '2.6.4' => [
            0 => '<i style="font-size: 12px;"> Pendidik tidak berkongsi maklumat pentaksiran kanak- kanak secara komunikasi dua hala dengan keluarga serta tidak memberi cadangan penyelesaian yang bersesuaian. </i>',
            1 => '<i style="font-size: 12px;"> Pendidik jarang-jarang berkongsi maklumat pentaksiran kanak- kanak secara komunikasi dua hala dengan keluarga serta jarang-jarang memberi cadangan penyelesaian yang bersesuaian. </i>',
            2 => '<i style="font-size: 12px;"> Pendidik kadang-kadang berkongsi maklumat pentaksiran kanak- kanak secara komunikasi dua hala dengan keluarga serta kadang-kadang memberi cadangan penyelesaian yang bersesuaian. </i>',
            3 => '<i style="font-size: 12px;"> Pendidik sentiasa berkongsi maklumat pentaksiran kanak- kanak secara komunikasi dua hala dengan keluarga serta sentiasa memberi cadangan penyelesaian yang bersesuaian. </i>',
        ],
        '2.6.5' => [
            0 => '<i style="font-size: 12px;"> TASKA tidak melaksanakan prosedur pengesanan awal yang menyeluruh dan tidak mempunyai rekod perkembangan kanak-kanak. </i>',
            1 => '<i style="font-size: 12px;"> TASKA jarang-jarang melaksanakan prosedur pengesanan awal yang menyeluruh dan tidak mempunyai rekod perkembangan kanak-kanak. </i>',
            2 => '<i style="font-size: 12px;"> TASKA kadang-kadang melaksanakan prosedur pengesanan awal yang menyeluruh dan mempunyai rekod perkembangan kanak-kanak. </i>',
            3 => '<i style="font-size: 12px;"> TASKA sentiasa melaksanakan prosedur pengesanan awal yang menyeluruh dan mempunyai rekod perkembangan kanak-kanak. </i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    PENGASUHAN DAN PEMBELAJARAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq2-6">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kriteria</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-light-primary fw-bolder">
                <td>SQ2.6</td>
                <td colspan="6">Penaksiran Perkembangan</td>
            </tr>
            @foreach ($items_2_6 as $index => $item_2_6)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_2_6 }} </td>

                    @foreach ($options[$index] as $key => $option)
                        <td>
                            <div class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                <input class="form-check-input" type="radio" name="{{ $index }}" value="{{$key}}" required>
                            </div>
                            <br>

                            <div class="d-flex justify-content-center align-items-center">
                                {!! $option !!}
                            </div>
                        </td>
                    @endforeach

                    <td>Auto-selected</td>
                </tr>

                <tr class="bg-light-success">
                    <td colspan="6">
                        <label class="fw-bolder">Catatan: </label>
                        <textarea name="" id="" rows="2" class="form-control"></textarea>
                    </td>
                    <td class="bg-dark"></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-danger">
                <td class="text-end" colspan="6">
                    Jumlah
                </td>
                <td class="text-center">Auto-calculated</td>
            </tr>
        </tfoot>
    </table>
</div>

<hr>

<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitform1()">Simpan</button>
</div>
