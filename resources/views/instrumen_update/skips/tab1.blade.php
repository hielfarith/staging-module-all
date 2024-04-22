<?php
    $instrumenid = Request::segment(4);
    if (!empty($instrumenid)) {
        $instrumenData = \App\Models\InstrumenSkpakSpksIkeps::where('id', $instrumenid)->first();
    } else {
        $instrumenData = null;
    }
?>
{{-- <form id="forminstrumenskips" novalidate="novalidate">
    <div class="row">
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Instrumen
            </span>
        </h5>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label"> Nama Instrumen
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="nama_instrumen" required
                onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8"
                value="{{$instrumenData?->nama_instrumen}}">
        </div>

        <div class="col-md-6 mb-1">
            <label class="fw-bold form-label"> Tujuan Instrumen
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="tujuan_instrumen" required
                value="{{$instrumenData?->tujuan_instrumen}}">
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Pengguna Instrumen
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="pengguna_instrumen" required>
                <option value="">Sila Pilih</option>
                <option value="PENTADBIR" @if($instrumenData?->pengguna_instrumen == 'PENTADBIR') selected
                    @endif>PENTADBIR</option>
                <option value="GURU INSTITUSI" @if($instrumenData?->pengguna_instrumen == 'PENTADBIR') selected
                    @endif>GURU INSTITUSI</option>
            </select>
        </div>

         <div class="col-md-2 mb-1">
            <label class="fw-bold form-label"> Kategori
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <span class="input-group-text">
                    <input type="checkbox" class="form-check-input" name="kategori" value="Sekolah" @if($instrumenData?->kategori == 'Sekolah') checked  @endif onchange="changeKategori(this)" id="Sekolah">
                    <label>Sekolah</label>
                </span>                   
                <span class="input-group-text">
                    <input type="checkbox" class="form-check-input" name="kategori" value="Pusat" @if($instrumenData?->kategori == 'Pusat') checked  @endif onchange="changeKategori(this)" id="Pusat">
                    <label>Pusat</label>
                </span>
            </div>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Jenis
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="jenis_ips" required id="jenis_ips">
                <option value="">Sila Pilih</option>
            </select>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Instrumen perlu diisi
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="instrumen_perlu_diisi" required
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                value="{{$instrumenData?->instrumen_perlu_diisi}}">
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Tarikh Kuatkuasa
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa" required
                value="{{$instrumenData?->tarikh_kuatkuasa}}">
        </div>

        <div class="col-md-4 mb-1">
            <div class="demo-inline-spacing">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="tetapan_keperluan_pengemaskinian_data_terkini"
                        name="tetapan_keperluan_pengemaskinian_data_terkini" value="1" required @if($instrumenData?->tetapan_keperluan_pengemaskinian_data_terkini) checked @endif />
                    <label class="form-check-label" for="tetapan_keperluan_pengemaskinian_data_terkini">Tetapan
                        Keperluan <br> Pengemaskinian Data Terkini
                        <span class="text-danger">*</span>
                    </label>
                </div>
            </div>
        </div>

        <hr>

        <div class="col">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Pengisian
                </span>
            </h5>

            <div class="mb-1">
                <label class="fw-bold form-label">Pengisian Oleh
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="pengisian_oleh" required>
                    <option value="">Sila Pilih</option>
                    <option value="PENGETUA" @if($instrumenData?->pengisian_oleh == 'PENGETUA') selected @endif>PENGETUA
                    </option>
                    <option value="GURU BESAR INSTITUSI" @if($instrumenData?->pengisian_oleh == 'GURU BESAR INSTITUSI')
                        selected @endif>GURU BESAR INSTITUSI</option>
                </select>
            </div>

            <div class="mb-1">
                <label class="fw-bold form-label"> Tempoh Pengisian
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <!-- <input type="text" class="form-control" name="tempoh_pengisian_lain" required
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                        value="{{$instrumenData?->tempoh_pengisian_lain}}"> -->
                    <input type="text" class="form-control" name="tempoh_pengisian_lain" required readonly
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                        value="3">
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_pengisian" required readonly>
                            <!-- <option value="">Sila Pilih</option>
                            <option value="Bulan" @if($instrumenData?->tempoh_pengisian == 'Bulan') selected @endif>Bulan
                            </option>
                            <option value="Minggu" @if($instrumenData?->tempoh_pengisian == 'Minggu') selected @endif>Minggu
                            </option> -->
                            <option value="Minggu" selected>Minggu
                            </option>
                        </select>
                    </span>
                </div>
            </div>
        </div>

        <div class="col">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Pengesahan
                </span>
            </h5>

            <div class="mb-1">
                <label class="fw-bold form-label">Pengesahan Oleh
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="pengesahan_ole" required>
                    <option value="">Sila Pilih</option>
                    <option value="PPD" @if($instrumenData?->pengesahan_ole == 'PPD') selected @endif>PPD </option>
                    <option value="JPN" @if($instrumenData?->pengesahan_ole == 'JPN') selected @endif>JPN</option>
                </select>
            </div>

            <div class="mb-1">
                <label class="fw-bold form-label"> Tempoh Pengesahan
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <input type="text" class="form-control" name="tempoh_pengeshan_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="{{$instrumenData?->tempoh_pengeshan_lain}}">
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_pengeshan" required>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan" @if($instrumenData?->tempoh_pengeshan == 'Bulan') selected @endif>Bulan
                            </option>
                            <option value="Minggu" @if($instrumenData?->tempoh_pengeshan == 'Minggu') selected @endif>Minggu
                            </option>
                        </select>
                    </span>
                </div>
            </div>
        </div>

        <div class="col">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Verifikasi
                </span>
            </h5>

            <div class="mb-1">
                <label class="fw-bold form-label">Verifikasi Oleh
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="verifikasi_oleh" required>
                    <option value="">Sila Pilih</option>
                    <option value="JPN" @if($instrumenData?->verifikasi_oleh == 'JPN') selected @endif>JPN</option>
                    <option value="KPM" @if($instrumenData?->verifikasi_oleh == 'KPM') selected @endif>KPM</option>
                </select>
            </div>

            <div class="mb-1">
                <label class="fw-bold form-label"> Tempoh Verifikasi
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <!-- <input type="text" class="form-control" name="tempoh_verifikasi_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="{{$instrumenData?->tempoh_verifikasi_lain}}"> -->
                    <input type="text" class="form-control" name="tempoh_verifikasi_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="2">
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_verifikasi" required readonly>
                            <!-- <option value="">Sila Pilih</option>
                            <option value="Bulan" @if($instrumenData?->tempoh_verifikasi_lain == 'Bulan') selected @endif>Bulan
                            </option>
                            <option value="Minggu" @if($instrumenData?->tempoh_verifikasi_lain == 'Minggu') selected
                                @endif>Minggu</option> -->
                            <option value="Bulan" selected>Bulan
                            </option>
                        </select>
                    </span>
                </div>
            </div>
        </div>

        <div class="col">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Validasi
                </span>
            </h5>

            <div class="mb-1">
                <label class="fw-bold form-label">Validasi Oleh
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="validasi_oleh" required>
                    <option value="">Sila Pilih</option>
                    <option value="PPD" @if($instrumenData?->validasi_oleh == 'PPD') selected @endif>PPD</option>
                    <option value="JPN" @if($instrumenData?->validasi_oleh == 'JPN') selected @endif>JPN</option>
                    <option value="KPM" @if($instrumenData?->validasi_oleh == 'KPM') selected @endif>KPM</option>
                </select>
            </div>

            <div class="mb-1">
                <label class="fw-bold form-label"> Tempoh Validasi
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <!-- <input type="text" class="form-control" name="tempoh_validasi_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="{{$instrumenData?->tempoh_validasi_lain}}"> -->
                    <input type="text" class="form-control" name="tempoh_validasi_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="3">
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_validasi" required>
                            <!-- <option value="">Sila Pilih</option>
                            <option value="Bulan" @if($instrumenData?->tempoh_validasi == 'Bulan') selected @endif>Bulan
                            </option>
                            <option value="Minggu" @if($instrumenData?->tempoh_validasi == 'Minggu') selected @endif>Minggu
                            </option> -->
                            <option value="Bulan" selected>Bulan
                            </option>
                        </select>
                    </span>
                </div>
            </div>
        </div>

        <div class="col">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Maklumat Perakuan
                </span>
            </h5>

            <div class="mb-1">
                <label class="fw-bold form-label">Perakuan Oleh
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="perakuan_oleh" required>
                    <option value="">Sila Pilih</option>
                    <option value="PENTADBIR" @if($instrumenData?->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                    </option>
                    <option value="GURU INSTITUSI" @if($instrumenData?->perakuan_oleh == 'GURU INSTITUSI') selected
                        @endif>GURU INSTITUSI</option>
                </select>
            </div>

            <div class="mb-1">
                <label class="fw-bold form-label"> Tempoh Perakuan
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <input type="text" class="form-control" name="tempoh_perakuan_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="{{$instrumenData?->tempoh_perakuan_lain}}">
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_perakuan" required>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan" @if($instrumenData?->tempoh_perakuan == 'Bulan') selected @endif>Bulan
                            </option>
                            <option value="Minggu" @if($instrumenData?->tempoh_perakuan == 'Minggu') selected @endif>Minggu
                            </option>
                        </select>
                    </span>
                </div>
            </div>
        </div>
        <!-- // add status -->
       <div class="row">
            <div class="col-md-3">
                <label class="fw-bold form-label"> Status
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <select class="form-control select2" name="status" required>
                        <option value="">Sila Pilih</option>
                        <option value="1" @if($instrumenData?->status == '1') selected @endif>Active
                        </option>
                        <option value="2" @if($instrumenData?->status == '2') selected @endif>InActive
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <br>
    </div>

    <div class="card-footer">
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </div>
    </div>
    <input type="hidden" name="instrumen_id" id="instrumen_id" value="{{$instrumenData ? $instrumenData->id : 0}}">
</form> --}}

<form id="forminstrumenskips" novalidate="novalidate">
    <div class="row">
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN SKIPS
            </span>
        </h5>
        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Nama Instrumen <span class="text-danger">:</span></label>
        </div>
        <div class="col-md-4 mb-1">
            <input type="text" class="form-control" name="nama_instrumen"
                required
                onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
        </div>
        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Tarikh Kuatkuasa<span class="text-danger">:</span></label>
        </div>
        <div class="col-md-4 mb-1">
            <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa" required>
        </div>
        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Tujuan Instrumen<span class="text-danger">:</span></label>
        </div>
        <div class="col-md-4 mb-1">
            <input type="text" class="form-control" name="tujuan_instrumen" required>
        </div>
        <div class="col-md-2 mb-1">
            <label class="fw-bold form-label">Status<span class="text-danger">:</span></label>
        </div>
        <div class="col-md-4 mb-1">
            <select class="form-control select2" name="status" required>
                <option value="">Sila Pilih</option>
                <option value="1">Active</option>
                <option value="2">InActive</option>
            </select>
        </div>

        <div class="col-md-4 ">
            <div class="card ">
                <div class="card-header" style="background-color: #F3F2F7">
                    <h4 class="card-title fw-bolder">Pengisian</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-1">
                        <div class="col-md-4 ">
                            <label class="fw-bold form-label">Institut <span
                                    class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 ">
                            <select class="form-control select2" name="institusi_pengisian" required id="institusi_pengisian">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-1">
                            <label class="fw-bold form-label">Peranan <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <select class="form-control select2" name="pengisian_oleh" required>
                                <option value="">Sila Pilih</option>
                                <option value="PENGETUA">PENGETUA</option>
                                <option value="GURU BESAR INSTITUSI">GURU BESAR INSTITUSI</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-1">
                            <label class="fw-bold form-label">Tarikh <span
                                    class="text-danger">:</span></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text"
                                        style="background-color: #F3F2F7">Dari</span>
                                    <input type="date" class="form-control" id="fromDate" name="pengisian_dari">
                                    <span class="input-group-text"
                                        style="background-color: #F3F2F7">Hingga</span>
                                    <input type="date" class="form-control" id="toDate" name="pengisian_hingga">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card ">
                <div class="card-header" style="background-color: #F3F2F7">
                    <h4 class="card-title fw-bolder">Pengesahan</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-1">
                        <div class="col-md-4 ">
                            <label class="fw-bold form-label">Institut <span
                                    class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 ">
                            <select class="form-control select2" name="institusi_pengesahan" required id="institusi_pengesahan">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-1">
                            <label class="fw-bold form-label">Peranan <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <select class="form-control select2" name="pengesahan_ole" required>
                                <option value="">Sila Pilih</option>
                                <option value="PPD">PPD</option>
                                <option value="JPN">JPN</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-1">
                            <label class="fw-bold form-label">Tarikh <span
                                    class="text-danger">:</span></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text"
                                        style="background-color: #F3F2F7">Dari</span>
                                    <input type="date" class="form-control" id="fromDate" name="pengesahan_dari">
                                    <span class="input-group-text"
                                        style="background-color: #F3F2F7">Hingga</span>
                                    <input type="date" class="form-control" id="toDate" name="pengesahan_hingga">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card ">
                <div class="card-header" style="background-color: #F3F2F7">
                    <h4 class="card-title fw-bolder">Verifikasi</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-1">
                        <div class="col-md-4 ">
                            <label class="fw-bold form-label">Institut <span
                                    class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 ">
                            <select class="form-control select2" name="institusi_verifikasi" required id="institusi_verifikasi">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-1">
                            <label class="fw-bold form-label">Peranan <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <select class="form-control select2" name="verifikasi_oleh" required>
                                <option value="">Sila Pilih</option>
                                <option value="JPN">JPN</option>
                                <option value="KPM">KPM</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-1">
                            <label class="fw-bold form-label">Tarikh <span
                                    class="text-danger">:</span></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text"
                                        style="background-color: #F3F2F7">Dari</span>
                                    <input type="date" class="form-control" id="fromDate" name="verifikasi_dari">
                                    <span class="input-group-text"
                                        style="background-color: #F3F2F7">Hingga</span>
                                    <input type="date" class="form-control" id="toDate" name="verifikasi_hingga">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card ">
                <div class="card-header" style="background-color: #F3F2F7">
                    <h4 class="card-title fw-bolder">Validasi</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-1">
                        <div class="col-md-4 ">
                            <label class="fw-bold form-label">Institut <span
                                    class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 ">
                            <select class="form-control select2" name="institusi_validasi" required id="institusi_validasi">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-1">
                            <label class="fw-bold form-label">Peranan <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <select class="form-control select2" name="validasi_oleh" required>
                                <option value="">Sila Pilih</option>
                                <option value="PPD">PPD</option>
                                <option value="JPN">JPN</option>
                                <option value="KPM">KPM</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-1">
                            <label class="fw-bold form-label">Tarikh <span
                                    class="text-danger">:</span></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text"
                                        style="background-color: #F3F2F7">Dari</span>
                                    <input type="date" class="form-control" id="fromDate" name="validasi_dari">
                                    <span class="input-group-text"
                                        style="background-color: #F3F2F7">Hingga</span>
                                    <input type="date" class="form-control" id="toDate" name="validasi_hingga">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card ">
                <div class="card-header" style="background-color: #F3F2F7">
                    <h4 class="card-title fw-bolder">Perakuan</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-1">
                        <div class="col-md-4 ">
                            <label class="fw-bold form-label">Institut <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 ">
                            <select class="form-control select2" name="institusi_perakuan" required id="institusi_perakuan">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-1">
                            <label class="fw-bold form-label">Peranan <span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-8 mt-1">
                            <select class="form-control select2" name="perakuan_oleh" required>
                                <option value="">Sila Pilih</option>
                                <option value="PENTADBIR">PENTADBIR</option>
                                <option value="GURU INSTITUSI">GURU INSTITUSI</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-1">
                            <label class="fw-bold form-label">Tarikh <span
                                    class="text-danger">:</span></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text"
                                        style="background-color: #F3F2F7">Dari</span>
                                    <input type="date" class="form-control" id="fromDate" name="perakuan_dari">
                                    <span class="input-group-text"
                                        style="background-color: #F3F2F7">Hingga</span>
                                    <input type="date" class="form-control" id="toDate" name="perakuan_hingga">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- @if ($readonly != 'readonly') --}}
            <div class="d-flex justify-content-end align-items-center my-1">
                <button type="submit" class="btn btn-primary float-right">Hantar</button>
            </div>
        {{-- @endif --}}
    </div>        
</form>


@section('script')

<script type="text/javascript">
    $(document).ready(function() {
    $('.select2').select2({
        placeholder: 'Sila Pilih',
        allowClear: true // Adds a clear button to the dropdown
        });
   });

    $('#forminstrumenskips').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('forminstrumenskips'));
        var error = false;

         $('form#forminstrumenskips').find('select, textarea, input, checkbox').each(function() {
            if(this.required && this.type == 'checkbox' && !this.checked) {
                error = true;
            }
            if (this.required && this.value == '') {
                error = true;
            }
        });

        if (error) {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }

        var url = "{{ route('admin.instrumen.instrumenskips-submit') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('admin.instrumen.senarai-skips')}}";
                    window.location.href = location;
               }
            }
        });

    });

    function changeKategori(event) {
        if (event.value == 'Sekolah') {
            $('#Pusat').prop('checked', false);
            var data = [ 'Sekolah Rendah Akademik Swasta',             
                'Sekolah Menengah Akademik Swasta',                      
                'Sekolah Rendah Agama Swasta',                     
                'Sekolah Menengah Agama Swasta',                      
                'Sekolah Antarabangsa',
                'Sekolah Menengah Persendirian Cina',
                'Sekolah Pendidikan Khas',
                'Sekolah Ekspatriat'
            ];
        } else {
            $('#Sekolah').prop('checked', false);
            var data = [ 
                'Pusat Bahasa',                      
                'Pusat Latihan/ Kemahiran',                      
                'Pusat Perkembangan Minda',
                'Pusat Tuisyen'
            ];
        }

        const el = document.getElementById(event.value);
        if (el && el.type === "checkbox" && !el.checked) {
            $('#jenis_ips').empty();
            return false;
        }
         
        $('#jenis_ips').empty();
        for (var i = 0; i < data.length; i++) {
            $('#jenis_ips').append('<option value="'+ data[i] +'">'+ data[i] +'</option>');
        }
    }
</script>

@endsection
