<?php

namespace App\Http\Controllers;

use App\Models\MRegistrasi;
use Illuminate\Http\Request;
use App\Models\MKecamatan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class C_Registrasi extends Controller
{
    public function create()
    {
        $user = Auth::user();

        // Check if user is authenticated
        if ($user) {
            // Get the user ID
            $userId = $user->id;
        } else {
            // User is not authenticated
            $userId = null; // or you can handle it as you want
        }
        
        $kecamatan = MKecamatan::all();
        
        return view(
            'registrasi.create',
            ['kecamatan' => $kecamatan],
            ['userId' => $userId]
            
        );
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_keltani' => 'required',
                'nama_ketua' => 'required',
                'luas_hamparan' => 'required',
                'jumlah_anggota' => 'required',
                'alamat_keltani' => 'required',
                'bukti_legalitas' => 'file|mimes:pdf,png,jpg,jpeg,svg',
                'tanggal_validasi' => 'nullable',
                'catatan_validasi' => 'nullable',
                'nama_kecamatan' => 'required',
                'status_validasi' => 'required',
                'id_users' => 'required',
            ]);

            $data = [
                'nama_keltani' => $request->nama_keltani,
                'nama_ketua' => $request->nama_ketua,
                'luas_hamparan' => $request->luas_hamparan,
                'jumlah_anggota' => $request->jumlah_anggota,
                'alamat_keltani' => $request->alamat_keltani,
                'tanggal_validasi' => $request->tanggal_validasi,
                'catatan_validasi' => $request->catatan_validasi,
                'nama_kecamatan' => $request->nama_kecamatan,
                'status_validasi' => $request->status_validasi,
                'id_users' => $request->id_users,
            ];

            if ($request->hasFile('bukti_legalitas')) {
                $file = $request->file('bukti_legalitas');
                $nama_file = $file->getClientOriginalName();
                $file->move('bukti', $nama_file);
                $data['bukti_legalitas'] = $nama_file;
            }

            MRegistrasi::create($data);

            return redirect()->route('homepage');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the data. Please try again later.');
        }
    }
    public function show($id){
        $data = MRegistrasi::find($id);
        return view('registrasi.show', ['data' => $data]);
    }
    public function edit($id){
        $data = MRegistrasi::find($id);
        return view('registrasi.edit', ['data' => $data]);
    }
    public function update(Request $request, $id){
        $data = MRegistrasi::find($id);
        $data->update($request->all());
        return redirect()->route('registrasi.list');
    }
}
