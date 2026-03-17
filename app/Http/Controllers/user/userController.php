<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\posts;
use App\Models\shops;
use Illuminate\Http\Request;

class userController extends Controller
{

    function home(){
        $shops = shops::all();

        $posts = posts::with(['shop','discount_percentage','discount_free'])
                ->where('start_date', '<=', now())
                ->where('end_date', '>=', now())
                ->get();

        // return $posts;

        // return $posts;
        return view('user.home',['posts'=>$posts,'shops'=>$shops]);
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
