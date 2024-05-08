<style>
    #NilaiItem6 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem6 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #NilaiItem6 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_6 = [
        [
            'section' => 'Organisasi TASKA',
            'subSections' => [
                'TASKA mempamerkan falsafah, visi dan misi yang tersendiri.',
                'Carta organisasi kakitangan dipamerkan.',
                'Carta Kanak-kanak mengikut umur dan kumpulan dipamerkan.',
                'Takwim tahunan dipamerkan.',
                'Jadual aktiviti harian kanak-kanak dipamerkan.',
                'Terdapat rekod perancangan penambahbaikan kualiti pengurusan TASKA.',
                'Terdapat rekod perancangan penambahbaikan kualiti professionalism pendidik/pengasuh.',
                'Terdapat rekod perancangan penambahbaikan kualiti program pembelajaran.',
            ],
        ],
        [
            'section' => 'Rekod staf/ pendidik lengkap, dikemaskini dan mengandungi maklumat berikut',
            'subSections' => [
                'Maklumat peribadi.',
                'Maklumat kesihatan.',
                'Rekod kehadiran.',
                'Rekod cuti.',
                'Senarai/jadual tugas.',
                'Rekod ganjaran.',
                'Rekod latihan/ perkembangan profesional',
                'Rekod kenaikan pangkat.',
            ],
        ],
        [
            'section' =>
                'Penyediaan dan penyimpanan rekod kanak-kanak adalah mengikut Peraturan-Peraturan Taman Asuhan Kanak-Kanak 2012 (Peraturan-Peraturan TASKA) dan mengandungi maklumat berikut:',
            'subSections' => [
                'Maklumat pendaftaran.',
                'Maklumat peribadi.',
                'Rekod kesihatan.',
                'Dokumen kontrak/Aku Janji.',
                'Rekod pentaksiran perkembangan kanak-kanak.',
                'Terdapat rekod-rekod inventori dan aset yang lengkap.',
            ],
        ],
        [
            'section' => 'Terdapat rekod kewangan seperti yang berikut',
            'subSections' => [
                'Rekod aliran tunai.',
                'Rekod perbelanjaan operasi.',
                'Rekod imbuhan.',
                'Rekod dana khas.',
                'Terdapat rekod takwim tahunan.',
                'Terdapat rekod jadual menu harian.',
            ],
        ],
        [
            'section' => 'Pengurusan Staf',
            'subSections' => [
                'Gaji dan elaun-elaun staf dibayar mengikut kadar yang telah diluluskan.',
                'Setiap staf mempunyai caruman KWSP dan PERKESO seperti yang diwajibkan.',
                'TASKA menyediakan waktu rehat untuk staf dalam jadual harian.',
                'TASKA menyediakan bilik/ruang khas untuk staf.',
                'TASKA menyediakan latihan/kursus dalaman secara berkala untuk meningkatkan prestasi staf.',
                'TASKA memberi peluang staf menghadiri latihan/ kursus yang dianjurkan oleh pihak luar.',
                'TASKA memberi kebenaran kepada staf untuk menjadi ahli persatuan berkaitan dengan pendidikan awal kanak-kanak.',
                'Pendidik berkongsi maklumat mengenai Dasar Perlindungan Kanak-Kanak dan Hak Perlindungan Kanak-kanak berdasarkan CRC /CPP sesama pendidik.',
                'TASKA menyediakan laluan kerjaya untuk staf.',
            ],
        ],
        [
            'section' => 'Kolaborasi dengan Ibu Bapa dan Komuniti',
            'subSections' => [
                'TASKA mempunyai garis panduan dan perancangan kolaborasi dengan ibu bapa dan komuniti.',
                'Semua ibu bapa telah mematuhi polisi penglibatan 1 jam semingu atau 4 jam sebulan dalam pendidikan kanak-kanak di TASKA seperti yang ditetapkan dalam kontrak.',
                'TASKA melibatkan agensi-agensi berkaitan dalam pelaksanaan aktiviti kanak-kanak dan direkodkan dalam takwim tahunan.',
                'TASKA menubuhkan Jawatankuasa PIBP.',
                'Senarai AJK dan bidang tugas yang dipamerkan.',
                'Mesyuarat Agung Tahunan PIBP dan AJK diadakan mengikut jadual dan minit mesyuarat disediakan.',
                'Pendidik mengadakan lawatan ke rumah kanak-kanak mengikut jadual atau mengikut keperluan.',
                'Terdapat sesi perbincangan bersama ibu bapa berkaitan perkembangan kanak-kanak diadakan secara berkala.',
            ],
        ],
    ];
@endphp
<?php
$ya = $tidak = 0;
if ($skpak) {
    $penilaian6 = json_decode($skpak->penilaian6, true);
    foreach ($penilaian6 as $key => $value) {
        if ($value == 'YA') {
            $ya = ++$ya;
        }
        if ($value == 'TIDAK') {
            $tidak = ++$tidak;
        }
    }
} else {
    $penilaian6 = null;
}
?>
<h5 class="card-title fw-bolder">
    PENGURUSAN TASKA, SUMBER MANUSIA DAN KOLABORASI DENGAN IBU BAPA DAN KOMUNITI
</h5>

<hr>
<form id="penilaian6">
    <input type="hidden" name="skpak_id" value="{{ $skpak?->id }}">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem6">
            <thead style="color:black; background-color: #d8bfb0;">
                <tr>
                    <th>Perincian Item</th>
                    <th>Ya</th>
                    <th>Tidak</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items_6 as $index => $item_6)
                    <tr>
                        <td colspan="3" class="bg-light-primary text-uppercase">
                            {{ $item_6['section'] }}
                        </td>
                    </tr>
                    @foreach ($item_6['subSections'] as $subsection_item6)
                        <?php
                        $name = $index . '_' . $loop->index;
                        ?>
                        <tr>
                            <td>{{ $subsection_item6 }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="ya_{{ $index }}_{{ $loop->index }}" value="YA"
                                        @if ($penilaian6 && $penilaian6[$name] == 'YA') checked @endif {{ $disabled }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="tidak_{{ $index }}_{{ $loop->index }}" value="TIDAK"
                                        @if ($penilaian6 && $penilaian6[$name] == 'TIDAK') checked @endif {{ $disabled }}>
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
        <div class="d-flex justify-content-end align-items-center mt-1">
            <button type="button" class="btn btn-primary float-right formdd" onclick="submitp6()">Simpan</button>
        </div>
    @endif
</form>

<script>
    function submitp6() {
        var formData = new FormData(document.getElementById('penilaian6'));
        var error = false;

        $('form#penilaian6').find('radio, input, checkbox').each(function() {
            if (this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name=" + this.name + "]:checked", '#penilaian6').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-skpak', ['tab' => 'penilaian6']) }}"
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
                    // var location = "{{ route('skpak.skpak_baru', ['id' => ':id']) }}";
                    // var location = location.replace(':id', id);
                    // window.location.href = location;
                }
            }
        });

    };
</script>
