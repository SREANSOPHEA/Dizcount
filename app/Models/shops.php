<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shops extends Model
{
    protected $fillable = ['name','location','logo_url','phone','telegram','created_by'];
}
