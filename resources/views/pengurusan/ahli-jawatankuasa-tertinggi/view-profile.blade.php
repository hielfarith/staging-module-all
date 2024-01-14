<form id="formtertinggi" novalidate="novalidate">
    <div class="row">
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Ahli Jawatankuasa Tinggi
            </span>
        </h5>
        <input type="hidden" name="tinggi_id" value="{{$ahli->id}}">
        <div class="col-sm-9 col-12 mb-1">
            <label class="form-label fw-bold">Nama Ahli Jawatankuasa/ Pengguna
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <span class="input-group-text">
                    <select class="form-control select2" name="panggilan" required>
                        <option value="" hidden>Gelaran</option>
                        <option value="Dato'" @if($ahli->panggilan == "Dato'") selected @endif>Dato'</option>
                        <option value="Datin" @if($ahli->panggilan == 'Datin') selected @endif >Datin</option>
                        <option value="Prof." @if($ahli->panggilan == 'Prof.') selected @endif >Prof.</option>
                        <option value="Prof Madya" @if($ahli->panggilan == 'Prof Madya') selected @endif >Prof Madya</option>
                        <option value="Dr." @if($ahli->panggilan == 'Dr.') selected @endif >Dr.</option>
                        <option value="Tuan" @if($ahli->panggilan == 'Tuan') selected @endif >Tuan</option>
                        <option value="Puan" @if($ahli->panggilan == 'Puan') selected @endif >Puan</option>
                        <option value="Cik" @if($ahli->panggilan == 'Cik') selected @endif >Cik</option>
                        </select>
                    </select>
                </span>
                <input type="text" class="form-control" name="nama_pengguna" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8" {{$readonly}} value={{$ahli->nama_pengguna}}>
            </div>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_kad" required {{$readonly}} value={{$ahli->no_kad}}>
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">No Tel Pejabat
            </label>
            <input type="text" class="form-control" name="no_tel_pejabat" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12 {{$readonly}} value={{$ahli->no_tel_pejabat}}>
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">No Tel Peribadi
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_tel_peribadi" maxlength="12" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' {{$readonly}} value={{$ahli->no_tel_peribadi}}>
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Emel Peribadi
                <span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control" name="email_peribadi" required {{$readonly}} value={{$ahli->email_peribadi}}>
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Jenis
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="jawatan" required {{$disabled}}>
                <option value="" hidden>Sila Pilih</option>
                <option value="Kerajaan" @if($ahli->jawatan == 'Kerajaan') selected @endif>Kerajaan</option>
                <option value="Swasta" @if($ahli->jawatan == 'Swasta') selected @endif>Swasta</option>
            </select>
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Agensi/ Kementerian
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="agensi_kementerian" required {{$disabled}}>
                <option value="" hidden>Sila Pilih</option>
                <option value="Agensi" @if($ahli->agensi_kementerian == 'Agensi') selected @endif>Agensi</option>
                <option value="Kementerian" @if($ahli->agensi_kementerian == 'Kementerian') selected @endif>Kementerian</option>
            </select>
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Tarikh Perlantikan
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control flatpickr" name="tarikh_perlantikan" required {{$readonly}} value={{$ahli->tarikh_perlantikan}}>
            <p class="text-muted">
                <i>AJK Tinggi Unit Jaminan Kualiti</i>
            </p>
        </div>

        <hr>
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Majikan
            </span>
        </h5>

        <div class="col-md-8 mb-1">
            <label class="fw-bold form-label">Nama Majikan
            </label>
            <input type="text" class="form-control" name="nama_majikan" {{$readonly}} value={{$ahli->nama_majikan}}>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Emel Majikan
            </label>
            <input type="email" class="form-control" name="email_majikan" {{$readonly}} value={{$ahli->email_majikan}}>
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
            <input type="text" class="form-control" name="alamat1" placeholder="Alamat 1" required {{$readonly}} value={{$ahli->alamat1}}>
        </div>

        <div class="col-md-12 mb-1">
            {{-- <label class="fw-bold form-label">Alamat 2
                <span class="text-danger">*</span>
            </label> --}}
            <input type="text" class="form-control" name="alamat2" placeholder="Alamat 2" required {{$readonly}} value={{$ahli->alamat2}}>
        </div>

        <div class="col-md-12 mb-1">
            {{-- <label class="fw-bold form-label">Alamat 3</label> --}}
            <input type="text" class="form-control" name="alamat3" placeholder="Alamat 3" {{$readonly}} value={{$ahli->alamat3}}>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Negeri
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="negeri" id="negeri" required {{$disabled}} onchange="changenegeri(this)">
                <option value="" hidden>Sila pilih</option>
                @foreach($states as $state)
                    <option value="{{$state->name}}">{{$state->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Daerah
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="daerah" id="daerah" required {{$disabled}} value={{$ahli->nama_pengguna}}>>
                <option value="" hidden>Sila pilih</option>
            </select>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Poskod
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' {{$readonly}} value={{$ahli->poskod}}>
        </div>
    </div>

    <hr>

    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="submit" class="btn btn-primary float-right">Simpan</button>
    </div>
</form>

<script type="text/javascript">
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


$('#formtertinggi').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formtertinggi'));
        var error = false;
        $('select.select2').each(function() {
            var element = $(this);
            var select2Value = element.select2('data');
            var selectedValues = element.val();
            var fieldName = element.attr('name');
            if (typeof element.attr('disabled') == 'undefined') {

                if (!selectedValues || selectedValues === '') {
                    Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                    error= true;
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
        var url = "{{ route('admin.internal.jawatankuasatertinggisave') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('admin.internal.jawatankuasatertinggilist')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>
