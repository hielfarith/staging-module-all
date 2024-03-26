<form id="butiran_institut_sekolah" novalidate="novalidate">

    <ul class="nav nav-pills nav-justified" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder active" id="swasta-tab" data-bs-toggle="tab"
                href="#swasta" aria-controls="swasta" role="tab" aria-selected="true"
                onclick="tabclicked('#swasta')">
                MAKLUMAT INSTITUSI PENDIDIKAN SWASTA
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="swasta-guru-tab" data-bs-toggle="tab"
                href="#swasta-guru" aria-controls="swasta-guru" role="tab" aria-selected="false">
                BUTIRAN GURU & STAF
            </a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="swasta-murid-tab" data-bs-toggle="tab"
                href="#swasta-murid" aria-controls="swasta-murid" role="tab" aria-selected="false">
                BUTIRAN PELAJAR
            </a>
        </li>
        <!-- Add more tabs if needed -->
    </ul>


    <div class="tab-content">
        <div class="tab-pane active" id="swasta" role="tabpanel" aria-labelledby="swasta-tab">
            <div class="row">
                <h5 class="mb-2 mt-1 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Institusi Pendidikan Swasta
                    </span>
                </h5>
                <hr>
                <input type="hidden" name="butiran_institusi_id_sekolah" id="butiran_institusi_id_sekolah" value="{{$butiran_id}}">

                <div class="col-md-6 mb-1">
                    <label class="form-label fw-bold text-titlecase">Kod Sekolah
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="kod_sekolah" id="kod_sekolah" class="form-control">
                </div>

                <div class="col-md-6 mb-1">
                    <label class="form-label fw-bold text-titlecase">Nama Institut
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="nama_institusi" id="nama_institusi" class="form-control">
                </div>



                <div class="col-md-6 mb-1">
                    <label class="fw-bold form-label">Alamat 1
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="alamat" id="alamat">
                </div>

                <div class="col-md-6 mb-1">
                    <label class="fw-bold form-label">Alamat 2
                    </label>
                    <input type="text" class="form-control" name="alamat2" id="alamat2">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Negeri
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="negeri" id="negeri">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase">Daerah
                    </label>
                    <input type="text" class="form-control" name="daerah">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase">Bandar
                    </label>
                    <input type="text" class="form-control" id="Bandar" name="bandar">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase">Poskod
                    </label>
                    <input type="text" class="form-control" id="poskod" name="poskod">
                </div>


                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase">No. Telefon Pejabat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="no_telephone" id="noTelPejabat" class="form-control">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase"> E-mel Sekolah
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="email" id="emelSekolah" class="form-control">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Jenis Perakuan Pendaftaran
                        <span class="text-danger">*</span>
                    </label>
                    <select name="jenis_perakuan_pendaftaran" id="perakuan" class="form-control">
                        <option value="Kekal">Kekal</option>
                        <option value="Sementara">Sementara</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Tarikh Tamat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" name="tarikh_tamat" id="tarikh_tamat" class="form-control">
                </div>

                <div class="col-md-12 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Nama Syarikat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="nama_syarikat" id="nama_syarikat" class="form-control">
                </div>


                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> No. Pendaftaran Syarikat (SSM)
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="no_pendaftaran_syarikat" id="noPendaftaranSSM" class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Tarikh Audit Laporan Kewangan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" name="tarikh_audit_laporan_kewangan" id="tarikh_audit_laporan_kewangan" class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Tarikh Pengesahan Laporan Kewangan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" name="tarikh_pengesahan_laporan_kewangan" id="tarikh_pengesahan_laporan_kewangan" class="form-control">
                </div>
                <div class="d-flex justify-content-end align-items-center mt-1">
                    <button type="button" class="btn btn-primary float-right" onclick="submitsekolah('institusi')">Simpan</button>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="swasta-guru" role="tabpanel" aria-labelledby="swasta-guru-tab">
            <div class="row">
                <h5 class="mb-2 mt-1 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Guru
                    </span>
                </h5>
                <hr>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Lelaki Warganegara
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="guru_lelaki_warganegara" id="guru_lelaki_warganegara"
                        class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Lelaki Antarabangsa
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="guru_lelaki_bukan_warganegara" id="guru_lelaki_bukan_warganegara"
                        class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Jumlah Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="jumlah_guru_lelaki" id="jumlah_guru_lelaki" class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Perempuan Warganegara
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="guru_Perempuan_warganegara" id="guru_Perempuan_warganegara"
                        class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Perempuan Antarabangsa
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="guru_Perempuan_bukan_warganegara"
                        id="guru_Perempuan_bukan_warganegara" class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Jumlah Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="jumlah_guru_Perempuan" id="jumlah_guru_Perempuan"
                        class="form-control">
                </div>

                <hr>
                <h5 class="mb-2 mt-1 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Kakitangan
                    </span>
                </h5>
                <hr>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Lelaki Warganegara
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="guru_lelaki_kakitangan" id="guru_lelaki_kakitangan"
                        class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Lelaki Antarabangsa
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="kakitangan_lelaki_bukan_warganegara"
                        id="kakitangan_lelaki_bukan_warganegara" class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Jumlah Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="jumlah_kakitangan_lelaki" id="jumlah_kakitangan_lelaki"
                        class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Perempuan Warganegara
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="kakitangan_Perempuan_warganegara"
                        id="kakitangan_Perempuan_warganegara" class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Perempuan Antarabangsa
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="kakitangan_Perempuan_bukan_warganegara"
                        id="kakitangan_Perempuan_bukan_warganegara" class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Jumlah Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="jumlah_kakitangan_Perempuan" id="jumlah_kakitangan_Perempuan"
                        class="form-control">
                </div>

                <div class="d-flex justify-content-end align-items-center mt-1">
                    <button type="button" class="btn btn-primary float-right" onclick="submitsekolah('guru')">Simpan</button>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="swasta-murid" role="tabpanel" aria-labelledby="swasta-murid-tab">
            <div class="row">

                <h5 class="mb-2 mt-1 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Enrollmen Murid
                    </span>
                </h5>
                <hr>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Lelaki Warganegara
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="Murid_lelaki_warganegara" id="Murid_lelaki_warganegara"
                        class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Lelaki Antarabangsa
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="Murid_lelaki_bukan_warganegara" id="Murid_lelaki_bukan_warganegara"
                        class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Jumlah Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="jumlah_Murid_lelaki" id="jumlah_Murid_lelaki" class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Perempuan Warganegara
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="Murid_Perempuan_warganegara"
                        id="Murid_Perempuan_warganegara" class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Perempuan Antarabangsa
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="Murid_Perempuan_bukan_warganegara"
                        id="Murid_Perempuan_bukan_warganegara" class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Jumlah Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="jumlah_Murid_Perempuan" id="jumlah_Murid_Perempuan"
                        class="form-control">
                </div>



                <div class="d-flex justify-content-end align-items-center mt-1">
                    <button type="button" class="btn btn-primary float-right" onclick="submitsekolah('pelajar')">Simpan</button>
                </div>
            </div>
        </div>
    </div>

</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">

        $(document).ready(function() {
        var butiranid = $('#butiran_id').val();
        if (butiranid == '') {
            return false;
        }
        var APIUrl = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/pull-data-sekolah';

        $.ajax({
            url: APIUrl,
            method: 'POST',
            data: {
                id: butiranid
            },
            success: function(response) {
                if (response.status == 'success') {
                    console.log(response)
                    for (const [key, value] of Object.entries(response.data)) {
                        $("input[name='"+key +"']").val(value);
                    }

                    if (response.guru != '') {
                        for (const [key, value] of Object.entries(response.guru)) {
                            $("input[name='"+key +"']").val(value);
                        }
                    }

                    if (response.pelajar != '') {
                        for (const [key, value] of Object.entries(response.pelajar)) {
                            $("input[name='"+key +"']").val(value);
                        }
                    }

                }
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    function  submitsekolah(tab) {
         var formData = new FormData(document.getElementById('butiran_institut_sekolah'));
        formData.append("tab", tab);

        var APIUrl = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/save-sekolah';

        $.ajax({
            url: APIUrl,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 'success') {
                    $('#butiran_institusi_id_sekolah').val(response.data.id)
                    Swal.fire('Success', 'Berjaya', 'success');
                    if (tab == 'institusi') {
                        var url = "{{ route('skips.skips_sekolah', ['id' => ':id']) }}";
                        var url = url.replace(':id', response.data.id);
                        window.location.href = url;
                    }
                } else {
                    Swal.fire('Gagal', response.detail, 'error');
                }
            }
        });
    }
</script>