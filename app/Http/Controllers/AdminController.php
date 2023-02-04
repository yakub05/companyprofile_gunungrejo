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

    public function edit($nama)
    {
        $admin = Admin::get()->where('nama', $nama)->first();
        return view('admin/edit-admin', ['admin' => $admin]);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrfail($id);

        $admin->update($request->all());
        return redirect('/admin/admin');
    }

    public function delete(Request $request, $id)
    {
        $admin = Admin::findOrfail($id);
        $admin->delete();
        return back()->with('info', 'Data Berhasi di Hapus');
    }
}
