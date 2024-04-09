@extends('Layout.dinas_nav')
@section('content')
    <style>
        .input-with-dropdown {
            position: relative;
            width: 200px;
        }

        .input-with-dropdown input[type="text"] {
            width: 100%;
            padding-right: 20px;
            /* To accommodate the dropdown arrow */
        }

        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            display: none;
        }

        .dropdown.open {
            display: block;
        }

        .dropdown-item {
            padding: 5px 10px;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #f0f0f0;
        }
    </style>
    <section class=" py-1  mt-4">
        <div class="flex flex-col">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0 ">
                    <form class="flex justify-center items-center flex-col" action="{{ route('berita.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
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
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
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
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan Nama Bibit">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Gambar
                                    </label>
                                    <input type="file" name="gambar_informasi" id="gambar_informasi"
                                        class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Masukkan Gambar">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Tanggal Mulai
                                    </label>
                                    <input type="date" id="tgl_awal" name="tgl_awal"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
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
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan Tanggal Akhir">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Jumlah Bibit
                                    </label>
                                    <input type="number" name="jumlah_bibit" id="jumlah_bibit"
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
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
                                        class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan Narahubung">
                                </div>
                            </div>


                        </div>
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Syarat dan Ketentuan test
                        </label>

                        <textarea name="syarat_ketentuan" id="syarat_ketentuan"></textarea>
                        <script>
                            CKEDITOR.replace('syarat_ketentuan');
                        </script>
                        <button type="submit" class="flex">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <script>
            const inputField = document.getElementById('nama_bibit');
            const dropdown = document.getElementById('dropdown');

            inputField.addEventListener('click', function() {
                dropdown.classList.toggle('open');
            });

            function selectItem(item) {
                inputField.value = item;
                dropdown.classList.remove('open');
            }
        </script>
    </section>
@endsection
