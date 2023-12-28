<form id="flow_management_form" action="{{route('module.updateFlowManagement')}}" method="POST" data-refreshFunctionDivId="moduleFlowManagementTable" data-refreshFunctionURL="{{route('module.refreshFlowManagementTable',$module)}}">
    @csrf
    <input type="hidden" name="module_id" value="{{$module->id}}" />
    <input type="hidden" name="module_flow_management_id" value="" />
    <div class="row">
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label class="form-label" for="current_status">Current Status <span style="color:red;">*</span></label>
                @if($module->statuses->count() < 1)
                    <input type="text" id="action" name="action" class="form-control" required disabled value="No Status Added In Flow">
                @else
                    <select id="current_status" name="current_status" class="form-control" required>
                        <option value="" hidden>Please Choose Status</option>
                        @foreach ($module->statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->status_index.": ".$status->status_name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label class="form-label" for="module_role_id">Role <span style="color:red;">*</span></label>
                @if($module->roles->count() < 1)
                    <input type="text" id="module_role_id" name="module_role_id" class="form-control" required disabled value="No Role Added In Module">
                @else
                    <select id="module_role_id" name="module_role_id[]" class="form-control" required multiple>
                        <option value="" hidden>Please Choose Role</option>
                        @foreach ($module->roles as $role)
                            <option value="{{ $role->id }}">{{ $role->mainRole->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        <?php
            $actions = \App\Models\MasterAction::all();
        ?>
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label class="form-label" for="action">Action <span style="color:red;">*</span></label>
                <div class="input-group">
                    <select id="action" name="action" class="form-control" required>
                        <option value="">Please Choose action</option>
                        @foreach ($actions as $action)
                            <option value="{{ $action->key }}">{{ $action->value }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label class="form-label" for="next_status">Next Status <span style="color:red;">*</span></label>
                @php
                    $otherModules = \App\Models\Module::where('id','!=',$module->id)->get();
                @endphp
                <select id="next_status" name="next_status" class="form-control" required>
                    <option value="" hidden>Please Choose Status</option>
                    <option style="background-color:rgb(222, 217, 217);" disabled value="">Current Module</option>
                    @if($module->statuses->count() < 1)
                        <option disabled value="">No Status Added In Flow</option>
                    @endif
                    @foreach ($module->statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->status_index.": ".$status->status_name }}</option>
                    @endforeach
                    @foreach ($otherModules as $eachModule)
                        <option disabled value=""></option>
                        <option style="background-color:rgb(222, 217, 217);" disabled value="">{{$eachModule->module_name}}</option>
                        @foreach ($eachModule->statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->status_index.": ".$status->status_name }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-primary float-right" onclick="generalFormSubmit(this);">
                <i class="fa-solid fa-file-print"></i> {{ __('msg.submit')}}
            </button>
        </div>
    </div>
</form>
