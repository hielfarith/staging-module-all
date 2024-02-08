<style>
    #verifikasi-sq3-3 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq3-3 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq3-3 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_3_3 = [
        '3.3.1' => 'Amalan kebersihan bayi dan kanak-kanak (memastikan amalan kebersihan kanak-kanak dan mematuhi SOP) (amalan basuh tangan, penggunaan tandas, tatacara mandi, dsb.)',
        '3.3.2' => 'Amalan kebersihan pendidik (menunjukkan amalan kendiri dan menitikberatkan SOP kebersihan TASKA)',
        '3.3.3' => 'Kebersihan ruang dalam (kebersihan TASKA dijalankan secara rutin dan berkala- rujuk jadual pembersihan TASKA)',
        '3.3.4' => 'Kebersihan ruang luar (kebersihan TASKA dijalankan secara rutin dan berkala- rujuk jadual pembersihan TASKA)',
        '3.3.5' => 'Peralatan/ bahan kebersihan (peralatan/ bahan kebersihan dilabel dan disimpan)',
    ];

    $options = [
        '3.3.1' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak memastikan amalan kebersihan kanak-kanak dan tidak mematuhi langkah- langkah kebersihan mengikut SOP yang ditetapkan sepanjang berada di TASKA. </i>',
            1 => '<i style="font-size: 12px"> Pendidik tidak memastikan amalan kebersihan kanak-kanak namun mematuhi langkah- langkah kebersihan mengikut SOP yang ditetapkan sepanjang berada di TASKA. </i>',
            2 => '<i style="font-size: 12px"> Pendidik memastikan amalan kebersihan kanak-kanak tetapi tidak mematuhi langkah-langkah kebersihan mengikut SOP yang ditetapkan sepanjang berada di TASKA. </i>',
            3 => '<i style="font-size: 12px"> Pendidik memastikan amalan kebersihan kanak-kanak dan mematuhi langkah-langkah kebersihan mengikut SOP yang ditetapkan sepanjang berada di TASKA. </i>',
        ],
        '3.3.2' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak menunjukkan amalan kebersihan kendiri dan tidak menitikberatkan SOP kebersihan di TASKA.</i>',
            1 => '<i style="font-size: 12px"> Pendidik tidak menunjukkan amalan kebersihan kendiri tetapi menitikberatkan SOP kebersihan di TASKA.</i>',
            2 => '<i style="font-size: 12px"> Pendidik menunjukkan amalan kebersihan kendiri tetapi tidak menitikberatkan SOP kebersihan di TASKA.</i>',
            3 => '<i style="font-size: 12px"> Pendidik menunjukkan amalan kebersihan kendiri dan menitikberatkan SOP kebersihan di TASKA.</i>',
        ],
        '3.3.3' => [
            0 => '<i style="font-size: 12px"> TASKA tidak menekankan aspek kebersihan dalam bangunan secara rutin dan berkala. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang menekankan aspek kebersihan dalam bangunan secara rutin dan berkala. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang menekankan aspek kebersihan dalam bangunan secara rutin dan berkala. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa menekankan aspek kebersihan dalam bangunan secara rutin dan berkala. </i>',
        ],
        '3.3.4' => [
            0 => '<i style="font-size: 12px"> TASKA tidak menekankan aspek kebersihan luar bangunan secara rutin dan berkala </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang menekankan aspek kebersihan luar bangunan secara rutin dan berkala. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang menekankan aspek kebersihan luar bangunan secara rutin dan berkala. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa menekankan aspek kebersihan luar bangunan secara rutin dan berkala. </i>',
        ],
        '3.3.5' => [
            0 => '<i style="font-size: 12px"> Peralatan/ bahan kebersihan di TASKA tidak dilabel dengan kemas dan tidak disimpan di tempat yang selamat. </i>',
            1 => '<i style="font-size: 12px"> Peralatan/ bahan kebersihan di TASKA tidak dilabel dengan kemas namun disimpan di tempat yang selamat. </i>',
            2 => '<i style="font-size: 12px"> Peralatan/ bahan kebersihan di TASKA dilabel dengan kemas tetapi tidak disimpan di tempat yang selamat. </i>',
            3 => '<i style="font-size: 12px"> Peralatan/ bahan kebersihan di TASKA dilabel dengan kemas dan disimpan di tempat yang selamat. </i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    KESIHATAN, KESELAMATAN, KEBERSIHAN DAN PEMAKANAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq3-3">
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
                <td>SQ3.2</td>
                <td colspan="6">Kebersihan</td>
            </tr>
            @foreach ($items_3_3 as $index => $item_3_3)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_3_3 }} </td>

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
