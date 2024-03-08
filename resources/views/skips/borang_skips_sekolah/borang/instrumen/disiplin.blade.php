@php
    $pendaftarans = [
        'peraturan_murid' => '8.1 Peraturan Disiplin Murid',
        'rekod_disiplin' => '8.2 Rekod Disiplin Murid',
        'jawatankuasa_disiplin' => '8.3 Jawatankuasa Disiplin',
        'pengurusan_disiplin' => '8.4 Pengurusan Tindakan Disiplin <br> <br>
                            <ul>
                                <li>Menjalankan siasatan</li>
                                <li>Makluman kepada ibu bapa</li>
                                <li>Merujuk kepada Jawatankuasa Disiplin</li>
                                <li>Makluman Tindakan / Keputusan</li>
                                <li>Membenarkan rayuan</li>
                                <li>Memaklumkan kepada Ketua Pendaftar</li>
                            </ul>',
    ];

    $options = [
        'peraturan_murid' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada, Didokumentasikan, Disebarkan</i>',
            4 => '<i style="font-size:12px;">Ada, Didokumentasikan, Disebarkan, Peraturan menyeluruh </i>',
            5 => '<i style="font-size:12px;">Ada, Didokumentasikan, Disebarkan, Peraturan menyeluruh,  Akujanji pelajar / ibubapa</i>',
        ],

        'rekod_disiplin' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada Rekod Disiplin</i>',
            2 => '<i style="font-size:12px;">Ada Rekod Disiplin, Didokumentasikan</i>',
            3 => '<i style="font-size:12px;">Ada Rekod Disiplin, Didokumentasikan, Sistematik</i>',
            4 => '<i style="font-size:12px;">Ada Rekod Disiplin, Didokumentasikan, Sistematik, Analisis Salah Laku </i>',
            5 => '<i style="font-size:12px;">Ada Rekod Disiplin, Didokumentasikan, Sistematik, Analisis Salah Laku,  Disemak/Diselia</i>',
        ],
        'jawatankuasa_disiplin' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada Jawatankuasa</i>',
            2 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada surat perlantikan</i>',
            3 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada surat perlantikan, Ada minit mesyuarat</i>',
            4 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada surat perlantikan, Ada minit mesyuarat, Perancangan program</i>',
            5 => '<i style="font-size:12px;">Ada Jawatankuasa, Ada surat perlantikan, Ada minit mesyuarat, Perancangan program, Ada program peningkatan disiplin murid</i>',
        ],

        'pengurusan_disiplin' => [
            0 => '',
            1 => '<i style="font-size:12px;">Membuat mana - mana satu (1) tindakan disiplin yang disenaraikan</i>',
            2 => '<i style="font-size:12px;">Membuat mana - mana dua (2) tindakan disiplin yang disenaraikan</i>',
            3 => '<i style="font-size:12px;">Membuat mana - mana tiga (3) tindakan disiplin yang disenaraikan</i>',
            4 => '<i style="font-size:12px;">Membuat mana - mana empat (4) tindakan disiplin yang disenaraikan</i>',
            5 => '<i style="font-size:12px;">Membuat mana - mana lima (5) tindakan disiplin yang disenaraikan</i>',
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
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Disiplin</td>
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
