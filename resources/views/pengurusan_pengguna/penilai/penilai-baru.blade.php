@extends('layouts.app')

@section('header')
Pengurusan Penilai
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat Penilai Baru </a>
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
            Maklumat Penilai Baru
        </h4>
    </div>

    <hr>
    <div class="card-body">
        <div class="row">
            <form action="{{ route('admin.internal.penilaisave') }}" id="formpenilai" method="post" data-swal="Maklumat Penilai Berjaya Disimpan">
                @csrf

                <div class="row">
                    <div class="col-md-9 mb-1">
                        <label class="form-label fw-bolder">Nama Pengguna/ Penilai</label>
                        <input type="text" class="form-control" name="nama_pengguna" required>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bolder">No Kad Pengenalan/ Pasport</label>
                        <input type="text" class="form-control" name="no_kad" required>
                    </div>

                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Agensi/ Kementerian</label>
                        <input type="text" class="form-control" name="agensi_kementerian" required>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Emel Peribadi</label>
                        <input type="text" class="form-control" name="email_peribadi" required>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Emel Ketua Jabatan</label>
                        <input type="text" class="form-control" name="email_ketua_jabatan" required>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Emel Penyelia</label>
                        <input type="text" class="form-control" name="email_penyelia" required>
                    </div>

                    <div class="col-md-6 mb-1">
                        <label class="form-label fw-bolder">No Tel Peribadi</label>
                        <input type="text" class="form-control" name="no_tel_peribadi" required>
                    </div>

                    <div class="col-md-6 mb-1">
                        <label class="form-label fw-bolder">No Tel Pejabat</label>
                        <input type="text" class="form-control" name="no_tel_pejabat" required>
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
                            <option value="" hidden>Negeri</option>
                            @foreach($states as $state)
                                <option value="{{$state->name}}">{{$state->name}}</option>
                            @endforeach
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

                    <div class="col-md-8 mb-1">
                        <label class="form-label fw-bolder">3 Negeri Pilihan Bagi Menjalankan Penilaian SKPAK</label>
                        <select class="form-control select2" id="negeri_skpak[]" name="negeri_skpak[]" multiple>
                            <option value="" hidden>Negeri</option>
                            @foreach($states as $state)
                                <option value="{{$state->name}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end align-items-center my-1">
                    <button type="button" class="btn btn-primary float-right" onclick="generalFormSubmit(this);" id="submitPenilaiBaru" hidden>Hantar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end align-items-center mb-1">
            <button class="btn btn-primary" onclick="$('#submitPenilaiBaru').trigger('click');">
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
