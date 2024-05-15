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
            $user = Auth::user();
            $userx = Auth::user()->id;
            $iduser = User::where('id', $userx)->first();
            $registrasi = MRegistrasi::where('id_users', $userx)->first();
            $usercount = MRegistrasi::where('id_users', $userx)->count();
            // dd($registrasi);
            // dd($user);
            // Debugging statements
            //dd($usercount); // Check the value of $usercount
            $x = Auth::user()->id_roles;
            // dd($x);
            if ($x == 1) {
                return view('kelompoktani.homepage', compact('registrasi', 'usercount','iduser'));
            } elseif ($x == 2) {
                return redirect('dashboard');
            }
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

    public function update(Request $request, $id)
    {

        $registrasi =  MRegistrasi::regkec();

        $registrasi = $registrasi->where('id', $id)->first();
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6',
        ]);

        if (Hash::check($request->old_password, $registrasi->password)) {
            $data = [
                'password' => Hash::make($request->password)
            ];
            $update = User::getById($id);
            $update->update($data);
            return redirect()->route('homepage')
                ->with('success', 'Kredensial has been updated');
        } else {
            return redirect()->back()->with('error', 'Password lama tidak cocok');
        }
    }
}
