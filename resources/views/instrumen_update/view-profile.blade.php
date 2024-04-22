<div class="card">
    <div class="card-body">
        <form id="forminstrumenskips" novalidate="novalidate">
            <div class="row">
                <!-- -----start skips ------ -->

                @if ($instrumen->type == 'SKIPS')
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
                                value="{{ $instrumen->nama_instrumen }}" {{ $readonly }} {{ $disabled }}
                                required
                                onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
                        </div>
                        <div class="col-md-2 mb-1">
                            <label class="fw-bold form-label">Tarikh Kuatkuasa<span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-4 mb-1">
                            <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa"
                                value="{{ $instrumen->tarikh_kuatkuasa }}" {{ $readonly }} {{ $disabled }}
                                required>
                        </div>
                        <div class="col-md-2 mb-1">
                            <label class="fw-bold form-label">Tujuan Instrumen<span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-4 mb-1">
                            <input type="text" class="form-control" name="tujuan_instrumen"
                                value="{{ $instrumen->tujuan_instrumen }}" {{ $readonly }} required
                                {{ $disabled }}>
                        </div>
                        <div class="col-md-2 mb-1">
                            <label class="fw-bold form-label">Status<span class="text-danger">:</span></label>
                        </div>
                        <div class="col-md-4 mb-1">
                            <select class="form-control select2" name="status" required>
                                <option value="">Sila Pilih</option>
                                <option value="1" @if ($instrumen?->status == '1') selected @endif>Active
                                </option>
                                <option value="2" @if ($instrumen?->status == '2') selected @endif>InActive
                                </option>
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
                                            <select class="form-control select2" name="jenis_ips" required
                                                id="jenis_ips">
                                                <option value="{{ $instrumen->jenis_ips }}">{{ $instrumen->jenis_ips }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-1">
                                            <label class="fw-bold form-label">Peranan <span
                                                    class="text-danger">:</span></label>
                                        </div>
                                        <div class="col-md-8 mt-1">
                                            <select class="form-control select2" name="perakuan_oleh"
                                                {{ $disabled }} required>
                                                <option value="">Sila Pilih</option>
                                                <option value="PENTADBIR"
                                                    @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                                </option>
                                                <option value="GURU INSTITUSI"
                                                    @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                    INSTITUSI</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mt-1">
                                            <label class="fw-bold form-label">Tarikh <span
                                                    class="text-danger">:</span></label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text"
                                                        style="background-color: #F3F2F7">Dari</span>
                                                    <input type="date" class="form-control" id="fromDate">
                                                    <span class="input-group-text"
                                                        style="background-color: #F3F2F7">Hingga</span>
                                                    <input type="date" class="form-control" id="toDate">
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
                                            <select class="form-control select2" name="jenis_ips" required
                                                id="jenis_ips">
                                                <option value="{{ $instrumen->jenis_ips }}">
                                                    {{ $instrumen->jenis_ips }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-1">
                                            <label class="fw-bold form-label">Peranan <span
                                                    class="text-danger">:</span></label>
                                        </div>
                                        <div class="col-md-8 mt-1">
                                            <select class="form-control select2" name="perakuan_oleh"
                                                {{ $disabled }} required>
                                                <option value="">Sila Pilih</option>
                                                <option value="PENTADBIR"
                                                    @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                                </option>
                                                <option value="GURU INSTITUSI"
                                                    @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                    INSTITUSI</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mt-1">
                                            <label class="fw-bold form-label">Tarikh <span
                                                    class="text-danger">:</span></label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text"
                                                        style="background-color: #F3F2F7">Dari</span>
                                                    <input type="date" class="form-control" id="fromDate">
                                                    <span class="input-group-text"
                                                        style="background-color: #F3F2F7">Hingga</span>
                                                    <input type="date" class="form-control" id="toDate">
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
                                            <select class="form-control select2" name="jenis_ips" required
                                                id="jenis_ips">
                                                <option value="{{ $instrumen->jenis_ips }}">
                                                    {{ $instrumen->jenis_ips }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-1">
                                            <label class="fw-bold form-label">Peranan <span
                                                    class="text-danger">:</span></label>
                                        </div>
                                        <div class="col-md-8 mt-1">
                                            <select class="form-control select2" name="perakuan_oleh"
                                                {{ $disabled }} required>
                                                <option value="">Sila Pilih</option>
                                                <option value="PENTADBIR"
                                                    @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                                </option>
                                                <option value="GURU INSTITUSI"
                                                    @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                    INSTITUSI</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mt-1">
                                            <label class="fw-bold form-label">Tarikh <span
                                                    class="text-danger">:</span></label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text"
                                                        style="background-color: #F3F2F7">Dari</span>
                                                    <input type="date" class="form-control" id="fromDate">
                                                    <span class="input-group-text"
                                                        style="background-color: #F3F2F7">Hingga</span>
                                                    <input type="date" class="form-control" id="toDate">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($readonly != 'readonly')
                            <div class="d-flex justify-content-end align-items-center my-1">
                                <button type="submit" class="btn btn-primary float-right">Hantar</button>
                            </div>
                        @endif
                    </div>
                @endif
                <!-- ----end skips--- -->
        </form>

        <!-- ----start skps--- -->
        @if ($instrumen->type == 'SPKS')
            <form id="forminstrumenspks" novalidate="novalidate">
                <div class="row">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill badge-light-primary">
                            Maklumat MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN SPKS
                        </span>
                    </h5>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Nama Instrumen <span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="text" class="form-control" name="nama_instrumen"
                            value="{{ $instrumen->nama_instrumen }}" {{ $readonly }} {{ $disabled }}
                            required
                            onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
                    </div>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Tarikh Kuatkuasa<span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa"
                            value="{{ $instrumen->tarikh_kuatkuasa }}" {{ $readonly }} {{ $disabled }}
                            required>
                    </div>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Tujuan Instrumen<span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="text" class="form-control" name="tujuan_instrumen"
                            value="{{ $instrumen->tujuan_instrumen }}" {{ $readonly }} required
                            {{ $disabled }}>
                    </div>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Status<span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <select class="form-control select2" name="status" required>
                            <option value="">Sila Pilih</option>
                            <option value="1" @if ($instrumen?->status == '1') selected @endif>Active
                            </option>
                            <option value="2" @if ($instrumen?->status == '2') selected @endif>InActive
                            </option>
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
                                        <select class="form-control select2" name="jenis_ips" required
                                            id="jenis_ips">
                                            <option value="{{ $instrumen->jenis_ips }}">{{ $instrumen->jenis_ips }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label class="fw-bold form-label">Peranan <span
                                                class="text-danger">:</span></label>
                                    </div>
                                    <div class="col-md-8 mt-1">
                                        <select class="form-control select2" name="perakuan_oleh" {{ $disabled }}
                                            required>
                                            <option value="">Sila Pilih</option>
                                            <option value="PENTADBIR"
                                                @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                            </option>
                                            <option value="GURU INSTITUSI"
                                                @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                INSTITUSI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-1">
                                        <label class="fw-bold form-label">Tarikh <span
                                                class="text-danger">:</span></label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Dari</span>
                                                <input type="date" class="form-control" id="fromDate">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Hingga</span>
                                                <input type="date" class="form-control" id="toDate">
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
                                        <select class="form-control select2" name="jenis_ips" required
                                            id="jenis_ips">
                                            <option value="{{ $instrumen->jenis_ips }}">{{ $instrumen->jenis_ips }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label class="fw-bold form-label">Peranan <span
                                                class="text-danger">:</span></label>
                                    </div>
                                    <div class="col-md-8 mt-1">
                                        <select class="form-control select2" name="perakuan_oleh" {{ $disabled }}
                                            required>
                                            <option value="">Sila Pilih</option>
                                            <option value="PENTADBIR"
                                                @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                            </option>
                                            <option value="GURU INSTITUSI"
                                                @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                INSTITUSI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-1">
                                        <label class="fw-bold form-label">Tarikh <span
                                                class="text-danger">:</span></label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Dari</span>
                                                <input type="date" class="form-control" id="fromDate">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Hingga</span>
                                                <input type="date" class="form-control" id="toDate">
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
                                        <select class="form-control select2" name="jenis_ips" required
                                            id="jenis_ips">
                                            <option value="{{ $instrumen->jenis_ips }}">{{ $instrumen->jenis_ips }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label class="fw-bold form-label">Peranan <span
                                                class="text-danger">:</span></label>
                                    </div>
                                    <div class="col-md-8 mt-1">
                                        <select class="form-control select2" name="perakuan_oleh" {{ $disabled }}
                                            required>
                                            <option value="">Sila Pilih</option>
                                            <option value="PENTADBIR"
                                                @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                            </option>
                                            <option value="GURU INSTITUSI"
                                                @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                INSTITUSI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-1">
                                        <label class="fw-bold form-label">Tarikh <span
                                                class="text-danger">:</span></label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Dari</span>
                                                <input type="date" class="form-control" id="fromDate">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Hingga</span>
                                                <input type="date" class="form-control" id="toDate">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($readonly != 'readonly')
                        <div class="d-flex justify-content-end align-items-center my-1">
                            <button type="submit" class="btn btn-primary float-right">Hantar</button>
                        </div>
                    @endif
                </div>
            </form>
        @endif
        <!-- ----end spks--- -->

        <!-- ----start skpak--- -->
        @if ($instrumen->type == 'SKPAK')
            <form id="forminstrumenskpak" novalidate="novalidate">
                <div class="row">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill badge-light-primary">
                            Maklumat MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN SKPAK
                        </span>
                    </h5>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Nama Instrumen <span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="text" class="form-control" name="nama_instrumen"
                            value="{{ $instrumen->nama_instrumen }}" {{ $readonly }} {{ $disabled }}
                            required
                            onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
                    </div>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Tarikh Kuatkuasa<span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa"
                            value="{{ $instrumen->tarikh_kuatkuasa }}" {{ $readonly }} {{ $disabled }}
                            required>
                    </div>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Tujuan Instrumen<span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="text" class="form-control" name="tujuan_instrumen"
                            value="{{ $instrumen->tujuan_instrumen }}" {{ $readonly }} required
                            {{ $disabled }}>
                    </div>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Status<span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <select class="form-control select2" name="status" required>
                            <option value="">Sila Pilih</option>
                            <option value="1" @if ($instrumen?->status == '1') selected @endif>Active
                            </option>
                            <option value="2" @if ($instrumen?->status == '2') selected @endif>InActive
                            </option>
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
                                        <select class="form-control select2" name="jenis_ips" required
                                            id="jenis_ips">
                                            <option value="{{ $instrumen->jenis_ips }}">{{ $instrumen->jenis_ips }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label class="fw-bold form-label">Peranan <span
                                                class="text-danger">:</span></label>
                                    </div>
                                    <div class="col-md-8 mt-1">
                                        <select class="form-control select2" name="perakuan_oleh" {{ $disabled }}
                                            required>
                                            <option value="">Sila Pilih</option>
                                            <option value="PENTADBIR"
                                                @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                            </option>
                                            <option value="GURU INSTITUSI"
                                                @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                INSTITUSI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-1">
                                        <label class="fw-bold form-label">Tarikh <span
                                                class="text-danger">:</span></label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Dari</span>
                                                <input type="date" class="form-control" id="fromDate">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Hingga</span>
                                                <input type="date" class="form-control" id="toDate">
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
                                        <select class="form-control select2" name="jenis_ips" required
                                            id="jenis_ips">
                                            <option value="{{ $instrumen->jenis_ips }}">{{ $instrumen->jenis_ips }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label class="fw-bold form-label">Peranan <span
                                                class="text-danger">:</span></label>
                                    </div>
                                    <div class="col-md-8 mt-1">
                                        <select class="form-control select2" name="perakuan_oleh" {{ $disabled }}
                                            required>
                                            <option value="">Sila Pilih</option>
                                            <option value="PENTADBIR"
                                                @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                            </option>
                                            <option value="GURU INSTITUSI"
                                                @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                INSTITUSI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-1">
                                        <label class="fw-bold form-label">Tarikh <span
                                                class="text-danger">:</span></label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Dari</span>
                                                <input type="date" class="form-control" id="fromDate">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Hingga</span>
                                                <input type="date" class="form-control" id="toDate">
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
                                        <select class="form-control select2" name="jenis_ips" required
                                            id="jenis_ips">
                                            <option value="{{ $instrumen->jenis_ips }}">{{ $instrumen->jenis_ips }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label class="fw-bold form-label">Peranan <span
                                                class="text-danger">:</span></label>
                                    </div>
                                    <div class="col-md-8 mt-1">
                                        <select class="form-control select2" name="perakuan_oleh" {{ $disabled }}
                                            required>
                                            <option value="">Sila Pilih</option>
                                            <option value="PENTADBIR"
                                                @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                            </option>
                                            <option value="GURU INSTITUSI"
                                                @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                INSTITUSI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-1">
                                        <label class="fw-bold form-label">Tarikh <span
                                                class="text-danger">:</span></label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Dari</span>
                                                <input type="date" class="form-control" id="fromDate">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Hingga</span>
                                                <input type="date" class="form-control" id="toDate">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($readonly != 'readonly')
                        <div class="d-flex justify-content-end align-items-center my-1">
                            <button type="submit" class="btn btn-primary float-right">Hantar</button>
                        </div>
                    @endif
                </div>
            </form>
        @endif
        <!-- ----end skpak--- -->
        <!-- ----start ikeps--- -->
        @if ($instrumen->type == 'SEDIA')
            <form id="forminstrumensedia" novalidate="novalidate">
                <div class="row">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill badge-light-primary">
                            Maklumat MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN IKEPS
                        </span>
                    </h5>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Nama Instrumen <span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="text" class="form-control" name="nama_instrumen"
                            value="{{ $instrumen->nama_instrumen }}" {{ $readonly }} {{ $disabled }}
                            required
                            onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
                    </div>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Tarikh Kuatkuasa<span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa"
                            value="{{ $instrumen->tarikh_kuatkuasa }}" {{ $readonly }} {{ $disabled }}
                            required>
                    </div>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Tujuan Instrumen<span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="text" class="form-control" name="tujuan_instrumen"
                            value="{{ $instrumen->tujuan_instrumen }}" {{ $readonly }} required
                            {{ $disabled }}>
                    </div>
                    <div class="col-md-2 mb-1">
                        <label class="fw-bold form-label">Status<span class="text-danger">:</span></label>
                    </div>
                    <div class="col-md-4 mb-1">
                        <select class="form-control select2" name="status" required>
                            <option value="">Sila Pilih</option>
                            <option value="1" @if ($instrumen?->status == '1') selected @endif>Active
                            </option>
                            <option value="2" @if ($instrumen?->status == '2') selected @endif>InActive
                            </option>
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
                                        <select class="form-control select2" name="jenis_ips" required
                                            id="jenis_ips">
                                            <option value="{{ $instrumen->jenis_ips }}">{{ $instrumen->jenis_ips }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label class="fw-bold form-label">Peranan <span
                                                class="text-danger">:</span></label>
                                    </div>
                                    <div class="col-md-8 mt-1">
                                        <select class="form-control select2" name="perakuan_oleh" {{ $disabled }}
                                            required>
                                            <option value="">Sila Pilih</option>
                                            <option value="PENTADBIR"
                                                @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                            </option>
                                            <option value="GURU INSTITUSI"
                                                @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                INSTITUSI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-1">
                                        <label class="fw-bold form-label">Tarikh <span
                                                class="text-danger">:</span></label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Dari</span>
                                                <input type="date" class="form-control" id="fromDate">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Hingga</span>
                                                <input type="date" class="form-control" id="toDate">
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
                                        <select class="form-control select2" name="jenis_ips" required
                                            id="jenis_ips">
                                            <option value="{{ $instrumen->jenis_ips }}">{{ $instrumen->jenis_ips }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label class="fw-bold form-label">Peranan <span
                                                class="text-danger">:</span></label>
                                    </div>
                                    <div class="col-md-8 mt-1">
                                        <select class="form-control select2" name="perakuan_oleh" {{ $disabled }}
                                            required>
                                            <option value="">Sila Pilih</option>
                                            <option value="PENTADBIR"
                                                @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                            </option>
                                            <option value="GURU INSTITUSI"
                                                @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                INSTITUSI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-1">
                                        <label class="fw-bold form-label">Tarikh <span
                                                class="text-danger">:</span></label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Dari</span>
                                                <input type="date" class="form-control" id="fromDate">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Hingga</span>
                                                <input type="date" class="form-control" id="toDate">
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
                                        <select class="form-control select2" name="jenis_ips" required
                                            id="jenis_ips">
                                            <option value="{{ $instrumen->jenis_ips }}">{{ $instrumen->jenis_ips }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label class="fw-bold form-label">Peranan <span
                                                class="text-danger">:</span></label>
                                    </div>
                                    <div class="col-md-8 mt-1">
                                        <select class="form-control select2" name="perakuan_oleh" {{ $disabled }}
                                            required>
                                            <option value="">Sila Pilih</option>
                                            <option value="PENTADBIR"
                                                @if ($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR
                                            </option>
                                            <option value="GURU INSTITUSI"
                                                @if ($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU
                                                INSTITUSI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-1">
                                        <label class="fw-bold form-label">Tarikh <span
                                                class="text-danger">:</span></label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Dari</span>
                                                <input type="date" class="form-control" id="fromDate">
                                                <span class="input-group-text"
                                                    style="background-color: #F3F2F7">Hingga</span>
                                                <input type="date" class="form-control" id="toDate">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($readonly != 'readonly')
                        <div class="d-flex justify-content-end align-items-center my-1">
                            <button type="submit" class="btn btn-primary float-right">Hantar</button>
                        </div>
                    @endif
                </div>
            </form>
        @endif
        <!-- ----end skps--- -->
    </div>


</div>
</div>

<script type="text/javascript">
    $('#forminstrumenskpak').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('forminstrumenskpak'));
        var error = false;
        $('select.select2').each(function() {
            var element = $(this);
            var select2Value = element.select2('data');
            var selectedValues = element.val();
            var fieldName = element.attr('name');
            if (typeof element.attr('disabled') == 'undefined') {

                if (!selectedValues || selectedValues === '') {
                    Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                    return false; // Stop the loop if an error is found
                }
            }
        });

        formData.forEach(function(value, name) {
            var element = $("input[name='" + name + "']");
            if (typeof element.attr('name') != 'undefined' && typeof element.attr('required') !=
                'undefined') {
                if (element.val() == '') {
                    Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                    error = true;
                    return false;
                }
            }
        });

        if (error) {
            return false;
        }

        var type = $('#type').val();
        var url = "{{ route('admin.instrumen.instrumenikeps-submit') }}"
        if (type == 'SKIPS') {
            var url = "{{ route('admin.instrumen.instrumenskips-submit') }}"
        }
        if (type == 'SPKS') {
            var url = "{{ route('admin.instrumen.instrumenspks-submit') }}"
        }
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var type = $('#type').val();
                    if (type == 'IKEPS') {
                        var location = "{{ route('admin.instrumen.instrumenikeps-list') }}"
                    } else if (type == 'SEDIA') {
                        var location = "{{ route('admin.instrumen.senarai-sedia-ada') }}"
                    } else if (type == 'SKIPS') {
                        var location = "{{ route('admin.instrumen.senarai-skips') }}"
                    } else if (type == 'SKPAK') {
                        var location = "{{ route('admin.instrumen.senarai-skpak') }}"
                    } else if (type == 'SPKS') {
                        var location = "{{ route('admin.instrumen.senarai-spks') }}"
                    }
                    window.location.href = location;
                }
            }
        });

    });

    function changeKategori(event) {
        if (event.value == 'Sekolah') {
            $('#Pusat').prop('checked', false);
            var data = ['Sekolah Rendah Akademik Swasta',
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
            $('#jenis_ips').append('<option value="' + data[i] + '">' + data[i] + '</option>');
        }
    }
</script>
