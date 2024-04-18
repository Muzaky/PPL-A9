<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BibiTani | Homepage</title>
    <link rel="icon" href="bibitani.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>
<style>
    .alert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
    }
</style>

<body class="flex flex-col justify-center items-center h-screen">
    <nav class="flex items-center justify-between p-6 lg:px-8 mx w-full" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <img class="w-[250px] h-[86px]" src="{{ asset('../bibitani.ico') }}"alt="logobibitani">
            </a>
        </div>

        <div class=" lg:flex lg:flex-1 lg:justify-end">
            @if (Auth::check())
                <a href="{{ route('logout') }}"
                    class="flex justify-center font-semibold leading-6  mx-8 hover:bg-[#f4f4f4] bg-[#204E51] text-[#f4f4f4] hover:text-[#204E51] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Logout</a>
            @else
                <a href="/login"
                    class="flex justify-center font-semibold leading-6  mx-8 hover:bg-[#f4f4f4] bg-[#204E51] text-[#f4f4f4] hover:text-[#204E51] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Masuk</a>
                <a href="/register"
                    class="flex justify-center font-semibold leading-6  hover:bg-[#204e51] bg-[#f4f4f4] text-[#204e51] hover:text-[#f4f4f4] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Daftar</a>
            @endif
        </div>
    </nav>

    <div class="alert">
        @if (session()->has('success'))
            <div id="alert-border-3"
                class="flex items-center mt-5 p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
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
    <div class="flex justify-center items-center flex-row h-[466px] w-[1707px] bg-image">
        <style>
            .bg-image {
                background-image: url('../images/Component.png');
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
        <div class="flex flex-col bg-transparent h-full w-full font-bold justify-center">
            @if ($usercount == 0)
                <div class="flex ml-[64px] w-[300px] text-[36px] text-wrap text-white">Registrasi Kelompok Tani</div>
                <div class="flex ml-[64px] text-[20px] text-white">Lakukan registrasi untuk mengakses semua fitur
                    BibiTani
                </div>
            @elseif ($usercount != 0)
                @if ($registrasi->status_validasi == 1)
                    <div class="flex ml-[64px] w-[300px] text-[36px] text-white">Menunggu Validasi Kelompok
                        Tani
                    </div>
                    <div class="flex ml-[64px] text-[20px] text-white">Silahkan menunggu validasi dari kedinasan !
                    </div>
                @elseif ($registrasi->status_validasi == 2)
                    <div class="flex ml-[64px] w-[400px] text-[36px] text-white">Selamat Datang Kelompok Tani
                        {{ $registrasi->nama_keltani }} !
                    </div>
                    <div class="flex ml-[64px] text-[20px] text-white">Terima kasih telah menggunakan aplikasi Bibitani
                        !
                    </div>
                @endif
            @endif
        </div>

        <div class="flex flex-row bg-transparent h-full w-[1000px] items-center justify-center ">
            @if ($usercount == 0)
                <a class="flex py-2 text-[20px] mr-4 w-[120px] font-bold bg-white rounded-[4px] justify-center items-center "
                    href="{{ route('registrasi.create') }}">Register</a>
            @else
                @if ($registrasi->status_validasi == 1)
                    <a class="flex py-2 text-[20px] mr-4 w-[120px] font-bold bg-white rounded-[4px] justify-center items-center "
                        href="#">Menunggu</a>
                @elseif ($registrasi->status_validasi == 2)
                    <a class="flex py-2 text-[20px] mr-4 w-[120px] font-bold bg-white rounded-[4px] justify-center items-center "
                        href="{{ route('registrasi.edit', $registrasi->id_registrasi) }}">Lihat</a>
                @elseif ($registrasi->status_validasi == 3)
                    <a class="flex py-2 text-[20px] mr-4 w-[120px] font-bold bg-white rounded-[4px] justify-center items-center "
                        href="{{ route('registrasi.edit', $registrasi->id_registrasi) }}">Edit</a>
                @endif
            @endif
        </div>
    </div>

    <div class="flex flex-col h-full w-[1707px]  items-center">
        <h1 class="flex text-black my-10 text-[50px] font-bold">Fitur Bibitani</h1>
        <div class="flex flex-row">
            @if ($registrasi && $registrasi->status_validasi == 2)
                <a class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow-xl md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center"
                    href="{{ route('pemberitahuan.landing') }}">
                    <div class="flex flex-col items-center">
                        <img class="flex w-[150px] h-[150px]" src="{{ asset('images/newspaper.png') }}" alt="">
                        <h1 class="flex text-[20px] font-bold mt-4">Pemberitahuan</h1>
                    </div>
                </a>
                <a class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow-xl md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center"
                    href="{{ route('pengajuan.landing') }}">
                    <div class="flex flex-col items-center">

                        <img class="flex w-[150px] h-[197px]" src="{{ asset('images/Cog.png') }}" alt="">
                        <h1 class="flex text-[20px] font-bold -mt-4 text-center">Bantuan Bibit Hortikultura</h1>
                    </div>
                </a>
                <a class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow-xl md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center"
                    href="{{ route('pelaporan.landing') }}">
                    <div class="flex flex-col items-center">

                        <img class="flex w-[150px] h-[150px]" src="{{ asset('images/Document.png') }}" alt="">
                        <h1 class="flex text-[20px] font-bold mt-4">Pelaporan</h1>
                    </div>
                </a>
                <a class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow-xl md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center"
                    href="">
                    <div class="flex flex-col items-center">

                        <img class="flex w-[150px] h-[150px]" src="{{ asset('images/Chat.png') }}" alt="">
                        <h1 class="flex text-[20px] font-bold mt-4">Ulasan</h1>
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

</body>


</html>
