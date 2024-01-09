@extends('layouts.app')

@section('header')
Pengurusan Ketua Agensi
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat Ketua Agensi Baru </a>
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
        <form id="formagensi">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Ketua Agensi
                    </span>
                </h5>

                <div class="col-sm-9 col-12 mb-1">
                    <label class="form-label fw-bolder">Nama Ketua Agensi/ Pengguna</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <select class="form-control select2" name="panggilan" required>
                                <option value="" hidden>Gelaran</option>
                                <option value="Dato'">Dato'</option>
                                <option value="Datin">Datin</option>
                                <option value="Prof.">Prof.</option>
                                <option value="Prof Madya">Prof Madya</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Tuan">Tuan</option>
                                <option value="Puan">Puan</option>
                                <option value="Cik">Cik</option>
                            </select>
                        </span>
                        <input type="text" class="form-control" name="nama_pengguna" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                    </div>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_kad" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Emel Ketua Pengarah/ Pengarah
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email_ketua" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">No Tel Pejabat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_tel_pejabat" maxlength="12" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">No Tel Peribadi
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_tel_peribadi" maxlength="12" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Jenis
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jenis" required>
                        <option value="" hidden>Jenis</option>
                        <option value="Kerajaan">Kerajaan</option>
                        <option value="Swasta">Swasta</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Jawatan
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jawatan" id="jawatan" required>
                            <option value="" hidden>Jawatan</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                    </select>
                </div>

                <div class="col-md-2 mb-1">
                    <label class="fw-bold form-label">Gred
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="gred" id="gred" required>
                        <option value="" hidden>Gred</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="col-md-1 mb-1">
                    <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="checkbox" id="modul" name="modul" value="1" required/>
                        <label class="form-check-label fw-bolder">Modul
                            <span class="text-danger">*</span>
                        </label>
                    </div>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Agensi/ Kementerian
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="agensi_kementerian[]" multiple required>
                        <option value="" hidden>Agensi/ Kementerian</option>
                        <option value="Agensi">Agensi</option>
                        <option value="Kementerian">Kementerian</option>
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
                    <label class="fw-bold form-label">Negeri
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="negeri" required>
                        <option value="" hidden>Negeri</option>
                        @foreach($states as $state)
                            <option value="{{$state->name}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Daerah
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="daerah" required>
                        <option value="" hidden>Daerah</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Poskod
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>
            </div>

            <hr>
            <div class="d-flex justify-content-end align-items-center mt-1">
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- <div class="row">
    <div class="col-md-8">
        <form id="formagensi">
            <div>
                <label class="fw-bolder">Nama Pengguna/Penilai:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="nama_pengguna" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
            </div>

            <div>
                <label class="fw-bolder"> Panggilan:<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="panggilan" required>
                        <option>pilih</option>
                        <option value="Dato'">Dato'</option>
                        <option value="Datin">Datin</option>
                        <option value="Prof.">Prof.</option>
                        <option value="Prof Madya">Prof Madya</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Tuan">Tuan</option>
                        <option value="Puan">Puan</option>
                        <option value="Cik">Cik</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_kad" required>
            </div>

             <div>
                <label class="fw-bolder"> Jenis :<span style="color: red;">*</span></label>
                <select class="form-control select2" name="jenis" required>
                        <option>pilih</option>
                        <option value="Kerajaan">Kerajaan</option>
                        <option value="Swasta">Swasta</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder">Jawatan:</label>
                <input type="text" name="jawatan" value="" class="form-control" required>
            </div>

            <div>
                <label class="fw-bolder"> Gred:</label>
                  <select class="form-control select2" name="gred">
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder">
                    <input type="checkbox" name="modul" value="1" class="form-check-input" required>Modul
                </label>
            </div>

            <div>
                <label class="fw-bolder"> Agensi/ Kementerian:</label>
                  <select class="form-control select2" name="agensi_kementerian[]" multiple required>
                    <option>select</option>
                    <option value="Agensi">Agensi</option>
                    <option value="Kementerian">Kementerian</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 1:</label>
                <input type="text" class="form-control" name="alamat1" required>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 2:</label>
                <input type="text" class="form-control" name="alamat2" required>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 3:</label>
                <input type="text" class="form-control" name="alamat3">
            </div>

             <div>
                <label class="fw-bolder"> Poskod:</label>
                <input type="text" class="form-control" maxlength="5" name="poskod" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
            </div>

             <div>
                <label class="fw-bolder"> Daerah:</label>
                  <select class="form-control select2" name="daerah" required>
                        <option>pilih</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder"> Negeri:</label>
                  <select class="form-control select2" name="negeri" required>
                        <option>pilih</option>
                        @foreach($states as $state)
                        <option value="{{$state->name}}">{{$state->name}}</option>
                        @endforeach
                </select>
            </div>

            <div>
                <label class="fw-bolder">  Emel Ketua Pengarah/ Pengarah:</label>
                <input type="email" class="form-control" name="email_ketua" required>
            </div>

            <div>
                <label class="fw-bolder"> No Tel Pejabat:</label>
                <input type="text" class="form-control" name="no_tel_pejabat" maxlength="12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
            </div>

             <div>
                <label class="fw-bolder"> No Tel Peribadi:</label>
                <input type="text" class="form-control" name="no_tel_peribadi" maxlength="12" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
            </div>

            <div class="d-flex justify-content-end align-items-center my-1">
                <button type="submit" class="btn btn-primary float-right">Hantar</button>
            </div>
        </form>
    </div>
</div> --}}

@endsection

@section('script')
<script type="text/javascript">

$('#formagensi').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formagensi'));
        var url = "{{ route('admin.internal.agensisave') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    var location = "{{route('admin.internal.agensilist')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
