<style>
    #jumlah-cq-4 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #jumlah-cq-4 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #jumlah-cq-4 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
     $jumlahs_sq4 = [
        [
            'section' => 'Penglibatan dengan Keluarga',
            'subSections' => [
                'Proses pengenalan dan orientasi (taklimat dijlankan, urusan dan dokumen pendaftaran diuruskan dengan lengkap) (Rujuk garis panduan bagi dokumendan urusan pendaftaran)',
                'Perancangan penglibatan keluarga (garis panduan dan polisi penglibatan ibu bapa & melibatkan ibu bapa dalam perancangan aktiviti/ program tahunan)',
                'Aktiviti Penglibatan Keluarga (penglibatan aktif dan menubuhkan persatuan/ organisasi bersama ibu bapa)',
                'Khidmat sokongan (mempunyai kesungguhan dalam membantu keluarga dengan mempunyai senarai khidmat sokongan) (hal kanak-kanak: masalah pembelajaran, perkembangan bakat/ kebolehan kanak-kanak, rujuk garis panduan)',
            ]
        ],
        [
            'section' => 'Penglibatan dengan Keluarga',
            'subSections' => [
                'Penglibatan komuniti bersama TASKA (menjalankan aktiviti bersama komuniti)',
                'Hubungan kerjasama TASKA/ pendidik bersama komuniti (pendidik menjalinkan hubungan baik bersama komuniti- menyertai program yang dianjurkan oleh komuniti)',
            ]
        ],
    ];

    $subtab = [
        '0' => 'sq4.1',
        '1' => 'sq4.2'
    ];

    $subtabdata = [
        'sq4.1' => [
            '0' => '4_1_1',
            '1' => '4_1_2',
            '2' => '4_1_3',
            '3' => '4_1_4',
        ],
        'sq4.2' => [
            '0' => '4_2_1',
            '1' => '4_2_2'
        ]
    ];

@endphp

<h5 class="card-title fw-bolder text-uppercase">
    KOLABORASI KELUARGA DAN KOMUNITI
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="jumlah-cq-4">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th width="10%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jumlahs_sq4 as $index => $jumlah_sq4)
                <tr>
                    <td colspan="4" class="bg-light-primary text-uppercase">
                        {{ $jumlah_sq4['section'] }}
                    </td>
                </tr>
                @foreach ($jumlah_sq4['subSections'] as $key => $subsection_sq4)
                    <tr>
                        <td>{{ $subsection_sq4 }}</td>
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

    <div class="col-md-12 mt-2">
        <label class="fw-bolder">Ulasan</label>
        <textarea name="" id="" rows="3" class="form-control"></textarea>
    </div>
</div>

<hr>

<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitform1()">Simpan</button>
</div>
