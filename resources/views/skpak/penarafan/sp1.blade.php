<style>
    #NilaiItem1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem1 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #NilaiItem1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_1 = [
        [
            'section' => 'PEMATUHAN PERATURAN TASKA',
            'subSections' => [
                'TASKA menyediakan peraturan waktu bertugas.',
                'TASKA menyediakan senarai tugas.',
                'Pendidik/pengasuh memahami senarai tugas yang diberikan.',
                'TASKA mengadakan perbincangan tentang tugas dan tanggungjawab pendidik/pengasuh mengikut jadual.',
                'TASKA menyediakan jadual bertugas.',
                'TASKA mengemaskini jadual bertugas pendidik/pengasuh.',
                'TASKA menyediakan jadual waktu bertugas bagi setiap pendidik/pengasuh.',
                'Pendidik/pengasuh mencatat kehadiran atau menggunakan punch card/touch card.',
                'TASKA menyediakan Kod Etika berpakaian.',
            ],
        ],
        [
            'section' => 'PROFESIONALISME PENDIDIK/PENGASUH',
            'subSections' => [
                'Pendidik mempunyai Sijil KAP (Sijil Kursus Asuhan PERMATA).',
                'Pendidik mempunyai kelayakan iktisas seperti diploma/ijazah.',
                'Pendidik menghadiri latihan Kursus Pertolongan Cemas.',
                'Pendidik menghadiri kursus kesihatan kanak-kanak seperti penyakit berjangkit, alahan dan wabak.',
                'Pendidik menghadiri Kursus Pengendalian Makanan.',
                'Pendidik menghadiri Kursus CPR.',
                'Pendidik menghadiri Kursus CRC (Hak Kanak-kanak).',
                'Pendidik menghadiri Kursus CPP (Pelindungan Kanak-kanak).',
            ],
        ],
    ];

@endphp
<?php
$ya = $tidak = 0;
if ($skpak) {
    $penilaian1 = json_decode($skpak->penilaian1, true);
    foreach ($penilaian1 as $key => $value) {
        if ($value == 'YA') {
            $ya = ++$ya;
        }
        if ($value == 'TIDAK') {
            $tidak = ++$tidak;
        }
    }
    $namataska = $skpak->nama_taska;
} else {
    $penilaian1 = $namataska = null;
}
$ketuaTaska = \App\Models\ProfilPengguna::pluck('nama_taska', 'id');
?>
<h5 class="card-title fw-bolder">
    ETIKA DAN PROFESIONALISME
</h5>

<hr>
<form id="penilaian1">
    <input type="hidden" name="skpak_id" value="{{ $skpak?->id }}">
    <div class="row">
        <div class="col-md-4">
            <label class="fw-bold form-label">Nama Taska
                <span class="text-danger">*</span>
            </label>
            <select name="nama_taska" disabled class="form-control" {{ $disabled }}>
                <option>Sila Pilih</option>
                @foreach ($ketuaTaska as $key => $taska)
                    <option value="{{ $key }}" @if ($namataska == $key) selected @endif>
                        {{ $taska }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem1">
            <thead style="color:black; background-color: #d8bfb0;">
                <tr>
                    <th>Perincian Item</th>
                    <th>Ya</th>
                    <th>Tidak</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items_1 as $index => $item_1)
                    <tr>
                        <td colspan="3" class="bg-light-primary text-uppercase">
                            {{ $item_1['section'] }}
                        </td>
                    </tr>
                    @foreach ($item_1['subSections'] as $subsection_item1)
                        <?php
                        $name = $index . '_' . $loop->index;
                        ?>
                        <tr>
                            <td>{{ $subsection_item1 }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input radio-input-1" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="ya_{{ $index }}_{{ $loop->index }}" value="YA" required
                                        @if ($penilaian1 && $penilaian1[$name] == 'YA') checked @endif {{ $disabled }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input radio-input-1" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="tidak_{{ $index }}_{{ $loop->index }}" value="TIDAK" required
                                        @if ($penilaian1 && $penilaian1[$name] == 'TIDAK') checked @endif {{ $disabled }}>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-light-danger">
                    <td class="text-end">
                        Jumlah
                    </td>
                    <td class="text-center" id="YA">{{ $ya }}</td>
                    <td class="text-center" id="TIDAK">{{ $tidak }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <hr>
    @if (empty($disabled))
        <div class="buy-now">
            <button type="button" class="btn btn-primary waves-effect waves-float waves-light float-right"
                onclick="submitpenilaian1()">Sahkan</button>
        </div>
    @endif
</form>

<script>
    function submitpenilaian1() {
        var formData = new FormData(document.getElementById('penilaian1'));
        var error = false;

        $('form#penilaian1').find('radio, input, checkbox').each(function() {
            if (this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name=" + this.name + "]:checked", '#penilaian1').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-skpak', ['tab' => 'penilaian1']) }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var id = response.data.id;
                    var location = "{{ route('skpak.skpak_baru', ['id' => ':id']) }}";
                    var location = location.replace(':id', id);
                    window.location.href = location;
                }
            }
        });

    };
</script>
