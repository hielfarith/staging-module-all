<form id="formitem" novalidate="novalidate">
    <input type="hidden" name="tetapan_tarikh_id" value="{{$tetapanTarikh->id}}">
    <div class="row">
        <h4 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-success">
                Maklumat Tarikh Mula
            </span>
        </h4>

        <div class="col-md-12 mb-1">
            <label class="fw-bold form-label">Tarikh Mula</label>
            <input type="text" class="form-control flatpickr" name="tarikh_mula" required value="{{$tetapanTarikh->tarikh_mula}}" {{$readonly}}>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Tarikh Mula</label>
            <input type="text" class="form-control" name="tarikh_mula_hari" value="{{$tetapanTarikh->tarikh_mula_hari}}" {{$readonly}}>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Tarikh Mula Bulan</label>
            <input type="text" class="form-control" name="tarikh_mula_bulan" value="{{$tetapanTarikh->tarikh_mula_bulan}}" required {{$readonly}}>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Tarikh Mula Tahun</label>
            <input type="text" class="form-control" name="tarikh_mula_tahun" value="{{$tetapanTarikh->tarikh_mula_tahun}}" required {{$readonly}}>
        </div>

        <hr>
        <h4 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-danger">
                Maklumat Tarikh Akhir
            </span>
        </h4>

        <div class="col-md-12 mb-1">
            <label class="fw-bold form-label">Tarikh Akhir</label>
            <input type="text" class="form-control flatpickr" name="tarikh_akhir" required value="{{$tetapanTarikh->tarikh_akhir}}" required {{$readonly}}>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Tarikh Akhir hari</label>
            <input type="text" class="form-control" name="tarikh_akhir_hari" value="{{$tetapanTarikh->tarikh_akhir_hari}}" {{$readonly}}>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Tarikh Akhir Bulan</label>
            <input type="text" class="form-control" name="tarikh_akhir_bulan" value="{{$tetapanTarikh->tarikh_akhir_bulan}}" {{$readonly}} required>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Tarikh Akhir Tahun</label>
            <input type="text" class="form-control" name="tarikh_akhir_tahun" value="{{$tetapanTarikh->tarikh_akhir_tahun}}" {{$readonly}} required>
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
