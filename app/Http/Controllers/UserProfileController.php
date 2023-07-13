<?php

namespace App\Http\Controllers;

use App\Notifications\ProfileUpdated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function viewUserProfile (Request $request){

        $user = Auth::user();

        return view ('user_profile.user_profile', compact('user'));
    }
}
