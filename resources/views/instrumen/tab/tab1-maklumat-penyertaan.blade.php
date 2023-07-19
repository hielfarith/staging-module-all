<div class="form-group row col-12 col-sm-12">
    <div class="col-sm-12 mb-1">
        <label class="form-label">Nama Sekolah</label>
        <input type="text" class="form-control" id="" name="" value="{{ $name }}" readonly>
    </div>
    <hr>

    <h6 class="fw-bolder mb-0">Alamat Sekolah</h6>
    <div class="col-sm-12 mb-1">
        <label class="form-label">Alamat 1</label>
        <input type="text" class="form-control" id="" name="" value="{{ $address1 }}" readonly>
    </div>

    <div class="col-sm-12 mb-1">
        <label class="form-label">Alamat 2</label>
        <input type="text" class="form-control" id="" name="" value="{{ $address2 }}" readonly>
    </div>

    <div class="col-sm-12 mb-1">
        <label class="form-label">Alamat 3</label>
        <input type="text" class="form-control" id="" name="" readonly>
    </div>
    <hr>

    <h6 class="fw-bolder mb-0">Maklumat Perhubungan</h6>
    <div class="col-sm-6 mb-1">
        <label class="form-label">E-mel</label>
        <input type="text" class="form-control" id="" name="" value="{{ $emel }}" readonly>
    </div>

    <div class="col-sm-6 mb-1">
        <label class="form-label">Laman Web</label>
        <input type="text" class="form-control" id="" name="" value="{{ $website }}" readonly>
    </div>

    <div class="col-sm-6 mb-1">
        <label class="form-label">No Telefon</label>
        <input type="text" class="form-control" id="" name="" value="{{ $phone_number }}" readonly>
    </div>

    <div class="col-sm-6 mb-1">
        <label class="form-label">No Faks</label>
        <input type="text" class="form-control" id="" name="" value="{{ $faks }}" readonly>
    </div>
    <hr>

    <h6 class="fw-bolder mb-0">Bilangan Kumpulan</h6>
    <div class="col-sm-4 mb-1">
        <label class="form-label">Bil. Pelajar</label>
        <input id="number" type="number" class="form-control" name="" value="{{ $pelajar }}" readonly>
    </div>

    <div class="col-sm-4 mb-1">
        <label class="form-label">Bil. Guru</label>
        <input id="number" type="number" class="form-control" name="" value="{{ $guru }}" readonly>
    </div>

    <div class="col-sm-4 mb-1">
        <label class="form-label">Bil. Staf </label>
        <input id="number" type="number" class="form-control" name="" value="{{ $staff }}" readonly>
    </div>
    <hr>

    <h6 class="fw-bolder mb-0">Maklumat Lain</h6>
    <div class="col-sm-4 mb-1">
        <label class="form-label">Gred Sekolah</label>
        <input id="number" type="number" class="form-control" name="" readonly>
    </div>


    <div class="col-sm-4 mb-1">
        <label class="form-label">Keluasan Sekolah</label>
        <div class="input-group">
            <input type="text" class="form-control" value="{{ $keluasan }}" readonly/>
            <span class="input-group-text" id="basic-addon-search1">
                <select class="form-control select2" name="" id="" disabled>
                    <option value="Ekar" selected>Ekar</option>
                    <option value="Hektar">Hektar</option>
                </select>
            </span>
        </div>
    </div>

    <div class="col-sm-4 mb-1">
        <label class="form-label">Kategori Sekolah</label>
        <select disabled class="form-control select2" name="" id="">
            <option value="Bandar" selected>Bandar</option>
            <option value="Luar Bandar">Luar Bandar</option>
            <option value="Pendalaman">Pendalaman</option>
        </select>
    </div>
</div>
