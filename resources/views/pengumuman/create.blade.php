@extends('layouts.app')

@section('header')
Tambah Pengumuman
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengumuman </a>
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form id="form-pengumuman" method="POST" action="{{ route('pengumuman.store') }}">
        <div class="row">
            <div class="mb-1 row">
                <div class="col-md-2">
                    <label class="col-form-label" for="tajuk">Tajuk</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="tajuk" required>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-md-2">
                    <label class="col-form-label" for="keterangan">Keterangan</label>
                </div>
                <div class="col-md-10">
                    <textarea class="form-control" name="keterangan" style="height: 100px"></textarea>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-md-2">
                    <label class="col-form-label" for="dokumen">Dokumen</label>
                </div>
                <div class="col-md-10">
                    <input type="file" class="form-control" name="dokumen">
                </div>
            </div>
        </div>
        <hr>
        <div class="row ">
            <div class="d-flex justify-content-end align-items-center my-1">
                <button type="button" class="btn btn-primary" onclick="submitTab('#form-pengumuman')">Simpan</button>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection

@section('script')
<script>
    function submitTab(form){
        var formData = new FormData($(form)[0]);
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: formData,
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                toastr.success(data.title ?? "Berjaya Disimpan");
                
                window.location.href="{{ route('home') }}";
            },
            error: function(data) {
                var data = data.responseJSON;
                var message = data.detail.replace(/\(and \d+ more error(?:s)?\)/, '');
                Swal.fire(data.title, message, 'error');
            }
        });
    }
</script>
@endsection
