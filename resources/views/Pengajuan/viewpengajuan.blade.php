@extends('Layout.navtani')
@section('content')

    <body class="">
        <div class="items-center justify-center flex">
            <div
                class="flex flex-col text-center w-[1440px] h-full bg-[#204E51] items-center mt-4 shadow-xl border-[4px] border-[#204E51] rounded-[20px] relative">
                <div class="bg-white shadow-xl rounded-[20px] w-full px-10 pb-10">
                    <a href="{{ route('pengajuan.landing') }}"
                        class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium font-[Montserrat]">
                        <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        Back
                    </a>

                    <div>
                        <h1 class="text-[40px] font-bold  mt-4 font-[Montserrat] text-[#204E51]">Form Detail Pengajuan</h1>
                    </div>
                    <!-- Back button -->
                    <div class="flex flex-row w-[1280px] gap-4 justify-between font-[Montserrat] mt-4">
                        <div class="flex flex-row gap-2 items-center">
                            <h1 class="text-[24px] font-semibold">Nama Bibit : </h1>
                            <h1 class="text-[24px] font-semibold">{{ $informasi->nama_bibit }}</h1>
                        </div>
                        <div class="flex flex-row gap-2">
                            <h1 class="text-[16px] font-semibold">Tanggal Pengajuan : </h1>
                            <h1 class="text-[16px] font-semibold">{{ $pengajuan->tanggal_pengajuan }}</h1>
                        </div>
                    </div>
                    <div class="flex flex-row w-[1280px] gap-4 justify-between font-[Montserrat] mt-4">
                        <div class="flex flex-row gap-2 items-center">
                            <h1 class="text-[24px] font-semibold">Berkas Pengajuan : </h1>
                            <a href="{{ asset('pdf/' . $pengajuan->berkas_pengajuan) }}"
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
                                            {{ $pengajuan->berkas_pengajuan }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="flex flex-col w-[1330px] h-[349px] rounded-[20px] mt-[36px]">
                    <div class="flex flex-row items-center justify-between gap-2 mt-4 mx-4">
                        @if ($pengajuan->status_validasi == 2)
                            <div class="flex items-center">
                                <label for="" class="text-[24px] font-semibold font-[Montserrat] text-white">Status
                                    Validasi :</label>
                                <div class="flex items-center bg-[#F0FFFB] rounded-[8px] mx-4">
                                    <div class="h-[60px] w-[5px] bg-green-500"></div>
                                    <div class="bg-green-500 rounded-full p-1 mx-2">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span class="text-[#000] font-semibold px-4 py-4 font-[Raleway]">Berkas Pengajuan Bibit
                                        telah
                                        disetujui</span>
                                </div>
                            </div>
                            <div class="flex flex-row items-center gap-2">
                                <h1 class="text-[16px] font-semibold font-[Montserrat] text-white">Tanggal Validasi : </h1>
                                <h1 class="text-[16px] font-normal font-[Montserrat] text-white">
                                    {{ $pengajuan->updated_at }}</h1>
                            </div>
                        @elseif ($pengajuan->status_validasi == 3)
                            <div class="flex items-center">
                                <label for="" class="text-[24px] font-medium">Status Validasi :</label>
                                <div class="flex items-center bg-[#F0FFFB] rounded-[8px] mx-4">
                                    <div class="h-[60px] w-[5px] bg-red-500"></div>
                                    <div class="bg-red-500 rounded-full p-1 mx-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>

                                    </div>
                                    <span class="text-[#000] font-medium px-4 py-4">Berkas Pengajuan Bibit Ditolak</span>
                                </div>
                            </div>
                            <div class="flex flex-row items-center gap-2">
                                <h1 class="text-[24px] font-semibold font-[Montserrat] text-white">Tanggal Validasi : </h1>
                                <h1 class="text-[24px] font-normal font-[Montserrat] text-white">
                                    {{ $pengajuan->updated_at }}</h1>
                            </div>
                        @else
                            <div class="flex items-center">
                                <label for="" class="text-[24px] font-semibold font-[Montserrat] text-white">Status
                                    Validasi :</label>
                                <div class="flex items-center bg-[#F0FFFB] rounded-[8px] mx-4">
                                    <div class="h-[60px] w-[5px] bg-yellow-500"></div>
                                    <div class="bg-yellow-500 rounded-full  ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            strokeWidth={1.5} stroke="currentColor" class="w-8 h-8">
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                        </svg>
                                    </div>
                                    <span class="text-[#000] font-medium px-2 py-4">Berkas Pengajuan Bibit Sedang
                                        Diproses</span>
                                </div>
                            </div>
                            <div class="">
                                <div class="flex flex-row items-center gap-2">
                                    @if ($pengajuan->tanggal_validasi != null)
                                        <h1 class="text-[16px] font-semibold font-[Montserrat] text-white">Tanggal Validasi
                                            : </h1>
                                        <h1 class="text-[16px] font-normal font-[Montserrat] text-white">
                                            {{ $pengajuan->updated_at }}</h1>
                                    @else
                                        <h1 class="text-[16px] font-normal font-[Montserrat] text-white">Menunggu Validasi
                                            Dinas</h1>
                                    @endif
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="flex flex-col items-center gap-2 mt-8">
                        <label for="" class="text-[24px] font-semibold font-[Montserrat] text-white">Catatan
                            Validasi :</label>
                        <textarea class="rounded-[20px] w-[980px] h-[180px] resize-none border-0 p-4" disabled readonly>{{ strip_tags($pengajuan->catatan_validasi) }}</textarea>
                    </div>



                </div>
                <div class="flex flex-row m-4 ">
                    @if ($pengajuan->status_validasi == 3 || $pengajuan->status_validasi == 1)
                        <button onclick="showEditButton()" class="text-[#f4f4f4] p-2 font-[Montserrat] border-b-2">Ubah
                            Data</button>
                    @endif
                </div>

            </div>
        </div>


        <div id="editbutton"
            class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen items-center justify-center opacity-0 transition-opacity duration-500 hidden">
            <div
                class="bg-white relative flex flex-col min-w-0 break-words  mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <button onclick="hideEditButton()"
                    class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </button>
                <div class="flex-auto px-4 lg:px-10 py-4 pt-0">
                    <form class="flex justify-center items-center flex-col"
                        action="{{ route('pengajuan.update', $pengajuan->id_pengajuan) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Ubah Pengajuan
                        </h6>
                        <div class="flex flex-wrap text-center">


                            <div class="w-full  px-4">
                                <div class="w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Berkas Pengajuan
                                    </label>

                                    <div class="mb-[18px] relative">
                                        <label for="dropzone-file"
                                            class="flex flex-col items-center justify-center w-full h-14 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-[#F1F1F1] hover:bg-gray-100 dark:border-gray-400 dark:hover:border-gray-500 dark:hover:bg-slate-200 2xl:h-20">
                                            <div class="flex flex-row items-center justify-center gap-2 pt-5 pb-6">
                                                <div id="file-name"
                                                    class="flex items-center gap-2 text-gray-500 dark:text-gray-400 text-[14px] w-[500px] justify-center ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4" id="svg-upload">
                                                        <path fillRule="evenodd"
                                                            d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                                            clipRule="evenodd" />
                                                    </svg>
                                                    <p id="textcontent">
                                                        Klik Untuk Unggah Berkas Pengajuan
                                                    </p>
                                                </div>
                                            </div>
                                            <input id="dropzone-file" onchange="displayFileName()"
                                                name="berkas_pengajuan" type="file" class="hidden" />
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

    </body>


@endsection
