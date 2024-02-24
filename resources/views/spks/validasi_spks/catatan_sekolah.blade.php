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
    .catatan{
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
    <table class="table header_uppercase table-bordered table-hovered" id="catatan_sekolah">
        <thead style="font-size: 9pt">
            <tr>
                <th style="font-size: 9pt" width="5%">No.</th>
                <th style="font-size: 9pt" width="5%">Aspek</th>
                <th style="font-size: 9pt" width="15%">Maklumat Item</th>
                <th style="font-size: 9pt" width="10%">Isu/Permasalahan</th>
                <th style="font-size: 9pt" width="15%">Catatan Verifikasi (PPD)</th>
                <th style="font-size: 9pt" width="10%">Penentuan Criticality</th>
                <th style="font-size: 9pt" width="5%">Tindakan</th>
            </tr>
        </thead>
        <tbody style="font-size: 9pt">
            <tr>
                <td>1</td>
                <td>Aspek 1</td>
                <td>Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki, Berbasikal, Motosikal, Bas sekolah,
                    Dihantar penjaga, Bot/Perahu,Kereta sendiri, Kereta api)</td>
                <td>Tiada laluan perjalanan kaki</td>
                <td>
                    <textarea style="font-size: 9pt" rows="5" class="form-control">Ni ambil dari yang dah masukkan dalam table from aspek tu

                    </textarea>
                </td>
                <td>
                    <div class="d-flex">
                        <div style="margin-right: 10px;">
                            <input required class="form-check-input radio-input-2" type="radio" id="kritikal" name="status1">
                        </div>
                        <label class="form-check-label" for="kritikal">Kritikal</label>
                    </div>

                    <div class="d-flex">
                        <div style="margin-right: 10px;">
                            <input required class="form-check-input radio-input-2" type="radio" id="tidakKritikal" name="status1">
                        </div>
                        <label class="form-check-label" for="tidakKritikal">Tidak Kritikal</label>
                    </div>

                </td>
                <td style="text-align: center;">
                    <div class="btn-group " role="group" aria-label="Action">

                        <div class="d-flex">
                            <div style="margin-right: 10px;">
                                <input required class="form-check-input radio-input-2" type="radio" id="r" name="status3" unchecked>
                            </div>
                            <label class="form-check-label" for="r"></label>
                        </div>

                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Aspek 2</td>
                <td>Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki, Berbasikal, Motosikal, Bas sekolah,
                    Dihantar penjaga, Bot/Perahu,Kereta sendiri, Kereta api)</td>
                <td>Tiada laluan perjalanan kaki</td>
                <td>
                    <textarea style="font-size: 9pt" rows="5" class="form-control">Ni ambil dari yang dah masukkan dalam table from aspek tu

                    </textarea>
                </td>
                <td>
                    <div class="d-flex">
                        <div style="margin-right: 10px;">
                            <input required class="form-check-input radio-input-2" type="radio" id="Selesa" name="status2">
                        </div>
                        <label class="form-check-label" for="Selesa">Selesa</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;">
                            <input required class="form-check-input radio-input-2" type="radio" id="Tidak Selesa" name="status2">
                        </div>
                        <label class="form-check-label" for="Tidak Selesa">Tidak Selesa</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;">
                            <input required class="form-check-input radio-input-2" type="radio" id="Kefungsian" name="status2">
                        </div>
                        <label class="form-check-label" for="Kefungsian">Kefungsian</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;">
                            <input required class="form-check-input radio-input-2" type="radio" id="Sekuriti" name="status2">
                        </div>
                        <label class="form-check-label" for="Sekuriti">Sekuriti</label>
                    </div>
                    <div class="d-flex">
                        <div style="margin-right: 10px;">
                            <input required class="form-check-input radio-input-2" type="radio" id="Keselamatan" name="status2">
                        </div>
                        <label class="form-check-label" for="Keselamatan">Keselamatan</label>
                    </div>
                </td>
                <td style="text-align: center;">
                    <div class="btn-group " role="group" aria-label="Action">

                        <div class="d-flex justify-content-center align-items-center">
                            <input required class="form-check-input radio-input-2" type="radio" unchecked>
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
