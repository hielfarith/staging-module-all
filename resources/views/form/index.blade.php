<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Form</title>
    <style>
    	.main-container {
			display: flex;
			align-items: center;
			gap: 8px;
			margin-bottom: 10px;
    	},
    	.error-message {
		  color: red;
		  font-size: 12px;
		  display: none;
		}

    </style>
  </head>
  <body>
  	<!-- Just an image -->
		      <br>
    <br>

			  <div class="container">
        <nav class="navbar navbar-dark bg-primary">
		  <div class="container-fluid">
          	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		    <div class="navbar-header">
		      <a class="navbar-brand" href="{{route('create-form')}}">Create Form</a>
		    </div>
		    <div class="navbar-header">
		      <a class="navbar-brand" href="{{route('fillform')}}">Fill Form</a>
		    </div>
		    <div class="navbar-header">
		      <a class="navbar-brand" href="{{route('listfillform')}}">List Form</a>
		    </div>
		</div>
        </nav>
    </div>
	      <br>
    <br>
    
    <div class="container" style="gap: 10px">
		 
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
				Add New Field
		</button>
		<br>
		<br>
		<div class="card" style="width: 50%;" >
			<form id="dynamicform">
		  		<div class="card-body" id="row1">
					<div class="form-group main-container" >
					    <label for="form_name">Form Name : </label>
					    <div class="col-md-8">
							<input type="text" name="form_name" id="form_name" class="form-control" required onkeyup="checkname('form')">
							<div class="error-message" id="formname-error"></div>
					    </div>
					</div>
					<div class="form-group main-container" >
					<label for="category_name">Category : </label>
					    <div class="col-md-8">
							<input type="text" name="category_name" id="category_name" class="form-control" required onkeyup="checkname('category')">
							<div class="error-message" id="category-error"></div>
					    </div>
					</div>
				</div>

				&nbsp;&nbsp;
				<div>
					<button type="submit" class="btn btn-primary">submit</button>
				</div>
			</form>
		</div>
    </div>
    
    <input type="hidden" name="row_count" id="row_count" value="1">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
 
	<!-- model box -->
			<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Dynamic form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<form id="frm">
			 @csrf
        <label>Choose type : </label>
		<select name="type" id="type" class="form-control" onchange="changeselect()">
            <option value="text">text</option>
            <option value="number">number</option>
            <option value="file">file</option>
            <option value="select">select</option>
            <!-- <option value="radio">radio</option>
            <option value="checkbox">checkbox</option> -->
        </select>
		<label>Label Name:</label>
		<input type="text" id="label_name" name="label_name" class="form-control"/>
		<label>Name:</label>
		<input type="text" id="name" name="name" class="form-control"/>
		<label class="options" style="display: none;">options:</label>
		<textarea name="options" id="options" class="form-control options" style="display: none;" placeholder="add options separated by coma(,)"></textarea>
	   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submitform()">submit</button>
      </div>
</form>
    </div>
  </div>
</div>
     </body>
  <script>
  	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $( document ).ready(function() {
        console.log( "ready!" );
    });
    
    function checkname(type) {
    		var form_name =$('#form_name').val();
    		var name =$('#category_name').val();
    	var url = "{{route('checkname')}}";

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
            		$('#category-error').text('category name already exist.');
  					$('#category-error').show();
                } else {
                	$('#category-error').hide();
                }
            }
        });
    }
    function deletediv(div) {
	    $('#'+div).remove();
    }

	function changeselect() {
		var type = $('#type').val();
		if (type == 'select') {
			$('.options').show();
		} else {
			$('.options').hide();
		}
		// if (type == "radio") {
		// 	$('#sublabel').css("display", "block");
		// } else {
		// 	$('#sublabel').css("display", "none");
		// }
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
		var url = "{{route('input-field')}}"
		 $.ajax({
            url: url, // Route URL
            type: 'POST', // Request type (GET, POST, etc.)
             data: formObject,
            success: function(response) {
                $('#row1').append(response);
                $('#Modal').modal("hide");
            }
        });

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
	    var url = "{{route('saveform')}}"
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

</html>