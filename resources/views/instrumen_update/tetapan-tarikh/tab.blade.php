        <form id="formitem" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Tetapan Tarikh Instrumen
                    </span>
                </h5>
              
                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_mula" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula hari
                        <!-- <span class="text-danger">*</span> -->
                    </label>
                    <input type="text" class="form-control" name="tarikh_mula_hari">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula Bulan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tarikh_mula_bulan">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula Tahun
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tarikh_mula_tahun">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_akhir" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir hari
                        <!-- <span class="text-danger">*</span> -->
                    </label>
                    <input type="text" class="form-control" name="tarikh_akhir_hari">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir Bulan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tarikh_akhir_bulan">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Akhir Tahun
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tarikh_akhir_tahun">
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-end align-items-center mt-1">
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </form>
