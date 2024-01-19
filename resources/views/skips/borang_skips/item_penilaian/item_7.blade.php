@php

$displins = [
    'peraturan_disiplin' => '7.1 Peraturan Disiplin',
    'rekod_disiplin' => '7.2 Rekod Disiplin',
    'pengurusan_tindakan_disiplin' => '7.3 Pengurusan Tindakan Disiplin',
];

$option_displins = [
    'peraturan_disiplin' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada_peraturan">Ada Peraturan</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada_buku_peraturan">Ada Buku Peraturan</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="disebarkan">Disebarkan</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="peraturan_menyeluruh">Peraturan Menyeluruh</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="akujanji_pelajar">Akujanji Pelajar</option></select></td>',
    ],

    'rekod_disiplin' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="ada_rekod_disiplin">Ada Rekod Disiplin</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="didokumentasi">Didokumentasi</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="sistematik">Sistematik</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="analisis">Analisis</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="terkini">Terkini</option></select></td>',
    ],

    'pengurusan_tindakan_disiplin' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2"><option value="" hidden></option><option value="satu_tindakan">Membuat satu (1) tindakan disiplin</option></select></td>',
        2 => '<td><select class="form-select select2"><option value="" hidden></option><option value="dua_tindakan">Membuat dua (2) tindakan disiplin</option></select></td>',
        3 => '<td><select class="form-select select2"><option value="" hidden></option><option value="tiga_tindakan">Membuat tiga (3) tindakan disiplin</option></select></td>',
        4 => '<td><select class="form-select select2"><option value="" hidden></option><option value="empat_tindakan">Membuat empat (4) tindakan disiplin</option></select></td>',
        5 => '<td><select class="form-select select2"><option value="" hidden></option><option value="kesemua_tindakan">Membuat kesemua tindakan disiplin</option></select></td>',
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
    }

    #NilaiItem7 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

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
                <td colspan="8">Pengurusan Pengajaran & Pembelajaran</td>
            </tr>
            @foreach ($displins as $index => $displin)
                <tr>
                    <td colspan="2"> {{ $displin }}</td>
                    @foreach ($option_displins[$index] as $option_displin)
                        {!! $option_displin !!}
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
