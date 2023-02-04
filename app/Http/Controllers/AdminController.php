<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        $admin = Admin::where('nama', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('email', 'LIKE', '%'.$keyword.'%')
                            ->paginate(5);
        return view('admin/admin', ['adminList' => $admin]);
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
        $admin = Admin::findOrFail($id);

        $admin->update($request->all());
        return redirect('/admin/admin');
    }

    public function delete(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return back()->with('info', 'Data Berhasil Dihapus');
    }

    public function create()
    {
        return view('admin/create-admin');
    }

    public function store(Request $request)
    {
        $admin = $request->validate([
            'AdminFoto' => 'image|file',
            'nama' => 'required',
            'email' => 'required|email',
            'NoTelp' => 'required|numeric',
            'password' => 'required'
        ]);

        if($request->file('AdminFoto')){
            $admin['AdminFoto'] = $request->file('AdminFoto')->store('admin-gambar');
        }

        Admin::create($admin);

        if($admin){
            Session::flash('status', 'success');
            Session::flash('message', 'Admin Baru Berhasil Ditambahkan!');
        }

        return redirect('/admin/admin');
    }
}
