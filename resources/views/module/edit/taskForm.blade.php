@php
    $read_only = $read_only ?? null;
    $module = $module;
    $tasks = $module->tasks;
@endphp
<style>
    #taskFormModal table {
        text-align: left;
        position: relative;
        border-collapse: separate;
        border-spacing: 0;
    }

    #taskFormModal table th {
        /* Apply both top and bottom borders to the <th> */
        border-top: 2px solid #ebe9f1;
        border-bottom: 2px solid #ebe9f1;
        border-right: 2px solid #ebe9f1;
    }

    #taskFormModal table td {
        /* For cells, apply the border to one of each side only (right but not left, bottom but not top) */
        border-bottom: 2px solid #ebe9f1;
        border-right: 2px solid #ebe9f1;
    }

    #taskFormModal table th:first-child,
    #taskFormModal table td:first-child {
        /* Apply a left border on the first <td> or <th> in a row */
        border-left: 2px solid #ebe9f1;
    }

    #taskFormModal table thead th {
        position: sticky;
        top: 0;
        background-color: #edecec;
    }

    #taskFormModal th {
        position: sticky;
        top: -1px;
        z-index: 99998 !important;
    }

    #taskFormModal .th-vertical-head {
        top: -1px;
        left: -1px;
        z-index: 99999 !important;
    }

    #taskFormModal td,
    #taskFormModal td * {
        z-index: 99996 !important;
    }

    #taskFormModal .th-vertical {
        background: white;
        position: sticky;
        left: -1px;
        z-index: 99997 !important;

    }

    #taskFormModal .table-container {
        max-height: 500px;
        overflow: auto;
    }
</style>
<div class="modal fade" id="taskFormModal" tabindex="-1" aria-labelledby="taskFormModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header py-0 bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body 70-height px-sm-2 mx-50">
                <h1 class="text-center mb-1" id="addNewCardTitle">Module Task Form</h1>
                <p class="text-center">Manage Task for Module</p>

                <form id="taskForm" action="{{route('module.updateTaskForm')}}" method="POST">
                    @csrf
                    <input type="hidden" id="module_role_id" name="module_role_id" value="{{$moduleRole->id}}">
                    <input type="hidden" id="module_id" name="module_id" value="{{$module->id}}">
                    <div class="row px-2">
                        <div class="col-md-4 col-12 px-0">
                            <div class="form-group">
                                <label class="form-label" for="module_role_id">Role </label>
                                <div class="input-group">
                                    <input type="text" id="module_role_name" name="module_role_name"
                                        class="form-control" readonly value="{{$moduleRole->mainRole->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12 table-responsive table-container px-0">
                            <table class="table header_uppercase table-bordered" id="taskCheckboxTable"
                                style="table-layout:fixed;display: block;" width="100%">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold text-center th-vertical-head"
                                            style="width:50px;word-wrap: break-word">Permission\Status</th>
                                        @foreach($module->statuses as $status)
                                        <th class="font-weight-bold text-center" width="20%">{{$status->status_name}}
                                        </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($module->permissions as $permission)
                                    <tr>
                                        @foreach($module->statuses as $status)
                                            @if($loop->first)
                                                <td class="th-vertical"
                                                    style="overflow: hidden; max-width: 240px; word-wrap: break-word;">{{
                                                    $permission->perm_name }}</td>
                                                <td width="20%" align="middle">
                                                    <input type="checkbox" class="form-check-input p-0 m-0"
                                                    id="tasks[{{$permission->id." __".$status->id}}]"
                                                    name="tasks[{{$permission->id."__".$status->id}}]"
                                                        @php
                                                            $currentTask = $tasks
                                                            ->where('module_role_id',$moduleRole->id)
                                                            ->where('module_permission_id',$permission->id)
                                                            ->where('module_status_id',$status->id);


                                                        @endphp
                                                        @if($currentTask->count() > 0)
                                                            @php
                                                                $tasks->forget($currentTask->keys()->all());
                                                            @endphp
                                                            checked=""

                                                        @endif
                                                    >
                                                </td>
                                            @else
                                                <td width="20%" align="middle">
                                                    <input type="checkbox" class="form-check-input p-0 m-0"
                                                    id="tasks[{{$permission->id." __".$status->id}}]"
                                                    name="tasks[{{$permission->id."__".$status->id}}]"
                                                        @php
                                                            $currentTask = $tasks
                                                            ->where('module_role_id',$moduleRole->id)
                                                            ->where('module_permission_id',$permission->id)
                                                            ->where('module_status_id',$status->id);
                                                        @endphp
                                                        @if($currentTask->count() > 0)
                                                            @php
                                                                $tasks->forget($currentTask->keys()->all());
                                                            @endphp
                                                            checked=""

                                                        @endif
                                                    >
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <button type="button" id="btnUpdateTaskForm" hidden onclick="generalFormSubmit(this);"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnFormFake" class="btn btn-success" onclick="$('#btnUpdateTaskForm').trigger('click');">{{__('msg.submit')}}</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
