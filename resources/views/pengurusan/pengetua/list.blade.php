@extends('layouts.app')

@section('header')
Pengurusan Pengerusi/ Pengetua/ Guru Besar
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengerusi/ Pengetua/ Guru Besar </a>
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Pengerusi/ Pengetua/ Guru Besar </h4>

        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('admin.internal.pengetuaform') }}">
                <i class="fa-solid fa-add"></i> Tambah Pengerusi/ Pengetua/ Guru Besar
            </a>
        </div>
    </div>

    <hr>

    <div class="card-body">
              <div class="row">
            <div class="col-md-4">
                <label class="fw-bolder">Nama Pengerusi/ Pengetua/ Guru Besar/ Pengguna</label>
                <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="fw-bolder">No. Kad Pengenalan/ Pasport</label>
                <input type="text" name="no_kad"  id="no_kad" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="fw-bolder">Email Peribadi</label>
                <input type="text" name="email_peribadi" id="email_peribadi" class="form-control">
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
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiPengetua">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Pengerusi/ Pengetua/ Guru Besar/ Pengguna</th>
                        <th>No. Kad Pengenalan/ Pasport</th>
                        <th>Email Peribadi</th>
                        <th>Jenis</th>
                        <th>Tarikh Penubuhan</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-pengetua-diisi" tabindex="-1" aria-labelledby="modal-pengetua-diisi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Pengerusi/ Pengetua/ Guru Besar/ Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modal-body-pengetua">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#modal-pengetua-diisi').on('shown.bs.modal', function () {
    $('.select2').select2({
    });

});
    $(function() {
        var table = $('#TableSenaraiPengetua').DataTable({
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
                    d.nama_pengguna = $('#nama_pengguna').val();
                    d.no_kad = $('#no_kad').val();
                    d.email_peribadi = $('#email_peribadi').val();
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
                    data: "email_peribadi",
                    name: "email_peribadi",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "no_tel",
                    name: "no_tel",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "institusi",
                    name: "institusi",
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

function maklumatpengetua(id){
    var url = "{{ route('admin.internal.viewpengetua',['id'=> ':id', 'type' => 'view']) }}";
    var url = url.replace(':id', id);

    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id
            },
        success: function(response) {
            $('#modal-pengetua-diisi').modal("show");
            $('#modal-body-pengetua').empty();
            $('#modal-body-pengetua').append(response);
        }
    });
}

function maklumatpengetuaEdit(id){
    var url = "{{ route('admin.internal.viewpengetua',['id'=> ':id', 'type' => 'edit']) }}";
    var url = url.replace(':id', id);

    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id
            },
        success: function(response) {
            $('#modal-pengetua-diisi').modal("show");
            $('#modal-body-pengetua').empty();
            $('#modal-body-pengetua').append(response);
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

function  search() {
    var nama_pengguna = $('#nama_pengguna').val();
    var no_kad = $('#no_kad').val();
    var email_peribadi = $('#email_peribadi').val();

    $('#TableSenaraiPengetua').DataTable().ajax.reload(null, false, {
        data: {
            nama_pengguna : $('#nama_pengguna').val(),
            no_kad : $('#no_kad').val(),
            email_peribadi : $('#email_peribadi').val()
        }
    });
}


</script>
@endsection
