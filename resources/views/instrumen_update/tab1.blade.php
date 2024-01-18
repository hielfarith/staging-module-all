    <form id="forminstrumenskpak" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN SKPAK, SPKS, IKEPS
                    </span>
                </h5>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label"> Nama Instrumen
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_instrumen" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
                </div>
                 <div class="col-md-6 mb-1">
                    <label class="fw-bold form-label">  Tujuan Instrumen
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

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Pengisian Oleh : [pilih kumpulan pengguna]
                        <span class="text-danger">*</span>
                    </label>
                    <select  class="form-control select2" name="pengisian_oleh" required>
                          <option value="">Sila Pilih</option>
                        <option value="PENGETUA">PENGETUA</option>
                        <option value="GURU BESAR INSTITUSI">GURU BESAR INSTITUSI</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Pengesahan Oleh : [pilih kumpulan pengguna]
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="pengesahan_ole" required >
                          <option value="">Sila Pilih</option>
                        <option value="PPD ">PPD </option>
                        <option value="JPN">JPN</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Verifikasi Oleh : [pilih kumpulan pengguna]
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="verifikasi_oleh" required>
                      <option value="">Sila Pilih</option>
                        <option value="JPN">JPN</option>
                        <option value="KPM">KPM</option>
                    </select>
                </div>
                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Validasi Oleh : [pilih kumpulan pengguna]
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="validasi_oleh" required>
                        <option value="">Sila Pilih</option>
                        <option value="PPD">PPD</option>
                        <option value="JPN">JPN</option>
                        <option value="KPM">KPM</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Perakuan Oleh : [pilih kumpulan pengguna]
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="perakuan_oleh"  required>
                          <option value="">Sila Pilih</option>
                        <option value="PENTADBIR">PENTADBIR</option>
                        <option value="GURU INSTITUSI">GURU INSTITUSI</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label"> Tempoh bagi setiap proses
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tempoh_bagi_setiap_proses" required>
                </div>

                 <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Instrumen perlu diisi : [Pilihan setiap xx bulan]
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="instrumen_perlu_diisi" required>
                </div>

                 <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Kuatkuasa
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tetapan Keperluan Pengemaskinian Data Terkini
                        <span class="text-danger">*</span>
                    </label>
                    <input type="checkbox" class="form-check-input" name="tetapan_keperluan_pengemaskinian_data_terkini" required value="1">
                </div>

                <div class="d-flex justify-content-end align-items-center my-1">
                    <button type="submit" class="btn btn-primary float-right">Hantar</button>
                 </div>

            </div>
        </form>