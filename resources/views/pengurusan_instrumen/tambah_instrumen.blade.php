@extends('layouts.app')

@section('header')
Pengurusan Instrumen
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Instrumen </a>
</li>
@endsection

@section('content')
<section class="invoice-add-wrapper">
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
                            <input type="text" class="form-control mb-25" name="form_name" id="form_name" placeholder="Nama Instrumen" onkeyup="sahkan_kategori_borang('form')" required>

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
                                    <input type="text" class="form-control invoice-edit-input" name="id_instrumen" id="id_instrumen" value="" required>
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
                    <!-- Instrument Form starts -->
                    <form id="dynamicform">

                    <div class="card-body invoice-padding invoice-product-details" id="row1">
                        <div class="row mt-1">
                            <div class="col-12 px-0">
                                {{-- Tambah Atribut --}}
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal">
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
                <hr>
                <div class="card-body">
                    <a onclick="preview()" class="btn btn-primary w-100 mb-75">Lihat Borang</a>
                    <button type="button" class="btn btn-success w-100" onclick="submitDynamicForm()">Simpan</button>
                </div>
            </div>
        </div>
        <!-- Tindakan Borang Instrumen ends -->
    </div>
    <!-- Modal box for input filling-->
    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="ModalLabel">Dynamic form</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frm">
                @csrf
                <div class="modal-body">
                    <p class="card-text col-title mb-md-50 mb-0">Atribut</p>
                    <div class="row">
                        <div class="col-md-4">
                            {{-- Jenis Atribut --}}
                            <select name="type" id="type" class="form-control" onchange="changeselect()">
                                <option value="" hidden>Jenis Atribut</option>
                                <option value="text">Text</option>
                                <option value="number">Nombor</option>
                                <option value="file">Muat Naik Fail</option>
                                <option value="select">Pilihan</option>
                                <option value="email">Email</option>
                                <option value="segment">Segment</option>
                                <option value="radio">Radio</option>
                                <option value="checkbox">Checkbox</option>
                            </select>
                        </div>

                        <div class="col-md-8">
                            &nbsp;
                        </div>

                        <div class="col-md-6">
                            {{-- Nama Label --}}
                            <input type="text" class="form-control mt-1" name="label_name" id="label_name" placeholder="Nama Label">
                        </div>

                        <div class="col-md-6">
                            {{-- Nama Atribut --}}
                            <input type="text" class="form-control mt-1" name="name" id="name" placeholder="Nama Atribut">
                            <p class="text-danger">Sila gunakan '_' untuk menggantikan ruangan kosong.</p>
                        </div>


                        <div class="col-md-12">
                            {{-- Options for select --}}
                            <textarea name="options" id="options" class="form-control options" style="display: none;" placeholder="option1;option2;option3" required></textarea>
                            <p class="text-danger options" style="display: none;">Add options separated by semicolon(;).</p>
                        </div>

                         <div class="col-md-12">
                            {{-- Options for select --}}
                            <textarea name="options2" id="options2" class="form-control options2" style="display: none;" placeholder="Description" required></textarea>
                        </div>

                        <div class="col-md-8">
                            {{-- placeholder --}}
                            <input type="text" class="form-control mt-1" name="placeholder" id="placeholder" placeholder="Place Holder">
                        </div>

                        <div class="col-md-4">
                            {{-- required --}}
                               <input type="checkbox" class="form-check-input mt-1" id="requiredcheck" value=1 name="required">
                                <label class="form-check-label mt-1" for="requiredcheck">Required</label>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitform()">submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

 <!-- Modal box for preview form-->
    <div class="modal fade" id="ModalPreview" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Lihat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="ModalPreviewContent">
                         
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
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
                $('#type').val('');
                $('#row1').append(response);
                $('#Modal').modal("hide");
            }
        });
    }
    
    function deletediv(div) {
        $('#'+div).remove();
    }

    function changeselect() {
        var type = $('#type').val();
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

    }

    function submitDynamicForm() {
        // if (!$('#form_name').val() || !$('#category_name').val() || !$('#description').val() || !$('#id_instrumen').val() || !$('#tarikh_didaftar').val() || !$('#tarikh_tutup').val()) {
        //     // return false;
        // }
        $('form#dynamicform').find('select, textarea, input').each(function() {
            if(!$(this).prop('required')) { 
                console.log("NR");
             
             } else { 
                var val = $(this).prop('value'); 
                console.log(val) 
                console.log("IR"); 
            } 
        });

        $('form#dynamicform').submit();
    }

    $('#dynamicform').submit(function(event) {
        event.preventDefault();
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
                form_data : jsonData,
                form_name: $('#form_name').val(),
                category_name: $('#category_name').val(),
                description: $('#description').val(),
                tarikh_didaftar: $('#tarikh_didaftar').val(),
                tarikh_tutup: $('#tarikh_tutup').val(),
                id_instrumen: $('#id_instrumen').val(),
                penafian_dan_hakmilik: $('#penafian_dan_hakmilik').val()
             },
            // contentType: 'application/json',
            success: function(response) {
                if (response.success) {
                    var location = "{{route('show_all_forms')}}"
                    window.location.href = location;
                } else {
                    $("#error").show("slow").delay(5000).hide("slow");
                }
            }
        });
    });

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

    function  preview() {
        const form = document.getElementById("dynamicform");
        const formData = new FormData(form);
        var formObject = [];
        let i = 0;
         formData.forEach(function(value, name) {
            var inputElement = $('#'+name);
            console.log(name)
            console.log(inputElement)
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
                form_data : jsonData,
                form_name: $('#form_name').val(),
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

    $(function () {
        var applyChangesBtn = $('.btn-apply-changes'),
            sourceItem = $('.source-item'),
            formName = $('#form_name'),
            categoryName = $('#category_name'),
            type = $('#type'),
            labelName = $('#label_name'),
            name = $('#name'),
            options = $('#options'),
            btnAddNewItem = $('.btn-add-new ');

        if (sourceItem.length) {
            sourceItem.on('submit', function (e) {
                e.preventDefault();
            });
            sourceItem.repeater({
                show: function () {
                    var repeaterRow = $(this);
                    repeaterRow.find('#type').on('change', function () {
                        handleDropdownChange(repeaterRow);
                    });
                    $(this).slideDown();
                    handleDropdownChange(repeaterRow);
                },
                hide: function (e) {
                    $(this).slideUp();
                }
            });
        }

        function handleDropdownChange(row) {
            var typeDropdown = row.find('#type');
            var optionsDiv = row.find('.divTextareaOptions');

            if (typeDropdown.val() === 'select') {
                optionsDiv.show(300);
            } else {
                optionsDiv.hide(300);
            }
        }

        if (btnAddNewItem.length) {
            btnAddNewItem.on('click', function () {
                if (feather) {
                    // featherSVG();
                    feather.replace({ width: 14, height: 14 });
                }
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
        }
    });

</script>
@endsection
