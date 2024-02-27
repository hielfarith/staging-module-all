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

<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Tetapan Aspek</h4>

        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('admin.instrumen.form', ['type' => 'tetapan-aspek', 'model' => $type]) }}">
                <i class="fa-solid fa-add"></i> Tambah Tetapan Aspek
            </a>
        </div>
    </div>
    <input type="hidden" name="type" value="{{$type}}" id="type">
    <hr>

    <div class="card-body">

        <div class="row">
            <div class="col-md-4">
                <label class="fw-bolder">Nama Aspek</label>
                <input type="text" name="nama_aspek" id="nama_aspek" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="fw-bolder">Status Aspek</label>
                <input type="text" name="status_aspek"  id="status_aspek" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="fw-bolder">Belum Set</label>
                <input type="text" name="belum_set" id="belum_set" class="form-control flatpickr">
            </div>
        </div>


        <div class="d-flex justify-content-end align-items-center mt-1">
            <a class="me-3 text-danger" type="button" id="reset" href="#">
                Setkan Semula
            </a>
            <button type="button" onclick="search()" class="btn btn-success float-right">
                    <i class="fa fa-search me-1"></i> Cari
            </button>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiAspek">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Aspek</th>
                        <th>Status Aspek</th>
                        <th>Belum Set</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-aspek-diisi" tabindex="-1" aria-labelledby="modal-aspek-diisi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Tetapan Aspek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modal-body-aspek">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {

$('#modal-aspek-diisi').on('shown.bs.modal', function () {
    $('.select2').select2({
    });
    flatpickr(".flatpickr", {
        dateFormat: "d/m/Y"
    });

});

    $(function() {
        var table = $('#TableSenaraiAspek').DataTable({
            orderCellsTop: true,
            colReorder: false,
            pageLength: 10,
            processing: true,
            searching: false,
            serverSide: true, //enable if data is large (more than 50,000)
            ajax: {
                url: "{{ fullUrl() }}",
                cache: false,
                data: function (d) {
                    d.nama_aspek = $('#nama_aspek').val();
                    d.status_aspek = $('#status_aspek').val();
                    d.belum_set = $('#belum_set').val();
                },
            },
            columns: [
                       { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },

                {
                    data: "nama_aspek",
                    name: "nama_aspek",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "status_aspek",
                    name: "status_aspek",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "belum_set",
                    name: "belum_set",
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

function maklumatAspek(id){
    var url = "{{ route('admin.instrumen.tetapan-aspek-view',['id'=> ':id', 'type' => 'view']) }}";
    var url = url.replace(':id', id);
    var type = $('#type').val();

    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id,
            type: type
            },
        success: function(response) {
            $('#modal-aspek-diisi').modal("show");
            $('#modal-body-aspek').empty();
            $('#modal-body-aspek').append(response);
        }
    });
}

function maklumatAspekEdit(id) {
    var url = "{{ route('admin.instrumen.tetapan-aspek-view',['id'=> ':id', 'type' => 'edit']) }}";
    var url = url.replace(':id', id);
    var type = $('#type').val();

    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id,
            type: type
            },
        success: function(response) {
            $('#modal-aspek-diisi').modal("show");
            $('#modal-body-aspek').empty();
            $('#modal-body-aspek').append(response);
        }
    });
}

function  search() {
    var nama_aspek = $('#nama_aspek').val();
    var status_aspek = $('#status_aspek').val();
    var belum_set = $('#belum_set').val();

    $('#TableSenaraiAspek').DataTable().ajax.reload(null, false, {
        data: {
            nama_aspek : $('#nama_aspek').val(),
            status_aspek : $('#status_aspek').val(),
            belum_set : $('#belum_set').val()
        }
    });
}
</script>
@endsection
