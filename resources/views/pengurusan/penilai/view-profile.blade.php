<form id="formpenilai">
    <div class="row">
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Panel Penilai
            </span>
        </h5>
        <input type="hidden" name="penilai_id" id="penilai_id" value="{{$penilai->id}}">

        <div class="col-md-9 mb-1">
            <label class="fw-bold form-label">Nama Panel Penilai/ Pengguna
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="nama_pengguna" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8" {{$readonly}} value="{{$penilai->nama_pengguna}}">
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">No Kad Pengenalan
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_kad" required {{$readonly}} value="{{$penilai->no_kad}}">
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Emel Peribadi
                <span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control" name="email_peribadi" required {{$readonly}} value="{{$penilai->email_peribadi}}">
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Emel Ketua Jabatan
                <span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control" name="email_ketua_jabatan" required {{$readonly}} value="{{$penilai->email_ketua_jabatan}}">
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Emel Penyelia
                <span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control" name="email_penyelia" required {{$readonly}} value="{{$penilai->email_penyelia}}">
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">No Tel Pejabat
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_tel_pejabat" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12 {{$readonly}} value="{{$penilai->no_tel_pejabat}}">
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">No Tel Peribadi
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_tel_peribadi" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12 {{$readonly}} value="{{$penilai->no_tel_peribadi}}">
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Agensi/ Kementerian
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="agensi_kementerian" required>
                <option value="" hidden>Agensi/ Kementerian</option>
                <option value="Agensi" @if($penilai->agensi_kementerian == 'Agensi') selected @endif>Agensi</option>
                <option value="Kementerian" @if($penilai->agensi_kementerian == 'Kementerian') selected @endif>Kementerian</option>
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Gred
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="gred" id="gred" required>
                <option value="" hidden>Gred</option>
                <option value="1" @if($penilai->gred == '1') selected @endif>1</option>
                <option value="2" @if($penilai->gred == '2') selected @endif>2</option>

            </select>
        </div>
        <?php
            $data = json_decode($penilai->negeri_skpak, true);
        ?>
        <div class="col-md-6 mb-1">
            <label class="fw-bold form-label">3 negeri pilihan bagi menjalankan penilaian SKPAK
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="negeri_skpak[]" id="negeri_skpak" multiple>
                <option value="" hidden>3 negeri pilihan bagi menjalankan penilaian SKPAK</option>
                @foreach($states as $state)
                    <option value="{{$state->name}}" @if(!empty($data) && in_array($state->name, $data))selected @endif>{{$state->name}}</option>
                @endforeach
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
            <input type="text" class="form-control" name="alamat1" placeholder="Alamat 1" required {{$readonly}} value="{{$penilai->alamat1}}">
        </div>

        <div class="col-md-12 mb-1">
            {{-- <label class="fw-bold form-label">Alamat 2
                <span class="text-danger">*</span>
            </label> --}}
            <input type="text" class="form-control" name="alamat2" placeholder="Alamat 2" required {{$readonly}} value="{{$penilai->alamat2}}">
        </div>

        <div class="col-md-12 mb-1">
            {{-- <label class="fw-bold form-label">Alamat 3</label> --}}
            <input type="text" class="form-control" name="alamat3" placeholder="Alamat 3" {{$readonly}} value="{{$penilai->alamat3}}">
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Negeri
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="negeri" id="negeri" required onchange="changenegeri(this)">
                <option value="" hidden>Negeri</option>
                @foreach($states as $state)
                    <option value="{{$state->name}}" @if($penilai->negeri == $state->name) selected @endif>{{$state->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Daerah
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="daerah" id="daerah" required>

            </select>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Poskod
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' {{$readonly}} value="{{$penilai->poskod}}">
        </div>

        @if($readonly != 'readonly')
        <hr>
        <div class="d-flex justify-content-end align-items-center mt-1">
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </div>
        @endif
        
    </div>
</form>

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



$('#formpenilai').submit(function(event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('formpenilai'));
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

    var url = "{{ route('admin.internal.penilaisave') }}"
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
           if (response.status) {
                Swal.fire('Success', 'Berjaya', 'success');
                var location = "{{route('admin.internal.penilailist')}}"
                window.location.href = location;
           }
        }

    });

});

</script>
