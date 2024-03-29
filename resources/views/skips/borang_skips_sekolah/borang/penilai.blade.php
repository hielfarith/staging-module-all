<?php
$showHantar = true;

    $butiran_institusi_id = $butiran_id;
    $tab1 = App\Models\ItemStandardQualitySkipsSekolah::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $contents = [  'penubuhan_pendaftaran',
        'pengurusan_institusi',
        'pengurusan_kurikulum',
        'pembelajaran',
        'pengurusan_penilaian',
        'pengurusan_pembangunan_guru',
        'pengurusan_kesihatan_murid',
        'displin',
        'piawaian',
        'pencapaian_academik',
        'pencapaian_kokurikulum',
        'kemenjadian_murid',
        'perwatakan_sekolah',
        'kokurikulum',
        'kebersihan',
        'butiran_institusi_id',
        'status'
        ];
        foreach ($contents as $value) {
            if(empty($tab1->$value)) {
                $showHantar = false;
            }
        }
    } else {
        $showHantar = false;
    }

?>
<form id="butiran_penilai" novalidate="novalidate">
    <input type="hidden" name="butiran_institusi_id" value="{{$butiran_id}}">
    <div class="row">
        <h5 class="mb-2 mt-1 fw-bold">
            <span class="badge rounded-pill badge-light-primary">
                Maklumat Penilai Kendiri
            </span>
        </h5>
        <hr>
        <div class="col-md-6 mb-1">
            <label class="form-label fw-bold text-titlecase">Nama Penilai Kendiri
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="nama_penilai_kendiri" id="nama_penilai_kendiri" class="form-control">
        </div>

        <div class="col-md-6 mb-1">
            <label class="form-label fw-bold text-titlecase">No Kad Pengenalan
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="no_kad_pengenalan" id="no_kad_pengenalan" class="form-control">
        </div>


        <div class="col-md-6 mb-1">
            <label class="form-label fw-bold text-titlecase">No. Telefon Bimbit
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="no_telephoe" id="no_telephoe" class="form-control">
        </div>

        <div class="col-md-6 mb-1">
            <label class="form-label fw-bold text-titlecase"> E-mel Penilai
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="email" id="email" class="form-control">
        </div>

        <div class="col-md-6 mb-1">
            <label class="form-label fw-bold text-titlecase"> Jawatan Penilai
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="jawatan_penilai" id="jawatan_penilai" class="form-control">
        </div>

        <div class="col-md-6 mb-1">
            <label class="form-label fw-bold text-titlecase"> Tarikh Penilaian Kendiri
                <span class="text-danger">*</span>
            </label>
            <input type="date" name="tarikh_penilaian_kendiri" id="tarikh_penilaian_kendiri" class="form-control">
        </div>

        <hr>
        @if($showHantar)
        <div class="d-flex justify-content-end align-items-center mt-1">
            <button type="button" class="btn btn-primary float-right" onclick="submitpenilaiForm()">Hantar</button>
        </div>
        @endif
    </div>
</form>


<script>
    function submitpenilaiForm() {
        var formData = new FormData(document.getElementById('butiran_penilai'));
        var error = false;

        $('form#butiran_penilai').find('radio, input, checkbox').each(function() {
             if (this.required && this.value == '') {
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }

        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard-sekolah/butiran_penilai';

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response)
                if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var url = "{{ route('skips.senarai-skips-institusi-sekolah') }}";
                    window.location.href = url;
                } else {
                    Swal.fire('Gagal', 'Fill all fields', 'error');
                }
            }
        });

    };
</script>
