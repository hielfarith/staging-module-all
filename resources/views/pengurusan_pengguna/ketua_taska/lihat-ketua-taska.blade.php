<div class="row">
    <div class="col-md-9 mb-1">
        <label class="form-label fw-bolder">Nama Pengguna/ Ketua Taska</label>
        <input type="text" class="form-control" name="nama_pengguna" value="{{$pengguna->nama_pengguna}}" disabled>
    </div>

    <div class="col-md-3 mb-1">
        <label class="form-label fw-bolder">No Kad Pengenalan/ Pasport</label>
        <input type="text" class="form-control" name="no_kad" value="{{$pengguna->no_kad}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">No Tel Peribadi</label>
        <input type="text" class="form-control" name="no_tel_peribadi" value="{{$pengguna->no_tel_peribadi}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Emel Peribadi</label>
        <input type="text" class="form-control" name="email_peribadi" value="{{$pengguna->email_peribadi}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Emel Ibu Pejabat (Negeri)/ Penyelia</label>
        <input type="text" class="form-control" name="email_pejabat_penyelia" value="{{$pengguna->email_pejabat_penyelia}}" disabled>
    </div>

    <div class="col-md-12 mb-1">
        <label class="form-label fw-bolder">Agensi/ Kementerian</label>
        <input type="text" class="form-control" name="agensi_kementerian" value="{{$pengguna->agensi_kementerian}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Jenis</label>
        <select class="form-control select2" id="pilihan_swasta" name="pilihan_swasta" disabled>
            <option value="" hidden>Jenis</option>
            <option value="1" selected>1</option>
            <option value="2">2</option>
        </select>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Jawatan</label>
        <select class="form-control select2" id="jawatan" name="jawatan" disabled>
            <option value="" hidden>Jawatan</option>
            <option value="1">1</option>
            <option value="2" selected>2</option>
        </select>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Gred</label>
        <select class="form-control select2" id="gred" name="gred" disabled>
            <option value="" hidden>Gred</option>
            <option value="1">1</option>
            <option value="2" selected>2</option>
        </select>
    </div>

    <div class="col-md-12 mb-1">
        <label class="form-label fw-bolder">Alamat 1</label>
        <input type="text" class="form-control" name="alamat1" value="{{$pengguna->alamat1}}" disabled>
    </div>

    <div class="col-md-12 mb-1">
        <label class="form-label fw-bolder">Alamat 2</label>
        <input type="text" class="form-control" name="alamat2" value="{{$pengguna->alamat2}}" disabled>
    </div>

    <div class="col-md-12 mb-1">
        <label class="form-label fw-bolder">Alamat 3</label>
        <input type="text" class="form-control" name="alamat3" value="{{$pengguna->alamat3}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Poskod</label>
        <input type="text" class="form-control" name="poskod" value="{{$pengguna->poskod}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Daerah</label>
        <select class="form-control select2" id="daerah" name="daerah" disabled>
            <option value="" hidden>Gred</option>
            <option value="1">Hulu Langat</option>
            <option value="2" selected>Ampang</option>
        </select>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Negeri</label>
        <select class="form-control select2" id="negeri" name="negeri" disabled>
            <option value="" hidden>Gred</option>
            <option value="1">WP Kuala Lumpur</option>
            <option value="2" selected>Selangor</option>
        </select>
    </div>

    <div class="col-md-6 mb-1">
        <label class="form-label fw-bolder">Emel TASKA</label>
        <input type="text" class="form-control" name="email_taska" value="{{$pengguna->email_taska}}" disabled>
    </div>

    <div class="col-md-6 mb-1">
        <label class="form-label fw-bolder">No Tel Pejabat</label>
        <input type="text" class="form-control" name="no_tel_pejabat" value="{{$pengguna->no_tel_pejabat}}" disabled>
    </div>

    <div class="col-md-3 mb-1">
        <label class="form-label fw-bolder">Tarikh Penubuhan</label>
        <input type="text" class="form-control flatpickr" name="tarikh_penubuhan" value="{{$pengguna->tarikh_penubuhan}}" disabled>
    </div>

    <div class="col-md-3 mb-1">
        <label class="form-label fw-bolder">Jenis Taska</label>
        <select class="form-control select2" id="jenisbanugunan" name="jenisbanugunan" disabled>
            <option value="" hidden>Jenis Taska</option>
            <option value="1">Swasta</option>
            <option value="2" selected>Kerajaan</option>
        </select>
    </div>

    <div class="col-md-3 mb-1">
        <label class="form-label fw-bolder">Jenis Bangunan</label>
        <select class="form-control select2" id="jenis_taska" name="jenis_taska" disabled>
            <option value="" hidden>Jenis Taska</option>
            <option value="tempat_kerja">Tempat Kerja</option>
            <option value="rumah_kedai">Rumah Kedai</option>
            <option value="bangunan">Bangunan</option>
            <option value="teres">Teres</option>
            <option value="banglo">Banglo</option>
        </select>
    </div>

    <div class="col-md-3 mb-1">
        <label class="form-label fw-bolder">Jumlah Staf Sokongan</label>
        <input type="text" class="form-control" name="jumla_staf_sokogan" value="{{$pengguna->jumla_staf_sokogan}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Jumlah Pendidik</label>
        <input type="text" class="form-control" name="jumla_pendidik" value="{{$pengguna->jumla_pendidik}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Jumlah Kanak-Kanak</label>
        <input type="text" class="form-control" name="jumlah_kanak" value="{{$pengguna->jumlah_kanak}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Nisbah Pendidik & Kanak-Kanak</label>
        <input type="text" class="form-control" name="nisbah_pendidik" value="1:1" disabled>
        <p class="text-muted">
            <i> Mengikut Umur </i>
        </p>
    </div>
</div>
