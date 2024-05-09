@extends('Layout.dinas_nav')
@section('content')
    <style>
        #judul,
        #namakel,
        #tanggal {
            font-family: 'Montserrat';
            font-weight: 700;
        }

        #judul {
            font-size: 48px;
        }

        #namakel,
        #tanggal {
            font-size: 16px;
        }

        /* Dropdown Button */

        .dropbtn {
            color: black;
            padding: 0;
            border: none;
            cursor: pointer;
            display: flex;
            /* Ensure the button can contain the SVG */
            align-items: center;
            /* Center the SVG vertically */
            justify-content: center;
            /* Center the SVG horizontally */
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
    <section class="ulasan_list">
        <div class="flex flex-col m-4 w-[100&]">
            <h1 class="text-[40px] font-semibold text-[#33765F] font-[Poppins] ">Ulasan Kelompok Tani
            </h1>
            <div class="flex flex-col items-center py-6">
                {{-- @dd ($ulasan) --}}
                @if ($ulasan->isEmpty())
                    <h1 class="">Belum ada ulasan</h1>
                    <a href="{{ route('pelaporan.landing') }}" class="text-[#204E51]"></a>
                @else
                    @foreach ($ulasan as $data)
                        <div
                            class="flex flex-col h-40  items-center mb-6 bg-white border w-[1140px] border-[#204E51] border-2 rounded-lg shadow md:flex-row ">
                            <div class="flex flex-col px-8 w-[1140px] text-wrap">
                                <div class="justify-between flex flex-row">
                                    <div id="namakel" class="mb-2 text-[#204E51]">
                                        {{ $data->nama_keltani }}
                                    </div>

                                    <div class="flex flex-row">
                                        <div class="dropdown">
                                            <button onclick="toggleDropdown()" class="dropbtn">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="dropbtn w-6 h-6">
                                                    <path fill-rule="evenodd"
                                                        d="M10.5 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                            </button>
                                            <div id="myDropdown" class="dropdown-content hidden">
                                                <a href="#" onclick="editData({{ $data->id_ulasan }})">Edit</a>
                                                <a href="#"
                                                    onclick="showDeleteModal({{ $data->id_ulasan }})">Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="deskripsi" class="h-[72px]">{{ $data->deskripsi }}</div>
                                <div id="tanggal" class="flex justify-end text-[#204E51]">{{ $data->created_at }} </div>

                                {{-- Modal Edit --}}
                                <div id="editModal{{ $data->id_ulasan }}"
                                    class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen flex items-center justify-center opacity-0 transition-opacity duration-500 hidden">
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
                                    class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen flex items-center justify-center opacity-0 transition-opacity duration-500 hidden">
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
                                                    Delete Ulasan
                                                </h6>
                                                <p>Are you sure you want to delete this data?</p>
                                                <button type="submit" class="flex mt-4">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>







                            </div>

                        </div>
                    @endforeach
                @endif

            </div>
            <script>
                function showCreateButton() {
                    let createbutton = document.getElementById('createbutton')

                    createbutton.classList.remove('hidden')
                    createbutton.classList.add('flex')
                    setTimeout(() => {
                        createbutton.classList.add('opacity-100')
                    }, 20);

                }

                function hideCreateButton() {
                    let createbutton = document.getElementById('createbutton')
                    createbutton.classList.add('opacity-0')
                    setTimeout(() => {
                        createbutton.classList.add('hidden')
                        createbutton.classList.remove('flex')
                    }, 500);
                }

                function editData(id) {
                    let editModal = document.getElementById('editModal' + id);

                    editModal.classList.remove('hidden');
                    editModal.classList.add('flex');
                    setTimeout(() => {
                        editModal.classList.add('opacity-100');
                    }, 20);
                }

                function hideEditModal(id) {
                    let editModal = document.getElementById('editModal' + id);
                    editModal.classList.add('opacity-0');
                    setTimeout(() => {
                        editModal.classList.add('hidden');
                        editModal.classList.remove('flex');
                    }, 500);
                }

                function showDeleteModal(id) {
                    let deleteModal = document.getElementById('deleteModal' + id);

                    deleteModal.classList.remove('hidden');
                    deleteModal.classList.add('flex');
                    setTimeout(() => {
                        deleteModal.classList.add('opacity-100');
                    }, 20);
                }

                function hideDeleteModal(id) {
                    let deleteModal = document.getElementById('deleteModal' + id);

                    deleteModal.classList.add('opacity-0');
                    setTimeout(() => {
                        deleteModal.classList.add('hidden');
                        deleteModal.classList.remove('flex');
                    }, 500);
                }

                function toggleDropdown() {

                    var dropdown = document.getElementById("myDropdown");
                    dropdown.classList.toggle("show");
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
            </script>
    </section>
@endsection
