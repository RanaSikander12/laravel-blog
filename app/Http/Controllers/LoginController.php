<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;



class LoginController extends Controller
{
    
     public function index()
     {
        return view('auth.login');
     }

     public function check(request $req)
     {
            $rules = [
            'email' => 'required',
            'password' => 'required'
            ];

            $validate = Validator::make($req->all() , $rules);

            if($validate->fails()){
               return redirect()->route('login.index')->withErrors($validate);
            }

            $logindata = $req->only('email' ,'password');
            if(Auth::attempt($logindata)){

               $user = Auth::user();
               Session::put('user' , $user->name);
               return redirect()->route('dashboard.index');
               
            }else {
               return redirect()->route('login.index')->with('error' , 'Invalid Credentials');
            }            
     }
}