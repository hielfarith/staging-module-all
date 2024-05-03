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
<!--
            <div class="modal-footer">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-success me-1" onclick="fakeSuccess2()">
                        Simpan
                    </a>
                </div>
            </div> -->
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

   //////////////////////////////////////////////////////////////////////
   


fakeSuccess2 = function(formId, routeName) {
    event.preventDefault();
    var formData = new FormData(document.getElementById(formId));
    var error = false;

    $('#' + formId).find('select.select2').each(function() {
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

    if (error) {
        return false;
    }

    

    var select2 = ['jenis', 'jawatan', 'gred', 'negeri', 'daerah', 'jenis_taska', 'jenisbanugunan'];

    var url;
    // Determine the URL dynamically based on conditions
    switch (routeName) {
        case 'penggunasave':
            url = "{{ route('penggunasave') }}";
            break;
        case 'penilaisave':
            url = "{{ route('penilaisave') }}";
            break;
        case 'agensisave':
            url = "{{ route('agensisave') }}";
            break;
        case 'jawatankuasasave':
            url = "{{ route('jawatankuasasave') }}";
            break;
        case 'jawatankuasatertinggisave':
            url = "{{ route('jawatankuasatertinggisave') }}";
            break;
        default:
            // Handle default case if needed
            break;
    }

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
