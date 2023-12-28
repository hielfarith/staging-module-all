@extends('layouts.app')

 
@section('header')
    @if($module)
        {{__('msg.customEdit', ['item' => __('msg.module')])}}
    @else
        {{__('msg.customCreate', ['item' => __('msg.module')])}}
    @endif
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('msg.home')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('module.index')}}"> {{__('msg.customList', ['item' => __('msg.module')])}}</a></li>
    <li class="breadcrumb-item"><a>  {{__('msg.module')}} ( {{'Create'}} ) </a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        <!-- /.info-box -->
        <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item">
                <a class="text-uppercase nav-link active " id="formA-tab" data-bs-toggle="tab" href="#formA" aria-controls="formA" role="tab" aria-selected="true"> Module Information </a>
            </li>
            @if($module)
            <li class="nav-item">
                <a class="text-uppercase nav-link " id="formB-tab" data-bs-toggle="tab" href="#formB" aria-controls="formB" role="tab" aria-selected="true"> Role, Status and Permission Management </a>
            </li>
            <li class="nav-item">
                <a class="text-uppercase nav-link " id="formC-tab" data-bs-toggle="tab" href="#formC" aria-controls="formC" role="tab" aria-selected="true" onclick="refreshModuleTab3()"> Flow Management </a>
            </li>
            @endif
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="formA" role="tabpanel" aria-labelledby="formA-tab">
                @include('module.edit.tab1_module_information')
            </div>
            @if($module)
            <div class="tab-pane fade" id="formB" role="tabpanel" aria-labelledby="formB-tab">
                @include('module.edit.tab2_module_role_and_status')
            </div>
            <div class="tab-pane fade" id="formC" role="tabpanel" aria-labelledby="formC-tab">
                @include('module.edit.tab3_flow')
            </div>
            @endif
        </div>

    </div>
</div>
@endsection

@section('script')
{{-- Tab 1 Module Information --}}

{{-- END Tab 1 Module Information --}}
{{-- Tab 2 Module Role, Status and Permission --}}
    {{-- General  --}}
        <script>
            refreshModuleTab2 = function(url){
                event.preventDefault();
                //Generally, when submit success, close all modal.
                $("[data-bs-dismiss=modal]").trigger({ type: "click" });
                //Load and redeclare
                $('#formB').load(url,function(){

                });
            }
        </script>
    {{-- End General --}}
    {{-- Module Role  --}}
        <script>

            viewModuleRoleForm = function(role_id = null){

                var roleFormModal;
                roleFormModal = new bootstrap.Modal(document.getElementById('roleFormModal'), { keyboard: false});

                event.preventDefault();
                if(role_id === null){
                    $('#roleForm input[name="module_role_id"]').val("");
                    $('#roleForm select[name="role_id"] option').each(function(){
                        $(this).removeAttr('selected')
                    });
                    $('#roleForm select[name="role_id"]').trigger('change');
                    $('#roleForm textarea[name="role_description"]').val("");
                    $('#btnUpdateRoleFormFake').html('{{__("msg.submit")}}');
                    roleFormModal.show();
                }else{
                    url = "{{route('module.getModuleRole',':replaceThis')}}"
                    url = url.replace(':replaceThis',role_id);
                    $.ajax({
                        url: url,
                        method: 'GET',
                        async: true,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            // console.log(data);

                            $('#roleForm input[name="module_role_id"]').val(data.detail.id);
                            $('#roleForm select[name="role_id"] option').each(function(){
                                if(data.detail.role_id == parseInt(this.value))
                                    $(this).attr('selected','selected')
                                else
                                    $(this).removeAttr('selected')
                            });
                            $('#roleForm select[name="role_id"]').trigger('change');
                            $('#roleForm input[name="role_name"]').val(data.detail.role_name);
                            $('#roleForm textarea[name="role_description"]').val(data.detail.role_description);
                            $('#btnUpdateRoleFormFake').html('{{__("msg.update")}}');
                            roleFormModal.show();
                        },
                    });
                }
            };

        </script>
    {{-- END Module Role  --}}
    {{-- Module Status  --}}
        <script>

            viewModuleStatusForm = function(role_id = null){
                var statusFormModal;
                statusFormModal = new bootstrap.Modal(document.getElementById('statusFormModal'), {keyboard: false});

                event.preventDefault();
                if(role_id === null){
                    $('#statusForm input[name="status_index"]').closest('.col-12').hide();
                    $('#statusForm input[name="status_index"]').val("");
                    $('#statusForm input[name="status_name"]').val("");
                    $('#statusForm input[name="status_name"]').val("");
                    $('#statusForm input[name="status_color"]').each(function(){
                        this.checked = false;
                    });
                    $('#statusForm textarea[name="status_description"]').val("");
                    $('#statusForm input[name="module_status_id"]').val("");
                    $('#btnUpdateStatusFormFake').html('{{__("msg.submit")}}');
                    statusFormModal.show();
                }else{
                    url = "{{route('module.getModuleStatus',':replaceThis')}}"
                    url = url.replace(':replaceThis',role_id);
                    $.ajax({
                        url: url,
                        method: 'GET',
                        async: true,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            console.log(data);

                            $('#statusForm input[name="status_index"]').closest('.col-12').show();
                            $('#statusForm input[name="status_index"]').val(data.detail.status_index);
                            $('#statusForm input[name="status_name"]').val(data.detail.status_name);
                            $('#statusForm textarea[name="status_description"]').val(data.detail.status_description);
                            $('#statusForm input[name="status_color"]').each(function(){
                                if($(this).val() == data.detail.status_color)
                                    this.checked = true;
                                else
                                    this.checked = false;
                            });
                            $('#statusForm input[name="module_status_id"]').val(data.detail.id);
                            $('#statusForm input[name="module_id"]').val(data.detail.module_id);
                            $('#btnUpdateStatusFormFake').html('{{__("msg.update")}}');
                            statusFormModal.show();
                        },
                    });
                }
            }

        </script>
    {{-- END Module Status  --}}
    {{-- Module Permission  --}}
        <script>

            viewModulePermissionForm = function(id = null){
                var permissionFormModal;
                permissionFormModal = new bootstrap.Modal(document.getElementById('permissionFormModal'), {keyboard: false});

                event.preventDefault();
                if(id === null){
                    $('#permissionFormModal input[name="perm_name"]').val("");
                    $('#permissionFormModal textarea[name="perm_description"]').val("");
                    $('#permissionFormModal input[name="module_permission_id"]').val("");
                    $('#permissionFormModal #btnFormFake').html('{{__("msg.submit")}}');
                    permissionFormModal.show();
                }else{
                    url = "{{route('module.getModulePermission',':replaceThis')}}"
                    url = url.replace(':replaceThis',id);
                    $.ajax({
                        url: url,
                        method: 'GET',
                        async: true,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            // console.log(data);

                            $('#permissionFormModal input[name="perm_name"]').val(data.detail.perm_name);
                            $('#permissionFormModal textarea[name="perm_description"]').val(data.detail.perm_description);
                            $('#permissionFormModal input[name="module_permission_id"]').val(data.detail.id);
                            $('#permissionFormModal input[name="module_id"]').val(data.detail.module_id);
                            $('#permissionFormModal #btnFormFake').html('{{__("msg.update")}}');
                            permissionFormModal.show();
                        },
                    });
                }
            }
        </script>
    {{-- END Module Permission  --}}
    {{-- Module Task  #load modal using Controller --}}
    <script>
        viewModuleTaskForm = function(id = null){

            $('#taskFormDiv').html("");
            event.preventDefault();
            url = "{{route('module.getModuleTaskForm',':replaceThis')}}"
            url = url.replace(':replaceThis',id);
            $('#taskFormDiv').load(url,function(){
                var taskFormModal;
                taskFormModal = new bootstrap.Modal(document.querySelector('#taskFormDiv .modal'), { keyboard: false});
                taskFormModal.show();
            });
        };
    </script>
    {{-- END Module Task  --}}
{{-- END Tab 2 Module Role, Status and Permission  --}}
{{-- Tab 3 Flow Management --}}
    {{-- General  --}}
        <script>
            refreshModuleTab3 = function(url = null){
                addLoader();
                event.preventDefault();
                if(!url)
                    url = "{{route('module.refreshModuleTab3',$module->id ?? 0)}}"
                //Generally, when submit success, close all modal.
                $("[data-bs-dismiss=modal]").trigger({ type: "click" });
                //Load and redeclare
                $('#formC').load(url,function(){
                    removeLoader();
                });
            }
        </script>
    {{-- End General --}}
{{-- END Tab 3 Flow Management  --}}
@endsection
