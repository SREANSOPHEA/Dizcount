<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shops extends Model
{
    protected $fillable = ['name','location','logo_url','phone','telegram','created_by'];

    function socialMedia(){
        return $this->hasMany(social_media::class,'shop_id');
    }

    public function post(){
        return $this->hasMany(posts::class,'shop_id');
    }
}
