<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class LoginController extends Controller
{
    function index()
    {
        return view('layout/login/login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(!$request){
            return redirect('/login');
        }
        $user = Admin::where('email', $request->email)->first();
        // dd($user);

        if(!$user){
            return redirect('/login');
        }
        if(Auth::Attempt([
            'email'     => $request->email,
            'password'  => $request->password,
        ])){
            // cara 1 toast
            return redirect('/admin/home');
        }
        return redirect('/login');

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
