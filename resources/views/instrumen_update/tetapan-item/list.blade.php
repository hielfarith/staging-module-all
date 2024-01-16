@extends('layouts.app')

@section('header')
TETAPAN ITEM
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> TETAPAN ITEM </a>
</li>
 
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Tetapan Item</h4>

        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('admin.instrumen.form', ['type' => 'tetapan-item', 'model' => $type]) }}">
                <i class="fa-solid fa-add"></i> Tambah Tetapan Item
            </a>
        </div>
    </div>
    <input type="hidden" name="type" value="{{$type}}" id="type">
    <hr>

    <div class="card-body">
   
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Nama Item</label>
                <input type="text" name="nama_item" id="nama_item" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">Status Item</label>
                <input type="text" name="status_item"  id="status_item" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">Belum Set</label>
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
                        <th>Nama Item</th>
                        <th>Status Item</th>
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

<div class="modal fade" id="modal-item-diisi" tabindex="-1" aria-labelledby="modal-item-diisi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Instrumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modal-body-item">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {

$('#modal-item-diisi').on('shown.bs.modal', function () {
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
                    d.nama_item = $('#nama_item').val();
                    d.status_item = $('#status_item').val();
                    d.belum_set = $('#belum_set').val();
                },
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {
                    data: "nama_item",
                    name: "nama_item",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "status_item",
                    name: "status_item",
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

function maklumatItem(id){
    var url = "{{ route('admin.instrumen.tetapan-item-view',['id'=> ':id', 'type' => 'view']) }}";
    var url = url.replace(':id', id);
    var type = $('#type').val();

    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id,
            typedata: type
            },
        success: function(response) {
            $('#modal-item-diisi').modal("show");
            $('#modal-body-item').empty();
            $('#modal-body-item').append(response);
        }
    });
}

function maklumatItemEdit(id) {
    var url = "{{ route('admin.instrumen.tetapan-item-view',['id'=> ':id', 'type' => 'edit']) }}";
    var url = url.replace(':id', id);
    var type = $('#type').val();

    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id,
            typedata: type
            },
        success: function(response) {
            $('#modal-item-diisi').modal("show");
            $('#modal-body-item').empty();
            $('#modal-body-item').append(response);
        }
    });
}

function  search() {
    var nama_item = $('#nama_item').val();
    var status_item = $('#status_item').val();
    var belum_set = $('#belum_set').val();

    $('#TableSenaraiAspek').DataTable().ajax.reload(null, false, {
        data: {
            nama_item : $('#nama_item').val(),
            status_item : $('#status_item').val(),
            belum_set : $('#belum_set').val()
        }
    });
}
</script>
@endsection
