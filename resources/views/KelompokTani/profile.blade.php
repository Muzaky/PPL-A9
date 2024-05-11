<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="bibitani.ico">
    <title>Bibitani | Registrasi Kelompok Tani</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center">

    <div class="container h-full p-10 ">
        <div class="flex flex-wrap items-center justify-center h-full text-neutral-800 dark:text-neutral-200">
            <div class="w-full">
                <!-- Container -->
                <div class="relative block bg-white rounded-lg shadow-lg dark:bg-neutral-800">
                    <a href="{{ route('homepage') }}"
                        class="absolute top-0 left-0 mt-4 ml-4 text-gray-600 hover:text-gray-800" aria-label="Close">
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

                                <p class="mb-[10px] text-[36px] font-bold font-[Open Sans] text-wrap w-[300px]">
                                    Profile Kelompok <font style="color: #53C341">Tani</font>
                                </p>

                                <div id="profile" class="flex flex-row">
                                    <div id="profileauth" class="flex w-[50%] flex-col pr-8">
                                        <p>Akun Kredensial</p>
                                        <label for="email" class="pt-2">Email</label>
                                        <input type="text" value="{{ $registrasi->email }}">
                                        <label for="email" class="pt-2">Password</label>
                                        <input type="password" value="{{ $hashedpassword }}"> 
                                    </div>
                                    <div id="profilekeltan" class="flex w-[50%] flex-col">
                                        <p>Data Profil {{ $registrasi->nama_keltani }}</p>
                                        <div id="profilekeltan-main" class="flex flex-col">
                                            <label for="nama_keltani" class="pt-2">Kelompok Tani</label>
                                            <input type="text" value="{{ $registrasi->nama_keltani }}">
                                            <label for="nama_keltani" class="pt-2">Ketua</label>
                                            <input type="text" value="{{ $registrasi->nama_ketua }}">
                                            <label for="nama_keltani" class="pt-2">Luas Hamparan</label>
                                            <input type="text" value="{{ $registrasi->luas_hamparan }}">
                                            <label for="nama_keltani" class="pt-2">Jumlah Anggota</label>
                                            <input type="text" value="{{ $registrasi->jumlah_anggota }}">
                                            <label for="nama_keltani" class="pt-2">Alamat</label>
                                            <input type="text" value="{{ $registrasi->alamat_keltani }}">
                                            <label for="nama_keltani" class="pt-2">Kecamatan</label>
                                            <input type="text" value="{{ $registrasi->nama_kecamatan }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Right column container with background and description-->
                        <div class="lg:w-6/12 lg:rounded-e-lg lg:rounded-bl-none">
                            <div class="w-full lg:w-[688px] h-[746px] rounded-[20px] my-8 mx-auto lg:mx-0"
                                style="background-image: url({{ asset('image_1.png') }}); background-size: cover;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
