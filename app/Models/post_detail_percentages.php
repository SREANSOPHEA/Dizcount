<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post_detail_percentages extends Model
{
    protected $fillable = ['post_id','discount'];

    public function post(){
        return $this->belongsTo(posts::class);
    }
}
