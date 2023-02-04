<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Artikel;
use \CvieBrock\EloquentSluggable\Services\SlugService;
// use Illuminate\Support\Str;


class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::get();
        return view('admin/artikel', ['artikelList' => $artikel]);
    }

    public function show($id)
    {
        $artikel = artikel::findOrFail($id);
        return view('admin/detail-artikel', ['artikel' => $artikel]);
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
            // 'ArtikelSlug' => 'required',
            'WaktuPembuatan' => 'required',
            'ArtikelDeskripsi' => 'required',
            'Author' => 'required'
        ]);

        if($request->file('ArtikelFoto')){
            $artikel['ArtikelFoto'] = $request->file('ArtikelFoto')->store('artikel-gambar');
        }

        Artikel::create($artikel);
        return redirect('/admin/artikel');
    }

    // public function checkSlug(Request $request){
    //     $ArtikelSlug = SlugService::checkSlug(Artikel::class, 'ArtikelSlug', $request->ArtikelJudul);
    //     return response()->json(['ArtikelSlug'->$ArtikelSlug]);
    // }


}
