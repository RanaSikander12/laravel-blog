<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;


class ResetPasswordController extends Controller
{
    public function index() 
    {
        return view('auth.reset.forget');
    }

    function reset_password (Request $request) {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if($status === Password::RESET_LINK_SENT){
            return redirect()->route('password.request')->with('status' , __($status));
        }else { 
            return redirect()->route('password.request')->with('email' , __($status));
        }
    }

    public function password_token ($token)
    {
       return view('auth.reset.reset-password', ['token' => $token]);
    }


    function reset(Request $request) {
        $data = $request->only('email', 'password');
    
        $user = User::where('email', $data['email'])->first();
    
        if ($user) {
            $user->password = $request->password;
            $user->save();
    
            event(new PasswordReset($user));
    
            return redirect()->route('password.request')->with('status', __('Password has been reset!'));
        } else {
            return back()->withErrors(['email' => __('User not found.')]);
        }
    }
}