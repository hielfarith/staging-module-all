@extends('layouts/contentLayoutMaster')

@section('header')
    Dashboard SKIPS
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item">
        <a>Dashboard SKIPS</a>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title fw-bolder">Senarai Instrumen</h4>
                </div>

                <hr>

                <div class="card-body">

                    <style>
                        #dashboard_table thead th {
                            vertical-align: middle;
                            text-align: center;
                        }

                        #dashboard_table tbody {
                            vertical-align: middle;
                            text-align: center;
                        }

                        #dashboard_table table {
                            width: 100% !important;
                            /* word-wrap: break-word; */
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
                            padding: 5px 10px;
                            /* border: 1px solid #ccc; */
                            border-radius: 5px;
                        }

                        .legend-item {
                            margin-right: 10px;
                        }
                    </style>

                    <div class="table-responsive mt-2">
                        <div class="legend-container">
                            <div class="legend">
                                <span class="legend-item"><i class="fa fa-eye text-primary" style="font-size: 16px;"></i> :
                                    Lihat Instrumen</span>
                            </div>
                        </div>
                        <table class="table table-bordered table-hovered" id="dashboard_table">
                            <thead style="color:white; background-color: #6da0d3">
                                <tr>
                                    <th width="5%">Bil</th>
                                    <th>Nama Instrumen</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                        </table>
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
                var table = $('#dashboard_table').DataTable({
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
                            data: "nama_instrumen",
                            name: "nama_instrumen",
                            searchable: true,
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                });
            });
        });

        function maklumatDashboard(id) {
            var url = "{{ route('skips.dashboard.instrumen', ['instrumen_id' => ':id']) }}";
            var url = url.replace(':id', id);
            window.location.href = url;
        }
    </script>
@endsection
