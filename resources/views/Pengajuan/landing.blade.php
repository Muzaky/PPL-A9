@extends('Layout.navtani')
@section('content')
    <style>
        #judul {
            font-family: 'Montserrat';
            font-size: 48px;
            font-weight: 700;
        }

        .font-inside {
            font-family: 'Poppins'
        }
    </style>
    <section class="flex flex-col font-[Poppins]">
        <div>
            <a href="{{ route('homepage') }}"
                class="mt-10 left-[20px] top-[20px] flex items-center text-black text-sm font-medium ml-4">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </a>
            <h1 class="  text-[#204E51] mb-10 text-center" id="judul">Daftar Pengajuan Bantuan {{ $registrasi->nama_keltani }}</h1>
            @foreach ($pengajuan as $pengajuan)
                <div class="flex flex-col items-center">
                    <a href="{{ route('pengajuan.show', $pengajuan->id_pengajuan) }}"
                        class="flex flex-row items-center mb-6 bg-white border w-[1280px] border-gray-200 rounded-[20px] shadow-md hover:bg-gray-100 ">
                        <img class="object-cover w-48 h-40 rounded-[20px]"
                            src="{{ optional($pengajuan->informasi)->gambar_informasi ? asset('img/' . $pengajuan->informasi->gambar_informasi) : 'fallback-image-url.jpg' }}"
                            alt="">
                        <div class="flex flex-col justify-between px-4 leading-normal">
                            <h5 class="text-[40px] font-bold tracking-tight text-gray-900 dark:text-white ">
                                {{ optional($pengajuan->informasi)->nama_bibit }}</h5>
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
                            <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">

                            </div>

                        </div>
                    </a>

                </div>
            @endforeach




        </div>
    </section>
@endsection
