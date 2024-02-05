<?php
$instrumen_id = Request::segment(3);
$pemeriskan = \App\Models\ButiranPemeriksaanSkips::where('instrumen_id', $instrumen_id)->first();
$checkforTambah = Request::segment(2);

?>
<form id="butiran_pemeriksaan">
    <input type="hidden" name="instrumen_id" value="{{$instrumen_id}}">
<div class="row">
    <div class="col-md-4 mb-1">
        <label class="form-label fw-bold">Kod Sekolah
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="kod_sekolah" class="form-control" required value={{$pemeriskan?->kod_sekolah}}>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bold">Tarikh Pemeriksaan & Masa Lawatan
            <span class="text-danger">*</span>
        </label>
        <input type="text" id="fp-date-time" name="tarikh_pemeriksaan" class="form-control flatpickr" placeholder="d/m/Y" required value={{$pemeriskan?->tarikh_pemeriksaan}}>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bold">No Pasukan Pemeriksa
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="no_pasukan_pemeriksa" class="form-control" required value={{$pemeriskan?->no_pasukan_pemeriksa}}>
    </div>

    <div class="col-md-12 mb-1">
        <label class="form-label fw-bold"> Pemeriksa 1
            <span class="text-danger">*</span>
        </label>
        <!-- <input type="text" name="pemeriksa_1" class="form-control" required value={{$pemeriskan?->pemeriksa_1}}> -->
        <select class="form-control select2" name="pemeriksa_1" id="pemeriksa_1" required>
            <option value="" hidden>Sila Pilij</option>
            <option value="User 1" @if($pemeriskan?->pemeriksa_1 == 'User 1') selected @endif>User 1</option>
            <option value="User 2" @if($pemeriskan?->pemeriksa_1 == 'User 2') selected @endif>User 2</option>
            <option value="User 3" @if($pemeriskan?->pemeriksa_1 == 'User 3') selected @endif>User 3</option>
        </select>
    </div>

    <div class="col-md-12 mb-1">
        <label class="form-label fw-bold"> Pemeriksa 2
            <span class="text-danger">*</span>
        </label>
        <!-- <input type="text" name="pemeriksa_2" class="form-control" required value={{$pemeriskan?->pemeriksa_2}}> -->
        <select class="form-control select2" name="pemeriksa_2" id="pemeriksa_2" required>
            <option value="" hidden>Sila Pilij</option>
            <option value="User 1" @if($pemeriskan?->pemeriksa_2 == 'User 1') selected @endif>User 1</option>
            <option value="User 2" @if($pemeriskan?->pemeriksa_2 == 'User 2') selected @endif>User 2</option>
            <option value="User 3" @if($pemeriskan?->pemeriksa_2 == 'User 3') selected @endif>User 3</option>
        </select>
    </div>

    <div class="col-md-12 mb-1">
        <label class="form-label fw-bold"> Pemeriksa 3
            <span class="text-danger">*</span>
        </label>
        <!-- <input type="text" name="pemeriksa_3" class="form-control" required value={{$pemeriskan?->pemeriksa_3}}> -->
         <select class="form-control select2" name="pemeriksa_3" id="pemeriksa_3" required>
            <option value="" hidden>Sila Pilij</option>
            <option value="User 1" @if($pemeriskan?->pemeriksa_3 == 'User 1') selected @endif>User 1</option>
            <option value="User 2" @if($pemeriskan?->pemeriksa_3 == 'User 2') selected @endif>User 2</option>
            <option value="User 3" @if($pemeriskan?->pemeriksa_3 == 'User 3') selected @endif>User 3</option>
        </select>
    </div>
     <div class="col-md-12 mb-1">
        <label class="form-label fw-bold">Ketua Pemeriksa
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="ketua_pemeriksa" class="form-control" required value={{$pemeriskan?->ketua_pemeriksa}}>
    </div>
</div>
@if($checkforTambah != 'tambah-skips' && $canVerify )
<hr>
<div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitformPemeriksan()">Hantar</button>
</div>
@endif
</form>
@section('script')
<script>

    function submitformPemeriksan() {
        var formData = new FormData(document.getElementById('butiran_pemeriksaan'));
        var error = false;

         $('form#butiran_pemeriksaan').find('select, textarea, input, checkbox').each(function() {
            if(this.required && this.type == 'checkbox' && !this.checked) {
                error = true;
            }
            if (this.required && this.value == '') {
                error = true;
            }
        });

        if (error) {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skips.instrumen-submit', ['tab' => 'butiran_pemeriksaan']) }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    location = "{{route('skips.senarai-skips-institusi')}}"
                    window.location.href = location;
               }
            }
        });

    };
</script>
@endsection
