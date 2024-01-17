@extends('layouts.app')

@section('header')
Pengurusan Jurulatih
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat Jurulatih Baru </a>
</li>
@endsection

@section('content')
<style>
    .delete-button {
        display: none;
    }
</style>

<div class="card">
    {{-- <div class="card-header">
        <h4 class="card-title fw-bold">
            Maklumat Jurulatih Baru
        </h4>
    </div>

    <hr> --}}

    <div class="card-body">
        <form id="formpengunna" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Jurulatih
                    </span>
                </h5>

                <div class="col-md-9 mb-1">
                    <label class="fw-bold form-label">Nama Jurulatih/ Pengguna
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Warganegara
                        <span class="text-danger">*</span>
                    </label>
                    <select name="" id="" class="form-control select2">
                        <option value="" hidden>Warganergara</option>
                        @foreach ($negaras as $negara)
                            <option value="{{ $negara->id }}">{{ $negara->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Jantina
                        <span class="text-danger">*</span>
                    </label>
                    <select name="" id="" class="form-control select2">
                        <option value="" hidden>Warganergara</option>
                        @foreach ($jantinas as $id => $jantina)
                            <option value="{{ $id }}">{{ $jantina }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Kaum
                        <span class="text-danger">*</span>
                    </label>
                    <select name="" id="" class="form-control select2">
                        <option value="" hidden>Kaum</option>
                        @foreach ($kaums as $id => $kaum)
                            <option value="{{ $id }}">{{ $kaum }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Lahir
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Telefon Rumah
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Telefon Bimbit
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Email
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="">
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Penempatan/ Lantikan
                    </span>
                </h5>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Gred Jawatan
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="" id="">
                        <option value="" hidden>Gred</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Lantikan ke Gred Semasa
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula Bertugas di PLD
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Majikan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label"> Jarak Rumah ke Pusat Latihan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="poskod" maxlength="5">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label"> Penerima Bayaran Insentif Jurulatih Sukan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="poskod" maxlength="5">
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Jurulatih Sukan
                        <span class="text-danger">*</span>
                    </label>
                    <select name="" id="" class="form-control select2" multiple>
                        <option value="" hidden>Jurulatih Sukan</option>
                        @foreach ($sukans as $id => $sukan)
                            <option value="{{ $id }}">{{ $sukan }}</option>
                        @endforeach
                    </select>
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Alamat
                    </span>
                </h5>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Alamat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="alamat1" placeholder="Alamat 1" required>
                </div>

                <div class="col-md-12 mb-1">
                    {{-- <label class="fw-bold form-label">Alamat 2
                        <span class="text-danger">*</span>
                    </label> --}}
                    <input type="text" class="form-control" name="alamat2" placeholder="Alamat 2" required>
                </div>

                <div class="col-md-12 mb-1">
                    {{-- <label class="fw-bold form-label">Alamat 3</label> --}}
                    <input type="text" class="form-control" name="alamat3" placeholder="Alamat 3">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Bandar
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Negeri
                        <span class="text-danger">*</span>
                    </label>
                    <select name="" id="" class="form-control select2">
                        <option value="" hidden>Negeri</option>
                        @foreach ($negeris as $negeri)
                            <option value="{{ $negeri->code }}">{{ $negeri->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Poskod
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Kesihatan
                    </span>
                </h5>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Maklumat Kesihatan
                        <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control" name="" id="" rows="4"></textarea>
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Sekolah
                    </span>
                </h5>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Maklumat Sekolah
                        <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control" name="" id="" rows="4"></textarea>
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Spesifik
                    </span>
                </h5>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Persijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tahap/Gred
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Pensijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Muat Naik Sijil
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" class="form-control" name="">
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Spesifik
                    </span>
                </h5>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Persijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tahap/Gred
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Pensijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Muat Naik Sijil
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" class="form-control" name="">
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Sains Sukan
                    </span>
                </h5>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Persijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Pensijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Muat Naik Sijil
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" class="form-control" name="">
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Skim Persijilan Kejurulatihan Kebangsaan (SPKK)
                    </span>
                </h5>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Persijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Pensijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Muat Naik Sijil
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" class="form-control" name="">
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Pencapaian Sebagai Jurulatih
                    </span>
                </h5>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Sukan/ Permainan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Kejohanan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tahun
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Peringkat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Anugerah yang Diterima
                    </span>
                </h5>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Anugerah
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tahun
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="">
                </div>
            </div>

            <hr>
            <div class="d-flex justify-content-end align-items-center mt-1">
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
@endsection
