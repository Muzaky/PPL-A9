<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BibiTani | Homepage</title>
    <link rel="icon" href="bibitani.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col justify-center items-center h-screen">
    <div class="flex justify-center items-center flex-row h-[266px] w-[1707px] mt-10 bg-[#f4f4f4]">
        <div class="flex flex-col bg-gray-500 h-full w-full font-bold justify-center">
            <div class="flex ml-[64px] w-[300px] text-[36px] text-wrap">Registrasi Kelompok Tani</div>
            <div class="flex ml-[64px] text-[20px]">Lakukan registrasi untuk mengakses semua fitur BibiTani</div>
        </div>
        <div class="flex flex-row bg-gray-600 h-full w-[600px] items-center justify-center ">
            <a class="flex py-2 text-[20px] mr-4 w-[120px] font-bold bg-white rounded-[12px] justify-center items-center " href="/registertani">Register</a>
            <a class="flex py-2 text-[20px] ml-4 w-[120px] bg-white rounded-[12px] justify-center items-center font-bold" href="/registertani">Logout</a>
        </div>
    </div>

    <div class="flex flex-col h-full w-[1707px] bg-black items-center">
        <h1 class="flex text-white">Fitur Bibitani</h1>
        <div class="flex flex-row">
            <a class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center" href="">
                <div class="flex flex-col items-center">

                    <img class="flex w-[100px] h-[100px]" src="{{ asset('images/newspaper.png') }}" alt="">
                    <h1 class="flex text-[20px] font-bold mt-8">Pemberitahuan</h1>  
                </div>
            </a>
            <a class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center" href="">
                <div class="flex flex-col items-center">

                    <img class="flex w-[100px] h-[100px]" src="{{ asset('images/newspaper.png') }}" alt="">
                    <h1 class="flex text-[20px] font-bold mt-8">Pemberitahuan</h1>  
                </div>
            </a>
            <a class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center" href="">
                <div class="flex flex-col items-center">

                    <img class="flex w-[100px] h-[100px]" src="{{ asset('images/newspaper.png') }}" alt="">
                    <h1 class="flex text-[20px] font-bold mt-8">Pemberitahuan</h1>  
                </div>
            </a>
            <a class="flex flex-col items-center mx-4 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl w-[250px] h-[250px] justify-center" href="">
                <div class="flex flex-col items-center">

                    <img class="flex w-[100px] h-[100px]" src="{{ asset('images/newspaper.png') }}" alt="">
                    <h1 class="flex text-[20px] font-bold mt-8">Pemberitahuan</h1>  
                </div>
            </a>
            
        </div>
    </div>
</body>
</html>