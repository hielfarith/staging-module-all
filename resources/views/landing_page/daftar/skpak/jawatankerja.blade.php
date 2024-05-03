<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Include CSRF token here -->
    <title>Test</title>
    <!-- Other meta tags, stylesheets, and scripts -->
    </head>
<body>

<form id="savejawatankuasa" action="/postregions"  novalidate="novalidate"type='POST'>
@csrf
    <div class="row">

        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill bg-danger">
                Maklumat Ahli Jawatankuasa
            </span>
        </h5>

        <div class="col-sm-9 col-12 mb-1">
            <label class="form-label fw-bold">Nama Ahli Jawatankuasa/ Pengguna
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <span class="input-group-text">
                    <select class="form-select " name="panggilan" required>
                        <option value="" hidden>Gelaran</option>
                        <option value="Dato'">Dato'</option>
                        <option value="Datin">Datin</option>
                        <option value="Prof.">Prof.</option>
                        <option value="Prof Madya">Prof Madya</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Tuan">Tuan</option>
                        <option value="Puan">Puan</option>
                        <option value="Cik">Cik</option>
                    </select>
                </span>
                <input type="text" class="form-control" name="nama_pengguna" required
                    onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
            </div>
        </div>

        <div class="col-md-3 mb-1">
            <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_kad" required>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">No Tel Pejabat
            </label>
            <input type="text" class="form-control" name="no_tel_pejabat"
                onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=12>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">No Tel Peribadi
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" name="no_tel_peribadi" maxlength="12" required
                onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Emel Peribadi
                <span class="text-danger">*</span>
            </label>
            <input type="email" class="form-control" name="email_peribadi" required>
        </div>

        <div class="col-md-6 mb-1">
            <label class="fw-bold form-label">Jenis
                <span class="text-danger">*</span>
            </label> <br>
            <select class="form-select " name="jawatan" required style="width: 500px;">
                <option value="" hidden>Jenis</option>
                <option value="Jawatan">Jawatan</option>
                <option value="Gred">Gred</option>
            </select>
        </div>

        <div class="col-md-6 mb-1">
            <label class="fw-bold form-label">Agensi/ Kementerian
                <span class="text-danger">*</span>
            </label><br>
            <select class="form-select " name="agensi_kementerian" required style="width: 500px;">
                <option value="" hidden>Jenis</option>
                <option value="Agensi">Agensi</option>
                <option value="Kementerian">Kementerian</option>
            </select>
        </div>

        <hr>
        <h5 class="mb-2 fw-bold">
            <span class="badge rounded-pill bg-danger">
                Maklumat Majikan
            </span>
        </h5>

        <div class="col-md-8 mb-1">
            <label class="fw-bold form-label">Nama Majikan
            </label>
            <input type="text" class="form-control" name="nama_majikan">
        </div>

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Emel Majikan
            </label>
            <input type="email" class="form-control" name="email_majikan">
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
                <span class="   text-danger">*</span>
            </label><br>
            <select class="form-select" name="negeri" id="negeri" required onchange="changenegeri4(this)">
                <option value="" hidden>Negeri</option>
                @foreach ($negeris as $state)
                    <option value="{{ $state->code }}">{{ $state->name }}</option>
                @endforeach
            </select>
        </div>  

        <div class="col-md-4 mb-1">
            <label class="fw-bold form-label">Daerah
                <span class="text-danger">*</span>
            </label><br>
            <select class="form-select input" name="daerah4" id="daerah4" required>
                
                
            </select>
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
        <button type="submit" class="btn btn-primary float-right"onclick="fakeSuccess2('savejawatankuasa', 'jawatankuasasave')">Submit</button>
    </div>

</form>

<script>
$(document).ready(function() {
    // Attach change event listener to the state dropdown (negeri)
    $('#negeri').on('change', function() {
        // Call changenegeri function when the selected state changes
        changenegeri4(this);
    });
});

function changenegeri4(negeri) {
    var negerivalue = negeri.value;
    
    $.ajax({
        url: '/postregions', // Update the URL to your route
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { state_name: negerivalue },
        success: function(data) {
            console.log('Received data:', data);
             // Handle success
             var daerahDropdown = $('#daerah4');
            console.log('Dropdown element:', daerahDropdown);           
            
            $('select[name="daerah4"]').empty(); // Clear existing options
             // Add default option
            
            // Loop through the data fetched from the database and add options to the dropdown
            $.each(data, function(key, value) {
                console.log('Appending option:', value.name, value.kod);
                
                $('select[name="daerah4"]').append('<option value="' + value.kod + '">' + value.name + '</option>');

                

                var optionHTML = '<option value="' + value.kod + '">' + value.name + '</option>';
                console.log('Appending option:', optionHTML);
                daerahDropdown.append(optionHTML);
             });
           
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
}
</script>

</body>
</html>