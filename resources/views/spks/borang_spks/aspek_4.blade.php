<style>
    #spks_aspek4 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #spks_aspek4 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #spks_aspek4 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$aspeks_4 = [
[
    'section' => 'Arahan Keselamatan Menghadapi Krisis Dan Bencana',
    'subSections' => [
        'Menyedia dan mempamer tatacara keselamatan berkaitan krisis/bencana (kebakaran, perubahan cuaca, ribut petir, kemarau,
        jerebu, banjir dan lain-lain yang berkaitan).',
        'Pelan kesiapsiagaan dan kontigensi yang lengkap.',
        'Peralatan menghadapi krisis dan bencana berfungsi dan mencukupi.',
        'Latihan menghadapi krisis dan bencana.',
        'Ada nombor-nombor telefon pihak berkuasa berkaitan.',
        'Kerjasama dengan pihak berkuasa berkaitan.',
        'Pematuhan Buku Panduan dan Surat Pekeliling Ikhtisas, Kementerian Pendidikan Malaysia.',

        ]
    ],
];

$number = 1;

@endphp

<h5 class="card-title fw-bolder text-uppercase">
    Pengurusan Krisis/ Bencana
</h5>

<hr>
<?php
    if ($spks) {
        $aspek = json_decode($spks->aspek4, true);

    } else {
        $aspek = null;
    }
?>
<form id="aspek4">
<input type="hidden" name="spks_id" value="{{$spks?->id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek4">
        <thead>
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
            @foreach ($aspeks_4 as $index => $aspek_4)
            <tr>
                <td colspan="5" class="bg-light-primary text-uppercase">
                    {{ $aspek_4['section'] }}
                </td>
            </tr>
            @foreach ($aspek_4['subSections'] as $subsection_aspek4)
            <?php
                $name = $index.'_'.$loop->index;
                $nameIndex = $index.'_'.$loop->index;
                $catatanIndex = 'catatan_'.$nameIndex;
                $catatan = '';
                if ($aspek) {
                    $catatan = isset($aspek[$catatanIndex]) ? $aspek[$catatanIndex] : '';
                }
            ?>
            <tr>
                <td>{{ $number++ }}</td>
                <td>{{ $subsection_aspek4 }}</td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input required class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="0_{{ $index }}_{{ $loop->index }}" value="0" {{$disabled}} @if (isset($aspek) && $aspek[$nameIndex] == "0") checked  @endif>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input required class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="1_{{ $index }}_{{ $loop->index }}" value="1" {{$disabled}} @if (isset($aspek) && $aspek[$nameIndex] == "1") checked  @endif>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input required class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="2_{{ $index }}_{{ $loop->index }}" value="2" {{$disabled}} @if (isset($aspek) && $aspek[$nameIndex] == "2") checked  @endif>
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="5" class="bg-light-success">
                    <input required type="text" name="catatan_{{$name}}" class="form-control" placeholder="Catatan" {{$disabled}} value="{{$catatan}}">
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

@if($disabled != 'disabled')
<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="formsubmit('aspek4')">
        Simpan
    </button>
</div>
@endif
</form>
