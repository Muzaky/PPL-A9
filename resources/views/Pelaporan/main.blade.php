@extends('layout.navtani')
@section('content')
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
            <h1 class=" text-[48px] font-bold text-[#204E51] px-[105px]  mb-10">Pelaporan Bantuan Bibit</h1>


            @foreach ($pelaporan as $pelaporans)
                @if ($pelaporans->id_pelaporan == 0)
                    <div class="flex flex-col items-center">

                        <h1>Anda belum melakukan pelaporan</h1>
                        <a href="{{ route('pelaporan.landing') }}" class="text-[#204E51]"></a>
                        <button>
                            <button onclick="showEditButton()"
                                class="px-4 py-2 rounded-lg bg-red-500 text-white font-medium hover:bg-transparent hover:text-[#204E51] border border-[#204E51] w-[220px] mt-4">
                                Tambahkan Pelaporan</button>
                        </button>
                    </div>
                @else
                    <div class="flex flex-col items-center">
                        <h1>sudah berisi</h1>

                    </div>
                @endif
                
            <div class="flex flex-col items-center">
                <a href="{{ route('pelaporan.show', $pelaporans->id_pelaporan) }}"
                    class="flex flex-col items-center mb-6 bg-white border w-[1710px] border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        src="{{ optional($pengajuan->informasi)->gambar_informasi ? asset('img/' . $pengajuan->informasi->gambar_informasi) : 'fallback-image-url.jpg' }}"
                        alt="">
                    <div class="flex flex-col justify-between px-4 leading-normal">
                        <h5 class="text-[56px] font-bold tracking-tight text-gray-900 dark:text-white ">
                            {{ optional($pengajuan->informasi)->nama_bibit }}</h5>
                        <div
                            class="mb-1 flex items-center justify-center text-sm font-medium text-danger dark:text-danger-500 md:justify-start">
                            @if ($pengajuan->status_validasi == 2)
                                Validated
                            @else
                                {{ $pengajuan->status_validasi }}
                            @endif
                        </div>
                        <p class="text-neutral-500 mb-2">
                            <small>
                                Terverifikasi tanggal
                                <u>
                                    {{ $pengajuan->tanggal_validasi }}
                                </u>
                            </small>
                        </p>
                        <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">

                        </div>

                    </div>
                </a>

            </div>

            
            @endforeach

        </div>
        <div id="editbutton"
            class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen flex items-center justify-center opacity-0 transition-opacity duration-500 hidden">
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
                    <form class="flex justify-center items-center flex-col" action="{{ route('pelaporan.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Buat Laporan
                        </h6>
                        <div class="flex flex-wrap text-center">


                            <div class="w-full  px-4">
                                <div class="w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Dokumentasi Pelaporan
                                    </label>
                                    <input type="file" name="dokumentasi_pelaporan" id="dokumentasi_pelaporan"
                                        class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan File">
                                    </input>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Nama Kegiatan
                                    </label>
                                    <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                                        class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan File">
                                    </input>
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Kondisi
                                    </label>
                                    <input type="text" name="kondisi" id="kondisi"
                                        class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan File">
                                    </input>

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
        </script>
    </section>
@endsection
