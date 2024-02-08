<style>
    #jumlah-cq-2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #jumlah-cq-2 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #jumlah-cq-2 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
     $jumlahs_sq2 = [
        [
            'section' => 'Perlaksanaan Aktiviti Rutin',
            'subSections' => [
                'Ketibaan dan pulang (mesra dengan kanak-kanak dan ibu bapa, memeriksa fizikal, menguruskan barang peribadi, menyerahkan buku log) (rujuk SOP pulang dan tiba)',
                'Pengurusan diri kanak-kanak (mengutamakan kemampuan dan kebolehan kanak-kanak dan kelancaran proses urus diri)  (rujuk lampiran  Diri: Susu, mandi, mandikan bayi, gosok gigi, makan)',
                'Kelancaran proses transisi (transisi makan, urus diri, aktiviti yang disediakan ketika waktu transisi)',
                'Pemupukan adab dan nilai murni (adab makan, adab berkawan, adab belajar, adab bercakap, dsb.)',
                'Meraikan kepelbagaian (kepelbagaian dan keunikan merangkumi bangsa, agama, status ekonomi, rupa paras, status anak (tidak sah taraf/ anak yatim), masalah pembelajaran, kepelbagaian intelek)',
            ]
        ],
        [
            'section' => 'Perancangan dan Pelaksanaan Aktiviti Pembelajaran',
            'subSections' => [
                'Perancangan Aktiviti (tajuk aktiviti, tarikh, objektif, masa, bahan, tempat/ruang, langkah perlaksanaan-ditulis dengan lengkap)',
                'Pelaksanaan Amalan Bersesuaian Perkembangan (ABP) (aktiviti yang dilaksanakan sesuai dengan perkembangan kanak-kanak)',
                'Merangsang Kemahiran Berfikir Kanak-kanak(melibatkan pelbagai cara berfikir)',
                'Pembelajaran yang fleksibel (flesksibel: ruang yang digunakan, aktiviti yang dijalankan, sikap/ respons yang diberikan',
                'Integrasi pendekatan pembelajaran (menggunakan kaedah, teknik, strategi pengajaran yang pelbagai)',
                'Amalan scaffolding (menjalankan scaffolding (bimbingan) yang bersesuaian dengan kanak- kanak)',
                'Aktiviti berpusatkan kanak-kanak (aktiviti yang dijalankan memberi peluang kepada kanak-kanak untuk meneroka dengan sendiri)',
            ]
        ],
        [
            'section' => 'Sumber Pembelajaran (ABM)',
            'subSections' => [
                'Berasaskan perkembangan holistik (bahan dan peralatan yang digunakan sesuai dengan perkembangan kanak- kanak)',
                'Berasaskan aktiviti harian dan kemahiran (sumber dan peralatan yang digunakan dalam rutin harian sesuai untuk merangsang kemahiran kanak- kanak)',
                'Kreatif, lestari dan inovatif (menghasilkan sumber pembelajaran yang kreatif, lestari, inovatif)',
            ]
        ],
        [
            'section' => 'Persekitaran Fizikal',
            'subSections' => [
                'Ruang (penggunaan ruang memenuhi keperluan perkembangan, mengikut jumlah standard (3.5 meter: 1 kanak- kanak)',
                'Sudut Pembelajaran (sudut mengikut 6 bidang perkembangan dan menarik minat kanak-kanak)',
                'Pencahayaan, pengudaraan dan suhu (suhu, udara, cahaya yang bersesuaian dengan kanak-kanak, bahagian bilik kanak-kanak, bilik belajar dan bilik makan)',
                'Barangan peribadi (tempat penyimpanan barang berlabel, teratur, kemas, bersih dan mudah dicapai)',
                'Hasil kerja kanak-kanak (hasil kerja yang dipamerkan berlabel dengan tarikh, nama, tajuk aktiviti)',
                'Peralatan dan perabot (peralatan dan perabot adalah mencukupi, pelbagai, sesuai perkembangan kanak-kanak, dsb)',
            ]
        ],
        [
            'section' => 'Tingkah Laku Kanak-kanak (Memerlukan Bimbingan)',
            'subSections' => [
                'Berasaskan perkembangan holistik (bahan dan peralatan yang digunakan sesuai dengan perkembangan kanak- kanak)',
                'Berasaskan aktiviti harian dan kemahiran (sumber dan peralatan yang digunakan dalam rutin harian sesuai untuk merangsang kemahiran kanak- kanak)',
                'Kreatif, lestari dan inovatif (menghasilkan sumber pembelajaran yang kreatif, lestari, inovatif)',
            ]
        ],
        [
            'section' => 'Penaksiran Perkembangan',
            'subSections' => [
                'Perancangan penaksiran perkembangan (merekod setiap perkembangan kanak-kanak dengan baik)',
                'Pelaksanaan perkembangan dan pentaksiran (menggunakan pelbagai kaedah dalam merekod perkembangan kanak-kanak: pemerhatian, soal jawab, jalankan aktiviti, mencatat kejadian semasa, mengambil gambar/ video)',
                'Amalan reflektif dan tindakan susulan (mencatatkan kekuatan dan kelemahan serta penambahbaikkan aktiviti)',
                'Perkongsian dengan Keluarga (perbincangan bersama keluarga kanak-kanak mengenai perkembangan)',
                'Pengesanan awal dan rekod (mempunyai perancangan  pentaksiran contohnya developmental alert checklist by NCDC)',
            ]
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    PENGASUHAN DAN PEMBELAJARAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="jumlah-cq-2">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th width="10%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jumlahs_sq2 as $index => $jumlah_sq2)
                <tr>
                    <td colspan="3" class="bg-light-primary text-uppercase">
                        {{ $jumlah_sq2['section'] }}
                    </td>
                </tr>
                @foreach ($jumlah_sq2['subSections'] as $subsection_sq2)
                    <tr>
                        <td>{{ $subsection_sq2 }}</td>
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
