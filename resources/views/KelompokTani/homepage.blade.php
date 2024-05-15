@extends('layout.navtani')
@section('content')
    <style>
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .font-isi,
        .judul,.profilehome {
            font-family: 'Montserrat';
            font-weight: 700;
            color: #204E51;
        }

        .embossed {
            transition: box-shadow 0.3s, text-shadow 0.3s;
        }

        .embossed h1 {
            transition: text-shadow 0.3s;
        }

        .embossed:hover {
            box-shadow: inset 2px 2px 5px rgba(255, 255, 255, 0.6),
                inset -2px -2px 5px rgba(0, 0, 0, 0.2),
                4px 4px 10px rgba(0, 0, 0, 0.1);
           
            
        }

        .embossed:hover h1 {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1),
                -1px -1px 2px rgba(255, 255, 255, 0.8);
        }
    </style>

    <body class="">
        <div class=" alert">
            @if (session()->has('success'))
                <div id="alert-border-3"
                    class="flex items-center p-4 mt-5 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="text-sm font-medium ms-3">
                        {{ session('success') }}
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
                class="flex flex-row items-center justify-between w-full px-12 bg-gray-500 rounded shadow-lg h-60 bg-image bg-blend-multiply">
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
                            <div class="flex w-[300px] text-[36px] text-white">Menunggu Validasi Kelompok
                                Tani
                            </div>
                            <div class="flex text-[20px] text-white">Silahkan menunggu validasi dari kedinasan !
                            </div>
                        @elseif ($registrasi->status_validasi == 2)
                        <div class="profilehome">
                            <div class="flex w-[400px] text-[36px] text-[#f4f4f4]">Halo,
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
                        <a class="flex flex-col items-center mx-4 bg-white border-4 border-[#204E51] rounded-[20px] shadow-xl md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center embossed"
                            href="{{ route('pemberitahuan.landing') }}">
                            <div class="flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1">
                                        <path stroke-dasharray="4" stroke-dashoffset="4" d="M12 3V5" class="fill">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s"
                                                values="4;0" />
                                        </path>
                                        <path stroke-dasharray="28" stroke-dashoffset="28"
                                            d="M12 5C8.68629 5 6 7.68629 6 11L6 17C5 17 4 18 4 19H12M12 5C15.3137 5 18 7.68629 18 11L18 17C19 17 20 18 20 19H12">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s"
                                                dur="0.4s" values="28;0" />
                                        </path>
                                        <path stroke-dasharray="8" stroke-dashoffset="8"
                                            d="M10 20C10 21.1046 10.8954 22 12 22C13.1046 22 14 21.1046 14 20">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s"
                                                dur="0.2s" values="8;0" />
                                        </path>
                                        <path stroke-dasharray="8" stroke-dashoffset="8" d="M22 6v4" opacity="0">
                                            <set attributeName="opacity" begin="1s" to="1" />
                                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="1s"
                                                dur="0.2s" values="8;0" />
                                        </path>
                                    </g>
                                    <circle cx="22" cy="14" r="1" fill="currentColor" fill-opacity="0">
                                        <animate fill="freeze" attributeName="fill-opacity" begin="1s" dur="0.4s"
                                            values="0;1" />
                                    </circle>
                                </svg>
                                <h1 class="font-isi flex text-[20px] font-bold -mt-2">Pemberitahuan</h1>
                            </div>
                        </a>
                        <a class="flex flex-col items-center mx-4 bg-white border-4 border-[#204E51] rounded-[20px] shadow-xl md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center embossed"
                            href="{{ route('pengajuan.landing') }}">
                            <div class="flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <g stroke-width="1">
                                            <path stroke-dasharray="66" stroke-dashoffset="50" d="M12 3H19V21H5V3H12Z">
                                                <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s"
                                                    values="66;0" />
                                            </path>
                                            <path stroke-dasharray="5" stroke-dashoffset="5" d="M9 10H12">
                                                <animate fill="freeze" attributeName="stroke-dashoffset" begin="1s"
                                                    dur="0.2s" values="5;0" />
                                            </path>
                                            <path stroke-dasharray="6" stroke-dashoffset="6" d="M9 13H14">
                                                <animate fill="freeze" attributeName="stroke-dashoffset" begin="1.2s"
                                                    dur="0.2s" values="6;0" />
                                            </path>
                                            <path stroke-dasharray="7" stroke-dashoffset="7" d="M9 16H15">
                                                <animate fill="freeze" attributeName="stroke-dashoffset" begin="1.4s"
                                                    dur="0.2s" values="7;0" />
                                            </path>
                                        </g>
                                        <path stroke-dasharray="12" stroke-dashoffset="12" d="M14.5 3.5V6.5H9.5V3.5">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s"
                                                dur="0.2s" values="12;0" />
                                        </path>
                                    </g>
                                </svg>
                                <h1 class="font-isi  flex text-[20px] font-bold text-center">Bantuan Bibit Hortikultura
                                </h1>
                            </div>
                        </a>
                        <a class="flex flex-col items-center mx-4 bg-white border-4 border-[#204E51] rounded-[20px] shadow-xl md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center embossed"
                            href="{{ route('pelaporan.landing') }}">
                            <div class="flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1">
                                        <path stroke-dasharray="56" stroke-dashoffset="56"
                                            d="M3 21L4.99998 15L16 4C17 3 19 3 20 4C21 5 21 7 20 8L8.99998 19L3 21">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s"
                                                values="56;0" />
                                        </path>
                                        <g stroke-dasharray="6" stroke-dashoffset="6">
                                            <path d="M15 5L19 9">
                                                <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s"
                                                    dur="0.2s" values="6;0" />
                                            </path>
                                            <path stroke-width="1" d="M6 15L9 18">
                                                <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s"
                                                    dur="0.2s" values="6;0" />
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <h1 class="font-isi  flex text-[20px] font-bold ">Pelaporan</h1>
                            </div>
                        </a>
                        <a class="flex flex-col items-center mx-4 bg-white border-4 border-[#204E51] rounded-[20px] shadow-xl md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center embossed"
                            href="{{ route('ulasan.landing') }}">
                            <div class="flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1">
                                        <path stroke-dasharray="68" stroke-dashoffset="68"
                                            d="M3 19.5V4C3 3.44772 3.44772 3 4 3H20C20.5523 3 21 3.44772 21 4V16C21 16.5523 20.5523 17 20 17H5.5z">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s"
                                                values="68;0" />
                                        </path>
                                        <path stroke-dasharray="10" stroke-dashoffset="10" d="M8 7h8" opacity="0">
                                            <set attributeName="opacity" begin="0.7s" to="1" />
                                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s"
                                                dur="0.2s" values="10;0" />
                                        </path>
                                        <path stroke-dasharray="10" stroke-dashoffset="10" d="M8 10h8" opacity="0">
                                            <set attributeName="opacity" begin="0.8s" to="1" />
                                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.8s"
                                                dur="0.2s" values="10;0" />
                                        </path>
                                        <path stroke-dasharray="6" stroke-dashoffset="6" d="M8 13h4" opacity="0">
                                            <set attributeName="opacity" begin="0.9s" to="1" />
                                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.9s"
                                                dur="0.2s" values="6;0" />
                                        </path>
                                    </g>
                                </svg>
                                <h1 class="font-isi  flex text-[20px] font-bold mt-4">Ulasan</h1>
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


    </body>

@endsection
