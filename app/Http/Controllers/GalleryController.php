<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;


class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $keyword=$request->keyword;
        // dd($keyword);
        $gallery = Gallery::where('GalleryJudul', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('GalleryTanggal', 'LIKE', '%'.$keyword.'%')
                            ->paginate(5);

        return view('admin/gallery', ['galleryList' => $gallery]);
    }

    public function show($id)
    {
        $gallery = gallery::findOrFail($id);
        return view('admin/detail-gallery', ['gallery' => $gallery]);
    }

    public function create()
    {
        return view('admin/create-gallery');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $gallery = new gallery;
        // $gallery->GalleryFoto = $request->GalleryFoto;
        // $gallery->galleryJudul = $request->galleryJudul;
        // $gallery->gallerySlug = $request->gallerySlug;
        // $gallery->GalleryTanggal = $request->GalleryTanggal;
        // $gallery->galleryDeskripsi = $request->galleryDeskripsi;
        // $gallery->Author = $request->Author;
        // $gallery->save();

        // $request['gallerySlug'] = Str::slug($request->galleryJudul, '-');

        $gallery = $request->validate([
            'GalleryFoto' => 'image|file',
            'GalleryJudul' => 'required|max:255',
            'GalleryTanggal' => 'required',
            'GalleryDeskripsi' => 'required'
        ]);

        if($request->file('GalleryFoto')){
            $gallery['GalleryFoto'] = $request->file('GalleryFoto')->store('gallery-gambar');
        }
        
        gallery::create($gallery);

        if($gallery){
            Session::flash('status', 'success');
            Session::flash('message', 'Gallery Baru Berhasil Ditambahkan!');
        }

        return redirect('/admin/gallery');
        // return redirect('/admin/gallery')->with('success', 'gallery Baru Berhasil Ditambahkan!');
    }
}
