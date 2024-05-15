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
    <section class="flex flex-col font-[Poppins] items-center">
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
        <div class="flex flex-col text-center w-full h-full py-5 bg-[#9AB2AA]  items-center relative">
            <a href="{{ route('pelaporan.main', $pengajuan->id_pengajuan) }}"
                class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </a>

            <div>
                <h1 class="text-[28px] font-bold  px-[200px] pt-[50px] mb-4" id="judul">Detail Pelaporan Bantuan Bibit
                    {{ $informasi->first()->nama_bibit }}</h1>
            </div>
            <div class="flex flex-row text-start">
                <div class="flex flex-col container-list">
                    <div class="flex flex-row items-center gap-2 mt-4">
                        <label class="text-[24px] font-medium">Tanggal Pelaporan :</label>
                        <input type="text" class="w-[449px] bg-transparent border-0 text-[20px]" disabled readonly
                            value="{{ $data->tanggal_pelaporan }}">
                    </div>
                    <div class="flex flex-row items-center gap-2 mt-4">
                        <label class="text-[24px] font-medium">Nama Kegiatan : </label>
                        <input type="text" class="w-[449px] bg-transparent border-0 text-[20px]" disabled readonly
                            value="{{ $data->nama_kegiatan }}">
                    </div>
                    <div class="flex flex-row items-center gap-2 mt-4">
                        <label for="" class="text-[24px] font-medium">Dokumentasi :</label>
                        <a href="{{ asset('dokumentasi/' . $data->dokumentasi_pelaporan) }}"
                            class="w-[449px] border-0 text-[20px]">{{ $data->dokumentasi_pelaporan }}</a>
                    </div>
                    <div class="flex-row gap-2 mt-4">
                        <label for="" class="block text-[24px] font-medium">Kondisi :</label>
                        <textarea type="text" class="w-[449px] border-0 text-center mt-4 rounded resize-none" disabled readonly>{{ strip_tags($data->kondisi) }}</textarea>
                    </div>
                </div>

                <div class="flex flex-col bg-gray-400 container-status">
                    <h2 class="text-[24px] font-semibold px-4 py-4 mx-auto">Status Validasi</h2>
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
                                <p class="px-4 py-4 text-center">{{ $data->updated_at }}</p>
                            </div>
                            <div>
                                <textarea type="text" class="w-[449px] h-full border-0 text-center mt-4 rounded" disabled readonly>{{ strip_tags($data->catatan_validasi) }}</textarea>
                            </div>
                        @elseif ($data->status_validasi == 3)
                            {{-- <div class="flex items-center"> --}}
                                <div class="flex items-center bg-[#F0FFFB] rounded-[8px]">
                                    <div class="h-[60vpx] w-[5px] bg-red-500"></div>
                                    <div class="p-1 mx-2 bg-red-500 rounded-full">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span class="text-[#000] font-medium px-4 py-4">Berkas Pelaporan Ditolak</span>
                                </div>
                            {{-- </div> --}}
                            <div>
                                <p>{{ $data->updated_at }}</p>

                            </div>
                            <div>
                                <textarea type="text" class="w-[449px] h-full border-0 text-center mt-4 rounded" disabled readonly>Belum ada catatan</textarea>
                            </div>
                            <button>
                                <button onclick="showEditButton()"
                                    class="px-4 py-2 rounded-lg bg-red-500 text-white font-medium hover:bg-transparent hover:text-[#204E51] border border-[#204E51] w-[100px]">
                                    Ubah</button>
                            </button>
                        @else
                            {{-- <div class="flex items-center bg-[#F0FFFB] rounded-[8px]"> --}}
                                <div class="flex items-center bg-[#F0FFFB] rounded-[8px]">
                                    {{-- <div class="h-[60px] w-[5px] bg-yellow-500"></div> --}}
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
                            {{-- </div> --}}
                            <div class="flex justify-center">
                                <p class="px-4 py-4 text-center">Berkas sedang diproses</p>
                            </div>
                            <div class="flex">
                                <textarea type="text" class="w-[449px] h-full border-0 text-center rounded" disabled readonly>Belum ada catatan</textarea>
                            </div>
                            <div class="flex items-center justify-center my-4">
                                <button onclick="showEditButton()"
                                    class="px-4 py-2 rounded-lg bg-red-500 text-white font-medium hover:bg-transparent hover:text-[#204E51] border border-[#204E51] w-[100px]">
                                    Ubah</button>
                            </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
        <!-- Back button -->



        <div id="editbutton"
            class="fixed top-0 left-0 flex items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
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
                        action="{{ route('pelaporan.update', $pelaporan->id_pelaporan) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-blueGray-400">
                            Ubah Pelaporan
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

                                    <textarea name="kondisi" id="kondisi" class="border-0 px-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:ring-[#204E51] focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-[236px] resize-none mb-4 shadow-lg">{{ $data->kondisi }}</textarea>
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
                                            <input id="dropzone-file" onchange="displayFileName()" name="dokumentasi_pelaporan"
                                                type="file" class="hidden">
                                        </label>
                                    </div>       
                                    


                                    {{-- <input type="" name="id_informasi" id="id_informasi" value="{{ $data->id_informasi }}">
                                    <input type="" name="nama_informasi" id="nama_informasi" value="{{ $data->nama_informasi }}"> --}}

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
                    editbutton.classList.add('opacity-100')
                }, 20);

            }

            function hideEditButton() {
                let editbutton = document.getElementById('editbutton')
                editbutton.classList.add('opacity-0')
                setTimeout(() => {
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

    {{-- <section class="py-1 mt-4">
        <div id="editbutton" class="flex flex-col">
            <div
                class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-100">
                <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                    <form class="flex flex-col items-center justify-center" enctype="multipart/form-data">
                        <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-blueGray-400">Tabel Pengajuan</h6>
                        <div class="flex flex-wrap gap-4">
                            <div class="w-full lg:w-6/12">
                                <div class="flex items-center justify-center mb-6">
                                    <!-- Tambah container untuk gambar di sini -->
                                    <img src="path_to_your_image.jpg" alt="Image" class="h-auto max-w-full">
                                </div>
                                <label for="tanggal_pengajuan"
                                    class="block mb-2 text-xs font-bold uppercase text-blueGray-600">Tanggal
                                    Pengajuan</label>
                                <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan"
                                    class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    value="{{ $data->tanggal_pengajuan }}" placeholder="Masukkan Nama Ketua">
                            </div>
                            <div class="w-full lg:w-6/12">
                                <label for="berkas_pengajuan"
                                    class="block mb-2 text-xs font-bold uppercase text-blueGray-600">Berkas
                                    Pengajuan</label>
                                <a href="{{ asset('pdf/' . $data->berkas_pengajuan) }}" target="_blank"
                                    class="block border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{ basename($data->berkas_pengajuan) }}</a>
                            </div>
                            <div class="w-full lg:w-6/12">
                                <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600">Status
                                    Validasi</label>
                                @if ($data->status_validasi == 2)
                                    <p>Tervalidasi</p>
                                @elseif ($data->status_validasi == 3)
                                    <p>Rejected</p>
                                @else
                                    <p>Masih Dalam Process</p>
                                @endif
                            </div>
                            <div class="w-full lg:w-6/12">
                                <label for="tanggal_validasi"
                                    class="block mb-2 text-xs font-bold uppercase text-blueGray-600">Tanggal
                                    Validasi</label>
                                <input type="date" name="tanggal_validasi" id="tanggal_validasi"
                                    class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    value="{{ $data->tanggal_validasi }}" placeholder="Tanggal Validasi">
                            </div>
                            <div class="w-full lg:w-6/12">
                                <label for="catatan_validasi"
                                    class="block mb-2 text-xs font-bold uppercase text-blueGray-600">Catatan
                                    Validasi</label>
                                <input type="text" name="catatan_validasi" id="catatan_validasi"
                                    class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    value="{{ strip_tags($data->catatan_validasi) }}" placeholder="Catatan Validasi">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
