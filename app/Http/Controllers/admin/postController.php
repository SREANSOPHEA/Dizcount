<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class postController extends Controller
{
    function viewPost(){



        $datas = [
            ["1","Pizza Shop","Pizza","f1.png","10","10%","1-Jan-2026","5-Jan-2026"],
            ["2","Burger Shop","Burger","f2.png","3","10%","1-Jan-2026","5-Jan-2026"],
            ["3","Pizza Shop","Pizza","f3.png","10","10%","1-Jan-2026","5-Jan-2026"],
            ["4","Food Shop","Food","f4.png","10","10%","1-Jan-2026","5-Jan-2026"],
            ["5","FashFood Shop","French Fried","f5.png","10","10%","1-Jan-2026","5-Jan-2026"],
            ["6","Pizza Shop","Pizza","f6.png","10","10%","1-Jan-2026","5-Jan-2026"],
            ["7","Burger Shop","Burger","f7.png","10","10%","1-Jan-2026","5-Jan-2026"],
            ["8","Burger Shop","Burger","f8.png","10","10%","1-Jan-2026","5-Jan-2026"],
            ["9","Pasta Shop","Pasta","f9.png","10","10%","1-Jan-2026","5-Jan-2026"],
        ];
        return view("admin.viewPost",['datas'=>$datas]);
    }

    function uploadPost(){
        return view("admin.uploadPost");
    }
}
