<style>
    #catatan_sekolah thead th {
        vertical-align: middle;
        text-align: center;
    }

    #catatan_sekolah tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #catatan_sekolah table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

    .catatan {
        font-size: 11pt;
    }
</style>

<div class="catatan">
    <p class=" fw-bolder text-uppercase">
        Catatan Sekolah
    </p>
</div>

<?php
    $id = Request::segment(3);
?>
<hr>
<form id="catatan">
<input type="hidden" name="spks_id" value="{{$id}}">

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered mb-5" style="width:100%" id="catatan_sekolah">
        <thead style="font-size: 9pt;width:100%">
            <tr style="font-size: 9pt;width:100%">
                <th style="font-size: 9pt; width:1%">No.</th>
                <th style="font-size: 9pt; width:10%">Aspek</th>
                <th style="font-size: 9pt; width:22%">Maklumat Item</th>
                <th style="font-size: 9pt; width:17%">Isu/Permasalahan</th>
                <th style="font-size: 9pt; width:20%">Catatan Verifikasi (PPD)</th>
                <th style="font-size: 9pt; width:10%">Penentuan Criticality</th>
                <th style="font-size: 9pt; width:20%">Tindakan</th>
            </tr>
        </thead>
        <tbody style="font-size: 10pt;width:100%">
            <tr>
                <td style="font-size: 10pt;width:1%">1</td>
                <td style="font-size: 9pt; width:10%">Aspek 1</td>
                <td style="font-size: 9pt; width:22%">Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki,
                    Berbasikal, Motosikal, Bas sekolah,
                    Dihantar penjaga, Bot/Perahu,Kereta sendiri, Kereta api)</td>
                <td style="font-size: 9pt; width:17%">Tiada laluan perjalanan kaki</td>
                <td style="font-size: 9pt; width:20%">
                    <textarea style="font-size: 9pt" rows="5" class="form-control" name="catatan_aspek1">Ni ambil dari yang dah masukkan dalam table from aspek tu

                    </textarea>
                </td>
                <td style="font-size: 9pt; width:10%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="kritikal"
                                name="kritikal_aspek1" value="1">
                        </div>
                        <label class="form-check-label" for="kritikal">Kritikal</label>
                    </div>

                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="tidakKritikal"
                                name="kritikal_aspek1" value="2">
                        </div>
                        <label class="form-check-label" for="tidakKritikal">Tidak Kritikal</label>
                    </div>

                </td>
                <td style="font-size: 9pt; width:20%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="kaitan"
                                name="tindakan_aspek1" value="1">
                        </div>
                        <label class="form-check-label" for="kaitan">Tidak berkaitan</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="peringkatSekolah"
                                name="tindakan_aspek1" value="2">
                        </div>
                        <label class="form-check-label" for="peringkatSekolah">Selesai peringkat sekolah</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="peringkatPPD"
                                name="tindakan_aspek1" value="3">
                        </div>
                        <label class="form-check-label" for="peringkatPPD">Selesai peringkat PPD</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumSelesai"
                                name="tindakan_aspek1" value="4">
                        </div>
                        <label class="form-check-label" for="belumSelesai">Belum selesai</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumMendapat"
                                name="tindakan_aspek1" value="5">
                        </div>
                        <label class="form-check-label" for="belumMendapat">Belum mendapat laporan sekolah</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="font-size: 10pt;width:1%">2</td>
                <td style="font-size: 9pt; width:10%">Aspek 2</td>
                <td style="font-size: 9pt; width:22%">Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki,
                    Berbasikal, Motosikal, Bas sekolah,
                    Dihantar penjaga, Bot/Perahu,Kereta sendiri, Kereta api)</td>
                <td style="font-size: 9pt; width:17%">Tiada laluan perjalanan kaki</td>
                <td style="font-size: 9pt; width:20%">
                    <textarea style="font-size: 9pt" rows="5" class="form-control" name="catatan_aspek2">Ni ambil dari yang dah masukkan dalam table from aspek tu

                    </textarea>
                </td>
                <td style="font-size: 9pt; width:10%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-1" type="radio" id="Selesa"
                                name="kritikal_aspek2">
                        </div>
                        <label class="form-check-label" for="Selesa">Selesai</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-1" type="radio" id="Tidak Selesa"
                                name="kritikal_aspek2">
                        </div>
                        <label class="form-check-label" for="Tidak Selesa">Tidak Selesai</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="Kefungsian"
                                name="kritikal_aspek2">
                        </div>
                        <label class="form-check-label" for="Kefungsian">Kefungsian</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="Sekuriti"
                                name="kritikal_aspek2">
                        </div>
                        <label class="form-check-label" for="Sekuriti">Sekuriti</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="Keselamatan"
                                name="kritikal_aspek2">
                        </div>
                        <label class="form-check-label" for="Keselamatan">Keselamatan</label>
                    </div>
                </td>
                <td style="font-size: 9pt; width:20%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="kaitan"
                                name="tindakan_aspek2" value="1">
                        </div>
                        <label class="form-check-label" for="kaitan">Tidak berkaitan</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio"
                                id="peringkatSekolah" name="tindakan_aspek2" value="2">
                        </div>
                        <label class="form-check-label" for="peringkatSekolah">Selesai peringkat sekolah</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="peringkatPPD"
                                name="tindakan_aspek2" value="3">
                        </div>
                        <label class="form-check-label" for="peringkatPPD">Selesai peringkat PPD</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumSelesai"
                                name="tindakan_aspek2" value="4">
                        </div>
                        <label class="form-check-label" for="belumSelesai">Belum selesai</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumMendapat"
                                name="tindakan_aspek2" value="5">
                        </div>
                        <label class="form-check-label" for="belumMendapat">Belum mendapat laporan sekolah</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="formsubmitc()">
        Simpan
    </button>
</div>
</form>


<script type="text/javascript">
    function formsubmitc() {
        var formData = new FormData(document.getElementById('catatan'));
        var error = false;

         $('form#catatan').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name="+this.name+"]:checked", '#catatan').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var APIUrl = "{{ env('APP_VERFIKASI_URL') }}" + 'api/spks/save-catatan';
        var id = <?php echo Request::segment(3); ?>

        $.ajax({
            url: APIUrl,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');

               }
            }
        });
    }


</script>

