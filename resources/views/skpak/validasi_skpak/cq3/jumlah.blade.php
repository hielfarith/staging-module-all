<style>
    #jumlah-cq-3 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #jumlah-cq-3 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #jumlah-cq-3 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
     $jumlahs_sq3 = [
        [
            'section' => 'Kesihatan',
            'subSections' => [
                'Pemantauan kesihatan di TASKA (pendidik prihatin mengenai kesihatan & tumbesaran kanak-kanak dengan memeriksa, mengemaskini rekod dan memaklumkan (jika perlu)) (rujuk rekod kesihatan))',
                'Pemantauan kesihatan dari agensi luar (menjalankan kerjasama dengan agensi luar bagi tujuan pemeriksaan kesihatan)',
                'Kesejahteraan Kanak-kanak (mempunyai kesedaran tentang perubahan emosi dan mental kanak- kanak)',
            ]
        ],
        [
            'section' => 'Keselamatan',
            'subSections' => [
                'Pematuhan peraturan keselamatan agensi yang berkaitan (mematuhi kesemua peraturan keselamatan daripada agensi yang berkaitan- PBT, Bomba, Kesihatan)',
                'Polisi dan pelan keselamatan (mempamerkan polisi/ garis panduan/ pelan keselamatan, difahami dan dipatuhi)',
                'Latihan keselamatan (menjalankan latihan keselamatan bersama agensi luar dan pihak TASKA)',
                'Persekitaran dalaman(keselamatan  persekitaran dalaman TASKA selamat) (rujuk garis panduan/senarai semak bagi melihat contoh keselamatan dalaman)',
                'Persekitaran luaran (keselamatan persekitaran luaran TASKA selamat) (rujuk garis panduan/senarai semak bagi melihat contoh keselamatan luaran)',
                'Rekod kemalangan dan kecederaan (mempunyai rekod kemalangan dan kecederaan kanak-kanak)',
            ]
        ],
        [
            'section' => 'Kebersihan',
            'subSections' => [
                'Amalan kebersihan bayi dan kanak-kanak (memastikan amalan kebersihan kanak-kanak dan mematuhi SOP) (amalan basuh tangan, penggunaan tandas, tatacara mandi, dsb.)',
                'Amalan kebersihan pendidik (menunjukkan amalan kendiri dan menitikberatkan SOP kebersihan TASKA)',
                'Kebersihan ruang dalam (kebersihan TASKA dijalankan secara rutin dan berkala- rujuk jadual pembersihan TASKA)',
                'Kebersihan ruang luar (kebersihan TASKA dijalankan secara rutin dan berkala- rujuk jadual pembersihan TASKA)',
                'Peralatan/ bahan kebersihan (peralatan/ bahan kebersihan dilabel dan disimpan)',
            ]
        ],
        [
            'section' => 'Pemakanan',
            'subSections' => [
                'Kualiti bahan makanan (memastikan tahap kualiti bahan makanan mengikut garis panduan) (rujuk garis panduan kualiti bahan makanan)',
                'Perancangan menu (merancang menu yang seimbang dan sesuai dengan tumbesaran kanak-kanak dan memaparkan menu)',
                'Prosedur pengendalian makanan (sijil typhoid, mematuhi prosedur pengendalian dan penyimpanan makanan)',
                'Pengendalian Kanak-kanak Alergik (Peka dan memaparkan senarai kanak-kanak alegik)',
            ]
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    KESIHATAN, KESELAMATAN, KEBERSIHAN DAN PEMAKANAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="jumlah-cq-1">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th width="10%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jumlahs_sq3 as $index => $jumlah_sq3)
                <tr>
                    <td colspan="3" class="bg-light-primary text-uppercase">
                        {{ $jumlah_sq3['section'] }}
                    </td>
                </tr>
                @foreach ($jumlah_sq3['subSections'] as $subsection_sq3)
                    <tr>
                        <td>{{ $subsection_sq3 }}</td>
                        <td>Auto-calculated</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-primary">
                <td class="text-end">Jumlah</td>
                <td>Auto-calculated</td>
            </tr>
        </tfoot>
    </table>

    <div class="col-md-12 mt-2">
        <label class="fw-bolder">Ulasan</label>
        <textarea name="" id="" rows="3" class="form-control"></textarea>
    </div>
</div>

<hr>

<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitform1()">Simpan</button>
</div>
