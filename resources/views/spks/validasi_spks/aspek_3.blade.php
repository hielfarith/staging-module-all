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
$aspeks_3 = [
    [
        'section' => 'PENGURUSAN SOSIAL',
'subSections' => [
'Warga sekolah memahami dan mengetahui tindakan yang perlu di ambil apabila berlaku kes-kes salah laku.',
'Ada Peti Aduan di sekolah.',
'Rekod salah laku murid dan Laporan kes untuk rujukan.',
'Program-program pencegahan untuk murid.',
'Program-program invertensi dan pemulihan untuk murid.',
'Sistem Salah Laku Disiplin Murid (SSDM).',
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

            @foreach ($aspeks_3 as $index => $aspek_3)
            <tr>
                <td style="font-size: 11pt;width:82%" colspan="2" class="bg-light-primary text-uppercase">
                    {{ $aspek_3['section'] }}
                </td>
                <td style="font-size: 10pt" colspan="1" class="bg-light-primary ">
                    Skor Sekolah
                </td>
            </tr>
            @endforeach

        </thead>
        <tbody>

            @foreach ($aspeks_3 as $index => $aspek_3)
                {{-- <tr>
                    <td style="font-size: 11pt" colspan="2" class="bg-light-primary text-uppercase">
                        {{ $aspek_2['section'] }}
                    </td>
                    <td style="font-size: 10pt" colspan="1" class="bg-light-primary ">
                        Skor Sekolah
                    </td>
                </tr> --}}
                @foreach ($aspek_3['subSections'] as $subsection_aspek3)
                    <?php
                        $name = $index.'_'.$loop->index;
                    ?>
                    <tr>
                        <td style="font-size: 10pt">{{ $number++ }}</td>
                        <td style="font-size: 10pt">{{ $subsection_aspek3 }}</td>
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
        $("[id^='checkAspek3']").on("click", function () {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek3_" + index + "_" + loopIndex).removeClass("bg-light-warning bg-light-danger").addClass("bg-light-success");

            $("#catatanAspek3_" + index + "_" + loopIndex).hide(300);
        });

        $("[id^='rejectAspek3']").on("click", function () {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek3_" + index + "_" + loopIndex).removeClass("bg-light-success bg-light-warning").addClass("bg-light-danger");
            $("#catatanAspek3_" + index + "_" + loopIndex).show(200);
        });
    });
</script>
