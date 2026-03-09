<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{

    function home(){
        return view('user.home');
    }

    function about(){
        return view('user.about');
    }

    function contact(){
        return view('user.contact');
    }

    function viewPost($id){
        // return $id;
        return view("user.viewPost");
    }
}
