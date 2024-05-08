@extends('layouts.app')

@section('header')
    Pengurusan Instrumen
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="#"> Pengurusan Instrumen </a>
    </li>
@endsection

@section('content')
    <style>
        .delete-button {
            display: none;
        }

        #TableSenaraiInstrumen thead th {
            vertical-align: middle;
            text-align: center;
        }

        #TableSenaraiInstrumen tbody {
            vertical-align: middle;
        }

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
            <h4 class="card-title fw-bolder">
                Senarai Instrumen
            </h4>
        </div>

        <hr>

        <div class="card-body">
            <div class="legend-container">
                <div class="legend">
                    <span class="legend-item"><i class="fa fa-eye text-primary" style="font-size: 16px;"></i> : Lihat
                        Instrumen</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class=" table header_uppercase table-bordered table-hovered" id="TableSenaraiInstrumen"
                    style="width: 100%">
                    <thead>
                        <tr class="bg-warning" style="color: white;">
                            <th width="5%">ID Instrumen</th>
                            <th>Maklumat Instrumen</th>
                            <th>Kategori</th>
                            <th>Tarikh Akhir Pengisian</th>
                            <th width="5%">Tindakan</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="append">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $(function() {
                var table = $('#TableSenaraiInstrumen').DataTable({
                    orderCellsTop: true,
                    colReorder: false,
                    pageLength: 10,
                    processing: true,
                    serverSide: true, //enable if data is large (more than 50,000)
                    ajax: {
                        url: "{{ fullUrl() }}",
                        cache: false,
                    },
                    columns: [{
                            data: "id",
                            name: "id",
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: "form_name",
                            name: "form_name",
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: "category",
                            name: "category",
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: "tarikh_tutup",
                            name: "tarikh_tutup",
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

        function listForm(id) {
            var url = "{{ route('view-form-input', ['id' => ':id']) }}";
            var url = url.replace(':id', id);

            $.ajax({
                url: url, // Route URL
                type: 'POST', // Request type (GET, POST, etc.)
                data: {
                    id: id
                },
                success: function(response) {
                    $('#Modal').modal("show");
                    $('#append').empty();
                    $('#append').append(response);
                }
            });
        }
    </script>
@endsection
