@php
    $read_only = $read_only ?? null;
    $modulePermission = $modulePermission ?? null;
@endphp
<div class="modal fade" id="permissionFormModal" tabindex="-1" aria-labelledby="permissionFormModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-0 bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-2 mx-50">
                <h1 class="text-center mb-1" id="addNewCardTitle">Module Permission Form</h1>
                <p class="text-center">Add/Edit Permission for Module</p>

                <form id="permissionForm" action="{{route('module.updatePermissionForm')}}" method="POST" data-refreshFunctionDivId="modulePermissionTable" data-refreshFunctionURL="{{route('module.refreshModulePermissionTable',$module)}}">
                    @csrf
                    <input type="hidden" name="module_permission_id" value="{{$modulePermission->id ?? null}}">
                    <input type="hidden" name="module_id" value="{{$module->id}}">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="perm_name">Permission Name <span class="text text-danger">*</span> </label>
                                <div class="">
                                    <select name="perm_name" id="perm_name" class="select2 form-select form-control" required>
                                        <option value="" hidden> Pilih Role</option>
                                            <option value="view form">View Form</option>
                                            <option value="fill form">Fill Form</option>
                                            <option value="verify form">Verify Form</option>
                                            <option value="approve form">Approve Form</option>
                                            <option value="query">Query</option>
                                            <option value="reject">Reject</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="perm_description">Permission Description <span class="text text-danger">*</span> </label>
                                <div class="input-group">
                                    <textarea id="perm_description" name="perm_description" class="form-control" placeholder="Description of Permission" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="btnUpdatePermissionForm" hidden onclick="generalFormSubmit(this);"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnFormFake" class="btn btn-success" onclick="$('#btnUpdatePermissionForm').trigger('click');">{{$modulePermission ? __('msg.update') : __('msg.submit')}}</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
