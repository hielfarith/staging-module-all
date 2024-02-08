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

<?php
    $show = false;
    if ($skpak) {
        if (!empty($skpak->penilaian1) && !empty($skpak->penilaian2) && !empty($skpak->penilaian3) && !empty($skpak->penilaian4) && !empty($skpak->penilaian5) && !empty($skpak->penilaian6)) {
            $show = true;
        }
    } else {
        $
        $penilaian1 = null;
    }
?>

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
<input type="hidden" name="skpak_id" id="skpak_id" value="{{$skpak?->id}}">
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
            @foreach ($penilaians as $key => $penilaian)
            <tr>
                <td>{{ $penilaian }}</td>
                <td class="text-center">{{ isset($array['penilaian'.$key+1]) ? $array['penilaian'.$key+1]['YA'] : '-'}}</td>
                <td class="text-center">{{ isset($array['penilaian'.$key+1]) ? $array['penilaian'.$key+1]['TIDAK'] : '-'}}</td>
            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr class="bg-light-danger">
                <td class="text-end">
                    Jumlah
                </td>
                <td class="text-center">{{ $totalya }}</td>
                <td class="text-center">{{ $totaltidak }}</td>
            </tr>
        </tfoot>
    </table>
</div>
@if($show)
<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="hantar()">Simpan</button>
</div>
@endif

<script type="text/javascript">
    function hantar() {
        var id = $('#skpak_id').val();
        var url = "{{ route('skpak.submit-spkak') }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id:id
            },
            success: function(response) {
                Swal.fire('Success', 'Berjaya', 'success');
                var location = "{{route('home')}}";
                window.location.href = location;
            }
        });
    }
</script>