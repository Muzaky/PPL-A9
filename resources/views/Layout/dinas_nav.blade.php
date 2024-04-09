<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
    
    <!-- Heroicons -->
    <link href="https://cdn.jsdelivr.net/npm/@heroicons/react/outline.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fort[]awesome/fontawesome-free/css/all.min.css">
        <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>

<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="h-screen flex overflow-hidden bg-gray-100">
        <!-- Sidebar -->
        <div class="flex flex-col bg-transparent 0 w-80">
            <div class="flex justify-center items-center">
                <img class="w-[250px] h-[86px] mt-[32px] mb-[88px]" src="{{ asset('../bibitani.ico') }}" alt="logobibitani">
            </div>

            <div class="">
                <!-- Sidebar links -->
                <ul class="space-y-2">
                    <li>
                        <a href="#"
                            class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                            <svg class="h-6 w-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                            <svg class="h-6 w-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <span>Informasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                            <svg class="h-6 w-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <span>Pengajuan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content area -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden bg-[#00B074] bg-opacity-5 items-center">
            <!-- Top bar -->
            <div class="flex h-[44px] justify-center items-center content-center mt-[63px]">
                <!-- Top bar content -->
                <form class="flex w-[614px] h-auto bg-white rounded-[8px] mx-[12px] items-center" action="GET">
                    <label for="search_field"></label>
                    <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                        <input id="search_field"
                            class="block w-full h-full  px-[12px] py-[14px] rounded-md border border-transparent bg-gray-200 focus:outline-none focus:bg-white focus:border-gray-300 text-gray-900 placeholder-gray-500 sm:text-sm"
                            placeholder="Cari disini" type="search">
                    </div>


                </form>
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex">
                    </div>

                    {{-- <div class="ml-4 flex items-center md:ml-6">
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button
                                    class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid">
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                                </button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <!-- Main content area -->
            <div class="flex-1 relative z-0 overflow-y-auto focus:outline-none w-[1400px] justify-center"
                tabindex="0">
                <!-- Your content goes here -->

                <div class="flex justify-center mt-8">


                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>


</html>
