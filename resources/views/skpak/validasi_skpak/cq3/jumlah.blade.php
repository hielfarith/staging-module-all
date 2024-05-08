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
    $subtab = [
        '0' => 'sq3.1',
        '1' => 'sq3.2',
        '2' => 'sq3.3',
        '3' => 'sq3.4'
    ];

    $subtabdata = [
        'sq3.1' => [
            '0' => '3_1_1',
            '1' => '3_1_2',
            '2' => '3_1_3'
        ],
        'sq3.2' => [
            '0' => '3_2_1',
            '1' => '3_2_2',
            '2' => '3_2_3',
            '3' => '3_2_4',
            '4' => '3_2_5',
            '5' => '3_2_6'
        ],
        'sq3.3' => [
            '0' => '3_3_1',
            '1' => '3_3_2',
            '2' => '3_3_3',
            '3' => '3_3_4',
            '4' => '3_3_5'
        ],
        'sq3.4' => [
            '0' => '3_4_1',
            '1' => '3_4_2',
            '2' => '3_4_3',
            '3' => '3_4_4'
        ]
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    KESIHATAN, KESELAMATAN, KEBERSIHAN DAN PEMAKANAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="jumlah-cq-3">
        <thead style="color:black; background-color: #d8bfb0;">
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
                @foreach ($jumlah_sq3['subSections'] as $key => $subsection_sq3)
                    <tr>
                        <td>{{ $subsection_sq3 }}</td>
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
    <input type="hidden" name="skpak_standard_penilaian_id" id="skpak_standard_penilaian_id3" value="{{$id}}">
    <div class="col-md-12 mt-2">
        <label class="fw-bolder">Ulasan</label>
        <textarea name="ulasan" id="ulasanc3" rows="3" class="form-control" {{$disabled}}>{{$ulasan}}</textarea>
    </div>
</div>
<hr>
@if($disabled != 'disabled')
<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitcq3jumlah()">Simpan</button>
</div>
@endif

</form>

<script>
    function submitcq3jumlah() {
    var ulasan = $('#ulasanc3').val();
    var skpak_standard_penilaian_id = $('#skpak_standard_penilaian_id3').val();
      if (ulasan == '') {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq3_jumlah']) }}"
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
