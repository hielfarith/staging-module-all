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
            <h4 class="card-title fw-bolder"> Senarai Skpak </h4>

            <!--  <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ asset('template/BORANG DEMOGRAFI SKIPS.pdf') }}" class="btn btn-primary float-right" download>
                                <i class="fa-solid fa-file"></i> Muat Turun Dokumen
                            </a>
                        </div> -->
        </div>

        <hr>

        <div class="card-body">
            <div class="legend-container">
                <div class="legend">
                    <span class="legend-item"><i class="fa fa-eye text-primary" style="font-size: 16px;"></i> : Lihat
                        Taska</span>
                    <span class="legend-item"><i class="fa fa-pencil text-warning" style="font-size: 16px;"></i> : Kemas
                        Kini Taska</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiInstrumenSkpak">
                    <thead style="color:black; background-color: #9ae596;">
                        <tr>
                            <th width="5%">No.</th>
                            <th>Nama Taska</th>
                            <th>Nama Pengguna</th>
                            <th>Tarikh Pengesahan</th>
                            <th>Tarikh Verifikasi Instrumen 1</th>
                            <th>Tarikh Verifikasi Instrumen 2</th>
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

            $('#modal-instrumen-diisi').on('shown.bs.modal', function() {
                $('.select2').select2({});
                flatpickr(".flatpickr", {
                    dateFormat: "d/m/Y"
                });

            });

            $(function() {
                var table = $('#TableSenaraiInstrumenSkpak').DataTable({
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
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },

                        {
                            data: "nama_taska",
                            name: "nama_taska",
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

        function maklumatSkpak(id) {
            var url = "{{ route('skpak.borang-view', ['id' => ':id', 'type' => 'lihat']) }}";
            var url = url.replace(':id', id);
            window.location.href = url;
        }

        function maklumatSkpakEdit(id) {
            var url = "{{ route('skpak.borang-view', ['id' => ':id', 'type' => 'kemaskini']) }}";
            var url = url.replace(':id', id);
            window.location.href = url;
        }

        function maklumatSkpakverfikasi(id) {
            var url = "{{ route('skpak.verfikasi_skpak', ['id' => ':id']) }}";
            var url = url.replace(':id', id);
            window.location.href = url;
        }

        function maklumatSkpakValidasi(id) {
            var url = "{{ route('skpak.validasi_skpak', ['id' => ':id']) }}";
            var url = url.replace(':id', id);
            window.location.href = url;
        }
    </script>
@endsection
