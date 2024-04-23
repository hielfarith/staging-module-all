<div class="modal fade" id="daftar_ikeps" tabindex="-1" aria-labelledby="daftar_ikeps" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h3 class="card-title-modal">
                    Pendaftaran Akaun Modul I-KePS
                </h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body" style="overflow-y: auto; max-height: 80vh;">
                {{-- <div class="row">
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
                </div> --}}
                @include('landing_page.daftar.ikeps.jurulatih')
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.select2').each(function() {
        $(this).select2({
            dropdownParent: $(this).parent(),
        });
    });

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
