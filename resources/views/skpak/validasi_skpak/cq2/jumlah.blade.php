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

     $subtab = [
        '0' => 'sq2.1',
        '1' => 'sq2.2',
        '2' => 'sq2.3',
        '3' => 'sq2.4',
        '4' => 'sq2.5',
        '5' => 'sq2.6',
    ];

    $subtabdata = [
        'sq2.1' => [
            '0' => '2_1_1',
            '1' => '2_1_2',
            '2' => '2_1_3',
            '3' => '2_1_4',
            '4' => '2_1_5',
        ],
        'sq2.2' => [
            '0' => '2_2_1',
            '1' => '2_2_2',
            '2' => '2_2_3',
            '3' => '2_2_4',
            '4' => '2_2_5',
            '5' => '2_2_6',
            '6' => '2_2_7',
        ],
        'sq2.3' => [
            '0' => '2_3_1',
            '1' => '2_3_2',
            '2' => '2_3_3'
        ],
        'sq2.4' => [
            '0' => '2_4_1',
            '1' => '2_4_2',
            '2' => '2_4_3',
            '3' => '2_4_4',
            '4' => '2_4_5',
            '5' => '2_4_6',
        ],
        'sq2.5' => [
            '0' => '2_5_1',
            '1' => '2_5_2',
            '2' => '2_5_3'
        ],
        'sq2.6' => [
            '0' => '2_6_1',
            '1' => '2_6_2',
            '2' => '2_6_3',
            '3' => '2_6_4',
            '4' => '2_6_5',
        ]
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    PENGASUHAN DAN PEMBELAJARAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="jumlah-cq-2">
        <thead style="color:black; background-color: #d8bfb0;">
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
                @foreach ($jumlah_sq2['subSections'] as $key => $subsection_sq2)
                    <tr>
                        <td>{{ $subsection_sq2 }}</td>
                        <?php
                        if (isset($tabData) && isset($tabData[$subtab[$index]])) {
                            $value = $tabData[$subtab[$index]][$subtabdata[$subtab[$index]][$key]];
                        }  else {
                            $value = '-';
                        }

                        ?>
                        <td> {{$value}} </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-primary">
                <td class="text-end">Jumlah</td>
                <td>{{$totalValue}}</td>
            </tr>
        </tfoot>
    </table>
<form>
    <input type="hidden" name="skpak_standard_penilaian_id" id="skpak_standard_penilaian_id2" value="{{$id}}">
    <div class="col-md-12 mt-2">
        <label class="fw-bolder">Ulasan</label>
        <textarea name="ulasan" id="ulasanc2" rows="3" class="form-control">{{$ulasan}}</textarea>
    </div>
</div>

<hr>

<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitcq2jumlah()">Simpan</button>
</div>

</form>

<script>
    function submitcq2jumlah() {
    var ulasan = $('#ulasanc2').val();
    var skpak_standard_penilaian_id = $('#skpak_standard_penilaian_id2').val();
      if (ulasan == '') {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq2_jumlah']) }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                ulasan : ulasan,
                skpak_standard_penilaian_id: skpak_standard_penilaian_id
            },
            success: function(response) {
               if (response.success) {
                    Swal.fire('Success', 'Berjaya', 'success');
               }
            }
        });

    };

</script>
