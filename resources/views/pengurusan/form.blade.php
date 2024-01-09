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
    {{-- <div class="card-header">
        <h4 class="card-title fw-bold">
            Maklumat Ketua Taska Baru
        </h4>
    </div>

    <hr> --}}

    <div class="card-body">
        <form id="formpengunna" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Ketua Taska
                    </span>
                </h5>

                <div class="col-md-9 mb-1">
                    <label class="fw-bold form-label">Nama Pengguna/ Ketua Taska
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_pengguna" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
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
                    <label class="fw-bold form-label">Emel Taska
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email_taska" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Emel Ibu Pejabat (Negeri)/ Penyelia
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email_pejabat_penyelia" required>
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
                    <label class="fw-bold form-label">Jenis
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jenis" required onchange="checksjenis(this)">
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
                    <select class="form-control select2" name="daerah" required id="daerah">
                       <!-- add -->
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Poskod
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>

                <hr>
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Taska
                    </span>
                </h5>

                <div class="col mb-1">
                    <label class="fw-bold form-label">Jenis Taska
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jenis_taska" required>
                        <option value="">Jenis Taska</option>
                        <option value="swasta">swasta</option>
                        <option value="kerajan">kerajan</option>
                    </select>
                </div>

                <div class="col mb-1">
                    <label class="fw-bold form-label">Tarikh Penubuhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_penubuhan" required>
                </div>

                <div class="col mb-1">
                    <label class="fw-bold form-label">Jenis Bangunan
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jenisbanugunan" required>
                        <option value="">pilih</option>
                        <option value="tempat kerja">Tempat Kerja</option>
                        <option value="rumah kedai">Rumah Kedai</option>
                        <option value="bangunan">Bangunan</option>
                        <option value="teres">Teres</option>
                        <option value="banglo">Banglo</option>
                    </select>
                </div>

                <div class="col mb-1">
                    <label class="fw-bold form-label">Jumlah Pendidik
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="jumla_pendidik" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>

                <div class="col mb-1">
                    <label class="fw-bold form-label">Jumlah Kanak-Kanak
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="jumlah_kanak" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>

                <div class="col mb-1">
                    <label class="fw-bold form-label">Jumlah Staf Sokongan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="jumla_staf_sokogan" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
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
    <div class="col-md-8 card">
        <form id="formpengunna" novalidate="novalidate">
            <div>
                <label class="fw-bold">Nama Pengguna/ Ketua Taska<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="nama_pengguna" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
            </div>

            <div>
                <label class="fw-bold">No Kad Pengenalan atau passport<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_kad" required>
            </div>

            <div>
                <label class="fw-bold"> Emel Peribadi<span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email_peribadi" required>
            </div>

            <div>
                <label class="fw-bold"> Emel Taska<span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email_taska" required>
            </div>

            <div>
                <label class="fw-bold"> Emel Ibu Pejabat (Negeri)/ Penyelia<span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email_pejabat_penyelia" required>
            </div>

            <div>
                <label class="fw-bold"> Agensi/ Kementerian<span style="color: red;">*</span></label>
                <select class="form-control select2" name="agensi_kementerian" required>
                    <option value="">pilih</option>
                    <option value="Agensi">Agensi</option>
                    <option value="Kementerian">Kementerian</option>
                </select>
            </div>

            <div>
                <label class="fw-bold"> Jenis <span style="color: red;">*</span></label>
                <select class="form-control select2" name="jenis" required onchange="checksjenis(this)">
                        <option value="">pilih</option>
                        <option value="Kerajaan">Kerajaan</option>
                        <option value="Swasta">Swasta</option>
                </select>
            </div>

            <div>
                <label class="fw-bold"> Jawatan<span style="color: red;">*</span></label>
                <select class="form-control select2" name="jawatan" id="jawatan" required>
                        <option value="">pilih</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

            <div>
                <label class="fw-bold"> Gred<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="gred" id="gred" required>
                        <option value="">pilih</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

             <div>
                <label class="fw-bold"> Alamat 1<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="alamat1" required>
            </div>

             <div>
                <label class="fw-bold"> Alamat 2<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="alamat2" required>
            </div>

             <div>
                <label class="fw-bold"> Alamat 3</label>
                <input type="text" class="form-control" name="alamat3">
            </div>

             <div>
                <label class="fw-bold"> Poskod<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
            </div>

             <div>
                <label class="fw-bold"> Negeri<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="negeri" id="negeri" required onchange="changenegeri(this)">
                        <option value="">pilih</option>
                        @foreach($states as $state)
                        <option value="{{$state->name}}">{{$state->name}}</option>
                        @endforeach
                </select>
            </div>

              <div>
                <label class="fw-bold"> Daerah<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="daerah" id="daerah" required>
                       <option value="">pilih</option>
                        @foreach($dearhs as $dearh)
                        <option value="{{$dearh->name}}">{{$dearh->name}}</option>
                        @endforeach
                </select>
            </div>

             <div>
                <label class="fw-bold"> Tarikh Penubuhan<span style="color: red;">*</span></label>
                <input type="text" class="form-control flatpickr" name="tarikh_penubuhan" required>
            </div>

            <div>
                <label class="fw-bold"> Jenis Taska<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="jenis_taska" required>
                        <option value="">pilih</option>
                        <option value="swasta">swasta</option>
                        <option value="kerajan">kerajan</option>
                </select>
            </div>

             <div>
                <label class="fw-bold"> Jumla Pendidik<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="jumla_pendidik" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>

             <div>
                <label class="fw-bold"> Jumlah Kank-Kanak<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="jumlah_kanak" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>


             <div>
                <label class="fw-bold"> Jumla Staf Sokogan<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="jumla_staf_sokogan" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>

            <div>
                <label class="fw-bold"> Jenis Banugunan<span style="color: red;">*</span></label>
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
                <label class="fw-bold"> No Tel Pejabat<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_tel_pejabat" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
            </div>


             <div>
                <label class="fw-bold"> No Tel Peribadi<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_tel_peribadi" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
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
            var element = $("input[name="+name+"]");
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
