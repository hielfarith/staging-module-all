<?php

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

?>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="">
        <thead>
            <tr>
                <th width="5%">1.0.</th>
                <th> PENUBUHAN & PENDAFTARAN </th>
                <th width="10%">SKOR</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td rowspan="10">
                    <i>
                        Seksyen 79
                    </i>
                </td>
            </tr>
            @foreach ($pendaftarans as $pendaftaran)
                <tr>
                    <td>
                        {{ $pendaftaran }}
                    </td>
                    <td>
                        <a class="text-success">Auto Calculated</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="2" style="text-align: end;" class="fw-bolder text-uppercase bg-light-primary">Total Skor</td>
                <td>
                    <a class="text-success">Auto Calculated</a>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: end" class="fw-bolder text-uppercase bg-light-primary">%</td>
                <td>
                    <a class="text-success">Auto Calculated</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
