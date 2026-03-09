<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{

    function login(){
        return view('admin.login');
    }

    function loginSubmit(Request $request){
        $username = $request->username;
        $password = $request->password;
        if($username == 'admin' && $password == '123'){
            return redirect('admin/');
        }else{
            return back()->with('error',' ');
        }
    }

    function dashboard(){
        return view("admin.dashboard");
    }






}
