@extends('layouts.sidebar')

@section('content')
<title>Class Details</title>
@auth
<div class="flex p-16 pt-36">
    <div class="shadow-md w-full bg-white rounded-md">
    <div class="flex justify-between py-6">
        <a href="javascript:window.history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-10 h-10 p-2 ml-12 rounded-full hover:bg-gray-900 hover:fill-white">
                <path fill-rule="evenodd" d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z" clip-rule="evenodd" />
            </svg>
        </a>

        <h1 class="text-lg font-medium uppercase">Class Detail</h1>

        <div>

        </div>
    </div>
        <div class="shadow grid grid-cols-3 px-12 py-6">
            <!-- left section -->
            <div class="h-60 w-fit">
                <img src="{{ asset('uploads/onlineClasses/'.$class->class_picture) }}" alt="{{ $class->class_title }}" class="w-full  h-48 object-cover">
            </div>
            <!-- center section -->
            <div class="text-left">
                <div class="text-xs font-light tracking-wider">{{ $class->category->category_name }}</div>
                <div class="text-xl font-bold">{{ $class->class_title }}</div>
                <div class="grid grid-cols-3 text-sm mt-2">
                    <div>4.5</div>
                    <div>{{ $class->materials->count() }} lessons</div>
                    <div>25 students</div>
                </div>
                <br>
                <div class="text-sm">
                    {{ $class->class_description }}
                </div>
            </div>
            <!-- right sectionl -->
            <div class="ml-8">
                <div class="text-xl font-bold flex justify-end">
                    {{ number_format($class->class_price) }}
                </div>
                <br>
                <div class="text-white bg-gray-500 rounded-md px-8 py-2">
                    <div class="text-sm ">In this course:</div>
                    <div class="capitalize font-medium">Learning Universe Team</div>
                </div>
                <br>
                <div
                    class="flex justify-center capitalize text-lg font-medium border-2 shadow py-2 rounded-lg hover:border-0 text-gray-900 hover:bg-gray-800 hover:text-white hover:text-lg cursor-pointer">
                    <button type="button" class="capitalize">
                        Get now!
                    </button>
                </div>
            </div>
        </div>

        <div class="shadow px-12 py-6">
            <div class="font-semibold capitalize">
                peek what's inside:
            </div>
            <br>
            <div>
            @foreach($class->materials as $material)
                <div>
                    <div class="list-item font-medium">{{ $material->material_title }}</div>
                    <div class="text-sm font-light mb-2 line-clamp-2">{{ $material->material_description }}</div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@else
<div class="bg-gray-900 bg-opacity-50 fixed h-screen w-full">
    <div class="p-20 mt-40 shadow-md bg-white">
        <div class="p-8 flex justify-center">
            <div class="text-lg font-semibold">
                One step for you to get little bit closer<br>
                <span class="text-sm mx-auto font-light">After login to your accout, you can access this page!</span>
            </div>
        </div>
        <br>
        <a href="{{ route('acc') }}" class="px-8 py-3 rounded-lg flex justify-center border-2 border-gray-700 w-fit shadow-md mx-auto hover:border-0 hover:bg-gray-700 hover:text-lg hover:text-white hover:shadow-lg">
            Join with learning universe
        </a>
        <a href="{{ url('') }}" class="flex justify-center text-blue-600 mt-4 hover:underline text-sm">Back to home page</a>
    </div>
</div>
@endauth

@endsection
