<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class users extends Authenticatable implements JWTSubject
{
    //
    protected $fillable = ['username','email','password','phone','telegram','role'];

    public function post(){
        return $this->hasMany(posts::class,'created_by');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // Add custom claims like role to the JWT
        return [
            'role' => $this->role,
        ];
    }
}
