@extends('layouts.app')

@section('header')
Pengurusan Ketua Taska
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat Ketua Taska Baru </a>
</li>
@endsection

@section('content')
<style>
    .delete-button {
        display: none;
    }
</style>

<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder">
            Maklumat Ketua Taska Baru
        </h4>
    </div>

    <hr>

    <div class="card-body">
        <div class="row">
            <form action="{{ route('admin.internal.penggunasave') }}" id="formpengunna" method="post" data-swal="Maklumat Ketua Taska Berjaya Disimpan">
                @csrf

                <div class="row">
                    <div class="col-md-9 mb-1">
                        <label class="form-label fw-bolder">Nama Pengguna/ Ketua Taska</label>
                        <input type="text" class="form-control" name="nama_pengguna" required>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bolder">No Kad Pengenalan/ Pasport</label>
                        <input type="text" class="form-control" name="no_kad" required>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">No Tel Peribadi</label>
                        <input type="text" class="form-control" name="no_tel_peribadi" required>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Emel Peribadi</label>
                        <input type="text" class="form-control" name="email_peribadi" required>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Emel Ibu Pejabat (Negeri)/ Penyelia</label>
                        <input type="text" class="form-control" name="email_pejabat_penyelia" required>
                    </div>

                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Agensi/ Kementerian</label>
                        <input type="text" class="form-control" name="agensi_kementerian" required>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Jenis</label>
                        <select class="form-control select2" id="pilihan_swasta" name="pilihan_swasta" required>
                            <option value="" hidden>Jenis</option>
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Jawatan</label>
                        <select class="form-control select2" id="jawatan" name="jawatan" required>
                            <option value="" hidden>Jawatan</option>
                            <option value="1">1</option>
                            <option value="2" selected>2</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Gred</label>
                        <select class="form-control select2" id="gred" name="gred" required>
                            <option value="" hidden>Gred</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Alamat 1</label>
                        <input type="text" class="form-control" name="alamat1" required>
                    </div>

                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Alamat 2</label>
                        <input type="text" class="form-control" name="alamat2" required>
                    </div>

                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Alamat 3</label>
                        <input type="text" class="form-control" name="alamat3">
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Poskod</label>
                        <input type="text" class="form-control" name="poskod" required>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Daerah</label>
                        <select class="form-control select2" id="daerah" name="daerah" required>
                            <option value="" hidden>Gred</option>
                            <option value="1">Hulu Langat</option>
                            <option value="2">Ampang</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Negeri</label>
                        <select class="form-control select2" id="negeri" name="negeri" required>
                            <option value="" hidden>Gred</option>
                            <option value="1">WP Kuala Lumpur</option>
                            <option value="2">Selangor</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-1">
                        <label class="form-label fw-bolder">Emel TASKA</label>
                        <input type="text" class="form-control" name="email_taska" required>
                    </div>

                    <div class="col-md-6 mb-1">
                        <label class="form-label fw-bolder">No Tel Pejabat</label>
                        <input type="text" class="form-control" name="no_tel_pejabat" required>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bolder">Tarikh Penubuhan</label>
                        <input type="text" class="form-control flatpickr" name="tarikh_penubuhan" required>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bolder">Jenis Taska</label>
                        <select class="form-control select2" id="jenisbanugunan" name="jenisbanugunan" required>
                            <option value="" hidden>Jenis Taska</option>
                            <option value="1">Swasta</option>
                            <option value="2">Kerajaan</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bolder">Jenis Bangunan</label>
                        <select class="form-control select2" id="jenis_taska" name="jenis_taska" required>
                            <option value="" hidden>Jenis Taska</option>
                            <option value="tempat_kerja">Tempat Kerja</option>
                            <option value="rumah_kedai">Rumah Kedai</option>
                            <option value="bangunan">Bangunan</option>
                            <option value="teres">Teres</option>
                            <option value="banglo">Banglo</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bolder">Jumlah Staf Sokongan</label>
                        <input type="text" class="form-control" name="jumla_staf_sokogan" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bolder">Jumlah Pendidik</label>
                        <input type="text" class="form-control" name="jumla_pendidik" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bolder">Jumlah Kanak-Kanak</label>
                        <input type="text" class="form-control" name="jumlah_kanak" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bolder">Nisbah Pendidik & Kanak-Kanak</label>
                        <input type="text" class="form-control" name="nisbah_pendidik" required>
                        <p class="text-muted">
                            <i> Mengikut Umur </i>
                        </p>
                    </div>
                </div>

                <div class="d-flex justify-content-end align-items-center my-1">
                    <button type="button" class="btn btn-primary float-right" onclick="generalFormSubmit(this);" id="submitKetuaBaru" hidden>Hantar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end align-items-center mb-1">
            <button class="btn btn-primary" onclick="$('#submitKetuaBaru').trigger('click');">
                <span class="align-middle d-sm-inline-block d-none">
                    Simpan Maklumat
                </span>
            </button>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>

</script>
@endsection
