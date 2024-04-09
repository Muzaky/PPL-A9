@extends('Layout.nav')

@section('content')
<section>
  <div class="container my-6 mx-auto md:px-6">
    <!-- Section: Design Block -->
    <section class="mb-32 text-center md:text-left">
      <h2 class="mb-12 text-center text-3xl font-bold">Berita</h2></h2>
      
      <div class="flex flex-col items-center">
        @foreach ($data as $val)
        {{-- @php
            dd($val->id_informasi);
        @endphp --}}
        <a href="{{ route('berita.detail',$val->id_informasi) }}" class="flex flex-col items-center mb-6 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('img/' . $val->gambar_informasi) }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $val->judul_informasi }}</h5>
                <div class="mb-1 flex items-center justify-center text-sm font-medium text-danger dark:text-danger-500 md:justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="mr-2 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                    </svg>
                    {{ $val->nama_bibit }}
                </div>
                <p class="text-neutral-500 mb-2">
                  <small>
                    Published 
                    <u>
                      {{ $val->tgl_awal }} 
                    </u>
                    by Dinas Tanaman Pangan dan Hortikultura Jember
                  </small> 
                </p>
                <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                  <?= @$val->syarat_ketentuan ?>
                </div>
                
            </div>
        </a>
        @endforeach
    </div>
    
    
      
    </section>
    <!-- Section: Design Block -->
  </div>
  
</section>


@endsection

  