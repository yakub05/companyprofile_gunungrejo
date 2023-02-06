<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryUserController extends Controller
{
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        // dd($keyword);
       $gallery = Gallery::where('GalleryJudul', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('GalleryDeskripsi', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('GalleryTanggal', 'LIKE', '%'.$keyword.'%')
                            ->paginate(5);
        return view('Portfolio', ['galleryList' =>$gallery]);
    }

    public function show($id)
    {
       $gallery = Gallery::findOrFail($id);
        return view('Portfolio', ['Gallery' =>$gallery]);
    }
}
