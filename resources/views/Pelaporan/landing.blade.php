@extends('Layout.navtani')
@section('content')
    <style>
        #judul {
            font-family: 'Montserrat';
            font-size: 48px;
            font-weight: 700;
        }

        .font-inside {
            font-family: 'Montserrat'
        }
    </style>

    <body class="bg-slate-200">
        <section class="flex flex-col font-[Montserrat] items-center">
            <div
                class="relative w-[1440px] rounded-br-[20px] rounded-bl-[20px] border-x-2 border-b-2 border-[#204E51] shadow-xl bg-[#204E51]">
                <a href="{{ route('homepage') }}"
                    class="absolute left-[20px] top-[20px] flex items-center text-white text-sm font-medium ml-4">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </a>
                <h1 class="my-10 text-center text-white" id="judul">Pelaporan
                </h1>
            </div>
            <div
                class="flex flex-row gap-8 items-center -mt-8 bg-gray-100 p-2 px-32 rounded-br-[20px] rounded-bl-[20px] justify-start w-[1440px]">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-32 h-32 rounded-full p-4 mt-8">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>

                <h1 class="w-[1440px] text-wrap text-gray-600 mt-6">
                    <font class="font-semibold text-yellow-500">Halaman pelaporan bantuan bibit tani Dinas Tanaman Pangan
                        dan Hortikultura (TPHP)</font>.<br> Petani dapat melengkapi pelaporan dari pengajuan bantuan yang
                    sudah diajukan.
                    Jika belum terdapat bantuan bibit yang sudah pernah diajukan maka, pengajuan tersebut belum disetujui
                    oleh dinas atau pengajuan tidak memenuhi syarat yang diberikan oleh dinas
                </h1>
            </div>
            @if (session()->has('status'))
                <div id="alert-border-3"
                    class="flex items-center p-4 mt-5 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="text-sm font-medium ms-3">
                        {{ session('status') }}
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
            @if (session()->has('error'))
                <div id="alert-border-3"
                    class="flex items-center p-4 mt-5 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-red-800 dark:border-red-800"
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
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-red-800 dark:text-red-400 dark:hover:bg-red-700"
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
                <div class="bg-white w-[1440px] -mt-4">
                    <div class="relative w-[500px] h-[40px] text-gray-400 focus-within:text-gray-600 ml-[114px] mt-8 mb-8">
                        <input id="search_field"
                            class=" w-full h-full pl-14 pr-4 py-1 rounded-[8px] border-2 border-[#204e51] bg-[#f4f4f4]"
                            placeholder="Cari berdasarkan nama" type="search">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6 absolute left-6 top-1/2 transform -translate-y-1/2">
                            <path fillRule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clipRule="evenodd" />
                        </svg>
                    </div>
                    
                    @foreach ($pengajuan as $pengajuan)
                        @if ($pengajuan->status_validasi == 2)
                            <div class="flex flex-col items-center mt-4 tablezz">
                                <a href="{{ route('pelaporan.main', Crypt::encryptString($pengajuan->id_pengajuan)) }}"
                                    class="flex items-center mb-6 bg-white border-b-2 w-[1240px] flex-row hover:bg-gray-100 py-4">
                                    <img class="object-cover w-120 h-32 rounded-[6px] ml-4"
                                        src="{{ optional($pengajuan->informasi)->gambar_informasi ? Storage::url($pengajuan->informasi->gambar_informasi) : 'fallback-image-url.jpg' }}"
                                        alt="">
                                    <div class="flex flex-col justify-between px-4 leading-normal">
                                        <h5 class="text-[24px] font-semibold tracking-tight text-[#204E51] dark:text-white font-inside" id="judul-laporan">
                                            {{ optional($pengajuan->informasi)->judul_informasi }}</h5>
                                            <p class="mb-2 text-neutral-500">
                                                @if ($pengajuan->status_validasi == 2)
                                                    <small class="font-inside">
                                                        Terverifikasi Tanggal
                                                        <u><b>
                                                                {{ $pengajuan->tanggal_validasi }}
                                                            </b></u>
                                                    </small>
                                                @elseif ($pengajuan->status_validasi == 3)
                                                    <small class="font-inside">
                                                        Ditolak tanggal
                                                        <u>
                                                            {{ $pengajuan->tanggal_validasi }}
                                                        </u>
                                                    </small>
                                                @else
                                                    <small class="font-inside">
                                                        Menunggu pemrosesan oleh Dinas
                                                    </small>
                                                @endif
                                            </p>
                                        <div
                                            class="flex items-center justify-center mb-1 text-sm font-medium text-green-500 md:justify-start">
                                            @if ($pengajuan->status_validasi == 2)
                                                <span class="px-3 py-1 text-green-500 bg-green-100 rounded-full">Validated</span>
                                            @elseif ($pengajuan->status_validasi == 3)
                                                <span class="px-3 py-1 text-red-500 bg-red-100 rounded-full">Rejected</span>
                                            @else
                                                <span class="px-3 py-1 text-yellow-500 bg-yellow-100 rounded-full">Process</span>
                                            @endif
                                        </div>        
                                    </div>
                                </a>
                                <div class="spacer w-[1640px] h-[20px] invisible"></div>
        
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#search_field').on('keyup', function() {
                        var searchText = $(this).val().toLowerCase();
                        $('.tablezz').each(function() {
                            var namaKegiatan = $(this).find('#judul-laporan').text().toLowerCase();
                            if (namaKegiatan.includes(searchText)) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        });
                    });
                });
            </script>
    </body>
    
@endsection
