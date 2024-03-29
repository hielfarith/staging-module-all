@php
    $pendaftarans = [
        'pelan_premis' => '9.1 Pelan Premis',
        'pengurusan_fizikal_institusi' => '9.2 Pengurusan Fizikal Institusi (Rekod Penyenggaraan) <br> <br>
                                    <ul>
                                        <li>Bangunan</li>
                                        <li>Perabot</li>
                                        <li>Peralatan</li>
                                        <li>Pendawaian</li>
                                        <li>Persekitaran</li>
                                    </ul>',
        'kemudahan_bilik' => '9.3 Kemudahan & Kelengkapan Bilik Darjah(kemudahan lain) <br><br>
                                    <ul>
                                        <li>Penghawa dingin</li>
                                        <li>LCD</li>
                                        <li>Papan putih</li>
                                        <li>Papan kenyataan</li>
                                        <li>Almari</li>
                                        <li>Kipas angin</li>
                                        <li>Rak Buku</li>
                                        <li>"Smartboard"</li>
                                    </ul>',

        'keperluan_asas' => '9.4 Keperluan Asas dan Keperluan Pelbagai <br><br>
                                    <b>Jenis Keperluan Asas</b>
                                    <ul>
                                        <li>Ruang makan/Kantin</li>
                                        <li>Tandas</li>
                                        <li>Pejabat/Bilik pentadbiran</li>
                                        <li>Bilik pengetua/Guru Besar</li>
                                        <li>Bilik guru</li>
                                        <li>Surau/Bilik solat</li>
                                        <li>Bilik sakit/rawatan</li>
                                        <li>Pusat sumber/Perpustakaan</li>
                                    </ul> <br>
                                    <b>Jenis Keperluan Tambahan :</b>
                                    <ul>
                                        <li>Bilik persediaan makmal (berdasarkan aliran yang ditawarkan)</li>
                                        <li>Makmal (berdasarkan aliran yang ditawarkan)</li>
                                        <li>Bilik/makmal komputer</li>
                                        <li>Bilik mesyuarat/gerakan/perbincangan</li>
                                        <li>Dewan serbaguna/tapak/gelanggang/padang permainan</li>
                                        <li>Lobi utama/Meja sambut tetamu</li>
                                        <li>Bengkel</li>
                                        <li>Bilik Kaunseling</li>
                                        <li>Gambar Pembesar</li>
                                        <li>Bendera Persekutuan, Malaysia, Negeri & Sekolah</li>
                                        <li>Gelanggan Permainan</li>
                                        <li>Asrama</li>
                                    </ul>',
        'iklan_institusi' => '9.5 Papan Iklan  Institusi',
        'pengurusan_keselamatan' => '9.6 Pengurusan Keselamatan <br><br>
                                        <b>Ciri-ciri Keselamatan</b>
                                        <ul>
                                            <li>Pondok jaga</li>
                                            <li>Pengawal keselamatan</li>
                                            <li>Jadual tugas pengawal keselamatan</li>
                                            <li>Senarai tugas pengawal</li>
                                            <li>Profil/maklumat syarikat dan pengawal keselamatan</li>
                                            <li>Peralatan pengawal keselamatan (wisel, chota dll)</li>
                                            <li>Rekod keluar masuk murid</li>
                                            <li>Rekod keluar masuk pelawat</li>
                                            <li>Pas keselamatan</li>
                                            <li>Penggera keselamatan</li>
                                            <li>Alat pencegah kebakaran</li>
                                            <li>Peti kecemasan</li>
                                            <li>Pelan kecemasan</li>
                                            <li>Latihan kebakaran</li>
                                            <li>Pagar dalam keadaan baik</li>
                                            <li>CCTV</li>
                                        </ul>',
        'pengurusan_kantin' => '9.7 Pengurusan Kantin <br><br>
                                        <b>Ciri-ciri Kantin</b>
                                        <ul>
                                            <li>Makanan halal</li>
                                            <li>Makanan berkhasiat & seimbang</li>
                                            <li>Makanan yang dihidangkan bersih</li>
                                            <li>Kawasan sekitar bersih</li>
                                            <li>Peralatan yang digunakan bersih</li>
                                            <li>Pekerja membuat pemeriksaan perubatan</li>
                                            <li>Pekerja memakai penutup kepala</li>
                                            <li>Pekerja memakai apron</li>
                                            <li>Berlesen</li>
                                            <li>Sijil Halal dipamerkan</li>
                                            <li>Peraturan kantin dipamerkan</li>
                                            <li>Pengusaha ada sijil pengendalian makanan</li>
                                            <li>Senarai ahli jawatankuasa dipamerkan</li>
                                        </ul>',
        'pengurusan_tandas' => '9.8 Penyelenggaraan Tandas <br><br>
                                        <b>Ciri-ciri Keselamatan</b>
                                        <ul>
                                            <li>Tandas L dan P diasingkan</li>
                                            <li>Persekitaran tandas bersih</li>
                                            <li>Persekitaran tandas ceria</li>
                                            <li>Tandas diselenggara</li>
                                            <li>Ada jadual pembersihan tandas</li>
                                            <li>Tandas dilabelkan</li>
                                            <li>Tidak berbau</li>
                                            <li>Mempunyai tisu dan pencuci tangan</li>
                                            <li>Mempunyai pewangi</li>
                                            <li>Bakul sampah</li>
                                        </ul>',
    ];

    $options = [
        'pelan_premis' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Mudah Dirujuk</i>',
            3 => '<i style="font-size:12px;">Ada, Mudah Dirujuk, Terkini</i>',
            4 => '<i style="font-size:12px;">Ada, Mudah Dirujuk, Terkini, Ditentusahkan </i>',
            5 => '<i style="font-size:12px;">Ada, Mudah Dirujuk, Terkini, Ditentusahkan, Premis seperti pelan</i>',
        ],

        'pengurusan_fizikal_institusi' => [
            0 => '',
            1 => '<i style="font-size:12px;">Mengemukakan satu (1) daripada rekod penyenggaraan fizikal institusi yang disenaraikan</i>',
            2 => '<i style="font-size:12px;">Mengemukakan dua (2) daripada rekod penyenggaraan fizikal institusi yang disenaraikan</i>',
            3 => '<i style="font-size:12px;">Mengemukakan tiga (3) daripada rekod penyenggaraan fizikal institusi yang disenaraikan</i>',
            4 => '<i style="font-size:12px;">Mengemukakan empat (4) daripada rekod penyenggaraan fizikal institusi yang disenaraikan</i>',
            5 => '<i style="font-size:12px;">Mengemukakan lima (5) daripada rekod penyenggaraan fizikal institusi yang disenaraikan</i>',
        ],
        'kemudahan_bilik' => [
            0 => '',
            1 => '<i style="font-size:12px;">Mempunyai dua (2) daripada kemudahan yang disenaraikan</i>',
            2 => '<i style="font-size:12px;">Mempunyai tiga (3) daripada kemudahan yang disenaraikan</i>',
            3 => '<i style="font-size:12px;">Mempunyai empat (4) daripada kemudahan yang disenaraikan</i>',
            4 => '<i style="font-size:12px;">Mempunyai lima (5) daripada kemudahan yang disenaraikan</i>',
            5 => '<i style="font-size:12px;">Mempunyai enam (6) daripada kemudahan yang disenaraikan</i>',
        ],

        'keperluan_asas' => [
            0 => '',
            1 => '<i style="font-size:12px;">Mempunyai lapan (8) kemudahan asas dan dua (2) keperluan tambahan yang lain</i>',
            2 => '<i style="font-size:12px;">Mempunyai lapan (8) kemudahan asas dan tiga (3) keperluan tambahan yang lain</i>',
            3 => '<i style="font-size:12px;">Mempunyai lapan (8) kemudahan asas dan empat (4) keperluan tambahan yang lain</i>',
            4 => '<i style="font-size:12px;">Mempunyai lapan (8) kemudahan asas dan lima (5) keperluan tambahan yang lain</i>',
            5 => '<i style="font-size:12px;">Mempunyai lapan (8) kemudahan asas dan enam (6) keperluan tambahan yang lain</i>',
        ],
        'iklan_institusi' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Sama dengan perakuan pendaftaran</i>',
            3 => '<i style="font-size:12px;">Ada, Sama dengan perakuan pendaftaran, Ada kelulusan lesen papan iklan PBT</i>',
            4 => '<i style="font-size:12px;">Ada, Sama dengan perakuan pendaftaran, Ada kelulusan lesen papan iklan PBT, Mempunyai kod sekolah </i>',
            5 => '<i style="font-size:12px;">Ada, Sama dengan perakuan pendaftaran, Ada kelulusan lesen papan iklan PBT, Mempunyai kod sekolah, Strategik</i>',
        ],
        'pengurusan_keselamatan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya enam (6) ciri-ciri keselamatan seperti yang disenaraikan</i>',
            2 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya lapan (8) ciri-ciri keselamatan seperti yang disenaraikan</i>',
            3 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya sepuluh (10) ciri-ciri keselamatan seperti yang disenaraikan</i>',
            4 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya dua belas (12) ciri-ciri keselamatan seperti yang disenaraikan</i>',
            5 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya tiga belas (13) ciri-ciri keselamatan seperti yang disenaraikan</i>',
        ],
        'pengurusan_kantin' => [
            0 => '',
            1 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya lima(5) kualiti kantin yang disenaraikan</i>',
            2 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya enam(6) kualiti kantin yang disenaraikan</i>',
            3 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya tujuh(7) kualiti kantin yang disenaraikan</i>',
            4 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya lapan(8) kualiti kantin yang disenaraikan</i>',
            5 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya sembilan(9) atau lebih kualiti kantin yang disenaraikan</i>',
        ],
        'pengurusan_tandas' => [
            0 => '',
            1 => '<i style="font-size:12px;">Mempunyai mangkuk tandas  / mangkuk buang air kecil dengan air mencukupi serta mempunyai  sekurang-kurangnya tiga (3) daripada ciri-ciri tandas yang disenaraikan</i>',
            2 => '<i style="font-size:12px;">Mempunyai mangkuk tandas  / mangkuk buang air kecil dengan air mencukupi serta mempunyai  sekurang-kurangnya empat (4) daripada ciri-ciri tandas yang disenaraikan</i>',
            3 => '<i style="font-size:12px;">Mempunyai mangkuk tandas  / mangkuk buang air kecil dengan air mencukupi serta mempunyai  sekurang-kurangnya lima (5) daripada ciri-ciri tandas yang disenaraikan</i>',
            4 => '<i style="font-size:12px;">Mempunyai mangkuk tandas  / mangkuk buang air kecil dengan air mencukupi serta mempunyai  sekurang-kurangnya enam (6) daripada ciri-ciri tandas yang disenaraikan</i>',
            5 => '<i style="font-size:12px;">Mempunyai mangkuk tandas  / mangkuk buang air kecil dengan air mencukupi serta mempunyai  sekurang-kurangnya tujuh (7) atau lebih daripada ciri-ciri tandas yang disenaraikan</i>',
        ],
    ];

    $count = 1.1;
@endphp

<style>
    #SkipsNilai1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #SkipsNilai1 tbody {
        vertical-align: middle;
    }

    #SkipsNilai1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<?php
    $butiran_institusi_id = $butiran_id;
    $tab1 = App\Models\ItemStandardQualitySkipsSekolah::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $piawaian = json_decode($tab1->piawaian);
    } else {
        $piawaian = null;
    }
?>
<form id="piawaian_sekolah">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="SkipsNilai1">
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
                <input type="hidden" name="butiran_institusi_id" value="{{$butiran_id}}">

                <tr>
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">piawaian</td>
                </tr>
                @foreach ($pendaftarans as $index => $pendaftaran)
                    @php
                        $numeric = preg_replace('/[^0-9.]/', '', $pendaftaran);
                        $text = trim(preg_replace('/[0-9.]/', '', $pendaftaran), '.');

                        $excludeNumber = strpos($pendaftaran, 'text-primary') !== false;
                    @endphp

                    <tr>
                        @if (!$excludeNumber)
                            <td> {{ $numeric }} </td>
                        @endif

                        @if (!$excludeNumber)
                            <td> {!! $text !!} </td>
                        @else
                            <td class="bg-light-primary" colspan="8"> {!! $text !!} </td>
                        @endif

                        @foreach ($options[$index] as $key => $option)
                            <td>
                                <div
                                    class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio" name="{{ $index }}"
                                        value="{{ $key }}" required @if($piawaian && $piawaian->$index == $key) checked @endif @if($type == 'verfikasi' || $type == 'validasi' || $type == 'laporan') disabled @endif>
                                </div>
                                <br>

                                <div class="d-flex justify-content-center align-items-center">
                                    {!! $option !!}
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right formdd" onclick="submitformsekolah3()">Simpan</button>
    </div>

</form>

<script>
    function submitformsekolah3() {
        var formData = new FormData(document.getElementById('piawaian_sekolah'));
        var error = false;

        $('form#piawaian_sekolah').find('radio, input, checkbox').each(function() {
             var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }

        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard-sekolah/piawaian';

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    Swal.fire('Berjaya', 'Berjaya', 'success');
                    if (response.formfilled == true) {
                        window.location.reload();
                    }
                } else {
                    Swal.fire('Gagal', 'Fill all fields', 'error');
                }
            }
        });

    };
</script>
