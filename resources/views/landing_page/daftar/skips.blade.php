<div class="modal fade" id="daftar_skips" tabindex="-1" aria-labelledby="daftar_skips" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h3 class="card-title-modal">
                    Pendaftaran Akaun Modul SKIPS
                </h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="overflow-y: auto; max-height: 80vh;">
            <!--
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
            -->
            @include('landing_page.daftar.skips.pengetua')
            </div>
<!--
            <div class="modal-footer">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-success me-1" onclick="fakeSuccess()">
                        Simpan
                    </a>
                </div>
            </div>-->
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert2 -->

<script>
    
    fakeSuccess3 = function() {
    event.preventDefault();
    var formData = new FormData(document.getElementById('savepengetua'));
    var error = false;

    $('#savepengetua').find('select.select2').each(function() {
        var element = $(this);
        var select2Value = element.select2('data');
        var selectedValues = element.val();
        var fieldName = element.attr('name');
        if (typeof element.attr('disabled') == 'undefined') {
            if (!selectedValues || selectedValues === '') {
                Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                error = true;
                return false; // Stop the loop if an error is found
            }
        }
    });

    formData.forEach(function(value, name) {
        var element = $("input[name="+name+"]");
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

    var url = "{{ route('pengetuasave') }}";
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.status) {
                Swal.fire('Success', 'Berjaya', 'success');
                if (response.redirectRoute ?? false) {
                    window.location.href = response.redirectRoute;
                }
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle the error here, you can log it to console or show an alert
            Swal.fire('Error', 'Failed to process request', 'error');
        }
    });
};

</script>
