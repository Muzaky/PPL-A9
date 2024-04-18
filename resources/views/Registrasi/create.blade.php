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

<body class="flex justify-center items-center">

    <div class="container h-full p-10 ">
        <div class="flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
            <div class="w-full">
                <!-- Container -->
                <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800 relative">
                    <a href="{{ route('homepage') }}"
                        class="absolute top-0 left-0 mt-4 ml-4 text-gray-600 hover:text-gray-800" aria-label="Close">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>        
                    <div class="g-0 lg:flex lg:flex-wrap">
                        <!-- Left column container-->
                        <div class="px-4 md:px-0 lg:w-6/12">
                            <div class="md:mx-6 md:p-12 flex flex-col">
                                <!--Logo-->

                                <p class="mb-[10px] text-[36px] font-bold font-[Open Sans] text-wrap w-[300px]">
                                    Regitrasi
                                    Kelompok <font style="color: #53C341">Tani</font>
                                </p>

                                <form action="{{ route('registrasi.store') }}" method="POST"
                                    enctype="multipart/form-data" class="max-w-md">
                                    @csrf
                                    <!-- Nama Kelompok Tani -->
                                    <div class=" mb-[18px] mt-[px]">
                                        <input class="w-[600px] h-[52px] p-2  border-b border-gray-500 outline-none"
                                            type="text" placeholder="Nama Kelompok Tani" id="nama_keltani"
                                            name="nama_keltani" />
                                    </div>


                                    <!-- Nama Ketua -->
                                    <div class=" mb-[18px]">
                                        <input class="w-[600px] h-[52px] p-2  border-b border-gray-500 outline-none"
                                            type="text" placeholder="Nama Ketua" id="nama_ketua" name="nama_ketua" />
                                    </div>


                                    <!-- Luas Hamparan -->
                                    <div class=" mb-[18px]">
                                        <input class="w-[600px] h-[52px] p-2  border-b border-gray-500 outline-none "
                                            type="number" placeholder="Luas Hamparan" id="luas_hamparan"
                                            name="luas_hamparan" />
                                    </div>


                                    <!-- Jumlah Anggota -->
                                    <div class=" mb-[18px]">
                                        <input class="w-[600px] h-[52px] p-2  border-b border-gray-500 outline-none "
                                            type="number" placeholder="Jumlah Anggota" id="jumlah_anggota"
                                            name="jumlah_anggota" />
                                    </div>


                                    <!-- Alamat Kelompok Tani -->
                                    <div class=" mb-[18px]">
                                        <input class="w-[600px] h-[52px] p-2  border-b border-gray-500 outline-none "
                                            type="text" placeholder="Alamat Kelompok Tani" id="alamat_keltani"
                                            name="alamat_keltani" />
                                    </div>


                                    
                                    <!-- Nama Kecamatan -->
                                    <div class="mb-[18px] relative">
                                        <div class="relative">
                                            <select name="nama_kecamatan" id="nama_kecamatan"
                                                class="appearance-none w-[600px] h-[52px] p-2 border-b border-gray-500 outline-none pr-[52px]">
                                                <option selected disabled>Pilih Kecamatan</option>
                                                @foreach ($kecamatan as $val)
                                                    <option value="{{ $val->id_kecamatan }}">{{ $val->nama_kecamatan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            </div>
                                        </div>
                                    </div>

                                        <!-- Status Validasi -->
                                        <div class="mb-4 hidden">
                                            <label for="status_validasi"
                                                class="block text-sm font-medium text-gray-700">Status
                                                Validasi</label>
                                            <input type="number" name="status_validasi" id="status_validasi"
                                                value="1" autocomplete="off"
                                                class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <!-- ID Users -->
                                        <div class=" hidden">
                                            <input
                                            class="w-[600px] h-[52px] p-2  border-b border-gray-500 outline-none "
                                            type="text" placeholder="" id="id_users" name="id_users"
                                            value="{{ $userId }}" />
                                        </div>
                                        <!-- Bukti Legalitas -->
                                        <div class="mb-[23px] mt-[18px] text-center">
                                            <label class="block font-semibold text-[20px]">Bukti
                                                Legalitas</label>
                                            <input type="file" class="" name="bukti_legalitas"
                                                id="bukti_legalitas">
                                        </div>


                                        <!-- Submit button -->
                                    <div class="pb-1 pt-1 text-center">
                                            <button
                                                class=" bg-[#204E51] p-3 rounded px-10 font-bold text-[#f4f4f4] border border-[#204E51] hover:bg-[#f4f4f4] hover:text-[#204E51]"
                                                type="submit">
                                                Kirim
                                            </button>
                                    </div>


                                </form>
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
