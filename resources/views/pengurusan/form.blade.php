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
        <form id="formpengunna" novalidate="novalidate">
            <div>
                <label class="fw-bolder">Nama Pengguna/ Ketua TASKA<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="nama_pengguna" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan atau passport<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_kad" required>
            </div>

            <div>
                <label class="fw-bolder"> Emel Peribadi<span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email_peribadi" required>
            </div>

            <div>
                <label class="fw-bolder"> Emel TASKA<span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email_taska" required>
            </div>

            <div>
                <label class="fw-bolder"> Emel Ibu Pejabat (Negeri)/ Penyelia<span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email_pejabat_penyelia" required>
            </div>

            <div>
                <label class="fw-bolder"> Agensi/ Kementerian<span style="color: red;">*</span></label>
                <select class="form-control select2" name="agensi_kementerian" required>
                    <option value="">pilih</option>
                    <option value="Agensi">Agensi</option>
                    <option value="Kementerian">Kementerian</option>
                </select> 
            </div>

            <div>
                <label class="fw-bolder"> Jenis <span style="color: red;">*</span></label>
                <select class="form-control select2" name="jenis" required onchange="checksjenis(this)">
                        <option value="">pilih</option>
                        <option value="Kerajaan">Kerajaan</option>
                        <option value="Swasta">Swasta</option>
                </select> 
            </div>

            <div>
                <label class="fw-bolder"> Jawatan<span style="color: red;">*</span></label>
                <select class="form-control select2" name="jawatan" id="jawatan" required>
                        <option value="">pilih</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder"> Gred<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="gred" id="gred" required>
                        <option value="">pilih</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 1<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="alamat1" required>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 2<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="alamat2" required>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 3</label>
                <input type="text" class="form-control" name="alamat3">
            </div>

             <div>
                <label class="fw-bolder"> Poskod<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
            </div>

             <div>
                <label class="fw-bolder"> Negeri<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="negeri" required>
                        <option value="">pilih</option>
                        @foreach($states as $state)
                        <option value="{{$state->name}}">{{$state->name}}</option>
                        @endforeach
                </select>
            </div>

              <div>
                <label class="fw-bolder"> Daerah<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="daerah" required>
                        <option value="">pilih</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Tarikh Penubuhan<span style="color: red;">*</span></label>
                <input type="text" class="form-control flatpickr" name="tarikh_penubuhan" required>
            </div>

            <div>
                <label class="fw-bolder"> Jenis Taska<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="jenis_taska" required>
                        <option value="">pilih</option>
                        <option value="swasta">swasta</option>
                        <option value="kerajan">kerajan</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Jumla Pendidik<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="jumla_pendidik" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div> 

             <div>
                <label class="fw-bolder"> Jumlah Kank-Kanak<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="jumlah_kanak" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>


             <div>
                <label class="fw-bolder"> Jumla Staf Sokogan<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="jumla_staf_sokogan" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>

            <div>
                <label class="fw-bolder"> Jenis Banugunan<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="jenisbanugunan" required>
                        <option value="">pilih</option>
                        <option value="tempat kerja">tempat kerja</option>
                        <option value="rumah kedai">rumah kedai</option>
                        <option value="bangunan">bangunan</option>
                        <option value="teres">teres</option>
                        <option value="banglo">banglo</option>
                </select>
            </div>
         

             <div>
                <label class="fw-bolder"> No Tel Pejabat<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_tel_pejabat" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
            </div>


             <div>
                <label class="fw-bolder"> No Tel Peribadi<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_tel_peribadi" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
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

function  checksjenis(jenis) {
    if (jenis.value == 'Swasta') {
        $('#jawatan').val('');
        $('#gred').val('');
        $('#jawatan').attr('disabled', true);
        $('#gred').attr('disabled', true);
        $('#jawatan').prop('required',false);
        $('#gred').prop('required',false);
    } else {
        $('#jawatan').attr('disabled', false);
        $('#gred').attr('disabled', false);
        $('#jawatan').prop('required',true);
        $('#gred').prop('required',true);
    }
}


$('#formpengunna').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formpengunna'));
        var error = false;
        formData.forEach(function(value, name) {
            var element = $("input[name="+name+"]");
            if (typeof element.attr('name') != 'undefined') {
                if (element.val() == '') {
                    Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                    error = true;
                    return false;
                }
            }
        });
        
        var select2 = ['jenis','jawatan','gred', 'negeri','daerah','jenis_taska','jenisbanugunan'];   
        if (error) {
            return false;
        }

        var url = "{{ route('admin.internal.penggunasave') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('admin.internal.penggunalist')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
