<?php
    $instrumenid = Request::segment(4);
    if (!empty($instrumenid)) {
        $aspek = \App\Models\TetapanAspek::where('instrumen_id', $instrumenid)->first();
    } else {
        $aspek = null;
    }
?>
<form id="formpaspek" novalidate="novalidate">
    <div class="row">
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Tetapan Aspek
            </span>
        </h5>
        <?php
            $type = 'SUB'
        ?>
        <input type="hidden" name="type" id="type" value="{{$type}}">
        <div class="col-md-9 mb-1">
            <label class="fw-bold form-label">Nama Aspek
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="nama_aspek" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8" value="{{$aspek?->nama_aspek}}">
        </div>

       @if($type == 'SKPAK')
            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Tarikh Kuatkuasa Aspek
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa_aspek" required>
            </div>
        @endif
        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Status Aspek:
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="status_aspek" required>
                <option value="" hidden>Sila Pilij</option>
                <option value="Belum Set" @if($aspek?->status_aspek == 'Belum Set') selected @endif>Belum Set</option>
                <option value=" Set" @if($aspek?->status_aspek == 'Telah Set') selected @endif>Telah Set</option>
            </select>
        </div>

        @if($type != 'SUB')
        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Wajaran Skala
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="wajaran_skala" class="form-control" required>
        </div>
        @endif
    </div>
    
    @if(!empty($instrumenid))
    <hr>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-success" onclick="submitAspek()">Simpan</button>
    </div>
    @endif
    <input type="hidden" name="instrumen_id" id="instrumen_id" value="{{$instrumenid}}">
</form>
<script type="text/javascript">
    function submitAspek() {
        var formData = new FormData(document.getElementById('formpaspek'));
        var error = false;

        $('#formpaspek').find('select.select2').each(function() {
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

        var url = "{{ route('admin.instrumen.tetapan-aspek-submit') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('admin.instrumen.tetapan-aspek-sub-list')}}"
                    // window.location.href = location;
               }
            }
        });
    }
 
</script>
