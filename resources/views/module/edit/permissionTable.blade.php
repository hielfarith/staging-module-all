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
        @if($module->permissions->count() == 0)
        <tr class="text-center">
            <td colspan="4">No Data Available</td>
        </tr>
        @endif
        @foreach ($module->permissions as $perm)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $perm->perm_name }}</td>
            <td>{{ $perm->perm_description }}</td>
            <td>
                <form action="{{ route('module.deletePermission') }}" method="POST" data-refreshFunctionDivId="modulePermissionTable" data-refreshFunctionURL="{{route('module.refreshModulePermissionTable',$module)}}">
                    @csrf
                    <input type="hidden" name="module_permission_id" value="{{$perm->id}}">
                    <button type="button" id="btnDeletePerm_{{$perm->id}}" hidden onclick="confirmBeforeSubmit(this);"></button>
                </form>
                <div class="btn-group" role="group" aria-label="Action">
                    <a type="button" class="btn btn-outline-dark waves-effect" onclick="viewModulePermissionForm('{{$perm->id}}')" data-bs-toggle="tooltip" title="Edit {{$perm?->name }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a type="button" class="btn btn-outline-dark waves-effect" onclick="$('#btnDeletePerm_{{$perm->id}}').trigger('click');" data-bs-toggle="tooltip" title="Delete {{$perm?->name }}">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
