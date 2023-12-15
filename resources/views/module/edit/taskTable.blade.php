<table class="table header_uppercase table-bordered table-responsive" width="100%">
    <thead>
        <tr>
            <th class="font-weight-bold text-center" width="05%">NO</th>
            <th class="font-weight-bold text-center" width="30%">ROLE</th>
            <th class="font-weight-bold text-center" width="10%">TASKS</th>
            <th class="font-weight-bold text-center" width="5%">ACTION</th>
        </tr>
    </thead>
    <tbody>
        @if($module->tasks->count() == 0)
        <tr class="text-center">
            <td colspan="4">No Data Available</td>
        </tr>
        @endif
        @php
            $totalTask = $module->permissions->count() * $module->statuses->count();
        @endphp
        @foreach ($module->tasksByRole as $taskbyRole)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $taskbyRole->moduleRole->role_name }}</td>
            <td class="text-center">{{ $taskbyRole->totalByRole }}/{{ $totalTask }}</td>
            <td class="text-center">
                {{-- <form action="{{ route('module.deletePermission') }}" method="POST" data-refreshFunctionDivId="moduleTaskTable" data-refreshFunctionURL="{{route('module.refreshModuleTaskTable',$module)}}">
                    @csrf
                    <input type="hidden" name="module_permission_id" value="{{$taskbyRole->id}}">
                    <button type="button" id="btnDeletePerm_{{$taskbyRole->id}}" hidden onclick="confirmBeforeSubmit(this);"></button>
                </form> --}}
                <div class="btn-group" role="group" aria-label="Action">
                    <a type="button" class="btn btn-outline-dark waves-effect" onclick="viewModuleTaskForm('{{$taskbyRole->module_role_id}}')" data-bs-toggle="tooltip" title="Edit {{$taskbyRole?->name }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    {{-- <a type="button" class="btn btn-outline-dark waves-effect" onclick="$('#btnDeletePerm_{{$taskbyRole->id}}').trigger('click');" data-bs-toggle="tooltip" title="Delete {{$taskbyRole?->name }}">
                        <i class="fas fa-trash"></i>
                    </a> --}}
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
