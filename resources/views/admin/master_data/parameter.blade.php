@extends('layouts.app')

@section('header')
    Master Data - Parameter
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item">Master Data - Parameter</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title fw-bolder">&nbsp; </h4>
                    @hasanyrole('superadmin')
                        <div class="d-flex justify-content-end align-items-center">

                            <a href="#" class="nav-link">
                                <button class="btn btn-md btn-primary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#index_borang_parameter" aria-controls="index_borang_parameter">
                                    Tambah Parameter
                                </button><br>
                            </a>

                        </div>
                    @endhasanyrole

                </div>
                @php $count = 1; @endphp
                <div class="card-body">
                    <hr>

                    <div class="col-md-8">&nbsp;</div>
                    @hasanyrole('superadmin')
                        <div class="row ">
                            <div class="col-md-3">
                                <label class="form-label">ID Parameter</label>
                                <input type="text" class="form-control dt-input dt-full-name" data-column="2"
                                    data-column-index="1">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Nama Parameter</label>
                                <input type="text" class="form-control dt-input dt-full-name" data-column="2"
                                    data-column-index="1">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Code</label>
                                <input type="text" class="form-control dt-input dt-full-name" data-column="2"
                                    data-column-index="1">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Tarikh</label>
                                <input type="date" class="form-control dt-input" data-column="2" data-column-index="1" />
                            </div>

                            <div class="d-flex justify-content-end align-items-center my-1 ">
                                <a class="me-3" type="button" id="reset" href="#">
                                    <span class="text-danger"> Reset</span>
                                </a>
                                <button type="submit" class="btn btn-success float-right">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
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
                    @endhasanyrole
                    <div class="table-responsive">
                        <table class="table header_uppercase table-bordered table-hovered" id="parameter">
                            <thead>
                                <tr>
                                    <th> No. </th>
                                    <th>ID Parameter</th>
                                    <th> Name of Parameter </th>
                                    <th> Code </th>
                                    <th> Description </th>
                                    <th> Last Modified Date </th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td>para_1</td>
                                    <td>Transaction Type
                                        / Jenis Transaksi</td>
                                    <td><b>trans_type</b></td>
                                    <td>Transcation Type</td>
                                    <td>01/01/2020 07:30:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <a href="#" class="btn btn-xs btn-default " title="">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-default">
                                                <i class="fas fa-pencil text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td>para_2</td>
                                    <td>Result Code</td>
                                    <td><b>RESULT CODE</b></td>
                                    <td>Type of RESULT CODE</td>
                                    <td>01/01/2020 07:30:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <a href="#" class="btn btn-xs btn-default " title="">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-default">
                                                <i class="fas fa-pencil text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td>para_3</td>
                                    <td>Digital Service</td>
                                    <td><b>Service_TV</b></td>
                                    <td>Type of Digital Service</td>
                                    <td>01/01/2020 07:30:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <a href="#" class="btn btn-xs btn-default " title="">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-default">
                                                <i class="fas fa-pencil text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td>para_4</td>
                                    <td>Designation</td>
                                    <td><b>DESG</b></td>
                                    <td>Transaction Type</td>
                                    <td>01/01/2020 07:30:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <a href="#" class="btn btn-xs btn-default " title="">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-default">
                                                <i class="fas fa-pencil text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td>para_5</td>
                                    <td>Application</td>
                                    <td><b>APPLICATION CODE</b></td>
                                    <td>Application Type</td>
                                    <td>01/01/2020 07:30:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <a href="#" class="btn btn-xs btn-default " title="">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-default">
                                                <i class="fas fa-pencil text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td>para_6</td>
                                    <td>Grant Code</td>
                                    <td><b>GRANT CODE</b></td>
                                    <td>Type of Grant</td>
                                    <td>01/01/2020 07:30:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <a href="#" class="btn btn-xs btn-default " title="">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-default">
                                                <i class="fas fa-pencil text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td>para_7</td>
                                    <td>Project Code</td>
                                    <td><b>PROJECT CODE</b></td>
                                    <td>Code given for each project executed</td>
                                    <td>01/01/2020 07:30:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <a href="#" class="btn btn-xs btn-default " title="">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-default">
                                                <i class="fas fa-pencil text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td>para_8</td>
                                    <td>Execution Code</td>
                                    <td><b>EXECUTION CODE</b></td>
                                    <td>Transaction Type</td>
                                    <td>01/01/2020 07:30:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <a href="#" class="btn btn-xs btn-default " title="">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-default">
                                                <i class="fas fa-pencil text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td>para_9</td>
                                    <td>Notice Code</td>
                                    <td><b>NOTICE CODE</b></td>
                                    <td>Notice Type</td>
                                    <td>01/01/2020 07:30:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <a href="#" class="btn btn-xs btn-default " title="">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-default">
                                                <i class="fas fa-pencil text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td>para_10</td>
                                    <td>Seizure Code</td>
                                    <td><b>SEIZURE CODE</b></td>
                                    <td>Type of Seizure</td>
                                    <td>01/01/2020 07:30:00</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Action">
                                            <a href="#" class="btn btn-xs btn-default " title="">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-default">
                                                <i class="fas fa-pencil text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @hasanyrole('admin')
        @include('admin.master_data.borang.borangParameter')
    @endhasanyrole
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#parameter').DataTable({

            });
        });
    </script>
@endsection
