<div class="row">
    <form id="formpenilai" novalidate="novalidate">
        <div class="row">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill bg-danger">
                    Maklumat Panel Penilai
                </span>
            </h5>

            <div class="col-md-9 mb-1">
                <label class="fw-bold form-label">Nama Panel Penilai/ Pengguna
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="nama_pengguna" required
                    onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">No Kad Pengenalan
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="no_kad" required>
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Emel Peribadi
                    <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control" name="email_peribadi" required>
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Emel Ketua Jabatan
                    <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control" name="email_ketua_jabatan" required>
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Emel Penyelia
                    <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control" name="email_penyelia" required>
            </div>

            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">No Tel Pejabat
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="no_tel_pejabat" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
            </div>

            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">No Tel Peribadi
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="no_tel_peribadi" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Agensi/ Kementerian
                    <span class="text-danger">*</span>
                </label>
                <select class="form-select " name="agensi_kementerian" required>
                    <option value="" hidden>Agensi/ Kementerian</option>
                    <option value="Agensi">Agensi</option>
                    <option value="Kementerian">Kementerian</option>
                </select>
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Gred
                    <span class="text-danger">*</span>
                </label><br>
                <select class="form-select " name="gred" id="gred" required>
                    <option value="" hidden>Gred</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>

            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">3 negeri pilihan bagi menjalankan penilaian SKPAK
                    <span class="text-danger">*</span>
                </label>
                <select class="form-select select2" name="negeri_skpak[]" id="negeri_skpak" multiple
                    style="width: 500px;">
                    <option value="" hidden>Pilih Negeri</option>
                    @foreach ($negeris as $state)
                        <option value="{{ $state->name }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>

            <hr>
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill bg-danger">
                    Maklumat Alamat
                </span>
            </h5>

            <div class="col-md-12 mb-1">
                <label class="fw-bold form-label">Alamat
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="alamat1" placeholder="Alamat 1" required>
            </div>

            <div class="col-md-12 mb-1">
                {{-- <label class="fw-bold form-label">Alamat 2
                    <span class="text-danger">*</span>
                </label> --}}
                <input type="text" class="form-control" name="alamat2" placeholder="Alamat 2" required>
            </div>

            <div class="col-md-12 mb-1">
                {{-- <label class="fw-bold form-label">Alamat 3</label> --}}
                <input type="text" class="form-control" name="alamat3" placeholder="Alamat 3">
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Negeri
                    <span class="text-danger">*</span>
                </label><br>
                <select class="form-select " name="negeri" id="negeri" required onchange="changenegeri(this)">
                    <option value="" hidden>Negeri</option>
                    @foreach ($negeris as $state)
                        <option value="{{ $state->name }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Daerah
                    <span class="text-danger">*</span>
                </label><br>
                <select class="form-select " name="daerah" id="daerah" required>

                </select>
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Poskod
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="poskod" maxlength="5" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>

        </div>
    </form>
</div>
