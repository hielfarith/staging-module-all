@php
    $pendaftarans = [
        'rekod_kesihatan' => '7.1 Rekod  dan dokumentasi',
        'program_kesihatan' => '7.2 Program Kesihatan <br> <br>Senarai Program Kesihatan :
                                <ul>
                                    <li>Taklimat</li>
                                    <li>Ceramah</li>
                                    <li>Pemeriksaan</li>
                                </ul>',
        'bilik_sakit' => '7.3 Bilik Sakit / Bilik Rawatan <br> <br>Ciri-ciri bilik sakit;
                                    <ul>
                                <li>Ada jawatankuasa</li>
                                <li>Ada perabot dan katil</li>
                                <li>Ada peralatan rawatan</li>
                                <li>Ada alatan kecemasan</li>
                                <li>Ceria, kemas dan bersih</li>
                                <li>Ada rekod daftar penggunaan</li>
                            </ul>',
    ];

    $options = [
        'rekod_kesihatan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada (Pergigian/kesihatan)</i>',
            2 => '<i style="font-size:12px;">Ada (Pergigian/kesihatan), Didokumentasi</i>',
            3 => '<i style="font-size:12px;">Ada (Pergigian/kesihatan), Didokumentasi,  Terkini</i>',
            4 => '<i style="font-size:12px;">Ada (Pergigian/kesihatan), Didokumentasi,  Terkini, Sistematik </i>',
            5 => '<i style="font-size:12px;">Ada (Pergigian/kesihatan), Didokumentasi,  Terkini, Sistematik, Kebolehcapaian</i>',
        ],

        'program_kesihatan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada Jawatankuasa</i>',
            2 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada perancangan</i>',
            3 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada perancangan,  Ada Kempen</i>',
            4 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada perancangan,  Ada Kempen, Melaksana mana - mana satu (1) program kesihatan </i>',
            5 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada perancangan,  Ada Kempen, Melaksana mana - mana satu (1) program kesihatan, Melaksanakan mana-mana dua (2) program kesihatan</i>',
        ],
        'bilik_sakit' => [
            0 => '',
            1 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya satu (1) daripada ciri-ciri bilik sakit yang disenaraikan</i>',
            2 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya dua (2) daripada ciri-ciri bilik sakit yang disenaraikan</i>',
            3 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya tiga (3) daripada ciri-ciri bilik sakit yang disenaraikan</i>',
            4 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya empat (4) daripada ciri-ciri bilik sakit yang disenaraikan</i>',
            5 => '<i style="font-size:12px;">Mempunyai sekurang-kurangnya lima (5) daripada ciri-ciri bilik sakit yang disenaraikan</i>',
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
<form id="penubuhan_pendaftaran">
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

                <tr>
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Pengurusan Kesihatan Murid</td>
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
                                    <input class="form-check-input" type="radio" name="radio_{{ $index }}"
                                        value="{{ $key }}" required>
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
        <button type="button" class="btn btn-primary float-right formdd">Simpan</button>
    </div>

</form>

<script>
    function submitform1() {
        var formData = new FormData(document.getElementById('penubuhan_pendaftaran'));
        var error = false;

        $('form#penubuhan_pendaftaran').find('radio, input, checkbox').each(function() {
            if (this.required && this.type == 'checkbox' && !this.checked) {
                error = true;
            }
            if (this.required && this.value == '') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skips.instrumen-submit', ['tab' => 'penubuhan_pendaftaran']) }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                }
            }
        });

    };
</script>
