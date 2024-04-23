<div class="modal fade" id="daftar_skpak" tabindex="-1" aria-labelledby="daftar_skpak" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h3 class="card-title-modal">
                    Pendaftaran Akaun Modul SKPAK
                </h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="overflow-y: auto; max-height: 80vh;">
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Pilih Peranan </label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ketua_taska"
                                value="option1">
                            <label class="form-check-label" for="ketua_taska">Ketua Taska</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="penilai"
                                value="option2">
                            <label class="form-check-label" for="penilai">Panel Penilai</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="agensi"
                                value="option3">
                            <label class="form-check-label" for="agensi">Ketua Agensi</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="jawatankerja"
                                value="option4">
                            <label class="form-check-label" for="jawatankerja">Ahli Jawatan Kerja</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                id="jawatantertinggi" value="option5">
                            <label class="form-check-label" for="jawatantertinggi">Ahli Jawatan Tertinggi</label>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="ketuataska" id="ketuataskaDiv" style="display: none;">
                    @include('landing_page.daftar.skpak.ketua_taska')
                </div>
                <div class="panelpenilai" id="panelpenilai" style="display: none;">
                    @include('landing_page.daftar.skpak.penilai')
                </div>
                <div class="ketuaAgensi" id="ketuaAgensi" style="display: none;">
                    @include('landing_page.daftar.skpak.ketua_agensi')
                </div>
                <div class="jawatan2" id="jawatan2" style="display: none;">
                    @include('landing_page.daftar.skpak.jawatankerja')
                </div>
                <div class="tertinggi" id="tertinggi" style="display: none;">
                    @include('landing_page.daftar.skpak.jawatantertinggi')
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
    document.addEventListener('DOMContentLoaded', function() {
        const radioOptions = document.getElementsByName('inlineRadioOptions');

        for (const option of radioOptions) {
            option.addEventListener('change', function() {
                const selectedValue = document.querySelector('input[name="inlineRadioOptions"]:checked')
                    .value;

                // Hide all divs
                document.querySelectorAll('.modal-body > div:not(.row)').forEach(div => {
                    div.style.display = 'none';
                });

                // Show the corresponding div based on the selected radio button
                switch (selectedValue) {
                    case 'option1':
                        document.getElementById('ketuataskaDiv').style.display = 'block';
                        break;
                    case 'option2':
                        document.getElementById('panelpenilai').style.display = 'block';
                        break;
                    case 'option3':
                        document.getElementById('ketuaAgensi').style.display = 'block';
                        break;
                    case 'option4':
                        document.getElementById('jawatan2').style.display = 'block';
                        break;
                    case 'option5':
                        document.getElementById('tertinggi').style.display = 'block';
                        break;
                    default:
                        break;
                }
            });
        }
    });
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

    function checksjenis(jenis) {
        if (jenis.value == 'Swasta') {
            $('#jawatan').val('');
            $('#gred').val('');
            $('#jawatan').attr('disabled', true);
            $('#gred').attr('disabled', true);
            $('#jawatan').prop('required', false);
            $('#gred').prop('required', false);
        } else {
            $('#jawatan').attr('disabled', false);
            $('#gred').attr('disabled', false);
            $('#jawatan').prop('required', true);
            $('#gred').prop('required', true);
        }
    }

    $('#formpengunna').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formpengunna'));
        formData.forEach(function(value, name) {
            var element = $("input[name=" + name + "]");
            if (typeof element.attr('name') != 'undefined') {
                if (element.val() == '') {
                    Swal.fire('Error', 'Please fill required fields', 'error');
                    return false;
                }
            }
        });
        var select2 = ['jenis', 'jawatan', 'gred', 'negeri', 'daerah', 'jenis_taska', 'jenisbanugunan'];

        var url = "{{ route('admin.internal.penggunasave') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{ route('admin.internal.penggunalist') }}"
                    window.location.href = location;
                }
            }
        });

    });
</script>
