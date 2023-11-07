<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div>
        <div class="invisible md:visible w-full fixed top-0 ">
            <nav class="flex justify-between py-2 px-8 bg-slate-50 shadow">
                <!-- Logo -->
                <div class="flex">
                    <img src="{{ asset('asset/Logo-navbar.png') }}" alt="Logo">
                    <p class="font-sans  w-full text-center my-auto">Learning Universe</p>
                </div>
                <!-- Menu -->
                <div class="flex gap-6 py-2 text-sm mt-1">
                    <div class="hover:font-medium hover:underline"><a>Home</a></div>
                    <div class="hover:font-medium hover:underline"><a>Class</a></div>
                    <!-- category dropdown -->
                    <div class="relative group">
                        <button class="hover:font-medium hover:underline" id="dropdown-button">
                            Category
                        </button>
                        <ul class="absolute hidden mt-2 space-y-2 bg-white text-gray-800 border border-gray-200 rounded shadow-lg w-36 py-2 z-10 group-hover:block" id="dropdown-menu">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 hover:font-medium">Item 1</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 hover:font-medium">Item 2</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 hover:font-medium">Item 3</a></li>
                        </ul>
                    </div>

                    <div class="hover:font-medium hover:underline"><a>My Class</a></div>
                </div>
                <!-- account -->
                <div class="gap-4 flex justify-around text-sm">
                    <!-- search bar -->
                    <div class="flex">
                        <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                            aria-expanded="false"
                            class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                        <div class="relative hidden md:block">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search icon</span>
                            </div>
                            <input type="text" id="search-navbar"
                                class="block w-full p-2 pl-10 text-sm mt-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search...">
                        </div>
                    </div>
                    <!-- button -->
                    <button class="rounded-md text-center ">
                        <a href=""
                            class="text-black text-xs px-4 py-2 border-2 border-gray-700 rounded-full font-medium hover:border-0 hover:text-white hover:bg-gray-900 tracking-wide">Join Now</a>
                    </button>
                </div>
            </nav>
        </div>

        <!-- Sidebar -->

        <div class="visible md:invisible">
            <div class="bg-slate-100">
                <div id="sidebar"
                    class="bg-slate-100 h-screen w-64 fixed p-4 pt-20 top-0 left-0 transform -translate-x-full transition-transform duration-300 ease-in-out shadow-md">
                    <!-- sidebar menu -->
                    <ul class="space-y-4">
                        <li><a href="#" class="hover:font-medium hover:underline hover:decoration-dotted">Home</a></li>
                        <li><a href="#" class="hover:font-medium hover:underline hover:decoration-dotted">Class</a></li>
                        <div class="relative group">
                            <button class="hover:font-medium hover:underline hover:decoration-dotted" id="dropdownn-button">
                                Category
                            </button>
                            <ul class="absolute hidden mt-2 space-y-2 bg-white text-gray-800 border border-gray-200 rounded shadow-lg w-36 py-2 z-10 group-hover:block" id="dropdownn-menu">
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 hover:font-medium">Item 1</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 hover:font-medium">Item 2</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-300 hover:font-medium">Item 3</a></li>
                            </ul>
                        </div>
                        </li>
                        <li><a href="#" class="hover:font-medium hover:underline hover:decoration-dotted">My Class</a>
                        </li>
                    </ul>
                </div>

                <!-- Burger menu -->
                <button id="burger-menu" class="text-white p-2 absolute top-4 left-4 rounded-md">
                    <svg xmlns="https://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="black">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>


        <script>
            const sidebar = document.getElementById('sidebar');
            const burgerMenu = document.getElementById('burger-menu');

            burgerMenu.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });

            const dropdownButton = document.getElementById('dropdown-button');
            const dropdownMenu = document.getElementById('dropdown-menu');

            dropdownButton.addEventListener('click', () => {
                dropdownMenu.classList.toggle('hidden');
            });

            // Close the dropdown when clicking outside of it
            window.addEventListener('click', (event) => {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });

            const dropdownnButton = document.getElementById('dropdownn-button');
            const dropdownnMenu = document.getElementById('dropdownn-menu');

            dropdownnButton.addEventListener('click', () => {
                dropdownnMenu.classList.toggle('hidden');
            });

            // Close the dropdownn when clicking outside of it
            window.addEventListener('click', (event) => {
                if (!dropdownnButton.contains(event.target) && !dropdownnMenu.contains(event.target)) {
                    dropdownnMenu.classList.add('hidden');
                }
            });

        </script>
    </div>
            <div>
                @yield('content')
            </div>
</body>

</html>
