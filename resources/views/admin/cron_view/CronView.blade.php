@extends('layouts.app')

@section('header')
Senarai Cron View
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item"><a href="#"> Senarai Cron View</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">


            <div class="card">
                @php $count = 1; @endphp
                <div class="card-body">

                    <div class="row ">
                        <div class="col-md-3">
                            <label class="form-label fw-bolder">Cron Job</label>
                            <input type="text" class="form-control dt-input dt-full-name" data-column="2"
                                data-column-index="1">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bolder">Start Time</label>
                            <input type="text" class="form-control dt-input dt-full-name" data-column="2"
                                data-column-index="1">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-bolder">End Time</label>
                            <input type="text" class="form-control dt-input dt-full-name" data-column="2"
                                data-column-index="1">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-bolder">Status</label>
                            <input type="text" class="form-control dt-input dt-full-name" data-column="2"
                                data-column-index="1">
                        </div>

                        <div class="d-flex justify-content-end align-items-center my-1 ">
                            <a class="me-3" type="button" id="reset" href="#">
                                <span class="text-danger"> Reset </span>
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

                    <div class="table-responsive">
                        <table class="table header_uppercase table-bordered table-hovered mt-2" id="cronview_table">
                            <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Cron Job </th>
                                    <th> Start Time </th>
                                    <th> End Time </th>
                                    <th> Hour </th>
                                    <th> Minutes </th>
                                    <th> Month </th>
                                    <th> Status </th>
                                </tr>
                            </thead>

                            <tbody>
                                    <tr>
                                        <td> {{ $count++ }} </td>
                                        <td>
                                            clickup_task
                                        </td>
                                        <td> 2023-06-18 15:05:02</td>
                                        <td>2023-06-19 15:05:02</td>
                                        <td> 24 </td>
                                        <td> 0 </td>
                                        <td> 5 </td>
                                        <td> <span class="badge bg-light-success">Success</span> </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $count++ }} </td>
                                        <td>
                                            clickup:mail-notification
                                        </td>
                                        <td> 2023-06-20 15:05:02</td>
                                        <td>2023-06-22 15:05:02</td>
                                        <td> 48 </td>
                                        <td> 0 </td>
                                        <td> 5 </td>
                                        <td> <span class="badge bg-light-success">Success</span> </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $count++ }} </td>
                                        <td>
                                            clickup:mail-notification
                                        </td>
                                        <td> 2023-06-21 15:05:02</td>
                                        <td>2023-06-22 15:05:02</td>
                                        <td> 24 </td>
                                        <td> 0 </td>
                                        <td> 5 </td>
                                        <td> <span class="badge bg-light-success">Success</span> </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $count++ }} </td>
                                        <td>
                                            excel_upload:save-file
                                        </td>
                                        <td> 2023-06-18 15:05:02</td>
                                        <td>2023-06-19 15:05:02</td>
                                        <td> 24 </td>
                                        <td> 0 </td>
                                        <td> 5 </td>
                                        <td> <span class="badge bg-light-success">Success</span> </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $count++ }} </td>
                                        <td>
                                            excel_upload:mail-notification
                                        </td>
                                        <td> 2023-06-20 15:05:02</td>
                                        <td>2023-06-22 15:05:02</td>
                                        <td> 48 </td>
                                        <td> 0 </td>
                                        <td> 5 </td>
                                        <td> <span class="badge bg-light-success">Success</span> </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $count++ }} </td>
                                        <td>
                                            calendar:refresh-public-holiday
                                        </td>
                                        <td> 2023-06-21 15:05:02</td>
                                        <td>2023-06-22 15:05:02</td>
                                        <td> 24 </td>
                                        <td> 0 </td>
                                        <td> 5 </td>
                                        <td> <span class="badge bg-light-success">Success</span> </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $count++ }} </td>
                                        <td>
                                            backup:backup-database
                                        </td>
                                        <td> 2023-06-21 15:05:02</td>
                                        <td>2023-06-22 15:05:02</td>
                                        <td> 24 </td>
                                        <td> 0 </td>
                                        <td> 5 </td>
                                        <td> <span class="badge bg-light-success">Success</span> </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $count++ }} </td>
                                        <td>
                                            applicant:mail-applicant-grant-closure
                                        </td>
                                        <td> 2023-06-18 15:05:02</td>
                                        <td>2023-06-19 15:05:02</td>
                                        <td> 24 </td>
                                        <td> 0 </td>
                                        <td> 5 </td>
                                        <td> <span class="badge bg-light-success">Success</span> </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $count++ }} </td>
                                        <td>
                                            applicant:mail-applicant-status-draft
                                        </td>
                                        <td> 2023-06-20 15:05:02</td>
                                        <td>2023-06-22 15:05:02</td>
                                        <td> 48 </td>
                                        <td> 0 </td>
                                        <td> 5 </td>
                                        <td> <span class="badge bg-light-success">Success</span> </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $count++ }} </td>
                                        <td>
                                            approver:mail-approver-status-draft
                                        </td>
                                        <td> 2023-06-21 15:05:02</td>
                                        <td>2023-06-22 15:05:02</td>
                                        <td> 24 </td>
                                        <td> 0 </td>
                                        <td> 5 </td>
                                        <td> <span class="badge bg-light-success">Success</span> </td>
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
        $(document).ready(function () {
            $('#cronview_table').DataTable();
        });
    </script>
@endsection
