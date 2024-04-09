@extends('Layout.nav')

@section('content')
    <section class="flex flex-col justify-center items-center">
        <div class="w-[1000px] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col justify-center items-center">
                <img class="w-full h-[400px]" src="{{ asset('img/' . $data->gambar_informasi) }}" alt="berita">
                <div class="flex justify-center items-center text-center text-wrap px-4">
                    <h1 class="font-[poppins] text-[40px] font-bold mt-4 justify-center">{{ $data->judul_informasi }}</h1>
                </div>
                <p class="text-neutral-500 mb-2">
                    <small>
                        <u>
                            {{ $data->tgl_awal }}
                        </u>
                        by Dinas Tanaman Pangan dan Hortikultura Jember
                    </small>
                </p>

            </div>
            <div class="px-4">
                <h2 class="mt-4 font-bold text-[20px]">Keterangan :</h2>
                <ul class=" font-regular">
                    <li>Waktu pengajuan dimulai pada tanggal {{ $data->tgl_awal }} s/d {{ $data->tgl_akhir }}</li>
                    <li>Jumlah Bibit : <font style="font-weight: 700">{{ $data->jumlah_bibit }}</font> Kg</li>
                </ul>
                <small class="text-red-300">
                    *Bibit akan dibagikan secara merata terhadap jumlah pengajuan dan kebutuhan
                </small>
                <div class="mb-3 font-normal text-gray-700 dark:text-gray-400 flex flex-col py-4">
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
                </div>
            </div>
            <div class="flex justify-center items-center py-4 ">
                <button onclick="showCreateButton()"
                    class="px-4 py-2 rounded-lg bg-[#204E51] text-white font-medium hover:bg-transparent hover:text-[#204E51] border border-[#204E51]">
                    Pengajuan</button>
            </div>
        </div>

        <!--Modal Script Create Pengajuan-->
        <div id="createbutton"
            class="fixed left-0 top-0 bg-black bg-opacity-40 w-screen h-screen flex items-center justify-center opacity-0 transition-opacity duration-500 hidden">
            <div
                class="bg-white relative flex flex-col min-w-0 break-words  mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="flex-auto px-4 lg:px-10 py-4 pt-0">
                    <form class="flex justify-center items-center flex-col"
                        action="{{ route('pengajuan.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Form Pengajuan
                        </h6>
                        <div class="flex flex-wrap text-center">
                            
                           
                            <div class="w-full  px-4">
                                <div class="w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Berkas Pengajuan
                                    </label>
                                    <input type="file" name="berkas_pengajuan"  id="berkas_pengajuan"
                                        class="border-0 px-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-[500px] ease-linear transition-all duration-150"
                                        value="" placeholder="Masukkan File">
                                </div>
                            </div>
            

                        </div>
                       
                        <button type="submit" class="flex mt-4">
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
                    createbutton.classList.add('opacity-100')
                }, 20);

            }


        </script>


    </section>
@endsection
