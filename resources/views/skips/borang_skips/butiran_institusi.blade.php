
<form id="butiran_institusi_tab1" novalidate="novalidate">
    <ul class="nav nav-pills nav-justified" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder active" id="institusi-tab" data-bs-toggle="tab"
                href="#institusi" aria-controls="institusi" role="tab" aria-selected="true"
                onclick="tabclicked('#institusi')">
                BUTIRAN INSTITUSI
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="guru-tab" data-bs-toggle="tab" href="#guru"
                aria-controls="guru" role="tab" aria-selected="false">
                BUTIRAN GURU
            </a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="pelajar-tab" data-bs-toggle="tab" href="#pelajar"
                aria-controls="pelajar" role="tab" aria-selected="false">
                BUTIRAN PELAJAR
            </a>
        </li>
        <!-- Add more tabs if needed -->
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="institusi" role="tabpanel" aria-labelledby="institusi-tab">
            <div class="row">
                <h5 class="mb-2 mt-1 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Institusi
                    </span>
                </h5>
                <input type="hidden" name="nama_institusi" id="nama_institusi">
                <input type="hidden" name="butiran_institusi_id" id="butiran_institusi_id" value="{{$butiran_id}}">
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase">Nama Institusi
                        <span class="text-danger">*</span>
                    </label>
                    <select name="institusi_id" id="institusi_id" class="form-control select2" required
                         onchange="updateInstitusi(this)" {{$disabled}}>
                        <option value="">Sila Pilih</option>
                        @foreach ($allInstitutes as $id => $nama)
                            <option value="{{ $nama }}">
                                {{ $nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase">Nama Pengurus
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="nama_pengurus" id="nama_pengurus" class="form-control">
                </div>


                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase">Nama Pengerusi
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="nama_pengerusi" id="nama_pengerusi" class="form-control">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Alamat
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" class="form-control" required  name="alamat"
                        id="alamat" value="">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Alamat2
                    </label>
                    <input {{$disabled}} type="text" class="form-control" required  name="alamat2"
                        value="" id="alamat_2">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Alamat3
                    </label>
                    <input {{$disabled}} type="text" class="form-control" required  name="alamat3"
                        value="" id="alamat_3">
                </div>
                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Negeri
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" class="form-control" name="negeri" id="negeri" required
                         value="">

                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase">Daerah
                    </label>
                    <input {{$disabled}} type="text" class="form-control" name="daerah" id="daerah" required 
                        value="">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase">Poskod
                    </label>
                    <input {{$disabled}} type="text" class="form-control" name="poskod" id="poskod" required 
                        value="">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase">No. Telefon
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="no_telephone" id="no_telephone" class="form-control" required
                         value="">

                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase"> No. Faks
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="fax" id="fax" class="form-control" required 
                        value="">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Alamat Emel
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="email" name="email" id="email" class="form-control" required
                         value="">

                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Laman Web
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="laman_web" id="laman_web" class="form-control" required 
                        value="">
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Pendaftaran
                    </span>
                </h5>

                <div class="col-md-12 mb-1">
                    <label class="form-label fw-bold text-titlecase">Mempunyai Surat Kelulusan
                        KDN?</label>
                    <input {{$disabled}} type="radio" id="mempunyai_surat_kelulusan_kdn_yes" name="mempunyai_surat_kelulusan_kdn" value="yes">
                    <label for="mempunyai_surat_kelulusan_kdn_yes">Ada</label>
                    <input {{$disabled}} type="radio" id="mempunyai_surat_kelulusan_kdn_no" name="mempunyai_surat_kelulusan_kdn" value="no">
                    <label for="kdn_approval_no">Tiada</label>
                </div>

                <div class="col-md-4 mb-1" id="kdn_approval_div" style="display: none;">
                    <label class="form-label fw-bold text-titlecase"> No. Surat Kelulusan KDN
                        <span class="text-danger"></span>
                    </label>
                    <input {{$disabled}} type="text" name="no_surat_kelulusan_kdn" class="form-control" required
                         value="">

                    <label class="form-label fw-bold text-titlecase mt-1"> Tarikh Tamat Kelulusan KDN
                        <span class="text-danger"></span>
                    </label>
                    <input {{$disabled}} type="text" id="" name="tarikh_tamat_kelulusan_kdn"
                        class="form-control flatpickr" placeholder="d/m/Y" required 
                        value="">

                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> No. Perakuan Pendaftaran
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="no_perakuan_pendaftaran" class="form-control" required
                         value="">


                    <label class="form-label fw-bold text-titlecase mt-1"> Tarikh Tamat Perakuan
                        Pendaftaran
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" id="" name="tarikh_tamat_perakuan_pendaftaran" class="form-control flatpickr"
                        placeholder="d/m/Y" required  value="">

                </div>


                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> No. Pendaftaran Syarikat
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="no_pendaftaran_syarikat" class="form-control" required
                         value="">

                    <label class="form-label fw-bold text-titlecase mt-1"> No. Lesen Perniagaan
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="no_lesen_perniagaan" class="form-control" required
                         value="">
                </div>

                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Laporan Kewangan
                    </span>
                </h5>

                <div class="col-md-12 mb-1">
                    <label class="form-label fw-bold text-titlecase">Mempunyai Audit Kewangan?</label>
                    <input {{$disabled}} type="radio" id="mempunyai_audit_kewangan_yes" name="mempunyai_audit_kewangan" value="yes" onclick="toggleAuditDiv(true)">
                    <label for="mempunyai_audit_kewangan_yes">Ada</label>
                    <input {{$disabled}} type="radio" id="mempunyai_audit_kewangan_no" name="mempunyai_audit_kewangan" value="no"
                        onclick="toggleAuditDiv(false)">
                    <label for="audit_approval_no">Tiada</label>
                </div>

                <div class="col-md-4 mb-1" id="audit_approval_div" style="display: none;">
                    <label class="form-label fw-bold text-titlecase"> Tarikh Audit
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" id="" name="tarikh_audit" class="form-control flatpickr" required
                         value="">
                </div>

                <div class="col-md-12 mb-1">
                    <label class="form-label fw-bold text-titlecase">Mempunyai Laporan Audit?</label>
                    <input {{$disabled}} type="radio" id="mempunyai_laporan_audit_yes" name="mempunyai_laporan_audit" value="yes"
                        onclick="toggleLaporanDiv(true)">
                    <label for="mempunyai_laporan_audit_yes">Ada</label>
                    <input {{$disabled}} type="radio" id="mempunyai_laporan_audit_no" name="mempunyai_laporan_audit" value="no"
                        onclick="toggleLaporanDiv(false)">
                    <label for="mempunyai_laporan_audit_no">Tiada</label>
                </div>


                <div class="col-md-4 mb-1" id="laporan_approval_div" style="display: none;">
                    <label class="form-label fw-bold text-titlecase"> Tarikh Lapor
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" id="" name="tarikh_lapor" class="form-control flatpickr" required
                         value="">

                </div>

                <hr>
                 @if($type != 'laporan')
                <div class="d-flex justify-content-end align-items-center mt-1">
                    <button type="button" onclick="submit1('butiran_institusi')" class="btn btn-primary float-right">Simpan</button>
                </div>
                @endif
            </div>
        </div>

        <div class="tab-pane fade" id="guru" role="tabpanel" aria-labelledby="guru-tab">
            <div class="row">
                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Guru Warganegara
                    </span>
                </h5>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Lelaki
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="bilangan_guru_lelaki" class="form-control" required>
                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Perempuan
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="bilangan_guru_perempuan" class="form-control" required>

                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="bilangan_guru_keseluruhan" class="form-control" required
                         value="">

                </div>

                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Guru Bukan Warganegara
                    </span>
                </h5>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Lelaki
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="bilangan_guru_lelakiBukanWarganegara" class="form-control" required>
                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Perempuan
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="bilangan_guru_perempuanBukanWarganegara" class="form-control"
                        required>

                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" id="" name="pecahan_antarabangsa" class="form-control" required
                         value="" placeholder="Antarabangsa">

                </div>
                 @if($type != 'laporan')
                <div class="d-flex justify-content-end align-items-center mt-1">
                    <button type="button" onclick="submit1('guru')" class="btn btn-primary float-right">Simpan</button>
                </div>
                @endif
            </div>
        </div>

        <div class="tab-pane fade" id="pelajar" role="tabpanel" aria-labelledby="pelajar-tab">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Pelajar Warganegara
                    </span>
                </h5>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Lelaki
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" id="" name="bilangan_pelajar_lelaki" class="form-control"
                        required  value="" placeholder="Lelaki">

                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Perempuan
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" id="" name="bilangan_pelajar_perempuan" class="form-control"
                        required  value="" placeholder="Perempuan">


                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="bilangan_pelajar_keseluruhan" class="form-control" required
                         value="">

                </div>

                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Pelajar Bukan Warganegara
                    </span>
                </h5>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Lelaki
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" id="" name="bilangan_pelajar_lelaki_warganegara" class="form-control" required
                        value="" placeholder="Lelaki">

                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Perempuan
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" id="" name="bilangan_pelajar_perempuan_warganegara" class="form-control"
                        required  value=""  placeholder="Perempuan">

                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input {{$disabled}} type="text" name="bilangan_pelajar_keseluruhan_warganegara" class="form-control" required
                         value="">

                </div>
                @if($type != 'laporan')
                <div class="d-flex justify-content-end align-items-center mt-1">
                    <button type="button" onclick="submit1('pelajar')" class="btn btn-primary float-right">Simpan</button>
                </div>
                @endif
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
        var APIUrl = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/pull-data';

        $.ajax({
            url: APIUrl,
            method: 'POST',
            data: {
                id: butiranid
            },
            success: function(response) {
                if (response.status == 'success') {
                    var radio = ['mempunyai_audit_kewangan','mempunyai_laporan_audit','mempunyai_surat_kelulusan_kdn'];

                    $('#institusi_id').select2().val(response.data['nama_institusi']).trigger("change");
                    for (const [key, value] of Object.entries(response.data)) {
                        if (jQuery.inArray(key, radio) !== -1 ) {
                            $("#"+key+'_'+value).attr('checked', true).trigger('click');;
                        } else {
                            $("input[name='"+key +"']").val(value);
                        }
                    }
                    if (response.guru != '') {

                        for (const [key, value] of Object.entries(response.guru)) {
                            if (jQuery.inArray(key, radio) !== -1 ) {
                                $("#"+key+'_'+value).attr('checked', true).trigger('click');;
                            } else {
                                $("input[name='"+key +"']").val(value);
                            }
                        }
                    }
                    if (response.pelajar != '') {
                        for (const [key, value] of Object.entries(response.pelajar)) {
                            if (jQuery.inArray(key, radio) !== -1 ) {
                                $("#"+key+'_'+value).attr('checked', true).trigger('click');;
                            } else {
                                $("input[name='"+key +"']").val(value);
                            }
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
    $("#institusi_id").trigger('change');
    

    function updateInstitusi(institusi) {
        id = institusi.value;
        var url = "{{ route('skips.choose-institute-details') }}";
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {
                if (response.success) {
                    var institutedata = response.data;
                    if (institutedata) {
                        $('#nama_institusi').val(institutedata.nama);
                        if (institutedata.no_tel) {
                            $('#no_telephone').val(institutedata.no_tel);
                        } else {
                            $('#no_telephone').removeAttr('readonly')
                        }
                        if (institutedata.email) {
                            $('#email').val(institutedata.email);
                        } else {
                            $('#email').removeAttr('readonly')
                        }

                        if (institutedata.alamat) {
                            $('#alamat').val(institutedata.alamat);
                        } else {
                            $('#alamat').removeAttr('readonly')
                        }

                        if (institutedata.negeri) {
                            $('#negeri').val(institutedata.negeri);
                        } else {
                            $('#negeri').removeAttr('readonly')
                        }
                        if (institutedata.nama_pengetua_gurubesar) {
                            $('#nama_pengetua').val(institutedata.nama_pengetua_gurubesar);
                        } else {
                            // $('#nama_pengetua').removeAttr('readonly')
                        }

                        $('#alamat2').val(institutedata.alamat_2);
                        $('#alamat3').val(institutedata.alamat_3);
                        $('#poskod').val(institutedata.poskod);
                        $('#daerah').val(institutedata.daerah);

                    }
                }
            }
        });
    }

    // Get the radio buttons for Yes and No
    const radioYes = document.getElementById('mempunyai_surat_kelulusan_kdn_yes');
    const radioNo = document.getElementById('mempunyai_surat_kelulusan_kdn_no');
    // Get the div element to be toggled
    const div = document.getElementById('kdn_approval_div');

    // Add event listener to radio buttons
    radioYes.addEventListener('change', toggleDiv);
    radioNo.addEventListener('change', toggleDiv);

    // Function to toggle visibility of the div
    function toggleDiv() {
        // If "Yes" is selected, show the div, otherwise hide it
        if (radioYes.checked) {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    }

    function toggleAuditDiv(hasAudit) {
        var auditDiv = document.getElementById('audit_approval_div');
        if (hasAudit) {
            auditDiv.style.display = 'block';
        } else {
            auditDiv.style.display = 'none';
        }
    }

    function toggleLaporanDiv(hasLaporan) {
        var laporanDiv = document.getElementById('laporan_approval_div');
        if (hasLaporan) {
            laporanDiv.style.display = 'block';
        } else {
            laporanDiv.style.display = 'none';
        }
    }

    function  submit1(tab) {
        var formData = new FormData(document.getElementById('butiran_institusi_tab1'));
        formData.append("tab", tab);

        var APIUrl = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/save';

        $.ajax({
            url: APIUrl,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 'success') {
                    $('#butiran_institusi_id').val(response.data.id)
                    Swal.fire('Success', 'Berjaya', 'success');
                    if (tab == 'butiran_institusi') {
                        var url = "{{ route('skips.skips_baru', ['id' => ':id']) }}";
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
