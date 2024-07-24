<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function save(request $req) 
    {
          $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
          ];

          $validate = Validator::make($req->all() , $rules);
          if($validate->fails()){
            return redirect()->route('register.index')->withInput()->withErrors($validate);
          }

          $email = $req->email;
          $return = User::where('email' , $email)->get();
          $arr = $return->toArray();
          
          if($arr) {
             return redirect()->route('register.index')->with('error' , 'user with this email already exists !')->withInput();
          }else {
            $adduser = new User($req->all());
            $adduser->save();

            return redirect()->route('login.index')->with('success' , 'Your Account has been Created !');
          }

        

    
    }
}