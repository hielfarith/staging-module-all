@extends('layouts.app')

@section('header')
Ahli Jawtankuasa Kerja
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Ahli Jawtankuasa Kerja </a>
</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 card">
        <form id="formahli">
            <div>
                <label class="fw-bolder">Nama Pengguna:<span style="color: red;">*</span></label>
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
                <label class="fw-bolder"> Jawatan/Gred :<span style="color: red;">*</span></label>
                <select class="form-control select2" name="jawatan" required>
                        <option>pilih</option>
                        <option value="Jawatan">Jawatan</option>
                        <option value="Gred">Gred</option>
                </select> 
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
                <label class="fw-bolder"> Alamat 3:</label>
                <input type="text" class="form-control" name="alamat3">
            </div>

             <div>
                <label class="fw-bolder"> Poskod:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
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
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Emel Peribadi:<span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email_peribadi" required>
            </div>

             <div>
                <label class="fw-bolder"> Nama Majikan:</label>
                <input type="text" class="form-control" name="nama_majikan" >
            </div>


             <div>
                <label class="fw-bolder"> Emel Majikan:</label>
                <input type="email" class="form-control" name="email_majikan" >
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
                <input type="text" class="form-control" name="no_tel_pejabat" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
            </div>

             <div>
                <label class="fw-bolder"> No Tel Peribadi:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_tel_peribadi" maxlength="12" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
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
    
$('#formahli').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formahli'));
        var url = "{{ route('admin.internal.jawatankuasasave') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                                    Swal.fire('Success', 'Berjaya', 'success');

                    var location = "{{route('admin.internal.jawatankuasalist')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
