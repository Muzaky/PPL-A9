@extends('Layout.dinas_nav')
@section('content')
    <section>
        <div class="flex flex-col m-4">
            <h1 class="text-[40px] font-semibold text-[#33765F] font-[Montserrat] ">Bantuan Bibit Horikultura
            </h1>
            <p
                class="text-[18px] font-normal text-[#9B9B9B] font-[Montserrat] mt-[11px] text-wrap w-[1100px] leading-[25px]">
                Pada halaman ini admin dapat melihat pengajuan bantuan dari kelompok tani. Dibagi menjadi 3 indikator : <br>
                <font class="text-green-500">Validated</font>, <font class="text-yellow-500">Process</font>, dan <font
                    class="text-red-500">Rejected</font>.
            </p>
            <div class="w-[1280px] flex flex-row mt-2 justify-end">

            </div>

            <div class="flex flex-col overflow-x-auto mt-4">
                <table class="table-auto min-w-full divide-y divide-gray-200" id="tablezz">
                    <thead class="bg-white ">
                        <tr class="flex-row ">
                            <td colspan="4" class=" rounded-tl-xl bg-[#204e51]">
                                <div class="relative w-[500px] text-gray-400 focus-within:text-gray-600 px-4">
                                    <input id="search_field"
                                        class=" w-full h-full pl-14 pr-4 py-1 rounded-md border-2 border-[#204e51] bg-[#f4f4f4]"
                                        placeholder="Cari berdasarkan nama" type="search">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6 absolute left-6 top-1/2 transform -translate-y-1/2">
                                        <path fillRule="evenodd"
                                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                            clipRule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                            <td colspan="5" class=" rounded-tr-xl bg-[#204e51]">
                                <div class="flex px-4 justify-end py-2">
                                    <form action="" method="GET" class="flex-row flex">
                                        <div class="p-2 font-[Montserrat] text-white">Filter :</div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="validated" name="status_validasi[]" value="2"
                                                class="form-checkbox border-green-500 focus:ring-green-500 focus:border-green-500  checked:bg-green-500 checked:border-transparent"
                                                {{ in_array('2', Request::get('status_validasi', [])) ? 'checked' : '' }}>
                                            <label for="validated"
                                                class="ml-1 mr-4 text-green-500 font-[Raleway]">Validated</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="process" name="status_validasi[]" value="1"
                                                class="form-checkbox border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500  checked:bg-yellow-500 checked:border-transparent"
                                                {{ in_array('1', Request::get('status_validasi', [])) ? 'checked' : '' }}>
                                            <label for="process"
                                                class="ml-1 mr-4 text-yellow-500 font-[Raleway]">Process</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" id="rejected" name="status_validasi[]" value="3"
                                                class="form-checkbox border-red-500 focus:ring-red-500 focus:border-red-500  checked:bg-red-500 checked:border-transparent"
                                                {{ in_array('3', Request::get('status_validasi', [])) ? 'checked' : '' }}>
                                            <label for="rejected" class="ml-1 text-red-500 font-[Raleway]">Rejected</label>
                                        </div>
                                        <button type="submit"
                                            class="ml-4 px-2 bg-[#204E51] border-2 border-[#204E51] rounded-lg text-white hover:bg-white hover:text-[#204E51]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                                                <path strokeLinecap="round" strokeLinejoin="round"
                                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b-2 border-[#204e51]">
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                No</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Nama Kelompok Tani</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Tanggal Pengajuan</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Berkas Pengajuan</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Bantuan Terakhir</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Catatan Validasi</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Tanggal Validasi</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat]">
                                Status Validasi</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-normal text-black  tracking-wider font-[Montserrat] ">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($pengajuans as $val)
                            <tr class="bg-white">
                                <td class="tb-col tb-col-sm justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $no++ }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $val['registration']->nama_keltani }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $val['pengajuan']->tanggal_pengajuan }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class="px-2 py-1 fs-6 lh-sm object-fill">
                                        <a href="{{ Storage::url($val['pengajuan']->berkas_pengajuan) }}">
                                            Lihat Data

                                        </a>
                                    </div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $val['lastValidatedDate'] }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ strip_tags($val['pengajuan']->catatan_validasi) }}
                                    </div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    <div class=" px-2 py-1 fs-6 lh-sm">{{ $val['pengajuan']->tanggal_validasi }}</div>
                                </td>
                                <td class="tb-col tb-col-md justify-center text-center">
                                    @if ($val['pengajuan']->status_validasi == 1)
                                        <div class=" px-2 py-1 fs-6 lh-sm">Diproses</div>
                                    @elseif ($val['pengajuan']->status_validasi == 2)
                                        <div class=" px-2 py-1 fs-6 lh-sm">Tervalidasi</div>
                                    @else
                                        <div class=" px-2 py-1 fs-6 lh-sm">Ditolak</div>
                                    @endif
                                </td>
                                <td class="tb-col tb-col-md justify-center py-4 flex gap-x-2 ">
                                    <a href="#" onclick="editButton({{ $val['pengajuan']->id_pengajuan }})"
                                        class="font-medium text-lg bg-transparent rounded-md border-t-2 border-l-2 border-b-4 border-r-4 border-green-600"><i>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                                                <path strokeLinecap="round" strokeLinejoin="round"
                                                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                                            </svg>
                                        </i></a>
                                    <button id="delete-form" action="" method="POST">

                                        <button onclick="showDelButton({{ $val['pengajuan']->id_pengajuan }})"
                                            class="font-medium text-lg bg-transparent rounded-md border-t-2 border-l-2 border-b-4 border-r-4 border-red-600">
                                            <i>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path strokeLinecap="round" strokeLinejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </i>
                                        </button>

                                    </button>
                                </td>
                            </tr>
                            
                            <!--Modal Script Edit Button-->
                            <div id="editModal{{ $val['pengajuan']->id_pengajuan }}"
                                class="z-10 fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen items-center opacity-0 justify-center transition-opacity duration-500 hidden">
                                <div
                                    class="bg-white relative flex flex-col min-w-0 break-words  mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                                    <button onclick="hideEditModal({{ $val['pengajuan']->id_pengajuan }})"
                                        class="absolute left-[20px] top-[20px] flex items-center text-black text-sm font-medium">
                                        <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7">
                                            </path>
                                        </svg>
                                        Back
                                    </button>
                                    <div class="flex flex-col items-center justify-center px-10 py-4 pt-0">
                                        <form class="flex justify-center items-center flex-col"
                                            action="{{ route('pengajuan.updatedinas', $val['pengajuan']->id_pengajuan) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                                Validasi Pengajuan
                                            </h6>
                                            <div class="flex flex-wrap">
                                                <div class="w-full flex items-center justify-center lg:w-6/12 px-4">
                                                    <div class="flex flex-col w-full mb-3 justify-center items-center">
                                                        <label
                                                            class="flex uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                            htmlfor="grid-password">
                                                            Tanggal Pengajuan
                                                        </label>
                                                        <input type="date" name="tanggal_pengajuan"
                                                            id="tanggal_pengajuan"
                                                            class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                            value="{{ $val['pengajuan']->tanggal_pengajuan }}"
                                                            placeholder="Masukkan Nama Ketua">
                                                    </div>
                                                </div>

                                                <div class="w-full flex items-center justify-center lg:w-6/12 px-4">
                                                    <div class="flex flex-col w-full mb-3 justify-center items-center">
                                                        <label
                                                            class="flex uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                            htmlfor="grid-password">
                                                            Tanggal Validasi
                                                        </label>
                                                        <input type="date" name="tanggal_validasi"
                                                            id="tanggal_validasi"
                                                            class="border-0 px-3 py-2.5 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                            value="{{ $val['pengajuan']->tanggal_validasi }}"
                                                            placeholder="Tanggal Validasi">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col justify-center items-center my-4">
                                                <label class="flex uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                    htmlfor="grid-password">
                                                    Status Validasi
                                                </label>
                                                <div class="flex flex-row gap-10">
                                                    <div class="flex flex-row items-center justify-center gap-6">
                                                        <div class="flex flex-col items-center justify-center">
                                                            <label for="Rejected"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Tertolak</label>
                                                            <input type="checkbox" name="status_validasi" id="Rejected"
                                                                value='3'
                                                                onclick="if(this.checked) {Validated.checked=false;} {Process.checked=false;}"
                                                                class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block p-2.5">
                                                        </div>
                                                        <div class="flex flex-col items-center justify-center">
                                                            <label for="Validated"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Tervalidasi</label>
                                                            <input type="checkbox" name="status_validasi" id="Validated"
                                                                value='2'
                                                                onclick="if(this.checked) {Process.checked=false;} {Rejected.checked=false;}"
                                                                class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5">
                                                        </div>
                                                        <div class="flex flex-col items-center justify-center">
                                                            <label for="Process"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Process</label>
                                                            <input type="checkbox" name="status_validasi" id="Process"
                                                                value='1'
                                                                onclick="if(this.checked) {Validated.checked=false;} {Rejected.checked=false;}"
                                                                class="bg-gray-50 border border-gray-500 text-gray-900 sm:text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block p-2.5">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-2 items-center my-4">
                                                <label class="flex uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                    htmlfor="grid-password">
                                                    Berkas Pengajuan
                                                </label>
                                                <a href="{{ Storage::url($val['pengajuan']->berkas_pengajuan) }}"
                                                    class="flex flex-col items-center justify-center w-[400px] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-[#F1F1F1] hover:bg-gray-100 dark:border-gray-400 dark:hover:border-gray-500 dark:hover:bg-slate-200 h-14">
                                                    <div class="flex flex-row items-center justify-center gap-2 pt-5 pb-6">
                                                        <div id="file-name"
                                                            class="flex items-center gap-2 text-gray-500 dark:text-gray-400 text-[14px] w-[500px] justify-center ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" strokeWidth={1.5}
                                                                stroke="currentColor" class="w-4 h-4">
                                                                <path strokeLinecap="round" strokeLinejoin="round"
                                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                            </svg>

                                                            <p id="textcontent">
                                                                {{ basename(Storage::url($val['pengajuan']->berkas_pengajuan)) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                htmlfor="grid-password">
                                                Catatan Validasi
                                            </label>

                                            <textarea name="catatan_validasi" id="catatan_validasi"
                                                class="resize-none w-[400px] h-[80px] border-0 rounded-[4px] p-2 outline-none focus:border-2 focus:border-[#204E51] focus:ring-0 text-[14px]"
                                                placeholder="Masukkan catatan disini...">{{ strip_tags($val['pengajuan']->catatan_validasi) }}</textarea>
                                            <button type="submit"
                                                class="flex mt-4 uppercase font-[montserrat] py-2 px-4 bg-[#204E51]
                         text-white border border-[#204E51] rounded-xl hover:bg-transparent hover:text-[#204E51] text-sm">
                                                Simpan
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!--Modal Script Delete Button-->
        <div id="delbutton"
            class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen items-center justify-center opacity-0 hidden 
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
        <div id="delbutton"
            class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen items-center justify-center opacity-0 hidden 
                 transition-opacity duration-500">

        </div>



        <script>
            function showDelButton(id) {
                let delbutton = document.getElementById('delbutton')
                document.getElementById('deleteForm').action = "{{ route('pengajuan.destroy', '') }}/" + id;

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
                document.getElementById('editForm').action = "{{ route('pengajuan.updatedinas', '') }}/" + id;

                delbutton.classList.remove('hidden')
                delbutton.classList.add('flex')
                setTimeout(() => {
                    delbutton.classList.add('opacity-100')
                }, 20);
            }

            function editButton(id) {
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
