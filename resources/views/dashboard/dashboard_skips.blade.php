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

                </style>

                <div class="table-responsive mt-2">
                    <table class="table table-bordered table-hovered" id="dashboard_table">
                        <thead>
                            <tr>
                                <th width="5%">Bil</th>
                                <th>Nama Instrumen</th>
                                <th></th>
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
    $(document).ready(function () {
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
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
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

    function maklumatDashboard(id){
        var url = "{{ route('skips.dashboard.instrumen',['instrumen_id'=> ':id']) }}";
        var url = url.replace(':id', id);
        window.location.href = url;
    }
</script>
@endsection
