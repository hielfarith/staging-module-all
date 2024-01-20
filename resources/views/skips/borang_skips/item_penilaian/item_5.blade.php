@php

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

<form action="">
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
                    <td colspan="8">Pengurusan Penilaian/ Peperiksaan</td>
                </tr>
                @foreach ($peperiksaans as $index => $peperiksaan)
                    <tr>
                        <td colspan="2"> {{ $peperiksaan }}</td>
                        @foreach ($option_peperiksaans[$index] as $option_peperiksaan)
                            <td>
                                <div class="form-check form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="{{ $peperiksaan }}" id="" value="">
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
        <button type="submit" class="btn btn-primary float-right">Simpan</button>
    </div>
</form>
