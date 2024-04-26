
<form id="savepengetua" novalidate="novalidate" type='POST'>
    @csrf
    <div class="row">
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Pengerusi/ Pengetua/ Guru Besar
            </span>
        </h5>

        <div class="col-md-9 mb-1">
            <label class="fw-bold form-label">Nama Pengerusi/ Pengetua/ Guru Besar/ Pengguna
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="nama" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_kp" required>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">No Telefon
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_tel" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Emel
                <span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Jawatan
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="jawatan" id="jawatan" required>
                    <option value="" hidden>Jawatan</option>
                    <option value="pengerusi">Pengerusi</option>
                    <option value="pengetua">Pengetua</option>
                    <option value="guru_besar">Guru Besar</option>
            </select>
        </div>

        <div class="col-md-8 mb-1">
            <label class="fw-bold form-label">Institusi
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="institusi" id="institusi" required>
                    <option value="" hidden>Institusi</option>
                    @foreach($institusis as $institusi)
                    <option value="{{ $institusi->id }}">{{ $institusi->nama }}</option>
                    @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Negeri
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="negeri" id="negeri" required>
                <option value="" hidden>Negeri</option>
                @foreach($states as $state)
                    <option value="{{$state->name}}">{{$state->name}}</option>
                @endforeach
            </select>
        </div>

        {{-- <div class="col-md-12 mb-1">
            <label class="fw-bold form-label">Sebab Pertukaran
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="sebab_pertukaran" id="sebab_pertukaran" required onchange="checksebab(this)">
                    <option value="" hidden>Sebab Pertukaran</option>
                    <option value="Dalam Proses Pertukaran Pengerusi/Pengetua/Guru Besar">Dalam Proses Pertukaran Pengerusi/Pengetua/Guru Besar</option>
                    <option value="Pengambilalihan Pemilikan Baru">Pengambilalihan Pemilikan Baru</option>
                    <option value="Kematian">Kematian</option>
                    <option value="Lain-lain">Lain-lain</option>
            </select>
        </div>

        <div class="col-md-12 mb-1">
            <input type="text" name="sebab_pertukaran_lain" placeholder="Sila nyatakan." id="sebab_pertukaran_lain" class="form-control" style="display: none;">
        </div> --}}
    </div>

    <hr>
    <div class="modal-footer">
        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-primary me-1" onclick="fakeSuccess3()">
                Simpan
            </a>
        </div>
    </div>
    
    
</form>
    
