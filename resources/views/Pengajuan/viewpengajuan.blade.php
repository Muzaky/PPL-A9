@extends('Layout.navtani')
@section('content')
    <section class="flex flex-col font-[Poppins] items-center">
        <div class="flex flex-col text-center w-full h-[700px] bg-[#9AB2AA]  items-center relative">
            <a href="{{ route('pengajuan.landing') }}"
                class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </a>

            <div>
                <h1 class="text-[48px] font-bold  px-[200px] pt-[50px] mb-4">Pengajuan Bantuan Bibit
                    {{ $informasi->nama_bibit }}</h1>
            </div>
            <!-- Back button -->
            <div class="flex flex-col w-[1289px] ">

                <div class="flex flex-row items-center gap-2 mt-4">
                    <label for="" class="text-[24px] font-bold">Tanggal Pengajuan :</label>
                    <input type="text" class="w-[449px] bg-transparent border-0" disabled readonly
                        value="{{ $pengajuan->tanggal_pengajuan }}">
                </div>
                <div class="flex flex-row items-center mt-[32px]">
                    <label for="" class="text-[24px] font-bold">Berkas Pengajuan :</label>
                    <a href="{{ asset('pdf/' . $data->berkas_pengajuan) }}"
                        class="w-[449px] bg-transparent border-0">{{ $pengajuan->berkas_pengajuan }}</a>
                </div>
            </div>
            <div class="flex flex-col w-[1330px] h-[349px] bg-[#ACBE9D]  mt-[36px]">
                <div class="flex flex-row items-center justify-between gap-2 mt-4 mx-4">
                    @if ($pengajuan->status_validasi == 2)
                        <div class="flex items-center">
                            {{-- @if ($pengajuan->status_validasi == 2) --}}
                            <label for="" class="text-[24px] font-medium">Status Validasi :</label>
                            <div class="flex items-center bg-[#F0FFFB] rounded-[8px] mx-4">
                                <div class="h-[60vpx] w-[5px] bg-green-500"></div>
                                <div class="bg-green-500 rounded-full p-1 mx-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-[#000] font-medium px-4 py-4">Berkas Pengajuan Bibit telah
                                    disetujui</span>
                            </div>
                        </div>
                        <div class="">
                            <label for="" class="text-[24px] font-medium ml-[4px]">Tanggal Validasi :</label>
                            <input type="text" class="w-[200px] bg-transparent border-0 px-4 py-4" readonly
                                value="{{ $pengajuan->updated_at }}">
                        </div>
                    @elseif ($pengajuan->status_validasi == 3)
                        <div class="flex items-center">
                            {{-- @if ($pengajuan->status_validasi == 2) --}}
                            <label for="" class="text-[24px] font-medium">Status Validasi :</label>
                            <div class="flex items-center bg-[#F0FFFB] rounded-[8px] mx-4">
                                <div class="h-[60vpx] w-[5px] bg-red-500"></div>
                                <div class="bg-green-500 rounded-full p-1 mx-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-[#000] font-medium px-4 py-4">Berkas Pengajuan Bibit Ditolak</span>
                            </div>
                        </div>
                        <div class="">
                            <label for="" class="text-[24px] font-medium ml-[4px]">Tanggal Validasi :</label>
                            <input type="text" class="w-[200px] bg-transparent border-0 px-4 py-4" readonly
                                value="{{ $pengajuan->updated_at }}">
                        </div>
                        <span class="text-red-500 font-bold">Berkas ditolak</span>
                    @else
                        <div class="flex items-center">
                            {{-- @if ($pengajuan->status_validasi == 2) --}}
                            <label for="" class="text-[24px] font-medium">Status Validasi :</label>
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
                            <label for="" class="text-[24px] font-medium ml-[4px]">Tanggal Validasi :</label>
                            @if ($pengajuan->tanggal_validasi == null)
                                <input type="text" class="w-[200px] bg-transparent border-0 px-4 py-4 " disabled readonly
                                    value="{{ $pengajuan->tanggal_validasi }}">
                            @endif
                        </div>
                    @endif

                </div>
                <div class="flex flex-col items-center gap-2 mt-8">
                    <label for="" class="text-[24px] font-bold">Catatan Validasi :</label>
                    <span class="flex items-center justify-center w-[982px] h-[98px] bg-[#ffffff] rounded-[8px]">
                        {{ strip_tags($pengajuan->catatan_validasi) }}
                    </span>
                    @if ($pengajuan->status_validasi == 1)
                        <button>
                            <button onclick="showEditButton()"
                                class="px-4 py-2 rounded-lg bg-red-500 text-white font-medium hover:bg-transparent hover:text-[#204E51] border border-[#204E51] w-[100px]">
                                Ubah</button>
                        </button>
                    @endif
                </div>



            </div>
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
                                    <input type="file" name="berkas_pengajuan" id="berkas_pengajuan"
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

    {{-- <section class="py-1 mt-4">
        <div id="editbutton" class="flex flex-col">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form class="flex justify-center items-center flex-col" enctype="multipart/form-data">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Tabel Pengajuan</h6>
                        <div class="flex flex-wrap gap-4">
                            <div class="w-full lg:w-6/12">
                                <div class="flex items-center justify-center mb-6">
                                    <!-- Tambah container untuk gambar di sini -->
                                    <img src="path_to_your_image.jpg" alt="Image" class="h-auto max-w-full">
                                </div>
                                <label for="tanggal_pengajuan"
                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Tanggal
                                    Pengajuan</label>
                                <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan"
                                    class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    value="{{ $data->tanggal_pengajuan }}" placeholder="Masukkan Nama Ketua">
                            </div>
                            <div class="w-full lg:w-6/12">
                                <label for="berkas_pengajuan"
                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Berkas
                                    Pengajuan</label>
                                <a href="{{ asset('pdf/' . $data->berkas_pengajuan) }}" target="_blank"
                                    class="block border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{ basename($data->berkas_pengajuan) }}</a>
                            </div>
                            <div class="w-full lg:w-6/12">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Status
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
                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Tanggal
                                    Validasi</label>
                                <input type="date" name="tanggal_validasi" id="tanggal_validasi"
                                    class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    value="{{ $data->tanggal_validasi }}" placeholder="Tanggal Validasi">
                            </div>
                            <div class="w-full lg:w-6/12">
                                <label for="catatan_validasi"
                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Catatan
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
