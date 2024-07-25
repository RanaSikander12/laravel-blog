<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\blog;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {

        if(!Session::has('user')){
            return redirect()->route('login.index');
        }else { 
            $id = Auth::id();
            $data['posts'] = blog::where('user_id' , $id)->get();
            return view('admin.index' , $data);
        }
    }

    public function add()
    {
            return view('admin.add');
    }

    public function save(request $req)
    {
        $rules = [
            'title' =>  'required',
            'content' => 'required'
        ];

        $validator = Validator::make($req->all() , $rules);
        if($validator->fails())
        {
            return redirect()->route('dashboard.post.add')->withInput()->withErrors($validator);
        }

        $userid = Auth::id();
        $blog =  new blog();
        $blog->title = $req->title;
        $blog->content = $req->content;
        $blog->user_id = $userid; 
        $blog->created_at = carbon::now();
        $blog->save();

       return redirect()->route('dashboard.index')->with('success' , 'Post has been added !');
    }


     public function edit($id)
     {
         $data['post'] = blog::find($id);
         return view('admin.edit' , $data);
     }


     public function update(request $req , $id){
            blog::where('id' , $id)->update([
                'title' => $req->title,
                'content' => $req->content,
            ]);
         return redirect()->route('dashboard.index')->with('success' , 'Post has been updated !'); 
     }


     public function delete($id)
     { 
           blog::where('id' , $id)->delete();
           return redirect()->route('dashboard.index')->with('success' , 'Post has been deleted !');
     }

    public function logoutUser()
    {
        Session::flush();
        return redirect()->route('login.index');
    }
}