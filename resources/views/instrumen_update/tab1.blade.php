<?php
    $instrumenid = Request::segment(4);
    if (!empty($instrumenid)) {
        $instrumenData = \App\Models\InstrumenSkpakSpksIkeps::where('id', $instrumenid)->where('type','IKEPS')->first();
    } else {
        $instrumenData = null;
    }
?>
<form id="forminstrumenskpak" novalidate="novalidate">
    <div class="row">
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN SKPAK, SPKS, IKEPS
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

        <div class="col-md-3 mb-1">
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

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label"> Tempoh Pengisian Oleh
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <select class="form-control select2" name="tempoh_pengisian" required>
                    <option value="">Sila Pilih</option>
                    <option value="Bulan" @if($instrumenData?->tempoh_pengisian == 'Bulan') selected @endif>Bulan
                    </option>
                    <option value="Minggu" @if($instrumenData?->tempoh_pengisian == 'Minggu') selected @endif>Minggu
                    </option>
                </select>
                <input type="text" class="form-control" name="tempoh_pengisian_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="{{$instrumenData?->tempoh_pengisian_lain}}">
            </div>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Pengesahan Oleh :
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="pengesahan_ole" required>
                <option value="">Sila Pilih</option>
                <option value="PPD" @if($instrumenData?->pengesahan_ole == 'PPD') selected @endif>PPD </option>
                <option value="JPN" @if($instrumenData?->pengesahan_ole == 'JPN') selected @endif>JPN</option>
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label"> Tempoh Pengeshan Oleh
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <select class="form-control select2" name="tempoh_pengeshan" required>
                    <option value="">Sila Pilih</option>
                    <option value="Bulan" @if($instrumenData?->tempoh_pengeshan == 'Bulan') selected @endif>Bulan
                    </option>
                    <option value="Minggu" @if($instrumenData?->tempoh_pengeshan == 'Minggu') selected @endif>Minggu
                    </option>
                </select>
                <input type="text" class="form-control" name="tempoh_pengeshan_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="{{$instrumenData?->tempoh_pengeshan_lain}}">
            </div>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Verifikasi Oleh :
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="verifikasi_oleh" required>
                <option value="">Sila Pilih</option>
                <option value="JPN" @if($instrumenData?->verifikasi_oleh == 'JPN') selected @endif>JPN</option>
                <option value="KPM" @if($instrumenData?->verifikasi_oleh == 'KPM') selected @endif>KPM</option>
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label"> Tempoh Verifikasi Oleh
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <select class="form-control select2" name="tempoh_verifikasi" required>
                    <option value="">Sila Pilih</option>
                    <option value="Bulan" @if($instrumenData?->tempoh_verifikasi_lain == 'Bulan') selected @endif>Bulan
                    </option>
                    <option value="Minggu" @if($instrumenData?->tempoh_verifikasi_lain == 'Minggu') selected
                        @endif>Minggu</option>
                </select>
                <input type="text" class="form-control" name="tempoh_verifikasi_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="{{$instrumenData?->tempoh_verifikasi_lain}}">
            </div>
        </div>


        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">Validasi Oleh :
                <span class="text-danger">*</span>
            </label>
            <select class="form-control select2" name="validasi_oleh" required>
                <option value="">Sila Pilih</option>
                <option value="PPD" @if($instrumenData?->validasi_oleh == 'PPD') selected @endif>PPD</option>
                <option value="JPN" @if($instrumenData?->validasi_oleh == 'JPN') selected @endif>JPN</option>
                <option value="KPM" @if($instrumenData?->validasi_oleh == 'KPM') selected @endif>KPM</option>
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label"> Tempoh Validasi Oleh
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <select class="form-control select2" name="tempoh_validasi" required>
                    <option value="">Sila Pilih</option>
                    <option value="Bulan" @if($instrumenData?->tempoh_validasi == 'Bulan') selected @endif>Bulan
                    </option>
                    <option value="Minggu" @if($instrumenData?->tempoh_validasi == 'Minggu') selected @endif>Minggu
                    </option>
                </select>
                <input type="text" class="form-control" name="tempoh_validasi_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="{{$instrumenData?->tempoh_validasi_lain}}">
            </div>
        </div>

        <div class="col-md-3 mb-1">
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

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label"> Tempoh Perakuan Oleh
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <select class="form-control select2" name="tempoh_perakuan" required>
                    <option value="">Sila Pilih</option>
                    <option value="Bulan" @if($instrumenData?->tempoh_perakuan == 'Bulan') selected @endif>Bulan
                    </option>
                    <option value="Minggu" @if($instrumenData?->tempoh_perakuan == 'Minggu') selected @endif>Minggu
                    </option>
                </select>
                <input type="text" class="form-control" name="tempoh_perakuan_lain" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                    value="{{$instrumenData?->tempoh_perakuan_lain}}">
            </div>
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
            <label class="fw-bold form-label">
                <input type="checkbox" class="form-check-input" required
                    name="tetapan_keperluan_pengemaskinian_data_terkini" value="1"
                    @if($instrumenData?->tetapan_keperluan_pengemaskinian_data_terkini) checked @endif>
                Tetapan Keperluan Pengemaskinian Data Terkini
                <span class="text-danger">*</span>
            </label>
        </div>
        <div class="d-flex justify-content-end align-items-center my-1">
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

    $('#forminstrumenskpak').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('forminstrumenskpak'));
        var error = false;

         $('form#forminstrumenskpak').find('select, textarea, input, checkbox').each(function() {
            if(this.required && this.type == 'checkbox' && !this.checked) {
                error = true;
            }
            if (this.required && this.value == '') {
                error = true;
            }
        });

        // $('#forminstrumenskpak').find('select.select2').each(function() {
        //     var element = $(this);
        //     var select2Value = element.select2('data');
        //     var selectedValues = element.val();
        //     var fieldName = element.attr('name');
        //     if (typeof element.attr('disabled') == 'undefined') {

        //         if (!selectedValues || selectedValues === '') {
        //             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
        //             error = true;
        //             return false; // Stop the loop if an error is found
        //         }
        //     }
        // });

        // formData.forEach(function(value, name) {
        //     var element = $("input[name='"+name+"']");
        //     if (typeof element.attr('name') != 'undefined' && typeof element.attr('required') != 'undefined') {
        //         if (element.val() == '') {
        //             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
        //             error = true;
        //             return false;
        //         }
        //     }
        // });

        if (error) {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
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
                    var id = response.data.id;
                    $('#instrumen_id').val(id);
                    var location = "{{route('admin.instrumen.form',[ 'type' => 'instrumen', 'model' => ':id'])}}";
                    var location = location.replace(':id', id);
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
