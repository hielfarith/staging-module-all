<div class="row">
    <div class="col-md-4">
        <div class="card bg-light-primary">
            <div class="card-header">
                <h4 class="card-title">
                    Bilangan Murid Lelaki
                </h4>
            </div>
            <hr>

            <div class="card-body">
                919
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-light-info">
            <div class="card-header">
                <h4 class="card-title">
                    Bilangan Murid Perempuan
                </h4>
            </div>
            <hr>

            <div class="card-body">
                919
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-light-success">
            <div class="card-header">
                <h4 class="card-title">
                    Jumlah Keseluruhan
                </h4>
            </div>
            <hr>

            <div class="card-body">
                919
            </div>
        </div>
    </div>

    <hr>

    <form id="sediaOlehForm" action="{{ route('ikeps.store', 'disediakan_oleh') }}" method="POST">
    @csrf
    <h5 class="mb-2 fw-bold">
        <span class="badge rounded-pill badge-light-primary">
            Disediakan Oleh
        </span>
    </h5>
    <div class="row">
        <div class="col-md-12 mb-1">
            <label class="form-label fw-bold">Nama Setiausaha Sukan</label>
            <select name="disediakan_oleh" id="disediakan_oleh" class="form-control select2" {{ $disabled }}>
                <option value="" hidden>Nama Setiausaha Sukan</option>
                @foreach($suSukan as $su)
                <option value="{{ $su->id }}">{{ $su->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold">Nombor Kad Pengenalan</label>
            <input type="text" class="form-control" disabled>
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bold">Nombor Telefon</label>
            <input type="text" class="form-control" disabled>
        </div>

        {{-- <div class="col-md-4 mb-1">
            <label class="form-label fw-bold">Tarikh Disediakan</label>
            <input type="text" id="tarikh_disediakan" name="tarikh_disediakan" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" disabled>
        </div> --}}
    </div>

    @if(!$checkReadOnly)
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary" onclick="submitTab('#sediaOlehForm')">Simpan</button>
    </div>
    @endif
    </form>

    <hr>
    
    <form id="sahOlehForm" action="{{ route('ikeps.store', 'disahkan_oleh') }}" method="POST">
    @csrf
    <h5 class="mb-2 fw-bold">
        <span class="badge rounded-pill badge-light-primary">
            Disahkan Oleh
        </span>
    </h5>

    <div class="row">
        <div class="col-md-12 mb-1">
            <label class="form-label fw-bold">Nama Pentadbir</label>
            <select name="disahkan_oleh" id="disahkan_oleh" class="form-control select2" @if(!$verifyStatus) disabled @endif>
                <option value="" hidden>Nama Pentadbir</option>
                @foreach($guruBesar as $guru)
                <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-1">
            <label class="form-label fw-bold">Nombor Kad Pengenalan</label>
            <input type="text" class="form-control" disabled>
        </div>

        {{-- <div class="col-md-6 mb-1">
            <label class="form-label fw-bold">Tarikh Disahkan</label>
            <input type="text" id="tarikh_disahkan" name="tarikh_disahkan" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" disabled>
        </div> --}}
    </div>

    @if($verifyStatus)
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary" onclick="submitTab('#sahOlehForm')">Simpan</button>
    </div>
    @endif
    </form>
    <br>
</div>

<div class="card-footer">
    <div class="d-flex justify-content-between">
        <button class="btn btn-outline-secondary prev-tab">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Kembali</span>
        </button>
        {{-- <button class="btn btn-primary next-tab">
            <span class="align-middle d-sm-inline-block d-none">Seterusnya</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button> --}}
    </div>
</div>
