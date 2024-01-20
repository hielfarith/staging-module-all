@php
    $read_only = $read_only ?? null;
    $moduleRole = $moduleRole ?? null;
@endphp
<div class="modal fade" id="roleFormModal" tabindex="-1" aria-labelledby="statusFormModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-0 bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-2 mx-50">
                <h1 class="text-center mb-1" id="addNewCardTitle">Module Role Form</h1>
                <p class="text-center">Add/Edit Role for Module</p>

                <form id="roleForm" action="{{route('module.updateRoleForm')}}" method="POST" data-refreshFunctionDivId="moduleRoleTable" data-refreshFunctionURL="{{route('module.refreshModuleRoleTable',$module)}}">
                    @csrf
                    <input type="hidden" name="module_role_id" value="{{$moduleRole->id ?? null}}">
                    <input type="hidden" name="module_id" value="{{$module->id}}">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="role_id">Role</label>
                                <div class="">
                                    @php
                                        $roles = \App\Models\Role::where('dynamic',1)->get();
                                    @endphp
                                    <select name="role_id" id="role_id" class="select2 form-select form-control">
                                        <option value="" hidden> Pilih Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}"> {{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="role_description">Role Diskripsi <span class="text text-danger">*</span> </label>
                                <div class="input-group">
                                    <textarea id="role_description" name="role_description" class="form-control" placeholder="Description of Role" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="btnUpdateRoleForm" hidden onclick="generalFormSubmit(this);"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpdateRoleFormFake" class="btn btn-success" onclick="$('#btnUpdateRoleForm').trigger('click');">{{$moduleRole ? __('msg.update') : __('msg.submit')}}</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
