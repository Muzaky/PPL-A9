<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="bibitani.ico">
    <title>Bibitani | Registrasi Kelompok Tani</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<body class="flex items-center justify-center">
    <div class="container h-full p-10 ">
        <div class="flex flex-wrap items-center justify-center h-full text-neutral-800 dark:text-neutral-200">
            <div class="w-full">
                @if (session()->has('error'))
                <div id="alert-border-3"
                    class="flex items-center p-4 mt-5 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-red-800 dark:border-red-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="text-sm font-medium ms-3">
                        {{ session('error') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-red-800 dark:text-red-400 dark:hover:bg-red-700"
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
                        <div class="px-4  w-6/12">
                            <div class="flex flex-col md:mx-6 md:p-12">
                                <!--Logo-->

                                <p class="mb-[10px] text-[36px] font-bold font-[Montserrat] text-wrap w-[300px]">
                                    Regitrasi
                                    Kelompok <font style="color: #53C341">Tani</font>
                                </p>

                                <form action="{{ route('registrasi.store') }}" method="POST"
                                    enctype="multipart/form-data" class="flex flex-col max-w-md" id="form-create">
                                    @csrf
                                    <!-- Nama Kelompok Tani -->
                                    <div class="mb-[18px] form-group">
                                        <input class="w-full h-[52px] p-2 border-0  border-b border-gray-500 outline-none"
                                            type="text" placeholder="Nama Kelompok Tani" id="nama_keltani"
                                            name="nama_keltani" />
                                    </div>


                                    <!-- Nama Ketua -->
                                    <div class=" mb-[18px]">    
                                        <input class="w-full h-[52px] p-2 border-0 border-b border-gray-500 outline-none"
                                            type="text" placeholder="Nama Ketua" id="nama_ketua" name="nama_ketua" />
                                    </div>


                                    <!-- Luas Hamparan -->
                                    <div class=" mb-[18px]">
                                        <input class="w-full h-[52px] p-2 border-0 border-b border-gray-500 outline-none "
                                            type="number" placeholder="Luas Hamparan (Hektare)" id="luas_hamparan"
                                            name="luas_hamparan" />
                                    </div>


                                    <!-- Jumlah Anggota -->
                                    <div class=" mb-[18px]">
                                        <input class="w-full h-[52px] p-2 border-0 border-b border-gray-500 outline-none "
                                            type="number" placeholder="Jumlah Anggota" id="jumlah_anggota"
                                            name="jumlah_anggota" />
                                    </div>


                                    <!-- Alamat Kelompok Tani -->
                                    <div class=" mb-[18px]">
                                        <input class="w-full h-[52px] p-2 border-0 border-b border-gray-500 outline-none "
                                            type="text" placeholder="Alamat Kelompok Tani" id="alamat_keltani"
                                            name="alamat_keltani" />
                                    </div>



                                    <!-- Nama Kecamatan -->
                                    <div class="mb-[18px] relative">
                                        <div class="relative">
                                            <select name="nama_kecamatan" id="nama_kecamatan"
                                                class="appearance-none w-full h-[52px] p-2 border-b border-gray-500 outline-none pr-[52px] border-0">
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
                                    <div class="hidden mb-4">
                                        <label for="status_validasi"
                                            class="block text-sm font-medium text-gray-700">Status
                                            Validasi</label>
                                        <input type="number" name="status_validasi" id="status_validasi" value="1"
                                            autocomplete="off"
                                            class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    </div>

                                    <!-- ID Users -->
                                    <div class="hidden ">
                                        <input class="w-full h-[52px] p-2  border-b border-gray-500 outline-none "
                                            type="text" placeholder="" id="id_users" name="id_users"
                                            value="{{ $userId }}" />
                                    </div>
                                    <!-- Bukti Legalitas -->

                                    <div class="mb-[18px] relative">
                                        <label for="dropzone-file"
                                            class="flex flex-col items-center justify-center w-full h-14 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-[#F1F1F1] hover:bg-gray-100 dark:border-gray-400 dark:hover:border-gray-500 dark:hover:bg-slate-200 2xl:h-20">
                                            <div class="flex flex-row items-center justify-center gap-2 pt-5 pb-6">
                                                <div id="file-name"
                                                    class="flex items-center gap-2 text-gray-500 dark:text-gray-400  text-[14px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4" id="svg-upload">
                                                        <path fillRule="evenodd"
                                                            d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                                            clipRule="evenodd" />
                                                    </svg>
                                                    <p id="textcontent">
                                                        Unggah Bukti Legalitas Dalam Bentuk PDF
                                                    </p>
                                                </div>
                                            </div>
                                            <input id="dropzone-file" onchange="displayFileName()"
                                                name="bukti_legalitas" type="file" class="hidden" accept="application/pdf" />
                                        </label>
                                    </div>
                                    <!-- Submit button -->
                                    <div class="pt-1 pb-1 text-center form-group">
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

    <script>
        function displayFileName() {
            const fileInput = document.getElementById('dropzone-file');
            const fileNameParagraph = document.getElementById('file-name');
            const textcontent = document.getElementById('textcontent');
            const svgCode = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4" id="svg-upload">
                                                        <path fillRule="evenodd"
                                                            d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                                            clipRule="evenodd" />
                                                    </svg>`
            if (fileInput.files.length > 0) {
                fileNameParagraph.textContent = fileInput.files[0].name;
            } else {
                fileNameParagraph.innerHTML = svgCode + 'Unggah Bukti Legalitas Dalam Bentuk PDF';
            }
        }
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>





</body>

</html>
