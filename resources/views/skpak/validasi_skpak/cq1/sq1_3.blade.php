<style>
    #verifikasi-sq1-3 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #verifikasi-sq1-3 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #verifikasi-sq1-3 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_1_3 = [
        '1.3.1' => 'Interaksi dan komunikasi (peluang komunikasi bersama keluarga, sikap berkomunikasi, platform komunikasi, cara berkomunikasi)',
        '1.3.2' => 'Tanggungjawab (Sikap pendidik terhadap keperluan perkembangan dan kesejahteraan kanak-kanak.)',
        '1.3.3' => 'Kebajikan (mengambil kira masa, minat dan kebolehan ibu bapa/ keluarga)',
    ];

    $options = [
        '1.3.1' => [
            0 => 'TASKA tidak menyediakan peluang komunikasi yang berkesan untuk keluarga, tidak menjalankan interaksi dua hala serta tidak mempunyai sistem penyampaian maklumat yang sesuai.',
            1 => 'TASKA menyediakan peluang komunikasi untuk keluarga tetapi tidak menjalankan interaksi dua hala dan tidak mempunyai sistem penyampaian maklumat yang sesuai.',
            2 => 'TASKA menyediakan peluang komunikasi untuk keluarga dan menjalankan interaksi dua hala tetapi tidak mempunyai sistem penyampaian maklumat yang sesuai.',
            3 => 'TASKA menyediakan peluang komunikasi untuk keluarga, menjalankan interaksi dua hala serta mempunyai sistem penyampaian maklumat yang sesuai.',
        ],
        '1.3.2' => [
            0 => 'TASKA tidak menunjukkan sikap positif dan tidak menjaga hubungan baik dengan keluarga bagi kesejahteraan kanak-kanak.',
            1 => 'TASKA jarang-jarang menunjukkan sikap positif dan jarang-jarang menjaga hubungan baik dengan keluarga bagi kesejahteraan kanak-kanak.',
            2 => 'TASKA kadang-kadang menunjukkan sikap positif dan kadang-kadang menjaga hubungan baik dengan keluarga bagi kesejahteraan kanak-kanak.',
            3 => 'TASKA sentiasa menunjukkan sikap positif dan sentiasa menjaga hubungan baik dengan keluarga bagi kesejahteraan kanak-kanak.',
        ],
        '1.3.3' => [
            0 => 'TASKA tidak  mengambil kira masa, minat dan kemampuan keluarga ketika menjalankan aktiviti/program TASKA.',
            1 => 'TASKA jarang-jarang  mengambil kira masa, minat dan kemampuan keluarga ketika menjalankan aktiviti/program TASKA.',
            2 => 'TASKA kadang-kadang mengambil kira masa, minat dan kemampuan keluarga ketika menjalankan aktiviti/program TASKA.',
            3 => 'TASKA sentiasa  mengambil kira masa, minat dan kemampuan keluarga ketika menjalankan aktiviti/program TASKA.',
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    Hubungan dan Interaksi
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="verifikasi-sq1-3">
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
                <td>SQ1.3</td>
                <td colspan="6">Hubungan dengan Keluarga </td>
            </tr>
            @foreach ($items_1_3 as $index => $item_1_3)
                <tr>
                    <td> {{ $index }} </td>
                    <td> {{ $item_1_3 }} </td>

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
