<div class="row invoice-add">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card invoice-preview-card">
             <form id="formagensi" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Ketua Agensi
                    </span>
                </h5>
                <input type="hidden" name="agensi_id" value="{{$agensi->id}}">
                <div class="col-sm-9 col-12 mb-1">
                    <label class="form-label fw-bold">Nama Ketua Agensi/ Pengguna</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <select class="form-control select2" name="panggilan" required>
                                <option value="" hidden>Gelaran</option>
                                <option value="Dato'" @if($agensi->panggilan == "Dato'") selected @endif>Dato'</option>
                                <option value="Datin" @if($agensi->panggilan == 'Datin') selected @endif >Datin</option>
                                <option value="Prof." @if($agensi->panggilan == 'Prof.') selected @endif >Prof.</option>
                                <option value="Prof Madya" @if($agensi->panggilan == 'Prof Madya') selected @endif >Prof Madya</option>
                                <option value="Dr." @if($agensi->panggilan == 'Dr.') selected @endif >Dr.</option>
                                <option value="Tuan" @if($agensi->panggilan == 'Tuan') selected @endif >Tuan</option>
                                <option value="Puan" @if($agensi->panggilan == 'Puan') selected @endif >Puan</option>
                                <option value="Cik" @if($agensi->panggilan == 'Cik') selected @endif >Cik</option>
                            </select>
                        </span>
                        <input type="text" class="form-control" name="nama_pengguna" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8" {{$readonly}} value={{$agensi->nama_pengguna}}>
                    </div>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_kad" required {{$readonly}} value={{$agensi->no_kad}}>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Emel Ketua Pengarah/ Pengarah
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email_ketua" required {{$readonly}} value={{$agensi->email_ketua}}>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">No Tel Pejabat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_tel_pejabat" maxlength="12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' {{$readonly}} value={{$agensi->no_tel_pejabat}}>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">No Tel Peribadi
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_tel_peribadi" maxlength="12" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' {{$readonly}} value={{$agensi->no_tel_peribadi}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Jenis
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jenis" required {{$disabled}}>
                        <option value="" hidden>Sila Pilih</option>
                        <option value="Kerajaan" @if($agensi->jenis == 'Kerajaan') selected @endif>Kerajaan</option>
                        <option value="Swasta" @if($agensi->panggilan == 'Swasta') selected @endif>Swasta</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Jawatan
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="jawatan" id="jawatan" required {{$disabled}}>
                            <option value="" hidden>Sila Pilih</option>
                            <option value="1" @if($agensi->jawatan == '1') selected @endif>1</option>
                            <option value="2" @if($agensi->jawatan == '2') selected @endif>2</option>
                    </select>
                </div>

                <div class="col-md-2 mb-1">
                    <label class="fw-bold form-label">Gred
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="gred" id="gred" required {{$disabled}}>
                        <option value="" hidden>Sila Pilih</option>
                        <option value="1" @if($agensi->gred == '1') selected @endif>1</option>
                        <option value="2" @if($agensi->gred == '2') selected @endif>2</option>
                    </select>
                </div>

                <div class="col-md-1 mb-1">
                    <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="checkbox" id="modul" name="modul" value="1" required @if($agensi->modul) checked @endif {{$disabled}}/>
                        <label class="form-check-label fw-bolder">Modul
                            <span class="text-danger">*</span>
                        </label>
                    </div>
                </div>
                <?php
                    $data = json_decode($agensi->agensi_kementerian, true);
                ?>
                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Agensi/ Kementerian
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="agensi_kementerian[]" multiple required {{$disabled}}>
                        <option value="" hidden>Agensi/ Kementerian</option>
                        <option value="Agensi" @if(!empty($data) && in_array("Agensi", $data))selected @endif>Agensi</option>
                        <option value="Kementerian" @if(!empty($data) && in_array("Kementerian", $data))selected @endif>Kementerian</option>
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
                    <input type="text" class="form-control" name="alamat1" placeholder="Alamat 1" required {{$readonly}} value={{$agensi->alamat1}}>
                </div>

                <div class="col-md-12 mb-1">
                    {{-- <label class="fw-bold form-label">Alamat 2
                        <span class="text-danger">*</span>
                    </label> --}}
                    <input type="text" class="form-control" name="alamat2" placeholder="Alamat 2" required {{$readonly}} value={{$agensi->alamat2}}>
                </div>

                <div class="col-md-12 mb-1">
                    {{-- <label class="fw-bold form-label">Alamat 3</label> --}}
                    <input type="text" class="form-control" name="alamat3" placeholder="Alamat 3" {{$readonly}} value={{$agensi->alamat3}}>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Negeri
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="negeri" id="negeri" required {{$disabled}} onchange="changenegeri(this)">
                        <option value="" hidden>Sila Pilih</option>
                        @foreach($states as $state)
                            <option value="{{$state->name}}" @if($agensi->negeri == $state->name) selected @endif>{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Daerah
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="daerah" id="daerah" required {{$disabled}}>
                        <option value="" hidden>Sila Pilih</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Poskod
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'{{$readonly}} value={{$agensi->poskod}}>
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

<script>
$('#negeri').trigger('change');

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


$('#formagensi').submit(function(event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('formagensi'));
    var error = false;
   $('select.select2').each(function() {
        var element = $(this);
        var select2Value = element.select2('data');
        var selectedValues = element.val();
        var fieldName = element.attr('name');
        if (typeof element.attr('disabled') == 'undefined') {

            if (!selectedValues || selectedValues === '') {
                Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                error = true;
                return false; // Stop the loop if an error is found
            }
        }
    });


    formData.forEach(function(value, name) {
        var element = $("input[name='"+name+"']");
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

    var url = "{{ route('admin.internal.agensisave') }}"
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
           if (response.status) {
                Swal.fire('Success', 'Berjaya', 'success');
                var location = "{{route('admin.internal.agensilist')}}"
                window.location.href = location;
           }
        }
       
    });

});


</script>
