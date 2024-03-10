@extends('layouts.app')

@section('header')
Skpak
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Skpak </a>
</li>

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Skpak </h4>

       <!--  <div class="d-flex justify-content-end align-items-center">
            <a href="{{ asset('template/BORANG DEMOGRAFI SKIPS.pdf') }}" class="btn btn-primary float-right" download>
                <i class="fa-solid fa-file"></i> Muat Turun Dokumen
            </a>
        </div> -->
    </div>

    <hr>

    <div class="card-body">
        <hr>
        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiInstrumenSpks">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Pengguna</th>
                        <th>Ppengisian Oleh</th>
                        <th>Tempoh Pengisian</th>
                        <th>Tempoh Pengisian Oleh</th>
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
        var table = $('#TableSenaraiInstrumenSpks').DataTable({
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
                    data: "pengguna_instrumen",
                    name: "pengguna_instrumen",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "pengisian_oleh",
                    name: "pengisian_oleh",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "tempoh_pengisian",
                    name: "tempoh_pengisian",
                    searchable: true,
                    render: function(data, type, row) {
                        return $("<div/>").html(data).text();
                    }
                },
                {
                    data: "tempoh_pengisian_lain",
                    name: "tempoh_pengisian_lain",
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

function maklumatSpks(id){
    var url = "{{ route('spks.borang-view',['id'=> ':id', 'type' => 'lihat']) }}";
    var url = url.replace(':id', id);
    window.location.href = url;
}
function maklumatSpksEdit(id){
    var url = "{{ route('spks.borang-view',['id'=> ':id', 'type' => 'kemaskini']) }}";
    var url = url.replace(':id', id);
    window.location.href = url;
}
function maklumatSpksverfikasi(id){
    var url = "{{ route('spks.verfikasi_spks',['id'=> ':id']) }}";
    var url = url.replace(':id', id);
    window.location.href = url;
}

function maklumatSpksValidasi(id){
    var url = "{{ route('spks.validasi_spks',['id'=> ':id']) }}";
    var url = url.replace(':id', id);
    window.location.href = url;
}

</script>
@endsection
