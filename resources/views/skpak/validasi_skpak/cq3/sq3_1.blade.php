<style>
    #verifikasi-sq3-1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq3-1 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq3-1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_3_1 = [
        '3.1.1' => 'Pemantauan kesihatan di TASKA (pendidik prihatin mengenai kesihatan & tumbesaran kanak-kanak dengan memeriksa, mengemaskini rekod dan memaklumkan (jika perlu)) (rujuk rekod kesihatan))',
        '3.1.2' => 'Pemantauan kesihatan dari agensi luar (menjalankan kerjasama dengan agensi luar bagi tujuan pemeriksaan kesihatan)',
        '3.1.3' => 'Kesejahteraan Kanak-kanak (mempunyai kesedaran tentang perubahan emosi dan mental kanak- kanak)',
    ];

    $options = [
        '3.1.1' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak prihatin tentang kesihatan dan pertumbuhan kanak-kanak secara harian, bulanan dan tahunan. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang prihatin tentang kesihatan dan pertumbuhan kanak-kanak secara harian, bulanan dan tahunan. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang prihatin tentang kesihatan dan pertumbuhan kanak-kanak secara harian, bulanan dan tahunan. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa prihatin tentang kesihatan dan pertumbuhan kanak-kanak secara harian, bulanan dan tahunan. </i>',
        ],
        '3.1.2' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak memberi kerjasama dengan agensi luar untuk memantau kesihatan kanak-kanak (kesihatan gigi dan kesihatan fizikal).</i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang memberi kerjasama dengan agensi luar untuk memantau kesihatan kanak- kanak (kesihatan gigi dan kesihatan fizikal).</i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang memberi kerjasama dengan agensi luar untuk memantau kesihatan kanak-kanak (kesihatan gigi dan kesihatan fizikal).</i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa memberi kerjasama dengan agensi luar untuk memantau kesihatan kanak-kanak (kesihatan gigi dan kesihatan fizikal).</i>',
        ],
        '3.1.3' => [
            0 => '<i style="font-size: 12px"> Pendidik tidak prihatin terhadap perubahan emosi dan mental kanak-kanak serta mengetahui tindakan yang sewajarnya. </i>',
            1 => '<i style="font-size: 12px"> Pendidik jarang-jarang prihatin terhadap perubahan emosi dan mental kanak-kanak serta mengetahui tindakan yang sewajarnya. </i>',
            2 => '<i style="font-size: 12px"> Pendidik kadang-kadang prihatin terhadap perubahan emosi dan mental kanak-kanak serta mengetahui tindakan yang sewajarnya. </i>',
            3 => '<i style="font-size: 12px"> Pendidik sentiasa prihatin terhadap perubahan emosi dan mental kanak-kanak serta mengetahui tindakan yang sewajarnya. </i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    KESIHATAN, KESELAMATAN, KEBERSIHAN DAN PEMAKANAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq3-1">
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
                <td>SQ3.1</td>
                <td colspan="6">Kesihatan</td>
            </tr>
            @foreach ($items_3_1 as $index => $item_3_1)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_3_1 }} </td>

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
