<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\MRegistrasi;


class C_Auth extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //dd(session()->all());
            $user = MRegistrasi::Cid_users();
            // dd($user);
            return view('kelompoktani.homepage', ['user' => $user]);
        } else {
            return redirect('login')->with('error', 'Email atau Kata sandi salah !');
        }

        

    }

    public function logout(Request $request)
    {
        Auth::logout(); // Menghapus autentikasi pengguna saat ini

        $request->session()->invalidate(); // Mematikan sesi pengguna

        $request->session()->regenerateToken(); // Menghasilkan token sesi baru

        return redirect('/landing')->with('status', 'You have been logged out successfully.'); // Redirect ke halaman utama dengan pesan sukses
    }

    public function form_register()
    {

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        

        return redirect('login');
    }
}