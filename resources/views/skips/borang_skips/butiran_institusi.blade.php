<form action="">
    <div class="row">
        <hr>
        <h5 class="mb-2 mt-1 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Institusi
            </span>
        </h5>

        <div class="col-md-8 mb-1">
            <label class="form-label fw-bold text-titlecase">Nama Institusi
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold text-titlecase">Nama Pengetua
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">
        </div>

        <div class="col-md-10 mb-1">
            <label class="fw-bold form-label">Alamat
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" id="">
        </div>

        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Negeri
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="" id="">
                <option value="" hidden>Negeri</option>
                @foreach($negeris as $negeri)
                    <option value="{{$negeri->name}}">{{$negeri->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase">No. Telefon
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> No. Faks </label>
            <input type="text" id="" class="form-control">
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> Alamat Emel
                <span class="text-danger">*</span>
            </label>
            <input type="email" id="" class="form-control">
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> Laman Web
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">
        </div>

        <hr>
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Pendaftaran
            </span>
        </h5>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold text-titlecase"> No. Perakuan Pendaftaran
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">

            <label class="form-label fw-bold text-titlecase mt-1"> Tarikh Tamat
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold text-titlecase"> No. Surat Kelulusan KDN
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">

            <label class="form-label fw-bold text-titlecase mt-1"> Tarikh Tamat
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold text-titlecase"> No. Pendaftaran Syarikat
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">

            <label class="form-label fw-bold text-titlecase mt-1"> No. Lesen Perniagaan
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">
        </div>

        <hr>
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Pelajar dan Kakitangan
            </span>
        </h5>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> Bilangan Enrolmen Pelajar
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">

            <label class="form-label fw-bold text-titlecase mt-1"> Kapasiti Maksimum Pelajar
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Tempatan
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">

            <label class="form-label fw-bold text-titlecase mt-1"> Pecahan (Pelajar Tempatan)
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <input type="text" id="" name="" class="form-control" placeholder="Lelaki">
                <input type="text" id="" name="" class="form-control" placeholder="Perempuan">
            </div>
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> Bilangan Pelajar Antarabangsa
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">

            <label class="form-label fw-bold text-titlecase mt-1"> Pecahan (Pelajar Antarabangsa)
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <input type="text" id="" name="" class="form-control" placeholder="Lelaki">
                <input type="text" id="" name="" class="form-control" placeholder="Perempuan">
            </div>
        </div>

        <div class="col-md-3 mb-1">
            <label class="form-label fw-bold text-titlecase"> Bilangan Guru Keseluruhan
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" class="form-control">

            <label class="form-label fw-bold text-titlecase mt-1"> Pecahan (Guru)
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <input type="text" id="" name="" class="form-control" placeholder="Tempatan">
                <input type="text" id="" name="" class="form-control" placeholder="Antarabangsa">
            </div>
        </div>

        <hr>
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Laporan Kewangan
            </span>
        </h5>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold text-titlecase"> Tarikh Audit
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold text-titlecase"> Tarikh Lapor
                <span class="text-danger">*</span>
            </label>
            <input type="text" id="" name="" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
        </div>
    </div>

    <hr>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="submit" class="btn btn-primary float-right">Simpan</button>
    </div>
</form>
