@extends('layouts.app')

@section('header')
Pengurusan Institusi
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat Institusi Baru </a>
</li>
@endsection

@section('content')
<style>
    .delete-button {
        display: none;
    }
</style>

<div class="card">
    <div class="card-body">
        <form id="forminstitusi" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Institusi
                    </span>
                </h5>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Jenis Pusat
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jenis" id="jenis" required>
                        <option value="" hidden>Status</option>
                        <option value="pusat_bahasa">Pusat Bahasa</option>
                        <option value="pusat_latihan_kemahiran">Pusat Latihan / Kemahiran</option>
                        <option value="pusat_perkembangan_minda">Pusat Perkembangan Minda</option>
                        <option value="pusat_tuisyen">Pusat Tuisyen</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">No. Perakuan Pusat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_perakuan" id="no_perakuan" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Status Pusat
                        <span class="text-danger">*</span>
                    </label>
                    <select name="status" id="status" class="form-select select2" required>
                        <option value="" hidden>Status</option>
                        <option value="beroperasi">Beroperasi</option>
                        <option value="tidak_beroperasi">Tidak Beroperasi</option>
                        <option value="tutup">Tutup</option>
                    </select>
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Nama Pusat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Alamat Pusat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="alamat" id="alamat" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Emel
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">No. Telefon
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_tel" id="no_tel" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Pendaftaran
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="tarikh_daftar" name="tarikh_daftar" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Tamat Pendaftaran
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="tarikh_tamat_daftar" name="tarikh_tamat_daftar" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Pengetua & Pengerusi
                    </span>
                </h5>

                <div class="col-md-8 mb-1">
                    <label class="fw-bold form-label">Nama Pengetua/ Guru Besar
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_pengetua_gurubesar" id="nama_pengetua_gurubesar" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">No Kad Pengenalan
                    </label>
                    <input type="text" class="form-control" name="no_kp_pengetua_gurubesar" id="no_kp_pengetua_gurubesar" required>
                </div>

                <div class="col-md-8 mb-1">
                    <label class="fw-bold form-label">Nama Pengerusi/Pengurus
                    </label>
                    <input type="text" class="form-control" name="nama_pengerusi_pengurus" id="nama_pengerusi_pengurus" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">No Kad Pengenalan
                    </label>
                    <input type="text" class="form-control" name="no_kp_pengerusi_pengurus" id="no_kp_pengerusi_pengurus" required>
                </div>
            <hr>

            <div class="d-flex justify-content-end align-items-center mt-1">
                <button type="submit" class="btn btn-primary float-right">Hantar</button>
            </div>

        </form>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $('#forminstitusi').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('forminstitusi'));
        var error = false;
        $('select.select2').each(function() {
            var element = $(this);
            var select2Value = element.select2('data');
            var selectedValues = element.val();
            var fieldName = element.attr('name');
            if (typeof element.attr('disabled') == 'undefined') {

                if (!selectedValues || selectedValues === '') {
                    Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                    error = true;
                    return false; // Stop the loop if an error is found
                }
            }
        });

        formData.forEach(function(value, name) {
            var element = $("input[name='"+name+"']");
            if (typeof element.attr('name') != 'undefined' && typeof element.attr('required') != 'undefined') {
                if (element.val() == '') {
                    Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                    error = true;
                    return false;
                }
            }
        });

        if (error) {
            return false;
        }
        var url = "{{ route('skips.save-institusi') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('skips.senarai_institusi')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>
@endsection
