<div class="card">
    <div class="card-body">
        <form id="forminstrumenskpak" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN SKPAK, SPKS, IKEPS
                    </span>
                </h5>
                <input type="hidden" name="instrumen_id" value="{{$instrumen->id}}">
                <input type="hidden" name="type" value="{{$instrumen->type}}" id="type">
                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label"> Nama Instrumen
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_instrumen" value="{{$instrumen->nama_instrumen}}" {{$readonly}} {{$disabled}} required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
                </div>
                 <div class="col-md-6 mb-1">
                    <label class="fw-bold form-label">  Tujuan Instrumen
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tujuan_instrumen" value="{{$instrumen->tujuan_instrumen}}" {{$readonly}} required {{$disabled}}>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Pengguna Instrumen
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="pengguna_instrumen" required {{$disabled}}>
                        <option value="">Sila Pilih</option>
                        <option value="PENTADBIR" @if($instrumen->pengguna_instrumen == 'PENTADBIR') selected @endif>PENTADBIR</option>
                        <option value="GURU INSTITUSI" @if($instrumen->pengguna_instrumen == 'GURU INSTITUSI') selected @endif>GURU INSTITUSI</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Pengisian Oleh
                        <span class="text-danger">*</span>
                    </label>
                    <select  class="form-control select2" name="pengisian_oleh" required {{$disabled}}>
                          <option value="">Sila Pilih</option>
                        <option value="PENGETUA" @if($instrumen->pengisian_oleh == 'PENGETUA') selected @endif>PENGETUA</option>
                        <option value="GURU BESAR INSTITUSI" @if($instrumen->pengisian_oleh == 'GURU BESAR INSTITUSI') selected @endif>GURU BESAR INSTITUSI</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label"> Tempoh Pengisian Oleh
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="">
                        <select class="form-control select2" name="tempoh_pengisian" required {{$disabled}}>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan" @if($instrumen->tempoh_pengisian == 'Bulan') selected @endif>Bulan</option>
                            <option value="Minggu" @if($instrumen->tempoh_pengisian == 'Minggu') selected @endif>Minggu</option>
                        </select>
                        </span>
                        <input type="text" class="form-control" name="tempoh_pengisian_lain" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$instrumen->tempoh_pengisian_lain}}" {{$disabled}}>
                    </div>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Pengesahan Oleh
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="pengesahan_ole" required {{$disabled}}>
                          <option value="">Sila Pilih</option>
                        <option value="PPD"  @if($instrumen->pengesahan_ole == 'PPD') selected @endif>PPD </option>
                        <option value="JPN"  @if($instrumen->pengesahan_ole == 'JPN') selected @endif>JPN</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label"> Tempoh Pengeshan Oleh
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="">
                        <select class="form-control select2" name="tempoh_pengeshan" required {{$disabled}}>
                            <option value="">Sila Pilih</option>
                             <option value="Bulan" @if($instrumen->tempoh_pengeshan == 'Bulan') selected @endif>Bulan</option>
                            <option value="Minggu" @if($instrumen->tempoh_pengeshan == 'Minggu') selected @endif>Minggu</option>
                        </select>
                        </span>
                        <input type="text" class="form-control" name="tempoh_pengeshan_lain" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'  value="{{$instrumen->tempoh_pengeshan_lain}}" {{$disabled}}>
                    </div>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Verifikasi Oleh
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="verifikasi_oleh" required {{$disabled}}>
                      <option value="">Sila Pilih</option>
                        <option value="JPN" @if($instrumen->verifikasi_oleh == 'JPN') selected @endif>JPN</option>
                        <option value="KPM" @if($instrumen->verifikasi_oleh == 'KPM') selected @endif>KPM</option>
                    </select>
                </div>

                 <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label"> Tempoh Verifikasi Oleh
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="">
                        <select class="form-control select2" name="tempoh_verifikasi" required {{$disabled}}>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan" @if($instrumen->tempoh_verifikasi == 'Bulan') selected @endif>Bulan</option>
                            <option value="Minggu" @if($instrumen->tempoh_verifikasi == 'Minggu') selected @endif>Minggu</option>
                        </select>
                        </span>
                        <input type="text" class="form-control" name="tempoh_verifikasi_lain" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$instrumen->tempoh_verifikasi_lain}}" {{$disabled}}>
                    </div>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Validasi Oleh
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="validasi_oleh" required {{$disabled}}>
                        <option value="">Sila Pilih</option>
                        <option value="PPD" @if($instrumen->validasi_oleh == 'PPD') selected @endif>PPD</option>
                        <option value="JPN" @if($instrumen->validasi_oleh == 'JPN') selected @endif>JPN</option>
                        <option value="KPM" @if($instrumen->validasi_oleh == 'KPM') selected @endif>KPM</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label"> Tempoh Validasi Oleh
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="">
                        <select class="form-control select2" name="tempoh_validasi" required {{$disabled}}>
                            <option value="">Sila Pilih</option>
                            <option value="Bulan" @if($instrumen->tempoh_validasi == 'Bulan') selected @endif>Bulan</option>
                            <option value="Minggu" @if($instrumen->tempoh_validasi == 'Minggu') selected @endif>Minggu</option>
                        </select>
                        </span>
                    <input type="text" class="form-control" name="tempoh_validasi_lain" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$instrumen->tempoh_validasi_lain}}" {{$disabled}}>
                    </div>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Perakuan Oleh
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="perakuan_oleh" {{$disabled}} required>
                          <option value="">Sila Pilih</option>
                        <option value="PENTADBIR" @if($instrumen->perakuan_oleh == 'PENTADBIR') selected @endif>PENTADBIR</option>
                        <option value="GURU INSTITUSI" @if($instrumen->perakuan_oleh == 'GURU INSTITUSI') selected @endif>GURU INSTITUSI</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label"> Tempoh Perakuan Oleh
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="">
                            <select class="form-control select2" name="tempoh_perakuan" required {{$disabled}}>
                                <option value="">Sila Pilih</option>
                                <option value="Bulan" @if($instrumen->tempoh_perakuan == 'Bulan') selected @endif>Bulan</option>
                                <option value="Minggu" @if($instrumen->tempoh_perakuan == 'Minggu') selected @endif>Minggu</option>
                            </select>
                        </span>
                    <input type="text" class="form-control" name="tempoh_perakuan_lain" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' {{$disabled}} value="{{$instrumen->tempoh_perakuan_lain}}">
                    </div>
                </div>

              

                 <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Instrumen perlu diisi
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="instrumen_perlu_diisi" value="{{$instrumen->instrumen_perlu_diisi}}" {{$readonly}} {{$disabled}} required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>

                 <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Kuatkuasa
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa" value="{{$instrumen->tarikh_kuatkuasa}}" {{$readonly}} {{$disabled}} required>
                </div>
                  <!-- // add status -->
              <!--   <div class="col-md-3">
                    <label class="fw-bold form-label"> Status
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <select class="form-control select2" name="status" required>
                            <option value="">Sila Pilih</option>
                            <option value="1" @if($instrumen?->status == '1') selected @endif>Active
                            </option>
                            <option value="2" @if($instrumen?->status == '2') selected @endif>InActive
                            </option>
                        </select>
                    </div>
                </div> -->

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">
                    </label>
                    <input type="checkbox" class="form-check-input" name="tetapan_keperluan_pengemaskinian_data_terkini" required value="1" @if(isset($instrumen->tetapan_keperluan_pengemaskinian_data_terkini)) checked @endif {{$disabled}}>
                    Tetapan Keperluan Pengemaskinian Data Terkini
                        <span class="text-danger">*</span>
                </div>
                   <!-- // add status -->
                   <div class="row">
                        <div class="col-md-3">
                            <label class="fw-bold form-label"> Status
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <select class="form-control select2" name="status" required {{$disabled}}>
                                    <option value="">Sila Pilih</option>
                                    <option value="1" @if($instrumen?->status == '1') selected @endif>Active
                                    </option>
                                    <option value="2" @if($instrumen?->status == '2') selected @endif>InActive
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                @if($readonly != 'readonly')
                <div class="d-flex justify-content-end align-items-center my-1">
                    <button type="submit" class="btn btn-primary float-right">Hantar</button>
                 </div>
                 @endif
            </div>
        </form>
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
            var element = $("input[name='"+name+"']");
            if (typeof element.attr('name') != 'undefined' && typeof element.attr('required') != 'undefined') {
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
        var url = "{{ route('admin.instrumen.instrumenikeps-submit') }}"
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
                        var location = "{{route('admin.instrumen.instrumenikeps-list')}}"
                    } else if(type == 'SEDIA') {
                        var location = "{{route('admin.instrumen.senarai-sedia-ada')}}"
                    } else if(type == 'SKIPS') {
                        var location = "{{route('admin.instrumen.senarai-skips')}}"
                    } else if(type == 'SKPAK') {
                        var location = "{{route('admin.instrumen.senarai-skpak')}}"
                    }
                    window.location.href = location;
               }
            }
        });

    });
</script>