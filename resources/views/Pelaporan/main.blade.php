@extends('layout.navtani')
@section('content')
    <style>
        #judul {
            font-family: 'Montserrat';
            font-size: 48px;
            font-weight: 700;
        }
    </style>
    <section class="flex flex-col font-[Poppins]">
        <div>
            <a href="{{ route('pelaporan.landing') }}"
                class="mt-10 left-[20px] top-[20px] flex items-center text-black text-sm font-medium ml-4">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </a>
            <h1 class="text-[#204E51] px-[105px] mb-10 text-center" id="judul">History Pelaporan Bantuan Bibit</h1>

            <div class="flex flex-col items-center">

                @if ($pelaporan->isEmpty())
                    <h1>Anda belum melakukan pelaporan</h1>
                    <a href="{{ route('pelaporan.landing') }}" class="text-[#204E51]"></a>
                @else
                    @foreach ($pelaporan as $pelaporans)
                        <div class="flex flex-col items-center">
                            <a href="{{ route('pelaporan.show', $pelaporans->id_pelaporan) }}"
                                class="flex flex-col items-center mb-6 bg-white border w-[1710px] border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <img class="object-cover w-48 h-40 rounded"
                                    src="{{ optional($pelaporans->dokumentasi_pelaporan) ? asset('dokumentasi/' . $pelaporans->dokumentasi_pelaporan) : 'fallback-image-url.jpg' }}"
                                    alt="">
                                <div class="flex flex-col justify-between px-4 leading-normal">
                                    <h5 class="text-[36px] font-semibold tracking-tight text-gray-900 dark:text-white ">
                                        {{-- {{ optional($pengajuan->informasi)->nama_bibit }} --}}
                                        {{ $pelaporans->nama_kegiatan }}
                                    </h5>
                                    <div
                                        class="flex items-center justify-center mb-1 text-sm font-medium text-danger dark:text-danger-500 md:justify-start">
                                        @if ($pelaporans->status_validasi == 2)
                                            Validated
                                        @elseif ($pelaporans->status_validasi == 3)
                                            Rejected
                                        @else
                                            Proses
                                        @endif
                                    </div>
                                    <p class="mb-2 text-neutral-500">
                                        @if ($pelaporans->status_validasi == 2)
                                            <small>
                                                Terverifikasi tanggal
                                                <u>
                                                    {{ $pelaporans->tanggal_validasi }}
                                                </u>
                                            </small>
                                        @elseif ($pelaporans->status_validasi == 3)
                                            <small>
                                                Ditolak tanggal
                                                <u>
                                                    {{ $pelaporans->tanggal_validasi }}
                                                </u>
                                            </small>
                                        @else
                                            <small>
                                                Menunggu pemrosesan oleh Dinas
                                            </small>
                                        @endif

                                    </p>
                                    <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">

                                    </div>


                                </div>
                            </a>


                        </div>
                    @endforeach
                @endif
                <button>
                    <button onclick="showEditButton()"
                        class="px-4 py-2 rounded-lg bg-red-500 text-white font-medium hover:bg-transparent hover:text-[#204E51] border border-[#204E51] w-[220px] mt-4">
                        Tambahkan Pelaporan</button>
                </button>
            </div>
            {{-- @foreach ($pelaporan as $pelaporans) --}}





            {{-- @endforeach --}}

        </div>
        <div id="editbutton"
            class="fixed top-0 left-0 flex items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 rounded-lg shadow-lg bg-blueGray-100">
                <button onclick="hideEditButton()"
                    class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </button>
                <div class="flex-auto px-4 py-4 pt-0 lg:px-10">
                    <form class="flex flex-col items-center justify-center" action="{{ route('pelaporan.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-[#204E51]">
                            Buat Laporan
                        </h6>
                        <div class="flex flex-wrap text-center">
                            <div class="w-full px-4">
                                <div class="w-full mb-3">
                                    
                                    
                                    <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]"
                                        htmlfor="grid-password">
                                        Nama Kegiatan
                                    </label>
                                    <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                                        class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 mb-4"
                                        value="" placeholder="Isi Nama Kegiatan">
                                    </input>

                                    <label class="block mb-2 text-xs font-bold uppercase text-[#204E51]"
                                        htmlfor="grid-password">
                                        Kondisi
                                    </label>
                                    <textarea name="kondisi" id="kondisi"
                                        class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-40 shadow-lg resize-none mb-4" ></textarea>

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
@endsection
