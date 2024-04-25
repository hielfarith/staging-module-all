@extends('layouts.app')

@section('header')
    Instrumen
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="#"> Sedia Ada </a>
    </li>
@endsection

@section('content')
    <style>
        .legend-item {
            margin-right: 10px;
        }

        .legend-container {
            text-align: right;
            /* Align legend to the right */
            margin-bottom: 10px;
            /* Optional: Add some bottom margin */
        }


        .legend {
            display: inline-block;
            /* background-color: #f0f0f0; */
            padding: 5px 5px;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder"> Senarai Sedia Ada </h4>

            <div class="d-flex justify-content-end align-items-center">
                <a type="button" class="btn btn-primary float-right"
                    href="{{ route('admin.instrumen.form', ['type' => 'sedia-ada']) }}">
                    <i class="fa-solid fa-add"></i> Tambah Sedia Ada
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
                    <label class="fw-bolder">Pengguna Instrumen</label>
                    <input type="text" name="pengguna_instrumen" id="pengguna_instrumen" class="form-control">
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
                <div class="legend-container">
                    <div class="legend">
                        <span class="legend-item"><i class="fa fa-eye text-primary" style="font-size: 16px;"></i> : Lihat
                            Instrumen</span>
                        <span class="legend-item"><i class="fa fa-pencil text-warning" style="font-size: 16px;"></i> :
                            KemasKini Instrumen</span>
                    </div>
                </div>
                <table class=" table header_uppercase table-bordered table-hovered" id="TableSenaraiInstrumen">
                    <thead>
                        <tr class="bg-warning" style="color: white;">
                            <th width="5%">No.</th>
                            <th>Nama Instrumen</th>
                            <th>Tujuan Instrumen</th>
                            <th>Pengguna Instrumen</th>
                            <th>Tarikh Kuatkuasa</th>
                            <th width="5%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('#modal-instrumen-diisi').on('shown.bs.modal', function() {
                $('.select2').select2({});
                flatpickr(".flatpickr", {
                    dateFormat: "d/m/Y"
                });

            });

            $(function() {
                var table = $('#TableSenaraiInstrumen').DataTable({
                    orderCellsTop: true,
                    colReorder: false,
                    pageLength: 10,
                    processing: true,
                    searching: false,
                    serverSide: true, //enable if data is large (more than 50,000)
                    ajax: {
                        url: "{{ fullUrl() }}",
                        cache: false,
                        data: function(d) {
                            d.nama_instrumen = $('#nama_instrumen').val();
                            d.tujuan_instrumen = $('#tujuan_instrumen').val();
                            d.pengguna_instrumen = $('#pengguna_instrumen').val();
                        },
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: "nama_instrumen",
                            name: "nama_instrumen",
                            searchable: true,
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: "tujuan_instrumen",
                            name: "tujuan_instrumen",
                            searchable: true,
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: "pengguna_instrumen",
                            name: "pengguna_instrumen",
                            searchable: true,
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: "tarikh_kuatkuasa",
                            name: "tarikh_kuatkuasa",
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

        function maklumatInstrumen(id) {
            var url = "{{ route('admin.instrumen.instrumenikeps-view', ['id' => ':id', 'type' => 'view']) }}";
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

        function maklumatInstrumenEdit(id) {
            var url = "{{ route('admin.instrumen.instrumenikeps-view', ['id' => ':id', 'type' => 'edit']) }}";
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
            var pengguna_instrumen = $('#pengguna_instrumen').val();

            $('#TableSenaraiInstrumen').DataTable().ajax.reload(null, false, {
                data: {
                    nama_instrumen: $('#nama_instrumen').val(),
                    tujuan_instrumen: $('#tujuan_instrumen').val(),
                    pengguna_instrumen: $('#pengguna_instrumen').val()
                }
            });
        }
    </script>
@endsection
