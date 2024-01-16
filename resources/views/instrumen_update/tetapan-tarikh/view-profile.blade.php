<div class="card">
    <div class="card-body">
                       <form id="formitem" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Tetapan Tarikh Instrumen
                    </span>
                </h5>
              <input type="hidden" name="tetapan_tarikh_id" value="{{$tetapanTarikh->id}}">
                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_mula" required value="{{$tetapanTarikh->tarikh_mula}}" {{$readonly}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula hari
                        <!-- <span class="text-danger">*</span> -->
                    </label>
                    <input type="text" class="form-control" name="tarikh_mula_hari" value="{{$tetapanTarikh->tarikh_mula_hari}}" {{$readonly}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula Bulan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tarikh_mula_bulan" value="{{$tetapanTarikh->tarikh_mula_bulan}}" required {{$readonly}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula Tahun
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tarikh_mula_tahun" value="{{$tetapanTarikh->tarikh_mula_tahun}}" required {{$readonly}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_akhir" required value="{{$tetapanTarikh->tarikh_akhir}}" required {{$readonly}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir hari
                        <!-- <span class="text-danger">*</span> -->
                    </label>
                    <input type="text" class="form-control" name="tarikh_akhir_hari" value="{{$tetapanTarikh->tarikh_akhir_hari}}" {{$readonly}} >
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir Bulan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tarikh_akhir_bulan" value="{{$tetapanTarikh->tarikh_akhir_bulan}}" {{$readonly}} required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir Tahun
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tarikh_akhir_tahun" value="{{$tetapanTarikh->tarikh_akhir_tahun}}" {{$readonly}} required>
                </div>
            </div>
            <hr>
            @if($readonly != 'readonly')
            <div class="d-flex justify-content-end align-items-center mt-1">
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
            @endif
        </form>

    </div>
</div>

<script type="text/javascript">
    $('#formpaspek').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formpaspek'));
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
        var url = "{{ route('admin.instrumen.tetapan-item-submit') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('admin.instrumen.tetapan-item-list')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>