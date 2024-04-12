<?php

namespace App\Http\Controllers;

use App\Models\MRegistrasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage(){
        
        $user = Auth::user()->id;
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $usercount = MRegistrasi::where('id_users', $user)->count();

        return view("kelompoktani.homepage",compact('registrasi', 'usercount'));
    }
}
