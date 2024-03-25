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
    </div>

    <hr>

    <div class="card-body">
        <hr>
        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiInstrumenSkips">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <!-- <th>Kod Sekolah</th> -->
                        <th>Nama Institusi</th>
                        <!-- <th>Jenis Institusi</th> -->
                        <th>Nama Pengurus</th>
                        <!-- <th>PPD</th> -->
                        <th>Nama Pengerusi</th>
                        <th>Negeri</th>
                        <th>Status</th>
                        <th>Dokumen</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="TableSenaraiInstrumenSkips-body">
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

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
})


    var APIUrl = '{{ env('APP_PENGISIAN_URL') }}' + 'api/skips/list-pusat';
    // TableSenaraiInstrumenSpks
    $.ajax({
        url: APIUrl,
        method: 'GET',
        success: function(response) {
            if (response.status == 'success') {
                var data = response.data;
                $('#TableSenaraiInstrumenSkips-body').empty();
                for (var i = 0; i < data.length; i++) {
                    var tableData = "<tr>";
                    var sn = i + 1;
                    tableData = tableData + '<td>' + sn + '</td>';
                    tableData = tableData + '<td>' + data[i].nama_institusi + '</td>';
                    tableData = tableData + '<td>' + data[i].nama_pengurus + '</td>';
                    tableData = tableData + '<td>' + data[i].nama_pengerusi + '</td>';
                    tableData = tableData + '<td>' + data[i].negeri + '</td>';
                    tableData = tableData + '<td>' + data[i].status + '</td>';

                    var button1 = '<a onclick="#" class="btn btn-xs btn-default" title="">Document<i class="fas fa-download text-primary"></i></a>';
                    tableData = tableData + '<td>' + button1 + '</td>';
                    var button = "";
                    button = button +
                        '<div class="btn-group " role="group" aria-label="Action">';
                    button = button + '<a onclick="maklumatSkips(' + data[i].id +
                        ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                    button = button + '<a onclick="maklumatSkipsAction(' + data[i].id +
                        ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';
                    button = button + "</div>";
                    tableData = tableData + '<td>' + button + '</td></tr>';
                    $('#TableSenaraiInstrumenSkips-body').append(tableData);
                }
            }
        }
    });

});


function maklumatSkips(id){
    var url = "{{ route('skips.skips_baru',['id'=> ':id', 'type' => 'laporan']) }}";
    var url = url.replace(':id', id);
    window.location.href = url;
}

function maklumatSkipsAction(id){
    var url = "{{ route('skips.skips_baru',['id'=> ':id', 'type' => 'kemaskini']) }}";
    var url = url.replace(':id', id);
    window.location.href = url;
}

</script>
@endsection
