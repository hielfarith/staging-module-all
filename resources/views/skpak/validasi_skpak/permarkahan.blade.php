<style>
    #permarkahan thead th {
        vertical-align: middle;
        text-align: center;
    }

    #permarkahan tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #permarkahan table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$showHantar = true;
$itemArray = [
    'CQ1 HUBUNGAN DAN INTERAKSI' => 'itemcq1',
    'CQ2 PENGASUHAN DAN PEMBELAJARAN' => 'itemcq2',
    'CQ3 KESELAMATAN, KESIHATAN, KEBERSIHAN & PEMAKANAN' => 'itemcq3',
    'CQ4 KOLABORASI KELUARGA & KOMUNITI' => 'itemcq4',
    'CQ5 PENTADBIRAN & PENGURUSAN' => 'itemcq5'
];

$penyelarasan_penilaians = [
    'sections' => [
        'CQ1 HUBUNGAN DAN INTERAKSI' => [
            '1.1 HUBUNGAN DENGAN KANAK-KANAK' => [
            '1.1.1 Interaksi dan komunikasi',
            '1.1.2 Sikap dan sokongan dalam pembinaan hubungan',
            ],
            '1.2 HUBUNGAN SESAMA PENDIDIK DAN PENGURUSAN TASKA' => [
                '1.2.1 Tanggungjawab terhadap organisasi',
                '1.2.2 Interaksi dan komunikasi',
                '1.2.3 Sikap dan sokongan terhadap organisasi',
            ],  
            '1.3 HUBUNGAN DENGAN KELUARGA' => [
                '1.3.1 Tanggungjawab terhadap organisasi',
                '1.3.2 Interaksi dan komunikasi',
                '1.3.3 Sikap dan sokongan terhadap organisasi',
                '1.3.4 Interaksi dan komunikasi',
                '1.3.5 Tanggungjawab',
                '1.3.6 Kebajikan',
            ],
        ],
        'CQ2 PENGASUHAN DAN PEMBELAJARAN' => [
            '2.1 PERLAKSANAAN AKTIVITI RUTIN' => [
                '2.1.1 Ketibaan dan pulang',
                '2.1.2 Pengurusan diri kanak-kanak',
                '2.1.3 Kelancaran proses transisi',
                '2.1.4 Pemupukan adab dan nilai murni',
                '2.1.5 Meraikan kepelbagaian',
            ],
            '2.2 PERANCANGAN DAN PERLAKSANAAN AKTIVITI PEMBELAJARAN' => [
                '2.2.1 Perancangan Aktiviti',
                '2.2.2 Pelaksanaan Amalan Bersesuaian Perkembangan (ABP)',
                '2.2.3 Merangsang Kemahiran Berfikir Kanak-kanak',
                '2.2.4 Pembelajaran yang fleksibel',
                '2.2.5 Integrasi pendekatan pembelajaran',
                '2.2.6 Amalan scaffolding',
                '2.2.7 Aktiviti berpusatkan kanak-kanak',
            ],
            '2.3 SUMBER PEMBELAJARAN (ABM)' => [
                '2.3.1 Berasaskan perkembangan holistik',
                '2.3.2 Berasaskan aktiviti harian dan kemahiran',
                '2.3.3 Kreatif, lestari dan inovatif',
            ],
            '2.4 PERSEKITARAN FIZIKAL' => [
                '2.4.1 Ruang',
                '2.4.2 Sudut Pembelajaran',
                '2.4.3 Pencahayaan, pengudaraan dan suhu',
                '2.4.4 Barangan peribadi',
                '2.4.5 Hasil kerja kanak-kanak',
                '2.4.6 Peralatan dan perabot',
            ],
            '2.5 TINGKAH LAKU KANAK-KANAK (MEMERLUKAN BIMBINGAN)' => [
                '2.5.1 Tingkah Laku',
                '2.5.2 Bimbingan Tingkah Laku',
                '2.5.3 Makluman keluarga',
            ],
            '2.6 PENAKSIRAN PERKEMBANGAN' => [
                '2.6.1 Perancangan penaksiran perkembangan',
                '2.6.2 Pelaksanaan perkembangan dan pentaksiran',
                '2.6.3 Amalan reflektif dan tindakan susulan',
                '2.6.4 Perkongsian dengan Keluarga',
                '2.6.5 Pengesanan awal dan rekod',
            ],
        ],
        'CQ3 KESELAMATAN, KESIHATAN, KEBERSIHAN & PEMAKANAN' => [
            '3.1 KESELAMATAN' => [
                '3.1.1 Pemantauan kesihatan di TASKA',
                '3.1.2 Pemantauan kesihatan dari agensi luar',
                '3.1.3 Kesejahteraan Kanak-kanak',
            ],
            '3.2 KESIHATAN' => [
                '3.2.1 Pematuhan peraturan keselamatan agensi yang berkaitan',
                '3.2.2 Polisi dan pelan keselamatan',
                '3.2.3 Latihan keselamatan',
                '3.2.4 Persekitaran dalaman (dilampirkan bersama senarai semak keselamatan)',
                '3.2.5 Persekitaran luaran (dilampirkan bersama senarai semak keselamatan)',
                '3.2.6 Rekod kemalangan dan kecederaan',
            ],
            '3.3 KEBERSIHAN' => [
                '3.3.1 Amalan kebersihan bayi dan kanak-kanak',
                '3.3.2 Amalan kebersihan pendidik',
                '3.3.3 Kebersihan ruang dalam',
                '3.3.4 Kebersihan ruang luar',
                '3.3.5 Peralatan/ bahan kebersihan',
            ],
            '3.4 PEMAKANAN' => [
                '3.4.1 Kualiti bahan makanan',
                '3.4.2 Perancangan menu',
                '3.4.3 Prosedur pengendalian makanan',
                '3.4.4 Pengendalian Kanak-kanak Alergik',
            ],
        ],
        'CQ4 KOLABORASI KELUARGA & KOMUNITI' => [
            '4.1 PENGELIBATAN DENGAN KELUARGA' => [
                '4.1.1 Proses pengenalan dan orientasi',
                '4.1.2 Perancangan penglibatan keluarga',
                '4.1.3 Aktiviti penglibatan keluarga',
                '4.1.4 Khidmat sokongan',
            ],
            '4.2 JALINAN KERJASAMA DENGAN KOMUNITI' => [
                '4.2.1 Penglibatan komuniti dalam TASKA',
                '4.2.2 Hubungan kerjasama TASKA/ pendidik bersama komuniti',
            ],
        ],
        'CQ5 PENTADBIRAN & PENGURUSAN' => [
            '5.1 PENTADBIRAN' => [
                '5.1.1 Falsafah, visi dan misi',
                '5.1.2 Polisi dan garis panduan',
                '5.1.3 Pengurusan rekod pentadbiran TASKA',
                '5.1.4 Pengurusan rekod staf',
                '5.1.5 Kelayakan',
                '5.1.6 Kebajikan staf',
                '5.1.7 Nisbah pendidik dan kanak-kanak',
                '5.1.8 Pengurusan rekod kanak-kanak',
            ],
            '5.2 PROFESIONALISME & ETIKA' => [
                '5.2.1 Penglibatan komuniti dalam TASKA',
                '5.2.2 Hubungan kerjasama TASKA/ pendidik bersama komuniti',
            ],
        ],
    ],
];
@endphp

<table class="table header_uppercase table-bordered table-hovered" id="permarkahan">
    <thead>
        <tr>
            <th colspan="2">Kualiti Standard</th>
            <th rowspan="2">Kriteria</th>
            <th style="width: 5%" rowspan="2">Skor</th>
            <th style="width: 20%" rowspan="2">Peratus</th>
            <th style="width: 20%" rowspan="2">Markah Penuh</th>
        </tr>

        <tr>
            <th>Kod Item</th>
            <th>Item</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($penyelarasan_penilaians['sections'] as $section => $subsections)
            <tr>
                <td colspan="6" class="bg-light-primary">{{ $section }}</td>
            </tr>
            @php
                $totalRow = 0;
            @endphp
            @foreach ($subsections as $subsection => $subsubsections)
                @foreach ($subsubsections as $subsubsection)
                    @php
                        $totalRow++;
                    @endphp
                @endforeach
            @endforeach
            @foreach ($subsections as $subsection => $subsubsections)
                @php
                    $row = 0;
                @endphp
                @foreach ($subsubsections as $subsubsection)
                    @php
                        $numeric = preg_replace('/[^0-9.]/', '', $subsection);
                        $text = trim(preg_replace('/[0-9.]/', '', $subsection), '.');

                        $subsubsectionCount = count($subsubsections);
                    @endphp
                    <tr>
                        @if (!$row)
                        <td rowspan="{{ $subsubsectionCount }}">SQ{{ $numeric }}</td>
                        @endif
                        @if (!$row)
                        <td rowspan="{{ $subsubsectionCount }}">{{ $text }}</td>
                        @endif
                        <td>{{ $subsubsection }}</td>
                        @if (!$row)
                            <?php
                                 
                                $keystring = 'sq'.$numeric;
                                if (is_array($array[$itemArray[$section]]) && isset($array[$itemArray[$section]][$keystring])){
                                    $subdata = $array[$itemArray[$section]][$keystring];
                                } else {
                                    $subdata = 0;
                                    $showHantar = false;
                                }
                           ?>
                            <td rowspan="{{ $subsubsectionCount }}">{{$subdata}}</td>
                        @endif
                        @if (!$row && $loop->parent->first)
                            <td rowspan="{{ $totalRow }}">Peratus</td>
                        @endif
                        @if (!$row)
                            <td rowspan="{{ $subsubsectionCount }}">Markah Penuh</td>
                        @endif
                    </tr>
                    @php
                        $row++;
                    @endphp
                @endforeach
            @endforeach

            <tr class="bg-light-success">
                <?php
                    $skore = $totalSkor[$itemArray[$section]];
                ?>
                <td colspan="3" class="text-end">{{$skore}}</td>
                <td colspan="3" class="text-start"></td>
            </tr>
        @endforeach
    </tbody>


    <tfoot>
        <tr class="bg-light-danger">
            <td colspan="3" class="text-end">Jumlah Skor</td>
            <td colspan="3" class="text-start">{{$finalskore}}</td>
        </tr>

        <tr class="bg-light-danger">
            <td colspan="3" class="text-end">Peratus Keseluruhan</td>
            <td colspan="3" class="text-start">{{$percentage}} %</td>
        </tr>
    </tfoot>
</table>
<input type="hidden" name="skpak_standard_penilaian_id" id="skpak_standard_penilaian_id_permarkahan" value="{{$skpak_standard_penilaian_id}}">

<hr>
@if($showHantar)
<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn {{$color}} float-right" onclick="submitcpermarkahan()">Hantar</button>
</div>
@endif
</form>

<script>
    function submitcpermarkahan() {
    var skpak_standard_penilaian_id = $('#skpak_standard_penilaian_id_permarkahan').val();
      if (ulasan == '') {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq5_jumlah']) }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: {
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
