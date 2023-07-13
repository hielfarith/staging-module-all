@extends('layouts.app')

@section('header')
    Senarai Database Table
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item"><a href="#"> Senarai Database Table</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Database Table
            </h4>
        </div>
        <div class="card-body">

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
                <table class="table header_uppercase table-bordered table-hovered" id="database_table">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Table Name </th>
                            <th> Action </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td> 1 </td>
                            <td> user </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="javascript();" class="btn btn-primary me-1" data-bs-toggle="modal"
                                    data-bs-target="#structure_database" aria-controls="structure_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Structure
                                    </a>
                                    <a href="javascript();" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#data_database" aria-controls="data_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Data
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td> 2 </td>
                            <td> roles </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="javascript();" class="btn btn-primary me-1" data-bs-toggle="modal"
                                    data-bs-target="#structure_database" aria-controls="structure_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Structure
                                    </a>
                                    <a href="javascript();" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#data_database" aria-controls="data_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Data
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td> 3 </td>
                            <td> user_application </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="javascript();" class="btn btn-primary me-1" data-bs-toggle="modal"
                                    data-bs-target="#structure_database" aria-controls="structure_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Structure
                                    </a>
                                    <a href="javascript();" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#data_database" aria-controls="data_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Data
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td> 4 </td>
                            <td> activity_log </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="javascript();" class="btn btn-primary me-1" data-bs-toggle="modal"
                                    data-bs-target="#structure_database" aria-controls="structure_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Structure
                                    </a>
                                    <a href="javascript();" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#data_database" aria-controls="data_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Data
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td> 5 </td>
                            <td> uploaded_file </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="javascript();" class="btn btn-primary me-1" data-bs-toggle="modal"
                                    data-bs-target="#structure_database" aria-controls="structure_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Structure
                                    </a>
                                    <a href="javascript();" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#data_database" aria-controls="data_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Data
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td> 6 </td>
                            <td> roles_has_permission </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="javascript();" class="btn btn-primary me-1" data-bs-toggle="modal"
                                    data-bs-target="#structure_database" aria-controls="structure_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Structure
                                    </a>
                                    <a href="javascript();" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#data_database" aria-controls="data_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Data
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td> 7 </td>
                            <td> failed_jobs </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="javascript();" class="btn btn-primary me-1" data-bs-toggle="modal"
                                    data-bs-target="#structure_database" aria-controls="structure_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Structure
                                    </a>
                                    <a href="javascript();" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#data_database" aria-controls="data_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Data
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td> 8 </td>
                            <td> cronjob </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="javascript();" class="btn btn-primary me-1" data-bs-toggle="modal"
                                    data-bs-target="#structure_database" aria-controls="structure_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Structure
                                    </a>
                                    <a href="javascript();" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#data_database" aria-controls="data_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Data
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td> 9 </td>
                            <td> announcement </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="javascript();" class="btn btn-primary me-1" data-bs-toggle="modal"
                                    data-bs-target="#structure_database" aria-controls="structure_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Structure
                                    </a>
                                    <a href="javascript();" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#data_database" aria-controls="data_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Data
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td> 10 </td>
                            <td> api_log </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="javascript();" class="btn btn-primary me-1" data-bs-toggle="modal"
                                    data-bs-target="#structure_database" aria-controls="structure_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Structure
                                    </a>
                                    <a href="javascript();" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#data_database" aria-controls="data_database">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Data
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.database_view.structure')
    @include('admin.database_view.data')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#database_table').DataTable();
        });
    </script>
@endsection
