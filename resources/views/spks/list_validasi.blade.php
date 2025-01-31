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
                        Pengguna</span>
                    <span class="legend-item"><i class="fa fa-pencil text-warning" style="font-size: 16px;"></i> : Kemas
                        Kini Pengguna</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiPengurusan">
                    <thead style="color:white; background-color: #9ae596 ">
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
                    <tbody id="table-spks-body">
                    </tbody>
                </table>
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

            var APIUrl = '{{ env('APP_VALIDASI_URL') }}' + 'api/spks/validasi-senarai';
            // TableSenaraiInstrumenSpks
            $.ajax({
                url: APIUrl,
                method: 'GET',
                success: function(response) {
                    if (response.status == 'success') {
                        var data = response.data;
                        $('#table-spks-body').empty();
                        for (var i = 0; i < data.length; i++) {
                            var tableData = "<tr>";
                            var sn = i + 1;
                            tableData = tableData + '<td>' + sn + '</td>';
                            tableData = tableData + '<td>' + data[i].pengguna_instrumen + '</td>';
                            tableData = tableData + '<td>' + data[i].pengisian_oleh + '</td>';
                            tableData = tableData + '<td>' + data[i].tempoh_pengisian + '</td>';
                            tableData = tableData + '<td>' + data[i].tempoh_pengisian_lain + '</td>';
                            tableData = tableData + '<td>' + data[i].spks_status + '</td>';

                            var button = "";
                            button = button +
                                '<div class="btn-group " role="group" aria-label="Action">';
                            button = button + '<a onclick="maklumatSpks(' + data[i].spks_id +
                                ')" class="btn btn-xs btn-default" title=""><i class="fas fa-eye text-primary"></i></a>';
                            button = button + '<a onclick="maklumatSpksValidasi(' + data[i].spks_id +
                                ')" class="btn btn-xs btn-default" title=""><i class="fas fa-pencil text-primary"></i></a>';
                            button = button +
                                '<a onclick="#" class="btn btn-xs btn-default" title=""><i class="fas fa-print text-primary"></i></a>';
                            button = button + "</div>";
                            tableData = tableData + '<td>' + button + '</td></tr>';
                            $('#table-spks-body').append(tableData);
                        }
                    }
                }
            });
        });



        function maklumatSpks(id) {
            var url = "{{ route('spks.borang-view', ['id' => ':id', 'type' => 'lihat']) }}";
            var url = url.replace(':id', id);
            window.location.href = url;
        }

        function maklumatSpksEdit(id) {
            var url = "{{ route('spks.borang-view', ['id' => ':id', 'type' => 'kemaskini']) }}";
            var url = url.replace(':id', id);
            window.location.href = url;
        }

        function maklumatSpksverfikasi(id) {
            var url = "{{ route('spks.verfikasi_spks', ['id' => ':id']) }}";
            var url = url.replace(':id', id);
            window.location.href = url;
        }

        function maklumatSpksValidasi(id) {
            var url = "{{ route('spks.validasi_spks', ['id' => ':id']) }}";
            var url = url.replace(':id', id);
            window.location.href = url;
        }
    </script>
@endsection
