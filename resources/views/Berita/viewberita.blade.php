@extends('Layout.navtani')
@section('content')
    <section class="flex items-center justify-center mt-4">
        <div class="w-[1440px] bg-white border border-gray-200 rounded-[20px] shadow dark:bg-gray-800 dark:border-gray-700">
            <div id="container" class="flex flex-row items-center justify-center w-full relative">
                <a href="{{ route('pemberitahuan.landing') }}"
                        class="absolute left-[10px] top-[20px] flex items-center text-white text-sm font-medium ml-4 p-2 bg-black/20 rounded-[12px] hover:bg-black/50 ">
                        <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back
                    </a>
                <div id="imageContainer" class="flex-shrink-0 rounded-l-[20px] w-[400px] h-full bg-cover bg-center bg-no-repeat"
                    style="background-image: url('{{ Storage::url($data->gambar_informasi) }}');">
                </div>
                <div class="flex flex-col px-4">
                    <div class="flex items-center text-wrap">
                        <h1 class="font-[poppins] text-[40px] font-bold mt-4 justify-center">{{ $data->judul_informasi }}
                        </h1>
                    </div>
                    <p class="mb-2 text-neutral-500">
                        <small>
                            <u>
                                {{ $data->tgl_awal }}
                            </u>
                            by Dinas Tanaman Pangan dan Hortikultura Jember
                        </small>
                    </p>
                    <h2 class="mt-4 font-bold text-[20px]">Deskripsi :</h2>
                    <p class="font-[Montserrat]">{{ strip_tags($data->deskripsi) }}</p>
                    <h2 class="mt-4 font-bold text-[20px]">Keterangan :</h2>
                    <ul class=" font-regular font-[Montserrat]">
                        <li>Waktu pengajuan dimulai pada tanggal {{ $data->tgl_awal }} s/d {{ $data->tgl_akhir }}</li>
                        <li>Jumlah Bibit : <font style="font-weight: 700">{{ $data->jumlah_bibit }}</font> Kg</li>
                    </ul>
                    <small class="text-red-300">
                        *Bibit akan dibagikan secara merata terhadap jumlah pengajuan dan kebutuhan
                    </small>
                    <div class="flex flex-col py-4 mb-3 font-normal text-gray-700 dark:text-gray-400 font-[Montserrat]">
                        Syarat dan Ketentuan :
                        @if ($data->syarat_ketentuan)
                            @php
                                // Explode the text based on <br> tags
                                $lines = explode('<br />', $data->syarat_ketentuan);
                                // Initialize the counter
                                $counter = 1;
                            @endphp

                            @if (!empty($lines))
                                <ol>
                                    @foreach ($lines as $line)
                                        @php
                                            // Strip HTML tags from the line
                                            $cleanLine = strip_tags($line);
                                        @endphp
                                        <li>{{ $counter }}. {{ $cleanLine }}</li>
                                        @php $counter++; @endphp
                                    @endforeach
                                </ol>
                            @else
                                <p>No syarat ketentuan found.</p>
                            @endif
                        @endif
                        <div class="flex items-center justify-center py-4 ">
                            <button onclick="showCreateButton()"
                                class="px-4 py-2 rounded-lg bg-[#204E51] text-white font-medium hover:bg-transparent hover:text-[#204E51] border border-[#204E51]">
                                Pengajuan</button>
                        </div>
                    </div>
                </div>
            </div>
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


        </div>

        <!--Modal Script Create Pengajuan-->
        <div id="createbutton"
            class="fixed top-0 left-0 items-center justify-center hidden w-screen h-screen transition-opacity duration-500 bg-black opacity-0 bg-opacity-40">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 rounded-lg shadow-lg bg-blueGray-100">
                <div class="flex-auto px-4 py-4 pt-0 lg:px-10">
                    <form class="flex flex-col items-center justify-center" action="{{ route('pengajuan.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <h6 class="mt-3 mb-6 text-sm font-bold uppercase text-[#204E51]">
                            Ajukan Berkas
                        </h6>
                        <div class="flex flex-wrap text-center">
                            <div class="w-full px-4">
                                <div class="w-full mb-3">
                                    <div class="mb-[18px] relative">
                                        <label for="dropzone-file"
                                            class="flex flex-col items-center justify-center w-full h-14 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-[#F1F1F1] hover:bg-gray-100 dark:border-gray-400 dark:hover:border-gray-500 dark:hover:bg-slate-200 2xl:h-20">
                                            <div class="flex flex-row items-center justify-center gap-2 pt-5 pb-6">
                                                <div id="file-name"
                                                    class="flex items-center gap-2 text-gray-500 dark:text-gray-400 text-[14px] w-[500px] justify-center ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4" id="svg-upload">
                                                        <path fillRule="evenodd"
                                                            d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                                            clipRule="evenodd" />
                                                    </svg>
                                                    <p id="textcontent">
                                                        Klik untuk unggah dokumen pengajuan (PDF)
                                                    </p>
                                                </div>
                                            </div>
                                            <input id="dropzone-file" onchange="displayFileName()" name="berkas_pengajuan"
                                                type="file" class="hidden" accept="application/pdf" />
                                        </label>
                                    </div>

                                    <input type="number" name="id_informasi" id="id_informasi"
                                        class=" hidden border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150"
                                        value="{{ $data->id_informasi }}" placeholder="">
                                    </input>
                                    <input type="text" name="nama_informasi" id="nama_informasi"
                                        class=" hidden border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150"
                                        value="{{ $data->judul_informasi }}" placeholder=>
                                    </input>
                                    <input type="number" name="id_registrasi" id="id_registrasi"
                                        class=" hidden border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150"
                                        value="{{ $registrasi->id_registrasi }}" placeholder=>
                                    </input>



                                </div>
                            </div>


                        </div>

                        <button type="submit"
                            class="flex w-full justify-center rounded-[12px] bg-[#204E51] opacity-70 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#37251b] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#76f51] mt-8">
                            Simpan
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

            function displayFileName() {
                const fileInput = document.getElementById('dropzone-file');
                const fileNameParagraph = document.getElementById('file-name');
                const textcontent = document.getElementById('textcontent');
                const svgCode = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4" id="svg-upload">
                                                        <path fillRule="evenodd"
                                                            d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                                            clipRule="evenodd" />
                                                    </svg>`
                if (fileInput.files.length > 0) {
                    fileNameParagraph.textContent = fileInput.files[0].name;
                } else {
                    fileNameParagraph.innerHTML = svgCode + 'Klik untuk unggah dokumen pengajuan (PDF)';
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                var container = document.getElementById('container');
                var imageContainer = document.getElementById('imageContainer');

                function adjustImageContainerHeight() {
                    var containerHeight = container.offsetHeight;
                    imageContainer.style.height = containerHeight + 'px';
                }

                // Initial adjustment
                adjustImageContainerHeight();

                // Adjust on window resize
                window.addEventListener('resize', adjustImageContainerHeight);
            });
        </script>


    </section>
@endsection
