<style>
    #spks_aspek1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #spks_aspek1 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #spks_aspek1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$aspeks_1_secE = [
    [
    'section' => 'Arahan Keselamatan Murid Di Asrama',
        'subSections' => [
            'Mempunyai data dan rekod cara murid pergi dan balik asrama.',
            'Menyedia dan mempamer tatacara keselamatan pergi dan balik asrama.',
            'Pemeriksaan berkala ke atas penghuni asrama.',
            'Penetapan kawasan larangan di asrama.',
            'Jadual aktiviti harian asrama yang ditetapkan dan dipamerkan.',
            'Kawal selia terhadap semua aktiviti murid di asrama.',
            'Ada peraturan berkaitan dengan larangan-larangan lain di asrama.',
            'Pencahayaan mencukupi dalam kawasan asrama.',
        ]
    ],
];

$number = 1;
@endphp

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek1">


        <thead>
            <tr>
                <th rowspan="2" width="1%">No.</th>
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
            <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Jumlah Skor
                </td>
                <td colspan="4" class="text-center"></td>
            </tr>
            @foreach ($aspeks_1_secE as $index => $aspek_1_secE)
            <tr>
                <td colspan="6" class="bg-light-primary text-uppercase">
                    {{ $aspek_1_secE['section'] }}
                </td>
            </tr>
            @foreach ($aspek_1_secE['subSections'] as $subsection_aspek1)
            <?php

                $name = $index.'_'.$loop->index;
                $withTB = ($aspek_1_secE['section'] == 'Arahan Keselamatan Murid Dari Aspek Pergi Dan Balik Sekolah') || ($aspek_1_secE['section'] == 'Arahan Keselamatan Murid Semasa Pengajaran & Pembelajaran Dan Waktu Rehat') || ($aspek_1_secE['section'] == 'Arahan Keselamatan Murid Semasa Aktiviti Kokurikulum, Sukan Dan Permainan') || ($aspek_1_secE['section'] == 'Arahan Keselamatan Murid Semasa Aktiviti Lawatan Dan Perkhemahan') || ($aspek_1_secE['section'] == 'Arahan Keselamatan Murid Di Asrama');
                $nameIndex = $index.'_'.$loop->index;
                $catatanIndex = 'catatan_'.$index;
            ?>
            <tr>
                <td>{{ $number++ }}</td>
                <td>{{ $subsection_aspek1 }}</td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input required class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="0_{{ $index }}_{{ $loop->index }}" value="0">
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input required class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="1_{{ $index }}_{{ $loop->index }}" value="1">
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input required class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="2_{{ $index }}_{{ $loop->index }}" value="2">
                    </div>
                </td>
                @if($withTB)
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input required class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="TB_{{ $index }}_{{ $loop->index }}" value="TB">
                    </div>
                </td>
                @else
                <td class="bg-light-primary"></td>
                @endif
            </tr>

            <tr>
                <td colspan="6" class="bg-light-success">
                    <input required type="text" name="catatan_{{$index}}" class="form-control" placeholder="Catatan">
                </td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
</div>

<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="formsubmit('aspek1')">
        Simpan
    </button>
</div>
