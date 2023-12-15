<table class="table header_uppercase table-bordered table-responsive" id="subModuleTable" width="100%">
    <thead>
        <tr>
            <th class="font-weight-bold text-center" width="05%">NO</th>
            <th class="font-weight-bold text-center" width="30%">NAME</th>
            <th class="font-weight-bold text-center" width="35%">DESCRIPTION</th>
            <th class="font-weight-bold text-center" width="5%">ACTION</th>
        </tr>
    </thead>
    <tbody>
        @if($module->roles->count() == 0)
        <tr class="text-center">
            <td colspan="4">No Data Available</td>
        </tr>
        @endif
        @foreach ($module->roles as $role)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $role->mainRole->name }}</td>
            <td>{{ $role->role_description }}</td>
            <td>
                <form action="{{ route('module.deleteRole') }}" method="POST" data-refreshFunctionDivId="moduleRoleTable" data-refreshFunctionURL="{{route('module.refreshModuleRoleTable',$module)}}">
                    @csrf
                    <input type="hidden" name="module_role_id" value="{{$role->id}}">
                    <button type="button" id="btnDeleteRole_{{$role->id}}" hidden onclick="confirmBeforeSubmit(this);"></button>
                </form>
                <div class="btn-group" role="group" aria-label="Action">
                    <a type="button" class="btn btn-outline-dark waves-effect" onclick="viewModuleRoleForm('{{$role->id}}')" data-bs-toggle="tooltip" title="Edit {{$role?->name }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a type="button" class="btn btn-outline-dark waves-effect" onclick="viewModuleTaskForm('{{$role->id}}')" data-bs-toggle="tooltip" title="Edit Task {{$role?->name }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a type="button" class="btn btn-outline-dark waves-effect" onclick="$('#btnDeleteRole_{{$role->id}}').trigger('click');" data-bs-toggle="tooltip" title="Delete {{$role?->name }}">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
