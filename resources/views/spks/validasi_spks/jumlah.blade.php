<style>
    #jumlahKeseluruhanSpks thead th {
        vertical-align: middle;
        text-align: center;
    }

    #jumlahKeseluruhanSpks tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #jumlahKeseluruhanSpks table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

<h5 class="card-title fw-bolder">
    JUMLAH KESELURUHAN STANDARD PENILAIAN
</h5>

<hr>

@php
$jumlahs_spks = [
    'Aspek 1: Pengurusan Aktiviti Murid',
    'Aspek 2: Pengurusan Keselamatan Infrastruktur Sekolah',
    'Aspek 3: Pengurusan Sosial',
    'Aspek 4: Pengurusan Krisis/ Bencana',
    'Aspek 5: Pengurusan Risiko',
    'Aspek 6: Pengurusan Perkhidmatan Pengawal Keselamatan Sekolah',
];
@endphp

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="jumlahKeseluruhanSpks">
        <thead>
            <tr>
                <th>Nama Aspek Penilaian</th>
                <th width="3%">0</th>
                <th width="3%">1</th>
                <th width="3%">2</th>
                <th width="3%">TB</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($jumlahs_spks as $key => $jumlah_spks)
            <tr>
                <td>{{ $jumlah_spks }}</td>
                <td class="text-center">Auto Calculated</td>
                <td class="text-center">Auto Calculated</td>
                <td class="text-center">Auto Calculated</td>
                <td class="text-center">Auto Calculated</td>
            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr class="bg-light-danger">
                <td class="text-end">
                    Jumlah Keseluruhan
                </td>
                <td class="text-center">Auto Calculated</td>
                <td class="text-center">Auto Calculated</td>
                <td class="text-center">Auto Calculated</td>
                <td class="text-center">Auto Calculated</td>
            </tr>
        </tfoot>
    </table>
</div>

<hr>

<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="">
        Simpan
    </button>
</div>
