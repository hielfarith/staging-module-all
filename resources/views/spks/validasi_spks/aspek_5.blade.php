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
                Skor<span id="jumlahSkor"
                    style="background-color: #0C2043; padding: 5px 10px; border-radius: 5px;">20</span></label>

        </div>
    </div>
    <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek2">
        <thead>

            @foreach ($aspeks_5 as $index => $aspek_5)
            <tr>
                <td style="font-size: 11pt;width:82%" colspan="2" class="bg-light-primary text-uppercase">
                    {{ $aspek_5['section'] }}
                </td>
                <td style="font-size: 10pt" colspan="1" class="bg-light-primary ">
                    Skor Sekolah
                </td>
            </tr>
            @endforeach

        </thead>
        <tbody>

            @foreach ($aspeks_5 as $index => $aspek_5)
                {{-- <tr>
                    <td style="font-size: 11pt" colspan="2" class="bg-light-primary text-uppercase">
                        {{ $aspek_2['section'] }}
                    </td>
                    <td style="font-size: 10pt" colspan="1" class="bg-light-primary ">
                        Skor Sekolah
                    </td>
                </tr> --}}
                @foreach ($aspek_5['subSections'] as $subsection_aspek5)
                    <?php
                        $name = $index.'_'.$loop->index;
                    ?>
                    <tr>
                        <td style="font-size: 10pt">{{ $number++ }}</td>
                        <td style="font-size: 10pt">{{ $subsection_aspek5 }}</td>
                        <td>
                            <div style="font-size: 10pt" class="d-flex justify-content-center align-items-center">
                                {{-- <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="0_{{ $index }}_{{ $loop->index }}" value="0" disabled> --}}
                                <span>1</span>
                            </div>
                        </td>

                    </tr>

                @endforeach
            @endforeach
        </tbody>

    </table>
</div>



<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="">
        Simpan
    </button>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("[id^='checkAspek5']").on("click", function () {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek5_" + index + "_" + loopIndex).removeClass("bg-light-warning bg-light-danger").addClass("bg-light-success");

            $("#catatanAspek5_" + index + "_" + loopIndex).hide(300);
        });

        $("[id^='rejectAspek5']").on("click", function () {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek5_" + index + "_" + loopIndex).removeClass("bg-light-success bg-light-warning").addClass("bg-light-danger");
            $("#catatanAspek5_" + index + "_" + loopIndex).show(200);
        });
    });
</script>
