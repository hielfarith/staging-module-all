<style>
    #NilaiItem5 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem5 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #NilaiItem5 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
    $items_5 = [
        [
            'section' => 'Ruang Pembelajaran',
            'subSections' => [
                'Ruang manipulatif yang disediakan membolehkan kanak-kanak meneroka bahan pembelajaran.',
                'Ruang bacaan mengandungi bahan bacaan yang sesuai untuk semua peringkat umur.',
                'Ruang seni dan kreativiti membolehkan kanak-kanak mereka cipta.',
                'Ruang main peranan membolehkan kanak-kanak meluahkan perasaan (main olok- olok).',
                'Ruang teknologi membolehkan kanak-kanak mendapat maklumat.',
                'Susun atur peralatan dan perabot bersesuaian dengan kebolehan dan peringkat umur bayi/kanak-kanak.',
                'Ruang yang disediakan adalah selamat bagi mengelakkan pertembungan antara kanak-kanak semasa aktiviti diadakan.',
                'Terdapat beberapa ruang untuk seorang atau dua orang kanak-kanak bermain/bersendirian tanpa gangguan.',
                '"Semua peralatan pembelajaran dan perabot mudah diakses oleh kanak-kanak (rak yang rendah, rak yang terbuka, rak tidak terlalu penuh dengan barang permainan)."',
                '"Semua rak dan sekatan mempunyai saiz yang bersesuaian dengan ketinggian kanak-kanak bagi memudahkan pemantauan pergerakan kanak-kanak."',
                '"Ruang pembelajaran perkembangan Sahsiah, Sosio-Emosi & Kerohanian dilengkapi dengan pelbagai bahan yang membolehkan kanak-kanak melahirkan perasaan berinteraksi dan mengamalkan nilai-nilai murni."',
                '"Ruang pembelajaran perkembangan Bahasa, Komunikasi dan Literasi Awal dilengkapi dengan pelbagai bahan yang membolehkan kanak-kanak berkomunikasi, meningkat kemahiran literasi dan minat membaca bayi dan kanak- kanak."',
                'Ruang pembelajaran perkembangan Awal Matematik dilengkapi dengan pelbagai bahan yang membolehkan kanak-kanak menguasai kemahiran konsep awal matematik bayi dan kanak-kanak.',
                '"Ruang pembelajaran perkembangan Sensori dan Dunia Persekitaran dilengkapi dengan pelbagai bahan yang membolehkan kanak-kanak menguasai kemahiran pemahaman deria dan persekitaran bayi dan kanak-kanak."',
                '"Ruang pembelajaran perkembangan Fizikal dilengkapi dengan pelbagai bahan yang membolehkan kanak-kanak meningkatkan kemahiran motor kasar dan motor halus bayi dan kanak-kanak."',
                '"Ruang pembelajaran perkembangan Daya Kreativiti dan Estetika dilengkapi dengan pelbagai bahan yang membolehkan kanak- kanak melahirkan kreativiti, menghasilkan rekacipta dan menghargai hasil ciptaan mereka."',
                'Ruang aktiviti fizikal di luar TASKA disediakan untuk bayi dan kanak-kanak.',
                'Terdapat kawasan untuk kanak-kanak berkebun di luar TASKA.',
                'Terdapat peralatan main air untuk kanak-kanak.',
                'Terdapat peralatan main pasir untuk kanak-kanak.',
                'Pondok permainan disediakan untuk aktiviti main peranan dan aktiviti bercerita.',
                'Setiap ruang pembelajaran dijaga dengan bersih dan disusun dengan kemas.',
                'Setiap ruang pembelajaran memberi peluang kanak-kanak untuk meneroka bahan dan bereksperimen.',
                'Pendidik/pengasuh menyediakan ruang persekitaran “print rich” untuk bayi dan kanak- kanak.',
                'Setiap ruang “print rich” adalah mengikut tema atau projek.',
                'Setiap hasil kerja kanak-kanak dilabel.',
                'Setiap hasil kerja kanak-kanak digantung dan dipamerkan.',
            ],
        ],
        [
            'section' => 'Peralatan dan Sumber Pembelajaran',
            'subSections' => [
                'Peralatan pembelajaran sesuai dengan umur kanak-kanak',
                'Peralatan pembelajaran mencukupi untuk digunakan oleh setiap kanak-kanak.',
                'Peralatan pembelajaran berada dalam keadaan baik dan boleh digunakan.',
                'Peralatan pembelajaran diasingkan mengikut jenis.',
                'Peralatan pembelajaran dilabel.',
                'Peralatan pembelajaran diletak dalam bekas atau rak yang sesuai dan mudah dicapai oleh kanak-kanak.',
            ],
        ],
        [
            'section' => 'Penyediaan Ruang Sokongan',
            'subSections' => [
                'TASKA menyediakan ruang pejabat.',
                'TASKA menyediakan dapur yang selamat di TASKA.',
                'TASKA menyediakan bilik air/tandas yang sesuai untuk kanak-kanak perempuan.',
                'TASKA menyediakan bilik air/tandas yang sesuai untuk kanak-kanak lelaki.',
                'TASKA menyediakan tandas untuk orang dewasa.',
                'TASKA menyediakan bilik stor untuk menyimpan barang.',
            ],
        ],
        [
            'section' => 'Bahan Pembelajaran',
            'subSections' => [
                'Bahan Pembelajaran TASKA menyediakan bahan pembelajaran mengikut bidang pembelajaran',
                'Bahan pembelajaran adalah bersesuaian dengan umur kanak-kanak',
                'Bahan pembelajaran adalah cukup untuk setiap kanak-kanak.',
                'Bahan pembelajaran adalah mengikut tema dan aktiviti yang dijalankan',
                'Pendidik/pengasuh menggunakan bahan semula jadi semasa aktiviti pembelajaran dan pengajaran',
                'Pendidik/pengasuh menggunakan bahan tempatan semasa aktiviti pembelajaran dan pengajaran',
                'Pendidik/pengasuh menggunakan bahan kitar semula semasa aktiviti pembelajaran dan pengajaran',
                'TASKA menyediakan peralatan permainan luar seperti gelongsor, jongkang jongkit, buaian, trek basikal, merry go-round, climbing bar, balancing beam dan terowong. (TASKA hendaklah mempunyai sekurang-kurangnya tiga item di atas).',
            ],
        ],
    ];
@endphp
<?php
$ya = $tidak = 0;
if ($skpak) {
    $penilaian5 = json_decode($skpak->penilaian5, true);
    foreach ($penilaian5 as $key => $value) {
        if ($value == 'YA') {
            $ya = ++$ya;
        }
        if ($value == 'TIDAK') {
            $tidak = ++$tidak;
        }
    }
} else {
    $penilaian5 = null;
}
?>
<h5 class="card-title fw-bolder">
    PERSEKITARAN FIZIKAL DAN SUMBER PEMBELAJARAN
</h5>

<hr>
<form id="penilaian5">
    <input type="hidden" name="skpak_id" value="{{ $skpak?->id }}">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem5">
            <thead style="color:black; background-color: #d8bfb0;">
                <tr>
                    <th>Perincian Item</th>
                    <th>Ya</th>
                    <th>Tidak</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items_5 as $index => $item_5)
                    <tr>
                        <td colspan="3" class="bg-light-primary text-uppercase">
                            {{ $item_5['section'] }}
                        </td>
                    </tr>
                    @foreach ($item_5['subSections'] as $subsection_item5)
                        <?php
                        $name = $index . '_' . $loop->index;
                        ?>
                        <tr>
                            <td>{{ $subsection_item5 }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="ya_{{ $index }}_{{ $loop->index }}" value="YA"
                                        @if ($penilaian5 && $penilaian5[$name] == 'YA') checked @endif {{ $disabled }}>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="tidak_{{ $index }}_{{ $loop->index }}" value="TIDAK"
                                        @if ($penilaian5 && $penilaian5[$name] == 'TIDAK') checked @endif {{ $disabled }}>
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
            <button type="button" class="btn btn-primary float-right formdd" onclick="submitp5()">Simpan</button>
        </div>
    @endif
</form>


<script>
    function submitp5() {
        var formData = new FormData(document.getElementById('penilaian5'));
        var error = false;

        $('form#penilaian5').find('radio, input, checkbox').each(function() {
            if (this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name=" + this.name + "]:checked", '#penilaian5').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-skpak', ['tab' => 'penilaian5']) }}"
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
