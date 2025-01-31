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
    $aspeks_1_secA = [
        [
            'section' => 'Arahan Keselamatan Murid Dari Aspek Pergi Dan Balik Sekolah',
            'subSections' => [
                'Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki, Berbasikal, Motosikal, Bas sekolah, Dihantar penjaga, Bot/Perahu,Kereta sendiri, Kereta api)',
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
    ];

    $number = 1;
@endphp


<div class="table-responsive">
    <div class="justify-content-end align-items-center" style="margin-bottom:1%">
        <div style="text-align: right;">
            <label for="jumlahSkor"
                style="background-color: #0C2043; padding: 5px 10px; border-radius: 5px;font-weight:bold;color:white;font-size:10pt">Jumlah
                Skor<span id="aspek1_sum"
                    style="background-color: #0C2043; padding: 5px 10px; border-radius: 5px;"></span></label>

        </div>


        {{-- <div style="text-align:right;padding-right:">
        </div> --}}

    </div>
    {{-- <div class="justify-content-end align-items-center" style="text-align:right;width: ">
        <div style="text-align:;padding-right:3%">
            <span>Jumlah Skor</span>
        </div>
        <div style="text-align:;padding-right:5%"><span id=""></span>
        </div>

    </div> --}}
    <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek1">
        <thead>

            @foreach ($aspeks_1_secA as $index => $aspek_1)
                <tr>
                    <td style="font-size: 11pt;width:87%" colspan="2" class="bg-light-primary text-uppercase">
                        {{ $aspek_1['section'] }}
                    </td>
                    <td style="font-size: 10pt" colspan="1" class="bg-light-primary ">
                        Skor Sekolah
                    </td>
                </tr>

                {{-- <tr>
                            <td colspan="6" class="bg-light-primary text-uppercase">
                                {{ $aspek_1['section'] }}
                            </td>
                        </tr> --}}
                @foreach ($aspek_1['subSections'] as $subsection_aspek1)
                    {{-- <tr>
                <th style="text-align:left;font-size: 10pt" rowspan="2" colspan="3" >No.</th>
                <th style="font-size: 10pt" colspan="3" rowspan="2">Item</th>
                <th colspan="5">Skor Sekolah</th>
            </tr> --}}

                    {{-- <tr>
                <th>0</th>
                <th>1</th>
                <th>2</th>
                <th>TB</th>
            </tr> --}}
        </thead>
        <tbody>

            <?php
            $name = $index . '_' . $loop->index;
            
            $withTB = $aspek_1['section'] == 'Pengurusan Aktiviti Murid' || $aspek_1['section'] == 'Arahan Keselamatan Murid Semasa Aktiviti Lawatan Dan Perkhemahan' || $aspek_1['section'] == 'Arahan Keselamatan Murid Di Asrama';
            ?>
            <tr>
                <td style="font-size: 10pt">{{ $number++ }}</td>
                <td style="font-size: 10pt">{{ $subsection_aspek1 }}</td>
                <td>
                    <div style="font-size: 10pt" class="d-flex justify-content-center align-items-center">
                        <span id="aspek1_{{ $name }}"></span>
                    </div>
                </td>
                {{-- <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="0_{{ $index }}_{{ $loop->index }}" value="0"
                            disabled>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="1_{{ $index }}_{{ $loop->index }}" value="1"
                            disabled>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="2_{{ $index }}_{{ $loop->index }}" value="2"
                            disabled>
                    </div>
                </td>
                @if ($withTB)
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="TB_{{ $index }}_{{ $loop->index }}" value="TB"
                            disabled>
                    </div>
                </td> --}}
                {{-- @else
                <td class="bg-light-primary"></td>
                @endif --}}
            </tr>

            {{-- <tr id="pengisianAspek1_{{ $index }}_{{ $loop->index }}">
                <td colspan="6" class="bg-light-warning">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Catatan" disabled>
                        <button class="btn btn-success btn-sm" type="button"
                            id="checkAspek1_{{ $index }}_{{ $loop->index }}">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" type="button"
                            id="rejectAspek1_{{ $index }}_{{ $loop->index }}">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                </td>
            </tr> --}}

            {{-- <tr id="catatanAspek1_{{ $index }}_{{ $loop->index }}" style="display: none;">
                <td colspan="6" class="bg-light-danger">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Catatan Validasi">
                    </div>
                </td>
            </tr> --}}
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

<!-- <div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="formsubmit('aspek1')">
        Simpan
    </button>
</div> -->
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("[id^='checkAspek1']").on("click", function() {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek1_" + index + "_" + loopIndex).removeClass(
                "bg-light-warning bg-light-danger").addClass("bg-light-success");

            $("#catatanAspek1_" + index + "_" + loopIndex).hide(300);
        });

        $("[id^='rejectAspek1']").on("click", function() {
            var indexValues = $(this).attr("id").split('_');
            var index = indexValues[1];
            var loopIndex = indexValues[2];

            $("#pengisianAspek1_" + index + "_" + loopIndex).removeClass(
                "bg-light-success bg-light-warning").addClass("bg-light-danger");
            $("#catatanAspek1_" + index + "_" + loopIndex).show(200);
        });

        //ajax call to pull data

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        var APIUrl = "{{ env('APP_VERFIKASI_URL') }}" + 'api/spks/get-tab-jumlah';
        var id = <?php echo Request::segment(3); ?>

        $.ajax({
            url: APIUrl,
            method: 'POST',
            data: {
                id: id,
                tab: 'aspek1'
            },
            success: function(response) {
                var data = response.data;
                var sum = 0;
                for (var i = 0; i < 8; i++) {
                    var id = 'aspek1_0_' + i;
                    var dataid = '0_' + i;
                    if ($.isNumeric(data[dataid])) {
                        sum += parseInt(data[dataid]);
                    }
                    $('#' + id).html(data[dataid]);
                }
                $('#aspek1_sum').html(sum)
            }
        });

    });
</script>
