<form id="formagensi" novalidate="novalidate">
    <div class="row">
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill bg-danger">
                Maklumat Ketua Agensi
            </span>
        </h5>

        <div class="col-sm-9 col-12 mb-1">
            <label class="form-label fw-bold">Nama Ketua Agensi/ Pengguna</label>
            <div class="input-group">
                <span class="input-group-text">
                    <select class="form-select " name="panggilan" required>
                        <option value="" hidden>Gelaran</option>
                        <option value="Dato'">Dato'</option>
                        <option value="Datin">Datin</option>
                        <option value="Prof.">Prof.</option>
                        <option value="Prof Madya">Prof Madya</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Tuan">Tuan</option>
                        <option value="Puan">Puan</option>
                        <option value="Cik">Cik</option>
                    </select>
                </span>
                <input type="text" class="form-control" name="nama_pengguna" required
                    onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
            </div>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_kad" required>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Emel Ketua Pengarah/ Pengarah
                <span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control" name="email_ketua" required>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">No Tel Pejabat
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_tel_pejabat" maxlength="12"
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">No Tel Peribadi
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_tel_peribadi" maxlength="12" required
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Jenis
                <span class="text-danger">*</span>
            </label> <br>
            <select class="form-select" name="jenis" required>
                <option value="" hidden>Jenis</option>
                <option value="Kerajaan">Kerajaan</option>
                <option value="Swasta">Swasta</option>
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Jawatan
                <span class="text-danger">*</span>
            </label>
            <select class="form-select " name="jawatan" id="jawatan" required>
                <option value="" hidden>Jawatan</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Gred
                <span class="text-danger">*</span>
            </label> <br>
            <select class="form-select " name="gred" id="gred" required style="width: 100px;">
                <option value="" hidden>Gred</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>

        <div class="col-md-1 mb-1">
            <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="checkbox" id="modul" name="modul" value="1" required />
                <label class="form-check-label fw-bolder">Modul
                    <span class="text-danger">*</span>
                </label>
            </div>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Agensi/ Kementerian
                <span class="text-danger">*</span>
            </label>
            <select class="form-select select2" name="agensi_kementerian[]" multiple required>
                <option value="" hidden>Agensi/ Kementerian</option>
                <option value="Agensi">Agensi</option>
                <option value="Kementerian">Kementerian</option>
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
            <select class="form-select " name="negeri" required onchange="changenegeri(this)" id="negeri">
                <option value="" hidden>Sila pilih</option>
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
                <option value="" hidden>Daerah</option>
                <option value="1">Hulu Langat</option>
                <option value="2">Ampang</option>
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
