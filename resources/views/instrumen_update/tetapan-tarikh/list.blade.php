@extends('layouts.app')

@section('header')
TETAPAN Tarikh
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> TETAPAN Tarikh </a>
</li>
 
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Tetapan Tarikh</h4>

        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('admin.instrumen.tetapan-tarikh.form') }}">
                <i class="fa-solid fa-add"></i> Tambah Tetapan Tarikh
            </a>
        </div>
    </div>
    <hr>

    <div class="card-body">
   
        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiTarikh">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Tarikh Mula</th>
                        <th>Tarikh Mula Bulan</th>
                        <th>Tarikh Mula Tahun</th>
                        <th>Tarikh Akhir</th>
                        <th>Tarikh Akhir Bulan</th>
                        <th>Tarikh Akhir Tahun</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tarikh-diisi" tabindex="-1" aria-labelledby="modal-tarikh-diisi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Instrumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modal-body-tarikh">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {

$('#modal-tarikh-diisi').on('shown.bs.modal', function () {
    $('.select2').select2({ 
    });
    flatpickr(".flatpickr", {
        dateFormat: "d/m/Y"
    });
    
});

    $(function() {
        var table = $('#TableSenaraiTarikh').DataTable({
            orderCellsTop: true,
            colReorder: false,
            pageLength: 10,
            processing: true,
            searching: false,
            serverSide: true, //enable if data is large (more than 50,000)
            ajax: {
                url: "{{ fullUrl() }}",
                cache: false,
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {
                    data: "tarikh_mula",
                    name: "tarikh_mula",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "tarikh_mula_bulan",
                    name: "tarikh_mula_bulan",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "tarikh_mula_tahun",
                    name: "tarikh_mula_tahun",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "tarikh_akhir",
                    name: "tarikh_akhir",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "tarikh_akhir_bulan",
                    name: "tarikh_akhir_bulan",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "tarikh_akhir_tahun",
                    name: "tarikh_akhir_tahun",
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

function maklumatTarikh(id){
    var url = "{{ route('admin.instrumen.tetapan-tarikh-view',['id'=> ':id', 'type' => 'view']) }}";
    var url = url.replace(':id', id);
   
    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id
            },
        success: function(response) {
            $('#modal-tarikh-diisi').modal("show");
            $('#modal-body-tarikh').empty();
            $('#modal-body-tarikh').append(response);
        }
    });
}

function maklumatTarikhEdit(id) {
    var url = "{{ route('admin.instrumen.tetapan-tarikh-view',['id'=> ':id', 'type' => 'edit']) }}";
    var url = url.replace(':id', id);
   
    $.ajax({
        url: url, // Route URL
        type: 'POST', // Request type (GET, POST, etc.)
            data: {
            id: id
            },
        success: function(response) {
            $('#modal-tarikh-diisi').modal("show");
            $('#modal-body-tarikh').empty();
            $('#modal-body-tarikh').append(response);
        }
    });
}

function  search() {
    var nama_item = $('#nama_item').val();
    var status_item = $('#status_item').val();
    var belum_set = $('#belum_set').val();

    $('#TableSenaraiTarikh').DataTable().ajax.reload(null, false, {
        data: {
            nama_item : $('#nama_item').val(),
            status_item : $('#status_item').val(),
            belum_set : $('#belum_set').val()
        }
    });
}
</script>
@endsection
