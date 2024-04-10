<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;

class C_Auth extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return view('landing');
        } else {
            return redirect('login')->with('error', 'Email atau Kata sandi salah !');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Menghapus autentikasi pengguna saat ini

        $request->session()->invalidate(); // Mematikan sesi pengguna

        $request->session()->regenerateToken(); // Menghasilkan token sesi baru

        return redirect('/')->with('status', 'You have been logged out successfully.'); // Redirect ke halaman utama dengan pesan sukses
    }

    public function form_register()
    {

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('login');
    }
}
