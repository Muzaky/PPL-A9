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

    <body class="bg-slate-200 font-[Montserrat]">
        <div class="main-container">
            <div class="alert">
                @if (session()->has('status'))
                    <div id="alert-border-3"
                        class="flex items-center p-4 mt-5 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
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
            <div class="flex flex-col items-center justify-center">
                <div class="bg-white p-8 mt-8 items-center flex flex-col rounded-[16px] shadow-xl border-black/5 border">
                    <div
                        class="flex flex-row items-center justify-between w-[1280px] rounded-[12px] px-12  shadow-lg h-60 bg-image ">
                        <style>
                            .bg-image {
                                background-image: url('../images/Component.png');
                                background-repeat: no-repeat;
                                background-size: cover;
                            }
                        </style>
                        <div class="flex flex-col justify-center w-full h-full font-bold bg-transparent">
                            @if ($usercount == 0)
                                <div class="flex text-[32px] text-wrap text-white">Registrasi Kelompok Tani</div>
                            @elseif ($usercount != 0)
                                @if ($registrasi->status_validasi == 1)
                                    <div class="flex text-[32px] text-white">Menunggu Validasi Kelompok Tani
                                    </div>
                                    
                                @elseif ($registrasi->status_validasi == 2)
                                    <div class="profilehome">
                                        <div class="flex text-[36px] text-[#f4f4f4]">Halo,
                                            {{ $registrasi->nama_keltani }} !
                                        </div>
                                        <div class="flex text-[20px] text-[#f4f4f4]">Selamat datang
                                        </div>
                                    </div>
                                
                                @endif
                            @endif
                        </div>

                        <div class="flex flex-row items-center justify-center h-full bg-transparent ">

                        </div>
                    </div>
                    <div class="flex flex-col h-full w-full items-center">

                        @if ($registrasi && $registrasi->status_validasi == 2)
                            <h1 class="judul flex text-black m-8 text-[50px] font-bold uppercase">Menu</h1>
                        @else
                        @endif
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
                                        <img src="./assets/Artboard 1.png" class="h-[100px]" border="0"
                                            alt="" />
                                        <h1 class="font-isi  flex text-[20px] font-bold text-center">Bantuan Bibit
                                            Hortikultura
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
                            <div class="flex flex-col justify-center items-center mt-20 mb-10">
                                <div class="flex flex-col justify-center items-center ">
                                    <div class="p-2  rounded-[8px] text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 56 56" class="opacity-50">
                                            <path fill="currentColor" d="M9.965 50.207h36.07c3.985 0 6.469-2.86 6.469-6.469c0-1.078-.281-2.18-.867-3.187L33.567 9.074c-1.22-2.133-3.352-3.281-5.555-3.281c-2.18 0-4.336 1.148-5.579 3.281l-18.07 31.5a6.253 6.253 0 0 0-.867 3.164c0 3.61 2.508 6.469 6.469 6.469m.047-3.68c-1.641 0-2.72-1.336-2.72-2.789c0-.422.071-.914.306-1.406l18.046-31.477c.516-.89 1.454-1.312 2.368-1.312c.914 0 1.804.398 2.32 1.312l18.047 31.5c.234.47.351.961.351 1.383c0 1.453-1.125 2.79-2.742 2.79Zm18-12.117c1.125 0 1.78-.656 1.804-1.875l.328-12.351c.024-1.196-.914-2.086-2.156-2.086c-1.265 0-2.156.867-2.133 2.062l.305 12.375c.023 1.196.68 1.875 1.852 1.875m0 7.617c1.359 0 2.53-1.078 2.53-2.437c0-1.383-1.148-2.438-2.53-2.438c-1.383 0-2.532 1.078-2.532 2.438c0 1.336 1.172 2.437 2.532 2.437"/>
                                        </svg>
                                    </div>
                                    <h1 class="font-[Montserrat] text-[20px] w-[500px] text-center font-bold ">Pendaftaran Anda Ditolak !</h1>
                                    <h1
                                        class="font-[Montserrat] text-[20px] w-[500px] text-center font-reguler text-gray-500 ">
                                        Mohon Maaf !, pendaftaran kelompok tani anda ditolak.</h1>
                                    <h1
                                        class="font-[Montserrat] text-[16px] w-[500px] text-center font-reguler text-gray-500 mt-4 bg-red-50 rounded-[6px] p-2">
                                        Mohon untuk melakukan perubahan terhadap data sesuai dengan catatan yang diberikan dinas pada form ubah</h1>
                                </div>
                                <div class="flex flex-col justify-center items-center">
                                        <a class="flex py-2 text-[20px] w-[120px] font-medium bg-[#204E51] text-white font-[Montserrat] rounded-[8px] border-[#204E51] border justify-center items-center hover:bg-[#fff] hover:text-[#204E51] mt-8"
                                            href="{{ route('registrasi.edit', Crypt::encrypt($registrasi->id_registrasi)) }}">Ubah</a>
                                </div>
                            </div>
                            @elseif ($registrasi && $registrasi->status_validasi == 1)
                                <div class="flex flex-col justify-center items-center mt-20 mb-10">
                                    <div class="flex flex-col justify-center items-center ">

                                        <div class="p-2  rounded-[8px] text-[#204E51]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 14 14" class="opacity-50">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round">
                                                    <path stroke-linejoin="round" d="M7 3.5v4l2.6 1.3"/>
                                                    <path d="M13.326 8.5a6.5 6.5 0 1 1-.558-4.5"/>
                                                    <path stroke-linejoin="round" d="M13.5 2v2.5H11"/>
                                                </g>
                                            </svg>  
                                        </div>
                                        <h1 class="font-[Montserrat] text-[20px] w-[500px] text-center font-bold ">Tunggu Validasi Dinas</h1>
                                        <h1
                                            class="font-[Montserrat] text-[20px] w-[500px] text-center font-reguler text-gray-500 ">
                                            Tunggu sebentar ya!, dikit lagi anda bisa mengakses full fitur dari BibiTani</h1>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">

                                        @if ($usercount == 0)
                                            <a class="flex py-2 text-[20px] w-[120px] font-medium bg-[#204E51] text-white font-[Montserrat] rounded-[8px] border-[#204E51] border justify-center items-center hover:bg-[#fff] hover:text-[#204E51] mt-8"
                                                href="{{ route('registrasi.create') }}">Register</a>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="flex flex-col justify-center items-center mt-20 mb-10">
                                    <div class="flex flex-col justify-center items-center ">

                                        <div class="p-2  rounded-[8px] text-[#204E51]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150"
                                                viewBox="0 0 48 48" class="opacity-20">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M39.5 30.867V6.5a2 2 0 0 0-2-2h-27a2 2 0 0 0-2 2v35a2 2 0 0 0 2 2h27a2 2 0 0 0 2-2v-1.469" />
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M37.134 37.66L21.288 21.775V17.25h4.632l15.785 15.828m2.61 4.907a1.623 1.623 0 0 0 0-2.291l-2.61-2.616l-4.57 4.582l2.61 2.616a1.614 1.614 0 0 0 2.284 0ZM13 10.5h22m-22 6.75h8.288M32.652 24H35m-22 0h10.508M13 30.75h16.989M13 37.5h22" />
                                            </svg>
                                        </div>
                                        <h1 class="font-[Montserrat] text-[20px] w-[500px] text-center font-bold ">
                                            Daftarkan Kelompok Tanimu !</h1>
                                        <h1
                                            class="font-[Montserrat] text-[20px] w-[500px] text-center font-reguler text-gray-500 ">
                                            Harap daftarkan kelompok tani anda untuk mengakses semua fitur BibiTani</h1>
                                    </div>
                                    <div class="flex flex-col justify-center items-center">

                                        @if ($usercount == 0)
                                            <a class="flex py-2 text-[20px] w-[120px] font-medium bg-[#204E51] text-white font-[Montserrat] rounded-[8px] border-[#204E51] border justify-center items-center hover:bg-[#fff] hover:text-[#204E51] mt-8"
                                                href="{{ route('registrasi.create') }}">Register</a>
                                        @endif
                                    </div>
                                </div>
                            @endif



                        </div>
                    </div>
                </div>


            </div>
        </div>


    </body>

@endsection
