<div class="row">
    <div class="col-md-9 mb-1">
        <label class="form-label fw-bolder">Nama Pengguna/ Penilai</label>
        <input type="text" class="form-control" name="nama_pengguna" value="{{$penilai->nama_pengguna}}" disabled>
    </div>

    <div class="col-md-3 mb-1">
        <label class="form-label fw-bolder">No Kad Pengenalan/ Pasport</label>
        <input type="text" class="form-control" name="no_kad" value="{{$penilai->no_kad}}" disabled>
    </div>

    <div class="col-md-12 mb-1">
        <label class="form-label fw-bolder">Agensi/ Kementerian</label>
        <input type="text" class="form-control" name="agensi_kementerian" value="{{$penilai->agensi_kementerian}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Emel Peribadi</label>
        <input type="text" class="form-control" name="email_peribadi" value="{{$penilai->email_peribadi}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Emel Ketua Jabatan</label>
        <input type="text" class="form-control" name="email_ketua_jabatan" value="{{$penilai->email_ketua_jabatan}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Emel Penyelia</label>
        <input type="text" class="form-control" name="email_penyelia" value="{{$penilai->email_penyelia}}" disabled>
    </div>

    <div class="col-md-6 mb-1">
        <label class="form-label fw-bolder">No Tel Peribadi</label>
        <input type="text" class="form-control" name="no_tel_peribadi" value="{{$penilai->no_tel_peribadi}}" disabled>
    </div>

    <div class="col-md-6 mb-1">
        <label class="form-label fw-bolder">No Tel Pejabat</label>
        <input type="text" class="form-control" name="no_tel_pejabat" value="{{$penilai->no_tel_pejabat}}" disabled>
    </div>

    <div class="col-md-12 mb-1">
        <label class="form-label fw-bolder">Alamat 1</label>
        <input type="text" class="form-control" name="alamat1" value="{{$penilai->alamat1}}" disabled>
    </div>

    <div class="col-md-12 mb-1">
        <label class="form-label fw-bolder">Alamat 2</label>
        <input type="text" class="form-control" name="alamat2" value="{{$penilai->alamat2}}" disabled>
    </div>

    <div class="col-md-12 mb-1">
        <label class="form-label fw-bolder">Alamat 3</label>
        <input type="text" class="form-control" name="alamat3" value="{{$penilai->alamat3}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Poskod</label>
        <input type="text" class="form-control" name="poskod" value="{{$penilai->poskod}}" disabled>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Daerah</label>
        <select class="form-control select2" id="daerah" name="daerah" disabled>
            <option value="" hidden>Gred</option>
            <option value="1">Hulu Langat</option>
            <option value="2">Ampang</option>
        </select>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Negeri</label>
        <select class="form-control select2" id="negeri" name="negeri" disabled>
            <option value="" hidden>Negeri</option>
            @foreach($states as $state)
                <option value="{{$state->name}}" @if($state->name == $penilai->negeri) selected @endif>{{$state->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 mb-1">
        <label class="form-label fw-bolder">Gred</label>
        <select class="form-control select2" id="gred" name="gred" disabled>
            <option value="" hidden>Gred</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
    </div>

    <div class="col-md-8 mb-1">
        <label class="form-label fw-bolder">3 Negeri Pilihan Bagi Menjalankan Penilaian SKPAK</label>
        <select class="form-control select2" id="negeri_skpak[]" name="negeri_skpak[]" multiple disabled>
            <option value="" hidden>Negeri</option>
            @foreach($states as $state)
                <option value="{{$state->name}}">{{$state->name}}</option>
            @endforeach
        </select>
    </div>
</div>
