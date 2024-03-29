
<?php
    $butiran_institusi_id = $butiran_id;
    $tab1 = App\Models\ItemStandardQualitySkipsSekolah::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $kebersihan = json_decode($tab1->kebersihan);
    } else {
        $kebersihan = null;
    }
?>
@php
    $pendaftarans = [
        'pengurusan_kebersihan' => '15.1 Pengurusan Kebersihan dan Keceriaan ',

        'persekitaran_sekolah' => '15.2 Persekitaran Sekolah <br> <br>
                                <ul>
                                    <li>Rumput dipotong</li>
                                    <li>Sampah disapu</li>
                                    <li>Susunan teratur</li>
                                    <li>Longkang</li>
                                    <li>Dinding bangunan</li>
                                    <li>Hiasan Tambahan</li>
                                    <li>Slogan / Mutiara Kata</li>
                                    <li>Taman/ Kolam</li>
                                    <li>Pondok Bacaan</li>
                                    <li>Tong kitar semula</li>
                                    <li>Label Bangunan / Laluan</li>
                                    <li>Galeri</li>
                                </ul>',

        'bilik_darjah' => '15.3 Bilik Darjah <br> <br>
                                <ul>
                                    <li>Lantai</li>
                                    <li>Tingkap</li>
                                    <li>Kipas Angin</li>
                                    <li>Papan Hitam/Papan Putih/Smartboard</li>
                                    <li>Papan Kenyataan</li>
                                    <li>Meja dan Kerusi Guru</li>
                                    <li>Meja dan Kerusi Murid</li>
                                    <li>Almari / Rak</li>
                                    <li>Lampu</li>
                                    <li>Pintu</li>
                                    <li>Hiasan</li>
                                </ul>',
    ];

    $options = [
        'pengurusan_kebersihan' => [
            0 => '',
            1 => '<i style="font-size:12px;">1. Ada Jawatankuasa</i>',
            2 => '<i style="font-size:12px;">1. Ada Jawatankuasa, Ada Perancangan</i>',
            3 => '<i style="font-size:12px;">1. Ada Jawatankuasa, Ada Perancangan, Pelaksanaan Aktiviti</i>',
            4 => '<i style="font-size:12px;">1. Ada Jawatankuasa, Ada Perancangan, Pelaksanaan Aktiviti, Laporan Aktiviti </i>',
            5 => '<i style="font-size:12px;">1. Ada Jawatankuasa, Ada Perancangan, Pelaksanaan Aktiviti, Laporan Aktiviti, Penambahbaikan</i>',
        ],

        'persekitaran_sekolah' => [
            0 => '',
            1 => '<i style="font-size:12px;">Persekitaran sekolah mesti bersih dan ceria serta terdapat mana - mana tiga (3) daripada ciri yang diselenggara dengan baik dan menarik</i>',
            2 => '<i style="font-size:12px;">Persekitaran sekolah mesti bersih dan ceria serta terdapat mana - mana empat (4) daripada ciri yang diselenggara dengan baik dan menarik</i>',
            3 => '<i style="font-size:12px;">Persekitaran sekolah mesti bersih dan ceria serta terdapat mana - mana lima (5) daripada ciri yang diselenggara dengan baik dan menarik</i>',
            4 => '<i style="font-size:12px;">Persekitaran sekolah mesti bersih dan ceria serta terdapat mana - mana enam (6) daripada ciri yang diselenggara dengan baik dan menarik</i>',
            5 => '<i style="font-size:12px;">Persekitaran sekolah mesti bersih dan ceria serta terdapat mana - mana tujuh (7) daripada ciri yang diselenggara dengan baik dan menarik</i>',
        ],

        'bilik_darjah' => [
            0 => '',
            1 => '<i style="font-size:12px;">1% - 19%  daripada jumlah bilangan bilik darjah mesti bersih dan ceria serta terdapat mana-mana lima (5) daripada ciri yang diselenggara dengan baik dan kemas.</i>',
            2 => '<i style="font-size:12px;">20% - 39%  daripada jumlah bilangan bilik darjah mesti bersih dan ceria serta terdapat mana-mana enam (6) daripada ciri yang diselenggara dengan baik dan kemas.</i>',
            3 => '<i style="font-size:12px;">40% - 59%  daripada jumlah bilangan bilik darjah mesti bersih dan ceria serta terdapat mana-mana tujuh (7) daripada ciri yang diselenggara dengan baik dan kemas.</i>',
            4 => '<i style="font-size:12px;">60% - 79%  daripada jumlah bilangan bilik darjah mesti bersih dan ceria serta terdapat mana-mana lapan (8) daripada ciri yang diselenggara dengan baik dan kemas.</i>',
            5 => '<i style="font-size:12px;">90% - 100%  daripada jumlah bilangan bilik darjah mesti bersih dan ceria serta terdapat mana-mana sembilan (9) daripada ciri yang diselenggara dengan baik dan kemas.</i>',
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
<form id="kebersihan_sekolah">
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
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Kebersihan & Keceriaan</td>
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
                                        value="{{ $key }}" required @if($kebersihan && $kebersihan->$index == $key) checked @endif @if($type == 'verfikasi' || $type == 'validasi' || $type == 'laporan') disabled @endif>
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
        <button type="button" class="btn btn-primary float-right formdd" onclick="submitformsekolah14()">Simpan</button>
    </div>

</form>

<script>
    function submitformsekolah14() {
        var formData = new FormData(document.getElementById('kebersihan_sekolah'));
        var error = false;

        $('form#kebersihan_sekolah').find('radio, input, checkbox').each(function() {
             var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }

        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard-sekolah/kebersihan';

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    if (response.formfilled == true) {
                        window.location.reload();
                    }
                }
            }
        });

    };
</script>
