<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BibiTani</title>
    <link rel="icon" href="bibitani.ico">
    <link rel="stylesheet" href="./css/scroll.css">
    <link rel="stylesheet" href="./css/landing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>
<style>
    #overlay {

        background-color: rgba(0, 0, 0, 0.45);
        background-size: cover;

    }

    .titleabout p {
        background-color: white;
        color: white;
        z-index: 2;
    }

    .navitem,
    .herotitle {
        font-family: 'Poppins';
        color: #204E51;
    }

    .subhero {
        font-family: 'Raleway';
        color: #f4f4f4;
    }

    .footer-bar {
        font-family: 'Montserrat';
        color: #f4f4f4;

    }

    .footer-subtitle {
        font-size: 28px;
        font-weight: 700;
    }

    .footer-sublink {
        font-size: 16px;
        font-weight: 300;
    }

    .footer-sublink:hover {
        text-decoration: underline;
        cursor: pointer;
    }

    .subtujuan {
        text-align: center;
        width: 400px;
        text-wrap: wrap;
        font-family: 'Raleway';
        font-size: 20px
    }

    .subtujuan img {
        height: 500px;
    }

    .subtujuan p {
        margin-top: 36px;
        margin-bottom: 36px;
    }

    .abouttext {
        font-family: 'Raleway';
        text-align: center;
        color: #f4f4f4;
    }
</style>

<body>
    @if (session()->has('status'))
        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="text-sm font-medium ms-3">
                {{ session('status') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <nav class="flex items-center p-6 bg-white shadow-md md:flex justify-between" aria-label="Global">
        <div class="flex">
            <a href="/" class="-m-1.5 p-1.5">
                <img class="h-[86px] mr-12" src="bibitani.ico" alt="logobibitani">
            </a>
        </div>
        <div class="hidden md:flex gap-x-12">
            <a href="#hero" class="font-semibold leading-6 navitem" style="font-size:20px">Home</a>
            <a href="#about" class="font-semibold leading-6 navitem" style="font-size:20px">About Us</a>
            <a href="#footer" class="font-semibold leading-6 navitem" style="font-size:20px">Address</a>
            @if (Auth::check())
                @if (Auth::user()->id_roles == '2')
                    <a href="/dashboard" class="font-semibold leading-6 navitem" style="font-size:20px">Dashboard</a>
                @else
                    <a href="/homepage" class="font-semibold leading-6 navitem" style="font-size:20px">Homepage</a>
                @endif
            @endif
        </div>
        <div class="hidden md:flex flex-1 justify-end">
            @if (Auth::check())
                <a href="{{ route('logout') }}"
                    class="flex justify-center font-semibold leading-6 mx-8 hover:bg-[#f4f4f4] bg-[#204E51] text-[#f4f4f4] hover:text-[#204E51] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Logout</a>
            @else
                <a href="{{ route('login') }}"
                    class="flex justify-center font-semibold leading-6 mx-8 hover:bg-[#f4f4f4] bg-[#204E51] text-[#f4f4f4] hover:text-[#204E51] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Masuk</a>
                <a href="{{ route('register') }}"
                    class="flex justify-center font-semibold leading-6 hover:bg-[#204e51] bg-[#f4f4f4] text-[#204e51] hover:text-[#f4f4f4] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Daftar</a>
            @endif
        </div>
        <div class="md:hidden flex items-center">
            <button id="menu-btn" class="text-3xl focus:outline-none">
                &#9776;
            </button>
        </div>
    </nav>
    <!-- Mobile Menu -->
    <div id="menu" class="hidden md:hidden flex flex-col items-center bg-white shadow-md p-6">
        <a href="#hero" class="font-semibold leading-6 navitem mb-4" style="font-size:20px">Home</a>
        <a href="#about" class="font-semibold leading-6 navitem mb-4" style="font-size:20px">About Us</a>
        <a href="#footer" class="font-semibold leading-6 navitem mb-4" style="font-size:20px">Address</a>
        @if (Auth::check())
            @if (Auth::user()->id_roles == '2')
                <a href="/dashboard" class="font-semibold leading-6 navitem mb-4" style="font-size:20px">Dashboard</a>
            @else
                <a href="/homepage" class="font-semibold leading-6 navitem mb-4" style="font-size:20px">Homepage</a>
            @endif
            <a href="{{ route('logout') }}"
                class="flex justify-center font-semibold leading-6 hover:bg-[#f4f4f4] bg-[#204E51] text-[#f4f4f4] hover:text-[#204E51] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Logout</a>
        @else
            <a href="{{ route('login') }}"
                class="flex justify-center font-semibold leading-6 mb-4 hover:bg-[#f4f4f4] bg-[#204E51] text-[#f4f4f4] hover:text-[#204E51] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Masuk</a>
            <a href="{{ route('register') }}"
                class="flex justify-center font-semibold leading-6 mb-4 hover:bg-[#204e51] bg-[#f4f4f4] text-[#204e51] hover:text-[#f4f4f4] rounded-[8px] items-center h-[44px] w-[128px] text-[20px] border border-[#204E51]">Daftar</a>
        @endif
    </div>

   <div class="relative h-screen px-6 bg-cover shadow-md isolate lg:px-8 transition:ease-in-out" id="hero"
    style="background-image: url(image_1.png); background-size: cover; background-repeat: no-repeat; max-height: 86vh;">
    <div class="h-screen -mx-8 bg-cover flex items-center justify-center" id="overlay" style="max-height: 86vh">
        <div class="max-w-4xl py-24 md:py-48 mx-auto text-center">
            <div class="flex flex-col items-center text-center md:flex justify-center" id="isihero">
                <img src="./landing/Frame 841.png" class="w-[200px] md:w-[400px] h-full" alt="">
                <p class="text-base md:text-lg leading-6 md:leading-8 subhero px-4 md:px-0">
                    Platform Interaktif untuk Sinergi antara Dinas Tanaman Pangan Hortikultura dan Perkebunan (TPHP)
                    dengan Kelompok Tani, guna Mewujudkan Distribusi Bantuan Bibit Hortikultura yang Optimal Kepada para
                    Kelompok Tani di Kabupaten Jember
                </p>
            </div>
        </div>
    </div>
</div>

    <div id="about" class="flex flex-col items-center bg-[#204e51] py-8">
        <div class="herotitle text-[36px] md:text-[72px] font-bold my-8 text-[#f4f4f4]">
            <h1>About us</h1>
        </div>

        <div class="flex flex-col md:flex-row justify-evenly w-full h-full px-4 md:px-0 md">
            <div class="flex justify-center flex-col text-justify md:w-[500px] text-wrap gap-4 mb-8 md:mb-0 "
                id="textabout">
                <p class="abouttext text-[18px] text-center md:text-[22px] md:text-left">Bibitani adalah sebuah aplikasi berbasis
                    website sebagai upaya membantu kelompok tani dalam mengajukan permintaan bantuan bibit Hortikultura
                    kepada Dinas Tanaman Pangan dan Hortikultura (TPHP)</p>
                <p class="abouttext text-[18px] text-center md:text-[22px] md:text-left">Dengan harapan Website Bibitani dapat
                    mempermudah Dinas Tanaman Pangan dan Hortikultura (TPHP) untuk melakukan pendistribusian bantuan
                    bibit hortikultura di Kabupaten Jember dengan efektif dan efisien.</p>
            </div>

            <div class="items-center flex flex-col justify-center" id="imgabout">
                <img src="./landing/about us.jpeg" class="w-full md:w-[500px] rounded-[20px]" alt="">
            </div>
           
        </div>
        <div class="spacer h-[80px] invisible"></div>
    </div>

    <div id="tujuan" class="flex flex-col items-center justify-center py-8">
        <div class="herotitle text-[36px] md:text-[72px] font-bold my-8">
            <h1>Tujuan</h1>
        </div>
        <div class="flex flex-col md:flex-row gap-8 md:gap-40 px-4 md:px-0">
            <div class="subtujuan text-center">
                <img src="./landing/Rectangle 10.png" class="w-full md:w-auto imgtujuan mb-4" alt="">
                <p class="text-[18px] md:text-[22px]">Mempermudah Dinas Tanaman Pangan Hortikultura dan Perkebunan
                    (TPHP) untuk melakukan pencatatan dalam pendistribusian bantuan bibit hortikultura di Kabupaten
                    Jember.</p>
            </div>
            <div class="subtujuan text-center">
                <img src="./landing/Rectangle 11.png" class="w-full md:w-auto imgtujuan mb-4" alt="">
                <p class="text-[18px] md:text-[22px]">Meningkatkan produktivitas hasil panen petani di Kabupaten Jember
                    melalui bantuan bibit hortikultura yang berkualitas.</p>
            </div>
            <div class="subtujuan text-center">
                <img src="./landing/Rectangle 12.png" class="w-full md:w-auto imgtujuan mb-4" alt="">
                <p class="text-[18px] md:text-[22px]">Memudahkan Dinas Tanaman Pangan Hortikultura dan Perkebunan
                    (TPHP) dalam mengontrol kualitas produk pertanian hortikultura di Kabupaten Jember.</p>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="landing.js"></script>
    <script>
        document.getElementById('menu-btn').addEventListener('click', function() {
            var menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        });
    </script>


</body>
<footer class="flex flex-col p-6 text-center bg-[#204E51]" id="footer">
    <div class="flex flex-col md:flex-row justify-between items-center md:items-start">
        <div class="spacer hidden md:block"></div>
        <div class="flex flex-col items-center md:items-start md:ml-8 footer-bar mb-6 md:mb-0">
            <img src="./landing/Frame 841.png" class="h-20 mb-4" alt="">
            <p class="w-full md:w-80 text-wrap text-center md:text-start text-[#f4f4f4]">Distribusi Bantuan Bibit Hortikultura yang Optimal Kepada para Kelompok Tani di Kabupaten Jember</p>
        </div>
        <div class="spacer hidden md:block"></div>
        <div class="flex flex-col items-center md:items-end">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="footer-bar">
                    <div class="footer-subtitle">
                        <ul class="flex flex-col items-center md:items-start gap-3"> Pages
                            <a href="#hero" class="footer-sublink">Home</a>
                            <a href="#about" class="footer-sublink">About</a>
                            <a href="#tujuan" class="footer-sublink">Purpose</a>
                        </ul>
                    </div>
                </div>
                <div class="footer-bar">
                    <div class="footer-subtitle">
                        <ul class="flex flex-col items-center md:items-start gap-3">Information
                            <a href="#" class="footer-sublink">Contact Us</a>
                            <a href="https://maps.app.goo.gl/hUygpvR5W21Sy9Nn9" class="footer-sublink">Address</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer hidden md:block"></div>
    </div>
    <div class="flex items-center justify-center mt-4 text-[#f4f4f4]">
        <p>Copyright © 2024 - All right reserved by Bibitani Ltd</p>
    </div>
</footer>

</html>
