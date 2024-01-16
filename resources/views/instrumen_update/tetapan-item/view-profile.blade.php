<div class="card">
    <div class="card-body">
                <form id="formitem" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Tetapan Item
                    </span>
                </h5>
                <?php
                    $type = Request::segment(4);
                ?>
                <input type="hidden" name="type" id="type" value="{{$type}}">
                <input type="hidden" name="tetapan_item_id" value="{{$item->id}}">

                <div class="col-md-9 mb-1">
                    <label class="fw-bold form-label">Nama Item
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_item" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8" value="{{$item->nama_item}}" {{$readonly}} required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Kuatkuasa Item
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa_item" required value="{{$item->tarikh_kuatkuasa_item}}" {{$readonly}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Status Item:
                        <span class="text-danger">*</span>
                    </label>
                    <label>
                        <input type="radio" name="status_item" class="form-check-input" value="1" @if($item->status_item == '1') checked @endif {{$disabled}}> 1
                    </label>

                     <label>
                        <input type="radio" name="status_item" class="form-check-input" value="2" @if($item->status_item == '2') checked @endif {{$disabled}}> 2
                    </label>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Belum Set
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="belum_set" required {{$disabled}}>
                        <option value="" hidden>Sila pilih</option>
                        <option value="1"  @if($item->belum_set == '1') selected @endif>1</option>
                        <option value="2"  @if($item->belum_set == '2') selected @endif>2</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Telah Set
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="telah_set" id="telah_set" required {{$disabled}}>
                            <option value="" hidden>Sila Pilih</option>
                            <option value="1"  @if($item->telah_set == '1') selected @endif>1</option>
                            <option value="2"  @if($item->telah_set == '2') selected @endif>2</option>
                    </select>
                </div>

                 <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tetapan Skala
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="tetapan_skala" class="form-control" required value="{{$item->tetapan_skala}}" {{$readonly}}>
                </div>

                 <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Julat Skala
                        <span class="text-danger">*</span>
                    </label>
                    <label>
                        <input type="radio" name="julat_skala" class="form-check-input" required value="1"  @if($item->julat_skala == '1') checked @endif {{$disabled}}>1
                    </label>
                     <label>
                        <input type="radio" name="julat_skala" class="form-check-input" required value="2"  @if($item->julat_skala == '2') checked @endif {{$disabled}}>2
                    </label>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Wajaran Skala
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="wajaran_skala" class="form-control" required value="{{$item->wajaran_skala}}" {{$readonly}}>
                </div>

                  <!-- SPKS  -->
                @if($type == 'SPKS')
                
                 <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Tindakan oleh siapa
                    <span class="text-danger">*</span>
                </label>
                    <select class="form-control select2" name="tindakan_oleh_siapa" id="tindakan_oleh_siapa" required>
                        <option value="" hidden>Sila Pilih</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                
                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Markah Skala Mandatori Catatan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="markah_skala_mandatori_catatan" class="form-control" required value="{{$item->Markah_skala_mandatori_catatan}}" {{$readonly}}>
                </div>

                <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Role Aspek
                    <span class="text-danger">*</span>
                </label>
                    <select class="form-control select2" name="role_aspek" id="role_aspek" required {{$disabled}}>
                        <option value="" hidden>Sila Pilih</option>
                        <option value="1"  @if($item->role_aspek == '1') selected @endif>1</option>
                        <option value="2"  @if($item->role_aspek == '2') selected @endif>2</option>
                    </select>
                </div>


                @endif
                     @if($readonly != 'readonly')
                <hr>
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
            error: function(xhr){
                Swal.fire('Fail', 'Berjaya', 'error');
            }

        });

    });
</script>