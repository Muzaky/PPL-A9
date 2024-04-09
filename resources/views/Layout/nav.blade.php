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
        <a href="/" class="font-semibold leading-6 text-gray-900" style="font-size:20px">Home</a>
        <a href="{{route('berita.landing')}}" class="font-semibold leading-6 text-gray-900" style="font-size:20px">Berita</a>
        <a href="#" class="text-sm font-semibold leading-6 text-gray-900" style="font-size:20px">Pengajuan</a>
      </div>
      <div class=" lg:flex lg:flex-1 lg:justify-end">
        <a href="#" class="flex justify-center text-sm font-semibold leading-6 text-gray-900 mx-8" style="font-size:20px; width: 128px; height:44px;background-color:#204E51; color:#f4f4f4; align-items: center;border-radius:8px">Login</a>
        <a href="#" class="flex justify-center text-sm font-semibold leading-6 text-gray-900" style="font-size:20px; width: 128px; height:44px;background-color:#f4f4f4; color:#204E51; align-items: center;border-radius:8px; border :1px solid #204E51">Sign Up</a>
      </div>
    </nav>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @yield('content');
</body>
</html>