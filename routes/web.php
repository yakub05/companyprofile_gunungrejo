<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

//register
Route::get('registrasi', function () {
    return view('layout.registrasi.registrasi');
})->name('registrasi');

//login
Route::get('login', function () {
    return view('layout.login.login');
})->name('login');


//web admin

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

//edit
Route::get('admin/admin/edit-admin/{id}', [AdminController::class, 'edit'], function () {
    return view('admin.edit-admin');
})->name('admin/admin/edit-admin');

Route::put('admin/admin/{id}', [AdminController::class, 'update'])->name('update');

//hapus
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
// Route::get('/admin/artikel/checkSlug', [ArtikelController::class, 'checkSlug']);

//Route::resource('admin/artikel', ArtikelController::class)->middleware('auth');


//page gallery
Route::get('admin/gallery', [GalleryController::class, 'index'], function () {
    return view('admin.gallery');
})->name('admin/gallery');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';
