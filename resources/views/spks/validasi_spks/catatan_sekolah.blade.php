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


<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" style="width:100%" id="catatan_sekolah">
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
                <td style="font-size: 9pt; width:22%">Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki, Berbasikal, Motosikal, Bas sekolah,
                    Dihantar penjaga, Bot/Perahu,Kereta sendiri, Kereta api)</td>
                <td style="font-size: 9pt; width:17%">Tiada laluan perjalanan kaki</td>
                <td style="font-size: 9pt; width:20%">
                    <textarea style="font-size: 9pt" rows="5" class="form-control">Ni ambil dari yang dah masukkan dalam table from aspek tu

                    </textarea>
                </td>
                <td style="font-size: 9pt; width:10%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="kritikal"
                                name="status1" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="kritikal">Kritikal</label>
                    </div>

                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="tidakKritikal"
                                name="status1" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="tidakKritikal">Tidak Kritikal</label>
                    </div>

                </td>
                <td style="font-size: 9pt; width:20%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="kaitan"
                                name="status4" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="kaitan">Tidak berkaitan</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="peringkatSekolah"
                                name="status4" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="peringkatSekolah">Selesai peringkat sekolah</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="peringkatPPD"
                                name="status4" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="peringkatPPD">Selesai peringkat PPD</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumSelesai"
                                name="status4" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="belumSelesai">Belum selesai</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumMendapat"
                                name="status4" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="belumMendapat">Belum mendapat laporan sekolah</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="font-size: 10pt;width:1%">2</td>
                <td style="font-size: 9pt; width:10%">Aspek 2</td>
                <td style="font-size: 9pt; width:22%">Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki, Berbasikal, Motosikal, Bas sekolah,
                    Dihantar penjaga, Bot/Perahu,Kereta sendiri, Kereta api)</td>
                <td style="font-size: 9pt; width:17%">Tiada laluan perjalanan kaki</td>
                <td style="font-size: 9pt; width:20%">
                    <textarea style="font-size: 9pt" rows="5" class="form-control">Ni ambil dari yang dah masukkan dalam table from aspek tu

                    </textarea>
                </td>
                <td style="font-size: 9pt; width:10%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="Selesa"
                                name="status2" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="Selesa">Selesa</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="Tidak Selesa"
                                name="status2" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="Tidak Selesa">Tidak Selesa</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="Kefungsian"
                                name="status2" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="Kefungsian">Kefungsian</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="Sekuriti"
                                name="status2" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="Sekuriti">Sekuriti</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="Keselamatan"
                                name="status2" style="transform: scale(1.2);">
                        </div>
                        <label class="form-check-label" for="Keselamatan">Keselamatan</label>
                    </div>
                </td>
                <td style="text-align: center; width:20%">
                    <div class="btn-group " role="group" aria-label="Action">

                        <div class="d-flex justify-content-center align-items-center">
                            <input required class="form-check-input radio-input-2" type="radio" unchecked style="transform: scale(1.4);">
                        </div>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="">
        Simpan
    </button>
</div>
