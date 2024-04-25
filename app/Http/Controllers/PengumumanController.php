<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Integration\IdmeController;
use App\Models\Pengumuman;
use App\Models\RoleAccess;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->token_idms) && isset($request->t) && isset($request->u)) {
            // Call the method which returns JSON response
            $responseData = $this->callIdmeApi($request);

            // Check if the response status is true and user data exists
            if ($responseData->status === true && isset($responseData->data->user->data)) {
                // Extract user data
                $userData = $responseData->data->user->data;
                $roleData = collect($responseData->data->access->level_roles)->pluck('ROLE_NAME')->toArray();

                $listRole = config('staticdata.role.jenis_peranan');

                $foundRoles = [];
                foreach ($listRole as $type) {
                    foreach($type as $key => $role) {
                        if (in_array(strtoupper($role), $roleData)) {
                            $foundRoles[] = $key;
                        }
                    }
                }

                $roleAccess = RoleAccess::get();

                $roleSPPIP = [];
                foreach ($roleAccess as $access) {
                    $columnJenis = $access->jenis; // Assuming 'jenis' is the attribute name in your model
                    $jenisArray = explode(',', $columnJenis);
                
                    foreach ($foundRoles as $foundRole) {
                        if (in_array($foundRole, $jenisArray)) {
                            // Further action here, for example:
                            $roleSPPIP[] = $access->role_id;
                        }
                    }
                }

                // Check if the user exists in the database based on no_ic and email
                $user = User::where('no_ic', $userData->NOKP)
                    ->where('email', $userData->EMAIL)
                    ->first();

                // If user doesn't exist, create a new one
                if (!$user) {
                    $user = User::create([
                        'name' => $userData->NAME,
                        'no_ic' => $userData->NOKP,
                        'email' => $userData->EMAIL,
                    ]); 

                    $user->syncRoles($roleSPPIP);
                }

                // Authenticate the user
                Auth::login($user);

                // Redirect to authenticated user's dashboard or perform any action
                return redirect()->route('pengumuman.index');
            } else {
                // Authentication failed, handle error
                return response()->json(['error' => 'Authentication failed'], 401);
            }
        } else if (Auth::check()) {
            $home = new HomeController;
            return $home->index();
        } else {
            // Missing required parameters
            return response()->json(['error' => 'Missing parameters'], 400);
        }
    }

    private function callIdmeApi($request)
    {
        // Simulate the call to IdmeController's index method
        $idmeController = new IdmeController;
        return $idmeController->index($request);
    }

    public function create(){
        return view('pengumuman.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            
            if ($request->hasfile('dokumen')) {
                $file = $request->file('dokumen');
                $name = Carbon::now()->format('YmdHis').'_'.$file->getClientOriginalName();
                $path = Storage::disk('public')->putFileAs(
                    '/pengumuman/dokumen',
                    $request->file('dokumen'),
                    $name
                );
            } else {
                $path = null;
            }

            Pengumuman::create([
                'tajuk' => $request->tajuk,
                'keterangan' => $request->keterangan,
                'dokumen' => $path,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id
            ]);

            DB::commit();
            return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Data Disimpan", 'detail' => "berjaya"]);

        } catch (\Throwable $e) {
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }
    }
}
