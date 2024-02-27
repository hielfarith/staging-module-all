<style>
    #spks_aspek2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #spks_aspek2 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #spks_aspek2 table {
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

{{-- <div style="height: ;" class="card-header">
    <h5 class="card-title fw-bolder text-uppercase"> Pengurusan Keselamatan Infrastruktur Sekolah </h5>


 </div>
<hr> --}}

<div class="table-responsive">
    <div class="justify-content-end align-items-center" style="margin-bottom:1%">
        <div style="text-align: right;">
            <label for="jumlahSkor"
                style="background-color: #0C2043; padding: 5px 10px; border-radius: 5px;font-weight:bold;color:white;font-size:10pt">Jumlah
                Skor<span id="aspek4_sum"
                    style="background-color: #0C2043; padding: 5px 10px; border-radius: 5px;">20</span></label>

        </div>
    </div>
    <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek2">
        <thead>

            @foreach ($aspeks_4 as $index => $aspek_4)
            <tr>
                <td style="font-size: 11pt;width:82%" colspan="2" class="bg-light-primary text-uppercase">
                    {{ $aspek_4['section'] }}
                </td>
                <td style="font-size: 10pt" colspan="1" class="bg-light-primary ">
                    Skor Sekolah
                </td>
            </tr>
            @endforeach

        </thead>
        <tbody>

            @foreach ($aspeks_4 as $index => $aspek_4)
                {{-- <tr>
                    <td style="font-size: 11pt" colspan="2" class="bg-light-primary text-uppercase">
                        {{ $aspek_2['section'] }}
                    </td>
                    <td style="font-size: 10pt" colspan="1" class="bg-light-primary ">
                        Skor Sekolah
                    </td>
                </tr> --}}
                @foreach ($aspek_4['subSections'] as $subsection_aspek4)
                    <?php
                        $name = $index.'_'.$loop->index;
                    ?>
                    <tr>
                        <td style="font-size: 10pt">{{ $number++ }}</td>
                        <td style="font-size: 10pt">{{ $subsection_aspek4 }}</td>
                        <td>
                            <div style="font-size: 10pt" class="d-flex justify-content-center align-items-center">
                                {{-- <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="0_{{ $index }}_{{ $loop->index }}" value="0" disabled> --}}
                                <span id="aspek4_{{$name}}"></span>
                            </div>
                        </td>

                    </tr>

                @endforeach
            @endforeach
        </tbody>

    </table>
</div>


<!-- 
<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="">
        Simpan
    </button>
</div>
 -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("[id^='checkAspek4']").on("click", function () {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek4_" + index + "_" + loopIndex).removeClass("bg-light-warning bg-light-danger").addClass("bg-light-success");

            $("#catatanAspek4_" + index + "_" + loopIndex).hide(300);
        });

        $("[id^='rejectAspek4']").on("click", function () {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek4_" + index + "_" + loopIndex).removeClass("bg-light-success bg-light-warning").addClass("bg-light-danger");
            $("#catatanAspek4_" + index + "_" + loopIndex).show(200);
        });
    });
</script>
