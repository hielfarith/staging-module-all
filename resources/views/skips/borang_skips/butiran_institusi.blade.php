<?php
$id = $butiran_id;
$checkforTambah = Request::segment(2);

if (!empty($id)) {
    $butiranInstitusi = \App\Models\ButiranInstitusiSkips::where('id', $id)->first();
} else {
    $butiranInstitusi = null;
}
if ((isset($type) && ($type == 'verfikasi' || $type == 'validasi')) || $type == 'done') {
    $disabled = 'disabled';
} else {
    $disabled = '';
}
$readonly = $name = '';
if ($type == 'borang') {
    $readonly = 'readonly';
    $name = \Auth::user()->name;
}
?>
<form id="butiran_institusi" novalidate="novalidate">
    {{-- <input type="hidden" name="butiranInstitusi_id" value="{{$butiranInstitusi?->id}}">
<input type="hidden" name="nama_institusi" id="nama_institusi" value="{{$butiranInstitusi?->nama_institusi}}"> --}}
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

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase">Nama Institusi
                        <span class="text-danger">*</span>
                    </label>
                    <select name="institusi_id" id="institusi_id" class="form-control select2" required
                        {{ $disabled }} onchange="updateInstitusi(this)">
                        <option value="">Sila Pilih</option>
                        @foreach ($allInstitutes as $id => $nama)
                            <option value="{{ $id }}" @if ($id == $butiranInstitusi?->institusi_id) selected @endif>
                                {{ $nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase">Nama Pengurus
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="nama_pengurus" id="nama_pengurus" class="form-control"
                        value="Ahmad bin Abu" disabled>
                </div>


                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase">Nama Pengerusi
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="nama_pengerusi" id="nama_pengerusi" class="form-control"
                        value="Ali bin Salim" disabled>
                </div>
                {{-- <div class="col-md-4 mb-1">
                        <label class="form-label fw-bold text-titlecase">Nama Pengetua
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="nama_pengetua" id="nama_pengetua"
                            class="form-control">
                    </div> --}}

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Alamat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" required {{ $disabled }} name="alamat"
                        id="alamat" {{ $readonly }} value="{{ $butiranInstitusi?->alamat }}">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Alamat2
                    </label>
                    <input type="text" class="form-control" required {{ $disabled }} id="alamat2"
                        {{ $readonly }} value="">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Alamat3
                    </label>
                    <input type="text" class="form-control" required {{ $disabled }} id="alamat3"
                        {{ $readonly }} value="">
                </div>
                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Negeri
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="negeri" id="negeri" required
                        {{ $disabled }} {{ $readonly }} value="{{ $butiranInstitusi?->negeri }}">

                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase">Daerah
                    </label>
                    <input type="text" class="form-control" id="daerah" required {{ $disabled }}
                        {{ $readonly }} value="{{ $butiranInstitusi?->no_telephone }}">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase">Poskod
                    </label>
                    <input type="text" class="form-control" id="poskod" required {{ $disabled }}
                        {{ $readonly }} value="{{ $butiranInstitusi?->no_telephone }}">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase">No. Telefon
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="no_telephone" id="no_telephone" class="form-control" required
                        {{ $disabled }} {{ $readonly }} value="{{ $butiranInstitusi?->no_telephone }}">

                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase"> No. Faks
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="fax" class="form-control" required {{ $disabled }}
                        value="{{ $butiranInstitusi?->fax }}">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Alamat Emel
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" name="email" id="email" class="form-control" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->email }}" {{ $readonly }}>

                </div>

                <div class="col-md-3 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Laman Web
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="laman_web" class="form-control" required {{ $disabled }}
                        value="{{ $butiranInstitusi?->laman_web }}">
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
                    <input type="radio" id="kdn_approval_yes" name="kdn_approval" value="yes" checked>
                    <label for="kdn_approval_yes">Ada</label>
                    <input type="radio" id="kdn_approval_no" name="kdn_approval" value="no" disabled>
                    <label for="kdn_approval_no">Tiada</label>
                </div>

                <div class="col-md-4 mb-1" id="kdn_approval_div" style="display: none;">
                    <label class="form-label fw-bold text-titlecase"> No. Surat Kelulusan KDN
                        <span class="text-danger"></span>
                    </label>
                    <input type="text" name="no_surat_kelulusan" class="form-control" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->no_surat_kelulusan }}">

                    <label class="form-label fw-bold text-titlecase mt-1"> Tarikh Tamat Kelulusan KDN
                        <span class="text-danger"></span>
                    </label>
                    <input type="text" id="" name="tarikh_tamat_kelulusan"
                        class="form-control flatpickr" placeholder="YYYY-MM-DD" required {{ $disabled }}
                        value="{{ $butiranInstitusi?->tarikh_tamat_kelulusan }}">

                </div>

                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> No. Perakuan Pendaftaran
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="no_pendaftaran_syarikat" class="form-control" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->no_pendaftaran_syarikat }}">


                    <label class="form-label fw-bold text-titlecase mt-1"> Tarikh Tamat Perakuan
                        Pendaftaran
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="tarikh_tamat_perakuan" class="form-control flatpickr"
                        placeholder="YYYY-MM-DD" required {{ $disabled }}
                        value="{{ $butiranInstitusi?->tarikh_tamat_perakuan }}">

                </div>


                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> No. Pendaftaran Syarikat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="no_pendaftaran_syarikat" class="form-control" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->no_pendaftaran_syarikat }}">

                    <label class="form-label fw-bold text-titlecase mt-1"> No. Lesen Perniagaan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="no_lesen_perniagaan" class="form-control" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->no_lesen_perniagaan }}">
                </div>

                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Laporan Kewangan
                    </span>
                </h5>

                <div class="col-md-12 mb-1">
                    <label class="form-label fw-bold text-titlecase">Mempunyai Audit Kewangan?</label>
                    <input type="radio" id="audit_approval_yes" name="audit_approval" value="yes"
                        onclick="toggleAuditDiv(true)" checked>
                    <label for="audit_approval_yes">Ada</label>
                    <input type="radio" id="audit_approval_no" name="audit_approval" value="no"
                        onclick="toggleAuditDiv(false)" disabled>
                    <label for="audit_approval_no">Tiada</label>
                </div>

                <div class="col-md-4 mb-1" id="audit_approval_div" style="display: none;">
                    <label class="form-label fw-bold text-titlecase"> Tarikh Audit
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="tarikh_audit" class="form-control flatpickr" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->tarikh_audit }}">

                </div>

                <div class="col-md-12 mb-1">
                    <label class="form-label fw-bold text-titlecase">Mempunyai Laporan Audit?</label>
                    <input type="radio" id="laporan_approval_yes" name="laporan_approval" value="yes"
                        onclick="toggleLaporanDiv(true)" checked>
                    <label for="laporan_approval_yes">Ada</label>
                    <input type="radio" id="laporan_approval_no" name="laporan_approval" value="no"
                        onclick="toggleLaporanDiv(false)" disabled>
                    <label for="laporan_approval_no">Tiada</label>
                </div>


                <div class="col-md-4 mb-1" id="laporan_approval_div" style="display: none;">
                    <label class="form-label fw-bold text-titlecase"> Tarikh Lapor
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="tarikh_lapor" class="form-control flatpickr" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->tarikh_lapor }}">

                </div>
                {{--
                    <hr>
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill badge-light-primary">
                            Maklumat Pelajar dan Kakitangan
                        </span>
                    </h5>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bold text-titlecase"> Bilangan Enrolmen Pelajar
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="bilangan_enrolmen_pelajar" class="form-control"
                            required>

                        <label class="form-label fw-bold text-titlecase mt-1"> Kapasiti Maksimum Pelajar
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="kapasiti_maksimum_pelajar" class="form-control"
                            required>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Tempatan
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="bilangan_pelajar_tempatan" class="form-control"
                            required>

                        <label class="form-label fw-bold text-titlecase mt-1"> Pecahan (Pelajar Tempatan)
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <input type="text" id="" name="pecahan_tempatan_lelaki"
                                class="form-control">
                            <input type="text" id="" name="pecahan_tempatan_perempuan"
                                class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Antarabangsa
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="bilangan_pelajar_antarabangsa" class="form-control"
                            required>

                        <label class="form-label fw-bold text-titlecase mt-1"> Pecahan (Pelajar
                            Antarabangsa)
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <input type="text" id="" name="pecahan_pelajar_lelaki"
                                class="form-control">
                            <input type="text" id="" name="pecahan_pelajar_perempuan"
                                class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bold text-titlecase"> Bilangan Guru Keseluruhan
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="bilangan_guru_keseluruhan" class="form-control"
                            required>

                        <label class="form-label fw-bold text-titlecase mt-1"> Pecahan (Guru)
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <input type="text" id="" name="pecahan_temparan"
                                class="form-control">
                            <input type="text" id="" name="pecahan_antarabangsa"
                                class="form-control">
                        </div>
                    </div>

                    <hr>
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill badge-light-primary">
                            Laporan Kewangan
                        </span>
                    </h5>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bold text-titlecase"> Tarikh Audit
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="" name="tarikh_audit"
                            class="form-control flatpickr">
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bold text-titlecase"> Tarikh Lapor
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="" name="tarikh_lapor"
                            class="form-control flatpickr">
                    </div>
                </div> --}}

                <hr>
                <div class="d-flex justify-content-end align-items-center mt-1">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
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
                    <input type="text" name="bilangan_guru_lelaki" class="form-control" required value="32">
                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Perempuan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="bilangan_guru_perempuan" class="form-control" required
                        value="18">

                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="bilangan_guru_keseluruhan" class="form-control" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->bilangan_guru_keseluruhan }}">

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
                    <input type="text" name="bilangan_guru_lelakiBukanWarganegara" class="form-control" required
                        value="31">
                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Perempuan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="bilangan_guru_perempuanBukanWarganegara" class="form-control"
                        required value="20">

                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Guru Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="pecahan_antarabangsa" class="form-control" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->pecahan_antarabangsa }}"
                        placeholder="Antarabangsa">

                </div>
                <div class="d-flex justify-content-end align-items-center mt-1">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
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
                    <input type="text" id="" name="pecahan_tempatan_lelaki" class="form-control"
                        required {{ $disabled }} value="{{ $butiranInstitusi?->pecahan_tempatan_lelaki }}"
                        placeholder="Lelaki">

                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Perempuan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="pecahan_tempatan_perempuan" class="form-control"
                        required {{ $disabled }} value="{{ $butiranInstitusi?->pecahan_tempatan_perempuan }}"
                        placeholder="Perempuan">


                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="bilangan_pelajar_tempatan" class="form-control" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->bilangan_pelajar_tempatan }}">

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
                    <input type="text" id="" name="pecahan_pelajar_lelaki" class="form-control" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->pecahan_pelajar_lelaki }}"
                        placeholder="Lelaki">

                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Perempuan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="pecahan_pelajar_perempuan" class="form-control"
                        required {{ $disabled }} value="{{ $butiranInstitusi?->pecahan_pelajar_perempuan }}"
                        placeholder="Perempuan">

                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Keseluruhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="bilangan_pelajar_antarabangsa" class="form-control" required
                        {{ $disabled }} value="{{ $butiranInstitusi?->bilangan_pelajar_antarabangsa }}">

                </div>
                <div class="d-flex justify-content-end align-items-center mt-1">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $("#institusi_id").trigger('change');
    document.getElementById("butiran_institusi").addEventListener("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('butiran_institusi'));

        var error = false;
        $('form#butiran_institusi').find('select, textarea, input, checkbox').each(function() {
            if (this.required && this.type == 'checkbox' && !this.checked) {
                error = true;
            }
            if (this.required && this.value == '') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }

        var url = "{{ route('skips.instrumen-submit', ['tab' => 'butiran_institusi']) }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 'success') {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var id = response.data.id;
                    var location = "{{ route('skips.skips_baru', ['id' => ':id']) }}";
                    var location = location.replace(':id', id);
                    window.location.href = location;
                } else {
                    Swal.fire('Gagal', response.detail, 'error');
                }
            }
        });
    });

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
    const radioYes = document.getElementById('kdn_approval_yes');
    const radioNo = document.getElementById('kdn_approval_no');
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
</script>
