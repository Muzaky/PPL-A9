<?php

namespace App\Http\Controllers;

use App\Models\MRegistrasi;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\MKecamatan;
use App\Models\MPengajuan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class C_Registrasi extends Controller
{
    public function index()
    {
        $data = MRegistrasi::getData()->paginate(10);
        return view(
            "Registrasi.data_list",
            ['data' => $data]
        );
    }
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
            'Registrasi.create',
            ['kecamatan' => $kecamatan],
            ['userId' => $userId]

        );
    }
    public function store(Request $request)
    {
      
        try {
            $data = $request->validate([
                'nama_keltani' => 'required|string|max:255',
                'nama_ketua' => 'required|string|max:255',
                'luas_hamparan' => 'required|integer',
                'jumlah_anggota' => 'required|integer',
                'alamat_keltani' => 'required|string',
                'bukti_legalitas' => 'required|file|mimes:pdf',
                'nama_kecamatan' => 'required|string|max:255',
                'id_users' => 'required',
                'status_validasi' => 'required',
                'tanggal_validasi' => 'nullable',
                'catatan_validasi' => 'nullable',
            ]);
    
            if ($request->hasFile('bukti_legalitas')) {
                $file = $request->file('bukti_legalitas');
                $nama_file = $file->getClientOriginalName();
                $filePath = $file->storeAs('bukti', $nama_file, 'public');
                $data['bukti_legalitas'] = $filePath; // Menyimpan path lengkap
            }

            MRegistrasi::create($data);

            return redirect()->route('homepage');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the data. Please try again later.');
        }
    }
    public function show($id)
    {
        $data = MRegistrasi::find($id);
        return view('Registrasi.show', ['data' => $data]);
    }
    public function edit(Request $request, $id_registrasi)
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


        $data = MRegistrasi::getById($id_registrasi);

        // dd($data);
        // dd($data);
        return view(
            'Registrasi.edit',
            [
                'kecamatan' => $kecamatan,
                'userId' => $userId,
                'data' => $data
            ],
        );
    }
    public function editdinas(Request $request, $id_registrasi)
    {



        $kecamatan = MKecamatan::all();


        $data = MRegistrasi::getById($id_registrasi);

        return view(
            'registrasi.editdinas',
            [
                'kecamatan' => $kecamatan,
                'data' => $data
            ],
        );
    }




    public function update(Request $request, $id_registrasi)
    {


        $data = $request->validate([
            'nama_keltani' => 'required|string|max:255',
            'nama_ketua' => 'required|string|max:255',
            'luas_hamparan' => 'required|integer',
            'jumlah_anggota' => 'required|integer',
            'alamat_keltani' => 'required|string',
            'bukti_legalitas' => 'required|file|mimes:pdf',
            'nama_kecamatan' => 'required|string|max:255',
        ]);

        if ($request->hasFile('bukti_legalitas')) {
            $file = $request->file('bukti_legalitas');
            $nama_file = $file->getClientOriginalName();
            $file->storeAs('bukti', $nama_file, 'public');
            $data['bukti_legalitas'] = $nama_file;
        }

        $update = MRegistrasi::getById($id_registrasi);
        $update->update($data);
        return redirect()->route('homepage')
            ->with('success', 'Data akun sudah diperbarui');
    }


    public function updatedinas(Request $request, $id_registrasi)
    {

        $request->validate([
            'nama_keltani' => 'required',
            'nama_ketua' => 'required',
            'luas_hamparan' => 'required',
            'jumlah_anggota' => 'required',
            'alamat_keltani' => 'required',
            'bukti_legalitas' => 'file|mimes:pdf',
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
            $file->storeAs('bukti', $nama_file);
            $data['bukti_legalitas'] = $nama_file;
        }

        $update = MRegistrasi::getById($id_registrasi);
        $update->update($data);
        return redirect()->route('registrasi.list')
            ->with('success', 'Akun kelompok tani telah diperbarui');
    }

    public function destroy($id_registrasi)
    {
        $destroy = MRegistrasi::getById($id_registrasi);
        $destroy->delete();
        return redirect()->route('registrasi.list')
            ->with('success', 'KelompokTani telah didelete');
    }

    public function profile($id_registrasi)
    {

        $user = Auth::user()->id;
        
        $registrasi =  MRegistrasi::regkec();
       
        $registrasi = $registrasi->where('id', $user)->first();
        $hashedpassword = $registrasi->password;
        $kecamatan = MKecamatan::all();

        return view('KelompokTani.profile', compact('registrasi', 'kecamatan'), ['hashedpassword' => $hashedpassword]);
    }

    public function updatefoto(Request $request, $id_registrasi)
    {
       
        
        $request->validate([
            'foto_profil' => 'file|mimes:pdf,png,jpg,jpeg,svg',
        ]);
    
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $nama_file = $file->getClientOriginalName();
            $file->storeAs('fotoprofil', $nama_file);
            $data['foto_profil'] = $nama_file;
        }
        $update = MRegistrasi::getById($id_registrasi);
        $update->update($data);
        return redirect()->route('homepage');
        
    }
}
