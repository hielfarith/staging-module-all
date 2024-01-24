<?php
    $instrumenid = Request::segment(4);
    if (!empty($instrumenid)) {
        $instrumenData = \App\Models\InstrumenSkpakSpksIkeps::where('id', $instrumenid)->first();
        $aspek = \App\Models\TetapanAspek::where('instrumen_id', $instrumenid)->first();
    } else {
        $instrumenData = null;
        $aspek = null;
    }

?>
<div class="row invoice-add">
    <div class="col-xl-9 col-md-8 col-12">
        <div class="card invoice-preview-card">
            <!-- Header starts -->
            <div class="card-body invoice-padding pb-0">
                <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                    <div>
                        <div class="logo-wrapper">
                            <img src="{{ asset('images/logo/jata_negara.png') }}" height="24">
                            <h3 class="text-primary invoice-logo">Kementerian Pendidikan Malaysia (KPM)</h3>
                        </div>
                        <!-- form start -->
                        {{-- Nama Instrumen --}}
                        <div class="error-message text-danger" id="formname-error"></div>
                        <input type="text" class="form-control mb-25" name="form_name" id="form_name" placeholder="Nama Instrumen" onkeyup="sahkan_kategori_borang('form')" required value="{{$instrumenData?->nama_instrumen}}" readonly>

                        {{-- Kategori Instrumen --}}
                        <div class="error-message text-danger" id="category-error"></div>
                        <input type="text" class="form-control mb-25" name="category_name" id="category_name" placeholder="Kategori Instrumen" onkeyup="sahkan_kategori_borang('category')" required>

                        {{-- Deskripsi Instrumen --}}
                        <textarea type="text" class="form-control mb-25" name="description" id="description" placeholder="Deskripsi Ringkas Instrumen" required></textarea>
                    </div>
                    <div class="invoice-number-date mt-md-0 mt-2">
                        <div class="d-flex align-items-center justify-content-md-end mb-1">
                            <h4 class="title">ID Instrumen</h4>
                            <div class="input-group input-group-merge invoice-edit-input-group">
                                <div class="input-group-text">
                                    <i data-feather="hash"></i>
                                </div>

                                {{-- ID Instrument --}}
                                <input type="text" class="form-control invoice-edit-input" name="instrumen_id" id="instrumen_id" value="{{$instrumenData?->id}}" required>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <span class="title">Tarikh Didaftar:</span>

                            {{-- Tarikh Instrumen Didaftarkan --}}
                            <input type="text" class="form-control flatpickr" name="tarikh_didaftar" id="tarikh_didaftar" value="{{date('d/m/Y')}}" required>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="title">Tarikh Tutup Pengisian:</span>
                            {{-- Tarikh Tutup Pengisian Instrumen --}}
                            <input type="text" class="form-control flatpickr" name="tarikh_tutup" id="tarikh_tutup" required />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header ends -->

            <hr class="invoice-spacing" />

            <input type="hidden" name="row_count" id="row_count" value="1">
            <input type="hidden" name="instrumen_id" id="instrumen_id" value="{{$instrumenid}}">
                
            <div class="col-md-6 mb-1">
                <label class="fw-bold form-label">Nama Aspek
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="nama_aspek" id="nama_aspek" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8" value="{{$aspek?->nama_aspek}}">
            </div>

            <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Status Aspek:
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control select2" name="status_aspek" id="status_aspek" required>
                    <option value="" hidden>Sila Pilij</option>
                    <option value="Belum Set" @if($aspek?->status_aspek == 'Belum Set') selected @endif>Belum Set</option>
                    <option value="Telah Set" @if($aspek?->status_aspek == 'Telah Set') selected @endif>Telah Set</option>
                </select>
            </div>
            
            <hr class="invoice-spacing" />

            <input type="hidden" name="type" id="type" value="SUB">

                <!-- Instrument Form starts -->
                <form id="dynamicform">
                    <div class="card-body invoice-padding invoice-product-details" id="row1">
                        <div class="row mt-1">
                            <div class="col-12 px-0">
                                {{-- Tambah Atribut --}}
                                <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="offcanvas" data-bs-target="#BorangTambahAtribut" aria-controls="BorangTambahAtribut" onclick="reset()">
                                    <i data-feather="plus" class="me-25"></i>
                                    <span class="align-middle">Tambah Atribut</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Instrument Form ends -->

            <hr class="invoice-spacing mt-0" />

            <!-- Footer starts -->
            <div class="card-body invoice-padding py-0">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-2">
                            <label for="note" class="form-label fw-bold">Penafian dan Hakmilik:</label>
                            <textarea name="penafian_dan_hakmilik" class="form-control" rows="2" id="penafian_dan_hakmilik"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Footer ends -->
            </div>
        </div>
    </div>

    <!-- Tindakan Borang Instrumen starts -->
    <div class="col-xl-3 col-md-4 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="fw-bolder">Status Instrumen: </h4>
                <h4>
                    <span class="badge rounded-pill badge-light-primary me-1">
                        Draf
                    </span>
                </h4>
            </div>
            @if(!empty($instrumenid))
            <hr>
            <div class="card-body">
                <a onclick="preview()" class="btn btn-primary w-100 mb-75">Lihat Borang</a>
                <button type="button" class="btn btn-success w-100" onclick="submitDynamicForm()">Simpan</button>
            </div>
            @endif
        </div>
    </div>
    <!-- Tindakan Borang Instrumen ends -->
</div>

<!-- Modal box for input filling-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="BorangTambahAtribut" aria-labelledby="BorangTambahAtribut" style="width: 30%">
    <div class="offcanvas-header">
        <h5 id="BorangTambahAtribut" class="offcanvas-title fw-bolder">Tambah Atribut</h5>
        <button type="button" class="btn-close text-reset text-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <hr>
        {{-- <form id="frm">
            @csrf --}}
       
        <form action="{{ route('input-field') }}" id="frm" method="post" data-swal="Maklumat Penilai Berjaya Disimpan">
            @csrf

            <div class="row">
                <div class="col-md-12 mb-1">
                    <label class="form-label fw-bolder">Jenis Atribut</label>
                    {{-- Jenis Atribut --}}
                    <select name="typeData" id="typeData" class="form-control select2" onchange="changeselect()">
                        <option value="" hidden>Jenis Atribut</option>
                        <option value="segment">Section</option>
                        <option value="text">Text</option>
                        <option value="number">Nombor</option>
                        <option value="email">Email</option>
                        <option value="date">Tarikh</option>
                        <option value="time">Masa</option>
                        <option value="select">Senarai Pilihan (Dropdown List)</option>
                        <option value="radio">Butang Radio (Radio Button)</option>
                        <option value="checkbox">Butang Pilihan (Checkbox Button)</option>
                        <option value="file">Muat Naik Fail</option>
                    </select>
                </div>

                <div class="col-md-12 mb-1">
                    <label for="form-label fw-bolder">Nama Label</label>
                    <input type="text" class="form-control" name="label_name" id="label_name">
                </div>

                <div class="col-md-12 mb-1">
                    <label for="form-label fw-bolder">Nama Atribut</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <p class="text-danger">Sila gunakan '_' untuk menggantikan ruangan kosong.</p>
                </div>

                <div class="col-md-12 mb-1 options" style="display: none;">
                    <label for="form-label fw-bolder">Senarai Pilihan</label>
                    <textarea name="options" id="options" class="form-control" placeholder="Pilihan 1;Pilihan 2;Pilihan 3" required></textarea>
                    <p class="text-danger">Pilihan dipisahkan menggunakan simbol semicolon(;).</p>
                </div>

                <div class="col-md-12 mb-1 options2" style="display: none;">
                    <label for="form-label fw-bolder">Keterangan</label>
                    <textarea name="options2" id="options2" class="form-control" required></textarea>
                </div>

                <div class="col-md-12 mb-1">
                    <label for="form-label fw-bolder">Placeholder Atribut</label>
                    <input type="text" class="form-control" name="placeholder" id="placeholder">
                </div>

                <div class="col-md-12 mb-1">
                    <label>&nbsp;</label>
                    <input type="checkbox" class="form-check-input" id="requiredcheck" value=1 name="required">
                    <label class="form-check-label" for="requiredcheck">Diperlukan</label>
                </div>
            </div>
        </form>
           
        @if(!empty($instrumenid))
        <hr class="mb-2 mt-2">

        <button type="button" class="btn btn-primary mb-1 d-grid w-100" onclick="submitform();">Simpan</button>
        <button type="button" class="btn btn-outline-danger d-grid w-100" data-bs-dismiss="offcanvas">
            Batal
        </button>
        @endif
    </div>
</div>


<div class="modal fade" id="ModalPreview" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="ModalPreviewContent">
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
   
function sahkan_kategori_borang(type) {
    var form_name = $('#form_name').val();
    var name = $('#category_name').val();
    var url = "{{ route('sahkan_kategori_instrumen') }}";
    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
        data: {
            form_name: form_name,
            name: name,
            type: type
        },
        success: function(response) {
            if(!response.success) {
                $('#category-error').text('Kategori Telah Wujud!');
                $('#category-error').show();
            } else {
                $('#category-error').hide();
            }
        }
    });
}

function reset() {
    $('#typeData').val('');
    $('#label_name').val('');
    $('#name').val('');
}
function  preview() {
    const form = document.getElementById("dynamicform");
    const formData = new FormData(form);
    var formObject = [];
    let i = 0;
     formData.forEach(function(value, name) {
        var inputElement = $('#'+name);
        var inputType = inputElement.attr('type');
        var name = inputElement.attr('name');
        var labelElement = $('label[for="' + inputElement.attr('id') + '"]');
        var labelName = labelElement.text();
        labelName = labelName.replace('*','');
        var required = inputElement.attr('required');
        var placeholder = inputElement.attr('placeholder');

        if (inputType == 'select') {
            var options = [];
            var option = inputElement.find('option');
            option.each(function() {
              var text = $(this).text();
              options.push(text);
            });
        } else {
            var options = [];
        }

        if (inputType == 'hidden') {
            var checktype = inputElement.attr('checktype');
            if (checktype == 'segment') {
                inputType = 'segment';
                labelName = inputElement.attr('label');
                options = inputElement.attr('value');
            } else if(checktype == 'radio') {
                inputType = 'radio';
                labelName = inputElement.attr('label');
                 options = inputElement.attr('value');
            } else if(checktype == 'checkbox') {
                inputType = 'checkbox';
                labelName = inputElement.attr('label');
                options = inputElement.attr('value');
            }
        }

        formObject[i] = {
            label: labelName,
            name: name,
            type: inputType,
            options: options,
            required: required,
            placeholder: placeholder
        };
        i++;
    });

    var jsonData = JSON.stringify(formObject);

    var url = "{{route('preview-form')}}";
     $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
         data: {
            instrumen_id: $('#instrumen_id').val(),
            form_data : jsonData,
            form_name: $('#form_name').val(),
            nama_aspek: $('#nama_aspek').val(),
            status_aspek: $('#status_aspek').val(),
            category_name: $('#category_name').val(),
            description: $('#description').val(),
            tarikh_didaftar: $('#tarikh_didaftar').val(),
            tarikh_tutup: $('#tarikh_tutup').val(),
            id_instrumen: $('#id_instrumen').val(),
            penafian_dan_hakmilik: $('#penafian_dan_hakmilik').val()
         },
        // contentType: 'application/json',
        success: function(response) {
            $('#ModalPreview').modal("show");
            $('#ModalPreviewContent').empty();
            $('#ModalPreviewContent').append(response);
        }
    });
}

function submitform() {
    const form = document.getElementById("frm");
    const formData = new FormData(form);
    const formObject = {};

    formData.forEach(function(value, key) {
        if (formObject[key]) {
            if (!Array.isArray(formObject[key])) {
                formObject[key] = [formObject[key]];
            }
            formObject[key].push(value);
        } else {
            formObject[key] = value;
        }

    });

    var type = $('#select').val();
    var label = $('#label_name').val();
    var name = $('#name').val();
    var options = '';
    var type = $('#select').val();
    if (type == 'select') {
        options = $('textarea#options').val();
    }
    if (type == 'segment') {
        options = $('textarea#options2').val();
    }
    var url = "{{route('input-field')}}"
     $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
         data: formObject,
        success: function(response) {
            $('#typeData').val('');
            $('#row1').append(response);
            Swal.fire({
                icon: 'success',
                title: 'Disimpan!',
                text: 'Atribut berjaya disimpan.',
                showConfirmButton: true,
            });
            $('#BorangTambahAtribut').offcanvas("hide");
        }
    });
}

function deletediv(div) {
    $('#'+div).remove();
}

function changeselect() {
    var type = $('#typeData').val();
    if (type == 'select' || type == 'radio' || type == 'checkbox') {
        $('.options').show();
    } else {
        $('.options').hide();
    }

     if (type == 'segment') {
        $('.options2').show();
    } else {
        $('.options2').hide();
    }
    reset();
}

function submitDynamicForm() {
    
    // $('form#dynamicform').find('select, textarea, input').each(function() {
    //     if(!$(this).prop('required')) {
    //      } else {
    //         var val = $(this).prop('value');
    //     }
    // });

    // $('form#dynamicform').submit();
    const form = document.getElementById("dynamicform");
    const formData = new FormData(form);
    var formObject = [];
    let i = 0;

    formData.forEach(function(value, name) {
        var inputElement = $('#'+name);
        var inputType = inputElement.attr('type');
        var name = inputElement.attr('name');
        var labelElement = $('label[for="' + inputElement.attr('id') + '"]');
        var labelName = labelElement.text();
        labelName = labelName.replace('*','');
        var required = inputElement.attr('required') ? true : false;
        var placeholder = inputElement.attr('placeholder');

        if (inputType == 'select') {
            var options = [];
            var option = inputElement.find('option');
            option.each(function() {
              var text = $(this).text();
              options.push(text);
            });
        } else {
            var options = [];
        }

        if (inputType == 'hidden') {
            var checktype = inputElement.attr('checktype');
            if (checktype == 'segment') {
                inputType = 'segment';
                labelName = inputElement.attr('label');
                options = inputElement.attr('value');
            } else if(checktype == 'radio') {
                inputType = 'radio';
                labelName = inputElement.attr('label');
                 options = inputElement.attr('value');
            } else if(checktype == 'checkbox') {
                inputType = 'checkbox';
                labelName = inputElement.attr('label');
                options = inputElement.attr('value');
            }
        }
        formObject[i] = {
            label: labelName,
            name: name,
            type: inputType,
            options: options,
            required: required,
            placeholder: placeholder
        };
        i++;
    });

    var jsonData = JSON.stringify(formObject);
    var url = "{{route('saveform')}}";
     $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
         data: {
            instrumen_id: $('#instrumen_id').val(),
            nama_aspek: $('#nama_aspek').val(),
            status_aspek: $('#status_aspek').val(),
            form_data : jsonData,
            form_name: $('#form_name').val(),
            category_name: $('#category_name').val(),
            description: $('#description').val(),
            tarikh_didaftar: $('#tarikh_didaftar').val(),
            tarikh_tutup: $('#tarikh_tutup').val(),
            id_instrumen: $('#instrumen_id').val(),
            penafian_dan_hakmilik: $('#penafian_dan_hakmilik').val()
         },
        // contentType: 'application/json',
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Disimpan!',
                    text: 'Borang instrumen berjaya disimpan.',
                    showConfirmButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        var location = "{{ route('show_all_forms') }}";
                        window.location.href = location;
                    }
                });
                // var location = "{{route('show_all_forms')}}"
                // window.location.href = location;
            } else {
                $("#error").show("slow").delay(5000).hide("slow");
            }
        }
    });
}
</script>

@section('script')
<script type="text/javascript">
     // Attach an event listener to the offcanvas when it is about to be shown
    
</script>

@endsection
