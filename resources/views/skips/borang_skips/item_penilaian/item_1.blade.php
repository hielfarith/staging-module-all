@php
$pendaftarans = [
    'kelulusan_penubuhan' => '1.1 Surat Kelulusan Penubuhan',
    'perakuan_pendaftaran' => '1.2 Perakuan Pendaftaran',
    'permit_pengelola' => '1.3 Permit Pengelola',
    'permit_pekerja' => '1.4 Permit Pekerja',
    'kelulusan_pengetua' => '1.5 Surat Kelulusan Pengetua ',
    'permit_guru' => '1.6 Permit Guru',
    'suratcara_pengelola' => '1.7 Suratcara Pengelola',
    'yuran_dan_bayaran_lain' => '1.8 Yuran dan Bayaran Lain',
    'surat_surat_sokongan_agensi' => '1.9 Surat-surat Sokongan Agensi',
];

$options = [
    'kelulusan_penubuhan' => [
        0 => '<td></td>',
        1 => '<td></td>',
        2 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Kelulusan Penubuhan</option><option value="ada">Ada</option></select></td>',
        3 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Kelulusan Penubuhan</option><option value="ada">Ada</option><option value="lengkap">Lengkap</option></select></td>',
        4 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Kelulusan Penubuhan</option><option value="ada">Ada</option><option value="lengkap">Lengkap</option><option value="difailkan">Difailkan</option></select></td>',
        5 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Kelulusan Penubuhan</option><option value="ada">Ada</option><option value="lengkap">Lengkap</option><option value="difailkan">Difailkan</option><option value="kebolehcapaian">Kebolehcapaian</option></select></td>',
    ],
    'perakuan_pendaftaran' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Perakuan Pendaftaran</option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Perakuan Pendaftaran</option><option value="ada">Ada</option><option value="lengkap">Lengkap</option></select></td>',
        3 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Perakuan Pendaftaran</option><option value="ada">Ada</option><option value="lengkap">Lengkap</option><option value="dipamerkan">Dipamerkan</option></select></td>',
        4 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Perakuan Pendaftaran</option><option value="ada">Ada</option><option value="lengkap">Lengkap</option><option value="dipamerkan">Dipamerkan</option><option value="strategik">Strategik</option></select></td>',
        5 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Perakuan Pendaftaran</option><option value="ada">Ada</option><option value="lengkap">Lengkap</option><option value="dipamerkan">Dipamerkan</option><option value="strategik">Strategik</option><option value="kemas">Kemas</option></select></td>',
    ],
    'permit_pengelola' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2" name="" id=""><option value="">Permit Pengelola</option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2" name="" id=""><option value="">Permit Pengelola</option><option value="ada">Ada</option><option value="terkini">Terkini</option></select></td>',
        3 => '<td><select class="form-select select2" name="" id=""><option value="">Permit Pengelola</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option></select></td>',
        4 => '<td><select class="form-select select2" name="" id=""><option value="">Permit Pengelola</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option><option value="difailkan">Difailkan</option></select></td>',
        5 => '<td><select class="form-select select2" name="" id=""><option value="">Permit Pengelola</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option><option value="difailkan">Difailkan</option><option value="kebolehcapaian">Kebolehcapaian</option></select></td>',
    ],
    'permit_pekerja' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Permit Pekerja</option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Permit Pekerja</option><option value="ada">Ada</option><option value="terkini">Terkini</option></select></td>',
        3 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Permit Pekerja</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option></select></td>',
        4 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Permit Pekerja</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option><option value="difailkan">Difailkan</option></select></td>',
        5 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Permit Pekerja</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option><option value="difailkan">Difailkan</option><option value="kebolehcapaian">Kebolehcapaian</option></select></td>',
    ],
    'kelulusan_pengetua' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Kelulusan Pengetua</option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Kelulusan Pengetua</option><option value="ada">Ada</option><option value="terkini">Terkini</option></select></td>',
        3 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Kelulusan Pengetua</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="difailkan">Difailkan</option></select></td>',
        4 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Kelulusan Pengetua</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="difailkan">Difailkan</option><option value="kebolehcapaian">Kebolehcapaian</option></select></td>',
        5 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Kelulusan Pengetua</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="difailkan">Difailkan</option><option value="kebolehcapaian">Kebolehcapaian</option><option value="dipamerkan">Dipamerkan</option></select></td>',
    ],
    'permit_guru' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Permit Guru</option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Permit Guru</option><option value="ada">Ada</option><option value="terkini">Terkini</option></select></td>',
        3 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Permit Guru</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option></select></td>',
        4 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Permit Guru</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option><option value="difailkan">Difailkan</option></select></td>',
        5 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Permit Guru</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option><option value="difailkan">Difailkan</option><option value="kebolehcapaian">Kebolehcapaian</option></select></td>',
    ],
    'suratcara_pengelola' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Suratcara Pengelola</option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Suratcara Pengelola</option><option value="ada">Ada</option><option value="terkini">Terkini</option></select></td>',
        3 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Suratcara Pengelola</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option></select></td>',
        4 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Suratcara Pengelola</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option><option value="difailkan">Difailkan</option></select></td>',
        5 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Suratcara Pengelola</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="mecukupi">Mecukupi</option><option value="difailkan">Difailkan</option><option value="kebolehcapaian">Kebolehcapaian</option></select></td>',
    ],
    'yuran_dan_bayaran_lain' => [
        0 => '<td></td>',
        1 => '<td></td>',
        2 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Yuran & Bayaran Lain</option><option value="ada">Ada</option></select></td>',
        3 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Yuran & Bayaran Lain</option><option value="ada">Ada</option><option value="lengkap">Lengkap</option></select></td>',
        4 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Yuran & Bayaran Lain</option><option value="ada">Ada</option><option value="lengkap">Lengkap</option><option value="difailkan">Difailkan</option></select></td>',
        5 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Yuran & Bayaran Lain</option><option value="ada">Ada</option><option value="lengkap">Lengkap</option><option value="difailkan">Difailkan</option><option value="kebolehcapaian">Kebolehcapaian</option></select></td>',
    ],
    'surat_surat_sokongan_agensi' => [
        0 => '<td></td>',
        1 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Surat Sokongan</option><option value="ada">Ada</option></select></td>',
        2 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Surat Sokongan</option><option value="ada">Ada</option><option value="terkini">Terkini</option></select></td>',
        3 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Surat Sokongan</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="difailkan">Difailkan</option></select></td>',
        4 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Surat Sokongan</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="difailkan">Difailkan</option><option value="kebolehcapaian">Kebolehcapaian</option></select></td>',
        5 => '<td><select class="form-select select2" name="" id=""><option value="" hidden>Surat Sokongan</option><option value="ada">Ada</option><option value="terkini">Terkini</option><option value="difailkan">Difailkan</option><option value="kebolehcapaian">Kebolehcapaian</option><option value="dipamerkan">Dipamerkan</option></select></td>',
    ],
];
@endphp

<style>
    #NilaiItem1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem1 tbody {
        vertical-align: middle;
    }

    #NilaiItem1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem1">
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
                <td colspan="8">PENUBUHAN DAN PENDAFTARAN</td>
            </tr>
            @foreach ($pendaftarans as $index => $pendaftaran)
                <tr>
                    <td colspan="2"> {{ $pendaftaran }}</td>
                    @foreach ($options[$index] as $option)
                        {!! $option !!}
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
