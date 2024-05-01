@extends('layout.navtani')
@section('content')
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
            <h1 class=" text-[48px] font-bold text-[#204E51] px-[105px]  mb-10">Daftar pengajuan kelompok tani {{ $registrasi->nama_keltani }}</h1>
            @foreach ($pengajuan as $pengajuan)
                @if ($pengajuan ->status_validasi == 2)
                <div class="flex flex-col items-center">
                    <a href="{{ route('pelaporan.main', $pengajuan->id_pengajuan) }}"
                        class="flex flex-col items-center mb-6 bg-white border w-[1710px] border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                            src="{{ optional($pengajuan->informasi)->gambar_informasi ? asset('img/' . $pengajuan->informasi->gambar_informasi) : 'fallback-image-url.jpg' }}"
                            alt="">
                        <div class="flex flex-col justify-between px-4 leading-normal">
                            <h5 class="text-[40px] font-bold tracking-tight text-gray-900 dark:text-white ">
                                {{ optional($pengajuan->informasi)->nama_bibit }}</h5>
                            <div
                                class="mb-1 flex items-center justify-center text-sm font-medium text-danger dark:text-danger-500 md:justify-start">
                                @if ($pengajuan->status_validasi == 2)
                                    Validated
                                @else
                                    {{ $pengajuan->status_validasi }}
                                @endif
                            </div>
                            <p class="text-neutral-500 mb-2">
                                <small>
                                    Terverifikasi tanggal
                                    <u>
                                        {{ $pengajuan->tanggal_validasi }}
                                    </u>
                                </small>
                            </p>
                            <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">

                            </div>

                        </div>
                    </a>

                </div>

                @endif
                
            @endforeach



            {{-- <div class="flex flex-col items-center">
                <a href="{{ route('pengajuan.show', $pengajuan->id_pengajuan) }}"
                    class="flex flex-col items-center mb-6 bg-white border w-[1710px] border-gray-200 rounded-lg shadow md:flex-row  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        src="{{ asset('img/' . $informasi->gambar_informasi) }}" alt="">
                    <div class="flex flex-col justify-between px-4 leading-normal">
                        <h5 class=" text-[56px] font-bold tracking-tight text-gray-900 dark:text-white ">
                            {{ $informasi->nama_bibit }}</h5>
                        <div
                            class="mb-1 flex items-center justify-center text-sm font-medium text-danger dark:text-danger-500 md:justify-start">
                            @if ($pengajuan->status_validasi == 2)
                                Validated
                            @else
                                {{ $pengajuan->status_validasi }}
                            @endif
                        </div>
                        <p class="text-neutral-500 mb-2">
                            <small>
                                Terverifikasi tanggal
                                <u>
                                    {{ $pengajuan->tanggal_validasi }}
                                </u>

                            </small>
                        </p>
                        <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">

                        </div>

                    </div>
                </a>

            </div> --}}
        </div>
    </section>
@endsection
