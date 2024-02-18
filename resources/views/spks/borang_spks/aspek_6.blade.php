<style>
    #spks_aspek6 thead th {
        vertical-align: middle;
        text-align: center;
        position: sticky;
    }

    #spks_aspek6 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #spks_aspek6 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$aspeks_6 = [
    [
        'section' => 'Pengurusan Perkhidmatan Pengawal Keselamtan Sekolah',
        'subSections' => [
            'Syif atau giliran pengawal keselamatan dilaksanakan mengikut perjanjian.',
            'Peralatan atau kelengkapan perkhidmatan disediakan dalam keadaan lengkap dan baik.',
            'Lantikan pengawal keselamatan telah melalui tapisan keselamatan.',
            'Pengawal Keselamatan mempunyai kelayakan umur diluluskan.',
            'Pengawal keselamatan mempunyai pakaian seragam khas.',
            'Bilangan pengawal keselamatan bertugas telah mematuhi perjanjian',
            'Laporan pelaksanaan Kunci Jam dilaksana dengan baik.',
            'Buku kehadiran bertugas dicatat dan disemak dengan jelas di dalam buku pelaporan.',
            'Sebarang perubahan pengawal keselamatan dinyatakan dengan jelas dalam buku laporan.',
            'Ada membuat pemantauan berkala di kawasan sekolah serta direkodkan.',
            'Pengurusan sekolah membuat teguran secara bertulis.',
            'Pengurusan sekolah membuat semakan laporan bertugas sebelum membuat pembayaran kepada pengurusan keselamatan.',
            'Pengurusan sekolah sedar sebarang perubahan personel pengawal keselamatan.',
            'Sekolah mempunyai sistem keluar masuk pelawat yang berkesan.',
            'Setiap pintu keluar masuk mempunyai pengawal keselamatan.',
            'Pintu keluar masuk sekolah sentiasa dalam keadaan bertutup dan terkawal.',
        ]
    ],
];

$number = 1;

@endphp

<h5 class="card-title fw-bolder text-uppercase">
    Pengurusan Perkhidmatan Pengawal Keselamatan Sekolah
</h5>

<hr>
<?php
    if ($spks) {
        $aspek6 = json_decode($spks->aspek6, true);
        
    } else {
        $aspek6 = null;
    }
?>
<form id="aspek6">
<input type="hidden" name="spks_id" value="{{$spks?->id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="spks_aspek6">
        <thead>
            <tr>
                <th rowspan="2">No.</th>
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
            @foreach ($aspeks_6 as $index => $aspek_6)
                <tr>
                    <td colspan="5" class="bg-light-primary text-uppercase">
                        {{ $aspek_6['section'] }}
                    </td>
                </tr>
                @foreach ($aspek_6['subSections'] as $subsection_aspek6)
                    <?php
                        $name = $index.'_'.$loop->index;
                    ?>
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $subsection_aspek6 }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input required class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="0_{{ $index }}_{{ $loop->index }}" value="0" {{$disabled}}>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input required class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="1_{{ $index }}_{{ $loop->index }}" value="1" {{$disabled}}>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input required class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="2_{{ $index }}_{{ $loop->index }}" value="2" {{$disabled}}>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="5" class="bg-light-success">
                            <input required type="text" name="catatan_{{$index}}" class="form-control" placeholder="Catatan" {{$disabled}}>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Skor
                </td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
            <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Jumlah Skor
                </td>
               <td colspan="3" class="text-center"></td>
            </tr>
        </tfoot>
    </table>
</div>

<hr>

@if($disabled != 'disabled')
<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" 
    onclick="formsubmit('aspek6')">
        Simpan
    </button>
</div>
@endif
</form>
