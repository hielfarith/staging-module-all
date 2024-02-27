<div class="form-group row d-flex flex-col align-items-stretch">

    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div id="roleFormDiv">
                @include('module.edit.roleForm')
            </div>
            <div id="taskFormDiv">
            </div>
            <div class="card-header">
                <b>ROLE MANAGEMENT</b>
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-success btn-sm float-right" onclick="viewModuleRoleForm()">
                        <i class="fa-solid fa-add"></i> Tambah
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive" id="moduleRoleTable">
                        @include('module.edit.roleTable')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div id="statusFormDiv">
                @include('module.edit.statusForm')
            </div>
            <div class="card-header">
                <b>STATUS MANAGEMENT</b>
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-success btn-sm float-right" onclick="viewModuleStatusForm()">
                        <i class="fa-solid fa-add"></i> Tambah
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive" id="moduleStatusTable">
                        @include('module.edit.statusTable')
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div id="roleFormDiv">
                @include('module.edit.permissionForm')
            </div>
            <div class="card-header">
                <b>PERMISSION MANAGEMENT</b>
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-success btn-sm float-right" onclick="viewModulePermissionForm()">
                        <i class="fa-solid fa-add"></i> Tambah
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive" id="modulePermissionTable">
                        @include('module.edit.permissionTable')
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
