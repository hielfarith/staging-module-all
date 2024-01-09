@extends('layouts.app')

@section('header')
Pengurusan Panel Penilai
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Panel Penilai </a>
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Panel Penilai </h4>

        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('admin.internal.penilaiform') }}">
                <i class="fa-solid fa-add"></i> Tambah Panel Penilai
            </a>
        </div>
    </div>

    <hr>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Nama Panel Penilai/ Pengguna</label>
                <input type="text" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">No. Kad Pengenalan/ Pasport</label>
                <input type="text" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">Email Peribadi</label>
                <input type="text" class="form-control">
            </div>
        </div>

        <div class="d-flex justify-content-end align-items-center mt-1">
            <a class="me-3 text-danger" type="button" id="reset" href="#">
                Setkan Semula
            </a>
            <button type="submit" value="Filter" class="btn btn-success float-right">
                <i class="fa fa-search me-1"></i> Cari
            </button>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiPenilai">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Panel Penilai/ Pengguna</th>
                        <th>No. Kad Pengenalan/ Pasport</th>
                        <th>Emell Peribadi</th>
                        <th>Emel Penyelia</th>
                        <th>Agensi / Kementerian</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-penilia-diisi" tabindex="-1" aria-labelledby="modal-penilia-diisi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Panel Penilai/ Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modal-body-penilia">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
$('#modal-penilia-diisi').on('shown.bs.modal', function () {
    $('.select2').select2({
        maximumSelectionLength: 3
    });
});

    $(function() {
        var table = $('#TableSenaraiPenilai').DataTable({
            orderCellsTop: true,
            colReorder: false,
            pageLength: 10,
            processing: true,
            serverSide: true, //enable if data is large (more than 50,000)
            ajax: {
                url: "{{ fullUrl() }}",
                cache: false,
            },
            columns: [{
                    data: "id",
                    name: "id",
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "nama_pengguna",
                    name: "nama_pengguna",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "no_kad",
                    name: "no_kad",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "email_peribadi",
                    name: "email_peribadi",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "email_penyelia",
                    name: "email_penyelia",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "agensi_kementerian",
                    name: "agensi_kementerian",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ],
        });
    });
});

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
})

function maklumatPenilai(id){
    var url = "{{ route('admin.internal.viewpenilai',['id'=> ':id',  'type' => 'view']) }}";
    var url = url.replace(':id', id);

    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id
            },
        success: function(response) {
            $('#modal-penilia-diisi').modal("show");
            $('#modal-body-penilia').empty();
            $('#modal-body-penilia').append(response);
        }
    });
}

function  maklumatPenilaiEdit(id){
    var url = "{{ route('admin.internal.viewpenilai',['id'=> ':id',  'type' => 'edit']) }}";
    var url = url.replace(':id', id);

    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id
            },
        success: function(response) {
            $('#modal-penilia-diisi').modal("show");
            $('#modal-body-penilia').empty();
            $('#modal-body-penilia').append(response);
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
@endsection
