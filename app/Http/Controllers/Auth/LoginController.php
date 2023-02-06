<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index()
    {
        return view('layout/login/login');
    }

    function login(Request $request)
    {
        // dd('test');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $infologin =  [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        return view('layout/admin/panel');

    }
}
