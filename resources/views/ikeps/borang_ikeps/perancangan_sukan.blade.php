<form id="perSukForm" action="{{ route('ikeps.store', 'perancangan_sukan') }}" method="POST">
@csrf

<div class="row">

    <div class="col-md-2 mt-2 mb-2">
        <label class="form-label fw-bold">Kod Sekolah</label>
        <input type="text" class="form-control" id="" name="" value="" disabled>
    </div>

    <div class="col-md-10 mt-2 mb-2">
        <label class="form-label fw-bold">Nama Sekolah</label>
        <input type="text" class="form-control" id="" name="" value="" disabled>
    </div>
</div>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hovered">
        <thead>
            <tr>
                <th>Adakah Sekolah Mempunyai Perancangan Program Sukan Di Sekolah?</th>
                <th style="width: 10%">Ada</th>
                <th style="width: 10%">Tiada</th>
                <th style="width: 10%">Dilaksanakan Setiap Tahun</th>
                <th style="width: 10%">Mengikut Keperluan/ Pertandingan</th>
                <th style="width: 20%">Kenyataan Program yang Dijalankan</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $perancangans = [
                    'sukan_utama' => '1. Sukan Utama (Sekolah Berwatak dalam Sukan)',
                    'inisiatif_sekolah' => '2. Inisiatif Sekolah Mewujudkan Program Pembangunan Bakat Sukan',
                    'projek_msn' => '3. Projek Sukan Sekolah Dengan Majlis Sukan Negeri/ Majlis Sukan Negara (MSN)/ Kementerian Belia dan Sukan (KBS)/ atau Persatuan Sukan Kebangsaan',
                    'projek_kpm' => '4. Projek/ Program Sukan Disekolah yang Dianjurkan oleh Kementerian Pendidikan Malaysia',
                    'ladap' => '5. In House Training Pengurusan Sukan di Sekolah (Latihan Dalam Perkhidmatan LADAP)'
                ];
                $kursuses = [
                    'pengurusan_sukan' => '6.1 Kursus Pengurusan Sukan',
                    'kejurulatihan' => '6.2 Kursus Kejurulatihan',
                    'kepegawaian' => '6.3 Kursus Kepegawaian',
                    'sains_sukan' => '6.4 Kursus Sains Sukan'
                ];
                $ada_tiadas = [
                    'ada' => 1,
                    'tiada' => 0
                ];
            ?>

            @foreach($perancangans as $rancangKey => $perancangan)
                <tr>
                    <td> {{ $perancangan }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $rancangKey }}" id="{{ $rancangKey.'_'.$id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $rancangKey.'_butiran' }}" id="{{ $rancangKey.'_butiran_1' }}" value="1">
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $rancangKey.'_butiran' }}" id="{{ $rancangKey.'_butiran_2' }}" value="2">
                        </div>
                    </td>

                    <td>
                        <select name="{{ $rancangKey.'_program' }}" id="{{ $rancangKey.'_program' }}" class="form-control select2">
                            <option value="" hidden>Kenyataan Program</option>
                            <option value="1">Olahraga</option>
                            <option value="2">Merentas Desa</option>
                        </select>
                    </td>
                </tr>
            @endforeach

            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        6. Penyertaan Guru Dalam Kursus Peningkatan Profesionalisme Sukan (Kejurulatihan/Kepegawaian) anjuran KPM/JPN/PPD/MSN/Persatuan Sukan Kebangsaan/KBS
                    </h5>
                </td>
            </tr>

            @foreach($kursuses as $kursusKey => $kursus)
                <tr>
                    <td> {{ $kursus }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $kursusKey }}" id="{{ $kursusKey.'_'.$id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $kursusKey.'_butiran' }}" id="{{ $kursusKey.'_butiran_1' }}" value="1">
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $kursusKey.'_butiran' }}" id="{{ $kursusKey.'_butiran_2' }}" value="2">
                        </div>
                    </td>

                    <td class="text-danger">
                        Maklumat Tidak Berkenaan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<br>
<?php
    //$segment = Request::segment(3);
?>
{{-- @if($segment != 'sedia-ada') --}}
@if(!$checkReadOnly)
<div class="d-flex justify-content-center">
    <button type="button" class="btn btn-primary" onclick="submitTab('#perSukForm')">Simpan</button>
</div>
@endif
<br>

</form>

<div class="card-footer">
    <div class="d-flex justify-content-between">
        <button class="btn btn-outline-secondary prev-tab">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Kembali</span>
        </button>
        <button class="btn btn-primary next-tab">
            <span class="align-middle d-sm-inline-block d-none">Seterusnya</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>
