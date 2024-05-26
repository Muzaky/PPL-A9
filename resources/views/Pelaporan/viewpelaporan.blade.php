@extends('Layout.navtani')
@section('content')
    <style>
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        #judul {
            font-family: 'Montserrat';
            font-size: 28px;

        }
    </style>

    <body class="flex flex-col bg-slate-200">
        <div class="alert">
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
        <div class="flex flex-col items-center">
            <div
                class="flex flex-col text-center w-[1440px] h-full bg-[#204E51] items-center mt-8 pb-4 shadow-xl border-[4px] border-[#204E51] rounded-[20px] relative">
                <div class="bg-white shadow-xl rounded-[20px] w-full px-10 pb-10">

                    <a href="{{ route('pelaporan.main', Crypt::encryptString($pengajuan->id_pengajuan)) }}"
                        class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                        <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        Back
                    </a>

                    <div>
                        <h1 class="text-[40px] font-bold  mt-4 font-[Montserrat] text-[#204E51]">Form Detail Pelaporan</h1>
                    </div>

                    <div class="flex flex-row w-[1280px] gap-4 justify-between font-[Montserrat] mt-4">
                        <div class="flex flex-col">
                            <div class="flex flex-row gap-2 items-center">
                                <h1 class="text-[24px] font-semibold">Nama Kegiatan : </h1>
                                <h1 class="text-[24px] font-semibold">{{ $data->nama_kegiatan }}</h1>
                            </div>
                            <div class="flex flex-row gap-2 items-center">
                                <h1 class="text-[24px] font-semibold">Kelompok Tani : </h1>
                                <h1 class="text-[24px] font-semibold">{{ $registrasi->nama_keltani }}</h1>
                            </div>

                        </div>
                        <div class="flex flex-row gap-2">
                            <h1 class="text-[16px] font-semibold">Tanggal Laporan : </h1>
                            <h1 class="text-[16px] font-semibold">{{ $data->tanggal_pelaporan }}</h1>
                        </div>
                    </div>

                </div>
                <div class="flex flex-row text-start gap-8 w-[1330px] py-8 justify-between">
                    <div class="flex flex-col container-list font-[Montserrat]">
                        <div class="flex flex-row gap-4 justify-between font-[Montserrat] mt-4">
                            <div class="flex flex-row gap-2 items-center text-white">
                                <h1 class="text-[24px] font-semibold">Dokumentasi : </h1>
                                <a href="{{ Storage::url($data->dokumentasi_pelaporan) }} "
                                    class="flex flex-col items-center justify-center w-[400px] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-[#F1F1F1] hover:bg-gray-100 dark:border-gray-400 dark:hover:border-gray-500 dark:hover:bg-slate-200 h-14">
                                    <div class="flex flex-row items-center justify-center gap-2 pt-5 pb-6">
                                        <div id="file-name"
                                            class="flex items-center gap-2 text-gray-500 dark:text-gray-400 text-[14px] w-[500px] justify-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                strokeWidth={1.5} stroke="currentColor" class="w-4 h-4">
                                                <path strokeLinecap="round" strokeLinejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                            </svg>

                                            <p id="textcontent">
                                                {{ basename($data->dokumentasi_pelaporan) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 mt-4">
                            <label for="" class="block text-[24px] font-semibold text-white">Kondisi :</label>
                            <textarea type="text" class="w-[587px] h-[180px] border-0 text-center mt-4 rounded-[12px] resize-none" disabled
                                readonly>{{ strip_tags($data->kondisi) }}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-col container-status font-[Montserrat]">
                        <h2 class="text-[24px] font-semibold px-4 py-4 mx-auto text-white">Status Validasi</h2>
                        <div class="flex flex-col mx-4">
                            @if ($data->status_validasi == 2)
                                <div class="flex items-center bg-[#F0FFFB] rounded-[8px]">
                                    <div class="h-[60vpx] w-[5px] bg-green-500"></div>
                                    <div class="p-1 mx-2 bg-green-500 rounded-full">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span class="text-[#000] font-medium px-4 py-4">Pelaporan Bantuan Bibit telah
                                        disetujui</span>
                                </div>
                                <div>
                                    <p class="px-4 py-4 text-center">Tanggal Validasi : {{ $data->updated_at }}</p>
                                </div>
                                <div>
                                    <textarea type="text" class="w-[449px] h-full border-0 text-center mt-4 rounded" disabled readonly>{{ strip_tags($data->catatan_validasi) }}</textarea>
                                </div>
                            @elseif ($data->status_validasi == 3)
                                <div class="flex items-center bg-red-200 rounded-[8px]">
                                    <div class="h-[60vpx] w-[5px] bg-red-500"></div>
                                    <div class="p-1 mx-2 bg-red-500 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fillRule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clipRule="evenodd" />
                                          </svg>
                                          
                                          
                                    </div>
                                    <span class="text-[#000] font-medium px-4 py-4">Berkas Pelaporan Ditolak</span>
                                </div>
                                <div>
                                    <p class="px-4 py-4 text-center text-white">Tanggal Validasi : {{ $data->updated_at }}
                                    </p>
                                </div>
                                <div>
                                    <textarea type="text" class="w-[449px] h-full border-0 text-center mt-4 rounded" disabled readonly>{{ strip_tags($data->catatan_validasi) }}</textarea>
                                </div>
                            @else
                                <div class="flex items-center bg-yellow-100 rounded-[8px]">
                                    <div class="p-1 mx-2 bg-yellow-500 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            strokeWidth={1.5} stroke="currentColor" class="w-8 h-8">
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                        </svg>
                                    </div>
                                    <span class="text-[#000] font-medium px-4 py-4">Berkas Pelaporan Sedang
                                        Diproses</span>
                                </div>
                                <div class="flex justify-center">
                                    <p class="px-4 py-4 text-center text-white ">Menunggu validasi dinas</p>
                                </div>
                                <div class="flex">
                                    <textarea type="text" class="w-[449px] h-[148px] border-0 text-center rounded-[12px] resize-none" disabled
                                        readonly>Belum ada catatan</textarea>
                                </div>
                        </div>
                        @endif
                    </div>
                    
                </div>
                
            </div>
            <div class="flex flex-row mt-4 justify-center">
                @if ($data->status_validasi == 3 || $data->status_validasi == 1)
                    <button onclick="showEditButton()"
                        class="text-[#f4f4f4] p-2 font-[Montserrat] border-b-2">Ubah
                        Data</button>
                @endif
            </div>
        </div>
        <!-- Back button -->



        <div id="editbutton"
            class="fixed top-0 left-0 items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40 font-[Montserrat]">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 rounded-lg shadow-lg bg-blueGray-100">
                <button onclick="hideEditButton()"
                    class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    Back
                </button>
                <div class="flex-auto px-4 py-4 pt-0 lg:px-10">
                    <form class="flex flex-col items-center justify-center"
                        action="{{ route('pelaporan.update',  Crypt::encryptString($pelaporan->id_pelaporan)) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-blueGray-400">
                            Ubah Data Pelaporan
                        </h6>
                        <div class="flex flex-wrap text-center">

                            <div class="w-full px-4">
                                <div class="w-full mb-3">

                                    <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600"
                                        htmlfor="grid-password">
                                        Nama Kegiatan
                                    </label>
                                    <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                                        class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring focus:ring-[#204E51] w-[500px] ease-linear transition-all duration-150 mb-4"
                                        value="{{ $data->nama_kegiatan }}" placeholder="Masukkan File">
                                    </input>
                                    <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600"
                                        htmlfor="grid-password">
                                        Kondisi
                                    </label>

                                    <textarea name="kondisi" id="kondisi"
                                        class="border-0 px-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:ring-[#204E51] focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-[236px] resize-none mb-4 shadow-lg">{{ $data->kondisi }}</textarea>
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
                                                        Klik Untuk Unggah Dokumentasi Pelaporan
                                                    </p>
                                                </div>
                                            </div>
                                            <input id="dropzone-file" onchange="displayFileName()"
                                                name="dokumentasi_pelaporan" type="file" class="hidden" accept="image/*">
                                        </label>
                                    </div>
                                    <div class="notice-container  my-4 bg-gray-200/40 text-[14px] flex-row flex items-center rounded-[8px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            strokeWidth={1.5} stroke="currentColor"
                                            class="rounded-full w-[100px] h-[100px] p-2 text-yellow-200">
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                        </svg>
                                    
                                        <span class="p-2  w-[400px] text-wrap">
                                            Mengubah data akan otomatis mengubah status validasi kembali ke status dalam proses
                                        </span>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <button type="submit" class="flex mt-4">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function showEditButton() {
                let editbutton = document.getElementById('editbutton')

                editbutton.classList.remove('hidden')
                editbutton.classList.add('flex')
                setTimeout(() => {
                    editbutton.classList.remove('opacity-0')
                    editbutton.classList.add('opacity-100')
                }, 20);

            }

            function hideEditButton() {
                let editbutton = document.getElementById('editbutton')
                editbutton.classList.add('opacity-0')
                setTimeout(() => {
                    editbutton.classList.remove('opacity-100')
                    editbutton.classList.add('hidden')
                    editbutton.classList.remove('flex')
                }, 500);
            }

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
