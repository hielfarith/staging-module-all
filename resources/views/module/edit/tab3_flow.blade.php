<div class="form-group row d-flex flex-col align-items-stretch">

    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div id="roleFormDiv">
                @include('module.edit.roleForm')
            </div>
            <div id="taskFormDiv">
            </div>
            <div class="card-header">
                <b>FLOW MANAGEMENT</b>
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-info btn-sm float-right"
                        data-bs-toggle="tooltip" title="Retrieve latest data"
                        onclick="refreshModuleTab3()">
                        <i class="fa-solid fa-refresh"></i> Refresh
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="flowFormDiv">
                    @include('module.edit.flowForm')
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive" id="moduleFlowManagementTable">
                        @include('module.edit.flowTable')
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
