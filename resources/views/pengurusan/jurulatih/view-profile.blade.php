<form id="formjurulaith" novalidate="novalidate">
<div class="row">
    <h5 class="mb-2 fw-bold">
        <span class="badge rounded-pill badge-light-primary">
            Maklumat Jurulatih
        </span>
    </h5>

    <div class="col-md-9 mb-1">
        <label class="fw-bold form-label">Nama Jurulatih/ Pengguna
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="nama_pengguna" required {{$readonly}} value="{{$jurulatih->nama_pengguna}}">
    </div>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="no_kad" required {{$readonly}} value="{{$jurulatih->no_kad}}">
    </div>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Warganegara
            <span class="text-danger">*</span>
        </label>
        <select name="warganegara" id="warganegara" class="form-control select2" required {{$disabled}}>
            <option value="" hidden>Warganergara</option>
            @foreach ($negaras as $negara)
                <option value="{{ $negara->name }}" @if($jurulatih->warganegara == $negara->name)  selected @endif>{{ $negara->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Jantina
            <span class="text-danger">*</span>
        </label>
        <select name="jantina" id="jantina" class="form-control select2" required {{$disabled}}>
            <option value="" hidden>Warganergara</option>
            @foreach ($jantinas as $id => $jantina)
                <option value="{{ $id }}" @if($jurulatih->jantina == $id)  selected @endif>{{ $jantina }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Kaum
            <span class="text-danger">*</span>
        </label>
        <select name="kaum" id="kaum" class="form-control select2" required {{$disabled}}>
            <option value="" hidden>Kaum</option>
            @foreach ($kaums as $id => $kaum)
                <option value="{{ $id }}" @if($jurulatih->kaum == $id)  selected @endif>{{ $kaum }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Tarikh Lahir
            <span class="text-danger">*</span>
        </label>
        <input type="text" id="tarikh_lahir" name="tarikh_lahir" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" required {{$readonly}} value="{{$jurulatih->tarikh_lahir}}">
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Telefon Rumah
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="telefon_rumah" required {{$readonly}} value="{{$jurulatih->telefon_rumah}}">
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Telefon Bimbit
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="telefon_bimbit" required {{$readonly}} value="{{$jurulatih->telefon_bimbit}}">
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Email
            <span class="text-danger">*</span>
        </label>
        <input type="email" class="form-control" name="email" required {{$readonly}} value="{{$jurulatih->telefon_bimbit}}">
    </div>

    <hr>
    <h5 class="mb-2 fw-bold">
        <span class="badge rounded-pill badge-light-primary">
            Maklumat Penempatan/ Lantikan
        </span>
    </h5>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Gred Jawatan
            <span class="text-danger">*</span>
        </label>
        <select class="form-control select2" name="gred_jawatan" id="gred_jawatan" required {{$disabled}}>
            <option value="" hidden>Gred</option>
            <option value="1" @if($jurulatih->gred_jawatan == '1')  @endif>1</option>
            <option value="2" @if($jurulatih->gred_jawatan == '1')  @endif>2</option>
        </select>
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Tarikh Lantikan ke Gred Semasa
            <span class="text-danger">*</span>
        </label>
        <input type="text" id="" name="tarikh_lantikan" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" required {{$readonly}} value="{{$jurulatih->tarikh_lantikan}}">
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Tarikh Mula Bertugas di PLD
            <span class="text-danger">*</span>
        </label>
        <input type="text" id="" name="tarikh_mula" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" required {{$readonly}} value="{{$jurulatih->tarikh_mula}}">
    </div>

    <div class="col-md-12 mb-1">
        <label class="fw-bold form-label">Majikan
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="majikan" required {{$readonly}} value="{{$jurulatih->majikan}}">
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label"> Jarak Rumah ke Pusat Latihan
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="jarak_rumah" required {{$readonly}} value="{{$jurulatih->jarak_rumah}}">
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label"> Penerima Bayaran Insentif Jurulatih Sukan
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="penerima_bayaran" required {{$readonly}} value="{{$jurulatih->penerima_bayaran}}">
    </div>

    <div class="col-md-12 mb-1">
        <label class="fw-bold form-label">Jurulatih Sukan
            <span class="text-danger">*</span>
        </label>
        <select name="jurulaith_sukan" id="" class="form-control select2" multiple required {{$disabled}}>
            <option value="" hidden>Jurulatih Sukan</option>
            @foreach ($sukans as $id => $sukan)
                <option value="{{ $id }}" @if($jurulatih->jurulaith_sukan == $id)  @endif>{{ $sukan }}</option>
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
        <input type="text" class="form-control" name="alamat1" placeholder="Alamat 1" required {{$readonly}} value="{{$jurulatih->alamat1}}">
    </div>

    <div class="col-md-12 mb-1">
        {{-- <label class="fw-bold form-label">Alamat 2
            <span class="text-danger">*</span>
        </label> --}}
        <input type="text" class="form-control" name="alamat2" placeholder="Alamat 2" required {{$readonly}} value="{{$jurulatih->alamat2}}">
    </div>

    <div class="col-md-12 mb-1">
        {{-- <label class="fw-bold form-label">Alamat 3</label> --}}
        <input type="text" class="form-control" name="alamat3" placeholder="Alamat 3"  {{$readonly}} value="{{$jurulatih->alamat3}}">
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Bandar
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="bandar" required {{$readonly}} value="{{$jurulatih->bandar}}">
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Negeri
            <span class="text-danger">*</span>
        </label>
        <select name="negeri" id="" class="form-control select2" required {{$disabled}}>
            <option value="" hidden>Negeri</option>
            @foreach ($negeris as $negeri)
                <option value="{{ $negeri->name }}" @if($jurulatih->negeri == $negeri->name)  @endif>{{ $negeri->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Poskod
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="poskod" maxlength="5" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' required {{$readonly}} value="{{$jurulatih->poskod}}">
    </div>

    <hr>
    <h5 class="mb-2 fw-bold">
        <span class="badge rounded-pill badge-light-primary">
            Maklumat Kesihatan
        </span>
    </h5>

    <div class="col-md-12 mb-1">
        <label class="fw-bold form-label">Maklumat Kesihatan
            <span class="text-danger">*</span>
        </label>
        <textarea class="form-control" name="maklumat_kesihatan" id="" rows="4" required {{$disabled}}>{{$jurulatih->maklumat_kesihatan}}</textarea>
    </div>

    <hr>
    <h5 class="mb-2 fw-bold">
        <span class="badge rounded-pill badge-light-primary">
            Maklumat Sekolah
        </span>
    </h5>

    <div class="col-md-12 mb-1">
        <label class="fw-bold form-label">Maklumat Sekolah
            <span class="text-danger">*</span>
        </label>
        <textarea class="form-control" name="maklumat_sekolah" id="" rows="4" required {{$disabled}}>
            {{$jurulatih->maklumat_sekolah}}
        </textarea>
    </div>

    <hr>
    <h5 class="mb-2 fw-bold">
        <span class="badge rounded-pill badge-light-primary">
            Spesifik
        </span>
    </h5>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Persijilan
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="persijilan" required {{$readonly}} value="{{$jurulatih->persijilan}}">
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Tahap/Gred
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="tahap_gred" required {{$readonly}} value="{{$jurulatih->tahap_gred}}">
    </div>

    <div class="col-md-4 mb-1">
        <label class="fw-bold form-label">Tarikh Pensijilan
            <span class="text-danger">*</span>
        </label>
        <input type="text" id="" name="tarikh_pensijilan" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" required {{$readonly}} value="{{$jurulatih->tarikh_pensijilan}}">
    </div>

    <div class="col-md-12 mb-1">
        <label class="fw-bold form-label">Muat Naik Sijil
            <span class="text-danger">*</span>
        </label>
        <input type="file" class="form-control" name="sijil_path" required {{$readonly}}>
    </div>

    <hr>
    <h5 class="mb-2 fw-bold">
        <span class="badge rounded-pill badge-light-primary">
            Sains Sukan
        </span>
    </h5>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Persijilan
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="sains_sukan_persijilan" required {{$readonly}} value="{{$jurulatih->sains_sukan_persijilan}}">
    </div>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Tarikh Pensijilan
            <span class="text-danger">*</span>
        </label>
        <input type="text" id="" name="sains_sukan_tarikh_pensijilan" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" required {{$readonly}} value="{{$jurulatih->sains_sukan_tarikh_pensijilan}}">
    </div>

    <div class="col-md-12 mb-1">
        <label class="fw-bold form-label">Muat Naik Sijil
            <span class="text-danger">*</span>
        </label>
        <input type="file" class="form-control" name="sains_sukan_sijil_path" required {{$readonly}}>
    </div>

    <hr>
    <h5 class="mb-2 fw-bold">
        <span class="badge rounded-pill badge-light-primary">
            Skim Persijilan Kejurulatihan Kebangsaan (SPKK)
        </span>
    </h5>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Persijilan
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="spkk_persijilan" required {{$readonly}} value="{{$jurulatih->spkk_persijilan}}">
    </div>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Tarikh Pensijilan
            <span class="text-danger">*</span>
        </label>
        <input type="text" id="" name="spkk_tarikh_pensijilan" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" required {{$readonly}} value="{{$jurulatih->spkk_tarikh_pensijilan}}">
    </div>

    <div class="col-md-12 mb-1">
        <label class="fw-bold form-label">Muat Naik Sijil
            <span class="text-danger">*</span>
        </label>
        <input type="file" class="form-control" name="spkk_sijil_path" required {{$readonly}}>
    </div>

    <hr>
    <h5 class="mb-2 fw-bold">
        <span class="badge rounded-pill badge-light-primary">
            Pencapaian Sebagai Jurulatih
        </span>
    </h5>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Sukan/ Permainan
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="sukan_permainan" required {{$readonly}} value="{{$jurulatih->sukan_permainan}}">
    </div>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Kejohanan
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="kejohanan" required {{$readonly}} value="{{$jurulatih->kejohanan}}">
    </div>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Tahun
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="tahun" required {{$readonly}} value="{{$jurulatih->tahun}}">
    </div>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Peringkat
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="peringkat" required {{$readonly}} value="{{$jurulatih->peringkat}}">
    </div>

    <hr>
    <h5 class="mb-2 fw-bold">
        <span class="badge rounded-pill badge-light-primary">
            Anugerah yang Diterima
        </span>
    </h5>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Anugerah
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="anugerah" required {{$readonly}} value="{{$jurulatih->anugerah}}">
    </div>

    <div class="col-md-3 mb-1">
        <label class="fw-bold form-label">Tahun
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="anugerah_tahun" required {{$readonly}} value="{{$jurulatih->anugerah_tahun}}">
    </div>
</div>
@if($readonly != 'readonly')
<hr>
<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="submit" class="btn btn-primary float-right">Simpan</button>
</div>
@endif
</form>

 
<script type="text/javascript">
$('#formjurulaith').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formjurulaith'));
        var error = false;

        $('#formjurulaith').find('select.select2').each(function() {
            var element = $(this);
            var select2Value = element.select2('data');
            var selectedValues = element.val();
            var fieldName = element.attr('name');
            if (typeof element.attr('disabled') == 'undefined') {

                if (!selectedValues || selectedValues === '') {
                    console.log(fieldName);
                    Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                    error = true;
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

        var url = "{{ route('admin.internal.jurulatihsave') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('admin.internal.jurulatihlist')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>
