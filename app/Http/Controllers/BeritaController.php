<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{


    public function landing()
    {
        $data = MBerita::getData()->paginate(10);
        //return json_encode($data);
        return view(
            'Berita.landingberita',
            ['data' => $data]
        );
    }
    public function index()
    {
        $data = MBerita::getData()->paginate(10);
        //return json_encode($data);
        return view(
            'Berita.data_list',
            ['data' => $data]
        );
    }

    public function show($id){
        $data = MBerita::getById($id);
        return view(
            'Berita.viewberita',
            ['data' => $data]
        );
    }

    // public function show()

    public function create()
    {
        return view('Berita.create');
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'judul_informasi' => 'required',
    //         'nama_bibit' => 'required',
    //         'tgl_awal' => 'required',
    //         'tgl_akhir' => 'required',
    //         'jumlah_bibit' => 'required',
    //         'syarat_ketentuan' => 'required',
    //         'kontak_narahubung' => 'required',
    //         'gambar_informasi' => 'file|mimes:pdf,jpg,jpeg,svg,png',
    //     ]);
    //     // if ($request->hasFile('gambar_informasi')){
    //     //     $imagePath = $request->file('gambar_informasi')->store('informasi', 'public');
    //     //     $validatedData['gambar_informasi'] = $imagePath;
    //     // }
    //     if ($request->gambar_informasi == "") {
    //         DB::table("informasi")->insert([
    //             'judul_informasi' => $request->judul_informasi,
    //             'nama_bibit' => $request->nama_bibit,
    //             'tgl_awal' => $request->tgl_awal,
    //             'jumlah_bibit' => $request->jumlah_bibit,
    //             'syarat_ketentuan' => $request->syarat_ketentuan,
    //             'kontak_narahubung' => $request->kontak_narahubung,
    //         ]);
    //     } else {
    //         $file = $request->file('gambar_informasi');
    //         $nama_file = $file->getClientOriginalName();
    //         $file->move('img', $nama_file);
    //         DB::table("informasi")->insert([
    //             'judul_informasi' => $request->judul_informasi,
    //             'nama_bibit' => $request->nama_bibit,
    //             'tgl_awal' => $request->tgl_awal,
    //             'tgl_akhir' => $request->tgl_akhir,
    //             'jumlah_bibit' => $request->jumlah_bibit,
    //             'syarat_ketentuan' => $request->syarat_ketentuan,
    //             'kontak_narahubung' => $request->kontak_narahubung,
    //             'gambar_informasi' => $nama_file,
    //         ]);
    //     }
        
    //     return redirect()->route('berita.list');
    // }
    public function store(Request $request)
{
    $request->validate([
        'judul_informasi' => 'required',
        'nama_bibit' => 'required',
        'tgl_awal' => 'required',
        'tgl_akhir' => 'required',
        'jumlah_bibit' => 'required',
        'syarat_ketentuan' => 'required',
        'kontak_narahubung' => 'required',
        'gambar_informasi' => 'file|mimes:pdf,jpg,jpeg,svg,png',
    ]);

    $data = [
        'judul_informasi' => $request->judul_informasi,
        'nama_bibit' => $request->nama_bibit,
        'tgl_awal' => $request->tgl_awal,
        'tgl_akhir' => $request->tgl_akhir,
        'jumlah_bibit' => $request->jumlah_bibit,
        'syarat_ketentuan' => $request->syarat_ketentuan,
        'kontak_narahubung' => $request->kontak_narahubung,
    ];

    if ($request->hasFile('gambar_informasi')) {
        $file = $request->file('gambar_informasi');
        $nama_file = $file->getClientOriginalName();
        $file->move('img', $nama_file);
        $data['gambar_informasi'] = $nama_file;
    }

    MBerita::create($data);

    return redirect()->route('berita.list');
}

    public function edit(Request $request, $id_informasi)
    {
        $data = MBerita::getById($id_informasi);
        // dd($data);
        return view(
            'Berita.edit',
            compact('data')
        );
    }
    public function update(Request $request, $id_informasi)
    {
        $request->validate([
            'judul_informasi' => 'required',
            'nama_bibit' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'jumlah_bibit' => 'required',
            'syarat_ketentuan' => 'required',
            'kontak_narahubung' => 'required',
            'gambar_informasi' => 'file|mimes:pdf,jpg,jpeg,svg,png',
        ]);
    
        $data = [
            'judul_informasi' => $request->judul_informasi,
            'nama_bibit' => $request->nama_bibit,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'jumlah_bibit' => $request->jumlah_bibit,
            'syarat_ketentuan' => $request->syarat_ketentuan,
            'kontak_narahubung' => $request->kontak_narahubung,
        ];
    
        if ($request->hasFile('gambar_informasi')) {
            $file = $request->file('gambar_informasi');
            $nama_file = $file->getClientOriginalName();
            $file->move('img', $nama_file);
            $data['gambar_informasi'] = $nama_file;
        };

        $update = MBerita::getById($id_informasi);
        $update->update($data);
        return redirect()->route('berita.list')
            ->with('success', 'Berita telah terpost');
    }
    public function destroy($id_informasi)
    {
        $destroy = MBerita::getById($id_informasi);
        $destroy->delete();
        return redirect()->route('berita.list')
            ->with('success','Berita telah didelete');
    }

    
}