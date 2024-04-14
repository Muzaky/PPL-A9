@extends('Layout.dinas_nav')
@section('content')
    <section class=" py-1  mt-4">
        <div class="flex flex-col" id="editbutton">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form class="flex justify-center items-center flex-col"
                        action="{{ route('registrasi.updatedinas', $data->id_registrasi) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Tabel Kelompok Tani
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Nama Kelompok Tani
                                    </label>
                                    <input id="nama_keltani" name="nama_keltani" type="text"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->nama_keltani }}" placeholder="Masukkan Nama Kelompok Tani">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Nama Ketua
                                    </label>
                                    <input type="text" name="nama_ketua" id="nama_ketua"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->nama_ketua }}" placeholder="Masukkan Nama Ketua">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Luas Hamparan
                                    </label>
                                    <input type="text" id="luas_hamparan" name="luas_hamparan"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->luas_hamparan }}" placeholder="Masukkan Luas Hamparan">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Jumlah Anggota
                                    </label>
                                    <input type="number" id="jumlah_anggota" name="jumlah_anggota"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->jumlah_anggota }}" placeholder="Masukkan Jumlah Anggota">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Alamat Kelompok Tani
                                    </label>
                                    <input type="text" name="alamat_keltani" id="alamat_keltani"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->alamat_keltani }}" placeholder="Masukkan Alamat Kelompok Tani">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Bukti Legalitas
                                    </label>
                                    <input type="file" name="bukti_legalitas" id="bukti_legalitas"
                                        class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->bukti_legalitas }}" placeholder="Masukkan Bukti">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Tanggal Validasi
                                    </label>
                                    <input type="date" name="tanggal_validasi" id="tanggal_validasi"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->tanggal_validasi }}" placeholder="Tanggal Validasi">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Status Validasi
                                    </label>
                                    <input type="number" name="status_validasi" id="status_validasi"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->status_validasi }}" placeholder="Tentukan Status validasi">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4 hidden">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Id_users
                                    </label>
                                    <input type="number" name="id_users" id="id_users"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->id_users }}" placeholder="Tentukan Status validasi">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4 hidden">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Kecamatan
                                    </label>
                                    <input type="text" name="nama_kecamatan" id="nama_kecamatan"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $data->nama_kecamatan }}" placeholder="Tentukan Status validasi">
                                </div>
                            </div>


                        </div>
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Catatan Validasi
                        </label>

                        <textarea name="catatan_validasi" id="catatan_validasi">{{ $data->catatan_validasi }}
                            
                        </textarea>
                        <script>
                            CKEDITOR.replace('catatan_validasi');
                        </script>
                        <button type="submit" class="flex">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>


        <script></script>
    </section>
@endsection
