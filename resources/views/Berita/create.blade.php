@extends('Layout.dinas_nav')
@section('content')
    <section class=" py-1  mt-4">
        <div class="flex flex-col">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0 ">
                    <form class="flex justify-center items-center flex-col" action="{{ route('berita.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (session()->has('error'))
                        <div id="alert-border-3"
                            class="flex items-center p-4 mt-5 mb-4 text-red-800 border-t-4 border-red-300 bg-green-50 dark:text-red-400 dark:bg-red-800 dark:border-red-800"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
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
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @endif
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Tabel Informasi
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Judul Informasi
                                    </label>
                                    <input id="judul_informasi" name="judul_informasi" type="text"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring focus:ring-[#204e51] w-full ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan Judul">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Nama Bibit
                                    </label>
                                    <input type="text" name="nama_bibit" id="nama_bibit"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring focus:ring-[#204e51] w-full ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan Nama Bibit">
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Tanggal Mulai
                                    </label>
                                    <input type="date" id="tgl_awal" name="tgl_awal"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring focus:ring-[#204e51] w-full ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan Tanggal Awal">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Tanggal Akhir
                                    </label>
                                    <input type="date" id="tgl_akhir" name="tgl_akhir"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring focus:ring-[#204e51] w-full ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan Tanggal Akhir">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Jumlah Bibit (Kg)
                                    </label>
                                    <input type="number" name="jumlah_bibit" id="jumlah_bibit"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring focus:ring-[#204e51] w-full ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan Jumlah Bibit">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Narahubung
                                    </label>
                                    <input type="text" name="kontak_narahubung" id="kontak_narahubung"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring focus:ring-[#204e51] w-full ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan Narahubung">
                                </div>
                            </div>


                        </div>
                        <div class="mb-[18px] mt-4 relative">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-14 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-[#F1F1F1] hover:bg-gray-100 dark:border-gray-400 dark:hover:border-gray-500 dark:hover:bg-slate-200 2xl:h-20">
                                <div class="flex flex-row items-center justify-center gap-2 pt-5 pb-6">
                                    <div id="file-name"
                                        class="flex items-center gap-2 text-gray-500 dark:text-gray-400 text-[14px] w-[500px] justify-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4" id="svg-upload">
                                            <path fillRule="evenodd"
                                                d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                                clipRule="evenodd" />
                                        </svg>
                                        <p id="textcontent">
                                            Upload Foto Berita (Max 2MB)
                                        </p>
                                    </div>
                                </div>
                                <input id="dropzone-file" onchange="displayFileName()" name="gambar_informasi"
                                    type="file" class="hidden" />
                            </label>
                        </div>

                        <div class="flex flex-row gap-8">
                            <div class="flex flex-col items-center">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 resize-none"
                                    htmlfor="grid-password">
                                    Deskripsi
                                </label>
                                <textarea name="deskripsi" id="deskripsi"></textarea>
                            </div>
                            <div class="flex flex-col items-center">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2 resize-none"
                                    htmlfor="grid-password">
                                    Syarat dan Ketentuan test
                                </label>
                                <textarea name="syarat_ketentuan" id="syarat_ketentuan"></textarea>
                            </div>

                        </div>
                        <script>
                            CKEDITOR.replace('syarat_ketentuan');
                            CKEDITOR.replace('deskripsi');
                        </script>
                        <button
                            class="mt-4 px-4 py-2 bg-[#204e51] text-[#fff] border-2 border-[#204e51] hover:bg-[#fff] hover:text-[#204e51] rounded-[8px]"
                            type="submit" class="flex">
                            Simpan
                        </button>
                    </form>
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
                    fileNameParagraph.innerHTML = svgCode + 'Klik Untuk Unggah Bukti Legalitas';
                }
            }
        </script>
    </section>
@endsection
