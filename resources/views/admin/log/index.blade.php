@extends('layouts.app')

@section('header')
Audit Log
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="{{route('admin-log-index')}}">Audit Log</a></li>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
    </div>

    <div class="card-body">
        <form method="GET">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-1">
                        <label class="form-label fw-bolder">Activity</label>
                        <select name="event" id="event" class="form-control select2">
                            <option value="" hidden>Activity</option>
                            @foreach($eventArr as $key => $event)
                                {{-- <option value="{{ $event }}" {{ $request->event == $event ? 'selected' : '' }}> {{ $event }} </option> --}}
                                <option value="{{ $event }}"> {{ $event }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-1">
                        <label class="form-label fw-bolder">Activity Module</label>
                        <select name="subject_type" id="subject_type" class="form-control select2">
                            <option value="" hidden>Activity Module</option>
                            @foreach($subjectTypeArr as $key => $subjectType)
                                {{-- <option value="{{ $subjectType }}" {{ $request->subject_type == $subjectType ? 'selected' : '' }}> {{ $subjectType }} </option> --}}
                                <option value="{{ $subjectType }}"> {{ $subjectType }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-1">
                        <label class="form-label fw-bolder">Causer</label>
                        <select name="causer_id" id="causer_id" class="form-control select2">
                            <option value="" hidden>Causer</option>
                            @foreach($users as $user)
                                {{-- <option value="{{ $user->id }}" {{ $request->causer_id == $user->id ? 'selected' : '' }}> {{ $user->name }} </option> --}}
                                <option value="{{ $user->id }}"> {{ $user->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-1">
                        <label class="form-label fw-bolder">Date From</label>
                        <input type="date" name="date_start" class="form-control" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-1">
                        <label class="form-label fw-bolder">Date End</label>
                        <input type="date" name="date_end" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end align-items-center my-1 ">
                <a class="me-3" type="button" id="reset" href="{{ route('admin-log-index') }}">
                    <span> Reset </span>
                </a>
                <button type="submit" value="Filter" class="btn btn-success float-right">
                    <i class="icon-search"></i> Search
                </button>
            </div>
        </form>

        <div class="btn-group" role="group" aria-label="Role Action">
            <a href="#" class="btn btn-outline-success waves-effect">
                <i class="fa fa-file-excel text-success"></i> Excel
            </a>
            <a href="#" class="btn btn-outline-danger waves-effect">
                <i class="fa fa-file-pdf text-danger"></i> PDF
            </a>
        </div>

        <hr>

        <table class="table table-condensed table-hover mt-2" id="auditTable">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> Module </th>
                    <th> Details </th>
                    <th> User </th>
                    <th> IP Address </th>
                    <th> Date Time </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                <tr>
                    <td> {{ $activity->id }} </td>
                    <td>
                        @if ($activity->event == 'created')
                            <span class="badge rounded-pill bg-light-primary mb-1">Created</span>
                        @elseif ($activity->event == 'updated')
                            <span class="badge rounded-pill bg-light-warning mb-1">Updated</span>
                        @elseif ($activity->event == 'deleted')
                            <span class="badge rounded-pill bg-light-danger mb-1">Deleted</span>
                        @endif
                    </td>
                    <td> {{ $activity->subject_type }} </td>
                    <td> {{ $activity->causer ? $activity->causer->name : '' }} </td>
                    <td> 118.101.246.181 </td>
                    <td> {{ $activity->created_at->format('d/m/Y h:ia') }} </td>
                    <td>
                        <button type="button" class="btn btn-sm text-primary btn-default btnViewLog" data-activity="{{ $activity->activity_json }}" data-properties="{{ $activity->properties }}">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="viewLogModal" tabindex="-1" role="dialog" aria-labelledby="viewLogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header bg-light-secondary">
                <h5 class="modal-title" id="modalRegisterTitle"> Log Details </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="fw-bolder"> Activity Type </label>
                            <input type="text" id="description" name="description" placeholder="{{ $activity->event }}" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="fw-bolder"> Subject Type </label>
                            <input type="text" id="subject_type" name="subject_type" placeholder="{{ $activity->subject_type }}" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="fw-bolder"> User </label>
                            <input type="text" id="event" name="event" class="form-control" placeholder="{{ $activity->causer ? $activity->causer->name : '' }}" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="fw-bolder"> Created at </label>
                            <input type="text" id="created_at" name="created_at" placeholder="{{ $activity->created_at->format('d/m/Y h:ia') }}" class="form-control" disabled>
                        </div>
                    </div>

                    <hr>

                    <h6 class="fw-bolder mb-1">Log Details</h6>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="fw-bolder"> Old Value </label>
                            <pre class="text-wrap px-1 py-1">
                                 "old": { "remember_token": "48ufxFVGnuFPy0cLbCzbh1DZrhqB8i1rgGgd8MKL9rkkqvCkLR1tVYVUKhoS" },
                            </pre>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="fw-bolder"> New Value </label>
                            <pre class="text-wrap px-1 py-1">
                                "attributes": { "remember_token": "yPFrITZnGIkCED34f4O7rbSI8uYuXNErmw4k12ZKULmtyJHd7WvqnMCGfieT" }
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(".btnViewLog").on('click', function(){

        $("#description").val('');
        $("#subject_type").val('');
        $("#event").val('');
        $("#created_at").val('');

        var activity_json = $(this).attr('data-activity');

        try {
            var activity_obj = JSON.parse(activity_json);
            console.log(activity_obj);

            $("#description").val(activity_obj.description);
            $("#subject_type").val(activity_obj.subject_type);
            $("#event").val(activity_obj.event);
            $("#created_at").val(activity_obj.created_at);

        } catch (error) {

        }

        $("#logDetail").html('');
        var data_raw = $(this).attr('data-properties');
        if (isJson(data_raw)) {
            data_raw = JSON.stringify(JSON.parse(data_raw), null, 3);
        }

        $("#logDetail").html(data_raw);
        $("#viewLogModal").modal('show');
    });

    function isJson(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    $(document).ready(function () {
            $('#auditTable').DataTable();
        });

</script>
@endsection
