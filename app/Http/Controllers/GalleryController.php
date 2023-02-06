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
        $gallery = Gallery::findOrFail($id);
        return view('admin/detail-gallery', ['gallery' => $gallery]);
    }

    public function edit($id)
    {
        $gallery = Gallery::get()->where('id', $id)->first();
        return view('admin/edit-gallery', ['gallery' => $gallery]);
    }

    public function updategallery(Request $request, Gallery $gallery, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $rules = $request->validate([
            'GalleryFoto' => 'image|file',
            'GalleryJudul' => 'required|max:255',
            'GalleryTanggal' => 'required',
            'GalleryDeskripsi' => 'required',
        ]);

        if($request->file('GalleryFoto')){
            $rules['GalleryFoto'] = $request->file('GalleryFoto')->store('gallery-gambar');
        }

        Gallery::where('id', $gallery->id)
                ->update($rules);

        if($rules){
            Session::flash('status', 'success');
            Session::flash('message', 'Perubahan Berhasil : Data Gallery Berhasil Diubah!');
        }

        return redirect('/admin/gallery');
    }

    public function delete(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        // return back()->with('info', 'Data Berhasil Dihapus');

        if($gallery){
            Session::flash('status', 'warning');
            Session::flash('message', 'Data Berhasil Dihapus!');
        }

        return redirect('/admin/gallery');
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
        // $gallery->GalleryJudul = $request->GalleryJudul;
        // $gallery->gallerySlug = $request->gallerySlug;
        // $gallery->GalleryTanggal = $request->GalleryTanggal;
        // $gallery->galleryDeskripsi = $request->galleryDeskripsi;
        // $gallery->Author = $request->Author;
        // $gallery->save();

        // $request['gallerySlug'] = Str::slug($request->GalleryJudul, '-');

        $gallery = $request->validate([
            'GalleryFoto' => 'image|file',
            'GalleryJudul' => 'required|max:255',
            'GalleryTanggal' => 'required',
            'GalleryDeskripsi' => 'required'
        ]);

        if($request->file('GalleryFoto')){
            $gallery['GalleryFoto'] = $request->file('GalleryFoto')->store('gallery-gambar');
        }
        
        Gallery::create($gallery);

        if($gallery){
            Session::flash('status', 'success');
            Session::flash('message', 'Gallery Baru Berhasil Ditambahkan!');
        }

        return redirect('/admin/gallery');
        // return redirect('/admin/gallery')->with('success', 'gallery Baru Berhasil Ditambahkan!');
    }
}
