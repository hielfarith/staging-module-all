<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
     */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        // dd($request->all());
        \DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'reset_password_old' => 'required|string|min:8',
                'reset_password_new' => 'required|string|min:8',
                'reset_password_confirm' => 'required|same:reset_password_new',
            ],[
                'reset_password_old.required' => 'Current password field is required',
                'reset_password_new.required' => 'New password field is required',
                'reset_password_confirm.required' => 'Retype password field is required',
            ]);

            if (Hash::check($request->reset_password_old, auth()->user()->password)) {

                User::whereId(auth()->user()->id)->update(['password' => Hash::make($request->reset_password_new)]);
                $user = auth()->user();

            } else {
                return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => 'Wrong Current Password'], 404);
            }

        } catch (Throwable $e) {

            \DB::rollBack();
            return response()->json(['title' => 'Gagal', 'status' => 'error', 'detail' => $e->getMessage()], 404);
        }

        \DB::commit();
        return response()->json(['title' => 'Berjaya', 'status' => 'success', 'message' => "Berjaya", 'detail' => "berjaya"]);

    }
}
