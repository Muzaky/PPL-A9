<?php

namespace App\Http\Controllers;

use App\Models\MPelaporan;
use App\Models\MPengajuan;
use App\Models\MBerita;
use App\Models\MRegistrasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class C_Pelaporan extends Controller
{
    public function landing()
    {

        $user = Auth::user()->id;
        $iduser = User::where('id', $user)->first();
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan = MPengajuan::where('id_registrasi', $registrasi->id_registrasi)->paginate(4);
        $informasi = MBerita::where('id_informasi', $user)->get();
        $data = MPengajuan::getData()->paginate(10);
        // dd($pengajuan);
        return view(
            'Pelaporan.landing',
            ['data' => $data],
            compact('pengajuan', 'informasi', 'registrasi', 'iduser')
        );
    }

    public function show($id)
    {
        $decryptedID = Crypt::decryptString($id);
        $user = Auth::user()->id;
        $iduser = User::where('id', $user)->first();
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan = MPengajuan::where('id_registrasi', $registrasi->id_registrasi)->first();
        $pelaporan = MPelaporan::where('id_pelaporan', $decryptedID)->first();
        $informasi = $pengajuan->informasi;



        $data = MPelaporan::getById($decryptedID);
        return view(
            'Pelaporan.viewpelaporan',
            ['data' => $data],
            compact('pengajuan', 'informasi', 'registrasi', 'pelaporan', 'iduser')
        );
    }

    public function main(request $request,$id)
    {
        $decryptedID = Crypt::decryptString($id);

        $user = Auth::user()->id;
        $iduser = User::where('id', $user)->first();
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan = MPengajuan::where('id_pengajuan', $decryptedID)->first();
        $informasi = $pengajuan->informasi;
        $pelaporancount = MPelaporan::where('id_pengajuan', $decryptedID)->count();

    
        $pelaporan = MPelaporan::where('id_pengajuan', $pengajuan->id_pengajuan)->when($request->status_validasi != null, function ($query) use ($request) {
            return $query->whereIn('status_validasi', $request->status_validasi);
        })->paginate(5);

        $data = MPengajuan::getById($decryptedID);

        if ($pelaporan->isEmpty()) {
            $message = "Tidak ada data pelaporan";
            return view(
                'Pelaporan.main',
                ['data' => $data, 'pelaporan' => $pelaporan],
                compact('informasi', 'registrasi', 'pelaporan', 'pengajuan', 'iduser', 'message','pelaporancount')
            );
        }

        return view(
            'Pelaporan.main',
            ['data' => $data],
            compact('informasi', 'registrasi', 'pelaporan', 'pengajuan', 'iduser','pelaporancount')
        );
    }
    public function store(Request $request)
    {

        $user = Auth::user()->id;
        $registrasi = MRegistrasi::where('id_users', $user)->first();

        // Retrieve the corresponding pengajuan based on id_registrasi
        $pengajuan = MPengajuan::where('id_registrasi', $registrasi->id_registrasi)->first();
        // dd($pengajuan);
        // dd($id_registrasi);


        $request->validate([
            'dokumentasi_pelaporan' => 'required|file|mimes:png,jpg,jpeg',
            'nama_kegiatan' => 'required',
            'kondisi' => 'required',
            // 'nama_informasi'=> 'required' ,
        ]);




        $data = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'kondisi' => $request->kondisi,
            'tanggal_pelaporan' => Carbon::now()->toDateString(),
            'id_registrasi' => $registrasi->id_registrasi,
            'id_pengajuan' => $pengajuan->id_pengajuan,
            // 'nama_informasi'=> $request->nama_informasi, 
        ];



        if ($request->hasFile('dokumentasi_pelaporan')) {
            $file = $request->file('dokumentasi_pelaporan');
            $nama_file = $file->getClientOriginalName();
            $filePath = $file->storeAs('dokumentasi', $nama_file, 'public');
            $data['dokumentasi_pelaporan'] = $filePath; // Menyimpan path lengkap
        }
        MPelaporan::create($data);

        return redirect()->route('homepage');
    }

    public function update(Request $request, $id_pelaporan)
    {
        $request->validate([
            'dokumentasi_pelaporan' => '|file|mimes:png,jpg,jpeg',
            'kondisi' => 'required',
            'nama_kegiatan' => 'required',
        ]);

        $data = [
            'kondisi' => $request->kondisi,
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_pelaporan' => Carbon::now()->toDateString(),
            'status_validasi' => 1,
            'tanggal_validasi' => null,
            'catatan_validasi' => null,
        ];
        // dd($data);


        if ($request->hasFile('dokumentasi_pelaporan')) {
            $file = $request->file('dokumentasi_pelaporan');
            $nama_file = $file->getClientOriginalName();
            $filePath = $file->storeAs('dokumentasi', $nama_file, 'public');
            $data['dokumentasi_pelaporan'] = $filePath; // Menyimpan path lengkap
        }

        $update = MPelaporan::getById($id_pelaporan);
        $update->update($data);
        return redirect()->route('pelaporan.show', ['id' => $id_pelaporan])
            ->with('success', 'Data telah berubah');
    }


    //Controller Dinas

    public function updatedinas(Request $request, $id_pelaporan)
    {

        // dd($request);
        $request->validate([
            // 'dokumentasi_pelaporan' => 'required|file|mimes:png,jpg,jpeg',
            'kondisi' => 'required',
            'nama_kegiatan' => 'required',
            'status_validasi' => 'required',
            'catatan_validasi' => 'required',
            'tanggal_validasi',
        ]);

        $data = [
            'kondisi' => $request->kondisi,
            'nama_kegiatan' => $request->nama_kegiatan,
            'status_validasi' => $request->status_validasi,
            'tanggal_validasi' => $request->tanggal_validasi,
            'catatan_validasi' => $request->catatan_validasi,
        ];

        $update = MPelaporan::getById($id_pelaporan);
        $update->update($data);
        return redirect()->route('pelaporan.list')
            ->with('success', 'Berita telah terpost');
    }

    public function index()
    {

        $data = MPelaporan::getDatas();
   
        return view(
            'Pelaporan.data_list',
            ['data' => $data]
        );
    }

    public function editdinas(Request $request, $id_pelaporan)
    {
        $data = MPelaporan::getById($id_pelaporan);
        // dd($data);
        return view(
            'Pelaporan.editdinas',
            compact('data')
        );
    }

    public function destroy($id_pelaporan)
    {
        $destroy = MPelaporan::getById($id_pelaporan);
        $destroy->delete();
        return redirect()->route('pengajuan.list')
            ->with('success', 'Berita telah didelete');
    }
}
