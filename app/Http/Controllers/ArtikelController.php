<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Artikel;
use \CvieBrock\EloquentSluggable\Services\SlugService;


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
        dd($request->all());
    }

    
}
