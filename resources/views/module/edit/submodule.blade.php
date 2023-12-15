<div class="card">
    <div class="card-header">
        <b>SUB MODULE TABLE</b>
        <div class="d-flex justify-content-end align-items-center">
            <form action="{{ route('module.addSubModule',$module) }}" method="POST" data-refreshFunctionName="refreshSubModuleDiv" data-refreshFunctionURL="{{route('module.refreshSubModuleDiv',$module)}}">
                <button type="button" class="btn btn-success btn-sm float-right" onclick="generalFormSubmit(this);">
                    <i class="fa-solid fa-add"></i> Add
                </button>
            </form>

        </div>
    </div>
    <div class="card-body">
        {{-- <form action="{{ route('module.addSubModule',$module) }}" method="POST" class="form-horizontal" autocomplete="off"> --}}
            <div class="row">
                @csrf
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="module_id" value="{{$module->id ?? null}}" />
                <div class="col-md-12 col-12">

                </div>
                <div class="col-md-12 col-12">
                    <table class="table header_uppercase table-bordered table-responsive" id="subModuleTable" width="100%">
                        <thead>
                            <tr>
                                <th class="font-weight-bold text-center" width="30%">NAME</th>
                                <th class="font-weight-bold text-center" width="5%">ACTIVE</th>
                                <th class="font-weight-bold text-center" width="5%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($module->moduleSub->count() == 0)
                            <tr class="text-center">
                                <td colspan="3">No Data Available</td>
                            </tr>
                            @endif
                            @foreach ($module->moduleSub as $subModule)
                            <tr>
                                <td>{{-- class Editable have javascript function. Please refer to index.blade of this page [Editable Table Cell] --}}
                                    <form action="{{route('module.updateSubModule')}}" method="POST" data-refreshFunctionName="refreshSubModuleDiv" data-refreshFunctionURL="{{route('module.refreshSubModuleDiv',$module)}}">
                                    @csrf
                                        <input type="hidden" name="module_sub_id" value="{{$subModule->id}}">
                                        <input type="hidden" name="type" value="name">
                                        <input type="hidden" name="module_sub_name" value="{{$subModule->module_sub_name ?? ""}}">
                                        <button type="button" id="btnUpdateSubModuleName_{{$subModule->id}}" hidden></button>
                                    </form>
                                    <div class="editable-subModuleName font-weight-normal" data-btnToClick="btnUpdateSubModuleName_{{$subModule->id}}">{!!$subModule->module_sub_name ?? "&nbsp;"!!}</div>
                                </td>
                                <td class="text-center">
                                    <form action="{{route('module.updateSubModule')}}" method="POST" data-refreshFunctionName="refreshSubModuleDiv" data-refreshFunctionURL="{{route('module.refreshSubModuleDiv',$module)}}">
                                    @csrf
                                        <input type="hidden" name="module_sub_id" value="{{$subModule->id}}">
                                        <input type="hidden" name="type" value="active">
                                        <input type="hidden" name="module_sub_active" value="{{$subModule->active ?? ""}}">
                                        <button type="button" id="btnUpdateSubModuleActive_{{$subModule->id}}" hidden></button>
                                    </form>
                                    <div class="form-check form-check-success form-switch ms-2">
                                        <input type="checkbox" class="form-check-input"
                                            data-btnToClick=""
                                            onchange="updateSubModuleActive(this,'btnUpdateSubModuleActive_{{$subModule->id}}');"
                                            {{$subModule->active ? "checked" : ""}}
                                        >
                                    </div>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('module.deleteSubModule') }}" method="POST" data-refreshFunctionName="refreshSubModuleDiv" data-refreshFunctionURL="{{route('module.refreshSubModuleDiv',$module)}}">
                                        @csrf
                                        <input type="hidden" name="module_sub_id" value="{{$subModule->id}}">
                                        <button type="button" id="btnDeleteSubModule_{{$subModule->id}}" hidden onclick="confirmBeforeSubmit(this);"></button>
                                    </form>
                                    <div class="btn-group" role="group" aria-label="Action">
                                        <a type="button" class="btn btn-outline-dark waves-effect" href="{{route('moduleSub.edit',$subModule->id)}}" data-bs-toggle="tooltip" title="Edit {{$subModule?->module_sub_name }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a type="button" class="btn btn-outline-dark waves-effect" onclick="$('#btnDeleteSubModule_{{$subModule->id}}').trigger('click');" data-bs-toggle="tooltip" title="Delete {{$subModule?->module_sub_name }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        {{-- </form> --}}
    </div>
</div>
