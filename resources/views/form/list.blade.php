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

    <title>Form List</title>
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
		.delete-button {
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
		      <h4>List Form</h4>
		    </div>
		</div>
        </nav>
    </div>
    	      <br>
    <br>
    
    <div class="container" style="gap: 10px">
		 
		<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Form Name</th>
			      <th scope="col">Category</th>
			      <th scope="col">Status</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($listForms as $key => $forms)
			    	<tr>
			    		<td>{{$key+1}}</td>
			    		<td>{{$forms->form_name}}</td>
			    		<td>{{$forms->category}}</td>
			    		<?php
			    			if ($forms->status == 1) {
			    				$status = 'Draft';
			    			} elseif ($forms->status == 2) {
			    				$status = 'Submitted';
			    				
			    			} elseif ($forms->status == 3) {
			    				$status = 'Verifier';
			    				
			    			} elseif ($forms->status == 4) {
			    				$status = 'Approver';
			    				
			    			} elseif ($forms->status == 5) {
			    				$status = 'Rejected';
			    			} elseif ($forms->status == 6) {
			    				$status = 'Approved';
			    				
			    			}
			    		?>
			    		<td>{{$status}}</td>
			    		<td><a class="btn-btn-primary" onclick="listForm({{$forms->id}})">
					            <i class="fa fa-eye"></i>
					        </a></td>
			    	</tr>
			    @endforeach
			  </tbody>
			</table>
    </div>

    <!-- determining roles and permission who can submit and approve -->

  	<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="ModalLabel">Dynamic form</h5>
		        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      	</div>
		      	<div class="modal-body" id="append">
				
			   	</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
 
 
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
    
    function listForm(id){
    	var url = "{{route('viewform',['id'=> ':id'])}}";
    	var url = url.replace(':id', id);

    	$.ajax({
            url: url, // Route URL
            type: 'POST', // Request type (GET, POST, etc.)
             data: {
                id: id
             }, 
            success: function(response) {
            	$('#Modal').modal("show");
                $('#append').empty();
                $('#append').append(response);   
            }
        });
    }
    function  formverify(status, formid) {
    	var url = "{{route('verify')}}";

    	$.ajax({
            url: url, // Route URL
            type: 'POST', // Request type (GET, POST, etc.)
             data: {
                status: status,
                formid: formid
             }, 
            success: function(response) {
            	if (response.success) {
             		window.location.reload();
               } 
            }
        });
    }
  </script>

</html>