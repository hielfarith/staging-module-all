<style type="text/css">
    
.date-container {
  position: relative;
  float: left;
  .date-text {
    position: absolute;
    top: 6px;
    left: 12px;
    color: #aaa;
  }
  
  .date-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    /* pointer-events: none; */
    cursor: pointer;
    color: #aaa;
  }
}


</style>
<form id="forminstrumenspks" novalidate="novalidate">
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
                <input type="text" class="form-control" name="instrumen_name"
                     required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
            </div>
            <div class="col-md-2 mb-1">
                <label class="fw-bold form-label">Tarikh Kuatkuasa<span class="text-danger">:</span></label>
            </div>
            <div class="col-md-4 mb-1">
                <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa" required>
            </div>
            <div class="col-md-2 mb-1">
                <label class="fw-bold form-label">Tujuan Instrumen<span class="text-danger">:</span></label>
            </div>
            <div class="col-md-4 mb-1">
                <input type="text" class="form-control" name="tujuan_instrumen" value=""  required>
            </div>
            <div class="col-md-2 mb-1">
                <label class="fw-bold form-label">Status<span class="text-danger">:</span></label>
            </div>
            <div class="col-md-4 mb-1">
                <select class="form-control select2" name="status" required>
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
                                <select class="form-control select2" name="pengisian_institut" required>
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
                                <select class="form-control select2" name="pengisian_peranan" required>
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
                                        <input type="date" class="form-control flatpickr flatpickr-input" id="fromDate" name="pengisian_dari">
                                        <span class="input-group-text"
                                            style="background-color: #F3F2F7">Hingga</span>
                                        <input type="date" class="form-control flatpickr flatpickr-input" id="toDate" name="pengisian_hingga">
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
                                <select class="form-control select2" name="validasi_institut" required>
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
                                <select class="form-control select2" name="validasi_peranan"
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
                                        <input type="date" class="form-control flatpickr flatpickr-input" id="fromDate" name="validasi_dari">
                                        <span class="input-group-text"
                                            style="background-color: #F3F2F7">Hingga</span>
                                        <input type="date" class="form-control flatpickr flatpickr-input" id="toDate" name="validasi_hingga">
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
                                <select class="form-control select2" name="verfikasi_institut" required>
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
                                <select class="form-control select2" name="verfikasi_peranan" required>
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
                                        <input type="date" class="form-control flatpickr flatpickr-input" id="fromDate" name="verfikasi_dari">
                                        <span class="input-group-text"
                                            style="background-color: #F3F2F7">Hingga</span>
                                        <input type="date" class="form-control flatpickr flatpickr-input" id="toDate" name="verfikasi_hingga">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end align-items-center my-1">
                <button type="submit" class="btn btn-primary float-right">Hantar</button>
            </div>
        </div>
    </form>


@section('script')

<script type="text/javascript">
    $(document).ready(function() {
    $('.select2').select2({
        placeholder: 'Sila Pilih',
        allowClear: true // Adds a clear button to the dropdown
        });
   });

    $('#forminstrumenspks').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('forminstrumenspks'));
        var error = false;

         $('form#forminstrumenspks').find('select, textarea, input, checkbox').each(function() {
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        var APIUrl = "{{ env('APP_KONFIGURASI_URL') }}" + "api/spks/konfiguration/save";

        $.ajax({
            url: APIUrl,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('admin.instrumen.senarai-spks')}}";
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
