<style>
    #spks_aspek5 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #spks_aspek5 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #spks_aspek5 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $aspeks_5 = [
        [
            'section' => 'PENGURUSAN RISIKO',
            'subSections' => [
                'Maklumat dan penerangan berkaitan lokasi berbahaya kepada murid dalam lingkungan perjalanan murid ke sekolah.',
                'Panduan tindakan untuk warga sekolah dan ibu bapa ketika menghadapi ancaman / kecemasan.',
                'Kerjasama dengan pihak berkuasa berkaitan.',
                'Peringatan berkaitan keselamatan di luar kawasan sekolah dari masa ke semasa.',
                'Nombor telefon kecemasan dipamerkan.',
                'Pelan strategik kawasan berisiko.',
                'Pematuhan Buku Panduan dan Surat Pekeliling Ikhtisas, Kementerian Pendidikan Malaysia.',
            ],
        ],
    ];

    $number = 1;
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    Pengurusan Risiko
</h5>

<hr>
<?php
if ($spks) {
    $aspek = json_decode($spks->aspek5, true);
} else {
    $aspek = null;
}
?>
<form id="aspek5">
    <input type="hidden" name="spks_id" value="{{ $spks?->id }}">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek5">
            <thead style="color:black; background-color: #d8bfb0;">
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Item</th>
                    <th colspan="3">Skor Sekolah</th>
                </tr>

                <tr>
                    <th>0</th>
                    <th>1</th>
                    <th>2</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-light-danger">
                    <td colspan="2" class="text-end">
                        Jumlah Skor
                    </td>
                    <td colspan="4" class="text-center"></td>
                </tr>
                @foreach ($aspeks_5 as $index => $aspek_5)
                    <tr>
                        <td colspan="5" class="bg-light-primary text-uppercase">
                            {{ $aspek_5['section'] }}
                        </td>
                    </tr>
                    @foreach ($aspek_5['subSections'] as $subsection_aspek5)
                        <?php
                        $name = $index . '_' . $loop->index;
                        $nameIndex = $index . '_' . $loop->index;
                        $catatanIndex = 'catatan_' . $nameIndex;
                        $catatan = '';
                        if ($aspek) {
                            $catatan = isset($aspek[$catatanIndex]) ? $aspek[$catatanIndex] : '';
                        }
                        ?>
                        <tr>
                            <td>{{ $number++ }}</td>
                            <td>{{ $subsection_aspek5 }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input required class="form-check-input radio-input-2" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="0_{{ $index }}_{{ $loop->index }}" value="0"
                                        {{ $disabled }} @if (isset($aspek) && $aspek[$nameIndex] == '0') checked @endif>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input required class="form-check-input radio-input-2" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="1_{{ $index }}_{{ $loop->index }}" value="1"
                                        {{ $disabled }} @if (isset($aspek) && $aspek[$nameIndex] == '1') checked @endif>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input required class="form-check-input radio-input-2" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="2_{{ $index }}_{{ $loop->index }}" value="2"
                                        {{ $disabled }} @if (isset($aspek) && $aspek[$nameIndex] == '2') checked @endif>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="5" class="bg-light-success">
                                <input required type="text" name="catatan_{{ $name }}" class="form-control"
                                    placeholder="Catatan" {{ $disabled }} value="{{ $catatan }}">
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
            </tr>
            <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Jumlah Skor
                </td>
               <td colspan="3" class="text-center"></td>
            </tr>
        </tfoot> --}}
        </table>
    </div>

    <hr>

    @if ($disabled != 'disabled')
        <div class="buy-now">
            <button class="btn btn-primary waves-effect waves-float waves-light" type="button"
                onclick="formsubmit('aspek5')">
                Simpan
            </button>
        </div>
    @endif
</form>
