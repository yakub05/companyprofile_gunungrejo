<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
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
