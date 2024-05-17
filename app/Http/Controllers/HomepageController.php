<?php

namespace App\Http\Controllers;

use App\Models\MRegistrasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage(){
        
        $user = Auth::user()->id;
        $iduser = User::where('id', $user)->first();
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $usercount = MRegistrasi::where('id_users', $user)->count();

        return view("KelompokTani.homepage",compact('registrasi', 'usercount','iduser'));
    }
}
