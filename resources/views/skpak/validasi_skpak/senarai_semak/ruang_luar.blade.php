<style>
    #ruang_luar thead th {
        vertical-align: middle;
        text-align: center;
    }

    #ruang_luar tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #ruang_luar table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$ruang_luars = [
    1 => 'Tiada peralatan berbahaya/ rosak yang boleh dicapai oleh kanak-kanak di bahagian luar TASKA (contohnya mesin pemotong rumput, alatan, traktor, trampolin, perabot/ peralatan/ permainan yang tidak boleh digunakan).',
    2 => 'Beranda, balkoni dan koridor yang mempunyai sisi yang terbuka mempunyai pagar atau grill.',
    3 => 'Terdapat dua pintu pagar di luar TASKA.',
    4 => 'Pintu pagar mempunyai selak yang tidak dapat dibuka oleh kanak-kanak.',
    5 => 'Tiada sampah-sarap dan air bertakung yang boleh menyebabkan pembiakan nyamuk aedes.',
    6 => 'Tiada lubang yang membahayakan kanak-kanak di atas permukaan tanah atau di mana-mana permukaan di luar kawasan (yang boleh menyebabkan kanak-kanak jatuh).',
    7 => 'Bahan beracun disimpan dalam bekas asal yang berlabel (jenis kandungan dan tarikh).',
    8 => 'Tempat tadahan air mempunyai penutup yang sesuai.',
    9 => 'Kolam mempunyai paras kedalaman yang sesuai dengan kanak-kanak.',
    10 => 'Alatan permainan luar selamat digunakan tiada iaitu unsur- unsur tajam atau rosak.',
    11 => 'Alatan berkebun disimpan ditempat yang sesuai dan sukar dicapai oleh kanak-kanak.',
    12 => 'Tiada tumbuhan-tumbuhan yang berbahaya/ beracun/ berduri.',
    13 => 'Tiada kehadiran haiwan / serangga yang membahayakan kanak-kanak.',
    14 => 'Semua longkang / lubang ditutup dengan tapak tetulang konkrit (slab).',
    15 => 'Longkang dan lubang tidak bertakung dengan air dan sampah.',
    16 => 'Rumput dipotong dan diselenggara.',
    17 => 'Pokok yang berada di persekitaran premis tidak berbahaya (tidak mempunyai duri, beracun, mempunyai serangga bahaya).',
    18 => 'Pondok permainan berada dalam keadaan selamat- skru tidak longgar, tidak berselumbar dan tidak berkarat.',
    19 => 'Peralatan mainan luar dibuat daripada bahan yang selamat untuk kanak-kanak (contoh buaian dibuat daripada plastik bukan kayu).'
];
@endphp

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="ruang_luar">
        <thead>
            <tr>
                <th>No.</th>
                <th>Item</th>
                <th style="width: 10%">Ya</th>
                <th style="width: 10%">Tidak</th>
                <th style="width: 10%">Tidak Berkenaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang_luars as $index => $ruang_luar)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $ruang_luar }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="ya_{{ $index }}_{{ $loop->index }}" value="YA">
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="tidak_{{ $index }}_{{ $loop->index }}" value="TIDAK">
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="tidak_berkenaan_{{ $index }}_{{ $loop->index }}" value="TIDAK BERKENAAN">
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Jumlah
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

            <tr class="bg-light-danger">
                <td colspan="2" class="text-end">
                    Skor Rubrik
                </td>
                <td colspan="3" class="text-center"></td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="col-md-12 mb-1 mt-1">
    <label class="fw-bolder">Ulasan</label>
    <textarea name="" id="" rows="3" class="form-control"></textarea>
</div>

<hr>
<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right formdd" onclick="submitform1()">Simpan</button>
</div>
