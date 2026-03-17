<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post_detail_frees extends Model
{
    protected $fillable = ['post_id','free_item','free_quantity','free_img'];

    public function post(){
        return $this->belongsTo(posts::class);
    }
}
