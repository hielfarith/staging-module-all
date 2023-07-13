@extends('layouts.app')

@section('header')
    Master Data - Running No List
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item">Master Data - Running No List</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title fw-bolder"> &nbsp; </h4>
                    @hasanyrole('superadmin')
                        <div class="d-flex justify-content-end align-items-center">

                            <a href="#" class="nav-link">
                                <button class="btn btn-md btn-primary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#index_borang_noList" aria-controls="index_borang_noList">
                                    Add Running No List
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
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control dt-input dt-full-name" data-column="2"
                                    data-column-index="1">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Code</label>
                                <input type="text" class="form-control dt-input dt-full-name" data-column="2"
                                    data-column-index="1">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Sample</label>
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
                        <table class="table header_uppercase table-bordered table-hovered" id="runningNo">
                            <thead>
                                <tr class="text-center">
                                    @hasanyrole('superadmin')
                                        <th> No. </th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th> Sample </th>
                                        <th> Module </th>
                                        <th> Count </th>
                                        <th> Last Modified Date </th>
                                        <th> Action </th>
                                    @endhasanyrole
                                </tr>
                            </thead>

                            <tbody>
                                @hasanyrole('superadmin')
                                    <tr>
                                        <td> {{ $count++ }} </td>
                                        <td>Draft Registration</td>
                                        <td>A</td>
                                        <td>A200-00001</td>
                                        <td>Draft</td>
                                        <td>60</td>
                                        <td>01/01/2020 07:30:00</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Role Action">
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
                                        <td> Registration</td>
                                        <td>REG</td>
                                        <td>YY00001</td>
                                        <td>Main</td>
                                        <td>41</td>
                                        <td>01/01/2020 07:30:00</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Role Action">
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
                                        <td> Registration Internal</td>
                                        <td>H</td>
                                        <td>H10-YYMM-3232</td>
                                        <td>internal</td>
                                        <td>41</td>
                                        <td>01/01/2020 07:30:00</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Role Action">
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
                                        <td> Update Registration</td>
                                        <td>KE</td>
                                        <td>KE00001</td>
                                        <td>Task</td>
                                        <td>41</td>
                                        <td>01/01/2020 07:30:00</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Role Action">
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
                                        <td> Cancellation Registration</td>
                                        <td>BA</td>
                                        <td>BA00001</td>
                                        <td>Task</td>
                                        <td>41</td>
                                        <td>01/01/2020 07:30:00</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Role Action">
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
                                        <td> Approval</td>
                                        <td>AV</td>
                                        <td>AV00001</td>
                                        <td>Internal</td>
                                        <td>41</td>
                                        <td>01/01/2020 07:30:00</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Role Action">
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
                                        <td> Application </td>
                                        <td>APP</td>
                                        <td>APP0001</td>
                                        <td>Main</td>
                                        <td>41</td>
                                        <td>01/01/2020 07:30:00</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Role Action">
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
                                        <td>Cancellation</td>
                                        <td>CC</td>
                                        <td>CC20100</td>
                                        <td>Draft</td>
                                        <td>60</td>
                                        <td>01/01/2020 07:30:00</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Role Action">
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
                                        <td> Rejection</td>
                                        <td>RE</td>
                                        <td>RE00001</td>
                                        <td>Task</td>
                                        <td>41</td>
                                        <td>01/01/2020 07:30:00</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Role Action">
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
                                        <td> Deletion</td>
                                        <td>DEL</td>
                                        <td>DEL00001</td>
                                        <td>Task</td>
                                        <td>41</td>
                                        <td>01/01/2020 07:30:00</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Role Action">
                                                <a href="#" class="btn btn-xs btn-default " title="">
                                                    <i class="fas fa-eye text-primary"></i>
                                                </a>
                                                <a href="#" class="btn btn-xs btn-default">
                                                    <i class="fas fa-pencil text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endhasanyrole
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @hasanyrole('admin')
        @include('admin.master_data.borang.borangNoList')
    @endhasanyrole
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#runningNo').DataTable({

            });
        });
    </script>
@endsection
