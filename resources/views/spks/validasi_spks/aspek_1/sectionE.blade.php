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
$aspeks_1_secE = [
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
        ]
    ],
];



        $number = 1;
        @endphp

        <div class="table-responsive">
            <div class="justify-content-end align-items-center" style="margin-bottom:1%">
                <div style="text-align: right;">
                    <label for="jumlahSkor"
                        style="background-color: #0C2043; padding: 5px 10px; border-radius: 5px;font-weight:bold;color:white;font-size:10pt">Jumlah
                        Skor<span id="aspek1_sectione_sum"
                            style="background-color: #0C2043; padding: 5px 10px; border-radius: 5px;"></span></label>

                </div>
            </div>
            <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek1">
                <thead>

                    @foreach ($aspeks_1_secE as $index => $aspek_1)
                    <tr>
                        <td style="font-size: 11pt;width:87%" colspan="2" class="bg-light-primary text-uppercase">
                            {{ $aspek_1['section'] }}
                        </td>
                        <td style="font-size: 10pt" colspan="1" class="bg-light-primary ">
                            Skor Sekolah
                        </td>
                    </tr>
                    @foreach ($aspek_1['subSections'] as $subsection_aspek1)

                </thead>
                <tbody>
                   <?php
                        $name = $index.'_'.$loop->index;

                        $withTB = ($aspek_1['section'] == 'Pengurusan Aktiviti Murid') ||  ($aspek_1['section'] == 'Arahan Keselamatan Murid Semasa Aktiviti Lawatan Dan Perkhemahan') || ($aspek_1['section'] == 'Arahan Keselamatan Murid Di Asrama');
                    ?>
                    <tr>
                        <td style="font-size: 10pt">{{ $number++ }}</td>
                        <td style="font-size: 10pt">{{ $subsection_aspek1 }}</td>
                        <td>
                            <div style="font-size: 10pt" class="d-flex justify-content-center align-items-center">
                                {{-- <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="0_{{ $index }}_{{ $loop->index }}" value="0" disabled> --}}
                                <span id="aspek1_sectione_{{$name}}"></span>
                            </div>
                        </td>

                    </tr>


                    @endforeach
                    @endforeach
                </tbody>

            </table>
        </div>



    <!--     <div class="buy-now">
            <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="formsubmit('aspek1_sectionb')">
                Simpan
            </button>
        </div> -->
        </form>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
                $("[id^='checkAspek1']").on("click", function () {
                    var indexValues = $(this).attr("id").split('_');
                    var index = indexValues[1];
                    var loopIndex = indexValues[2];

                    $("#pengisianAspek1_" + index + "_" + loopIndex).removeClass("bg-light-warning bg-light-danger").addClass("bg-light-success");

                    $("#catatanAspek1_" + index + "_" + loopIndex).hide(300);
                });

                $("[id^='rejectAspek1']").on("click", function () {
                    var indexValues = $(this).attr("id").split('_');
                    var index = indexValues[1];
                    var loopIndex = indexValues[2];

                    $("#pengisianAspek1_" + index + "_" + loopIndex).removeClass("bg-light-success bg-light-warning").addClass("bg-light-danger");
                    $("#catatanAspek1_" + index + "_" + loopIndex).show(200);
                });
            });
        </script>
