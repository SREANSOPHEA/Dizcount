<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function uploadImage($file){
        $image = rand(0,9999)."-".$file->getClientOriginalName();
        $file->move('assets/img/',$image);
        return $image;
    }

}
