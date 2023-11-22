@extends('layouts.sidebar')

@section('content')

<title>Global Classes</title>
<div class="flex p-16 pt-36">
    <div class="shadow-md w-full bg-white rounded-md">
    <h1 class="w-full flex justify-center py-4 mb-4 text-xl">Our Online Classes</h1>
        <div class="px-12 py-6">
            <div class="bg-gray-100 shadow-md rounded-lg">
                <div class="container mx-auto py-12 px-4">
                    <div class="flex flex-wrap overflow-y-scroll py-2">
                        @foreach($onlineClasses as $onlineClass)
                        <a href="{{ route('class.show', ['id' => $onlineClass->id]) }}" class="hover:-translate-y-4 hover:saturate-150">
                            <div class="flex-none w-96 mr-4 overflow-hidden bg-white rounded shadow mb-4">
                                <img src="{{ asset('uploads/onlineClasses/'.$onlineClass->class_picture) }}" alt="{{ $onlineClass->class_title }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-bold mb-2">{{ $onlineClass->class_title }}</h3>
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $onlineClass->class_description }}</p>
                                    <div class="flex justify-between items-center mb-2">
                                        <div class="text-gray-600">Price: {{ number_format($onlineClass->class_price, 0, ',', '.') }}</div>
                                        <div class="text-gray-600">Lessons: {{ $onlineClass->class_lessons }}</div>
                                    </div>
                                    <div class="flex justify-between items-center mb-2">
                                        <div class="text-gray-600">Members: {{ $onlineClass->class_members }}</div>
                                        <div class="text-gray-600">Ratings: {{ $onlineClass->class_ratings }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection
