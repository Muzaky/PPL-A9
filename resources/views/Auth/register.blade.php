<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="bibitani.ico">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/scroll.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center">
    <form action="{{ url('register') }}" method="post">
        @method('POST')
        @csrf
        <div class="container h-full p-10 ">
            <div class="flex flex-wrap items-center justify-center h-full text-neutral-800 dark:text-neutral-200">
                <div class="w-full">
                    <!-- Container -->
                    <div class="relative block bg-white rounded-lg shadow-lg dark:bg-neutral-800 max-md:w-[400px]">
                         <a href="/"
                            class="absolute top-0 left-0 mt-4 ml-4 text-gray-600 hover:text-gray-800"
                            aria-label="Close">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </a>
                        
                        <div class="g-0 lg:flex lg:flex-wrap">
                            <!-- Left column container-->
                            <div class="px-4 md:px-0 lg:w-6/12">
                                <div class="flex flex-col md:mx-6 md:p-12">
                                    <!--Logo-->
                                    <div class="text-center">
                                        <img class="mx-auto mb-12 w-90" src="../bibitani.ico" alt="logo" />

                                    </div>

                                    <form class="flex flex-col">
                                        <p class="mb-[10px] text-[36px] font-bold font-[Open Sans]">Daftar</p>
                                        <small class="mb-[36px] text-[#B9B8B8] ">Daftar disini menggunakan Nama, Email dan Password</small>
                                        <!--Username input-->
                                        <div class="mb-4 ">
                                            <label class="block mb-2 font-semibold text-[20px]">
                                                Nama
                                            </label>
                                            <input
                                                class="w-[600px] h-[52px] p-2 rounded-[8px] @error('name') border-red-500 @enderror max-md:w-[370px]"
                                                type="text" placeholder="Masukkan nama" id="name" name="name" />
                                            @error('name')
                                                <div class="text-red-500 capitalize invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4 ">
                                            <label class="block mb-2 font-semibold text-[20px]">
                                                Email
                                            </label>
                                            <input
                                                class="w-[600px] h-[52px] p-2 rounded-[8px] @error('email') border-red-500 @enderror max-md:w-[370px]"
                                                type="text" placeholder="Masukkan email" id="email" name="email" />
                                            @error('email')
                                                <div class="text-red-500 capitalize invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4 ">
                                            <label class="block mb-2 font-semibold text-[20px]">
                                                Password
                                            </label>
                                            <input
                                                class="w-[600px] h-[52px] p-2 rounded-[8px] @error('password') border-red-500 @enderror max-md:w-[370px]"
                                                type="password" placeholder="Masukkan password" id="password" name="password" />
                                            @error('password')
                                                <div class="text-red-500 capitalize invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4 ">
                                            <label class="block mb-2 font-semibold text-[20px]">
                                                Konfirmasi Password
                                            </label>
                                            <input
                                                class="w-[600px] h-[52px] p-2 rounded-[8px] @error('password') border-red-500 @enderror max-md:w-[370px]"
                                                type="password" placeholder="Konfirmasi password" id="password" name="confirm_password" />
                                            @error('password')
                                                <div class="text-red-500 capitalize invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <!--Password input-->


                                        <!--Submit button-->
                                        <div class="pt-1 pb-1 text-center">
                                            <button
                                                class=" bg-[#204E51] p-3 rounded-[16px] px-10 font-bold text-[#f4f4f4] border border-[#204E51] hover:bg-[#f4f4f4] hover:text-[#204E51]"
                                                type="submit">
                                                Daftar
                                            </button>

                                            <!--Forgot password link-->
                                        </div>
                                        <!--Login button-->
                                        <div class="flex items-center justify-center pb-6">
                                            <p class="mt-4 text-center text-sm text-[#204E51] ">
                                                Sudah punya akun ?
                                                <a href="/login"
                                                    class="font-bold leading-6 text-[#000000] hover:text-[#204E51] ">Masuk
                                                    disini</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Right column container with background and description-->
                            <div
                                class="hidden md:flex items-center justify-center rounded-b-lg lg:w-6/12 lg:rounded-e-lg lg:rounded-bl-none">
                                <div class="w-[688px] h-[746px] rounded-[20px] my-8"
                                    style="background-image: url('air.png'); background-size: cover"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>
