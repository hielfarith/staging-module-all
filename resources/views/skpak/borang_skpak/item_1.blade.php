<style>
    #NilaiItem1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem1 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #NilaiItem1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_1 = [
    [
        'section' => 'PEMATUHAN PERATURAN TASKA',
        'subSections' => [
            'TASKA menyediakan peraturan waktu bertugas.',
            'TASKA menyediakan senarai tugas.',
            'Pendidik/pengasuh memahami senarai tugas yang diberikan.',
            'TASKA mengadakan perbincangan tentang tugas dan tanggungjawab pendidik/pengasuh mengikut jadual.',
            'TASKA menyediakan jadual bertugas.',
            'TASKA mengemaskini jadual bertugas pendidik/pengasuh.',
            'TASKA menyediakan jadual waktu bertugas bagi setiap pendidik/pengasuh.',
            'Pendidik/pengasuh mencatat kehadiran atau menggunakan punch card/touch card.',
            'TASKA menyediakan Kod Etika berpakaian.',
        ]
    ],
    [
        'section' => 'PROFESIONALISME PENDIDIK/PENGASUH',
        'subSections' => [
            'Pendidik mempunyai Sijil KAP (Sijil Kursus Asuhan PERMATA).',
            'Pendidik mempunyai kelayakan iktisas seperti diploma/ijazah.',
            'Pendidik menghadiri latihan Kursus Pertolongan Cemas.',
            'Pendidik menghadiri kursus kesihatan kanak-kanak seperti penyakit berjangkit, alahan dan wabak.',
            'Pendidik menghadiri Kursus Pengendalian Makanan.',
            'Pendidik menghadiri Kursus CPR.',
            'Pendidik menghadiri Kursus CRC (Hak Kanak-kanak).',
            'Pendidik menghadiri Kursus CPP (Pelindungan Kanak-kanak).',
        ]
    ],
];

@endphp

<h5 class="card-title fw-bolder">
    ETIKA DAN PROFESIONALISME
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem1">
        <thead>
            <tr>
                <th>Perincian Item</th>
                <th>Ya</th>
                <th>Tidak</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items_1 as $index => $item_1)
                <tr>
                    <td colspan="3" class="bg-light-primary text-uppercase">
                        {{ $item_1['section'] }}
                    </td>
                </tr>
                @foreach ($item_1['subSections'] as $subsection_item1)
                    <tr>
                        <td>{{ $subsection_item1 }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input radio-input-1" type="radio" name="{{ $index }}_{{ $loop->index }}" id="ya_{{ $index }}_{{ $loop->index }}" value="YA">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input radio-input-1" type="radio" name="{{ $index }}_{{ $loop->index }}" id="tidak_{{ $index }}_{{ $loop->index }}" value="TIDAK">
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-danger">
                <td class="text-end">
                    Jumlah
                </td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
        </tfoot>
    </table>
</div>

<hr>

<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitform1()">Simpan</button>
</div>
