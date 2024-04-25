<div class="card">
    <div class="card-body">
        <form id="forminstrumenspksedit" novalidate="novalidate">
        <input type="hidden" name="configurationID" value="{{$configurationID}}" id="configurationID">
        <div class="row">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN SKPAK, SPKS, IKEPS
                </span>
            </h5>
            <div class="col-md-2 mb-1">
                <label class="fw-bold form-label">Nama Instrumen <span class="text-danger">:</span></label>
            </div>
            <div class="col-md-4 mb-1">
                <input {{ $readonly }} {{ $disabled }} type="text" class="form-control" name="instrumen_name"
                     required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
            </div>
            <div class="col-md-2 mb-1">
                <label class="fw-bold form-label">Tarikh Kuatkuasa<span class="text-danger">:</span></label>
            </div>
            <div class="col-md-4 mb-1">
                <input {{ $readonly }} {{ $disabled }} type="text" class="form-control flatpickr" name="tarikh_kuatkuasa" required>
            </div>
            <div class="col-md-2 mb-1">
                <label class="fw-bold form-label">Tujuan Instrumen<span class="text-danger">:</span></label>
            </div>
            <div class="col-md-4 mb-1">
                <input {{ $readonly }} {{ $disabled }} type="text" class="form-control" name="tujuan_instrumen" value=""  required>
            </div>
            <div class="col-md-2 mb-1">
                <label class="fw-bold form-label">Status<span class="text-danger">:</span></label>
            </div>
            <div class="col-md-4 mb-1">
                <select {{ $readonly }} {{ $disabled }} class="form-control select2" name="status" required>
                    <option value="">Sila Pilih</option>
                    <option value="1">Active </option>
                    <option value="2">InActive </option>
                </select>
            </div>

            <div class="col-md-4 ">
                <div class="card ">
                    <div class="card-header" style="background-color: #F3F2F7">
                        <h4 class="card-title fw-bolder">Pengisian</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mt-1">
                            <div class="col-md-4 ">
                                <label class="fw-bold form-label">Institut <span
                                        class="text-danger">:</span></label>
                            </div>
                            <div class="col-md-8 ">
                                <select {{ $readonly }} {{ $disabled }} class="form-control select2" name="pengisian_institut" required>
                                     <option value="">Sila Pilih</option>
                                    <option value="Bahagian">Bahagian </option>
                                    <option value="JPN">JPN </option>
                                    <option value="PPD">PPD </option>
                                    <option value="Sekolah">Sekolah </option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label class="fw-bold form-label">Peranan <span
                                        class="text-danger">:</span></label>
                            </div>
                            <div class="col-md-8 mt-1">
                                <select {{ $readonly }} {{ $disabled }} class="form-control select2" name="pengisian_peranan" required>
                                    <option value="">Sila Pilih</option>
                                    <option value="PENTADBIR">PENTADBIR </option>
                                    <option value="GURU INSTITUSI">GURU INSTITUSI</option>
                                </select>
                            </div>

                            <div class="col-md-12 mt-1">
                                <label class="fw-bold form-label">Tarikh <span
                                        class="text-danger">:</span></label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #F3F2F7">Dari</span>
                                        <input {{ $readonly }} {{ $disabled }} type="date" class="form-control flatpickr flatpickr-input" id="fromDate" name="pengisian_dari">
                                        <span class="input-group-text"
                                            style="background-color: #F3F2F7">Hingga</span>
                                        <input {{ $readonly }} {{ $disabled }} type="date" class="form-control flatpickr flatpickr-input" id="toDate" name="pengisian_hingga">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="card ">
                    <div class="card-header" style="background-color: #F3F2F7">
                        <h4 class="card-title fw-bolder">Validasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mt-1">
                            <div class="col-md-4 ">
                                <label class="fw-bold form-label">Institut 
                                    <span class="text-danger">:</span></label>
                            </div>
                            <div class="col-md-8 ">
                                <select {{ $readonly }} {{ $disabled }} class="form-control select2" name="validasi_institut" required>
                                    <option value="">Sila Pilih</option>
                                    <option value="Bahagian">Bahagian </option>
                                    <option value="JPN">JPN </option>
                                    <option value="PPD">PPD </option>
                                    <option value="Sekolah">Sekolah </option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label class="fw-bold form-label">Peranan <span
                                        class="text-danger">:</span></label>
                            </div>
                            <div class="col-md-8 mt-1">
                                <select {{ $readonly }} {{ $disabled }} class="form-control select2" name="validasi_peranan"
                                    required>
                                    <option value="">Sila Pilih</option>
                                    <option value="PENTADBIR">PENTADBIR </option>
                                    <option value="GURU INSTITUSI">GURU INSTITUSI</option>
                                </select>
                            </div>

                            <div class="col-md-12 mt-1">
                                <label class="fw-bold form-label">Tarikh <span
                                        class="text-danger">:</span></label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #F3F2F7">Dari</span>
                                        <input {{ $readonly }} {{ $disabled }} type="date" class="form-control flatpickr flatpickr-input" id="fromDate" name="validasi_dari">
                                        <span class="input-group-text"
                                            style="background-color: #F3F2F7">Hingga</span>
                                        <input {{ $readonly }} {{ $disabled }} type="date" class="form-control flatpickr flatpickr-input" id="toDate" name="validasi_hingga">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="card ">
                    <div class="card-header" style="background-color: #F3F2F7">
                        <h4 class="card-title fw-bolder">Verifikasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mt-1">
                            <div class="col-md-4 ">
                                <label class="fw-bold form-label">Institut <span
                                        class="text-danger">:</span></label>
                            </div>
                            <div class="col-md-8 ">
                                <select {{ $readonly }} {{ $disabled }} class="form-control select2" name="verfikasi_institut" required>
                                    <option value="">Sila Pilih</option>
                                    <option value="Bahagian">Bahagian </option>
                                    <option value="JPN">JPN </option>
                                    <option value="PPD">PPD </option>
                                    <option value="Sekolah">Sekolah </option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label class="fw-bold form-label">Peranan <span
                                        class="text-danger">:</span></label>
                            </div>
                            <div class="col-md-8 mt-1">
                                <select {{ $readonly }} {{ $disabled }} class="form-control select2" id="verfikasi_peranan" name="verfikasi_peranan" required>
                                    <option value="">Sila Pilih</option>
                                    <option value="PENTADBIR">PENTADBIR </option>
                                    <option value="GURU INSTITUSI">GURU INSTITUSI</option>
                                </select>
                            </div>

                            <div class="col-md-12 mt-1">
                                <label class="fw-bold form-label">Tarikh <span
                                        class="text-danger">:</span></label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="background-color: #F3F2F7">Dari</span>
                                        <input {{ $readonly }} {{ $disabled }} type="date" class="form-control flatpickr flatpickr-input" id="fromDate" name="verfikasi_dari">
                                        <span class="input-group-text"
                                            style="background-color: #F3F2F7">Hingga</span>
                                        <input {{ $readonly }} {{ $disabled }} type="date" class="form-control flatpickr flatpickr-input" id="toDate" name="verfikasi_hingga">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @if ($readonly != 'readonly')
                    <div class="d-flex justify-content-end align-items-center my-1">
                        <button type="submit" class="btn btn-primary float-right">Hantar</button>
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var configurationID = $('#configurationID').val();
        var APIUrl = "{{ env('APP_KONFIGURASI_URL') }}" + "api/spks/konfiguration/pull";

         $.ajax({
            url: APIUrl,
            type: 'POST',
            data: {
                id: configurationID
            },
            success: function(response) {
                var array = ['pengisian_institut', 'pengisian_peranan', 'pengisian_dari', 'pengisian_hingga', 'validasi_institut', 'validasi_peranan', 'validasi_dari', 'validasi_hingga', 'verfikasi_institut', 'verfikasi_peranan', 'verifikasi_dari', 'verifikasi_hingga', 'status'];
                for (const [key, value] of Object.entries(response.data)) {
                    if (key != 'id' || key != 'remarks' || key != 'created_at' || key != 'updated_at') {
                        if (jQuery.inArray(key, array) !== -1 ) {
                            $('select[name='+key +']').val(value).trigger('change');;
                        } else {
                            $("input[name='"+key +"']").val(value);
                        }
                    }
                }
            }
        });

    });

    $('#forminstrumenspksedit').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('forminstrumenspksedit'));
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
            var element = $("input[name='" + name + "']");
            if (typeof element.attr('name') != 'undefined' && typeof element.attr('required') !=
                'undefined') {
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
        var APIUrl = "{{ env('APP_KONFIGURASI_URL') }}" + "api/spks/konfiguration/update";

        $.ajax({
            url: APIUrl,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{ route('admin.instrumen.senarai-spks') }}"
                    window.location.href = location;
                }
            }
        });

    });

</script>
