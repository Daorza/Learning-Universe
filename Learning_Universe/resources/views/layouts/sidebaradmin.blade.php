<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
    <div class="flex fixed top-0">
        <nav class="w-72 shadow-md">
            <div class="py-4 px-2 bg-white min-h-screen">
                <img src="{{ asset('asset/Logo_sidebar.png') }}" alt="" class="px-4 w-48 mx-auto">
                <hr class="h-px w-3/4 my-8 bg-gray-900 mx-auto">
                <div>
                    <ul class="space-y-2 text-left px-8">
                        <li class="flex items-center ml-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <a href="{{ route('admin.dashboard') }}" class="ml-4 w-full hover:font-medium cursor-pointer flex justify-start items-center rounded-md hover:bg-red-600 hover:text-white hover:shadow-md py-2 px-4">
                                Home
                            </a>
                        </li>
                        <li class="flex items-center ml-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <a href="{{ route('user.data') }}" class="ml-4 w-full hover:font-medium cursor-pointer flex justify-start items-center rounded-md hover:bg-red-600 hover:text-white hover:shadow-md py-2 px-4">
                                Student Data
                            </a>
                        </li>
                        <li class="flex items-center ml-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                            </svg>
                            <a href="{{ url('/class') }}" class="ml-4 w-full hover:font-medium cursor-pointer flex justify-start items-center rounded-md hover:bg-red-600 hover:text-white hover:shadow-md py-2 px-4">
                                Class Data
                            </a>
                        </li>
                        <li class="flex items-center ml-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                            </svg>
                            <a href="{{ url('/category') }}" class="ml-4 w-full hover:font-medium cursor-pointer flex justify-start items-center rounded-md hover:bg-red-600 hover:text-white hover:shadow-md py-2 px-4">
                                Category
                            </a>
                        </li>
                        <br>
                        <hr class="h-px w-3/4 my-8 bg-gray-300 mx-auto">
                        <br>
                        <li>
                            <a id="logoutModalButton" class="cursor-pointer flex justify-center items-center rounded-md hover:bg-red-700 hover:text-white hover:font-medium py-2 px-2">
                            Logout
                            </a>
                        </li>
                      </ul>
                </div>

            </div>
        </nav>

    </div>
     <!-- content here! -->
     @yield('content_admin')
        <!-- end content -->
    <!-- Logout Modal -->
    <div id="logoutModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="mb-4">Are you sure want to logout from this account?</p>
            <div class="flex justify-center">
                <button id="cancelLogout"
                class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-500 hover:text-gray-100">Cancel</button>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
                @csrf
                </form>
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <button id="confirmLogout"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 hover:text-gray-100">Logout</button></a>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const logoutButton = document.querySelector('#logoutModalButton');
        const logoutModal = document.querySelector('#logoutModal');
        const cancelLogoutButton = document.querySelector('#cancelLogout');
        const confirmLogoutButton = document.querySelector('#confirmLogout');

        logoutButton.addEventListener('click', () => {
        logoutModal.classList.remove('hidden');
        });

        cancelLogoutButton.addEventListener('click', () => {
        logoutModal.classList.add('hidden');
        });

        confirmLogoutButton.addEventListener('click', () => {
        window.location.href = '{{ url('/') }}';
        //   location.reload();
        });
    </script>
</body>
</html>
