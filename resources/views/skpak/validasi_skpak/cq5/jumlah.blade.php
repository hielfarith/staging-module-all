<style>
    #jumlah-cq-5 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #jumlah-cq-5 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #jumlah-cq-5 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
     $jumlahs_sq5 = [
        [
            'section' => 'Pentadbiran',
            'subSections' => [
                'Falsafah, visi dan misi (mempamerkan misi, visi, falsafah dan berkongsi dengan pemegang taruh- pendidik/ ibu bapa/ staf sokongan)',
                'Polisi dan garis panduan (mempunyai polisi dan garis panduan yang jelas dan dimaklumkan)',
                'Pengurusan rekod pentadbiran TASKA (mempunyai rekod pentadbiran, dikemaskini dan disimpan dengan cara yang sistematik/ mudah diakses)',
                'Pengurusan rekod staf (mempunyai semua rekod staf, dikemaskini dan disimpan dengan cara yang sistematik/ mudah diakses)',
                'Kelayakan (pendidik mempunyai sijil KAP dan kelayakan sesuai)',
                'Kebajikan staf (kebajikan seperti- gaji minimum, PERKESO, KWSP, ruang rehat/ solat/ tandas/ simpan barang, cuti pendidik)',
                'Nisbah pendidik dan kanak-kanak (nisbah- mengikut nisbah yang ditetapkan oleh JKM)',
                'Pengurusan rekod kanak-kanak (rekod kanak-kanak dikemaskini dan disimpan dengan sistematik)',
            ]
        ],
        [
            'section' => 'Profesionalisme dan Etika',
            'subSections' => [
                'Latihan dan Peningkatan berterusan (semua pendidik menghadiri latihan setiap tahun)',
                'Etika profesionalisme (semua pendidik mematuhi etika profesionalisme TASKA) (rujuk panduan bagi etika profesionalisme pendidik/ pengasuh)',
                'Penilaian Pendidik (pengurusan menjalankan penilaian kepada pendidik)',
                'Pemantauan daripada Agensi (TASKA dinilai oleh pihak pemantau yang berkelayakkan, diberi maklum balas dan mempunyai rekod terhadap pemantauan).',
                'Peningkatan kerjaya (berkongsi maklumat peningkatan kerjaya dan menggalakan peningkatan kerjaya) (peningkatan kerjaya: sambung belajar atau peluang kenaikkan pangkat)',
            ]
        ],
    ];
@endphp

<h5 class="card-title fw-bolder text-uppercase">
    PENTADBIRAN DAN PENGURUSAN
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="jumlah-cq-5">
        <thead>
            <tr>
                <th>Kriteria</th>
                <th width="10%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jumlahs_sq5 as $index => $jumlah_sq5)
                <tr>
                    <td colspan="5" class="bg-light-primary text-uppercase">
                        {{ $jumlah_sq5['section'] }}
                    </td>
                </tr>
                @foreach ($jumlah_sq5['subSections'] as $subsection_sq5)
                    <tr>
                        <td>{{ $subsection_sq5 }}</td>
                        <td>Auto-calculated</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-primary">
                <td class="text-end">Jumlah</td>
                <td>Auto-calculated</td>
            </tr>
        </tfoot>
    </table>

    <div class="col-md-12 mt-2">
        <label class="fw-bolder">Ulasan</label>
        <textarea name="" id="" rows="3" class="form-control"></textarea>
    </div>
</div>

<hr>

<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitform1()">Simpan</button>
</div>
