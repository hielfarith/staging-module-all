<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleRole;
use App\Models\ModuleStatus;
use App\Models\ModulePermission;
use App\Models\ModuleTask;
use App\Models\ModuleFlowManagement;
use App\Models\NewForm;
use App\Models\InstrumenSkpakSpksIkeps;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helpers\FMF;

class ModuleController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','auth.restricted_access']);
    }

    public function index()
    {
        $allModule = Module::paginate(5);
        // dd($allModule);

        return view('module.list', compact('allModule'));
    }

    public function create()
    {
        $modules = NewForm::all();
        $module = null;

        return view('module.edit.index', compact('module', 'modules'));
    }

    public function edit(Request $request, $id)
    {
        $module = Module::find($id);

        return view('module.edit.index', compact('module'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try{
            $validatedData = $request->validate([
                'module_name' => 'required|string'
            ]);

            if($request->module_id)
                $module = Module::find($request->module_id);
            else
                $module = new Module;

            $module->module_name = $request->module_name;
            $module->module_short_name = $request->module_short_name;
            $module->module_description = $request->module_description;
            $module->active = $request->has('active');
            $module->module_type = $request->module_type;
            $module->save();

            session()->put('success', 'Success');
            DB::commit();

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        return to_route('module.edit', [$module]);
    }

    public function destroy(Request $request, $id)
    {
        try{

            $module = Module::where('id',$id)->first();
            
            $module->delete();

            session()->put('success', 'Success');

        } catch (\Throwable $e) {
            session()->put('error', 'Failed');
        }

        return back();
    }

    public function refreshModuleTab2(Request $request, Module $module)
    {

        return view('module.edit.tab2_module_role_and_status', compact('module'));
    }

    public function refreshModuleRoleTable(Request $request, Module $module)
    {

        return view('module.edit.roleTable', compact('module'));
    }

    public function getModuleRole(Request $request, ModuleRole $moduleRole)
    {
        DB::beginTransaction();
        try{

            if(!$moduleRole)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module Role not found. Please refresh"],404);

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => $moduleRole]);
    }

    public function updateRoleForm(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try{

            $validatedData = $request->validate([
                'role_id' => 'required|numeric',
                'role_description' => 'required'
            ]);

            if(!$request->module_id)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module not found. Please refresh"],404);

            if(!$request->module_role_id){
                $checkIfAlreadyExists = ModuleRole::where('module_id',$request->module_id)->where('role_id',$request->role_id)->first();
                if($checkIfAlreadyExists)
                    return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Role already exists. Insert another role"],404);
            }

            if($request->module_role_id)
                $moduleRole = ModuleRole::find($request->module_role_id);
            else
                $moduleRole = new ModuleRole;

            $moduleRole->module_id = $request->module_id;
            $moduleRole->role_id = $request->role_id;
            $moduleRole->role_description = $request->role_description;
            $moduleRole->active = 1;

            $moduleRole->save();

            //ignore model has permission

            // $deleteAllTask = PermissionTask::where('entity_type','App\Models\Module')->where('entity_id',$request->module_id)
            // ->where('role_type','App\Models\ModuleRole')->where('role_id',$moduleRole->id)->delete();

            // if($request->permissionTask){
            //     foreach($request->permissionTask as $task){
            //         $input = null;
            //         $input = explode('_',$task);
            //         $permission_id = $input[0];
            //         $status_id = $input[1];

            //         $data =  array(
            //                     'entity_type'=>'App\Models\Module',
            //                     "entity_id"=>$request->module_id,
            //                     "role_type"=>'App\Models\ModuleRole',
            //                     "role_id"=>$moduleRole->id,
            //                     "status_id"=>$status_id,
            //                     "permission_id"=>$permission_id,
            //                     'active'=>1
            //                 );
            //         DB::table('permissions_tasks')->insert($data);
            //     }
            // }


        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya"]);
    }

    public function deleteRole(Request $request)
    {
        DB::beginTransaction();
        try{

            if(!$request->module_role_id)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module Role not found. Please refresh"],404);

            $moduleRole = ModuleRole::where('id',$request->module_role_id)->first();
            // later add permission removal
            $moduleRole->delete();

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya"]);
    }

    public function refreshModuleStatusTable(Request $request, Module $module)
    {

        return view('module.edit.statusTable', compact('module'));
    }

    public function getModuleStatus(Request $request, ModuleStatus $moduleStatus)
    {
        DB::beginTransaction();
        try{

            if(!$moduleStatus)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module Status not found. Please refresh"],404);

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => $moduleStatus]);
    }

    public function updateStatusForm(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try{

            $validatedData = $request->validate([
                'status_name' => 'required',
                'status_description' => 'required'
            ]);

            if(!$request->module_id)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module not found. Please refresh"],404);

            if($request->module_status_id){
                $moduleStatus = ModuleStatus::find($request->module_status_id);
                $checkIndexExists = ModuleStatus::where('module_id',$moduleStatus->module_id)->where('status_index',$request->status_index)->where('id','!=',$request->module_status_id)->first();
                if($checkIndexExists)
                    return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Index already exists"],404);
                else
                    $moduleStatus->status_index = $request->status_index;
            }
            else{
                $moduleStatus = new ModuleStatus;
                 //calculate the index incrementing, so status_index always start at 1
                $maxIndex = 1;
                $checkBeginningIndex = ModuleStatus::where('module_id',$request->module_id)->orderBy('status_index','asc')->first();
                if($checkBeginningIndex){
                    if($checkBeginningIndex->status_index == 1){
                        $maxIndexArray = DB::select('SELECT MIN(status_index) + 1 AS max_index FROM module_status t1 WHERE NOT EXISTS ( SELECT 1 FROM module_status t2 WHERE status_index = t1.status_index + 1 AND t2.module_id = ? ) AND t1.module_id = ?',[$request->module_id,$request->module_id] );
                        if($maxIndexArray[0]->max_index){
                            $maxIndex = $maxIndexArray[0]->max_index;
                        }
                    }
                }
                $moduleStatus->status_index = $maxIndex;
            }

            $moduleStatus->module_id = $request->module_id;
            $moduleStatus->status_name = $request->status_name;
            $moduleStatus->status_color = $request->status_color;
            $moduleStatus->status_description = $request->status_description;
            $moduleStatus->active = 1;

            $moduleStatus->save();

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya"]);
    }

    public function deleteStatus(Request $request)
    {
        DB::beginTransaction();
        try{

            if(!$request->module_status_id)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module Status not found. Please refresh"],404);

            $moduleStatus = ModuleStatus::where('id',$request->module_status_id)->first();
            // later add permission removal
            $moduleStatus->delete();

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya"]);
    }

    public function refreshModulePermissionTable(Request $request, Module $module){

        return view('module.edit.permissionTable', compact('module'));
    }

    public function getModulePermission(Request $request, ModulePermission $modulePermission){

        DB::beginTransaction();
        try{

            if(!$modulePermission)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module Permission not found. Please refresh"],404);

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => $modulePermission]);
    }

    public function updatePermissionForm(Request $request){

        // dd($request->all());
        DB::beginTransaction();

        try{

            $validatedData = $request->validate([
                'perm_name' => 'required',
                'perm_description' => 'required'
            ]);

            if(!$request->module_id)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module not found. Please refresh"],404);

            if($request->module_permission_id){
                $modulePermission = ModulePermission::find($request->module_permission_id);
            }
            else{
                $modulePermission = new ModulePermission;
            }

            $modulePermission->module_id = $request->module_id;
            $modulePermission->perm_name = $request->perm_name;
            $modulePermission->perm_description = $request->perm_description;
            $modulePermission->active = 1;

            $modulePermission->save();

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya"]);
    }

    public function deletePermission(Request $request){

        DB::beginTransaction();
        try{

            if(!$request->module_permission_id)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module Permission not found. Please refresh"],404);

            $modulePermission = ModulePermission::where('id',$request->module_permission_id)->first();
            // later add permission removal
            $modulePermission->delete();

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya"]);
    }

    public function getModuleTaskForm(Request $request, ModuleRole $moduleRole){

        if(!$moduleRole)
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module Role not found. Please refresh"],404);

        $module = Module::where('id',$moduleRole->module_id)->with('tasks','permissions','statuses')->first();

        return view('module.edit.taskForm', compact('moduleRole','module'));
    }

    public function updateTaskForm(Request $request){

        // dd($request->all());
        DB::beginTransaction();

        try{

            $validatedData = $request->validate([
                'module_role_id' => 'required',
            ], [
                'module_role_id.required' => 'Role is not selected',
            ]);

            if(!$request->module_id)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module not found. Please refresh"],404);

            //delete all tasks related to the module and selected role
            $deletedTasks = ModuleTask::where('module_id',$request->module_id)->where('module_role_id',$request->module_role_id)->delete();

            //added task one by one into db
            if($request->tasks){
                foreach($request->tasks as $task => $value){
                    $input = null;
                    $input = explode('__',$task);
                    $permission_id = $input[0];
                    $status_id = $input[1];

                    $data =  array(
                                'module_id'=>$request->module_id,
                                "module_role_id"=>$request->module_role_id,
                                "module_permission_id"=>$permission_id,
                                "module_status_id"=>$status_id,
                                'active'=>1
                            );
                    DB::table('module_task')->insert($data);
                }
            }

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya"]);
    }

    public function refreshModuleTab3(Request $request, Module $module)
    {
        return view('module.edit.tab3_flow', compact('module'));
    }

    public function refreshFlowManagementTable(Request $request, Module $module)
    {
        return view('module.edit.flowTable', compact('module'));
    }

    public function updateFlowManagement(Request $request)
    {
        // dd($request->all());
       $validate =  Validator::make($request->all(), [
            'current_status' => 'required|numeric',
            'module_role_id' =>'required',
            'action' =>'required|string',
            'next_status' =>'required|numeric',
        ]);
        if($validate->fails()){
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'errors' => $validate->errors()],404);
        }

        DB::beginTransaction();
        try{

            if(!$request->module_id)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Error occured. Could not add/edit"],404);

            $checkIfAlreadyExists = ModuleFlowManagement::where('module_id',$request->module_id)->where('current_status',$request->current_status)->where('module_role_id',$request->module_role_id)->where('action',$request->action)->where('next_status',$request->next_status)->first();
            if($checkIfAlreadyExists)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Flow already exists"],404);

            //Constraint, Current Status could not be equal to Next Status
            if($request->current_status == $request->next_status )
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Current Status can not be same as Next Status"],404);
            $roles = $request->module_role_id;
            foreach ($roles as $key => $value) {
                if($request->module_flow_management_id)
                    $moduleFlow = ModuleFlowManagement::find($request->module_flow_management_id);
                else
                    $moduleFlow = new ModuleFlowManagement;

                $moduleFlow->module_id = $request->module_id;
                $moduleFlow->current_status = $request->current_status;
                $moduleFlow->module_role_id = $value;
                $moduleFlow->action = $request->action;
                $moduleFlow->next_status = $request->next_status;
                $moduleFlow->active = 1;

                $moduleFlow->save();
            }

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya"]);
    }

    public function deleteFlowManagement(Request $request)
    {
        DB::beginTransaction();
        try{

            if(!$request->module_flow_management_id)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Module Flow Management not found. Please refresh"],404);
            $module = ModuleFlowManagement::where('id',$request->module_flow_management_id)->first();
            $deletedFlowManagement = ModuleFlowManagement::where('module_id',$module->module_id)->where('current_status', $module->current_status)->where('next_status', $module->next_status)->where('action',$module->action)->delete();;

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya"]);
    }

    public function viewModuleTypes(Request $request)
    {
        $type = $request->module_type ;
        if ($type == 'NewForm') {
            $formData = NewForm::all();
        } elseif($type == 'SEDIA') {
            $formData = InstrumenSkpakSpksIkeps::whereIn('type', ['SEDIA', 'SKIPS'])->get();
        } elseif($type == 'SKIPS') {
            $formData = InstrumenSkpakSpksIkeps::where('type', 'SKIPS')->get();
        }
        return ['formdata' => $formData];

   }

}
