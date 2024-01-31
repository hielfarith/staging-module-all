<form id="piawaianv">
<?php
    $butiran_institusi_id = $butiran_id;;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $piawaianData = json_decode($tab1->piawaian);
    } else {
        $piawaianData = null;
    }

    if ($type == 'verfikasi' ) {
        if (!empty($tab1->piawaian_verfikasi)) {
            $piawaianData = json_decode($tab1->piawaian_verfikasi);
        } else {
            $piawaianData = null;
        }
    }
    ?>
@php
$butiran_institusi_id = $butiran_id;;

$piawaians = [
    'pelan_lantai_premis' => '8.1 Pelan Lantai Premis',
    'kemudahan_dan_kelengkapan_bilik_darjah' => '8.2 Kemudahan dan Kelengkapan Bilik Darjah',
    'kemudahan_dan_keperluan_pelbagai' => '8.3 Kemudahan dan Keperluan Pelbagai',
    'papan_notis' => '8.4 Papan Notis',
    'pengurusan_keselamatan' => '8.5 Pengurusan Keselamatan',
    'penyelenggaraan_tandas' => '8.6 Penyelenggaraan Tandas',
];

$option_piawaians = [
    'pelan_lantai_premis' => [
        0 => '<i></i>',
        1 => '<i>Ada</i>',
        2 => '<i>Mematuhi kelulusan</i>',
        3 => '<i>Terkini</i>',
        4 => '<i>Kebolehcapaian</i>',
        5 => '<i>Dipamerkan</i>',
    ],

    'kemudahan_dan_kelengkapan_bilik_darjah' => [
        0 => '<i></i>',
        1 => '<i>Mempunyai mana-mana satu (3) daripada kemudahan dan kelengkapan</i>',
        2 => '<i>Mempunyai mana-mana dua (4) daripada kemudahan dan kelengkapan</i>',
        3 => '<i>Mempunyai mana-mana tiga (5) daripada kemudahan dan kelengkapan</i>',
        4 => '<i>Mempunyai mana-mana empat (6) daripada kemudahan dan kelengkapan</i>',
        5 => '<i>Mempunyai mana-mana lima (7) daripada kemudahan dan kelengkapan</i>',
    ],

    'kemudahan_dan_keperluan_pelbagai' => [
        0 => '<i></i>',
        1 => '<i>Mempunyai sekurang-kurangnya empat (4) kemudahan tambahan</i>',
        2 => '<i>Mempunyai sekurang-kurangnya lima (5) kemudahan tambahan</i>',
        3 => '<i>Mempunyai sekurang-kurangnya enam (6) kemudahan tambahan</i>',
        4 => '<i>Mempunyai sekurang-kurangnya tujuh (7) kemudahan tambahan</i>',
        5 => '<i>Mempunyai sekurang-kurangnya lapan (8) kemudahan tambahan</i>',
    ],

    'papan_notis' => [
        0 => '<i></i>',
        1 => '<i>Ada</i>',
        2 => '<i>Strategik</i>',
        3 => '<i>Nombor pendaftaran KPM</i>',
        4 => '<i>Memenuhi syarat PBT</i>',
        5 => '<i>Kemas / Kreatif</i>',
    ],

    'pengurusan_keselamatan' => [
        0 => '<i></i>',
        1 => '<i>Mempunyai sekurang-kurangnya empat (4) kemudahan tambahan</i>',
        2 => '<i>Mempunyai sekurang-kurangnya lima (5) kemudahan tambahan</i>',
        3 => '<i>Mempunyai sekurang-kurangnya enam (6) kemudahan tambahan</i>',
        4 => '<i>Mempunyai sekurang-kurangnya tujuh (7) kemudahan tambahan</i>',
        5 => '<i>Mempunyai sekurang-kurangnya lapan (8) kemudahan tambahan</i>',
    ],

    'penyelenggaraan_tandas' => [
        0 => '<i></i>',
        1 => '<i>Mempunyai sekurang-kurangnya empat (4) kemudahan tambahan</i>',
        2 => '<i>Mempunyai sekurang-kurangnya lima (5) kemudahan tambahan</i>',
        3 => '<i>Mempunyai sekurang-kurangnya enam (6) kemudahan tambahan</i>',
        4 => '<i>Mempunyai sekurang-kurangnya tujuh (7) kemudahan tambahan</i>',
        5 => '<i>Mempunyai sekurang-kurangnya lapan (8) kemudahan tambahan</i>',
    ],
];

@endphp

<style>
    #NilaiItem8 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem8 tbody {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem8 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>
<input type="hidden" name="usertype" value="{{$type}}">
<input type="hidden" name="butiran_institusi_id" id="butiran_institusi_id" value="{{$butiran_institusi_id}}">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem8">
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
                    <td colspan="8" class="bg-light-primary fw-bolder">Piawaian</td>
                </tr>
                @foreach ($piawaians as $index => $piawaian)
                <?php
                    $keyval = '';
                    $keyval = $index.'_verfikasi';
                ?>
                    <tr>
                        <td colspan="2"> {{ $piawaian }}</td>
                        @foreach ($option_piawaians[$index] as $key => $option_piawaian)
                            <td>
                                <div class="form-check form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="{{ $index }}_verfikasi" id="" value="{{$key}}" required @if($piawaianData && $piawaianData->$keyval == $key) checked @endif>
                                </div>
                                <br>
                                {!! $option_piawaian !!}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

       <hr>
     <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right" onclick="submitform8v()">Simpan</button>
    </div>
</form>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   function submitform8v() {
        var formData = new FormData(document.getElementById('piawaianv'));
        var error = false;

        $('form#piawaianv').find('radio, input').each(function() {
            var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skips.instrumen-submit', ['tab' => 'piawaian']) }}"
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
