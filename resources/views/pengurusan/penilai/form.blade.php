@extends('layouts.app')

@section('header')
Pengurusan Panel Penilai
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat Panel Penilai Baru </a>
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
        <form id="formpenilai" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Panel Penilai
                    </span>
                </h5>

                <div class="col-md-9 mb-1">
                    <label class="fw-bold form-label">Nama Panel Penilai/ Pengguna
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_pengguna" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">No Kad Pengenalan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_kad" required>
                </div>

                <div class="col-md-2 mb-1">
                    <label class="fw-bold form-label">Emel Peribadi
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email_peribadi" required>
                </div>

                <div class="col-md-2 mb-1">
                    <label class="fw-bold form-label">Emel Ketua Jabatan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email_ketua_jabatan" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Emel Penyelia
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email_penyelia" required>
                </div>

                <div class="col-md-2 mb-1">
                    <label class="fw-bold form-label">No Tel Pejabat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_tel_pejabat" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">No Tel Peribadi
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_tel_peribadi" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Agensi/ Kementerian
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="agensi_kementerian" required>
                        <option value="" hidden>Agensi/ Kementerian</option>
                        <option value="Agensi">Agensi</option>
                        <option value="Kementerian">Kementerian</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Gred
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="gred" id="gred" required>
                        <option value="" hidden>Gred</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="col-md-6 mb-1">
                    <label class="fw-bold form-label">3 negeri pilihan bagi menjalankan penilaian SKPAK
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="negeri_skpak[]" id="negeri_skpak" multiple>
                        <option value="" hidden>3 negeri pilihan bagi menjalankan penilaian SKPAK</option>
                        @foreach($states as $state)
                            <option value="{{$state->name}}">{{$state->name}}</option>
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
                    <label class="fw-bold form-label">Negeri
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="negeri" id="negeri" required onchange="changenegeri(this)">
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
                    <select class="form-control select2" name="daerah" id="daerah" required>

                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Poskod
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>

                <hr>

                <div class="d-flex justify-content-end align-items-center mt-1">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>


{{-- <div class="row">
    <div class="col-md-8 card">
        <form id="formpenilai">
            <div>
                <label class="fw-bolder">Nama Pengguna/Penilai:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="nama_pengguna" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_kad" required>
            </div>

            <div>
                <label class="fw-bolder"> Emel Peribadi:<span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email_peribadi" required>
            </div>

            <div>
                <label class="fw-bolder"> Emel Ketua Jabatan:<span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email_ketua_jabatan" required>
            </div>

            <div>
                <label class="fw-bolder"> Emel Penyelia:<span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email_penyelia" required>
            </div>

            <div>
                <label class="fw-bolder"> Agensi/ Kementerian:<span style="color: red;">*</span></label>
                <select class="form-control select2" name="agensi_kementerian" required>
                    <option>pilih</option>
                    <option value="Agensi">Agensi</option>
                    <option value="Kementerian">Kementerian</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder"> No Tel Pejabat:</label>
                <input type="text" class="form-control" name="no_tel_pejabat" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
            </div>

             <div>
                <label class="fw-bolder"> No Tel Peribadi:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_tel_peribadi" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
            </div>

             <div>
                <label class="fw-bolder"> Alamat 1:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="alamat1" required>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 2:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="alamat2" required>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 3:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="alamat3">
            </div>

             <div>
                <label class="fw-bolder"> Poskod:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" maxlength="5" name="poskod" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
            </div>

             <div>
                <label class="fw-bolder"> Negeri:<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="negeri" required>
                        <option>pilih</option>
                        @foreach($states as $state)
                        <option value="{{$state->name}}">{{$state->name}}</option>
                        @endforeach
                </select>
            </div>
             <div>
                <label class="fw-bolder"> Daerah:<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="daerah" required>
                        <option>pilih</option>
                        @foreach($dearhs as $dearh)
                        <option value="{{$dearh->name}}">{{$dearh->name}}</option>
                        @endforeach
                </select>
            </div>

            <div>
                <label class="fw-bolder"> Gred:<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="gred" required>
                        <option>pilih</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>


            <div>
                <label class="fw-bolder"> 3 negeri pilihan bagi menjalankan penilaian SKPAK:</label>
                  <select class="form-control select2" name="negeri_skpak[]" multiple>
                        <option>pilih</option>
                        @foreach($states as $state)
                            <option value="{{$state->name}}">{{$state->name}}</option>
                        @endforeach
                </select>
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
$(document).ready(function() {
    $('#negeri_skpak').select2({
        maximumSelectionLength: 3
    });
});
function changenegeri(negeri){
    var negerivalue = negeri.value;
    var url = "{{ route('admin.internal.checkdaerah') }}"
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            negeri: negerivalue
        },
        success: function(response) {
            $('#daerah').empty();
            $('#daerah').append('<option value="" selected>Sila Pilih:-</option>');
            $.each(response.daerahs, function(key, value) {
                $('#daerah').append('<option value="'+ value +'">'+ value +'</option>');
            });
        }
    });
}

$('#formpenilai').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formpenilai'));
        var error = false;

        $('select.select2').each(function() {
            var element = $(this);
            var select2Value = element.select2('data');
            var selectedValues = element.val();
            var fieldName = element.attr('name');
            if (typeof element.attr('disabled') == 'undefined') {
                if (!selectedValues || selectedValues === '') {
                    Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
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
        var url = "{{ route('admin.internal.penilaisave') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('admin.internal.penilailist')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
