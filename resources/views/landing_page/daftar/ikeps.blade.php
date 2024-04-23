<div class="modal fade" id="daftar_ikeps" tabindex="-1" aria-labelledby="daftar_ikeps" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h3 class="card-title-modal">
                    Pendaftaran Akaun Modul I-KePS
                </h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Pilih Peranan </label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="jurulatih"
                                value="option1">
                            <label class="form-check-label" for="jurulatih">Jurulatih</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pemilik"
                                value="option2">
                            <label class="form-check-label" for="pemilik">Pemilik</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="penilai"
                                value="option3">
                            <label class="form-check-label" for="penilai">Penilai</label>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-8 mb-1">
                        <label class="form-label fw-bolder">Nama </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4 mb-1">
                        <label class="form-label fw-bolder">No Kad Pengenalan </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="form-label fw-bolder">No Telefon </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="form-label fw-bolder">Emel </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Alamat </label>
                        <input type="text" class="form-control">
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-success me-1" onclick="fakeSuccess()">
                        Simpan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert2 -->

<script>
    fakeSuccess = function(title, text) {
        Swal.fire({
            title: "Adakah anda pasti?",
            text: "Hantar. Teruskan?",
            icon: 'success',
            confirmButtonText: 'OK',
        }).then((result) => {
            if (result.isConfirmed) {
                $('.modal').modal('hide');
            } else {
                return false;
            }

        });
    }
</script>
