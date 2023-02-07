<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'AdminFoto',
        'nama',
        'email',
        'password',
        'NoTelp'
    ];
    
    public function setPasswordAttribute($password)
    {
        if (trim($password) === ''){
            return;
        }
        
        $this->attributes['password'] = Hash::make($password);
    }
}
