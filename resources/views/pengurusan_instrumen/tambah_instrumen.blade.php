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
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder"> Instrumen Baru </h4>
            </div>

            <hr>

            <div class="card-body">
                <form id="borang-dinamik">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            <label class="form-label"> Nama Instrumen </label>
                            <input type="text" class="form-control" name="form_name" id="form_name" onkeyup="sahkan_kategori_borang('form')" required>
                            <div class="error-message" id="formname-error"></div>
                        </div>

                        <div class="col-md-12 mb-1">
                            <label class="form-label"> Kategori Instrumen </label>
                            <input type="text" class="form-control" name="category_name" id="category_name" onkeyup="sahkan_kategori_borang('category')" required>
                            <div class="error-message" id="category-error"></div>
                        </div>
                    </div>

                    {{-- Button: Submit Whole Form [generalFormSubmit] (Hidden)--}}
                    {{-- <button class="btn" type="submit" onclick="generalFormSubmit(this);" id="submit-instrument-name" hidden></button> --}}
                    <button type="submit" class="btn btn-primary" id="submit-instrument-name" hidden>submit</button>
                </form>
            </div>

            <div class="card-footer">
                <input type="hidden" name="row_count" id="row_count" value="1">

                <form id="borang-tambah-atribut">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            <label class="form-label"> Nama Label </label>
                            <input type="text" class="form-control" name="label_name" id="label_name">
                        </div>

                        <div class="col-md-12 mb-1">
                            <label class="form-label"> Nama Atribut </label>
                            <input type="text" class="form-control" name="name" id="name">
                            <p class="text-danger">Sila gunakan '_' untuk menggantikan ruangan kosong.</p>
                        </div>

                        <div class="col-md-4 mb-1">
                            <label class="form-label"> Jenis Atribut </label>
                            <select name="type" id="type" class="form-control select2" onchange="handleChangeSelect()">
                                <option value="" hidden>Jenis Atribut</option>
                                <option value="text">Text</option>
                                <option value="number">Nombor</option>
                                <option value="file">Muat Naik Fail</option>
                                <option value="select">Pilihan</option>
                            </select>
                        </div>

                        <div class="col-md-8 mb-1" style="display: none;" id="divTextareaOptions">
                            <label class="form-label"> Jenis Atribut </label>
                            <textarea name="options" id="options" class="form-control"></textarea>
                            <p class="text-danger">Sila gunakan ',' sebagai pemisah antara pilihan.</p>
                        </div>
                    </div>

                    {{-- Button: Submit Attribute Form --}}
                    <div class="d-flex justify-content-end align-items-center my-1">
                        <button type="button" class="btn btn-primary float-right" onclick="tambahAtribut()">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                    <h4 class="fw-bolder me-1"> Nama Instrumen: </h4>
                    <h4 id="dynamic-form-name"></h4>
            </div>

            <hr>

            <div class="card-body">
                <p class="fw-bolder me-1"> Kategori Instrumen: </p>
                <p id="dynamic-form-category"></p>

                <hr class="mt-1 mb-1">

                <p class="fw-bolder">Senarai Atribut</p>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        {{-- <thead style="vertical-align: middle; text-align: center;">
                            <tr>
                                <th>Atribut</th>
                                <th width="5%">Tindakan</th>
                            </tr>
                        </thead> --}}

                        <tbody id="row-borang-dinamik">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Button: Submit Whole Form --}}
<div class="buy-now">
    <a class="btn btn-danger waves-effect waves-float waves-light" onclick="$('#submit-instrument-name').trigger('click');">Simpan</a>
</div>
@endsection

@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    // FUNCTION TO DYNAMICALLY DISPLAY FORM NAME AND CATEGORY NAME WITHOUT SAVING
    document.getElementById("form_name").addEventListener("input", updateDynamicContent);
    document.getElementById("category_name").addEventListener("input", updateDynamicContent);

    function updateDynamicContent() {
        const formNameValue = document.getElementById("form_name").value;
        const categoryValue = document.getElementById("category_name").value;

        const dynamicFormName = document.getElementById("dynamic-form-name");
        const dynamicFormCategory = document.getElementById("dynamic-form-category");

        // Update the content of the target element
        dynamicFormName.innerText = formNameValue;
        dynamicFormCategory.innerText = categoryValue;
    }
    // END OF FUNCTION

    function sahkan_kategori_borang(type) {
    		var form_name =$('#form_name').val();
    		var name =$('#category_name').val();
    	    var url = "{{ route('checkname') }}";

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

    function delete_attribute(div) {
	    $('#'+div).remove();
    }

	function handleChangeSelect() {
		var type = $('#type').val();
		if (type == 'select') {
			$('#divTextareaOptions').show(300);
		} else {
			$('#divTextareaOptions').hide(300);
		}
		// if (type == "radio") {
		// 	$('#sublabel').css("display", "block");
		// } else {
		// 	$('#sublabel').css("display", "none");
		// }
	}

    function tambahAtribut() {
    	const form = document.getElementById("borang-tambah-atribut");
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
		var url = "{{ route('input-field') }}"
		 $.ajax({
            url: url, // Route URL
            type: 'POST', // Request type (GET, POST, etc.)
             data: formObject,
            success: function(response) {
                $('#row-borang-dinamik').append(response);
                // $('#Modal').modal("hide");
            }
        });
    }

   $('#borang-dinamik').submit(function(event) {
    event.preventDefault();
    	const form = document.getElementById("borang-dinamik");
	    const formData = new FormData(form);
	    var formObject = [];
	    let i = 0;

		formData.forEach(function(value, name) {
			var inputElement = $('#'+name);
			var inputType = inputElement.attr('type');
			var name = inputElement.attr('name');
			var labelElement = $('label[for="' + inputElement.attr('id') + '"]');
			var labelName = labelElement.text();

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

			formObject[i] = {
	            label: labelName,
	            name: name,
	            type: inputType,
	            options: options
	        };
			i++;
		});

    	var jsonData = JSON.stringify(formObject);
	    var url = "{{ route('saveform') }}"
		 $.ajax({
            url: url, // Route URL
            type: 'POST', // Request type (GET, POST, etc.)
             data: {
             	form_data : jsonData,
             	form_name: $('#form_name').val(),
             	category_name: $('#category_name').val()
             },
            // contentType: 'application/json',
            success: function(response) {
            	if (response.success) {
            		window.location.reload()
            	} else {
            		$("#error").show("slow").delay(5000).hide("slow");
            	}
            }
        });
    });
</script>
@endsection
