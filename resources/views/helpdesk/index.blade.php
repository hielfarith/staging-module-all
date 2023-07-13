@extends('layouts.app')

@section('header')
Helpdesk
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Helpdesk</a></li>
<li class="breadcrumb-item"><a href="#">Senarai Isu</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder">All Ticket Listing: Helpdesk </h4>

                @hasanyrole('pengguna_luar')
                <a href={{ route('helpdesk.update-ticket') }} class="btn btn-xs btn-default" title="">
                    <button class="btn btn-md btn-primary">
                        Laporkan Isu
                    </button>
                </a>
                @endhasanyrole
            </div>

            <div class="card-body">
                <hr>

                <div class="container">

                    @hasanyrole('admin')
                    <div class="row g-1 mb-md-1">
                        <div class="col-md-3">
                            <label class="form-label fw-bolder">Kategori Isu:</label>
                            <select class="form-control select2" name="category_id" id="category_id">
                                <option value="" hidden>Kategori Isu</option>
                                <option value="1">Modul Kuarters</option>
                                <option value="2">Modul Hartanah</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bolder">Status:</label>
                            <select class="form-control select2" name="priority_id" id="priority_id">
                                <option value="">Status Isu</option>
                                <option value="1">Baru</option>
                                <option value="2">Selesai</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bolder">Tarikh Mula:</label>
                            <input type="date" class="form-control dt-input dt-full-name" data-column="2"
                                data-column-index="1" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bolder">Tarikh Akhir:</label>
                            <input type="date" class="form-control dt-input" data-column="2" data-column-index="1" />
                        </div>
                    </div>

                    <div class="d-flex justify-content-end align-items-center my-1 ">
                        <button type="submit" class="btn float-right text-danger" style="margin-right:10px;">
                            Reset
                        </button>
                        <button type="submit" class="btn btn-success float-right">
                            <i class="fa fa-search"></i> Cari
                        </button>
                    </div>
                    @endhasanyrole

                    @hasanyrole('pengguna_luar')
                    <div class="row">
                        <div class="col-md-8">&nbsp;</div>

                        <div class="row ">
                            <div class="col-md-3">
                                <label class="form-label fw-bolder">Kategori Isu:</label>
                                <select class="form-control select2" name="category_id" id="category_id">
                                    <option value="" hidden>Kategori Isu</option>
                                    <option value="1">Modul Kuarters</option>
                                    <option value="2">Modul Hartanah</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bolder">Status:</label>
                                <select class="form-control select2" name="priority_id" id="priority_id">
                                    <option value="">Status Isu</option>
                                    <option value="1">Baru</option>
                                    <option value="2">Selesai</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bolder">Tarikh Mula:</label>
                                <input type="date" class="form-control dt-input dt-full-name" data-column="2"
                                    data-column-index="1" />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bolder">Tarikh Akhir:</label>
                                <input type="date" class="form-control dt-input" data-column="2"
                                    data-column-index="1" />
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center my-1 ">
                            <a class="text-danger me-3" type="button" id="reset" href="#">
                                Reset
                            </a>
                            <button type="submit" class="btn btn-success float-right">
                                <i class="fa fa-search"></i> Cari
                            </button>
                        </div>

                    </div>
                    @endhasanyrole
                </div>

                <div class="btn-group" role="group" aria-label="Role Action">
                    <a href="#" class="btn btn-outline-success waves-effect">
                        <i class="fa fa-file-excel text-success"></i> Excel
                    </a>
                    <a href="#" class="btn btn-outline-danger waves-effect">
                        <i class="fa fa-file-pdf text-danger"></i> PDF
                    </a>
                </div>
                <hr>

                <div class="table-responsive">
                    <table class="table header_uppercase table-bordered table-hovered" id="ticket_listing">
                        <thead>
                            <tr>
                                <th> NUM. </th>
                                <th> TICKET NUMBER </th>
                                <th> DETAILS </th>
                                <th> REPORTED BY </th>
                                <th> REPORTED ON </th>
                                <th> STATUS </th>
                            </tr>
                        </thead>

                        <tbody>

                            @php $count = 1; @endphp

                            <tr>
                                <td> {{ $count++ }} </td>
                                <td>
                                    <a href={{ route('helpdesk.update-ticket') }}
                                        class="btn btn-xs btn-default text-primary" title="">
                                        FC8-A1A-D6E
                                    </a>
                                </td>
                                <td> <b>penyata dijana secara berganda</b> <br>
                                    ASSOCIATION OF CHARTERED CERTIFIED ACCOUNTANTS (20000382) Isu: penyata dijana secara
                                    berganda
                                    dan cukai perlu dibayar juga dijana secara berganda sebanyak dua kali. Tempoh
                                    bercukai : Feb -
                                    Apr 2023 </td>
                                <td> Ali bin Abu </td>
                                <td> 2023-03-30 21:16:11</td>
                                <td> <span class="badge pill-badge-glow bg-primary">Isu Baru</span>
                                </td>
                            </tr>
                            <tr>
                                <td> {{ $count++ }} </td>
                                <td>
                                    <a href={{ route('helpdesk.update-ticket') }}
                                        class="btn btn-xs btn-default text-primary" title="">
                                        841-DCA-B37
                                    </a>
                                </td>
                                <td> <b>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</b> <br>
                                    Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                    ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                    dolore eu
                                    fugiat nulla pariatur. </td>
                                <td> Ahmad bin Muslim </td>
                                <td> 2023-01-17 17:10:09</td>
                                <td> <span class="badge pill-badge-glow bg-warning">Dalam Proses Pembetulan</span>
                                </td>
                            </tr>
                            <tr>
                                <td> {{ $count++ }} </td>
                                <td>
                                    <a href={{ route('helpdesk.update-ticket') }}
                                        class="btn btn-xs btn-default text-primary" title="">
                                        7J52558071
                                    </a>
                                </td>
                                <td> <b>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</b> <br>
                                    Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                    ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                    dolore eu
                                    fugiat nulla pariatur. </td>
                                <td> Aminah binti Rusli </td>
                                <td> 2023-01-10 15:30:09</td>
                                <td> <span class="badge pill-badge-glow bg-success">Isu Selesai</span>
                                </td>
                            </tr>

                        </tbody>
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
            $('#ticket_listing').DataTable();
        });
</script>
@endsection