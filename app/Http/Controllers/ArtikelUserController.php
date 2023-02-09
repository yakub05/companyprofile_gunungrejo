<?php

namespace App\Http\Controllers;
use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtikelUserController extends Controller
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
        return view('blog', ['artikelList' => $artikel]);
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('detail-blog', ['artikel' => $artikel]);
    }
}
