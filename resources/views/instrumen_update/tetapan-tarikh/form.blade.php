@extends('layouts.app')

@section('header')
Tetapan Tarikh Instrumen
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan I-KePS </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Tetapan Tarikh </a>
</li>
@endsection

@section('content')
<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link text-uppercase active fw-bolder" id="penilaian-kendiri-tab" data-bs-toggle="tab"
            href="#penilaian-kendiri-tab" role="tab" aria-controls="penilaian-kendiri-tab" aria-selected="true">
            Penilaian Kendiri
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link text-uppercase fw-bolder" id="verifikasi-tab" data-bs-toggle="tab" href="#verifikasi-tab"
            role="tab" aria-controls="verifikasi-tab" aria-selected="false">
            Verfikasi
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link text-uppercase fw-bolder" id="validasi-tab" data-bs-toggle="tab" href="#validasi-tab"
            role="tab" aria-controls="validasi-tab" aria-selected="false">
            Validasi
        </a>
    </li>
</ul>

<div class="card">
    <div class="card-body">
        <div class="tab-content" id="tab-content">
            <div class="tab-pane show active" id="penilaian-kendiri-tab" role="tabpanel"
                aria-labelledby="penilaian-kendiri-tab">
                @include('instrumen_update.tetapan-tarikh.tab')
            </div>
            <div class="tab-pane" id="verifikasi-tab" role="tabpanel" aria-labelledby="verifikasi-tab">
                @include('instrumen_update.tetapan-tarikh.tab')
            </div>
            <div class="tab-pane" id="validasi-tab" role="tabpanel" aria-labelledby="validasi-tab">
                @include('instrumen_update.tetapan-tarikh.tab')
            </div>
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
