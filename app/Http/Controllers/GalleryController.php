<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::get();
        return view('admin/gallery', ['galleryList' => $gallery]);
    }

    public function show($id)
    {
        $gallery = gallery::findOrFail($id);
        return view('admin/detail-gallery', ['gallery' => $gallery]);
    }
}
