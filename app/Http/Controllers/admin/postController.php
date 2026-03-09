<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class postController extends Controller
{
    function viewPost(){
        return view("admin.viewPost");
    }

    function uploadPost(){
        return view("admin.uploadPost");
    }
}
