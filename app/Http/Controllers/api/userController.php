<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\users;
use Illuminate\Http\Request;

class userController extends Controller
{
    function user(){
        $data = users::all();
        return response()->json(['message' => 'success','data' => $data]);
    }
}
