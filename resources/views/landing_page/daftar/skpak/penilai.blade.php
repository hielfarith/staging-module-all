<div class="row">
    <form id="simpan-penilai" novalidate="novalidate"type='POST'>
    @csrf
        <div class="row">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill bg-danger">
                    Maklumat Panel Penilai
                </span>
            </h5>

            <div class="col-md-9 mb-1">
                <label class="fw-bold form-label">Nama Panel Penilai/ Pengguna
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="nama_pengguna" required
                    onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">No Kad Pengenalan
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="no_kad" required>
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Emel Peribadi
                    <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control" name="email_peribadi" required>
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Emel Ketua Jabatan
                    <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control" name="email_ketua_jabatan" required>
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Emel Penyelia
                    <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control" name="email_penyelia" required>
            </div>

            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">No Tel Pejabat
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="no_tel_pejabat" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
            </div>

            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">No Tel Peribadi
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="no_tel_peribadi" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Agensi/ Kementerian
                    <span class="text-danger">*</span>
                </label>
                <select class="form-select " name="agensi_kementerian" required>
                    <option value="" hidden>Agensi/ Kementerian</option>
                    <option value="Agensi">Agensi</option>
                    <option value="Kementerian">Kementerian</option>
                </select>
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Gred
                    <span class="text-danger">*</span>
                </label><br>
                <select class="form-select " name="gred" id="gred" required>
                    <option value="" hidden>Gred</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>

            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">3 negeri pilihan bagi menjalankan penilaian SKPAK
                    <span class="text-danger">*</span>
                </label>
                <select class="form-select select2" name="negeri_skpak[]" id="negeri_skpak" multiple
                    style="width: 500px;">
                    <option value="" hidden>Pilih Negeri</option>
                    @foreach ($negeris as $state)
                        <option value="{{ $state->name }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>

            <hr>
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill bg-danger">
                    Maklumat Alamat
                </span>
            </h5>

            <div class="col-md-12 mb-1">
                <label class="fw-bold form-label">Alamat
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="alamat1" placeholder="Alamat 1" required>
            </div>

            <div class="col-md-12 mb-1">
                {{-- <label class="fw-bold form-label">Alamat 2
                    <span class="text-danger">*</span>
                </label> --}}
                <input type="text" class="form-control" name="alamat2" placeholder="Alamat 2" required>
            </div>

            <div class="col-md-12 mb-1">
                {{-- <label class="fw-bold form-label">Alamat 3</label> --}}
                <input type="text" class="form-control" name="alamat3" placeholder="Alamat 3">
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Negeri
                    <span class="text-danger">*</span>
                </label><br>
                <select class="form-select" name="negeri" id="negeri">
                <option value="" hidden>Negeri</option>
                @foreach ($negeris as $state)
                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                @endforeach
            </select>
            <!--
            <select class="form-select" name="negeri" id="negeri" required onchange="changenegeri(this)">
                <option value="" hidden>Negeri</option>
                @foreach ($negeris as $state)
                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                @endforeach
            </select> REQUIRE AMENDMENT-->
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Daerah
                    <span class="text-danger">*</span>
                </label><br>
                <select class="form-select" name="daerah" required id="daerah">
            @foreach ($negeris as $state)
                    <option value="{{ $state->name }}">{{ $state->name }}</option>
            @endforeach
            
            </select><!--REQUIRE AMENDMENT-->
            </div>

            <div class="col-md-4 mb-1">
                <label class="fw-bold form-label">Poskod
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="poskod" maxlength="5" required
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            </div>

        </div>
        
        <hr>
        <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="submit" class="btn btn-primary float-right"onclick="fakeSuccess2('simpan-penilai', 'penilaisave')">Submit</button> 
    </div> 
    </form>
</div>
<!--
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

    fakeSuccess3 = function() {
        
        
        event.preventDefault();
        var formData = new FormData(document.getElementById('simpan-penilai'));
        var error = false;

        $('#simpan-penilai').find('select.select2').each(function() {
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
        })

        
/*
        $('#simpan-pengguna').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('simpan-pengguna'));
        formData.forEach(function(value, name) {
            var element = $("input[name=" + name + "]");
            if (typeof element.attr('name') != 'undefined') {
                if (element.val() == '') {
                    Swal.fire('Error', 'Please fill required fields', 'error');
                    return false;
                }
            }
        })});
        

        
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

     */   
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
    };

    var select2 = ['jenis', 'jawatan', 'gred', 'negeri', 'daerah', 'jenis_taska', 'jenisbanugunan'];

     var url = "{{ route('penilaisave') }}";

/*
$.ajax({
    url: url,
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
        if (response.status) {
            Swal.fire('Success', 'Berjaya', 'success');
            var location = url;
            window.location.href = location;
        }
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
        // Handle the error here, you can log it to console or show an alert
        Swal.fire('Error', 'Failed to process request', 'error');
    }
});

    };
*/
    
$.ajax({
    url: url,
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
        if (response.status) {
            Swal.fire('Success', 'Berjaya', 'success');
            var location = url;
            if (response.redirectRoute ?? false) {
                        window.location.href = response.redirectRoute;
                        return false;
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

-->