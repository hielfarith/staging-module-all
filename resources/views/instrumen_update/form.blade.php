@extends('layouts.app')

@section('header')
MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN SKPAK, SPKS, IKEPS
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Instrumen </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN SKPAK, SPKS, IKEPS </a>
</li>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
    <ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Instrumen</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Subaspek</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Item</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Dynamic Form</a>
    </li>
</ul>
    <div class="tab-content pt-5" id="tab-content">
        <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
          @include('instrumen_update.tab1')
        </div>
        <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
          @include('instrumen_update.tab2')
        </div>
        <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
          @include('instrumen_update.tab3')
        </div>
        <div class="tab-pane" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
          @include('instrumen_update.tab4')
        </div>
</div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $('#forminstrumenskpak').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('forminstrumenskpak'));
        var error = false;
        $('#forminstrumenskpak').find('select.select2').each(function() {
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
        });


        formData.forEach(function(value, name) {
            var element = $("input[name='"+name+"']");
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
        var url = "{{ route('admin.instrumen.instrumenskpak-submit') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('admin.instrumen.instrumenskpak-list')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>
@endsection
