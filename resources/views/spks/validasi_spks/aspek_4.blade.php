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
            @foreach ($aspeks_4 as $index => $aspek_4)
            <tr>
                <td colspan="5" class="bg-light-primary text-uppercase">
                    {{ $aspek_4['section'] }}
                </td>
            </tr>
            @foreach ($aspek_4['subSections'] as $subsection_aspek4)
            <?php
                        $name = $index.'_'.$loop->index;
                    ?>
            <tr>
                <td>{{ $number++ }}</td>
                <td>{{ $subsection_aspek4 }}</td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="0_{{ $index }}_{{ $loop->index }}" value="0" disabled>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="1_{{ $index }}_{{ $loop->index }}" value="1" disabled>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="2_{{ $index }}_{{ $loop->index }}" value="2" disabled>
                    </div>
                </td>
            </tr>

            <tr id="pengisianAspek4_{{ $index }}_{{ $loop->index }}">
                <td colspan="6" class="bg-light-warning">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Catatan" disabled>
                        <button class="btn btn-success btn-sm" type="button" id="checkAspek4_{{ $index }}_{{ $loop->index }}">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" type="button" id="rejectAspek4_{{ $index }}_{{ $loop->index }}">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                </td>
            </tr>

            <tr id="catatanAspek4{{ $index }}_{{ $loop->index }}" style="display: none;">
                <td colspan="6" class="bg-light-danger">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Catatan Validasi">
                    </div>
                </td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
        <tfoot>
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
        </tfoot>
    </table>
</div>

<hr>

<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="">
        Simpan
    </button>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("[id^='checkAspek4']").on("click", function () {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek4_" + index + "_" + loopIndex).removeClass("bg-light-warning bg-light-danger").addClass("bg-light-success");

            $("#catatanAspek4" + index + "_" + loopIndex).hide(300);
        });

        $("[id^='rejectAspek4']").on("click", function () {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek4_" + index + "_" + loopIndex).removeClass("bg-light-success bg-light-warning").addClass("bg-light-danger");
            $("#catatanAspek4" + index + "_" + loopIndex).show(200);
        });
    });
</script>
