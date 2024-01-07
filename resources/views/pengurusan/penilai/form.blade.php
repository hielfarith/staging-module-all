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
    <div class="col-md-8">
        <form id="formpenilai">
            <div>
                <label class="fw-bolder">Nama Pengguna/Penilai:</label>
                <input type="text" class="form-control" name="nama_pengguna">
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan:</label>
                <input type="text" class="form-control" name="no_kad">
            </div>

            <div>
                <label class="fw-bolder"> Emel Peribadi:</label>
                <input type="email" class="form-control" name="email_peribadi">
            </div>

            <div>
                <label class="fw-bolder"> Emel Ketua Jabatan:</label>
                <input type="email" class="form-control" name="email_ketua_jabatan">
            </div>

            <div>
                <label class="fw-bolder"> Emel Penyelia:</label>
                <input type="email" class="form-control" name="email_penyelia">
            </div>

            <div>
                <label class="fw-bolder"> Agensi/ Kementerian:</label>
                <input type="text" class="form-control" name="agensi_kementerian">
            </div>

            <div>
                <label class="fw-bolder"> No Tel Pejabat:</label>
                <input type="text" class="form-control" name="no_tel_pejabat" required>
            </div>

             <div>
                <label class="fw-bolder"> No Tel Peribadi:</label>
                <input type="text" class="form-control" name="no_tel_peribadi" required>
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
                <input type="text" class="form-control" maxlength="6" name="poskod" required>
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
                <label class="fw-bolder"> Gred:</label>
                  <select class="form-control select2" name="gred">
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>


            <div>
                <label class="fw-bolder"> 3 negeri pilihan bagi menjalankan penilaian SKPAK:</label>
                  <select class="form-control select2" name="negeri_skpak[]" multiple>
                        <option>select</option>
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
                    var location = "{{route('admin.internal.penilailist')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
