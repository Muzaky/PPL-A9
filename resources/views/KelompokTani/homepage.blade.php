@extends('Layout.navtani')
@section('content')
    <style>
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .font-isi,
        .judul,
        .profilehome {
            font-family: 'Montserrat';
            font-weight: 700;
            color: #204E51;
        }

        
    </style>

    <body class="">
        <div class="main-container bg-gradient-to-b from-[#204e51]/20 from-70% to-transparent">
            <div class=" alert">
                @if (session()->has('status'))
                    <div id="alert-border-3"
                        class="flex items-center p-4 mt-5 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="text-sm font-medium ms-3">
                            {{ session('status') }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-border-3" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
    
            {{-- @dd(auth()->user()->username)  --}}
            {{-- {{ Auth::check() ? 'Authenticated' : 'Not Authenticated' }} --}}
            <div class="flex flex-col items-center justify-center">
                <div
                    class="flex flex-row items-center justify-between w-[1280px] mt-8 rounded-[20px] px-12 bg-[#204e51]/20 shadow-lg h-60 bg-image bg-blend-multiply">
                    <style>
                        .bg-image {
                            background-image: url('../images/Component.png');
                            background-repeat: no-repeat;
                            background-size: cover;
                        }
                    </style>
                    <div class="flex flex-col justify-center w-full h-full font-bold bg-transparent">
                        @if ($usercount == 0)
                            <div class="flex text-[36px] text-wrap text-white">Registrasi Kelompok Tani</div>
                            <div class="flex text-[20px] text-white">Lakukan registrasi untuk mengakses semua fitur
                                BibiTani
                            </div>
                        @elseif ($usercount != 0)
                            @if ($registrasi->status_validasi == 1)
                                <div class="flex text-[36px] text-white">Menunggu Validasi Kelompok
                                    Tani
                                </div>
                                <div class="flex text-[20px] text-white">Silahkan menunggu validasi dari kedinasan !
                                </div>
                            @elseif ($registrasi->status_validasi == 2)
                                <div class="profilehome">
                                    <div class="flex text-[36px] text-[#f4f4f4]">Halo,
                                        {{ $registrasi->nama_keltani }} !
                                    </div>
                                    <div class="flex text-[20px] text-[#f4f4f4]">Selamat datang !
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
    
                    <div class="flex flex-row items-center justify-center h-full bg-transparent ">
                        @if ($usercount == 0)
                            <a class="flex py-2 text-[20px] mr-4 w-[120px] font-bold bg-white rounded-[8px] border-[#204E51] border justify-center items-center hover:bg-[#204E51] hover:text-white"
                                href="{{ route('registrasi.create') }}">Register</a>
                        @endif
                    </div>
                </div>
    
                <div class="flex flex-col h-full w-[1707px]  items-center">
                    <h1 class="judul flex text-black m-8 text-[50px] font-bold uppercase">Menu</h1>
                    <div class="flex flex-row">
                        @if ($registrasi && $registrasi->status_validasi == 2)
                            <a class="flex flex-col items-center mx-4 bg-white border-[6px] border-[#204E51] rounded-[32px] md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center embossed hover:-translate-y-1 hover:scale-110 hover:shadow-xl"
                                href="{{ route('pemberitahuan.landing') }}">
                                <div class="flex flex-col items-center">
                                    <img src="./assets/News.png" class="h-[100px]" alt="">
                                    <h1 class="font-isi flex text-[20px] font-bold mt-2 ">Pemberitahuan</h1>
                                </div>
                            </a>
                            <a class="flex flex-col items-center mx-4 bg-white border-[6px] border-[#204E51] rounded-[32px] md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center embossed hover:-translate-y-1 hover:scale-110 hover:shadow-xl"
                                href="{{ route('pengajuan.landing') }}">
                                <div class="flex flex-col items-center">
                                    <img src="./assets/Artboard 1.png"
                                        class="h-[100px]" border="0" alt="" />
                                    <h1 class="font-isi  flex text-[20px] font-bold text-center">Bantuan Bibit Hortikultura
                                    </h1>
                                </div>
                            </a>
                            <a class="flex flex-col items-center mx-4 bg-white border-[6px] border-[#204E51] rounded-[32px] md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center embossed hover:-translate-y-1 hover:scale-110 hover:shadow-xl"
                                href="{{ route('pelaporan.landing') }}">
                                <div class="flex flex-col items-center">
                                    <img src="./assets/Checklist.png" class="h-[100px] " alt="">
                                    <h1 class="font-isi flex text-[20px] font-bold mt-2 ">Pelaporan</h1>
                                </div>
                            </a>
                            <a class="flex flex-col items-center mx-4 bg-white border-[6px] border-[#204E51] rounded-[32px] md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center embossed hover:-translate-y-1 hover:scale-110 hover:shadow-xl"
                                href="{{ route('ulasan.landing') }}">
                                <div class="flex flex-col items-center">
                                    <img src="./assets/Chat.png" class="h-[100px]" alt="">
                                    <h1 class="font-isi  flex text-[20px] font-bold mt-2">Ulasan</h1>
                                </div>
                            </a>
                        @elseif ($registrasi && $registrasi->status_validasi == 3)
                            <h1>Harap Ubah Validasi Registrasi</h1>
                        @elseif ($registrasi && $registrasi->status_validasi == 1)
                            <h1>Harap Tunggu Validasi Registrasi</h1>
                        @else
                            <h1>Harap Lakukan Registrasi Kelompok Tani
                                untuk mengakses fitur bibitani
                            </h1>
                        @endif
    
    
                    </div>
                </div>
    
            </div>
        </div>


    </body>

@endsection
