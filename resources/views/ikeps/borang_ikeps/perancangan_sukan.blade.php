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
                <th>Ada</th>
                <th>Tiada</th>
                <th>Dilaksanakan Setiap Tahun</th>
                <th>Mengikut Keperluan/ Pertandingan</th>
                <th>Kenyataan Program yang Dijalankan</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $perancangans = ['1. Sukan Utama (Sekolah Berwatak dalam Sukan)',
                                '2. Inisiatif Sekolah Mewujudkan Program Pembangunan Bakat Sukan',
                                '3. Projek Sukan Sekolah Dengan Majlis Sukan Negeri/ Majlis Sukan Negara (MSN)/ Kementerian Belia dan Sukan (KBS)/ atau Persatuan Sukan Kebangsaan',
                                '4. Projek/ Program Sukan Disekolah yang Dianjurkan oleh Kementerian Pendidikan Malaysia',
                                '5. In House Training Pengurusan Sukan di Sekolah (Latihan Dalam Perkhidmatan LADAP)'
                                ];
                $kursuses = ['6.1 Kursus Pengurusan Sukan',
                            '6.2 Kursus Kejurulatihan',
                            '6.3 Kursus Kepegawaian',
                            '6.4 Kursus Sains Sukan'
                            ];
                $ada_tiadas = ['ada' => 1, 'tiada' => 2];
            ?>

            @foreach($perancangans as $perancangan)
                <tr>
                    <td> {{ $perancangan }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ada_tiada" id="{{ $id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dilaksanakan_tiap_tahun" id="ya" value="ya">
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mengikut_keperluan" id="ya" value="ya">
                        </div>
                    </td>

                    <td>
                        <select name="" id="" class="form-control select2">
                            <option value="" hidden>Kenyataan Program</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
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

            @foreach($kursuses as $kursus)
                <tr>
                    <td> {{ $kursus }} </td>
                    @foreach ($ada_tiadas as $id => $ada_tiada)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ada_tiada" id="{{ $id }}" value="{{ $ada_tiada }}">
                            </div>
                        </td>
                    @endforeach

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="dilaksanakan_tiap_tahun" id="ya" value="ya">
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="mengikut_keperluan" id="ya" value="ya">
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
