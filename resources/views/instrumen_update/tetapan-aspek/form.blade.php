@extends('layouts.app')

@section('header')
Tetapan Aspek
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan I-KePS </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Tetapan Aspek </a>
</li>
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

    <div class="card-body">
        <form id="formpaspek" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Tetapan Aspek
                    </span>
                </h5>
                <?php
                    $type = Request::segment(4);
                ?>
                <input type="hidden" name="type" id="type" value="{{$type}}">
                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Nama Aspek
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_aspek" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
                </div>

               @if($type == 'SKPAK')
                    <div class="col-md-3 mb-1">
                        <label class="fw-bold form-label">Tarikh Kuatkuasa Aspek
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa_aspek" required>
                    </div>
                @endif
                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Status Aspek:
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="status_aspek" required>
                        <option value="" hidden>Sila Pilih</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Belum Set
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="belum_set" required >
                        <option value="" hidden>Sila pilih</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Telah Set
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="telah_set" id="telah_set" required>
                            <option value="" hidden>Sila Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                    </select>
                </div>
                 @if($type != 'SUB')
                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Wajaran Skala
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="wajaran_skala" class="form-control" required>
                </div>
                @endif
            <hr>
            <div class="d-flex justify-content-end align-items-center mt-1">
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">

$('#formpaspek').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formpaspek'));
        var error = false;

        $('select.select2').each(function() {
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

        var url = "{{ route('admin.instrumen.tetapan-aspek-submit') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var type = $('#type').val();
                    if (type == 'SKPAK') {
                        var location = "{{route('admin.instrumen.tetapan-aspek-list')}}"
                    } else if (type == 'IKEPS')
                    {
                        var location = "{{route('admin.instrumen.tetapan-aspek-ikeps-list')}}"
                    }
                    else if (type == 'SUB') {
                        var location = "{{route('admin.instrumen.tetapan-aspek-sub-list')}}"
                    }
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
