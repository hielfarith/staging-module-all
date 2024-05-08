@extends('layouts.app')

@section('header')
    Instrumen
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="#"> Verifikasi </a>
    </li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder"> Senarai Verifikasi </h4>
        </div>

        <hr>

        <div class="card-body">

            <div class="table-responsive">
                <table class=" table header_uppercase table-bordered " id="TableSenaraiVerifikasi">
                    <thead>
                        <tr style="color: white; background-color:#6da0d3;">
                            <th width="5%">No.</th>
                            <th>Kod Sekolah</th>
                            <th>Nama Sekolah</th>
                            <th>Tahun</th>
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

            $(function() {
                var table = $('#TableSenaraiVerifikasi').DataTable({
                    orderCellsTop: true,
                    colReorder: false,
                    pageLength: 10,
                    processing: true,
                    searching: false,
                    serverSide: true, //enable if data is large (more than 50,000)
                    ajax: {
                        url: "{{ fullUrl() }}",
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: "kod_sekolah",
                            name: "kod_sekolah",
                            searchable: true,
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: "nama_sekolah",
                            name: "nama_sekolah",
                            searchable: true,
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: "tahun",
                            name: "tahun",
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
    </script>
@endsection
