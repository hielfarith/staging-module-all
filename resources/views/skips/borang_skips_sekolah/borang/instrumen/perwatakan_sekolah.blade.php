@php
    $pendaftarans = [
        'kebitaraan' => '13.1 Kebitaraan ',

        'perlaksanaan_kebitaraan' => '13.2 Perlaksanaan Kebitaraan',
    ];

    $options = [
        'kebitaraan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Mempunyai kebitaraan</i>',
            2 => '<i style="font-size:12px;">Mempunyai kebitaraan, Ada jawatankuasa</i>',
            3 => '<i style="font-size:12px;">Mempunyai kebitaraan, Ada jawatankuasa, Ada perancangan</i>',
            4 => '<i style="font-size:12px;">Mempunyai kebitaraan, Ada jawatankuasa, Ada perancangan, Dihebahkan </i>',
            5 => '<i style="font-size:12px;">Mempunyai kebitaraan, Ada jawatankuasa, Ada perancangan, Dihebahkan, Bukti Pencapaian</i>',
        ],

        'perlaksanaan_kebitaraan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada perancangan</i>',
            2 => '<i style="font-size:12px;">Ada perancangan, Ada aktiviti</i>',
            3 => '<i style="font-size:12px;">Ada perancangan, Ada aktiviti, Ada Penglibatan Murid</i>',
            4 => '<i style="font-size:12px;">Ada perancangan, Ada aktiviti, Ada Penglibatan Murid, Ada kejurulatihan </i>',
            5 => '<i style="font-size:12px;">Ada perancangan, Ada aktiviti, Ada Penglibatan Murid, Ada kejurulatihan, Ada Peruntukan Kewangan</i>',
        ],
    ];

    $count = 1.1;
@endphp

<style>
    #SkipsNilai1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #SkipsNilai1 tbody {
        vertical-align: middle;
    }

    #SkipsNilai1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<?php
$butiran_institusi_id = $butiran_id;
$tab1 = App\Models\ItemStandardQualitySkipsSekolah::where('butiran_institusi_id', $butiran_institusi_id)->first();
if ($butiran_institusi_id && $tab1) {
    $perwatakan_sekolah = json_decode($tab1->perwatakan_sekolah);
} else {
    $perwatakan_sekolah = null;
}
?>
<form id="perwatakan_sekolah">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="SkipsNilai1">
            <thead style="color:black; background-color: #d8bfb0">
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
                <input type="hidden" name="butiran_institusi_id" value="{{ $butiran_id }}">

                <tr>
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Perwatakan Sekolah</td>
                </tr>
                @foreach ($pendaftarans as $index => $pendaftaran)
                    @php
                        $numeric = preg_replace('/[^0-9.]/', '', $pendaftaran);
                        $text = trim(preg_replace('/[0-9.]/', '', $pendaftaran), '.');

                        $excludeNumber = strpos($pendaftaran, 'text-primary') !== false;
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

                        @foreach ($options[$index] as $key => $option)
                            <td>
                                <div
                                    class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio" name="{{ $index }}"
                                        value="{{ $key }}" required
                                        @if ($perwatakan_sekolah && $perwatakan_sekolah->$index == $key) checked @endif
                                        @if ($type == 'verfikasi' || $type == 'validasi' || $type == 'laporan') disabled @endif>
                                </div>
                                <br>

                                <div class="d-flex justify-content-center align-items-center">
                                    {!! $option !!}
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right formdd"
            onclick="submitformsekolahperwatan()">Simpan</button>
    </div>

</form>

<script>
    function submitformsekolahperwatan() {
        var formData = new FormData(document.getElementById('perwatakan_sekolah'));
        var error = false;

        $('form#perwatakan_sekolah').find('radio, input, checkbox').each(function() {
            var value = $("input[name='" + this.name + "']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }

        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard-sekolah/perwatakan_sekolah';

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

    };
</script>
