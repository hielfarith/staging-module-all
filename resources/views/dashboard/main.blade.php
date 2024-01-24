@extends('layouts/contentLayoutMaster')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
@hasanyrole('superadmin')
    <section class="app-user-view-account">
        <div class="row match-height">

            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <div class="row match-height">
                            <div class="col mt-2">
                                <h1 class="mb-1 text-white">Welcome back, <br> {{ $user->name }}</h1>
                                <p class="card-text m-auto w-75">
                                    Last login <strong> 14 June 2023 (4pm)</strong>
                                </p>
                            </div>
                            <div class="col">
                                <img src="{{ asset('images/logo/Icon3D.png') }}" class="brand-image img-circle elevation-3"
                                    style="opacity: .8; width:120px; height:140px;">
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section mt-2">
                            <div class="d-flex align-items-center flex-column">
                                <span class="avatar  avatar-xl bg-light-secondary">
                                    @php
                                        $exp_username = explode(' ', Auth::user()->name);
                                        $short_name = substr($exp_username[array_key_first($exp_username)], 0, 1);
                                        if (count($exp_username) > 1) {
                                            $short_name = $short_name . '' . substr($exp_username[array_key_last($exp_username)], 0, 1);
                                        }
                                    @endphp
                                    <span class="avatar-content">{{ $short_name }}</span>
                                    <span class="avatar-status-online"></span>
                                </span>
                                <br>
                                <div class="user-info text-center">
                                    <h3 class="fw-bolder mb-1">{{ $user->name }}</h3>
                                    @foreach ($user->getRoleNames() as $role)
                                        @if ($role == 'admin')
                                            <span class="badge bg-light-primary">{{ Str::ucfirst($role) }}</span>
                                        @elseif ($role == 'superadmin')
                                            <span class="badge bg-light-success">{{ Str::ucfirst($role) }}</span>
                                        @else
                                            <span class="badge bg-light-warning">{{ Str::ucfirst($role) }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="info-container">
                            <div class="row match-height">
                                <div class="col">
                                    <label for="" class="fw-bolder">Username:</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" name="name"
                                        id="name">
                                </div>
                                <div class="col">
                                    <label for="" class="fw-bolder">Email:</label>
                                    <input type="text" class="form-control" value="{{ $user->email }}" name="email"
                                        id="email">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-2 mb-1 mt-2">
                                <a href="javascript:;" class="btn btn-primary me-1">
                                    Update
                                </a>
                                <a href="javascript:;" class="btn btn-outline-danger suspend-user">Suspend Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <h4 class="card-title">Helpdesk Tracker</h4>
                        <div class="dropdown chart-dropdown">
                            <button class="btn btn-sm border-0 dropdown-toggle p-50" type="button" id="dropdownItem4"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Last 7 Days
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownItem4">
                                <a class="dropdown-item" href="#">Last 28 Days</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row match-height">
                            <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">

                                <h1 class="font-large-2 fw-bolder mt-2 mb-">163</h1>
                                <p class="card-text">Tickets</p>
                            </div>
                            <div class="col-sm-10 col-12 d-flex justify-content-center mt-3 mb-1">
                                <div id="support-trackers-chart"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4 mb-2">
                            <div class="text-center">
                                <div class="avatar bg-light-primary p-50 m-1">
                                    <div class="avatar-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <g id="feTicket0" fill="none" fill-rule="evenodd" stroke="none"
                                                stroke-width="1">
                                                <g id="feTicket1" fill="currentColor">
                                                    <path id="feTicket2"
                                                        d="M2 10V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2a2 2 0 1 0 0 4v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2a2 2 0 1 0 0-4Zm3-2v8h14V8H5Zm2 2h10v4H7v-4Z" />
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>

                                <p class="card-text mb-50">New Tickets</p>
                                <span class="font-large-1 fw-bold">29</span>
                            </div>
                            <div class="text-center">
                                <div class="avatar bg-light-success p-50 m-1">
                                    <div class="avatar-content">
                                        <i data-feather="check-circle" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <p class="card-text mb-50">Open Tickets</p>
                                <span class="font-large-1 fw-bold">63</span>
                            </div>
                            <div class="text-center">
                                <div class="avatar bg-light-warning p-50 m-1">
                                    <div class="avatar-content">
                                        <i data-feather="clock" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <p class="card-text mb-50">Response Time</p>
                                <span class="font-large-1 fw-bold">1d</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 ">
                <div class="card">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card invoice-list-wrapper">
                                <div class="card-datatable table-responsive">
                                    <table class="invoice-list-table table">
                                        <thead>
                                            <tr>
                                                <th width="20%">Name</th>
                                                <th>Type</th>
                                                <th width="35%">Usage</th>
                                                <th>Updated At</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>
                                                <div class="avatar me-25">
                                                    <img src="{{ asset('images/logo/ram.png') }}" alt="avatar"
                                                        width="20" height="20" />
                                                </div>
                                                <span class="fw-bolder">Memory</span>
                                            </td>
                                            <td>RAM</td>
                                            <td>
                                                <div class="progress progress-bar-primary">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                        aria-valuemin="25" aria-valuemax="100" style="width: 25%">

                                                    </div>
                                                </div>
                                            </td>
                                            <td>10, Jan 2021 20:07</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="avatar me-25">
                                                    <img src="{{ asset('images/icons/database.png') }}" alt="avatar"
                                                        width="20" height="20" />
                                                </div>
                                                <span class="fw-bolder">Storage</span>
                                            </td>
                                            <td>Database</td>
                                            <td>
                                                <div class="progress progress-bar-primary">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                                        aria-valuemin="60" aria-valuemax="100" style="width: 60%">

                                                    </div>
                                                </div>
                                            </td>
                                            <td>10, Jan 2021 20:07</td>
                                        </tr>

                                        <tr>
                                            <td class="text-start">
                                                <div class="avatar me-25">
                                                    <img src="{{ asset('images/logo/sql.png') }}" alt="avatar"
                                                        width="20" height="20" />
                                                </div>
                                                <span class="fw-bolder"> &nbsp; Database </span>
                                            </td>
                                            <td>SQL</td>
                                            <td>
                                                <div class="progress progress-bar-primary">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                        aria-valuemin="50" aria-valuemax="100" style="width: 50%">

                                                    </div>
                                                </div>
                                            </td>
                                            <td>10, Jan 2021 20:07</td>
                                        </tr>

                                        <tr>
                                            <td class="text-start">
                                                <div class="avatar me-25">
                                                    <img src="{{ asset('images/logo/cpu.png') }}" alt="avatar"
                                                        width="20" height="20" />
                                                </div>
                                                <span class="fw-bolder"> &nbsp; CPU </span>
                                            </td>
                                            <td>Processor</td>
                                            <td>
                                                <div class="progress progress-bar-primary">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                        aria-valuemin="50" aria-valuemax="100" style="width: 50%">

                                                    </div>
                                                </div>
                                            </td>
                                            <td>10, Jan 2021 20:07</td>
                                        </tr>

                                        <tr>
                                            <td class="text-start">
                                                <div class="avatar me-25">
                                                    <img src="{{ asset('images/logo/ram.png') }}" alt="avatar"
                                                        width="20" height="20" />
                                                </div>
                                                <span class="fw-bolder"> &nbsp; RAM </span>
                                            </td>
                                            <td>Memory</td>
                                            <td>
                                                <div class="progress progress-bar-primary">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                        aria-valuemin="50" aria-valuemax="100" style="width: 50%">

                                                    </div>
                                                </div>
                                            </td>
                                            <td>10, Jan 2021 20:07</td>
                                        </tr>

                                        <tr>
                                            <td class="text-start">
                                                <div class="avatar me-25">
                                                    <img src="{{ asset('images/logo/gpu.png') }}" alt="avatar"
                                                        width="20" height="20" />
                                                </div>
                                                <span class="fw-bolder"> &nbsp; GPU </span>
                                            </td>
                                            <td>Graphics</td>
                                            <td>
                                                <div class="progress progress-bar-primary">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                        aria-valuemin="50" aria-valuemax="100" style="width: 50%">

                                                    </div>
                                                </div>
                                            </td>
                                            <td>10, Jan 2021 20:07</td>
                                        </tr>

                                        <tr>
                                            <td class="text-start">
                                                <div class="avatar me-25">
                                                    <img src="{{ asset('images/logo/battery.png') }}" alt="avatar"
                                                        width="20" height="20" />
                                                </div>
                                                <span class="fw-bolder"> &nbsp; Battery </span>
                                            </td>
                                            <td>Power</td>
                                            <td>
                                                <div class="progress progress-bar-primary">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                        aria-valuemin="100" aria-valuemax="100" style="width: 100%">

                                                    </div>
                                                </div>
                                            </td>
                                            <td>10, Jan 2021 20:07</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endhasanyrole
@endsection


@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/dashboard-analytics.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
@endsection
