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
                <img class="w-[250px] h-[86px] mt-[32px] mb-[88px]" src="{{ asset('../bibitani.ico') }}"
                    alt="logobibitani">
            </div>

            <div class="flex justify-center ">
                <!-- Sidebar links -->
                <ul class="space-y-2">
                    <li>
                        <a href="#"
                            class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center text-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                stroke="currentColor" class="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>

                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('berita.list') }}"
                            class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                stroke="currentColor" class="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                            </svg>

                            <span>Pemberitahuan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('registrasi.list') }}"
                            class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                stroke="currentColor" class="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>

                            <span>Kelompok Tani</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('pengajuan.list') }}"
                            class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                stroke="currentColor" class="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg>

                            <span>Bantuan Bibit Hortikultura</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Route('pelaporan.list') }}"
                            class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                stroke="currentColor" class="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>

                            <span>Pelaporan Bantuan Bibit</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#"
                            class="text-gray-800 hover:bg-gray-800 hover:text-white  px-4 py-2 rounded-md text-sm font-medium flex items-center space-x-2">
                            <svg class="h-6 w-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <span>Kelompok Tani</span>
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
                            <span>Kelompok Tani</span>
                        </a>
                    </li> --}}
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
