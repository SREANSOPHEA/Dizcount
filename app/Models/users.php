<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
    protected $fillable = ['username','email','password','phone','telegram','role'];
}
