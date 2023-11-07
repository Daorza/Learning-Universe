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
                    <ul class="space-y-2 text-center px-8">
                        <li><a href="{{ url('/admin-dashboard') }}" class="hover:font-medium cursor-pointer flex justify-center items-center rounded-md hover:bg-red-600 hover:text-white hover:shadow-md py-2 px-4">Home</a></li>
                        <li><a href="{{ url('/student') }}" class="hover:font-medium cursor-pointer flex justify-center items-center rounded-md hover:bg-red-600 hover:text-white hover:shadow-md py-2 px-4">Student Data</a></li>
                        <li><a href="{{ url('/class') }}" class="hover:font-medium cursor-pointer flex justify-center items-center rounded-md hover:bg-red-600 hover:text-white hover:shadow-md py-2 px-4">Class Data</a></li>
                        <li><a href="{{ url('/category') }}" class="hover:font-medium cursor-pointer flex justify-center items-center rounded-md hover:bg-red-600 hover:text-white hover:shadow-md py-2 px-4">Category</a></li>
                        <li><a href="{{ url('/') }}" class="hover:font-medium cursor-pointer flex justify-center items-center rounded-md hover:bg-red-600 hover:text-white hover:shadow-md py-2 px-4">Lessons</a></li>
                        <li><a href="{{ url('/') }}" class="hover:font-medium cursor-pointer flex justify-center items-center rounded-md hover:bg-red-600 hover:text-white hover:shadow-md py-2 px-4">Lessons Detail</a></li>
                        <br>
                        <hr class="h-px w-3/4 my-8 bg-gray-300 mx-auto">
                        <br>
                        <li>
                            <a id="logoutModalButton" class="cursor-pointer flex justify-center items-center rounded-md hover:bg-red-800 hover:text-white hover:font-medium py-2 px-2">
                            Logout
                            </a>
                        </li>
                      </ul>
                </div>

            </div>
        </nav>
        <!-- content here! -->
        @yield('content_admin')
        <!-- end content -->
    </div>
    <!-- Logout Modal -->
    <div id="logoutModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="mb-4">Apakah Anda yakin ingin keluar dari akun ini?</p>
            <div class="flex justify-center">
                <button id="cancelLogout"
                class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-500 hover:text-gray-100">Batal</button>

                <form id="logout-form" action="" method="POST" style="display: none;">
                @csrf
                </form>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <button id="confirmLogout"
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 hover:text-gray-100">Keluar</button></a>
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
