<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="bibitani.ico">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex justify-center items-center">

    <div class="container h-full p-10 ">
        <div class="flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
            <div class="w-full">
                <!-- Container -->
                <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800 relative">
                    <a href="/" class="absolute top-0 left-0 mt-4 ml-4 text-gray-600 hover:text-gray-800" aria-label="Close">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </a>
                    <div class="g-0 lg:flex lg:flex-wrap">
                        <!-- Left column container-->
                        <div class="px-4 md:px-0 lg:w-6/12">
                            <div class="md:mx-6 md:p-12 flex flex-col">
                                <!--Logo-->
                                <div class="text-center">
                                    <img class="mx-auto w-90 my-12" src="../bibitani.ico" alt="logo" />

                                </div>

                                <form class="flex flex-col">
                                    <p class="mb-[10px] text-[36px] font-bold font-[Open Sans]">Login</p>
                                    <small class="mb-[46px] text-[#B9B8B8] ">Login here using your username and
                                        password</small>
                                    <!--Username input-->
                                    <div class=" mb-4">
                                        <label class="block mb-2 font-semibold text-[20px]">
                                            Username
                                        </label>
                                        <input class="w-[600px] h-[52px] p-2 rounded-[8px]" type="text"
                                            placeholder="Username" />
                                    </div>
                                    <div class=" mb-4">
                                        <label class="block mb-2 font-semibold text-[20px]">
                                            Password
                                        </label>
                                        <input class="w-[600px] h-[52px] p-2 rounded-[8px]" type="password"
                                            placeholder="Password" />
                                    </div>

                                    <!--Password input-->


                                    <!--Submit button-->
                                    <div class="pb-1 pt-1 text-center">
                                        <button class=" bg-[#204E51] p-3 rounded px-10 font-bold text-[#f4f4f4] border border-[#204E51] hover:bg-[#f4f4f4] hover:text-[#204E51]" type="button">
                                            Log in
                                        </button>

                                        <!--Forgot password link-->
                                    </div>
                                    <!--Register button-->
                                    <div class="flex items-center justify-center pb-6">
                                        <p class="mt-4 text-center text-sm text-[#204E51] ">
                                            Not a member ?
                                            <a href="/register" class="font-bold leading-6 text-[#000000] hover:text-[#204E51] ">Register here</a>
                                          </p>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Right column container with background and description-->
                        <div class="flex items-center justify-center rounded-b-lg lg:w-6/12 lg:rounded-e-lg lg:rounded-bl-none">
                            <div class="w-[688px] h-[746px] rounded-[20px] my-8" style="background-image: url(image_1.png); background-size: cover"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
