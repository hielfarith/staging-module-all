<style>
    #NilaiItem4 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem4 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #NilaiItem4 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$items_4 = [
    [
    'section' => 'Perancangan, Perlaksanaan Pembelajaran dan Pengajaran PERMATA',
        'subSections' => [
            'Pendidik menyediakan Rancangan Pelaksanaan Aktiviti (RPA).',
            'RPA disediakan mengikut bidang pembelajaran.',
            'Jadual waktu mengandungi rutin harian.',
            'Jadual waktu mengandungi aktiviti PERMATA.',
            'Jadual Mingguan dikemaskini dengan lengkap.',
            'Jadual Mingguan dipamerkan untuk rujukan.',
            'Rancangan Pengajaran dikemaskini.',
            'Aktiviti dijalankan berdasarkan Amalan Bersesuaian Perkembangan (ABP).',
            'Aktiviti dijalankan mengikut umur.',
            'Aktiviti dijalankan mengikut kebolehan.',
            'Aktiviti dijalankan mengikut keupayaan.',
            'Aktiviti dijalankan mengikut kesediaan.',
            'Pendidik/pengasuh menggabungjalin dua atau lebih bidang pembelajaran.',
            'Pendidik/pengasuh menggunakan pendekatan Belajar Melalui Bermain.',
            'Pendidik/pengasuh menggunakan pendekatan pembelajaran melalui permainan (games).',
            'Pendidik/pengasuh menggunakan pendekatan pembelajaran dengan barang permainan (toys).',
            'Pendidik/pengasuh memberi peluang kanak-kanak meneroka persekitaran.',
            'Pendidik/pengasuh memberi peluang kanak-kanak bereksperimen dengan pelbagai bahan.',
            'Pendidik/pengasuh memberi peluang kanak-kanak mengalami pelbagai situasi.',
            'Pendidik/pengasuh menggunakan pendekatan bertema dalam aktiviti pembelajaran kanak-kanak 3-4 tahun.',
            'Pendidik/pengasuh menggunakan pelbagai strategi dalam pembelajaran dan pengajaran.',
            'Pendidik/pengasuh menggunakan pelbagai pendekatan.',
            'Pendidik/pengasuh menggunakan pelbagai teknik.',
            'Pendidik/pengasuh menggunakan pelbagai kaedah.',
            'Pendidik/pengasuh melaksanakan aktiviti main bebas.',
            'Pendidik/pengasuh melaksanakan aktiviti main pasir.',
            'Pendidik/pengasuh melaksanakan aktiviti main air.',
            'Pendidik/pengasuh melaksanakan aktiviti nature walk.',
            'Pendidik/pengasuh bersoal jawab dengan kanak-kanak.',
            'Pendidik/pengasuh mengintegrasi bidang-bidang pembelajaran dalam aktiviti.',
            'Kanak-kanak melibatkan diri secara aktif dalam aktiviti.',
            'Pendidik/ pengasuh menggunakan perisian komputer dalam aktiviti pembelajaran dan pengajaran.',
            'Pendidik/ pengasuh menggunakan teknologi (ICT) dalam aktiviti pembelajaran dan pengajaran.',
            'Kanak-kanak kenal peralatan ICT.',
        ],
    ],
    [
    'section' => 'Hubungan, Interaksi dan Bimbingan Pembelajaran',
        'subSections' => [
            'Pendidik/pengasuh bercakap dengan nada suara yang rendah dan lembut.',
            'Pendidik/pengasuh menggunakan bahasa mudah dan jelas.',
            'Pendidik/pengasuh memuji kanak-kanak.',
            'Pendidik/pengasuh melayan kanak-kanak dengan adil.',
        ],
    ],
    [
    'section' => 'Pemerhatian dan Penaksiran Perkembangan Bayi dan Kanak-Kanak',
        'subSections' => [
            'Pendidik/pengasuh menjalankan pemerhatian dan penaksiran.',
            'Maklum balas refleksi dicatat oleh pendidik/ pengasuh.',
            'Pendidik/pengasuh menggunakan buku Log Anak PERMATA.',
            'Pendidik/pengasuh menyediakan portfolio.',
            'Pendidik/pengasuh membuat laporan perkembangan.',
            'Pendidik/pengasuh membuat analisa interpretasi penaksiran.',
            'Bayi dibawa bersiar-siar di luar TASKA.',
            'Bayi dibawa meneroka objek di luar TASKA.',
            'Kanak-kanak dibawa bersiar-siar di luar TASKA.',
            'Kanak-kanak bebas bermain menggunakan barang permainan yang disukainya.',
            'Kanak-kanak bermain pasir.',
            'Kanak-kanak bermain air.',
            'Kanak-kanak dibawa meneroka kawasan persekitaran di luar TASKA.',
        ],
    ],
];
@endphp

<h5 class="card-title fw-bolder">
    PENGALAMAN PEMBELAJARAN, INTERAKSI DAN PENAKSIRAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem4">
        <thead>
            <tr>
                <th>Perincian Item</th>
                <th>Ya</th>
                <th>Tidak</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items_4 as $index => $item_4)
                <tr>
                    <td colspan="3" class="bg-light-primary fw-bolder text-uppercase">
                        {{ $item_4['section'] }}
                    </td>
                </tr>
                @foreach ($item_4['subSections'] as $subsection_item4)
                    <tr>
                        <td>{{ $subsection_item4 }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input" type="radio" name="{{ $index }}_{{ $loop->index }}" id="ya_{{ $index }}_{{ $loop->index }}" value="YA">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input" type="radio" name="{{ $index }}_{{ $loop->index }}" id="tidak_{{ $index }}_{{ $loop->index }}" value="TIDAK">
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>

<hr>

<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right formdd" onclick="submitform1()">Simpan</button>
</div>
