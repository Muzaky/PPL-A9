@extends('Layout.navtani')
@section('content')
    <style>
        #namakel,
        #tanggal,
        #judul {
            font-family: 'Montserrat';
            font-size: 40px;
            font-weight: 700;
        }


        #namakel,
        #tanggal {
            font-size: 16px;
        }

        /* Dropdown Button */

        /* Dropdown Button */
        .dropbtn {

            color: black;

            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Show the dropdown content when the "show" class is added */
        .dropdown-content.show {
            display: block;
        }

        /* Dropdown Items */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Position the dropdown menu */
        .dropdown {
            position: relative;
            display: inline-block;
        }
    </style>
    <section class="flex flex-col font-[Montserrat] items-center">
        <div
            class="relative w-[1440px] rounded-br-[20px] rounded-bl-[20px] border-x-2 border-b-2 border-[#204E51] shadow-xl bg-[#204E51]">
            <a href="{{ route('homepage') }}"
                class="mt-10 left-[20px] top-[20px] flex items-center text-white text-sm font-medium ml-4">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </a>
            <h1 class="my-10 text-center text-white" id="judul">Ulasan Kelompok Tani</h1>
        </div>
            <div
                class="flex flex-row gap-8 items-center -mt-8 bg-gray-100 p-2 rounded-br-[20px] rounded-bl-[20px] justify-start w-[1440px] mb-4">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-32 h-32 rounded-full p-4 mt-8">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>

                <h1 class="w-[1440px] text-wrap text-gray-600 mt-6">
                    <font class="font-semibold text-yellow-500">Halaman ulasan bantuan bibit tani Dinas Tanaman Pangan
                        dan Hortikultura (TPHP)</font>.<br> Petani dapat memberikan ulasan berupa kritik dan saran terhadap kinerja aplikasi dan sebagainya.
                </h1>
            </div>

            <div class="flex flex-col items-center">
                {{-- @dd ($ulasan) --}}
                @if ($ulasan->isEmpty())
                    <h1 class="">Belum ada ulasan</h1>
                    <a href="{{ route('pelaporan.landing') }}" class="text-[#204E51]"></a>
                @else
                    @foreach ($ulasan as $data)
                        <div
                            class="flex flex-col h-40  items-center mb-6 bg-white w-[1580px] border-[#204E51] border-2 rounded-lg shadow md:flex-row ">
                            <div class="flex flex-col px-8 w-[1580px] text-wrap">
                                <div class="justify-between flex flex-row">
                                    <div id="namakel" class="mb-2 text-[#204E51]">
                                        {{ $data->nama_keltani }}
                                    </div>
                                    @if ($data->id_registrasi == $registrasi->id_registrasi)
                                        <div class="flex flex-row">
                                            <div class="dropdown">
                                                <button onclick="toggleDropdown({{ $data->id_ulasan }})" class="dropbtn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="dropbtn w-6 h-6">
                                                        <path fill-rule="evenodd"
                                                            d="M10.5 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z"
                                                            clip-rule="evenodd" />

                                                    </svg>

                                                </button>
                                                <div id="myDropdown{{ $data->id_ulasan }}" class="dropdown-content hidden">
                                                    <a href="#" onclick="editData({{ $data->id_ulasan }})">Ubah</a>
                                                    <a href="#"
                                                        onclick="showDeleteModal({{ $data->id_ulasan }})">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div id="deskripsi" class="h-[72px]">{{ $data->deskripsi }}</div>
                                <div id="tanggal" class="flex justify-end text-[#204E51]">{{ $data->created_at }} </div>

                                {{-- Modal Edit --}}
                                <div id="editModal{{ $data->id_ulasan }}"
                                    class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen items-center opacity-0 justify-center transition-opacity duration-500 hidden">
                                    <div
                                        class="bg-white relative flex flex-col min-w-0 break-words  mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                        <button onclick="hideEditModal({{ $data->id_ulasan }})"
                                            class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                                            <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7">
                                                </path>
                                            </svg>
                                            Back
                                        </button>
                                        <div class="flex-auto px-4 lg:px-10 py-4 pt-0">
                                            <form class="flex justify-center items-center flex-col"
                                                action="{{ route('ulasan.update', $data->id_ulasan) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                                    Edit Ulasan
                                                </h6>
                                                <div class="flex flex-wrap text-center">
                                                    <div class="w-full px-4">
                                                        <div class="w-full mb-3">
                                                            <textarea name="deskripsi" id="deskripsi"
                                                                class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150 h-[236px] resize-none">{{ $data->deskripsi }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="flex mt-4">
                                                    Update
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                {{-- Modal Delete --}}
                                <div id="deleteModal{{ $data->id_ulasan }}"
                                    class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen items-center justify-center opacity-0 transition-opacity duration-500 hidden">
                                    <div
                                        class="bg-white relative flex flex-col min-w-0 break-words  mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                        <button onclick="hideDeleteModal({{ $data->id_ulasan }})"
                                            class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                                            <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7">
                                                </path>
                                            </svg>
                                            Back
                                        </button>
                                        <div class="flex-auto px-4 lg:px-10 py-4 pt-0">
                                            <form class="flex justify-center items-center flex-col"
                                                action="{{ route('ulasan.destroy', $data->id_ulasan) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                                    Hapus Ulasan
                                                </h6>
                                                <p>Apakah anda ingin menghapus ulasan ?</p>
                                                <button type="submit" class="flex mt-4">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    @endforeach
                @endif
                <button>
                    <button onclick="showCreateButton()"
                        class="px-4 py-2 rounded-lg bg-red-500 text-white font-medium hover:bg-transparent hover:text-[#204E51] border border-[#204E51] w-[220px] mt-4">
                        Berikan Ulasan </button>
                </button>
            </div>


            <div id="createbutton"
                class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen items-center justify-center opacity-0 transition-opacity duration-500 hidden">
                <div
                    class="bg-white relative flex flex-col min-w-0 break-words  mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                    <button onclick="hideCreateButton()"
                        class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                        <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        Back
                    </button>
                    <div class="flex-auto px-4 lg:px-10 py-4 pt-0">
                        <form class="flex justify-center items-center flex-col" action="{{ route('ulasan.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <h6 class=" text-sm mt-3 mb-6 font-bold uppercase">
                                Beri Ulasan
                            </h6>
                            <div class="flex flex-wrap text-center">
                                <div class="w-full px-4">
                                    <div class="w-full mb-3">
                                        <textarea name="deskripsi" id="deskripsi"
                                            class="border-0 px-3  bg-[#f4f4f4] rounded text-sm shadow focus:outline-none focus:ring focus:ring-[#204E51] w-[500px] ease-linear transition-all duration-150 h-[236px] resize-none"></textarea>
                                    </div>
                                </div>


                            </div>

                            <button type="submit" class="flex mt-4">
                                Kirim
                            </button>
                        </form>
                    </div>
                </div>
            </div>





        </div>

        <script>
            function showCreateButton() {
                let createbutton = document.getElementById('createbutton')

                createbutton.classList.remove('hidden')
                createbutton.classList.add('flex')
                setTimeout(() => {
                    createbutton.classList.remove('opacity-0')
                    createbutton.classList.add('opacity-100')
                }, 20);

            }

            function hideCreateButton() {
                let createbutton = document.getElementById('createbutton')
                createbutton.classList.add('opacity-0')
                setTimeout(() => {
                    createbutton.classList.remove('opacity-100')
                    createbutton.classList.add('hidden')
                    createbutton.classList.remove('flex')
                }, 500);
            }

            function editData(id) {
                let editModal = document.getElementById('editModal' + id);
                editModal.classList.remove('hidden');
                editModal.classList.add('flex');
                setTimeout(() => {
                    editModal.classList.remove('opacity-0')
                    editModal.classList.add('opacity-100');
                }, 20);
            }

            function hideEditModal(id) {
                let editModal = document.getElementById('editModal' + id);
                editModal.classList.add('opacity-0');
                setTimeout(() => {
                    editModal.classList.remove('opacity-100')
                    editModal.classList.add('hidden');
                    editModal.classList.remove('flex');
                }, 500);
            }

            function showDeleteModal(id) {
                let deleteModal = document.getElementById('deleteModal' + id);

                deleteModal.classList.remove('hidden');
                deleteModal.classList.add('flex');
                setTimeout(() => {
                    deleteModal.classList.remove('opacity-0')
                    deleteModal.classList.add('opacity-100');
                }, 20);
            }

            function hideDeleteModal(id) {
                let deleteModal = document.getElementById('deleteModal' + id);

                deleteModal.classList.add('opacity-0');
                setTimeout(() => {
                    deleteModal.classList.remove('opacity-100')
                    deleteModal.classList.add('hidden');
                    deleteModal.classList.remove('flex');
                }, 500);
            }

            function toggleDropdown(id) {
                var allDropdowns = document.getElementsByClassName("dropdown-content");
                var dropdown = document.getElementById("myDropdown" + id);
                dropdown.classList.toggle("show");

                for (var i = 0; i < allDropdowns.length; i++) {
                    if (allDropdowns[i].id !== "myDropdown" + id) {
                        allDropdowns[i].classList.remove("show");
                    }
                }
            }

            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    for (var i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }

            // }

            // function hideEditButton() {
            //     let editbutton = document.getElementById('editbutton')
            //     editbutton.classList.add('opacity-0')
            //     setTimeout(() => {
            //         editbutton.classList.add('hidden')
            //         editbutton.classList.remove('flex')
            //     }, 500);
            // }
        </script>


        </div>





        </div>
    </section>
@endsection
