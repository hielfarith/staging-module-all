<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use App\Models\Role;
use App\Models\RoleAccess;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $permissions = Permission::get();
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $roles = Role::paginate(5);


        if($request->ajax()) {

            $listOfRole = Role::orderBy('id');
            return Datatables::of($listOfRole)
                ->editColumn('name', function ($Role) {
                    return $Role->name;
                })
                ->editColumn('description', function ($Role) {
                    return $Role->description;
                })
                ->editColumn('display_name', function ($Role) {
                    return $Role->display_name;
                })
                ->editColumn('action', function ($Role) {
                    $button = "";
                    $button .= '<div class="btn-group " role="group" aria-label="Action">';

                    $button .= '<a href="'.route('role.show', $Role).'" class="btn btn-xs btn-default " title=""> <i class="fas fa-eye text-primary"></i> </a>';

                    $button .= '<a href=" '.route('role.edit', $Role).' " class="btn btn-xs btn-default"> <i class="fas fa-pencil text-primary"></i> </a>';



                    $button .= "</div>";
                    // dd($button);

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.role.index', compact('roles','permissions'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        // Validator::make($request->all(), [
        //     'name' => 'required|string|unique:role',
        //     'description' => 'required|string',
        //     'display_name' => 'required|string',
        // ]);

        // $role = Role::create(['name' => $request->name, 'description' => $request->description, 'display_name' => $request->role_display, 'guard_name' => 'web']);

        // if ($request->permissions) {
        //     foreach ($request->permissions as $permission) {
        //         $role->givePermissionTo($permission);
        //     }
        // }

        Validator::make($request->all(), [
            'name' => 'required|string|unique:role',
            'description' => 'required|string',
            'display_name' => 'required|string',
        ]);
        if (isset($request->dynamic)) {
            $dynamic = 1;
        } else {
            $dynamic = 0;
        }
        $role = Role::create([
            'name' => $request->role_name, 
            'description' => $request->role_description, 
            'display_name' => $request->role_display, 
            'guard_name' => 'web', 
            'dynamic' => $dynamic
        ]);

        if($role){
            RoleAccess::create([
                'role_id' => $role->id,
                'modul' => $request->modul,
                'proses' => $request->proses,
                'capaian' => $request->capaian,
                'jenis' => $request->jenis,
            ]);
        }


        return redirect()->route('role.index');
    }

    public function show(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.role.show', compact('role', 'permissions'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $access = $role->access;
        return view('admin.role.edit', compact('role', 'permissions', 'access'));
    }

    public function update(Request $request,$id_used)
    {
        DB::beginTransaction();
        try{
            // $validatedData = $request->validate([
            //     'role_name' => 'required|string',
            //     'role_description' => 'required|string',
            //     'role_display' => 'required|string',
            // ]);

            if($id_used)
                $role = Role::find($id_used);
            else
                $role = new Role;


            $role->name = $request->role_name;
            $role->description = $request->role_description;
            $role->display_name = $request->role_display;
            // $role->update($request->only('role_name', 'role_description','role_display'));
            //$role->syncPermissions($request->permissions ? $request->permissions : []);
            $role->save();
            DB::commit();

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        return to_route('role.index', [$role]);
    }

    public function destroy(Request $request, Role $role)
    {
        $role->delete();

        return redirect()->route('role.index');
    }

    public function getRole(Request $request,Role $roleId){

        DB::beginTransaction();
        $permissions = Permission::all();

        try{

            $role = $roleId;
            $role->listOfPermission = $role->permissions->pluck('id')->toArray();
            if(!$role)
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => "Role not found. Please refresh"],404);

        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()],404);
        }

        DB::commit();
        return view('admin.role.edit', compact('role', 'permissions'));    }
}
