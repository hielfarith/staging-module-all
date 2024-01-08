@extends('layouts.app')
@section('header')
Pengurusan KETUA AGENSI
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan KETUA AGENSI </a>
</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <form id="formagensi">
            <div>
                <label class="fw-bolder">Nama Pengguna/Penilai:</label>
                <input type="text" class="form-control" name="nama_pengguna">
            </div>

            <div>
                <label class="fw-bolder"> Panggilan:</label>
                  <select class="form-control select2" name="panggilan">
                        <option>select</option>
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
                <input type="text" class="form-control" name="no_kad">
            </div>

            <div>
                <label class="fw-bolder">
                    <input type="radio" name="jenis" class="form-check-input" value="Kerajan">Kerajan
                </label>
                <label class="fw-bolder">
                    <input type="radio" name="jenis"class="form-check-input"  value="Swasta">Swasta
                </label>
            </div>

            <div>
                <label class="fw-bolder">Jawatan:</label>
                <input type="text" name="jawatan" value="" class="form-control">
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
                    <input type="checkbox" name="modul" value="1" class="form-check-input">Modul
                </label>
            </div>
           
            <div>
                <label class="fw-bolder"> Agensi/ Kementerian:</label>
                  <select class="form-control select2" name="agensi_kementerian[]" multiple>
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
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
                <input type="text" class="form-control" maxlength="5" name="poskod" required>
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
                        @foreach($states as $state)
                        <option value="{{$state->name}}">{{$state->name}}</option>
                        @endforeach
                </select>
            </div>

            <div>
                <label class="fw-bolder">  Emel Ketua Pengarah/ Pengarah:</label>
                <input type="email" class="form-control" name="email_ketua">
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
