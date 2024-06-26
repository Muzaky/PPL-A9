<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Pengajuan;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Registrasi;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\C_Pelaporan;
use App\Http\Controllers\C_Ulasan;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\HomepageController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('login', [C_Auth::class, 'login'])->name('login');


Route::get('login', [C_Auth::class, 'login'])->name('login');
Route::post('homepage', [C_Auth::class, 'authenticate'])->name('authenticate');
Route::get('logout', [C_Auth::class, 'logout'])->name('logout');
Route::get('register', [C_Auth::class, 'form_register'])->name('auth.register');
Route::post('register', [C_Auth::class, 'register'])->name('register');






Route::group(['middleware' => ['dinas']], function () 
{
    Route::get('/dashboard', [DinasController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'pemberitahuan'], function () {
        Route::get('/data_list', [BeritaController::class, 'index'])->name('berita.list');
        Route::get('/create', [BeritaController::class, 'create'])->name('berita.create');
        Route::post('/store', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('/{id}/update', [BeritaController::class, 'update'])->name('berita.update');
        Route::delete('destroy/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    });
    
    //Routing Pengajuan Dinas
    Route::group(['prefix'=> 'pengajuan'], function () {
        Route::get('/data_list', [C_Pengajuan::class, 'index'])->name('pengajuan.list');
        Route::get('/{id}/editdinas', [C_Pengajuan::class, 'editdinas'])->name('pengajuan.editdinas');
        Route::put('/{id}/updatedinas', [C_Pengajuan::class, 'updatedinas'])->name('pengajuan.updatedinas');
        Route::delete('destroy/{id}', [C_Pengajuan::class, 'destroy'])->name('pengajuan.destroy');
    
    });
    
    //Routing Pelaporan Dinas
    Route::group(['prefix'=> 'pelaporan'], function () {
        Route::get('/data_list', [C_Pelaporan::class, 'index'])->name('pelaporan.list');
        Route::get('/{id}/editdinas', [C_Pelaporan::class, 'editdinas'])->name('pelaporan.editdinas');
        Route::put('/{id}/updatedinas', [C_Pelaporan::class, 'updatedinas'])->name('pelaporan.updatedinas');
        Route::delete('destroy/{id}', [C_Pelaporan::class, 'destroy'])->name('pelaporan.destroy');
    });
    
    
    //Routing Registrasi Dinas
    Route::group(['prefix'=> 'kelompoktani'], function () {
        Route::get('/data_list', [C_Registrasi::class, 'index'])->name('registrasi.list');
        Route::get('/{id}/editdinas', [C_Registrasi::class, 'editdinas'])->name('registrasi.editdinas');
        Route::put('/{id}/updatedinas', [C_Registrasi::class, 'updatedinas'])->name('registrasi.updatedinas');
        Route::delete('/destroy/{id}', [C_Registrasi::class, 'destroy'])->name('registrasi.destroy');
    });

    //Routing Ulasan Dinas
    Route::group(['prefix'=> 'ulasan'], function () {
        Route::get('/data_list', [C_Ulasan::class, 'index'])->name('ulasan.list');
    });

    
});



//Routing Auth

Route::group(['middleware' => ['kelompoktani']], function () {
    Route::group(['prefix' => 'homepage'], function () {
        Route::get('/', [HomepageController::class, 'homepage'])->name('homepage');
        Route::get('/{id}/profile', [C_Registrasi::class, 'profile'])->name('kelompoktani.profile');
        Route::put('/{id}/updatefoto', [C_Registrasi::class, 'updatefoto'])->name('fotoprofil.update');
        Route::put('/{id}/kredensial', [C_Auth::class, 'update'])->name('kredensial.update');
    });

    Route::group(['prefix' => 'pemberitahuan'], function () {
        Route::get('', [BeritaController::class, 'landing'])->name('pemberitahuan.landing');
        Route::get('/detail-pemberitahuan/{slug}-{id}', [BeritaController::class, 'show'])->name('pemberitahuan.detail');
    });

    Route::group(['prefix' => 'registrasitani'], function () {
        Route::get('/create', [C_Registrasi::class, 'create'])->name('registrasi.create');
        Route::post('/store', [C_Registrasi::class, 'store'])->name('registrasi.store');
        Route::get('/{id}/edit', [C_Registrasi::class, 'edit'])->name('registrasi.edit');
        Route::put('/{id}/update', [C_Registrasi::class, 'update'])->name('registrasi.update');
        Route::post('/{id}/show', [C_Registrasi::class, 'show'])->name('registrasi.show');
    });

    Route::group(['prefix'=> 'pengajuan'], function () {
        Route::get('', [C_Pengajuan::class, 'landing'])->name('pengajuan.landing');
        Route::post('/store', [C_Pengajuan::class, 'store'])->name('pengajuan.store');
        Route::get('/detail-pengajuan/{id}', [C_Pengajuan::class, 'show'])->name('pengajuan.show');
        Route::post('/{id}/update', [C_Pengajuan::class, 'update'])->name('pengajuan.update');
    });

    Route::group(['prefix'=> 'pelaporan'], function () {
        Route::get('', [C_Pelaporan::class, 'landing'])->name('pelaporan.landing');
        Route::get('/pelaporan-bantuan/{id}', [C_Pelaporan::class, 'main'])->name('pelaporan.main');
        Route::post('/store', [C_Pelaporan::class, 'store'])->name('pelaporan.store');
        Route::get('/detail-pelaporan/{id}', [C_Pelaporan::class, 'show'])->name('pelaporan.show');
        Route::post('/{id}/update', [C_Pelaporan::class, 'update'])->name('pelaporan.update');
    });

    Route::group(['prefix' => 'ulasan'], function (){
        Route::get('', [C_Ulasan::class, 'landing'])->name('ulasan.landing');
        Route::post('/store', [C_Ulasan::class, 'store'])->name('ulasan.store');
        Route::put('/update/{id}', [C_Ulasan::class, 'update'])->name('ulasan.update');
        Route::delete('/destroy/{id}', [C_Ulasan::class, 'destroy'])->name('ulasan.destroy');
    });
    
    // Route::get('landingberita', [BeritaController::class, 'landing'])->name('berita.landing');
    
});





Route::get('/protected-route', function () {
    // Debug statement to check if user is authenticated
    if (Auth::check()) {
        return "You are authenticated!";
    } else {
        return "You are not authenticated!";
    }
})->middleware('auth');
