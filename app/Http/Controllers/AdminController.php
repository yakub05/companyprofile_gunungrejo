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

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin/detail-admin', ['admin' => $admin]);
    }

    public function edit($id)
    {
        $admin = Admin::get()->where('id', $id)->first();
        return view('admin/edit-admin', ['admin' => $admin]);
    }

    public function updateadmin(Request $request, Admin $admin, $id)
    {
        $admin = Admin::findOrFail($id);

        $rules = $request->validate([
            'AdminFoto' => 'image|file',
            'nama' => 'required',
            'email' => 'required|email',
            'NoTelp' => 'required|numeric',
            'password' => 'required'
        ]);

        if($request->file('AdminFoto')){
            $rules['AdminFoto'] = $request->file('AdminFoto')->store('admin-gambar');
        }
        
        if($request->email != $admin->email){
            $rules['email'] = 'required|email';
        }

        Admin::where('id', $admin->id)
                ->update($rules);

        if($rules){
            Session::flash('status', 'success');
            Session::flash('message', 'Perubahan Berhasil : Data Admin Berhasil Diubah!');
        }

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
            Session::flash('message', 'Penambahan Berhasil : Admin Baru Berhasil Ditambahkan!');
        }

        return redirect('/admin/admin');
    }
}
