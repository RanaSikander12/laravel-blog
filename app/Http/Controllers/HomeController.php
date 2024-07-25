<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;

class HomeController extends Controller
{
    public function index()
    {
       $data['posts'] = blog::orderby('created_at' , 'desc')->get();
        return view('frontend.index' , $data);
    }

    public function read($id)
    {
        $data['post'] = blog::find($id);    
        return view('frontend.blogread' , $data);
    }
}