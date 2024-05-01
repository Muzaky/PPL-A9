<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BibiTani</title>
    <link rel="icon" href="bibitani.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="flex items-center justify-between p-6 lg:px-8 mx" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5"> 
          <span class="sr-only">Your Company</span>
          <img class="w-[250px] h-[86px]" src="{{ asset('../bibitani.ico') }}"alt="logobibitani">
        </a>
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

<script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @yield('content');
</body>
</html>