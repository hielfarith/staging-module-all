<style>
    #jumlahKeseluruhanItem thead th {
        vertical-align: middle;
        text-align: center;
    }

    #jumlahKeseluruhanItem tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #jumlahKeseluruhanItem table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

<h5 class="card-title fw-bolder">
    JUMLAH KESELURUHAN STANDARD PENILAIAN
</h5>

<hr>

@php
$penilaians = [
'Etika Dan Profesionalisme',
'Keselamatan, Kesihatan Dan Kebersihan Persekitaran Fizikal Serta Kualiti Pemakanan Bayi Dan Kanak-Kanak',
'Pengurusan Aspek Asuhan Bayi Dan Kanak-Kanak',
'Pengalaman Pembelajaran, Interaksi Dan Penaksiran',
'Persekitaran Fizikal Dan Sumber Pembelajaran',
'Pengurusan Taska, Sumber Manusia Dan Kolaborasi Dengan Ibu Bapa Dan Komuniti',
];
@endphp

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="jumlahKeseluruhanItem">
        <thead>
            <tr>
                <th>Nama Penilaian</th>
                <th>Ya</th>
                <th>Tidak</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($penilaians as $penilaian)
            <tr>
                <td>{{ $penilaian }}</td>
                <td class="text-center">auto-calculated</td>
                <td class="text-center">auto-calculated</td>
            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr class="bg-light-danger">
                <td class="text-end">
                    Jumlah
                </td>
                <td class="text-center">auto-calculated</td>
                <td class="text-center">auto-calculated</td>
            </tr>
        </tfoot>
    </table>
</div>
