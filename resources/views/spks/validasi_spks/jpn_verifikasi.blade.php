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

<div class="table-responsive mb-5">
    <table class="table header_uppercase table-bordered table-hovered" style="width:100%" id="catatan_sekolah">
        <thead style="font-size: 9pt;width:100%">
            <tr style="font-size: 9pt;width:100%">
                <th style="font-size: 9pt; width:1%">No.</th>
                <th style="font-size: 9pt; width:10%">Aspek</th>
                <th style="font-size: 9pt; width:22%">Maklumat Item</th>
                <th style="font-size: 9pt; width:17%">Isu/Permasalahan</th>
                <th style="font-size: 9pt; width:10%">Catatan Verifikasi (PPD)</th>
                <th style="font-size: 9pt; width:10%">Penentuan Criticality</th>
                <th style="font-size: 9pt; width:10%">Tindakan PPD</th>
                <th style="font-size: 9pt; width:10%">Tindakan JPN</th>
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
                <td style="font-size: 9pt; width:10%">

                    Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki,
                    Berbasikal, Motosikal, Bas sekolah,
                    Dihantar penjaga, Bot/Perahu,Kereta sendiri, Kereta api)
                </td>
                <td style="font-size: 9pt; width:10%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="kritikal"
                                name="kritikal_aspek1">
                        </div>
                        <label class="form-check-label" for="kritikal">Kritikal</label>
                    </div>

                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="tidakKritikal"
                                name="kritikal_aspek1">
                        </div>
                        <label class="form-check-label" for="tidakKritikal">Tidak Kritikal</label>
                    </div>

                </td>
                <td style="font-size: 9pt; width:10%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="kaitan"
                                name="tindakan_ppd_aspek1">
                        </div>
                        <label class="form-check-label" for="kaitan">Tidak berkaitan</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="peringkatSekolah"
                                name="tindakan_ppd_aspek1">
                        </div>
                        <label class="form-check-label" for="peringkatSekolah">Selesai peringkat sekolah</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="peringkatPPD"
                                name="tindakan_ppd_aspek1">
                        </div>
                        <label class="form-check-label" for="peringkatPPD">Selesai peringkat PPD</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumSelesai"
                                name="tindakan_ppd_aspek1">
                        </div>
                        <label class="form-check-label" for="belumSelesai">Belum selesai</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumMendapat"
                                name="tindakan_ppd_aspek1">
                        </div>
                        <label class="form-check-label" for="belumMendapat">Belum mendapat laporan sekolah</label>
                    </div>
                </td>
                <td style="font-size: 9pt; width:10%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="peringkatJPN"
                                name="tindakan_jpn_aspek1">
                        </div>
                        <label class="form-check-label" for="peringkatJPN">Selesai peringkat JPN</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumSelesai1"
                                name="tindakan_jpn_aspek1">
                        </div>
                        <label class="form-check-label" for="belumSelesai1">Belum selesai</label>
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
                <td style="font-size: 9pt; width:10%">
                    Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki,
                    Berbasikal, Motosikal, Bas sekolah,
                    Dihantar penjaga, Bot/Perahu,Kereta sendiri, Kereta api)
                </td>
                <td style="font-size: 9pt; width:10%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="kritikal"
                                name="kritikal_aspek2">
                        </div>
                        <label class="form-check-label" for="kritikal">Kritikal</label>
                    </div>

                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="tidakKritikal"
                                name="kritikal_aspek2">
                        </div>
                        <label class="form-check-label" for="tidakKritikal">Tidak Kritikal</label>
                    </div>
                </td>
                <td style="text-align: center; width:10%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="kaitan"
                                name="tindakan_ppd_aspek2">
                        </div>
                        <label class="form-check-label" for="kaitan">Tidak berkaitan</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio"
                                id="peringkatSekolah" name="tindakan_ppd_aspek2">
                        </div>
                        <label class="form-check-label" for="peringkatSekolah">Selesai peringkat sekolah</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="peringkatPPD"
                                name="tindakan_ppd_aspek2">
                        </div>
                        <label class="form-check-label" for="peringkatPPD">Selesai peringkat PPD</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumSelesai"
                                name="tindakan_ppd_aspek2">
                        </div>
                        <label class="form-check-label" for="belumSelesai">Belum selesai</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumMendapat"
                                name="tindakan_ppd_aspek2">
                        </div>
                        <label class="form-check-label" for="belumMendapat">Belum mendapat laporan sekolah</label>
                    </div>
                </td>
                <td style="font-size: 9pt; width:10%">
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="peringkatJPN"
                                name="tindakan_ppd_aspek2">
                        </div>
                        <label class="form-check-label" for="peringkatJPN">Selesai peringkat JPN</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;margin-bottom:10px">
                            <input required class="form-check-input radio-input-2" type="radio" id="belumSelesai1"
                                name="tindakan_ppd_aspek2">
                        </div>
                        <label class="form-check-label" for="belumSelesai1">Belum selesai</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary btn-sm waves-effect waves-float waves-light">Selesai</button>
        <div style="margin-left: 10px;"></div> <!-- Adjust margin as needed -->
        <button type="button" class="btn btn-primary btn-sm waves-effect waves-float waves-light">Tidak
            Selesai</button>
    </div>
</div>

</div>
