<style>
    #verifikasi-sq4-2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq4-2 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq4-2 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_4_2 = [
        '4.2.1' => 'Penglibatan komuniti bersama TASKA (menjalankan aktiviti bersama komuniti)',
        '4.2.2' => 'Hubungan kerjasama TASKA/ pendidik bersama komuniti (pendidik menjalinkan hubungan baik bersama komuniti- menyertai program yang dianjurkan oleh komuniti)',
    ];

    $options = [
        '4.2.1' => [
            0 => '<i style="font-size: 12px"> TASKA tidak merancang dan tidak melaksanakan aktiviti/program bersama komuniti. </i>',
            1 => '<i style="font-size: 12px"> TASKA membuat perancangan tetapi tidak melaksanakan  aktiviti/ program bersama komuniti. </i>',
            2 => '<i style="font-size: 12px"> TASKA tidak merancang tetapi melaksanakan aktiviti/ program bersama komuniti. </i>',
            3 => '<i style="font-size: 12px"> TASKA membuat perancangan dan melaksanakan aktiviti/ program yang melibatkan komuniti. </i>',
        ],
        '4.2.2' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mempunyai jalinan kerjasama yang baik dengan komuniti setempat demi kesejahteraan TASKA, pendidik dan kanak-kanak. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang mempunyai jalinan kerjasama yang baik dengan komuniti setempat demi kesejahteraan TASKA, pendidik dan kanak-kanak. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang mempunyai jalinan kerjasama yang baik dengan komuniti setempat demi kesejahteraan TASKA, pendidik dan kanak- kanak. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa mempunyai jalinan kerjasama yang baik dengan komuniti setempat demi kesejahteraan TASKA, pendidik dan kanak-kanak. </i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    KOLABORASI KELUARGA DAN KOMUNITI
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq4-2">
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
                <td>SQ4.2</td>
                <td colspan="6">Jalinan Kerjasama dengan Komuniti</td>
            </tr>
            @foreach ($items_4_2 as $index => $item_4_2)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_4_2 }} </td>

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
