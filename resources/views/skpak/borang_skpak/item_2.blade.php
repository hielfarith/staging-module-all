<style>
    #NilaiItem2 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem2 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #NilaiItem2 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

@php
$items_2 = [
    [
    'section' => 'PERATURAN KESELAMATAN DI TASKA',
        'subSections' => [
            'Pelan kebakaran yang jelas dan mudah difahami dipamerkan.',
            'TASKA mempunyai alat pemadam api yang belum tamat tempoh.',
            'TASKA meletakkan alat pemadam api di tempat yang ditetapkan oleh Bomba.',
            'TASKA mengadakan latihan berkaitan pengungsian premis setiap 3 bulan.',
            'Pendidik/pengasuh tahu menggunakan alat pemadam api.',
            'Pintu utama sentiasa berkunci.',
            'Semua kunci dilabel dan diletak di tempat yang mudah diakses oleh pendidik/ pengasuh.',
            'TASKA menyediakan peti pertolongan cemas yang lengkap dan kemaskini.',
            'Peti pertolongan cemas disimpan di tempat yang selamat dan mudah dicapai oleh pendidik/pengasuh.',
            'Tanda larangan merokok dipamerkan.',
            'Prosedur keselamatan di kawasan permainan luar dipatuhi.',
            'Pintu pagar sentiasa berkunci.',
            'Pintu utama premis dan pintu lain TASKA ditutup, berjeriji dan dikunci.',
            'Kunci pintu dilabel dan diletakkan di tempat yang mudah dicapai.',
            'Semua peralatan permainan luar berada dalam keadaan bersih dan diselenggara.',
            'TASKA mempunyai tong sampah yang mencukupi.',
            'Tidak terdapat tempat air bertakung di sekitar TASKA.',
            'Longkang sentiasa bertutup.',
            'TASKA membuat kawalan serangga (pest control) secara berkala.',
        ]
    ],
    [
    'section' => 'KESELAMATAN BAYI DAN KANAK-KANAK',
        'subSections' => [
            'TASKA menyediakan pendidik/pengasuh yang ditugaskan untuk mengawasi bayi dan kanak-kanak.',
            'Pakaian yang sesuai digunakan mengikut keperluan aktiviti.',
        ]
    ],
    [
    'section' => 'PEMERIKSAAN DAN PENJAGAAN KESIHATAN BAYI DAN KANAK-KANAK',
        'subSections' => [
            'Terdapat rekod kesihatan (carta pertumbuhan ketinggian, berat badan dan lilitan kepala) lengkap dan dikemaskini.',
            'Laporan saringan kesihatan dan susulan boleh diakses.',
            'Terdapat rekod kesihatan bayi/kanak-kanak dalam buku log harian.',
            'Pemeriksaan Pergigian dijalankan oleh Pegawai Kesihatan secara berkala.',
            'Terdapat garis panduan mengenali tanda-tanda awal penyakit biasa dan berjangkit dalam kalangan bayi dan kanak-kanak.',
            'Terdapat bilik/ruang sakit sementara untuk kanak-kanak yang sakit.',
            'Terdapat peraturan tidak membenarkan kanak-kanak yang sakit hadir ke TASKA (demam, cirit birit atau apa-apa penyakit berjangkit).',
            'Kanak-kanak yang sakit diasingkan daripada kanak-kanak lain, sementara menunggu ibu bapa datang mengambilnya.',
            'Terdapat buku log harian pemeriksaan kesihatan bayi/kanak-kanak.',
            'Rawatan awal kecederaan.',
            'Pendidik mencatat kecederaan atau kemalangan di dalam buku log harian kanak-kanak.',
        ]
    ],
    [
    'section' => 'Kebersihan TASKA.',
        'subSections' => [
            'TASKA melaksanakan pembersihan dan pembasmian kuman mengikut SOP.',
            'Bebas bau.',
            'Bebas habuk.',
            'Bebas serangga.',
            'Bebas kuman.',
            'Pengudaraan yang baik.',
            'Terdapat peralatan pembersihan seperti mop, berus, penyapu atau penyedut hampagas (vacuum cleaner).',
            'Terdapat rekod pembersihan berjadual.',
            'TASKA berada dalam keadaan kondusif, bebas bau, bebas habuk, bebas serangga, bebas kuman, pengudaraan yang baik, mesra bayi/kanak-kanak.',
            'TASKA melaksanakan pembersihan dan pembasmian kuman secara berkala.',
            'Sinki dalam keadaan bersih dengan ketinggian yang sesuai. Sabun pencuci tangan dan tuala/tisu disediakan.',
            'Lantai disapu dan dimop setiap hari. Dibersihkan jika perlu (seperti tertumpah air dan lain-lain yang perlu dibersihkan dengan segera).',
            'Terdapat tong sampah yang bertutup.',
            'Peralatan penyusuan bayi/kanak-kanak dibersihkan dan dinyah kuman dan disimpan dalam bekas bertutup.',
            'Penyediaan susu dan makanan bayi/kanak-kanak mengikut SOP.',
            'Kebersihan bayi dan kanak-kanak.',
            'Terdapat jadual kebersihan diri bayi dan kanak-kanak.',
            'Terdapat jadual pemeriksaan kuku dan rambut semua bayi/kanak-kanak.',
            'Terdapat tempat penyimpanan peralatan dan pakaian bayi dan kanak-kanak.',
            'Peralatan pembelajaran dan barang permainan bayi/kanak-kanak berada dalam keadaan bersih.',
        ]
    ],
    [
    'section' => 'KUALITI PEMAKANAN BAYI DAN KANAK-KANAK',
        'subSections' => [
            'Penyediaan makanan bayi dan kanak-kanak adalah mengikut peraturan-peraturan Taman Asuhan Kanak-kanak 2012 dan amalan pemakanan sihat.',
            'Semua kakitangan mempunyai Sijil pengendalian makanan dan suntikan typhoid yang sah (TY2) yang dikeluarkan oleh Pegawai Kesihatan.',
            'Terdapat menu harian makanan seimbang yang dipamerkan.',
            'Semua makanan ditutup.',
            'Penyusuan bayi dan makanan pelengkap.',
        ]
    ]
];
@endphp
<?php
    $ya = $tidak = 0;
    if ($skpak) {
        $penilaian2 = json_decode($skpak->penilaian2, true);
        foreach ($penilaian2 as $key => $value) {
            if ($value == 'YA') {
                $ya = ++$ya;
            }
            if ($value == 'TIDAK') {
                $tidak = ++$tidak;
            }
        }
    } else {
        $penilaian2 = null;
    }
?>
<h5 class="card-title fw-bolder">
    KESELAMATAN, KESIHATAN DAN KEBERSIHAN PERSEKITARAN FIZIKAL SERTA KUALITI PEMAKANAN BAYI DAN KANAK-KANAK
</h5>

<hr>
<form id="penilaian2">
<input type="hidden" name="skpak_id" value="{{$skpak?->id}}">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem2">
        <thead>
            <tr>
                <th>Perincian Item</th>
                <th>Ya</th>
                <th>Tidak</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items_2 as $index => $item_2)
                <tr>
                    <td colspan="3" class="bg-light-primary text-uppercase">
                        {{ $item_2['section'] }}
                    </td>
                </tr>
                @foreach ($item_2['subSections'] as $subsection_item2)
                    <?php 
                        $name = $index.'_'.$loop->index;
                    ?>
                    <tr>
                        <td>{{ $subsection_item2 }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="ya_{{ $index }}_{{ $loop->index }}" value="YA" @if($penilaian2 && $penilaian2[$name] == 'YA') checked @endif {{$disabled}}>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-check-input radio-input-2" type="radio" name="{{ $index }}_{{ $loop->index }}" id="tidak_{{ $index }}_{{ $loop->index }}" value="TIDAK" @if($penilaian2 && $penilaian2[$name] == 'TIDAK') checked @endif {{$disabled}}>
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
    <button type="button" class="btn btn-primary float-right formdd" onclick="submitp2()">Simpan</button>
</div>
@endif
</form>


<script>
    function submitp2() {
        var formData = new FormData(document.getElementById('penilaian2'));
        var error = false;

         $('form#penilaian2').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name="+this.name+"]:checked", '#penilaian2').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-skpak', ['tab' => 'penilaian2']) }}"
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
