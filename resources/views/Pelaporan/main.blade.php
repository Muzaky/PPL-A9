@extends('Layout.navtani')
@section('content')
    <style>
        #judul {
            font-family: 'Montserrat';
            font-size: 48px;
            font-weight: 700;
        }

        #judul-laporan {
            font-family: 'Montserrat';
            font-weight: 700;
        }

        .font-inside {
            font-family: 'Montserrat'
        }
    </style>

    <body class="bg-slate-200">

        <section class="flex flex-col font-[Montserrat] items-center">
            <div
                class="relative w-[1440px] rounded-br-[20px] rounded-bl-[20px] border-x-2 border-b-2 border-[#204E51] shadow-xl bg-[#204E51]">
                <a href="{{ route('pelaporan.landing') }}"
                    class="absolute left-[20px] top-[20px] flex items-center text-white text-sm font-medium ml-4">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </a>
                <h1 class="my-10 text-center text-white" id="judul">Pelaporan
                </h1>
            </div>
            <div
                class="flex flex-row gap-8 items-center -mt-8 bg-gray-100 p-2 rounded-br-[20px] rounded-bl-[20px] justify-start w-[1440px] mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-32 h-32 rounded-full p-4 mt-8">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>

                <h1 class="w-[1440px] text-wrap text-gray-600 mt-6">
                    <font class="font-semibold text-yellow-500">Halaman pengajuan pelaporan bantuan bibit tani Dinas Tanaman
                        Pangan dan
                        Hortikultura (TPHP)</font>.<br> Petani dapat melakukan pelaporan dengan mencantumkan nama kegiatan,
                    dokumentasi, dan kondisi bibit yang sudah diberikan.

                </h1>
            </div>
            <div class="flex flex-row w-[1280px] justify-between">
                <div class="relative w-[500px] h-[40px] text-gray-400 focus-within:text-gray-600">
                    <input id="search_field"
                        class=" w-full h-full pl-14 pr-4 py-1 rounded-[8px] border-2 border-[#204e51] bg-[#f4f4f4]"
                        placeholder="Cari berdasarkan nama" type="search">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-6 h-6 absolute left-6 top-1/2 transform -translate-y-1/2">
                        <path fillRule="evenodd"
                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                            clipRule="evenodd" />
                    </svg>
                </div>
                <div class=" mb-2">
                    <div class="flex mb-2 w-full justify-end">
                        <form action="" method="GET" class="flex-row flex">
                            <div class="p-2 font-[Montserrat]">Filter :</div>
                            <div class="flex items-center">
                                <input type="checkbox" id="validated" name="status_validasi[]" value="2"
                                    class="form-checkbox border-green-500 focus:ring-green-500 focus:border-green-500  checked:bg-green-500 checked:border-transparent"
                                    {{ in_array('2', Request::get('status_validasi', [])) ? 'checked' : '' }}>
                                <label for="validated" class="ml-1 mr-4 text-green-500 font-[Raleway]">Validated</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="process" name="status_validasi[]" value="1"
                                    class="form-checkbox border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500  checked:bg-yellow-500 checked:border-transparent"
                                    {{ in_array('1', Request::get('status_validasi', [])) ? 'checked' : '' }}>
                                <label for="process" class="ml-1 mr-4 text-yellow-500 font-[Raleway]">Process</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="rejected" name="status_validasi[]" value="3"
                                    class="form-checkbox border-red-500 focus:ring-red-500 focus:border-red-500  checked:bg-red-500 checked:border-transparent"
                                    {{ in_array('3', Request::get('status_validasi', [])) ? 'checked' : '' }}>
                                <label for="rejected" class="ml-1 text-red-500 font-[Raleway]">Rejected</label>
                            </div>
                            <button type="submit"
                                class="ml-4 px-2 bg-[#204E51] border-2 border-[#204E51] rounded-lg text-white hover:bg-white hover:text-[#204E51]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                    stroke="currentColor" class="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center">
                @if (session()->has('status'))
                    <div id="alert-border-3"
                        class="flex items-center p-4 mt-5 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="text-sm font-medium ms-3">
                            {{ session('status') }}
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
                @if (session()->has('error'))
                    <div id="alert-border-3"
                        class="flex items-center p-4 mt-5 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-red-800 dark:border-red-800"
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
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                
                @if ($pelaporan->isEmpty())
                    <h1>Tidak ada laporan yang dapat ditampilkan</h1>
                    <a href="{{ route('pelaporan.landing') }}" class="text-[#204E51]"></a>
                @else
                    @foreach ($pelaporan as $pelaporans)
                        <div class="flex flex-col items-center tablezz">
                            <a href="{{ route('pelaporan.show', Crypt::encryptString($pelaporans->id_pelaporan)) }}"
                                class="flex items-center mb-6 bg-white border-2 w-[1280px] border-gray-200 rounded-[20px] shadow-md flex-row hover:bg-gray-100">
                                <img class="object-cover w-48 h-40 rounded-[20px]"
                                    src="{{ optional($pelaporans->dokumentasi_pelaporan) ? Storage::url($pelaporans->dokumentasi_pelaporan) : 'fallback-image-url.jpg' }}"
                                    alt="">
                                <div class="flex flex-col justify-between px-4 leading-normal">
                                    <h5 class="text-[36px] font-bold tracking-tight text-gray-900 dark:text-white font-inside"
                                        id="judul-laporan">
                                        {{ $pelaporans->nama_kegiatan }}
                                    </h5>
                                    <div
                                        class="flex items-center justify-center mb-1 text-sm font-medium text-green-500 md:justify-start">
                                        @if ($pelaporans->status_validasi == 2)
                                            <span
                                                class="px-3 py-1 text-green-500 bg-green-100 rounded-full">Validated</span>
                                        @elseif ($pelaporans->status_validasi == 3)
                                            <span class="px-3 py-1 text-red-500 bg-red-100 rounded-full">Rejected</span>
                                        @else
                                            <span
                                                class="px-3 py-1 text-yellow-500 bg-yellow-100 rounded-full">Process</span>
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
                                                Menunggu proses oleh Dinas
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

                @if ($pelaporancount == 5)
                    <div>
                        Terima kasih sudah melengkapi pelaporan bantuan kelompok tani !
                    </div>
                @else
                    <div>
                        <button onclick="showEditButton()"
                            class="px-4 py-2 rounded-lg bg-red-500 text-white font-medium hover:bg-transparent hover:text-[#204E51] border border-[#204E51] w-[220px] mt-4">
                            Tambahkan Pelaporan</button>
                    </div>
                @endif
                {{ $pelaporan->links() }}
            </div>
            {{-- @foreach ($pelaporan as $pelaporans) --}}





            {{-- @endforeach --}}

            </div>
            <div id="editbutton"
                class="fixed top-0 left-0 items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
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
                                            class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-40 shadow-lg resize-none mb-4"></textarea>

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
                                                    name="dokumentasi_pelaporan" type="file" class="hidden">
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
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#search_field').on('keyup', function() {
                        var searchText = $(this).val().toLowerCase();
                        $('.tablezz').each(function() {
                            var namaKegiatan = $(this).find('#judul-laporan').text().toLowerCase();
                            if (namaKegiatan.includes(searchText)) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        });
                    });
                });
            </script>
        </section>
    </body>
@endsection
