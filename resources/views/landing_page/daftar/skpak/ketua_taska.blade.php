<form id="formpengunna" novalidate="novalidate">
    <div class="row">
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill bg-danger">
                Maklumat Ketua Taska
            </span>
        </h5>

        <div class="col-md-9 mb-1">
            <label class="fw-bold form-label">Nama Pengguna/ Ketua Taska
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="nama_pengguna" required
                onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
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
            <label class="fw-bold form-label">Emel Taska
                <span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control" name="email_taska" required>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Emel Ibu Pejabat (Negeri)/ Penyelia
                <span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control" name="email_pejabat_penyelia" required>
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
            <select class="form-select" name="agensi_kementerian" required>
                <option value="" hidden>Agensi/ Kementerian</option>
                <option value="Agensi">Agensi</option>
                <option value="Kementerian">Kementerian</option>
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Jenis
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" name="jenis" required onchange="checksjenis(this)">
                <option value="" hidden>Jenis</option>
                <option value="Kerajaan">Kerajaan</option>
                <option value="Swasta">Swasta</option>
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Jawatan
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" name="jawatan" id="jawatan" required>
                <option value="" hidden>Jawatan</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Gred
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" name="gred" id="gred" required>
                <option value="" hidden>Gred</option>
                <option value="1">1</option>
                <option value="2">2</option>
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
            </label>
            <select class="form-select" name="negeri" id="negeri" required onchange="changenegeri(this)">
                <option value="" hidden>Negeri</option>
                @foreach ($negeris as $state)
                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Daerah
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" name="daerah" required id="daerah">
                <!-- add -->
            </select>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Poskod
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="poskod" maxlength="5" required
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
        </div>

        <hr>
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill bg-danger">
                Maklumat Taska
            </span>
        </h5>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Jenis Taska
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" name="jenis_taska" required>
                <option value="">Jenis Taska</option>
                <option value="swasta">swasta</option>
                <option value="kerajan">kerajan</option>
            </select>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Tarikh Penubuhan
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control flatpickr" name="tarikh_penubuhan" required>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Jenis Bangunan
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" name="jenisbanugunan" required>
                <option value="">pilih</option>
                <option value="tempat kerja">Tempat Kerja</option>
                <option value="rumah kedai">Rumah Kedai</option>
                <option value="bangunan">Bangunan</option>
                <option value="teres">Teres</option>
                <option value="banglo">Banglo</option>
            </select>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Jumlah Pendidik
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="jumla_pendidik" required
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Jumlah Kanak-Kanak
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="jumlah_kanak" required
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Jumlah Staf Sokongan
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="jumla_staf_sokogan" required
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label class="fw-bold form-label">Nama Taska
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="nama_taska" required>
        </div>
    </div>

    <hr>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="submit" class="btn btn-primary float-right">Simpan</button>
    </div>
</form>
