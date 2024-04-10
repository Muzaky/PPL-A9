<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Pengajuan;
use App\Http\Controllers\C_Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('landing');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/registrasi', function () {
    return view('registrasi.create');
});

Route::get('/homepage', function () {
    return view('kelompoktani.homepage');
});

Route::get('/registertani', function () {
    return view('registrasi.create');
});

Route::get('login', [C_Auth::class, 'login'])->name('login');
Route::post('login', [C_Auth::class, 'authenticate'])->name('authenticate');
Route::get('logout', [C_Auth::class, 'logout'])->name('logout');
Route::get('register', [C_Auth::class, 'form_register'])->name('auth.register');
Route::post('register', [C_Auth::class, 'register'])->name('register');

Route::get('dashboard', [App\Http\Controllers\DinasController::class, 'index'])->name('dashboard'); 

//Routing Berita

Route::get('berita_list', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.list');
Route::get('landingberita', [App\Http\Controllers\BeritaController::class, 'landing'])->name('berita.landing');
Route::get('berita/detail/{id}', [App\Http\Controllers\BeritaController::class, 'show'])->name('berita.detail');
Route::get('berita_list/create', [App\Http\Controllers\BeritaController::class, 'create'])->name('berita.create');
Route::post('berita/store', [App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');
Route::get('berita_list/{id}', [App\Http\Controllers\BeritaController::class, 'edit'])->name('berita.edit');
Route::put('berita/{id}/update', [App\Http\Controllers\BeritaController::class, 'update'])->name('berita.update');
Route::delete('berita_list/{id}', [App\Http\Controllers\BeritaController::class, 'destroy'])->name('berita.destroy');
// Route::get('berita/edit', [App\Http\Controllers\BeritaController::class, 'edit'])->name('berita.edit');
// Route::delete('berita/{id_berita}/destroy', [App\Http\Controllers\BeritaController::class, 'destroy'])->name('berita.destroy');

//Routing Pengajuan


Route::post('pengajuan/store', [C_Pengajuan::class, 'store'])->name('pengajuan.store');

// Route::get('berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.list');
// Route::get('landingdinas', [App\Http\Controllers\BeritaController::class, 'landing'])->name('berita.landing');
// Route::get('berita/{id_berita}', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.detail');
// Route::get('berita/create', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.create');
// Route::post('berita/store', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.store');
// Route::get('berita/{id_berita}/edit', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.edit');
// Route::put('berita/{id_berita}/update', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.update');
// Route::get('berita/{id_berita}/destroy', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.destroy');
