@extends('Layout.dinas_nav')
@section('content')
    <section>
        <div class="flex flex-col m-4 w-[100%]">
            <h1 class="text-[40px] font-semibold text-[#33765F] font-[Poppins] ">Pelaporan Bantuan Bibit Horikultura
            </h1>
            <p class="text-[18px] font-normal text-[#9B9B9B] font-[Poppins] mt-[11px] text-wrap w-[1100px] leading-[25px]">
                Pada halaman ini akan membantu kamu dalam menambahkan pemberitahun, mengedit apabila diperlukan perubahan
                pada pemberitahuan, menghapus pemberitahuan dan memantau pemberitahuan yang telah ditambahkan</p>

            <div class="flex flex-col overflow-x-auto mt-4">
                <table class="table-auto min-w-full divide-y divide-gray-200 ">
                    <thead class="bg-white">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                                No</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                                Tanggal Pelaporan</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                                Nama Kegiatan</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                                Dokumentasi Pelaporan</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                                Kondisi</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                                Tanggal Validasi</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                                Catatan Validasi</th>                           
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                                Status Validasi</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                                Nama Kelompok Tani</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Poppins]">
                                Pengajuan</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Poppins] ">
                                Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data as $val)
                            <tr>
                                <td class="tb-col tb-col-sm justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $no++ }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $val->tanggal_pelaporan }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $val->nama_kegiatan }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class="px-2 py-1 fs-6 lh-sm object-fill">
                                        <a href="{{ asset('dokumentasi/' . $val->dokumentasi_pelaporan) }}">
                                            {{ basename($val->dokumentasi_pelaporan) }}

                                        </a>
                                    </div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $val->kondisi }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $val->tanggal_validasi }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ strip_tags($val->catatan_validasi) }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $val->status_validasi }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $val->id_registrasi }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $val->id_pengajuan }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center py-4 flex gap-x-3 ">
                                    <a href="{{ route('pelaporan.editdinas', $val->id_pelaporan) }}"
                                        class="font-medium text-lg bg-transparent rounded-md border-t-2 border-l-2 border-b-4 border-r-4 border-green-600"><i>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                                                <path strokeLinecap="round" strokeLinejoin="round"
                                                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                                            </svg>
                                        </i></a>
                                    {{-- <button id="delete-form" action="{{ route('berita.destroy', $val->id_registrasi) }}"
                                        method="POST">

                                        <button onclick="showDelButton({{ $val->id_registrasi }})"
                                            class="font-medium text-lg bg-transparent rounded-md border-t-2 border-l-2 border-b-4 border-r-4 border-red-600">
                                            <i>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path strokeLinecap="round" strokeLinejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </i>
                                        </button>

                                    </button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
        <!--Modal Script Delete Button-->
        <div id="delbutton"
            class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen flex items-center justify-center opacity-0 hidden 
                 transition-opacity duration-500">

            <div class="bg-white rounded shadow-md p-8 w-[25%] gap-5 flex-col overflow-hidden">
                <div class="flex gap-3">
                    <div class="bg-red-100 rounded-full text-red-600 min-w-10 h-10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h1 class="font-bold text-lg mb-2 text-gray-700">Menghapus Data</h1>
                        <p class="text-gray-600">Apakah anda ingin menghapus data ?</p>
                    </div>
                </div>
                <div class=" mt-3 flex justify-end">
                    <button onclick="hideDelButton()"
                        class="bg-white rounded px-4 py-2 mr-3 text-black cursor-pointer hover:bg-gray-300">Batal</button>
                    <form id="deleteForm" method="POST" action="">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded">Hapus</button>
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
    </section>
@endsection
