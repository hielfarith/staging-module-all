<?php

namespace App\Http\Controllers;

use App\Models\MasterProjectRole;
use App\Models\Project;
use App\Models\User;
use App\Models\UserProjectRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserProjectRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

    }

    public function create(Request $request)
    {
        $project = Project::where('id', $request->projects_id)->first();

        $users = User::get();
        $masterProjectRoles = MasterProjectRole::get();

        return view('admin.project.create_userprojectrole', compact('project', 'users', 'masterProjectRoles'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'projects_id' => 'required',
            'users_id' => 'required',
        ]);

        $userProjectRole = UserProjectRole::firstOrNew(['users_id' => $request->users_id, 'projects_id' => $request->projects_id, 'master_project_role_id' => $request->master_project_role_id]);
        $userProjectRole->users_id = $request->users_id;
        $userProjectRole->projects_id = $request->projects_id;
        $userProjectRole->master_project_role_id = $request->master_project_role_id;

        $userProjectRole->save();

        return redirect()->route('project.edit', $userProjectRole->projects_id);
    }

    public function show(UserProjectRole $userProjectRole)
    {
    }

    public function edit(UserProjectRole $userProjectRole)
    {

    }

    public function update(Request $request, UserProjectRole $userProjectRole)
    {

    }

    public function destroy(Request $request, UserProjectRole $userProjectRole)
    {
        $userProjectRole->delete();

        return redirect()->back();
    }
}
