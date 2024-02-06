<style>
    #verifikasi-sq2-3 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq2-3 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq2-3 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_2_3 = [
        '2.3.1' => 'Berasaskan perkembangan holistik (bahan dan peralatan yang digunakan sesuai dengan perkembangan kanak- kanak)',
        '2.3.2' => 'Berasaskan aktiviti harian dan kemahiran (sumber dan peralatan yang digunakan dalam rutin harian sesuai untuk merangsang kemahiran kanak- kanak)',
        '2.3.3' => 'Kreatif, lestari dan inovatif (menghasilkan sumber pembelajaran yang kreatif, lestari, inovatif)',
    ];

    $options = [
        '2.3.1' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak menggunakan sumber yang pelbagai bagi memenuhi keperluan perkembangan holistik. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang menggunakan sumber yang pelbagai bagi memenuhi keperluan perkembangan holistik. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang menggunakan sumber yang pelbagai bagi memenuhi keperluan perkembangan holistik. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa menggunakan sumber yang pelbagai bagi memenuhi keperluan perkembangan holistik. </i>',
        ],
        '2.3.2' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak menggunakan sumber yang pelbagai bagi memenuhi keseluruhan keperluan aktiviti harian dan tidak merangsang kemahiran asas kanak-kanak. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang menggunakan sumber yang pelbagai bagi memenuhi keseluruhan keperluan aktiviti harian dan tidak merangsang kemahiran asas kanak-kanak. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang menggunakan sumber yang pelbagai bagi memenuhi keseluruhan keperluan aktiviti harian dan tidak merangsang kemahiran asas kanak-kanak. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa menggunakan sumber yang pelbagai bagi memenuhi keseluruhan keperluan aktiviti harian dan tidak merangsang kemahiran asas kanak-kanak. </i>',
        ],
        '2.3.3' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak memanfaatkan bahan dengan kreatif, inovatif dan lestari. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang memanfaatkan bahan dengan kreatif, inovatif dan lestari. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang memanfaatkan bahan dengan kreatif, inovatif dan lestari. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa memanfaatkan bahan dengan kreatif, inovatif dan lestari. </i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    PENGASUHAN DAN PEMBELAJARAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq2-3">
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
                <td>SQ2.3</td>
                <td colspan="6">Sumber Pembelajaran (ABM)</td>
            </tr>
            @foreach ($items_2_3 as $index => $item_2_3)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_2_3 }} </td>

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
