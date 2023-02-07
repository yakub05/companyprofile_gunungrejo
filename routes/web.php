<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArtikelUserController;
use App\Http\Controllers\GalleryUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//halaman user

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('Portfolio', function () {
    return view('Portfolio');
})->name('Portfolio');

Route::get('Portfolio', [GalleryUserController::class, 'index'], function () {
    return view('Portfolio');
})->name('Portfolio');

Route::get('blog', function () {
    return view('blog');
})->name('blog');

Route::get('blog', [ArtikelUserController::class, 'index'], function () {
    return view('blog');
})->name('blog');

Route::get('detail_blog', function () {
    return view('detail_blog');
})->name('detail_blog');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//login
Route::get('login', function () {
    return view('layout.login.login');
})->name('login');

//Login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login/login', [LoginController::class, 'login']);

//web admin
Route::middleware(['LoginMiddleware'])->group(function () {


//page home
Route::get('admin/home', function () {
    return view('admin.home');
})->name('admin/home');

//page admin
Route::get('admin/admin', [AdminController::class, 'index'], function () {
    return view('admin.admin');
})->name('admin/admin');

Route::get('admin/admin/detail-admin/{id}', [AdminController::class, 'show'], function () {
    return view('admin.detail-admin');
})->name('admin/admin/detail-admin');

Route::get('admin/admin/create-admin', [AdminController::class, 'create'], function () {
    return view('admin.create-admin');
})->name('admin/admin/create-admin');
Route::post('admin/admin', [AdminController::class, 'store']);

//edit data admin
Route::get('admin/admin/edit-admin/{id}', [AdminController::class, 'edit'], function () {
    return view('admin.edit-admin');
})->name('admin/admin/edit-admin');

Route::put('admin/admin/{id}', [AdminController::class, 'updateadmin'])->name('updateadmin');

//hapus data admin
Route::get('admin/delete-admin/{id}', [AdminController::class, 'delete']);

//page artikel
Route::get('admin/artikel', [ArtikelController::class, 'index'],function () {
    return view('admin.artikel');
})->name('admin/artikel');

Route::get('admin/artikel/detail-artikel/{id}', [ArtikelController::class, 'show'], function () {
    return view('admin.detail-artikel');
})->name('admin/artikel/detail-artikel');

Route::get('admin/artikel/create-artikel', [ArtikelController::class, 'create'], function () {
    return view('artikel.create-artikel');
})->name('admin/artikel/create-artikel');
Route::post('admin/artikel', [ArtikelController::class, 'store']);

//edit data artikel
Route::get('admin/artikel/edit-artikel/{id}', [ArtikelController::class, 'edit'], function () {
    return view('artikel.edit-artikel');
})->name('admin/artikel/edit-artikel');

Route::put('admin/artikel/{id}', [ArtikelController::class, 'updateartikel'])->name('updateartikel');

//hapus data artikel
Route::get('admin/delete-artikel/{id}', [ArtikelController::class, 'delete']);

// slug
// Route::get('/admin/artikel/checkSlug', [GalleryController::class, 'checkSlug']);

//Route::resource('admin/artikel', GalleryController::class)->middleware('auth');


// //page gallery
Route::get('admin/gallery', [GalleryController::class, 'index'], function () {
    return view('admin.gallery');
})->name('admin/gallery');

Route::get('admin/gallery/detail-gallery/{id}', [GalleryController::class, 'show'], function () {
    return view('admin.detail-gallery');
})->name('admin/gallery/detail-gallery');

Route::get('admin/gallery/create-gallery', [GalleryController::class, 'create'], function () {
    return view('gallery.create-gallery');
})->name('admin/gallery/create-gallery');
Route::post('admin/gallery', [GalleryController::class, 'store']);

//edit data gallery
Route::get('admin/gallery/edit-gallery/{id}', [GalleryController::class, 'edit'], function () {
    return view('gallery.edit-gallery');
})->name('admin/gallery/edit-gallery');

Route::put('admin/gallery/{id}', [GalleryController::class, 'updategallery'])->name('updategallery');

//hapus data gallery
Route::get('admin/delete-gallery/{id}', [GalleryController::class, 'delete']);
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
