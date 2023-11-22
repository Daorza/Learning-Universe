<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <style>
        body {
            background-image: url(' {{ asset('asset/pattern1.jpg') }} ');
        }
    </style>
</head>

<body>
    <div>
        <div class="invisible md:visible w-full fixed top-0">
            <nav class="flex justify-between py-2 px-8 bg-slate-50 shadow">
                <!-- Logo -->
                <div class="flex">
                    <a href="{{ url('') }}" class="flex">
                        <img src="{{ asset('asset/Logo-navbar.png') }}" alt="Logo">
                        <p class="font-sans  w-full text-center my-auto">Learning Universe</p>
                    </a>
                </div>
                <!-- Menu -->
                <div class="flex gap-6 py-2 text-sm mt-1">
                    <div class="hover:font-medium hover:underline"><a href="{{ url('') }}">Home</a></div>
                    <div class="hover:font-medium hover:underline"><a href="{{ route('all-class') }}">Class</a></div>
                    <!-- category dropdown -->
                    <div class="relative group">
                        <button class="hover:font-medium hover:underline" id="dropdown-button">
                            Category
                        </button>
                        <ul class="absolute hidden mt-2 space-y-2 bg-white text-gray-800 border border-gray-200 rounded shadow-lg w-48 py-2 z-10 group-hover:block" id="dropdown-menu">
                            @foreach ($categories as $cat)
                                <li><a href="{{ route('category.show', ['category' => $cat]) }}" class=" block px-4 py-1 hover:font-medium">{{ $cat->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="hover:font-medium hover:underline"><a href="{{ route('myclass') }}">My Class</a></div>
                </div>
                <!-- account -->
                <div class="gap-4 flex justify-around text-sm">
                    <!-- search bar -->
                    <div class="flex">
                        <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                            aria-expanded="false"
                            class="md:hidden text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 rounded-lg text-sm p-2.5 mr-1">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                        <div class="relative hidden md:block">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search icon</span>
                            </div>
                            <input type="text" id="search-navbar"
                                class="block w-full p-2 pl-10 text-sm mt-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search...">
                        </div>
                    </div>
                    <!-- button -->
                    <button class="rounded-md text-center" id="dropdown-button3">
                        @auth
                            <!-- Jika sudah login -->
                            <a href="#" class="text-black text-xs px-4 py-2 border-2 border-gray-700 rounded-full font-medium hover:border-0 hover:text-white hover:bg-gray-900 tracking-wide"
                                onclick="toggleDropdown()">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    class="h-5 w-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16m-7 6h7"></path>
                                </svg>
                                <span class="sm:inline">{{ auth()->user()->name }}</span>
                            </a>
                            <div id="account-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-md overflow-hidden z-10  cursor-default">
                                <div class="block px-4 py-2 text-sm text-gray-700">
                                    <span class="text-xs font-light">Informasi Akun:</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 mx-auto my-2">
                                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="font-bold mt-2">{{ auth()->user()->email }}</span>
                                    <span class="text-sm font-medium mt-1">{{ auth()->user()->name }}</span>
                                </div>
                                <div class="block px-4 py-1 text-sm text-gray-700">
                                    <a href="" class="hover:bg-slate-700 hover:text-white hover:font-medium w-full py-1 px-10 rounded-md">
                                        Profile
                                    </a>
                                </div>
                                <div class="block px-4 py-1 text-sm text-gray-700">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="hover:bg-red-700 hover:text-white hover:font-medium w-full py-1 px-10 rounded-md">
                                            Logout
                                        </a>
                                    </form>
                                </div>
                                <br>
                            </div>
                        @else
                            <!-- Jika belum login -->
                            <a href="{{ url('account') }}"
                            class="text-black text-xs px-4 py-2 border-2 border-gray-700 rounded-full font-medium hover:border-0 hover:text-white hover:bg-gray-900 tracking-wide">
                                Join Now
                            </a>
                        @endauth
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

        <!-- yield content here -->
        <div>
            @yield('content')
        </div>

        <!-- section 7 -->
        <div class="flex bg-red-600 w-full text-white">
            <!-- 7.1 -->
            <div class="flex-wrap flex-1 p-16 ">
                <!-- Footer Logo -->
                <div>
                    <div class="pb-8 text-3xl font-semibold text-white font-sans">
                        Learning Universe
                    </div>
                    <div class="font-medium">Get a lot of best courses <br> from Learning Universe</div>

                </div>
            </div>
            <!-- 7.2 -->
            <div class="flex-wrap flex-1 p-16 ">
                <!-- footer links -->
                <div>
                    <div class="grid  place-content-center">
                        <div class="font-semibold underline underline-offset-4">Links</div><br>
                        <div class="grid grid-rows-3 gap-3">
                            <div><a href="">Home</a></div>
                            <div><a href="{{ route('all-class') }}">Class</a></div>
                            <div><a href="{{ route('acc') }}">My Class</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 7.2 -->
            <div class="flex-wrap flex-1 p-16 ">
                <!-- footer contact -->
                <div>
                    <div class="grid grid-rows-3 grid-cols-1 gap-4">
                        <div class="font-semibold underline underline-offset-4">Contact</div>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                          <a href="" class="ml-4">+1 59800</a>
                        </div>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                            </svg>
                          <a href="" class="ml-4">cslearninguniverse@gmail.com</a>
                        </div>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                          <a href="" class="ml-4">Kabupaten Bogor, Jawa Barat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- section 8 -->
        <div class="flex bg-red-600 text-white">
            <div class="flex-auto">
                <hr class="h-px w-3/4 my-8 bg-gray-600 mx-auto">
                <div class="flex justify-center py-8 text-lg font-medium tracking-wide">@ Copyright 2023   <a href="" class="hover:underline hover:decoration-dotted px-1"> learninguniverse.com</a></div>
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

            function toggleDropdown() {
                var dropdown = document.getElementById('account-dropdown');
                dropdown.classList.toggle('hidden');
            }

        </script>
    </div>

</body>

</html>
