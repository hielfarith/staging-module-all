<?php
    $instrumenid = Request::segment(4);
    if (!empty($instrumenid)) {
        $instrumenData = \App\Models\InstrumenSkpakSpksIkeps::where('id', $instrumenid)->first();
    } else {
        $instrumenData = null;
    }
?>
<form id="forminstrumenskips" novalidate="novalidate">
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
                    <input type="text" class="form-control" name="tempoh_pengisian_lain" required
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                        value="{{$instrumenData?->tempoh_pengisian_lain}}">
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_pengisian" required>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan" @if($instrumenData?->tempoh_pengisian == 'Bulan') selected @endif>Bulan
                            </option>
                            <option value="Minggu" @if($instrumenData?->tempoh_pengisian == 'Minggu') selected @endif>Minggu
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
                    <input type="text" class="form-control" name="tempoh_verifikasi_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="{{$instrumenData?->tempoh_verifikasi_lain}}">
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_verifikasi" required>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan" @if($instrumenData?->tempoh_verifikasi_lain == 'Bulan') selected @endif>Bulan
                            </option>
                            <option value="Minggu" @if($instrumenData?->tempoh_verifikasi_lain == 'Minggu') selected
                                @endif>Minggu</option>
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
                    <input type="text" class="form-control" name="tempoh_validasi_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="{{$instrumenData?->tempoh_validasi_lain}}">
                    <span class="input-group-text">
                        <select class="form-control select2" name="tempoh_validasi" required>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan" @if($instrumenData?->tempoh_validasi == 'Bulan') selected @endif>Bulan
                            </option>
                            <option value="Minggu" @if($instrumenData?->tempoh_validasi == 'Minggu') selected @endif>Minggu
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
    </div>

    <div class="card-footer">
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </div>
    </div>
    <input type="hidden" name="instrumen_id" id="instrumen_id" value="{{$instrumenData ? $instrumenData->id : 0}}">
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
                    var location = "{{route('admin.instrumen.tambah-skips')}}";
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
