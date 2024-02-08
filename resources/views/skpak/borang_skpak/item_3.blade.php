<style>
    #NilaiItem3 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem3 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #NilaiItem3 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$items_3 = [
    [
    'section' => 'Aktiviti Rutin PERMATA',
        'subSections' => [
            'Menyambut kanak-kanak dengan ucapan dan salam.',
            'Kanak-kanak menyusun kasut/selipar, dan menyimpan beg sendiri.',
            'Kedatangan kanak-kanak direkod.',
            'Pendidik/pengasuh menerima buku log setiap pagi.',
            'Kanak-kanak diberi peluang bermain bebas.',
            'Perjumpaan pagi (circle time) dijalankan setiap hari.',
            'Beratur untuk mencuci tangan.',
            'Membaca doa sebelum dan selepas makan.',
            'Mengamalkan adab makan dengan sopan dan tertib.',
            'Membersihkan tempat makan.',
            'Menyusun semula kerusi yang digunakan.',
            'Menghantar pinggan dan cawan ke dalam bekas yang disediakan.',
            'Mencuci tangan dan mulut serta mengelapnya dengan tuala atau tisu.',
            'Kanak-kanak membasuh tangan selepas bermain.',
            'Kanak-kanak mempunyai peralatan kebersihan individu seperti tuala, sikat dan berus gigi.',
            'Pemeriksaan kebersihan kuku, rambut, telinga, gigi dan hidung kanak-kanak.',
            'Lampin bayi ditukar sekurang-kurangnya tiga kali mengikut keperluan.',
            'Kanak-kanak dimandikan sekurang-kurangnya dua kali sehari.',
            'Kanak-kanak memberus gigi dan berkumur setiap kali selepas makan.',
            'Kanak-kanak bersama–sama menyediakan tempat tidur.',
            'Kanak-kanak berdoa sebelum tidur dan selepas bangun tidur.',
            'Kanak-kanak mengemas tempat tidur.',
            'Kanak-kanak mengambil sendiri beg masing-masing.',
            'Kanak-kanak bersalam dengan pendidik/ pengasuh sebelum pulang.',
            'Buku Log Anak PERMATA diserahkan kepada ibu bapa sebelum pulang.',
        ],
    ],
    [
    'section' => 'Kemahiran Urus Diri dan Bantu Diri',
        'subSections' => [
            'Pendidik/pengasuh membimbing kanak-kanak untuk makan sendiri.',
            'Pendidik/pengasuh membimbing kanak-kanak membersihkan diri.',
            'Pendidik/pengasuh membimbing kanak-kanak berpakaian sendiri.',
            'Kanak-kanak ke tandas dengan bantuan.',
            'Kanak-kanak mengurus barangan sendiri.',
        ],
    ],
    [
    'section' => 'Pengurusan Tingkah Laku',
        'subSections' => [
            'Pendidik/pengasuh membimbing tingkah laku kanak-kanak aktif dan terlalu aktif.',
            'Pendidik/pengasuh membimbing tingkah laku kanak-kanak murung.',
            'Pendidik/pengasuh membimbing tingkah laku kanak-kanak mengamuk.',
            'Pendidik/pengasuh membimbing tingkah laku kanak-kanak bergaduh.',
            'Pendidik/pengasuh membimbing tingkah laku kanak-kanak pemalu.',
        ],
    ],
    [
    'section' => 'Penerapan Nilai Murni, Kerohanian dan Moral',
        'subSections' => [
            'Pendidik/pengasuh melatih kanak-kanak mengucapkan salam.',
            'Pendidik/pengasuh melatih kanak-kanak mengucapkan terima kasih.',
            'Pendidik/pengasuh melatih kanak-kanak meminta izin jika hendak keluar/bercakap.',
            'Pendidik/pengasuh memberi latihan amalan kerohanian dan moral kepada kanak-kanak.',
        ],
    ],
];
@endphp
<?php
    $ya = $tidak = 0;
    if ($skpak) {
        $penilaian3 = json_decode($skpak->penilaian3, true);
        foreach ($penilaian3 as $key => $value) {
            if ($value == 'YA') {
                $ya = ++$ya;
            }
            if ($value == 'TIDAK') {
                $tidak = ++$tidak;
            }
        }
    } else {
        $penilaian3 = null;
    }
?>
<h5 class="card-title fw-bolder">
    PENGURUSAN ASPEK ASUHAN BAYI DAN KANAK-KANAK
</h5>

<hr>
<form id="penilaian3">
<input type="hidden" name="skpak_id" value="{{$skpak?->id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem3">
        <thead>
            <tr>
                <th>Perincian Item</th>
                <th>Ya</th>
                <th>Tidak</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items_3 as $index => $item_3)
                <tr>
                    <td colspan="3" class="bg-light-primary text-uppercase">
                        {{ $item_3['section'] }}
                    </td>
                </tr>
                @foreach ($item_3['subSections'] as $subsection_item3)
                <?php 
                        $name = $index.'_'.$loop->index;
                    ?>
                    <tr>
                        <td>{{ $subsection_item3 }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input" type="radio" name="{{ $index }}_{{ $loop->index }}" id="ya_{{ $index }}_{{ $loop->index }}" value="YA" @if($penilaian3 && $penilaian3[$name] == 'YA') checked @endif {{$disabled}}>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input" type="radio" name="{{ $index }}_{{ $loop->index }}" id="tidak_{{ $index }}_{{ $loop->index }}" value="TIDAK" @if($penilaian3 && $penilaian3[$name] == 'TIDAK') checked @endif {{$disabled}}>
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
                <td class="text-center" id="YA">{{$ya}}</td>
                <td class="text-center" id="TIDAK">{{$tidak}}</td>
            </tr>
        </tfoot>
    </table>
</div>

<hr>
@if(empty($disabled))
<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right formdd" onclick="submitp3()">Simpan</button>
</div>
@endif
</form>

<script>
    function submitp3() {
        var formData = new FormData(document.getElementById('penilaian3'));
        var error = false;

         $('form#penilaian3').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name="+this.name+"]:checked", '#penilaian3').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-skpak', ['tab' => 'penilaian3']) }}"
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
                    // var location = "{{route('skpak.skpak_baru', ['id' => ':id'])}}";
                    // var location = location.replace(':id', id);
                    // window.location.href = location;
               }
            }
        });

    };
</script>
