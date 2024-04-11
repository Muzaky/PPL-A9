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

<body class="flex flex-col justify-center items-center h-screen">
    {{-- @dd(auth()->user()->username)  --}}
    {{-- {{ Auth::check() ? 'Authenticated' : 'Not Authenticated' }} --}}
    <div class="flex justify-center items-center flex-row h-[466px] w-[1707px] mt-10 bg-image">
        <style>
            .bg-image {
                background-image: url('../images/Component.png');
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
        <div class="flex flex-col bg-transparent h-full w-full font-bold justify-center">
            <div class="flex ml-[64px] w-[300px] text-[36px] text-wrap text-white">Registrasi Kelompok Tani</div>
            <div class="flex ml-[64px] text-[20px] text-white">Lakukan registrasi untuk mengakses semua fitur BibiTani
            </div>
        </div>
        <div class="flex flex-row bg-transparent h-full w-[1000px] items-center justify-center ">
            @if ($user == 0)
                <a class="flex py-2 text-[20px] mr-4 w-[120px] font-bold bg-white rounded-[4px] justify-center items-center "
                    href="{{ route('registrasi.create') }}">Register</a>
            @else
                
                {{-- @if ($status == 3)
                    <a class="flex py-2 text-[20px] mr-4 w-[120px] font-bold bg-white rounded-[4px] justify-center items-center "
                        href="{{ route('registrasi.editpetani') }}">Edit</a>
                @elseif ($status == 2)
                    <a class="flex py-2 text-[20px] mr-4 w-[120px] font-bold bg-white rounded-[4px] justify-center items-center "
                        href="{{ route('registrasi.show') }}">Lihat</a>
                @else
                    <a class="flex py-2 text-[20px] mr-4 w-[120px] font-bold bg-white rounded-[4px] justify-center items-center "
                        href="">Menunggu</a>
                @endif --}}
            @endif
            {{-- <a class="flex py-2 text-[20px] mr-4 w-[120px] font-bold bg-white rounded-[4px] justify-center items-center "
                href="{{ route('registrasi.create') }}">Register</a> --}}
            @if (Auth::check())
                <a class="flex py-2 text-[20px] ml-4 w-[120px] bg-white rounded-[4px] justify-center items-center font-bold"
                    href="{{ route('logout') }}">Logout</a>
            @else
                <a class="flex py-2 text-[20px] ml-4 w-[120px] bg-white rounded-[4px] justify-center items-center font-bold"
                    href="{{ route('login') }}">Login</a>
            @endif
        </div>
    </div>

    <div class="flex flex-col h-full w-[1707px]  items-center">
        <h1 class="flex text-black my-10 text-[50px] font-bold">Fitur Bibitani</h1>
        <div class="flex flex-row">
            <a class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow-xl md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center"
                href="{{ route('berita.landing') }}">
                <div class="flex flex-col items-center">
                    <img class="flex w-[150px] h-[150px]" src="{{ asset('images/newspaper.png') }}" alt="">
                    <h1 class="flex text-[20px] font-bold mt-4">Pemberitahuan</h1>
                </div>
            </a>
            <a class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow-xl md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center"
                href="">
                <div class="flex flex-col items-center">

                    <img class="flex w-[150px] h-[197px]" src="{{ asset('images/Cog.png') }}" alt="">
                    <h1 class="flex text-[20px] font-bold -mt-4 text-center">Bantuan Bibit Hortikultura</h1>
                </div>
            </a>
            <a class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow-xl md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center"
                href="">
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

        </div>
    </div>
</body>


</html>
