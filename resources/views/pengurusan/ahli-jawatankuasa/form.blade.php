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
    <div class="col-md-8">
        <form id="formahli">
            <div>
                <label class="fw-bolder">Nama Pengguna/Penilai:</label>
                <input type="text" class="form-control" name="nama_pengguna" required>
            </div>

            <div>
                <label class="fw-bolder"> Panggilan:</label>
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
                <label class="fw-bolder">No Kad Pengenalan:</label>
                <input type="text" class="form-control" name="no_kad" required>
            </div>
            
            <div>
                <label class="fw-bolder"> Jawatan/Gred :</label>
                <select class="form-control select2" name="jawatan" required>
                        <option>pilih</option>
                        <option value="Jawatan">Jawatan</option>
                        <option value="Gred">Gred</option>
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
                        <option>pilih</option>
                        @foreach($states as $state)
                        <option value="{{$state->name}}">{{$state->name}}</option>
                        @endforeach
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Emel Peribadi::</label>
                <input type="text" class="form-control flatpickr" name="email_peribadi" required>
            </div>

             <div>
                <label class="fw-bolder"> Nama Majikan:</label>
                <input type="text" class="form-control" name="nama_majikan" >
            </div>


             <div>
                <label class="fw-bolder"> Emel Majikan:</label>
                <input type="text" class="form-control" name="email_majikan" >
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
                <label class="fw-bolder"> No Tel Pejabat:</label>
                <input type="text" class="form-control" name="no_tel_pejabat">
            </div>

             <div>
                <label class="fw-bolder"> No Tel Peribadi:</label>
                <input type="text" class="form-control" name="no_tel_peribadi" maxlength="12" required>
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
                    var location = "{{route('admin.internal.jawatankuasalist')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
