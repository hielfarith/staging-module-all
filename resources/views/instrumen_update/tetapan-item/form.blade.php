@extends('layouts.app')

@section('header')
TETAPAN Item
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> TETAPAN Item </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat Tetapan Item </a>
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
        <form id="formitem" novalidate="novalidate">
            <div class="row">
                <h5 class="mb-2 fw-bold">
                    <span class="badge rounded-pill badge-light-primary">
                        Maklumat Tetapan Item
                    </span>
                </h5>
                <?php
                    $type = Request::segment(4);
                ?>
                <input type="hidden" name="type" id="type" value="{{$type}}">
                <div class="col-md-9 mb-1">
                    <label class="fw-bold form-label">Nama Item
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_item" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Kuatkuasa Item
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control flatpickr" name="tarikh_kuatkuasa_item" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Status Item:
                        <span class="text-danger">*</span>
                    </label>
                    <label>
                        <input type="radio" name="status_item" class="form-check-input" value="1"> 1
                    </label>

                     <label>
                        <input type="radio" name="status_item" class="form-check-input" value="2"> 2
                    </label>
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

                 <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tetapan Skala
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="tetapan_skala" class="form-control" required>
                </div>

                 <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Julat Skala
                        <span class="text-danger">*</span>
                    </label>
                    <label>
                        <input type="radio" name="julat_skala" class="form-check-input" required value="1">1
                    </label>
                     <label>
                        <input type="radio" name="julat_skala" class="form-check-input" required value="2">2
                    </label>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Wajaran Skala
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="wajaran_skala" class="form-control" required>
                </div>

               
                <!-- SPKS  -->
                @if($type == 'SPKS')
                
                <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Tindakan oleh siapa
                    <span class="text-danger">*</span>
                </label>
                    <select class="form-control select2" name="tindakan_oleh_siapa" id="tindakan_oleh_siapa" required>
                        <option value="" hidden>Sila Pilih</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                <label class="fw-bold form-label">Role Aspek
                    <span class="text-danger">*</span>
                </label>
                    <select class="form-control select2" name="role_aspek" id="role_aspek" required>
                        <option value="" hidden>Sila Pilih</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Markah Skala Mandatori Catatan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="markah_skala_mandatori_catatan" class="form-control" required>
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

        var url = "{{ route('admin.instrumen.tetapan-item-submit') }}"
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
                        var location = "{{route('admin.instrumen.tetapan-item-list')}}"
                    } else if (type == 'SPKS')
                    {
                        var location = "{{route('admin.instrumen.tetapan-item-sub-list')}}"
                    } 
                    window.location.href = location;
               }
            }
        });

    });
</script>

@endsection
