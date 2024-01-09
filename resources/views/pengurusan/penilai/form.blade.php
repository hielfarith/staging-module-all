@extends('layouts.app')
@section('header')
Pengurusan Penilai
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Penilai </a>
</li>
@endsection

@section('content')
<div class="row">
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
                        <option>1</option>
                        <option>2</option>
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
</div>

@endsection

@section('script')
<script type="text/javascript">
    
$('#formpenilai').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formpenilai'));
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
