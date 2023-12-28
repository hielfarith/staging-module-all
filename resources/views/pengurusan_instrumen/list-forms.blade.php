@extends('layouts.app')

<style type="text/css">
    .delete-button {
        display: none;
    }    
</style>
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
       <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Form ID</th>
            <th scope="col">Form Name</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($forms as $key => $form)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$form->id}}</td>
              <td>{{$form->form_name}}</td>
              <td>{{$form->category}}</td>
              <td><a class="btn-btn-primary" onclick="listForm({{$form->id}})">
                      <i class="fa fa-eye"></i>
                  </a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

   <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Dynamic form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="append">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary" onclick="submitform()">submit</button> -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
   function listForm(id){
        var url = "{{route('view-form-input',['id'=> ':id'])}}";
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
</script>
@endsection