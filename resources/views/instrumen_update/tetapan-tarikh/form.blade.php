@extends('layouts.app')

@section('header')
TETAPAN Tarikh Instrumen
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> TETAPAN Tarikh Instrumen </a>
</li>
<!-- 
<li class="breadcrumb-item">
    <a href="#"> Maklumat Tetapan Tarikh Instrumen </a>
</li> -->
@endsection

@section('content')
<style>
    .delete-button {
        display: none;
    }
</style>

<div class="card">
    {{-- <div class="card-header">
        <h4 class="card-title fw-bold">
            Maklumat Ketua Taska Baru
        </h4>
    </div>

    <hr> --}}

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Penilaian Kendiri</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Verfikasi</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Validasi</a>
    </li>
</ul>
<div class="tab-content pt-5" id="tab-content">
  <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
      @include('instrumen_update.tetapan-tarikh.tab')
  </div>
  <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
      @include('instrumen_update.tetapan-tarikh.tab')
  </div>
  <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
      @include('instrumen_update.tetapan-tarikh.tab')
  </div>
</div>

</div>

@endsection

@section('script')
<script type="text/javascript">

$('#formitem').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formitem'));
        var error = false;

        $('select.select2').each(function() {
            var element = $(this);
            var select2Value = element.select2('data');
            var selectedValues = element.val();
            var fieldName = element.attr('name');
            if (typeof element.attr('disabled') == 'undefined') {

                if (!selectedValues || selectedValues === '') {
                    Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                    return false; // Stop the loop if an error is found
                }
            }
        });


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

        var url = "{{ route('admin.instrumen.tetapan-tarikh-submit') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('admin.instrumen.tetapan-tarikh-list')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
