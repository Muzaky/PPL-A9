<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="bibitani.ico">
    <title>Bibitani | Registrasi Kelompok Tani</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center">
    <div class="alert">
        @if (session()->has('error'))
            <div id="alert-border-3"
                class="flex items-center p-4 mt-5 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
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
    <div class="container h-full p-10 ">
        <div class="flex flex-wrap items-center justify-center h-full text-neutral-800 dark:text-neutral-200">
            <div class="w-full">
                <!-- Container -->
                <div class="relative block bg-white rounded-lg shadow-lg dark:bg-neutral-800">
                    <a href="{{ route('homepage') }}"
                        class="absolute top-0 left-0 mt-4 ml-4 text-gray-600 hover:text-gray-800" aria-label="Close">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>
                    <div class="g-0 lg:flex lg:flex-wrap">
                        <!-- Left column container-->
                        <div class="px-4 md:px-0 lg:w-6/12">
                            <div class="flex flex-col md:mx-6 md:p-12">
                                <!--Logo-->

                                <p class="mb-[10px] text-[36px] font-bold font-[Open Sans] text-wrap w-[300px]">
                                    Profil Kelompok <font style="color: #53C341">Tani</font>
                                </p>

                                <div id="profile" class="flex flex-row">

                                    <div class="flex w-[50%] flex-col">
                                        <form action="{{ route('registrasi.update', $registrasi->id_registrasi) }}"
                                            id="profilekeltan" method="post">
                                            @method('PUT')
                                            @csrf
                                            <div class="px-2">
                                                <div class="bg-[#53C341] rounded-[8px] px-2 py-2 flex flex-col">
                                                    <div class="flex flex-row items-center justify-between">
                                                        <p class="text-[20px] font-[poppins] font-semibold">Data Profil
                                                        </p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor"
                                                            class="w-6 h-6 mr-5">
                                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                                        </svg>

                                                    </div>
                                                    <p class="text-[14px]">Berikut data profil kelompok tani anda</p>
                                                </div>
                                            </div>
                                            <div id="profilekeltan-main" class="flex flex-col p-2">
                                                <label for="nama_keltani" class="pt-2 font-bold">Kelompok
                                                    Tani</label>
                                                <input type="text" name="nama_keltani"
                                                    value="{{ $registrasi->nama_keltani }}"
                                                    class="px-2 py-1 rounded-[8px] bg-gray-200 input_main border"
                                                    disabled readonly>
                                                <label for="nama_keltani" class="pt-2 font-bold">Ketua</label>
                                                <input type="text" name="nama_ketua"
                                                    value="{{ $registrasi->nama_ketua }} "
                                                    class="px-2 py-1 rounded-[8px] bg-gray-200 input_main border"
                                                    disabled readonly>
                                                <label for="nama_keltani" class="pt-2 font-bold">Luas
                                                    Hamparan</label>
                                                <input type="text" name="luas_hamparan"
                                                    value="{{ $registrasi->luas_hamparan }}"
                                                    class="px-2 py-1 rounded-[8px] bg-gray-200 input_main border"
                                                    disabled readonly>
                                                <label for="nama_keltani" class="pt-2 font-bold">Jumlah
                                                    Anggota</label>
                                                <input type="text" name="jumlah_anggota"
                                                    value="{{ $registrasi->jumlah_anggota }}"
                                                    class="px-2 py-1 rounded-[8px] bg-gray-200 input_main border"
                                                    disabled readonly>
                                                <label for="nama_keltani" class="pt-2 font-bold">Alamat</label>
                                                <input type="text" name="alamat_keltani"
                                                    value="{{ $registrasi->alamat_keltani }}"
                                                    class="px-2 py-1 rounded-[8px] bg-gray-200 input_main border"
                                                    disabled readonly>
                                                <label for="nama_keltani" class="pt-2 font-bold">Kecamatan</label>
                                                <select name="nama_kecamatan"
                                                    class="px-2 py-1 rounded-[8px] bg-white input_main3 border hidden">
                                                    <option selected disabled>{{ $registrasi->nama_kecamatan }}
                                                    </option>
                                                    @foreach ($kecamatan as $val)
                                                        <option value="{{ $val->id_kecamatan }}">
                                                            {{ $val->nama_kecamatan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <input type="text" name="nama_kecamatan"
                                                    value="{{ $registrasi->nama_kecamatan }}"
                                                    class="px-2 py-1 rounded-[8px] bg-gray-200 input_main2 border"
                                                    disabled readonly>


                                            </div>
                                        </form>
                                        <div class="pt-2 pl-2">
                                            <button onclick="editProfileKeltani()" id="editprofilebutton"
                                                class="px-2 py-2 w-[40%] border border-[#204E51] rounded-[4px] text-[14px] flex items-center gap-2 bg-[#204E51] text-white hover:text-[#204E51] hover:bg-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-3 h-3">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                    <path
                                                        d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                                </svg>
                                                <p class="flex">Ubah Profil</p>
                                            </button>
                                        </div>
                                        <div class="flex gap-2">
                                            <button onclick="noButton()" id="noButton"
                                                class="px-2 py-2 w-[20%] border border-[#204E51] rounded-[4px] text-[14px] flex items-center gap-2 bg-[#204E51] text-white hover:text-[#204E51] hover:bg-white actionbutton hidden justify-center">
                                                <p class="flex">Batal</p>
                                            </button>
                                            <button type="submit" form="profilekeltan" id="saveButton"
                                                class="px-2 py-2 w-[20%] border border-[#204E51] rounded-[4px] text-[14px] flex items-center gap-2 bg-[#204E51] text-white hover:text-[#204E51] hover:bg-white actionbutton hidden justify-center">

                                                <p class="flex">Ubah</p>
                                            </button>

                                        </div>
                                    </div>
                                    <div class="flex w-[50%] flex-col">
                                        <form action="{{ route('kredensial.update', $registrasi->id) }}"
                                            id="profilekredential" method="post">
                                            @method('PUT')
                                            @csrf
                                            <div class="px-2">
                                                <div class="bg-[#53C341] rounded-[8px] px-2 py-2 flex flex-col">
                                                    <div class="flex flex-row items-center justify-between">
                                                        <p class="text-[20px] px-2 font-[poppins] font-semibold">Data
                                                            Kredensial</p>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" strokeWidth={1.5}
                                                            stroke="currentColor" class="w-6 h-6 mr-5">
                                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                                d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                                        </svg>

                                                    </div>
                                                    <p class="text-[14px] px-2">Berikut data kredensial akun anda</p>
                                                </div>
                                            </div>
                                            <div id="profilekredential-main" class="flex flex-col p-2">
                                                <label for="email" class="pt-2 font-bold">Email</label>
                                                <input type="text" name="email"
                                                    value="{{ $registrasi->email }}"
                                                    class="px-2 py-1 rounded-[8px] bg-gray-200 border" disabled
                                                    readonly>
                                                <label for="password_lama"
                                                    class="hidden pt-2 font-bold input_main5">Password Lama</label>
                                                <input type="password" name="old_password"
                                                    placeholder="Masukkan Password Lama"
                                                    class="px-2 py-1 rounded-[8px] bg-white input_main5 hidden border">
                                                <small
                                                    class="pt-1 pl-2 text-red-500 font-[poppins] input_main5 hidden">Wajib
                                                    Diisi !</small>
                                                <label for="password"
                                                    class="pt-2 font-bold input_main4">Password</label>
                                                <input type="password" value="********"
                                                    class="px-2 py-1 rounded-[8px] bg-gray-200 input_main4 border"
                                                    disabled readonly>
                                                <label for="password_baru"
                                                    class="hidden pt-2 font-bold input_main5">Password Baru</label>
                                                <input type="password" name="password"
                                                    placeholder="Masukkan Password Baru"
                                                    class="px-2 py-1 rounded-[8px]  bg-white  input_main5 border hidden">
                                                <small
                                                    class="pt-1 pl-2 text-yellow-500 font-[poppins] input_main5 hidden">Optional</small>
                                                <small
                                                    class="pt-3 pl-2 text-gray-400 font-[poppins] input_main5 hidden text-wrap">
                                                    Keterangan :
                                                    <br>
                                                    <br>
                                                    Perhatikan penulisan password baru anda !, jika anda benar benar
                                                    sudah yakin dengan password anda makan anda dapat menekan "Ubah"
                                                    <br>
                                                    <br>
                                                    Jika anda belum yakin dengan mengubah password anda maka anda dapat
                                                    menekan "Batal"
                                                </small>
                                            </div>
                                        </form>
                                        <div class="pt-2 pl-2">
                                            <button onclick="editKrendesial()" id="editkredensialbutton"
                                                class="px-2 py-2 w-[50%] border border-[#204E51] rounded-[4px] text-[14px] flex items-center gap-2 bg-[#204E51] text-white hover:text-[#204E51] hover:bg-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-3 h-3">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                    <path
                                                        d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                                </svg>
                                                <p class="flex">Ubah Kredensial</p>
                                            </button>
                                        </div>
                                        <div class="flex gap-2 pl-2">
                                            <button onclick="noButton2()" id="noButton2"
                                                class="px-2 py-2 w-[20%] border border-[#204E51] rounded-[4px] text-[14px] flex items-center gap-2 bg-[#204E51] text-white hover:text-[#204E51] hover:bg-white actionbutton2 hidden justify-center">
                                                <p class="flex">Batal</p>
                                            </button>
                                            <button type="submit" form="profilekredential" id="saveButton2"
                                                class="px-2 py-2 w-[20%] border border-[#204E51] rounded-[4px] text-[14px] flex items-center gap-2 bg-[#204E51] text-white hover:text-[#204E51] hover:bg-white actionbutton2 hidden justify-center">
                                                <p class="flex">Ubah</p>
                                            </button>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- Right column container with background and description-->
                        <div class="lg:w-6/12 lg:rounded-e-lg lg:rounded-bl-none">
                            <div class="w-full lg:w-[688px] h-[746px] rounded-[20px] my-8 mx-auto lg:mx-0"
                                style="background-image: url({{ asset('image_1.png') }}); background-size: cover;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function editProfileKeltani() {
            let editprofilebutton = document.getElementById('editprofilebutton');
            editprofilebutton.classList.add('hidden');

            let actionbutton = document.getElementsByClassName('actionbutton');
            for (let e = 0; e < actionbutton.length; e++) { // For each element
                let elt = actionbutton[e];

                elt.classList.remove('hidden');
            }

            let profilekeltanMain = document.getElementById('profilekeltan-main');
            profilekeltanMain.classList.add('border-2');
            profilekeltanMain.classList.add('rounded-[8px]');
            profilekeltanMain.classList.add('border-[#53C341]');

            let input_main = document.getElementsByClassName('input_main');
            for (let e = 0; e < input_main.length; e++) { // For each element
                let elt = input_main[e];

                elt.removeAttribute("disabled");
                elt.removeAttribute("readonly");


                elt.classList.remove('bg-gray-200');
                elt.classList.add('bg-white');
            }
            let input_main2 = document.getElementsByClassName('input_main2');
            for (let e = 0; e < input_main2.length; e++) { // For each element
                let elt = input_main2[e];

                elt.classList.add('hidden');
            }
            let input_main3 = document.getElementsByClassName('input_main3');
            for (let e = 0; e < input_main3.length; e++) { // For each element
                let elt = input_main3[e];

                elt.classList.remove('hidden');
            }
        }

        function noButton() {
            let editprofilebutton = document.getElementById('editprofilebutton');
            editprofilebutton.classList.remove('hidden');

            let actionbutton = document.getElementsByClassName('actionbutton');
            for (let e = 0; e < actionbutton.length; e++) { // For each element
                let elt = actionbutton[e];
                console.log(elt);
                elt.classList.add('hidden');
            }

            let profilekeltanMain = document.getElementById('profilekeltan-main');
            profilekeltanMain.classList.remove('border-2');
            profilekeltanMain.classList.remove('rounded-[8px]');
            profilekeltanMain.classList.remove('border-[#53C341]');

            let input_main = document.getElementsByClassName('input_main');
            for (let e = 0; e < input_main.length; e++) { // For each element
                let elt = input_main[e];
                console.log(elt);
                elt.setAttribute("disabled", "true");
                elt.setAttribute("readonly", "true");
                elt.classList.add('bg-gray-200');
                elt.classList.remove('bg-white');
            }

            let input_main2 = document.getElementsByClassName('input_main2');
            for (let e = 0; e < input_main2.length; e++) { // For each element
                let elt = input_main2[e];
                console.log(elt);

                elt.classList.remove('hidden');
            }

            let input_main3 = document.getElementsByClassName('input_main3');
            for (let e = 0; e < input_main3.length; e++) { // For each element
                let elt = input_main3[e];
                console.log(elt);
                elt.classList.add('hidden');
            }

            let form = document.getElementById('profilekeltan');
            form.reset()
        }

        function editKrendesial() {
            let editkredensialbutton = document.getElementById('editkredensialbutton');
            editkredensialbutton.classList.add('hidden');

            let actionbutton2 = document.getElementsByClassName('actionbutton2');
            for (let e = 0; e < actionbutton2.length; e++) { // For each element
                let elt = actionbutton2[e];

                elt.classList.remove('hidden');
            }

            let profilekredentialMain = document.getElementById('profilekredential-main');
            profilekredentialMain.classList.add('border-2');
            profilekredentialMain.classList.add('rounded-[8px]');
            profilekredentialMain.classList.add('border-[#53C341]');

            let input_main4 = document.getElementsByClassName('input_main4');
            for (let e = 0; e < input_main4.length; e++) { // For each element
                let elt = input_main4[e];
                elt.classList.add('hidden');

            }

            let input_main5 = document.getElementsByClassName('input_main5');
            for (let e = 0; e < input_main5.length; e++) { // For each element
                let elt = input_main5[e];

                elt.classList.remove('hidden');
            }
        }

        function noButton2() {
            let editkredensialbutton = document.getElementById('editkredensialbutton');
            editkredensialbutton.classList.remove('hidden');

            let actionbutton2 = document.getElementsByClassName('actionbutton2');
            for (let e = 0; e < actionbutton2.length; e++) { // For each element
                let elt = actionbutton2[e];

                elt.classList.add('hidden');
            }

            let profilekredentialMain = document.getElementById('profilekredential-main');
            profilekredentialMain.classList.remove('border-2');
            profilekredentialMain.classList.remove('rounded-[8px]');
            profilekredentialMain.classList.remove('border-[#53C341]');

            let input_main4 = document.getElementsByClassName('input_main4');
            for (let e = 0; e < input_main4.length; e++) { // For each element
                let elt = input_main4[e];
                elt.classList.remove('hidden');
            }

            let input_main5 = document.getElementsByClassName('input_main5');
            for (let e = 0; e < input_main5.length; e++) { // For each element
                let elt = input_main5[e];

                elt.classList.add('hidden');
            }

            let form = document.getElementById('profilekredential');
            form.reset()
        }
    </script>



</body>

</html>
