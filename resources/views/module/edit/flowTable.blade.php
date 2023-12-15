<table class="table header_uppercase table-bordered table-responsive" width="100%">
    <thead>
        <tr>
            <th class="font-weight-bold text-center" width="20%">CURRENT STATUS</th>
            <th class="font-weight-bold text-center" width="25%">ROLE</th>
            <th class="font-weight-bold text-center" width="25%">ACTION</th>
            <th class="font-weight-bold text-center" width="20%">NEXT STATUS</th>
            <th class="font-weight-bold text-center" width="10%">ACTION</th>
        </tr>
    </thead>
    <tbody>
        @if($module->flowManagements->count() == 0)
        <tr class="text-center">
            <td colspan="5">No Data Available</td>
        </tr>
        @endif
        <?php
            $id = $module->id;
            $flowmanage = App\Models\ModuleFlowManagement::select('module_id','current_status','next_status', 'action')
            ->selectRaw('GROUP_CONCAT(DISTINCT module_role_id ORDER BY module_role_id) as concatenated_role_id')
            ->groupBy('current_status', 'next_status','action', 'module_id')
            ->get();
        ?>

        @foreach($flowmanage as $v) 
            {{$v->concatenated_role_id}}
        @endforeach

        @foreach ($module->flowManagements as $flow)
        <tr>
            <td class="text-center">
                <span>{{$flow->currentStatus->status_index}}: {{$flow->currentStatus->status_name}}</span>
            </td>
            <td class="text-center">
                <span>{{$flow->moduleRole->mainRole->name}}</span>
            </td>
            <td class="text-center">
                <span>{{$flow->action}}</span>
            </td>
            <td class="text-center">
                @if($flow->nextStatus->module_id != $module->id)
                    <span>{{$flow->nextStatus->module->module_name}}<br></span>
                @endif
                <span>{{$flow->nextStatus->status_index}}: {{$flow->nextStatus->status_name}}</span>
            </td>
            <td class="text-center">
                <form action="{{ route('module.deleteFlowManagement') }}" method="POST" data-refreshFunctionDivId="moduleFlowManagementTable" data-refreshFunctionURL="{{route('module.refreshFlowManagementTable',$module)}}" >
                @csrf
                    <input type="hidden" name="module_flow_management_id" value="{{$flow->id}}">
                    <div class="btn-group" role="group" aria-label="Action">
                        <button type="button" class="btn btn-outline-dark waves-effect" onclick="confirmBeforeSubmit(this);" data-bs-toggle="tooltip" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
