<?php
namespace App\Http\Controllers;


class DinasController extends Controller
{
    public function index()
    {
        return view('Dinas.dashboard');
    }
}
