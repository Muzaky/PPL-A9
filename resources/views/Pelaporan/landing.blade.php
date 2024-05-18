@extends('Layout.navtani')
@section('content')
    <style>
        #judul {
            font-family: 'Montserrat';
            font-size: 48px;
            font-weight: 700;
        }
        .font-inside {
            font-family: 'Montserrat'
        }
    </style>
    <section class="flex flex-col font-[Montserrat] items-center">
            <div class="relative w-[1440px] rounded-br-[20px] rounded-bl-[20px] border-x-2 border-b-2 border-[#204E51] shadow-xl bg-[#204E51]">
                <a href="{{ route('homepage') }}"
                    class="absolute left-[20px] top-[20px] flex items-center text-white text-sm font-medium ml-4">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </a>
                <h1 class="my-10 text-center text-white" id="judul">Pelaporan
                </h1>
            </div>
            <div class="flex flex-row gap-8 items-center -mt-8 bg-gray-100 p-2 rounded-br-[20px] rounded-bl-[20px] justify-start w-[1440px] mb-4">
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-32 h-32 rounded-full p-4 mt-8">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                  </svg>
                  
                <h1 class="w-[1440px] text-wrap text-gray-600 mt-6"><font class="font-semibold text-yellow-500">Halaman pelaporan bantuan bibit tani Dinas Tanaman Pangan dan Hortikultura (TPHP)</font>.<br> Petani dapat melengkapi pelaporan dari pengajuan bantuan yang sudah diajukan.
                    Jika belum terdapat bantuan bibit yang sudah pernah diajukan maka, pengajuan tersebut belum disetujui oleh dinas atau pengajuan tidak memenuhi syarat yang diberikan oleh dinas
                </h1>
            </div>
            @foreach ($pengajuan as $pengajuan)
                @if ($pengajuan->status_validasi == 2)
                    <div class="flex flex-col items-center">
                        <a href="{{ route('pelaporan.main', $pengajuan->id_pengajuan) }}"
                            class="flex items-center mb-6 bg-white border-2 w-[1280px] border-gray-200 rounded-[20px] shadow-md flex-row hover:bg-gray-100">
                            <img class="object-cover w-48 h-40 rounded-[20px]"
                                src="{{ optional($pengajuan->informasi)->gambar_informasi ? asset('img/' . $pengajuan->informasi->gambar_informasi) : 'fallback-image-url.jpg' }}"
                                alt="">
                            <div class="flex flex-col justify-between px-4 leading-normal">
                                <h5 class="text-[36px] font-bold tracking-tight text-gray-900 dark:text-white font-inside">
                                    {{ optional($pengajuan->informasi)->judul_informasi }}</h5>
                                <div
                                    class="flex items-center justify-center mb-1 text-sm font-medium text-green-500 md:justify-start">
                                    @if ($pengajuan->status_validasi == 2)
                                        <span class="px-3 py-1 text-green-500 bg-green-100 rounded-full">Validated</span>
                                    @elseif ($pengajuan->status_validasi == 3)
                                        <span class="px-3 py-1 text-red-500 bg-red-100 rounded-full">Rejected</span>
                                    @else
                                        <span class="px-3 py-1 text-yellow-500 bg-yellow-100 rounded-full">Process</span>
                                    @endif
                                </div>
                                <p class="mb-2 text-neutral-500">
                                    @if ($pengajuan->status_validasi == 2)
                                        <small class="font-inside">
                                            Terverifikasi Tanggal
                                            <u><b>
                                                    {{ $pengajuan->tanggal_validasi }}
                                                </b></u>
                                        </small>
                                    @elseif ($pengajuan->status_validasi == 3)
                                        <small class="font-inside">
                                            Ditolak tanggal
                                            <u>
                                                {{ $pengajuan->tanggal_validasi }}
                                            </u>
                                        </small>
                                    @else
                                        <small class="font-inside">
                                            Menunggu pemrosesan oleh Dinas
                                        </small>
                                    @endif
                                </p>


                            </div>
                        </a>

                    </div>
                @endif
            @endforeach



        </div>
    </section>
@endsection
