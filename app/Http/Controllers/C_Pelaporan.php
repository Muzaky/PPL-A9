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
        $pengajuan = MPengajuan::where('id_registrasi', $registrasi->id_registrasi)->first();
        $pelaporan = MPelaporan::where('id_pelaporan', $id)->first();
        $informasi = $pengajuan->informasi;



        $data = MPelaporan::getById($id);
        return view(
            'Pelaporan.viewpelaporan',
            ['data' => $data],
            compact('pengajuan', 'informasi', 'registrasi', 'pelaporan')
        );
    }

    public function main($id)
    {
        $user = Auth::user()->id;
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan = MPengajuan::where('id_pengajuan', $id)->first();
        $informasi = $pengajuan->informasi;
        // $informasi = MBerita::where('id_informasi', $pengajuan->id_pengajuan)->get();
        $pelaporan = MPelaporan::where('id_pengajuan', $pengajuan->id_pengajuan)->get();
        
    
        // dd($pelaporan);
        // dd($pelaporan);
        // $pelaporan = $pelaporan->pengajuan;

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
            $file->move('dokumentasi', $nama_file);
            $data['dokumentasi_pelaporan'] = $nama_file;
        }
        // dd($data);

        MPelaporan::create($data);

        return redirect()->route('homepage');
    }

    public function update(Request $request, $id_pelaporan)
    {  
        // dd($id_pelaporan);
        // dd($request);
        $request->validate([
            'dokumentasi_pelaporan' => '|file|mimes:png,jpg,jpeg',
            'kondisi' => 'required',
            'nama_kegiatan' => 'required',
        ]);
        // dd($request);
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
            $file->move('dokumentasi', $nama_file);
            $data['dokumentasi_pelaporan'] = $nama_file;
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

        $data = MPelaporan::select('pelaporan.*', 'pengajuan.tanggal_pengajuan', 'registrasi.nama_keltani')
            ->join('pengajuan', 'pelaporan.id_pelaporan', '=', 'pengajuan.id_pengajuan')
            ->join('registrasi', 'pengajuan.id_registrasi', '=', 'registrasi.id_registrasi')
            ->get();
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

    public function destroy($id_pelaporan)
    {
        $destroy = MPelaporan::getById($id_pelaporan);
        $destroy->delete();
        return redirect()->route('pengajuan.list')
            ->with('success', 'Berita telah didelete');
    }
}
