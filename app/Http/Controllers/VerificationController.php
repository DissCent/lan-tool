<?php

namespace App\Http\Controllers;

use App\Models\UsersVerification;

class VerificationController extends Controller
{
    public function verifyAccount($token)
    {
        $verifyUser = UsersVerification::where('token', $token)->first();

        if (!is_null($verifyUser)) {
            $verifyUser->user;

            $verifyUser->user->email_verified_at = date('Y-m-d H:i:s');
            $verifyUser->user->save();
            $verifyUser->delete();

            return view('verified');
        } else {
            return redirect('/login');
        }
    }
}
