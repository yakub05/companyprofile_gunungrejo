<?php

namespace App\Http\Controllers;
use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use \CvieBrock\EloquentSluggable\Services\SlugService;

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

        if($artikel){
            Session::flash('status', 'success');
            Session::flash('message', 'Artikel Baru Berhasil Ditambahkan!');
        }

        return redirect('/admin/artikel');
        // return redirect('/admin/artikel')->with('success', 'Artikel Baru Berhasil Ditambahkan!');
    }

    // public function checkSlug(Request $request){
    //     $ArtikelSlug = SlugService::checkSlug(Artikel::class, 'ArtikelSlug', $request->ArtikelJudul);
    //     return response()->json(['ArtikelSlug'->$ArtikelSlug]);
    // }


}
