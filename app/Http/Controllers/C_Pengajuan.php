<?php

namespace App\Http\Controllers;

use App\Http\Controllers\C_Auth;
use App\Http\Controllers\Controller;
use App\Models\MPengajuan;
use App\Models\MRegistrasi;
use App\Models\MBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class C_Pengajuan extends Controller
{


    public function landing()
    {
        $user = Auth::user()->id;
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan = MPengajuan::where('id_registrasi', $user)->get();
        $informasi = MBerita::where('id_informasi', $user)->get();
        $data = MPengajuan::getData()->paginate(10);

        // dd($pengajuan);
        // dd($pengajuan);
        //return json_encode($data);
        return view(
            'Pengajuan.landing',
            ['data' => $data],compact('pengajuan', 'informasi', 'registrasi')
        );
    }

    public function show($id)
    {
        $user = Auth::user()->id;
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan = MPengajuan::where('id_pengajuan', $id)->first();
        $informasi = MBerita::where('id_informasi', $user)->first();
        $data = MPengajuan::getById($id);
        return view(
            'Pengajuan.viewpengajuan',
            ['data' => $data],compact('pengajuan', 'informasi', 'registrasi')
        );
    }

    // public function show()

    public function create()
    {
        $user = Auth::user()->id;
        $id_registrasi = MRegistrasi::where('id_users', $user)->get('id_informasi');
        return view('Berita.create', compact('id_registrasi'));
    }

    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $id_registrasi = MRegistrasi::where('id_users', $user)->get('id_registrasi');
        // dd($id_registrasi);


        $request->validate([
            'berkas_pengajuan' => 'required|file|mimes:pdf',
            'id_registrasi' => 'required',
            'id_informasi' => 'required',
            // 'nama_informasi'=> 'required' ,
        ]);

        $data = [
            'tanggal_pengajuan' => Carbon::now()->toDateString(),
            'id_registrasi' => $request->id_registrasi,
            'id_informasi' => $request->id_informasi,
            // 'nama_informasi'=> $request->nama_informasi, 
        ];

        if ($request->hasFile('berkas_pengajuan')) {
            $file = $request->file('berkas_pengajuan');
            $nama_file = $file->getClientOriginalName();
            $file->move('pdf', $nama_file);
            $data['berkas_pengajuan'] = $nama_file;
        }

        MPengajuan::create($data);

        return redirect()->route('homepage');
    }

    public function edit(Request $request, $id_pengajuan)
    {

        $data = MPengajuan::getById($id_pengajuan);
        // dd($data);
        return view(
            'Pengajuan.editdinas',
            compact('data')
        );
    }
    public function update(Request $request, $id_pengajuan)
    {

        $request->validate([
            'berkas_pengajuan' => 'required|file|mimes:pdf',
        
        ]);

        $data = [
            'tanggal_pengajuan' => Carbon::now()->toDateString(),
            'status_validasi'=> 1, 
            'tanggal_validasi' => null,
            'catatan_validasi' => null,
        ];

        if ($request->hasFile('berkas_pengajuan')) {
            $file = $request->file('berkas_pengajuan');
            $nama_file = $file->getClientOriginalName();
            $file->move('pdf', $nama_file);
            $data['berkas_pengajuan'] = $nama_file;
        }

        $update = MPengajuan::getById($id_pengajuan);
        $update->update($data);
        return redirect()->route('pengajuan.show',['id' => $id_pengajuan])
            ->with('success', 'Berita telah terpost');
    }

    public function destroy($id_informasi)
    {
        $destroy = MPengajuan::getById($id_informasi);
        $destroy->delete();
        return redirect()->route('berita.list')
            ->with('success', 'Berita telah didelete');
    }



    //Control Dinas
    public function index()
    {
        $data = MPengajuan::select('registrasi.nama_keltani', 'pengajuan.*', 'informasi.nama_bibit')
                    ->join('registrasi', 'registrasi.id_registrasi', '=', 'pengajuan.id_registrasi')
                    ->join('informasi', 'informasi.id_informasi', '=', 'pengajuan.id_informasi')
                    ->get();
        //return json_encode($data);
        return view(
            'Pengajuan.data_list',
            ['data' => $data]
        );
    }

    public function editdinas(Request $request, $id_pengajuan)
    {
        $data = MPengajuan::getById($id_pengajuan);
        // dd($data);
        return view(
            'Pengajuan.editdinas',
            compact('data')
        );
    }

    public function updatedinas(Request $request, $id_pengajuan)
    {
        // dd($request->all());
        $request->validate([
            'berkas_pengajuan' => '=file|mimes:pdf',
            'status_validasi' => 'required',
            'catatan_validasi' => 'required',
            'tanggal_pengajuan' => 'required',
            'tanggal_validasi' => 'required',
            
        ]);



        $data = [
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'catatan_validasi' => $request->catatan_validasi,
            'tanggal_validasi' => $request->tanggal_validasi,
            'status_validasi' => $request->status_validasi,
        ];

        if ($request->hasFile('berkas_pengajuan')) {
            $file = $request->file('berkas_pengajuan');
            $nama_file = $file->getClientOriginalName();
            $file->move('pdf', $nama_file);
            $data['berkas_pengajuan'] = $nama_file;
        }

        // dd($data)->all();
      

        $update = MPengajuan::getById($id_pengajuan);
        $update->update($data);
        return redirect()->route('pengajuan.list')
            ->with('success', 'Berita telah terpost');
    }
}
