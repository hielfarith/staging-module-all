<?php
    $id = Request::segment(3);
    $ulasan =  App\Models\UlasanKeseluruhanPemeriksaanSkips::where('butiran_institusi_id',$id)->first();
    
?>
<form id="ulasan">
<input type="hidden" name="butiran_institusi_id" value="{{$ulasan?->butiran_institusi_id}}">
<div class="row">
    <div class="col-md-12 mb-1">
        <label class="fw-bold form-label">Ulasan Ketua Pasukan Pemeriksa :
            <span class="text-danger">*</span>
        </label>
        <textarea name="ulasan_ketua_pasukan_pemeriksa" id="" cols="30" rows="10" class="form-control">{{$ulasan?->ulasan_ketua_pasukan_pemeriksa}}</textarea>
    </div>

    <div class="col-md-5">
        <label class="fw-bold form-label">Disediakan Oleh:
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="disediakan_oleh" id="" value="{{$ulasan?->disediakan_oleh}}">

        <input type="text" id="" name="disediakan_oleh_tarikh" class="form-control flatpickr-basic mt-1" placeholder="YYYY-MM-DD" value="{{$ulasan?->disediakan_oleh_tarikh}}">
    </div>

    <div class="col-md-2">
        &nbsp;
    </div>

    <div class="col-md-5">
        <label class="fw-bold form-label">Disemak Oleh:
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="disemak_oleh" value="{{$ulasan?->disemak_oleh}}">

        <input type="text" id="" name="disemak_oleh_tarikh" class="form-control flatpickr-basic mt-1" placeholder="YYYY-MM-DD" value="{{$ulasan?->disemak_oleh_tarikh}}">
    </div>
</div>
 <hr>
     <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right" onclick="submitformulasan()">Hantar</button>
    </div>
</form>

<script type="text/javascript">
    function submitformulasan() { 
    var formData = new FormData(document.getElementById('butiran_institusi'));

    var error = false;
    $('form#butiran_institusi').find('select, textarea, input, checkbox').each(function() {
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

    var url = "{{ route('skips.instrumen-submit', ['tab' => 'ulasan']) }}"
    $.ajax({
        url: url,
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
           if (response.status) {
                Swal.fire('Success', 'Berjaya', 'success');
                var id = response.data.id;
                location = "{{route('skips.senarai_institusi')}}";
                window.location.href = location;
           }
        }
    });
};

</script>
