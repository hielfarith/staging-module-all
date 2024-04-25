{{-- <form id="forminstrumensedia" novalidate="novalidate">
    <div class="row">
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Instrumen
            </span>
        </h5>
        <input type="hidden" name="type" value="SEDIA">

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label"> Nama Instrumen
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="nama_instrumen" required
                onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
        </div>

        <div class="col-md-6 mb-1">
            <label class="fw-bold form-label"> Tujuan Instrumen
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="tujuan_instrumen" required>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Pengguna Instrumen
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="pengguna_instrumen" required>
                <option value="">Sila Pilih</option>
                <option value="PENTADBIR">PENTADBIR</option>
                <option value="GURU INSTITUSI">GURU INSTITUSI</option>
            </select>
        </div>

        <!-- <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Instrumen perlu diisi
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="instrumen_perlu_diisi" required
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
        </div> -->

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Tarikh Kuatkuasa
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa" required>
        </div>

        <div class="col-md-4 mb-1">
            <div class="demo-inline-spacing">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="tetapan_keperluan_pengemaskinian_data_terkini"
                        name="tetapan_keperluan_pengemaskinian_data_terkini" value="1" required />
                    <label class="form-check-label" for="tetapan_keperluan_pengemaskinian_data_terkini">Tetapan
                        Keperluan <br> Pengemaskinian Data Terkini
                        <span class="text-danger">*</span>
                    </label>
                </div>
            </div>
        </div>

        <hr>

        <div class="col">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Pengisian
                </span>
            </h5>

            <div class="mb-1">
                <label class="fw-bold form-label">Pengisian Oleh
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="pengisian_oleh" required>
                    <option value="">Sila Pilih</option>
                    <!-- <option value="PENGETUA">PENGETUA</option>
                    <option value="GURU BESAR INSTITUSI">GURU BESAR INSTITUSI</option> -->
                    <option value="SETIAUSAHA SUKAN">SETIAUSAHA SUKAN</option>
                </select>
            </div>

            <div class="mb-1">
                <label class="fw-bold form-label"> Tempoh Pengisian
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <input type="text" class="form-control" name="tempoh_pengisian_lain" required
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_pengisian" required>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan">Bulan</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </span>
                </div>
            </div>
        </div>

        <div class="col">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Pengesahan
                </span>
            </h5>

            <div class="mb-1">
                <label class="fw-bold form-label">Pengesahan Oleh
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="pengesahan_ole" required>
                    <option value="">Sila Pilih</option>
                    <!-- <option value="PPD ">PPD </option>
                    <option value="JPN">JPN</option> -->
                    <option value="GURU BESAR">GURU BESAR</option>
                    <option value="PK KOKU">PK KOKU</option>
                </select>
            </div>

            <div class="mb-1">
                <label class="fw-bold form-label"> Tempoh Pengesahan
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <input type="text" class="form-control" name="tempoh_pengeshan_lain" required
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_pengeshan" required>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan">Bulan</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </span>
                </div>
            </div>
        </div>

        <div class="col">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Verifikasi
                </span>
            </h5>

            <div class="mb-1">
                <label class="fw-bold form-label">Verifikasi Oleh
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="verifikasi_oleh" required>
                    <option value="">Sila Pilih</option>
                    <!-- <option value="JPN">JPN</option>
                    <option value="KS">KS</option> -->
                    <option value="KPM">KPM</option>
                    <option value="KPP">KPP</option>
                    <option value="PP">PP</option>
                </select>
            </div>

            <div class="mb-1">
                <label class="fw-bold form-label"> Tempoh Verifikasi
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <input type="text" class="form-control" name="tempoh_verifikasi_lain" required
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_verifikasi" required>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan">Bulan</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </span>
                </div>
            </div>
        </div>

        <!-- <div class="col">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Validasi
                </span>
            </h5>

            <div class="mb-1">
                <label class="fw-bold form-label">Validasi Oleh
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="validasi_oleh" required>
                    <option value="">Sila Pilih</option>
                    <option value="PPD">PPD</option>
                    <option value="JPN">JPN</option>
                    <option value="KPM">KPM</option>
                </select>
            </div>

            <div class="mb-1">
                <label class="fw-bold form-label"> Tempoh Validasi
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <input type="text" class="form-control" name="tempoh_validasi_lain" required
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_validasi" required>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan">Bulan</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </span>
                </div>
            </div>
        </div>

        <div class="col">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Perakuan
                </span>
            </h5>

            <div class="mb-1">
                <label class="fw-bold form-label">Perakuan Oleh
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="perakuan_oleh" required>
                    <option value="">Sila Pilih</option>
                    <option value="PENTADBIR">PENTADBIR</option>
                    <option value="GURU INSTITUSI">GURU INSTITUSI</option>
                </select>
            </div>

            <div class="mb-1">
                <label class="fw-bold form-label"> Tempoh Perakuan Oleh
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <input type="text" class="form-control" name="tempoh_perakuan_lain" required
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_perakuan" required>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan">Bulan</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </span>
                </div>
            </div>
        </div> -->
    </div>

    <div class="card-footer">
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-primary float-right">Hantar</button>
        </div>
    </div>

</form> --}}

<form id="forminstrumensedia" novalidate="novalidate">
    <div class="row">
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN IKEPS
            </span>
        </h5>
        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Nama Instrumen <span class="text-danger">:</span></label>
        </div>
        <div class="col-md-4 mb-1">
            <input type="text" class="form-control" name="nama_instrumen" required
                onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
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
            <input type="text" class="form-control" name="tujuan_instrumen" required>
        </div>
        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Status<span class="text-danger">:</span></label>
        </div>
        <div class="col-md-4 mb-1">
            <select class="form-control select2" name="status" required>
                <option value="">Sila Pilih</option>
                <option value="1">Active</option>
                <option value="2">InActive</option>
            </select>
        </div>

        <div class="col-md-4 ">
            <div class="card ">
                <div class="card-header" style="color:white; background-color: #C5DBC4">
                    <h4 class="card-title fw-bolder">Pengisian</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-1">
                        <div class="col-md-4 ">
                            <label class="fw-bold form-label">Institut <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 ">
                            <select class="form-control select2" name="institusi_pengisian" id="institusi_pengisian">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-1">
                            <label class="fw-bold form-label">Peranan <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <select class="form-control select2" name="pengisian_oleh" required>
                                <option value="">Sila Pilih</option>
                                <option value="SETIAUSAHA SUKAN">SETIAUSAHA SUKAN</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-1">
                            <label class="fw-bold form-label">Tarikh <span class="text-danger">:</span></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #F3F2F7">Dari</span>
                                    <input type="date" class="form-control" id="fromDate" name="pengisian_dari">
                                    <span class="input-group-text" style="background-color: #F3F2F7">Hingga</span>
                                    <input type="date" class="form-control" id="toDate" name="pengisian_hingga">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card ">
                <div class="card-header" style="color:white; background-color: #C5DBC4">
                    <h4 class="card-title fw-bolder">Pengesahan</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-1">
                        <div class="col-md-4 ">
                            <label class="fw-bold form-label">Institut <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 ">
                            <select class="form-control select2" name="institusi_pengesahan" id="institusi_pengesahan">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-1">
                            <label class="fw-bold form-label">Peranan <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <select class="form-control select2" name="pengesahan_ole" required>
                                <option value="">Sila Pilih</option>
                                <option value="GURU BESAR">GURU BESAR</option>
                                <option value="PK KOKU">PK KOKU</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-1">
                            <label class="fw-bold form-label">Tarikh <span class="text-danger">:</span></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #F3F2F7">Dari</span>
                                    <input type="date" class="form-control" id="fromDate"
                                        name="pengesahan_dari">
                                    <span class="input-group-text" style="background-color: #F3F2F7">Hingga</span>
                                    <input type="date" class="form-control" id="toDate"
                                        name="pengesahan_hingga">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card ">
                <div class="card-header" style="color:white; background-color: #C5DBC4">
                    <h4 class="card-title fw-bolder">Verifikasi</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-1">
                        <div class="col-md-4 ">
                            <label class="fw-bold form-label">Institut <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 ">
                            <select class="form-control select2" name="institusi_verifikasi"
                                id="institusi_verifikasi">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-1">
                            <label class="fw-bold form-label">Peranan <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <select class="form-control select2" name="verifikasi_oleh" required>
                                <option value="">Sila Pilih</option>
                                <option value="KPM">KPM</option>
                                <option value="KPP">KPP</option>
                                <option value="PP">PP</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-1">
                            <label class="fw-bold form-label">Tarikh <span class="text-danger">:</span></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #F3F2F7">Dari</span>
                                    <input type="date" class="form-control" id="fromDate"
                                        name="verifikasi_dari">
                                    <span class="input-group-text" style="background-color: #F3F2F7">Hingga</span>
                                    <input type="date" class="form-control" id="toDate"
                                        name="verifikasi_hingga">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="type" value="SEDIA">

        {{-- @if ($readonly != 'readonly') --}}
        <div class="d-flex justify-content-end align-items-center my-1">
            <button type="submit" class="btn btn-primary float-right">Hantar</button>
        </div>
        {{-- @endif --}}
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

        $('#forminstrumensedia').submit(function(event) {
            event.preventDefault();
            var formData = new FormData(document.getElementById('forminstrumensedia'));
            var error = false;
            $('#forminstrumensedia').find('select.select2').each(function() {
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
            var url = "{{ route('admin.instrumen.instrumenikeps-submit') }}"
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        Swal.fire('Success', 'Berjaya', 'success');
                        var location = "{{ route('admin.instrumen.senarai-sedia-ada') }}"
                        window.location.href = location;
                    }
                }
            });

        });
    </script>
@endsection
