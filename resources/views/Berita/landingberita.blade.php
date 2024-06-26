@extends('Layout.navtani')

@section('content')
    <style>
        #judul {
            font-family: 'Montserrat';
            font-size: 48px;
            font-weight: 700;
        }

        .judul-carousel,
        #judul-berita {
            font-family: 'Montserrat';
            font-size: 24px;
            font-weight: 700;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.css" rel="stylesheet">

    <body class="bg-slate-200">

        <section class="">

            <div class="flex items-center justify-center ">
                @if ($data->isEmpty())
                <div class="flex flex-col items-center justify-center h-screen">

                    <div class="relative p-4">
                        <div class="svg-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 32 32" class="absolute text-[#204E51]/20">
                                <path fill="currentColor" d="M5 5a3 3 0 0 1 3-3h10.172a3 3 0 0 1 2.12.879l5.83 5.828A3 3 0 0 1 27 10.828V27a3 3 0 0 1-3 3h-6.05a2.5 2.5 0 0 0-.45-2H24a1 1 0 0 0 1-1V12h-5a3 3 0 0 1-3-3V4H8a1 1 0 0 0-1 1v9.566a7.447 7.447 0 0 0-2 .558V5Zm15 5h4.586L19 4.414V9a1 1 0 0 0 1 1ZM8 28c1.296 0 2.496-.41 3.476-1.11l3.317 3.317a1 1 0 0 0 1.414-1.414l-3.316-3.316A6 6 0 1 0 8 28Zm0-2a4 4 0 1 1 0-8a4 4 0 0 1 0 8Z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 20 20" class="absolute right-0 rotate-[45deg]">
                                <g fill="currentColor">
                                    <path d="M11 16.25a1.25 1.25 0 1 1-2.5 0a1.25 1.25 0 0 1 2.5 0Z"/>
                                    <path fill-rule="evenodd" d="M9.71 4.065c-.807 0-1.524.24-2.053.614c-.51.36-.825.826-.922 1.308a.75.75 0 1 1-1.47-.297c.186-.922.762-1.696 1.526-2.236c.796-.562 1.82-.89 2.919-.89c2.325 0 4.508 1.535 4.508 3.757c0 1.292-.768 2.376-1.834 3.029a.75.75 0 0 1-.784-1.28c.729-.446 1.118-1.093 1.118-1.749c0-1.099-1.182-2.256-3.008-2.256Zm0 5.265a.75.75 0 0 1 .75.75v1.502a.75.75 0 1 1-1.5 0V10.08a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M12.638 8.326a.75.75 0 0 1-.258 1.029l-2.285 1.368a.75.75 0 1 1-.77-1.287l2.285-1.368a.75.75 0 0 1 1.028.258Z" clip-rule="evenodd"/>
                                </g>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 20 20" class="absolute right-4 -top-4 rotate-[25deg]">
                                <g fill="currentColor">
                                    <path d="M11 16.25a1.25 1.25 0 1 1-2.5 0a1.25 1.25 0 0 1 2.5 0Z"/>
                                    <path fill-rule="evenodd" d="M9.71 4.065c-.807 0-1.524.24-2.053.614c-.51.36-.825.826-.922 1.308a.75.75 0 1 1-1.47-.297c.186-.922.762-1.696 1.526-2.236c.796-.562 1.82-.89 2.919-.89c2.325 0 4.508 1.535 4.508 3.757c0 1.292-.768 2.376-1.834 3.029a.75.75 0 0 1-.784-1.28c.729-.446 1.118-1.093 1.118-1.749c0-1.099-1.182-2.256-3.008-2.256Zm0 5.265a.75.75 0 0 1 .75.75v1.502a.75.75 0 1 1-1.5 0V10.08a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M12.638 8.326a.75.75 0 0 1-.258 1.029l-2.285 1.368a.75.75 0 1 1-.77-1.287l2.285-1.368a.75.75 0 0 1 1.028.258Z" clip-rule="evenodd"/>
                                </g>
                            </svg>
                        </div>
                        <div class="h-[200px] w-[200px]"></div>
                    </div>

                    <p>Belum ada pemberitahuan</p>
                </div>
                @else
                    <div id="default-carousel" class="relative mt-8" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-[600px] w-[1200px] overflow-hidden rounded-[20px]">

                            @foreach ($data as $val)
                                @if ($loop->first)
                                    <!-- First Item: Visible by default -->
                                    <a href="{{ route('pemberitahuan.detail', ['slug' => Str::slug($val->judul_informasi), 'id' => $val->id_informasi]) }}"
                                        class="visible hidden duration-700 ease-in-out" data-carousel-item="active">
                                        <div class="absolute w-full h-full mix-blend-overlay">
                                            <img src="{{ Storage::url($val->gambar_informasi) }}"
                                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                alt="...">
                                            <div
                                                class="absolute w-full h-full bg-gradient-to-t from-black/80 via-transparent to-transparent">
                                            </div>
                                        </div>


                                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                                            <p class="p-2 text-lg font-semibold text-white md:text-xl lg:text-2xl mt-[35%]">
                                                {{ $val->judul_informasi }}</p>
                                            <small class="text-white">Klik untuk informasi lebih lanjut</small>
                                        </div>
                                    </a>
                                @else
                                    <!-- Other Items: Hidden by default -->
                                    <a href="{{ route('pemberitahuan.detail', ['slug' => Str::slug($val->judul_informasi), 'id' => $val->id_informasi]) }}"
                                        class="hidden duration-700 ease-in-out " data-carousel-item>
                                        <div class="absolute w-full h-full mix-blend-overlay">
                                            <img src="{{ Storage::url($val->gambar_informasi) }}"
                                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                alt="...">
                                            <div
                                                class="absolute w-full h-full bg-gradient-to-t from-black/80 via-transparent to-transparent">
                                            </div>
                                        </div>


                                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                                            <p class="p-2 text-lg font-semibold text-white md:text-xl lg:text-2xl mt-[35%]">
                                                {{ $val->judul_informasi }}</p>
                                            <small class="text-white">Klik untuk informasi lebih lanjut</small>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 rtl:space-x-reverse">
                            <?php $i = 0; ?>
                            @foreach ($data as $val)
                                <button type="button" class="w-3 h-3 rounded-full"
                                    aria-current="{{ $i == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $i }}"
                                    data-carousel-slide-to="{{ $i }}"></button>
                                <?php $i++; ?>
                            @endforeach
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer start-0 group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer end-0 group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                @endif
            </div>

            <!-- Section : Caraousel-->

            @if ($data->isEmpty())
            @else
                <div class="container mx-auto my-6 md:px-6">
                    <!-- Section: Design Block -->
                    <section class="mb-32 text-center">
                        <div class="flex items-center justify-center w-full text-center">
                            <p id="judul-berita" class="flex p-2 bg-slate-200 text-[#204e51]">Daftar Pemberitahuan</p>
                        </div>
                        <div class="w-full -mt-6 h-[2px] bg-black "></div>
                        <div class="flex flex-col items-center mt-8">
                            @foreach ($data as $val)
                                <a href="{{ route('pemberitahuan.detail', ['slug' => Str::slug($val->judul_informasi), 'id' => $val->id_informasi]) }}"
                                    class="flex flex-col items-center mb-6 w-[1000px] h-[240px] bg-white border border-black/5 rounded-lg shadow-xl md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <img class="object-cover w-[280px] h-[240px] rounded-t-lg rounded-lg"
                                        src="{{ Storage::url($val->gambar_informasi) }}" alt="">
                                    <div class="flex flex-col h-full">
                                        <div
                                            class="flex flex-col items-start justify-between p-4 leading-normal w-[550px] text-wrap">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-left">
                                                {{ $val->judul_informasi }}</h5>
                                            <div
                                                class="flex items-center mb-1 text-sm font-medium text-danger dark:text-danger-500 md:justify-start">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                                                </svg>
                                                {{ $val->nama_bibit }}
                                            </div>
                                            <p class="mb-2 text-neutral-500">
                                                <small>
                                                    Published
                                                    <u>
                                                        {{ $val->tgl_awal }}
                                                    </u>
                                                    by Dinas Tanaman Pangan dan Hortikultura Jember
                                                </small>
                                            </p>
                                            <div
                                                class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-start overflow-ellipsis">
                                                <?= @$val->syarat_ketentuan ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="font-[Raleway] text-[16px]">Baca selengkapnya</div>
                                </a>
                            @endforeach
                        </div>



                    </section>
                    <!-- Section: Design Block -->
                </div>
            @endif


        </section>
    </body>
@endsection
{{-- @endif --}}
