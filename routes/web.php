<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Pengajuan;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Registrasi;
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



Route::get('/landing', function () {
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

// Route::get('/homepage', function () {
//     return view('kelompoktani.homepage');
// });




Route::get('login', [C_Auth::class, 'login'])->name('login');
Route::post('homepage', [C_Auth::class, 'authenticate'])->name('authenticate');
Route::get('logout', [C_Auth::class, 'logout'])->name('logout');
Route::get('register', [C_Auth::class, 'form_register'])->name('auth.register');
Route::post('register', [C_Auth::class, 'register'])->name('register');

Route::get('dashboard', [App\Http\Controllers\DinasController::class, 'index'])->name('dashboard');

//Routing Berita

Route::get('berita_list', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.list');
// Route::get('berita/detail/{id}', [App\Http\Controllers\BeritaController::class, 'show'])->name('berita.detail');
Route::get('berita_list/create', [App\Http\Controllers\BeritaController::class, 'create'])->name('berita.create');
Route::post('berita/store', [App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');
Route::get('berita_list/{id}', [App\Http\Controllers\BeritaController::class, 'edit'])->name('berita.edit');
Route::put('berita/{id}/update', [App\Http\Controllers\BeritaController::class, 'update'])->name('berita.update');
Route::delete('berita_list/{id}', [App\Http\Controllers\BeritaController::class, 'destroy'])->name('berita.destroy');


//Routing Pengajuan


Route::post('pengajuan/store', [C_Pengajuan::class, 'store'])->name('pengajuan.store');

//Routing Registrasi


// Route::get('registrasitani/create', [C_Registrasi::class, 'create'])->name('registrasi.create');
// Route::post('registrasitani/store', [C_Registrasi::class, 'store'])->name('registrasi.store');


//Routing Auth

Route::group(['middleware' => ['auth']], function () {
    Route::get('/homepage', function () {return view('kelompoktani.homepage');});
    Route::get('landingberita', [App\Http\Controllers\BeritaController::class, 'landing'])->name('berita.landing');
    Route::get('berita/detail/{id}', [App\Http\Controllers\BeritaController::class, 'show'])->name('berita.detail');

    Route::get('registrasitani/create', [C_Registrasi::class, 'create'])->name('registrasi.create');
    Route::post('registrasitani/store', [C_Registrasi::class, 'store'])->name('registrasi.store');
    Route::get('registrasitani/{id}/edit', [C_Registrasi::class, 'edit'])->name('registrasi.edit');
    Route::post('registrasitani/{id}/show', [C_Registrasi::class, 'show'])->name('registrasi.show');

});


Route::get('landingberita', [App\Http\Controllers\BeritaController::class, 'landing'])
    ->name('berita.landing')
    ->middleware('auth');


Route::get('/protected-route', function () {
    // Debug statement to check if user is authenticated
    if (Auth::check()) {
        return "You are authenticated!";
    } else {
        return "You are not authenticated!";
    }
})->middleware('auth');
