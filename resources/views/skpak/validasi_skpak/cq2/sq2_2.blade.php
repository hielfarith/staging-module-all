<style>
    #verifikasi-sq2-2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq2-2 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq2-2 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_2_2 = [
        '2.2.1' => 'Perancangan Aktiviti (tajuk aktiviti, tarikh, objektif, masa, bahan, tempat/ruang, langkah perlaksanaan-ditulis dengan lengkap)',
        '2.2.2' => 'Pelaksanaan Amalan Bersesuaian Perkembangan (ABP) (aktiviti yang dilaksanakan sesuai dengan perkembangan kanak-kanak)',
        '2.2.3' => 'Merangsang Kemahiran Berfikir Kanak-kanak(melibatkan pelbagai cara berfikir)',
        '2.2.4' => 'Pembelajaran yang fleksibel (flesksibel: ruang yang digunakan, aktiviti yang dijalankan, sikap/ respons yang diberikan',
        '2.2.5' => 'Integrasi pendekatan pembelajaran (menggunakan kaedah, teknik, strategi pengajaran yang pelbagai)',
        '2.2.6' => 'Amalan scaffolding (menjalankan scaffolding (bimbingan) yang bersesuaian dengan kanak- kanak)',
        '2.2.7' => 'Aktiviti berpusatkan kanak-kanak (aktiviti yang dijalankan memberi peluang kepada kanak-kanak untuk meneroka dengan sendiri)',
    ];

    $options = [
        '2.2.1' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak menyediakan perancangan aktiviti yang bertulis. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang menyediakan perancangan aktiviti yang bertulis. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang menyediakan perancangan aktiviti yang bertulis. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa menyediakan perancangan aktiviti yang bertulis. </i>',
        ],
        '2.2.2' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak melaksanakan aktiviti mengikut ABP. Pendidik tidak menyediakan bahan pengajaran dan pembelajaran yang bersesuaian dengan ABP.</i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang melaksanakan aktiviti mengikut ABP. Pendidik jarang-jarang menyediakan bahan pengajaran dan pembelajaran yang bersesuaian dengan ABP.</i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang melaksanakan aktiviti mengikut ABP. Pendidik kadang-kadang menyediakan bahan pengajaran dan pembelajaran yang bersesuaian dengan ABP.</i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa melaksanakan aktiviti mengikut ABP. Pendidik sentiasa menyediakan bahan pengajaran dan pembelajaran yang bersesuaian dengan ABP.</i>',
        ],
        '2.2.3' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak merangsang kreativiti dan kemahiran berfikir setiap aktiviti yang dijalankan di TASKA. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang merangsang kreativiti dan kemahiran berfikir setiap aktiviti yang dijalankan di TASKA. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang merangsang kreativiti dan kemahiran berfikir setiap aktiviti yang dijalankan di TASKA. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa merangsang kreativiti dan kemahiran berfikir setiap aktiviti yang dijalankan di TASKA. </i>',
        ],
        '2.2.4' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak menunjukkan fleksibiliti dalam perlaksanaan aktiviti mengikut situasi. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang menunjukkan fleksibiliti dalam perlaksanaan aktiviti mengikut situasi. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang menunjukkan fleksibiliti dalam perlaksanaan aktiviti mengikut situasi. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa menunjukkan fleksibiliti dalam perlaksanaan aktiviti mengikut situasi. </i>',
        ],
        '2.2.5' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak menggunakan pelbagai pendekatan, strategi dan teknik yang sesuai dengan perkembangan kanak-kanak dan perbezaan individu. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang menggunakan pelbagai pendekatan, strategi dan teknik yang sesuai dengan perkembangan kanak-kanak dan perbezaan individu. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang menggunakan pelbagai pendekatan, strategi dan teknik yang sesuai dengan perkembangan kanak-kanak dan perbezaan individu. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa menggunakan pelbagai pendekatan, strategi dan teknik yang sesuai dengan perkembangan kanak-kanak dan perbezaan individu. </i>',
        ],
        '2.2.6' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak melaksanakan scaffolding dalam pengalaman pembelajaran. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang melaksanakan scaffolding dalam pengalaman pembelajaran. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang melaksanakan scaffolding dalam pengalaman pembelajaran. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa melaksanakan scaffolding dalam pengalaman pembelajaran. </i>',
        ],
        '2.2.7' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak memberi peluang kepada kanak-kanak mengikut prinsip pembelajaran berpusatkan kanak-kanak. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang memberi peluang kepada kanak-kanak mengikut  prinsip pembelajaran berpusatkan kanak-kanak. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang  memberi peluang kepada kanak- kanak mengikut  prinsip pembelajaran berpusatkan kanak- kanak. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa memberi peluang kepada kanak-kanak mengikut  prinsip pembelajaran berpusatkan kanak-kanak. </i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    PENGASUHAN DAN PEMBELAJARAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq2-2">
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
                <td>SQ2.2</td>
                <td colspan="6">Perancangan dan Pelaksanaan Aktiviti Pembelajaran</td>
            </tr>
            @foreach ($items_2_2 as $index => $item_2_2)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_2_2 }} </td>

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
