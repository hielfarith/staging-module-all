@extends('layouts.app')

@section('header')
Pengurusan Ketua Taska
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat Ketua Taska Baru </a>
</li>
@endsection

@section('content')
<style>
    .delete-button {
        display: none;
    }
</style>

<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder">
            Maklumat Ketua Taska Baru
        </h4>
    </div>

    <hr>

    <div class="card-body">
        <div class="row">
            <form action="{{ route('admin.internal.penggunasave') }}" id="formpengunna" method="post" data-swal="Maklumat Ketua Taska Berjaya Disimpan">
                @csrf

                <div class="row">
                    <div class="col-md-9 mb-1">
                        <label class="form-label fw-bolder">Nama Pengguna/ Ketua Taska<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="nama_pengguna" required required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bolder">No Kad Pengenalan/ Pasport<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="no_kad" required>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">No Tel Peribadi<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="no_tel_peribadi" required>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Emel Peribadi<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="email_peribadi" required>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Emel Ibu Pejabat (Negeri)/ Penyelia<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="email_pejabat_penyelia" required>
                    </div>

                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Agensi/ Kementerian<span style="color: red;">*</span></label>
                            <select class="form-control select2" name="agensi_kementerian" required>
                            <option value="">pilih</option>
                            <option value="Agensi">Agensi</option>
                            <option value="Kementerian">Kementerian</option>
                        </select>                     
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Jenis<span style="color: red;">*</span></label>
                        <select class="form-control select2" id="pilihan_swasta" name="pilihan_swasta" required onchange="checksjenis(this)">
                            <option value="">pilih</option>
                            <option value="Kerajaan">Kerajaan</option>
                            <option value="Swasta">Swasta</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Jawatan<span style="color: red;">*</span></label>
                        <select class="form-control select2" id="jawatan" name="jawatan" id="jawatan" required>
                            <option value="" hidden>Jawatan</option>
                            <option value="1">1</option>
                            <option value="2" selected>2</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Gred<span style="color: red;">*</span></label>
                        <select class="form-control select2" id="gred" name="gred" id="gred" required>
                            <option value="" hidden>Gred</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Alamat 1<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="alamat1" required>
                    </div>

                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Alamat 2<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="alamat2" required>
                    </div>

                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Alamat 3</label>
                        <input type="text" class="form-control" name="alamat3">
                    </div>

                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Poskod<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>


                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Negeri <span style="color: red;">*</span></label>
                         <select class="form-control select2" name="negeri" required>
                            <option value="">pilih</option>
                            @foreach($states as $state)
                            <option value="{{$state->name}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
              
                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">Daerah<span style="color: red;">*</span></label>
                        <select class="form-control select2" id="daerah" name="daerah" required>
                            <option value="" hidden>Gred</option>
                            <option value="1">Hulu Langat</option>
                            <option value="2">Ampang</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-1">
                        <label class="form-label fw-bolder">Emel TASKA<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="email_taska" required>
                    </div>

                    <div class="col-md-6 mb-1">
                        <label class="form-label fw-bolder">No Tel Pejabat<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="no_tel_pejabat" required>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bolder">Tarikh Penubuhan<span style="color: red;">*</span></label>
                        <input type="text" class="form-control flatpickr" name="tarikh_penubuhan" required>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bolder">Jenis Taska<span style="color: red;">*</span></label>
                        <select class="form-control select2" id="jenisbanugunan" name="jenisbanugunan" required>
                            <option value="" hidden>Jenis Taska</option>
                            <option value="1">Swasta</option>
                            <option value="2">Kerajaan</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bolder">Jenis Bangunan<span style="color: red;">*</span></label>
                        <select class="form-control select2" id="jenis_taska" name="jenis_taska" required>
                            <option value="" hidden>Jenis Taska</option>
                            <option value="tempat_kerja">Tempat Kerja</option>
                            <option value="rumah_kedai">Rumah Kedai</option>
                            <option value="bangunan">Bangunan</option>
                            <option value="teres">Teres</option>
                            <option value="banglo">Banglo</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-1">
                        <label class="form-label fw-bolder">Jumlah Staf Sokongan<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="jumla_staf_sokogan" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bolder">Jumlah Pendidik<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="jumla_pendidik" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bolder">Jumlah Kanak-Kanak<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="jumlah_kanak" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bolder">Nisbah Pendidik & Kanak-Kanak<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="nisbah_pendidik" required>
                        <p class="text-muted">
                            <i> Mengikut Umur </i>
                        </p>
                    </div>
                </div>

                <div class="d-flex justify-content-end align-items-center my-1">
                    <button type="button" class="btn btn-primary float-right" onclick="generalFormSubmit(this);" id="submitKetuaBaru" hidden>Hantar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end align-items-center mb-1">
            <button class="btn btn-primary" onclick="$('#submitKetuaBaru').trigger('click');">
                <span class="align-middle d-sm-inline-block d-none">
                    Simpan Maklumat
                </span>
            </button>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
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
        formData.forEach(function(value, name) {
            var element = $("input[name="+name+"]");
            if (typeof element.attr('name') != 'undefined') {
                if (element.val() == '') {
                    Swal.fire('Error', 'Please fill required fields', 'error');
                    return false;
                }
            }
        });
        var select2 = ['jenis','jawatan','gred', 'negeri','daerah','jenis_taska','jenisbanugunan'];   
      
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
