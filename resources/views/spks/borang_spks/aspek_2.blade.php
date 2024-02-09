<style>
    #spks_aspek2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #spks_aspek2 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #spks_aspek2 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$aspeks_2 = [
    [
        'section' => 'PENGURUSAN KESELAMATAN INFRASTRUKTUR SEKOLAH',
        'subSections' => [
            'Rekod pemantauan, penyelenggaraan dan pelaporan fizikal bangunan.',
            'Rekod pemantauan, penyelenggaraan dan pelaporan pendawaian dan peralatan elektrik.',
            'Rekod pemantauan, penyelenggaraan dan pelaporan retikulasi air.',
            'Rekod pemantauan, penyelenggaraan dan pelaporan paip-paip gas.',
            'Rekod pemantauan, penyelenggaraan dan pelaporan sistem perparitan.',
            'Rekod pemantauan, penyelenggaraan dan pelaporan sistem pembentungan.',
            'Rekod pemantauan, penyelenggaraan dan pelaporan lanskap sekolah.',
            'Pemantauan, tatacara penggunaan,penyelenggaraan peralatan di bilik-bilik khas.',
            'Pemantauan, tatacara penggunaan,penyelenggaraan padang dan gelanggang permainan.',
            'Pencahayaan mencukupi dalam kawasan sekolah.',
            'Arahan keselamatan dipamerkan.',
            'Penetapan kawasan larangan di sekolah.',
            'Rekod pemantauan, penggunaan, penyelenggaraan dan penyimpanan peralatan, dokumen dan harta sekolah.',
        ]
    ],
];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    Pengurusan Keselamatan Infrastruktur Sekolah
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek2">
        <thead>
            <tr>
                <th rowspan="2">Item</th>
                <th colspan="5">Skor Sekolah</th>
            </tr>

            <tr>
                <th>0</th>
                <th>1</th>
                <th>2</th>
                <th>TB</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aspeks_2 as $index => $aspek_2)
                <tr>
                    <td colspan="5" class="bg-light-primary text-uppercase">
                        {{ $aspek_2['section'] }}
                    </td>
                </tr>
                @foreach ($aspek_2['subSections'] as $subsection_aspek2)
                    <?php
                        $name = $index.'_'.$loop->index;
                    ?>
                    <tr>
                        <td>{{ $subsection_aspek2 }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="0_{{ $index }}_{{ $loop->index }}" value="0">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="1_{{ $index }}_{{ $loop->index }}" value="1">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="2_{{ $index }}_{{ $loop->index }}" value="2">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="TB_{{ $index }}_{{ $loop->index }}" value="TB">
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-danger">
                <td class="text-end">
                    Skor
                </td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
            <tr class="bg-light-danger">
                <td class="text-end">
                    Jumlah Skor
                </td>
               <td colspan="4" class="text-center"></td>
            </tr>
        </tfoot>
    </table>
</div>

<hr>

<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="">
        Simpan
    </button>
</div>
