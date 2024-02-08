<style>
    #verifikasi-sq3-2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq3-2 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq3-2 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_3_2 = [
        '3.2.1' => 'Pematuhan peraturan keselamatan agensi yang berkaitan (mematuhi kesemua peraturan keselamatan daripada agensi yang berkaitan- PBT, Bomba, Kesihatan)',
        '3.2.2' => 'Polisi dan pelan keselamatan (mempamerkan polisi/ garis panduan/ pelan keselamatan, difahami dan dipatuhi)',
        '3.2.3' => 'Latihan keselamatan (menjalankan latihan keselamatan bersama agensi luar dan pihak TASKA)',
        '3.2.4' => 'Persekitaran dalaman(keselamatan  persekitaran dalaman TASKA selamat) (rujuk garis panduan/senarai semak bagi melihat contoh keselamatan dalaman)',
        '3.2.5' => 'Persekitaran luaran (keselamatan persekitaran luaran TASKA selamat) (rujuk garis panduan/senarai semak bagi melihat contoh keselamatan luaran)',
        '3.2.6' => 'Rekod kemalangan dan kecederaan (mempunyai rekod kemalangan dan kecederaan kanak-kanak)',
    ];

    $options = [
        '3.2.1' => [
            0 => '<i style="font-size: 12px"> TASKA tidak memahami dan tidak mematuhi kesemua peraturan  keselamatan yang ditetapkan oleh agensi yang berkaitan. </i>',
            1 => '<i style="font-size: 12px"> TASKA memahami tetapi tidak mematuhi kesemua peraturan keselamatan yang ditetapkan oleh agensi yang berkaitan. </i>',
            2 => '<i style="font-size: 12px"> TASKA tidak memahami tetapi mematuhi kesemua peraturan keselamatan yang ditetapkan oleh agensi yang berkaitan. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa memahami dan  sentiasa mematuhi kesemua peraturan keselamatan yang ditetapkan oleh agensi yang berkaitan. </i>',
        ],
        '3.2.2' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mempamerkan polisi/ garis panduan dan pelan keselamatan serta tidak difahami dan tidak dipatuhi sepenuhnya.</i>',
            1 => '<i style="font-size: 12px"> TASKA mempamerkan polisi/ garis panduan dan pelan keselamatan namun tidak difahami dan tidak dipatuhi sepenuhnya.</i>',
            2 => '<i style="font-size: 12px"> TASKA mempamerkan polisi/ garis panduan dan pelan keselamatan namun tidak difahami dan tidak dipatuhi sepenuhnya.</i>',
            3 => '<i style="font-size: 12px"> TASKA mempamerkan polisi/ garis panduan dan pelan keselamatan serta difahami dan dipatuhi sepenuhnya.</i>',
        ],
        '3.2.3' => [
            0 => '<i style="font-size: 12px"> TASKA tidak melibatkan agensi luar dan tidak menjalankan latihan dalaman TASKA (in house training) untuk latihan keselamatan. </i>',
            1 => '<i style="font-size: 12px"> TASKA tidak melibatkan agensi luar namun menjalankan latihan dalaman TASKA (in house training) untuk latihan keselamatan. </i>',
            2 => '<i style="font-size: 12px"> TASKA melibatkan agensi luar tetapi tidak menjalankan latihan dalaman TASKA (in house training) untuk latihan keselamatan. </i>',
            3 => '<i style="font-size: 12px"> TASKA melibatkan agensi luar dan menjalankan latihan dalaman TASKA (in house training) untuk latihan keselamatan. </i>',
        ],
        '3.2.4' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mematuhi garis panduan keselamatan dan persekitaran dalaman berada di dalam keadaan tidak selamat. </i>',
            1 => '<i style="font-size: 12px"> TASKA hanya mematuhi sebahagian kecil garis panduan keselamatan dan persekitaran dalaman jarang-jarang berada di dalam keadaan selamat. </i>',
            2 => '<i style="font-size: 12px"> TASKA mematuhi sebahagian besar garis panduan keselamatan dan sebahagian besar persekitaran dalaman berada di dalam keadaan selamat. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa mematuhi garis panduan keselamatan dan seluruh persekitaran dalaman berada di dalam keadaan selamat. </i>',
        ],
        '3.2.5' => [
            0 => '<i style="font-size: 12px"> TASKA tidak memastikan persekitaran luaran berada di dalam keadaan selamat. </i>',
            1 => '<i style="font-size: 12px"> TASKA jarang-jarang  memastikan persekitaran luaran berada di dalam keadaan selamat. </i>',
            2 => '<i style="font-size: 12px"> TASKA kadang-kadang memastikan persekitaran luaran berada di dalam keadaan selamat. </i>',
            3 => '<i style="font-size: 12px"> TASKA sentiasa memastikan persekitaran luaran berada di dalam keadaan selamat. </i>',
        ],
        '3.2.6' => [
            0 => '<i style="font-size: 12px"> TASKA tidak mempunyai rekod kecederaan dan kemalangan kanak-kanak. </i>',
            1 => '<i style="font-size: 12px"> TASKA mempunyai rekod kecederaan dan kemalangan kanak-kanak tetapi tidak lengkap dan tidak terkini. </i>',
            2 => '<i style="font-size: 12px"> TASKA mempunyai rekod kecederaan dan kemalangan kanak-kanak  yang lengkap tetapi tidak terkini. </i>',
            3 => '<i style="font-size: 12px"> TASKA mempunyai rekod kecederaan dan kemalangan kanak-kanak  yang lengkap dan terkini. </i>',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    KESIHATAN, KESELAMATAN, KEBERSIHAN DAN PEMAKANAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq3-2">
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
                <td colspan="6">Keselamatan</td>
            </tr>
            @foreach ($items_3_2 as $index => $item_3_2)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_3_2 }} </td>

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
