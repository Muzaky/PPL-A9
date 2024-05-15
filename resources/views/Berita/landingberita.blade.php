@extends('Layout.navtani')
{{-- @dd(Auth::user()) --}}
{{-- @if (session()->has('success')) --}}
@section('content')
    <style>
        #judul {
            font-family: 'Montserrat';
            font-size: 48px;
            font-weight: 700;
        }
        
    </style>

    <section>
        <div class="flex items-center justify-center">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride='carousel'>
        
            <div class="carousel-inner">
              @foreach ($data as $val)
              <div class="carousel-item @if ($loop->first) active @endif" data-bs-interval='4000'>
                <a href="{{ route('pemberitahuan.detail', $val->id_informasi) }}">
                  <img src="{{ asset('img/' . $val->gambar_informasi) }}" class="bg-cover w-[1200px] h-[600px] mt-4 rounded-xl" alt="">
                  <div class="carousel-caption d-none d-md-block ">
                    <h5 class="font-bold font-['Montserrat'] text-[24px]">{{ $val->judul_informasi }}</h5>
                    <p>Klik untuk informasi lebih lanjut</p>
                  </div>
                </a>
                
              </div>
              @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        </div>



        <!-- Section : Caraousel-->


        <div class="container mx-auto my-6 md:px-6">
            <!-- Section: Design Block -->
            <section class="mb-32 text-center">
              <p>Berita Lainnya</p>


                <div class="flex flex-col items-center">
                    @foreach ($data as $val)
                        <a href="{{ route('pemberitahuan.detail', $val->id_informasi) }}"
                            class="flex flex-col items-center mb-6 w-[1000px] bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-cover w-[280px] h-[240px] rounded-t-lg rounded-lg"
                                src="{{ asset('img/' . $val->gambar_informasi) }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $val->judul_informasi }}</h5>
                                <div
                                    class="flex items-center justify-center mb-1 text-sm font-medium text-danger dark:text-danger-500 md:justify-start">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </section>
@endsection
{{-- @endif --}}
