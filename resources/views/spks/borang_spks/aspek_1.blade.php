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
    $aspeks_1 = [
        [
            'section' => 'Arahan Keselamatan Murid Dari Aspek Pergi Dan Balik Sekolah',
            'subSections' => [
                'Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki, Berbasikal, Motosikal, Bas sekolah, Dihantar penjaga,
            Bot/Perahu,Kereta sendiri, Kereta api)',
                'Menyedia dan mempamer tatacara keselamatan pergi dan balik sekolah.',
                'pemeriksaan berkala ke atas kenderaan yang digunakan murid ke sekolah.(Basikal, Motosikal, Kereta)',
                'Mematuhi prosedur dan peraturan berkaitan keselamatan daripada pihak berkuasa berkenaan. (Jaket keselamatan/topi
            keledar/lesen memandu/cukai jalan dan lain-lain berkaitan)',
                'Menetapkan laluan pejalan kaki, laluan dan parkir kenderaan yang digunakan oleh murid.',
                'Menetapkan tempat menurunkan dan mengambil murid yang menggunakan bas dan yang dihantar oleh penjaga.',
                'Kawal selia pengurusan sekolah sewaktu murid datang dan balik dari sekolah.',
                'Ada arahan berkaitan keselamatan murid semasa berada di jeti / stesen bas/ stesen kereta api/ dan lain-lain.',
            ],
        ],
        [
            'section' => 'Arahan Keselamatan Murid Semasa Pengajaran & Pembelajaran Dan Waktu Rehat',
            'subSections' => [
                'Ada Arahan berkaitan keselamatan murid di bilik darjah, makmal. bengkel, lain-lain tempat amali dan bilik-bilik khas.',
                'Pengawasan guru sebelum, semasa, dan selepas aktiviti dijalankan.',
                'Memastikan kehadiran murid direkodkan.',
                'Memastikan tatacara penggunaan peralatan dipatuhi.',
                'Mematuhi peraturan berpakaian semasa melaksanakan aktiviti.',
                'Ada arahan kepada murid tentang kawasan larangan sewaktu rehat.',
                'Rekod keluar masuk dari kawasan sekolah semasa Pengajaran & Pembelajaran.',
            ],
        ],
        [
            'section' => 'Arahan Keselamatan Murid Semasa Aktiviti Kokurikulum, Sukan Dan Permainan',
            'subSections' => [
                'Ada arahan berkaitan keselamatan murid sebelum, semasa dan selepas aktiviti kokurikulum, sukan dan permainan.',
                'Pengawasan guru sebelum, semasa dan selepas aktiviti dijalankan.',
                'Memastikan kehadiran murid direkodkan.',
                'Memastikan tatacara penggunaan peralatan dipatuhi.',
                'Mematuhi peraturan berpakaian semasa melaksanakan aktiviti.',
            ],
        ],
        [
            'section' => 'Arahan Keselamatan Murid Semasa Aktiviti Lawatan Dan Perkhemahan',
            'subSections' => [
                'Ada arahan berkaitan keselamatan murid sebelum, semasa dan selepas aktiviti lawatan dan perkhemahan dilaksanakan',
                'Pengawasan guru sebelum, semasa dan selepas aktiviti dijalankan.',
                'Memastikan kehadiran murid direkodkan.',
                'Memastikan tatacara penggunaan peralatan dipatuhi.',
                'Mematuhi peraturan berpakaian semasa melaksanakan aktiviti.',
                'Mematuhi prosedur dan peraturan berkaitan lawatan dan perkhemahan.(Surat kebenaran penjaga/perakuan kesihatan)',
                'Memastikan kenderaan yang digunakan untuk membawa murid selamat digunakan.',
            ],
        ],
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
            ],
        ],
    ];

    $number = 1;
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    Pengurusan Aktiviti Murid
</h5>

<hr>
<?php
if ($spks) {
    $aspek1 = json_decode($spks->aspek1, true);
} else {
    $aspek1 = null;
}
?>
<form id="aspek1">
    <input type="hidden" name="spks_id" value="{{ $spks?->id }}">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek1">


            <thead style="color:black; background-color: #d8bfb0;">
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
                @foreach ($aspeks_1 as $index => $aspek_1)
                    <tr>
                        <td colspan="6" class="bg-light-primary text-uppercase">
                            {{ $aspek_1['section'] }}
                        </td>
                    </tr>
                    @foreach ($aspek_1['subSections'] as $subsection_aspek1)
                        <?php
                        
                        $name = $index . '_' . $loop->index;
                        $withTB = $aspek_1['section'] == 'Arahan Keselamatan Murid Dari Aspek Pergi Dan Balik Sekolah' || $aspek_1['section'] == 'Arahan Keselamatan Murid Semasa Aktiviti Lawatan Dan Perkhemahan' || $aspek_1['section'] == 'Arahan Keselamatan Murid Di Asrama';
                        $nameIndex = $index . '_' . $loop->index;
                        $catatanIndex = 'catatan_' . $index;
                        $catatan = '';
                        if ($aspek1) {
                            $catatan = isset($aspek1[$catatanIndex]) ? $aspek1[$catatanIndex] : '';
                        }
                        ?>
                        <tr>
                            <td>{{ $number++ }}</td>
                            <td>{{ $subsection_aspek1 }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input required class="form-check-input radio-input-2" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="0_{{ $index }}_{{ $loop->index }}" value="0"
                                        @if (isset($aspek1) && $aspek1[$nameIndex] == '0') checked @endif {{ $disabled }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input required class="form-check-input radio-input-2" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="1_{{ $index }}_{{ $loop->index }}" value="1"
                                        @if (isset($aspek1) && $aspek1[$nameIndex] == '1') checked @endif {{ $disabled }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input required class="form-check-input radio-input-2" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="2_{{ $index }}_{{ $loop->index }}" value="2"
                                        @if (isset($aspek1) && $aspek1[$nameIndex] == '2') checked @endif {{ $disabled }}>
                                </div>
                            </td>
                            @if ($withTB)
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input required class="form-check-input radio-input-2" type="radio"
                                            name="{{ $index }}_{{ $loop->index }}"
                                            id="TB_{{ $index }}_{{ $loop->index }}" value="TB"
                                            @if (isset($aspek1) && $aspek1[$nameIndex] == 'TB') checked @endif {{ $disabled }}>
                                    </div>
                                </td>
                            @else
                                <td class="bg-light-primary"></td>
                            @endif
                        </tr>

                        <tr>
                            <td colspan="6" class="bg-light-success">
                                <input required type="text" name="catatan_{{ $index }}" class="form-control"
                                    placeholder="Catatan" value="{{ $catatan }}" {{ $disabled }}>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
            {{-- <tfoot>
            <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Skor
                </td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
            <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Jumlah Skor
                </td>
                <td colspan="4" class="text-center"></td>
            </tr>
        </tfoot> --}}
        </table>
    </div>

    <hr>

    @if ($disabled != 'disabled')
        <div class="buy-now">
            <button class="btn btn-primary waves-effect waves-float waves-light" type="button"
                onclick="formsubmit('aspek1')">
                Simpan
            </button>
        </div>
    @endif
</form>
