<?php

namespace App\Http\Controllers;

use App\Models\MPelaporan;
use App\Models\MPengajuan;
use App\Models\MBerita;
use App\Models\MRegistrasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class C_Pelaporan extends Controller
{
    public function landing()
    {

        $user = Auth::user()->id;
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan = MPengajuan::where('id_registrasi', $registrasi->id_registrasi)->get();
        $informasi = MBerita::where('id_informasi', $user)->get();
        $data = MPengajuan::getData()->paginate(10);
        // dd($pengajuan);
        return view(
            'Pelaporan.landing',
            ['data' => $data],
            compact('pengajuan', 'informasi', 'registrasi')
        );
    }

    public function show($id)
    {
        $user = Auth::user()->id;
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan = MPengajuan::where('id_registrasi', $registrasi->id_registrasi)->get();
        $informasi = MBerita::where('id_informasi', $user)->get();
        $pelaporan = MPelaporan::where('id_pelaporan', $id)->first();
        // dd($pelaporan);
        $data = MPelaporan::getById($id);
        return view(
            'Pelaporan.viewpelaporan',
            ['data' => $data],
            compact('pengajuan', 'informasi', 'registrasi','pelaporan')
        );
    }

    public function main($id)
    {
        $user = Auth::user()->id;
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan = MPengajuan::where('id_pengajuan', $id)->first();
        $informasi = MBerita::where('id_informasi', $pengajuan->id_pengajuan)->get();
        // dd($pengajuan);
        $pelaporan = MPelaporan::where('id_pengajuan', $user)->get();
        // dd($pelaporan);
        $data = MPengajuan::getById($id);
        return view(
            'Pelaporan.main',
            ['data' => $data],
            compact('informasi', 'registrasi', 'pelaporan', 'pengajuan')
        );
    }
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $id_registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan = MPengajuan::where('id_pengajuan', $user)->first();
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
            'id_registrasi' => $id_registrasi->id_registrasi,
            'id_pengajuan' => $pengajuan->id_pengajuan,
            // 'nama_informasi'=> $request->nama_informasi, 
        ];

        if ($request->hasFile('dokumentasi_pelaporan')) {
            $file = $request->file('dokumentasi_pelaporan');
            $nama_file = $file->getClientOriginalName();
            $file->move('dokumentasi', $nama_file);
            $data['dokumentasi_pelaporan'] = $nama_file;
        }

        MPelaporan::create($data);

        return redirect()->route('homepage');
    }

    public function update(Request $request, $id_pelaporan)
    {
        // dd($request);
        $request->validate([
            'dokumentasi_pelaporan' => 'required|file|mimes:png,jpg,jpeg',
            'kondisi' => 'required',
            'nama_kegiatan' => 'required',

        
        ]);

        $data = [
            'kondisi' => $request->kondisi,
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_pelaporan' => Carbon::now()->toDateString(),
            'status_validasi'=> 1, 
            'tanggal_validasi' => null,
            'catatan_validasi' => null,
        ];

        

        if ($request->hasFile('dokumentasi_pelaporan')) {
            $file = $request->file('dokumentasi_pelaporan');
            $nama_file = $file->getClientOriginalName();
            $file->move('dokumentasi', $nama_file);
            $data['dokumentasi_pelaporan'] = $nama_file;
        }

        $update = MPelaporan::getById($id_pelaporan);
        $update->update($data);
        return redirect()->route('pelaporan.show',['id' => $id_pelaporan])
            ->with('success', 'Berita telah terpost');

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
            'tanggal_validasi' =>'required',
        ]);

        $data = [
            'kondisi' => $request->kondisi,
            'nama_kegiatan' => $request->nama_kegiatan,
            'status_validasi'=> $request->status_validasi, 
            'tanggal_validasi' => $request->tanggal_validasi,
            'catatan_validasi' => $request->catatan_validasi,
        ];

        

        // if ($request->hasFile('dokumentasi_pelaporan')) {
        //     $file = $request->file('dokumentasi_pelaporan');
        //     $nama_file = $file->getClientOriginalName();
        //     $file->move('dokumentasi', $nama_file);
        //     $data['dokumentasi_pelaporan'] = $nama_file;
        // }

        $update = MPelaporan::getById($id_pelaporan);
        $update->update($data);
        return redirect()->route('pelaporan.list')
            ->with('success', 'Berita telah terpost');

    }

    public function index()
    {
        $data = MPelaporan::getData()->paginate(10);
        //return json_encode($data);
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
}
