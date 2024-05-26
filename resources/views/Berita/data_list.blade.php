@extends('Layout.dinas_nav')
@section('content')
    <section>
        <div class="flex flex-col m-4 ">
            <h1 class="text-[40px] font-semibold text-[#33765F] font-[Montserrat] ">Pemberitahuan Informasi Bibit Horikultura
            </h1>
            <p
                class="text-[18px] font-normal text-[#9B9B9B] font-[Montserrat] mt-[11px] text-wrap w-[1100px] leading-[25px]">
                Pada halaman ini akan membantu kamu dalam menambahkan pemberitahun, mengedit apabila diperlukan perubahan
                pada pemberitahuan, menghapus pemberitahuan dan memantau pemberitahuan yang telah ditambahkan</p>

            <div class="flex flex-col overflow-x-auto mt-8">
                <table class="min-w-full divide-y divide-gray-200 table-auto" id="tablezz">
                    <thead class="bg-white">
                        <tr class="flex-row">
                            <td colspan="5" class=" rounded-tl-xl bg-[#204e51]">
                                <div class="relative w-[500px] text-gray-400 focus-within:text-gray-600 px-4">
                                    <input id="search_field"
                                        class=" w-full h-full pl-14 pr-4 py-1 rounded-md border-2 border-[#204e51] bg-[#f4f4f4]"
                                        placeholder="Cari berdasarkan judul" type="search">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 absolute left-6 top-1/2 transform -translate-y-1/2">
                                        <path fillRule="evenodd"
                                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                            clipRule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                            <td colspan="6" class=" rounded-tr-xl bg-[#204e51]">
                                <div class="flex flex-row justify-end mr-4">

                                    <a class="flex justify-center text-center items-center font-[Montserrat] font-semibold text-[13px] bg-white rounded-[5px] text-[#33765F] mb-[22px] mt-5 ml-5 w-[211px] h-[26px] btn btn-primary loading-button hover:text-white hover:bg-[#8BD7D2]"
                                        href="{{ route('berita.create') }}" id="myButton" onclick="startLoading()"><span
                                            class="flex">Tambah
                                            Informasi
                                            Baru</span></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b-2 border-[#204e51]">
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                No</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Judul Informasi</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Nama Bibit</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Gambar Informasi</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Tanggal Awal</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Tanggal Akhir</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Jumlah Bibit (Kg)</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Syarat Ketentuan</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Deskripsi</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Narahubung</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data as $val)
                            <tr class="bg-white">
                                <td class="justify-center text-center tb-col tb-col-sm">
                                    <div class="px-2 py-1 fs-6 lh-sm">{{ $no++ }}</div>
                                </td>
                                <td id="judulinfo"
                                    class="justify-center text-center tb-col tb-col-md max-w-32 max-h-64 overflow-ellipsis whitespace-nowrap overflow-hidden">
                                    <div class="px-2 py-1 fs-6 lh-sm">{{ $val->judul_informasi }}</div>
                                </td>
                                <td class="justify-center text-center tb-col tb-col-md">
                                    <div class="px-2 py-1 fs-6 lh-sm">{{ $val->nama_bibit }}</div>
                                </td>
                                <td class="justify-center text-center tb-col tb-col-md">
                                    <div class="object-fill px-2 py-1 fs-6 lh-sm">
                                        <a href="{{ Storage::url($val->gambar_informasi) }}">
                                            Lihat Gambar
                                        </a>
                                    </div>
                                </td>
                                <td class="justify-center text-center tb-col tb-col-md">
                                    <div class="px-2 py-1 fs-6 lh-sm">{{ $val->tgl_awal }}</div>
                                </td>
                                <td class="justify-center text-center tb-col tb-col-md">
                                    <div class="px-2 py-1 fs-6 lh-sm">{{ $val->tgl_akhir }}</div>
                                </td>
                                <td class="justify-center text-center tb-col tb-col-md">
                                    <div class="px-2 py-1 fs-6 lh-sm">{{ $val->jumlah_bibit }}</div>
                                </td>
                                <td
                                    class="justify-center text-center tb-col tb-col-md max-w-32 max-h-64  overflow-ellipsis whitespace-nowrap overflow-hidden">
                                    <div class="px-2 py-1 fs-6 lh-sm">{{ strip_tags($val->syarat_ketentuan) }}</div>
                                </td>
                                <td
                                    class="justify-center text-center tb-col tb-col-md max-w-32 max-h-64 overflow-ellipsis whitespace-nowrap overflow-hidden">
                                    <div class="px-2 py-1 fs-6 lh-sm">{{ strip_tags($val->deskripsi) }}</div>
                                </td>
                                <td class="justify-center text-center tb-col tb-col-md">
                                    <div class="px-2 py-1 fs-6 lh-sm">{{ $val->kontak_narahubung }}</div>
                                </td>
                                <td class="flex flex-row px-6 py-4 tb-col tb-col-md gap-x-3 justify-center text-center">
                                    <a href="{{ route('berita.edit', $val->id_informasi) }}"
                                        class="text-lg font-medium bg-transparent border-t-2 border-b-4 border-l-2 border-r-4 border-green-600 rounded-md"><i>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                                                <path strokeLinecap="round" strokeLinejoin="round"
                                                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                                            </svg>
                                        </i></a>
                                    <button id="delete-form" action="" method="POST">
                                        <button onclick="showDelButton({{ $val->id_informasi }})"
                                            class="text-lg font-medium bg-transparent border-t-2 border-b-4 border-l-2 border-r-4 border-red-600 rounded-md">
                                            <i>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path strokeLinecap="round" strokeLinejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </i>
                                        </button>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
        <!--Modal Script Delete Button-->
        <div id="delbutton"
            class="fixed top-0 left-0 flex items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">

            <div class="bg-white rounded shadow-md p-8 w-[25%] gap-5 flex-col overflow-hidden">
                <div class="flex gap-3">
                    <div class="flex items-center justify-center h-10 text-red-600 bg-red-100 rounded-full min-w-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h1 class="mb-2 text-lg font-bold text-gray-700">Menghapus Data</h1>
                        <p class="text-gray-600">Apakah anda ingin menghapus data ?</p>
                    </div>
                </div>
                <div class="flex justify-end mt-3 ">
                    <button onclick="hideDelButton()"
                        class="px-4 py-2 mr-3 text-black bg-white rounded cursor-pointer hover:bg-gray-300">Batal</button>
                    <form id="deleteForm" method="POST" action="">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 font-semibold text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                    </form>
                </div>
            </div>
        </div>

        <!--Modal Script Edit Button-->

        {{-- @extends('Berita.edit') --}}



        <script>
            function showDelButton(id) {
                let delbutton = document.getElementById('delbutton')
                document.getElementById('deleteForm').action = "{{ route('berita.destroy', '') }}/" + id;

                delbutton.classList.remove('hidden')
                delbutton.classList.add('flex')
                setTimeout(() => {
                    delbutton.classList.add('opacity-100')
                }, 20);

            }



            function hideDelButton() {
                let delbutton = document.getElementById('delbutton')
                delbutton.classList.add('opacity-0')
                setTimeout(() => {
                    delbutton.classList.add('hidden')
                    delbutton.classList.remove('flex')
                }, 500);
            }

            function showeditButton(id) {
                let delbutton = document.getElementById('editbutton')
                document.getElementById('editForm').action = "{{ route('berita.edit', '') }}/" + id;

                delbutton.classList.remove('hidden')
                delbutton.classList.add('flex')
                setTimeout(() => {
                    delbutton.classList.add('opacity-100')
                }, 20);
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $('#search_field').on('keyup', function() {
                    var searchText = $(this).val().toLowerCase();
                    $('#tablezz tbody tr').each(function() {
                        var taniname = $(this).find('td:eq(1)').text().toLowerCase();
                        if (taniname.includes(searchText)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });
            });
        </script>
    </section>
@endsection
