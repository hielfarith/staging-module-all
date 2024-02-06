<style>
    #ruang_dalam thead th {
        vertical-align: middle;
        text-align: center;
    }

    #ruang_dalam tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #ruang_dalam table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$ruang_dalams = [
    1 => 'Alat pemadam api mencukupi untuk saiz bangunan TASKA dan diletakkan di tempat yang mudah dicapai.',
    2 => 'Alat pemadam api diperiksa setiap tahun. (Semak tarikh pada tag pemadam api)',
    3 => 'Penggunaan gas untuk memasak tidak digunakan di dalam bangunan TASKA.',
    4 => 'Terdapat dua pintu keluar bebas halangan di dalam kawasan TASKA.',
    5 => 'Semua tempat keluar kecemasan hendaklah diadakan tanda "KELUAR" dan hendaklah berlampu.',
    6 => 'Setiap bangunan bertingkat mempunyai sekurang-kurangnya dua jalan keluar tanpa halangan menuju ke tingkat bawah.',
    7 => 'Alat pengesan asap atau penggera dipasang pada bilik/ ruang dan berfungsi dengan baik.',
    8 => 'TASKA mempunyai kamera litar tertutup (CCTV) yang berfungsi.',
    9 => 'Saluran elektrik dipasang jauh dari laluan kanak-kanak dan mempunyai penutup keselamatan yang ditutup menggunakan skru atau cara yang tidak boleh dibuka oleh kanak-kanak.',
    10 => 'Plastik, mancis, lilin, pemetik api disimpan di tempat yang selamat.',
    11 => 'Peti pertolongan cemas disediakan di ruang/ bilik kanak-kanak.',
    12 => 'Peti pertolongan cemas disimpan dalam bekas tertutup, kabinet atau laci yang berlabel.',
    13 => 'Peti pertolongan cemas disimpan di tempat yang selamat dan mudah diambil oleh kakitangan/ pendidik.',
    14 => 'Ubat-ubatan di dalam peti pertolongan cemas diatur dengan baik, suhu yang sesuai dan tidak melepasi tarikh luput.',
    15 => 'Tiada ubat-ubatan yang dibekalkan oleh ibu bapa kepada kanak-kanak di TASKA.',
    16 => 'Sistem pengudaraan TASKA segar serta bebas dari asap dan bau busuk seperti najis, bahan kimia, racun perosak dan sebagainya.',
    17 => 'Tingkap mempunyai pelindung tingkap / grill bagi melindungi kanak-kanak daripada memanjat keluar (gerigi yang boleh dibuka).',
    18 => 'Grill ditutup pada setiap masa.',
    19 => 'Setiap pintu di TASKA diletakkan kunci berhampiran pintu supaya mudah dicapai semasa kecemasan serta dilabelkan.',
    20 => 'Nombor telefon kecemasan seperti bomba, polis, hospital dipaparkan dan boleh dilihat semasa kecemasan (di sebelah ataupun berhampiran dengan telefon)',
    21 => 'Peralatan dan perabot berada di dalam keadaan kukuh, bersih dan berfungsi dengan baik.',
    22 => 'Peralatan dan perabot tidak mempunyai bucu tajam, serpihan, kaca, tonjolan yang boleh menangkap pakaian kanak-kanak (contohnya, paku, paip, hujung kayu, bolt panjang).',
    23 => 'Peralatan tidak mempunyai cat mengelupas, longgar atau bahagian berkarat, bahagian kecil yang mungkin tertanggal atau menimbulkan bahaya kepada kanak-kanak.',
    24 => 'Katil/ kot tidur kanak-kanak diletakkan di tempat yang sesuai dan tidak mudah tumbang ke arah kanak-kanak.',
    25 => 'Bekas penyimpanan air, baldi, tab mandi, kolam dikosongkan selepas digunakan.',
    26 => 'Tiada keretakkan atau lubang/ bocor pada dinding, siling atau lantai.',
    27 => 'Permukaan lantai sentiasa bersih dan berada dalam keadaan kering serta tidak licin (diletakkan tanda jika licin).',
    28 => 'Terdapat kerja-kerja pembersihan dan pembasmian kuman dilakukan selepas kanak-kanak selesai menggunakan ruang (semua ruang di dalam TASKA).',
    29 => 'Tali dan reben yang panjang diletakkan pada tempat yang selamat agar tidak mudah dicapai oleh kanak-kanak.',
    30 => 'Pengadang dipasang di bahagian atas dan bawah setiap tangga terbuka bagi memastikan keselamatan bayi dan kanak-kanak (memanjat atau bermain di atas tangga).',
    31 => 'Kedudukan kipas kaki/kipas meja diletakkan di tempat yang sukar dicapai oleh kanak-kanak.',
    32 => 'Peralatan atau permainan yang saiznya terlalu kecil disimpan di tempat yang selamat dan tidak dapat dicapai oleh kanak-kanak tanpa pengawasan pendidik (guli, pin keselamatan, glitter, dsb)',
    33 => 'Kawasan penyediaan makanan diasingkan daripada kawasan penjagaan kanak-kanak dengan pintu/ pintu pagar/ kaunter/ pembahagi bilik.',
    34 => 'Kerja-kerja pembersihan dan pembasmian kuman tidak dilakukan apabila kanak-kanak berada berdekatan.',
    35 => 'TASKA memaparkan langkah-langkah keselamatan bagi kanak-kanak semasa cedera ringan dan berat.',
    36 => 'TASKA memaparkan langkah-langkah keselamatan bagi kebakaran/ kecemasan seperti gegaran dan banjir kilat di TASKA.',
    37 => 'Terdapat penanda lekatan kuning pada permukaan lantai yang mempunyai ketinggian berbeza.',
    38 => 'Tangga mempunyai pagar dan pemegang yang bersesuaian dengan saiz kanak-kanak.',
    39 => 'Tiada bumbung/ siling yang hampir runtuh atau roboh.',
];
@endphp

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="ruang_dalam">
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
            @foreach ($ruang_dalams as $index => $ruang_dalam)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $ruang_dalam }}</td>

                    @if($index <= 5)
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
                        <td class="bg-dark"></td>
                    @else
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
                    @endif

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
