<?php

namespace App\Http\Controllers;
use App\Models\MPelaporan;
use App\Models\MPengajuan;
use App\Models\MBerita;
use App\Models\MRegistrasi;
use App\Models\MUlasan;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mul;

class C_Ulasan extends Controller
{
    //
    public function landing(){

        $user = Auth::user()->id;
        $registrasi = MRegistrasi::where('id_users', $user)->first();
     
        $ulasan = MUlasan::getDataName();
        return view("ulasan.view",compact('ulasan', 'registrasi'));
        
    }

    public function store(Request $request){
        $user = Auth::user()->id;
        $registrasi = MRegistrasi::where('id_users', $user)->first();

        $request->validate([
            'deskripsi' => 'required',
        ]);

        $data = [
            'deskripsi' => $request->deskripsi,
            'id_registrasi' => $registrasi->id_registrasi,
        ];

        MUlasan::create($data);
        return redirect()->route('ulasan.landing');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
        ]);

        $data = [
            'deskripsi' => $request->deskripsi,
        ];

        $update = MUlasan::getById($id);
        $update->update($data);
        return redirect()->route('ulasan.landing');
    }

    public function destroy($id)
    {
        $destroy = MUlasan::getById($id);
        $destroy->delete();
        return redirect()->route('ulasan.landing')
            ->with('success', 'Berita telah didelete');
    }

    //Routing Dinas

    public function index()
    {
       
        $ulasan = MUlasan::getDataName();
        
        
        //return json_encode($data);
        return view("ulasan.data_list",compact('ulasan'));
            
      
    }
}
