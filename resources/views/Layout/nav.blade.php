<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BibiTani</title>
    <link rel="icon" href="bibitani.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="flex items-center justify-between p-6 lg:px-8 mx" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5"> 
          <span class="sr-only">Your Company</span>
          <img class="w-[250px] h-[86px]" src="{{ asset('../bibitani.ico') }}"alt="logobibitani">
        </a>
      </div>
      <div class="lg:flex lg:gap-x-12">
        <a href="{{ route('homepage') }}" class="font-semibold leading-6 text-gray-900" style="font-size:20px">Home</a>
        <a href="{{ route('landingpemberitahuan') }}" class="font-semibold leading-6 text-gray-900" style="font-size:20px">Berita</a>
        <a href="#" class="text-sm font-semibold leading-6 text-gray-900" style="font-size:20px">Pengajuan</a>
      </div>
      <div class=" lg:flex lg:flex-1 lg:justify-end">
        @if(Auth::check())
        <a href="{{ route('logout') }}" class="flex justify-center font-semibold leading-6  mx-8 hover:bg-[#f4f4f4] bg-[#204E51] text-[#f4f4f4] hover:text-[#204E51] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Logout</a>
        @else
        <a href="/login" class="flex justify-center font-semibold leading-6  mx-8 hover:bg-[#f4f4f4] bg-[#204E51] text-[#f4f4f4] hover:text-[#204E51] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]" >Masuk</a>
        <a href="/register" class="flex justify-center font-semibold leading-6  hover:bg-[#204e51] bg-[#f4f4f4] text-[#204e51] hover:text-[#f4f4f4] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Daftar</a>
        @endif
      </div>
    </nav>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @yield('content');
</body>
</html>