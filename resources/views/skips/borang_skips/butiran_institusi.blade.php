<?php
    $id = Request::segment(3);
    if(!empty($id)) {
        $butiranInstitusi = \App\Models\ButiranInstitusiSkips::where('id', $id)->first();
    } else {
        $butiranInstitusi = null;
    }
    if (isset($type) && $type == 'verfikasi') {
        $disabled = 'disabled';
    } else {
        $disabled = '';
    }
?>
<form id="butiran_institusi" novalidate="novalidate">
    <input type="hidden" name="butiranInstitusi_id" value="{{$butiranInstitusi?->id}}">
    <div class="row">
        <h5 class="mb-2 mt-1 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Institusi
            </span>
        </h5>

        <div class="col-md-8 mb-1">
            <label class="form-label fw-bold text-titlecase">Nama Institusi
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="nama_institusi" class="form-control" required value="{{$butiranInstitusi?->nama_institusi}}" {{$disabled}}>
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold text-titlecase">Nama Pengetua
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="nama_pengetua" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->nama_pengetua}}">
        </div>

        <div class="col-md-10 mb-1">
            <label class="fw-bold form-label">Alamat
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" required {{$disabled}} name="alamat" value="{{$butiranInstitusi?->alamat}}">
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Negeri
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="negeri" id="">
                <option value="" hidden>Negeri</option>
                @foreach($negeris as $negeri)
                    <option value="{{$negeri->name}}" @if($butiranInstitusi?->negeri == $negeri->name) selected @endif>{{$negeri->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase">No. Telefon
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="no_telephone" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->no_telephone}}">
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> No. Faks </label>
            <input type="text" name="fax" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->fax}}">
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> Alamat Emel
                <span class="text-danger">*</span>
            </label>
            <input type="email" name="email" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->email}}">
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> Laman Web
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="laman_web" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->laman_web}}">
        </div>

        <hr>
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Pendaftaran
            </span>
        </h5>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold text-titlecase"> No. Perakuan Pendaftaran
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="no_perakuan_pendaftaran" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->no_perakuan_pendaftaran}}">

            <label class="form-label fw-bold text-titlecase mt-1"> Tarikh Tamat Perakuan Pendaftaran
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" name="tarikh_tamat_perakuan" class="form-control flatpickr" placeholder="YYYY-MM-DD" required {{$disabled}} value="{{$butiranInstitusi?->tarikh_tamat_perakuan}}">
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold text-titlecase"> No. Surat Kelulusan KDN
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="no_surat_kelulusan" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->no_surat_kelulusan}}">

            <label class="form-label fw-bold text-titlecase mt-1"> Tarikh Tamat Kelulusan KDN
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" name="tarikh_tamat_kelulusan" class="form-control flatpickr" placeholder="YYYY-MM-DD" required {{$disabled}} value="{{$butiranInstitusi?->tarikh_tamat_kelulusan}}">
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold text-titlecase"> No. Pendaftaran Syarikat
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="no_pendaftaran_syarikat" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->no_pendaftaran_syarikat}}">

            <label class="form-label fw-bold text-titlecase mt-1"> No. Lesen Perniagaan
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="no_lesen_perniagaan" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->no_lesen_perniagaan}}">
        </div>

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
            <input type="text" name="bilangan_enrolmen_pelajar" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->bilangan_enrolmen_pelajar}}">

            <label class="form-label fw-bold text-titlecase mt-1"> Kapasiti Maksimum Pelajar
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="kapasiti_maksimum_pelajar" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->kapasiti_maksimum_pelajar}}">
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Tempatan
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="bilangan_pelajar_tempatan" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->bilangan_pelajar_tempatan}}">

            <label class="form-label fw-bold text-titlecase mt-1"> Pecahan (Pelajar Tempatan)
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <input type="text" id="" name="pecahan_tempatan_lelaki" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->pecahan_tempatan_lelaki}}" placeholder="Lelaki">
                <input type="text" id="" name="pecahan_tempatan_perempuan" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->pecahan_tempatan_perempuan}}" placeholder="Perempuan">
            </div>
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Antarabangsa
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="bilangan_pelajar_antarabangsa" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->bilangan_pelajar_antarabangsa}}">

            <label class="form-label fw-bold text-titlecase mt-1"> Pecahan (Pelajar Antarabangsa)
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <input type="text" id="" name="pecahan_pelajar_lelaki" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->pecahan_pelajar_lelaki}}" placeholder="Lelaki">
                <input type="text" id="" name="pecahan_pelajar_perempuan" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->pecahan_pelajar_perempuan}}" placeholder="Perempuan">
            </div>
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> Bilangan Guru Keseluruhan
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="bilangan_guru_keseluruhan" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->bilangan_guru_keseluruhan}}">

            <label class="form-label fw-bold text-titlecase mt-1"> Pecahan (Guru)
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <input type="text" id="" name="pecahan_temparan" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->pecahan_temparan}}" placeholder="Tempatan">
                <input type="text" id="" name="pecahan_antarabangsa" class="form-control" required {{$disabled}} value="{{$butiranInstitusi?->pecahan_antarabangsa}}" placeholder="Antarabangsa">
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
            <input type="text" id="" name="tarikh_audit" class="form-control flatpickr" required {{$disabled}} value="{{$butiranInstitusi?->tarikh_audit}}">
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold text-titlecase"> Tarikh Lapor
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" name="tarikh_lapor" class="form-control flatpickr" required {{$disabled}} value="{{$butiranInstitusi?->tarikh_lapor}}">
        </div>
    </div>

        <hr>
        <div class="d-flex justify-content-end align-items-center mt-1">
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </div>

</form>

<script type="text/javascript">
    document.getElementById("butiran_institusi").addEventListener("submit", function(event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('butiran_institusi'));

    var error = false;
    $('form#butiran_institusi').find('select, textarea, input, checkbox').each(function() {
        if(this.required && this.type == 'checkbox' && !this.checked) {
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
           if (response.status) {
                Swal.fire('Success', 'Berjaya', 'success');
                var id = response.data.id;
                location = "{{route('skips.skips_baru', ['id' => ':id'])}}";
                var location = location.replace(':id', id);
                window.location.href = location;
           }
        }
    });
});

</script>
