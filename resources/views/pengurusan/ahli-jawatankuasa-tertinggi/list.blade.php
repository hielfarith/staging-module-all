@extends('layouts.app')

@section('header')
    Pengurusan Ahli Jawatankuasa Tinggi
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="#"> Pengurusan Pengguna </a>
    </li>

    <li class="breadcrumb-item">
        <a href="#"> Pengurusan Ahli Jawatankuasa Tinggi </a>
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
            <h4 class="card-title fw-bolder"> Senarai Ahli Jawatankuasa Tinggi </h4>

            <div class="d-flex justify-content-end align-items-center">
                <a type="button" class="btn btn-primary float-right"
                    href="{{ route('admin.internal.jawatankuasatertinggiform') }}">
                    <i class="fa-solid fa-add"></i> Tambah Ahli Jawatankuasa Tinggi
                </a>
            </div>
        </div>

        <hr>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label class="fw-bolder">Nama Ahli Jawatankuasa/ Pengguna</label>
                    <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="fw-bolder">No. Kad Pengenalan/ Pasport</label>
                    <input type="text" name="no_kad" id="no_kad" class="form-control">
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
                <div class="legend-container">
                    <div class="legend">
                        <span class="legend-item"><i class="fa fa-eye text-primary" style="font-size: 16px;"></i> : Lihat
                            Taska</span>
                        <span class="legend-item"><i class="fa fa-pencil text-warning" style="font-size: 16px;"></i> : Kemas
                            Kini Taska</span>
                    </div>
                </div>
                <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiPengurusan">
                    <thead style="color:white; background-color: #ff8e74">
                        <tr>
                            <th width="5%">No.</th>
                            <th>Penggilan</th>
                            <th>Nama Ahli Jawatankuasa Tinggi</th>
                            <th>No. Kad Pengenalan/ Pasport</th>
                            <th>Emel Peribadi</th>
                            <th>No Tel Pejabat</th>
                            <th width="5%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-tertinggi-diisi" tabindex="-1" aria-labelledby="modal-tertinggi-diisi"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Ahli Jawatankuasa/ Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" id="modal-body-tertinggi">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#modal-tertinggi-diisi').on('shown.bs.modal', function() {
                $('.select2').select2({});

            });
            $(function() {
                var table = $('#TableSenaraiTertinggi').DataTable({
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
                            data: "panggilan",
                            name: "panggilan",
                            searchable: true,
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
                            data: "no_tel_peribadi",
                            name: "no_tel_peribadi",
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

        function maklumatAhli(id) {
            var url = "{{ route('admin.internal.viewjawatankuasatertinggi', ['id' => ':id', 'type' => 'view']) }}";
            var url = url.replace(':id', id);

            $.ajax({
                url: url, // Route URL
                type: 'POST', // Request type (GET, POST, etc.)
                data: {
                    id: id
                },
                success: function(response) {
                    $('#modal-tertinggi-diisi').modal("show");
                    $('#modal-body-tertinggi').empty();
                    $('#modal-body-tertinggi').append(response);
                }
            });
        }

        function maklumatAhliEdit(id) {
            var url = "{{ route('admin.internal.viewjawatankuasatertinggi', ['id' => ':id', 'type' => 'edit']) }}";
            var url = url.replace(':id', id);

            $.ajax({
                url: url, // Route URL
                type: 'POST', // Request type (GET, POST, etc.)
                data: {
                    id: id
                },
                success: function(response) {
                    $('#modal-tertinggi-diisi').modal("show");
                    $('#modal-body-tertinggi').empty();
                    $('#modal-body-tertinggi').append(response);
                }
            });
        }



        function formverify(status, formid) {
            var url = "{{ route('verify') }}";

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

        function search() {
            var nama_pengguna = $('#nama_pengguna').val();
            var no_kad = $('#no_kad').val();
            var email_peribadi = $('#email_peribadi').val();

            $('#TableSenaraiTertinggi').DataTable().ajax.reload(null, false, {
                data: {
                    nama_pengguna: $('#nama_pengguna').val(),
                    no_kad: $('#no_kad').val(),
                    email_peribadi: $('#email_peribadi').val()
                }
            });
        }
    </script>
@endsection
