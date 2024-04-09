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
    @vite('resources/css/app.css')
</head>
<style>
  #overlay {
  
  background-color: rgba(0,0,0,0.5);
  background-size:cover;

}
</style>

<body>
    <nav class="flex items-center justify-between p-6 lg:px-8 mx" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5"> 
          <span class="sr-only">Your Company</span>
          <img class="w-[250px] h-[86px]" src="bibitani.ico" alt="logobibitani">
        </a>
      </div>
      <div class="lg:flex lg:gap-x-12">
        <a href="/" class="font-semibold leading-6 text-gray-900" style="font-size:20px">Home</a>
        <a href="{{route('berita.landing')}}" class="font-semibold leading-6 text-gray-900" style="font-size:20px">Berita</a>
        <a href="#" class="text-sm font-semibold leading-6 text-gray-900" style="font-size:20px">Pengajuan</a>
      </div>
      <div class=" lg:flex lg:flex-1 lg:justify-end">
        <a href="/login" class="flex justify-center text-sm font-semibold leading-6 text-gray-900 mx-8" style="font-size:20px; width: 128px; height:44px;background-color:#204E51; color:#f4f4f4; align-items: center;border-radius:8px">Login</a>
        <a href="/register" class="flex justify-center text-sm font-semibold leading-6 text-gray-900" style="font-size:20px; width: 128px; height:44px;background-color:#f4f4f4; color:#204E51; align-items: center;border-radius:8px; border :1px solid #204E51">Register</a>
      </div>
    </nav>
    <div class="relative isolate px-6 lg:px-8 bg-cover h-screen" style="background-image: url(image_1.png); background-size: cover;background-repeat: no-repeat; max-height: 86vh;" >
      <div class="h-screen bg-cover -mx-8"id="overlay" style="max-height: 86vh">
        <div class="mx-auto max-w-4xl py-32 sm:py-48 lg:py-40">
          <div class="text-center">
            <h1 class="font-bold tracking-tight sm:text-6xl style" style="font-size:90px ;color:#f4f4f4">Solusi Penyaluran Bibit <font color="#39A413">Horikultura</font> Kabupaten Jember</h1>
            <p class="mt-6 text-lg leading-8" style="color:#f4f4f4">Lakukan pengajuan subsidi bibit tanpa harus datang ke dinas !</p>
          </div>
          <div class="mt-10 flex items-center justify-center gap-x-6">
              <a href="#" class="flex justify-center items-center text-sm font-semibold leading-6 text-gray-900" style="font-size:20px; width: 176px; height:48px;background-color:#transparent; color:#f4f4f4;border-radius:8px; border :1px solid #f4f4f4">Learn more</a>
            </div>
        </div>
      </div>
    </div>
    
    <!-- <div class="flex" style="height: 600px; background-color: #204E51 ">
      <div class="flex mx-auto max-w-7xl px-6 lg:px-8 text-center mt-6">
        <h2 class="flex text-3xl font-semibold text-white sm:text-4xl">Berita Terkini</h2>
      </div>
    </div> -->
  


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}
</body>
</html>



