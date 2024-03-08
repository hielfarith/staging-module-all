@php
    $pendaftarans = [
        'pdpc' => '4.1 Pembelajaran dan Pemudahcaraan',
        'kaedah_pelajaran' => '4.2 Kaedah/Metodologi Pengajaran',
        'latihan' => '4.3 Latihan',
        'penggunaan_bahan' => '4.4 Penggunaan Bahan Bantu Mengajar ',
    ];

    $options = [
        'pdpc' => [
            0 => '',
            1 => '<i style="font-size:12px;">Kelas Bersedia</i>',
            2 => '<i style="font-size:12px;">Kelas Bersedia, Guru Bersedia</i>',
            3 => '<i style="font-size:12px;">Kelas Bersedia, Guru Bersedia, Murid Bersedia</i>',
            4 => '<i style="font-size:12px;">Kelas Bersedia, Guru Bersedia, Murid Bersedia, PDPC Berlaku </i>',
            5 => '<i style="font-size:12px;">Kelas Bersedia, Guru Bersedia, Murid Bersedia, PDPC Berlaku, Interaksi Berkesan</i>',
        ],

        'kaedah_pelajaran' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Sesuai</i>',
            3 => '<i style="font-size:12px;">Ada, Sesuai, Guru Sebagai Pembimbing</i>',
            4 => '<i style="font-size:12px;">Ada, Sesuai, Guru Sebagai Pembimbing, Penglibatan Murid </i>',
            5 => '<i style="font-size:12px;">Ada, Sesuai, Guru Sebagai Pembimbing, Penglibatan Murid, Berkesan</i>',
        ],
        'latihan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Sesuai</i>',
            3 => '<i style="font-size:12px;">Ada, Sesuai, Mencukupi</i>',
            4 => '<i style="font-size:12px;">Ada, Sesuai, Mencukupi, Disemak</i>',
            5 => '<i style="font-size:12px;">Ada, Sesuai, Mencukupi, Disemak, Terdapat Pembetulan</i>',
        ],

        'penggunaan_bahan' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Kesesuaian BBM</i>',
            3 => '<i style="font-size:12px;">Ada, Kesesuaian BBM, Kesesuaian Peruntukan Masa</i>',
            4 => '<i style="font-size:12px;">Ada, Kesesuaian BBM, Kesesuaian Peruntukan Masa, Semua Terlibat</i>',
            5 => '<i style="font-size:12px;">Ada, Kesesuaian BBM, Kesesuaian Peruntukan Masa, Semua Terlibat, Berkesan</i>',
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
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Pembelajaran dan Pemudahcaraan
                    </td>
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
