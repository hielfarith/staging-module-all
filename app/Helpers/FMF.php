<?php

namespace App\Helpers;

use App\Models\ModuleTask;
use App\Models\Module;
use App\Models\ModuleFlowManagement;
use App\Models\ModulePermission;

class FMF
{
   /*
     * Function to utilize Module Task. Checking if the user have the permission based on current module status and their role.
     * Parameter :
     * 1) id of table Module,
     * 2) id of Module Status,
     * 3) id or name of Module Permission
     *
     * Output : true or false
     */
    static function checkPermission($module_id, $status_id, $permission_input){
        $module = Module::where('id',$module_id)->with(['permissions','roles','statuses'])->first();

        if(!$module)
            return false;

        $queryCheck = ModuleTask::where('module_id',$module->id);

        //Find matching role between roles in module and roles of user
        if(\Auth::user()->hasanyrole('superadmin'))
            return true;
        else
            $listOfUserRole = \Auth::user()->roles->pluck('id')->toArray();

        if(!$listOfUserRole)
            return false;

        $moduleRoleID = $module->roles->whereIn('role_id',$listOfUserRole)->pluck('id')->toArray();

        $queryCheck->whereIn('module_role_id',$moduleRoleID);

        //Find matching permission inside module
        if(is_numeric($permission_input))
            $queryCheck->where('module_permission_id',$permission_input);
        else{
            $modulePermission = $module->permissions->where('perm_name',$permission_input)->first();
            if(!$modulePermission)
                return false;

            $queryCheck->where('module_permission_id',$modulePermission->id);
        }

        //Find matching status inside module
        $moduleStatus = $module->statuses->where('id',$status_id)->first();
        if(!$moduleStatus)
            return false;

        $queryCheck->where('module_status_id',$moduleStatus->id);

        //If active
        //    $queryCheck->where('active',1);

        if($queryCheck->count() == 0)
            return false;

        return true;
    }

    /*
     * Function to utilize Module Flow Management. List all of action possible for the user (role) based on module and status
     * Parameter :
     * 1) id of table Module,
     * 2) id of Module Status,
     *
     * Output : empty array or array of ModuleFlowManagement
     */
    static function listAction($module_id, $status_id){

        $listOfAction = [];

        $module = Module::where('id',$module_id)->with(['roles','statuses','flowManagements'])->first();
        $moduleStatus = $module->statuses->where('id',$status_id)->first();

        //Check if no module or status. return empty array
        if(!$module || !$moduleStatus)
            return $listOfAction;

        $listOfModuleRole = $module->roles->pluck('role_id','id')->toArray();
        if(\Auth::user()->hasanyrole('superadmin'))
            $listOfUserRole = \App\Models\Role::all()->pluck('id')->toArray();
        else
            $listOfUserRole = \Auth::user()->roles->pluck('id')->toArray();

        //Check if no role exists, return empty array.
        if(!$listOfUserRole)
            return $listOfAction;

        $moduleRoleID = $module->roles->whereIn('role_id',$listOfUserRole)->pluck('id')->toArray();

        $retrieveAllAction = $module->flowManagements->where('current_status',$moduleStatus->id)->whereIn('module_role_id',$moduleRoleID);

        if($retrieveAllAction?->count() != 0)
            $listOfAction = $retrieveAllAction;

        return $listOfAction;
    }

    /*
     * Function to utilize Module Task. Check the next status of the flow management.
     * Parameter :
     * 1) id of table Module,
     * 2) current_status - id of Module Status,
     * 3) action : string of action
     *
     * Output : null or next_status
     * getNextStatus($mylabapplication->module_id,$mylabapplication->module_status_id,$request->action)
     */



    // $mylabapplication->module_status_id = FMF::getNextStatus($mylabapplication->module_id,$mylabapplication->module_status_id,$request->action);
    // $mylabapplication->save();


    static function getNextStatus($module_id, $status_id, $action = null){

        $nextStatus = null;

        $module = Module::where('id',$module_id)->with(['roles','statuses','flowManagements'])->first();
        $moduleStatus = $module->statuses->where('id',$status_id)->first();

        if(!$module || !$moduleStatus)
            return $nextStatus;

        $listOfModuleRole = $module->roles->pluck('role_id','id')->toArray();
        if(\Auth::user()->hasanyrole('superadmin'))
            $listOfUserRole = \App\Models\Role::all()->pluck('id')->toArray();
        else
            $listOfUserRole = \Auth::user()->roles->pluck('id')->toArray();

        //Check if no role exists, return empty array.
        if(!$listOfUserRole)
            return $nextStatus;

        $moduleRoleID = $module->roles->whereIn('role_id',$listOfUserRole)->pluck('id')->toArray();

        $flowManagement = $module->flowManagements->where('current_status',$moduleStatus->id)->whereIn('module_role_id',$moduleRoleID)->where('action',$action);

        if($flowManagement?->count() != 0)
            $nextStatus = $flowManagement->first()->next_status;

        return $nextStatus;
    }

    static function getNextStatusWithModule($module_id, $status_id, $action = null){

        $nextStatus = null;

        $module = Module::where('id',$module_id)->with(['roles','statuses','flowManagements'])->first();
        $moduleStatus = $module->statuses->where('id',$status_id)->first();

        if(!$module || !$moduleStatus)
            return $nextStatus;

        if(\Auth::user()->hasanyrole('superadmin'))
            $listOfUserRole = \App\Models\Role::all()->pluck('id')->toArray();
        else
            $listOfUserRole = \Auth::user()->roles->pluck('id')->toArray();

        //Check if no role exists, return empty array.
        if(!$listOfUserRole)
            return $nextStatus;

        $moduleRoleID = $module->roles->whereIn('role_id',$listOfUserRole)->pluck('id')->toArray();

        $flowManagement = $module->flowManagements->where('current_status',$moduleStatus->id)->whereIn('module_role_id',$moduleRoleID)->where('action',$action);

        if($flowManagement?->count() != 0)
            $nextStatus = $flowManagement->first()->nextStatus;

        return ['module_id' => $nextStatus->module_id, 'module_status_id' => $nextStatus->id  ];
    }
}
