<form id="kebersihan">
    <?php
    $butiran_institusi_id = $butiran_id;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $kebersihanData = json_decode($tab1->kebersihan);
    } else {
        $kebersihanData = null;
    }
    ?>

    @php
        $butiran_institusi_id = $butiran_id;

        $kebersihans = [
            'persekitaran_kawasan_penyambut_tetamu' => '<a> 9.1 Persekitaran Kawasan Penyambut Tetamu </a>',
            'bilik_darjah_bilik_khas' => '<a> 9.2 Bilik Darjah / Bilik Khas </a>',
        ];

        $option_kebersihans = [
            'persekitaran_kawasan_penyambut_tetamu' => [
                0 => '<i style="font-size: 12px;"></i>',
                1 => '<i style="font-size: 12px;">Mempunyai mana-mana satu (1) kriteria</i>',
                2 => '<i style="font-size: 12px;">Mempunyai mana-mana dua (2) kriteria</i>',
                3 => '<i style="font-size: 12px;">Mempunyai mana-mana tiga (3) kriteria</i>',
                4 => '<i style="font-size: 12px;">Mempunyai mana-mana empat (4) kriteria</i>',
                5 => '<i style="font-size: 12px;">Mempunyai mana-mana lima (5) kriteria</i>',
            ],

            'bilik_darjah_bilik_khas' => [
                0 => '<i style="font-size: 12px;"></i>',
                1 => '<i style="font-size: 12px;">Mempunyai mana-mana satu (1) kriteria</i>',
                2 => '<i style="font-size: 12px;">Mempunyai mana-mana dua (2) kriteria</i>',
                3 => '<i style="font-size: 12px;">Mempunyai mana-mana tiga (3) kriteria</i>',
                4 => '<i style="font-size: 12px;">Mempunyai mana-mana empat (4) kriteria</i>',
                5 => '<i style="font-size: 12px;">Mempunyai mana-mana lima (5) kriteria</i>',
            ],
        ];

    @endphp

    <style>
        #SkipsNilai9 thead th {
            vertical-align: middle;
            text-align: center;
        }

        #SkipsNilai9 tbody {
            vertical-align: middle;
            /* text-align: center; */
        }

        #SkipsNilai9 table {
            width: 100% !important;
            /* word-wrap: break-word; */
        }
    </style>

    <input type="hidden" name="usertype" value="{{ $type }}">
    <input type="hidden" name="butiran_institusi_id" id="butiran_institusi_id" value="{{ $butiran_institusi_id }}">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="SkipsNilai9">
            <thead style="color:black; background-color: #d8bfb0;">
                <tr>
                    <th rowspan="2" width="5%">No.</th>
                    <th rowspan="2" width="20%"> Kriteria </th>
                    <th width="12">0</th>
                    <th width="12">1</th>
                    <th width="12">2</th>
                    <th width="12">3</th>
                    <th width="12">4</th>
                    <th width="12">5</th>
                </tr>

                <tr>
                    <th>TIADA</th>
                    <th>LEMAH</th>
                    <th>SEDERHANA</th>
                    <th>HARAPAN</th>
                    <th>BAIK</th>
                    <th>CEMERLANG</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Kebersihan dan Keceriaan</td>
                </tr>

                @foreach ($kebersihans as $index => $kebersihan)
                    @php
                        $numeric = preg_replace('/[^0-9.]/', '', $kebersihan);
                        $text = trim(preg_replace('/[0-9.]/', '', $kebersihan), '.');

                        $excludeNumber = strpos($kebersihan, 'text-primary') !== false;
                    @endphp

                    <tr>
                        @if (!$excludeNumber)
                            <td> {{ $numeric }} </td>
                        @endif

                        @if (!$excludeNumber)
                            <td> {!! $text !!} </td>
                        @else
                            <td class="bg-light-primary" colspan="8"> {!! $text !!} </td>
                        @endif

                        @foreach ($option_kebersihans[$index] as $key => $option_kebersihan)
                            <td>
                                <div
                                    class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio" name="{{ $index }}"
                                        id="" value="{{ $key }}" required
                                        @if ($kebersihanData && $kebersihanData->$index == $key) checked @endif
                                        @if ($type == 'verfikasi' || $type == 'validasi' || $type == 'laporan') disabled @endif>
                                </div>
                                <br>

                                <div class="d-flex justify-content-center align-items-center text-center">
                                    {!! $option_kebersihan !!}
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    @if ($type != 'laporan' && !empty($butiran_id))
        <div class="d-flex justify-content-end align-items-center mt-1">
            <button type="button" class="btn btn-primary float-right" onclick="submitform9()">Simpan</button>
        </div>
    @endif

</form>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function submitform9() {
        var formData = new FormData(document.getElementById('kebersihan'));
        var error = false;

        $('form#kebersihan').find('radio, input').each(function() {
            var value = $("input[name='" + this.name + "']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        // var url = "{{ route('skips.instrumen-submit', ['tab' => 'kebersihan']) }}"
        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard/kebersihan';

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    if (response.formfilled == true) {
                        window.location.reload();
                    }
                }
            }
        });
    }
</script>
