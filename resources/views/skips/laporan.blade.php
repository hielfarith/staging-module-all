@extends('layouts.app')

@section('header')
Instrumen
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Instrumen </a>
</li>

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Instrumen </h4>

        {{-- <div class="d-flex justify-content-end align-items-center">
            <a href="{{ asset('template/BORANG DEMOGRAFI SKIPS.pdf') }}" class="btn btn-primary float-right" download>
                <i class="fa-solid fa-file"></i> Muat Turun Dokumen
            </a>
        </div> --}}
    </div>

    <hr>

    <div class="card-body">
        <hr>
        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiInstrumenSkips">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Kod Sekolah</th>
                        <th>Nama Institusi</th>
                        <th>Jenis Institusi</th>
                        <th>Nama Pengetua</th>
                        <th>PPD</th>
                        <th>Negeri</th>
                        <th>Status</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-instrumen-diisi" tabindex="-1" aria-labelledby="modal-instrumen-diisi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Instrumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modal-body-instrumen">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {

$('#modal-instrumen-diisi').on('shown.bs.modal', function () {
    $('.select2').select2({
    });
    flatpickr(".flatpickr", {
        dateFormat: "d/m/Y"
    });

});

    $(function() {
        var table = $('#TableSenaraiInstrumenSkips').DataTable({
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
                    data: "kod_sekolah",
                    name: "kod_sekolah",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "nama_institusi",
                    name: "nama_institusi",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "jenis_institusi",
                    name: "jenis_institusi",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "nama_pengetua",
                    name: "nama_pengetua",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "ppd",
                    name: "ppd",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "negeri",
                    name: "negeri",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "status",
                    name: "status",
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

function downloadDemografi(id){
    var url = "{{ route('skips.download-demografi',['institusi_id'=> ':id']) }}";
    var url = url.replace(':id', id);
    window.location.href = url;
}

</script>
@endsection
