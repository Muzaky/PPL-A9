<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BibiTani</title>
    <link rel="icon" href="bibitani.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
    <link rel="stylesheet" href="./css/scroll.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
</head>
<style>
    .remove-arrow::-webkit-inner-spin-button,
    .remove-arrow::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .remove-arrow {
        -moz-appearance: textfield;
    }
</style>

<body>

    <nav class="flex items-center justify-between px-8 py-4 bg-white shadow-md" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5 opacity-100">
                <img class="w-[250px] h-[86px] opacity-100" src="{{ asset('../bibitani.ico') }}"alt="logobibitani">
            </a>
        </div>

        <div class=" lg:flex lg:flex-1 lg:justify-end">
            @if (Auth::check())
                @if ($registrasi == null)
                    <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                        data-dropdown-placement="bottom-start"
                        class="w-12 h-12 rounded-full cursor-pointer border-2 border-[#204E51] mr-12"
                        src="{{ asset('user.png') }}" alt="User dropdown">
                    <div id="userDropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="py-1">
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </div>
                    </div>
                @elseif ($registrasi->foto_profil == null)
                    <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                        data-dropdown-placement="bottom-start"
                        class="w-12 h-12 rounded-full cursor-pointer border-2 border-[#204E51] mr-12"
                        src="{{ asset('user.png') }}" alt="User dropdown">
                    <div id="userDropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ $registrasi->nama_keltani }}</div>
                            <div class="font-medium truncate">{{ $iduser->email }}</div>
                            @if ($registrasi->status_validasi == 2)
                                <p class="text-green-500">Verified</p>
                            @elseif ($registrasi->status_validasi == 1)
                                <p class="text-yellow-500">Unverified</p>
                            @else
                                <p class="text-red-500">Rejected</p>
                            @endif
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                            <li>
                                <a href="{{ route('homepage') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Homepage</a>
                            </li>
                            <li>
                                <a href="{{ route('kelompoktani.profile', Crypt::encryptString($registrasi->id_registrasi)) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                                    
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </div>
                    </div>
                @else
                    <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                        data-dropdown-placement="bottom-start"
                        class="w-12 h-12 rounded-full cursor-pointer border-2 border-[#204E51] mr-12"
                        src="{{ Storage::url($registrasi->foto_profil) }}" alt="User dropdown">

                    <!-- Dropdown menu -->
                    <div id="userDropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ $registrasi->nama_keltani }}</div>
                            <div class="font-medium truncate">{{ $iduser->email }}</div>
                            @if ($registrasi->status_validasi == 2)
                                <p class="text-green-500">Verified</p>
                            @elseif ($registrasi->status_validasi == 1)
                                <p class="text-yellow-500">Unverified</p>
                            @else
                                <p class="text-red-500">Rejected</p>
                            @endif
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                            <li>
                                <a href="{{ route('homepage') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Homepage</a>
                            </li>
                            <li>
                                <a href="{{ route('kelompoktani.profile', Crypt::encryptString($registrasi->id_registrasi)) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </div>
                    </div>
                @endif
            @else
                <a href="/login"
                    class="flex justify-center font-semibold leading-6  mx-8 hover:bg-[#f4f4f4] bg-[#204E51] text-[#f4f4f4] hover:text-[#204E51] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Masuk</a>
                <a href="/register"
                    class="flex justify-center font-semibold leading-6  hover:bg-[#204e51] bg-[#f4f4f4] text-[#204e51] hover:text-[#f4f4f4] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Daftar</a>
            @endif
        </div>
    </nav>

    <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    @yield('content');
</body>


</html>
