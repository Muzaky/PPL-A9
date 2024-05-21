<?php

namespace App\Http\Controllers;

use App\Http\Controllers\C_Auth;
use App\Http\Controllers\Controller;
use App\Models\MPengajuan;
use App\Models\MRegistrasi;
use App\Models\User;
use App\Models\MBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;


class C_Pengajuan extends Controller
{


    public function landing(request $request)
    {

        $user = Auth::user()->id;
        $iduser = User::where('id', $user)->first();
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan =
            MPengajuan::where('id_registrasi', $registrasi->id_registrasi)
            ->when($request->status_validasi != null, function ($query) use ($request) {
                return $query->whereIn('status_validasi', $request->status_validasi);
            })->paginate(4);
        $data = MPengajuan::getData()->paginate(4);

        if ($pengajuan->isEmpty()) {
            $message = "Tidak ada data pengajuan";
            return view(
                'Pengajuan.landing',
                ['data' => $data, 'pengajuan' => $pengajuan],
                compact('pengajuan', 'registrasi', 'iduser', 'message')
            );
        }

        return view(
            'Pengajuan.landing',
            ['data' => $data, 'pengajuan' => $pengajuan],
            compact('pengajuan', 'registrasi', 'iduser')
        );
    }

    public function show($id)
    {

        $decryptedID = Crypt::decryptString($id);

        $user = Auth::user()->id;
        $iduser = User::where('id', $user)->first();
        $registrasi = MRegistrasi::where('id_users', $user)->first();
        $pengajuan = MPengajuan::where('id_pengajuan', $decryptedID)->first();

        $informasi = $pengajuan->informasi;
        $data = MPengajuan::getById($decryptedID);

        return view(
            'Pengajuan.viewpengajuan',
            ['data' => $data],
            compact('pengajuan', 'informasi', 'registrasi', 'iduser')
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
            $filePath = $file->storeAs('pdf', $nama_file, 'public');
            $data['berkas_pengajuan'] = $filePath; // Menyimpan path lengkap
        }

        MPengajuan::create($data);

        return redirect()->route('homepage')->with('success', 'Berhasil melakukan pengajuan !');
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
            'status_validasi' => 1,
            'tanggal_validasi' => null,
            'catatan_validasi' => null,
        ];

        if ($request->hasFile('berkas_pengajuan')) {
            $file = $request->file('berkas_pengajuan');
            $nama_file = $file->getClientOriginalName();
            $filePath = $file->storeAs('pdf', $nama_file, 'public');
            $data['berkas_pengajuan'] = $filePath; // Menyimpan path lengkap
        }
        $update = MPengajuan::getById($id_pengajuan);
        $update->update($data);
        return redirect()->route('pengajuan.show', ['id' => $id_pengajuan])
            ->with('success', 'Berita telah terpost');
    }

    public function destroy($id_pengajuan)
    {
        $destroy = MPengajuan::getById($id_pengajuan);
        $destroy->delete();
        return redirect()->route('pengajuan.list')
            ->with('success', 'Berita telah didelete');
    }

    //Control Dinas
    public function index(Request $request)
    {
        $statusValidasi = $request->input('status_validasi', []);

        // Query untuk mendapatkan data registrasi dengan pengajuannya
        $registrationsQuery = MRegistrasi::with(['pengajuan' => function ($query) use ($statusValidasi) {
            // Filter berdasarkan status_validasi jika ada
            if (!empty($statusValidasi)) {
                $query->whereIn('status_validasi', $statusValidasi);
            }
            $query->orderBy('id_pengajuan', 'desc'); // Mengurutkan pengajuan berdasarkan id_pengajuan
        }]);

        $registrations = $registrationsQuery->get();
        // Menggabungkan semua pengajuan dari registrasi yang berbeda dan mengurutkannya
        $allPengajuans = collect();
        foreach ($registrations as $registration) {
            $lastValidatedDate = $registration->pengajuan
                ->where('status_validasi', 2) // Status validasi tervalidasi
                ->max('tanggal_validasi'); // Mendapatkan tanggal validasi terbaru

            $lastValidatedDate = $lastValidatedDate ? Carbon::parse($lastValidatedDate)->format('d-m-Y') : null;

            foreach ($registration->pengajuan as $pengajuan) {
                $allPengajuans->push([
                    'pengajuan' => $pengajuan,
                    'registration' => $registration,
                    'lastValidatedDate' => $lastValidatedDate,
                ]);
            }
        }

        // Mengurutkan pengajuan berdasarkan id_pengajuan
        $allPengajuans = $allPengajuans->sortByDesc('pengajuan.id_pengajuan')->values();


        // Mengembalikan view dengan data yang sudah difilter dan diurutkan
        return view('Pengajuan.data_list', ['pengajuans' => $allPengajuans]);
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
            'berkas_pengajuan' => 'file|mimes:pdf',
            'status_validasi' => 'required',
            'catatan_validasi' => 'required',
            'tanggal_pengajuan' => 'required',
            'tanggal_validasi',

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
            $file->storeAs('pdf', $nama_file);
            $data['berkas_pengajuan'] = $nama_file;
        }

        // dd($data)->all();


        $update = MPengajuan::getById($id_pengajuan);
        $update->update($data);
        return redirect()->route('pengajuan.list')
            ->with('success', 'Berita telah terpost');
    }
}
