<div class="row invoice-add">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card invoice-preview-card">
            <form id="formpengunna">
                <input type="hidden" name="pennguna_id" id="pennguna_id" value="{{$pengguna->id}}">
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
                    <input type="text" class="form-control" name="nama_pengguna" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8" {{$readonly}} value={{$pengguna->nama_pengguna}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_kad" required  {{$readonly}} value={{$pengguna->no_kad}}>
                </div>

                <div class="col-md-2 mb-1">
                    <label class="fw-bold form-label">Emel Peribadi
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email_peribadi" required {{$readonly}} value={{$pengguna->email_peribadi}}>
                </div>

                <div class="col-md-2 mb-1">
                    <label class="fw-bold form-label">Emel Taska
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email_taska" required {{$readonly}} value={{$pengguna->email_taska}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Emel Ibu Pejabat (Negeri)/ Penyelia
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email_pejabat_penyelia" required {{$readonly}} value={{$pengguna->email_pejabat_penyelia}}>
                </div>

                <div class="col-md-2 mb-1">
                    <label class="fw-bold form-label">No Tel Pejabat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_tel_pejabat" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12 {{$readonly}} value={{$pengguna->no_tel_pejabat}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">No Tel Peribadi
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_tel_peribadi" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12 {{$readonly}} value={{$pengguna->no_tel_peribadi}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Agensi/ Kementerian
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="agensi_kementerian" required>
                        <option value="" hidden>Agensi/ Kementerian</option>
                        <option value="Agensi" @if($pengguna->agensi_kementerian == 'Agensi') selected @endif>Agensi</option>
                        <option value="Kementerian" @if($pengguna->agensi_kementerian == 'Kementerian') selected @endif>Kementerian</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Jenis
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jenis" required id="jenis" onchange="checksjenis(this)">
                        <option value="" hidden>Pilih</option>
                        <option value="Kerajaan" @if($pengguna->jenis == 'Kerajaan') selected @endif>Kerajaan</option>
                        <option value="Swasta" @if($pengguna->jenis == 'Swasta') selected @endif>Swasta</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Jawatan
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jawatan" id="jawatan" required>
                            <option value="" hidden>Pilih</option>
                            <option value="1" @if($pengguna->jawatan == '1') selected @endif>1</option>
                            <option value="2" @if($pengguna->jawatan == '2') selected @endif>2</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Gred
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="gred" id="gred" required>
                        <option value="" hidden>Pilih</option>
                        <option value="1" @if($pengguna->gred == '1') selected @endif>1</option>
                        <option value="2" @if($pengguna->gred == '2') selected @endif>2</option>
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
                    <input type="text" class="form-control" name="alamat1" placeholder="Alamat 1" required {{$readonly}} value="{{$pengguna->alamat1}}">
                </div>

                <div class="col-md-12 mb-1">
                    {{-- <label class="fw-bold form-label">Alamat 2
                        <span class="text-danger">*</span>
                    </label> --}}
                    <input type="text" class="form-control" name="alamat2" placeholder="Alamat 2" required {{$readonly}} value="{{$pengguna->alamat2}}">
                </div>

                <div class="col-md-12 mb-1">
                    {{-- <label class="fw-bold form-label">Alamat 3</label> --}}
                    <input type="text" class="form-control" name="alamat3" placeholder="Alamat 3" {{$readonly}} value="{{$pengguna->alamat3}}">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Negeri
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="negeri" id="negeri" required onchange="changenegeri(this)">
                        <option value="" hidden>pilih</option>
                        @foreach($states as $state)
                            <option value="{{$state->name}}" @if($pengguna->negeri == $state->name) selected @endif>{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Daerah
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="daerah" id="daerah" required>
                         
                    </select>
                    <input type="hidden" name="daerah_selected" value="{{$pengguna->daerah}}" id="daerah_selected"> 
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Poskod
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' {{$readonly}} value="{{$pengguna->poskod}}">
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
                        <option value="">pilih</option>
                        <option value="Swasta" @if($pengguna->jenis_taska == 'Swasta') selected @endif>Swasta</option>
                        <option value="Kerajan" @if($pengguna->jenis_taska == 'Kerajan') selected @endif>Kerajan</option>
                    </select>
                </div>

                <div class="col mb-1">
                    <label class="fw-bold form-label">Tarikh Penubuhan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_penubuhan" required {{$readonly}} value="{{$pengguna->tarikh_penubuhan}}">
                </div>

                <div class="col mb-1">
                    <label class="fw-bold form-label">Jenis Bangunan
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jenisbanugunan" required>
                        <option value="">pilih</option>
                        <option value="Tempat Kerja"  @if($pengguna->jenisbanugunan == 'Kerajan') selected @endif>Tempat Kerja</option>
                        <option value="Rumah Kedai"  @if($pengguna->jenisbanugunan == 'Rumah Kedai') selected @endif>Rumah Kedai</option>
                        <option value="Bangunan"  @if($pengguna->jenisbanugunan == 'Bangunan') selected @endif>Bangunan</option>
                        <option value="Teres"  @if($pengguna->jenisbanugunan == 'Teres') selected @endif>Teres</option>
                        <option value="Banglo"  @if($pengguna->jenisbanugunan == 'Banglo') selected @endif>Banglo</option>
                    </select>
                </div>

                <div class="col mb-1">
                    <label class="fw-bold form-label">Jumlah Pendidik
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="jumla_pendidik" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' {{$readonly}} value="{{$pengguna->jumla_pendidik}}">
                </div>

                <div class="col mb-1">
                    <label class="fw-bold form-label">Jumlah Kanak-Kanak
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="jumlah_kanak" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' {{$readonly}} value="{{$pengguna->jumlah_kanak}}">
                </div>

                <div class="col mb-1">
                    <label class="fw-bold form-label">Jumlah Staf Sokongan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="jumla_staf_sokogan" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' {{$readonly}} value="{{$pengguna->jumla_staf_sokogan}}">
                </div>
            </div>
            @if($readonly != 'readonly')
            <hr>
            <div class="d-flex justify-content-end align-items-center mt-1">
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
            @endif
        </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#negeri').trigger('change');

    var jenisValue = $('#jenis').val();
    if (jenisValue == 'Swasta') {
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
            var val = $('#daerah_selected').val();
            $('#daerah').empty();
            $.each(response.daerahs, function(key, value) {
                if(val == value) {
                    $('#daerah').append('<option value="'+ value +'" selected>'+ value +'</option>');
                } else {
                    $('#daerah').append('<option value="'+ value +'">'+ value +'</option>');
                }
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

        // $('select.select2').each(function() {
        //     var element = $(this);
        //     var select2Value = element.select2('data');
        //     var selectedValues = element.val();
        //     var fieldName = element.attr('name');
        //     if (typeof element.attr('disabled') == 'undefined') {

        //         if (!selectedValues || selectedValues === '') {
        //             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
        //             return false; // Stop the loop if an error is found
        //         }
        //     }
        // });


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