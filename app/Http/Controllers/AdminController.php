<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::get();
        return view('admin/admin', ['adminList' => $admin]);
    }

    public function show($nama)
    {
        $admin = Admin::get()->where('nama', $nama)->first();
        return view('admin/detail-admin', ['admin' => $admin]);
    }
}
