<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class social_media extends Model
{
    protected $fillable = ['shop_id','platform','url'];
    function shop(){
        return $this->belongsTo(shops::class,'shop_id');
    }
}
