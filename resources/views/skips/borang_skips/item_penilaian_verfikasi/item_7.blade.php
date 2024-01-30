<form id="displinv">
<?php
    $butiran_institusi_id = Request::segment(3);
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $disiplin = json_decode($tab1->displin);
    } else {
        $disiplin = null;
    }

    if ($type == 'verfikasi' ) {
        if (!empty($tab1->displin_verfikasi)) {
            $disiplin = json_decode($tab1->displin_verfikasi);
        } else {
            $disiplin = null;
        }
    }
?>
@php
$butiran_institusi_id = Request::segment(3);
$displins = [
    'peraturan_disiplin' => '7.1 Peraturan Disiplin',
    'rekod_disiplin' => '7.2 Rekod Disiplin',
    'pengurusan_tindakan_disiplin' => '7.3 Pengurusan Tindakan Disiplin',
];

$option_displins = [
    'peraturan_disiplin' => [
        0 => '<i></i>',
        1 => '<i>Ada Peraturan</i>',
        2 => '<i>Ada Buku Peraturan</i>',
        3 => '<i>Disebarkan</i>',
        4 => '<i>Peraturan Menyeluruh</i>',
        5 => '<i>Akujanji Pelajar</i>',
    ],

    'rekod_disiplin' => [
        0 => '<i></i>',
        1 => '<i>Ada Rekod Disiplin</i>',
        2 => '<i>Didokumentasi</i>',
        3 => '<i>Sistematik</i>',
        4 => '<i>Analisis</i>',
        5 => '<i>Terkini</i>',
    ],

    'pengurusan_tindakan_disiplin' => [
        0 => '<i></i>',
        1 => '<i>Membuat satu (1) tindakan disiplin</i>',
        2 => '<i>Membuat dua (2) tindakan disiplin</i>',
        3 => '<i>Membuat tiga (3) tindakan disiplin</i>',
        4 => '<i>Membuat empat (4) tindakan disiplin</i>',
        5 => '<i>Membuat kesemua tindakan disiplin</i>',
    ],
];

@endphp

<style>
    #NilaiItem7 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem7 tbody {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem7 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>
    <input type="hidden" name="usertype" value="{{$type}}">
    <input type="hidden" name="butiran_institusi_id" id="butiran_institusi_id" value="{{$butiran_institusi_id}}">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem7">
            <thead>
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
                    <td colspan="8" class="bg-light-primary fw-bolder">Disiplin</td>
                </tr>
                @foreach ($displins as $index => $displin)
                <?php
                    $keyval = '';
                    $keyval = $index.'_verfikasi';
                ?>
                    <tr>
                        <td colspan="2"> {{ $displin }}</td>
                        @foreach ($option_displins[$index] as $key => $option_displin)
                            <td>
                                <div class="form-check form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="{{ $index }}_verfikasi" id="" value="{{$key}}" required @if($disiplin && $disiplin->$keyval == $key) checked @endif>
                                </div>
                                <br>
                                {!! $option_displin !!}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        <hr>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right" onclick="submitform7v()">Simpan</button>
    </div>

</form>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
   function submitform7v() {
        var formData = new FormData(document.getElementById('displinv'));
        var error = false;

        $('form#displinv').find('radio, input').each(function() {
            var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skips.instrumen-submit', ['tab' => 'displin']) }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
               }
            }
        });
   }
</script>
