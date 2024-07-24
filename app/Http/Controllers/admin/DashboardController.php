<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class DashboardController extends Controller
{
    public function index()
    {

        if(!Session::has('user')){
            return redirect()->route('login.index');
        }else { 
            return view('admin.index');
        }
    }
}