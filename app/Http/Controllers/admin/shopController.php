<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class shopController extends Controller
{
    function viewShop(){
        return view("admin.viewShop");
    }

    function addShop(){
        return view("admin.addShop");
    }
}
