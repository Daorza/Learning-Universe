@extends('layouts.sidebar')

@section('content')

<title>Account</title>

<div class="min-h-screen bg-dots-darker bg-center p-16 selection:bg-red-500 selection:text-white">

    <div class="max-w-7xl mx-auto p-6 bg-white mt-12">
        <div class="shadow-md rounded-md bg-opacity-10 bg-gray-300 p-4 py-12">
            <div class="flex justify-center">
                <img src="{{ asset('asset/Logo_Learning-Universe.png') }}" alt="" width="240px" height="360px">
            </div>
            <br>
            <div class="flex justify-center text-2xl font-semibold underline decoration-double decoration-red-500">
                Jump into the universe of Learning Universe!
            </div>
            @if (Route::has('login'))
            <div class="p-6 text-center mt-10 z-10">
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                <div class="text-center">
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-red-50 px-12 py-2 rounded-md hover:bg-red-600 hover:font-medium shadow-md">Log in</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 bg-red-50 px-12 py-2 rounded-md hover:bg-red-600 hover:font-medium shadow-md">Register</a>
                    @endif
                </div>
                @endauth
            </div>
            @endif
        </div>
    </div>
</div>

</body>
@endsection
