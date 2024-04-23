<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Integration\IdmeController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
