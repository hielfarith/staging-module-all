@php

$pembangunan_gurus = [
    'program_pembangunan_guru' => '6.1 Program Pembangunan Guru',
    'kelayakan_akademik_guru' => '6.2 Kelayakan Akademik Guru',
    'kelayakan_ikhtisas_guru' => '6.3 Kelayakan Ikhtisas Guru',
];

$option_pembangunan_gurus = [
    'program_pembangunan_guru' => [
        0 => '<i></i>',
        1 => '<i>Ada Perancangan</i>',
        2 => '<i>Ada Perancangan, Program Secara Dalaman</i>',
        3 => '<i>Ada Perancangan, Program Secara Dalaman, Program dengan Pihak Luar</i>',
        4 => '<i>Ada Perancangan, Program Secara Dalaman, Program dengan Pihak Luar, Lebih 50% Penyertaan Guru</i>',
        5 => '<i>Ada Perancangan, Program Secara Dalaman, Program dengan Pihak Luar, Lebih 50% Penyertaan Guru, Kajian Keperluan Latihan</i>',
    ],
    'kelayakan_akademik_guru' => [
        0 => '<i></i>',
        1 => '<i>Sekurang-kurangnya 20%</i>',
        2 => '<i>Sekurang-kurangnya 40%</i>',
        3 => '<i>Sekurang-kurangnya 60%</i>',
        4 => '<i>Sekurang-kurangnya 80%</i>',
        5 => '<i>100% Guru Mempunyai Kelayakan Ijazah dan Ke Atas</i>',
    ],
    'kelayakan_ikhtisas_guru' => [
        0 => '<i></i>',
        1 => '<i>Sekurang-kurangnya 20%</i>',
        2 => '<i>Sekurang-kurangnya 40%</i>',
        3 => '<i>Sekurang-kurangnya 60%</i>',
        4 => '<i>Sekurang-kurangnya 80%</i>',
        5 => '<i>100% Guru Mempunyai Kelayakan Ikhtisas</i>',
    ],
];

@endphp


<style>
    #NilaiItem6 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem6 tbody {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem6 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<form action="">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem6">
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
                    <td colspan="8">Pengurusan & Pembangunan Guru</td>
                </tr>
                @foreach ($pembangunan_gurus as $index => $pembangunan_guru)
                    <tr>
                        <td colspan="2"> {{ $pembangunan_guru }}</td>
                        @foreach ($option_pembangunan_gurus[$index] as $option_pembangunan_guru)
                            <td>
                                <div class="form-check form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="{{ $pembangunan_guru }}" id="" value="">
                                </div>
                                <br>

                                {!! $option_pembangunan_guru !!}
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
