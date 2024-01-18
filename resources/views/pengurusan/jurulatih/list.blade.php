@extends('layouts.app')

@section('header')
Pengurusan Jurulatih
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Jurulatih </a>
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Jurulatih </h4>

        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('admin.internal.jurulatihform') }}">
                <i class="fa-solid fa-add"></i> Tambah Jurulatih
            </a>
        </div>
    </div>

    <hr>

    <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Nama Ketua Taska/ Pengguna</label>
                    <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">No. Kad Pengenalan/ Pasport</label>
                    <input type="text" name="no_kad"  id="no_kad" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Gred Jawatan</label>
                    <input type="text" name="gred_jawatan" id="gred_jawatan" class="form-control">
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
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiJurulatih">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Jurulatih/ Pengguna</th>
                        <th>No. Kad Pengenalan/ Pasport</th>
                        <th>Gred Jawatan</th>
                        <th>tarikh Mula Bertugas Di Pld</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-jurulatih-diisi" tabindex="-1" aria-labelledby="modal-jurulatih-diisi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Ketua Taska/ Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modal-body-pengguna">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

$(document).ready(function() {
$('#modal-jurulatih-diisi').on('shown.bs.modal', function () {
    $('.select2').select2();
    flatpickr(".flatpickr", {
        dateFormat: "d/m/Y"
    });
});
    $(function() {
        var table = $('#TableSenaraiJurulatih').DataTable({
            orderCellsTop: true,
            colReorder: false,
            pageLength: 10,
            processing: true,
            serverSide: true, //enable if data is large (more than 50,000)
            ajax: {
                url: "{{ fullUrl() }}",
                cache: false,
                data: function (d) {
                    d.nama_pengguna = $('#nama_pengguna').val();
                    d.no_kad = $('#no_kad').val();
                    d.gred_jawatan = $('#gred_jawatan').val();
                },
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
                    data: "gred_jawatan",
                    name: "gred_jawatan",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "tarikh_mula",
                    name: "tarikh_mula",
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

function maklumatJurulatih(id){
    var url = "{{ route('admin.internal.viewjurulatih',['id'=> ':id', 'type' => 'view']) }}";
    var url = url.replace(':id', id);

    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id
            },
        success: function(response) {
            $('#modal-jurulatih-diisi').modal("show");
            $('#modal-body-pengguna').empty();
            $('#modal-body-pengguna').append(response);
        }
    });
}

function maklumatJurulatihEdit(id){
    var url = "{{ route('admin.internal.viewjurulatih',['id'=> ':id', 'type' => 'edit']) }}";
    var url = url.replace(':id', id);

    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id
            },
        success: function(response) {
            $('#modal-jurulatih-diisi').modal("show");
            $('#modal-body-pengguna').empty();
            $('#modal-body-pengguna').append(response);
        }
    });
}


function  search(argument) {
        var nama_pengguna = $('#nama_pengguna').val();
        var no_kad = $('#no_kad').val();
        var gred_jawatan = $('#gred_jawatan').val();

        $('#TableSenaraiJurulatih').DataTable().ajax.reload(null, false, {
            data: {
                nama_pengguna : $('#nama_pengguna').val(),
                no_kad : $('#no_kad').val(),
                gred_jawatan : $('#gred_jawatan').val()
            }
        });
    }
  
</script>
@endsection
