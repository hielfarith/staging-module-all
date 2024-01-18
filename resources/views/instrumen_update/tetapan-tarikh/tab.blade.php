<form id="formitem" novalidate="novalidate">
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="row">
                <h4 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-success">
                        Maklumat Tarikh Mula
                    </span>
                </h4>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_mula" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula
                        {{-- <span class="text-danger">*</span> --}}
                    </label>
                    <input type="text" class="form-control" name="tarikh_mula_hari">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula Bulan
                        {{-- <span class="text-danger">*</span> --}}
                    </label>
                    <input type="text" class="form-control" name="tarikh_mula_bulan">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula Tahun
                        {{-- <span class="text-danger">*</span> --}}
                    </label>
                    <input type="text" class="form-control" name="tarikh_mula_tahun">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <h4 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-danger">
                        Maklumat Tarikh Akhir
                    </span>
                </h4>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_akhir" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir hari</label>
                    <input type="text" class="form-control" name="tarikh_akhir_hari">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir Bulan
                        {{-- <span class="text-danger">*</span> --}}
                    </label>
                    <input type="text" class="form-control" name="tarikh_akhir_bulan">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir Tahun
                        {{-- <span class="text-danger">*</span> --}}
                    </label>
                    <input type="text" class="form-control" name="tarikh_akhir_tahun">
                </div>

            </div>
        </div>
    </div>


    <hr>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="submit" class="btn btn-primary float-right">Simpan</button>
    </div>
</form>
