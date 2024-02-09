<style>
    #spks_aspek3 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #spks_aspek3 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #spks_aspek3 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$aspeks_3 = [
[
'section' => 'PENGURUSAN SOSIAL',
'subSections' => [
'Warga sekolah memahami dan mengetahui tindakan yang perlu di ambil apabila berlaku kes-kes salah laku.',
'Ada Peti Aduan di sekolah.',
'Rekod salah laku murid dan Laporan kes untuk rujukan.',
'Program-program pencegahan untuk murid.',
'Program-program invertensi dan pemulihan untuk murid.',
'Sistem Salah Laku Disiplin Murid (SSDM).',
'Pematuhan Buku Panduan dan Surat Pekeliling Ikhtisas, Kementerian Pendidikan Malaysia.',
]
],
];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    Pengurusan Sosial
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek3">
        <thead>
            <tr>
                <th rowspan="2">Item</th>
                <th colspan="3">Skor Sekolah</th>
            </tr>

            <tr>
                <th>0</th>
                <th>1</th>
                <th>2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aspeks_3 as $index => $aspek_3)
            <tr>
                <td colspan="4" class="bg-light-primary text-uppercase">
                    {{ $aspek_3['section'] }}
                </td>
            </tr>
            @foreach ($aspek_3['subSections'] as $subsection_aspek3)
            <?php
                        $name = $index.'_'.$loop->index;
                    ?>
            <tr>
                <td>{{ $subsection_aspek3 }}</td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="0_{{ $index }}_{{ $loop->index }}" value="0">
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="1_{{ $index }}_{{ $loop->index }}" value="1">
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-center align-items-center">
                        <input class="form-check-input radio-input-2" type="radio"
                            name="{{ $index }}_{{ $loop->index }}" id="2_{{ $index }}_{{ $loop->index }}" value="2">
                    </div>
                </td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-danger">
                <td class="text-end">
                    Skor
                </td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
            <tr class="bg-light-danger">
                <td class="text-end">
                    Jumlah Skor
                </td>
                <td colspan="3" class="text-center"></td>
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
