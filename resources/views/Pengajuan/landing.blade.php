@extends('Layout.navtani')
@section('content')
    <style>
        #judul {
            font-family: 'Montserrat';
            font-size: 40px;
            font-weight: 700;
        }

        .font-inside {
            font-family: 'Montserrat'
        }



        /* Custom focus ring color */
    </style>
    </style>
    <section class="flex flex-col font-[Montserrat] items-center">
        <div
            class="relative w-[1440px] rounded-br-[20px] rounded-bl-[20px] border-x-2 border-b-2 border-[#204E51]  shadow-xl bg-[#204E51]">
            <a href="{{ route('homepage') }}"
                class="absolute left-[20px] top-[20px] flex items-center text-white text-sm font-medium ml-4">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </a>
            <h1 class="my-10 text-center text-white" id="judul">Pengajuan Bantuan {{ $registrasi->nama_keltani }}
            </h1>
        </div>
        <div class="flex flex-row gap-8 items-center -mt-8 bg-gray-100 p-2 rounded-br-[20px] rounded-bl-[20px] justify-start w-[1440px] mb-4">
                
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-32 h-32 rounded-full p-4 mt-8">
                <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
              </svg>
              
            <h1 class="w-[1440px] text-wrap text-gray-600 mt-6"><font class="font-semibold text-yellow-500">Halaman pengajuan bantuan bibit tani Dinas Tanaman Pangan dan Hortikultura (TPHP)</font>.<br> Petani dapat melihat daftar pengajuan bantuan yang sudah diajukan.
                Terdapat 3 indikator sebagai penanda status pengajuan saat ini : <br> <font class="text-green-500">Validated</font>, <font class="text-yellow-500">Process</font>, dan <font class="text-red-500">Rejected</font>.
                <br> 
            </h1>
        </div>
        <div class="w-[1280px] mb-2">
            <div class="flex mb-2 w-full justify-end">
                <form action="" method="GET" class="flex-row flex">
                    <div class="p-2 font-[Montserrat]">Filter :</div>
                    <div class="flex items-center">
                        <input type="checkbox" id="validated" name="status_validasi[]" value="2"
                            class="form-checkbox border-green-500 focus:ring-green-500 focus:border-green-500  checked:bg-green-500 checked:border-transparent"
                            {{ in_array('2', Request::get('status_validasi', [])) ? 'checked' : '' }}>
                        <label for="validated" class="ml-1 mr-4 text-green-500 font-[Raleway]">Validated</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="process" name="status_validasi[]" value="1"
                            class="form-checkbox border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500  checked:bg-yellow-500 checked:border-transparent"
                            {{ in_array('1', Request::get('status_validasi', [])) ? 'checked' : '' }}>
                        <label for="process" class="ml-1 mr-4 text-yellow-500 font-[Raleway]">Process</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="rejected" name="status_validasi[]" value="3"
                            class="form-checkbox border-red-500 focus:ring-red-500 focus:border-red-500  checked:bg-red-500 checked:border-transparent"
                            {{ in_array('3', Request::get('status_validasi', [])) ? 'checked' : '' }}>
                        <label for="rejected" class="ml-1 text-red-500 font-[Raleway]">Rejected</label>
                    </div>
                    <button type="submit"
                        class="ml-4 px-2 bg-[#204E51] border-2 border-[#204E51] rounded-lg text-white hover:bg-white hover:text-[#204E51]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        @if ($pengajuan->isEmpty())
        <div class="mt-8">{{ $message }}</div>
        @else
        @foreach ($pengajuan as $val)
            <div class="flex flex-col items-center">
                <a href="{{ route('pengajuan.show', $val->id_pengajuan) }}"
                    class="flex flex-row items-center mb-6 bg-white border w-[1280px] border-gray-200 rounded-[20px] shadow-md hover:bg-gray-100 ">
                    <img class="object-cover w-48 h-40 rounded-[20px]"
                        src="{{ optional($val->informasi)->gambar_informasi ? asset('img/' . $val->informasi->gambar_informasi) : 'fallback-image-url.jpg' }}"
                        alt="">
                    <div class="flex flex-col justify-between px-4 leading-normal">
                        <h5 class="text-[40px] font-bold tracking-tight text-gray-900 dark:text-white ">
                            {{ optional($val->informasi)->nama_bibit }}</h5>
                        <div
                            class="font-inside f flex items-center justify-center mb-1 text-sm text-green-500 md:justify-start">
                            @if ($val->status_validasi == 2)
                                <span class="px-3 py-1 text-green-500 bg-green-100 rounded-full">Validated</span>
                            @elseif ($val->status_validasi == 3)
                                <span class="px-3 py-1 text-red-500 bg-red-100 rounded-full">Rejected</span>
                            @else
                                <span class="px-3 py-1 text-yellow-500 bg-yellow-100 rounded-full">Process</span>
                            @endif
                        </div>
                        <p class="mb-2 text-neutral-500">
                            @if ($val->status_validasi == 2)
                                <small class="font-inside">
                                    Terverifikasi Tanggal
                                    <u><b>
                                            {{ $val->tanggal_validasi }}
                                        </b></u>
                                </small>
                            @elseif ($val->status_validasi == 3)
                                <small class="font-inside">
                                    Ditolak tanggal
                                    <u>
                                        {{ $val->tanggal_validasi }}
                                    </u>
                                </small>
                            @else
                                <small class="font-inside">
                                    Menunggu pemrosesan oleh Dinas
                                </small>
                            @endif
                        </p>
                        <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">

                        </div>

                    </div>
                </a>

            </div>
            @endforeach
            @endif

        {{ $pengajuan->links() }}

        </div>
    </section>
@endsection
