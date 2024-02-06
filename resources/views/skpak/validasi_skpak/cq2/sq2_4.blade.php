<style>
    #verifikasi-sq2-4 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq2-4 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq2-4 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_2_4 = [
        '2.4.1' => 'Ruang (penggunaan ruang memenuhi keperluan perkembangan, mengikut jumlah standard (3.5 meter: 1 kanak- kanak)',
        '2.4.2' => 'Sudut Pembelajaran (sudut mengikut 6 bidang perkembangan dan menarik minat kanak-kanak)',
        '2.4.3' => 'Pencahayaan, pengudaraan dan suhu (suhu, udara, cahaya yang bersesuaian dengan kanak-kanak, bahagian bilik kanak-kanak, bilik belajar dan bilik makan)',
        '2.4.4' => 'Barangan peribadi (tempat penyimpanan barang berlabel, teratur, kemas, bersih dan mudah dicapai)',
        '2.4.5' => 'Hasil kerja kanak-kanak (hasil kerja yang dipamerkan berlabel dengan tarikh, nama, tajuk aktiviti)',
        '2.4.6' => 'Peralatan dan perabot (peralatan dan perabot adalah mencukupi, pelbagai, sesuai perkembangan kanak-kanak, dsb)',
    ];

    $options = [
        '2.4.1' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mempunyai ruang mengikut nisbah kanak-kanak dan tidak memaksimumkan penggunaan ruang.</i>',
            1 => '<i style="font-size: 12px"> TASKA tidak mempunyai ruang mengikut nisbah kanak-kanak tetapi memaksimumkan penggunaan ruang.</i>',
            2 => '<i style="font-size: 12px"> TASKA mempunyai ruang mengikut nisbah kanak-kanak tetapi tidak memaksimumkan penggunaan ruang.</i>',
            3 => '<i style="font-size: 12px"> TASKA mempunyai ruang mengikut nisbah kanak-kanak dan memaksimumkan penggunaan ruang.</i>',
        ],
        '2.4.2' => [
            0 => '<i style="font-size: 12px"> TASKA tidak menyediakan sudut pembelajaran. </i>',
            1 => '<i style="font-size: 12px"> TASKA menyediakan sudut pembelajaran tetapi tidak mengikut aspek perkembangan pelbagai dan tidak merangsang minat kanak-kanak untuk belajar. </i>',
            2 => '<i style="font-size: 12px"> TASKA menyediakan sudut pembelajaran mengikut aspek perkembangan pelbagai tetapi tidak merangsang minat kanak- kanak untuk belajar. </i>',
            3 => '<i style="font-size: 12px"> TASKA menyediakan sudut pembelajaran mengikut aspek perkembangan pelbagai dan merangsang minat kanak- kanak untuk belajar. </i>',
        ],
        '2.4.3' => [
            0 => '<i style="font-size: 12px;"> TASKA mempunyai pencahayaan, pengudaraan dan suhu yang tidak sesuai.</i>',
            1 => '<i style="font-size: 12px;"> TASKA mempunyai pencahayaan, pengudaraan dan suhu yang kurang sesuai.</i>',
            2 => '<i style="font-size: 12px;"> TASKA mempunyai pencahayaan, pengudaraan dan suhu yang sesuai.</i>',
            3 => '<i style="font-size: 12px;"> TASKA mempunyai pencahayaan, pengudaraan dan suhu yang sangat sesuai.</i>',
        ],
        '2.4.4' => [
            0 => '<i style="font-size: 12px;"> TASKA mempunyai tempat penyimpanan barang peribadi kanak-kanak yang tidak teratur dan tidak  mudah dicapai oleh kanak-kanak. </i>',
            1 => '<i style="font-size: 12px;"> TASKA mempunyai tempat penyimpanan barang peribadi kanak-kanak yang tidak teratur tetapi mudah dicapai oleh kanak- kanak. </i>',
            2 => '<i style="font-size: 12px;"> TASKA mempunyai tempat penyimpanan barang peribadi kanak-kanak yang teratur tetapi tidak mudah dicapai oleh kanak- kanak. </i>',
            3 => '<i style="font-size: 12px;"> TASKA mempunyai tempat penyimpanan barang peribadi kanak-kanak yang teratur dan mudah dicapai oleh kanak- kanak. </i>',
        ],
        '2.4.5' => [
            0 => '<i style="font-size: 12px;"> TASKA tidak mempamerkan hasil kerja kanak-kanak.</i>',
            1 => '<i style="font-size: 12px;"> TASKA mempamerkan hasil kerja kanak-kanak, tetapi tidak berlabel dan tidak terkini.</i>',
            2 => '<i style="font-size: 12px;"> TASKA mempamerkan hasil kerja kanak-kanak, berlabel tetapi tidak terkini.</i>',
            3 => '<i style="font-size: 12px;"> TASKA sentiasa mempamerkan hasil kerja kanak-kanak, berlabel dan terkini.</i>',
        ],
        '2.4.6' => [
            0 => '<i style="font-size: 12px;"> TASKA mempunyai perabot dan peralatan yang tidak pelbagai dan tidak bersesuaian dengan perkembangan kanak-kanak.</i>',
            1 => '<i style="font-size: 12px;"> TASKA mempunyai perabot dan peralatan yang pelbagai tetapi tidak bersesuaian dengan perkembangan kanak-kanak.</i>',
            2 => '<i style="font-size: 12px;"> TASKA mempunyai perabot dan peralatan yang tidak pelbagai tetapi bersesuaian dengan perkembangan kanak-kanak.</i>',
            3 => '<i style="font-size: 12px;"> TASKA mempunyai perabot dan peralatan yang pelbagai dan bersesuaian dengan perkembangan kanak-kanak.</i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    PENGASUHAN DAN PEMBELAJARAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq2-4">
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
                <td>SQ2.4</td>
                <td colspan="6">Sumber Pembelajaran (ABM)</td>
            </tr>
            @foreach ($items_2_4 as $index => $item_2_4)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_2_4 }} </td>

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
