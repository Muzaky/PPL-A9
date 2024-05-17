<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\MKecamatan;
use Illuminate\Http\Request;

class C_Kecamatan extends Controller
{
    public function showForm()
    {
        $kecamatan = MKecamatan::all();
        return view('Registrasi.create', ['kecamatan' => $kecamatan]);
    }
}
