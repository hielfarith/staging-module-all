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
    #TableSenaraiInstrumenDijawab thead th {
        vertical-align: middle;
        text-align: center;
    }

    #TableSenaraiInstrumenDijawab tbody {
        vertical-align: middle;
    }

    .delete-button {
        display: none;
    }
</style>
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai Instrumen Telah Dijawab </h4>
        <?php
            if(strpos('pentadbir_instrumen',Auth::user()->getRolesDisplay()) !== false || strpos('superadmin',Auth::user()->getRolesDisplay()) !== false) {
                $allow =true;
            } else {
                $allow = false;
            }
        ?>
        @if($allow)
        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('instrumen_baru') }}">
                <i class="fa-solid fa-add"></i> Tambah Instrumen
            </a>
        </div>
        @endif
    </div>

    <hr>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiInstrumenDijawab" >
                {{-- <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Instrumen</th>
                        <th>Kategori Instrumen</th>
                        <th>Jumlah Pengisian</th>
                        <th>Status</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody> --}}

                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Instrumen</th>
                        <th>Kategori Instrumen</th>
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

<div class="modal fade" id="modal-instrumen-diisi" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modal-body-instrumen-diisi">
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
            var table = $('#TableSenaraiInstrumenDijawab').DataTable({
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
                        data: "status",
                        name: "status",
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

    function maklumatPengisianInstrumen(id){
        var url = "{{ route('instrumen_dijawab',['id'=> ':id']) }}";
        var url = url.replace(':id', id);

        $.ajax({
            url: url, // Route URL
            type: 'POST', // Request type (GET, POST, etc.)
                data: {
                id: id
                },
            success: function(response) {
                $('#modal-instrumen-diisi').modal("show");
                $('#modal-body-instrumen-diisi').empty();
                $('#modal-body-instrumen-diisi').append(response);
            }
        });
    }

    function  formverify(status, formid) {
        var url = "{{route('verify')}}";

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
</script>
@endsection
