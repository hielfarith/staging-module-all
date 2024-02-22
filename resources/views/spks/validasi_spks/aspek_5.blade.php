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

        ]
    ],
];

$number = 1;
@endphp

<div class="card-header">
    <h5 class="card-title fw-bolder"> Pengurusan Risiko </h5>

    <div class="justify-content-end align-items-center" style="width: 10%">
        <div style="text-align:center">
            <span>Jumlah Skor</span>
        </div>
        <div style="text-align:center;padding-right:"><span>20</span>
        </div>

    </div>
 </div>
<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek5">
        <thead>
            <tr>
                <th style="font-size: 10pt" rowspan="2">No.</th>
                <th style="font-size: 10pt" colspan="3" rowspan="2">Item</th>
                {{-- <th colspan="3">Skor Sekolah</th> --}}
            </tr>

            {{-- <tr>
                <th>0</th>
                <th>1</th>
                <th>2</th>
            </tr> --}}
        </thead>
        <tbody>
            {{-- <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Jumlah Skor
                </td>
               <td colspan="3" class="text-center"></td>
            </tr> --}}
            @foreach ($aspeks_5 as $index => $aspek_5)
                <tr>
                    <td style="font-size: 11pt" colspan="2" class="bg-light-primary text-uppercase">
                        {{ $aspek_5['section'] }}
                    </td>
                    <td style="font-size: 10pt" colspan="1" class="bg-light-primary ">
                        Skor Sekolah
                    </td>
                </tr>
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
                        {{-- <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="0_{{ $index }}_{{ $loop->index }}" value="0" disabled>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="1_{{ $index }}_{{ $loop->index }}" value="1" disabled>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="2_{{ $index }}_{{ $loop->index }}" value="2" disabled>
                            </div>
                        </td> --}}
                    </tr>

                    {{-- <tr id="pengisianAspek5{{ $index }}_{{ $loop->index }}">
                        <td colspan="6" class="bg-light-warning">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Catatan" disabled>
                                <button class="btn btn-success btn-sm" type="button" id="checkAspek5_{{ $index }}_{{ $loop->index }}">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" type="button" id="rejectAspek5_{{ $index }}_{{ $loop->index }}">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr id="catatanAspek5{{ $index }}_{{ $loop->index }}" style="display: none;">
                        <td colspan="6" class="bg-light-danger">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Catatan Validasi">
                            </div>
                        </td>
                    </tr> --}}
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            {{-- <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Skor
                </td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr> --}}

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
        $("[id^='checkAspek5']").on("click", function () {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek5" + index + "_" + loopIndex).removeClass("bg-light-warning bg-light-danger").addClass("bg-light-success");
            $("#catatanAspek5" + index + "_" + loopIndex).hide(300);
        });

        $("[id^='rejectAspek5']").on("click", function () {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek5" + index + "_" + loopIndex).removeClass("bg-light-success bg-light-warning").addClass("bg-light-danger");
            $("#catatanAspek5" + index + "_" + loopIndex).show(200);
        });
    });
</script>
