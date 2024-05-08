@extends('layouts.app')

@section('header')
    Instrumen
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="#"> Spks </a>
    </li>
@endsection

@section('content')
    <style>
        .legend-container {
            text-align: right;
            /* Align legend to the right */
            margin-bottom: 10px;
            /* Optional: Add some bottom margin */
        }

        .legend {
            display: inline-block;
            /* background-color: #f0f0f0; */
            padding: 5px 10px;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
        }

        .legend-item {
            margin-right: 10px;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder"> Senarai Spks </h4>

            <div class="d-flex justify-content-end align-items-center">
                <a type="button" class="btn btn-primary float-right" href="{{ route('admin.instrumen.tambah-spks') }}">
                    <i class="fa-solid fa-add"></i> Tambah Spks
                </a>
            </div>
        </div>
        <hr>
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <label class="fw-bolder">Nama Instrumen</label>
                    <input type="text" name="nama_instrumen" id="nama_instrumen" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="fw-bolder">Tujuan Instrumen</label>
                    <input type="text" name="tujuan_instrumen" id="tujuan_instrumen" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="fw-bolder">Pengisian Institut</label>
                    <input type="text" name="pengisian_institut" id="pengisian_institut" class="form-control">
                </div>
            </div>

            <div class="d-flex justify-content-end align-items-center mt-1">
                <a class="me-3 text-danger" type="button" id="reset" href="#" onclick="reset()">
                    Setkan Semula
                </a>
                <button type="button" onclick="search()" class="btn btn-success float-right">
                    <i class="fa fa-search me-1"></i> Cari
                </button>
            </div>

            <hr>
            <div class="legend-container">
                <div class="legend">
                    <span class="legend-item"><i class="fa fa-eye text-primary" style="font-size: 16px;"></i> : Lihat
                        Instrumen</span>
                    <span class="legend-item"><i class="fa fa-pencil text-warning" style="font-size: 16px;"></i> : Kemas
                        Kini Instrumen</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiInstrumen">
                    <thead style="color:white; background-color: #ff8e74">
                        <th width="5%">No.</th>
                        <th>Nama Instrumen</th>
                        <th>Tujuan Instrumen</th>
                        <th>Pengisian Institut</th>
                        <th>Tarikh Kuatkuasa</th>
                        <th width="5%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody id="instrumen-table-spks-body">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-instrumen-diisi" tabindex="-1" aria-labelledby="modal-instrumen-diisi"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Instrumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modal-body-instrumen">
                    <div class="card">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $('#modal-instrumen-diisi').on('shown.bs.modal', function() {
                $('.select2').select2({});
                flatpickr(".flatpickr", {
                    dateFormat: "d/m/Y"
                });

            });


            var APIUrl = "{{ env('APP_KONFIGURASI_URL') }}" + "api/spks/konfiguration/senarai";
            // TableSenaraiInstrumenSpks
            $.ajax({
                url: APIUrl,
                method: 'GET',
                success: function(response) {
                    if (response.status == 'success') {
                        var data = response.data;
                        $('#instrumen-table-spks-body').empty();
                        for (var i = 0; i < data.length; i++) {
                            var tableData = "<tr>";
                            var sn = i + 1;
                            tableData = tableData + '<td>' + sn + '</td>';
                            tableData = tableData + '<td>' + data[i].instrumen_name + '</td>';
                            tableData = tableData + '<td>' + data[i].tujuan_instrumen + '</td>';
                            tableData = tableData + '<td>' + data[i].pengisian_institut + '</td>';
                            tableData = tableData + '<td>' + data[i].tarikh_kuatkuasa + '</td>';
                            // tableData = tableData + '<td>' + data[i].status + '</td>';

                            var button = "";
                            button = button +
                                '<div class="btn-group " role="group" aria-label="Action">';
                            button = button + '<a onclick="maklumatSpks(' + data[i].id +
                                ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                            button = button + '<a onclick="maklumatSpksEdit(' + data[i].id +
                                ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-warning"></i></a>';
                            button = button + "</div>";
                            tableData = tableData + '<td>' + button + '</td></tr>';
                            $('#instrumen-table-spks-body').append(tableData);
                        }
                    }
                }
            });


        });


        function maklumatSpks(id) {
            var url = "{{ route('admin.instrumen.configuration-view', ['id' => ':id', 'type' => 'view']) }}";
            var url = url.replace(':id', id);

            $.ajax({
                url: url, // Route URL
                type: 'POST', // Request type (GET, POST, etc.)
                data: {
                    id: id
                },
                success: function(response) {
                    $('#modal-instrumen-diisi').modal("show");
                    $('#modal-body-instrumen').empty();
                    $('#modal-body-instrumen').append(response);
                }
            });
        }

        function maklumatSpksEdit(id) {
            var url = "{{ route('admin.instrumen.configuration-view', ['id' => ':id', 'type' => 'edit']) }}";
            var url = url.replace(':id', id);

            $.ajax({
                url: url, // Route URL
                type: 'POST', // Request type (GET, POST, etc.)
                data: {
                    id: id
                },
                success: function(response) {
                    $('#modal-instrumen-diisi').modal("show");
                    $('#modal-body-instrumen').empty();
                    $('#modal-body-instrumen').append(response);
                }
            });
        }

        function search() {
            var nama_instrumen = $('#nama_instrumen').val();
            var tujuan_instrumen = $('#tujuan_instrumen').val();
            var pengisian_institut = $('#pengisian_institut').val();
            var APIUrl = "{{ env('APP_KONFIGURASI_URL') }}" + "api/spks/konfiguration/search";
            $.ajax({
                url: APIUrl, // Route URL
                type: 'POST', // Request type (GET, POST, etc.)
                data: {
                    nama_instrumen: nama_instrumen,
                    tujuan_instrumen: tujuan_instrumen,
                    pengisian_institut: pengisian_institut
                },
                success: function(response) {
                    if (response.status == 'success') {
                        var data = response.data;
                        $('#instrumen-table-spks-body').empty();
                        for (var i = 0; i < data.length; i++) {
                            var tableData = "<tr>";
                            var sn = i + 1;
                            tableData = tableData + '<td>' + sn + '</td>';
                            tableData = tableData + '<td>' + data[i].instrumen_name + '</td>';
                            tableData = tableData + '<td>' + data[i].tujuan_instrumen + '</td>';
                            tableData = tableData + '<td>' + data[i].pengisian_institut + '</td>';
                            tableData = tableData + '<td>' + data[i].tarikh_kuatkuasa + '</td>';
                            // tableData = tableData + '<td>' + data[i].status + '</td>';

                            var button = "";
                            button = button +
                                '<div class="btn-group " role="group" aria-label="Action">';
                            button = button + '<a onclick="maklumatSpks(' + data[i].id +
                                ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                            button = button + '<a onclick="maklumatSpksEdit(' + data[i].id +
                                ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-warning"></i></a>';
                            button = button + "</div>";
                            tableData = tableData + '<td>' + button + '</td></tr>';
                            $('#instrumen-table-spks-body').append(tableData);
                        }
                    }
                }
            });
        }

        function reset() {
            var location = "{{ route('admin.instrumen.senarai-spks') }}";
            window.location.href = location;
        }
    </script>
@endsection
