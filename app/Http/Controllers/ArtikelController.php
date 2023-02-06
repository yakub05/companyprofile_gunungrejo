<?php

namespace App\Http\Controllers;
use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use CvieBrock\EloquentSluggable\Services\SlugService;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        // dd($keyword);
        $artikel = Artikel::where('ArtikelJudul', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('ArtikelDeskripsi', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('WaktuPembuatan', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('Author', 'LIKE', '%'.$keyword.'%')
                            ->paginate(5);
        return view('admin/artikel', ['artikelList' => $artikel]);
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin/detail-artikel', ['artikel' => $artikel]);
    }

    public function edit($id)
    {
        $artikel = Artikel::get()->where('id', $id)->first();
        return view('admin/edit-artikel', ['artikel' => $artikel]);
    }

    public function updateartikel(Request $request, Artikel $artikel, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $rules = $request->validate([
            'ArtikelFoto' => 'image|file',
            'ArtikelJudul' => 'required|max:255',
            'WaktuPembuatan' => 'required',
            'ArtikelDeskripsi' => 'required',
            'Author' => 'required'
        ]);

        if($request->file('ArtikelFoto')){
            $rules['ArtikelFoto'] = $request->file('ArtikelFoto')->store('artikel-gambar');
        }

        // if($request->$ArtikelJudul)
        // $post->update(['ArtikelJudul' => $request->ArtikelJudul]);

        Artikel::where('id', $artikel->id)
                ->update($rules);

        if($rules){
            Session::flash('status', 'success');
            Session::flash('message', 'Perubahan Berhasil : Data Artikel Berhasil Diubah!');
        }

        return redirect('/admin/artikel');
    }

    public function delete(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        // return back()->with('info', 'Data Berhasil Dihapus');

        if($artikel){
            Session::flash('status', 'warning');
            Session::flash('message', 'Data Berhasil Dihapus!');
        }

        return redirect('/admin/artikel');
    }

    public function create()
    {
        return view('admin/create-artikel');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $artikel = new Artikel;
        // $artikel->ArtikelFoto = $request->ArtikelFoto;
        // $artikel->ArtikelJudul = $request->ArtikelJudul;
        // $artikel->ArtikelSlug = $request->ArtikelSlug;
        // $artikel->WaktuPembuatan = $request->WaktuPembuatan;
        // $artikel->ArtikelDeskripsi = $request->ArtikelDeskripsi;
        // $artikel->Author = $request->Author;
        // $artikel->save();

        // $request['ArtikelSlug'] = Str::slug($request->ArtikelJudul, '-');

        $artikel = $request->validate([
            'ArtikelFoto' => 'image|file',
            'ArtikelJudul' => 'required|max:255',
            // 'ArtikelSlug' => 'required|unique',
            'WaktuPembuatan' => 'required',
            'ArtikelDeskripsi' => 'required',
            'Author' => 'required'
        ]);

        if($request->file('ArtikelFoto')){
            $artikel['ArtikelFoto'] = $request->file('ArtikelFoto')->store('artikel-gambar');
        }
        
        Artikel::create($artikel);

        if($artikel){
            Session::flash('status', 'success');
            Session::flash('message', 'Artikel Baru Berhasil Ditambahkan!');
        }

        return redirect('/admin/artikel');
    }

    // public function checkSlug(Request $request){
    //     $ArtikelSlug = SlugService::createSlug(Artikel::class, 'ArtikelSlug', $request->ArtikelJudul);
    //     return response()->json(['ArtikelSlug'->$ArtikelSlug]);
    // }
}
