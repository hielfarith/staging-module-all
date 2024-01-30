<?php
$instrumen_id = Request::segment(3);
$pemeriskan = \App\Models\ButiranPemeriksaanSkips::where('instrumen_id', $instrumen_id)->first();

?>
<form id="butiran_pemeriksaan">
    <input type="hidden" name="instrumen_id" value="{{$instrumen_id}}">
<div class="row">
    <div class="col-md-6 mb-1">
        <label class="form-label fw-bold">Tarikh Pemeriksaan & Masa Lawatan
            <span class="text-danger">*</span>
        </label>
        <input type="text" id="fp-date-time" name="tarikh_pemeriksaan" class="form-control flatpickr" placeholder="d/m/Y" required/>
    </div>

    <div class="col-md-6 mb-1">
        <label class="form-label fw-bold text-titlecase">No Pasukan Pemeriksa
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="no_pasukan_pemeriksa" class="form-control" required value={{$pemeriskan?->no_pasukan_pemeriksa}}>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bold text-titlecase"> Pemeriksa 1
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="pemeriksa_1" class="form-control" required value={{$pemeriskan?->pemeriksa_1}}>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bold text-titlecase"> Pemeriksa 2
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="pemeriksa_2" class="form-control" required value={{$pemeriskan?->pemeriksa_2}}>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bold text-titlecase"> Pemeriksa 3
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="pemeriksa_3" class="form-control" required value={{$pemeriskan?->pemeriksa_3}}>
    </div>
     <div class="col-md-4 mb-1">
        <label class="form-label fw-bold text-titlecase">Ketua Pemeriksa
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="ketua_pemeriksa" class="form-control" required value={{$pemeriskan?->ketua_pemeriksa}}>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bold text-titlecase">Kod Sekohla
            <span class="text-danger">*</span>
        </label>
        <input type="text" name="kod_sekohla" class="form-control" required value={{$pemeriskan?->kod_sekohla}}>
    </div>
</div>
  <hr>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right" onclick="submitformPemeriksan()">Simpan</button>
    </div>
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
               }
            }
        });

    };
</script>
@endsection
