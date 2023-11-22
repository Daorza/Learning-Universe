@extends('layouts.sidebar')

@section('content')
<title>Class Category</title>
<div class="flex p-16 pt-36">
        <div class="shadow-md w-full bg-white rounded-md">
        <div class="flex justify-between py-6">
            <a href="javascript:window.history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-10 h-10 p-2 ml-12 rounded-full hover:bg-gray-900 hover:fill-white">
                    <path fill-rule="evenodd" d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z" clip-rule="evenodd" />
                </svg>
            </a>

            <div class="text-center">
                <h1 class="text-xs font-light uppercase">Category:</h1>
                <h2 class="text-xl font-semibold uppercase">{{ $category->category_name }}</h2>
            </div>

            <div>
            <!-- just blank space -->
            </div>
        </div>
            <div class="shadow px-12 py-6">
            @if ($classesInCategory->count() > 0)
                <div class="bg-gray-100 shadow-md rounded-lg">
                    <div class="container mx-auto p-4 ">
                        <div class="flex flex-wrap overflow-y-scroll py-2">
                            @foreach($classesInCategory as $class)
                            <a href="{{ route('class.show', ['id' => $class->id]) }}" class=" hover:-translate-y-4 hover:saturate-150">
                                <div class="flex-none w-96 mr-4 overflow-hidden bg-white rounded shadow mb-4">
                                    <img src="{{ asset('uploads/onlineClasses/'.$class->class_picture) }}" alt="{{ $class->class_title }}" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h3 class="text-lg font-bold mb-2">{{ $class->class_title }}</h3>
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-1">{{ $class->class_description }}</p>
                                        <div class="flex justify-between items-center mb-2">
                                            <div class="text-gray-600">Price: {{ number_format($class->class_price, 0, ',', '.') }}</div>
                                            <div class="text-gray-600">Lessons: {{ $class->class_lessons }}</div>
                                        </div>
                                        <div class="flex justify-between items-center mb-2">
                                            <div class="text-gray-600">Members: {{ $class->class_members }}</div>
                                            <div class="text-gray-600">Ratings: {{ $class->class_ratings }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @else
                <p>No classes available in this category.</p>
            @endif



        </div>
    </div>



@endsection
