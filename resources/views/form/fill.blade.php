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

    <title>Form!</title>

    <style type="text/css">
        .container2 {
          left: 50%;
          transform: translate(-50%, -50%)
        }
        .delete-button {
            display: none;
        }
        .center {
          display: flex;
          top: 30%;
        }
    </style>
  </head>
  <body>
    <br><br><br>
        <div class="container">
        <nav class="navbar navbar-dark bg-primary">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <!-- <div class="navbar-header">
              <a class="navbar-brand" href="{{route('create-form')}}">Create Form</a>
            </div> -->
            <div class="navbar-header">
              <h4>Fill Form</h4>
              <!-- <a class="navbar-brand" href="{{route('fillform')}}">Fill Form</a> -->
            </div>
            <!-- <div class="navbar-header">
              <a class="navbar-brand" href="{{route('listfillform')}}">List Form</a>
            </div> -->
        </div>
        </nav>
    </div>
    <br>
    <br>
    
    <div class="card container" style="width: 50%;gap: 10px;" id="append">
      <div class="card-body">
        <label>Choose Form :</label>
        <select class="form-control form-group" name="choose_form" id="choose_form" onchange="chooseform()">
            <option>select</option>
            @foreach($form as $data)
            <option value="{{$data['form_name']}}">{{$data['form_name']}}-{{$data['category']}}</option>
            @endforeach
        </select>
        <!-- id="append" -->
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  </body>
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function chooseform() {
        var form_name = $('#choose_form').val();
        var url = "{{route('choose-form')}}";

         $.ajax({
            url: url, // Route URL
            type: 'POST', // Request type (GET, POST, etc.)
             data: {
                form_name: form_name
             }, 
            success: function(response) {
                $('.formdiv').attr("style", "display:block");
                $('#append').empty();
                $('#append').append(response);            
            }
        });      
    }
  </script>
</html>