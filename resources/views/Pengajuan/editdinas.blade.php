@extends('Layout.dinas_nav')
@section('content')
    <section class=" py-1 mt-4">
        <div class="flex flex-col" id="editbutton">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="flex-auto px-10 py-5 pt-0">
                    <form class="flex justify-center items-center flex-col"
                        action="{{ route('pengajuan.updatedinas', $data->id_pengajuan) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Validasi Pengajuan
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full flex items-center justify-center lg:w-6/12 px-4">
                                <div class="flex flex-col w-full mb-3 justify-center items-center">
                                    <label class="flex uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Tanggal Pengajuan
                                    </label>
                                    <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->tanggal_pengajuan }}" placeholder="Masukkan Nama Ketua">
                                </div>
                            </div>

                            <div class="w-full flex items-center justify-center lg:w-6/12 px-4">
                                <div class="flex flex-col w-full mb-3 justify-center items-center">
                                    <label class="flex uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Tanggal Validasi
                                    </label>
                                    <input type="date" name="tanggal_validasi" id="tanggal_validasi"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->tanggal_validasi }}" placeholder="Tanggal Validasi">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center my-4">
                            <label class="flex uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                Status Validasi
                            </label>
                            <div class="flex flex-row gap-10">
                                <div class="flex flex-row items-center justify-center gap-6">
                                    <div class="flex flex-col items-center justify-center">
                                        <label for="Rejected"
                                            class="block mb-2 text-sm font-medium text-gray-900">Tertolak</label>
                                        <input type="checkbox" name="status_validasi" id="Rejected" value='3'
                                            onclick="if(this.checked) {Validated.checked=false;} {Process.checked=false;}"
                                            class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5">
                                    </div>
                                    <div class="flex flex-col items-center justify-center">
                                        <label for="Validated"
                                            class="block mb-2 text-sm font-medium text-gray-900">Tervalidasi</label>
                                        <input type="checkbox" name="status_validasi" id="Validated" value='2'
                                            onclick="if(this.checked) {Process.checked=false;} {Rejected.checked=false;}"
                                            class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5">
                                    </div>
                                    <div class="flex flex-col items-center justify-center">
                                        <label for="Process"
                                            class="block mb-2 text-sm font-medium text-gray-900">Process</label>
                                        <input type="checkbox" name="status_validasi" id="Process" value='1'
                                            onclick="if(this.checked) {Validated.checked=false;} {Rejected.checked=false;}"
                                            class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block p-2.5">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 items-center my-4">
                            <label class="flex uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                Berkas Pengajuan
                            </label>
                            <a href="{{ Storage::url($data->berkas_pengajuan) }}"
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
                                            {{ basename(Storage::url($data->berkas_pengajuan)) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Catatan Validasi 
                        </label>

                        <textarea name="catatan_validasi" id="catatan_validasi" class="resize-none w-[400px] h-[80px] border-0 rounded-[4px] p-2 outline-none focus:border-2 focus:border-[#204E51] focus:ring-0 text-[14px]" placeholder="Masukkan catatan disini...">{{ $data->catatan_validasi }}</textarea>
                        {{-- <script>
                            CKEDITOR.replace('catatan_validasi');
                        </script> --}}
                        <button type="submit" class="flex mt-4 uppercase font-[montserrat] py-2 px-4 bg-[#204E51]
                         text-white border border-[#204E51] rounded-xl hover:bg-transparent hover:text-[#204E51] text-sm">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
