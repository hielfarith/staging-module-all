@extends('layouts.app')
<style type="text/css">
.delete-button {
        display: none;
    }
</style>
@section('header')
Pengurusan Pengguna
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 card">
        <form id="formpengunna">
            <div>
                <label class="fw-bolder">Nama Pengguna/ Ketua TASKA:</label>
                <input type="text" class="form-control" name="nama_pengguna" required>
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan atau passport:</label>
                <input type="text" class="form-control" name="no_kad" required>
            </div>

            <div>
                <label class="fw-bolder"> Emel Peribadi:</label>
                <input type="email" class="form-control" name="email_peribadi" required>
            </div>

            <div>
                <label class="fw-bolder"> Emel TASKA:</label>
                <input type="email" class="form-control" name="email_taska" required>
            </div>

            <div>
                <label class="fw-bolder"> Emel Ibu Pejabat (Negeri)/ Penyelia:</label>
                <input type="email" class="form-control" name="email_pejabat_penyelia" required>
            </div>

            <div>
                <label class="fw-bolder"> Agensi/ Kementerian:</label>
                <select class="form-control select2" name="agensi_kementerian" required>
                    <option>pilih</option>
                    <option value="Agensi">Agensi</option>
                    <option value="Kementerian">Kementerian</option>
                </select> 
            </div>

            <div>
                <label class="fw-bolder"> Jenis :</label>
                <select class="form-control select2" name="jenis" required>
                        <option>pilih</option>
                        <option value="Kerajaan">Kerajaan</option>
                        <option value="Swasta">Swasta</option>
                </select> 
            </div>

            <div>
                <label class="fw-bolder"> Jawatan:</label>
                <select class="form-control select2" name="jawatan" required>
                        <option>pilih</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder"> Gred:</label>
                  <select class="form-control select2" name="gred" required>
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
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
                <input type="text" class="form-control" name="poskod" maxlength="5" required>
            </div>

             <div>
                <label class="fw-bolder"> Daerah:</label>
                  <select class="form-control select2" name="daerah" required>
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Negeri:</label>
                  <select class="form-control select2" name="negeri" required>
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Tarikh Penubuhan:</label>
                <input type="text" class="form-control flatpickr" name="tarikh_penubuhan" required>
            </div>

            <div>
                <label class="fw-bolder"> Jenis Taska:</label>
                  <select class="form-control select2" name="jenis_taska" required>
                        <option>select</option>
                        <option value="swasta">swasta</option>
                        <option value="kerajan">kerajan</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Jumla Pendidik:</label>
                <input type="text" class="form-control" name="jumla_pendidik" required>
            </div> 

             <div>
                <label class="fw-bolder"> Jumlah Kank-Kanak:</label>
                <input type="text" class="form-control" name="jumlah_kanak" required>
            </div>


             <div>
                <label class="fw-bolder"> Jumla Staf Sokogan:</label>
                <input type="text" class="form-control" name="jumla_staf_sokogan" required>
            </div>

            <div>
                <label class="fw-bolder"> Jenis Banugunan:</label>
                  <select class="form-control select2" name="jenisbanugunan" required>
                        <option>select</option>
                        <option value="tempat kerja">tempat kerja</option>
                        <option value="rumah kedai">rumah kedai</option>
                        <option value="bangunan">bangunan</option>
                        <option value="teres">teres</option>
                        <option value="banglo">banglo</option>
                </select>
            </div>
         

             <div>
                <label class="fw-bolder"> No Tel Pejabat:</label>
                <input type="text" class="form-control" name="no_tel_pejabat" required>
            </div>


             <div>
                <label class="fw-bolder"> No Tel Peribadi:</label>
                <input type="text" class="form-control" name="no_tel_peribadi" required>
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
    
$('#formpengunna').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formpengunna'));
        var url = "{{ route('admin.internal.penggunasave') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    var location = "{{route('admin.internal.penggunalist')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
