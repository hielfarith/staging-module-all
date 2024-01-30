<form id="pengurusan_penilaianv">
<?php
    $butiran_institusi_id = Request::segment(3);
   $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $pengurusan_penilaian = json_decode($tab1->pengurusan_penilaian);
    } else {
        $pengurusan_penilaian = null;
    }

    if ($type == 'verfikasi' ) {
        if (!empty($tab1->pengurusan_penilaian_verfikasi)) {
            $pengurusan_penilaian = json_decode($tab1->pengurusan_penilaian_verfikasi);
        } else {
            $pengurusan_penilaian = null;
        }
    }
?>
@php
$butiran_institusi_id = Request::segment(3);

$peperiksaans = [
    'pelaksanaan_penilaian_peperiksaan' => '5.1 Pelaksanaan Penilaian / Peperiksaan',
    'rekod_penilaian_peperiksaan' => '5.2 Rekod Penilaian / Peperiksaan',
    'akreditasi_sijil_oleh_badan_antarabangsa' => '5.3 Akreditasi Sijil oleh Badan Antarabangsa',
];

$option_peperiksaans = [
    'pelaksanaan_penilaian_peperiksaan' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Urus Setia</i>',
        3 => '<i>Ada, Urus Setia, Jadual</i>',
        4 => '<i>Ada, Urus Setia, Jadual, Peraturan Peperiksaan</i>',
        5 => '<i>Ada, Urus Setia, Jadual, Peraturan Peperiksaan, Dokumentasi</i>',
    ],

    'rekod_penilaian_peperiksaan' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Difailkan</i>',
        3 => '<i>Ada, Difailkan, Kemaskini</i>',
        4 => '<i>Ada, Difailkan, Kemaskini, Dimaklumkan</i>',
        5 => '<i>Ada, Difailkan, Kemaskini, Dimaklumkan, Dipamerkan</i>',
    ],

    'akreditasi_sijil_oleh_badan_antarabangsa' => [
        0 => '',
        1 => '<i>Ada</i>',
        2 => '<i>Ada, Surat Perjanjian</i>',
        3 => '<i>Ada, Surat Perjanjian, Surat Kebenaran</i>',
        4 => '<i>Ada, Surat Perjanjian, Surat Kebenaran, Terkini</i>',
        5 => '<i>Ada, Surat Perjanjian, Surat Kebenaran, Terkini, Difailkan</i>',
    ],

];

@endphp


<style>
    #NilaiItem5 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem5 tbody {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem5 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>
                <input type="hidden" name="usertype" value="{{$type}}">
<input type="hidden" name="butiran_institusi_id" id="butiran_institusi_id" value="{{$butiran_institusi_id}}">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem5">
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
                    <td colspan="8" class="bg-light-primary fw-bolder">Pengurusan Penilaian/ Peperiksaan</td>
                </tr>
                @foreach ($peperiksaans as $index => $peperiksaan)
                <?php
                    $keyval = '';
                    $keyval = $index.'_verfikasi';
                ?>
                    <tr>
                        <td colspan="2"> {{ $peperiksaan }}</td>
                        @foreach ($option_peperiksaans[$index] as $key => $option_peperiksaan)
                            <td>
                                <div class="form-check form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="{{ $index }}_verfikasi" id="{{$index}}" value="{{$key}}" required @if($pengurusan_penilaian && $pengurusan_penilaian->$keyval == $key) checked @endif>
                                </div>
                                <br>

                                {!! $option_peperiksaan !!}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

      <hr>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right" onclick="submitform5v()">Simpan</button>
    </div>

</form>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
   function submitform5v() {
        var formData = new FormData(document.getElementById('pengurusan_penilaianv'));
        var error = false;

        $('form#pengurusan_penilaianv').find('radio, input').each(function() {
            var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skips.instrumen-submit', ['tab' => 'pengurusan_penilaian']) }}"
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
