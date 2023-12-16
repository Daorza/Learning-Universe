<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login Admin</title>
</head>
<body>
    <div class="min-h-screen w-full flex justify-center items-center"
        style="background-image: url('{{ asset('asset/pattern2.png') }}');">
        <div class="bg-white rounded-xl bg-opacity-70 backdrop-filter backdrop-blur-lg p-8 shadow-md">
            <span class="text-gray-950 text-xl font-semibold flex justify-center items-center">
                <img src="{{ asset('asset/Logo_Learning-Universe.png') }}" alt="" width="240px" height="280px">
                <div class="text-6xl font-bold mr-16">
                LOGIN <br> ADMIN
                </div>
            </span>
            <br>
            <div class="grid place-items-center">
            @if(Session::has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session::get('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif


                <form method="POST" action="{{ route('admin.login') }}" class="w-full px-20">
                @csrf
                    <label for="" class="text-gray-900 font-medium text-lg">Email</label>
                    <input type="text" name="email"  type="email"
                        class=" form-input mt-1 block border-2 rounded-md focus:ring-2 focus:ring-gray-800 focus:border-0 p-2 w-full"
                        placeholder="example@gmail.com">
                    <hr class="h-0 border-0 my-2 ">
                    <label for="" class="text-gray-900 font-medium text-lg">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-input mt-1 block border-2 rounded-md focus:ring-2 focus:ring-gray-800 focus:border-0 p-2 w-full"
                        placeholder="********">
                    <br>

                    <button type="submit">
                    <div class="flex justify-center">
                        <a class="w-full bg-gray-900 hover:bg-gray-950 shadow-md text-white rounded-md px-60 mx-16 py-2 font-medium">Login</a></button>
                    </div>
                </form>

                <br>
                <p class="text-sm flex justify-center mt-2">Kembali ke
                    <a href= "{{ url('/') }}"
                        class="hover:text-blue-600 hover:text-md hover:underline">
                        Halaman Sebelumnya
                    </a>
                </p>
            </div>
        </div>
    </div>
        <script>
            document.getElementById('password').addEventListener
            ('paste', function(e) { e.preventDefault();alert('Hanya diperbolehkan menggunakan metode ketik manual');});
        </script>


</body>
</html>
