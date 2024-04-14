<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Pengajuan;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Registrasi;
use App\Http\Controllers\BeritaController;

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
Route::group(['prefix' => 'pemberitahuan'], function () {
    Route::get('/data_list', [BeritaController::class, 'index'])->name('berita.list');
    Route::get('/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/{id}/update', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/{id}/destroy', [BeritaController::class, 'destroy'])->name('berita.destroy');
});



//Routing Pengajuan

Route::group(['prefix'=> 'pengajuan'], function () {
    Route::post('/store', [C_Pengajuan::class, 'store'])->name('pengajuan.store');
    Route::post('/data_list', [C_Pengajuan::class, 'index'])->name('pengajuan.list');

});


//Routing Registrasi
Route::group(['prefix'=> 'kelompoktani'], function () {
    Route::get('/data_list', [C_Registrasi::class, 'index'])->name('registrasi.list');
    // Route::get('/{id}/edit', [C_Registrasi::class, 'edit'])->name('registrasi.edit');
    Route::get('/{id}/editdinas', [C_Registrasi::class, 'editdinas'])->name('registrasi.editdinas');
    Route::put('/{id}/updatedinas', [C_Registrasi::class, 'updatedinas'])->name('registrasi.updatedinas');
    Route::delete('/{id}/destroy', [C_Registrasi::class, 'destroy'])->name('registrasi.destroy');
});

// Route::get('registrasitani/create', [C_Registrasi::class, 'create'])->name('registrasi.create');
// Route::post('registrasitani/store', [C_Registrasi::class, 'store'])->name('registrasi.store');


//Routing Auth

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'homepage'], function () {
        Route::get('/', [HomepageController::class, 'homepage'])->name('homepage');
    });

    Route::group(['prefix' => 'pemberitahuan'], function () {
        Route::get('/landing', [BeritaController::class, 'landing'])->name('pemberitahuan.landing');
        Route::get('/detail/{id}', [BeritaController::class, 'show'])->name('pemberitahuan.detail');
    });

    Route::group(['prefix' => 'registrasitani'], function () {
        Route::get('/create', [C_Registrasi::class, 'create'])->name('registrasi.create');
        Route::post('/store', [C_Registrasi::class, 'store'])->name('registrasi.store');
        Route::get('/{id}/edit', [C_Registrasi::class, 'edit'])->name('registrasi.edit');
        Route::put('/{id}/update', [C_Registrasi::class, 'update'])->name('registrasi.update');
        Route::post('/{id}/show', [C_Registrasi::class, 'show'])->name('registrasi.show');
    });

    Route::group(['prefix'=> 'pengajuan'], function () {
        Route::post('/store', [C_Pengajuan::class, 'store'])->name('pengajuan.store');
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
