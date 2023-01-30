<?php

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

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('about', function () {
    return view('about');
})->name('about');
Route::get('Portfolio', function () {
    return view('Portfolio');
})->name('Portfolio');

Route::get('admin/home', function () {
    return view('layout.admin.home');
})->name('admin/home');
